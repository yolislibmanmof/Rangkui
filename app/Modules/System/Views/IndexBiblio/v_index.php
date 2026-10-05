<style>
/* ================================================================
   DIFOSS ETD INDEX DASHBOARD — EMERALD FOREST EDITION
   ================================================================ */
:root{
    --et-emerald:#059669; --et-teal:#0891b2; --et-gold:#f59e0b;
    --et-mint:#6ee7b7; --et-deep:#0a2920;
    --et-ink:#0f172a; --et-muted:#64748b; --et-soft:#94a3b8;
    --et-danger:#dc2626;
}

.xuR{opacity:0;transform:translateY(24px);transition:all .6s cubic-bezier(.2,.8,.2,1)}
.xuR.in{opacity:1;transform:none}

/* ===== KARTU ===== */
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
    background:linear-gradient(90deg,var(--et-emerald),var(--et-teal),var(--et-gold),var(--et-emerald));
    background-size:200% 100%;
    color:#fff;
    display:flex;align-items:center;justify-content:space-between;
    flex-wrap:wrap;gap:14px;
    animation:xuEtGrad 7s linear infinite;
    position:relative;overflow:hidden;
}
.xuIdxHead::after{
    content:'';position:absolute;top:-60%;right:-8%;
    width:320px;height:320px;border-radius:50%;
    background:radial-gradient(circle,rgba(245,158,11,.25),transparent 70%);
    pointer-events:none;
}
@keyframes xuEtGrad{to{background-position:200% 0}}

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

.xuIdxBody{padding:28px 30px}

/* ===== INTRO BOX ===== */
.xuIdxIntro{
    display:flex;align-items:center;gap:12px;
    padding:15px 18px;
    background:linear-gradient(90deg,rgba(5,150,105,.08),rgba(245,158,11,.04));
    border-left:4px solid var(--et-emerald);
    border-radius:11px;
    color:var(--et-emerald);
    font-weight:700;font-size:.88rem;
    margin-bottom:24px;
    transition:.3s;
}
.xuIdxIntro:hover{background:linear-gradient(90deg,rgba(5,150,105,.12),rgba(245,158,11,.06));transform:translateX(4px)}
.xuIdxIntro i{
    font-size:1.05rem;
    color:var(--et-gold);
    width:30px;height:30px;border-radius:8px;
    background:rgba(245,158,11,.12);
    border:1px solid rgba(245,158,11,.3);
    display:inline-flex;align-items:center;justify-content:center;
    flex-shrink:0;
    animation:etBolt 2s ease-in-out infinite;
}
@keyframes etBolt{0%,100%{box-shadow:0 0 0 0 rgba(245,158,11,.3)}50%{box-shadow:0 0 0 6px rgba(245,158,11,0)}}
html.xu-dark .xuIdxIntro{background:linear-gradient(90deg,rgba(5,150,105,.12),rgba(245,158,11,.08));color:var(--et-mint);border-left-color:var(--et-mint)}
html.xu-dark .xuIdxIntro i{background:rgba(245,158,11,.15);border-color:rgba(245,158,11,.4);color:var(--et-gold)}

/* ===== KARTU STATISTIK ===== */
.xuStatGrid{
    display:grid;grid-template-columns:repeat(3,1fr);
    gap:16px;margin-bottom:24px;
}
@media (max-width:768px){.xuStatGrid{grid-template-columns:1fr}}

.xuStat{
    background:#fff;
    border:1px solid #e2e8f0;
    border-radius:16px;
    padding:20px;
    display:flex;align-items:center;gap:15px;
    position:relative;overflow:hidden;
    transition:.3s cubic-bezier(.2,.8,.2,1);
}
.xuStat::before{
    content:'';position:absolute;top:0;left:0;right:0;height:4px;
    background:var(--ac, linear-gradient(90deg,var(--et-emerald),var(--et-teal)));
}
.xuStat::after{
    content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;
    background:linear-gradient(100deg,transparent 20%,rgba(255,255,255,.12) 50%,transparent 80%);
    transition:left .7s ease;pointer-events:none;
}
.xuStat:hover{
    transform:translateY(-4px);
    box-shadow:0 16px 36px rgba(15,23,42,.12);
    border-color:rgba(5,150,105,.25);
}
.xuStat:hover::after{left:120%}

