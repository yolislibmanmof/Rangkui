<?php
namespace App\Modules\Reporting\Controllers;

use App\Controllers\BaseController;

class BkdController extends BaseController
{
    public function index()
    {
        return redirect()->to('/bkd/laporan');
    }

    public function laporan()
    {
        $semester = $this->normalizeSemester($this->request->getGet('semester') ?? $this->getCurrentSemester());
        if ($semester === null) {
            return redirect()->to('/bkd/laporan')->with('error', 'Semester tidak valid.');
        }
        $db = \Config\Database::connect();
        
        $sql = "SELECT 
                    s.supervisor_id as dosen_id,
                    s.supervisor_name,
                    COUNT(DISTINCT bs.biblio_id) as total_pembimbing,
                    COUNT(DISTINCT be.biblio_id) as total_penguji,
                    (COUNT(DISTINCT bs.biblio_id) * ?) as sks_pembimbing,
                    (COUNT(DISTINCT be.biblio_id) * ?) as sks_penguji,
                    ((COUNT(DISTINCT bs.biblio_id) * ?) + (COUNT(DISTINCT be.biblio_id) * ?)) as total_sks
                FROM mst_supervisor s
                LEFT JOIN biblio_supervisor bs ON s.supervisor_id = bs.supervisor_id
                    AND bs.biblio_id IN (
                        SELECT biblio_id FROM biblio 
                        WHERE input_date >= ? AND input_date < ?
                    )
                LEFT JOIN biblio_examiner be ON s.supervisor_id = be.examiner_id
                    AND be.biblio_id IN (
                        SELECT biblio_id FROM biblio 
                        WHERE input_date >= ? AND input_date < ?
                    )
                GROUP BY s.supervisor_id, s.supervisor_name
                HAVING total_pembimbing > 0 OR total_penguji > 0
                ORDER BY total_sks DESC";

        $dateRange = $this->getDateRangeFromSemester($semester);
        $sks_bim = $this->getSetting('bkd_sks_pembimbing', 2.00);
        $sks_uji = $this->getSetting('bkd_sks_penguji', 1.00);
        
        $result = $db->query($sql, [
            $sks_bim, $sks_uji, $sks_bim, $sks_uji,
            $dateRange[0], $dateRange[1],
            $dateRange[0], $dateRange[1]
        ])->getResult();

        $data = [
            'title' => "Laporan BKD Semester {$semester}",
            'semester' => $semester,
            'reports' => $result,
            'semesters' => $this->getAvailableSemesters()
        ];

                // laporan():
        _render('Reporting/bkd_laporan', 'Laporan BKD Semester ' . $semester, $data);
    }

    public function generate()
    {
        $semester = $this->normalizeSemester($this->request->getPost('semester'));
        if ($semester === null) {
            return redirect()->to('/bkd/laporan')->with('error', 'Semester tidak valid.');
        }
        $db = \Config\Database::connect();
        
        // Hapus data lama semester ini
        $db->table('dosen_bkd_rekap')->where('semester', $semester)->delete();

        // Generate ulang (logic sama dengan laporan())
        $dateRange = $this->getDateRangeFromSemester($semester);
        $sks_bim = $this->getSetting('bkd_sks_pembimbing', 2.00);
        $sks_uji = $this->getSetting('bkd_sks_penguji', 1.00);

        $sql = "SELECT s.supervisor_id, s.supervisor_name,
                    COUNT(DISTINCT bs.biblio_id) as total_bim,
                    COUNT(DISTINCT be.biblio_id) as total_uji
                FROM mst_supervisor s
                LEFT JOIN biblio_supervisor bs ON s.supervisor_id = bs.supervisor_id
                    AND bs.biblio_id IN (SELECT biblio_id FROM biblio WHERE input_date >= ? AND input_date < ?)
                LEFT JOIN biblio_examiner be ON s.supervisor_id = be.examiner_id
                    AND be.biblio_id IN (SELECT biblio_id FROM biblio WHERE input_date >= ? AND input_date < ?)
                GROUP BY s.supervisor_id, s.supervisor_name
                HAVING total_bim > 0 OR total_uji > 0";

        $result = $db->query($sql, [$dateRange[0], $dateRange[1], $dateRange[0], $dateRange[1]])->getResult();

        foreach ($result as $r) {
            $db->table('dosen_bkd_rekap')->insert([
                'dosen_id' => $r->supervisor_id,
                'semester' => $semester,
                'total_pembimbing' => $r->total_bim,
                'total_penguji' => $r->total_uji,
                'sks_pembimbing' => $r->total_bim * $sks_bim,
                'sks_penguji' => $r->total_uji * $sks_uji,
                'total_sks' => ($r->total_bim * $sks_bim) + ($r->total_uji * $sks_uji),
                'generated_at' => date('Y-m-d H:i:s')
            ]);
        }

        return redirect()->to('/bkd/laporan?semester=' . $semester)
            ->with('success', 'Laporan BKD berhasil digenerate untuk semester ' . $semester);
    }

    public function export($format = 'xlsx')
    {
        $semester = $this->normalizeSemester($this->request->getGet('semester') ?? $this->getCurrentSemester());
        if ($semester === null) {
            return redirect()->to('/bkd/laporan')->with('error', 'Semester tidak valid.');
        }
        // Implementasi export ke Excel/PDF
        return redirect()->back()->with('info', 'Export akan segera tersedia');
    }

    private function getAvailableSemesters()
    {
        $semesters = [];
        $currentYear = date('Y');
        for ($y = $currentYear; $y >= $currentYear - 3; $y--) {
            $semesters[] = $y . '1'; // Ganjil
            $semesters[] = $y . '2'; // Genap
        }
        return $semesters;
    }

    private function getCurrentSemester()
    {
        $month = (int) date('m');
        $year = date('Y');
        return $year . ($month >= 7 ? '1' : '2');
    }

    private function normalizeSemester($semester): ?string
    {
        if (!is_string($semester) && !is_int($semester)) {
            return null;
        }

        $semester = (string) $semester;
        if (!preg_match('/^\\d{4}[12]$/D', $semester)) {
            return null;
        }

        $year = (int) substr($semester, 0, 4);
        if ($year < 2000 || $year > ((int) date('Y') + 2)) {
            return null;
        }

        return $semester;
    }

    /**
     * Semester ganjil: 1 Juli–1 Januari.
     * Semester genap: 1 Januari–1 Juli.
     * Batas akhir bersifat eksklusif agar timestamp tidak tumpang tindih.
     */
    private function getDateRangeFromSemester(string $semester): array
    {
        $year = (int) substr($semester, 0, 4);
        $type = substr($semester, 4, 1);

        if ($type === '1') {
            return [sprintf('%04d-07-01', $year), sprintf('%04d-01-01', $year + 1)];
        }

        return [sprintf('%04d-01-01', $year), sprintf('%04d-07-01', $year)];
    }

    private function getSetting($key, $default = null)
    {
        $db = \Config\Database::connect();
        $row = $db->table('system_settings')->where('setting_key', $key)->get()->getRow();
        return $row ? $row->setting_value : $default;
    }

    private function getStats()
    {
        $db = \Config\Database::connect();
        return [
            'total_dosen' => $db->table('mst_supervisor')->countAllResults(),
            'total_bimbingan' => $db->table('biblio_supervisor')->countAllResults(),
            'total_penguji' => $db->table('biblio_examiner')->countAllResults()
        ];
    }
}