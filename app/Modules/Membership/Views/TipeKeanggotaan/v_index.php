<style>
/* ================================================================
   DIFOSS MEMBERSHIP TYPE — EMERALD FOREST EDITION
   ================================================================ */
:root{
    --mt-emerald:#059669; --mt-teal:#0891b2; --mt-gold:#f59e0b;
    --mt-mint:#6ee7b7; --mt-deep:#0a2920; --mt-mid:#064e3b;
    --mt-ink:#0f172a; --mt-muted:#64748b; --mt-soft:#94a3b8;
}

.xuR{opacity:0;transform:translateY(24px);transition:all .6s cubic-bezier(.2,.8,.2,1)}
.xuR.in{opacity:1;transform:none}

/* ===== KARTU ===== */
.xuMtCard{
    background:#fff;border-radius:22px;
    box-shadow:0 16px 44px rgba(15,23,42,.08);
    overflow:hidden;
    border:1px solid rgba(5,150,105,.12);
    margin-bottom:24px;
    transition:.35s cubic-bezier(.2,.8,.2,1);
}
.xuMtCard:hover{
    box-shadow:0 22px 54px rgba(5,150,105,.14);
    border-color:rgba(5,150,105,.22);
}
html.xu-dark .xuMtCard{background:#0f1e1f;border-color:rgba(5,150,105,.22);box-shadow:0 16px 44px rgba(0,0,0,.4)}

/* ===== HEADER ===== */
.xuMtHead{
    padding:24px 28px;
    background:linear-gradient(90deg,var(--mt-emerald),var(--mt-teal),var(--mt-gold),var(--mt-emerald));
    background-size:200% 100%;
    color:#fff;
    display:flex;align-items:center;justify-content:space-between;
    flex-wrap:wrap;gap:14px;
    animation:xuMtGrad 7s linear infinite;
    position:relative;overflow:hidden;
}
.xuMtHead::after{
    content:'';position:absolute;top:-60%;right:-8%;
    width:320px;height:320px;border-radius:50%;
    background:radial-gradient(circle,rgba(245,158,11,.25),transparent 70%);
    pointer-events:none;
}
@keyframes xuMtGrad{to{background-position:200% 0}}

.xuMtHead h2{
    margin:0;font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1.35rem;
    display:flex;align-items:center;gap:12px;
    color:#fff;letter-spacing:-.01em;
    position:relative;z-index:2;
}
.xuMtHead h2 i{
    width:42px;height:42px;border-radius:13px;
    background:rgba(255,255,255,.18);
    backdrop-filter:blur(8px);-webkit-backdrop-filter:blur(8px);
    display:inline-flex;align-items:center;justify-content:center;
    font-size:1.15rem;
    box-shadow:inset 0 1px 0 rgba(255,255,255,.2);
}

/* ===== TOMBOL ===== */
.xuBtnAdd{
    display:inline-flex;align-items:center;gap:8px;
    padding:9px 18px;border-radius:12px;
    font-weight:700;font-size:.82rem;
    text-decoration:none!important;
    transition:.25s;border:none;cursor:pointer;
    background:#fff;color:var(--mt-emerald);
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
.xuBtnAdd:hover{
    transform:translateY(-2px);
    filter:brightness(1.05);
    color:var(--mt-emerald);
    text-decoration:none;
}
.xuBtnAdd:hover::before{left:120%}

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
.xuBtnAct:hover{
    transform:translateY(-2px);
    filter:brightness(1.12);
    color:#fff!important;
    text-decoration:none;
}
.xuBtnAct:hover::before{left:120%}
.xuBtnAct i{color:#fff!important;font-size:.9rem!important}

.xuEdit{
    background:linear-gradient(90deg,var(--mt-emerald),var(--mt-gold));
    box-shadow:0 6px 14px rgba(5,150,105,.3);
}
.xuEdit:hover{box-shadow:0 10px 22px rgba(5,150,105,.4)}

/* ===== TABEL ===== */
.xuTableWrap{padding:22px 26px;overflow-x:auto}
.xuTable{width:100%;border-collapse:separate;border-spacing:0}

.xuTable thead th{
    background:linear-gradient(180deg,rgba(5,150,105,.08),rgba(5,150,105,.03));
    color:var(--mt-emerald);
    font-weight:800;font-size:.72rem;
    text-transform:uppercase;letter-spacing:.08em;
    padding:14px 16px;border:none;
    border-bottom:1.5px solid rgba(5,150,105,.2);
    white-space:nowrap;
}
html.xu-dark .xuTable thead th{
    background:linear-gradient(180deg,rgba(5,150,105,.15),rgba(5,150,105,.06));
    color:var(--mt-mint);border-bottom-color:rgba(5,150,105,.35);
}

.xuTable tbody td{
    padding:14px 16px;
    border-bottom:1px solid #f1f3f8;
    color:var(--mt-ink);font-size:.88rem;
    vertical-align:middle;
}
html.xu-dark .xuTable tbody td{border-bottom-color:rgba(5,150,105,.1);color:#e2e8f0}

.xuTable tbody tr{transition:.2s}
.xuTable tbody tr:hover{background:rgba(5,150,105,.04)}
.xuTable tbody tr:hover td:first-child{box-shadow:inset 4px 0 0 var(--mt-emerald)}
html.xu-dark .xuTable tbody tr:hover{background:rgba(5,150,105,.1)}
html.xu-dark .xuTable tbody tr:hover td:first-child{box-shadow:inset 4px 0 0 var(--mt-gold)}

/* Type name with icon */
.xuType{
    font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1rem;
    color:var(--mt-ink);
    display:inline-flex;align-items:center;gap:10px;
}
html.xu-dark .xuType{color:#f1f5f9}

.xuType i{
    width:34px;height:34px;border-radius:10px;
    background:linear-gradient(135deg,var(--mt-emerald),var(--mt-gold));
    color:#fff;
    display:inline-flex;align-items:center;justify-content:center;
    font-size:.9rem;flex-shrink:0;
    box-shadow:0 6px 14px rgba(5,150,105,.3);
    transition:.3s;
}
.xuTable tbody tr:hover .xuType i{transform:scale(1.08) rotate(-8deg)}

/* Number badges */
.xuNum{
    display:inline-flex;align-items:center;gap:6px;
    font-family:'JetBrains Mono',monospace;
    font-weight:800;color:var(--mt-emerald);
    background:rgba(5,150,105,.08);
    border:1px solid rgba(5,150,105,.2);
    padding:5px 13px;border-radius:10px;
    font-size:.85rem;
}
.xuNum i{font-size:.72rem;color:var(--mt-gold)}
html.xu-dark .xuNum{
    color:var(--mt-mint);
    background:rgba(5,150,105,.15);
    border-color:rgba(5,150,105,.35);
}
html.xu-dark .xuNum i{color:var(--mt-gold)}

/* Date */
.xuDate{
    color:var(--mt-muted);font-size:.8rem;
    display:inline-flex;align-items:center;gap:6px;
    font-family:'JetBrains Mono',monospace;font-weight:600;
}
.xuDate i{color:var(--mt-gold)}
html.xu-dark .xuDate{color:var(--mt-soft)}

/* ===== DATATABLES ===== */
.dataTables_wrapper .dataTables_filter input,
.dataTables_wrapper .dataTables_length select{
    border:1.5px solid #cbd5e1;border-radius:10px;
    padding:7px 12px;outline:none;transition:.2s;
    background:#f8fafc;color:var(--mt-ink);
    font-family:inherit;font-size:.85rem;
}
.dataTables_wrapper .dataTables_filter input:focus,
.dataTables_wrapper .dataTables_length select:focus{
    border-color:var(--mt-emerald);
    box-shadow:0 0 0 3px rgba(5,150,105,.12);
    background:#fff;
}
html.xu-dark .dataTables_wrapper .dataTables_filter input,
html.xu-dark .dataTables_wrapper .dataTables_length select{
    background:rgba(255,255,255,.05);border-color:rgba(5,150,105,.25);color:#f1f5f9;
}
html.xu-dark .dataTables_wrapper .dataTables_filter input:focus,
html.xu-dark .dataTables_wrapper .dataTables_length select:focus{
    border-color:var(--mt-gold);box-shadow:0 0 0 3px rgba(245,158,11,.15);
}

.dataTables_wrapper .dataTables_info{
    color:var(--mt-muted);font-size:.82rem;
    padding-top:14px;font-weight:500;
}
html.xu-dark .dataTables_wrapper .dataTables_info{color:var(--mt-soft)}

.dataTables_wrapper .dataTables_length label,
.dataTables_wrapper .dataTables_filter label{
    color:var(--mt-ink);font-weight:700;font-size:.85rem;
}
html.xu-dark .dataTables_wrapper .dataTables_length label,
html.xu-dark .dataTables_wrapper .dataTables_filter label{color:#e2e8f0}

.dataTables_wrapper .dataTables_paginate .paginate_button{
    color:var(--mt-muted)!important;
    border:1px solid transparent!important;
    border-radius:8px!important;
    margin:0 2px;transition:.2s;
}
.dataTables_wrapper .dataTables_paginate .paginate_button.current{
    background:linear-gradient(90deg,var(--mt-emerald),var(--mt-gold))!important;
    color:#fff!important;border:none!important;
    box-shadow:0 6px 14px rgba(5,150,105,.3)!important;
}
.dataTables_wrapper .dataTables_paginate .paginate_button:hover:not(.current):not(.disabled){
    background:rgba(5,150,105,.1)!important;color:var(--mt-emerald)!important;
    border-color:rgba(5,150,105,.25)!important;
}
.dataTables_wrapper .dataTables_paginate .paginate_button.disabled{opacity:.4;cursor:not-allowed}
html.xu-dark .dataTables_wrapper .dataTables_paginate .paginate_button{color:var(--mt-soft)!important}
html.xu-dark .dataTables_wrapper .dataTables_paginate .paginate_button:hover:not(.current):not(.disabled){
    background:rgba(5,150,105,.15)!important;color:var(--mt-mint)!important;
    border-color:rgba(5,150,105,.35)!important;
}

/* Empty state */
.dataTables_empty{
    text-align:center;padding:40px 20px!important;
    color:var(--mt-soft)!important;font-size:.92rem;font-weight:600;
    background:linear-gradient(135deg,rgba(5,150,105,.04),rgba(245,158,11,.02))!important;
}
.dataTables_empty i{
    font-size:2.2rem;color:var(--mt-emerald);
    display:block;margin-bottom:10px;
}

/* ===== RESPONSIVE ===== */
@media(max-width:720px){
    .xuMtHead{padding:18px 20px;flex-direction:column;align-items:flex-start}
    .xuMtHead h2{font-size:1.15rem}
    .xuBtnAdd{width:100%;justify-content:center;padding:9px 14px;font-size:.78rem}
    .xuTableWrap{padding:16px}
    .xuTable thead th,.xuTable tbody td{padding:10px 12px;font-size:.82rem}
    .xuType{font-size:.9rem}
    .xuType i{width:30px;height:30px;font-size:.8rem}
}
</style>

<div class="xuMtCard xuR">
    <div class="xuMtHead">
        <h2><i class="fa fa-id-badge"></i> Membership Type</h2>
        <button onclick="moveTo('<?= base_url('membership/addtype') ?>')" class="xuBtnAdd">
            <i class="fa fa-plus"></i> Add New Membership Type
        </button>
    </div>
    <div class="xuTableWrap">
        <table class="table xuTable responsive dt-responsive" id="xuDataTable" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Membership Type</th>
                    <th style="width:130px;text-align:center">Loan Amount</th>
                    <th style="width:200px;text-align:center">Membership Duration (In Days)</th>
                    <th style="width:170px;text-align:center">Number of Renewals</th>
                    <th style="width:180px">Last Modified</th>
                    <th style="width:110px;text-align:center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($data)): ?>
                    <tr>
                        <td colspan="6" style="text-align:center;padding:50px 20px;color:var(--mt-soft)">
                            <i class="fa fa-id-badge" style="font-size:2.2rem;color:var(--mt-emerald);display:block;margin-bottom:10px"></i>
                            <b>Belum ada tipe keanggotaan.</b><br>
                            <small>Klik "Add New Membership Type" untuk mulai menambahkan.</small>
                        </td>
                    </tr>
                <?php else: foreach ($data as $value): ?>
                    <tr>
                        <td><span class="xuType"><i class="fa fa-users"></i> <?= esc($value->member_type_name) ?></span></td>
                        <td style="text-align:center"><span class="xuNum"><i class="fa fa-book"></i> <?= (int) $value->loan_limit ?></span></td>
                        <td style="text-align:center"><span class="xuNum"><i class="fa fa-calendar"></i> <?= (int) $value->member_periode ?></span></td>
                        <td style="text-align:center"><span class="xuNum"><i class="fa fa-refresh"></i> <?= (int) $value->reborrow_limit ?></span></td>
                        <td><span class="xuDate"><i class="fa fa-clock-o"></i> <?= esc($value->last_update) ?></span></td>
                        <td style="text-align:center">
                            <a class="xuBtnAct xuEdit" href="<?= base_url("membership/edittype/?mt={$value->member_type_id}") ?>" title="Edit">
                                <i class="fa fa-pencil"></i> Edit
                            </a>
                        </td>
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
                info:"Menampilkan _START_ - _END_ dari _TOTAL_ tipe",
                infoEmpty:"Tidak ada data",
                emptyTable:"Belum ada tipe keanggotaan",
                zeroRecords:"Tidak ditemukan hasil yang cocok",
                paginate:{previous:"‹",next:"›"}
            },
            pageLength:10,
            responsive:true,
            order:[],
            columnDefs:[
                {orderable:true, targets:[0,1,2,3]},
                {orderable:false, targets:[4,5]}
            ]
        });
    }
});
</script>