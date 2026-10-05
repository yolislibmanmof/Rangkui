<style>
/* ================================================================
   DIFOSS LIST MEMBERSHIP — EMERALD FOREST EDITION
   ================================================================ */
:root{
    --ml-emerald:#059669; --ml-teal:#0891b2; --ml-gold:#f59e0b;
    --ml-mint:#6ee7b7; --ml-deep:#0a2920; --ml-mid:#064e3b;
    --ml-ink:#0f172a; --ml-muted:#64748b; --ml-soft:#94a3b8;
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
    padding:24px 28px;
    background:linear-gradient(90deg,var(--ml-emerald),var(--ml-teal),var(--ml-gold),var(--ml-emerald));
    background-size:200% 100%;
    color:#fff;
    display:flex;align-items:center;justify-content:space-between;
    flex-wrap:wrap;gap:14px;
    animation:xuMlGrad 7s linear infinite;
    position:relative;overflow:hidden;
}
.xuCrudHead::after{
    content:'';position:absolute;top:-60%;right:-8%;
    width:320px;height:320px;border-radius:50%;
    background:radial-gradient(circle,rgba(245,158,11,.25),transparent 70%);
    pointer-events:none;
}
@keyframes xuMlGrad{to{background-position:200% 0}}

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

.xuCrudBtns{display:flex;gap:10px;flex-wrap:wrap;position:relative;z-index:2}

/* ===== TOMBOL ===== */
.xuBtnAdd{
    display:inline-flex;align-items:center;gap:8px;
    padding:9px 18px;border-radius:12px;
    font-weight:700;font-size:.82rem;
    text-decoration:none!important;
    transition:.25s;border:none;cursor:pointer;
    background:#fff;color:var(--ml-emerald);
    box-shadow:0 8px 20px rgba(0,0,0,.15);
    position:relative;overflow:hidden;
    font-family:inherit;
}
.xuBtnAdd::before{
    content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;
    background:linear-gradient(100deg,transparent 20%,rgba(5,150,105,.15) 50%,transparent 80%);
    transition:left .6s ease;
}
.xuBtnAdd:hover{transform:translateY(-2px);filter:brightness(1.05);color:var(--ml-emerald);text-decoration:none}
.xuBtnAdd:hover::before{left:120%}

