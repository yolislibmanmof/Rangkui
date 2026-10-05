<style>
:root {
    --xl-emerald:#059669; --xl-teal:#0891b2; --xl-gold:#f59e0b;
    --xl-rose:#e11d48; --xl-amber:#f59e0b;
}

/* Stats Cards */
.xuStatsGrid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
    margin-bottom: 30px;
}

.xuStatCard {
    background: #fff;
    border-radius: 16px;
    padding: 24px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    border-left: 4px solid var(--xl-emerald);
    transition: transform 0.3s;
}

.xuStatCard:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 24px rgba(0,0,0,0.12);
}

.xuStatCard.menunggu { border-left-color: var(--xl-gold); }
.xuStatCard.disetujui { border-left-color: var(--xl-emerald); }
.xuStatCard.ditolak { border-left-color: var(--xl-rose); }
.xuStatCard.revisi { border-left-color: var(--xl-teal); }

.xuStatIcon {
    width: 48px;
    height: 48px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    margin-bottom: 12px;
    background: rgba(5,150,105,0.1);
    color: var(--xl-emerald);
}

.xuStatCard.menunggu .xuStatIcon { background: rgba(245,158,11,0.1); color: var(--xl-gold); }
.xuStatCard.disetujui .xuStatIcon { background: rgba(5,150,105,0.1); color: var(--xl-emerald); }
.xuStatCard.ditolak .xuStatIcon { background: rgba(225,29,72,0.1); color: var(--xl-rose); }
.xuStatCard.revisi .xuStatIcon { background: rgba(8,145,178,0.1); color: var(--xl-teal); }

.xuStatNumber {
    font-size: 2rem;
    font-weight: 800;
    color: #0f172a;
    line-height: 1;
    margin-bottom: 4px;
}

.xuStatLabel {
    font-size: 0.85rem;
    color: #64748b;
    font-weight: 600;
}

/* Table Styles */
.xuTableWrap {
    background: #fff;
    border-radius: 16px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    overflow: hidden;
}

.xuTableHeader {
    padding: 20px 24px;
    background: linear-gradient(135deg, var(--xl-emerald), var(--xl-teal));
    color: #fff;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.xuTableHeader h3 {
    margin: 0;
    font-size: 1.2rem;
    font-weight: 700;
}

.xuTable {
    width: 100%;
    border-collapse: collapse;
}

.xuTable th {
    background: #f8fafc;
    padding: 14px 16px;
    text-align: left;
    font-size: 0.75rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    color: #64748b;
    border-bottom: 2px solid #e2e8f0;
}

.xuTable td {
    padding: 16px;
    border-bottom: 1px solid #f1f5f9;
    vertical-align: middle;
}

.xuTable tr:hover {
    background: #f8fafc;
}

/* Status Badges */
.xuStatusBadge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 6px 12px;
    border-radius: 999px;
    font-size: 0.75rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

