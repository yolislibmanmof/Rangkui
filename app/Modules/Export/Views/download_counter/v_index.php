<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");

// ===== PALET EMERALD FOREST =====
$CLR = [
    'emerald'   => '#059669',  // header utama
    'emerald_d' => '#047857',  // border header
    'gold'      => '#f59e0b',  // header sub-tabel
    'gold_d'    => '#d97706',  // border sub-header
    'mint'      => '#d1fae5',  // alternating row genap
    'white'     => '#ffffff',  // alternating row ganjil
    'ink'       => '#0f172a',  // text utama
    'muted'     => '#64748b',  // text sekunder
    'success'   => '#047857',  // downloads > 0
    'danger'    => '#dc2626',  // downloads = 0
    'soft'      => '#ecfdf5',  // background laporan
];
?>

<!-- ============ HEADER LAPORAN ============ -->
<table width="100%" cellpadding="10" cellspacing="0" style="background-color: <?= $CLR['soft'] ?>; border: 2px solid <?= $CLR['emerald'] ?>; margin-bottom: 20px;">
    <tr>
        <td style="background-color: <?= $CLR['emerald'] ?>; color: #fff; font-size: 18pt; font-weight: bold; padding: 14px 18px; font-family: 'Georgia', serif;">
            🌲 DIFOSS RANGKUI — Laporan Statistik Unduhan
        </td>
    </tr>
    <tr>
        <td style="padding: 12px 18px; color: <?= $CLR['ink'] ?>; font-size: 10pt; line-height: 1.6;">
            <b>Judul Laporan:</b> <?= htmlspecialchars($title) ?><br>
            <b>Tanggal Export:</b> <?= date('d F Y · H:i') ?> WIB<br>
            <b>Total Dokumen:</b> <?= count($data) ?> koleksi<br>
            <b>Dicetak oleh:</b> Sistem DIFOSS (Otomatis)
        </td>
    </tr>
</table>

