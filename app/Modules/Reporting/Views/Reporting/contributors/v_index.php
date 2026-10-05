<style>
/* ================================================================
   DIFOSS CONTRIBUTORS REPORT — EMERALD FOREST EDITION
   ================================================================ */
:root{
    --rp-emerald:#059669; --rp-teal:#0891b2; --rp-gold:#f59e0b;
    --rp-mint:#6ee7b7; --rp-deep:#0a2920;
    --rp-ink:#0f172a; --rp-muted:#64748b; --rp-soft:#94a3b8;
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
    background:linear-gradient(90deg,var(--rp-emerald),var(--rp-teal),var(--rp-gold),var(--rp-emerald));
    background-size:200% 100%;
    color:#fff;
    display:flex;align-items:center;justify-content:space-between;
    flex-wrap:wrap;gap:14px;
    animation:xuRpGrad 7s linear infinite;
    position:relative;overflow:hidden;
}
.xuRepHead::after{
    content:'';position:absolute;top:-60%;right:-8%;
    width:320px;height:320px;border-radius:50%;
    background:radial-gradient(circle,rgba(245,158,11,.25),transparent 70%);
    pointer-events:none;
}
@keyframes xuRpGrad{to{background-position:200% 0}}

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
.xuRepHead .collapse-link:hover{opacity:1;background:rgba(255,255,255,.28);transform:rotate(180deg)}

/* ===== BODY FORM ===== */
.xuRepBody{padding:28px 30px;transition:.3s}
.xuRepBody.collapsed{display:none}

