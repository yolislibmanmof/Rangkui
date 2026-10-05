<?php
// ================= DATA TAMBAHAN DASBOR =================
$db    = \Config\Database::connect();

$h = (int) date('H');
if ($h >= 4 && $h < 10)      $salam = 'Selamat Pagi';
elseif ($h >= 10 && $h < 15) $salam = 'Selamat Siang';
elseif ($h >= 15 && $h < 19) $salam = 'Selamat Sore';
else                         $salam = 'Selamat Malam';

$latest = [];
try {
    $latest = $db->query("SELECT title, input_date FROM biblio ORDER BY input_date DESC LIMIT 6")->getResultArray();
} catch (\Throwable $e) {}

$months = []; $monthCounts = [];
try {
    $rows = $db->query("SELECT DATE_FORMAT(input_date,'%Y-%m') AS ym, DATE_FORMAT(input_date,'%b') AS lbl, COUNT(*) AS c
                        FROM biblio WHERE input_date IS NOT NULL
                        GROUP BY ym, lbl ORDER BY ym DESC LIMIT 6")->getResultArray();
    foreach (array_reverse($rows) as $r) { $months[] = $r['lbl']; $monthCounts[] = (int) $r['c']; }
} catch (\Throwable $e) {}

$phpVer  = PHP_VERSION;
$ciVer   = \CodeIgniter\CodeIgniter::CI_VERSION;
$mysqlVer = '—';
try { $mysqlVer = $db->query("SELECT VERSION() AS v")->getRow()->v; } catch (\Throwable $e) {}

$diskPct = 0;
try {
    $total = disk_total_space(FCPATH); $free = disk_free_space(FCPATH);
    $diskPct = $total > 0 ? round((($total - $free) / $total) * 100) : 0;
} catch (\Throwable $e) {}
$diskFree = round(disk_free_space(FCPATH) / 1073741824, 1);
?>

<style>
/* ================================================================
   DIFOSS DASHBOARD — EMERALD FOREST EDITION
   ================================================================ */
:root{
    --d-emerald:#059669; --d-teal:#0891b2; --d-gold:#f59e0b;
    --d-mint:#6ee7b7; --d-deep:#0a2920; --d-mid:#064e3b;
    --d-ink:#0f172a; --d-muted:#64748b; --d-soft:#94a3b8;
}

.dash-wrap{
    max-width:1400px;margin:0 auto;
    padding:30px 22px 60px;
    font-family:'Plus Jakarta Sans',system-ui,sans-serif;
}

/* ===== HERO ===== */
.dash-hero{
    position:relative;overflow:hidden;
    padding:40px 38px 44px;
    background:linear-gradient(135deg,#0a2920 0%,#064e3b 55%,#115e59 100%);
    border-radius:24px;
    margin-bottom:26px;
    box-shadow:0 20px 60px rgba(5,150,105,.25);
    display:flex;align-items:center;justify-content:space-between;
    flex-wrap:wrap;gap:20px;
}
.dash-hero-glow{
    position:absolute;top:-80px;right:-80px;
    width:380px;height:380px;border-radius:50%;
    background:radial-gradient(circle,rgba(245,158,11,.28),transparent 70%);
    filter:blur(50px);pointer-events:none;
}
.dash-hero-glow::before{
    content:'';position:absolute;
    bottom:-160px;left:-200px;
    width:320px;height:320px;border-radius:50%;
    background:radial-gradient(circle,rgba(8,145,178,.3),transparent 70%);
}
.dash-hero-text{position:relative;z-index:2;flex:1;min-width:280px}
.dash-hero-text h1{
    font-family:'Neuton',Georgia,serif;
    font-size:2.1rem;font-weight:700;
    color:#fff;margin:0 0 8px;letter-spacing:-.01em;
    text-shadow:0 2px 14px rgba(0,0,0,.3);
}
.dash-hero-text h1 b{
    background:linear-gradient(90deg,var(--d-gold),var(--d-mint));
    -webkit-background-clip:text;background-clip:text;
    -webkit-text-fill-color:transparent;
}
.dash-hero-text p{color:rgba(255,255,255,.75);margin:0;font-size:.95rem;max-width:540px;line-height:1.55}

.dash-hero-meta{
    display:flex;gap:10px;flex-wrap:wrap;
    position:relative;z-index:2;
}
.dash-hero-chip{
    display:inline-flex;align-items:center;gap:8px;
    padding:9px 16px;border-radius:999px;
    background:rgba(255,255,255,.08);
    backdrop-filter:blur(10px);-webkit-backdrop-filter:blur(10px);
    border:1px solid rgba(255,255,255,.18);
    color:#fff;font-size:.82rem;font-weight:700;
    letter-spacing:.02em;
}
.dash-hero-chip i{color:var(--d-gold);font-size:.9rem}

/* ===== GRID KARTU STATISTIK ===== */
.dash-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(200px,1fr));
    gap:18px;margin-bottom:26px;
}

