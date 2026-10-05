<style>
/* ================================================================
   DIFOSS LIST MEMBER — EMERALD FOREST EDITION
   ================================================================ */
:root{
    --lm-emerald:#059669; --lm-teal:#0891b2; --lm-gold:#f59e0b;
    --lm-mint:#6ee7b7; --lm-deep:#0a2920;
    --lm-ink:#0f172a; --lm-muted:#64748b; --lm-soft:#94a3b8;
}

.xuR{opacity:0;transform:translateY(24px);transition:all .6s cubic-bezier(.2,.8,.2,1)}
.xuR.in{opacity:1;transform:none}

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

.xuRepHead{
    padding:22px 28px;
    background:linear-gradient(90deg,var(--lm-emerald),var(--lm-teal),var(--lm-gold),var(--lm-emerald));
    background-size:200% 100%;
    color:#fff;
    display:flex;align-items:center;justify-content:space-between;
    flex-wrap:wrap;gap:14px;
    animation:xuLmGrad 7s linear infinite;
    position:relative;overflow:hidden;
}
.xuRepHead::after{
    content:'';position:absolute;top:-60%;right:-8%;
    width:320px;height:320px;border-radius:50%;
    background:radial-gradient(circle,rgba(245,158,11,.25),transparent 70%);
    pointer-events:none;
}
@keyframes xuLmGrad{to{background-position:200% 0}}

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

.xuTableWrap{padding:22px 26px;overflow-x:auto}
.xuTable{width:100%;border-collapse:separate;border-spacing:0}

.xuTable thead th{
    background:linear-gradient(180deg,rgba(5,150,105,.08),rgba(5,150,105,.03));
    color:var(--lm-emerald);
    font-weight:800;font-size:.72rem;
    text-transform:uppercase;letter-spacing:.08em;
    padding:14px 16px;border:none;
    border-bottom:1.5px solid rgba(5,150,105,.2);
    white-space:nowrap;text-align:left;
}
html.xu-dark .xuTable thead th{
    background:linear-gradient(180deg,rgba(5,150,105,.15),rgba(5,150,105,.06));
    color:var(--lm-mint);border-bottom-color:rgba(5,150,105,.35);
}

