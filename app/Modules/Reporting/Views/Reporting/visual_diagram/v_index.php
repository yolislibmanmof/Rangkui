<style>
/* ================================================================
   DIFOSS VISUALIZE DIAGRAM — EMERALD FOREST EDITION
   ================================================================ */
:root{
    --vd-emerald:#059669; --vd-teal:#0891b2; --vd-gold:#f59e0b;
    --vd-mint:#6ee7b7; --vd-deep:#0a2920;
    --vd-ink:#0f172a; --vd-muted:#64748b; --vd-soft:#94a3b8;
}

.xuR{opacity:0;transform:translateY(24px);transition:all .6s cubic-bezier(.2,.8,.2,1)}
.xuR.in{opacity:1;transform:none}

.xuDiagCard{
    background:#fff;border-radius:22px;
    box-shadow:0 16px 44px rgba(15,23,42,.08);
    overflow:hidden;
    border:1px solid rgba(5,150,105,.12);
    margin-bottom:24px;
    transition:.35s cubic-bezier(.2,.8,.2,1);
}
.xuDiagCard:hover{box-shadow:0 22px 54px rgba(5,150,105,.14);border-color:rgba(5,150,105,.22)}
html.xu-dark .xuDiagCard{background:#0f1e1f;border-color:rgba(5,150,105,.22);box-shadow:0 16px 44px rgba(0,0,0,.4)}

.xuDiagHead{
    padding:22px 28px;
    background:linear-gradient(90deg,var(--vd-emerald),var(--vd-teal),var(--vd-gold),var(--vd-emerald));
    background-size:200% 100%;
    color:#fff;
    display:flex;align-items:center;justify-content:space-between;
    flex-wrap:wrap;gap:14px;
    animation:xuVdGrad 7s linear infinite;
    position:relative;overflow:hidden;
}
.xuDiagHead::after{
    content:'';position:absolute;top:-60%;right:-8%;
    width:320px;height:320px;border-radius:50%;
    background:radial-gradient(circle,rgba(245,158,11,.25),transparent 70%);
    pointer-events:none;
}
@keyframes xuVdGrad{to{background-position:200% 0}}

.xuDiagHead h2{
    margin:0;font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1.3rem;
    display:flex;align-items:center;gap:12px;
    color:#fff;letter-spacing:-.01em;
    position:relative;z-index:2;
}
.xuDiagHead h2 i{
    width:42px;height:42px;border-radius:13px;
    background:rgba(255,255,255,.18);
    backdrop-filter:blur(8px);-webkit-backdrop-filter:blur(8px);
    display:inline-flex;align-items:center;justify-content:center;
    font-size:1.15rem;
    box-shadow:inset 0 1px 0 rgba(255,255,255,.2);
}

.xuDiagHead .collapse-link{
    color:#fff;cursor:pointer;opacity:.85;
    width:34px;height:34px;border-radius:10px;
    background:rgba(255,255,255,.15);
    backdrop-filter:blur(8px);
    border:1px solid rgba(255,255,255,.25);
    display:flex;align-items:center;justify-content:center;
    transition:.25s;
    position:relative;z-index:2;
}
.xuDiagHead .collapse-link:hover{opacity:1;background:rgba(255,255,255,.28)}
.xuDiagHead .collapse-link.collapsed i{transform:rotate(180deg)}
.xuDiagHead .collapse-link i{transition:transform .3s}

.xuDiagBody{padding:24px 28px;transition:.3s}
.xuDiagBody.collapsed{display:none}

/* ===== HINT BOX ===== */
.xuHint{
    display:flex;align-items:center;gap:12px;
    padding:14px 18px;
    border:1.5px dashed rgba(5,150,105,.35);
    border-radius:14px;
    background:linear-gradient(135deg,rgba(5,150,105,.05),rgba(245,158,11,.03));
    color:var(--vd-emerald);
    font-weight:700;font-size:.85rem;
    margin-bottom:18px;
}
.xuHint i{
    font-size:1.1rem;
    color:var(--vd-gold);
    width:32px;height:32px;border-radius:9px;
    background:rgba(245,158,11,.12);
    border:1px solid rgba(245,158,11,.3);
    display:inline-flex;align-items:center;justify-content:center;
    flex-shrink:0;
    animation:vdBulb 2.5s ease-in-out infinite;
}
@keyframes vdBulb{0%,100%{box-shadow:0 0 0 0 rgba(245,158,11,.3)}50%{box-shadow:0 0 0 8px rgba(245,158,11,0)}}
html.xu-dark .xuHint{background:linear-gradient(135deg,rgba(5,150,105,.1),rgba(245,158,11,.06));border-color:rgba(5,150,105,.4);color:var(--vd-mint)}
html.xu-dark .xuHint i{background:rgba(245,158,11,.15);border-color:rgba(245,158,11,.4);color:var(--vd-gold)}

/* ===== TABEL AUTHOR ===== */
.xuTableWrap{overflow-x:auto}
.xuTable{width:100%;border-collapse:separate;border-spacing:0}

.xuTable thead th{
    background:linear-gradient(180deg,rgba(5,150,105,.08),rgba(5,150,105,.03));
    color:var(--vd-emerald);
    font-weight:800;font-size:.72rem;
    text-transform:uppercase;letter-spacing:.08em;
    padding:14px 16px;border:none;
    border-bottom:1.5px solid rgba(5,150,105,.2);
    white-space:nowrap;
}
html.xu-dark .xuTable thead th{
    background:linear-gradient(180deg,rgba(5,150,105,.15),rgba(5,150,105,.06));
    color:var(--vd-mint);border-bottom-color:rgba(5,150,105,.35);
}

.xuTable tbody td{
    padding:14px 16px;
    border-bottom:1px solid #f1f3f8;
    color:var(--vd-muted);font-size:.88rem;
    vertical-align:middle;
}
html.xu-dark .xuTable tbody td{border-bottom-color:rgba(5,150,105,.1);color:#cbd5e1}

.xuTable tbody tr{transition:.2s;cursor:pointer}
.xuTable tbody tr[onclick]{cursor:pointer}
.xuTable tbody tr:nth-child(even){background:rgba(5,150,105,.03)}
.xuTable tbody tr:hover{background:rgba(5,150,105,.06)}
.xuTable tbody tr:hover td:first-child{box-shadow:inset 4px 0 0 var(--vd-emerald)}
html.xu-dark .xuTable tbody tr:nth-child(even){background:rgba(5,150,105,.06)}
html.xu-dark .xuTable tbody tr:hover{background:rgba(5,150,105,.1)}
html.xu-dark .xuTable tbody tr:hover td:first-child{box-shadow:inset 4px 0 0 var(--vd-gold)}

/* Avatar inisial */
.xuAvatar{
    width:36px;height:36px;border-radius:50%;
    background:linear-gradient(135deg,var(--vd-emerald),var(--vd-gold));
    color:#fff;font-weight:800;font-size:.85rem;
    display:inline-flex;align-items:center;justify-content:center;
    flex-shrink:0;
    box-shadow:0 6px 14px rgba(5,150,105,.3);
    font-family:'Neuton',Georgia,serif;
    border:2px solid rgba(255,255,255,.25);
    transition:.3s;
}
.xuTable tbody tr:hover .xuAvatar{transform:scale(1.1) rotate(-6deg);box-shadow:0 10px 22px rgba(245,158,11,.4)}

/* Author Name */
.xuName{
    font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:.98rem;
    color:var(--vd-ink);
    display:inline-flex;align-items:center;gap:10px;
}
html.xu-dark .xuName{color:#f1f5f9}

/* Date */
.xuDate{
    color:var(--vd-muted);font-size:.82rem;
    display:inline-flex;align-items:center;gap:6px;
    font-family:'JetBrains Mono',monospace;font-weight:600;
}
.xuDate i{color:var(--vd-gold);font-size:.78rem}
html.xu-dark .xuDate{color:var(--vd-soft)}

/* Badge Authority Type */
.xuBadge{
    display:inline-flex;align-items:center;gap:6px;
    padding:5px 13px;border-radius:999px;
    font-size:.72rem;font-weight:800;
    letter-spacing:.04em;
    color:var(--vd-gold);
    background:rgba(245,158,11,.1);
    border:1px solid rgba(245,158,11,.3);
}
html.xu-dark .xuBadge{color:#fde68a;background:rgba(245,158,11,.15);border-color:rgba(245,158,11,.4)}

/* ===== MAP WRAPPER ===== */
.xuMapWrap{
    padding:28px;
    background:
        radial-gradient(circle at 20% 20%,rgba(5,150,105,.06),transparent 45%),
        radial-gradient(circle at 80% 80%,rgba(245,158,11,.05),transparent 45%);
    min-height:420px;
}
html.xu-dark .xuMapWrap{
    background:
        radial-gradient(circle at 20% 20%,rgba(5,150,105,.12),transparent 45%),
        radial-gradient(circle at 80% 80%,rgba(245,158,11,.08),transparent 45%);
}

#jsmind{width:100%;min-height:400px}
#treeView{display:none}

/* Empty state */
.xuEmptyRow td{
    text-align:center;padding:50px 20px!important;
    color:var(--vd-soft)!important;font-size:.92rem;font-weight:600;
    background:linear-gradient(135deg,rgba(5,150,105,.04),rgba(245,158,11,.02))!important;
}
.xuEmptyRow i{font-size:2.2rem;color:var(--vd-emerald);display:block;margin-bottom:10px}

/* ===== DATATABLES ===== */
.dataTables_wrapper .dataTables_filter input,
.dataTables_wrapper .dataTables_length select{
    border:1.5px solid #cbd5e1;border-radius:10px;
    padding:7px 12px;outline:none;transition:.2s;
    background:#f8fafc;color:var(--vd-ink);
    font-family:inherit;font-size:.85rem;
}
.dataTables_wrapper .dataTables_filter input:focus,
.dataTables_wrapper .dataTables_length select:focus{
    border-color:var(--vd-emerald);
    box-shadow:0 0 0 3px rgba(5,150,105,.12);
    background:#fff;
}
html.xu-dark .dataTables_wrapper .dataTables_filter input,
html.xu-dark .dataTables_wrapper .dataTables_length select{
    background:rgba(255,255,255,.05);border-color:rgba(5,150,105,.25);color:#f1f5f9;
}
html.xu-dark .dataTables_wrapper .dataTables_filter input:focus,
html.xu-dark .dataTables_wrapper .dataTables_length select:focus{
    border-color:var(--vd-gold);box-shadow:0 0 0 3px rgba(245,158,11,.15);
}

.dataTables_wrapper .dataTables_info{color:var(--vd-muted);font-size:.82rem;padding-top:14px;font-weight:500}
html.xu-dark .dataTables_wrapper .dataTables_info{color:var(--vd-soft)}

.dataTables_wrapper .dataTables_paginate .paginate_button{
    color:var(--vd-muted)!important;
    border:1px solid transparent!important;
    border-radius:8px!important;margin:0 2px;transition:.2s;
}
.dataTables_wrapper .dataTables_paginate .paginate_button.current{
    background:linear-gradient(90deg,var(--vd-emerald),var(--vd-gold))!important;
    color:#fff!important;border:none!important;
    box-shadow:0 6px 14px rgba(5,150,105,.3)!important;
}
.dataTables_wrapper .dataTables_paginate .paginate_button:hover:not(.current):not(.disabled){
    background:rgba(5,150,105,.1)!important;color:var(--vd-emerald)!important;
    border-color:rgba(5,150,105,.25)!important;
}
.dataTables_wrapper .dataTables_paginate .paginate_button.disabled{opacity:.4;cursor:not-allowed}
html.xu-dark .dataTables_wrapper .dataTables_paginate .paginate_button{color:var(--vd-soft)!important}
html.xu-dark .dataTables_wrapper .dataTables_paginate .paginate_button:hover:not(.current):not(.disabled){
    background:rgba(5,150,105,.15)!important;color:var(--vd-mint)!important;
    border-color:rgba(5,150,105,.35)!important;
}

@media(max-width:720px){
    .xuDiagHead{padding:18px 20px}
    .xuDiagHead h2{font-size:1.15rem}
    .xuDiagBody{padding:18px 16px}
    .xuMapWrap{padding:16px}
    .xuTable thead th,.xuTable tbody td{padding:10px 12px;font-size:.82rem}
    .xuAvatar{width:32px;height:32px;font-size:.78rem}
    .xuName{font-size:.9rem}
}
</style>

<div class="x_content" style="padding:0">
    <div class="xuDiagCard xuR fixed_height_580">
        <div class="xuDiagHead">
            <h2><i class="fa fa-sitemap"></i> Visualize Diagram</h2>
            <ul class="nav navbar-right panel_toolbox" style="min-width:0;margin:0;border:none;">
                <li><a class="collapse-link" id="xuCollapseDiag"><i class="fa fa-chevron-up"></i></a></li>
            </ul>
        </div>
        <div class="xuDiagBody" id="xDiagBody">
            <div class="sub_section">
                <div class="author-section">
                    <div id="treeView" style="display:none"></div>
                    <div class="xuHint"><i class="fa fa-hand-pointer-o"></i> Klik salah satu baris penulis untuk menampilkan diagram hubungannya.</div>
                    <div style="padding-bottom:5%;">
                        <div id="tblAuthor_wrapper" class="dataTables_wrapper no-footer">
                            <div class="xuTableWrap">
                                <table class="table xuTable responsive table-hover dt-responsive" role="grid">
                                    <thead>
                                        <tr role="row">
                                            <th>Author Name</th>
                                            <th style="width:160px">Author Year</th>
                                            <th style="width:200px">Authority Type</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (empty($data)): ?>
                                            <tr class="xuEmptyRow">
                                                <td colspan="3">
                                                    <i class="fa fa-users"></i>
                                                    <b>Belum ada data penulis.</b><br>
                                                    <small>Tambahkan penulis untuk melihat diagram hubungan.</small>
                                                </td>
                                            </tr>
                                        <?php else: foreach ($data as $value): ?>
                                            <tr role="row" class="odd" onclick="showMm(<?= $value->author_id ?>, '<?= esc(addslashes($value->author_name)) ?>')" style="cursor:pointer">
                                                <td class="sorting_1">
                                                    <span class="xuName">
                                                        <span class="xuAvatar"><?= esc(strtoupper(substr(trim($value->author_name), 0, 1))) ?></span>
                                                        <?= esc($value->author_name) ?>
                                                    </span>
                                                </td>
                                                <td><span class="xuDate"><i class="fa fa-clock-o"></i> <?= esc($value->input_date) ?></span></td>
                                                <td><span class="xuBadge"><i class="fa fa-user-circle-o"></i> <?= esc(getAuthorityName($value->authority_type)) ?></span></td>
                                            </tr>
                                        <?php endforeach; endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="xuDiagCard xuR">
        <div class="xuDiagHead">
            <h2><i class="fa fa-share-alt"></i> Author Relationship Map</h2>
        </div>
        <div class="xuMapWrap">
            <div id="jsmind" style="min-width:310px;height:400px;margin:0 auto"></div>
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
    var colBtn = document.getElementById('xuCollapseDiag');
    var body = document.getElementById('xDiagBody');
    if (colBtn && body){
        colBtn.addEventListener('click', function(e){
            e.preventDefault();
            body.classList.toggle('collapsed');
            colBtn.classList.toggle('collapsed');
        });
    }
});
</script>