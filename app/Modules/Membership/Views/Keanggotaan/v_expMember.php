<style>
/* ================================================================
   DIFOSS EXPIRED MEMBERS — EMERALD FOREST EDITION
   ================================================================ */
:root{
    --ex-emerald:#059669; --ex-teal:#0891b2; --ex-gold:#f59e0b;
    --ex-mint:#6ee7b7; --ex-deep:#0a2920; --ex-mid:#064e3b;
    --ex-ink:#0f172a; --ex-muted:#64748b; --ex-soft:#94a3b8;
    --ex-danger:#dc2626;
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

/* ===== HEADER ===== */
.xuCrudHead{
    padding:24px 28px;
    background:linear-gradient(90deg,var(--ex-emerald),var(--ex-teal),var(--ex-gold),var(--ex-emerald));
    background-size:200% 100%;
    color:#fff;
    display:flex;align-items:center;justify-content:space-between;
    flex-wrap:wrap;gap:14px;
    animation:xuExGrad 7s linear infinite;
    position:relative;overflow:hidden;
}
.xuCrudHead::after{
    content:'';position:absolute;top:-60%;right:-8%;
    width:320px;height:320px;border-radius:50%;
    background:radial-gradient(circle,rgba(245,158,11,.25),transparent 70%);
    pointer-events:none;
}
@keyframes xuExGrad{to{background-position:200% 0}}

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

.xuCrudBtns{
    display:flex;gap:10px;flex-wrap:wrap;
    position:relative;z-index:2;
}

/* ===== TOMBOL ===== */
.xuBtnAdd{
    display:inline-flex;align-items:center;gap:8px;
    padding:9px 18px;border-radius:12px;
    font-weight:700;font-size:.82rem;
    text-decoration:none!important;
    transition:.25s;border:none;cursor:pointer;
    background:#fff;color:var(--ex-emerald);
    box-shadow:0 8px 20px rgba(0,0,0,.15);
    position:relative;overflow:hidden;
    font-family:inherit;
}
.xuBtnAdd::before{
    content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;
    background:linear-gradient(100deg,transparent 20%,rgba(5,150,105,.15) 50%,transparent 80%);
    transition:left .6s ease;
}
.xuBtnAdd:hover{
    transform:translateY(-2px);
    filter:brightness(1.05);
    color:var(--ex-emerald);
    text-decoration:none;
}
.xuBtnAdd:hover::before{left:120%}

.xuBtnBack{
    background:rgba(255,255,255,.12)!important;
    color:#fff!important;
    border:1.5px solid rgba(255,255,255,.3)!important;
    backdrop-filter:blur(8px);-webkit-backdrop-filter:blur(8px);
}
.xuBtnBack:hover{
    background:rgba(255,255,255,.22)!important;
    color:#fff!important;
    border-color:rgba(255,255,255,.5)!important;
}

.xuBtnAct{
    padding:7px 14px;font-size:.78rem;
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
.xuBtnAct:hover{
    transform:translateY(-2px);
    filter:brightness(1.12);
    color:#fff!important;
}
.xuBtnAct:hover::before{left:120%}

.xuRenew{
    background:linear-gradient(90deg,var(--ex-emerald),var(--ex-gold));
    box-shadow:0 6px 16px rgba(5,150,105,.3);
}
.xuRenew:hover{box-shadow:0 10px 22px rgba(5,150,105,.4)}

.xuEdit{
    background:linear-gradient(90deg,var(--ex-teal),var(--ex-emerald));
    box-shadow:0 6px 16px rgba(8,145,178,.3);
}

/* ===== TABEL ===== */
.xuTableWrap{padding:22px 26px;overflow-x:auto}

.xuTable{
    width:100%;border-collapse:separate;border-spacing:0;
}
.xuTable thead th{
    background:linear-gradient(180deg,rgba(5,150,105,.08),rgba(5,150,105,.03));
    color:var(--ex-emerald);
    font-weight:800;font-size:.72rem;
    text-transform:uppercase;letter-spacing:.08em;
    padding:14px 16px;border:none;
    border-bottom:1.5px solid rgba(5,150,105,.2);
    white-space:nowrap;
    text-align:left;
}
html.xu-dark .xuTable thead th{
    background:linear-gradient(180deg,rgba(5,150,105,.15),rgba(5,150,105,.06));
    color:var(--ex-mint);
    border-bottom-color:rgba(5,150,105,.35);
}

.xuTable tbody td{
    padding:14px 16px;
    border-bottom:1px solid #f1f3f8;
    color:var(--ex-ink);font-size:.88rem;
    vertical-align:middle;
}
html.xu-dark .xuTable tbody td{border-bottom-color:rgba(5,150,105,.1);color:#e2e8f0}

.xuTable tbody tr{transition:.2s}
.xuTable tbody tr:hover{background:rgba(5,150,105,.04)}
.xuTable tbody tr:hover td:first-child{box-shadow:inset 4px 0 0 var(--ex-emerald)}
html.xu-dark .xuTable tbody tr:hover{background:rgba(5,150,105,.1)}
html.xu-dark .xuTable tbody tr:hover td:first-child{box-shadow:inset 4px 0 0 var(--ex-gold)}

/* Badge Member ID */
.xuMid{
    font-family:'JetBrains Mono',monospace;
    font-weight:700;color:var(--ex-emerald);
    background:rgba(5,150,105,.08);
    border:1px solid rgba(5,150,105,.2);
    padding:4px 10px;border-radius:8px;
    font-size:.8rem;
}
html.xu-dark .xuMid{
    color:var(--ex-mint);
    background:rgba(5,150,105,.15);
    border-color:rgba(5,150,105,.35);
}

/* Nama */
.xuName{
    font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1rem;
    color:var(--ex-ink);
}
html.xu-dark .xuName{color:#f1f5f9}

/* Badge Type */
.xuType{
    display:inline-flex;align-items:center;gap:5px;
    padding:4px 11px;border-radius:999px;
    font-size:.72rem;font-weight:800;
    letter-spacing:.03em;
    background:rgba(245,158,11,.12);
    color:var(--ex-gold);
    border:1px solid rgba(245,158,11,.3);
}
html.xu-dark .xuType{background:rgba(245,158,11,.18);color:#fde68a;border-color:rgba(245,158,11,.4)}

/* Email */
.xuEmail{
    color:var(--ex-muted);font-size:.83rem;
    display:inline-flex;align-items:center;gap:6px;
}
.xuEmail i{color:var(--ex-teal);font-size:.85rem}
html.xu-dark .xuEmail{color:var(--ex-soft)}
html.xu-dark .xuEmail i{color:var(--ex-mint)}

/* Last Update (warning expired) */
.xuDate{
    color:var(--ex-gold);
    font-size:.82rem;font-weight:700;
    display:inline-flex;align-items:center;gap:6px;
    font-family:'JetBrains Mono',monospace;
    padding:3px 10px;border-radius:8px;
    background:rgba(245,158,11,.08);
    border:1px solid rgba(245,158,11,.2);
}
.xuDate i{color:#dc2626}
html.xu-dark .xuDate{color:#fde68a;background:rgba(245,158,11,.15);border-color:rgba(245,158,11,.35)}

/* ===== DATATABLES OVERRIDES ===== */
.dataTables_wrapper .dataTables_filter input,
.dataTables_wrapper .dataTables_length select{
    border:1.5px solid #cbd5e1;
    border-radius:10px;padding:7px 12px;
    outline:none;transition:.2s;
    background:#f8fafc;color:var(--ex-ink);
    font-family:inherit;font-size:.85rem;
}
.dataTables_wrapper .dataTables_filter input:focus,
.dataTables_wrapper .dataTables_length select:focus{
    border-color:var(--ex-emerald);
    box-shadow:0 0 0 3px rgba(5,150,105,.12);
    background:#fff;
}
html.xu-dark .dataTables_wrapper .dataTables_filter input,
html.xu-dark .dataTables_wrapper .dataTables_length select{
    background:rgba(255,255,255,.05);
    border-color:rgba(5,150,105,.25);
    color:#f1f5f9;
}
html.xu-dark .dataTables_wrapper .dataTables_filter input:focus,
html.xu-dark .dataTables_wrapper .dataTables_length select:focus{
    border-color:var(--ex-gold);
    box-shadow:0 0 0 3px rgba(245,158,11,.15);
}

.dataTables_wrapper .dataTables_info{
    color:var(--ex-muted);font-size:.82rem;
    padding-top:14px;font-weight:500;
}
html.xu-dark .dataTables_wrapper .dataTables_info{color:var(--ex-soft)}

.dataTables_wrapper .dataTables_length label,
.dataTables_wrapper .dataTables_filter label{
    color:var(--ex-ink);font-weight:700;font-size:.85rem;
}
html.xu-dark .dataTables_wrapper .dataTables_length label,
html.xu-dark .dataTables_wrapper .dataTables_filter label{color:#e2e8f0}

.dataTables_wrapper .dataTables_paginate .paginate_button{
    color:var(--ex-muted)!important;
    border:1px solid transparent!important;
    border-radius:8px!important;
    margin:0 2px;
    transition:.2s;
}
.dataTables_wrapper .dataTables_paginate .paginate_button.current{
    background:linear-gradient(90deg,var(--ex-emerald),var(--ex-gold))!important;
    color:#fff!important;
    border:none!important;
    box-shadow:0 6px 14px rgba(5,150,105,.3)!important;
}
.dataTables_wrapper .dataTables_paginate .paginate_button:hover:not(.current):not(.disabled){
    background:rgba(5,150,105,.1)!important;
    color:var(--ex-emerald)!important;
    border-color:rgba(5,150,105,.25)!important;
}
.dataTables_wrapper .dataTables_paginate .paginate_button.disabled{
    opacity:.4;cursor:not-allowed;
}
html.xu-dark .dataTables_wrapper .dataTables_paginate .paginate_button{color:var(--ex-soft)!important}
html.xu-dark .dataTables_wrapper .dataTables_paginate .paginate_button:hover:not(.current):not(.disabled){
    background:rgba(5,150,105,.15)!important;
    color:var(--ex-mint)!important;
    border-color:rgba(5,150,105,.35)!important;
}

/* Empty state */
.dataTables_empty{
    text-align:center;padding:40px 20px!important;
    color:var(--ex-soft)!important;
    font-size:.92rem;font-weight:600;
    background:linear-gradient(135deg,rgba(5,150,105,.04),rgba(245,158,11,.02))!important;
}

/* ===== MODAL PERPANJANGAN ===== */
#modal_action .modal-dialog{max-width:520px}
#modal_action .modal-content{
    border:none;border-radius:20px;
    overflow:hidden;
    box-shadow:0 30px 70px rgba(0,0,0,.4);
    border:1px solid rgba(5,150,105,.2);
}
html.xu-dark #modal_action .modal-content{background:#0f1e1f;border-color:rgba(5,150,105,.3)}

#modal_action .modal-header{
    background:linear-gradient(90deg,var(--ex-emerald),var(--ex-teal),var(--ex-gold));
    background-size:200% 100%;
    color:#fff;border:none;
    padding:20px 26px;
    position:relative;overflow:hidden;
    animation:xuExGrad 7s linear infinite;
}
#modal_action .modal-header::after{
    content:'';position:absolute;top:-50%;right:-8%;
    width:200px;height:200px;border-radius:50%;
    background:radial-gradient(circle,rgba(255,255,255,.15),transparent 70%);
    pointer-events:none;
}

#modal_action .modal-title{
    color:#fff;
    font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1.15rem;
    display:flex;align-items:center;gap:11px;
    position:relative;z-index:2;
}
#modal_action .modal-title i{
    width:34px;height:34px;border-radius:10px;
    background:rgba(255,255,255,.18);
    backdrop-filter:blur(8px);-webkit-backdrop-filter:blur(8px);
    display:inline-flex;align-items:center;justify-content:center;
    font-size:.95rem;
    box-shadow:inset 0 1px 0 rgba(255,255,255,.2);
}

#modal_action .close{
    color:#fff;opacity:.9;
    width:32px;height:32px;border-radius:10px;
    background:rgba(255,255,255,.15);
    backdrop-filter:blur(8px);
    border:1px solid rgba(255,255,255,.25);
    display:flex;align-items:center;justify-content:center;
    transition:.25s;
    position:relative;z-index:2;
    margin:0;padding:0;
    text-shadow:none;
}
#modal_action .close:hover{background:rgba(255,255,255,.28);transform:rotate(90deg)}
#modal_action .close span{font-size:1.4rem;line-height:1;margin-top:-2px}

#modal_action .modal-body{padding:26px 26px 20px}

/* Info member terpilih di modal */
.xuModalMember{
    background:linear-gradient(135deg,rgba(5,150,105,.08),rgba(245,158,11,.04));
    border:1.5px solid rgba(5,150,105,.2);
    border-radius:13px;
    padding:14px 16px;margin-bottom:18px;
    display:flex;align-items:center;gap:12px;
}
.xuModalMember .mmIco{
    width:40px;height:40px;border-radius:11px;
    background:linear-gradient(135deg,var(--ex-emerald),var(--ex-gold));
    color:#fff;
    display:flex;align-items:center;justify-content:center;
    font-size:1rem;flex-shrink:0;
    box-shadow:0 6px 14px rgba(5,150,105,.3);
}
.xuModalMember .mmInfo{min-width:0;flex:1}
.xuModalMember .mmName{
    font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1rem;color:var(--ex-ink);
    margin-bottom:2px;
    overflow:hidden;text-overflow:ellipsis;white-space:nowrap;
}
.xuModalMember .mmId{
    font-family:'JetBrains Mono',monospace;
    font-size:.72rem;color:var(--ex-muted);
    font-weight:700;letter-spacing:.03em;
}
html.xu-dark .xuModalMember{background:linear-gradient(135deg,rgba(5,150,105,.15),rgba(245,158,11,.08));border-color:rgba(5,150,105,.35)}
html.xu-dark .xuModalMember .mmName{color:#f1f5f9}
html.xu-dark .xuModalMember .mmId{color:var(--ex-soft)}

#modal_action label{
    font-weight:800;font-size:.74rem;
    color:var(--ex-ink);margin-bottom:8px;display:block;
    text-transform:uppercase;letter-spacing:.08em;
}
html.xu-dark #modal_action label{color:#e2e8f0}

#modal_action .form-control{
    width:100%;padding:12px 15px;
    border:1.5px solid #cbd5e1;
    border-radius:12px;font-size:.92rem;
    outline:none;background:#f8fafc;
    color:var(--ex-ink);
    font-family:inherit;
    transition:.25s;
}
#modal_action .form-control:focus{
    border-color:var(--ex-emerald);
    background:#fff;
    box-shadow:0 0 0 4px rgba(5,150,105,.12);
}
html.xu-dark #modal_action .form-control{
    background:rgba(255,255,255,.05);
    border-color:rgba(5,150,105,.25);
    color:#f1f5f9;
}
html.xu-dark #modal_action .form-control:focus{
    border-color:var(--ex-gold);
    background:rgba(255,255,255,.08);
    box-shadow:0 0 0 4px rgba(245,158,11,.15);
}

