<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0" style="border-radius: 20px;">
                <div class="card-header p-4 text-white" style="background: linear-gradient(135deg, <?= 
                    $result['overall_status'] === 'lulus' ? '#059669, #10b981' : 
                    ($result['overall_status'] === 'pending' ? '#f59e0b, #fbbf24' : '#ef4444, #f87171') 
                ?>);">
                    <h2 class="mb-0">
                        <?php if ($result['overall_status'] === 'lulus'): ?>
                            <i class="fa fa-check-circle"></i> SELAMAT! Anda Lulus Yudisium
                        <?php elseif ($result['overall_status'] === 'pending'): ?>
                            <i class="fa fa-clock-o"></i> Sedang Dalam Proses
                        <?php else: ?>
                            <i class="fa fa-times-circle"></i> Belum Lengkap
                        <?php endif; ?>
                    </h2>
                    <p class="mb-0 mt-2">NIM: <strong><?= esc($result['nim']) ?></strong></p>
                </div>
                <div class="card-body p-5">
                    <h5 class="mb-4">Hasil Pemeriksaan:</h5>
                    
                    <?php foreach ($result['checks'] as $key => $check): ?>
                        <div class="d-flex align-items-start mb-3 p-3 rounded" style="background: <?= $check['status'] ? 'rgba(5,150,105,0.05)' : 'rgba(239,68,68,0.05)' ?>;">
                            <div class="me-3" style="width: 40px; height: 40px; border-radius: 50%; background: <?= $check['status'] ? '#10b981' : '#ef4444' ?>; display: flex; align-items: center; justify-content: center;">
                                <i class="fa fa-<?= $check['status'] ? 'check' : 'times' ?> text-white"></i>
                            </div>
                            <div>
                                <h6 class="mb-1"><?= ucfirst(str_replace('_', ' ', $key)) ?></h6>
                                <p class="mb-0 text-muted"><?= $check['message'] ?></p>
                                <?php if (isset($check['detail']) && $check['detail'] && $key === 'document_submitted'): ?>
                                    <small class="text-muted">Judul: <?= esc(substr($check['detail'], 0, 80)) ?>...</small>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <?php if ($result['certificate_ready']): ?>
                        <div class="alert alert-success mt-4">
                            <h5><i class="fa fa-certificate"></i> Sertifikat Deposito Digital Siap!</h5>
                            <p>Anda dapat mengunduh sertifikat resmi yang berisi hash SHA-256 dokumen Anda.</p>
                            <a href="<?= $result['certificate_url'] ?>" class="btn btn-success">
                                <i class="fa fa-download"></i> Generate & Download Sertifikat
                            </a>
                        </div>
                    <?php endif; ?>

                    <a href="<?= base_url('yudisium') ?>" class="btn btn-outline-secondary mt-3">
                        <i class="fa fa-arrow-left"></i> Cek NIM Lain
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>