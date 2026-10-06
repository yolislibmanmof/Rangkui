<style>
.ciWrap{min-height:60vh;display:flex;align-items:center;justify-content:center;padding:40px 16px;}
.ciCard{text-align:center;padding:40px;background:#fff;border-radius:20px;max-width:500px;width:100%;border:1.5px solid rgba(220,38,38,.2);box-shadow:0 16px 44px rgba(15,23,42,.08);}
.ciIcon{width:80px;height:80px;background:linear-gradient(135deg,#ef4444,#dc2626);border-radius:50%;margin:0 auto 22px;display:flex;align-items:center;justify-content:center;box-shadow:0 12px 30px rgba(239,68,68,.4);}
.ciIcon i{font-size:2.5rem;color:#fff;}
.ciTitle{color:#dc2626;margin:0 0 12px;font-family:'Neuton',Georgia,serif;font-weight:700;font-size:1.5rem;}
.ciMsg{color:#64748b;margin:0 0 24px;line-height:1.6;font-size:.92rem;}
.ciBtn{display:inline-block;padding:11px 22px;background:linear-gradient(90deg,#ef4444,#dc2626);color:#fff;border-radius:11px;text-decoration:none;font-weight:700;font-size:.9rem;box-shadow:0 8px 18px rgba(220,38,38,.3);transition:.25s;}
.ciBtn:hover{transform:translateY(-2px);box-shadow:0 12px 24px rgba(220,38,38,.4);color:#fff;}
</style>

<div class="ciWrap">
    <div class="ciCard">
        <div class="ciIcon"><i class="fa fa-times-circle"></i></div>
        <h2 class="ciTitle">Sertifikat Tidak Valid</h2>
        <p class="ciMsg">Nomor sertifikat tidak ditemukan dalam sistem atau telah dibatalkan.</p>
        <a href="<?= base_url('/') ?>" class="ciBtn">
            <i class="fa fa-home"></i> Kembali ke Beranda
        </a>
    </div>
</div>