html.xu-dark .xuStat{background:#0a1f1a;border-color:rgba(5,150,105,.2)}
html.xu-dark .xuStat:hover{border-color:rgba(5,150,105,.4);box-shadow:0 16px 36px rgba(5,150,105,.2)}

.xuStatIcon{
    width:52px;height:52px;border-radius:14px;
    display:flex;align-items:center;justify-content:center;
    font-size:1.3rem;color:#fff;
    background:var(--ac, linear-gradient(90deg,var(--et-emerald),var(--et-teal)));
    flex-shrink:0;
    box-shadow:0 10px 22px rgba(0,0,0,.18);
    transition:.3s;
}
.xuStat:hover .xuStatIcon{transform:rotate(-8deg) scale(1.08)}

.xuStatNum{
    font-family:'Neuton',Georgia,serif;
    font-size:1.85rem;font-weight:700;
    color:var(--et-ink);line-height:1;
    letter-spacing:-.02em;
    font-variant-numeric:tabular-nums;
}
html.xu-dark .xuStatNum{color:#f1f5f9}

.xuStatLabel{
    font-size:.72rem;font-weight:800;
    text-transform:uppercase;letter-spacing:.08em;
    color:var(--et-muted);margin-top:5px;
}
html.xu-dark .xuStatLabel{color:var(--et-soft)}

/* ===== PROGRESS BAR ===== */
.xuProgress{margin-bottom:26px;padding:4px 0}

.xuProgressTop{
    display:flex;justify-content:space-between;align-items:center;
    font-size:.85rem;font-weight:700;
    color:var(--et-ink);
    margin-bottom:10px;
}
.xuProgressTop span:first-child{
    display:inline-flex;align-items:center;gap:9px;
    font-family:'Neuton',Georgia,serif;font-size:.98rem;
}
.xuProgressTop span:first-child i{
    color:var(--et-gold);
    width:28px;height:28px;border-radius:8px;
    background:linear-gradient(135deg,rgba(5,150,105,.12),rgba(245,158,11,.08));
    display:inline-flex;align-items:center;justify-content:center;
    font-size:.78rem;border:1px solid rgba(5,150,105,.2);
}
.xuProgressTop span:last-child{
    font-family:'JetBrains Mono',monospace;
    color:var(--et-emerald);
    font-size:.85rem;font-weight:800;
    padding:4px 12px;border-radius:999px;
    background:rgba(5,150,105,.08);
    border:1px solid rgba(5,150,105,.2);
}
html.xu-dark .xuProgressTop{color:#e2e8f0}
html.xu-dark .xuProgressTop span:last-child{color:var(--et-mint);background:rgba(5,150,105,.15);border-color:rgba(5,150,105,.35)}

.xuBar{
    height:16px;border-radius:999px;
    background:#f1f5f9;overflow:hidden;
    box-shadow:inset 0 2px 4px rgba(15,23,42,.08);
    position:relative;
}
html.xu-dark .xuBar{background:rgba(255,255,255,.05);box-shadow:inset 0 2px 4px rgba(0,0,0,.3)}

.xuBarFill{
    height:100%;
    background:linear-gradient(90deg,var(--et-emerald),var(--et-teal));
    border-radius:999px;
    width:0;
    transition:width 1.4s cubic-bezier(.2,.8,.2,1);
    position:relative;overflow:hidden;
}
.xuBarFill::after{
    content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;
    background:linear-gradient(100deg,transparent 20%,rgba(255,255,255,.25) 50%,transparent 80%);
    animation:etShine 3s ease-in-out infinite;
}
@keyframes etShine{0%,100%{left:-100%}50%{left:120%}}

/* ===== ACTION BUTTONS ===== */
.xuActions{display:grid;grid-template-columns:repeat(3,1fr);gap:12px}
@media (max-width:768px){.xuActions{grid-template-columns:1fr}}

.xuActBtn{
    display:flex;align-items:center;justify-content:center;gap:10px;
    padding:15px 18px;border-radius:13px;
    font-weight:800;font-size:.88rem;
    border:none;cursor:pointer;transition:.3s;
    text-decoration:none!important;
    color:#fff!important;
    font-family:inherit;
    position:relative;overflow:hidden;
    letter-spacing:.02em;
}
.xuActBtn::before{
    content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;
    background:linear-gradient(100deg,transparent 20%,rgba(255,255,255,.28) 50%,transparent 80%);
    transition:left .6s ease;
}
.xuActBtn:hover{
    transform:translateY(-3px);
    filter:brightness(1.1);
    color:#fff!important;
}
.xuActBtn:hover::before{left:120%}
.xuActBtn i{font-size:1.05rem}

.xuActDanger{
    background:linear-gradient(90deg,#ef4444,#dc2626);
    box-shadow:0 10px 22px rgba(239,68,68,.3);
}
.xuActDanger:hover{box-shadow:0 14px 30px rgba(239,68,68,.45)}

.xuActPrimary{
    background:linear-gradient(90deg,var(--et-emerald),var(--et-teal));
    box-shadow:0 10px 22px rgba(5,150,105,.3);
}
.xuActPrimary:hover{box-shadow:0 14px 30px rgba(5,150,105,.45)}

.xuActInfo{
    background:linear-gradient(90deg,var(--et-gold),#d97706);
    box-shadow:0 10px 22px rgba(245,158,11,.3);
}
.xuActInfo:hover{box-shadow:0 14px 30px rgba(245,158,11,.45)}

@media(max-width:720px){
    .xuIdxHead{padding:18px 20px}
    .xuIdxHead h2{font-size:1.15rem}
    .xuIdxBody{padding:20px 18px}
    .xuStatNum{font-size:1.6rem}
}
</style>

<?php
$__total  = (int) $biblio_total;
$__idx    = (int) $idx_total;
$__unidx  = (int) $unidx_total;
$__pct    = $__total > 0 ? round($__idx / $__total * 100, 1) : 0;
?>

<div class="xuIdxCard xuR">
    <div class="xuIdxHead">
        <h2><i class="fa fa-database"></i> ETD Index</h2>
    </div>
    <div class="xuIdxBody">
        <div class="xuIdxIntro">
            <i class="fa fa-bolt"></i>
            <span>Bibliographic Index will speed up catalog search</span>
        </div>

        <div class="xuStatGrid">
            <div class="xuStat" style="--ac:linear-gradient(90deg,var(--et-deep),#134e4a)">
                <div class="xuStatIcon"><i class="fa fa-book"></i></div>
                <div>
                    <div class="xuStatNum" data-target="<?= $__total ?>">0</div>
                    <div class="xuStatLabel">Total data on ETD</div>
                </div>
            </div>
            <div class="xuStat" style="--ac:linear-gradient(90deg,var(--et-emerald),var(--et-teal))">
                <div class="xuStatIcon"><i class="fa fa-check-circle"></i></div>
                <div>
                    <div class="xuStatNum" data-target="<?= $__idx ?>">0</div>
                    <div class="xuStatLabel">Total indexed data</div>
                </div>
            </div>
            <div class="xuStat" style="--ac:linear-gradient(90deg, <?= $__unidx > 0 ? '#ef4444,#dc2626' : '#94a3b8,#64748b' ?>)">
                <div class="xuStatIcon"><i class="fa fa-exclamation-triangle"></i></div>
                <div>
                    <div class="xuStatNum" data-target="<?= $__unidx ?>">0</div>
                    <div class="xuStatLabel">Unindexed data</div>
                </div>
            </div>
        </div>

        <div class="xuProgress">
            <div class="xuProgressTop">
                <span><i class="fa fa-tasks"></i> Indexing Progress</span>
                <span><?= $__pct ?>% (<?= number_format($__idx,0,',','.') ?> / <?= number_format($__total,0,',','.') ?>)</span>
            </div>
            <div class="xuBar">
                <div class="xuBarFill" data-w="<?= $__pct ?>"></div>
            </div>
        </div>

        <div class="xuActions">
            <button onclick="moveTo('<?= base_url('sistem/indeks-biblio/delete'); ?>', 'Are you sure, want to empty index ?')" class="xuActBtn xuActDanger">
                <i class="fa fa-trash"></i> Empty Index
            </button>
            <button onclick="moveTo('<?= base_url('sistem/indeks-biblio/add'); ?>')" class="xuActBtn xuActPrimary">
                <i class="fa fa-plus"></i> Re-Index
            </button>
            <button onclick="moveTo('<?= base_url('sistem/indeks-biblio/reindex'); ?>')" class="xuActBtn xuActInfo">
                <i class="fa fa-refresh"></i> Update Index
            </button>
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

    // ===== Count-up angka (mulai saat terlihat) =====
    var numObs = new IntersectionObserver(function(es){
        es.forEach(function(en){
            if (!en.isIntersecting) return;
            var el = en.target;
            var t = parseInt(el.getAttribute('data-target'), 10) || 0;
            var s = null, dur = 1400;
            function step(ts){
                if (!s) s = ts;
                var p = Math.min((ts - s) / dur, 1);
                var eased = 1 - Math.pow(1 - p, 3);
                el.textContent = Math.floor(eased * t).toLocaleString('id-ID');
                if (p < 1){ requestAnimationFrame(step); }
                else { el.textContent = t.toLocaleString('id-ID'); }
            }
            requestAnimationFrame(step);
            numObs.unobserve(el);
        });
    }, {threshold:.3});
    document.querySelectorAll('.xuStatNum').forEach(function(el){ numObs.observe(el); });

    // ===== Animasi progress bar (mulai saat terlihat) =====
    var barObs = new IntersectionObserver(function(es){
        es.forEach(function(en){
            if (!en.isIntersecting) return;
            var fill = en.target.querySelector('.xuBarFill');
            if (fill){
                var w = fill.getAttribute('data-w');
                setTimeout(function(){ fill.style.width = w + '%'; }, 200);
            }
            barObs.unobserve(en.target);
        });
    }, {threshold:.3});
    document.querySelectorAll('.xuBar').forEach(function(el){ barObs.observe(el); });
});
</script>