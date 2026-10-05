<?php $this->extend("layout/template"); ?>
<?php $this->section("content"); ?>

<div style="min-height:60vh;display:flex;align-items:center;justify-content:center;padding:40px 16px;">
    <div style="text-align:center;padding:40px;background:#fee2e2;border-radius:20px;max-width:500px;border:1.5px solid rgba(220,38,38,.2);">
        <i class="fa fa-times-circle" style="font-size:3.5rem;color:#dc2626;margin-bottom:18px;display:block;"></i>
        <h2 style="color:#dc2626;margin:0 0 12px;font-family:'Neuton',Georgia,serif;">Sertifikat Tidak Valid</h2>
        <p style="color:#64748b;margin:0 0 24px;line-height:1.6;">Nomor sertifikat tidak ditemukan dalam sistem atau telah dibatalkan.</p>
        <a href="<?= base_url('/') ?>" style="display:inline-block;padding:11px 22px;background:#dc2626;color:#fff;border-radius:11px;text-decoration:none;font-weight:700;font-size:.9rem;box-shadow:0 8px 18px rgba(220,38,38,.3);">
            <i class="fa fa-home"></i> Kembali ke Beranda
        </a>
    </div>
</div>

<?php $this->endSection(); ?>