<style>
/* ================================================================
   DIFOSS BIBLIOGRAPHY CRUD — EMERALD FOREST EDITION
   ================================================================ */
:root{
    --bc-emerald:#059669; --bc-teal:#0891b2; --bc-gold:#f59e0b;
    --bc-mint:#6ee7b7; --bc-deep:#0a2920; --bc-mid:#064e3b;
    --bc-ink:#0f172a; --bc-muted:#64748b; --bc-soft:#94a3b8;
}

.xuR{opacity:0;transform:translateY(24px);transition:all .6s cubic-bezier(.2,.8,.2,1)}
.xuR.in{opacity:1;transform:none}

/* ===== KARTU UTAMA ===== */
.xuCrudCard{
    background:#fff;border-radius:22px;
    box-shadow:0 16px 44px rgba(15,23,42,.08);
    overflow:hidden;
    border:1px solid rgba(5,150,105,.12);
    margin-bottom:24px;
    transition:.35s cubic-bezier(.2,.8,.2,1);
}
.xuCrudCard:hover{
    box-shadow:0 22px 54px rgba(5,150,105,.14);
    border-color:rgba(5,150,105,.22);
}
html.xu-dark .xuCrudCard{background:#0f1e1f;border-color:rgba(5,150,105,.22);box-shadow:0 16px 44px rgba(0,0,0,.4)}

/* ===== HEADER KARTU ===== */
.xuCrudHead{
    padding:24px 28px;
    background:linear-gradient(90deg,var(--bc-emerald),var(--bc-teal),var(--bc-gold),var(--bc-emerald));
    background-size:200% 100%;
    color:#fff;
    display:flex;align-items:center;justify-content:space-between;
    flex-wrap:wrap;gap:14px;
    animation:xuBcGrad 7s linear infinite;
    position:relative;overflow:hidden;
}
.xuCrudHead::after{
    content:'';position:absolute;top:-60%;right:-8%;
    width:280px;height:280px;border-radius:50%;
    background:radial-gradient(circle,rgba(255,255,255,.12),transparent 70%);
    pointer-events:none;
}
@keyframes xuBcGrad{to{background-position:200% 0}}

.xuCrudHead h2{
    margin:0;font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1.35rem;
    display:flex;align-items:center;gap:12px;
    color:#fff;letter-spacing:-.01em;
    position:relative;z-index:2;
}
.xuCrudHead h2 i{
    width:42px;height:42px;border-radius:13px;
    background:rgba(255,255,255,.18);
    backdrop-filter:blur(8px);-webkit-backdrop-filter:blur(8px);
    display:inline-flex;align-items:center;justify-content:center;
    font-size:1.15rem;
    box-shadow:inset 0 1px 0 rgba(255,255,255,.2);
}

/* ===== TOMBOL ADD ===== */
.xuBtnAdd{
    display:inline-flex;align-items:center;gap:8px;
    padding:10px 20px;border-radius:12px;
    font-weight:800;font-size:.85rem;
    text-decoration:none!important;
    transition:.25s;border:none;cursor:pointer;
    background:#fff;color:var(--bc-emerald);
    box-shadow:0 8px 22px rgba(0,0,0,.2);
    position:relative;z-index:2;
    letter-spacing:.02em;
}
.xuBtnAdd:hover{
    transform:translateY(-2px);
    filter:brightness(1.05);
    color:var(--bc-emerald)!important;
    box-shadow:0 12px 28px rgba(0,0,0,.28);
}
.xuBtnAdd i{color:var(--bc-gold)}

/* ===== TOMBOL AKSI (EDIT/DELETE) ===== */
.xuBtnAct{
    padding:7px 14px;
    font-size:.76rem;font-weight:700;
    border-radius:9px;
    color:#fff!important;text-decoration:none!important;
    display:inline-flex;align-items:center;gap:6px;
    transition:.25s;border:none;cursor:pointer;
    margin:2px;
    position:relative;overflow:hidden;
    letter-spacing:.02em;
}
.xuBtnAct::before{
    content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;
    background:linear-gradient(100deg,transparent 20%,rgba(255,255,255,.3) 50%,transparent 80%);
    transition:left .6s ease;
}
.xuBtnAct:hover::before{left:120%}
.xuBtnAct:hover{
    transform:translateY(-2px);
    filter:brightness(1.12);
    color:#fff!important;
    box-shadow:0 8px 18px rgba(0,0,0,.2);
}
.xuEdit{background:linear-gradient(90deg,var(--bc-emerald),var(--bc-teal))}
.xuDel{background:linear-gradient(90deg,#ef4444,#dc2626)}

/* ===== TABEL WRAPPER ===== */
.xuTableWrap{padding:18px 22px;overflow-x:auto}
.xuTableWrap::-webkit-scrollbar{height:8px}
.xuTableWrap::-webkit-scrollbar-track{background:rgba(5,150,105,.05)}
.xuTableWrap::-webkit-scrollbar-thumb{background:linear-gradient(90deg,var(--bc-emerald),var(--bc-gold));border-radius:4px}

.xuTable{width:100%;border-collapse:separate;border-spacing:0}

.xuTable thead th{
    background:linear-gradient(180deg,rgba(5,150,105,.07),rgba(5,150,105,.02));
    color:var(--bc-emerald);
    font-weight:800;font-size:.72rem;
    text-transform:uppercase;letter-spacing:.08em;
    padding:14px 16px;border:none;
    border-bottom:2px solid rgba(5,150,105,.2);
    white-space:nowrap;
    font-family:'Plus Jakarta Sans',sans-serif;
}
html.xu-dark .xuTable thead th{background:linear-gradient(180deg,rgba(5,150,105,.14),rgba(5,150,105,.06));color:var(--bc-mint);border-bottom-color:rgba(5,150,105,.35)}

.xuTable tbody td{
    padding:15px 16px;
    border-bottom:1px solid #f1f3f8;
    color:#475569;font-size:.88rem;
    vertical-align:middle;
}
html.xu-dark .xuTable tbody td{border-bottom-color:rgba(5,150,105,.12);color:#cbd5e1}

.xuTable tbody tr{transition:.25s}
.xuTable tbody tr:hover{background:rgba(5,150,105,.04)}
.xuTable tbody tr:hover td:first-child{
    box-shadow:inset 4px 0 0 var(--bc-emerald);
}
html.xu-dark .xuTable tbody tr:hover{background:rgba(5,150,105,.1)}
html.xu-dark .xuTable tbody tr:hover td:first-child{box-shadow:inset 4px 0 0 var(--bc-gold)}

/* ===== JUDUL DOKUMEN ===== */
.xuTitle{
    font-family:'Neuton',Georgia,serif;
    font-weight:600;font-size:.98rem;
    color:var(--bc-ink);
    max-width:480px;line-height:1.45;
}
html.xu-dark .xuTitle{color:#f1f5f9}

/* ===== YEAR BADGE ===== */
.xuYear{
    display:inline-flex;align-items:center;gap:6px;
    padding:5px 12px;border-radius:999px;
    font-size:.76rem;font-weight:800;
    font-family:'JetBrains Mono',monospace;
    background:linear-gradient(135deg,rgba(5,150,105,.1),rgba(245,158,11,.08));
    color:var(--bc-emerald);
    border:1px solid rgba(5,150,105,.2);
    letter-spacing:.02em;
}
.xuYear i{color:var(--bc-gold);font-size:.8rem}
html.xu-dark .xuYear{background:linear-gradient(135deg,rgba(5,150,105,.18),rgba(245,158,11,.12));color:var(--bc-mint);border-color:rgba(5,150,105,.35)}

/* ===== TANGGAL ===== */
.xuDate{
    color:var(--bc-soft);
    font-size:.82rem;
    display:inline-flex;align-items:center;gap:6px;
}
.xuDate i{color:var(--bc-emerald);font-size:.82rem}
html.xu-dark .xuDate{color:var(--bc-soft)}
html.xu-dark .xuDate i{color:var(--bc-mint)}

/* ===== NOMOR URUT ===== */
.xuNo{
    display:inline-flex;align-items:center;justify-content:center;
    width:32px;height:32px;border-radius:10px;
    background:linear-gradient(135deg,rgba(5,150,105,.12),rgba(8,145,178,.08));
    color:var(--bc-emerald);
    font-weight:800;font-size:.82rem;
    font-family:'JetBrains Mono',monospace;
    border:1px solid rgba(5,150,105,.2);
}
html.xu-dark .xuNo{background:linear-gradient(135deg,rgba(5,150,105,.2),rgba(8,145,178,.12));color:var(--bc-mint);border-color:rgba(5,150,105,.35)}

/* ===== DATATABLES OVERRIDE ===== */
.dataTables_wrapper{
    font-family:'Plus Jakarta Sans',sans-serif;
}
.dataTables_wrapper .dataTables_filter,
.dataTables_wrapper .dataTables_length{
    margin-bottom:14px;
}
.dataTables_wrapper .dataTables_filter label,
.dataTables_wrapper .dataTables_length label{
    color:var(--bc-muted);font-weight:600;font-size:.85rem;
}
html.xu-dark .dataTables_wrapper .dataTables_filter label,
html.xu-dark .dataTables_wrapper .dataTables_length label{color:var(--bc-soft)}

.dataTables_wrapper .dataTables_filter input,
.dataTables_wrapper .dataTables_length select{
    border:1.5px solid #e2e8f0;
    border-radius:11px;
    padding:8px 14px;
    outline:none;
    background:#fff;
    color:var(--bc-ink);
    font-size:.85rem;
    transition:.25s;
    margin-left:8px!important;
    font-family:inherit;
}
.dataTables_wrapper .dataTables_filter input:focus,
.dataTables_wrapper .dataTables_length select:focus{
    border-color:var(--bc-emerald);
    box-shadow:0 0 0 4px rgba(5,150,105,.12);
}
html.xu-dark .dataTables_wrapper .dataTables_filter input,
html.xu-dark .dataTables_wrapper .dataTables_length select{
    background:rgba(255,255,255,.05);
    border-color:rgba(5,150,105,.25);
    color:#f1f5f9;
}
html.xu-dark .dataTables_wrapper .dataTables_filter input:focus,
html.xu-dark .dataTables_wrapper .dataTables_length select:focus{
    border-color:var(--bc-gold);
    box-shadow:0 0 0 4px rgba(245,158,11,.15);
}

.dataTables_wrapper .dataTables_info{
    color:var(--bc-muted);font-size:.82rem;font-weight:600;
    margin-top:14px;
}
html.xu-dark .dataTables_wrapper .dataTables_info{color:var(--bc-soft)}

.dataTables_wrapper .dataTables_paginate{margin-top:14px}

.dataTables_wrapper .dataTables_paginate .paginate_button{
    padding:6px 12px!important;
    margin:0 3px!important;
    border:none!important;
    border-radius:9px!important;
    background:transparent!important;
    color:var(--bc-muted)!important;
    font-weight:700!important;
    font-size:.82rem!important;
    transition:.2s!important;
}
.dataTables_wrapper .dataTables_paginate .paginate_button:hover{
    background:rgba(5,150,105,.1)!important;
    color:var(--bc-emerald)!important;
}
.dataTables_wrapper .dataTables_paginate .paginate_button.current{
    background:linear-gradient(90deg,var(--bc-emerald),var(--bc-gold))!important;
    color:#fff!important;
    box-shadow:0 6px 16px rgba(5,150,105,.35)!important;
}
.dataTables_wrapper .dataTables_paginate .paginate_button.disabled{
    opacity:.35!important;cursor:not-allowed!important;
}
html.xu-dark .dataTables_wrapper .dataTables_paginate .paginate_button{color:var(--bc-soft)!important}
html.xu-dark .dataTables_wrapper .dataTables_paginate .paginate_button:hover{background:rgba(5,150,105,.18)!important;color:var(--bc-mint)!important}

/* ===== RESPONSIVE ===== */
@media(max-width:720px){
    .xuCrudHead{padding:18px 20px}
    .xuCrudHead h2{font-size:1.15rem}
    .xuCrudHead h2 i{width:38px;height:38px;font-size:1rem}
    .xuBtnAdd{padding:8px 16px;font-size:.78rem}
    .xuTableWrap{padding:14px 10px}
    .xuTable thead th,
    .xuTable tbody td{padding:10px 8px;font-size:.78rem}
    .xuTitle{font-size:.88rem;max-width:280px}
    .xuNo{width:28px;height:28px;font-size:.75rem}
    .xuBtnAct{padding:6px 10px;font-size:.7rem}
}
</style>

<div class="xuCrudCard xuR">
    <div class="xuCrudHead">
        <h2><i class="fa fa-book"></i> Bibliography</h2>
        <button onclick="moveTo('<?= base_url('bibliography/add') ?>')" class="xuBtnAdd">
            <i class="fa fa-plus"></i> Add New Bibliography
        </button>
    </div>
    <div class="xuTableWrap">
        <table class="table xuTable" id="xuDataTable" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th style="width:60px;text-align:center">No</th>
                    <th>Title</th>
                    <th style="width:130px;text-align:center">Published Year</th>
                    <th style="width:170px">Last Modified</th>
                    <th style="width:170px;text-align:center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; foreach ($data as $val) : ?>
                    <tr>
                        <td style="text-align:center"><span class="xuNo"><?= $i++; ?></span></td>
                        <td><div class="xuTitle"><?= esc($val->title) ?></div></td>
                        <td style="text-align:center">
                            <span class="xuYear">
                                <i class="fa fa-calendar-o"></i>
                                <?= esc($val->publish_year ?: '—') ?>
                            </span>
                        </td>
                        <td>
                            <span class="xuDate">
                                <i class="fa fa-clock-o"></i>
                                <?= esc($val->last_update ?: '—') ?>
                            </span>
                        </td>
                        <td style="text-align:center;white-space:nowrap">
                            <a class="xuBtnAct xuEdit" href="<?= base_url("bibliography/edit/?bbi=" . slim_encrypt($val->biblio_id)) ?>">
                                <i class="fa fa-pencil"></i> Edit
                            </a>
                            <button type="button" class="xuBtnAct xuDel" onclick="showConfirm(<?= $val->biblio_id ?>)">
                                <i class="fa fa-trash"></i> Delete
                            </button>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function(){
    // ===== Fade-in reveal =====
    var io = new IntersectionObserver(function(es){
        es.forEach(function(en){
            if (en.isIntersecting){
                en.target.classList.add('in');
                io.unobserve(en.target);
            }
        });
    }, {threshold: .06});
    document.querySelectorAll('.xuR').forEach(function(el){ io.observe(el); });

    // ===== DataTables =====
    if ($.fn.DataTable){
        $('#xuDataTable').DataTable({
            language: {
                search: "🔍 Search:",
                lengthMenu: "Show _MENU_ entries",
                info: "Showing _START_ to _END_ of _TOTAL_ bibliographies",
                infoEmpty: "No bibliographies available",
                infoFiltered: "(filtered from _MAX_ total)",
                emptyTable: "No bibliography found",
                zeroRecords: "No matching bibliographies",
                paginate: { previous: "‹", next: "›" }
            },
            pageLength: 10,
            responsive: true,
            order: [[0, 'asc']],
            dom: '<"row"<"col-sm-6"l><"col-sm-6"f>>rtip'
        });
    }
});
</script>