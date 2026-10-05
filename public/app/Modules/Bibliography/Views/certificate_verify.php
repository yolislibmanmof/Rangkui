<?php $this->extend("layout/template"); ?>
<?php $this->section("content"); ?>

<style>
.cvWrap{min-height:80vh;display:flex;align-items:center;justify-content:center;padding:40px 16px;}
.cvCard{max-width:680px;width:100%;background:#fff;border-radius:22px;box-shadow:0 24px 64px rgba(5,150,105,.18);overflow:hidden;border:1px solid rgba(5,150,105,.12);border-top:5px solid #059669;}
.cvBody{padding:40px 36px;}
.cvIcon{width:80px;height:80px;background:linear-gradient(135deg,#059669,#10b981);border-radius:50%;margin:0 auto 22px;display:flex;align-items:center;justify-content:center;box-shadow:0 12px 30px rgba(5,150,105,.4);}
.cvIcon i{font-size:2.5rem;color:#fff;}
.cvTitle{text-align:center;color:#059669;font-family:'Neuton',Georgia,serif;font-weight:700;font-size:1.6rem;margin:0 0 6px;}
.cvSub{text-align:center;color:#64748b;margin:0 0 30px;font-size:.9rem;}
.cvTable{width:100%;border-collapse:collapse;margin-bottom:22px;}
.cvTable th{padding:12px 16px;text-align:left;font-weight:800;font-size:.78rem;text-transform:uppercase;letter-spacing:.06em;color:#64748b;border-bottom:1.5px solid #e2e8f0;width:38%;}
.cvTable td{padding:12px 16px;font-size:.9rem;color:#0f172a;border-bottom:1px solid #f1f5f9;}
.cvHash{font-family:'JetBrains Mono',monospace;font-size:.72rem;word-break:break-all;background:#f8fafc;padding:8px 10px;border-radius:8px;color:#64748b;display:block;margin-top:4px;}
.cvInfo{margin-top:22px;padding:16px 18px;background:linear-gradient(135deg,rgba(8,145,178,.08),rgba(5,150,105,.04));border:1.5px solid rgba(8,145,178,.25);border-radius:12px;font-size:.85rem;color:#0f172a;display:flex;gap:12px;align-items:flex-start;}
.cvInfo i{color:#0891b2;font-size:1.1rem;flex-shrink:0;margin-top:2px;}
.cvInfo strong{color:#059669;}
.cvBtn{display:inline-flex;align-items:center;gap:8px;padding:12px 22px;background:linear-gradient(90deg,#059669,#10b981);color:#fff;text-decoration:none;border-radius:12px;font-weight:800;font-size:.9rem;box-shadow:0 10px 24px rgba(5,150,105,.35);transition:.25s;margin-top:10px;}
.cvBtn:hover{transform:translateY(-2px);box-shadow:0 14px 32px rgba(5,150,105,.45);color:#fff;}
</style>

<div class="cvWrap">
    <div class="cvCard">
        <div class="cvBody">
            <div class="cvIcon"><i class="fa fa-shield"></i></div>
            <h2 class="cvTitle">SERTIFIKAT VALID</h2>
            <p class="cvSub">Sertifikat Deposito Digital telah diverifikasi oleh sistem</p>

            <table class="cvTable">
                <tr>
                    <th>No. Sertifikat</th>
                    <td><strong style="font-family:'JetBrains Mono',monospace;font-size:.95rem;color:#059669;"><?= esc($cert->certificate_no) ?></strong></td>
                </tr>
                <tr>
                    <th>Judul Dokumen</th>
                    <td><?= esc($cert->title) ?></td>
                </tr>
                <tr>
                    <th>Tanggal Setor</th>
                    <td><?= date('d F Y · H:i', strtotime($cert->issued_at)) ?> WIB</td>
                </tr>
                <tr>
                    <th>Hash SHA-256</th>
                    <td><code class="cvHash"><?= esc($cert->sha256_hash) ?></code></td>
                </tr>
                <tr>
                    <th>Verifikasi Dilakukan</th>
                    <td><?= $cert->download_count ?> kali</td>
                </tr>
            </table>

            <div class="cvInfo">
                <i class="fa fa-info-circle"></i>
                <div>
                    <strong>Hash SHA-256</strong> adalah sidik jari digital unik dari file PDF.
                    Jika file diubah sedikit saja, hash-nya akan berubah total.
                    Gunakan hash ini untuk memverifikasi keaslian dokumen kapanpun.
                </div>
            </div>

            <div style="text-align:center;">
                <a href="<?= base_url('sertifikat/download/' . $cert->biblio_id) ?>" class="cvBtn">
                    <i class="fa fa-download"></i> Download PDF Sertifikat
                </a>
            </div>
        </div>
    </div>
</div>

<?php $this->endSection(); ?>