/* Hint tanggal */
.xuDateHint{
    font-size:.75rem;color:var(--ex-muted);
    margin-top:6px;font-weight:600;
    display:flex;align-items:center;gap:5px;
}
html.xu-dark .xuDateHint{color:var(--ex-soft)}

#modal_action .modal-footer{
    border-top:1.5px dashed rgba(5,150,105,.15);
    padding:16px 26px;
    display:flex;gap:10px;justify-content:flex-end;
}
html.xu-dark #modal_action .modal-footer{border-top-color:rgba(5,150,105,.25)}

#modal_action .btn-secondary{
    background:rgba(5,150,105,.08);
    color:var(--ex-emerald);
    border:1.5px solid rgba(5,150,105,.25);
    border-radius:11px;
    padding:10px 20px;font-weight:700;
    font-size:.88rem;cursor:pointer;
    transition:.25s;font-family:inherit;
}
#modal_action .btn-secondary:hover{
    background:rgba(5,150,105,.14);
    border-color:rgba(5,150,105,.4);
}
html.xu-dark #modal_action .btn-secondary{
    background:rgba(5,150,105,.12);
    color:var(--ex-mint);
    border-color:rgba(5,150,105,.3);
}
html.xu-dark #modal_action .btn-secondary:hover{
    background:rgba(5,150,105,.18);
    border-color:rgba(245,158,11,.4);
}