.xuTable tbody td{
    padding:14px 16px;
    border-bottom:1px solid #f1f3f8;
    color:var(--lm-muted);font-size:.88rem;
    vertical-align:middle;
}
html.xu-dark .xuTable tbody td{border-bottom-color:rgba(5,150,105,.1);color:#cbd5e1}

.xuTable tbody tr{transition:.2s}
.xuTable tbody tr:hover{background:rgba(5,150,105,.05)}
.xuTable tbody tr:hover td:first-child{box-shadow:inset 4px 0 0 var(--lm-emerald)}
html.xu-dark .xuTable tbody tr:hover{background:rgba(5,150,105,.1)}
html.xu-dark .xuTable tbody tr:hover td:first-child{box-shadow:inset 4px 0 0 var(--lm-gold)}

/* Member ID badge */
.xuMid{
    font-family:'JetBrains Mono',monospace;
    font-weight:700;color:var(--lm-emerald);
    background:rgba(5,150,105,.08);
    border:1px solid rgba(5,150,105,.2);
    padding:5px 12px;border-radius:9px;
    font-size:.82rem;
    display:inline-flex;align-items:center;gap:6px;
}
html.xu-dark .xuMid{color:var(--lm-mint);background:rgba(5,150,105,.15);border-color:rgba(5,150,105,.35)}

/* Avatar inisial */
.xuAvatar{
    width:36px;height:36px;border-radius:50%;
    background:linear-gradient(135deg,var(--lm-emerald),var(--lm-gold));
    color:#fff;font-weight:800;font-size:.85rem;
    display:inline-flex;align-items:center;justify-content:center;
    flex-shrink:0;
    box-shadow:0 6px 14px rgba(5,150,105,.3);
    font-family:'Neuton',Georgia,serif;
    border:2px solid rgba(255,255,255,.25);
    transition:.3s;
}
.xuTable tbody tr:hover .xuAvatar{transform:scale(1.1) rotate(-6deg);box-shadow:0 10px 22px rgba(245,158,11,.4)}

/* Member Name */
.xuName{
    font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:.98rem;
    color:var(--lm-ink);
    display:inline-flex;align-items:center;gap:10px;
}
html.xu-dark .xuName{color:#f1f5f9}

/* Badge Type */
.xuBadge{
    display:inline-flex;align-items:center;gap:6px;
    padding:5px 13px;border-radius:999px;
    font-size:.72rem;font-weight:800;
    letter-spacing:.04em;
    color:var(--lm-gold);
    background:rgba(245,158,11,.1);
    border:1px solid rgba(245,158,11,.3);
}
html.xu-dark .xuBadge{color:#fde68a;background:rgba(245,158,11,.15);border-color:rgba(245,158,11,.4)}

/* Empty state */
.xuEmptyRow td{
    text-align:center;padding:50px 20px!important;
    color:var(--lm-soft)!important;
    font-size:.92rem;font-weight:600;
    background:linear-gradient(135deg,rgba(5,150,105,.04),rgba(245,158,11,.02))!important;
}
.xuEmptyRow i{
    font-size:2.2rem;color:var(--lm-emerald);
    display:block;margin-bottom:10px;
}

/* ===== DATATABLES ===== */
.dataTables_wrapper .dataTables_filter input,
.dataTables_wrapper .dataTables_length select{
    border:1.5px solid #cbd5e1;border-radius:10px;
    padding:7px 12px;outline:none;transition:.2s;
    background:#f8fafc;color:var(--lm-ink);
    font-family:inherit;font-size:.85rem;
}
.dataTables_wrapper .dataTables_filter input:focus,
.dataTables_wrapper .dataTables_length select:focus{
    border-color:var(--lm-emerald);
    box-shadow:0 0 0 3px rgba(5,150,105,.12);
    background:#fff;
}
html.xu-dark .dataTables_wrapper .dataTables_filter input,
html.xu-dark .dataTables_wrapper .dataTables_length select{
    background:rgba(255,255,255,.05);border-color:rgba(5,150,105,.25);color:#f1f5f9;
}
html.xu-dark .dataTables_wrapper .dataTables_filter input:focus,
html.xu-dark .dataTables_wrapper .dataTables_length select:focus{
    border-color:var(--lm-gold);box-shadow:0 0 0 3px rgba(245,158,11,.15);
}

.dataTables_wrapper .dataTables_info{
    color:var(--lm-muted);font-size:.82rem;padding-top:14px;font-weight:500;
}
html.xu-dark .dataTables_wrapper .dataTables_info{color:var(--lm-soft)}
.dataTables_wrapper .dataTables_length label,
.dataTables_wrapper .dataTables_filter label{
    color:var(--lm-ink);font-weight:700;font-size:.85rem;
}
html.xu-dark .dataTables_wrapper .dataTables_length label,
html.xu-dark .dataTables_wrapper .dataTables_filter label{color:#e2e8f0}

.dataTables_wrapper .dataTables_paginate .paginate_button{
    color:var(--lm-muted)!important;
    border:1px solid transparent!important;
    border-radius:8px!important;margin:0 2px;transition:.2s;
}
.dataTables_wrapper .dataTables_paginate .paginate_button.current{
    background:linear-gradient(90deg,var(--lm-emerald),var(--lm-gold))!important;
    color:#fff!important;border:none!important;
    box-shadow:0 6px 14px rgba(5,150,105,.3)!important;
}
.dataTables_wrapper .dataTables_paginate .paginate_button:hover:not(.current):not(.disabled){
    background:rgba(5,150,105,.1)!important;color:var(--lm-emerald)!important;
    border-color:rgba(5,150,105,.25)!important;
}
.dataTables_wrapper .dataTables_paginate .paginate_button.disabled{opacity:.4;cursor:not-allowed}
html.xu-dark .dataTables_wrapper .dataTables_paginate .paginate_button{color:var(--lm-soft)!important}
html.xu-dark .dataTables_wrapper .dataTables_paginate .paginate_button:hover:not(.current):not(.disabled){
    background:rgba(5,150,105,.15)!important;color:var(--lm-mint)!important;
    border-color:rgba(5,150,105,.35)!important;
}

@media(max-width:720px){
    .xuRepHead{padding:18px 20px}
    .xuRepHead h2{font-size:1.15rem}
    .xuTableWrap{padding:16px}
    .xuTable thead th,.xuTable tbody td{padding:10px 12px;font-size:.82rem}
    .xuAvatar{width:32px;height:32px;font-size:.78rem}
    .xuName{font-size:.9rem}
}
</style>

<div class="xuRepCard xuR">
    <div class="xuRepHead">
        <h2><i class="fa fa-list-ul"></i> List Member</h2>
    </div>
    <div class="xuTableWrap">
        <table class="table xuTable responsive dt-responsive" id="xuDataTable" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th style="width:200px">Member ID</th>
                    <th>Member Name</th>
                    <th style="width:220px">Member Type</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($list_member)): ?>
                    <tr class="xuEmptyRow">
                        <td colspan="3">
                            <i class="fa fa-users"></i>
                            <b>Belum ada anggota terdaftar.</b><br>
                            <small>Silakan tambahkan anggota baru untuk memulai.</small>
                        </td>
                    </tr>
                <?php else: foreach ($list_member as $val): ?>
                    <tr>
                        <td><span class="xuMid"><i class="fa fa-hashtag"></i> <?= esc($val->member_id); ?></span></td>
                        <td>
                            <span class="xuName">
                                <span class="xuAvatar"><?= esc(strtoupper(substr(trim($val->member_name), 0, 1))) ?></span>
                                <?= esc($val->member_name); ?>
                            </span>
                        </td>
                        <td><span class="xuBadge"><i class="fa fa-id-badge"></i> <?= esc($val->member_type_name); ?></span></td>
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
                search:"Cari:",lengthMenu:"Tampilkan _MENU_ data",
                info:"Menampilkan _START_ - _END_ dari _TOTAL_ anggota",
                infoEmpty:"Tidak ada data",emptyTable:"Belum ada anggota terdaftar",
                zeroRecords:"Tidak ditemukan hasil yang cocok",
                paginate:{previous:"‹",next:"›"}
            },
            pageLength:10,responsive:true,order:[[0,'asc']],
            columnDefs:[
                {orderable:true, targets:[0,1]},
                {orderable:false, targets:[2]}
            ]
        });
    }
});
</script>