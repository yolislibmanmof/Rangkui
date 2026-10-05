<style>
/* ================================================================
   DIFOSS VISITOR REPORT — EMERALD FOREST EDITION
   ================================================================ */
:root{
    --vr-emerald:#059669; --vr-teal:#0891b2; --vr-gold:#f59e0b;
    --vr-mint:#6ee7b7; --vr-deep:#0a2920;
    --vr-ink:#0f172a; --vr-muted:#64748b; --vr-soft:#94a3b8;
}

.xuR{opacity:0;transform:translateY(24px);transition:all .6s cubic-bezier(.2,.8,.2,1)}
.xuR.in{opacity:1;transform:none}

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

.xuRepHead{
    padding:22px 28px;
    background:linear-gradient(90deg,var(--vr-emerald),var(--vr-teal),var(--vr-gold),var(--vr-emerald));
    background-size:200% 100%;
    color:#fff;
    display:flex;align-items:center;justify-content:space-between;
    flex-wrap:wrap;gap:14px;
    animation:xuVrGrad 7s linear infinite;
    position:relative;overflow:hidden;
}
.xuRepHead::after{
    content:'';position:absolute;top:-60%;right:-8%;
    width:320px;height:320px;border-radius:50%;
    background:radial-gradient(circle,rgba(245,158,11,.25),transparent 70%);
    pointer-events:none;
}
@keyframes xuVrGrad{to{background-position:200% 0}}

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

.xuRepBody{padding:28px 30px}

