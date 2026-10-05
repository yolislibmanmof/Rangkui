<style>
/* ================================================================
   DIFOSS TITLES REPORT — EMERALD FOREST EDITION
   ================================================================ */
:root{
    --tr-emerald:#059669; --tr-teal:#0891b2; --tr-gold:#f59e0b;
    --tr-mint:#6ee7b7; --tr-deep:#0a2920;
    --tr-ink:#0f172a; --tr-muted:#64748b; --tr-soft:#94a3b8;
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
    background:linear-gradient(90deg,var(--tr-emerald),var(--tr-teal),var(--tr-gold),var(--tr-emerald));
    background-size:200% 100%;
    color:#fff;
    display:flex;align-items:center;justify-content:space-between;
    flex-wrap:wrap;gap:14px;
    animation:xuTrGrad 7s linear infinite;
    position:relative;overflow:hidden;
}
.xuRepHead::after{
    content:'';position:absolute;top:-60%;right:-8%;
    width:320px;height:320px;border-radius:50%;
    background:radial-gradient(circle,rgba(245,158,11,.25),transparent 70%);
    pointer-events:none;
}
@keyframes xuTrGrad{to{background-position:200% 0}}

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

.xuRepHead .collapse-link{
    color:#fff;cursor:pointer;opacity:.85;
    width:34px;height:34px;border-radius:10px;
    background:rgba(255,255,255,.15);
    backdrop-filter:blur(8px);
    border:1px solid rgba(255,255,255,.25);
    display:flex;align-items:center;justify-content:center;
    transition:.25s;
    position:relative;z-index:2;
}
.xuRepHead .collapse-link:hover{opacity:1;background:rgba(255,255,255,.28)}
.xuRepHead .collapse-link.collapsed i{transform:rotate(180deg)}
.xuRepHead .collapse-link i{transition:transform .3s}

/* ===== FORM BODY ===== */
.xuRepBody{padding:28px 30px;transition:.3s}
.xuRepBody.collapsed{display:none}

