<style>
/* ================================================================
   DIFOSS DOWNLOAD COUNTER — EMERALD FOREST EDITION
   ================================================================ */
:root{
    --dc-emerald:#059669; --dc-teal:#0891b2; --dc-gold:#f59e0b;
    --dc-mint:#6ee7b7; --dc-deep:#0a2920;
    --dc-ink:#0f172a; --dc-muted:#64748b; --dc-soft:#94a3b8;
}

.xuR{opacity:0;transform:translateY(24px);transition:all .6s cubic-bezier(.2,.8,.2,1)}
.xuR.in{opacity:1;transform:none}

/* ===== KARTU ===== */
.xuRepCard{
    background:#fff;border-radius:22px;
    box-shadow:0 16px 44px rgba(15,23,42,.08);
    overflow:hidden;
    border:1px solid rgba(5,150,105,.12);
    margin-bottom:24px;
    transition:.35s cubic-bezier(.2,.8,.2,1);
}
.xuRepCard:hover{box-shadow:0 22px 54px rgba(5,150,105,.14);border-color:rgba(5,150,105,.22)}
html.xu-dark .xuRepCard{background:#0f1e1f;border-color:rgba(5,150,105,.22);box-shadow:0 16px 44px rgba(0,0,0,.4)}

/* ===== HEADER ===== */
.xuRepHead{
    padding:22px 28px;
    background:linear-gradient(90deg,var(--dc-emerald),var(--dc-teal),var(--dc-gold),var(--dc-emerald));
    background-size:200% 100%;
    color:#fff;
    display:flex;align-items:center;justify-content:space-between;
    flex-wrap:wrap;gap:14px;
    animation:xuDcGrad 7s linear infinite;
    position:relative;overflow:hidden;
}
.xuRepHead::after{
    content:'';position:absolute;top:-60%;right:-8%;
    width:320px;height:320px;border-radius:50%;
    background:radial-gradient(circle,rgba(245,158,11,.25),transparent 70%);
    pointer-events:none;
}
@keyframes xuDcGrad{to{background-position:200% 0}}

.xuRepHead h2{
    margin:0;font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1.3rem;
    display:flex;align-items:center;gap:12px;
    color:#fff;letter-spacing:-.01em;
    position:relative;z-index:2;
}
.xuRepHead h2 i{
    width:42px;height:42px;border-radius:13px;
    background:rgba(255,255,255,.18);
    backdrop-filter:blur(8px);-webkit-backdrop-filter:blur(8px);
    display:inline-flex;align-items:center;justify-content:center;
    font-size:1.15rem;
    box-shadow:inset 0 1px 0 rgba(255,255,255,.2);
}

/* ===== TOMBOL EXCEL ===== */
.xuBtnExcel{
    display:inline-flex;align-items:center;gap:8px;
    padding:9px 18px;border-radius:12px;
    font-weight:700;font-size:.82rem;
    text-decoration:none!important;
    transition:.25s;border:none;cursor:pointer;
    background:#fff;color:var(--dc-emerald);
    box-shadow:0 8px 20px rgba(0,0,0,.15);
    position:relative;overflow:hidden;
    font-family:inherit;
    position:relative;z-index:2;
}
.xuBtnExcel::before{
    content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;
    background:linear-gradient(100deg,transparent 20%,rgba(5,150,105,.15) 50%,transparent 80%);
    transition:left .6s ease;
}
.xuBtnExcel:hover{
    transform:translateY(-2px);
    filter:brightness(1.05);
    color:var(--dc-emerald);
    text-decoration:none;
}
.xuBtnExcel:hover::before{left:120%}
.xuBtnExcel i{color:#10b981;font-size:1rem}

/* ===== TABEL ===== */
.xuTableWrap{padding:22px 26px;overflow-x:auto}
.xuTable{width:100%;border-collapse:separate;border-spacing:0}

.xuTable thead th{
    background:linear-gradient(180deg,rgba(5,150,105,.08),rgba(5,150,105,.03));
    color:var(--dc-emerald);
    font-weight:800;font-size:.72rem;
    text-transform:uppercase;letter-spacing:.08em;
    padding:14px 16px;border:none;
    border-bottom:1.5px solid rgba(5,150,105,.2);
    white-space:nowrap;text-align:left;
}
html.xu-dark .xuTable thead th{
    background:linear-gradient(180deg,rgba(5,150,105,.15),rgba(5,150,105,.06));
    color:var(--dc-mint);border-bottom-color:rgba(5,150,105,.35);
}

.xuTable tbody td{
    padding:14px 16px;
    border-bottom:1px solid #f1f3f8;
    color:var(--dc-muted);font-size:.88rem;
    vertical-align:middle;
}
html.xu-dark .xuTable tbody td{border-bottom-color:rgba(5,150,105,.1);color:#cbd5e1}

.xuTable tbody tr{transition:.2s}
.xuTable tbody tr:hover{background:rgba(5,150,105,.05)}
.xuTable tbody tr:hover td:first-child{box-shadow:inset 4px 0 0 var(--dc-emerald)}
html.xu-dark .xuTable tbody tr:hover{background:rgba(5,150,105,.1)}
html.xu-dark .xuTable tbody tr:hover td:first-child{box-shadow:inset 4px 0 0 var(--dc-gold)}

/* Nomor urut */
.xuNo{
    display:inline-flex;align-items:center;justify-content:center;
    width:32px;height:32px;border-radius:10px;
    background:rgba(5,150,105,.1);
    border:1px solid rgba(5,150,105,.2);
    color:var(--dc-emerald);
    font-family:'JetBrains Mono',monospace;
    font-weight:700;font-size:.8rem;
}
html.xu-dark .xuNo{color:var(--dc-mint);background:rgba(5,150,105,.15);border-color:rgba(5,150,105,.35)}

/* Judul dokumen */
.xuTitle{
    font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1rem;
    color:var(--dc-ink);
    display:inline-flex;align-items:center;gap:9px;
    line-height:1.4;
}
html.xu-dark .xuTitle{color:#f1f5f9}
.xuTitle i{
    color:var(--dc-gold);
    width:30px;height:30px;border-radius:9px;
    background:linear-gradient(135deg,rgba(5,150,105,.12),rgba(245,158,11,.08));
    display:inline-flex;align-items:center;justify-content:center;
    font-size:.82rem;flex-shrink:0;
    border:1px solid rgba(5,150,105,.2);
}
html.xu-dark .xuTitle i{border-color:rgba(5,150,105,.35)}

/* ===== SUB-TABEL LAMPIRAN ===== */
.xuSubWrap{
    border:1px solid rgba(5,150,105,.18);
    border-radius:13px;overflow:hidden;
    background:#fff;
    box-shadow:0 4px 14px rgba(15,23,42,.04);
}
html.xu-dark .xuSubWrap{background:rgba(255,255,255,.03);border-color:rgba(5,150,105,.3)}

.xuSubTable{width:100%;border-collapse:collapse}
.xuSubTable thead th{
    background:linear-gradient(180deg,rgba(245,158,11,.1),rgba(245,158,11,.04));
    color:var(--dc-gold);
    font-size:.7rem;text-transform:uppercase;
    letter-spacing:.06em;padding:10px 14px;
    border:none;font-weight:800;
}
html.xu-dark .xuSubTable thead th{background:rgba(245,158,11,.12);color:#fde68a}

.xuSubTable tbody td{
    padding:10px 14px;
    border-top:1px solid #f1f3f8;
    font-size:.85rem;color:var(--dc-muted);
}
html.xu-dark .xuSubTable tbody td{border-top-color:rgba(5,150,105,.1);color:#cbd5e1}

/* Nama file */
.xuFile{
    font-family:'JetBrains Mono',monospace;
    font-weight:600;font-size:.82rem;
    color:var(--dc-ink);
    display:inline-flex;align-items:center;gap:7px;
    word-break:break-all;
}
html.xu-dark .xuFile{color:#e2e8f0}
.xuFile i{color:#ef4444;font-size:.95rem;flex-shrink:0}

/* Badge jumlah unduhan */
.xuCount{
    font-weight:800;padding:5px 12px;
    border-radius:999px;font-size:.74rem;
    white-space:nowrap;
    font-family:'JetBrains Mono',monospace;
    letter-spacing:.02em;
}
.xuCountOk{
    color:var(--dc-emerald);
    background:rgba(16,185,129,.12);
    border:1px solid rgba(16,185,129,.3);
}
.xuCountNo{
    color:#dc2626;
    background:rgba(239,68,68,.1);
    border:1px solid rgba(239,68,68,.3);
}
html.xu-dark .xuCountOk{color:var(--dc-mint);background:rgba(16,185,129,.18);border-color:rgba(16,185,129,.4)}
html.xu-dark .xuCountNo{color:#fca5a5;background:rgba(239,68,68,.15);border-color:rgba(239,68,68,.4)}

/* Empty state */
.xuEmptyRow td{
    text-align:center;padding:50px 20px!important;
    color:var(--dc-soft)!important;
    font-size:.92rem;font-weight:600;
    background:linear-gradient(135deg,rgba(5,150,105,.04),rgba(245,158,11,.02))!important;
}
.xuEmptyRow i{
    font-size:2.2rem;color:var(--dc-emerald);
    display:block;margin-bottom:10px;
}

/* ===== DATATABLES ===== */
.dataTables_wrapper .dataTables_filter input,
.dataTables_wrapper .dataTables_length select{
    border:1.5px solid #cbd5e1;border-radius:10px;
    padding:7px 12px;outline:none;transition:.2s;
    background:#f8fafc;color:var(--dc-ink);
    font-family:inherit;font-size:.85rem;
}
.dataTables_wrapper .dataTables_filter input:focus,
.dataTables_wrapper .dataTables_length select:focus{
    border-color:var(--dc-emerald);
    box-shadow:0 0 0 3px rgba(5,150,105,.12);
    background:#fff;
}
html.xu-dark .dataTables_wrapper .dataTables_filter input,
html.xu-dark .dataTables_wrapper .dataTables_length select{
    background:rgba(255,255,255,.05);border-color:rgba(5,150,105,.25);color:#f1f5f9;
}
html.xu-dark .dataTables_wrapper .dataTables_filter input:focus,
html.xu-dark .dataTables_wrapper .dataTables_length select:focus{
    border-color:var(--dc-gold);box-shadow:0 0 0 3px rgba(245,158,11,.15);
}

.dataTables_wrapper .dataTables_info{
    color:var(--dc-muted);font-size:.82rem;
    padding-top:14px;font-weight:500;
}
html.xu-dark .dataTables_wrapper .dataTables_info{color:var(--dc-soft)}
.dataTables_wrapper .dataTables_length label,
.dataTables_wrapper .dataTables_filter label{
    color:var(--dc-ink);font-weight:700;font-size:.85rem;
}
html.xu-dark .dataTables_wrapper .dataTables_length label,
html.xu-dark .dataTables_wrapper .dataTables_filter label{color:#e2e8f0}

.dataTables_wrapper .dataTables_paginate .paginate_button{
    color:var(--dc-muted)!important;
    border:1px solid transparent!important;
    border-radius:8px!important;
    margin:0 2px;transition:.2s;
}
.dataTables_wrapper .dataTables_paginate .paginate_button.current{
    background:linear-gradient(90deg,var(--dc-emerald),var(--dc-gold))!important;
    color:#fff!important;border:none!important;
    box-shadow:0 6px 14px rgba(5,150,105,.3)!important;
}
.dataTables_wrapper .dataTables_paginate .paginate_button:hover:not(.current):not(.disabled){
    background:rgba(5,150,105,.1)!important;color:var(--dc-emerald)!important;
    border-color:rgba(5,150,105,.25)!important;
}
.dataTables_wrapper .dataTables_paginate .paginate_button.disabled{opacity:.4;cursor:not-allowed}
html.xu-dark .dataTables_wrapper .dataTables_paginate .paginate_button{color:var(--dc-soft)!important}
html.xu-dark .dataTables_wrapper .dataTables_paginate .paginate_button:hover:not(.current):not(.disabled){
    background:rgba(5,150,105,.15)!important;color:var(--dc-mint)!important;
    border-color:rgba(5,150,105,.35)!important;
}

/* ===== RESPONSIVE ===== */
@media(max-width:720px){
    .xuRepHead{padding:18px 20px;flex-direction:column;align-items:flex-start}
    .xuRepHead h2{font-size:1.15rem}
    .xuBtnExcel{width:100%;justify-content:center}
    .xuTableWrap{padding:16px}
    .xuTable thead th,.xuTable tbody td{padding:10px 12px;font-size:.82rem}
    .xuTitle{font-size:.9rem}
}
</style>

<div class="xuRepCard xuR">
    <div class="xuRepHead">
        <h2><i class="fa fa-download"></i> Count Number of Downloads</h2>
        <button onclick="moveTo('<?= base_url('export/download-counter') ?>')" class="xuBtnExcel">
            <i class="fa fa-file-excel-o"></i> Export Excel
        </button>
    </div>
    <div class="xuTableWrap">
        <table class="table xuTable responsive dt-responsive" id="xuDataTable" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th style="width:60px">No</th>
                    <th style="width:35%">Title</th>
                    <th>Attachment</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($data)): ?>
                    <tr class="xuEmptyRow">
                        <td colspan="3">
                            <i class="fa fa-download"></i>
                            <b>Belum ada data unduhan.</b><br>
                            <small>Statistik unduhan akan tampil setelah ada berkas yang diunduh.</small>
                        </td>
                    </tr>
                <?php else: ?>
                    <?php
                    $i = 1;
                    foreach ($data as $key => $value) :
                    ?>
                        <tr>
                            <td><span class="xuNo"><?= $i++ ?></span></td>
                            <td><span class="xuTitle"><i class="fa fa-book"></i> <?= esc($value->title) ?></span></td>
                            <td>
                                <div class="xuSubWrap">
                                    <table cellspacing="0" width="100%" class="xuSubTable">
                                        <thead>
                                            <tr>
                                                <th class="text-center">File Name</th>
                                                <th class="text-center" style="width:140px">Downloads</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (empty($value->attachment)): ?>
                                                <tr>
                                                    <td colspan="2" style="text-align:center;color:var(--dc-soft);padding:14px">
                                                        <i class="fa fa-paperclip"></i> Tidak ada lampiran
                                                    </td>
                                                </tr>
                                            <?php else: ?>
                                                <?php foreach ($value->attachment as $attachment): ?>
                                                    <tr>
                                                        <td><span class="xuFile"><i class="fa fa-file-pdf-o"></i> <?= esc($attachment->file_name) ?></span></td>
                                                        <td class="text-right">
                                                            <span class="xuCount <?= $attachment->count > 0 ? 'xuCountOk' : 'xuCountNo' ?>">
                                                                <i class="fa fa-<?= $attachment->count > 0 ? 'download' : 'ban' ?>"></i>
                                                                <?= $attachment->count ?> downloaded
                                                            </span>
                                                        </td>
                                                    </tr>
                                                <?php endforeach ?>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
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

    // ===== DataTables initialization =====
    if ($.fn.DataTable){
        var tbl = $('#xuDataTable');
        if ($.fn.dataTable.isDataTable && $.fn.dataTable.isDataTable(tbl)){
            tbl.DataTable().destroy();
        }
        tbl.DataTable({
            language:{
                search:"Cari:",
                lengthMenu:"Tampilkan _MENU_ data",
                info:"Menampilkan _START_ - _END_ dari _TOTAL_ dokumen",
                infoEmpty:"Tidak ada data",
                emptyTable:"Belum ada data unduhan",
                zeroRecords:"Tidak ditemukan hasil yang cocok",
                paginate:{previous:"‹",next:"›"}
            },
            pageLength:10,
            responsive:true,
            order:[[0,'asc']],
            columnDefs:[
                {orderable:true, targets:[0,1]},
                {orderable:false, targets:[2]}
            ]
        });
    }
});
</script>