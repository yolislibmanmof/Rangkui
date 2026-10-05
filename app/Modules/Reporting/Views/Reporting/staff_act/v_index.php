<style>
/* ================================================================
   DIFOSS STAFF ACTIVITY — EMERALD FOREST EDITION
   ================================================================ */
:root{
    --sa-emerald:#059669; --sa-teal:#0891b2; --sa-gold:#f59e0b;
    --sa-mint:#6ee7b7; --sa-deep:#0a2920;
    --sa-ink:#0f172a; --sa-muted:#64748b; --sa-soft:#94a3b8;
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
    background:linear-gradient(90deg,var(--sa-emerald),var(--sa-teal),var(--sa-gold),var(--sa-emerald));
    background-size:200% 100%;
    color:#fff;
    display:flex;align-items:center;justify-content:space-between;
    flex-wrap:wrap;gap:14px;
    animation:xuSaGrad 7s linear infinite;
    position:relative;overflow:hidden;
}
.xuRepHead::after{
    content:'';position:absolute;top:-60%;right:-8%;
    width:320px;height:320px;border-radius:50%;
    background:radial-gradient(circle,rgba(245,158,11,.25),transparent 70%);
    pointer-events:none;
}
@keyframes xuSaGrad{to{background-position:200% 0}}

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
    color:var(--sa-ink);margin-bottom:7px;display:block;
    text-transform:uppercase;letter-spacing:.08em;
}
html.xu-dark .xuRepBody .control-label{color:#e2e8f0}

.xuRepBody .form-control{
    width:100%;padding:11px 14px;
    border:1.5px solid #cbd5e1;
    border-radius:12px;font-size:.9rem;
    outline:none;background:#f8fafc;
    color:var(--sa-ink);
    font-family:inherit;
    transition:.25s;
}
.xuRepBody .form-control:hover{
    border-color:var(--sa-emerald);
    background:rgba(5,150,105,.04);
}
.xuRepBody .form-control:focus{
    border-color:var(--sa-emerald);
    background:#fff;
    box-shadow:0 0 0 4px rgba(5,150,105,.12);
}
html.xu-dark .xuRepBody .form-control{background:rgba(255,255,255,.05);border-color:rgba(5,150,105,.25);color:#f1f5f9}
html.xu-dark .xuRepBody .form-control:focus{border-color:var(--sa-gold);background:rgba(255,255,255,.08);box-shadow:0 0 0 4px rgba(245,158,11,.15)}

.xuRepBody .form-group{margin-bottom:18px}

/* ===== TOMBOL APPLY ===== */
.xuBtnApply{
    display:inline-flex;align-items:center;gap:8px;
    padding:11px 24px;border-radius:12px;
    background:linear-gradient(90deg,var(--sa-emerald),var(--sa-gold));
    color:#fff;border:none;
    font-weight:800;font-size:.85rem;
    letter-spacing:.03em;
    cursor:pointer;transition:.25s;
    box-shadow:0 10px 26px rgba(5,150,105,.35);
    position:relative;overflow:hidden;
    font-family:inherit;
}
.xuBtnApply::before{
    content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;
    background:linear-gradient(100deg,transparent 20%,rgba(255,255,255,.3) 50%,transparent 80%);
    transition:left .6s ease;
}
.xuBtnApply:hover{transform:translateY(-2px);filter:brightness(1.08);box-shadow:0 14px 32px rgba(5,150,105,.45)}
.xuBtnApply:hover::before{left:120%}

/* ===== TABEL AKTIVITAS ===== */
.xuTableWrap{overflow-x:auto}
.xuTable{width:100%;border-collapse:separate;border-spacing:0}

.xuTable thead th{
    background:linear-gradient(180deg,rgba(5,150,105,.08),rgba(5,150,105,.03));
    color:var(--sa-emerald);
    font-weight:800;font-size:.72rem;
    text-transform:uppercase;letter-spacing:.08em;
    padding:14px 16px;border:none;
    border-bottom:1.5px solid rgba(5,150,105,.2);
    white-space:nowrap;
}
html.xu-dark .xuTable thead th{
    background:linear-gradient(180deg,rgba(5,150,105,.15),rgba(5,150,105,.06));
    color:var(--sa-mint);border-bottom-color:rgba(5,150,105,.35);
}

.xuTable tbody td{
    padding:14px 16px;
    border-bottom:1px solid #f1f3f8;
    color:var(--sa-muted);font-size:.88rem;
    vertical-align:middle;
}
html.xu-dark .xuTable tbody td{border-bottom-color:rgba(5,150,105,.1);color:#cbd5e1}

.xuTable tbody tr{transition:.2s}
.xuTable tbody tr:nth-child(even){background:rgba(5,150,105,.03)}
.xuTable tbody tr:hover{background:rgba(5,150,105,.06)}
.xuTable tbody tr:hover td:first-child{box-shadow:inset 4px 0 0 var(--sa-emerald)}
html.xu-dark .xuTable tbody tr:nth-child(even){background:rgba(5,150,105,.06)}
html.xu-dark .xuTable tbody tr:hover{background:rgba(5,150,105,.1)}
html.xu-dark .xuTable tbody tr:hover td:first-child{box-shadow:inset 4px 0 0 var(--sa-gold)}

/* Kolom 1: Real Name — Neuton serif */
.xuTable tbody td:nth-child(1){
    font-family:'Neuton',Georgia,serif;
    font-weight:700;color:var(--sa-ink);
    font-size:.98rem;
}
html.xu-dark .xuTable tbody td:nth-child(1){color:#f1f5f9}

/* Kolom 2: Username — Mono emerald */
.xuTable tbody td:nth-child(2){
    font-family:'JetBrains Mono',monospace;
    font-weight:700;color:var(--sa-emerald);
    font-size:.85rem;
}
html.xu-dark .xuTable tbody td:nth-child(2){color:var(--sa-mint)}

/* Kolom 3-6: Angka statistik */
.xuTable tbody td:nth-child(n+3){
    text-align:center;
    font-family:'JetBrains Mono',monospace;
    font-weight:800;font-size:.92rem;
    padding:10px 14px;
}
.xuTable tbody td:nth-child(3){color:var(--sa-emerald)}
.xuTable tbody td:nth-child(4){color:var(--sa-teal)}
.xuTable tbody td:nth-child(5){color:var(--sa-gold)}
.xuTable tbody td:nth-child(6){color:#d97706}
html.xu-dark .xuTable tbody td:nth-child(3){color:var(--sa-mint)}
html.xu-dark .xuTable tbody td:nth-child(4){color:#7dd3fc}
html.xu-dark .xuTable tbody td:nth-child(5){color:#fde68a}
html.xu-dark .xuTable tbody td:nth-child(6){color:#fcd34d}

/* Empty state */
.xuEmptyRow td{
    text-align:center;padding:50px 20px!important;
    color:var(--sa-soft)!important;font-size:.92rem;font-weight:600;
    background:linear-gradient(135deg,rgba(5,150,105,.04),rgba(245,158,11,.02))!important;
}
.xuEmptyRow i{font-size:2.2rem;color:var(--sa-emerald);display:block;margin-bottom:10px}

/* Pie chart container */
#pie-chart{width:100%;min-height:400px}

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

    <form action="<?= site_url('report/staff-activity/filter'); ?>" method="post" id="frm-filter">
        <div class="xuRepBody" id="xuFilterBody">
            <div class="form-group row">
                <label class="control-label col-md-4 col-sm-4">Activity From</label>
                <div class="col-md-8 col-sm-8">
                    <input type="date" class="form-control" name="act_from" value="2000-01-01">
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-md-4 col-sm-4">Activity To</label>
                <div class="col-md-8 col-sm-8">
                    <input type="date" class="form-control" name="act_to" value="<?= date("Y-m-d"); ?>">
                </div>
            </div>
            <div class="form-group" style="margin-bottom:0">
                <div class="col-md-8 col-sm-8 offset-md-4">
                    <button type="submit" class="xuBtnApply"><i class="fa fa-check"></i> Apply Filter</button>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="xuRepCard xuR">
    <div class="xuRepHead">
        <h2><i class="fa fa-line-chart"></i> Staff Activity</h2>
    </div>
    <div class="xuRepBody">
        <div class="xuTableWrap">
            <table class="table table-bordered xuTable" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Real Name</th>
                        <th>User Login</th>
                        <th style="text-align:center">Bibliograph Entry</th>
                        <th style="text-align:center">Exemplar / Copy Entry</th>
                        <th style="text-align:center">Member Entry</th>
                        <th style="text-align:center">Circulation Task</th>
                    </tr>
                </thead>
                <tbody id="tbody-data">
                    <?php
                    $__list = $list_report->getResult();
                    if (empty($__list)): ?>
                        <tr class="xuEmptyRow">
                            <td colspan="6">
                                <i class="fa fa-users"></i>
                                <b>Belum ada aktivitas staf.</b><br>
                                <small>Sesuaikan filter tanggal untuk melihat laporan.</small>
                            </td>
                        </tr>
                    <?php else: foreach ($__list as $val): ?>
                        <tr>
                            <td><?= esc($val->realname); ?></td>
                            <td><?= esc($val->username); ?></td>
                            <td><?= (int) $val->biblio_total; ?></td>
                            <td><?= (int) $val->item_total; ?></td>
                            <td><?= (int) $val->member_total; ?></td>
                            <td><?= (int) $val->circulation_total; ?></td>
                        </tr>
                    <?php endforeach; endif; ?>
                </tbody>
            </table>
        </div>

        <div class="col-12 col-md-12 col-sm-12" style="padding:0;margin-top:22px">
            <div id="pie-chart" style="min-width:310px;height:400px;margin:0 auto"></div>
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