<!-- ============ TABEL UTAMA ============ -->
<table border="1" cellpadding="8" cellspacing="0" width="100%" style="border-collapse: collapse; border-color: <?= $CLR['emerald_d'] ?>; font-family: 'Calibri', 'Arial', sans-serif; font-size: 10pt;">
    <thead>
        <tr>
            <th width="5%"  style="background-color: <?= $CLR['emerald'] ?>; color: #fff; text-align: center; font-weight: bold; padding: 10px; border: 1px solid <?= $CLR['emerald_d'] ?>;">No</th>
            <th width="45%" style="background-color: <?= $CLR['emerald'] ?>; color: #fff; text-align: left; font-weight: bold; padding: 10px; border: 1px solid <?= $CLR['emerald_d'] ?>;">Judul Dokumen</th>
            <th width="50%" style="background-color: <?= $CLR['emerald'] ?>; color: #fff; text-align: center; font-weight: bold; padding: 10px; border: 1px solid <?= $CLR['emerald_d'] ?>;">Rincian Lampiran &amp; Unduhan</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        foreach ($data as $key => $value) :
            $rowBg = ($i % 2 === 0) ? $CLR['mint'] : $CLR['white'];
        ?>
            <tr>
                <td style="vertical-align: top; text-align: center; background-color: <?= $rowBg ?>; color: <?= $CLR['ink'] ?>; font-weight: bold; border: 1px solid #d1d5db;"><?= $i++ ?></td>
                <td style="vertical-align: top; background-color: <?= $rowBg ?>; color: <?= $CLR['ink'] ?>; font-weight: 600; line-height: 1.5; border: 1px solid #d1d5db;">
                    <?= htmlspecialchars($value->title) ?>
                </td>
                <td style="vertical-align: top; background-color: <?= $rowBg ?>; padding: 6px; border: 1px solid #d1d5db;">
                    <?php if (!empty($value->attachment)): ?>
                    <table border="1" cellpadding="6" cellspacing="0" width="100%" style="border-collapse: collapse; border-color: <?= $CLR['gold_d'] ?>; font-size: 9.5pt;">
                        <thead>
                            <tr>
                                <th width="70%" style="text-align: left; background-color: <?= $CLR['gold'] ?>; color: #fff; font-weight: bold; padding: 7px 10px; border: 1px solid <?= $CLR['gold_d'] ?>;">
                                    📎 Nama Berkas
                                </th>
                                <th width="30%" style="text-align: center; background-color: <?= $CLR['gold'] ?>; color: #fff; font-weight: bold; padding: 7px 10px; border: 1px solid <?= $CLR['gold_d'] ?>;">
                                    ⬇ Total Unduhan
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $attIdx = 0;
                            foreach ($value->attachment as $attachment):
                                $attBg = ($attIdx % 2 === 0) ? '#fffbeb' : $CLR['white'];
                                $attIdx++;
                                $isDownloaded = $attachment->count > 0;
                                $countColor = $isDownloaded ? $CLR['success'] : $CLR['danger'];
                                $countIcon  = $isDownloaded ? '✅' : '⚠️';
                            ?>
                                <tr>
                                    <td style="vertical-align: top; background-color: <?= $attBg ?>; color: <?= $CLR['ink'] ?>; padding: 6px 10px; border: 1px solid #e5e7eb;">
                                        📄 <?= htmlspecialchars($attachment->file_name) ?>
                                    </td>
                                    <td style="vertical-align: top; text-align: center; background-color: <?= $attBg ?>; color: <?= $countColor ?>; font-weight: bold; padding: 6px 10px; border: 1px solid #e5e7eb;">
                                        <?= $countIcon ?> <?= (int)$attachment->count ?> unduhan
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <?php else: ?>
                        <div style="color: <?= $CLR['muted'] ?>; font-style: italic; text-align: center; padding: 10px;">— Tidak ada lampiran —</div>
                    <?php endif ?>
                </td>
            </tr>
        <?php endforeach; ?>

        <!-- ============ BARIS RINGKASAN ============ -->
        <?php
        $totalDocs  = count($data);
        $totalFiles = 0;
        $totalDl    = 0;
        foreach ($data as $v) {
            if (!empty($v->attachment)) {
                foreach ($v->attachment as $a) {
                    $totalFiles++;
                    $totalDl += (int)$a->count;
                }
            }
        }
        ?>
        <tr>
            <td colspan="3" style="background-color: <?= $CLR['emerald_d'] ?>; color: #fff; padding: 10px 14px; font-weight: bold; border: 1px solid <?= $CLR['emerald_d'] ?>;">
                📊 RINGKASAN: <?= $totalDocs ?> dokumen · <?= $totalFiles ?> berkas lampiran · <?= number_format($totalDl, 0, ',', '.') ?> total unduhan
            </td>
        </tr>
    </tbody>
</table>

<!-- ============ FOOTER CATATAN ============ -->
<table width="100%" cellpadding="8" cellspacing="0" style="margin-top: 16px; font-size: 8.5pt; color: <?= $CLR['muted'] ?>;">
    <tr>
        <td style="border-top: 2px solid <?= $CLR['emerald'] ?>; padding-top: 8px;">
            <b style="color: <?= $CLR['emerald'] ?>;">🌿 Catatan:</b>
            Laporan ini dihasilkan otomatis oleh sistem DIFOSS RANGKUI.
            Data unduhan bersifat kumulatif sejak berkas pertama kali diunggah.
            Untuk informasi lebih lanjut, hubungi admin perpustakaan atau kunjungi
            <b>setiadifoss.org</b>.
        </td>
    </tr>
    <tr>
        <td style="text-align: center; padding-top: 6px; font-style: italic;">
            © <?= date('Y') ?> DIFOSS Rangkui · Friendly Open Source Software
        </td>
    </tr>
</table>