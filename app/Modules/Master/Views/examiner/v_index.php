<style>
/* ================================================================
   DIFOSS EXAMINERS — EMERALD FOREST EDITION
   ================================================================ */
:root{
    --ex-emerald:#059669; --ex-teal:#0891b2; --ex-gold:#f59e0b;
    --ex-mint:#6ee7b7; --ex-deep:#0a2920;
    --ex-ink:#0f172a; --ex-muted:#64748b; --ex-soft:#94a3b8;
    --ex-danger:#dc2626;
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
    background:#fff;color:var(--ex-emerald);
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
.xuBtnAdd:hover{transform:translateY(-2px);filter:brightness(1.05);color:var(--ex-emerald)}
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
.xuBtnAct:hover{transform:translateY(-2px);filter:brightness(1.12);color:#fff!important}
.xuBtnAct:hover::before{left:120%}
.xuBtnAct i,.xuBtnAct .fa{
    color:#fff!important;font-size:.9rem!important;
    line-height:1!important;display:inline-block;
    width:14px;text-align:center;
    text-shadow:0 1px 2px rgba(0,0,0,.3);
}

.xuEdit{background:linear-gradient(90deg,var(--ex-emerald),var(--ex-gold));box-shadow:0 6px 14px rgba(5,150,105,.3)}
.xuEdit:hover{box-shadow:0 10px 22px rgba(5,150,105,.4)}
.xuDel{background:linear-gradient(90deg,#ef4444,#dc2626);box-shadow:0 6px 14px rgba(239,68,68,.3)}
.xuDel:hover{box-shadow:0 10px 22px rgba(239,68,68,.4)}

.xuTableWrap{padding:22px 26px;overflow-x:auto}
.xuTable{width:100%;border-collapse:separate;border-spacing:0}

.xuTable thead th{
    background:linear-gradient(180deg,rgba(5,150,105,.08),rgba(5,150,105,.03));
    color:var(--ex-emerald);
    font-weight:800;font-size:.72rem;
    text-transform:uppercase;letter-spacing:.08em;
    padding:14px 16px;border:none;
    border-bottom:1.5px solid rgba(5,150,105,.2);
    white-space:nowrap;text-align:left;
}
html.xu-dark .xuTable thead th{
    background:linear-gradient(180deg,rgba(5,150,105,.15),rgba(5,150,105,.06));
    color:var(--ex-mint);border-bottom-color:rgba(5,150,105,.35);
}

.xuTable tbody td{
    padding:14px 16px;
    border-bottom:1px solid #f1f3f8;
    color:var(--ex-muted);font-size:.88rem;
    vertical-align:middle;
}
html.xu-dark .xuTable tbody td{border-bottom-color:rgba(5,150,105,.1);color:#cbd5e1}

.xuTable tbody tr{transition:.2s}
.xuTable tbody tr:hover{background:rgba(5,150,105,.05)}
.xuTable tbody tr:hover td:first-child{box-shadow:inset 4px 0 0 var(--ex-emerald)}
html.xu-dark .xuTable tbody tr:hover{background:rgba(5,150,105,.1)}
html.xu-dark .xuTable tbody tr:hover td:first-child{box-shadow:inset 4px 0 0 var(--ex-gold)}

.xuNo{
    display:inline-flex;align-items:center;justify-content:center;
    width:32px;height:32px;border-radius:10px;
    background:rgba(5,150,105,.1);
    border:1px solid rgba(5,150,105,.2);
    color:var(--ex-emerald);
    font-family:'JetBrains Mono',monospace;
    font-weight:700;font-size:.82rem;
}
html.xu-dark .xuNo{color:var(--ex-mint);background:rgba(5,150,105,.15);border-color:rgba(5,150,105,.35)}

/* Avatar */
.xuAvatar{
    width:36px;height:36px;border-radius:50%;
    background:linear-gradient(135deg,var(--ex-emerald),var(--ex-gold));
    color:#fff;font-weight:800;font-size:.85rem;
    display:inline-flex;align-items:center;justify-content:center;
    flex-shrink:0;
    box-shadow:0 6px 14px rgba(5,150,105,.3);
    font-family:'Neuton',Georgia,serif;
    border:2px solid rgba(255,255,255,.25);
    transition:.3s;
}
.xuTable tbody tr:hover .xuAvatar{transform:scale(1.1) rotate(-6deg);box-shadow:0 10px 22px rgba(245,158,11,.4)}

/* Examiner name */
.xuName{
    font-family:'Neuton',Georgia,serif;
    font-weight:700;color:var(--ex-ink);
    display:inline-flex;align-items:center;gap:10px;
    font-size:.98rem;
}
html.xu-dark .xuName{color:#f1f5f9}

/* Code mono badge */
.xuCode{
    font-family:'JetBrains Mono',monospace;
    font-weight:700;color:var(--ex-emerald);
    background:rgba(5,150,105,.08);
    border:1px solid rgba(5,150,105,.2);
    padding:5px 12px;border-radius:9px;
    font-size:.82rem;
    display:inline-flex;align-items:center;gap:6px;
}
.xuCode i{color:var(--ex-gold);font-size:.72rem}
html.xu-dark .xuCode{color:var(--ex-mint);background:rgba(5,150,105,.15);border-color:rgba(5,150,105,.35)}

/* Badge type */
.xuBadge{
    display:inline-flex;align-items:center;gap:6px;
    padding:5px 12px;border-radius:999px;
    font-size:.72rem;font-weight:800;
    letter-spacing:.03em;
    border:1px solid transparent;
}

.xuDate{
    color:var(--ex-muted);
    font-family:'JetBrains Mono',monospace;
    font-size:.82rem;font-weight:600;
    display:inline-flex;align-items:center;gap:6px;
}
.xuDate i{color:var(--ex-gold);font-size:.78rem}
html.xu-dark .xuDate{color:var(--ex-soft)}

.xuEmptyRow td{
    text-align:center;padding:50px 20px!important;
    color:var(--ex-soft)!important;font-size:.92rem;font-weight:600;
    background:linear-gradient(135deg,rgba(5,150,105,.04),rgba(245,158,11,.02))!important;
}
.xuEmptyRow i{font-size:2.2rem;color:var(--ex-emerald);display:block;margin-bottom:10px}

/* ===== DATATABLES ===== */
.dataTables_wrapper .dataTables_filter input,
.dataTables_wrapper .dataTables_length select{
    border:1.5px solid #cbd5e1;border-radius:10px;
    padding:7px 12px;outline:none;transition:.2s;
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
    background:rgba(255,255,255,.05);border-color:rgba(5,150,105,.25);color:#f1f5f9;
}
html.xu-dark .dataTables_wrapper .dataTables_filter input:focus,
html.xu-dark .dataTables_wrapper .dataTables_length select:focus{
    border-color:var(--ex-gold);box-shadow:0 0 0 3px rgba(245,158,11,.15);
}

.dataTables_wrapper .dataTables_info{color:var(--ex-muted);font-size:.82rem;padding-top:14px;font-weight:500}
html.xu-dark .dataTables_wrapper .dataTables_info{color:var(--ex-soft)}
.dataTables_wrapper .dataTables_length label,
.dataTables_wrapper .dataTables_filter label{color:var(--ex-ink);font-weight:700;font-size:.85rem}
html.xu-dark .dataTables_wrapper .dataTables_length label,
html.xu-dark .dataTables_wrapper .dataTables_filter label{color:#e2e8f0}

.dataTables_wrapper .dataTables_paginate .paginate_button{
    color:var(--ex-muted)!important;
    border:1px solid transparent!important;
    border-radius:8px!important;margin:0 2px;transition:.2s;
}
.dataTables_wrapper .dataTables_paginate .paginate_button.current{
    background:linear-gradient(90deg,var(--ex-emerald),var(--ex-gold))!important;
    color:#fff!important;border:none!important;
    box-shadow:0 6px 14px rgba(5,150,105,.3)!important;
}
.dataTables_wrapper .dataTables_paginate .paginate_button:hover:not(.current):not(.disabled){
    background:rgba(5,150,105,.1)!important;color:var(--ex-emerald)!important;
    border-color:rgba(5,150,105,.25)!important;
}
.dataTables_wrapper .dataTables_paginate .paginate_button.disabled{opacity:.4;cursor:not-allowed}
html.xu-dark .dataTables_wrapper .dataTables_paginate .paginate_button{color:var(--ex-soft)!important}
html.xu-dark .dataTables_wrapper .dataTables_paginate .paginate_button:hover:not(.current):not(.disabled){
    background:rgba(5,150,105,.15)!important;color:var(--ex-mint)!important;
    border-color:rgba(5,150,105,.35)!important;
}

/* ===== MODAL ===== */
#modal_action .modal-dialog{max-width:540px}
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
    backdrop-filter:blur(8px);
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

.xuModalEditInfo{
    background:linear-gradient(135deg,rgba(245,158,11,.08),rgba(245,158,11,.04));
    border:1.5px solid rgba(245,158,11,.25);
    border-radius:12px;
    padding:12px 16px;margin-bottom:18px;
    display:flex;align-items:center;gap:12px;
}
.xuModalEditInfo .mmIco{
    width:38px;height:38px;border-radius:10px;
    background:linear-gradient(135deg,var(--ex-gold),#d97706);
    color:#fff;
    display:flex;align-items:center;justify-content:center;
    font-size:1rem;flex-shrink:0;
    box-shadow:0 6px 14px rgba(245,158,11,.3);
}
.xuModalEditInfo .mmInfo{min-width:0;flex:1}
.xuModalEditInfo .mmName{
    font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:.95rem;color:var(--ex-ink);
    margin-bottom:2px;
    overflow:hidden;text-overflow:ellipsis;white-space:nowrap;
}
.xuModalEditInfo .mmId{
    font-family:'JetBrains Mono',monospace;
    font-size:.72rem;color:var(--ex-muted);
    font-weight:700;letter-spacing:.03em;
}
html.xu-dark .xuModalEditInfo{background:linear-gradient(135deg,rgba(245,158,11,.12),rgba(245,158,11,.06));border-color:rgba(245,158,11,.35)}
html.xu-dark .xuModalEditInfo .mmName{color:#f1f5f9}
html.xu-dark .xuModalEditInfo .mmId{color:var(--ex-soft)}

#modal_action label{
    font-weight:800;font-size:.74rem;
    color:var(--ex-ink);margin-bottom:8px;display:block;
    text-transform:uppercase;letter-spacing:.08em;
}
html.xu-dark #modal_action label{color:#e2e8f0}

#modal_action .form-control{
    width:100%;padding:11px 14px;
    border:1.5px solid #cbd5e1;
    border-radius:12px;font-size:.9rem;
    outline:none;background:#f8fafc;
    color:var(--ex-ink);
    font-family:inherit;
    transition:.25s;
    box-sizing:border-box;
}
#modal_action .form-control:focus{
    border-color:var(--ex-emerald);
    background:#fff;
    box-shadow:0 0 0 4px rgba(5,150,105,.12);
}
html.xu-dark #modal_action .form-control{background:rgba(255,255,255,.05);border-color:rgba(5,150,105,.25);color:#f1f5f9}
html.xu-dark #modal_action .form-control:focus{border-color:var(--ex-gold);background:rgba(255,255,255,.08);box-shadow:0 0 0 4px rgba(245,158,11,.15)}

#modal_action select.form-control{
    height:46px;padding:0 34px 0 13px;
    -webkit-appearance:none;-moz-appearance:none;appearance:none;
    background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23059669' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
    background-repeat:no-repeat;
    background-position:right 12px center;
    cursor:pointer;
}
html.xu-dark #modal_action select.form-control{
    background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23f59e0b' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
}

#modal_action .form-group{margin-bottom:16px}

.xuFieldHint{
    font-size:.72rem;color:var(--ex-muted);
    margin-top:5px;font-weight:600;
    display:flex;align-items:center;gap:5px;
}
.xuFieldHint i{color:var(--ex-gold);font-size:.7rem}
html.xu-dark .xuFieldHint{color:var(--ex-soft)}

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
    display:inline-flex;align-items:center;gap:7px;
}
#modal_action .btn-secondary:hover{background:rgba(5,150,105,.14);border-color:rgba(5,150,105,.45)}
html.xu-dark #modal_action .btn-secondary{background:rgba(5,150,105,.12);color:var(--ex-mint);border-color:rgba(5,150,105,.3)}

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
#modal_action .btn-primary:hover{filter:brightness(1.08);transform:translateY(-1px);box-shadow:0 12px 26px rgba(5,150,105,.4)}
#modal_action .btn-primary:hover::before{left:120%}

@media(max-width:720px){
    .xuCrudHead{padding:18px 20px;flex-direction:column;align-items:flex-start}
    .xuCrudHead h2{font-size:1.15rem}
    .xuBtnAdd{width:100%;justify-content:center}
    .xuTableWrap{padding:16px}
    .xuTable thead th,.xuTable tbody td{padding:10px 12px;font-size:.82rem}
    .xuAvatar{width:32px;height:32px;font-size:.78rem}
    #modal_action .modal-body{padding:20px 18px}
    #modal_action .modal-footer{padding:14px 18px}
}
</style>

<div class="xuCrudCard xuR">
    <div class="xuCrudHead">
        <h2><i class="fa fa-gavel"></i> List of Examiners</h2>
        <button type="button" class="xuBtnAdd" onclick="showModal()">
            <i class="fa fa-plus"></i> Add New Examiner
        </button>
    </div>
    <div class="xuTableWrap">
        <table class="table xuTable responsive dt-responsive" id="xuDataTable" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th style="width:60px">No</th>
                    <th>Examiner Name</th>
                    <th style="width:150px">Examiner Code</th>
                    <th>Type of Examiner</th>
                    <th>Last Modified</th>
                    <th style="width:190px;text-align:center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($data)): ?>
                    <tr class="xuEmptyRow">
                        <td colspan="6">
                            <i class="fa fa-gavel"></i>
                            <b>Belum ada data penguji.</b><br>
                            <small>Klik "Add New Examiner" untuk menambahkan.</small>
                        </td>
                    </tr>
                <?php else:
                    $i = 1;
                    foreach ($data as $key => $value) :
                        // Palet Emerald Forest untuk examiner type
                        if ($value->examiner_type == 'p') {
                            // Person — Emerald
                            $type = 'Nama Orang'; $tc = '#059669'; $tb = 'rgba(5,150,105,.1)'; $br = 'rgba(5,150,105,.3)';
                        } elseif ($value->examiner_type == 'o') {
                            // Organization — Teal
                            $type = 'Badan Organisasi'; $tc = '#0891b2'; $tb = 'rgba(8,145,178,.1)'; $br = 'rgba(8,145,178,.3)';
                        } elseif ($value->examiner_type == 'c') {
                            // Conference — Gold
                            $type = 'Konferensi'; $tc = '#d97706'; $tb = 'rgba(217,119,6,.1)'; $br = 'rgba(217,119,6,.3)';
                        } else {
                            $type = '-'; $tc = '#94a3b8'; $tb = 'rgba(148,163,184,.1)'; $br = 'rgba(148,163,184,.3)';
                        }
                ?>
                    <tr>
                        <td><span class="xuNo"><?= $i++ ?></span></td>
                        <td>
                            <span class="xuName">
                                <span class="xuAvatar"><?= esc(strtoupper(substr(trim($value->examiner_name), 0, 1))) ?></span>
                                <?= esc($value->examiner_name) ?>
                            </span>
                        </td>
                        <td><span class="xuCode"><i class="fa fa-hashtag"></i> <?= esc($value->examiner_number) ?></span></td>
                        <td><span class="xuBadge" style="color:<?= $tc ?>;background:<?= $tb ?>;border-color:<?= $br ?>"><?= esc($type) ?></span></td>
                        <td><span class="xuDate"><i class="fa fa-clock-o"></i> <?= esc($value->last_update) ?></span></td>
                        <td style="text-align:center;white-space:nowrap">
                            <button type="button" class="xuBtnAct xuEdit" title="Edit"
                                    data-ex='<?= htmlspecialchars(json_encode($value), ENT_QUOTES, "UTF-8") ?>'>
                                <i class="fa fa-pencil"></i> Edit
                            </button>
                            <button type="button" class="xuBtnAct xuDel" title="Delete"
                                    onclick="showConfirm(<?= $value->examiner_id ?>)">
                                <i class="fa fa-trash"></i> Delete
                            </button>
                        </td>
                    </tr>
                <?php endforeach; endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- ===== MODAL ===== -->
<div id="modal_action" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">
                    <i class="fa fa-gavel"></i>
                    <span id="modal_title_text">New Examiner</span>
                </h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
            </div>
            <form action="<?= base_url('master/examiner/save') ?>" method="post" id="ex_form">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <div class="xuModalEditInfo" id="edit_info_card" style="display:none">
                        <div class="mmIco"><i class="fa fa-pencil"></i></div>
                        <div class="mmInfo">
                            <div class="mmName" id="edit_name">—</div>
                            <div class="mmId" id="edit_detail">Code: —</div>
                        </div>
                    </div>

                    <input type="hidden" name="examiner_id" id="examiner_id" value="">

                    <div class="form-group">
                        <label for="examinerName">Examiner Name*</label>
                        <input type="text" class="form-control" name="examinerName" id="examinerName" value="" maxlength="100" tabindex="1" required>
                        <div class="xuFieldHint"><i class="fa fa-info-circle"></i> Nama lengkap penguji atau nama organisasi</div>
                    </div>
                    <div class="form-group">
                        <label for="examinerNumber">Examiner Code*</label>
                        <input type="number" class="form-control" name="examinerNumber" id="examinerNumber" value="" maxlength="100" tabindex="2" required>
                        <div class="xuFieldHint"><i class="fa fa-info-circle"></i> Nomor urut atau kode unik penguji</div>
                    </div>
                    <div class="form-group">
                        <label for="examinerType">Examiner Type</label>
                        <select name="examinerType" id="examinerType" class="form-control">
                            <option value="p">Nama Orang</option>
                            <option value="o">Badan Organisasi</option>
                            <option value="c">Konferensi</option>
                        </select>
                    </div>
                    <span class="hidden"></span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
                        <i class="fa fa-times"></i> Close
                    </button>
                    <button type="submit" class="btn btn-primary btn-sm" id="modal_save_btn">
                        <i class="fa fa-save"></i> Save
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
                search:"Cari:",lengthMenu:"Tampilkan _MENU_ data",
                info:"Menampilkan _START_ - _END_ dari _TOTAL_ penguji",
                infoEmpty:"Tidak ada data",emptyTable:"Belum ada data penguji",
                zeroRecords:"Tidak ditemukan hasil yang cocok",
                paginate:{previous:"‹",next:"›"}
            },
            pageLength:10,responsive:true,order:[[0,'asc']],
            columnDefs:[
                {orderable:true, targets:[0,1,2,3,4]},
                {orderable:false, targets:[5]}
            ]
        });
    }

    // ===== Function showModal (FIX: sebelumnya tidak ada) =====
    window.showModal = function(ex){
        var idField = document.getElementById('examiner_id');
        var nameField = document.getElementById('examinerName');
        var numField = document.getElementById('examinerNumber');
        var typeField = document.getElementById('examinerType');
        var titleText = document.getElementById('modal_title_text');
        var saveBtn = document.getElementById('modal_save_btn');
        var editInfo = document.getElementById('edit_info_card');
        var editName = document.getElementById('edit_name');
        var editDetail = document.getElementById('edit_detail');

        var typeLabels = {p:'Nama Orang', o:'Badan Organisasi', c:'Konferensi'};

        if (ex && ex.examiner_id){
            // EDIT MODE
            titleText.textContent = 'Edit Examiner';
            saveBtn.innerHTML = '<i class="fa fa-save"></i> Update';
            idField.value = ex.examiner_id;
            nameField.value = ex.examiner_name || '';
            numField.value = ex.examiner_number || '';
            typeField.value = ex.examiner_type || 'p';
            editName.textContent = ex.examiner_name || '—';
            editDetail.textContent = 'Code: ' + (ex.examiner_number || '—') + ' · ' + (typeLabels[ex.examiner_type] || '—');
            editInfo.style.display = 'flex';
        } else {
            // ADD MODE
            titleText.textContent = 'New Examiner';
            saveBtn.innerHTML = '<i class="fa fa-save"></i> Save';
            idField.value = '';
            nameField.value = '';
            numField.value = '';
            typeField.value = 'p';
            editInfo.style.display = 'none';
        }
        $('#modal_action').modal('show');
        setTimeout(function(){ nameField.focus(); }, 400);
    };

    // ===== Event delegation untuk tombol Edit =====
    $(document).on('click', '.xuBtnAct.xuEdit', function(){
        var exData = $(this).data('ex');
        if (exData) window.showModal(exData);
    });
});

// ===== Function showConfirm untuk delete =====
function showConfirm(id){
    if (confirm('Apakah Anda yakin ingin menghapus penguji ini?\nID: ' + id + '\n\nData yang dihapus tidak dapat dikembalikan.')){
        var f = document.createElement('form');
        f.method = 'POST';
        f.action = baseUrl + 'master/examiner/delete';
        f.innerHTML = '<input type="hidden" name="id" value="' + id + '"><?= csrf_field() ?>';
        document.body.appendChild(f);
        f.submit();
    }
}
</script>