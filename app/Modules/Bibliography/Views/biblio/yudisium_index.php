<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0" style="border-radius: 20px;">
                <div class="card-header bg-gradient text-white p-4" style="background: linear-gradient(135deg, #059669, #0891b2);">
                    <h2 class="mb-0"><i class="fa fa-graduation-cap"></i> Gerbang Yudisium</h2>
                    <p class="mb-0 mt-2">Periksa kesiapan Anda untuk yudisium secara mandiri</p>
                </div>
                <div class="card-body p-5">
                    <form id="formYudisium" method="get" action="<?= base_url('yudisium/cek') ?>">
                        <div class="mb-4">
                            <label class="form-label fw-bold">Masukkan NIM Anda</label>
                            <input type="text" name="nim" class="form-control form-control-lg" 
                                   placeholder="Contoh: 01023621722004" required>
                            <small class="text-muted">Sistem akan memeriksa seluruh syarat yudisium Anda secara otomatis</small>
                        </div>
                        <button type="submit" class="btn btn-success btn-lg w-100">
                            <i class="fa fa-search"></i> Cek Status Yudisium
                        </button>
                    </form>

                    <div class="mt-4 p-3 bg-light rounded">
                        <h6 class="fw-bold"><i class="fa fa-info-circle text-info"></i> Syarat Lulus Yudisium:</h6>
                        <ul class="mb-0">
                            <li>Dokumen skripsi/tesis/disertasi sudah di-submit & disetujui admin</li>
                            <li>Similarity score <strong>&le; <?= $max_similarity ?>%</strong></li>
                            <li>Telah menyelesaikan bebas tanggungan perpustakaan</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>