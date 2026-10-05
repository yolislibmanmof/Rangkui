<style>
/* ================================================================
   DIFOSS COLLECTION STATISTIC — EMERALD FOREST EDITION
   ================================================================ */
:root{
    --cs-emerald:#059669; --cs-teal:#0891b2; --cs-gold:#f59e0b;
    --cs-mint:#6ee7b7; --cs-deep:#0a2920;
    --cs-ink:#0f172a; --cs-muted:#64748b; --cs-soft:#94a3b8;
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
    background:linear-gradient(90deg,var(--cs-emerald),var(--cs-teal),var(--cs-gold),var(--cs-emerald));
    background-size:200% 100%;
    color:#fff;
    display:flex;align-items:center;justify-content:space-between;
    flex-wrap:wrap;gap:14px;
    animation:xuCsGrad 7s linear infinite;
    position:relative;overflow:hidden;
}
.xuRepHead::after{
    content:'';position:absolute;top:-60%;right:-8%;
    width:320px;height:320px;border-radius:50%;
    background:radial-gradient(circle,rgba(245,158,11,.25),transparent 70%);
    pointer-events:none;
}
@keyframes xuCsGrad{to{background-position:200% 0}}

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

/* ===== TOTAL CARD ===== */
.xuTotalCard{
    display:flex;align-items:center;gap:20px;
    padding:24px;border-radius:18px;
    background:linear-gradient(135deg,rgba(5,150,105,.06),rgba(245,158,11,.04));
    border:1px solid rgba(5,150,105,.2);
    position:relative;overflow:hidden;
    transition:.3s;
}
.xuTotalCard::before{
    content:'';position:absolute;top:0;left:0;right:0;height:4px;
    background:linear-gradient(90deg,var(--cs-emerald),var(--cs-gold));
}
.xuTotalCard::after{
    content:'';position:absolute;top:-50%;right:-10%;
    width:260px;height:260px;border-radius:50%;
    background:radial-gradient(circle,rgba(245,158,11,.12),transparent 70%);
    pointer-events:none;
}
.xuTotalCard:hover{border-color:rgba(5,150,105,.35);box-shadow:0 12px 30px rgba(5,150,105,.12)}
html.xu-dark .xuTotalCard{background:linear-gradient(135deg,rgba(5,150,105,.12),rgba(245,158,11,.08));border-color:rgba(5,150,105,.3)}

.xuTotalIcon{
    width:60px;height:60px;border-radius:17px;
    background:linear-gradient(135deg,var(--cs-emerald),var(--cs-gold));
    color:#fff;font-size:1.5rem;
    display:flex;align-items:center;justify-content:center;
    flex-shrink:0;
    box-shadow:0 12px 28px rgba(5,150,105,.35);
    position:relative;z-index:2;
}

