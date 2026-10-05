<?php $this->extend("layout/template"); ?>
<?php $this->section("content"); ?>

<style>
.biWrap{padding:30px 24px;max-width:1000px;margin:0 auto;}
.biCard{background:#fff;border-radius:20px;box-shadow:0 16px 44px rgba(15,23,42,.08);overflow:hidden;border:1px solid rgba(5,150,105,.12);}
.biHead{padding:28px 32px;background:linear-gradient(135deg,#0a2920,#064e3b,#115e59);color:#fff;}
.biHead h2{margin:0;font-family:'Neuton',Georgia,serif;font-weight:700;font-size:1.4rem;display:flex;align-items:center;gap:12px;}
.biHead h2 i{width:44px;height:44px;border-radius:13px;background:linear-gradient(135deg,#059669,#f59e0b);display:inline-flex;align-items:center;justify-content:center;font-size:1.15rem;box-shadow:0 8px 20px rgba(5,150,105,.45);}
.biBody{padding:28px 32px;}
.biStats{display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:16px;margin-bottom:24px;}
.biStat{background:linear-gradient(135deg,rgba(5,150,105,.05),rgba(8,145,178,.03));border:1.5px solid rgba(5,150,105,.18);border-radius:14px;padding:20px;text-align:center;}
.biStat .num{font-family:'Neuton',Georgia,serif;font-size:2.2rem;font-weight:700;color:#059669;line-height:1;margin-bottom:6px;}
.biStat .lbl{font-size:.78rem;color:#64748b;font-weight:700;text-transform:uppercase;letter-spacing:.08em;}
.biBtn{display:inline-flex;align-items:center;gap:8px;padding:12px 22px;background:linear-gradient(90deg,#059669,#0891b2);color:#fff;text-decoration:none;border-radius:12px;font-weight:700;font-size:.9rem;box-shadow:0 10px 24px rgba(5,150,105,.35);transition:.25s;}
.biBtn:hover{transform:translateY(-2px);box-shadow:0 14px 32px rgba(5,150,105,.45);color:#fff;}
</style>

<div class="biWrap">
    <div class="biCard">
        <div class="biHead">
            <h2><i class="fa fa-users"></i> Laporan BKD Dosen</h2>
        </div>
        <div class="biBody">
            <div class="biStats">
                <div class="biStat">
                    <div class="num"><?= $stats['total_dosen'] ?? 0 ?></div>
                    <div class="lbl">Total Dosen</div>
                </div>
                <div class="biStat">
                    <div class="num"><?= $stats['total_bimbingan'] ?? 0 ?></div>
                    <div class="lbl">Total Bimbingan</div>
                </div>
                <div class="biStat">
                    <div class="num"><?= $stats['total_penguji'] ?? 0 ?></div>
                    <div class="lbl">Total Pengujian</div>
                </div>
            </div>

            <div style="text-align:center;">
                <a href="<?= base_url('bkd/laporan') ?>" class="biBtn">
                    <i class="fa fa-table"></i> Lihat Laporan Lengkap
                </a>
            </div>
        </div>
    </div>
</div>

<?php $this->endSection(); ?>