<style>
/* ================================================================
   DIFOSS USER GROUPS LIST — EMERALD FOREST EDITION
   ================================================================ */
:root{
    --ug-emerald:#059669; --ug-teal:#0891b2; --ug-gold:#f59e0b;
    --ug-mint:#6ee7b7; --ug-deep:#0a2920;
    --ug-ink:#0f172a; --ug-muted:#64748b; --ug-soft:#94a3b8;
    --ug-danger:#dc2626;
}

.xuR{opacity:0;transform:translateY(24px);transition:all .6s cubic-bezier(.2,.8,.2,1)}
.xuR.in{opacity:1;transform:none}

/* ===== KARTU ===== */
.xuCrudCard{
    background:#fff;border-radius:22px;
    box-shadow:0 16px 44px rgba(15,23,42,.08);
    overflow:hidden;
    border:1px solid rgba(5,150,105,.12);
    margin-bottom:24px;
    transition:.35s cubic-bezier(.2,.8,.2,1);
}
.xuCrudCard:hover{box-shadow:0 22px 54px rgba(5,150,105,.14);border-color:rgba(5,150,105,.22)}
html.xu-dark .xuCrudCard{background:#0f1e1f;border-color:rgba(5,150,105,.22);box-shadow:0 16px 44px rgba(0,0,0,.4)}

/* ===== HEADER ===== */
.xuCrudHead{
    padding:22px 28px;
    background:linear-gradient(90deg,var(--ug-emerald),var(--ug-teal),var(--ug-gold),var(--ug-emerald));
    background-size:200% 100%;
    color:#fff;
    display:flex;align-items:center;justify-content:space-between;
    flex-wrap:wrap;gap:14px;
    animation:xuUgGrad 7s linear infinite;
    position:relative;overflow:hidden;
}
.xuCrudHead::after{
    content:'';position:absolute;top:-60%;right:-8%;
    width:320px;height:320px;border-radius:50%;
    background:radial-gradient(circle,rgba(245,158,11,.25),transparent 70%);
    pointer-events:none;
}
@keyframes xuUgGrad{to{background-position:200% 0}}

.xuCrudHead h2{
    margin:0;font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1.3rem;
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

/* Tombol Add */
.xuBtnAdd{
    display:inline-flex;align-items:center;gap:8px;
    padding:9px 18px;border-radius:12px;
    font-weight:700;font-size:.82rem;
    text-decoration:none!important;
    transition:.25s;border:none;cursor:pointer;
    background:#fff;color:var(--ug-emerald);
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
.xuBtnAdd:hover{transform:translateY(-2px);filter:brightness(1.05);color:var(--ug-emerald);text-decoration:none}
.xuBtnAdd:hover::before{left:120%}

/* Tombol aksi */
.xuBtnAct{
    padding:8px 14px;font-size:.78rem;
    border-radius:10px;
    color:#fff!important;text-decoration:none!important;
    display:inline-flex;align-items:center;justify-content:center;
    gap:7px;transition:.25s;border:none;cursor:pointer;
    margin:2px;line-height:1;font-weight:700;
    font-family:inherit;
    position:relative;overflow:hidden;
    letter-spacing:.02em;
}
.xuBtnAct::before{
    content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;
    background:linear-gradient(100deg,transparent 20%,rgba(255,255,255,.28) 50%,transparent 80%);
    transition:left .6s ease;
}
.xuBtnAct:hover{transform:translateY(-2px);filter:brightness(1.12);color:#fff!important;text-decoration:none}
.xuBtnAct:hover::before{left:120%}
.xuBtnAct i,.xuBtnAct .fa{
    color:#fff!important;font-size:.9rem!important;
    line-height:1!important;display:inline-block;
    width:14px;text-align:center;
    text-shadow:0 1px 2px rgba(0,0,0,.3);
}

.xuEdit{background:linear-gradient(90deg,var(--ug-emerald),var(--ug-gold));box-shadow:0 6px 14px rgba(5,150,105,.3)}
.xuEdit:hover{box-shadow:0 10px 22px rgba(5,150,105,.4)}
.xuDel{background:linear-gradient(90deg,#ef4444,#dc2626);box-shadow:0 6px 14px rgba(239,68,68,.3)}
.xuDel:hover{box-shadow:0 10px 22px rgba(239,68,68,.4)}

/* ===== TABEL ===== */
.xuTableWrap{padding:22px 26px;overflow-x:auto}
.xuTable{width:100%;border-collapse:separate;border-spacing:0}

.xuTable thead th{
    background:linear-gradient(180deg,rgba(5,150,105,.08),rgba(5,150,105,.03));
    color:var(--ug-emerald);
    font-weight:800;font-size:.72rem;
    text-transform:uppercase;letter-spacing:.08em;
    padding:14px 16px;border:none;
    border-bottom:1.5px solid rgba(5,150,105,.2);
    white-space:nowrap;text-align:left;
}
html.xu-dark .xuTable thead th{
    background:linear-gradient(180deg,rgba(5,150,105,.15),rgba(5,150,105,.06));
    color:var(--ug-mint);border-bottom-color:rgba(5,150,105,.35);
}

.xuTable tbody td{
    padding:14px 16px;
    border-bottom:1px solid #f1f3f8;
    color:var(--ug-muted);font-size:.88rem;
    vertical-align:middle;
}
html.xu-dark .xuTable tbody td{border-bottom-color:rgba(5,150,105,.1);color:#cbd5e1}

.xuTable tbody tr{transition:.2s}
.xuTable tbody tr:hover{background:rgba(5,150,105,.05)}
.xuTable tbody tr:hover td:first-child{box-shadow:inset 4px 0 0 var(--ug-emerald)}
html.xu-dark .xuTable tbody tr:hover{background:rgba(5,150,105,.1)}
html.xu-dark .xuTable tbody tr:hover td:first-child{box-shadow:inset 4px 0 0 var(--ug-gold)}

/* No. badge */
.xuNo{
    display:inline-flex;align-items:center;justify-content:center;
    width:32px;height:32px;border-radius:10px;
    background:rgba(5,150,105,.1);
    border:1px solid rgba(5,150,105,.2);
    color:var(--ug-emerald);
    font-family:'JetBrains Mono',monospace;
    font-weight:700;font-size:.82rem;
}
html.xu-dark .xuNo{color:var(--ug-mint);background:rgba(5,150,105,.15);border-color:rgba(5,150,105,.35)}

/* Group name */
.xuGroup{
    font-family:'Neuton',Georgia,serif;
    font-weight:700;color:var(--ug-ink);
    display:inline-flex;align-items:center;gap:10px;
    font-size:.98rem;
}
html.xu-dark .xuGroup{color:#f1f5f9}

.xuGroup i{
    width:34px;height:34px;border-radius:10px;
    background:linear-gradient(135deg,var(--ug-emerald),var(--ug-gold));
    color:#fff;
    display:inline-flex;align-items:center;justify-content:center;
    font-size:.9rem;flex-shrink:0;
    box-shadow:0 6px 14px rgba(5,150,105,.3);
    transition:.3s;
}
.xuTable tbody tr:hover .xuGroup i{transform:scale(1.08) rotate(-6deg)}

/* Date */
.xuDate{
    color:var(--ug-muted);
    font-family:'JetBrains Mono',monospace;
    font-size:.82rem;font-weight:600;
    display:inline-flex;align-items:center;gap:6px;
}
.xuDate i{color:var(--ug-gold);font-size:.78rem}
html.xu-dark .xuDate{color:var(--ug-soft)}

/* Empty state */
.xuEmptyRow td{
    text-align:center;padding:50px 20px!important;
    color:var(--ug-soft)!important;font-size:.92rem;font-weight:600;
    background:linear-gradient(135deg,rgba(5,150,105,.04),rgba(245,158,11,.02))!important;
}
.xuEmptyRow i{font-size:2.2rem;color:var(--ug-emerald);display:block;margin-bottom:10px}

/* ===== DATATABLES ===== */
.dataTables_wrapper .dataTables_filter input,
.dataTables_wrapper .dataTables_length select{
    border:1.5px solid #cbd5e1;border-radius:10px;
    padding:7px 12px;outline:none;transition:.2s;
    background:#f8fafc;color:var(--ug-ink);
    font-family:inherit;font-size:.85rem;
}
.dataTables_wrapper .dataTables_filter input:focus,
.dataTables_wrapper .dataTables_length select:focus{
    border-color:var(--ug-emerald);
    box-shadow:0 0 0 3px rgba(5,150,105,.12);
    background:#fff;
}
html.xu-dark .dataTables_wrapper .dataTables_filter input,
html.xu-dark .dataTables_wrapper .dataTables_length select{
    background:rgba(255,255,255,.05);border-color:rgba(5,150,105,.25);color:#f1f5f9;
}
html.xu-dark .dataTables_wrapper .dataTables_filter input:focus,
html.xu-dark .dataTables_wrapper .dataTables_length select:focus{
    border-color:var(--ug-gold);box-shadow:0 0 0 3px rgba(245,158,11,.15);
}

.dataTables_wrapper .dataTables_info{color:var(--ug-muted);font-size:.82rem;padding-top:14px;font-weight:500}
html.xu-dark .dataTables_wrapper .dataTables_info{color:var(--ug-soft)}
.dataTables_wrapper .dataTables_length label,
.dataTables_wrapper .dataTables_filter label{color:var(--ug-ink);font-weight:700;font-size:.85rem}
html.xu-dark .dataTables_wrapper .dataTables_length label,
html.xu-dark .dataTables_wrapper .dataTables_filter label{color:#e2e8f0}

.dataTables_wrapper .dataTables_paginate .paginate_button{
    color:var(--ug-muted)!important;
    border:1px solid transparent!important;
    border-radius:8px!important;margin:0 2px;transition:.2s;
}
.dataTables_wrapper .dataTables_paginate .paginate_button.current{
    background:linear-gradient(90deg,var(--ug-emerald),var(--ug-gold))!important;
    color:#fff!important;border:none!important;
    box-shadow:0 6px 14px rgba(5,150,105,.3)!important;
}
.dataTables_wrapper .dataTables_paginate .paginate_button:hover:not(.current):not(.disabled){
    background:rgba(5,150,105,.1)!important;color:var(--ug-emerald)!important;
    border-color:rgba(5,150,105,.25)!important;
}
.dataTables_wrapper .dataTables_paginate .paginate_button.disabled{opacity:.4;cursor:not-allowed}
html.xu-dark .dataTables_wrapper .dataTables_paginate .paginate_button{color:var(--ug-soft)!important}
html.xu-dark .dataTables_wrapper .dataTables_paginate .paginate_button:hover:not(.current):not(.disabled){
    background:rgba(5,150,105,.15)!important;color:var(--ug-mint)!important;
    border-color:rgba(5,150,105,.35)!important;
}

@media(max-width:720px){
    .xuCrudHead{padding:18px 20px;flex-direction:column;align-items:flex-start}
    .xuCrudHead h2{font-size:1.15rem}
    .xuBtnAdd{width:100%;justify-content:center}
    .xuTableWrap{padding:16px}
    .xuTable thead th,.xuTable tbody td{padding:10px 12px;font-size:.82rem}
}
</style>

<div class="xuCrudCard xuR">
    <div class="xuCrudHead">
        <h2><i class="fa fa-shield"></i> User Groups</h2>
        <a href="<?= base_url('sistem/user-groups/add'); ?>" class="xuBtnAdd">
            <i class="fa fa-plus"></i> Add New Group
        </a>
    </div>
    <div class="xuTableWrap">
        <table class="table xuTable responsive" id="dataList" align="center" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th style="width:60px">No</th>
                    <th>Group Name</th>
                    <th style="width:200px">Last Modified</th>
                    <th style="width:190px;text-align:center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($list_group)): ?>
                    <tr class="xuEmptyRow">
                        <td colspan="4">
                            <i class="fa fa-shield"></i>
                            <b>Belum ada user group.</b><br>
                            <small>Klik "Add New Group" untuk membuat kelompok pengguna.</small>
                        </td>
                    </tr>
                <?php else:
                    $i = 1;
                    foreach ($list_group as $key => $val): ?>
                    <tr>
                        <td><span class="xuNo"><?= $i++; ?></span></td>
                        <td>
                            <span class="xuGroup">
                                <i class="fa fa-users"></i>
                                <?= esc($val->group_name); ?>
                            </span>
                        </td>
                        <td><span class="xuDate"><i class="fa fa-clock-o"></i> <?= date("Y-m-d H:i:s", strtotime($val->last_update)); ?></span></td>
                        <td style="text-align:center;white-space:nowrap">
                            <a href="<?= base_url('sistem/user-groups/edit/' . $val->group_id); ?>" class="xuBtnAct xuEdit" title="Edit">
                                <i class="fa fa-pencil"></i> Edit
                            </a>
                            <button type="button" class="xuBtnAct xuDel" title="Delete" onclick="showConfirm(<?= $val->group_id ?>)">
                                <i class="fa fa-trash"></i> Delete
                            </button>
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
        var tbl = $('#dataList');
        if ($.fn.dataTable.isDataTable && $.fn.dataTable.isDataTable(tbl)){ tbl.DataTable().destroy(); }
        tbl.DataTable({
            language:{
                search:"Cari:",lengthMenu:"Tampilkan _MENU_ data",
                info:"Menampilkan _START_ - _END_ dari _TOTAL_ kelompok",
                infoEmpty:"Tidak ada data",emptyTable:"Belum ada kelompok pengguna",
                zeroRecords:"Tidak ditemukan hasil yang cocok",
                paginate:{previous:"‹",next:"›"}
            },
            pageLength:10,order:[[0,'asc']],
            columnDefs:[
                {orderable:true, targets:[0,1,2]},
                {orderable:false, targets:[3]}
            ]
        });
    }
});
</script>