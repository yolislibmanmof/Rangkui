<style>
/* ================================================================
   DIFOSS DAFTAR PUSTAKAWAN — EMERALD FOREST EDITION
   ================================================================ */
:root{
    --us-emerald:#059669; --us-teal:#0891b2; --us-gold:#f59e0b;
    --us-mint:#6ee7b7; --us-deep:#0a2920;
    --us-ink:#0f172a; --us-muted:#64748b; --us-soft:#94a3b8;
    --us-danger:#dc2626;
}

.xuR{opacity:0;transform:translateY(24px);transition:all .6s cubic-bezier(.2,.8,.2,1)}
.xuR.in{opacity:1;transform:none}

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

.xuCrudHead{
    padding:22px 28px;
    background:linear-gradient(90deg,var(--us-emerald),var(--us-teal),var(--us-gold),var(--us-emerald));
    background-size:200% 100%;
    color:#fff;
    display:flex;align-items:center;justify-content:space-between;
    flex-wrap:wrap;gap:14px;
    animation:xuUsGrad 7s linear infinite;
    position:relative;overflow:hidden;
}
.xuCrudHead::after{
    content:'';position:absolute;top:-60%;right:-8%;
    width:320px;height:320px;border-radius:50%;
    background:radial-gradient(circle,rgba(245,158,11,.25),transparent 70%);
    pointer-events:none;
}
@keyframes xuUsGrad{to{background-position:200% 0}}

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

.xuBtnAdd{
    display:inline-flex;align-items:center;gap:8px;
    padding:9px 18px;border-radius:12px;
    font-weight:700;font-size:.82rem;
    text-decoration:none!important;
    transition:.25s;border:none;cursor:pointer;
    background:#fff;color:var(--us-emerald);
    box-shadow:0 8px 20px rgba(0,0,0,.15);
    position:relative;overflow:hidden;
    font-family:inherit;z-index:2;
}
.xuBtnAdd::before{
    content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;
    background:linear-gradient(100deg,transparent 20%,rgba(5,150,105,.15) 50%,transparent 80%);
    transition:left .6s ease;
}
.xuBtnAdd:hover{transform:translateY(-2px);filter:brightness(1.05);color:var(--us-emerald);text-decoration:none}
.xuBtnAdd:hover::before{left:120%}

/* ===== STAT CHIPS ===== */
.xuStatRow{display:flex;flex-wrap:wrap;gap:10px;padding:20px 24px 0}