.xuRepBody .control-label{
    font-weight:800;font-size:.74rem;
    color:var(--tr-ink);margin-bottom:7px;display:block;
    text-transform:uppercase;letter-spacing:.08em;
}
html.xu-dark .xuRepBody .control-label{color:#e2e8f0}

.xuRepBody .form-control{
    width:100%;padding:11px 14px;
    border:1.5px solid #cbd5e1;
    border-radius:12px;font-size:.9rem;
    outline:none;background:#f8fafc;
    color:var(--tr-ink);
    font-family:inherit;
    transition:.25s;
}
.xuRepBody .form-control:hover{
    border-color:var(--tr-emerald);
    background:rgba(5,150,105,.04);
}
.xuRepBody .form-control:focus{
    border-color:var(--tr-emerald);
    background:#fff;
    box-shadow:0 0 0 4px rgba(5,150,105,.12);
}
html.xu-dark .xuRepBody .form-control{background:rgba(255,255,255,.05);border-color:rgba(5,150,105,.25);color:#f1f5f9}
html.xu-dark .xuRepBody .form-control:hover{background:rgba(5,150,105,.08)}
html.xu-dark .xuRepBody .form-control:focus{border-color:var(--tr-gold);background:rgba(255,255,255,.08);box-shadow:0 0 0 4px rgba(245,158,11,.15)}

.xuRepBody .form-group{margin-bottom:18px}

/* ===== TOMBOL ===== */
.xuBtnAdv{
    display:inline-flex;align-items:center;gap:8px;
    padding:10px 18px;border-radius:12px;
    background:rgba(5,150,105,.08);
    color:var(--tr-emerald);
    border:1.5px solid rgba(5,150,105,.3);
    font-weight:700;font-size:.85rem;
    cursor:pointer;transition:.25s;
    font-family:inherit;
}
.xuBtnAdv:hover{
    transform:translateY(-2px);
    background:rgba(5,150,105,.14);
    border-color:rgba(5,150,105,.45);
}
.xuBtnAdv.active{
    background:linear-gradient(135deg,rgba(5,150,105,.15),rgba(245,158,11,.08));
    border-color:var(--tr-gold);
    color:var(--tr-gold);
}
html.xu-dark .xuBtnAdv{background:rgba(5,150,105,.12);color:var(--tr-mint);border-color:rgba(5,150,105,.3)}
html.xu-dark .xuBtnAdv.active{background:rgba(245,158,11,.12);color:var(--tr-gold);border-color:rgba(245,158,11,.4)}

.xuBtnApply{
    display:inline-flex;align-items:center;gap:8px;
    padding:10px 22px;border-radius:12px;
    background:linear-gradient(90deg,var(--tr-emerald),var(--tr-gold));
    color:#fff;border:none;
    font-weight:800;font-size:.85rem;
    letter-spacing:.03em;
    cursor:pointer;transition:.25s;
    box-shadow:0 8px 20px rgba(5,150,105,.35);
    position:relative;overflow:hidden;
    font-family:inherit;
}
.xuBtnApply::before{
    content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;
    background:linear-gradient(100deg,transparent 20%,rgba(255,255,255,.3) 50%,transparent 80%);
    transition:left .6s ease;
}
.xuBtnApply:hover{transform:translateY(-2px);filter:brightness(1.08);box-shadow:0 12px 28px rgba(5,150,105,.45)}
.xuBtnApply:hover::before{left:120%}

/* ===== SELECT2 EMERALD ===== */
.select2-container{width:100%!important}
.select2-container .select2-selection--single,
.select2-container .select2-selection--multiple{
    border:1.5px solid #cbd5e1!important;
    border-radius:12px!important;
    background:#f8fafc!important;
    min-height:46px!important;
}
.select2-container--default .select2-selection--single .select2-selection__rendered{
    line-height:43px!important;color:var(--tr-ink)!important;
    font-weight:600!important;padding-left:14px!important;font-size:.9rem;
}
.select2-container--default .select2-selection--single .select2-selection__arrow{height:44px!important}
.select2-container--default .select2-selection--single .select2-selection__arrow b{
    border-color:var(--tr-emerald) transparent transparent transparent!important;
}
.select2-container--default .select2-selection--single .select2-selection__placeholder,
.select2-container--default .select2-selection--multiple .select2-selection__placeholder{
    color:var(--tr-soft)!important;
}

.select2-container--default.select2-container--focus .select2-selection--multiple,
.select2-container--default.select2-container--open .select2-selection--single{
    border-color:var(--tr-emerald)!important;
    box-shadow:0 0 0 4px rgba(5,150,105,.12)!important;
    background:#fff!important;
}
html.xu-dark .select2-container .select2-selection--single,
html.xu-dark .select2-container .select2-selection--multiple{
    background:rgba(255,255,255,.05)!important;border-color:rgba(5,150,105,.25)!important;
}
html.xu-dark .select2-container--default .select2-selection--single .select2-selection__rendered{color:#f1f5f9!important}
html.xu-dark .select2-container--default.select2-container--focus .select2-selection--multiple,
html.xu-dark .select2-container--default.select2-container--open .select2-selection--single{
    border-color:var(--tr-gold)!important;box-shadow:0 0 0 4px rgba(245,158,11,.15)!important;
    background:rgba(255,255,255,.08)!important;
}

.select2-container--default .select2-selection--multiple .select2-selection__choice{
    background:rgba(5,150,105,.12)!important;
    border:1px solid rgba(5,150,105,.25)!important;
    color:var(--tr-emerald)!important;
    font-weight:700!important;border-radius:8px!important;
    padding:3px 8px!important;
}
.select2-container--default .select2-selection--multiple .select2-selection__choice__remove{
    color:var(--tr-emerald)!important;
}
.select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover{
    color:#dc2626!important;
}
html.xu-dark .select2-container--default .select2-selection--multiple .select2-selection__choice{
    background:rgba(5,150,105,.18)!important;color:var(--tr-mint)!important;
    border-color:rgba(5,150,105,.35)!important;
}

.select2-container--default .select2-results__option--highlighted[aria-selected]{
    background:linear-gradient(90deg,var(--tr-emerald),var(--tr-teal))!important;
    color:#fff!important;
}
.select2-container--default .select2-results__option[aria-selected=true]{
    background:rgba(5,150,105,.12)!important;color:var(--tr-emerald)!important;font-weight:700!important;
}
html.xu-dark .select2-container--default .select2-results__option[aria-selected=true]{
    background:rgba(245,158,11,.15)!important;color:var(--tr-gold)!important;
}

.select2-dropdown{
    border:1.5px solid var(--tr-emerald)!important;
    border-radius:12px!important;overflow:hidden!important;
    box-shadow:0 18px 44px rgba(15,23,42,.15)!important;
    margin-top:4px!important;
}
html.xu-dark .select2-dropdown{background:#0f1e1f!important;border-color:rgba(5,150,105,.35)!important}

.select2-search--dropdown .select2-search__field{
    border:1.5px solid #cbd5e1!important;border-radius:9px!important;
    padding:8px 12px!important;outline:none!important;font-family:inherit;
}
.select2-search--dropdown .select2-search__field:focus{
    border-color:var(--tr-emerald)!important;box-shadow:0 0 0 3px rgba(5,150,105,.1)!important;
}
html.xu-dark .select2-search--dropdown .select2-search__field{
    background:rgba(255,255,255,.05)!important;border-color:rgba(5,150,105,.25)!important;color:#f1f5f9!important;
}

.select2-container--default .select2-results__option{
    padding:9px 14px!important;font-size:.88rem!important;color:var(--tr-ink);transition:.15s;
}
html.xu-dark .select2-container--default .select2-results__option{color:#e2e8f0}

/* ===== TABEL ===== */
.xuTableWrap{overflow-x:auto}
.xuTable{width:100%;border-collapse:separate;border-spacing:0}

.xuTable thead th{
    background:linear-gradient(180deg,rgba(5,150,105,.08),rgba(5,150,105,.03));
    color:var(--tr-emerald);
    font-weight:800;font-size:.72rem;
    text-transform:uppercase;letter-spacing:.08em;
    padding:14px 16px;border:none;
    border-bottom:1.5px solid rgba(5,150,105,.2);
    white-space:nowrap;text-align:left;
}
html.xu-dark .xuTable thead th{
    background:linear-gradient(180deg,rgba(5,150,105,.15),rgba(5,150,105,.06));
    color:var(--tr-mint);border-bottom-color:rgba(5,150,105,.35);
}

.xuTable tbody td{
    padding:14px 16px;
    border-bottom:1px solid #f1f3f8;
    color:var(--tr-muted);font-size:.88rem;
    vertical-align:middle;
}
html.xu-dark .xuTable tbody td{border-bottom-color:rgba(5,150,105,.1);color:#cbd5e1}

.xuTable tbody tr{transition:.2s}
.xuTable tbody tr:nth-child(even){background:rgba(5,150,105,.03)}
.xuTable tbody tr:hover{background:rgba(5,150,105,.06)}
.xuTable tbody tr:hover td:first-child{box-shadow:inset 4px 0 0 var(--tr-emerald)}
html.xu-dark .xuTable tbody tr:nth-child(even){background:rgba(5,150,105,.06)}
html.xu-dark .xuTable tbody tr:hover{background:rgba(5,150,105,.1)}
html.xu-dark .xuTable tbody tr:hover td:first-child{box-shadow:inset 4px 0 0 var(--tr-gold)}

/* Col 1: No. */
.xuTable tbody td:nth-child(1){
    font-family:'JetBrains Mono',monospace;
    font-weight:700;color:var(--tr-emerald);
    text-align:center;font-size:.82rem;
    width:60px;
}
html.xu-dark .xuTable tbody td:nth-child(1){color:var(--tr-mint)}

/* Col 2: GMD badge */
.xuTable tbody td:nth-child(2){
    color:var(--tr-gold);font-weight:700;
    font-size:.82rem;
}
.xuTable tbody td:nth-child(2) span{
    display:inline-block;
    padding:4px 10px;border-radius:8px;
    background:rgba(245,158,11,.1);
    border:1px solid rgba(245,158,11,.3);
    font-size:.75rem;letter-spacing:.03em;
}
html.xu-dark .xuTable tbody td:nth-child(2) span{background:rgba(245,158,11,.15);border-color:rgba(245,158,11,.4);color:#fde68a}

/* Col 3: Title + authors */
.xuTable tbody td:nth-child(3){
    font-family:'Neuton',Georgia,serif;
    font-weight:700;color:var(--tr-ink);
    font-size:.98rem;
}
.xuTable tbody td:nth-child(3) p{
    margin:5px 0 0;font-size:.78rem;
    color:var(--tr-teal);
    font-family:'Plus Jakarta Sans',sans-serif;
    font-style:italic;font-weight:500;
}
html.xu-dark .xuTable tbody td:nth-child(3){color:#f1f5f9}
html.xu-dark .xuTable tbody td:nth-child(3) p{color:var(--tr-mint)}

/* Col 4, 5: Place & Publisher */
.xuTable tbody td:nth-child(4),
.xuTable tbody td:nth-child(5){
    color:var(--tr-ink);font-weight:600;
}
html.xu-dark .xuTable tbody td:nth-child(4),
html.xu-dark .xuTable tbody td:nth-child(5){color:#e2e8f0}

/* Col 6: Date */
.xuTable tbody td:nth-child(6){
    font-family:'JetBrains Mono',monospace;
    color:var(--tr-muted);font-weight:600;
    font-size:.82rem;
}
html.xu-dark .xuTable tbody td:nth-child(6){color:var(--tr-soft)}

/* Col 7: Call Number mono */
.xuTable tbody td:nth-child(7){
    font-family:'JetBrains Mono',monospace;
    font-weight:700;color:var(--tr-emerald);
    font-size:.85rem;
    background:rgba(5,150,105,.06);
    padding:6px 12px;border-radius:8px;
    border:1px solid rgba(5,150,105,.18);
    white-space:nowrap;
}
html.xu-dark .xuTable tbody td:nth-child(7){
    color:var(--tr-mint);background:rgba(5,150,105,.12);border-color:rgba(5,150,105,.3);
}

/* Empty state */
.xuEmptyRow td{
    text-align:center;padding:50px 20px!important;
    color:var(--tr-soft)!important;font-size:.92rem;font-weight:600;
    background:linear-gradient(135deg,rgba(5,150,105,.04),rgba(245,158,11,.02))!important;
}
.xuEmptyRow i{font-size:2.2rem;color:var(--tr-emerald);display:block;margin-bottom:10px}

@media(max-width:720px){
    .xuRepHead{padding:18px 20px}
    .xuRepHead h2{font-size:1.15rem}
    .xuRepBody{padding:20px 18px}
    .xuTable thead th,.xuTable tbody td{padding:10px 12px;font-size:.82rem}
}
</style>

<div class="xuRepCard xuR">
    <div class="xuRepHead">
        <h2><i class="fa fa-filter"></i> Filter Report</h2>
        <ul class="nav navbar-right panel_toolbox" style="min-width:0;margin:0;border:none;">
            <li>
                <a class="collapse-link" id="xuCollapseFilter"><i class="fa fa-chevron-up"></i></a>
            </li>
        </ul>
    </div>

    <form action="<?= site_url('report/titles/filter'); ?>" method="post" id="frm-filter">
        <div class="xuRepBody" id="xuFilterBody">
            <div class="form-group row">
                <label class="control-label col-md-4 col-sm-4">Title</label>
                <div class="col-md-8 col-sm-8">
                    <input type="text" class="form-control" name="title">
                </div>
            </div>
            <div id="show-more" style="display:none;">
                <div class="form-group row">
                    <label class="control-label col-md-4 col-sm-4">Author</label>
                    <div class="col-md-8 col-sm-8">
                        <input type="text" class="form-control" name="author">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-4 col-sm-4">Classification</label>
                    <div class="col-md-8 col-sm-8">
                        <input type="text" class="form-control" name="classification">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-4 col-sm-4">GMD</label>
                    <div class="col-md-8 col-sm-8">
                        <select name="gmd[]" id="gmd" class="form-control select2" data-placeholder="--GMD Type--" multiple="multiple">
                            <option></option>
                            <?php foreach ($list_gmd as $key => $val) : ?>
                                <option value="<?= $val['gmd_id']; ?>"><?= $val['gmd_name']; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-4 col-sm-4">Collection Type</label>
                    <div class="col-md-8 col-sm-8">
                        <select name="coll_type[]" id="coll_type" class="form-control select2" data-placeholder="--Collection Type--" multiple="multiple">
                            <option></option>
                            <?php foreach ($list_coll as $key => $val) : ?>
                                <option value="<?= $val['coll_type_id']; ?>"><?= $val['coll_type_name']; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-4 col-sm-4">Languages</label>
                    <div class="col-md-8 col-sm-8">
                        <select name="lang" id="lang" class="form-control select2" data-placeholder="--Languages--">
                            <option></option>
                            <?php foreach ($list_lang as $key => $val) : ?>
                                <option value="<?= $val['language_id']; ?>"><?= $val['language_name']; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-4 col-sm-4">Location</label>
                    <div class="col-md-8 col-sm-8">
                        <select name="loc" id="loc" class="form-control select2" data-placeholder="--Locations--">
                            <option></option>
                            <?php foreach ($list_loc as $key => $val) : ?>
                                <option value="<?= $val['location_id']; ?>"><?= $val['location_name']; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group row" style="margin-bottom:0">
                <div class="col-md-8 col-sm-8 offset-md-4" style="display:flex;gap:10px;flex-wrap:wrap">
                    <button type="button" class="xuBtnAdv" id="adv-filter"><i class="fa fa-sliders"></i> Advanced filter</button>
                    <button type="submit" class="xuBtnApply"><i class="fa fa-check"></i> Apply Filter</button>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="xuRepCard xuR">
    <div class="xuRepHead">
        <h2><i class="fa fa-book"></i> Titles Report</h2>
    </div>
    <div class="xuRepBody">
        <div class="xuTableWrap">
            <table class="table table-bordered xuTable" id="titles-table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th style="width:60px">No.</th>
                        <th style="width:130px">GMD</th>
                        <th>Title</th>
                        <th>Publication Place</th>
                        <th>Publisher</th>
                        <th style="width:150px">Endorsment Date</th>
                        <th style="width:150px">Call Number</th>
                    </tr>
                </thead>
                <tbody id="titles-data">
                    <?php
                    $__list = isset($title_report) ? $title_report : [];
                    if (empty($__list)): ?>
                        <tr class="xuEmptyRow">
                            <td colspan="7">
                                <i class="fa fa-book"></i>
                                <b>Belum ada data judul.</b><br>
                                <small>Terapkan filter untuk menampilkan laporan judul.</small>
                            </td>
                        </tr>
                    <?php else:
                        $i = 1;
                        foreach ($__list as $val): ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><span><?= esc($val->gmd_name); ?></span></td>
                            <td>
                                <?= esc($val->title); ?>
                                <p><i><?= esc($val->authors); ?></i></p>
                            </td>
                            <td><?= esc($val->place_name); ?></td>
                            <td><?= esc($val->publisher_name); ?></td>
                            <td>
                                <?php if (!empty($val->isbn_issn)): ?>
                                    <?= date("Y-m-d", strtotime($val->isbn_issn)); ?>
                                <?php else: ?>
                                    <span style="color:var(--tr-soft);font-style:italic">—</span>
                                <?php endif ?>
                            </td>
                            <td><?= esc($val->call_number); ?></td>
                        </tr>
                    <?php endforeach; endif; ?>
                </tbody>
            </table>
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

    // ===== Advanced filter toggle =====
    var advBtn = document.getElementById('adv-filter');
    var showMore = document.getElementById('show-more');
    if (advBtn && showMore){
        advBtn.addEventListener('click', function(){
            var open = showMore.style.display !== 'none';
            showMore.style.display = open ? 'none' : 'block';
            advBtn.classList.toggle('active', !open);
            var ico = advBtn.querySelector('i');
            if (ico) ico.className = open ? 'fa fa-sliders' : 'fa fa-caret-up';
        });
    }

    // ===== Collapse card toggle =====
    var colBtn = document.getElementById('xuCollapseFilter');
    var body = document.getElementById('xuFilterBody');
    if (colBtn && body){
        colBtn.addEventListener('click', function(e){
            e.preventDefault();
            body.classList.toggle('collapsed');
            colBtn.classList.toggle('collapsed');
        });
    }
});
</script>