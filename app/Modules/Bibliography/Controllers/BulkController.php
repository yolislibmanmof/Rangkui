<?php

namespace App\Modules\Bibliography\Controllers;

use App\Controllers\BaseController;

class BulkController extends BaseController
{
    public $bibliopage = "biblio/";

    public function index()
    {
        $db = \Config\Database::connect();
        $view = $this->bibliopage . "v_bulk";
        $title = "Bulk Operations Suite";
        $content['ministries'] = $db->table('mst_code_ministry')->get()->getResult();
        _render($view, $title, $content);
    }

    public function listDocs()
    {
        $db = \Config\Database::connect();
        $q = trim((string) $this->request->getGet('q'));
        $yearFrom = (int) $this->request->getGet('year_from');
        $yearTo = (int) $this->request->getGet('year_to');
        $ministry = (string) $this->request->getGet('ministry');

        $b = $db->table('biblio');
        if ($q !== '') $b->like('title', $q);
        if ($yearFrom) $b->where('publish_year >=', $yearFrom);
        if ($yearTo) $b->where('publish_year <=', $yearTo);
        if ($ministry !== '') $b->where('code_ministry', $ministry);

        $rows = $b->select('biblio_id, title, publish_year, opac_hide')
            ->orderBy('biblio_id', 'DESC')->limit(500)->get()->getResult();

        return $this->response->setJSON(['ok' => true, 'rows' => $rows]);
    }

    public function exec()
    {
        $db = \Config\Database::connect();
        $post = $this->request->getPost();
        $ids = $post['ids'] ?? [];
        $op = $post['op'] ?? '';
        $value = $post['value'] ?? '';

        if (empty($ids) || !is_array($ids)) return $this->response->setJSON(['ok' => false, 'error' => 'Tidak ada dokumen dipilih.']);

        $db->transBegin();
        $affected = 0;
        try {
            switch ($op) {
                case 'set_year':
                    $db->table('biblio')->whereIn('biblio_id', $ids)->update(['publish_year' => $value]);
                    $affected = count($ids);
                    break;
                case 'set_status':
                    $db->table('biblio')->whereIn('biblio_id', $ids)->update(['opac_hide' => ($value === 'hide' ? 1 : 0)]);
                    $affected = count($ids);
                    break;
                case 'set_ministry':
                    $db->table('biblio')->whereIn('biblio_id', $ids)->update(['code_ministry' => $value]);
                    $affected = count($ids);
                    break;
                case 'add_topic':
                    $topicText = trim((string) $value);
                    if ($topicText === '') throw new \Exception('Nama subyek kosong.');
                    $t = $db->table('mst_topic')->where('topic', $topicText)->get()->getRow();
                    $tid = $t ? $t->topic_id : ($db->table('mst_topic')->insert(['topic' => $topicText]) ? $db->insertID() : 0);
                    foreach ($ids as $bid) {
                        $ex = $db->table('biblio_topic')->where(['biblio_id' => $bid, 'topic_id' => $tid])->get()->getRow();
                        if (!$ex) { $db->table('biblio_topic')->insert(['biblio_id' => $bid, 'topic_id' => $tid]); $affected++; }
                    }
                    break;
                case 'delete':
                    foreach ($ids as $bid) { $db->table('biblio')->where('biblio_id', $bid)->delete(); $affected++; }
                    break;
            }
            $db->transComplete();
            if ($db->transStatus() === false) return $this->response->setJSON(['ok' => false, 'error' => 'Transaksi gagal — semua perubahan dibatalkan.']);
            return $this->response->setJSON(['ok' => true, 'affected' => $affected]);
        } catch (\Throwable $e) {
            $db->transRollback();
            return $this->response->setJSON(['ok' => false, 'error' => $e->getMessage()]);
        }
    }

    public function export()
    {
        $db = \Config\Database::connect();
        $ids = $this->request->getPost('ids') ?? [];
        $format = $this->request->getPost('format') ?? 'ris';
        if (empty($ids) || !is_array($ids)) return $this->response->setJSON(['ok' => false, 'error' => 'Tidak ada dokumen.']);

        $rows = $db->table('biblio')->whereIn('biblio_id', $ids)->get()->getResult();
        $out = [];

        foreach ($rows as $r) {
            $authors = $db->query("SELECT a.author_name FROM biblio_author ba JOIN mst_author a ON a.author_id=ba.author_id WHERE ba.biblio_id=?", [$r->biblio_id])->getResult();
            $an = array_map(fn($a) => $a->author_name, $authors);

            if ($format === 'ris') {
                $l = ['TY  - THES'];
                foreach ($an as $a) $l[] = 'AU  - ' . $a;
                $l[] = 'TI  - ' . $r->title;
                $l[] = 'PY  - ' . $r->publish_year;
                $l[] = 'PB  - ' . $r->publisher;
                $l[] = 'UR  - ' . base_url('beranda/detail/' . $r->biblio_id);
                $l[] = 'ER  - ';
                $out[] = implode("\r\n", $l);
            } elseif ($format === 'bibtex') {
                $key = strtolower(preg_replace('/[^a-z0-9]/i', '', ($an[0] ?? 'difoss'))) . $r->publish_year;
                $out[] = "@mastersthesis{" . $key . ",\n  title={" . $r->title . "},\n  author={" . implode(' and ', $an) . "},\n  year={" . $r->publish_year . "},\n  school={" . $r->publisher . "}\n}";
            } else { // csv
                $out[] = '"' . $r->biblio_id . '","' . str_replace('"', '""', $r->title) . '","' . implode('; ', $an) . '","' . $r->publish_year . '"';
            }
        }

        $header = ($format === 'csv') ? "id,title,authors,year\n" : '';
        $sep = ($format === 'csv') ? "\n" : "\n\n";
        $ext = ($format === 'csv') ? 'csv' : ($format === 'bibtex' ? 'bib' : 'ris');

        return $this->response->setJSON(['ok' => true, 'text' => $header . implode($sep, $out), 'filename' => 'DIFOSS-bulk-' . date('YmdHis') . '.' . $ext]);
    }
}