#modal_action .btn-primary{
    background:linear-gradient(90deg,var(--ex-emerald),var(--ex-gold));
    border:none;border-radius:11px;
    padding:10px 22px;font-weight:700;
    color:#fff;font-size:.88rem;
    box-shadow:0 8px 20px rgba(5,150,105,.3);
    cursor:pointer;transition:.25s;
    font-family:inherit;
    position:relative;overflow:hidden;
    display:inline-flex;align-items:center;gap:8px;
}
#modal_action .btn-primary::before{
    content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;
    background:linear-gradient(100deg,transparent 20%,rgba(255,255,255,.28) 50%,transparent 80%);
    transition:left .6s ease;
}
#modal_action .btn-primary:hover{
    filter:brightness(1.08);
    transform:translateY(-1px);
    box-shadow:0 12px 26px rgba(5,150,105,.4);
}
#modal_action .btn-primary:hover::before{left:120%}

/* ===== RESPONSIVE ===== */
@media(max-width:720px){
    .xuCrudHead{padding:18px 20px;flex-direction:column;align-items:flex-start}
    .xuCrudHead h2{font-size:1.15rem}
    .xuCrudBtns{width:100%}
    .xuBtnAdd{flex:1;justify-content:center;padding:9px 14px;font-size:.78rem}
    .xuTableWrap{padding:16px}
    .xuTable thead th,.xuTable tbody td{padding:10px 12px;font-size:.82rem}
    #modal_action .modal-body{padding:20px 18px}
    #modal_action .modal-footer{padding:14px 18px}
}
</style>

