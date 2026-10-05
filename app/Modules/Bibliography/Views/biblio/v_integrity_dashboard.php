<style>
/* ================================================================
   DIFOSS DASBOR FORENSIK GLOBAL — EMERALD FOREST EDITION
   ================================================================ */
:root{
    --df-emerald:#059669; --df-teal:#0891b2; --df-gold:#f59e0b;
    --df-mint:#6ee7b7; --df-deep:#0a2920; --df-mid:#064e3b;
    --df-ink:#0f172a; --df-muted:#64748b; --df-soft:#94a3b8;
}

.xuDashWrap{
    padding:10px 0;
    font-family:'Plus Jakarta Sans',system-ui,sans-serif;
}

/* ===== HEADER ===== */
.xuDashHead{
    display:flex;align-items:center;gap:14px;
    margin-bottom:24px;flex-wrap:wrap;
}
.xuDashHead h2{
    margin:0;font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1.55rem;
    color:var(--df-ink);
    display:flex;align-items:center;gap:12px;
    letter-spacing:-.01em;
}
html.xu-dark .xuDashHead h2{color:#f1f5f9}

.xuDashHead h2 i{
    width:46px;height:46px;border-radius:14px;
    background:linear-gradient(135deg,var(--df-emerald),var(--df-gold));
    color:#fff;
    display:inline-flex;align-items:center;justify-content:center;
    font-size:1.2rem;
    box-shadow:0 10px 24px rgba(5,150,105,.35);
}

.xuDashSub{
    font-size:.82rem;color:var(--df-muted);
    font-weight:500;
}
html.xu-dark .xuDashSub{color:var(--df-soft)}

/* Tombol aksi header */
.xuDashActions{
    margin-left:auto;
    display:flex;gap:10px;flex-wrap:wrap;
}

.xuDashBtn{
    display:inline-flex;align-items:center;gap:8px;
    padding:10px 18px;border:none;border-radius:12px;
    font-weight:800;font-size:.82rem;
    cursor:pointer;text-decoration:none;
    transition:.25s;font-family:inherit;
    letter-spacing:.02em;
    position:relative;overflow:hidden;
}
.xuDashBtn::before{
    content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;
    background:linear-gradient(100deg,transparent 20%,rgba(255,255,255,.28) 50%,transparent 80%);
    transition:left .6s ease;
}
.xuDashBtn:hover::before{left:120%}
.xuDashBtn:hover{
    filter:brightness(1.08);
    transform:translateY(-2px);
    text-decoration:none;color:#fff;
}

.xuDashBtn.primary{
    background:linear-gradient(90deg,var(--df-emerald),var(--df-teal));
    color:#fff;
    box-shadow:0 8px 20px rgba(5,150,105,.3);
}
.xuDashBtn.warn{
    background:linear-gradient(90deg,var(--df-gold),var(--df-emerald));
    color:#fff;
    box-shadow:0 8px 20px rgba(245,158,11,.3);
}
.xuDashBtn.soft{
    background:rgba(5,150,105,.1);
    color:var(--df-emerald);
    border:1.5px solid rgba(5,150,105,.25);
}
.xuDashBtn.soft:hover{
    background:linear-gradient(90deg,var(--df-emerald),var(--df-gold));
    color:#fff;border-color:transparent;
}
html.xu-dark .xuDashBtn.soft{background:rgba(5,150,105,.15);color:var(--df-mint);border-color:rgba(5,150,105,.3)}

/* ===== KARTU STATISTIK ===== */
.xuStatGrid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(190px,1fr));
    gap:14px;margin-bottom:22px;
}
.xuStat{
    background:#fff;border-radius:18px;
    padding:20px;
    border:1px solid rgba(5,150,105,.1);
    box-shadow:0 4px 16px rgba(15,23,42,.04);
    position:relative;overflow:hidden;
    transition:.35s cubic-bezier(.2,.8,.2,1);
}
.xuStat:before{
    content:'';position:absolute;top:0;left:0;
    width:5px;height:100%;
    background:var(--acc);
    transition:width .3s ease;
}
.xuStat:hover{
    transform:translateY(-4px);
    box-shadow:0 18px 42px rgba(5,150,105,.14);
    border-color:rgba(5,150,105,.22);
}
.xuStat:hover:before{width:7px}
html.xu-dark .xuStat{background:#0f1e1f;border-color:rgba(5,150,105,.2);box-shadow:0 4px 16px rgba(0,0,0,.4)}
html.xu-dark .xuStat:hover{box-shadow:0 18px 42px rgba(5,150,105,.22);border-color:rgba(245,158,11,.35)}

.xuStat .lbl{
    font-size:.72rem;font-weight:900;
    color:var(--df-muted);
    text-transform:uppercase;letter-spacing:.08em;
    margin-bottom:8px;
}
html.xu-dark .xuStat .lbl{color:var(--df-soft)}

.xuStat .num{
    font-family:'Neuton',Georgia,serif;
    font-size:2.2rem;font-weight:700;
    color:var(--acc);line-height:1;
    letter-spacing:-.02em;
    font-variant-numeric:tabular-nums;
}

.xuStat .sub{
    font-size:.78rem;color:var(--df-soft);
    margin-top:7px;font-weight:500;
}

/* ===== PANEL GRID ===== */
.xuPanelGrid{
    display:grid;
    grid-template-columns:1.4fr .8fr;
    gap:18px;margin-bottom:18px;
}
@media(max-width:1000px){.xuPanelGrid{grid-template-columns:1fr}}

.xuPanel{
    background:#fff;border-radius:18px;
    border:1px solid rgba(5,150,105,.1);
    box-shadow:0 4px 16px rgba(15,23,42,.04);
    overflow:hidden;
    transition:.3s;
}
.xuPanel:hover{
    border-color:rgba(5,150,105,.2);
    box-shadow:0 10px 28px rgba(5,150,105,.1);
}
html.xu-dark .xuPanel{background:#0f1e1f;border-color:rgba(5,150,105,.2);box-shadow:0 4px 16px rgba(0,0,0,.4)}
html.xu-dark .xuPanel:hover{border-color:rgba(5,150,105,.35)}

.xuPanelHead{
    padding:16px 20px;
    background:linear-gradient(135deg,var(--df-deep),var(--df-mid));
    color:#fff;
    display:flex;align-items:center;gap:11px;
    position:relative;overflow:hidden;
}
.xuPanelHead::after{
    content:'';position:absolute;top:-50%;right:-8%;
    width:200px;height:200px;border-radius:50%;
    background:radial-gradient(circle,rgba(245,158,11,.2),transparent 70%);
    filter:blur(40px);pointer-events:none;
}
.xuPanelHead i{
    width:32px;height:32px;border-radius:9px;
    background:linear-gradient(135deg,var(--df-emerald),var(--df-gold));
    display:inline-flex;align-items:center;justify-content:center;
    font-size:.9rem;
    box-shadow:0 6px 14px rgba(5,150,105,.35);
    position:relative;z-index:2;
}
.xuPanelHead h3{
    margin:0;font-family:'Neuton',Georgia,serif;
    font-size:1rem;font-weight:700;
    letter-spacing:-.01em;
    position:relative;z-index:2;
}

.xuPanelBody{padding:20px}
.xuChartBox{height:320px;position:relative}

/* ===== HEALTH RING ===== */
.xuHealthBox{
    display:flex;align-items:center;justify-content:center;
    flex-direction:column;min-height:320px;
}
.xuHealthRing{
    width:190px;height:190px;border-radius:50%;
    display:flex;align-items:center;justify-content:center;
    background:conic-gradient(var(--c) calc(var(--p)*1%),rgba(5,150,105,.1) 0);
    position:relative;
    box-shadow:0 16px 40px rgba(5,150,105,.18);
    animation:xuHealthPulse 3s ease-in-out infinite;
}
@keyframes xuHealthPulse{
    0%,100%{box-shadow:0 16px 40px rgba(5,150,105,.18)}
    50%{box-shadow:0 16px 48px rgba(5,150,105,.3)}
}
.xuHealthRing:after{
    content:'';position:absolute;
    width:138px;height:138px;
    background:#fff;border-radius:50%;
    box-shadow:inset 0 2px 10px rgba(15,23,42,.06);
}
html.xu-dark .xuHealthRing:after{background:#0f1e1f;box-shadow:inset 0 2px 10px rgba(0,0,0,.3)}
html.xu-dark .xuHealthRing{background:conic-gradient(var(--c) calc(var(--p)*1%),rgba(5,150,105,.15) 0)}

.xuHealthRing .val{
    position:relative;z-index:1;
    font-family:'Neuton',Georgia,serif;
    font-size:2.5rem;font-weight:700;
    color:var(--c);line-height:1;
    letter-spacing:-.02em;
}
.xuHealthLabel{
    margin-top:16px;
    font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1.05rem;
    color:var(--df-ink);
}
html.xu-dark .xuHealthLabel{color:#f1f5f9}

.xuHealthNote{
    font-size:.82rem;color:var(--df-muted);
    text-align:center;margin-top:6px;
    max-width:260px;line-height:1.55;
}
html.xu-dark .xuHealthNote{color:var(--df-soft)}

/* ===== TABEL ===== */
.xuTable{width:100%;border-collapse:collapse}
.xuTable th{
    background:linear-gradient(180deg,rgba(5,150,105,.06),rgba(5,150,105,.02));
    color:var(--df-ink);
    font-size:.7rem;
    text-transform:uppercase;letter-spacing:.08em;
    padding:12px 14px;text-align:left;
    border-bottom:1.5px solid rgba(5,150,105,.15);
    font-weight:800;
}
html.xu-dark .xuTable th{background:linear-gradient(180deg,rgba(5,150,105,.12),rgba(5,150,105,.05));color:#e2e8f0;border-bottom-color:rgba(5,150,105,.3)}

.xuTable td{
    padding:12px 14px;
    border-bottom:1px solid #f1f5f9;
    font-size:.84rem;color:var(--df-ink);
    vertical-align:top;
}
html.xu-dark .xuTable td{border-bottom-color:rgba(5,150,105,.1);color:#e2e8f0}

.xuTable tbody tr{transition:.2s}
.xuTable tbody tr:hover{background:rgba(5,150,105,.04)}
.xuTable tbody tr:hover td:first-child{
    box-shadow:inset 3px 0 0 var(--df-emerald);
}
html.xu-dark .xuTable tbody tr:hover{background:rgba(5,150,105,.08)}
html.xu-dark .xuTable tbody tr:hover td:first-child{box-shadow:inset 3px 0 0 var(--df-gold)}

/* Score badges */
.xuBadge{
    display:inline-flex;align-items:center;gap:5px;
    padding:4px 11px;border-radius:999px;
    font-size:.72rem;font-weight:900;
    font-family:'JetBrains Mono',monospace;
    letter-spacing:.02em;
}
.xuBadge.ok{background:rgba(5,150,105,.12);color:var(--df-emerald);border:1px solid rgba(5,150,105,.25)}
.xuBadge.warn{background:rgba(245,158,11,.15);color:#b45309;border:1px solid rgba(245,158,11,.3)}
.xuBadge.bad{background:rgba(239,68,68,.15);color:#dc2626;border:1px solid rgba(239,68,68,.3)}
html.xu-dark .xuBadge.ok{background:rgba(5,150,105,.2);color:var(--df-mint);border-color:rgba(5,150,105,.4)}
html.xu-dark .xuBadge.warn{background:rgba(245,158,11,.2);color:#fde68a;border-color:rgba(245,158,11,.4)}
html.xu-dark .xuBadge.bad{background:rgba(239,68,68,.2);color:#fca5a5;border-color:rgba(239,68,68,.4)}

.xuTitleCell{
    font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:.92rem;
    color:var(--df-ink);line-height:1.35;
}
html.xu-dark .xuTitleCell{color:#f1f5f9}

.xuMini{
    font-size:.72rem;color:var(--df-soft);
    margin-top:3px;
    font-family:'JetBrains Mono',monospace;
    font-weight:600;
}

/* ===== GRID 2 KOLOM ===== */
.xuTwo{
    display:grid;grid-template-columns:1fr 1fr;
    gap:18px;margin-bottom:18px;
}
@media(max-width:1000px){.xuTwo{grid-template-columns:1fr}}

/* ===== PAIR CARDS ===== */
.xuPair{
    background:linear-gradient(135deg,rgba(5,150,105,.04),rgba(245,158,11,.02));
    border:1.5px solid rgba(5,150,105,.15);
    border-radius:14px;padding:14px 16px;
    margin-bottom:11px;
    transition:.25s;
    position:relative;overflow:hidden;
}
.xuPair::before{
    content:'';position:absolute;top:0;left:0;bottom:0;
    width:3px;background:linear-gradient(180deg,var(--df-emerald),var(--df-gold));
    opacity:.6;
}
.xuPair:hover{
    border-color:rgba(5,150,105,.35);
    transform:translateX(3px);
    box-shadow:0 8px 20px rgba(5,150,105,.12);
}
html.xu-dark .xuPair{background:linear-gradient(135deg,rgba(5,150,105,.08),rgba(245,158,11,.04));border-color:rgba(5,150,105,.25)}
html.xu-dark .xuPair:hover{border-color:rgba(245,158,11,.4);box-shadow:0 8px 20px rgba(5,150,105,.2)}

.xuPairTop{
    display:flex;justify-content:space-between;
    gap:10px;align-items:center;
    margin-bottom:9px;
}
.xuPairTop b{
    font-family:'JetBrains Mono',monospace;
    font-size:.82rem;color:var(--df-ink);
    font-weight:800;
}
html.xu-dark .xuPairTop b{color:#f1f5f9}

.xuPairText{
    font-size:.82rem;color:var(--df-muted);
    line-height:1.5;
}
.xuPairText span{display:block;margin:4px 0}
.xuPairText b{color:var(--df-emerald);font-weight:800}
html.xu-dark .xuPairText{color:var(--df-soft)}
html.xu-dark .xuPairText b{color:var(--df-mint)}

.xuPairMeta{
    font-size:.72rem;color:var(--df-soft);
    margin-top:9px;padding-top:9px;
    border-top:1px dashed rgba(5,150,105,.15);
    font-family:'JetBrains Mono',monospace;
    font-weight:600;
}

/* ===== EMPTY STATES ===== */
.xuEmpty{
    text-align:center;color:var(--df-soft);
    padding:32px 20px;font-size:.88rem;
}
.xuEmpty i{
    font-size:2.2rem;color:var(--df-emerald);
    margin-bottom:10px;display:block;
}
html.xu-dark .xuEmpty i{color:var(--df-mint)}

/* ===== PRINT NOTE ===== */
.xuPrintNote{
    background:linear-gradient(135deg,rgba(5,150,105,.08),rgba(245,158,11,.04));
    border:1.5px solid rgba(5,150,105,.25);
    border-radius:14px;
    padding:16px 20px;
    color:var(--df-ink);
    font-size:.84rem;line-height:1.65;
    margin-bottom:20px;
    display:flex;align-items:flex-start;gap:12px;
}
.xuPrintNote::before{
    content:'\f05a';
    font-family:'FontAwesome';
    color:var(--df-emerald);
    font-size:1.2rem;
    width:34px;height:34px;border-radius:10px;
    background:rgba(5,150,105,.12);
    display:inline-flex;align-items:center;justify-content:center;
    flex-shrink:0;
}
html.xu-dark .xuPrintNote{background:linear-gradient(135deg,rgba(5,150,105,.14),rgba(245,158,11,.08));border-color:rgba(5,150,105,.35);color:#e2e8f0}
html.xu-dark .xuPrintNote::before{color:var(--df-mint);background:rgba(5,150,105,.2)}

.xuPrintNote b{color:var(--df-emerald)}
html.xu-dark .xuPrintNote b{color:var(--df-mint)}

/* ===== RESPONSIVE ===== */
@media(max-width:720px){
    .xuDashHead h2{font-size:1.25rem}
    .xuDashHead h2 i{width:40px;height:40px;font-size:1.05rem}
    .xuDashSub{width:100%;margin-left:0}
    .xuDashActions{width:100%}
    .xuDashBtn{flex:1;justify-content:center;padding:9px 14px;font-size:.78rem}
    .xuChartBox{height:260px}
    .xuHealthRing{width:160px;height:160px}
    .xuHealthRing:after{width:116px;height:116px}
    .xuHealthRing .val{font-size:2rem}
}

/* ===== PRINT STYLES ===== */
@media print{
    .ult-sidebar,.ult-topbar,.ult-footer,.xuDashActions{display:none!important}
    .ult-main,.ult-content{margin:0!important;padding:0!important;width:100%!important}
    body{background:#fff!important}
    .xuPanel,.xuStat{box-shadow:none!important;break-inside:avoid;border:1px solid #e2e8f0}
    .xuDashWrap{padding:0}
    .xuPanelHead{background:#059669!important;color:#fff!important}
    .xuPrintNote{background:#f8fafc!important;border-color:#059669!important}
}
</style>

<?php
$scanned = max(1, (int) $stats['total_scanned']);
$cleanPercent = round(($stats['clean_docs'] / $scanned) * 100, 1);
$healthColor = $cleanPercent >= 80 ? '#059669' : ($cleanPercent >= 55 ? '#f59e0b' : '#ef4444');

function xuRiskBadge($value, $type = 'similarity') {
    $v = (float) $value;
    if ($type === 'ai') {
        $cls = $v < 30 ? 'ok' : ($v < 65 ? 'warn' : 'bad');
        return '<span class="xuBadge '.$cls.'">'.number_format($v,1).'</span>';
    }
    $cls = $v < 20 ? 'ok' : ($v < 50 ? 'warn' : 'bad');
    return '<span class="xuBadge '.$cls.'">'.number_format($v,1).'%</span>';
}
?>

<div class="xuDashWrap">
    <div class="xuDashHead">
        <h2><i class="fa fa-shield"></i> Dasbor Forensik Global</h2>
        <span class="xuDashSub">Pusat komando integritas akademik · Similarity · AI-writing insight · Audit trail</span>
        <div class="xuDashActions">
            <a class="xuDashBtn soft" href="<?= base_url('bibliography/integrity') ?>">
                <i class="fa fa-search"></i> Kembali ke Scanner
            </a>
            <button class="xuDashBtn warn" onclick="window.print()">
                <i class="fa fa-print"></i> Cetak Laporan Akreditasi
            </button>
        </div>
    </div>

    <div class="xuPrintNote">
        <div>
            <b>Catatan penting:</b> laporan ini adalah hasil screening internal lokal berbasis fingerprint teks, n-gram similarity, dan stylometry.
            Gunakan sebagai indikator awal untuk audit akademik. Keputusan final tetap perlu telaah manual oleh pengelola/penguji.
        </div>
    </div>

    <!-- ===== KARTU STATISTIK ===== -->
    <div class="xuStatGrid">
        <div class="xuStat" style="--acc:var(--df-emerald)">
            <div class="lbl">Total Dokumen</div>
            <div class="num"><?= number_format($stats['total_docs']) ?></div>
            <div class="sub">koleksi bibliografi</div>
        </div>
        <div class="xuStat" style="--acc:var(--df-teal)">
            <div class="lbl">Sudah Di-scan</div>
            <div class="num"><?= number_format($stats['total_scanned']) ?></div>
            <div class="sub">punya fingerprint integritas</div>
        </div>
        <div class="xuStat" style="--acc:var(--df-emerald)">
            <div class="lbl">Rata-rata Similarity</div>
            <div class="num"><?= number_format($stats['avg_similarity'],1) ?>%</div>
            <div class="sub">semakin rendah semakin baik</div>
        </div>
        <div class="xuStat" style="--acc:var(--df-teal)">
            <div class="lbl">Rata-rata AI Risk</div>
            <div class="num"><?= number_format($stats['avg_ai'],1) ?></div>
            <div class="sub">stylometry anomaly score</div>
        </div>
        <div class="xuStat" style="--acc:var(--df-gold)">
            <div class="lbl">Flag Similarity ≥70%</div>
            <div class="num"><?= number_format($stats['flag_similar']) ?></div>
            <div class="sub">prioritas review plagiarisme</div>
        </div>
        <div class="xuStat" style="--acc:#ef4444">
            <div class="lbl">Flag AI Risk ≥65</div>
            <div class="num"><?= number_format($stats['flag_ai']) ?></div>
            <div class="sub">prioritas review gaya tulis</div>
        </div>
    </div>

    <!-- ===== PANEL TREND + HEALTH ===== -->
    <div class="xuPanelGrid">
        <div class="xuPanel">
            <div class="xuPanelHead">
                <i class="fa fa-line-chart"></i>
                <h3>Tren Historis 30 Hari Terakhir</h3>
            </div>
            <div class="xuPanelBody">
                <div class="xuChartBox">
                    <canvas id="xuTrendChart"></canvas>
                </div>
            </div>
        </div>

        <div class="xuPanel">
            <div class="xuPanelHead">
                <i class="fa fa-heartbeat"></i>
                <h3>Health Score Repositori</h3>
            </div>
            <div class="xuPanelBody">
                <div class="xuHealthBox">
                    <div class="xuHealthRing" style="--p:<?= $cleanPercent ?>;--c:<?= $healthColor ?>">
                        <div class="val"><?= $cleanPercent ?>%</div>
                    </div>
                    <div class="xuHealthLabel">Dokumen Bersih</div>
                    <div class="xuHealthNote">
                        <?= $stats['clean_docs'] ?> dari <?= $stats['total_scanned'] ?> dokumen ter-scan masuk kategori aman.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ===== PANEL RISK + RECENT ===== -->
    <div class="xuPanelGrid">
        <div class="xuPanel">
            <div class="xuPanelHead">
                <i class="fa fa-pie-chart"></i>
                <h3>Distribusi Risiko Koleksi</h3>
            </div>
            <div class="xuPanelBody">
                <div class="xuChartBox">
                    <canvas id="xuRiskChart"></canvas>
                </div>
            </div>
        </div>

        <div class="xuPanel">
            <div class="xuPanelHead">
                <i class="fa fa-clock-o"></i>
                <h3>Aktivitas Scan Terbaru</h3>
            </div>
            <div class="xuPanelBody" style="padding:0">
                <table class="xuTable">
                    <thead>
                        <tr>
                            <th>Dokumen</th>
                            <th>Sim</th>
                            <th>AI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($recent)): ?>
                            <tr><td colspan="3"><div class="xuEmpty"><i class="fa fa-inbox"></i>Belum ada riwayat scan.</div></td></tr>
                        <?php else: ?>
                            <?php foreach ($recent as $r): ?>
                                <tr>
                                    <td>
                                        <div class="xuTitleCell"><?= esc(mb_strimwidth($r->title ?? 'Tanpa judul', 0, 48, '...')) ?></div>
                                        <div class="xuMini"><?= esc($r->scanned_at) ?></div>
                                    </td>
                                    <td><?= xuRiskBadge($r->similarity_score, 'similarity') ?></td>
                                    <td><?= xuRiskBadge($r->ai_risk_score, 'ai') ?></td>
                                </tr>
                            <?php endforeach ?>
                        <?php endif ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- ===== TOP 10 SIMILAR & AI ===== -->
    <div class="xuTwo">
        <div class="xuPanel">
            <div class="xuPanelHead">
                <i class="fa fa-trophy"></i>
                <h3>Top 10 Similarity Tertinggi</h3>
            </div>
            <div class="xuPanelBody" style="padding:0">
                <table class="xuTable">
                    <thead>
                        <tr>
                            <th>Dokumen</th>
                            <th>Tahun</th>
                            <th>Similarity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($topSimilar)): ?>
                            <tr><td colspan="3"><div class="xuEmpty"><i class="fa fa-inbox"></i>Belum ada data.</div></td></tr>
                        <?php else: ?>
                            <?php foreach ($topSimilar as $d): ?>
                                <tr>
                                    <td>
                                        <div class="xuTitleCell">#<?= $d->biblio_id ?> — <?= esc(mb_strimwidth($d->title, 0, 60, '...')) ?></div>
                                        <div class="xuMini">AI Risk: <?= number_format((float)$d->integrity_ai_risk,1) ?></div>
                                    </td>
                                    <td><span class="xuMini"><?= esc($d->publish_year ?: '—') ?></span></td>
                                    <td><?= xuRiskBadge($d->integrity_similarity, 'similarity') ?></td>
                                </tr>
                            <?php endforeach ?>
                        <?php endif ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="xuPanel">
            <div class="xuPanelHead">
                <i class="fa fa-magic"></i>
                <h3>Top 10 AI Risk Tertinggi</h3>
            </div>
            <div class="xuPanelBody" style="padding:0">
                <table class="xuTable">
                    <thead>
                        <tr>
                            <th>Dokumen</th>
                            <th>Tahun</th>
                            <th>AI Risk</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($topAi)): ?>
                            <tr><td colspan="3"><div class="xuEmpty"><i class="fa fa-inbox"></i>Belum ada data.</div></td></tr>
                        <?php else: ?>
                            <?php foreach ($topAi as $d): ?>
                                <tr>
                                    <td>
                                        <div class="xuTitleCell">#<?= $d->biblio_id ?> — <?= esc(mb_strimwidth($d->title, 0, 60, '...')) ?></div>
                                        <div class="xuMini">Similarity: <?= number_format((float)$d->integrity_similarity,1) ?>%</div>
                                    </td>
                                    <td><span class="xuMini"><?= esc($d->publish_year ?: '—') ?></span></td>
                                    <td><?= xuRiskBadge($d->integrity_ai_risk, 'ai') ?></td>
                                </tr>
                            <?php endforeach ?>
                        <?php endif ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- ===== PETA PASANGAN DOKUMEN ===== -->
    <div class="xuPanel">
        <div class="xuPanelHead">
            <i class="fa fa-code-fork"></i>
            <h3>Peta Pasangan Dokumen Paling Mirip</h3>
        </div>
        <div class="xuPanelBody">
            <?php if (empty($pairs)): ?>
                <div class="xuEmpty">
                    <i class="fa fa-check-circle"></i>
                    Belum ditemukan pasangan dokumen dengan kemiripan signifikan.
                </div>
            <?php else: ?>
                <?php foreach ($pairs as $p): ?>
                    <?php
                        $cls = $p->percent < 20 ? 'ok' : ($p->percent < 50 ? 'warn' : 'bad');
                    ?>
                    <div class="xuPair">
                        <div class="xuPairTop">
                            <b>Pasangan #<?= $p->biblio_a ?> ↔ #<?= $p->biblio_b ?></b>
                            <span class="xuBadge <?= $cls ?>"><?= number_format((float)$p->percent,1) ?>% mirip</span>
                        </div>
                        <div class="xuPairText">
                            <span><b>A:</b> <?= esc(mb_strimwidth($p->title_a ?? 'Tanpa judul', 0, 110, '...')) ?></span>
                            <span><b>B:</b> <?= esc(mb_strimwidth($p->title_b ?? 'Tanpa judul', 0, 110, '...')) ?></span>
                        </div>
                        <div class="xuPairMeta">
                            <i class="fa fa-fingerprint"></i>
                            Overlap fingerprint: <?= number_format((int)$p->ngram_overlap) ?> n-gram · Dibandingkan: <?= esc($p->compared_at) ?>
                        </div>
                    </div>
                <?php endforeach ?>
            <?php endif ?>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function(){
    var trend = <?= json_encode($trend, JSON_HEX_TAG|JSON_HEX_APOS|JSON_HEX_AMP|JSON_HEX_QUOT) ?>;
    var stats = <?= json_encode($stats, JSON_HEX_TAG|JSON_HEX_APOS|JSON_HEX_AMP|JSON_HEX_QUOT) ?>;

    var labels = trend.map(function(x){ return x.day; });
    var simData = trend.map(function(x){ return parseFloat(x.avg_similarity || 0); });
    var aiData  = trend.map(function(x){ return parseFloat(x.avg_ai || 0); });
    var scanData = trend.map(function(x){ return parseInt(x.total_scan || 0); });

    // ===== Chart.js Line (Trend) =====
    if (window.Chart && document.getElementById('xuTrendChart')) {
        new Chart(document.getElementById('xuTrendChart').getContext('2d'), {
            type: 'line',
            data: {
                labels: labels.length ? labels : ['Belum ada data'],
                datasets: [
                    {
                        label: 'Avg Similarity (%)',
                        data: labels.length ? simData : [0],
                        borderColor: '#ef4444',
                        backgroundColor: 'rgba(239,68,68,.08)',
                        pointBackgroundColor: '#ef4444',
                        borderWidth: 3,
                        fill: true,
                        lineTension: .35
                    },
                    {
                        label: 'Avg AI Risk',
                        data: labels.length ? aiData : [0],
                        borderColor: '#059669',
                        backgroundColor: 'rgba(5,150,105,.08)',
                        pointBackgroundColor: '#f59e0b',
                        borderWidth: 3,
                        fill: true,
                        lineTension: .35
                    },
                    {
                        label: 'Jumlah Scan',
                        data: labels.length ? scanData : [0],
                        borderColor: '#0891b2',
                        backgroundColor: 'rgba(8,145,178,.05)',
                        pointBackgroundColor: '#0891b2',
                        borderWidth: 2,
                        fill: false,
                        lineTension: .35
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    labels: {
                        fontColor: '#334155',
                        fontStyle: 'bold',
                        usePointStyle: true,
                        padding: 16
                    }
                },
                tooltips: {
                    mode: 'index',
                    intersect: false,
                    backgroundColor: '#0a2920',
                    titleFontColor: '#6ee7b7',
                    bodyFontColor: '#fff',
                    borderColor: '#f59e0b',
                    borderWidth: 1
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            suggestedMax: 100,
                            fontColor: '#64748b'
                        },
                        gridLines: { color: 'rgba(5,150,105,.1)' }
                    }],
                    xAxes: [{
                        ticks: { fontColor: '#64748b' },
                        gridLines: { display: false }
                    }]
                }
            }
        });
    }

    // ===== Chart.js Doughnut (Risk Distribution) =====
    if (window.Chart && document.getElementById('xuRiskChart')) {
        new Chart(document.getElementById('xuRiskChart').getContext('2d'), {
            type: 'doughnut',
            data: {
                labels: ['Bersih', 'Waspada', 'Berbahaya'],
                datasets: [{
                    data: [
                        parseInt(stats.clean_docs || 0),
                        parseInt(stats.watch_docs || 0),
                        parseInt(stats.danger_docs || 0)
                    ],
                    backgroundColor: ['#059669','#f59e0b','#ef4444'],
                    borderWidth: 0,
                    hoverOffset: 10
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutoutPercentage: 68,
                legend: {
                    position: 'bottom',
                    labels: {
                        fontColor: '#334155',
                        fontStyle: 'bold',
                        padding: 18,
                        usePointStyle: true
                    }
                },
                tooltips: {
                    backgroundColor: '#0a2920',
                    titleFontColor: '#6ee7b7',
                    bodyFontColor: '#fff',
                    borderColor: '#f59e0b',
                    borderWidth: 1
                }
            }
        });
    }
});
</script>