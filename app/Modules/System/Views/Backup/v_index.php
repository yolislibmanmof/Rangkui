<style>
/* ================================================================
   DIFOSS BACKUP DATA — EMERALD FOREST EDITION
   ================================================================ */
:root{
    --bk-emerald:#059669; --bk-teal:#0891b2; --bk-gold:#f59e0b;
    --bk-mint:#6ee7b7; --bk-deep:#0a2920;
    --bk-ink:#0f172a; --bk-muted:#64748b; --bk-soft:#94a3b8;
}

.xuR{opacity:0;transform:translateY(24px);transition:all .6s cubic-bezier(.2,.8,.2,1)}
.xuR.in{opacity:1;transform:none}

/* ===== KARTU ===== */
.xuBkCard{
    background:#fff;border-radius:22px;
    box-shadow:0 16px 44px rgba(15,23,42,.08);
    overflow:hidden;
    border:1px solid rgba(5,150,105,.12);
    margin-bottom:24px;
    transition:.35s cubic-bezier(.2,.8,.2,1);
}
.xuBkCard:hover{box-shadow:0 22px 54px rgba(5,150,105,.14);border-color:rgba(5,150,105,.22)}
html.xu-dark .xuBkCard{background:#0f1e1f;border-color:rgba(5,150,105,.22);box-shadow:0 16px 44px rgba(0,0,0,.4)}

/* ===== HEADER ===== */
.xuBkHead{
    padding:22px 28px;
    background:linear-gradient(90deg,var(--bk-emerald),var(--bk-teal),var(--bk-gold),var(--bk-emerald));
    background-size:200% 100%;
    color:#fff;
    display:flex;align-items:center;justify-content:space-between;
    flex-wrap:wrap;gap:14px;
    animation:xuBkGrad 7s linear infinite;
    position:relative;overflow:hidden;
}
.xuBkHead::after{
    content:'';position:absolute;top:-60%;right:-8%;
    width:320px;height:320px;border-radius:50%;
    background:radial-gradient(circle,rgba(245,158,11,.25),transparent 70%);
    pointer-events:none;
}
@keyframes xuBkGrad{to{background-position:200% 0}}

.xuBkHead h2{
    margin:0;font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1.3rem;
    display:flex;align-items:center;gap:12px;
    color:#fff;letter-spacing:-.01em;
    position:relative;z-index:2;
}
.xuBkHead h2 i{
    width:42px;height:42px;border-radius:13px;
    background:rgba(255,255,255,.18);
    backdrop-filter:blur(8px);-webkit-backdrop-filter:blur(8px);
    display:inline-flex;align-items:center;justify-content:center;
    font-size:1.15rem;
    box-shadow:inset 0 1px 0 rgba(255,255,255,.2);
}

/* Tombol Add */
.xuBtnAdd{
    display:inline-flex;align-items:center;gap:9px;
    padding:9px 18px;border-radius:12px;
    font-weight:700;font-size:.82rem;
    text-decoration:none!important;
    transition:.25s;border:none;cursor:pointer;
    background:#fff;color:var(--bk-emerald);
    box-shadow:0 8px 20px rgba(0,0,0,.15);
    position:relative;overflow:hidden;
    font-family:inherit;
    position:relative;z-index:2;
}
.xuBtnAdd::before{
    content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;
    background:linear-gradient(100deg,transparent 20%,rgba(5,150,105,.15) 50%,transparent 80%);
    transition:left .6s ease;
}
.xuBtnAdd:hover{transform:translateY(-2px);filter:brightness(1.05);color:var(--bk-emerald)}
.xuBtnAdd:hover::before{left:120%}
.xuBtnAdd img{width:16px;height:16px;flex-shrink:0}

/* ===== STAT CHIPS ===== */
.xuStatRow{display:flex;flex-wrap:wrap;gap:10px;padding:20px 24px 0}

.xuStatChip{
    display:inline-flex;align-items:center;gap:9px;
    padding:9px 16px;border-radius:12px;
    background:linear-gradient(135deg,rgba(5,150,105,.06),rgba(245,158,11,.03));
    border:1.5px solid rgba(5,150,105,.2);
    font-size:.82rem;font-weight:700;
    color:var(--bk-muted);
    transition:.25s;
}
.xuStatChip:hover{border-color:rgba(5,150,105,.4);transform:translateY(-1px);box-shadow:0 6px 14px rgba(5,150,105,.1)}
.xuStatChip b{
    font-family:'JetBrains Mono',monospace;
    color:var(--bk-ink);font-size:.98rem;
    font-weight:800;letter-spacing:-.01em;
}
.xuStatChip i{
    color:var(--bk-emerald);
    width:26px;height:26px;border-radius:8px;
    background:linear-gradient(135deg,rgba(5,150,105,.12),rgba(245,158,11,.08));
    display:inline-flex;align-items:center;justify-content:center;
    font-size:.72rem;
}
html.xu-dark .xuStatChip{background:linear-gradient(135deg,rgba(5,150,105,.12),rgba(245,158,11,.06));border-color:rgba(5,150,105,.3);color:var(--bk-soft)}
html.xu-dark .xuStatChip b{color:#f1f5f9}
html.xu-dark .xuStatChip i{color:var(--bk-mint);background:linear-gradient(135deg,rgba(5,150,105,.2),rgba(245,158,11,.12))}

/* ===== TABEL ===== */
.xuTableWrap{padding:20px 24px;overflow-x:auto}
.xuTable{width:100%;border-collapse:separate;border-spacing:0}

.xuTable thead th{
    background:linear-gradient(180deg,rgba(5,150,105,.08),rgba(5,150,105,.03));
    color:var(--bk-emerald);
    font-weight:800;font-size:.72rem;
    text-transform:uppercase;letter-spacing:.08em;
    padding:14px 16px;border:none;
    border-bottom:1.5px solid rgba(5,150,105,.2);
    white-space:nowrap;text-align:left;
}
html.xu-dark .xuTable thead th{
    background:linear-gradient(180deg,rgba(5,150,105,.15),rgba(5,150,105,.06));
    color:var(--bk-mint);border-bottom-color:rgba(5,150,105,.35);
}

.xuTable tbody td{
    padding:14px 16px;
    border-bottom:1px solid #f1f3f8;
    color:var(--bk-muted);font-size:.88rem;
    vertical-align:middle;
}
html.xu-dark .xuTable tbody td{border-bottom-color:rgba(5,150,105,.1);color:#cbd5e1}

.xuTable tbody tr{transition:.2s}
.xuTable tbody tr:hover{background:rgba(5,150,105,.05)}
.xuTable tbody tr:hover td:first-child{box-shadow:inset 4px 0 0 var(--bk-emerald)}
html.xu-dark .xuTable tbody tr:hover{background:rgba(5,150,105,.1)}
html.xu-dark .xuTable tbody tr:hover td:first-child{box-shadow:inset 4px 0 0 var(--bk-gold)}

/* No. badge */
.xuNo{
    display:inline-flex;align-items:center;justify-content:center;
    width:32px;height:32px;border-radius:10px;
    background:rgba(5,150,105,.1);
    border:1px solid rgba(5,150,105,.2);
    color:var(--bk-emerald);
    font-family:'JetBrains Mono',monospace;
    font-weight:700;font-size:.82rem;
}
html.xu-dark .xuNo{color:var(--bk-mint);background:rgba(5,150,105,.15);border-color:rgba(5,150,105,.35)}

/* Executor dengan avatar */
.xuExec{
    font-family:'Neuton',Georgia,serif;
    font-weight:700;color:var(--bk-ink);
    display:inline-flex;align-items:center;gap:10px;
    font-size:.98rem;
}
html.xu-dark .xuExec{color:#f1f5f9}

.xuExecAvatar{
    width:34px;height:34px;border-radius:50%;
    background:linear-gradient(135deg,var(--bk-emerald),var(--bk-gold));
    color:#fff;font-weight:800;font-size:.82rem;
    display:inline-flex;align-items:center;justify-content:center;
    flex-shrink:0;
    box-shadow:0 6px 14px rgba(5,150,105,.3);
    font-family:'Neuton',Georgia,serif;
    border:2px solid rgba(255,255,255,.25);
    transition:.3s;
}
.xuTable tbody tr:hover .xuExecAvatar{transform:scale(1.1) rotate(-6deg);box-shadow:0 10px 22px rgba(245,158,11,.4)}

/* Time mono */
.xuTime{
    color:var(--bk-muted);
    font-family:'JetBrains Mono',monospace;
    font-size:.82rem;font-weight:600;
    white-space:nowrap;
    display:inline-flex;align-items:center;gap:6px;
}
.xuTime i{color:var(--bk-gold);font-size:.78rem}
html.xu-dark .xuTime{color:var(--bk-soft)}

/* Path mono dengan badge */
.xuPath{
    font-family:'JetBrains Mono',monospace;
    font-weight:600;color:var(--bk-ink);
    background:rgba(5,150,105,.05);
    border:1px solid rgba(5,150,105,.18);
    border-radius:8px;
    padding:5px 11px;font-size:.78rem;
    display:inline-block;
    max-width:340px;
    overflow:hidden;text-overflow:ellipsis;white-space:nowrap;
    vertical-align:middle;
}
html.xu-dark .xuPath{color:#e2e8f0;background:rgba(5,150,105,.1);border-color:rgba(5,150,105,.3)}

/* Status badges */
.xuStatus{
    display:inline-flex;align-items:center;gap:6px;
    margin-left:8px;font-size:.7rem;font-weight:800;
    padding:3px 10px;border-radius:999px;
    letter-spacing:.03em;
    vertical-align:middle;
}
.xuStatusOk{
    color:var(--bk-emerald);
    background:rgba(16,185,129,.12);
    border:1px solid rgba(16,185,129,.3);
}
.xuStatusNo{
    color:#b91c1c;
    background:rgba(239,68,68,.12);
    border:1px solid rgba(239,68,68,.3);
}
html.xu-dark .xuStatusOk{color:var(--bk-mint);background:rgba(16,185,129,.18);border-color:rgba(16,185,129,.4)}
html.xu-dark .xuStatusNo{color:#fca5a5;background:rgba(239,68,68,.15);border-color:rgba(239,68,68,.4)}

/* Download button */
.xuDl{
    display:inline-flex;align-items:center;gap:8px;
    padding:8px 15px;border-radius:10px;
    background:linear-gradient(90deg,var(--bk-emerald),var(--bk-gold));
    color:#fff!important;text-decoration:none!important;
    font-weight:800;font-size:.8rem;
    transition:.25s;
    box-shadow:0 6px 16px rgba(5,150,105,.3);
    white-space:nowrap;
    font-family:'JetBrains Mono',monospace;
    position:relative;overflow:hidden;
}
.xuDl::before{
    content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;
    background:linear-gradient(100deg,transparent 20%,rgba(255,255,255,.25) 50%,transparent 80%);
    transition:left .6s ease;
}
.xuDl:hover{transform:translateY(-2px);filter:brightness(1.1);color:#fff!important;box-shadow:0 10px 22px rgba(5,150,105,.4)}
.xuDl:hover::before{left:120%}
.xuDl i{font-size:.85rem}

/* Empty state */
.xuEmptyRow td{
    text-align:center;padding:50px 20px!important;
    color:var(--bk-soft)!important;font-size:.92rem;font-weight:600;
    background:linear-gradient(135deg,rgba(5,150,105,.04),rgba(245,158,11,.02))!important;
}
.xuEmptyRow i{font-size:2.2rem;color:var(--bk-emerald);display:block;margin-bottom:10px}

/* ===== DATATABLES ===== */
.dataTables_wrapper .dataTables_filter input,
.dataTables_wrapper .dataTables_length select{
    border:1.5px solid #cbd5e1;border-radius:10px;
    padding:7px 12px;outline:none;transition:.2s;
    background:#f8fafc;color:var(--bk-ink);
    font-family:inherit;font-size:.85rem;
}
.dataTables_wrapper .dataTables_filter input:focus,
.dataTables_wrapper .dataTables_length select:focus{
    border-color:var(--bk-emerald);
    box-shadow:0 0 0 3px rgba(5,150,105,.12);
    background:#fff;
}
html.xu-dark .dataTables_wrapper .dataTables_filter input,
html.xu-dark .dataTables_wrapper .dataTables_length select{
    background:rgba(255,255,255,.05);border-color:rgba(5,150,105,.25);color:#f1f5f9;
}
html.xu-dark .dataTables_wrapper .dataTables_filter input:focus,
html.xu-dark .dataTables_wrapper .dataTables_length select:focus{
    border-color:var(--bk-gold);box-shadow:0 0 0 3px rgba(245,158,11,.15);
}

.dataTables_wrapper .dataTables_info{color:var(--bk-muted);font-size:.82rem;padding-top:14px;font-weight:500}
html.xu-dark .dataTables_wrapper .dataTables_info{color:var(--bk-soft)}
.dataTables_wrapper .dataTables_length label,
.dataTables_wrapper .dataTables_filter label{color:var(--bk-ink);font-weight:700;font-size:.85rem}
html.xu-dark .dataTables_wrapper .dataTables_length label,
html.xu-dark .dataTables_wrapper .dataTables_filter label{color:#e2e8f0}

.dataTables_wrapper .dataTables_paginate .paginate_button{
    color:var(--bk-muted)!important;
    border:1px solid transparent!important;
    border-radius:8px!important;margin:0 2px;transition:.2s;
}
.dataTables_wrapper .dataTables_paginate .paginate_button.current{
    background:linear-gradient(90deg,var(--bk-emerald),var(--bk-gold))!important;
    color:#fff!important;border:none!important;
    box-shadow:0 6px 14px rgba(5,150,105,.3)!important;
}
.dataTables_wrapper .dataTables_paginate .paginate_button:hover:not(.current):not(.disabled){
    background:rgba(5,150,105,.1)!important;color:var(--bk-emerald)!important;
    border-color:rgba(5,150,105,.25)!important;
}
.dataTables_wrapper .dataTables_paginate .paginate_button.disabled{opacity:.4;cursor:not-allowed}
html.xu-dark .dataTables_wrapper .dataTables_paginate .paginate_button{color:var(--bk-soft)!important}
html.xu-dark .dataTables_wrapper .dataTables_paginate .paginate_button:hover:not(.current):not(.disabled){
    background:rgba(5,150,105,.15)!important;color:var(--bk-mint)!important;
    border-color:rgba(5,150,105,.35)!important;
}

@media(max-width:720px){
    .xuBkHead{padding:18px 20px;flex-direction:column;align-items:flex-start}
    .xuBkHead h2{font-size:1.15rem}
    .xuBtnAdd{width:100%;justify-content:center}
    .xuTableWrap{padding:16px}
    .xuTable thead th,.xuTable tbody td{padding:10px 12px;font-size:.82rem}
    .xuPath{max-width:180px}
    .xuStatRow{padding:14px 16px 0}
}
</style>

<?php
$__bkCount = 0; $__bkBytes = 0;
foreach ($list_backup as $__b) {
    $__bkCount++;
    if (file_exists($__b->backup_file)) { $__bkBytes += filesize($__b->backup_file); }
}
?>

<div class="xuBkCard xuR">
    <div class="xuBkHead">
        <h2><i class="fa fa-database"></i> Backup Data</h2>
        <button class="xuBtnAdd" onclick="moveTo('<?= base_url('sistem/backups/add') ?>')">
            <img src="<?= base_url('assets/custom/images/backup-solid.svg'); ?>" alt=""> Add New Backup
        </button>
    </div>

    <!-- Ringkasan backup -->
    <div class="xuStatRow">
        <span class="xuStatChip">
            <i class="fa fa-archive"></i> Total Backup: <b><?= $__bkCount ?></b>
        </span>
        <span class="xuStatChip">
            <i class="fa fa-hdd-o"></i> Total Ukuran: <b><?= formatSizeUnits($__bkBytes) ?></b>
        </span>
    </div>

    <div class="xuTableWrap">
        <table class="table xuTable responsive" id="xuDataTable" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th style="width:60px">No.</th>
                    <th>Backup Executor</th>
                    <th style="width:180px">Backup Time</th>
                    <th>Backup File Location</th>
                    <th style="width:150px;text-align:center">File Size</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($list_backup)): ?>
                    <tr class="xuEmptyRow">
                        <td colspan="5">
                            <i class="fa fa-database"></i>
                            <b>Belum ada backup.</b><br>
                            <small>Klik "Add New Backup" untuk membuat cadangan pertama.</small>
                        </td>
                    </tr>
                <?php else:
                    $i = 1;
                    foreach ($list_backup as $key => $val):
                        $file_size = 0;
                        $file_path = $val->backup_file;
                        if (file_exists($file_path)) { $file_size = filesize($file_path); }
                ?>
                    <tr>
                        <td><span class="xuNo"><?= $i++; ?></span></td>
                        <td>
                            <span class="xuExec">
                                <span class="xuExecAvatar"><?= esc(strtoupper(substr(trim($val->realname), 0, 1))) ?></span>
                                <?= esc($val->realname); ?>
                            </span>
                        </td>
                        <td><span class="xuTime"><i class="fa fa-clock-o"></i> <?= esc($val->backup_time); ?></span></td>
                        <td>
                            <span class="xuPath" title="<?= esc($val->backup_file); ?>"><?= esc($val->backup_file); ?></span>
                            <?php if (file_exists($file_path)) : ?>
                                <span class="xuStatus xuStatusOk"><i class="fa fa-check-circle"></i> Tersedia</span>
                            <?php else : ?>
                                <span class="xuStatus xuStatusNo"><i class="fa fa-exclamation-triangle"></i> Berkas hilang</span>
                            <?php endif; ?>
                        </td>
                        <td style="text-align:center">
                            <?php if (file_exists($file_path)) : ?>
                                <a href="<?= base_url("sistem/backups/download/{$val->backup_log_id}") ?>" class="xuDl" title="Unduh berkas backup">
                                    <i class="fa fa-download"></i> <?= formatSizeUnits($file_size); ?>
                                </a>
                            <?php else : ?>
                                <span style="color:var(--bk-soft);font-size:.78rem;font-style:italic">—</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; endif; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function(){
    var io = new IntersectionObserver(function(es){
        es.forEach(function(en){
            if (en.isIntersecting){ en.target.classList.add('in'); io.unobserve(en.target); }
        });
    }, {threshold:.06});
    document.querySelectorAll('.xuR').forEach(function(el){ io.observe(el); });

    if ($.fn.DataTable){
        var tbl = $('#xuDataTable');
        if ($.fn.dataTable.isDataTable && $.fn.dataTable.isDataTable(tbl)){ tbl.DataTable().destroy(); }
        tbl.DataTable({
            language:{
                search:"Cari:",
                lengthMenu:"Tampilkan _MENU_ backup",
                info:"Menampilkan _START_ - _END_ dari _TOTAL_ backup",
                infoEmpty:"Tidak ada data",
                emptyTable:"Belum ada backup",
                zeroRecords:"Tidak ditemukan hasil yang cocok",
                paginate:{previous:"‹",next:"›"}
            },
            pageLength:10,
            order:[[0,'desc']],
            columnDefs:[
                {orderable:true, targets:[0,1,2]},
                {orderable:false, targets:[3,4]}
            ]
        });
    }
});
</script>