<div class="xuCrudCard xuR">
    <div class="xuCrudHead">
        <h2><i class="fa fa-clock-o"></i> Daftar Keanggotaan Kedaluwarsa</h2>
        <div class="xuCrudBtns">
            <a href="<?= base_url('membership') ?>" class="xuBtnAdd xuBtnBack"><i class="fa fa-arrow-left"></i> Kembali ke Daftar</a>
            <a href="<?= base_url('membership/add') ?>" class="xuBtnAdd"><i class="fa fa-user-plus"></i> Tambah Anggota Baru</a>
        </div>
    </div>
    <div class="xuTableWrap">
        <table class="table xuTable responsive dt-responsive" id="xuDataTable" cellspacing="0" width="100%">
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
                        <td colspan="6" style="text-align:center;padding:50px 20px;color:var(--ex-soft)">
                            <i class="fa fa-check-circle" style="font-size:2.2rem;color:var(--ex-emerald);display:block;margin-bottom:10px"></i>
                            <b>Tidak ada keanggotaan kedaluwarsa.</b><br>
                            <small style="color:var(--ex-soft)">Semua anggota dalam status aktif.</small>
                        </td>
                    </tr>
                <?php else: foreach ($data as $value): ?>
                    <tr>
                        <td><span class="xuMid"><?= esc($value->member_id) ?></span></td>
                        <td><span class="xuName"><?= esc($value->member_name) ?></span></td>
                        <td><span class="xuType"><i class="fa fa-id-badge"></i> <?= esc($value->member_type_name) ?></span></td>
                        <td><span class="xuEmail"><i class="fa fa-envelope-o"></i> <?= esc($value->member_email) ?></span></td>
                        <td><span class="xuDate"><i class="fa fa-exclamation-circle"></i> <?= esc($value->last_update) ?></span></td>
                        <td style="text-align:center;white-space:nowrap">
                            <button type="button" class="xuBtnAct xuRenew"
                                    data-member='<?= htmlspecialchars(json_encode($value), ENT_QUOTES, "UTF-8") ?>'
                                    title="Perpanjang Keanggotaan">
                                <i class="fa fa-calendar-plus-o"></i> Perpanjang
                            </button>
                        </td>
                    </tr>
                <?php endforeach; endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- ===== MODAL PERPANJANGAN ===== -->