/* ===== FILTER TITLE ===== */
.xuFilterTitle{
    font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1.05rem;
    color:var(--vr-ink);
    display:flex;align-items:center;gap:10px;
    margin-bottom:18px;
    padding-bottom:12px;
    border-bottom:1.5px dashed rgba(5,150,105,.2);
}
.xuFilterTitle i{
    width:32px;height:32px;border-radius:10px;
    background:linear-gradient(135deg,rgba(5,150,105,.12),rgba(245,158,11,.08));
    color:var(--vr-emerald);
    display:inline-flex;align-items:center;justify-content:center;
    font-size:.88rem;
    border:1px solid rgba(5,150,105,.2);
}
html.xu-dark .xuFilterTitle{color:#f1f5f9;border-bottom-color:rgba(5,150,105,.3)}
html.xu-dark .xuFilterTitle i{color:var(--vr-mint);background:linear-gradient(135deg,rgba(5,150,105,.2),rgba(245,158,11,.12));border-color:rgba(5,150,105,.35)}

/* ===== FILTER LABEL ===== */
.xuFilterLabel{
    font-weight:800;font-size:.74rem;
    color:var(--vr-ink);
    margin-bottom:8px;
    display:flex;align-items:center;gap:8px;
    text-transform:uppercase;letter-spacing:.08em;
}
.xuFilterLabel i{
    color:var(--vr-emerald);
    width:24px;height:24px;border-radius:7px;
    background:linear-gradient(135deg,rgba(5,150,105,.12),rgba(245,158,11,.08));
    display:inline-flex;align-items:center;justify-content:center;
    font-size:.68rem;
    border:1px solid rgba(5,150,105,.2);
}
html.xu-dark .xuFilterLabel{color:#e2e8f0}
html.xu-dark .xuFilterLabel i{color:var(--vr-mint);background:linear-gradient(135deg,rgba(5,150,105,.2),rgba(245,158,11,.12));border-color:rgba(5,150,105,.35)}

/* ===== FORM CONTROLS ===== */
.xuRepBody .form-control{
    width:100%;padding:11px 14px;
    border:1.5px solid #cbd5e1;
    border-radius:12px;font-size:.9rem;
    outline:none;background:#f8fafc;
    color:var(--vr-ink);
    font-family:inherit;
    transition:.25s;
}
.xuRepBody .form-control:hover{
    border-color:var(--vr-emerald);
    background:rgba(5,150,105,.04);
}
.xuRepBody .form-control:focus{
    border-color:var(--vr-emerald);
    background:#fff;
    box-shadow:0 0 0 4px rgba(5,150,105,.12);
}
html.xu-dark .xuRepBody .form-control{background:rgba(255,255,255,.05);border-color:rgba(5,150,105,.25);color:#f1f5f9}
html.xu-dark .xuRepBody .form-control:hover{background:rgba(5,150,105,.08)}
html.xu-dark .xuRepBody .form-control:focus{border-color:var(--vr-gold);background:rgba(255,255,255,.08);box-shadow:0 0 0 4px rgba(245,158,11,.15)}

/* ===== "HINGGA" BOX (gold tint untuk kontras) ===== */
.xuUntil{
    display:flex;align-items:center;justify-content:center;
    height:46px;border-radius:12px;
    background:linear-gradient(135deg,rgba(245,158,11,.12),rgba(245,158,11,.06));
    color:var(--vr-gold);
    font-weight:800;font-size:.78rem;
    letter-spacing:.06em;text-transform:uppercase;
    border:1.5px solid rgba(245,158,11,.3);
}
html.xu-dark .xuUntil{background:linear-gradient(135deg,rgba(245,158,11,.15),rgba(245,158,11,.08));border-color:rgba(245,158,11,.4);color:#fde68a}

/* ===== HR DIVIDER ===== */
.xuHr{
    border:none;height:1.5px;
    background:linear-gradient(90deg,transparent,var(--vr-emerald),transparent);
    margin:26px 0;opacity:.4;
}

/* ===== SELECT2 EMERALD ===== */
.select2-container{width:100%!important}
.select2-container .select2-selection--single{
    border:1.5px solid #cbd5e1!important;
    border-radius:12px!important;
    background:#f8fafc!important;
    height:46px!important;
}
.select2-container--default .select2-selection--single .select2-selection__rendered{
    line-height:43px!important;color:var(--vr-ink)!important;
    font-weight:600!important;padding-left:14px!important;font-size:.9rem;
}
.select2-container--default .select2-selection--single .select2-selection__arrow{height:44px!important}
.select2-container--default .select2-selection--single .select2-selection__arrow b{
    border-color:var(--vr-emerald) transparent transparent transparent!important;
}
.select2-container--default .select2-selection--single .select2-selection__placeholder{
    color:var(--vr-soft)!important;
}
.select2-container--default.select2-container--open .select2-selection--single{
    border-color:var(--vr-emerald)!important;
    box-shadow:0 0 0 4px rgba(5,150,105,.12)!important;
    background:#fff!important;
}
html.xu-dark .select2-container .select2-selection--single{
    background:rgba(255,255,255,.05)!important;border-color:rgba(5,150,105,.25)!important;
}
html.xu-dark .select2-container--default .select2-selection--single .select2-selection__rendered{color:#f1f5f9!important}
html.xu-dark .select2-container--default.select2-container--open .select2-selection--single{
    border-color:var(--vr-gold)!important;box-shadow:0 0 0 4px rgba(245,158,11,.15)!important;
    background:rgba(255,255,255,.08)!important;
}

.select2-container--default .select2-results__option--highlighted[aria-selected]{
    background:linear-gradient(90deg,var(--vr-emerald),var(--vr-teal))!important;
    color:#fff!important;
}
.select2-container--default .select2-results__option[aria-selected=true]{
    background:rgba(5,150,105,.12)!important;color:var(--vr-emerald)!important;font-weight:700!important;
}
html.xu-dark .select2-container--default .select2-results__option[aria-selected=true]{
    background:rgba(245,158,11,.15)!important;color:var(--vr-gold)!important;
}

.select2-dropdown{
    border:1.5px solid var(--vr-emerald)!important;
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
    border-color:var(--vr-emerald)!important;box-shadow:0 0 0 3px rgba(5,150,105,.1)!important;
}
html.xu-dark .select2-search--dropdown .select2-search__field{
    background:rgba(255,255,255,.05)!important;border-color:rgba(5,150,105,.25)!important;color:#f1f5f9!important;
}

.select2-container--default .select2-results__option{
    padding:9px 14px!important;font-size:.88rem!important;color:var(--vr-ink);transition:.15s;
}
html.xu-dark .select2-container--default .select2-results__option{color:#e2e8f0}

/* ===== TABEL ===== */
.xuTableWrap{overflow-x:auto}
.xuTable{width:100%;border-collapse:separate;border-spacing:0}

.xuTable thead th{
    background:linear-gradient(180deg,rgba(5,150,105,.08),rgba(5,150,105,.03));
    color:var(--vr-emerald);
    font-weight:800;font-size:.72rem;
    text-transform:uppercase;letter-spacing:.08em;
    padding:14px 16px;border:none;
    border-bottom:1.5px solid rgba(5,150,105,.2);
    white-space:nowrap;text-align:left;
}
html.xu-dark .xuTable thead th{
    background:linear-gradient(180deg,rgba(5,150,105,.15),rgba(5,150,105,.06));
    color:var(--vr-mint);border-bottom-color:rgba(5,150,105,.35);
}

.xuTable tbody td{
    padding:14px 16px;
    border-bottom:1px solid #f1f3f8;
    color:var(--vr-muted);font-size:.88rem;
    vertical-align:middle;
}
html.xu-dark .xuTable tbody td{border-bottom-color:rgba(5,150,105,.1);color:#cbd5e1}

.xuTable tbody tr{transition:.2s}
.xuTable tbody tr:nth-child(even){background:rgba(5,150,105,.03)}
.xuTable tbody tr:hover{background:rgba(5,150,105,.06)}
.xuTable tbody tr:hover td:first-child{box-shadow:inset 4px 0 0 var(--vr-emerald)}
html.xu-dark .xuTable tbody tr:nth-child(even){background:rgba(5,150,105,.06)}
html.xu-dark .xuTable tbody tr:hover{background:rgba(5,150,105,.1)}
html.xu-dark .xuTable tbody tr:hover td:first-child{box-shadow:inset 4px 0 0 var(--vr-gold)}

/* Col 1: No. mono */
.xuTable tbody td:nth-child(1){
    font-family:'JetBrains Mono',monospace;
    font-weight:700;color:var(--vr-emerald);
    text-align:center;font-size:.82rem;
}
html.xu-dark .xuTable tbody td:nth-child(1){color:var(--vr-mint)}

/* Col 2: ID Anggota mono */
.xuTable tbody td:nth-child(2){
    font-family:'JetBrains Mono',monospace;
    font-weight:700;color:var(--vr-emerald);
    font-size:.85rem;
    background:rgba(5,150,105,.06);
    padding:6px 12px;border-radius:8px;
    border:1px solid rgba(5,150,105,.18);
    white-space:nowrap;
}
html.xu-dark .xuTable tbody td:nth-child(2){
    color:var(--vr-mint);background:rgba(5,150,105,.12);border-color:rgba(5,150,105,.3);
}

/* Col 3: Nama Pengunjung serif */
.xuTable tbody td:nth-child(3){
    font-family:'Neuton',Georgia,serif;
    font-weight:700;color:var(--vr-ink);
    font-size:.98rem;
}
html.xu-dark .xuTable tbody td:nth-child(3){color:#f1f5f9}

/* Col 4: Tipe Keanggotaan — gold pill */
.xuTable tbody td:nth-child(4){color:var(--vr-gold);font-weight:700;font-size:.82rem}
.xuTable tbody td:nth-child(4) span{
    display:inline-block;padding:4px 11px;border-radius:999px;
    background:rgba(245,158,11,.1);
    border:1px solid rgba(245,158,11,.3);
    font-size:.72rem;font-weight:800;letter-spacing:.04em;
}
html.xu-dark .xuTable tbody td:nth-child(4) span{background:rgba(245,158,11,.15);border-color:rgba(245,158,11,.4);color:#fde68a}

/* Col 5: Institusi */
.xuTable tbody td:nth-child(5){color:var(--vr-ink);font-weight:600}
html.xu-dark .xuTable tbody td:nth-child(5){color:#e2e8f0}

/* Col 6: Tanggal mono */
.xuTable tbody td:nth-child(6){
    font-family:'JetBrains Mono',monospace;
    color:var(--vr-muted);font-weight:600;
    font-size:.82rem;
}
html.xu-dark .xuTable tbody td:nth-child(6){color:var(--vr-soft)}

/* ===== HINT BOX ===== */
.xuHint{
    display:flex;align-items:center;gap:12px;
    padding:16px 20px;
    border:1.5px dashed rgba(5,150,105,.35);
    border-radius:14px;
    background:linear-gradient(135deg,rgba(5,150,105,.05),rgba(245,158,11,.03));
    color:var(--vr-emerald);
    font-weight:600;font-size:.88rem;
    margin-top:20px;
    transition:opacity .3s, transform .3s;
}
.xuHint i{
    font-size:1.15rem;
    color:var(--vr-gold);
    width:34px;height:34px;border-radius:10px;
    background:rgba(245,158,11,.12);
    border:1px solid rgba(245,158,11,.3);
    display:inline-flex;align-items:center;justify-content:center;
    flex-shrink:0;
    animation:vrBulb 2.5s ease-in-out infinite;
}
@keyframes vrBulb{0%,100%{box-shadow:0 0 0 0 rgba(245,158,11,.3)}50%{box-shadow:0 0 0 8px rgba(245,158,11,0)}}
html.xu-dark .xuHint{
    background:linear-gradient(135deg,rgba(5,150,105,.1),rgba(245,158,11,.06));
    border-color:rgba(5,150,105,.4);color:var(--vr-mint);
}
html.xu-dark .xuHint i{background:rgba(245,158,11,.15);border-color:rgba(245,158,11,.4);color:var(--vr-gold)}

/* Empty state */
.xuEmptyRow td{
    text-align:center;padding:50px 20px!important;
    color:var(--vr-soft)!important;font-size:.92rem;font-weight:600;
    background:linear-gradient(135deg,rgba(5,150,105,.04),rgba(245,158,11,.02))!important;
}
.xuEmptyRow i{font-size:2.2rem;color:var(--vr-emerald);display:block;margin-bottom:10px}

@media(max-width:720px){
    .xuRepHead{padding:18px 20px}
    .xuRepHead h2{font-size:1.15rem}
    .xuRepBody{padding:20px 18px}
    .xuTable thead th,.xuTable tbody td{padding:10px 12px;font-size:.82rem}
    .xuHint{padding:14px 16px;font-size:.82rem}
}
</style>

<?php
$list_option = [
    (object)['name' => 'all',       'text' => 'Semua'],
    (object)['name' => 'member',    'text' => 'Standard'],
    (object)['name' => 'nonmember', 'text' => 'Pengunjung bukan anggota']
];
?>

<div class="xuRepCard xuR">
    <div class="xuRepHead">
        <h2><i class="fa fa-eye"></i> Daftar Pengunjung</h2>
    </div>
    <div class="xuRepBody">
        <div class="xuFilterTitle"><i class="fa fa-filter"></i> Filter Kunjungan</div>
        <form action="">
            <div class="form-group row">
                <div class="col-md-12">
                    <div class="xuFilterLabel"><i class="fa fa-id-badge"></i> Tipe Keanggotaan</div>
                </div>
                <div class="col-md-7">
                    <select name="filter" id="filter-type" onchange="withFilter(this)" class="form-control select2" data-placeholder="-- Pilih Tipe Keanggotaan -- ">
                        <option value=""></option>
                        <?php foreach ($list_option as $val) : ?>
                            <option value="<?= $val->name; ?>"><?= esc($val->text) ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div class="form-group row" style="margin-bottom:0">
                <div class="col-md-12">
                    <div class="xuFilterLabel"><i class="fa fa-calendar"></i> Tanggal Kunjungan</div>
                </div>
                <div class="col-md-4">
                    <input type="date" class="form-control" id="filter-start-date" onchange="withFilter(this)" name="start_date">
                </div>
                <div class="col-md-2">
                    <div class="xuUntil">Hingga</div>
                </div>
                <div class="col-md-4">
                    <input type="date" class="form-control" id="filter-end-date" onchange="withFilter(this)" name="end_date">
                </div>
            </div>
        </form>

        <div class="xuHr"></div>

        <div class="xuTableWrap">
            <table class="table xuTable responsive-0" id="reportTable" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th style="width:60px">No</th>
                        <th style="width:150px">ID Anggota</th>
                        <th>Nama Pengunjung</th>
                        <th style="width:180px">Tipe Keanggotaan</th>
                        <th>Institusi</th>
                        <th style="width:170px">Tanggal Kunjungan</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>

        <div class="xuHint" id="xuHint">
            <i class="fa fa-lightbulb-o"></i>
            <span>Pilih tipe keanggotaan atau rentang tanggal untuk menampilkan data kunjungan.</span>
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

    // ===== Smooth hide/show hint saat tbody terisi ajax =====
    var tb = document.querySelector('#reportTable tbody');
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