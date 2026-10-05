<style>
/* ================================================================
   DIFOSS EDIT BIBLIOGRAPHY — EMERALD FOREST EDITION
   ================================================================ */
:root{
    --eb-emerald:#059669; --eb-teal:#0891b2; --eb-gold:#f59e0b;
    --eb-mint:#6ee7b7; --eb-deep:#0a2920; --eb-mid:#064e3b;
    --eb-ink:#0f172a; --eb-muted:#64748b; --eb-soft:#94a3b8;
}

.xuR{opacity:0;transform:translateY(24px);transition:all .6s cubic-bezier(.2,.8,.2,1)}
.xuR.in{opacity:1;transform:none}

/* ===== KARTU UTAMA ===== */
.xuFormCard{
    background:#fff;border-radius:22px;
    box-shadow:0 16px 44px rgba(15,23,42,.08);
    overflow:hidden;
    border:1px solid rgba(5,150,105,.12);
    margin-bottom:24px;
    transition:.35s cubic-bezier(.2,.8,.2,1);
}
.xuFormCard:hover{
    box-shadow:0 22px 54px rgba(5,150,105,.14);
    border-color:rgba(5,150,105,.22);
}
html.xu-dark .xuFormCard{background:#0f1e1f;border-color:rgba(5,150,105,.22);box-shadow:0 16px 44px rgba(0,0,0,.4)}

.xuFormHead{
    padding:24px 28px;
    background:linear-gradient(90deg,var(--eb-emerald),var(--eb-teal),var(--eb-gold),var(--eb-emerald));
    background-size:200% 100%;
    color:#fff;
    display:flex;align-items:center;gap:12px;
    animation:xuEbGrad 7s linear infinite;
    position:relative;overflow:hidden;
}
.xuFormHead::after{
    content:'';position:absolute;top:-60%;right:-8%;
    width:320px;height:320px;border-radius:50%;
    background:radial-gradient(circle,rgba(245,158,11,.25),transparent 70%);
    pointer-events:none;
}
@keyframes xuEbGrad{to{background-position:200% 0}}

.xuFormHead h2{
    margin:0;font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1.35rem;
    display:flex;align-items:center;gap:12px;
    color:#fff;letter-spacing:-.01em;
    position:relative;z-index:2;
}
.xuFormHead h2 i{
    width:42px;height:42px;border-radius:13px;
    background:rgba(255,255,255,.18);
    backdrop-filter:blur(8px);-webkit-backdrop-filter:blur(8px);
    display:inline-flex;align-items:center;justify-content:center;
    font-size:1.15rem;
    box-shadow:inset 0 1px 0 rgba(255,255,255,.2);
}
.xuFormBody{padding:28px}

/* ===== LOADER INFO BOX ===== */
.xuLoader{
    display:flex;align-items:center;gap:14px;
    padding:16px 20px;
    background:linear-gradient(135deg,rgba(5,150,105,.08),rgba(245,158,11,.05));
    border-left:4px solid var(--eb-emerald);
    border-radius:12px;
    margin-bottom:22px;
    color:var(--eb-muted);
    font-size:.9rem;
    font-weight:500;
    position:relative;
}
html.xu-dark .xuLoader{background:linear-gradient(135deg,rgba(5,150,105,.14),rgba(245,158,11,.08));color:var(--eb-soft)}

.xuLoader i{
    font-size:1.3rem;color:var(--eb-emerald);
    width:36px;height:36px;border-radius:10px;
    background:rgba(5,150,105,.1);
    display:inline-flex;align-items:center;justify-content:center;
    flex-shrink:0;
}
html.xu-dark .xuLoader i{background:rgba(5,150,105,.2);color:var(--eb-mint)}

.xuLoader strong{
    color:var(--eb-emerald);font-weight:800;
}
html.xu-dark .xuLoader strong{color:var(--eb-gold)}

/* ===== FORM FIELDS ===== */
.xuFormBody .control-label{
    display:block;font-weight:800;
    font-size:.78rem;color:var(--eb-ink);
    margin-bottom:7px;letter-spacing:.04em;
    text-transform:uppercase;
}
html.xu-dark .xuFormBody .control-label{color:#e2e8f0}

.xuFormBody .form-control{
    width:100%;padding:11px 14px;
    border:1.5px solid #e2e8f0;
    border-radius:12px;font-size:.9rem;
    outline:none;transition:.25s;
    background:#f8fafc;color:var(--eb-ink);
    box-sizing:border-box;
    font-family:inherit;
}
html.xu-dark .xuFormBody .form-control{background:rgba(255,255,255,.05);border-color:rgba(5,150,105,.2);color:#f1f5f9}

.xuFormBody textarea.form-control{min-height:90px;resize:vertical}

.xuFormBody .form-control:hover{
    border-color:var(--eb-emerald);
    background:rgba(5,150,105,.04);
}
.xuFormBody .form-control:focus{
    border-color:var(--eb-emerald);
    background:#fff;
    box-shadow:0 0 0 4px rgba(5,150,105,.12);
}
html.xu-dark .xuFormBody .form-control:hover{background:rgba(5,150,105,.08)}
html.xu-dark .xuFormBody .form-control:focus{background:rgba(255,255,255,.08);border-color:var(--eb-gold);box-shadow:0 0 0 4px rgba(245,158,11,.15)}

.xuFormBody .form-group{margin-bottom:18px}
.xuFormBody .form-text{font-size:.75rem;margin-top:5px}
.xuFormBody .form-text.text-danger{color:#dc2626;font-weight:600}

/* ===== SELECT2 ===== */
.select2-container--default .select2-selection--single,
.select2-container--default .select2-selection--multiple{
    border:1.5px solid #e2e8f0;border-radius:12px;
    min-height:46px;padding:4px 8px;
    background:#f8fafc;
}
html.xu-dark .select2-container--default .select2-selection--single,
html.xu-dark .select2-container--default .select2-selection--multiple{background:rgba(255,255,255,.05);border-color:rgba(5,150,105,.2)}

.select2-container--default.select2-container--focus .select2-selection--multiple,
.select2-container--default.select2-container--open .select2-selection{
    border-color:var(--eb-emerald);
    box-shadow:0 0 0 4px rgba(5,150,105,.12);
    background:#fff;
}
html.xu-dark .select2-container--default.select2-container--focus .select2-selection--multiple,
html.xu-dark .select2-container--default.select2-container--open .select2-selection{background:rgba(255,255,255,.08);border-color:var(--eb-gold);box-shadow:0 0 0 4px rgba(245,158,11,.15)}

.select2-container--default .select2-selection--multiple .select2-selection__choice{
    background:linear-gradient(90deg,var(--eb-emerald),var(--eb-teal));
    border:none;color:#fff;
    border-radius:8px;padding:4px 11px;
    font-size:.82rem;font-weight:600;
    margin:3px 4px 3px 0;
}
.select2-container--default .select2-selection--multiple .select2-selection__choice__remove{
    color:#fff;margin-right:7px;font-weight:700;
}
.select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover{color:#fef3c7}

.select2-dropdown{
    border:1.5px solid rgba(5,150,105,.25);
    border-radius:12px;
    box-shadow:0 16px 40px rgba(15,23,42,.12);
    overflow:hidden;
}
html.xu-dark .select2-dropdown{background:#0f1e1f;border-color:rgba(5,150,105,.35)}

.select2-results__option{padding:10px 15px;font-size:.88rem;color:var(--eb-ink)}
html.xu-dark .select2-results__option{color:#e2e8f0}

.select2-results__option--highlighted[aria-selected]{
    background:linear-gradient(90deg,var(--eb-emerald),var(--eb-gold))!important;
    color:#fff!important;
}

/* ===== ATTACHMENT ROWS ===== */
#tambahin .row,
.attachment-row{
    background:#f8fafc;
    border:1.5px solid rgba(5,150,105,.12);
    border-radius:14px;padding:14px;
    margin-bottom:10px;align-items:center;
    transition:.25s;
}
#tambahin .row:hover,
.attachment-row:hover{
    border-color:rgba(5,150,105,.28);
    background:rgba(5,150,105,.03);
}
html.xu-dark #tambahin .row,
html.xu-dark .attachment-row{background:rgba(5,150,105,.05);border-color:rgba(5,150,105,.2)}
html.xu-dark #tambahin .row:hover,
html.xu-dark .attachment-row:hover{background:rgba(5,150,105,.08);border-color:rgba(5,150,105,.35)}

.attachment-row{display:flex;flex-wrap:wrap;gap:8px;align-items:center}

.attachment-row .editable-active{
    border-color:var(--eb-gold)!important;
    background:rgba(245,158,11,.06)!important;
    box-shadow:0 0 0 3px rgba(245,158,11,.12)!important;
}
html.xu-dark .attachment-row .editable-active{background:rgba(245,158,11,.1)!important;border-color:var(--eb-gold)!important}

/* ===== ACTION BUTTONS ===== */
#addRow{
    background:linear-gradient(90deg,var(--eb-emerald),var(--eb-teal))!important;
    border:none;color:#fff;border-radius:10px;
    font-weight:700;
    box-shadow:0 6px 16px rgba(5,150,105,.3);
    transition:.25s;
    position:relative;overflow:hidden;
}
#addRow::before{
    content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;
    background:linear-gradient(100deg,transparent 20%,rgba(255,255,255,.3) 50%,transparent 80%);
    transition:left .6s ease;
}
#addRow:hover{filter:brightness(1.08);transform:translateY(-2px);box-shadow:0 10px 22px rgba(5,150,105,.4)}
#addRow:hover::before{left:120%}

.btn-edit{
    background:linear-gradient(90deg,var(--eb-emerald),var(--eb-teal))!important;
    border:none;color:#fff;border-radius:9px;
    box-shadow:0 4px 12px rgba(5,150,105,.25);
}
.btn-save{
    background:linear-gradient(90deg,var(--eb-gold),var(--eb-emerald))!important;
    border:none;color:#fff;border-radius:9px;
    box-shadow:0 4px 12px rgba(245,158,11,.3);
}
.btn-remove{
    background:linear-gradient(90deg,#ef4444,#dc2626)!important;
    border:none;color:#fff;border-radius:9px;
    box-shadow:0 4px 12px rgba(239,68,68,.3);
}
.btn-edit:hover,.btn-save:hover,.btn-remove:hover{
    filter:brightness(1.1);
    transform:translateY(-2px);
}

/* ===== COVER PREVIEW ===== */
.xuCoverPreview{
    border-radius:14px;
    border:2px solid rgba(5,150,105,.25);
    box-shadow:0 10px 26px rgba(15,23,42,.1);
    transition:.3s;
}
.xuCoverPreview:hover{
    border-color:var(--eb-emerald);
    box-shadow:0 14px 34px rgba(5,150,105,.2);
    transform:scale(1.02);
}
html.xu-dark .xuCoverPreview{border-color:rgba(5,150,105,.35);box-shadow:0 10px 26px rgba(0,0,0,.4)}

/* ===== UPDATE BUTTON ===== */
.xuUpdateBtn{
    width:100%;padding:14px;
    border:none;border-radius:14px;
    background:linear-gradient(90deg,var(--eb-emerald),var(--eb-gold));
    color:#fff;font-weight:800;font-size:1rem;
    letter-spacing:.03em;cursor:pointer;
    transition:.25s;
    box-shadow:0 12px 30px rgba(5,150,105,.35);
    position:relative;overflow:hidden;
    display:inline-flex;align-items:center;justify-content:center;gap:9px;
    font-family:inherit;
}
.xuUpdateBtn::before{
    content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;
    background:linear-gradient(100deg,transparent 20%,rgba(255,255,255,.3) 50%,transparent 80%);
    transition:left .6s ease;
}
.xuUpdateBtn:hover{
    transform:translateY(-2px);
    filter:brightness(1.08);
    box-shadow:0 16px 38px rgba(5,150,105,.45);
}
.xuUpdateBtn:hover::before{left:120%}

/* ===== DIVIDER ===== */
.xuDivider{
    border:none;height:1px;
    background:linear-gradient(90deg,transparent,var(--eb-emerald),var(--eb-gold),transparent);
    margin:28px 0;
}

/* ===== MODAL ADD OPTION ===== */
#modal-add-option .modal-dialog{max-width:560px}
#modal-add-option .modal-content{
    border:none;border-radius:20px;
    overflow:hidden;
    box-shadow:0 30px 70px rgba(0,0,0,.4);
    border:1px solid rgba(5,150,105,.2);
}
html.xu-dark #modal-add-option .modal-content{background:#0f1e1f;border-color:rgba(5,150,105,.3)}

#modal-add-option .modal-header{
    background:linear-gradient(90deg,var(--eb-emerald),var(--eb-teal),var(--eb-gold));
    background-size:200% 100%;
    color:#fff;border:none;
    padding:18px 24px;
    position:relative;overflow:hidden;
    animation:xuEbGrad 7s linear infinite;
}
#modal-add-option .modal-header::after{
    content:'';position:absolute;top:-50%;right:-8%;
    width:200px;height:200px;border-radius:50%;
    background:radial-gradient(circle,rgba(255,255,255,.15),transparent 70%);
    pointer-events:none;
}

#modal-add-option .modal-title{
    color:#fff;font-weight:700;
    font-family:'Neuton',Georgia,serif;
    font-size:1.15rem;
    display:flex;align-items:center;gap:10px;
    position:relative;z-index:2;
}
#modal-add-option .modal-title::before{
    content:'\f067';
    font-family:'FontAwesome';
    width:32px;height:32px;border-radius:10px;
    background:rgba(255,255,255,.18);
    display:inline-flex;align-items:center;justify-content:center;
    font-size:.9rem;
}

#modal-add-option .close{
    color:#fff;opacity:.9;
    width:32px;height:32px;border-radius:10px;
    background:rgba(255,255,255,.15);
    backdrop-filter:blur(8px);
    border:1px solid rgba(255,255,255,.25);
    display:flex;align-items:center;justify-content:center;
    transition:.25s;
    position:relative;z-index:2;
    margin:0;padding:0;
}
#modal-add-option .close:hover{background:rgba(255,255,255,.28);transform:rotate(90deg)}
#modal-add-option .close span{font-size:1.4rem;line-height:1;margin-top:-2px}