<div id="modal_action" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">
                    <i class="fa fa-calendar-plus-o"></i>
                    Perpanjang Keanggotaan
                </h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
            </div>
            <form action="<?= base_url('membership/updateExp') ?>" method="post">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <div class="xuModalMember">
                        <div class="mmIco"><i class="fa fa-user"></i></div>
                        <div class="mmInfo">
                            <div class="mmName" id="modal_member_name">—</div>
                            <div class="mmId" id="modal_member_id">ID: —</div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exp_date">Expired Date Baru*</label>
                        <input type="date" class="form-control" name="exp_date" id="exp_date" required>
                        <div class="xuDateHint">
                            <i class="fa fa-info-circle"></i>
                            Perpanjang minimal 1 tahun dari hari ini (<?= date('d F Y') ?>)
                        </div>
                    </div>

                    <!-- Hidden field untuk member_id (diisi oleh showModal) -->
                    <input type="hidden" name="original_member_id" id="modal_original_member_id" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fa fa-times"></i> Close
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save"></i> Simpan Perpanjangan
                    </button>
                </div>
            </form>
        </div>
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
    }, {threshold:.06});
    document.querySelectorAll('.xuR').forEach(function(el){ io.observe(el); });

    // ===== DataTables initialization =====
    if ($.fn.DataTable){
        var tbl = $('#xuDataTable');
        if (tbl.hasClass('dataTable')){
            tbl.DataTable().destroy();
        }
        tbl.DataTable({
            language: {
                search: "Cari:",
                lengthMenu: "Tampilkan _MENU_ data",
                info: "Menampilkan _START_ - _END_ dari _TOTAL_ anggota kedaluwarsa",
                infoEmpty: "Tidak ada data",
                emptyTable: "Tidak ada anggota kedaluwarsa",
                zeroRecords: "Tidak ditemukan hasil yang cocok",
                paginate: { previous: "‹", next: "›" }
            },
            pageLength: 10,
            responsive: true,
            order: [[0, 'asc']],
            columnDefs: [
                { orderable: true, targets: [0, 1, 2] },
                { orderable: false, targets: [3, 4, 5] }
            ]
        });
    }

    // ===== Function showModal (FIX: sebelumnya tidak ada) =====
    window.showModal = function(member){
        // Isi info member di card modal
        $('#modal_member_name').text(member.member_name || '—');
        $('#modal_member_id').text('ID: ' + (member.member_id || '—'));

        // Isi hidden field original_member_id
        $('#modal_original_member_id').val(member.member_id || '');

        // Set default date: hari ini + 1 tahun
        var today = new Date();
        today.setFullYear(today.getFullYear() + 1);
        var defaultDate = today.toISOString().split('T')[0];
        $('#exp_date').val(defaultDate);
        $('#exp_date').attr('min', new Date().toISOString().split('T')[0]);

        // Tampilkan modal
        $('#modal_action').modal('show');
    };

    // ===== Event delegation untuk tombol Perpanjang =====
    $(document).on('click', '.xuBtnAct.xuRenew', function(){
        var memberData = $(this).data('member');
        if (memberData) {
            window.showModal(memberData);
        }
    });

    // ===== Konfirmasi sebelum submit =====
    $('#modal_action form').on('submit', function(e){
        var expDate = $('#exp_date').val();
        var memberName = $('#modal_member_name').text();
        if (!confirm('Perpanjang keanggotaan "' + memberName + '" hingga ' + expDate + '?')){
            e.preventDefault();
            return false;
        }
    });
});
</script>