.xuStatusBadge.menunggu { background: rgba(245,158,11,0.15); color: #d97706; }
.xuStatusBadge.disetujui { background: rgba(5,150,105,0.15); color: #059669; }
.xuStatusBadge.ditolak { background: rgba(225,29,72,0.15); color: #e11d48; }
.xuStatusBadge.revisi { background: rgba(8,145,178,0.15); color: #0891b2; }
.xuStatusBadge.terbit { background: rgba(16,185,129,0.15); color: #10b981; }

/* Action Buttons */
.xuActionBtn {
    padding: 6px 12px;
    border-radius: 8px;
    border: none;
    font-size: 0.8rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.2s;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    text-decoration: none;
}

.xuActionBtn.approve { background: linear-gradient(135deg, var(--xl-emerald), var(--xl-teal)); color: #fff; }
.xuActionBtn.reject { background: linear-gradient(135deg, var(--xl-rose), #be123c); color: #fff; }
.xuActionBtn.revisi { background: linear-gradient(135deg, var(--xl-amber), #d97706); color: #fff; }
.xuActionBtn.view { background: #f1f5f9; color: #475569; }
.xuActionBtn.delete { background: linear-gradient(135deg, var(--xl-rose), #be123c); color: #fff; }
.xuActionBtn.delete:hover { box-shadow: 0 4px 12px rgba(225,29,72,0.35); }

.xuActionBtn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}

/* Empty State */
.xuEmptyState {
    text-align: center;
    padding: 60px 20px;
    color: #94a3b8;
}
.xuEmptyState i { font-size: 4rem; margin-bottom: 16px; opacity: 0.5; }

/* Responsive */
@media (max-width: 768px) {
    .xuStatsGrid { grid-template-columns: repeat(2, 1fr); }
    .xuTable { font-size: 0.85rem; }
    .xuTable th, .xuTable td { padding: 12px 8px; }
}
</style>

<div class="xuStatsGrid">
    <div class="xuStatCard">
        <div class="xuStatIcon"><i class="fa fa-inbox"></i></div>
        <div class="xuStatNumber"><?= $stats['total'] ?></div>
        <div class="xuStatLabel">Total Submission</div>
    </div>
    <div class="xuStatCard menunggu">
        <div class="xuStatIcon"><i class="fa fa-clock-o"></i></div>
        <div class="xuStatNumber"><?= $stats['menunggu'] ?></div>
        <div class="xuStatLabel">Menunggu Persetujuan</div>
    </div>
    <div class="xuStatCard disetujui">
        <div class="xuStatIcon"><i class="fa fa-check-circle"></i></div>
        <div class="xuStatNumber"><?= $stats['disetujui'] ?></div>
        <div class="xuStatLabel">Disetujui</div>
    </div>
    <div class="xuStatCard revisi">
        <div class="xuStatIcon"><i class="fa fa-edit"></i></div>
        <div class="xuStatNumber"><?= $stats['revisi'] ?></div>
        <div class="xuStatLabel">Perlu Revisi</div>
    </div>
    <div class="xuStatCard ditolak">
        <div class="xuStatIcon"><i class="fa fa-times-circle"></i></div>
        <div class="xuStatNumber"><?= $stats['ditolak'] ?></div>
        <div class="xuStatLabel">Ditolak</div>
    </div>
</div>

<div class="xuTableWrap">
    <div class="xuTableHeader">
        <h3><i class="fa fa-list"></i> Daftar Submission</h3>
        <button class="xuActionBtn view" onclick="location.reload()">
            <i class="fa fa-refresh"></i> Refresh
        </button>
    </div>
    
    <?php if (empty($submissions)): ?>
        <div class="xuEmptyState">
            <i class="fa fa-inbox"></i>
            <h4>Belum Ada Submission</h4>
            <p>Belum ada dokumen yang diajukan untuk persetujuan.</p>
        </div>
    <?php else: ?>
        <table class="xuTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Mahasiswa</th>
                    <th>Judul Dokumen</th>
                    <th>Tanggal Upload</th>
                    <th>Stage</th>
                    <th>Status</th>
                    <th>Catatan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                foreach ($submissions as $sub): 
                    $stageClass = '';
                    $stageIcon = '';
                    switch($sub->current_stage) {
                        case 'pembimbing': $stageClass = 'bg-warning text-dark'; $stageIcon = 'fa-user'; break;
                        case 'penguji': $stageClass = 'bg-info text-dark'; $stageIcon = 'fa-users'; break;
                        case 'admin': $stageClass = 'bg-primary text-white'; $stageIcon = 'fa-shield'; break;
                        case 'selesai': $stageClass = 'bg-success text-white'; $stageIcon = 'fa-check'; break;
                        default: $stageClass = 'bg-secondary text-white'; $stageIcon = 'fa-question'; break;
                    }
                ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td>
                        <strong><?= esc($sub->student_name ?? 'N/A') ?></strong><br>
                        <small class="text-muted"><?= esc($sub->mahasiswa_nama ?? 'Non-member') ?></small>
                    </td>
                    <td>
                        <strong><?= character_limiter($sub->title ?? '-', 60) ?></strong>
                    </td>
                    <td>
                        <?= date('d M Y', strtotime($sub->created_at)) ?><br>
                        <small class="text-muted"><?= date('H:i', strtotime($sub->created_at)) ?></small>
                    </td>
                    <td>
                        <span class="badge <?= $stageClass ?>">
                            <i class="fa <?= $stageIcon ?>"></i> <?= ucfirst($sub->current_stage) ?>
                        </span>
                    </td>
                    <td>
                        <span class="xuStatusBadge <?= $sub->status ?>">
                            <i class="fa fa-<?= $sub->status == 'menunggu' ? 'clock-o' : ($sub->status == 'disetujui' ? 'check' : ($sub->status == 'ditolak' ? 'times' : 'edit')) ?>"></i>
                            <?= ucfirst($sub->status) ?>
                        </span>
                    </td>
                    <td>
                        <?php if ($sub->note): ?>
                            <small class="text-muted"><?= character_limiter($sub->note, 40) ?></small>
                        <?php else: ?>
                            <span class="text-muted">-</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <div style="display: flex; gap: 6px; flex-wrap: wrap;">
                            <?php if ($sub->status == 'menunggu' && $sub->current_stage == 'admin'): ?>
                                <a href="<?= base_url('submission/approve/' . $sub->submission_id) ?>" 
                                   class="xuActionBtn approve"
                                   onclick="return confirm('Yakin ingin menyetujui submission ini?')">
                                    <i class="fa fa-check"></i> Setujui
                                </a>
                                <button class="xuActionBtn revisi" onclick="showRevisiModal(<?= $sub->submission_id ?>)">
                                    <i class="fa fa-edit"></i> Revisi
                                </button>
                                <button class="xuActionBtn reject" onclick="showRejectModal(<?= $sub->submission_id ?>)">
                                    <i class="fa fa-times"></i> Tolak
                                </button>
                            <?php endif; ?>
                            
                            <a href="<?= base_url('bibliography/edit?bbi=' . slim_encrypt($sub->biblio_id)) ?>" 
                               class="xuActionBtn view">
                                <i class="fa fa-eye"></i> Lihat
                            </a>
                            
<button type="button" 
        class="xuActionBtn delete"
        onclick="
            (function(btn) {
                var t = '<?= esc(str_replace(['\'', '\n', '\r', '\\'], [' ', ' ', ' ', ''], $sub->title ?? 'Submission')) ?>';
                if (t.length > 60) t = t.substring(0, 60) + '...';
                
                if (!confirm('⚠️ Hapus Submission?\n\nJudul: ' + t + '\n\nData akan dihapus PERMANEN (submission, bibliografi, file PDF, relasi).')) return;
                if (!confirm('🔴 KONFIRMASI TERAKHIR\n\nData TIDAK BISA dikembalikan.\nKlik OK untuk menghapus.')) return;
                
                document.title = '🗑️ Menghapus...';
                
                var f = document.createElement('form');
                f.method = 'POST';
                f.action = '<?= base_url('admin-dashboard/delete/') ?>' + <?= $sub->submission_id ?>;
                
                var c = document.createElement('input');
                c.type = 'hidden';
                c.name = '<?= csrf_token() ?>';
                c.value = '<?= csrf_hash() ?>';
                f.appendChild(c);
                
                document.body.appendChild(f);
                f.submit();
            })(this);
        ">
    <i class="fa fa-trash"></i> Hapus
</button>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<!-- Modal Revisi -->
<div class="modal fade" id="revisiModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-edit"></i> Minta Revisi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formRevisi" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Catatan Revisi</label>
                        <textarea class="form-control" name="note" rows="4" required placeholder="Jelaskan bagian yang perlu direvisi..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-warning">Kirim Permintaan Revisi</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Tolak -->
<div class="modal fade" id="rejectModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-times-circle"></i> Tolak Submission</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formReject" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Alasan Penolakan</label>
                        <textarea class="form-control" name="note" rows="4" required placeholder="Jelaskan alasan penolakan..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Tolak Submission</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function showRevisiModal(submissionId) {
    document.getElementById('formRevisi').action = '<?= base_url('submission/requestRevisi/') ?>' + submissionId;
    var modal = new bootstrap.Modal(document.getElementById('revisiModal'));
    modal.show();
}

function showRejectModal(submissionId) {
    document.getElementById('formReject').action = '<?= base_url('submission/reject/') ?>' + submissionId;
    var modal = new bootstrap.Modal(document.getElementById('rejectModal'));
    modal.show();
}

// ✅ FUNGSI HAPUS SUBMISSION (dengan konfirmasi 2 tahap untuk keamanan)
function confirmDeleteSubmission(submissionId, title) {
    var shortTitle = title.length > 60 ? title.substring(0, 60) + '...' : title;
    var confirmed = confirm(
        '⚠️ PERINGATAN: Hapus Submission\n\n' +
        'Judul: "' + shortTitle + '"\n\n' +
        'Tindakan ini akan menghapus PERMANEN:\n' +
        '• Record submission\n' +
        '• Record bibliografi\n' +
        '• File PDF di server\n' +
        '• Semua relasi (penulis, subyek, lampiran)\n\n' +
        'Apakah Anda yakin ingin melanjutkan?'
    );
    
    if (!confirmed) return;
    
    var doubleCheck = confirm(
        '🔴 KONFIRMASI TERAKHIR\n\n' +
        'Data yang dihapus TIDAK BISA dikembalikan.\n' +
        'Ketik OK untuk melanjutkan penghapusan.'
    );
    
    if (!doubleCheck) return;
    
    // Tampilkan loading
    var originalTitle = document.title;
    document.title = '🗑️ Menghapus...';
    
    // Buat form POST dan submit
    var form = document.createElement('form');
    form.method = 'POST';
    form.action = '<?= base_url('submission/delete/') ?>' + submissionId;
    
    // Tambahkan CSRF token
    var csrfInput = document.createElement('input');
    csrfInput.type = 'hidden';
    csrfInput.name = '<?= csrf_token() ?>';
    csrfInput.value = '<?= csrf_hash() ?>';
    form.appendChild(csrfInput);
    
    document.body.appendChild(form);
    form.submit();
}
</script>