#modal-add-option .modal-body{padding:24px}

#modal-add-option .form-control{
    border:1.5px solid #e2e8f0;
    border-radius:11px;padding:10px 13px;
    background:#f8fafc;color:var(--eb-ink);
    transition:.25s;
}
#modal-add-option .form-control:focus{
    border-color:var(--eb-emerald);
    box-shadow:0 0 0 3px rgba(5,150,105,.12);
    background:#fff;
}
html.xu-dark #modal-add-option .form-control{background:rgba(255,255,255,.05);border-color:rgba(5,150,105,.2);color:#f1f5f9}
html.xu-dark #modal-add-option .form-control:focus{border-color:var(--eb-gold);box-shadow:0 0 0 3px rgba(245,158,11,.15)}

#modal-add-option .control-label,
#modal-add-option label{
    font-weight:800;font-size:.76rem;
    color:var(--eb-ink);
    text-transform:uppercase;
    letter-spacing:.06em;
    margin-bottom:6px;
}
html.xu-dark #modal-add-option .control-label,
html.xu-dark #modal-add-option label{color:#e2e8f0}

#form-add-option button[type=submit]{
    background:linear-gradient(90deg,var(--eb-emerald),var(--eb-gold));
    border:none;color:#fff;
    border-radius:11px;
    padding:11px 24px;
    font-weight:700;
    cursor:pointer;
    transition:.25s;
    box-shadow:0 8px 20px rgba(5,150,105,.3);
    position:relative;overflow:hidden;
    display:inline-flex;align-items:center;gap:8px;
}
#form-add-option button[type=submit]::before{
    content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;
    background:linear-gradient(100deg,transparent 20%,rgba(255,255,255,.3) 50%,transparent 80%);
    transition:left .6s ease;
}
#form-add-option button[type=submit]:hover{
    transform:translateY(-2px);
    filter:brightness(1.08);
    box-shadow:0 12px 26px rgba(5,150,105,.4);
}
#form-add-option button[type=submit]:hover::before{left:120%}