.xuBtnExp{
    background:linear-gradient(90deg,var(--ml-gold),#d97706)!important;
    color:#fff!important;
    box-shadow:0 8px 20px rgba(245,158,11,.3)!important;
}
.xuBtnExp:hover{color:#fff!important;filter:brightness(1.08)}

.xuBtnAct{
    padding:7px 12px;font-size:.8rem;
    border-radius:10px;
    color:#fff!important;text-decoration:none!important;
    display:inline-flex;align-items:center;gap:6px;
    transition:.25s;border:none;cursor:pointer;
    margin:2px;font-weight:700;
    font-family:inherit;
    position:relative;overflow:hidden;
    letter-spacing:.02em;
}
.xuBtnAct::before{
    content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;
    background:linear-gradient(100deg,transparent 20%,rgba(255,255,255,.28) 50%,transparent 80%);
    transition:left .6s ease;
}
.xuBtnAct:hover{transform:translateY(-2px);filter:brightness(1.12);color:#fff!important}
.xuBtnAct:hover::before{left:120%}

.xuEdit{background:linear-gradient(90deg,var(--ml-emerald),var(--ml-teal));box-shadow:0 6px 14px rgba(5,150,105,.3)}
.xuDel{background:linear-gradient(90deg,#ef4444,#dc2626);box-shadow:0 6px 14px rgba(239,68,68,.3)}

/* ===== TABEL ===== */
.xuTableWrap{padding:22px 26px;overflow-x:auto}
.xuTable{width:100%;border-collapse:separate;border-spacing:0}

.xuTable thead th{
    background:linear-gradient(180deg,rgba(5,150,105,.08),rgba(5,150,105,.03));
    color:var(--ml-emerald);
    font-weight:800;font-size:.72rem;
    text-transform:uppercase;letter-spacing:.08em;
    padding:14px 16px;border:none;
    border-bottom:1.5px solid rgba(5,150,105,.2);
    white-space:nowrap;text-align:left;
}
html.xu-dark .xuTable thead th{
    background:linear-gradient(180deg,rgba(5,150,105,.15),rgba(5,150,105,.06));
    color:var(--ml-mint);border-bottom-color:rgba(5,150,105,.35);
}

.xuTable tbody td{
    padding:14px 16px;
    border-bottom:1px solid #f1f3f8;
    color:var(--ml-ink);font-size:.88rem;
    vertical-align:middle;
}
html.xu-dark .xuTable tbody td{border-bottom-color:rgba(5,150,105,.1);color:#e2e8f0}

.xuTable tbody tr{transition:.2s}
.xuTable tbody tr:hover{background:rgba(5,150,105,.04)}
.xuTable tbody tr:hover td:first-child{box-shadow:inset 4px 0 0 var(--ml-emerald)}
html.xu-dark .xuTable tbody tr:hover{background:rgba(5,150,105,.1)}
html.xu-dark .xuTable tbody tr:hover td:first-child{box-shadow:inset 4px 0 0 var(--ml-gold)}

.xuMid{
    font-family:'JetBrains Mono',monospace;
    font-weight:700;color:var(--ml-emerald);
    background:rgba(5,150,105,.08);
    border:1px solid rgba(5,150,105,.2);
    padding:4px 10px;border-radius:8px;font-size:.8rem;
}
html.xu-dark .xuMid{color:var(--ml-mint);background:rgba(5,150,105,.15);border-color:rgba(5,150,105,.35)}

.xuName{
    font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1rem;color:var(--ml-ink);
}
html.xu-dark .xuName{color:#f1f5f9}

.xuType{
    display:inline-flex;align-items:center;gap:5px;
    padding:4px 11px;border-radius:999px;
    font-size:.72rem;font-weight:800;letter-spacing:.03em;
    background:rgba(245,158,11,.12);color:var(--ml-gold);
    border:1px solid rgba(245,158,11,.3);
}
html.xu-dark .xuType{background:rgba(245,158,11,.18);color:#fde68a;border-color:rgba(245,158,11,.4)}

.xuEmail{color:var(--ml-muted);font-size:.83rem;display:inline-flex;align-items:center;gap:6px}
.xuEmail i{color:var(--ml-teal);font-size:.85rem}
html.xu-dark .xuEmail{color:var(--ml-soft)}
html.xu-dark .xuEmail i{color:var(--ml-mint)}

.xuDate{
    color:var(--ml-muted);font-size:.8rem;
    display:inline-flex;align-items:center;gap:6px;
    font-family:'JetBrains Mono',monospace;font-weight:600;
}
.xuDate i{color:var(--ml-gold)}
html.xu-dark .xuDate{color:var(--ml-soft)}

/* ===== DATATABLES ===== */
.dataTables_wrapper .dataTables_filter input,
.dataTables_wrapper .dataTables_length select{
    border:1.5px solid #cbd5e1;border-radius:10px;
    padding:7px 12px;outline:none;transition:.2s;
    background:#f8fafc;color:var(--ml-ink);
    font-family:inherit;font-size:.85rem;
}
.dataTables_wrapper .dataTables_filter input:focus,
.dataTables_wrapper .dataTables_length select:focus{
    border-color:var(--ml-emerald);
    box-shadow:0 0 0 3px rgba(5,150,105,.12);
    background:#fff;
}
html.xu-dark .dataTables_wrapper .dataTables_filter input,
html.xu-dark .dataTables_wrapper .dataTables_length select{
    background:rgba(255,255,255,.05);border-color:rgba(5,150,105,.25);color:#f1f5f9;
}
html.xu-dark .dataTables_wrapper .dataTables_filter input:focus,
html.xu-dark .dataTables_wrapper .dataTables_length select:focus{
    border-color:var(--ml-gold);box-shadow:0 0 0 3px rgba(245,158,11,.15);
}

.dataTables_wrapper .dataTables_info{color:var(--ml-muted);font-size:.82rem;padding-top:14px;font-weight:500}
html.xu-dark .dataTables_wrapper .dataTables_info{color:var(--ml-soft)}
.dataTables_wrapper .dataTables_length label,
.dataTables_wrapper .dataTables_filter label{color:var(--ml-ink);font-weight:700;font-size:.85rem}
html.xu-dark .dataTables_wrapper .dataTables_length label,
html.xu-dark .dataTables_wrapper .dataTables_filter label{color:#e2e8f0}

.dataTables_wrapper .dataTables_paginate .paginate_button{
    color:var(--ml-muted)!important;
    border:1px solid transparent!important;
    border-radius:8px!important;
    margin:0 2px;transition:.2s;
}
.dataTables_wrapper .dataTables_paginate .paginate_button.current{
    background:linear-gradient(90deg,var(--ml-emerald),var(--ml-gold))!important;
    color:#fff!important;border:none!important;
    box-shadow:0 6px 14px rgba(5,150,105,.3)!important;
}
.dataTables_wrapper .dataTables_paginate .paginate_button:hover:not(.current):not(.disabled){
    background:rgba(5,150,105,.1)!important;color:var(--ml-emerald)!important;
    border-color:rgba(5,150,105,.25)!important;
}
.dataTables_wrapper .dataTables_paginate .paginate_button.disabled{opacity:.4;cursor:not-allowed}
html.xu-dark .dataTables_wrapper .dataTables_paginate .paginate_button{color:var(--ml-soft)!important}
html.xu-dark .dataTables_wrapper .dataTables_paginate .paginate_button:hover:not(.current):not(.disabled){
    background:rgba(5,150,105,.15)!important;color:var(--ml-mint)!important;
    border-color:rgba(5,150,105,.35)!important;
}

.dataTables_empty{
    text-align:center;padding:40px 20px!important;
    color:var(--ml-soft)!important;font-size:.92rem;font-weight:600;
    background:linear-gradient(135deg,rgba(5,150,105,.04),rgba(245,158,11,.02))!important;
}

@media(max-width:720px){
    .xuCrudHead{padding:18px 20px;flex-direction:column;align-items:flex-start}
    .xuCrudHead h2{font-size:1.15rem}
    .xuCrudBtns{width:100%}
    .xuBtnAdd{flex:1;justify-content:center;padding:9px 14px;font-size:.78rem}
    .xuTableWrap{padding:16px}
    .xuTable thead th,.xuTable tbody td{padding:10px 12px;font-size:.82rem}
}
</style>

<div class="xuCrudCard xuR">
    <div class="xuCrudHead">
        <h2><i class="fa fa-users"></i> List Membership</h2>
        <div class="xuCrudBtns">
            <a href="<?= base_url('membership/xmember') ?>" class="xuBtnAdd xuBtnExp"><i class="fa fa-clock-o"></i> View Expired Members</a>
            <a href="<?= base_url('membership/add') ?>" class="xuBtnAdd"><i class="fa fa-user-plus"></i> Add New Member</a>
        </div>
    </div>
    <div class="xuTableWrap">
        <table class="table xuTable dt-responsive" id="xuDataTable" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th style="width:130px">Member ID</th>
                    <th>Member Name</th>
                    <th>Membership Type</th>
                    <th>Email</th>
                    <th>Last Modified</th>
                    <th style="width:150px;text-align:center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($data)): ?>
                    <tr>
                        <td colspan="6" style="text-align:center;padding:50px 20px;color:var(--ml-soft)">
                            <i class="fa fa-users" style="font-size:2.2rem;color:var(--ml-emerald);display:block;margin-bottom:10px"></i>
                            <b>Belum ada anggota terdaftar.</b><br>
                            <small>Klik "Add New Member" untuk mulai menambahkan.</small>
                        </td>
                    </tr>
                <?php else: foreach ($data as $value): ?>
                    <tr>
                        <td><span class="xuMid"><?= esc($value->member_id) ?></span></td>
                        <td><span class="xuName"><?= esc($value->member_name) ?></span></td>
                        <td><span class="xuType"><i class="fa fa-id-badge"></i> <?= esc($value->member_type_name) ?></span></td>
                        <td><span class="xuEmail"><i class="fa fa-envelope-o"></i> <?= esc($value->member_email) ?></span></td>
                        <td><span class="xuDate"><i class="fa fa-clock-o"></i> <?= esc($value->last_update) ?></span></td>
                        <td style="text-align:center;white-space:nowrap">
                            <a href="<?= base_url("membership/edit/?mi={$value->member_id}") ?>" class="xuBtnAct xuEdit" title="Edit"><i class="fa fa-pencil"></i> Edit</a>
                            <form action="<?= base_url("membership/delete") ?>" method="post" style="display:inline;">
                                <?= csrf_field() ?>
                                <input type="hidden" name="mi" value="<?= $value->member_id ?>">
                                <button type="submit" class="xuBtnAct xuDel" title="Delete" onclick="return confirm('Are you sure you want to delete this member?')"><i class="fa fa-trash"></i> Hapus</button>
                            </form>
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
        if (tbl.hasClass('dataTable')) tbl.DataTable().destroy();
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
                {orderable:true, targets:[0,1,2]},
                {orderable:false, targets:[3,4,5]}
            ]
        });
    }
});
</script>