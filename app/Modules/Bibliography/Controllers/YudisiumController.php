<?php
namespace App\Modules\Bibliography\Controllers;

use App\Controllers\BaseController;

class YudisiumController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Gerbang Yudisium - Self Check',
            'max_similarity' => $this->getSetting('yudisium_max_similarity', 25)
        ];
        return view('Modules/Bibliography/Views/yudisium_index', $data);
    }

    public function check($nim)
    {
        $db = \Config\Database::connect();
        $maxSimilarity = (float) $this->getSetting('yudisium_max_similarity', 25);
        $requireClearance = $this->getSetting('library_clearance_required', '1') === '1';

        // 1. Cek apakah ada dokumen yang di-submit
        $biblio = $db->table('biblio')
            ->where('student_id', $nim)
            ->orderBy('biblio_id', 'DESC')
            ->get()->getRow();

        $result = [
            'nim' => $nim,
            'student_name' => $biblio->student_name ?? 'Tidak ditemukan',
            'checks' => [
                'document_submitted' => [
                    'status' => $biblio ? true : false,
                    'message' => $biblio ? 'Dokumen ditemukan' : 'Belum ada dokumen yang di-submit',
                    'detail' => $biblio ? $biblio->title : null
                ],
                'document_approved' => [
                    'status' => $biblio && $biblio->approval_status === 'published',
                    'message' => $biblio ? 'Status: ' . ucfirst($biblio->approval_status) : 'N/A',
                    'detail' => $biblio ? $biblio->approval_status : null
                ],
                'similarity_ok' => [
                    'status' => $biblio && $biblio->integrity_similarity !== null && $biblio->integrity_similarity <= $maxSimilarity,
                    'message' => $biblio && $biblio->integrity_similarity !== null 
                        ? 'Similarity: ' . $biblio->integrity_similarity . '% (max: ' . $maxSimilarity . '%)'
                        : 'Belum di-scan',
                    'detail' => $biblio ? $biblio->integrity_similarity : null
                ],
                'admin_approved' => [
                    'status' => $biblio && $biblio->approval_status === 'published',
                    'message' => $biblio ? 'Admin: ' . ucfirst($biblio->approval_status) : 'N/A'
                ],
                'library_clearance' => [
                    'status' => !$requireClearance || ($biblio && $biblio->opac_hide == 0),
                    'message' => $requireClearance ? 'Perlu verifikasi manual di perpustakaan' : 'Tidak diwajibkan',
                    'detail' => $requireClearance
                ]
            ],
            'overall_status' => 'belum_lengkap',
            'certificate_ready' => false
        ];

        // Hitung status keseluruhan
        $allPass = true;
        foreach ($result['checks'] as $key => $check) {
            if (!$check['status']) {
                $allPass = false;
                break;
            }
        }

        if ($allPass) {
            $result['overall_status'] = 'lulus';
            $result['certificate_ready'] = true;
            $result['certificate_url'] = base_url('yudisium/generate-certificate/' . $biblio->biblio_id);
        } else {
            $passCount = count(array_filter($result['checks'], fn($c) => $c['status']));
            $result['overall_status'] = $passCount > 0 ? 'pending' : 'belum_lengkap';
        }

        // Save ke database
        $this->saveChecklist($nim, $biblio ? $biblio->biblio_id : null, $result);

        if ($this->request->isAJAX()) {
            return $this->response->setJSON(['ok' => true, 'data' => $result]);
        }

        return view('Modules/Bibliography/Views/yudisium_result', ['result' => $result]);
    }

    public function generateCertificate($biblio_id)
    {
        // Panggil CertificateController untuk issue
        $certController = new CertificateController();
        $certId = $certController->issueCertificate($biblio_id, $this->session->get('user_id'));
        
        if ($certId) {
            $db = \Config\Database::connect();
            $cert = $db->table('biblio_certificates')->where('cert_id', $certId)->get()->getRow();
            return redirect()->to('/sertifikat/' . $cert->certificate_no);
        }

        return redirect()->back()->with('error', 'Gagal generate sertifikat');
    }

    private function saveChecklist($nim, $biblio_id, $result)
    {
        $db = \Config\Database::connect();
        $data = [
            'student_id' => $nim,
            'biblio_id' => $biblio_id,
            'check_document_submitted' => $result['checks']['document_submitted']['status'] ? 1 : 0,
            'check_document_approved' => $result['checks']['document_approved']['status'] ? 1 : 0,
            'check_similarity_ok' => $result['checks']['similarity_ok']['status'] ? 1 : 0,
            'check_similarity_score' => $result['checks']['similarity_ok']['detail'],
            'check_library_clearance' => $result['checks']['library_clearance']['status'] ? 1 : 0,
            'check_admin_approved' => $result['checks']['admin_approved']['status'] ? 1 : 0,
            'overall_status' => $result['overall_status'],
            'last_checked' => date('Y-m-d H:i:s')
        ];

        $existing = $db->table('yudisium_checklist')->where('student_id', $nim)->get()->getRow();
        if ($existing) {
            $db->table('yudisium_checklist')->where('student_id', $nim)->update($data);
        } else {
            $db->table('yudisium_checklist')->insert($data);
        }
    }

    private function getSetting($key, $default = null)
    {
        $db = \Config\Database::connect();
        $row = $db->table('system_settings')->where('setting_key', $key)->get()->getRow();
        return $row ? $row->setting_value : $default;
    }
}