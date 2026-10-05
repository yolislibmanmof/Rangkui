<?php
$a = $an;
$maxMonthly = 1; foreach ($a['monthly'] as $m) { if ($m['count'] > $maxMonthly) $maxMonthly = $m['count']; }
$maxAuthor = isset($a['authors'][0]) ? (int)$a['authors'][0]->c : 1;
$maxTopic  = isset($a['topics'][0])  ? (int)$a['topics'][0]->c  : 1;
$maxProdi  = isset($a['prodi'][0])   ? (int)$a['prodi'][0]->c   : 1;
$totalGmd  = 0; foreach ($a['gmd'] as $g) $totalGmd += (int)$g->c;
$gmdColors = ['#059669','#f59e0b','#0891b2','#6ee7b7','#115e59','#b45309','#064e3b'];
$seg = []; $acc = 0;
foreach ($a['gmd'] as $i => $g) {
    $pct = $totalGmd ? ((int)$g->c / $totalGmd) * 100 : 0;
    $seg[] = $gmdColors[$i % count($gmdColors)] . ' ' . round($acc,2) . '% ' . round($acc+$pct,2) . '%';
    $acc += $pct;
}
$conic = implode(',', $seg);
?>
<style>
/* ================================================================
   DIFOSS DASBOR ANALITIK — EMERALD FOREST EDITION
   ================================================================ */
:root{
    --xa-emerald:#059669; --xa-teal:#0891b2; --xa-gold:#f59e0b;
    --xa-mint:#6ee7b7; --xa-deep:#0a2920; --xa-mid:#064e3b;
    --xa-ink:#0f172a; --xa-muted:#64748b; --xa-soft:#94a3b8;
}

.xuAnaWrap{padding:10px 0}