.xuTotalNum{
    font-family:'Neuton',Georgia,serif;
    font-size:2.3rem;font-weight:700;
    color:var(--cs-ink);line-height:1;
    letter-spacing:-.02em;
    font-variant-numeric:tabular-nums;
    position:relative;z-index:2;
}
html.xu-dark .xuTotalNum{color:#f1f5f9}

.xuTotalLabel{
    font-size:.74rem;font-weight:800;
    text-transform:uppercase;letter-spacing:.08em;
    color:var(--cs-emerald);margin-top:6px;
    position:relative;z-index:2;
}
html.xu-dark .xuTotalLabel{color:var(--cs-mint)}

.xuTotalNote{
    font-size:.78rem;color:var(--cs-muted);
    margin-top:7px;font-weight:600;
    display:flex;align-items:center;gap:6px;
    position:relative;z-index:2;
}
.xuTotalNote i{color:var(--cs-gold);font-size:.85rem}
html.xu-dark .xuTotalNote{color:var(--cs-soft)}

/* ===== GMD SECTION ===== */
.xuSecTitle{
    font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1.08rem;
    color:var(--cs-ink);
    margin:28px 0 14px;
    display:flex;align-items:center;gap:10px;
    padding-bottom:12px;
    border-bottom:1.5px dashed rgba(5,150,105,.2);
}
.xuSecTitle i{
    width:30px;height:30px;border-radius:9px;
    background:linear-gradient(135deg,rgba(5,150,105,.12),rgba(245,158,11,.08));
    color:var(--cs-emerald);
    display:inline-flex;align-items:center;justify-content:center;
    font-size:.85rem;
    border:1px solid rgba(5,150,105,.2);
}
html.xu-dark .xuSecTitle{color:#f1f5f9;border-bottom-color:rgba(5,150,105,.35)}
html.xu-dark .xuSecTitle i{color:var(--cs-mint);background:linear-gradient(135deg,rgba(5,150,105,.2),rgba(245,158,11,.12));border-color:rgba(5,150,105,.35)}

.xuGmdRow{
    display:flex;align-items:center;gap:14px;
    padding:12px 0;
    border-bottom:1px dashed rgba(5,150,105,.15);
    transition:.2s;
}
.xuGmdRow:hover{transform:translateX(4px)}
.xuGmdRow:last-child{border-bottom:none}
html.xu-dark .xuGmdRow{border-bottom-color:rgba(5,150,105,.2)}

.xuDot{
    width:13px;height:13px;border-radius:4px;
    background:var(--c);flex-shrink:0;
    box-shadow:0 2px 6px rgba(0,0,0,.15);
}

.xuGmdName{
    flex:0 0 200px;
    font-family:'Neuton',Georgia,serif;
    font-weight:700;
    color:var(--cs-ink);font-size:.92rem;
    overflow:hidden;text-overflow:ellipsis;white-space:nowrap;
}
html.xu-dark .xuGmdName{color:#f1f5f9}

.xuGmdBar{
    flex:1;height:11px;
    background:#f1f5f9;border-radius:999px;
    overflow:hidden;
    box-shadow:inset 0 1px 3px rgba(15,23,42,.08);
}
html.xu-dark .xuGmdBar{background:rgba(255,255,255,.05)}

.xuGmdBarFill{
    height:100%;
    background:var(--c);
    border-radius:999px;
    width:0;
    transition:width 1.2s cubic-bezier(.2,.8,.2,1);
    position:relative;overflow:hidden;
}
.xuGmdBarFill::after{
    content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;
    background:linear-gradient(100deg,transparent 20%,rgba(255,255,255,.35) 50%,transparent 80%);
    animation:csShine 3s ease-in-out infinite;
}
@keyframes csShine{0%,100%{left:-100%}50%{left:120%}}

.xuGmdCount{
    font-family:'JetBrains Mono',monospace;
    font-weight:800;
    color:var(--cs-ink);
    min-width:58px;text-align:right;
    font-size:.9rem;
}
html.xu-dark .xuGmdCount{color:#f1f5f9}

/* Empty state */
.xuEmptyGmd{
    padding:30px;text-align:center;
    color:var(--cs-soft);font-size:.88rem;font-weight:600;
    background:rgba(5,150,105,.04);
    border:1.5px dashed rgba(5,150,105,.25);
    border-radius:12px;margin-top:12px;
}
html.xu-dark .xuEmptyGmd{background:rgba(5,150,105,.08);border-color:rgba(5,150,105,.35)}

/* Pie chart */
#pie-chart{width:100%;min-height:400px}

@media(max-width:720px){
    .xuRepHead{padding:18px 20px}
    .xuRepHead h2{font-size:1.15rem}
    .xuRepBody{padding:20px 18px}
    .xuTotalCard{flex-direction:column;text-align:center;padding:20px}
    .xuGmdName{flex:0 0 140px;font-size:.85rem}
    .xuGmdCount{min-width:46px;font-size:.82rem}
    .xuTotalNum{font-size:1.9rem}
}
</style>

<?php
$__gmdList = $stats->getResult();
$__sum = 0;
foreach ($__gmdList as $__v) { $__sum += (int) $__v->total_titles; }
// Palet Emerald Forest: emerald, teal, gold, mint, amber, forest deep, dan variasi
$__palette = ['#059669', '#0891b2', '#f59e0b', '#6ee7b7', '#d97706', '#064e3b', '#14b8a6', '#f97316', '#84cc16', '#22d3ee', '#10b981', '#0ea5e9'];
?>

<div class="xuRepCard xuR">
    <div class="xuRepHead">
        <h2><i class="fa fa-cubes"></i> Statistic Collection — Summary</h2>
    </div>
    <div class="xuRepBody">
        <div class="xuTotalCard">
            <div class="xuTotalIcon"><i class="fa fa-book"></i></div>
            <div>
                <div class="xuTotalNum" data-target="<?= (int) $biblio_total ?>">0</div>
                <div class="xuTotalLabel">Total Title</div>
                <div class="xuTotalNote"><i class="fa fa-info-circle"></i> Including titles that still don't have items yet</div>
            </div>
        </div>

        <div class="xuSecTitle"><i class="fa fa-tags"></i> Total Title from Media / GMD</div>
        <div>
            <?php if (empty($__gmdList)): ?>
                <div class="xuEmptyGmd"><i class="fa fa-inbox"></i> Belum ada data GMD yang tersedia.</div>
            <?php else: foreach ($__gmdList as $key => $val) :
                $__c = $__palette[$key % count($__palette)];
                $__p = $__sum > 0 ? round(((int) $val->total_titles) / $__sum * 100) : 0;
            ?>
                <div class="xuGmdRow" style="--c:<?= $__c ?>">
                    <span class="xuDot"></span>
                    <span class="xuGmdName" title="<?= esc($val->gmd_name) ?>"><?= esc($val->gmd_name) ?></span>
                    <div class="xuGmdBar"><div class="xuGmdBarFill" data-w="<?= $__p ?>"></div></div>
                    <span class="xuGmdCount"><?= number_format((int) $val->total_titles, 0, ',', '.') ?></span>
                </div>
            <?php endforeach; endif; ?>
        </div>
    </div>
</div>

<div class="xuRepCard xuR">
    <div class="xuRepHead">
        <h2><i class="fa fa-pie-chart"></i> Collection Distribution</h2>
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

    // ===== Count-up total (mulai saat terlihat) =====
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
    document.querySelectorAll('.xuTotalNum').forEach(function(el){ numObs.observe(el); });

    // ===== Animasi bar GMD (mulai saat terlihat) =====
    var barObs = new IntersectionObserver(function(es){
        es.forEach(function(en){
            if (!en.isIntersecting) return;
            var rows = en.target.querySelectorAll('.xuGmdBarFill');
            rows.forEach(function(b, i){
                setTimeout(function(){
                    b.style.width = b.getAttribute('data-w') + '%';
                }, 150 + i * 80);
            });
            barObs.unobserve(en.target);
        });
    }, {threshold:.2});
    document.querySelectorAll('.xuRepBody').forEach(function(el){ barObs.observe(el); });
});
</script>