.dash-card{
    position:relative;overflow:hidden;
    padding:22px 22px 20px;
    background:#fff;
    border-radius:18px;
    border:1px solid rgba(5,150,105,.08);
    box-shadow:0 6px 18px rgba(15,23,42,.05);
    transition:all .35s cubic-bezier(.2,.8,.2,1);
    cursor:default;
}
html.xu-dark .dash-card{background:#0f1e1f;border-color:rgba(5,150,105,.2);box-shadow:0 6px 18px rgba(0,0,0,.4)}

.dash-card::before{
    content:'';position:absolute;top:0;left:0;right:0;height:4px;
    background:linear-gradient(90deg,var(--c1),var(--c2));
    transition:height .3s ease;
}
.dash-card::after{
    content:'';position:absolute;bottom:-40px;right:-40px;
    width:140px;height:140px;border-radius:50%;
    background:radial-gradient(circle,var(--c1),transparent 70%);
    opacity:.08;transition:opacity .3s;
}
.dash-card:hover{
    transform:translateY(-5px);
    box-shadow:0 22px 50px rgba(5,150,105,.18);
    border-color:rgba(5,150,105,.25);
}
.dash-card:hover::before{height:6px}
.dash-card:hover::after{opacity:.18}
html.xu-dark .dash-card:hover{box-shadow:0 22px 50px rgba(5,150,105,.25);border-color:rgba(245,158,11,.35)}

.dash-card-top{
    display:flex;align-items:center;justify-content:space-between;
    margin-bottom:14px;
}
.dash-card-icon{
    width:46px;height:46px;border-radius:13px;
    background:linear-gradient(135deg,var(--c1),var(--c2));
    color:#fff;display:flex;align-items:center;justify-content:center;
    font-size:1.15rem;
    box-shadow:0 8px 18px rgba(5,150,105,.25);
}
.dash-card-sub{
    font-size:.66rem;font-weight:800;
    color:var(--d-muted);
    text-transform:uppercase;letter-spacing:.1em;
    padding:3px 10px;border-radius:999px;
    background:rgba(5,150,105,.06);
}
html.xu-dark .dash-card-sub{background:rgba(5,150,105,.12);color:var(--d-soft)}

.dash-card-num{
    font-family:'Neuton',Georgia,serif;
    font-size:2.4rem;font-weight:700;
    color:var(--d-ink);line-height:1;
    margin-bottom:6px;letter-spacing:-.02em;
    font-variant-numeric:tabular-nums;
}
html.xu-dark .dash-card-num{color:#f1f5f9}

.dash-card-label{
    font-size:.82rem;font-weight:700;
    color:var(--d-muted);
    text-transform:uppercase;letter-spacing:.06em;
}
html.xu-dark .dash-card-label{color:var(--d-soft)}

/* ===== CHART CARDS ===== */
.dash-chart{
    background:#fff;border-radius:20px;
    border:1px solid rgba(5,150,105,.08);
    box-shadow:0 6px 18px rgba(15,23,42,.05);
    padding:22px 24px 18px;
    overflow:hidden;
}
html.xu-dark .dash-chart{background:#0f1e1f;border-color:rgba(5,150,105,.2);box-shadow:0 6px 18px rgba(0,0,0,.4)}

.dash-chart-head{
    display:flex;align-items:center;justify-content:space-between;
    margin-bottom:18px;padding-bottom:14px;
    border-bottom:1px dashed rgba(5,150,105,.15);
}
.dash-chart-head h2{
    margin:0;font-family:'Neuton',Georgia,serif;
    font-size:1.15rem;font-weight:700;
    color:var(--d-ink);
    display:flex;align-items:center;gap:10px;
}
html.xu-dark .dash-chart-head h2{color:#f1f5f9}
.dash-chart-head h2 i{
    width:34px;height:34px;border-radius:10px;
    background:linear-gradient(135deg,var(--d-emerald),var(--d-gold));
    color:#fff;display:inline-flex;align-items:center;justify-content:center;
    font-size:.9rem;
    box-shadow:0 6px 14px rgba(5,150,105,.25);
}

.dash-chart-badge{
    display:inline-flex;align-items:center;gap:7px;
    padding:5px 12px;border-radius:999px;
    background:rgba(5,150,105,.08);
    border:1px solid rgba(5,150,105,.2);
    color:var(--d-emerald);
    font-size:.7rem;font-weight:800;
    letter-spacing:.08em;text-transform:uppercase;
}
html.xu-dark .dash-chart-badge{background:rgba(245,158,11,.1);color:var(--d-gold);border-color:rgba(245,158,11,.25)}
.dash-chart-badge .dot{
    width:7px;height:7px;border-radius:50%;
    background:currentColor;
    animation:dashDot 1.6s ease-in-out infinite;
}
@keyframes dashDot{0%,100%{opacity:1;transform:scale(1)}50%{opacity:.35;transform:scale(.8)}}

/* ===== KOLEKSI TERBARU LIST ===== */
.dash-latest-list{list-style:none;margin:0;padding:0}
.dash-latest-list li{
    display:flex;justify-content:space-between;align-items:center;gap:12px;
    padding:13px 4px;
    border-bottom:1px solid rgba(5,150,105,.08);
    transition:background .2s,transform .2s;
}
.dash-latest-list li:hover{background:rgba(5,150,105,.04);transform:translateX(3px)}
html.xu-dark .dash-latest-list li{border-bottom-color:rgba(5,150,105,.15)}
html.xu-dark .dash-latest-list li:hover{background:rgba(5,150,105,.08)}
.dash-latest-list li:last-child{border-bottom:none}

.dash-latest-title{
    display:flex;align-items:center;gap:10px;
    color:var(--d-ink);font-size:.88rem;font-weight:500;
    flex:1;min-width:0;
}
.dash-latest-title span{
    overflow:hidden;text-overflow:ellipsis;white-space:nowrap;
}
.dash-latest-title i{
    width:32px;height:32px;border-radius:9px;flex-shrink:0;
    background:linear-gradient(135deg,rgba(5,150,105,.12),rgba(8,145,178,.08));
    color:var(--d-emerald);
    display:inline-flex;align-items:center;justify-content:center;
    font-size:.85rem;
}
html.xu-dark .dash-latest-title{color:#e2e8f0}
html.xu-dark .dash-latest-title i{color:var(--d-mint);background:linear-gradient(135deg,rgba(5,150,105,.2),rgba(8,145,178,.12))}

.dash-latest-date{
    color:var(--d-muted);
    white-space:nowrap;font-size:.78rem;font-weight:600;
    display:inline-flex;align-items:center;gap:5px;
    padding:4px 10px;border-radius:8px;
    background:rgba(5,150,105,.06);
}
html.xu-dark .dash-latest-date{color:var(--d-soft);background:rgba(5,150,105,.1)}

.dash-empty{
    text-align:center;padding:30px 20px;
    color:var(--d-muted);font-size:.9rem;line-height:1.6;
}
.dash-empty i{
    font-size:2.4rem;color:var(--d-soft);
    margin-bottom:10px;display:block;
}
.dash-empty b{color:var(--d-emerald)}
html.xu-dark .dash-empty b{color:var(--d-gold)}

/* ===== PROGRESS BAR ===== */
.dash-progress{
    height:6px;border-radius:99px;
    background:rgba(5,150,105,.12);
    overflow:hidden;margin-top:10px;
}
.dash-progress-bar{
    height:100%;border-radius:99px;
    background:linear-gradient(90deg,var(--c1),var(--c2));
    transition:width 1.2s cubic-bezier(.2,.8,.2,1);
    box-shadow:0 0 10px var(--c1);
}

/* ===== RESPONSIVE ===== */
@media(max-width:992px){
    .dash-hero{padding:30px 24px 34px}
    .dash-hero-text h1{font-size:1.7rem}
}
@media(max-width:640px){
    .dash-wrap{padding:18px 14px 40px}
    .dash-hero{padding:26px 20px 30px}
    .dash-hero-text h1{font-size:1.4rem}
    .dash-hero-text p{font-size:.85rem}
    .dash-grid{grid-template-columns:repeat(2,1fr);gap:12px}
    .dash-card{padding:16px 14px}
    .dash-card-num{font-size:1.7rem}
    .dash-card-icon{width:38px;height:38px;font-size:1rem}
}
</style>

<div class="dash-wrap">

    <!-- ================= HERO ================= -->
    <div class="dash-hero">
        <div class="dash-hero-glow"></div>
        <div class="dash-hero-text">
            <h1><?= $salam; ?>, <b><?= $user; ?></b></h1>
            <p>Pusat kendali repositori institusi Anda — seluruh statistik dalam satu pandangan.</p>
        </div>
        <div class="dash-hero-meta">
            <div class="dash-hero-chip"><i class="fa fa-calendar"></i> <?= date('d F Y'); ?></div>
            <div class="dash-hero-chip"><i class="fa fa-clock-o"></i> <span id="dashClock">--:--:--</span></div>
            <div class="dash-hero-chip"><i class="fa fa-database"></i> <?= $judul; ?> Koleksi</div>
        </div>
    </div>

    <!-- ================= KARTU STATISTIK ================= -->
    <div class="dash-grid">
        <div class="dash-card" style="--c1:var(--d-emerald); --c2:var(--d-teal);">
            <div class="dash-card-top">
                <div class="dash-card-icon"><i class="fa fa-users"></i></div>
                <span class="dash-card-sub">Persons</span>
            </div>
            <div class="dash-card-num"><?= $penguji; ?></div>
            <div class="dash-card-label">Examiner</div>
        </div>
        <div class="dash-card" style="--c1:var(--d-teal); --c2:var(--d-gold);">
            <div class="dash-card-top">
                <div class="dash-card-icon"><i class="fa fa-graduation-cap"></i></div>
                <span class="dash-card-sub">Persons</span>
            </div>
            <div class="dash-card-num"><?= $dosen; ?></div>
            <div class="dash-card-label">Lecturer</div>
        </div>
        <div class="dash-card" style="--c1:var(--d-gold); --c2:var(--d-emerald);">
            <div class="dash-card-top">
                <div class="dash-card-icon"><i class="fa fa-pencil"></i></div>
                <span class="dash-card-sub">Persons</span>
            </div>
            <div class="dash-card-num"><?= $penulis; ?></div>
            <div class="dash-card-label">Writer</div>
        </div>
        <div class="dash-card" style="--c1:var(--d-emerald); --c2:var(--d-gold);">
            <div class="dash-card-top">
                <div class="dash-card-icon"><i class="fa fa-book"></i></div>
                <span class="dash-card-sub">Title</span>
            </div>
            <div class="dash-card-num"><?= $judul; ?></div>
            <div class="dash-card-label">ETD</div>
        </div>
        <div class="dash-card" style="--c1:var(--d-teal); --c2:var(--d-mint);">
            <div class="dash-card-top">
                <div class="dash-card-icon"><i class="fa fa-tags"></i></div>
                <span class="dash-card-sub">Classification</span>
            </div>
            <div class="dash-card-num"><?= $gmd; ?></div>
            <div class="dash-card-label">GMD</div>
        </div>
    </div>

    <!-- ================= GRAFIK ================= -->
    <div class="row" style="margin:0 -9px;">
        <div class="col-lg-7" style="padding:0 9px;margin-bottom:18px;">
            <div class="dash-chart" style="height:100%;">
                <div class="dash-chart-head">
                    <h2><i class="fa fa-line-chart"></i> Collection Trend</h2>
                    <span class="dash-chart-badge"><span class="dot"></span> 6 Bulan</span>
                </div>
                <div id="col-chart" style="min-width:100%; height:340px; margin:0 auto;"></div>
            </div>
        </div>
        <div class="col-lg-5" style="padding:0 9px;margin-bottom:18px;">
            <div class="dash-chart" style="height:100%;">
                <div class="dash-chart-head">
                    <h2><i class="fa fa-pie-chart"></i> Statistic Collection</h2>
                    <span class="dash-chart-badge"><span class="dot"></span> Live</span>
                </div>
                <div id="pie-chart" style="min-width:100%; height:340px; margin:0 auto;"></div>
            </div>
        </div>
    </div>

    <!-- ================= KOLEKSI TERBARU + STATUS SISTEM ================= -->
    <div class="row" style="margin:0 -9px;">
        <div class="col-lg-7" style="padding:0 9px;margin-bottom:18px;">
            <div class="dash-chart">
                <div class="dash-chart-head">
                    <h2><i class="fa fa-book"></i> Koleksi Terbaru</h2>
                    <span class="dash-chart-badge"><span class="dot"></span> Update</span>
                </div>
                <?php if (!empty($latest)) : ?>
                    <ul class="dash-latest-list">
                        <?php foreach ($latest as $item) : ?>
                            <li>
                                <div class="dash-latest-title">
                                    <i class="fa fa-file-text-o"></i>
                                    <span><?= esc($item['title']); ?></span>
                                </div>
                                <span class="dash-latest-date">
                                    <i class="fa fa-calendar-o"></i>
                                    <?= date('d M Y', strtotime($item['input_date'])); ?>
                                </span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else : ?>
                    <div class="dash-empty">
                        <i class="fa fa-folder-open-o"></i>
                        Belum ada koleksi tercatat. Mulailah menambahkan ETD melalui menu <b>ETD</b>.
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-lg-5" style="padding:0 9px;">
            <div class="dash-grid" style="grid-template-columns:repeat(2, 1fr);">
                <div class="dash-card" style="--c1:var(--d-emerald); --c2:var(--d-teal);">
                    <div class="dash-card-top">
                        <div class="dash-card-icon"><i class="fa fa-code"></i></div>
                    </div>
                    <div class="dash-card-num" style="font-size:1.7rem;"><?= $phpVer; ?></div>
                    <div class="dash-card-label">PHP Engine</div>
                </div>
                <div class="dash-card" style="--c1:var(--d-teal); --c2:var(--d-gold);">
                    <div class="dash-card-top">
                        <div class="dash-card-icon"><i class="fa fa-database"></i></div>
                    </div>
                    <div class="dash-card-num" style="font-size:1.7rem;"><?= substr($mysqlVer, 0, 6); ?></div>
                    <div class="dash-card-label">MySQL</div>
                </div>
                <div class="dash-card" style="--c1:var(--d-gold); --c2:var(--d-emerald);">
                    <div class="dash-card-top">
                        <div class="dash-card-icon"><i class="fa fa-hdd-o"></i></div>
                    </div>
                    <div class="dash-card-num" style="font-size:1.7rem;"><?= $diskFree; ?> GB</div>
                    <div class="dash-card-label">Disk Tersedia</div>
                    <div class="dash-progress">
                        <div class="dash-progress-bar" style="width:<?= $diskPct; ?>%;"></div>
                    </div>
                </div>
                <div class="dash-card" style="--c1:var(--d-emerald); --c2:var(--d-mint);">
                    <div class="dash-card-top">
                        <div class="dash-card-icon"><i class="fa fa-bolt"></i></div>
                    </div>
                    <div class="dash-card-num" style="font-size:1.7rem;"><?= $ciVer; ?></div>
                    <div class="dash-card-label">CodeIgniter</div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- ================= MESIN ANIMASI & GRAFIK ================= -->
<script>
document.addEventListener('DOMContentLoaded', function () {

    // ===== 1) Angka statistik menghitung naik =====
    document.querySelectorAll('.dash-card-num').forEach(function (el) {
        var raw = String(el.textContent).trim();
        if (!/^\d+$/.test(raw)) return;
        var target = parseInt(raw, 10);
        var start = null;
        function step(ts) {
            if (!start) start = ts;
            var p = Math.min((ts - start) / 1200, 1);
            var eased = 1 - Math.pow(1 - p, 3);
            el.textContent = Math.floor(eased * target).toLocaleString('id-ID');
            if (p < 1) requestAnimationFrame(step);
            else el.textContent = target.toLocaleString('id-ID');
        }
        requestAnimationFrame(step);
    });

    // ===== 2) Jam digital live =====
    var clock = document.getElementById('dashClock');
    function tick() { if (clock) clock.textContent = new Date().toLocaleTimeString('id-ID'); }
    tick(); setInterval(tick, 1000);

    // ===== 3) Grafik tren koleksi (EMERALD AREA CHART) =====
    if (window.Highcharts) {
        Highcharts.chart('col-chart', {
            chart: { type: 'areaspline', backgroundColor: 'transparent' },
            title: { text: null },
            credits: { enabled: false },
            xAxis: {
                categories: <?= json_encode($months); ?>,
                labels: { style: { color: 'rgba(100,116,139,.9)', fontWeight: '600' } },
                lineColor: 'rgba(5,150,105,.2)', tickColor: 'rgba(5,150,105,.2)'
            },
            yAxis: {
                allowDecimals: false,
                gridLineColor: 'rgba(5,150,105,.08)',
                labels: { style: { color: 'rgba(100,116,139,.9)', fontWeight: '600' } },
                title: { text: null }
            },
            legend: { enabled: false },
            tooltip: {
                backgroundColor: '#0a2920',
                borderColor: '#f59e0b',
                style: { color: '#fff', fontWeight: '600' },
                headerFormat: '<span style="font-size:.82rem;color:#6ee7b7">{point.key}</span><br/>',
                pointFormat: '<b style="color:#f59e0b">{point.y}</b> koleksi masuk'
            },
            plotOptions: {
                areaspline: {
                    fillOpacity: .25,
                    marker: { enabled: true }
                }
            },
            series: [{
                name: 'Koleksi Masuk',
                data: <?= json_encode($monthCounts); ?>,
                color: '#059669',
                lineWidth: 3,
                fillColor: {
                    linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                    stops: [
                        [0, 'rgba(5,150,105,.55)'],
                        [1, 'rgba(5,150,105,.02)']
                    ]
                },
                marker: {
                    fillColor: '#f59e0b',
                    lineWidth: 2,
                    lineColor: '#fff',
                    radius: 5,
                    symbol: 'circle'
                }
            }]
        });

        // ===== 4) PIE CHART — Statistik koleksi =====
        Highcharts.chart('pie-chart', {
            chart: { type: 'pie', backgroundColor: 'transparent' },
            title: { text: null },
            credits: { enabled: false },
            tooltip: {
                backgroundColor: '#0a2920',
                borderColor: '#f59e0b',
                style: { color: '#fff', fontWeight: '600' },
                pointFormat: '<b>{point.y}</b> ({point.percentage:.1f}%)'
            },
            plotOptions: {
                pie: {
                    innerSize: '55%',
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.y}',
                        style: { color: '#0f172a', fontWeight: '700', fontSize: '.82rem', textOutline: 'none' }
                    }
                }
            },
            series: [{
                name: 'Statistik',
                colorByPoint: true,
                colors: ['#059669', '#0891b2', '#f59e0b', '#6ee7b7', '#115e59'],
                data: [
                    { name: 'Examiner', y: <?= (int) $penguji ?> },
                    { name: 'Lecturer', y: <?= (int) $dosen ?> },
                    { name: 'Writer',   y: <?= (int) $penulis ?> },
                    { name: 'ETD',      y: <?= (int) $judul ?> },
                    { name: 'GMD',      y: <?= (int) $gmd ?> }
                ]
            }]
        });
    }
});
</script>