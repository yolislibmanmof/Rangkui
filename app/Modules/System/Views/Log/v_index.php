<style>
/* ================================================================
   DIFOSS SYSTEM LOGS — EMERALD FOREST EDITION
   ================================================================ */
:root{
    --lg-emerald:#059669; --lg-teal:#0891b2; --lg-gold:#f59e0b;
    --lg-mint:#6ee7b7; --lg-deep:#0a2920;
    --lg-ink:#0f172a; --lg-muted:#64748b; --lg-soft:#94a3b8;
    --lg-danger:#dc2626;
    --lg-amber:#d97706;
}

.xuR{opacity:0;transform:translateY(24px);transition:all .6s cubic-bezier(.2,.8,.2,1)}
.xuR.in{opacity:1;transform:none}

/* ===== KARTU ===== */
.xuLogCard{
    background:#fff;border-radius:22px;
    box-shadow:0 16px 44px rgba(15,23,42,.1);
    overflow:hidden;
    border:1px solid rgba(5,150,105,.12);
    margin-bottom:24px;
    transition:.35s cubic-bezier(.2,.8,.2,1);
}
.xuLogCard:hover{box-shadow:0 22px 54px rgba(5,150,105,.14);border-color:rgba(5,150,105,.22)}
html.xu-dark .xuLogCard{background:#0f1e1f;border-color:rgba(5,150,105,.22);box-shadow:0 16px 44px rgba(0,0,0,.4)}

/* ===== HEADER ===== */
.xuLogHead{
    padding:22px 28px;
    background:linear-gradient(90deg,var(--lg-emerald),var(--lg-teal),var(--lg-gold),var(--lg-emerald));
    background-size:200% 100%;
    color:#fff;
    display:flex;align-items:center;justify-content:space-between;
    flex-wrap:wrap;gap:14px;
    animation:xuLgGrad 7s linear infinite;
    position:relative;overflow:hidden;
}
.xuLogHead::after{
    content:'';position:absolute;top:-60%;right:-8%;
    width:320px;height:320px;border-radius:50%;
    background:radial-gradient(circle,rgba(245,158,11,.25),transparent 70%);
    pointer-events:none;
}
@keyframes xuLgGrad{to{background-position:200% 0}}

.xuLogHead h2{
    margin:0;font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1.3rem;
    display:flex;align-items:center;gap:12px;
    color:#fff;letter-spacing:-.01em;
    position:relative;z-index:2;
}
.xuLogHead h2 i{
    width:42px;height:42px;border-radius:13px;
    background:rgba(255,255,255,.18);
    backdrop-filter:blur(8px);-webkit-backdrop-filter:blur(8px);
    display:inline-flex;align-items:center;justify-content:center;
    font-size:1.15rem;
    box-shadow:inset 0 1px 0 rgba(255,255,255,.2);
    animation:lgPulse 3s ease-in-out infinite;
}
@keyframes lgPulse{
    0%,100%{box-shadow:inset 0 1px 0 rgba(255,255,255,.2), 0 0 0 0 rgba(245,158,11,.4)}
    50%{box-shadow:inset 0 1px 0 rgba(255,255,255,.2), 0 0 0 8px rgba(245,158,11,0)}
}

/* Tombol aksi */
.xuLogActions{display:flex;gap:10px;flex-wrap:wrap;position:relative;z-index:2}

.xuBtnLog{
    display:inline-flex;align-items:center;gap:8px;
    padding:9px 18px;border-radius:12px;
    font-weight:700;font-size:.82rem;
    border:none;cursor:pointer;transition:.25s;
    color:#fff!important;
    font-family:inherit;
    position:relative;overflow:hidden;
    letter-spacing:.02em;
}
.xuBtnLog::before{
    content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;
    background:linear-gradient(100deg,transparent 20%,rgba(255,255,255,.28) 50%,transparent 80%);
    transition:left .6s ease;
}
.xuBtnLog:hover{transform:translateY(-2px);filter:brightness(1.12);color:#fff!important}
.xuBtnLog:hover::before{left:120%}
.xuBtnLog i{font-size:.9rem}

.xuBtnWipe{
    background:linear-gradient(90deg,#ef4444,#dc2626);
    box-shadow:0 8px 20px rgba(239,68,68,.35);
}
.xuBtnWipe:hover{box-shadow:0 12px 26px rgba(239,68,68,.45)}

.xuBtnDump{
    background:linear-gradient(90deg,var(--lg-emerald),var(--lg-gold));
    box-shadow:0 8px 20px rgba(5,150,105,.35);
}
.xuBtnDump:hover{box-shadow:0 12px 26px rgba(5,150,105,.45)}

/* ===== STAT CHIPS ===== */
.xuStatRow{display:flex;flex-wrap:wrap;gap:10px;padding:20px 24px 0}

.xuStatChip{
    display:inline-flex;align-items:center;gap:10px;
    padding:10px 16px;border-radius:12px;
    background:linear-gradient(135deg,rgba(5,150,105,.05),rgba(245,158,11,.02));
    border:1.5px solid rgba(5,150,105,.2);
    font-size:.82rem;font-weight:700;
    color:var(--lg-muted);
    transition:.25s;
    font-family:inherit;
}
.xuStatChip:hover{border-color:rgba(5,150,105,.4);transform:translateY(-1px);box-shadow:0 6px 14px rgba(5,150,105,.1)}
.xuStatChip b{
    font-family:'JetBrains Mono',monospace;
    color:var(--lg-ink);font-size:1rem;
    font-weight:800;letter-spacing:-.01em;
    font-variant-numeric:tabular-nums;
}
.xuStatChip .dot{
    width:12px;height:12px;border-radius:50%;
    background:var(--c);
    flex-shrink:0;
    box-shadow:0 0 0 3px rgba(5,150,105,.08), 0 0 8px var(--c);
    animation:dotGlow 2.5s ease-in-out infinite;
}
@keyframes dotGlow{
    0%,100%{box-shadow:0 0 0 3px rgba(5,150,105,.08), 0 0 8px var(--c)}
    50%{box-shadow:0 0 0 5px rgba(5,150,105,.04), 0 0 14px var(--c)}
}
html.xu-dark .xuStatChip{
    background:linear-gradient(135deg,rgba(5,150,105,.1),rgba(245,158,11,.04));
    border-color:rgba(5,150,105,.3);color:var(--lg-soft);
}
html.xu-dark .xuStatChip b{color:#f1f5f9}

/* ===== TABEL ===== */
.xuTableWrap{padding:22px 26px;overflow-x:auto}
.xuTable{width:100%;border-collapse:separate;border-spacing:0}

.xuTable thead th{
    background:linear-gradient(180deg,rgba(5,150,105,.08),rgba(5,150,105,.03));
    color:var(--lg-emerald);
    font-weight:800;font-size:.72rem;
    text-transform:uppercase;letter-spacing:.08em;
    padding:14px 16px;border:none;
    border-bottom:1.5px solid rgba(5,150,105,.2);
    white-space:nowrap;text-align:left;
}
html.xu-dark .xuTable thead th{
    background:linear-gradient(180deg,rgba(5,150,105,.15),rgba(5,150,105,.06));
    color:var(--lg-mint);border-bottom-color:rgba(5,150,105,.35);
}

.xuTable tbody td{
    padding:13px 16px;
    border-bottom:1px solid #f1f3f8;
    color:var(--lg-muted);font-size:.88rem;
    vertical-align:top;
}
html.xu-dark .xuTable tbody td{border-bottom-color:rgba(5,150,105,.1);color:#cbd5e1}

.xuTable tbody tr{transition:.2s}
.xuTable tbody tr:hover{background:rgba(5,150,105,.04)}
html.xu-dark .xuTable tbody tr:hover{background:rgba(5,150,105,.08)}

/* ===== ROW LEVELS ===== */
tr.xuLogErr{background:rgba(220,38,38,.06)}
tr.xuLogErr td:first-child{box-shadow:inset 4px 0 0 var(--lg-danger)}
tr.xuLogErr:hover{background:rgba(220,38,38,.1)}

tr.xuLogWarn{background:rgba(217,119,6,.06)}
tr.xuLogWarn td:first-child{box-shadow:inset 4px 0 0 var(--lg-amber)}
tr.xuLogWarn:hover{background:rgba(217,119,6,.1)}

tr.xuLogOk{background:rgba(5,150,105,.05)}
tr.xuLogOk td:first-child{box-shadow:inset 4px 0 0 var(--lg-emerald)}
tr.xuLogOk:hover{background:rgba(5,150,105,.1)}

html.xu-dark tr.xuLogErr{background:rgba(220,38,38,.12)}
html.xu-dark tr.xuLogErr:hover{background:rgba(220,38,38,.18)}
html.xu-dark tr.xuLogWarn{background:rgba(217,119,6,.1)}
html.xu-dark tr.xuLogWarn:hover{background:rgba(217,119,6,.15)}
html.xu-dark tr.xuLogOk{background:rgba(5,150,105,.1)}
html.xu-dark tr.xuLogOk:hover{background:rgba(5,150,105,.15)}

/* ===== CELL STYLING ===== */
.xuNo{
    display:inline-flex;align-items:center;justify-content:center;
    width:32px;height:32px;border-radius:10px;
    background:rgba(5,150,105,.1);
    border:1px solid rgba(5,150,105,.2);
    color:var(--lg-emerald);
    font-family:'JetBrains Mono',monospace;
    font-weight:700;font-size:.82rem;
}
tr.xuLogErr .xuNo{background:rgba(220,38,38,.12);color:var(--lg-danger);border-color:rgba(220,38,38,.3)}
tr.xuLogWarn .xuNo{background:rgba(217,119,6,.12);color:var(--lg-amber);border-color:rgba(217,119,6,.3)}
tr.xuLogOk .xuNo{background:rgba(5,150,105,.12);color:var(--lg-emerald);border-color:rgba(5,150,105,.3)}
html.xu-dark .xuNo{background:rgba(5,150,105,.15);border-color:rgba(5,150,105,.35)}
html.xu-dark tr.xuLogErr .xuNo{background:rgba(220,38,38,.18);border-color:rgba(220,38,38,.4)}
html.xu-dark tr.xuLogWarn .xuNo{background:rgba(217,119,6,.18);border-color:rgba(217,119,6,.4)}

.xuLoc{
    font-family:'JetBrains Mono',monospace;
    font-weight:800;color:var(--lg-ink);
    background:rgba(5,150,105,.06);
    border:1px solid rgba(5,150,105,.2);
    padding:5px 11px;border-radius:8px;
    font-size:.78rem;letter-spacing:.02em;
    display:inline-flex;align-items:center;gap:5px;
    word-break:break-word;
}
.xuLoc::before{content:'⌘';color:var(--lg-gold);font-weight:900}
html.xu-dark .xuLoc{color:#e2e8f0;background:rgba(5,150,105,.1);border-color:rgba(5,150,105,.3)}

.xuTime{
    color:var(--lg-muted);
    font-family:'JetBrains Mono',monospace;
    font-size:.8rem;font-weight:600;
    white-space:nowrap;
    display:inline-flex;align-items:center;gap:6px;
}
.xuTime i{color:var(--lg-gold);font-size:.78rem}
html.xu-dark .xuTime{color:var(--lg-soft)}

.xuMsg{
    font-family:'JetBrains Mono',monospace;
    font-size:.82rem;color:var(--lg-ink);
    background:#f8fafc;
    border:1px solid #eef2f7;
    border-radius:8px;
    padding:7px 11px;
    display:inline-block;
    max-width:100%;
    word-break:break-word;
    line-height:1.5;
}
html.xu-dark .xuMsg{background:rgba(255,255,255,.03);border-color:rgba(5,150,105,.15);color:#e2e8f0}

tr.xuLogErr .xuMsg{
    color:#991b1b;background:#fef2f2;
    border-color:#fecaca;font-weight:600;
}
html.xu-dark tr.xuLogErr .xuMsg{color:#fca5a5;background:rgba(220,38,38,.12);border-color:rgba(220,38,38,.3)}

tr.xuLogWarn .xuMsg{
    color:#92400e;background:#fffbeb;
    border-color:#fde68a;font-weight:600;
}
html.xu-dark tr.xuLogWarn .xuMsg{color:#fcd34d;background:rgba(217,119,6,.12);border-color:rgba(217,119,6,.3)}

tr.xuLogOk .xuMsg{
    color:#065f46;background:#ecfdf5;
    border-color:#a7f3d0;font-weight:600;
}
html.xu-dark tr.xuLogOk .xuMsg{color:var(--lg-mint);background:rgba(5,150,105,.12);border-color:rgba(5,150,105,.3)}

/* Empty state */
.xuEmptyRow td{
    text-align:center;padding:50px 20px!important;
    color:var(--lg-soft)!important;font-size:.92rem;font-weight:600;
    background:linear-gradient(135deg,rgba(5,150,105,.04),rgba(245,158,11,.02))!important;
}
.xuEmptyRow i{font-size:2.2rem;color:var(--lg-emerald);display:block;margin-bottom:10px}

/* ===== DATATABLES ===== */
.dataTables_wrapper .dataTables_filter input,
.dataTables_wrapper .dataTables_length select{
    border:1.5px solid #cbd5e1;border-radius:10px;
    padding:7px 12px;outline:none;transition:.2s;
    background:#f8fafc;color:var(--lg-ink);
    font-family:inherit;font-size:.85rem;
}
.dataTables_wrapper .dataTables_filter input:focus,
.dataTables_wrapper .dataTables_length select:focus{
    border-color:var(--lg-emerald);
    box-shadow:0 0 0 3px rgba(5,150,105,.12);
    background:#fff;
}
html.xu-dark .dataTables_wrapper .dataTables_filter input,
html.xu-dark .dataTables_wrapper .dataTables_length select{
    background:rgba(255,255,255,.05);border-color:rgba(5,150,105,.25);color:#f1f5f9;
}
html.xu-dark .dataTables_wrapper .dataTables_filter input:focus,
html.xu-dark .dataTables_wrapper .dataTables_length select:focus{
    border-color:var(--lg-gold);box-shadow:0 0 0 3px rgba(245,158,11,.15);
}

.dataTables_wrapper .dataTables_info{color:var(--lg-muted);font-size:.82rem;padding-top:14px;font-weight:500}
html.xu-dark .dataTables_wrapper .dataTables_info{color:var(--lg-soft)}
.dataTables_wrapper .dataTables_length label,
.dataTables_wrapper .dataTables_filter label{color:var(--lg-ink);font-weight:700;font-size:.85rem}
html.xu-dark .dataTables_wrapper .dataTables_length label,
html.xu-dark .dataTables_wrapper .dataTables_filter label{color:#e2e8f0}

.dataTables_wrapper .dataTables_paginate .paginate_button{
    color:var(--lg-muted)!important;
    border:1px solid transparent!important;
    border-radius:8px!important;margin:0 2px;transition:.2s;
}
.dataTables_wrapper .dataTables_paginate .paginate_button.current{
    background:linear-gradient(90deg,var(--lg-emerald),var(--lg-gold))!important;
    color:#fff!important;border:none!important;
    box-shadow:0 6px 14px rgba(5,150,105,.3)!important;
}
.dataTables_wrapper .dataTables_paginate .paginate_button:hover:not(.current):not(.disabled){
    background:rgba(5,150,105,.1)!important;color:var(--lg-emerald)!important;
    border-color:rgba(5,150,105,.25)!important;
}
.dataTables_wrapper .dataTables_paginate .paginate_button.disabled{opacity:.4;cursor:not-allowed}
html.xu-dark .dataTables_wrapper .dataTables_paginate .paginate_button{color:var(--lg-soft)!important}
html.xu-dark .dataTables_wrapper .dataTables_paginate .paginate_button:hover:not(.current):not(.disabled){
    background:rgba(5,150,105,.15)!important;color:var(--lg-mint)!important;
    border-color:rgba(5,150,105,.35)!important;
}

@media(max-width:720px){
    .xuLogHead{padding:18px 20px;flex-direction:column;align-items:flex-start}
    .xuLogHead h2{font-size:1.15rem}
    .xuLogActions{width:100%;flex-direction:column}
    .xuBtnLog{width:100%;justify-content:center}
    .xuStatRow{padding:14px 16px 0;gap:8px}
    .xuStatChip{flex:1;min-width:120px;padding:8px 12px;font-size:.76rem;justify-content:center}
    .xuTableWrap{padding:16px}
    .xuTable thead th,.xuTable tbody td{padding:10px 12px;font-size:.8rem}
    .xuLoc{font-size:.72rem}
    .xuMsg{font-size:.76rem;padding:5px 8px}
}
</style>

<?php
$__cnt = ['err' => 0, 'warn' => 0, 'ok' => 0, 'all' => 0];
foreach ($list_logs as $__l) {
    $__m = strtoupper($__l->log_msg);
    $__cnt['all']++;
    if (strpos($__m, 'ERROR') !== false || strpos($__m, 'CRITICAL') !== false) { $__cnt['err']++; }
    elseif (strpos($__m, 'WARN') !== false) { $__cnt['warn']++; }
    elseif (strpos($__m, 'SUCCESS') !== false || strpos($__m, 'INFO') !== false) { $__cnt['ok']++; }
}
?>

<div class="xuLogCard xuR">
    <div class="xuLogHead">
        <h2><i class="fa fa-terminal"></i> Catatan Sistem</h2>
        <div class="xuLogActions">
            <button class="xuBtnLog xuBtnDump" onclick="moveTo('<?= base_url('sistem/logs/save') ?>')">
                <i class="fa fa-download"></i> Simpan Catatan ke Dalam Berkas
            </button>
            <button class="xuBtnLog xuBtnWipe" onclick="moveTo('<?= base_url('sistem/logs/delete') ?>', 'Are you sure, want to empty system log ?' )">
                <i class="fa fa-trash"></i> Hapus Catatan
            </button>
        </div>
    </div>

    <!-- Ringkasan level log -->
    <div class="xuStatRow">
        <span class="xuStatChip" style="--c:#0891b2"><span class="dot"></span> Total: <b><?= number_format($__cnt['all'],0,',','.') ?></b></span>
        <span class="xuStatChip" style="--c:#dc2626"><span class="dot"></span> Error: <b><?= number_format($__cnt['err'],0,',','.') ?></b></span>
        <span class="xuStatChip" style="--c:#d97706"><span class="dot"></span> Warning: <b><?= number_format($__cnt['warn'],0,',','.') ?></b></span>
        <span class="xuStatChip" style="--c:#059669"><span class="dot"></span> Info/Success: <b><?= number_format($__cnt['ok'],0,',','.') ?></b></span>
    </div>

    <div class="xuTableWrap">
        <table class="table xuTable responsive" id="xuDataTable" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th style="width:60px">No</th>
                    <th style="width:200px">Lokasi</th>
                    <th style="width:170px">Waktu</th>
                    <th>Pesan</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($list_logs)): ?>
                    <tr class="xuEmptyRow">
                        <td colspan="4">
                            <i class="fa fa-terminal"></i>
                            <b>Tidak ada catatan sistem.</b><br>
                            <small>Sistem belum mencatat aktivitas apa pun.</small>
                        </td>
                    </tr>
                <?php else:
                    $i = 1;
                    foreach ($list_logs as $key => $val):
                        $__up = strtoupper($val->log_msg);
                        if (strpos($__up, 'ERROR') !== false || strpos($__up, 'CRITICAL') !== false) { $__rc = 'xuLogErr'; }
                        elseif (strpos($__up, 'WARN') !== false) { $__rc = 'xuLogWarn'; }
                        elseif (strpos($__up, 'SUCCESS') !== false || strpos($__up, 'INFO') !== false) { $__rc = 'xuLogOk'; }
                        else { $__rc = ''; }
                ?>
                    <tr class="<?= $__rc ?>">
                        <td><span class="xuNo"><?= $i++; ?></span></td>
                        <td><span class="xuLoc"><?= esc($val->log_location); ?></span></td>
                        <td><span class="xuTime"><i class="fa fa-clock-o"></i> <?= date("Y-m-d H:i:s", strtotime($val->log_date)); ?></span></td>
                        <td><span class="xuMsg"><?= esc($val->log_msg); ?></span></td>
                    </tr>
                <?php endforeach; endif; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function(){
    // ===== Fade-in reveal =====
    var io = new IntersectionObserver(function(es){
        es.forEach(function(en){
            if (en.isIntersecting){ en.target.classList.add('in'); io.unobserve(en.target); }
        });
    }, {threshold:.06});
    document.querySelectorAll('.xuR').forEach(function(el){ io.observe(el); });

    // ===== DataTables =====
    if ($.fn.DataTable){
        var tbl = $('#xuDataTable');
        if ($.fn.dataTable.isDataTable && $.fn.dataTable.isDataTable(tbl)){ tbl.DataTable().destroy(); }
        tbl.DataTable({
            language:{
                search:"Cari:",lengthMenu:"Tampilkan _MENU_ catatan",
                info:"Menampilkan _START_ - _END_ dari _TOTAL_ catatan",
                infoEmpty:"Tidak ada data",emptyTable:"Tidak ada catatan sistem",
                zeroRecords:"Tidak ditemukan hasil yang cocok",
                paginate:{previous:"‹",next:"›"}
            },
            pageLength:25,order:[[0,'desc']],
            columnDefs:[
                {orderable:true, targets:[0,1,2]},
                {orderable:false, targets:[3]}
            ]
        });
    }
});
</script>