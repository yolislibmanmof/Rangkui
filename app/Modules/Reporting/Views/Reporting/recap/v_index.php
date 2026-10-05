<style>
/* ================================================================
   DIFOSS RECAPITULATION REPORT — EMERALD FOREST EDITION
   ================================================================ */
:root{
    --rc-emerald:#059669; --rc-teal:#0891b2; --rc-gold:#f59e0b;
    --rc-mint:#6ee7b7; --rc-deep:#0a2920;
    --rc-ink:#0f172a; --rc-muted:#64748b; --rc-soft:#94a3b8;
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
    background:linear-gradient(90deg,var(--rc-emerald),var(--rc-teal),var(--rc-gold),var(--rc-emerald));
    background-size:200% 100%;
    color:#fff;
    display:flex;align-items:center;justify-content:space-between;
    flex-wrap:wrap;gap:14px;
    animation:xuRcGrad 7s linear infinite;
    position:relative;overflow:hidden;
}
.xuRepHead::after{
    content:'';position:absolute;top:-60%;right:-8%;
    width:320px;height:320px;border-radius:50%;
    background:radial-gradient(circle,rgba(245,158,11,.25),transparent 70%);
    pointer-events:none;
}
@keyframes xuRcGrad{to{background-position:200% 0}}

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

/* ===== BODY ===== */
.xuRepBody{padding:28px 30px}