/* ===== RESPONSIVE ===== */
@media(max-width:720px){
    .xuFormBody{padding:20px 16px}
    .xuFormHead{padding:18px 20px}
    .xuFormHead h2{font-size:1.15rem}
    .attachment-row{padding:12px;gap:6px}
    #tambahin .row{padding:12px}
    .xuUpdateBtn{padding:12px;font-size:.9rem}
}
</style>

<div class="xuFormCard xuR">
    <div class="xuFormHead">
        <h2><i class="fa fa-pencil-square-o"></i> Edit Bibliography</h2>
    </div>
    <div class="xuFormBody">
        <div class="xuLoader">
            <i class="fa fa-info-circle"></i>
            <span>Anda akan mengubah data biblio — Terakhir diubah oleh <strong>Admin</strong></span>
        </div>
        <form class="form-horizontal" action="<?= base_url('bibliography/update') ?>" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="gmd" class="control-label">Gmd Type</label>
                        <input type="hidden" name="biblio_id" value='<?= $data[0]->biblio_id ?>'>
                        <input type="hidden" id="selectgmd" value='<?= json_encode($data[0]->gmd_id) ?>'>
                        <select class="form-control select2add" data-type="gmd" name="gmd" id="gmd">
                            <?php foreach ($mst_data['mst_gmd'] as $val): ?>
                                <option value="<?= $val->gmd_id ?>"><?= $val->gmd_name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="item_type" class="control-label">Item Type</label>
                        <input type="hidden" id="selectitem_type_id" value='<?= json_encode($data[0]->item_type_id) ?>'>
                        <select class="form-control select2add" data-type="item_type" name="item_type" id="item_type">
                            <option value="" disabled hidden selected></option>
                            <?php foreach ($mst_data['mst_item_type'] as $val): ?>
                                <option value="<?= $val->item_type_id ?>"><?= $val->item_type_name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="title" class="control-label">Title</label>
                        <textarea name="title" class="form-control" id="title"><?= $data[0]->title ?></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="author" class="control-label">Author</label>
                        <input type="hidden" id="selectauthor" value='<?= json_encode($data[0]->uthors) ?>'>
                        <select class="form-control select2add" data-type="author" name="author[]" id="author" multiple>
                            <?php foreach ($mst_data['mst_authors'] as $val): ?>
                                <option value="<?= $val->author_id ?>"><?= $val->author_name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="student_id" class="control-label">Student Id</label>
                        <input class="form-control" type="text" name="student_id" id="student_id" value="<?= $data[0]->student_id ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="cp_email" class="control-label">Contact Email</label>
                        <input class="form-control" type="text" name="cp_email" id="cp_email" value="<?= $data[0]->cp_email ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="supervisor" class="control-label">Supervisor</label>
                        <input type="hidden" id="selectsupervisor" value='<?= json_encode($data[0]->supervisor) ?>'>
                        <select class="form-control select2add" data-type="supervisor" name="supervisor[]" id="supervisor" multiple>
                            <?php foreach ($mst_data['mst_supervisor'] as $val): ?>
                                <option value="<?= $val->supervisor_id ?>"><?= $val->supervisor_name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="examiner" class="control-label">Examiner</label>
                        <input type="hidden" id="selectexaminer" value='<?= json_encode($data[0]->examiner) ?>'>
                        <select class="form-control select2add" data-type="examiner" name="examiner[]" id="examiner" multiple>
                            <?php foreach ($mst_data['mst_examiner'] as $val): ?>
                                <option value="<?= $val->examiner_id ?>"><?= $val->examiner_name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="contributor" class="control-label">Contributor</label>
                        <input type="hidden" id="selectcontributor" value='<?= json_encode($data[0]->contributor) ?>'>
                        <select class="form-control select2add" data-type="contributor" name="contributor[]" id="contributor" multiple>
                            <?php foreach ($mst_data['mst_contributor'] as $val): ?>
                                <option value="<?= $val->contributor_id ?>"><?= $val->contributor_name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="ministry" class="control-label">Code Ministry Pddikti</label>
                        <input type="hidden" id="selectministry" value='<?= json_encode($data[0]->code_ministry) ?>'>
                        <select class="form-control select2 select2ad" data-type='ministry' name="ministry" id="ministry">
                            <option value="" selected hidden disabled></option>
                            <option value="create_new">➕ Tambah Code Ministry Pddikti</option>
                            <?php foreach ($mst_data['mst_ministry'] as $val): ?>
                                <option value="<?= $val->code_ministry ?>"><?= $val->name_prodi ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="place" class="control-label">Publishing Place</label>
                        <input type="hidden" id="selectplace" value='<?= json_encode($data[0]->publish_place_id) ?>'>
                        <select class="form-control select2add" data-type="place" name="place" id="place">
                            <option value="" disabled hidden selected></option>
                            <?php foreach ($mst_data['mst_place'] as $val): ?>
                                <option value="<?= $val->place_id ?>"><?= $val->place_name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="edition" class="control-label">Date Type</label>
                        <input type="hidden" id="selectedition" value='<?= json_encode($data[0]->edition) ?>'>
                        <select class="form-control" name="edition" id="edition">
                            <option value="0">Pilih</option>
                            <option value="Published">Published</option>
                            <option value="In Press">In Press</option>
                            <option value="Submitted">Submitted</option>
                            <option value="Unpublished">Unpublished</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="collation" class="control-label">Collation</label>
                        <input class="form-control" type="text" name="collation" id="collation" value="<?= $data[0]->collation ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="specDetailInfo" class="control-label">Specific Detail Info</label>
                        <input class="form-control" type="text" name="specDetailInfo" id="specDetailInfo" value="<?= $data[0]->spec_detail_info ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="language" class="control-label">Language</label>
                        <input type="hidden" id="selectlanguage" value='<?= json_encode($data[0]->language_id) ?>'>
                        <select class="form-control select2add" data-type="language" name="language" id="language">
                            <option value="" disabled hidden selected></option>
                            <?php foreach ($mst_data['mst_language'] as $val): ?>
                                <option value="<?= $val->language_id ?>"><?= $val->language_name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="departement" class="control-label">Department</label>
                        <input class="form-control" type="text" name="departement" id="departement" value="<?= $data[0]->departement ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="copyright" class="control-label">Copyright</label>
                        <input type="hidden" id="selectcopyright" value='<?= json_encode($data[0]->copyright) ?>'>
                        <select class="form-control select2add" data-type="copyright" name="copyright" id="copyright">
                            <option value="" disabled hidden selected></option>
                            <?php foreach ($mst_data['mst_copyright'] as $val): ?>
                                <option value="<?= $val->copyright_id ?>"><?= $val->copyright_name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="publisher" class="control-label">Publisher</label>
                        <input type="hidden" id="selectpublisher" value='"[<?= $data[0]->publisher_id ?>]"'>
                        <select class="form-control select2add" data-type="publisher" name="publisher" id="publisher">
                            <option value="" disabled hidden selected></option>
                            <?php foreach ($mst_data['mst_publisher'] as $val): ?>
                                <option value="<?= $val->publisher_id ?>"><?= $val->publisher_name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="license" class="control-label">License</label>
                        <input type="hidden" id="selectlicense" value='<?= json_encode($data[0]->license) ?>'>
                        <select class="form-control select2add" data-type="license" name="license" id="license">
                            <option value="" disabled hidden selected></option>
                            <?php foreach ($mst_data['mst_license'] as $val): ?>
                                <option value="<?= $val->license_id ?>"><?= $val->license_name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="year" class="control-label">Publish Year</label>
                        <input class="form-control" type="text" name="year" id="year" value="<?= $data[0]->publish_year ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="image" class="control-label">Upload Image</label>
                                <input type="file" class="form-control" name="image" id="image" value="">
                                <small class="form-text text-danger">Maximum 500 KB</small>
                            </div>
                            <div class="col-md-6">
                                <?php
                                $image = empty($data[0]->image) ? base_url("assets/images/user.png") : base_url("uploads/images/docs/" . $data[0]->image);
                                ?>
                                <img class="img-responsive avatar-view xuCoverPreview" src="<?= $image ?>" alt="Cover" title="Change the cover" style="width: 100%; height: 200px;object-fit: cover;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">Attachment</label>
                        <span id="tambahin">
                            <div class="row">
                                <div class="col-md-2">
                                    <input type="text" name="title_file[]" placeholder="Title File" class="form-control">
                                </div>
                                <div class="col-md-1">
                                    <input type="text" name="url_file[]" placeholder="File URL" class="form-control">
                                </div>
                                <div class="col-md-2">
                                    <input type="text" name="desk_file[]" placeholder="File Description" class="form-control">
                                </div>
                                <div class="col-md-2">
                                    <select id="acc_type" class="form-control" name="akses_file[]">
                                        <option value="private">private</option>
                                        <option value="public">public</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select id="acc_member" class="form-control" name="akses_member[]">
                                        <option value="0" selected>Batasi Akses</option>
                                        <option value="1">Semua Anggota</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <input type="file" name="attc_file[]" placeholder="File" class="form-control" onchange="return validExt(this,2097152,['pdf'])" accept="application/pdf">
                                    <small class="form-text text-danger">Max PDF size 50 MB</small>
                                </div>
                                <div class="col-sm-1">
                                    <button type="button" class="btn btn-success btn-block" id="addRow"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                        </span>
                        <?php $x = 1;
                        foreach (json_decode($data[0]->attachment) as $att) : ?>
                            <span class="attachment-row" data-index="<?= $x ?>">
                                <div class="col-sm-2">
                                    <input type="hidden" name="edit_file_id[<?= $x ?>]" value="<?= $att->file_id ?>">
                                    <input type="text" name="edit_title_file[<?= $x ?>]" value="<?= $att->file_title ?>" class="form-control editable-field" readonly>
                                </div>
                                <div class="col-sm-1">
                                    <input type="text" name="edit_url_file[<?= $x ?>]" value="<?= $att->file_url ?? '-' ?>" class="form-control editable-field" readonly>
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" name="edit_desk_file[<?= $x ?>]" value="<?= $att->file_desc ?? '-' ?>" class="form-control editable-field" readonly>
                                </div>
                                <div class="col-sm-2">
                                    <select name="edit_akses_file[<?= $x ?>]" class="form-control editable-field" readonly>
                                        <option value="private" <?= $att->access_type == 'private' ? 'selected' : '' ?>>Private</option>
                                        <option value="public" <?= $att->access_type == 'public' ? 'selected' : '' ?>>Public</option>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <select name="edit_akses_member[<?= $x ?>]" class="form-control editable-field" readonly>
                                        <option value="0" <?= $att->access_limit == 0 ? 'selected' : '' ?>>Batasi Akses</option>
                                        <option value="1" <?= $att->access_limit == 1 ? 'selected' : '' ?>>Semua Anggota</option>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <input type="file" name="edit_attc_file[<?= $x ?>]" class="form-control" accept="application/pdf">
                                    <small class="form-text text-danger">Max PDF size 50 MB</small>
                                </div>
                                <div class="col-sm-1" style="display:flex;gap:4px;flex-wrap:wrap">
                                    <button type="button" class="btn btn-primary btn-edit" onclick="toggleEditAttachment(<?= $x ?>)" title="Edit"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-success btn-save" onclick="saveAttachment(<?= $x ?>)" style="display: none;" title="Simpan"><i class="fa fa-save"></i></button>
                                    <button type="button" class="btn btn-danger btn-remove" onclick="hapusAttahcment(<?= $att->biblio_id ?>, <?= $att->file_id ?>)" title="Hapus"><i class="fa fa-minus"></i></button>
                                </div>
                            </span>
                        <?php $x++;
                        endforeach; ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="topic" class="control-label">Subyek</label>
                        <input type="hidden" id="selecttopic" value='<?= json_encode($data[0]->topic) ?>'>
                        <select class="form-control select2" name="topic[]" id="topic" multiple>
                            <?php foreach ($mst_data['mst_topic'] as $val): ?>
                                <option value="<?= $val->topic_id ?>"><?= $val->topic ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="notes" class="control-label">Abstrak</label>
                        <textarea class="form-control" name="notes" id="notes"><?= $data[0]->notes ?></textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="class" class="control-label">Klasifikasi</label>
                        <input class="form-control" type="text" name="class" id="class" maxlength="40" value="<?= $data[0]->classification ?>">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="callNumber" class="control-label">No. panggil</label>
                        <input class="form-control" type="text" name="callNumber" id="callNumber" value="<?= $data[0]->call_number ?>">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="urlcrossref" class="control-label">Url Crossref</label>
                        <input class="form-control" type="text" name="urlcrossref" id="urlcrossref" value="<?= $data[0]->url_crossref ?>">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="sendMail" class="control-label">Send Email Approved</label>
                        <select class="form-control" name="sendMail" id="sendMail">
                            <option value="0">Pilih</option>
                            <option value="Send">Send</option>
                            <option value="Not Send">Not Send</option>
                        </select>
                    </div>
                </div>
                <div class="w-100">
                    <hr class="xuDivider">
                </div>
                <div class="col-md-12">
                    <div class="form-group" id="approvalSection">
                        <button name="saveData" class="xuUpdateBtn"><i class="fa fa-save"></i> Update Bibliography</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- ============ MODAL ADD OPTION ============ -->