/* ===== HEADER ===== */
.xuAnaHead{
    display:flex;align-items:center;gap:14px;
    flex-wrap:wrap;margin-bottom:24px;
}
.xuAnaHead h2{
    margin:0;font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1.6rem;
    color:var(--xa-ink);
    display:flex;align-items:center;gap:12px;
    letter-spacing:-.01em;
}
html.xu-dark .xuAnaHead h2{color:#f1f5f9}

.xuAnaHead h2 i{
    width:46px;height:46px;border-radius:14px;
    background:linear-gradient(135deg,var(--xa-emerald),var(--xa-gold));
    color:#fff;
    display:inline-flex;align-items:center;justify-content:center;
    font-size:1.2rem;
    box-shadow:0 10px 24px rgba(5,150,105,.35);
}
.xuAnaHead .sub{color:var(--xa-muted);font-size:.88rem;font-weight:600}
html.xu-dark .xuAnaHead .sub{color:var(--xa-soft)}

/* ===== KARTU STATISTIK ===== */
.xuAnaStats{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(170px,1fr));
    gap:14px;margin-bottom:22px;
}
.xuAnaStat{
    background:#fff;border-radius:18px;
    border:1px solid rgba(5,150,105,.1);
    padding:18px;
    display:flex;align-items:center;gap:14px;
    box-shadow:0 10px 28px rgba(15,23,42,.06);
    transition:.35s cubic-bezier(.2,.8,.2,1);
    position:relative;overflow:hidden;
}
.xuAnaStat::before{
    content:'';position:absolute;top:0;left:0;right:0;height:3px;
    background:linear-gradient(90deg,var(--s1),var(--s2));
    transition:height .3s ease;
}
.xuAnaStat:hover{
    transform:translateY(-4px);
    box-shadow:0 18px 42px rgba(5,150,105,.2);
    border-color:rgba(5,150,105,.25);
}
.xuAnaStat:hover::before{height:5px}
html.xu-dark .xuAnaStat{background:#0f1e1f;border-color:rgba(5,150,105,.2);box-shadow:0 10px 28px rgba(0,0,0,.4)}
html.xu-dark .xuAnaStat:hover{box-shadow:0 18px 42px rgba(5,150,105,.28);border-color:rgba(245,158,11,.35)}

.xuAnaStat .ico{
    width:48px;height:48px;border-radius:14px;
    color:#fff;
    display:flex;align-items:center;justify-content:center;
    font-size:1.25rem;flex-shrink:0;
    box-shadow:0 8px 20px rgba(5,150,105,.3);
}

.xuAnaStat .num{
    font-family:'Neuton',Georgia,serif;
    font-size:1.7rem;font-weight:700;
    color:var(--xa-ink);line-height:1;
    letter-spacing:-.02em;
    font-variant-numeric:tabular-nums;
}
html.xu-dark .xuAnaStat .num{color:#f1f5f9}

.xuAnaStat .lbl{
    font-size:.72rem;font-weight:800;
    text-transform:uppercase;letter-spacing:.08em;
    color:var(--xa-muted);margin-top:4px;
}
html.xu-dark .xuAnaStat .lbl{color:var(--xa-soft)}

/* ===== KARTU ANALITIK ===== */
.xuAnaCard{
    background:#fff;border-radius:20px;
    border:1px solid rgba(5,150,105,.1);
    box-shadow:0 12px 34px rgba(15,23,42,.07);
    padding:22px;margin-bottom:20px;
    transition:.35s cubic-bezier(.2,.8,.2,1);
}
.xuAnaCard:hover{
    box-shadow:0 20px 48px rgba(5,150,105,.18);
    border-color:rgba(5,150,105,.22);
}
html.xu-dark .xuAnaCard{background:#0f1e1f;border-color:rgba(5,150,105,.2);box-shadow:0 12px 34px rgba(0,0,0,.4)}
html.xu-dark .xuAnaCard:hover{box-shadow:0 20px 48px rgba(5,150,105,.25);border-color:rgba(245,158,11,.35)}

.xuAnaCard h3{
    margin:0 0 18px;
    font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1.08rem;
    color:var(--xa-ink);
    display:flex;align-items:center;gap:10px;
    padding-bottom:14px;
    border-bottom:1px dashed rgba(5,150,105,.18);
}
html.xu-dark .xuAnaCard h3{color:#f1f5f9;border-bottom-color:rgba(5,150,105,.3)}

.xuAnaCard h3 i{
    width:34px;height:34px;border-radius:10px;
    background:linear-gradient(135deg,var(--xa-emerald),var(--xa-gold));
    color:#fff;
    display:inline-flex;align-items:center;justify-content:center;
    font-size:.92rem;
    box-shadow:0 6px 14px rgba(5,150,105,.28);
}

/* ===== GRAFIK BATANG ===== */
.xuAnaBars{
    display:flex;gap:8px;
    align-items:flex-end;
    height:220px;padding-top:6px;
}
.xuAnaBarCol{
    flex:1;
    display:flex;flex-direction:column;
    align-items:center;gap:7px;
    height:100%;justify-content:flex-end;
}
.xuAnaBar{
    width:100%;border-radius:9px 9px 4px 4px;
    background:linear-gradient(180deg,var(--xa-gold),var(--xa-emerald));
    box-shadow:0 6px 16px rgba(5,150,105,.3);
    transition:height 1.1s cubic-bezier(.2,.8,.2,1);
    position:relative;
}
.xuAnaBar::after{
    content:'';position:absolute;top:0;left:0;right:0;height:40%;
    background:linear-gradient(180deg,rgba(255,255,255,.2),transparent);
    border-radius:9px 9px 0 0;pointer-events:none;
}
.xuAnaBarCol span{
    font-size:.68rem;font-weight:700;
    color:var(--xa-muted);white-space:nowrap;
}
html.xu-dark .xuAnaBarCol span{color:var(--xa-soft)}

/* ===== DONUT CHART ===== */
.xuAnaDonut{
    width:200px;height:200px;border-radius:50%;
    margin:8px auto 20px;position:relative;
    background:conic-gradient(<?= $conic ?: '#e2e8f0 0 100%' ?>);
    box-shadow:0 14px 36px rgba(5,150,105,.25);
    animation:xuDonutSpin 40s linear infinite;
}
@keyframes xuDonutSpin{to{transform:rotate(360deg)}}

.xuAnaDonutHole{
    position:absolute;inset:28px;
    background:#fff;border-radius:50%;
    display:flex;flex-direction:column;
    align-items:center;justify-content:center;
    box-shadow:inset 0 2px 12px rgba(15,23,42,.08);
    animation:xuDonutSpin 40s linear infinite reverse;
}
html.xu-dark .xuAnaDonutHole{background:#0f1e1f;box-shadow:inset 0 2px 12px rgba(0,0,0,.4)}

.xuAnaDonutHole b{
    font-family:'Neuton',Georgia,serif;
    font-size:1.85rem;font-weight:700;
    color:var(--xa-ink);
    letter-spacing:-.02em;
}
html.xu-dark .xuAnaDonutHole b{color:#f1f5f9}

.xuAnaDonutHole span{
    font-size:.7rem;font-weight:800;
    color:var(--xa-muted);
    text-transform:uppercase;letter-spacing:.08em;
    margin-top:2px;
}
html.xu-dark .xuAnaDonutHole span{color:var(--xa-soft)}

/* ===== LEGENDA DONUT ===== */
.xuAnaLegend{list-style:none;margin:0;padding:0}
.xuAnaLegend li{
    display:flex;align-items:center;gap:9px;
    padding:7px 10px;margin-bottom:4px;
    font-size:.83rem;font-weight:600;
    color:#334155;
    border-radius:9px;transition:.2s;
}
.xuAnaLegend li:hover{background:rgba(5,150,105,.05)}
html.xu-dark .xuAnaLegend li{color:#e2e8f0}
html.xu-dark .xuAnaLegend li:hover{background:rgba(5,150,105,.1)}

.xuAnaLegend .dot{
    width:12px;height:12px;border-radius:4px;
    flex-shrink:0;
    box-shadow:0 0 8px currentColor;
}
.xuAnaLegend .cnt{
    margin-left:auto;
    font-family:'Neuton',Georgia,serif;
    font-weight:700;color:var(--xa-emerald);
    font-size:.95rem;
}
html.xu-dark .xuAnaLegend .cnt{color:var(--xa-mint)}

/* ===== RANK (PENULIS / PRODI) ===== */
.xuAnaRank{list-style:none;margin:0;padding:0}
.xuAnaRank li{margin-bottom:14px}

.xuAnaRank .top{
    display:flex;justify-content:space-between;align-items:baseline;
    font-size:.85rem;font-weight:700;
    color:var(--xa-ink);margin-bottom:6px;
    gap:8px;
}
html.xu-dark .xuAnaRank .top{color:#e2e8f0}

.xuAnaRank .top span{
    flex:1;min-width:0;
    overflow:hidden;text-overflow:ellipsis;white-space:nowrap;
}
.xuAnaRank .top b{
    font-family:'Neuton',Georgia,serif;
    color:var(--xa-emerald);
    font-size:1.05rem;font-weight:700;
    flex-shrink:0;
}
html.xu-dark .xuAnaRank .top b{color:var(--xa-gold)}

.xuAnaRank .track{
    height:8px;border-radius:99px;
    background:rgba(5,150,105,.08);
    overflow:hidden;
}
html.xu-dark .xuAnaRank .track{background:rgba(5,150,105,.15)}

.xuAnaRank .fill{
    height:100%;border-radius:99px;
    width:0;
    transition:width 1.2s cubic-bezier(.2,.8,.2,1);
    position:relative;
    box-shadow:0 0 10px rgba(5,150,105,.3);
}
.xuAnaRank .fill.author{background:linear-gradient(90deg,var(--xa-emerald),var(--xa-gold))}
.xuAnaRank .fill.prodi{background:linear-gradient(90deg,var(--xa-teal),var(--xa-mint))}

/* ===== SUBYEK TERPANAS (CHIPS) ===== */
.xuAnaChips{display:flex;flex-wrap:wrap;gap:9px}
.xuAnaChip{
    display:inline-flex;align-items:center;gap:7px;
    padding:7px 15px;border-radius:999px;
    background:linear-gradient(90deg,rgba(5,150,105,.1),rgba(245,158,11,.08));
    border:1.5px solid rgba(5,150,105,.28);
    color:var(--xa-emerald);
    font-weight:700;
    transition:.25s;
    cursor:default;
}
.xuAnaChip:hover{
    background:linear-gradient(90deg,var(--xa-emerald),var(--xa-gold));
    color:#fff;border-color:transparent;
    transform:translateY(-2px);
    box-shadow:0 8px 20px rgba(5,150,105,.35);
}
html.xu-dark .xuAnaChip{background:linear-gradient(90deg,rgba(5,150,105,.15),rgba(245,158,11,.1));color:var(--xa-mint);border-color:rgba(5,150,105,.35)}
html.xu-dark .xuAnaChip:hover{color:#fff}

.xuAnaChip small{
    opacity:.75;font-size:.72rem;font-weight:800;
    padding:1px 7px;border-radius:999px;
    background:rgba(255,255,255,.35);
}
.xuAnaChip:hover small{background:rgba(255,255,255,.3);opacity:1}
html.xu-dark .xuAnaChip small{background:rgba(255,255,255,.15)}

/* ===== EMPTY STATE ===== */
.xuAnaEmpty{
    color:var(--xa-soft);font-size:.88rem;
    text-align:center;padding:24px;
    font-style:italic;
}

/* ===== Responsive ===== */
@media(max-width:700px){
    .xuAnaBars{height:160px;gap:4px}
    .xuAnaBarCol span{font-size:.55rem}
    .xuAnaCard{padding:18px 16px}
    .xuAnaCard h3{font-size:.98rem}
    .xuAnaDonut{width:170px;height:170px}
    .xuAnaDonutHole{inset:24px}
    .xuAnaDonutHole b{font-size:1.5rem}
}
</style>

<div class="xuAnaWrap">
    <div class="xuAnaHead">
        <h2><i class="fa fa-bar-chart"></i> Dasbor Analitik Komando</h2>
        <span class="sub">— intelijen koleksi repositori Anda, diperbarui langsung dari basis data</span>
    </div>

    <!-- Kartu statistik -->
    <div class="xuAnaStats">
        <div class="xuAnaStat" style="--s1:var(--xa-emerald);--s2:var(--xa-teal)">
            <div class="ico" style="background:linear-gradient(135deg,var(--xa-emerald),var(--xa-teal))"><i class="fa fa-book"></i></div>
            <div>
                <div class="num xuCount" data-target="<?= $a['total_doc'] ?>">0</div>
                <div class="lbl">Dokumen</div>
            </div>
        </div>
        <div class="xuAnaStat" style="--s1:var(--xa-gold);--s2:var(--xa-emerald)">
            <div class="ico" style="background:linear-gradient(135deg,var(--xa-gold),var(--xa-emerald))"><i class="fa fa-users"></i></div>
            <div>
                <div class="num xuCount" data-target="<?= $a['total_author'] ?>">0</div>
                <div class="lbl">Penulis</div>
            </div>
        </div>
        <div class="xuAnaStat" style="--s1:var(--xa-teal);--s2:var(--xa-mint)">
            <div class="ico" style="background:linear-gradient(135deg,var(--xa-teal),var(--xa-mint))"><i class="fa fa-paperclip"></i></div>
            <div>
                <div class="num xuCount" data-target="<?= $a['total_file'] ?>">0</div>
                <div class="lbl">Berkas</div>
            </div>
        </div>
        <div class="xuAnaStat" style="--s1:var(--xa-emerald);--s2:var(--xa-gold)">
            <div class="ico" style="background:linear-gradient(135deg,var(--xa-emerald),var(--xa-gold))"><i class="fa fa-tags"></i></div>
            <div>
                <div class="num xuCount" data-target="<?= $a['total_topic'] ?>">0</div>
                <div class="lbl">Subyek</div>
            </div>
        </div>
        <div class="xuAnaStat" style="--s1:var(--xa-mint);--s2:var(--xa-teal)">
            <div class="ico" style="background:linear-gradient(135deg,var(--xa-mint),var(--xa-teal))"><i class="fa fa-unlock"></i></div>
            <div>
                <div class="num xuCount" data-target="<?= $a['file_public'] ?>">0</div>
                <div class="lbl">Akses Publik</div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Grafik setoran -->
        <div class="col-md-7">
            <div class="xuAnaCard">
                <h3><i class="fa fa-line-chart"></i> Setoran Dokumen — 12 Bulan Terakhir</h3>
                <?php if (!empty($a['monthly'])): ?>
                <div class="xuAnaBars">
                    <?php foreach ($a['monthly'] as $m): ?>
                        <div class="xuAnaBarCol" title="<?= $m['label'] ?>: <?= $m['count'] ?> dokumen">
                            <div class="xuAnaBar" data-h="<?= max(4, round($m['count'] / $maxMonthly * 100)) ?>" style="height:4%"></div>
                            <span><?= $m['label'] ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php else: ?><div class="xuAnaEmpty">Belum ada data setoran.</div><?php endif; ?>
            </div>
        </div>
        <!-- Donat GMD -->
        <div class="col-md-5">
            <div class="xuAnaCard">
                <h3><i class="fa fa-pie-chart"></i> Komposisi Koleksi (GMD)</h3>
                <div class="xuAnaDonut">
                    <div class="xuAnaDonutHole">
                        <b><?= $totalGmd ?></b>
                        <span>Koleksi</span>
                    </div>
                </div>
                <ul class="xuAnaLegend">
                    <?php foreach ($a['gmd'] as $i => $g): ?>
                        <li>
                            <span class="dot" style="background:<?= $gmdColors[$i % count($gmdColors)] ?>;color:<?= $gmdColors[$i % count($gmdColors)] ?>"></span>
                            <span style="flex:1;min-width:0;overflow:hidden;text-overflow:ellipsis;white-space:nowrap"><?= esc($g->gmd_name) ?></span>
                            <span class="cnt"><?= $g->c ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Penulis terproduktif -->
        <div class="col-md-4">
            <div class="xuAnaCard">
                <h3><i class="fa fa-trophy"></i> Penulis Terproduktif</h3>
                <?php if (!empty($a['authors'])): ?>
                <ul class="xuAnaRank">
                    <?php foreach ($a['authors'] as $au): ?>
                        <li>
                            <div class="top">
                                <span><?= esc($au->author_name) ?></span>
                                <b><?= $au->c ?></b>
                            </div>
                            <div class="track">
                                <div class="fill author" data-w="<?= round((int)$au->c / $maxAuthor * 100) ?>"></div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <?php else: ?><div class="xuAnaEmpty">Belum ada data penulis.</div><?php endif; ?>
            </div>
        </div>
        <!-- Prodi teraktif -->
        <div class="col-md-4">
            <div class="xuAnaCard">
                <h3><i class="fa fa-graduation-cap"></i> Prodi Teraktif</h3>
                <?php if (!empty($a['prodi'])): ?>
                <ul class="xuAnaRank">
                    <?php foreach ($a['prodi'] as $pr): ?>
                        <li>
                            <div class="top">
                                <span><?= esc($pr->name_prodi) ?></span>
                                <b><?= $pr->c ?></b>
                            </div>
                            <div class="track">
                                <div class="fill prodi" data-w="<?= round((int)$pr->c / $maxProdi * 100) ?>"></div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <?php else: ?><div class="xuAnaEmpty">Belum ada data prodi.</div><?php endif; ?>
            </div>
        </div>
        <!-- Subyek terpanas -->
        <div class="col-md-4">
            <div class="xuAnaCard">
                <h3><i class="fa fa-fire"></i> Subyek Terpanas</h3>
                <?php if (!empty($a['topics'])): ?>
                <div class="xuAnaChips">
                    <?php foreach ($a['topics'] as $tp): ?>
                        <span class="xuAnaChip" style="font-size:<?= round(0.72 + ((int)$tp->c / $maxTopic) * 0.5, 2) ?>rem">
                            <?= esc($tp->topic) ?>
                            <small>×<?= $tp->c ?></small>
                        </span>
                    <?php endforeach; ?>
                </div>
                <?php else: ?><div class="xuAnaEmpty">Belum ada data subyek.</div><?php endif; ?>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function(){
    // ===== Counter animasi =====
    document.querySelectorAll('.xuCount').forEach(function(el){
        var target = parseInt(el.getAttribute('data-target')) || 0;
        var start = null, dur = 1600;
        function step(ts){
            if (!start) start = ts;
            var p = Math.min((ts - start) / dur, 1);
            var e = 1 - Math.pow(1 - p, 3);
            el.textContent = Math.floor(e * target).toLocaleString('id-ID');
            if (p < 1) requestAnimationFrame(step);
            else el.textContent = target.toLocaleString('id-ID');
        }
        requestAnimationFrame(step);
    });

    // ===== Bar & fill animasi =====
    setTimeout(function(){
        document.querySelectorAll('.xuAnaBar').forEach(function(b){
            b.style.height = b.getAttribute('data-h') + '%';
        });
        document.querySelectorAll('.xuAnaRank .fill').forEach(function(f){
            f.style.width = f.getAttribute('data-w') + '%';
        });
    }, 250);
});
</script>