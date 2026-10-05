<?php $this->extend("layout/template"); ?>
<?php $this->section("content"); ?>

<style>
.yuWrap{min-height:80vh;display:flex;align-items:center;justify-content:center;padding:40px 16px;}
.yuCard{max-width:580px;width:100%;background:#fff;border-radius:22px;box-shadow:0 24px 64px rgba(5,150,105,.18);overflow:hidden;border:1px solid rgba(5,150,105,.12);}
.yuHead{padding:32px;background:linear-gradient(135deg,#0a2920,#064e3b,#115e59);color:#fff;position:relative;overflow:hidden;}
.yuHead::after{content:'';position:absolute;top:-60%;right:-10%;width:300px;height:300px;border-radius:50%;background:radial-gradient(circle,rgba(245,158,11,.3),transparent 70%);filter:blur(50px);}
.yuHead h2{margin:0;font-family:'Neuton',Georgia,serif;font-weight:700;font-size:1.5rem;display:flex;align-items:center;gap:12px;position:relative;z-index:2;}
.yuHead h2 i{width:46px;height:46px;border-radius:14px;background:linear-gradient(135deg,#059669,#f59e0b);display:inline-flex;align-items:center;justify-content:center;font-size:1.2rem;box-shadow:0 10px 24px rgba(5,150,105,.45);}
.yuHead p{margin:8px 0 0;opacity:.88;font-size:.9rem;position:relative;z-index:2;padding-left:58px;}
.yuBody{padding:30px 32px 34px;}
.yuLbl{display:block;font-weight:800;font-size:.74rem;text-transform:uppercase;letter-spacing:.08em;color:#0f172a;margin-bottom:8px;}
.yuIn{width:100%;padding:13px 16px;border:1.5px solid #e2e8f0;border-radius:12px;font-size:.92rem;margin-bottom:18px;background:#f8fafc;transition:.25s;font-family:'JetBrains Mono',monospace;letter-spacing:.05em;}
.yuIn:focus{outline:none;border-color:#059669;box-shadow:0 0 0 4px rgba(5,150,105,.12);background:#fff;}
.yuBtn{display:inline-flex;align-items:center;justify-content:center;gap:8px;padding:13px 18px;border:none;border-radius:12px;background:linear-gradient(90deg,#059669,#0891b2);color:#fff;font-weight:800;font-size:.95rem;cursor:pointer;transition:.25s;width:100%;box-shadow:0 10px 24px rgba(5,150,105,.35);}
.yuBtn:hover{transform:translateY(-2px);filter:brightness(1.08);box-shadow:0 14px 32px rgba(5,150,105,.45);}
.yuInfo{margin-top:22px;padding:18px;background:linear-gradient(135deg,rgba(5,150,105,.05),rgba(8,145,178,.03));border:1.5px solid rgba(5,150,105,.18);border-radius:13px;}
.yuInfo h6{margin:0 0 10px;font-weight:800;font-size:.88rem;color:#059669;display:flex;align-items:center;gap:8px;}
.yuInfo ul{margin:0;padding-left:20px;font-size:.85rem;color:#64748b;line-height:1.8;}
.yuInfo ul li{margin-bottom:4px;}
</style>

<div class="yuWrap">
    <div class="yuCard">
        <div class="yuHead">
            <h2><i class="fa fa-graduation-cap"></i> Gerbang Yudisium</h2>
            <p>Periksa kesiapan Anda untuk yudisium secara mandiri</p>
        </div>
        <div class="yuBody">
            <form method="get" action="<?= base_url('yudisium/cek') ?>">
                <label class="yuLbl">Masukkan NIM Anda</label>
                <input type="text" name="nim" class="yuIn" placeholder="Contoh: 01023621722004" required autofocus>
                <button type="submit" class="yuBtn">
                    <i class="fa fa-search"></i> Cek Status Yudisium
                </button>
            </form>

            <div class="yuInfo">
                <h6><i class="fa fa-info-circle"></i> Syarat Lulus Yudisium:</h6>
                <ul>
                    <li>Dokumen skripsi/tesis/disertasi sudah di-submit & <strong>disetujui admin</strong></li>
                    <li>Similarity score <strong>≤ <?= $max_similarity ?? 25 ?>%</strong></li>
                    <li>Telah menyelesaikan bebas tanggungan perpustakaan</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php $this->endSection(); ?>