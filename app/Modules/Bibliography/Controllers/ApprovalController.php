<?php

namespace App\Modules\Bibliography\Controllers;

use App\Controllers\BaseController;

class ApprovalController extends BaseController
{
    public $bibliopage = "biblio/";

    /**
     * Panel Pipeline Admin (Kanban)
     */
    public function pipeline()
    {
        $db = \Config\Database::connect();
        $view = $this->bibliopage . "v_pipeline";
        $title = "Pipeline Persetujuan";

        $submissions = $db->query("
            SELECT s.submission_id, s.biblio_id, s.member_id, s.student_name, s.current_stage, s.status, s.note, s.created_at,
                   b.title, m.member_name,
                   GROUP_CONCAT(DISTINCT sup.supervisor_name SEPARATOR ', ') as supervisors
            FROM xu_submission s
            JOIN biblio b ON b.biblio_id = s.biblio_id
            LEFT JOIN member m ON m.member_id = s.member_id
            LEFT JOIN biblio_supervisor bs ON bs.biblio_id = b.biblio_id
            LEFT JOIN mst_supervisor sup ON sup.supervisor_id = bs.supervisor_id
            GROUP BY s.submission_id, s.biblio_id, s.member_id, s.current_stage, s.status, s.note, s.created_at,
                     b.title, m.member_name
            ORDER BY s.created_at DESC
        ")->getResult();

        $stages = ['pembimbing' => [], 'penguji' => [], 'admin' => [], 'selesai' => []];
        foreach ($submissions as $sub) {
            if (isset($stages[$sub->current_stage])) $stages[$sub->current_stage][] = $sub;
        }

        $content['stages']   = $stages;
        $content['settings'] = $db->table('xu_approval_settings')->get()->getRow();
        $content['docs']     = $db->query("SELECT biblio_id, title FROM biblio WHERE (approval_status = 'draft' OR approval_status IS NULL) ORDER BY biblio_id DESC LIMIT 200")->getResult();
        _render($view, $title, $content);
    }

    /**
     * Deteksi otomatis judul / penulis / pembimbing
     */
    public function detect()
    {
        $db  = \Config\Database::connect();
        $bid = (int) $this->request->getGet('biblio_id');
        $doc = $db->table('biblio')->where('biblio_id', $bid)->get()->getRow();
        $authors = $db->query("SELECT a.author_name FROM biblio_author ba JOIN mst_author a ON a.author_id = ba.author_id WHERE ba.biblio_id = ?", [$bid])->getResult();
        $sups    = $db->query("SELECT s.supervisor_name FROM biblio_supervisor bs JOIN mst_supervisor s ON s.supervisor_id = bs.supervisor_id WHERE bs.biblio_id = ?", [$bid])->getResult();

        return $this->response->setJSON([
            'title'       => $doc->title ?? '',
            'authors'     => array_map(fn($r) => $r->author_name, $authors),
            'supervisors' => array_map(fn($r) => $r->supervisor_name, $sups),
        ]);
    }

    /**
     * Buat submission + token + tautan WA
     */
    public function submit()
    {
        $db   = \Config\Database::connect();
        $post = $this->request->getPost();
        $bid  = (int) ($post['biblio_id'] ?? 0);

        $doc = $db->table('biblio')->where('biblio_id', $bid)->get()->getRow();
        if (!$doc) return $this->response->setJSON(['ok' => false, 'error' => 'Dokumen tidak ditemukan.'])->setStatusCode(404);

        $dup = $db->table('xu_submission')->where('biblio_id', $bid)->where('status', 'menunggu')->get()->getRow();
        if ($dup) return $this->response->setJSON(['ok' => false, 'error' => 'Dokumen sudah dalam proses persetujuan.'])->setStatusCode(400);

        $firstAuthor = $db->query("SELECT a.author_name FROM biblio_author ba JOIN mst_author a ON a.author_id = ba.author_id WHERE ba.biblio_id = ? LIMIT 1", [$bid])->getRow();
        $pengaju = $firstAuthor ? $firstAuthor->author_name : 'Pemohon';

        $steps = [];
        if (!empty($post['pembimbing_name'])) {
            $steps[] = ['stage_order' => 1, 'stage_name' => 'pembimbing', 'approver_name' => $post['pembimbing_name'], 'approver_phone' => $post['pembimbing_phone'] ?? ''];
        }
        if (!empty($post['penguji_name'])) {
            $steps[] = ['stage_order' => count($steps) + 1, 'stage_name' => 'penguji', 'approver_name' => $post['penguji_name'], 'approver_phone' => $post['penguji_phone'] ?? ''];
        }
        $steps[] = ['stage_order' => count($steps) + 1, 'stage_name' => 'admin', 'approver_name' => 'Admin Perpustakaan', 'approver_phone' => ''];

        $db->transBegin();
        $db->table('xu_submission')->insert([
            'biblio_id'     => $bid,
            'member_id'     => '',
            'student_name'  => $pengaju,
            'current_stage' => $steps[0]['stage_name'],
            'status'        => 'menunggu',
        ]);
        $submission_id = $db->insertID();

        $settings = $db->table('xu_approval_settings')->get()->getRow();
        $tpl = $settings->wa_template_pemberitahuan ?? 'Yth. {dosen}, mohon persetujuan dokumen "{judul}" oleh {mahasiswa}. Link: {link}';

        $links = [];
        foreach ($steps as $st) {
            $token = bin2hex(random_bytes(24));
            $db->table('xu_approval_step')->insert([
                'submission_id'  => $submission_id,
                'stage_order'    => $st['stage_order'],
                'stage_name'     => $st['stage_name'],
                'approver_name'  => $st['approver_name'],
                'approver_phone' => $st['approver_phone'],
                'token'          => $token,
            ]);
            if ($st['stage_name'] !== 'admin' && !empty($st['approver_phone'])) {
                $link = base_url('persetujuan/' . $token);
                $msg  = str_replace(['{dosen}', '{judul}', '{mahasiswa}', '{link}'], [$st['approver_name'], $doc->title, $pengaju, $link], $tpl);
                $links[] = [
                    'name'  => $st['approver_name'],
                    'stage' => $st['stage_name'],
                    'wa'    => 'https://wa.me/' . $this->waNumber($st['approver_phone']) . '?text=' . rawurlencode($msg),
                    'link'  => $link,
                ];
            }
        }

        $db->table('biblio')->where('biblio_id', $bid)->update(['approval_status' => 'pending', 'opac_hide' => 1, 'submission_id' => $submission_id]);
        $db->transComplete();

        return $this->response->setJSON(['ok' => true, 'links' => $links]);
    }

    /**
     * Setujui submission (admin, tahap akhir)
     */
    public function approve()
    {
        $db = \Config\Database::connect();
        $submission_id = $this->request->getPost('submission_id');
        $note = $this->request->getPost('note') ?? '';

        $sub = $db->table('xu_submission')->where('submission_id', $submission_id)->get()->getRow();
        if (!$sub) { slim_alert('error', 'Submission tidak ditemukan.'); return redirect()->to('bibliography/pipeline'); }

        $db->table('xu_submission')->where('submission_id', $submission_id)->update([
            'status' => 'terbit', 'current_stage' => 'selesai', 'note' => $note,
        ]);
        $db->table('xu_approval_step')->where('submission_id', $submission_id)->where('stage_name', 'admin')->update([
            'status' => 'setuju', 'note' => $note, 'acted_at' => date('Y-m-d H:i:s'),
        ]);
        $db->table('biblio')->where('biblio_id', $sub->biblio_id)->update([
            'approval_status' => 'published', 'opac_hide' => 0,
        ]);

        slim_alert('success', 'Dokumen disetujui dan DITERBITKAN.');
        return redirect()->to('bibliography/pipeline');
    }

    /**
     * Tolak submission
     */
    public function reject()
    {
        $db = \Config\Database::connect();
        $submission_id = $this->request->getPost('submission_id');
        $note = $this->request->getPost('note') ?? 'Ditolak oleh admin';

        $sub = $db->table('xu_submission')->where('submission_id', $submission_id)->get()->getRow();
        if (!$sub) { slim_alert('error', 'Submission tidak ditemukan.'); return redirect()->to('bibliography/pipeline'); }

        $db->table('xu_submission')->where('submission_id', $submission_id)->update([
            'status' => 'ditolak', 'current_stage' => 'selesai', 'note' => $note,
        ]);
        $db->table('biblio')->where('biblio_id', $sub->biblio_id)->update([
            'approval_status' => 'draft', 'opac_hide' => 1,
        ]);

        slim_alert('success', 'Dokumen ditolak.');
        return redirect()->to('bibliography/pipeline');
    }

    /**
     * Halaman persetujuan publik (token-based, tanpa login)
     */
    public function approvePublic($token)
    {
        $db   = \Config\Database::connect();
        $step = $db->table('xu_approval_step')->where('token', $token)->get()->getRow();

        if (!$step) return redirect()->to('/')->with('msg', 'Tautan tidak valid atau sudah kedaluwarsa.');
        if ($step->status !== 'pending') return redirect()->to('/')->with('msg', 'Tahap ini sudah ditindaklanjuti.');

        $sub    = $db->table('xu_submission')->where('submission_id', $step->submission_id)->get()->getRow();
        $biblio = $db->table('biblio')->where('biblio_id', $sub->biblio_id)->get()->getRow();

        // Ambil lampiran PDF pertama (via tabel files) untuk pratinjau penuh
        $atts = $db->table('biblio_attachment AS ba')
            ->select('f.file_name, f.file_title, f.mime_type')
            ->join('files AS f', 'f.file_id = ba.file_id')
            ->where('ba.biblio_id', $sub->biblio_id)
            ->get()
            ->getResult();
        $pdf = null;
        foreach ($atts as $at) {
            if (stripos($at->file_name, '.pdf') !== false || stripos($at->mime_type ?? '', 'pdf') !== false) {
                $pdf = $at;
                break;
            }
        }

        $view  = "approval_public";
        $title = "Persetujuan Dokumen";
        _renderView($view, $title, ['step' => $step, 'sub' => $sub, 'biblio' => $biblio, 'pdf' => $pdf]);
    }

    /**
     * Aksi dosen dari tautan WA (setuju / revisi / tolak) + kemajuan tahap otomatis
     */
    public function actPublic()
    {
        $db     = \Config\Database::connect();
        $token  = (string) $this->request->getPost('token');
        $action = (string) $this->request->getPost('action');
        $note   = (string) ($this->request->getPost('note') ?? '');

        $step = $db->table('xu_approval_step')->where('token', $token)->get()->getRow();
        if (!$step || $step->status !== 'pending') return redirect()->to('/')->with('msg', 'Tautan tidak valid atau sudah digunakan.');

        $db->table('xu_approval_step')->where('step_id', $step->step_id)->update([
            'status' => $action, 'note' => $note, 'acted_at' => date('Y-m-d H:i:s'),
        ]);

        $sub = $db->table('xu_submission')->where('submission_id', $step->submission_id)->get()->getRow();

        if ($action === 'setuju') {
            $next = $db->table('xu_approval_step')
                ->where('submission_id', $sub->submission_id)
                ->where('status', 'pending')
                ->orderBy('stage_order', 'ASC')
                ->get()->getRow();

            if ($next) {
                $db->table('xu_submission')->where('submission_id', $sub->submission_id)->update([
                    'current_stage' => $next->stage_name, 'status' => 'menunggu', 'note' => $note,
                ]);
            } else {
                $db->table('xu_submission')->where('submission_id', $sub->submission_id)->update([
                    'current_stage' => 'selesai', 'status' => 'terbit', 'note' => $note,
                ]);
                $db->table('biblio')->where('biblio_id', $sub->biblio_id)->update([
                    'approval_status' => 'published', 'opac_hide' => 0,
                ]);
            }
        } elseif ($action === 'revisi') {
            $db->table('xu_submission')->where('submission_id', $sub->submission_id)->update([
                'status' => 'revisi', 'note' => $note,
            ]);
        } else {
            $db->table('xu_submission')->where('submission_id', $sub->submission_id)->update([
                'status' => 'ditolak', 'current_stage' => 'selesai', 'note' => $note,
            ]);
            $db->table('biblio')->where('biblio_id', $sub->biblio_id)->update([
                'approval_status' => 'draft', 'opac_hide' => 1,
            ]);
        }

        return redirect()->to('/')->with('msg', 'Tindakan Anda telah tercatat. Terima kasih.');
    }

    /**
     * Ambil daftar tahap + tautan token (untuk modal kelola)
     */
    public function steps()
    {
        $db  = \Config\Database::connect();
        $sid = (int) $this->request->getGet('submission_id');
        $steps = $db->table('xu_approval_step')->where('submission_id', $sid)->orderBy('stage_order', 'ASC')->get()->getResult();

        $out = [];
        foreach ($steps as $st) {
            $link = base_url('persetujuan/' . $st->token);
            $wa = '';
            if (!empty($st->approver_phone)) {
                $msg = 'Yth. ' . $st->approver_name . ', berikut tautan persetujuan dokumen Repositori DIFOSS: ' . $link;
                $wa = 'https://wa.me/' . $this->waNumber($st->approver_phone) . '?text=' . rawurlencode($msg);
            }
            $out[] = [
                'step_id' => $st->step_id,
                'stage'   => $st->stage_name,
                'name'    => $st->approver_name,
                'phone'   => $st->approver_phone,
                'status'  => $st->status,
                'link'    => $link,
                'wa'      => $wa,
            ];
        }
        return $this->response->setJSON(['ok' => true, 'steps' => $out]);
    }

    /**
     * Edit nama / nomor WA penyetuju pada tahap pending
     */
    public function stepUpdate()
    {
        $db   = \Config\Database::connect();
        $post = $this->request->getPost();
        $db->table('xu_approval_step')->where('step_id', (int) $post['step_id'])->update([
            'approver_name'  => $post['name'] ?? '',
            'approver_phone' => $post['phone'] ?? '',
        ]);
        return $this->response->setJSON(['ok' => true]);
    }

    private function waNumber($phone)
    {
        $p = preg_replace('/[^0-9]/', '', (string) $phone);
        if (substr($p, 0, 1) === '0') $p = '62' . substr($p, 1);
        return $p;
    }
}