/* ===== FILTER LABEL ===== */
.xuFilterLabel{
    font-weight:800;font-size:.74rem;
    color:var(--rc-ink);
    margin-bottom:8px;
    display:flex;align-items:center;gap:8px;
    text-transform:uppercase;letter-spacing:.08em;
}
.xuFilterLabel i{
    color:var(--rc-emerald);
    width:26px;height:26px;border-radius:7px;
    background:linear-gradient(135deg,rgba(5,150,105,.12),rgba(245,158,11,.08));
    display:inline-flex;align-items:center;justify-content:center;
    font-size:.72rem;
    border:1px solid rgba(5,150,105,.2);
}
html.xu-dark .xuFilterLabel{color:#e2e8f0}
html.xu-dark .xuFilterLabel i{color:var(--rc-mint);background:linear-gradient(135deg,rgba(5,150,105,.2),rgba(245,158,11,.12));border-color:rgba(5,150,105,.35)}

/* ===== SELECT2 EMERALD ===== */
.select2-container{width:100%!important}

.select2-container .select2-selection--single{
    border:1.5px solid #cbd5e1!important;
    border-radius:12px!important;
    background:#f8fafc!important;
    height:48px!important;
    transition:.25s!important;
}
.select2-container--default .select2-selection--single .select2-selection__rendered{
    line-height:45px!important;
    color:var(--rc-ink)!important;
    font-weight:600!important;
    padding-left:14px!important;
    font-size:.9rem;
}
html.xu-dark .select2-container .select2-selection--single{
    background:rgba(255,255,255,.05)!important;
    border-color:rgba(5,150,105,.25)!important;
}
html.xu-dark .select2-container--default .select2-selection--single .select2-selection__rendered{
    color:#f1f5f9!important;
}
.select2-container--default .select2-selection--single .select2-selection__placeholder{
    color:var(--rc-soft)!important;
}

.select2-container--default .select2-selection--single .select2-selection__arrow{
    height:46px!important;
}
.select2-container--default .select2-selection--single .select2-selection__arrow b{
    border-color:var(--rc-emerald) transparent transparent transparent!important;
}

.select2-container--default.select2-container--open .select2-selection--single,
.select2-container--default.select2-container--focus .select2-selection--single{
    border-color:var(--rc-emerald)!important;
    box-shadow:0 0 0 4px rgba(5,150,105,.12)!important;
    background:#fff!important;
}
html.xu-dark .select2-container--default.select2-container--open .select2-selection--single,
html.xu-dark .select2-container--default.select2-container--focus .select2-selection--single{
    background:rgba(255,255,255,.08)!important;
    border-color:var(--rc-gold)!important;
    box-shadow:0 0 0 4px rgba(245,158,11,.15)!important;
}

/* Select2 Dropdown */
.select2-dropdown{
    border:1.5px solid var(--rc-emerald)!important;
    border-radius:12px!important;
    overflow:hidden!important;
    box-shadow:0 18px 44px rgba(15,23,42,.15)!important;
    margin-top:4px!important;
}
html.xu-dark .select2-dropdown{
    background:#0f1e1f!important;
    border-color:rgba(5,150,105,.35)!important;
}

.select2-search--dropdown .select2-search__field{
    border:1.5px solid #cbd5e1!important;
    border-radius:9px!important;
    padding:8px 12px!important;
    outline:none!important;
    font-family:inherit;
}
.select2-search--dropdown .select2-search__field:focus{
    border-color:var(--rc-emerald)!important;
    box-shadow:0 0 0 3px rgba(5,150,105,.1)!important;
}
html.xu-dark .select2-search--dropdown .select2-search__field{
    background:rgba(255,255,255,.05)!important;
    border-color:rgba(5,150,105,.25)!important;
    color:#f1f5f9!important;
}

.select2-container--default .select2-results__option{
    padding:9px 14px!important;
    font-size:.88rem!important;
    color:var(--rc-ink);
    transition:.15s;
}
html.xu-dark .select2-container--default .select2-results__option{color:#e2e8f0}

.select2-container--default .select2-results__option--highlighted[aria-selected]{
    background:linear-gradient(90deg,var(--rc-emerald),var(--rc-teal))!important;
    color:#fff!important;
}
.select2-container--default .select2-results__option[aria-selected=true]{
    background:rgba(5,150,105,.12)!important;
    color:var(--rc-emerald)!important;
    font-weight:700!important;
}
html.xu-dark .select2-container--default .select2-results__option[aria-selected=true]{
    background:rgba(245,158,11,.15)!important;
    color:var(--rc-gold)!important;
}

/* ===== HINT BOX ===== */
.xuHint{
    display:flex;align-items:center;gap:12px;
    padding:18px 20px;
    border:1.5px dashed rgba(5,150,105,.35);
    border-radius:14px;
    background:linear-gradient(135deg,rgba(5,150,105,.05),rgba(245,158,11,.03));
    color:var(--rc-emerald);
    font-weight:600;font-size:.88rem;
    margin-top:20px;
    transition:.3s;
}
.xuHint i{
    font-size:1.15rem;
    color:var(--rc-gold);
    width:34px;height:34px;border-radius:10px;
    background:rgba(245,158,11,.12);
    border:1px solid rgba(245,158,11,.3);
    display:inline-flex;align-items:center;justify-content:center;
    flex-shrink:0;
    animation:rcBulb 2.5s ease-in-out infinite;
}
@keyframes rcBulb{0%,100%{box-shadow:0 0 0 0 rgba(245,158,11,.3)}50%{box-shadow:0 0 0 8px rgba(245,158,11,0)}}
html.xu-dark .xuHint{
    background:linear-gradient(135deg,rgba(5,150,105,.1),rgba(245,158,11,.06));
    border-color:rgba(5,150,105,.4);
    color:var(--rc-mint);
}
html.xu-dark .xuHint i{background:rgba(245,158,11,.15);border-color:rgba(245,158,11,.4);color:var(--rc-gold)}

/* ===== TABEL ===== */
.xuTableWrap{margin-top:22px;overflow-x:auto}
.xuTable{width:100%;border-collapse:separate;border-spacing:0}

.xuTable thead th{
    background:linear-gradient(180deg,rgba(5,150,105,.08),rgba(5,150,105,.03));
    color:var(--rc-emerald);
    font-weight:800;font-size:.72rem;
    text-transform:uppercase;letter-spacing:.08em;
    padding:14px 16px;border:none;
    border-bottom:1.5px solid rgba(5,150,105,.2);
    white-space:nowrap;text-align:left;
}
html.xu-dark .xuTable thead th{
    background:linear-gradient(180deg,rgba(5,150,105,.15),rgba(5,150,105,.06));
    color:var(--rc-mint);border-bottom-color:rgba(5,150,105,.35);
}

.xuTable tbody td{
    padding:14px 16px;
    border-bottom:1px solid #f1f3f8;
    color:var(--rc-muted);font-size:.88rem;
    vertical-align:middle;
}
html.xu-dark .xuTable tbody td{border-bottom-color:rgba(5,150,105,.1);color:#cbd5e1}

.xuTable tbody tr{transition:.2s}
.xuTable tbody tr:nth-child(even){background:rgba(5,150,105,.03)}
.xuTable tbody tr:hover{background:rgba(5,150,105,.06)}
.xuTable tbody tr:hover td:first-child{box-shadow:inset 4px 0 0 var(--rc-emerald)}
html.xu-dark .xuTable tbody tr:nth-child(even){background:rgba(5,150,105,.06)}
html.xu-dark .xuTable tbody tr:hover{background:rgba(5,150,105,.1)}
html.xu-dark .xuTable tbody tr:hover td:first-child{box-shadow:inset 4px 0 0 var(--rc-gold)}

/* Classification name (column 1) */
.xuTable tbody td:first-child{
    font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:.95rem;
    color:var(--rc-ink);
}
html.xu-dark .xuTable tbody td:first-child{color:#f1f5f9}

/* Title (column 2) */
.xuTable tbody td:nth-child(2){
    font-weight:600;color:var(--rc-ink);
}
html.xu-dark .xuTable tbody td:nth-child(2){color:#e2e8f0}

/* Exemplar (column 3) */
.xuTable tbody td:nth-child(3){
    font-family:'JetBrains Mono',monospace;
    font-weight:800;
    color:var(--rc-gold);
    text-align:center;
    font-size:.88rem;
}
html.xu-dark .xuTable tbody td:nth-child(3){color:#fde68a}

/* ===== RESPONSIVE ===== */
@media(max-width:720px){
    .xuRepHead{padding:18px 20px}
    .xuRepHead h2{font-size:1.15rem}
    .xuRepBody{padding:20px 18px}
    .xuTable thead th,.xuTable tbody td{padding:10px 12px;font-size:.82rem}
    .xuHint{padding:14px 16px;font-size:.82rem}
}
</style>

<div class="xuRepCard xuR">
    <div class="xuRepHead">
        <h2><i class="fa fa-pie-chart"></i> Recapitulation Report</h2>
    </div>
    <div class="xuRepBody">
        <?php
        $list_option = [
            ['name' => 'gmd',       'text' => 'GMD'],
            ['name' => 'coll_type', 'text' => 'Collection Type'],
            ['name' => 'lang',      'text' => 'Language']
        ];
        ?>

        <div class="row">
            <form action="">
                <div class="form-group" style="margin-bottom:0">
                    <div class="xuFilterLabel">
                        <i class="fa fa-filter"></i> Choose Classification
                    </div>
                    <select name="filter" id="filter-type" class="form-control select2" data-placeholder="-- Choose Classification --">
                        <option></option>
                        <?php foreach ($list_option as $val) : ?>
                            <option value="<?= $val['name']; ?>"><?= $val['text'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </form>
        </div>

        <div class="xuHint" id="xuHint">
            <i class="fa fa-lightbulb-o"></i>
            <span>Pilih klasifikasi di atas untuk menampilkan rekapitulasi koleksi.</span>
        </div>

        <div class="xuTableWrap">
            <table class="table table-bordered xuTable" id="recap-table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Classification</th>
                        <th>Title</th>
                        <th style="width:140px;text-align:center">Exemplar</th>
                    </tr>
                </thead>
                <tbody></tbody>
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

    // ===== Auto-hide hint saat tbody terisi via AJAX =====
    var tb = document.querySelector('#recap-table tbody');
    if (tb && window.MutationObserver){
        new MutationObserver(function(){
            var h = document.getElementById('xuHint');
            if (!h) return;
            if (tb.children.length > 0){
                h.style.opacity = '0';
                h.style.transform = 'translateY(-8px)';
                setTimeout(function(){ h.style.display = 'none'; }, 300);
            } else {
                h.style.display = 'flex';
                setTimeout(function(){
                    h.style.opacity = '1';
                    h.style.transform = 'translateY(0)';
                }, 50);
            }
        }).observe(tb, {childList:true});
    }
});
</script>