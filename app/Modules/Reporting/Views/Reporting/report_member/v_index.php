<style>
/* ================================================================
   DIFOSS MEMBER STATISTIC — EMERALD FOREST EDITION
   ================================================================ */
:root{
    --ms-emerald:#059669; --ms-teal:#0891b2; --ms-gold:#f59e0b;
    --ms-mint:#6ee7b7; --ms-deep:#0a2920;
    --ms-ink:#0f172a; --ms-muted:#64748b; --ms-soft:#94a3b8;
    --ms-danger:#dc2626;
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
    background:linear-gradient(90deg,var(--ms-emerald),var(--ms-teal),var(--ms-gold),var(--ms-emerald));
    background-size:200% 100%;
    color:#fff;
    display:flex;align-items:center;justify-content:space-between;
    flex-wrap:wrap;gap:14px;
    animation:xuMsGrad 7s linear infinite;
    position:relative;overflow:hidden;
}
.xuRepHead::after{
    content:'';position:absolute;top:-60%;right:-8%;
    width:320px;height:320px;border-radius:50%;
    background:radial-gradient(circle,rgba(245,158,11,.25),transparent 70%);
    pointer-events:none;
}
@keyframes xuMsGrad{to{background-position:200% 0}}

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

/* ===== KARTU STATISTIK ===== */
.xuStatGrid{display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:16px}

.xuStat{
    background:#fff;
    border:1px solid #eef0f6;
    border-radius:18px;
    padding:22px;
    display:flex;align-items:center;gap:16px;
    box-shadow:0 8px 24px rgba(15,23,42,.06);
    position:relative;overflow:hidden;
    transition:.3s cubic-bezier(.2,.8,.2,1);
}
.xuStat:hover{transform:translateY(-4px);box-shadow:0 18px 40px rgba(15,23,42,.14)}
.xuStat::before{
    content:'';position:absolute;top:0;left:0;right:0;height:4px;
    background:var(--ac);
}
.xuStat::after{
    content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;
    background:linear-gradient(100deg,transparent 20%,rgba(255,255,255,.12) 50%,transparent 80%);
    transition:left .7s ease;pointer-events:none;
}
.xuStat:hover::after{left:120%}