.xuRepBody .control-label{
    font-weight:800;font-size:.74rem;
    color:var(--rp-ink);margin-bottom:7px;display:block;
    text-transform:uppercase;letter-spacing:.08em;
}
html.xu-dark .xuRepBody .control-label{color:#e2e8f0}

.xuRepBody .form-control{
    width:100%;padding:11px 14px;
    border:1.5px solid #cbd5e1;
    border-radius:12px;font-size:.9rem;
    outline:none;background:#f8fafc;
    color:var(--rp-ink);
    font-family:inherit;
    transition:.25s;
}
.xuRepBody .form-control:hover{
    border-color:var(--rp-emerald);
    background:rgba(5,150,105,.04);
}
.xuRepBody .form-control:focus{
    border-color:var(--rp-emerald);
    background:#fff;
    box-shadow:0 0 0 4px rgba(5,150,105,.12);
}
html.xu-dark .xuRepBody .form-control{background:rgba(255,255,255,.05);border-color:rgba(5,150,105,.25);color:#f1f5f9}
html.xu-dark .xuRepBody .form-control:hover{background:rgba(5,150,105,.08)}
html.xu-dark .xuRepBody .form-control:focus{border-color:var(--rp-gold);background:rgba(255,255,255,.08);box-shadow:0 0 0 4px rgba(245,158,11,.15)}

.xuRepBody .form-group{margin-bottom:18px}

/* ===== TOMBOL ===== */
.xuBtnAdv{
    display:inline-flex;align-items:center;gap:8px;
    padding:10px 18px;border-radius:12px;
    background:rgba(5,150,105,.08);
    color:var(--rp-emerald);
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
    border-color:var(--rp-gold);
    color:var(--rp-gold);
}
html.xu-dark .xuBtnAdv{background:rgba(5,150,105,.12);color:var(--rp-mint);border-color:rgba(5,150,105,.3)}
html.xu-dark .xuBtnAdv.active{background:rgba(245,158,11,.12);color:var(--rp-gold);border-color:rgba(245,158,11,.4)}

.xuBtnApply{
    display:inline-flex;align-items:center;gap:8px;
    padding:10px 22px;border-radius:12px;
    background:linear-gradient(90deg,var(--rp-emerald),var(--rp-gold));
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
.xuBtnApply:hover{
    transform:translateY(-2px);
    filter:brightness(1.08);
    box-shadow:0 12px 28px rgba(5,150,105,.45);
}
.xuBtnApply:hover::before{left:120%}

/* ===== TABEL ===== */
.xuTableWrap{padding:22px 26px;overflow-x:auto}
.xuTable{width:100%;border-collapse:separate;border-spacing:0}

.xuTable thead th{
    background:linear-gradient(180deg,rgba(5,150,105,.08),rgba(5,150,105,.03));
    color:var(--rp-emerald);
    font-weight:800;font-size:.72rem;
    text-transform:uppercase;letter-spacing:.08em;
    padding:14px 16px;border:none;
    border-bottom:1.5px solid rgba(5,150,105,.2);
    white-space:nowrap;text-align:left;
}
html.xu-dark .xuTable thead th{
    background:linear-gradient(180deg,rgba(5,150,105,.15),rgba(5,150,105,.06));
    color:var(--rp-mint);border-bottom-color:rgba(5,150,105,.35);
}

.xuTable tbody td{
    padding:14px 16px;
    border-bottom:1px solid #f1f3f8;
    color:var(--rp-muted);font-size:.88rem;
    vertical-align:middle;
}
html.xu-dark .xuTable tbody td{border-bottom-color:rgba(5,150,105,.1);color:#cbd5e1}

.xuTable tbody tr{transition:.2s}
.xuTable tbody tr:nth-child(even){background:rgba(5,150,105,.03)}
.xuTable tbody tr:hover{background:rgba(5,150,105,.06)}
.xuTable tbody tr:hover td:first-child{box-shadow:inset 4px 0 0 var(--rp-emerald)}
html.xu-dark .xuTable tbody tr:nth-child(even){background:rgba(5,150,105,.06)}
html.xu-dark .xuTable tbody tr:hover{background:rgba(5,150,105,.1)}
html.xu-dark .xuTable tbody tr:hover td:first-child{box-shadow:inset 4px 0 0 var(--rp-gold)}

.xuTitleCell{
    font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:.98rem;
    color:var(--rp-ink);line-height:1.4;
}
html.xu-dark .xuTitleCell{color:#f1f5f9}

.xuYearBadge{
    display:inline-flex;align-items:center;gap:5px;
    font-family:'JetBrains Mono',monospace;
    font-weight:800;color:var(--rp-gold);
    background:rgba(245,158,11,.1);
    border:1px solid rgba(245,158,11,.3);
    padding:4px 11px;border-radius:9px;
    font-size:.82rem;
}
html.xu-dark .xuYearBadge{color:#fde68a;background:rgba(245,158,11,.15);border-color:rgba(245,158,11,.4)}

.xuNoCell{
    font-family:'JetBrains Mono',monospace;
    font-weight:700;color:var(--rp-emerald);
    font-size:.82rem;
}
html.xu-dark .xuNoCell{color:var(--rp-mint)}

/* Empty state */
.xuEmptyRow td{
    text-align:center;padding:50px 20px!important;
    color:var(--rp-soft)!important;
    font-size:.92rem;font-weight:600;
    background:linear-gradient(135deg,rgba(5,150,105,.04),rgba(245,158,11,.02))!important;
}
.xuEmptyRow i{
    font-size:2.2rem;color:var(--rp-emerald);
    display:block;margin-bottom:10px;
}

/* ===== SELECT2 EMERALD ===== */
.select2-container .select2-selection--multiple{
    border:1.5px solid #cbd5e1!important;
    border-radius:12px!important;
    background:#f8fafc!important;
    min-height:44px!important;
}
.select2-container--default.select2-container--focus .select2-selection--multiple{
    border-color:var(--rp-emerald)!important;
    box-shadow:0 0 0 4px rgba(5,150,105,.12)!important;
}
.select2-container--default .select2-selection--multiple .select2-selection__choice{
    background:rgba(5,150,105,.12)!important;
    border:1px solid rgba(5,150,105,.25)!important;
    color:var(--rp-emerald)!important;
    font-weight:700!important;
    border-radius:8px!important;
    padding:3px 8px!important;
}
.select2-container--default .select2-selection--multiple .select2-selection__choice__remove{
    color:var(--rp-emerald)!important;
}
.select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover{
    color:#dc2626!important;
}
html.xu-dark .select2-container .select2-selection--multiple{
    border-color:rgba(5,150,105,.25)!important;
    background:rgba(255,255,255,.05)!important;
}
html.xu-dark .select2-container--default .select2-selection--multiple .select2-selection__choice{
    background:rgba(5,150,105,.18)!important;
    color:var(--rp-mint)!important;
    border-color:rgba(5,150,105,.35)!important;
}

@media(max-width:720px){
    .xuRepHead{padding:18px 20px}
    .xuRepHead h2{font-size:1.15rem}
    .xuRepBody{padding:20px 18px}
    .xuTableWrap{padding:16px}
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

    <form action="<?= site_url('report/contributors/filter'); ?>" method="post" id="frm-filter">
        <div class="xuRepBody" id="xuFilterBody">
            <div class="form-group row">
                <label class="control-label col-md-4 col-sm-4">Title</label>
                <div class="col-md-8 col-sm-8">
                    <input type="text" class="form-control" name="title">
                </div>
            </div>
            <div id="show-more" style="display: none;">
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
                    <label class="control-label col-md-4 col-sm-4">Contributor Name</label>
                    <div class="col-md-8 col-sm-8">
                        <input type="text" class="form-control" name="contributor_name">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-4 col-sm-4">Contributor Type</label>
                    <div class="col-md-8 col-sm-8">
                        <select name="contributor_type[]" id="contributor_type" class="form-control select2" data-placeholder="--Contributor Type--" multiple="multiple">
                            <option></option>
                            <option value="1">Contributor</option>
                            <option value="3">Editor</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-4 col-sm-4">Item Type</label>
                    <div class="col-md-8 col-sm-8">
                        <select name="item[]" id="item" class="form-control select2" data-placeholder="--item Type--" multiple="multiple">
                            <option></option>
                            <?php foreach ($list_item as $val): ?>
                                <option value="<?= $val->item_type_id; ?>"><?= $val->item_type_name; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-4 col-sm-4">Subject</label>
                    <div class="col-md-8 col-sm-8">
                        <input type="text" class="form-control" name="subject">
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
        <h2><i class="fa fa-bar-chart"></i> Contributors Report</h2>
    </div>
    <div class="xuTableWrap">
        <table class="table table-bordered xuTable" id="contributors-table" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th style="width:60px">No.</th>
                    <th>Title</th>
                    <th>Item Type</th>
                    <th>Subject</th>
                    <th>Contributor</th>
                    <th style="width:100px">Years</th>
                </tr>
            </thead>
            <tbody id="tbody-data">
                <?php if (empty($contributor_report)): ?>
                    <tr class="xuEmptyRow">
                        <td colspan="6">
                            <i class="fa fa-inbox"></i>
                            <b>Belum ada data kontributor.</b><br>
                            <small>Silakan terapkan filter untuk menampilkan laporan.</small>
                        </td>
                    </tr>
                <?php else: ?>
                    <?php
                    $i = 1;
                    foreach ($contributor_report as $val): ?>
                        <tr>
                            <td><span class="xuNoCell"><?= $i++; ?></span></td>
                            <td><span class="xuTitleCell"><?= $val->title; ?></span></td>
                            <td><?= $val->item_type_name; ?></td>
                            <td><?= $val->topic; ?></td>
                            <td><?= $val->contributor_name; ?></td>
                            <td><span class="xuYearBadge"><i class="fa fa-calendar"></i> <?= $val->publish_year; ?></span></td>
                        </tr>
                    <?php endforeach ?>
                <?php endif; ?>
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
            var ico = colBtn.querySelector('i');
            if (ico) ico.className = body.classList.contains('collapsed') ? 'fa fa-chevron-down' : 'fa fa-chevron-up';
        });
    }
});
</script>