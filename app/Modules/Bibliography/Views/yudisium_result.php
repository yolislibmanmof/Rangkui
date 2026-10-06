<?php
$statusColors = [
    'lulus'          => ['#059669', '#10b981', 'check-circle', 'SELAMAT! Anda Lulus Yudisium'],
    'pending'        => ['#f59e0b', '#fbbf24', 'clock-o', 'Sedang Dalam Proses'],
    'belum_lengkap'  => ['#ef4444', '#f87171', 'times-circle', 'Syarat Belum Lengkap']
];
$sc = $statusColors[$result['overall_status']] ?? $statusColors['belum_lengkap'];
?>

<style>
.yrWrap{min-height:80vh;display:flex;align-items:center;justify-content:center;padding:40px 16px;}
.yrCard{max-width:680px;width:100%;background:#fff;border-radius:22px;box-shadow:0 24px 64px rgba(5,150,105,.18);overflow:hidden;border:1px solid rgba(5,150,105,.12);}
.yrHead{padding:32px;background:linear-gradient(135deg,<?= $sc[0] ?>,<?= $sc[1] ?>);color:#fff;position:relative;overflow:hidden;}
.yrHead h2{margin:0;font-family:'Neuton',Georgia,serif;font-weight:700;font-size:1.4rem;display:flex;align-items:center;gap:12px;}
.yrHead p{margin:8px 0 0;opacity:.92;font-size:.95rem;font-family:'JetBrains Mono',monospace;}
.yrBody{padding:30px 32px;}
.yrTitle{margin:0 0 22px;font-weight:800;font-size:1rem;color:#0f172a;display:flex;align-items:center;gap:8px;}
.yrItem{display:flex;align-items:flex-start;gap:14px;padding:14px;border-radius:12px;margin-bottom:10px;transition:.25s;}
.yrItem.ok{background:rgba(5,150,105,.06);border:1.5px solid rgba(5,150,105,.18);}
.yrItem.no{background:rgba(239,68,68,.06);border:1.5px solid rgba(239,68,68,.18);}
.yrIcon{width:38px;height:38px;border-radius:50%;display:flex;align-items:center;justify-content:center;color:#fff;flex-shrink:0;font-size:1rem;}
.yrItem.ok .yrIcon{background:#10b981;}
.yrItem.no .yrIcon{background:#ef4444;}
.yrContent h6{margin:0 0 4px;font-weight:800;font-size:.9rem;color:#0f172a;text-transform:capitalize;}
.yrContent p{margin:0;font-size:.83rem;color:#64748b;line-height:1.5;}
.yrContent small{display:block;margin-top:4px;font-size:.75rem;color:#94a3b8;font-family:'JetBrains Mono',monospace;}
.yrAlert{margin-top:22px;padding:18px;background:linear-gradient(135deg,rgba(5,150,105,.08),rgba(16,185,129,.04));border:1.5px solid rgba(5,150,105,.3);border-radius:13px;}
.yrAlert h5{margin:0 0 8px;font-weight:800;color:#059669;display:flex;align-items:center;gap:8px;}
.yrAlert p{margin:0 0 12px;font-size:.88rem;color:#64748b;}
.yrBtnCert{display:inline-flex;align-items:center;gap:8px;padding:11px 20px;background:linear-gradient(90deg,#059669,#10b981);color:#fff;text-decoration:none;border-radius:11px;font-weight:700;font-size:.88rem;box-shadow:0 8px 20px rgba(5,150,105,.3);transition:.25s;}
.yrBtnCert:hover{transform:translateY(-2px);box-shadow:0 12px 28px rgba(5,150,105,.4);color:#fff;}
.yrBack{display:inline-flex;align-items:center;gap:8px;margin-top:18px;padding:10px 18px;background:rgba(5,150,105,.08);color:#059669;text-decoration:none;border-radius:10px;font-weight:700;font-size:.85rem;border:1.5px solid rgba(5,150,105,.2);transition:.25s;}
.yrBack:hover{background:rgba(5,150,105,.15);color:#059669;}
</style>

<div class="yrWrap">
    <div class="yrCard">
        <div class="yrHead">
            <h2><i class="fa fa-<?= $sc[2] ?>"></i> <?= $sc[3] ?></h2>
            <p>NIM: <?= esc($result['nim']) ?> · <?= esc($result['student_name']) ?></p>
        </div>
        <div class="yrBody">
            <h3 class="yrTitle"><i class="fa fa-list-check"></i> Hasil Pemeriksaan:</h3>

            <?php foreach ($result['checks'] as $key => $check): ?>
                <div class="yrItem <?= $check['status'] ? 'ok' : 'no' ?>">
                    <div class="yrIcon"><i class="fa fa-<?= $check['status'] ? 'check' : 'times' ?>"></i></div>
                    <div class="yrContent">
                        <h6><?= ucfirst(str_replace('_', ' ', $key)) ?></h6>
                        <p><?= $check['message'] ?></p>
                        <?php if (!empty($check['detail']) && $key === 'document_submitted'): ?>
                            <small>📄 <?= esc(substr($check['detail'], 0, 80)) ?>...</small>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>

            <?php if ($result['certificate_ready']): ?>
                <div class="yrAlert">
                    <h5><i class="fa fa-certificate"></i> Sertifikat Deposito Digital Siap!</h5>
                    <p>Anda dapat mengunduh sertifikat resmi yang berisi hash SHA-256 dokumen Anda sebagai bukti setoran sah.</p>
                    <a href="<?= $result['certificate_url'] ?>" class="yrBtnCert">
                        <i class="fa fa-download"></i> Generate & Download Sertifikat
                    </a>
                </div>
            <?php endif; ?>

            <a href="<?= base_url('yudisium') ?>" class="yrBack">
                <i class="fa fa-arrow-left"></i> Cek NIM Lain
            </a>
        </div>
    </div>
</div>