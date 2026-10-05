<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0" style="border-radius: 20px; border-top: 5px solid #059669;">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <div style="width: 80px; height: 80px; background: linear-gradient(135deg, #059669, #10b981); border-radius: 50%; margin: 0 auto 20px; display: flex; align-items: center; justify-content: center;">
                            <i class="fa fa-shield text-white" style="font-size: 2.5rem;"></i>
                        </div>
                        <h2 style="color: #059669;">SERTIFIKAT VALID</h2>
                        <p class="text-muted">Sertifikat Deposito Digital telah diverifikasi</p>
                    </div>

                    <table class="table">
                        <tr><th width="200">No. Sertifikat</th><td><strong><?= esc($cert->certificate_no) ?></strong></td></tr>
                        <tr><th>Judul Dokumen</th><td><?= esc($cert->title) ?></td></tr>
                        <tr><th>Tanggal Setor</th><td><?= date('d F Y H:i', strtotime($cert->issued_at)) ?> WIB</td></tr>
                        <tr><th>Hash SHA-256</th><td><code style="word-break: break-all;"><?= $cert->sha256_hash ?></code></td></tr>
                        <tr><th>Diunduh</th><td><?= $cert->download_count ?> kali</td></tr>
                    </table>

                    <div class="alert alert-info mt-4">
                        <i class="fa fa-info-circle"></i> <strong>Hash SHA-256</strong> adalah sidik jari digital unik dari file PDF.
                        Jika file diubah sedikit saja, hash-nya akan berubah total. Ini membuktikan keaslian dokumen.
                    </div>

                    <a href="<?= base_url('sertifikat/download/' . $cert->biblio_id) ?>" class="btn btn-success btn-lg">
                        <i class="fa fa-download"></i> Download PDF Sertifikat
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>