html.xu-dark .xuStat{background:#0a1f1a;border-color:rgba(5,150,105,.2);box-shadow:0 8px 24px rgba(0,0,0,.35)}
html.xu-dark .xuStat:hover{box-shadow:0 18px 40px rgba(5,150,105,.25)}

.xuStatIcon{
    width:54px;height:54px;border-radius:15px;
    display:flex;align-items:center;justify-content:center;
    font-size:1.35rem;color:#fff;
    background:var(--ac);
    flex-shrink:0;
    box-shadow:0 10px 22px rgba(0,0,0,.18);
    transition:.3s;
}
.xuStat:hover .xuStatIcon{transform:rotate(-8deg) scale(1.08)}

.xuStatNum{
    font-family:'Neuton',Georgia,serif;
    font-size:1.9rem;font-weight:700;
    color:var(--ms-ink);
    line-height:1;
    letter-spacing:-.02em;
    font-variant-numeric:tabular-nums;
}
html.xu-dark .xuStatNum{color:#f1f5f9}

.xuStatLabel{
    font-size:.72rem;font-weight:800;
    text-transform:uppercase;letter-spacing:.08em;
    color:var(--ms-muted);margin-top:6px;
}
html.xu-dark .xuStatLabel{color:var(--ms-soft)}

/* ===== BAR RASIO ===== */
.xuRatio{margin-top:28px;padding-top:24px;border-top:1.5px dashed rgba(5,150,105,.15)}
html.xu-dark .xuRatio{border-top-color:rgba(5,150,105,.25)}

.xuRatioTop{
    display:flex;justify-content:space-between;align-items:center;
    font-size:.85rem;font-weight:700;color:var(--ms-ink);
    margin-bottom:12px;flex-wrap:wrap;gap:10px;
}
.xuRatioTop > span:first-child{
    display:inline-flex;align-items:center;gap:8px;
    font-family:'Neuton',Georgia,serif;font-size:.98rem;
}
.xuRatioTop > span:first-child i{
    color:var(--ms-gold);
    width:28px;height:28px;border-radius:8px;
    background:linear-gradient(135deg,rgba(5,150,105,.12),rgba(245,158,11,.08));
    display:inline-flex;align-items:center;justify-content:center;
    font-size:.78rem;border:1px solid rgba(5,150,105,.2);
}
html.xu-dark .xuRatioTop{color:#e2e8f0}

.xuChip{
    padding:5px 13px;border-radius:999px;
    font-size:.74rem;font-weight:800;
    letter-spacing:.03em;
    display:inline-flex;align-items:center;gap:6px;
}
.xuChip.ok{color:var(--ms-emerald);background:rgba(5,150,105,.12);border:1px solid rgba(5,150,105,.3)}
.xuChip.bad{color:var(--ms-danger);background:rgba(220,38,38,.1);border:1px solid rgba(220,38,38,.3)}
html.xu-dark .xuChip.ok{color:var(--ms-mint);background:rgba(5,150,105,.18);border-color:rgba(5,150,105,.4)}
html.xu-dark .xuChip.bad{color:#fca5a5;background:rgba(220,38,38,.15);border-color:rgba(220,38,38,.4)}

.xuBar{
    height:16px;border-radius:999px;
    background:#f1f5f9;overflow:hidden;
    display:flex;
    box-shadow:inset 0 2px 4px rgba(15,23,42,.08);
}
html.xu-dark .xuBar{background:rgba(255,255,255,.05);box-shadow:inset 0 2px 4px rgba(0,0,0,.3)}

.xuBarSeg{
    height:100%;
    transition:width 1.2s cubic-bezier(.2,.8,.2,1);
    position:relative;overflow:hidden;
}
.xuBarSeg::after{
    content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;
    background:linear-gradient(100deg,transparent 20%,rgba(255,255,255,.25) 50%,transparent 80%);
    animation:msShine 3s ease-in-out infinite;
}
@keyframes msShine{0%,100%{left:-100%}50%{left:120%}}

.xuBarSeg.ok{background:linear-gradient(90deg,var(--ms-emerald),var(--ms-teal))}
.xuBarSeg.bad{background:linear-gradient(90deg,var(--ms-danger),#f87171)}

/* ===== PIE CHART CONTAINER ===== */
#pie-chart{width:100%;min-height:400px}

/* ===== EMPTY STATE ===== */
.xuEmpty{
    padding:50px 20px;text-align:center;
    color:var(--ms-soft);font-size:.92rem;font-weight:600;
    background:linear-gradient(135deg,rgba(5,150,105,.04),rgba(245,158,11,.02));
    border-radius:14px;border:1.5px dashed rgba(5,150,105,.25);
}
.xuEmpty i{font-size:2.2rem;color:var(--ms-emerald);display:block;margin-bottom:10px}

@media(max-width:720px){
    .xuRepHead{padding:18px 20px}
    .xuRepHead h2{font-size:1.15rem}
    .xuRepBody{padding:20px 18px}
    .xuStatGrid{grid-template-columns:1fr}
    .xuStatNum{font-size:1.6rem}
}
</style>

<?php
$__total = (int) $total_member;
$__act   = (int) $active_member;
$__exp   = (int) $expired_member;
$__pAct  = $__total > 0 ? round($__act / $__total * 100) : 0;
$__pExp  = $__total > 0 ? round($__exp / $__total * 100) : 0;
?>

<div class="xuRepCard xuR">
    <div class="xuRepHead">
        <h2><i class="fa fa-users"></i> Member Report — Statistic</h2>
    </div>
    <div class="xuRepBody">
        <div class="xuStatGrid">
            <div class="xuStat" style="--ac:linear-gradient(135deg,#059669,#10b981)">
                <div class="xuStatIcon"><i class="fa fa-id-card-o"></i></div>
                <div>
                    <div class="xuStatNum" data-target="<?= $__total ?>">0</div>
                    <div class="xuStatLabel">Member Registered</div>
                </div>
            </div>
            <div class="xuStat" style="--ac:linear-gradient(135deg,#0891b2,#22d3ee)">
                <div class="xuStatIcon"><i class="fa fa-user-circle-o"></i></div>
                <div>
                    <div class="xuStatNum" data-target="<?= $__act ?>">0</div>
                    <div class="xuStatLabel">Member Active</div>
                </div>
            </div>
            <div class="xuStat" style="--ac:linear-gradient(135deg,#dc2626,#ef4444)">
                <div class="xuStatIcon"><i class="fa fa-user-times"></i></div>
                <div>
                    <div class="xuStatNum" data-target="<?= $__exp ?>">0</div>
                    <div class="xuStatLabel">Member Expired</div>
                </div>
            </div>
        </div>

        <div class="xuRatio">
            <div class="xuRatioTop">
                <span><i class="fa fa-signal"></i> Komposisi Keanggotaan</span>
                <span style="display:flex;gap:8px;flex-wrap:wrap">
                    <span class="xuChip ok"><i class="fa fa-check-circle"></i> Aktif <?= $__pAct ?>%</span>
                    <span class="xuChip bad"><i class="fa fa-exclamation-circle"></i> Kedaluwarsa <?= $__pExp ?>%</span>
                </span>
            </div>
            <div class="xuBar">
                <div class="xuBarSeg ok" style="width:0%" data-width="<?= $__pAct ?>%"></div>
                <div class="xuBarSeg bad" style="width:0%" data-width="<?= $__pExp ?>%"></div>
            </div>
        </div>
    </div>
</div>

<div class="xuRepCard xuR">
    <div class="xuRepHead">
        <h2><i class="fa fa-pie-chart"></i> Member Distribution by Type</h2>
    </div>
    <div class="xuRepBody">
        <div class="col-12 col-md-12 col-sm-12" style="padding:0">
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

    // ===== Animasi count-up angka (mulai saat terlihat) =====
    var numObs = new IntersectionObserver(function(es){
        es.forEach(function(en){
            if (!en.isIntersecting) return;
            var el = en.target;
            var t = parseInt(el.getAttribute('data-target'), 10) || 0;
            var s = null;
            var dur = 1400;
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

    // ===== Animasi bar rasio (mulai saat terlihat) =====
    var barObs = new IntersectionObserver(function(es){
        es.forEach(function(en){
            if (!en.isIntersecting) return;
            en.target.querySelectorAll('.xuBarSeg').forEach(function(seg){
                var w = seg.getAttribute('data-width');
                if (w) setTimeout(function(){ seg.style.width = w; }, 200);
            });
            barObs.unobserve(en.target);
        });
    }, {threshold:.3});
    document.querySelectorAll('.xuBar').forEach(function(el){ barObs.observe(el); });
});
</script>