.xuStatChip{
    display:inline-flex;align-items:center;gap:10px;
    padding:10px 16px;border-radius:12px;
    background:linear-gradient(135deg,rgba(5,150,105,.05),rgba(245,158,11,.02));
    border:1.5px solid rgba(5,150,105,.2);
    font-size:.82rem;font-weight:700;
    color:var(--us-muted);
    transition:.25s;
    font-family:inherit;
}
.xuStatChip:hover{border-color:rgba(5,150,105,.4);transform:translateY(-1px);box-shadow:0 6px 14px rgba(5,150,105,.1)}
.xuStatChip b{
    font-family:'JetBrains Mono',monospace;
    color:var(--us-ink);font-size:1rem;
    font-weight:800;letter-spacing:-.01em;
    font-variant-numeric:tabular-nums;
}
.xuStatChip .dot{
    width:12px;height:12px;border-radius:4px;
    background:var(--c,#059669);
    flex-shrink:0;
    box-shadow:0 0 8px var(--c,#059669);
}
.xuStatChip > i{color:var(--us-emerald);font-size:.95rem}
html.xu-dark .xuStatChip{
    background:linear-gradient(135deg,rgba(5,150,105,.1),rgba(245,158,11,.04));
    border-color:rgba(5,150,105,.3);color:var(--us-soft);
}
html.xu-dark .xuStatChip b{color:#f1f5f9}

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

.xuEdit{background:linear-gradient(90deg,var(--us-emerald),var(--us-gold));box-shadow:0 6px 14px rgba(5,150,105,.3)}
.xuEdit:hover{box-shadow:0 10px 22px rgba(5,150,105,.4)}
.xuDel{background:linear-gradient(90deg,#ef4444,#dc2626);box-shadow:0 6px 14px rgba(239,68,68,.3)}
.xuDel:hover{box-shadow:0 10px 22px rgba(239,68,68,.4)}

/* ===== TABEL ===== */
.xuTableWrap{padding:22px 26px;overflow-x:auto}
.xuTable{width:100%;border-collapse:separate;border-spacing:0}

.xuTable thead th{
    background:linear-gradient(180deg,rgba(5,150,105,.08),rgba(5,150,105,.03));
    color:var(--us-emerald);
    font-weight:800;font-size:.72rem;
    text-transform:uppercase;letter-spacing:.08em;
    padding:14px 16px;border:none;
    border-bottom:1.5px solid rgba(5,150,105,.2);
    white-space:nowrap;text-align:left;
}
html.xu-dark .xuTable thead th{
    background:linear-gradient(180deg,rgba(5,150,105,.15),rgba(5,150,105,.06));
    color:var(--us-mint);border-bottom-color:rgba(5,150,105,.35);
}

.xuTable tbody td{
    padding:14px 16px;
    border-bottom:1px solid #f1f3f8;
    color:var(--us-muted);font-size:.88rem;
    vertical-align:middle;
}
html.xu-dark .xuTable tbody td{border-bottom-color:rgba(5,150,105,.1);color:#cbd5e1}

.xuTable tbody tr{transition:.2s}
.xuTable tbody tr:hover{background:rgba(5,150,105,.05)}
.xuTable tbody tr:hover td:first-child{box-shadow:inset 4px 0 0 var(--us-emerald)}
html.xu-dark .xuTable tbody tr:hover{background:rgba(5,150,105,.1)}
html.xu-dark .xuTable tbody tr:hover td:first-child{box-shadow:inset 4px 0 0 var(--us-gold)}

.xuNo{
    display:inline-flex;align-items:center;justify-content:center;
    width:32px;height:32px;border-radius:10px;
    background:rgba(5,150,105,.1);
    border:1px solid rgba(5,150,105,.2);
    color:var(--us-emerald);
    font-family:'JetBrains Mono',monospace;
    font-weight:700;font-size:.82rem;
}
html.xu-dark .xuNo{color:var(--us-mint);background:rgba(5,150,105,.15);border-color:rgba(5,150,105,.35)}

/* Avatar */
.xuAvatar{
    width:36px;height:36px;border-radius:50%;
    background:linear-gradient(135deg,var(--us-emerald),var(--us-gold));
    color:#fff;font-weight:800;font-size:.85rem;
    display:inline-flex;align-items:center;justify-content:center;
    flex-shrink:0;
    box-shadow:0 6px 14px rgba(5,150,105,.3);
    font-family:'Neuton',Georgia,serif;
    border:2px solid rgba(255,255,255,.25);
    transition:.3s;
}
.xuTable tbody tr:hover .xuAvatar{transform:scale(1.1) rotate(-6deg);box-shadow:0 10px 22px rgba(245,158,11,.4)}

.xuName{
    font-family:'Neuton',Georgia,serif;
    font-weight:700;color:var(--us-ink);
    display:inline-flex;align-items:center;gap:10px;
    font-size:.98rem;
}
html.xu-dark .xuName{color:#f1f5f9}

.xuUser{
    font-family:'JetBrains Mono',monospace;
    font-weight:800;color:var(--us-emerald);
    background:rgba(5,150,105,.08);
    border:1px solid rgba(5,150,105,.2);
    padding:5px 12px;border-radius:9px;
    font-size:.82rem;letter-spacing:.02em;
    display:inline-flex;align-items:center;gap:6px;
}
.xuUser i{color:var(--us-gold);font-size:.72rem}
html.xu-dark .xuUser{color:var(--us-mint);background:rgba(5,150,105,.15);border-color:rgba(5,150,105,.35)}

.xuBadge{
    display:inline-flex;align-items:center;gap:6px;
    padding:5px 12px;border-radius:999px;
    font-size:.72rem;font-weight:800;
    letter-spacing:.03em;
    border:1px solid transparent;
}

.xuDate{
    color:var(--us-muted);
    font-family:'JetBrains Mono',monospace;
    font-size:.8rem;font-weight:600;
    display:inline-flex;align-items:center;gap:6px;
    white-space:nowrap;
}
.xuDate i{color:var(--us-gold);font-size:.78rem}
html.xu-dark .xuDate{color:var(--us-soft)}

.xuNever{
    color:var(--us-soft);
    font-size:.8rem;font-style:italic;
    display:inline-flex;align-items:center;gap:5px;
}
.xuNever::before{content:'—'}
html.xu-dark .xuNever{color:var(--us-soft)}

.xuEmptyRow td{
    text-align:center;padding:50px 20px!important;
    color:var(--us-soft)!important;font-size:.92rem;font-weight:600;
    background:linear-gradient(135deg,rgba(5,150,105,.04),rgba(245,158,11,.02))!important;
}
.xuEmptyRow i{font-size:2.2rem;color:var(--us-emerald);display:block;margin-bottom:10px}

/* ===== DATATABLES ===== */
.dataTables_wrapper .dataTables_filter input,
.dataTables_wrapper .dataTables_length select{
    border:1.5px solid #cbd5e1;border-radius:10px;
    padding:7px 12px;outline:none;transition:.2s;
    background:#f8fafc;color:var(--us-ink);
    font-family:inherit;font-size:.85rem;
}
.dataTables_wrapper .dataTables_filter input:focus,
.dataTables_wrapper .dataTables_length select:focus{
    border-color:var(--us-emerald);
    box-shadow:0 0 0 3px rgba(5,150,105,.12);
    background:#fff;
}
html.xu-dark .dataTables_wrapper .dataTables_filter input,
html.xu-dark .dataTables_wrapper .dataTables_length select{
    background:rgba(255,255,255,.05);border-color:rgba(5,150,105,.25);color:#f1f5f9;
}
html.xu-dark .dataTables_wrapper .dataTables_filter input:focus,
html.xu-dark .dataTables_wrapper .dataTables_length select:focus{
    border-color:var(--us-gold);box-shadow:0 0 0 3px rgba(245,158,11,.15);
}

.dataTables_wrapper .dataTables_info{color:var(--us-muted);font-size:.82rem;padding-top:14px;font-weight:500}
html.xu-dark .dataTables_wrapper .dataTables_info{color:var(--us-soft)}
.dataTables_wrapper .dataTables_length label,
.dataTables_wrapper .dataTables_filter label{color:var(--us-ink);font-weight:700;font-size:.85rem}
html.xu-dark .dataTables_wrapper .dataTables_length label,
html.xu-dark .dataTables_wrapper .dataTables_filter label{color:#e2e8f0}

.dataTables_wrapper .dataTables_paginate .paginate_button{
    color:var(--us-muted)!important;
    border:1px solid transparent!important;
    border-radius:8px!important;margin:0 2px;transition:.2s;
}
.dataTables_wrapper .dataTables_paginate .paginate_button.current{
    background:linear-gradient(90deg,var(--us-emerald),var(--us-gold))!important;
    color:#fff!important;border:none!important;
    box-shadow:0 6px 14px rgba(5,150,105,.3)!important;
}
.dataTables_wrapper .dataTables_paginate .paginate_button:hover:not(.current):not(.disabled){
    background:rgba(5,150,105,.1)!important;color:var(--us-emerald)!important;
    border-color:rgba(5,150,105,.25)!important;
}
.dataTables_wrapper .dataTables_paginate .paginate_button.disabled{opacity:.4;cursor:not-allowed}
html.xu-dark .dataTables_wrapper .dataTables_paginate .paginate_button{color:var(--us-soft)!important}
html.xu-dark .dataTables_wrapper .dataTables_paginate .paginate_button:hover:not(.current):not(.disabled){
    background:rgba(5,150,105,.15)!important;color:var(--us-mint)!important;
    border-color:rgba(5,150,105,.35)!important;
}

@media(max-width:720px){
    .xuCrudHead{padding:18px 20px;flex-direction:column;align-items:flex-start}
    .xuCrudHead h2{font-size:1.15rem}
    .xuBtnAdd{width:100%;justify-content:center}
    .xuStatRow{padding:14px 16px 0;gap:8px}
    .xuStatChip{flex:1;min-width:130px;padding:8px 12px;font-size:.76rem;justify-content:center}
    .xuTableWrap{padding:16px}
    .xuTable thead th,.xuTable tbody td{padding:10px 12px;font-size:.8rem}
    .xuAvatar{width:32px;height:32px;font-size:.78rem}
}
</style>

<?php
// Palet Emerald Forest untuk badge tipe user
$__palette = ['#059669', '#0891b2', '#f59e0b', '#d97706', '#7c3aed', '#0284c7', '#db2777', '#14b8a6'];
$__typeCount = [];
foreach ($user as $__u) {
    $__t = getTypeUser($__u->user_type);
    $__typeCount[$__t] = ($__typeCount[$__t] ?? 0) + 1;
}
$__typeColor = [];
$__ci = 0;
foreach ($__typeCount as $__t => $__c) {
    $__typeColor[$__t] = $__palette[$__ci % count($__palette)];
    $__ci++;
}
?>

<div class="xuCrudCard xuR">
    <div class="xuCrudHead">
        <h2><i class="fa fa-user-secret"></i> Daftar Pustakawan</h2>
        <a href="<?= base_url('sistem/pustakawan/add'); ?>" class="xuBtnAdd">
            <i class="fa fa-plus"></i> Tambahkan Pengguna Baru
        </a>
    </div>

    <!-- Ringkasan statistik pengguna -->
    <div class="xuStatRow">
        <span class="xuStatChip"><i class="fa fa-users"></i> Total: <b><?= count($user) ?></b></span>
        <?php foreach ($__typeCount as $__t => $__c) : ?>
            <span class="xuStatChip" style="--c:<?= $__typeColor[$__t] ?>"><span class="dot"></span> <?= esc($__t) ?>: <b><?= $__c ?></b></span>
        <?php endforeach ?>
    </div>

    <div class="xuTableWrap">
        <table class="table xuTable responsive dt-responsive nowrap" id="xuDataTable" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th style="width:60px">No</th>
                    <th>Nama Asli</th>
                    <th>Nama Masuk Pengguna</th>
                    <th>Tipe Keanggotaan</th>
                    <th>Terakhir Kali Masuk</th>
                    <th>Perubahan Terakhir</th>
                    <th style="width:190px;text-align:center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($user)): ?>
                    <tr class="xuEmptyRow">
                        <td colspan="7">
                            <i class="fa fa-user-secret"></i>
                            <b>Belum ada pustakawan.</b><br>
                            <small>Klik "Tambahkan Pengguna Baru" untuk membuat akun.</small>
                        </td>
                    </tr>
                <?php else:
                    $i = 1;
                    foreach ($user as $key => $val):
                        $__tn = getTypeUser($val->user_type);
                        $__tc = $__typeColor[$__tn] ?? '#64748b';
                ?>
                    <tr>
                        <td><span class="xuNo"><?= $i++; ?></span></td>
                        <td>
                            <span class="xuName">
                                <span class="xuAvatar"><?= esc(strtoupper(substr(trim($val->realname), 0, 1))) ?></span>
                                <?= esc($val->realname); ?>
                            </span>
                        </td>
                        <td><span class="xuUser"><i class="fa fa-at"></i> <?= esc($val->username); ?></span></td>
                        <td>
                            <span class="xuBadge" style="color:<?= $__tc ?>;background:<?= $__tc ?>1a;border-color:<?= $__tc ?>33">
                                <i class="fa fa-id-badge"></i> <?= esc($__tn); ?>
                            </span>
                        </td>
                        <td>
                            <?php if (!empty($val->last_login)) : ?>
                                <span class="xuDate"><i class="fa fa-clock-o"></i> <?= esc($val->last_login); ?></span>
                            <?php else : ?>
                                <span class="xuNever">Belum pernah masuk</span>
                            <?php endif; ?>
                        </td>
                        <td><span class="xuDate"><i class="fa fa-history"></i> <?= esc($val->last_update); ?></span></td>
                        <td style="text-align:center;white-space:nowrap">
                            <a href="<?= base_url('sistem/pustakawan/edit/' . $val->user_id); ?>" class="xuBtnAct xuEdit" title="Edit">
                                <i class="fa fa-pencil"></i> Edit
                            </a>
                            <button type="button" class="xuBtnAct xuDel" title="Hapus" onclick="showConfirm(<?= $val->user_id ?>)">
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
        var tbl = $('#xuDataTable');
        if ($.fn.dataTable.isDataTable && $.fn.dataTable.isDataTable(tbl)){ tbl.DataTable().destroy(); }
        tbl.DataTable({
            language:{
                search:"Cari:",lengthMenu:"Tampilkan _MENU_ data",
                info:"Menampilkan _START_ - _END_ dari _TOTAL_ pengguna",
                infoEmpty:"Tidak ada data",emptyTable:"Tidak ada data pengguna",
                zeroRecords:"Tidak ditemukan hasil yang cocok",
                paginate:{previous:"‹",next:"›"}
            },
            pageLength:10,responsive:true,order:[[0,'asc']],
            columnDefs:[
                {orderable:true, targets:[0,1,2,3,4,5]},
                {orderable:false, targets:[6]}
            ]
        });
    }
});

// ===== Function showConfirm untuk delete =====
function showConfirm(id){
    if (confirm('Apakah Anda yakin ingin menghapus pengguna ini?\nID: ' + id + '\n\nData yang dihapus tidak dapat dikembalikan.')){
        var f = document.createElement('form');
        f.method = 'POST';
        f.action = baseUrl + 'sistem/pustakawan/delete';
        f.innerHTML = '<input type="hidden" name="id" value="' + id + '"><?= csrf_field() ?>';
        document.body.appendChild(f);
        f.submit();
    }
}
</script>