<div id="modal-add-option" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Opsi Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-add-option">
                    <div class="form-group">
                        <label id="label-id" for="codenya">Code Ministry*</label>
                        <input type="text" id="codenya" name="codenya" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_prodi">Nama Prodi*</label>
                        <input type="text" id="nama_prodi" name="nama_prodi" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="degree">Degree*</label>
                        <select name="degree" id="degree" class="form-control" required>
                            <option value="" selected disabled hidden></option>
                            <option value="1">D1</option>
                            <option value="2">D2</option>
                            <option value="3">D3</option>
                            <option value="4">D4</option>
                            <option value="5">S1</option>
                            <option value="6">S2</option>
                            <option value="7">S3</option>
                            <option value="8">Non Formal</option>
                            <option value="9">Informal</option>
                            <option value="10">Lainnya</option>
                            <option value="11">Sp-1</option>
                            <option value="12">Sp-2</option>
                            <option value="13">Profesi</option>
                            <option value="14">S2 Terapan</option>
                            <option value="15">S3 Terapan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="university">University*</label>
                        <input type="text" class="form-control" name="university" id="university" value="" maxlength="100" tabindex="1" required>
                    </div>
                    <button type="submit" class="btn btn-primary text-right">
                        <i class="fa fa-save"></i> Simpan
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
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

    // ===== Toggle edit attachment =====
    window.toggleEditAttachment = function(index) {
        var fields = document.querySelectorAll('.attachment-row[data-index="' + index + '"] .editable-field');
        var editButton = document.querySelector('.attachment-row[data-index="' + index + '"] .btn-edit');
        var saveButton = document.querySelector('.attachment-row[data-index="' + index + '"] .btn-save');
        fields.forEach(function(field){
            field.removeAttribute('readonly');
            if (field.tagName === 'SELECT') { field.removeAttribute('disabled'); }
            field.classList.add('editable-active');
        });
        editButton.style.display = 'none';
        saveButton.style.display = 'inline-block';
    };

    // ===== Save attachment (mark as ready) =====
    window.saveAttachment = function(index) {
        var fields = document.querySelectorAll('.attachment-row[data-index="' + index + '"] .editable-field');
        var editButton = document.querySelector('.attachment-row[data-index="' + index + '"] .btn-edit');
        var saveButton = document.querySelector('.attachment-row[data-index="' + index + '"] .btn-save');
        fields.forEach(function(field){
            field.setAttribute('readonly', 'readonly');
            if (field.tagName === 'SELECT') { field.setAttribute('disabled', 'disabled'); }
            field.classList.remove('editable-active');
        });
        editButton.style.display = 'inline-block';
        saveButton.style.display = 'none';
        alert('Changes saved for this attachment. Click the main "Update" button to apply all changes.');
    };
});
</script>