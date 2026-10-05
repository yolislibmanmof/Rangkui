<style>
/* ================================================================
   DIFOSS ADD NEW INDEX — EMERALD FOREST EDITION
   ================================================================ */
:root{
    --ai-emerald:#059669; --ai-teal:#0891b2; --ai-gold:#f59e0b;
    --ai-mint:#6ee7b7; --ai-deep:#0a2920;
    --ai-ink:#0f172a; --ai-muted:#64748b; --ai-soft:#94a3b8;
    --ai-danger:#dc2626;
}

.xuR{opacity:0;transform:translateY(24px);transition:all .6s cubic-bezier(.2,.8,.2,1)}
.xuR.in{opacity:1;transform:none}

.xuIdxCard{
    background:#fff;border-radius:22px;
    box-shadow:0 16px 44px rgba(15,23,42,.1);
    overflow:hidden;
    border:1px solid rgba(5,150,105,.12);
    margin-bottom:24px;
    transition:.35s cubic-bezier(.2,.8,.2,1);
}
.xuIdxCard:hover{box-shadow:0 22px 54px rgba(5,150,105,.14);border-color:rgba(5,150,105,.22)}
html.xu-dark .xuIdxCard{background:#0f1e1f;border-color:rgba(5,150,105,.22);box-shadow:0 16px 44px rgba(0,0,0,.4)}

/* ===== HEADER ===== */
.xuIdxHead{
    padding:22px 28px;
    background:linear-gradient(90deg,var(--ai-emerald),var(--ai-teal),var(--ai-gold),var(--ai-emerald));
    background-size:200% 100%;
    color:#fff;
    animation:xuAiGrad 7s linear infinite;
    position:relative;overflow:hidden;
}
.xuIdxHead::after{
    content:'';position:absolute;top:-60%;right:-8%;
    width:320px;height:320px;border-radius:50%;
    background:radial-gradient(circle,rgba(245,158,11,.25),transparent 70%);
    pointer-events:none;
}
@keyframes xuAiGrad{to{background-position:200% 0}}

.xuIdxHead h2{
    margin:0;font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1.3rem;
    display:flex;align-items:center;gap:12px;
    color:#fff;letter-spacing:-.01em;
    position:relative;z-index:2;
}
.xuIdxHead h2 i{
    width:42px;height:42px;border-radius:13px;
    background:rgba(255,255,255,.18);
    backdrop-filter:blur(8px);-webkit-backdrop-filter:blur(8px);
    display:inline-flex;align-items:center;justify-content:center;
    font-size:1.15rem;
    box-shadow:inset 0 1px 0 rgba(255,255,255,.2);
}

.xuIdxBody{padding:30px 30px 24px}

/* ===== LABEL DENGAN ICON ===== */
.xuIdxBody label.control-label{
    font-weight:800;font-size:.78rem;
    color:var(--ai-ink);
    margin-bottom:9px;
    display:flex;align-items:center;gap:10px;
    text-transform:uppercase;letter-spacing:.06em;
}
.xuIdxBody label.control-label::before{
    content:"\f1c0";font-family:FontAwesome;
    width:28px;height:28px;border-radius:8px;
    background:linear-gradient(135deg,rgba(5,150,105,.12),rgba(245,158,11,.08));
    color:var(--ai-emerald);
    display:inline-flex;align-items:center;justify-content:center;
    font-size:.78rem;
    border:1px solid rgba(5,150,105,.2);
}
.xuIdxBody .text-danger{color:var(--ai-danger)!important;margin-left:4px}
html.xu-dark .xuIdxBody label.control-label{color:#e2e8f0}
html.xu-dark .xuIdxBody label.control-label::before{color:var(--ai-mint);background:linear-gradient(135deg,rgba(5,150,105,.2),rgba(245,158,11,.12));border-color:rgba(5,150,105,.35)}

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
    line-height:45px!important;color:var(--ai-ink)!important;
    font-weight:600!important;padding-left:14px!important;font-size:.92rem;
}
.select2-container--default .select2-selection--single .select2-selection__arrow{height:46px!important}
.select2-container--default .select2-selection--single .select2-selection__arrow b{
    border-color:var(--ai-emerald) transparent transparent transparent!important;
}
.select2-container--default .select2-selection--single .select2-selection__placeholder{
    color:var(--ai-soft)!important;
}
.select2-container--default.select2-container--open .select2-selection--single{
    border-color:var(--ai-emerald)!important;
    box-shadow:0 0 0 4px rgba(5,150,105,.12)!important;
    background:#fff!important;
}
html.xu-dark .select2-container .select2-selection--single{
    background:rgba(255,255,255,.05)!important;border-color:rgba(5,150,105,.25)!important;
}
html.xu-dark .select2-container--default .select2-selection--single .select2-selection__rendered{color:#f1f5f9!important}
html.xu-dark .select2-container--default.select2-container--open .select2-selection--single{
    border-color:var(--ai-gold)!important;box-shadow:0 0 0 4px rgba(245,158,11,.15)!important;
    background:rgba(255,255,255,.08)!important;
}

.select2-container--default .select2-results__option--highlighted[aria-selected]{
    background:linear-gradient(90deg,var(--ai-emerald),var(--ai-teal))!important;
    color:#fff!important;
}
.select2-container--default .select2-results__option[aria-selected=true]{
    background:rgba(5,150,105,.12)!important;color:var(--ai-emerald)!important;font-weight:700!important;
}
html.xu-dark .select2-container--default .select2-results__option[aria-selected=true]{
    background:rgba(245,158,11,.15)!important;color:var(--ai-gold)!important;
}

.select2-dropdown{
    border:1.5px solid var(--ai-emerald)!important;
    border-radius:12px!important;overflow:hidden!important;
    box-shadow:0 18px 44px rgba(15,23,42,.15)!important;
    margin-top:4px!important;
}
html.xu-dark .select2-dropdown{background:#0f1e1f!important;border-color:rgba(5,150,105,.35)!important}

.select2-container--default .select2-results__option{
    padding:10px 14px!important;font-size:.9rem!important;
    color:var(--ai-ink);transition:.15s;
}
html.xu-dark .select2-container--default .select2-results__option{color:#e2e8f0}

/* ===== MESSAGE VALIDASI ===== */
#message{
    display:inline-flex;align-items:center;gap:9px;
    margin-top:12px;padding:11px 15px;
    border-radius:11px;
    font-size:.82rem;font-weight:700;
    background:#f8fafc;color:var(--ai-muted);
    border:1.5px solid #e2e8f0;
    width:100%;box-sizing:border-box;
    transition:.3s;
    font-family:'Plus Jakarta Sans',sans-serif;
}
#message:empty{display:none}
#message.xuOk{
    background:linear-gradient(135deg,rgba(5,150,105,.08),rgba(5,150,105,.03));
    color:var(--ai-emerald);
    border-color:rgba(5,150,105,.35);
}
#message.xuOk::before{
    content:"\f00c";font-family:FontAwesome;
    width:22px;height:22px;border-radius:50%;
    background:rgba(5,150,105,.15);
    display:inline-flex;align-items:center;justify-content:center;
    font-size:.72rem;flex-shrink:0;
}
#message.xuErr{
    background:linear-gradient(135deg,rgba(220,38,38,.08),rgba(220,38,38,.03));
    color:var(--ai-danger);
    border-color:rgba(220,38,38,.35);
}
#message.xuErr::before{
    content:"\f071";font-family:FontAwesome;
    width:22px;height:22px;border-radius:50%;
    background:rgba(220,38,38,.15);
    display:inline-flex;align-items:center;justify-content:center;
    font-size:.72rem;flex-shrink:0;
}
html.xu-dark #message{background:rgba(255,255,255,.03);color:var(--ai-soft);border-color:rgba(5,150,105,.2)}
html.xu-dark #message.xuOk{color:var(--ai-mint);background:rgba(5,150,105,.12);border-color:rgba(5,150,105,.35)}
html.xu-dark #message.xuErr{color:#fca5a5;background:rgba(220,38,38,.12);border-color:rgba(220,38,38,.35)}

/* ===== TYPE HINT GRID ===== */
.xuTypeHint{
    display:grid;grid-template-columns:1fr 1fr;
    gap:12px;margin-top:16px;
}
@media (max-width:600px){.xuTypeHint{grid-template-columns:1fr}}

.xuTypeHint div{
    padding:14px 16px;
    border:1.5px solid rgba(5,150,105,.18);
    border-radius:12px;
    background:linear-gradient(135deg,rgba(5,150,105,.04),rgba(245,158,11,.02));
    font-size:.82rem;color:var(--ai-muted);
    line-height:1.55;
    transition:.25s;
}
.xuTypeHint div:hover{border-color:rgba(5,150,105,.35);transform:translateY(-2px);box-shadow:0 8px 18px rgba(5,150,105,.08)}
.xuTypeHint div b{
    color:var(--ai-ink);display:flex;align-items:center;gap:7px;
    margin-bottom:5px;font-size:.88rem;
    font-family:'Neuton',Georgia,serif;font-weight:700;
}
.xuTypeHint div b i{
    color:var(--ai-emerald);
    width:24px;height:24px;border-radius:7px;
    background:linear-gradient(135deg,rgba(5,150,105,.12),rgba(245,158,11,.08));
    display:inline-flex;align-items:center;justify-content:center;
    font-size:.72rem;border:1px solid rgba(5,150,105,.2);
}
html.xu-dark .xuTypeHint div{background:linear-gradient(135deg,rgba(5,150,105,.08),rgba(245,158,11,.04));border-color:rgba(5,150,105,.25);color:var(--ai-soft)}
html.xu-dark .xuTypeHint div:hover{border-color:rgba(245,158,11,.4)}
html.xu-dark .xuTypeHint div b{color:#f1f5f9}
html.xu-dark .xuTypeHint div b i{color:var(--ai-mint);background:linear-gradient(135deg,rgba(5,150,105,.2),rgba(245,158,11,.12));border-color:rgba(5,150,105,.35)}

/* ===== FOOTER FORM ===== */
.xuFormFoot{
    padding:22px 30px;
    border-top:1.5px dashed rgba(5,150,105,.15);
    background:linear-gradient(135deg,rgba(5,150,105,.03),rgba(245,158,11,.02));
    display:flex;gap:10px;justify-content:flex-end;
    flex-wrap:wrap;align-items:center;
}
html.xu-dark .xuFormFoot{border-top-color:rgba(5,150,105,.25);background:linear-gradient(135deg,rgba(5,150,105,.06),rgba(245,158,11,.03))}

.xuBtnSave{
    display:inline-flex;align-items:center;gap:9px;
    padding:12px 28px;border-radius:12px;
    background:linear-gradient(90deg,var(--ai-emerald),var(--ai-gold));
    color:#fff;border:none;
    font-weight:800;font-size:.9rem;
    letter-spacing:.03em;
    cursor:pointer;transition:.3s;
    box-shadow:0 10px 26px rgba(5,150,105,.35);
    position:relative;overflow:hidden;
    font-family:inherit;
}
.xuBtnSave::before{
    content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;
    background:linear-gradient(100deg,transparent 20%,rgba(255,255,255,.3) 50%,transparent 80%);
    transition:left .6s ease;
}
.xuBtnSave:hover:not(:disabled){
    transform:translateY(-2px);
    filter:brightness(1.08);
    box-shadow:0 14px 32px rgba(5,150,105,.45);
}
.xuBtnSave:hover:not(:disabled)::before{left:120%}
.xuBtnSave:disabled{
    background:linear-gradient(90deg,#cbd5e1,#94a3b8);
    cursor:not-allowed;box-shadow:none;opacity:.65;
}
html.xu-dark .xuBtnSave:disabled{background:rgba(255,255,255,.1);color:var(--ai-soft)}

@media(max-width:720px){
    .xuIdxHead{padding:18px 20px}
    .xuIdxHead h2{font-size:1.15rem}
    .xuIdxBody{padding:22px 18px}
    .xuFormFoot{padding:18px}
    .xuBtnSave{width:100%;justify-content:center}
}
</style>

<div class="xuIdxCard xuR">
    <div class="xuIdxHead">
        <h2><i class="fa fa-plus-square"></i> Add New Index</h2>
    </div>
    <form action="<?= base_url('sistem/indeks-biblio/save'); ?>" method="post" class="form-horizontal form-label-left" id="frm-index">
        <div class="xuIdxBody">
            <?= csrf_field(); ?>

            <div class="form-group row" style="margin-bottom:0">
                <div class="col-md-8">
                    <label class="control-label">Index Type <span class="text-danger">*</span></label>
                    <select name="index_type" id="index_type" class="form-control select2" data-placeholder="--Choose index type--">
                        <option></option>
                        <option value="mysql">MySQL</option>
                        <option value="nosql">MongoDB</option>
                    </select>
                    <span id="message"></span>

                    <!-- Petunjuk jenis index -->
                    <div class="xuTypeHint">
                        <div>
                            <b><i class="fa fa-server"></i> MySQL</b>
                            Index penuh di tabel database bawaan. Cocok untuk server standar &amp; hosting shared.
                        </div>
                        <div>
                            <b><i class="fa fa-leaf"></i> MongoDB (NoSQL)</b>
                            Performa tinggi untuk koleksi jutaan record. Membutuhkan ekstensi MongoDB PHP.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="xuFormFoot">
            <button type="submit" class="xuBtnSave" id="btn-add" disabled>
                <i class="fa fa-save"></i> Submit
            </button>
        </div>
    </form>
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

    // ===== Aktifkan tombol Submit saat index_type dipilih =====
    var sel = document.getElementById('index_type');
    var btn = document.getElementById('btn-add');
    var msg = document.getElementById('message');
    if (sel && btn && msg){
        sel.addEventListener('change', function(){
            var v = sel.value;
            btn.disabled = !v;
            if (v === 'mysql'){
                msg.textContent = 'MySQL dipilih — index akan dibuat di database utama.';
                msg.className = 'xuOk';
            } else if (v === 'nosql'){
                msg.textContent = 'MongoDB dipilih — pastikan ekstensi PHP mongodb aktif.';
                msg.className = 'xuOk';
            } else {
                msg.textContent = '';
                msg.className = '';
            }
        });
    }
});
</script>