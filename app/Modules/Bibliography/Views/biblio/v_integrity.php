<style>
/* ================================================================
   DIFOSS INTEGRITY SCANNER — EMERALD FOREST EDITION
   ================================================================ */
:root{
    --is-emerald:#059669; --is-teal:#0891b2; --is-gold:#f59e0b;
    --is-mint:#6ee7b7; --is-deep:#0a2920; --is-mid:#064e3b;
    --is-ink:#0f172a; --is-muted:#64748b; --is-soft:#94a3b8;
}

.xuIntWrap{
    padding:10px 0;
    font-family:'Plus Jakarta Sans',system-ui,sans-serif;
}

/* ===== HEADER ===== */
.xuIntHead{
    display:flex;align-items:center;gap:14px;
    margin-bottom:24px;flex-wrap:wrap;
}
.xuIntHead h2{
    margin:0;font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1.55rem;
    color:var(--is-ink);
    display:flex;align-items:center;gap:12px;
    letter-spacing:-.01em;
}
html.xu-dark .xuIntHead h2{color:#f1f5f9}

.xuIntHead h2 i{
    width:46px;height:46px;border-radius:14px;
    background:linear-gradient(135deg,var(--is-emerald),var(--is-gold));
    color:#fff;
    display:inline-flex;align-items:center;justify-content:center;
    font-size:1.2rem;
    box-shadow:0 10px 24px rgba(5,150,105,.35);
}

.xuIntSub{
    font-size:.82rem;color:var(--is-muted);
    margin-left:4px;font-weight:500;
}
html.xu-dark .xuIntSub{color:var(--is-soft)}

/* Tombol aksi header */
.xuHeadRight{
    margin-left:auto;
    display:flex;align-items:center;gap:10px;flex-wrap:wrap;
}

.xuScanBtn{
    display:inline-flex;align-items:center;gap:7px;
    padding:7px 14px;border:none;border-radius:10px;
    font-weight:700;font-size:.76rem;
    cursor:pointer;transition:.25s;
    font-family:inherit;
    position:relative;overflow:hidden;
    letter-spacing:.02em;
}
.xuScanBtn::before{
    content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;
    background:linear-gradient(100deg,transparent 20%,rgba(255,255,255,.28) 50%,transparent 80%);
    transition:left .6s ease;
}
.xuScanBtn:hover:not(:disabled)::before{left:120%}
.xuScanBtn:hover:not(:disabled){
    filter:brightness(1.08);
    transform:translateY(-1px);
}
.xuScanBtn:disabled{opacity:.55;cursor:not-allowed}

.xuScanBtn.primary{
    background:linear-gradient(90deg,var(--is-emerald),var(--is-gold));
    color:#fff;
    box-shadow:0 6px 16px rgba(5,150,105,.3);
}
.xuScanBtn.danger{
    background:linear-gradient(90deg,#ef4444,#f59e0b);
    color:#fff;
    box-shadow:0 6px 16px rgba(239,68,68,.3);
}
.xuScanBtn.info{
    background:linear-gradient(90deg,var(--is-teal),var(--is-emerald));
    color:#fff;text-decoration:none;
    box-shadow:0 6px 16px rgba(8,145,178,.3);
    padding:10px 20px;
}

/* ===== KARTU STATISTIK ===== */
.xuIntStats{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
    gap:14px;margin-bottom:24px;
}
.xuStatCard{
    background:#fff;border-radius:16px;
    padding:20px;
    border:1px solid rgba(5,150,105,.1);
    position:relative;overflow:hidden;
    transition:.35s cubic-bezier(.2,.8,.2,1);
    box-shadow:0 4px 14px rgba(15,23,42,.04);
}
.xuStatCard::before{
    content:'';position:absolute;top:0;left:0;
    width:4px;height:100%;
    background:linear-gradient(180deg,var(--acc));
    transition:width .3s ease;
}
.xuStatCard:hover{
    transform:translateY(-4px);
    box-shadow:0 18px 42px rgba(5,150,105,.15);
    border-color:rgba(5,150,105,.22);
}
.xuStatCard:hover::before{width:6px}
html.xu-dark .xuStatCard{background:#0f1e1f;border-color:rgba(5,150,105,.2);box-shadow:0 4px 14px rgba(0,0,0,.4)}
html.xu-dark .xuStatCard:hover{box-shadow:0 18px 42px rgba(5,150,105,.25);border-color:rgba(5,150,105,.35)}

.xuStatCard .lbl{
    font-size:.72rem;font-weight:800;
    text-transform:uppercase;letter-spacing:.08em;
    color:var(--is-muted);margin-bottom:8px;
}
html.xu-dark .xuStatCard .lbl{color:var(--is-soft)}

.xuStatCard .num{
    font-family:'Neuton',Georgia,serif;
    font-size:2.2rem;font-weight:700;
    color:var(--acc);
    line-height:1;letter-spacing:-.02em;
    font-variant-numeric:tabular-nums;
}

.xuStatCard .sub{
    font-size:.78rem;color:var(--is-soft);
    margin-top:6px;font-weight:500;
}

/* ===== TABEL DOKUMEN ===== */
.xuIntTable{
    width:100%;border-collapse:collapse;
    background:#fff;border-radius:16px;
    overflow:hidden;
    box-shadow:0 8px 24px rgba(15,23,42,.06);
    border:1px solid rgba(5,150,105,.1);
}
html.xu-dark .xuIntTable{background:#0f1e1f;border-color:rgba(5,150,105,.2);box-shadow:0 8px 24px rgba(0,0,0,.4)}

.xuIntTable th{
    background:linear-gradient(90deg,var(--is-deep),var(--is-mid));
    color:#fff;
    padding:13px 16px;
    font-size:.72rem;
    text-transform:uppercase;letter-spacing:.08em;
    text-align:left;font-weight:800;
    font-family:'Plus Jakarta Sans',sans-serif;
}
.xuIntTable td{
    padding:13px 16px;
    border-bottom:1px solid #f1f5f9;
    font-size:.85rem;
    color:var(--is-ink);
    vertical-align:middle;
}
html.xu-dark .xuIntTable td{border-bottom-color:rgba(5,150,105,.12);color:#e2e8f0}

.xuIntTable tbody tr{transition:.2s}
.xuIntTable tbody tr:hover{background:rgba(5,150,105,.04)}
.xuIntTable tbody tr:hover td:first-child{
    box-shadow:inset 3px 0 0 var(--is-emerald);
}
html.xu-dark .xuIntTable tbody tr:hover{background:rgba(5,150,105,.1)}
html.xu-dark .xuIntTable tbody tr:hover td:first-child{box-shadow:inset 3px 0 0 var(--is-gold)}

.xuIntTable td b{
    font-family:'JetBrains Mono',monospace;
    color:var(--is-muted);font-size:.82rem;
    padding:2px 8px;border-radius:6px;
    background:rgba(5,150,105,.06);
}
html.xu-dark .xuIntTable td b{color:var(--is-soft);background:rgba(5,150,105,.12)}

/* Score badges */
.xuScore{
    display:inline-flex;align-items:center;gap:5px;
    padding:4px 11px;border-radius:999px;
    font-weight:800;font-size:.72rem;
    font-family:'JetBrains Mono',monospace;
    letter-spacing:.02em;
}
.xuScore.ok{background:rgba(5,150,105,.12);color:var(--is-emerald);border:1px solid rgba(5,150,105,.25)}
.xuScore.warn{background:rgba(245,158,11,.15);color:#b45309;border:1px solid rgba(245,158,11,.3)}
.xuScore.bad{background:rgba(239,68,68,.15);color:#dc2626;border:1px solid rgba(239,68,68,.3)}
.xuScore.na{background:rgba(148,163,184,.1);color:var(--is-soft);border:1px solid rgba(148,163,184,.2)}
html.xu-dark .xuScore.ok{background:rgba(5,150,105,.2);color:var(--is-mint);border-color:rgba(5,150,105,.4)}
html.xu-dark .xuScore.warn{background:rgba(245,158,11,.2);color:#fde68a;border-color:rgba(245,158,11,.4)}
html.xu-dark .xuScore.bad{background:rgba(239,68,68,.2);color:#fca5a5;border-color:rgba(239,68,68,.4)}
html.xu-dark .xuScore.na{background:rgba(148,163,184,.15);border-color:rgba(148,163,184,.3)}

.xuIntTable td small{
    font-size:.76rem;color:var(--is-soft);
    display:block;margin-top:2px;
}
html.xu-dark .xuIntTable td small{color:var(--is-soft)}

/* ===== MODAL FORENSIK ===== */
.xuModal{
    display:none;position:fixed;inset:0;
    background:rgba(10,41,32,.72);
    backdrop-filter:blur(8px);-webkit-backdrop-filter:blur(8px);
    z-index:3000;
    align-items:center;justify-content:center;
    padding:16px;
}
.xuModal.open{display:flex}

.xuModalBox{
    background:#fff;border-radius:22px;
    max-width:920px;width:100%;
    max-height:92vh;overflow:auto;
    box-shadow:0 40px 100px rgba(0,0,0,.45);
    border:1px solid rgba(5,150,105,.2);
}
html.xu-dark .xuModalBox{background:#0f1e1f;border-color:rgba(5,150,105,.3)}

.xuModalHead{
    padding:26px 30px;
    background:linear-gradient(135deg,var(--is-deep),var(--is-mid));
    color:#fff;
    position:relative;overflow:hidden;
}
.xuModalHead::after{
    content:'';position:absolute;top:-50%;right:-10%;
    width:320px;height:320px;border-radius:50%;
    background:radial-gradient(circle,rgba(245,158,11,.25),transparent 70%);
    filter:blur(50px);pointer-events:none;
}
.xuModalHead::before{
    content:'';position:absolute;bottom:-50%;left:-8%;
    width:260px;height:260px;border-radius:50%;
    background:radial-gradient(circle,rgba(8,145,178,.2),transparent 70%);
    filter:blur(50px);pointer-events:none;
}

.xuModalHead h3{
    margin:0;font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1.25rem;
    position:relative;z-index:2;
    display:flex;align-items:center;gap:12px;
}
.xuModalHead h3 i{
    width:40px;height:40px;border-radius:12px;
    background:linear-gradient(135deg,var(--is-emerald),var(--is-gold));
    display:inline-flex;align-items:center;justify-content:center;
    font-size:1.05rem;
    box-shadow:0 8px 18px rgba(5,150,105,.4);
}

.xuModalHead p{
    margin:6px 0 0;opacity:.85;
    font-size:.85rem;
    position:relative;z-index:2;
    font-weight:500;
    max-width:700px;
    overflow:hidden;text-overflow:ellipsis;white-space:nowrap;
}

.xuModalBody{padding:28px}

.xuModalClose{
    position:absolute;top:18px;right:18px;
    background:rgba(255,255,255,.15);
    backdrop-filter:blur(8px);
    color:#fff;border:none;
    width:36px;height:36px;border-radius:50%;
    cursor:pointer;font-size:1.1rem;
    z-index:3;
    transition:.25s;
    display:flex;align-items:center;justify-content:center;
    border:1px solid rgba(255,255,255,.25);
}
.xuModalClose:hover{background:rgba(255,255,255,.28);transform:rotate(90deg)}

/* ===== RADAR CHART ===== */
.xuRadar{width:100%;max-width:380px;margin:0 auto}
.xuRadar svg{width:100%;height:auto}

/* ===== GAUGE ===== */
.xuGauge{position:relative;width:170px;height:170px;margin:0 auto}
.xuGauge svg{width:100%;height:100%;transform:rotate(-90deg)}
.xuGauge circle{fill:none;stroke-width:12;stroke-linecap:round}
.xuGauge .bg{stroke:#e2e8f0}
html.xu-dark .xuGauge .bg{stroke:rgba(5,150,105,.15)}
.xuGauge .fg{transition:stroke-dashoffset 1.5s cubic-bezier(.4,0,.2,1)}

.xuGaugeCenter{
    position:absolute;inset:0;
    display:flex;flex-direction:column;
    align-items:center;justify-content:center;
}
.xuGaugeCenter .val{
    font-family:'Neuton',Georgia,serif;
    font-size:2.2rem;font-weight:700;
    line-height:1;letter-spacing:-.02em;
}
.xuGaugeCenter .lbl{
    font-size:.7rem;
    color:var(--is-muted);
    text-transform:uppercase;letter-spacing:.1em;
    margin-top:6px;font-weight:700;
}
html.xu-dark .xuGaugeCenter .lbl{color:var(--is-soft)}

/* ===== GRID 2 KOLOM ===== */
.xuGrid2{
    display:grid;grid-template-columns:1fr 1fr;
    gap:22px;
}
@media(max-width:800px){.xuGrid2{grid-template-columns:1fr}}

.xuSection{
    background:#f8fafc;
    border-radius:14px;padding:20px;
    border:1px solid rgba(5,150,105,.1);
}
html.xu-dark .xuSection{background:rgba(5,150,105,.05);border-color:rgba(5,150,105,.18)}

.xuSection h4{
    margin:0 0 16px;
    font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1rem;
    color:var(--is-ink);
    display:flex;align-items:center;gap:10px;
    padding-bottom:12px;
    border-bottom:1.5px dashed rgba(5,150,105,.18);
}
html.xu-dark .xuSection h4{color:#f1f5f9;border-bottom-color:rgba(5,150,105,.3)}

.xuSection h4 i{
    width:30px;height:30px;border-radius:9px;
    background:linear-gradient(135deg,rgba(5,150,105,.12),rgba(8,145,178,.08));
    display:inline-flex;align-items:center;justify-content:center;
    font-size:.85rem;
    color:var(--is-emerald);
}
html.xu-dark .xuSection h4 i{color:var(--is-mint);background:linear-gradient(135deg,rgba(5,150,105,.2),rgba(8,145,178,.12))}

/* ===== BAR INDIKATOR ===== */
.xuBar{margin-bottom:14px}
.xuBar .hd{
    display:flex;justify-content:space-between;
    margin-bottom:6px;font-size:.78rem;
    gap:8px;
}
.xuBar .hd b{
    color:var(--is-ink);font-weight:700;
    font-size:.82rem;
}
html.xu-dark .xuBar .hd b{color:#e2e8f0}

.xuBar .hd span{
    color:var(--is-muted);font-weight:700;
    font-family:'JetBrains Mono',monospace;
    font-size:.76rem;
}
html.xu-dark .xuBar .hd span{color:var(--is-soft)}

.xuBar .track{
    height:8px;background:#e2e8f0;
    border-radius:4px;overflow:hidden;
}
html.xu-dark .xuBar .track{background:rgba(5,150,105,.12)}

.xuBar .fill{
    height:100%;border-radius:4px;
    transition:width 1.2s cubic-bezier(.4,0,.2,1);
    box-shadow:0 0 10px rgba(5,150,105,.3);
}

/* ===== MATCH CARD ===== */
.xuMatch{
    background:#fff;border-radius:11px;
    padding:13px 15px;margin-bottom:9px;
    border:1px solid rgba(5,150,105,.12);
    transition:.25s;
}
.xuMatch:hover{
    border-color:rgba(5,150,105,.28);
    transform:translateX(3px);
    box-shadow:0 6px 16px rgba(5,150,105,.1);
}
html.xu-dark .xuMatch{background:rgba(255,255,255,.03);border-color:rgba(5,150,105,.2)}
html.xu-dark .xuMatch:hover{border-color:rgba(245,158,11,.35);box-shadow:0 6px 16px rgba(5,150,105,.2)}

.xuMatch .hd{
    display:flex;justify-content:space-between;
    align-items:center;margin-bottom:5px;
    gap:8px;
}
.xuMatch .hd b{
    font-size:.85rem;color:var(--is-ink);
    font-weight:700;flex:1;min-width:0;
    overflow:hidden;text-overflow:ellipsis;
    display:-webkit-box;-webkit-line-clamp:2;
    -webkit-box-orient:vertical;
    line-height:1.35;
}
html.xu-dark .xuMatch .hd b{color:#f1f5f9}

.xuMatch .meta{
    font-size:.72rem;color:var(--is-soft);
    font-family:'JetBrains Mono',monospace;
    font-weight:600;
}

/* ===== AI MARKERS ===== */
.xuMarker{
    display:inline-block;
    padding:4px 10px;margin:3px;
    border-radius:7px;
    background:rgba(245,158,11,.1);
    color:#b45309;
    font-size:.72rem;font-weight:700;
    font-family:'JetBrains Mono',monospace;
    border:1px solid rgba(245,158,11,.25);
    transition:.2s;
}
.xuMarker:hover{
    background:linear-gradient(90deg,var(--is-gold),#d97706);
    color:#fff;border-color:transparent;
    transform:translateY(-1px);
}
html.xu-dark .xuMarker{background:rgba(245,158,11,.15);color:#fde68a;border-color:rgba(245,158,11,.35)}
html.xu-dark .xuMarker:hover{color:#fff}

/* ===== INFO BOX ===== */
.xuForensicNote{
    margin-top:20px;padding:16px 20px;
    background:linear-gradient(135deg,rgba(5,150,105,.08),rgba(245,158,11,.04));
    border:1.5px solid rgba(5,150,105,.25);
    border-radius:13px;
    font-size:.82rem;color:var(--is-ink);
    line-height:1.65;
    display:flex;align-items:flex-start;gap:12px;
}
html.xu-dark .xuForensicNote{background:linear-gradient(135deg,rgba(5,150,105,.14),rgba(245,158,11,.08));border-color:rgba(5,150,105,.35);color:#e2e8f0}

.xuForensicNote i{
    color:var(--is-emerald);font-size:1.1rem;
    width:32px;height:32px;border-radius:9px;
    background:rgba(5,150,105,.12);
    display:inline-flex;align-items:center;justify-content:center;
    flex-shrink:0;margin-top:1px;
}
html.xu-dark .xuForensicNote i{color:var(--is-mint);background:rgba(5,150,105,.2)}

.xuForensicNote b{color:var(--is-emerald)}
html.xu-dark .xuForensicNote b{color:var(--is-mint)}

/* ===== EMPTY STATES ===== */
.xuEmptyMarkers,.xuEmptyMatches{
    text-align:center;color:var(--is-soft);
    padding:20px;font-size:.85rem;
    display:flex;flex-direction:column;align-items:center;gap:8px;
}
.xuEmptyMarkers i,.xuEmptyMatches i{
    font-size:1.8rem;color:var(--is-emerald);
}
html.xu-dark .xuEmptyMarkers i,html.xu-dark .xuEmptyMatches i{color:var(--is-mint)}

/* ===== SCAN PROGRESS ===== */
#xuScanProg{
    font-size:.82rem;font-weight:700;
    color:var(--is-emerald);
    padding:5px 12px;
    background:rgba(5,150,105,.08);
    border-radius:999px;
    border:1px solid rgba(5,150,105,.2);
    display:none;
    font-family:'JetBrains Mono',monospace;
}
#xuScanProg.show{display:inline-flex;align-items:center;gap:6px}
html.xu-dark #xuScanProg{background:rgba(5,150,105,.15);color:var(--is-mint);border-color:rgba(5,150,105,.35)}

@keyframes xuSpin{to{transform:rotate(360deg)}}
.xuSpinner{
    display:inline-block;width:12px;height:12px;
    border:2.5px solid rgba(5,150,105,.25);
    border-top-color:var(--is-emerald);
    border-radius:50%;
    animation:xuSpin 1s linear infinite;
}

/* ===== RESPONSIVE ===== */
@media(max-width:720px){
    .xuIntHead h2{font-size:1.25rem}
    .xuIntHead h2 i{width:40px;height:40px;font-size:1.05rem}
    .xuIntSub{width:100%;margin-left:58px}
    .xuHeadRight{width:100%}
    .xuScanBtn.info,.xuScanBtn.danger{flex:1;justify-content:center}
    .xuIntTable{font-size:.8rem}
    .xuIntTable th,.xuIntTable td{padding:10px 10px}
    .xuModalBody{padding:20px 16px}
    .xuSection{padding:16px}
    .xuGauge{width:140px;height:140px}
    .xuGaugeCenter .val{font-size:1.7rem}
}
</style>

<div class="xuIntWrap">
    <div class="xuIntHead">
        <h2><i class="fa fa-shield"></i> DIFOSS Integrity Scanner</h2>
        <span class="xuIntSub">Forensic Text Intelligence · 100% Lokal · Zero API</span>
        <div class="xuHeadRight">
            <a href="<?= base_url('bibliography/integrity-dashboard') ?>" class="xuScanBtn info">
                <i class="fa fa-area-chart"></i> Dasbor Forensik
            </a>
            <span id="xuScanProg"></span>
            <button type="button" id="xuScanAll" class="xuScanBtn danger">
                <i class="fa fa-bolt"></i> Scan Massal Seluruh Koleksi
            </button>
        </div>
    </div>

    <!-- ===== KARTU STATISTIK ===== -->
    <div class="xuIntStats">
        <div class="xuStatCard" style="--acc:var(--is-emerald)">
            <div class="lbl">Total Ter-scan</div>
            <div class="num"><?= $stats['total_scanned'] ?></div>
            <div class="sub">fingerprint terdaftar</div>
        </div>
        <div class="xuStatCard" style="--acc:var(--is-gold)">
            <div class="lbl">Flag Kemiripan &gt;70%</div>
            <div class="num"><?= $stats['flagged_similar'] ?></div>
            <div class="sub">perlu review manual</div>
        </div>
        <div class="xuStatCard" style="--acc:#ef4444">
            <div class="lbl">Risiko AI &gt;65</div>
            <div class="num"><?= $stats['flagged_ai'] ?></div>
            <div class="sub">stylometry anomaly</div>
        </div>
    </div>

    <!-- ===== TABEL DOKUMEN ===== -->
    <table class="xuIntTable">
        <thead>
            <tr>
                <th style="width:60px">ID</th>
                <th>Judul</th>
                <th style="width:110px">Similarity</th>
                <th style="width:110px">AI Risk</th>
                <th style="width:160px">Scan Terakhir</th>
                <th style="width:170px">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($docs as $d):
                $sim = $d->integrity_similarity;
                $ai = $d->integrity_ai_risk;
                $simCls = $sim === null ? 'na' : ($sim < 20 ? 'ok' : ($sim < 50 ? 'warn' : 'bad'));
                $aiCls  = $ai === null ? 'na' : ($ai < 30 ? 'ok' : ($ai < 65 ? 'warn' : 'bad'));
            ?>
            <tr>
                <td><b>#<?= $d->biblio_id ?></b></td>
                <td><?= esc(mb_strimwidth($d->title, 0, 80, '...')) ?></td>
                <td><span class="xuScore <?= $simCls ?>"><?= $sim === null ? '—' : number_format($sim, 1) . '%' ?></span></td>
                <td><span class="xuScore <?= $aiCls ?>"><?= $ai === null ? '—' : number_format($ai, 1) ?></span></td>
                <td>
                    <small><?= $d->integrity_last_scan ?: 'Belum discan' ?></small>
                </td>
                <td>
                    <button class="xuScanBtn primary" onclick="xuScan(<?= $d->biblio_id ?>, this)" data-bib="<?= $d->biblio_id ?>">
                        <i class="fa fa-search"></i> Scan
                    </button>
                    <button class="xuScanBtn info" style="padding:7px 12px;margin-left:4px" onclick="xuDetail(<?= $d->biblio_id ?>)">
                        <i class="fa fa-microscope"></i> Detail
                    </button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- ===== MODAL FORENSIK ===== -->
<div id="xuForensicModal" class="xuModal">
    <div class="xuModalBox">
        <div class="xuModalHead">
            <button class="xuModalClose" onclick="xuCloseModal()">✕</button>
            <h3><i class="fa fa-microscope"></i> Laporan Forensik Dokumen</h3>
            <p id="xuModalTitle">—</p>
        </div>
        <div class="xuModalBody" id="xuModalBody">
            <div style="text-align:center;padding:40px;color:var(--is-soft)">
                <div class="xuSpinner" style="width:24px;height:24px;margin:0 auto 10px;border-width:3px"></div>
                Memuat laporan forensik...
            </div>
        </div>
    </div>
</div>

<script>
function xuCloseModal(){ document.getElementById('xuForensicModal').classList.remove('open'); }

function colorByScore(s){
    return s < 20 ? '#059669' : (s < 50 ? '#f59e0b' : '#ef4444');
}

function xuScan(bib, btn){
    if (btn.disabled) return;
    btn.disabled = true;
    var orig = btn.innerHTML;
    btn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Memindai...';
    $.post(baseUrl + 'bibliography/integrity-scan', { biblio_id: bib }, function(j){
        btn.disabled = false;
        btn.innerHTML = orig;
        if (!j.ok) { alert('❌ ' + j.error); return; }
        xuShowReport(bib, j);
    }).fail(function(){
        btn.disabled = false;
        btn.innerHTML = orig;
        alert('Gagal terhubung ke server.');
    });
}

function xuDetail(bib){
    $.get(baseUrl + 'bibliography/integrity-detail', { biblio_id: bib }, function(j){
        if (!j.ok) { alert('Belum ada riwayat scan untuk dokumen ini.'); return; }
        xuShowReport(bib, {
            similarity: j.scan.similarity_score,
            ai_risk: j.scan.ai_risk_score,
            ai_scores: j.indicators.ai_scores,
            profile: j.indicators.profile,
            matches: j.indicators.matches,
            ai_markers: j.indicators.profile.ai_markers.hits
        }, j.doc.title);
    }).fail(function(){ alert('Gagal memuat detail forensik.'); });
}

function xuShowReport(bib, data, title){
    document.getElementById('xuForensicModal').classList.add('open');
    document.getElementById('xuModalTitle').textContent = (title || 'Dokumen #' + bib) + (data.source ? '  ·  📄 Sumber: ' + data.source : '');
    var p = data.profile || {};
    var sim = data.similarity || 0;
    var ai = data.ai_risk || 0;
    var aiScores = data.ai_scores || {};

    // ===== Gauge SVG =====
    function gauge(val, max, color, label){
        var pct = Math.min(100, Math.max(0, (val/max)*100));
        var dash = 2*Math.PI*60;
        var offset = dash - (pct/100)*dash;
        return '<div class="xuGauge">'
            + '<svg viewBox="0 0 140 140"><circle class="bg" cx="70" cy="70" r="60"/>'
            + '<circle class="fg" cx="70" cy="70" r="60" stroke="' + color + '" stroke-dasharray="' + dash + '" stroke-dashoffset="' + offset + '"/></svg>'
            + '<div class="xuGaugeCenter"><div class="val" style="color:' + color + '">' + (typeof val==='number' ? val.toFixed(1) : val) + (max===100?'%':'') + '</div>'
            + '<div class="lbl">' + label + '</div></div></div>';
    }

    // ===== Radar SVG =====
    var radarLabels = ['Burstiness','TTR','Entropy','AI Marker','Uniformity'];
    var radarVals = [
        Math.min(100, Math.max(0, aiScores.burstiness || 0)),
        Math.min(100, Math.max(0, aiScores.ttr || 0)),
        Math.min(100, Math.max(0, aiScores.entropy || 0)),
        Math.min(100, Math.max(0, aiScores.ai_markers || 0)),
        Math.min(100, Math.max(0, aiScores.uniformity || 0))
    ];
    var cx=150, cy=150, r=110;
    function pt(i, v){
        var ang = (Math.PI*2*i/5) - Math.PI/2;
        var rr = r*(v/100);
        return [cx + rr*Math.cos(ang), cy + rr*Math.sin(ang)];
    }
    var polyPts = radarVals.map(function(v,i){ return pt(i,v).join(','); }).join(' ');
    var radarColor = ai > 65 ? '#ef4444' : (ai > 30 ? '#f59e0b' : '#059669');
    var radarFill = ai > 65 ? 'rgba(239,68,68,.18)' : (ai > 30 ? 'rgba(245,158,11,.18)' : 'rgba(5,150,105,.18)');

    var radar = '<div class="xuRadar"><svg viewBox="0 0 300 300">';
    for (var g=1; g<=5; g++){
        var gp = [];
        for (var i=0;i<5;i++) gp.push(pt(i, g*20).join(','));
        radar += '<polygon points="' + gp.join(' ') + '" fill="none" stroke="rgba(5,150,105,.18)" stroke-width="1"/>';
    }
    for (var i=0;i<5;i++){
        var e = pt(i,100);
        radar += '<line x1="' + cx + '" y1="' + cy + '" x2="' + e[0] + '" y2="' + e[1] + '" stroke="rgba(5,150,105,.18)"/>';
        var lp = pt(i,128);
        radar += '<text x="' + lp[0] + '" y="' + lp[1] + '" text-anchor="middle" font-size="11" fill="#64748b" font-weight="700">' + radarLabels[i] + '</text>';
    }
    radar += '<polygon points="' + polyPts + '" fill="' + radarFill + '" stroke="' + radarColor + '" stroke-width="2.5"/>';
    for (var i=0;i<5;i++){
        var pp = pt(i, radarVals[i]);
        radar += '<circle cx="' + pp[0] + '" cy="' + pp[1] + '" r="4" fill="' + radarColor + '"/>';
    }
    radar += '</svg></div>';

    // ===== AI Markers HTML =====
    var markersHtml = '';
    if (data.ai_markers && Object.keys(data.ai_markers).length > 0) {
        for (var m in data.ai_markers) markersHtml += '<span class="xuMarker">' + m + ' ×' + data.ai_markers[m] + '</span>';
    } else {
        markersHtml = '<div class="xuEmptyMarkers"><i class="fa fa-check-circle"></i> Tidak ditemukan frasa khas AI.</div>';
    }

    // ===== Matches HTML =====
    var matchesHtml = '';
    if (data.matches && data.matches.length > 0) {
        data.matches.forEach(function(m){
            matchesHtml += '<div class="xuMatch"><div class="hd"><b>' + m.title + '</b><span class="xuScore ' + (m.score<20?'ok':(m.score<50?'warn':'bad')) + '">' + m.score.toFixed(1) + '%</span></div><div class="meta">ID #' + m.biblio_id + '</div></div>';
        });
    } else {
        matchesHtml = '<div class="xuEmptyMatches"><i class="fa fa-check-circle"></i> Tidak ada kemiripan signifikan dengan koleksi lain.</div>';
    }

    var html = '<div class="xuGrid2">'
        + '<div class="xuSection"><h4><i class="fa fa-fingerprint" style="color:#ef4444"></i> Skor Plagiarisme</h4>' + gauge(sim, 100, colorByScore(sim), 'Similarity') + '</div>'
        + '<div class="xuSection"><h4><i class="fa fa-robot" style="color:var(--is-emerald)"></i> Skor Risiko AI</h4>' + gauge(ai, 100, colorByScore(ai), 'AI Risk') + '</div>'
        + '</div>'

        + '<div class="xuGrid2" style="margin-top:18px">'
        + '<div class="xuSection"><h4><i class="fa fa-radar" style="color:' + radarColor + '"></i> Radar Stylometri (AI Signature)</h4>' + radar + '</div>'
        + '<div class="xuSection"><h4><i class="fa fa-bar-chart"></i> Indikator Detail</h4>'
        + '<div class="xuBar"><div class="hd"><b>Word Count</b><span>' + (p.word_count||0) + ' kata (' + (p.unique_words||0) + ' unik)</span></div></div>'
        + '<div class="xuBar"><div class="hd"><b>Type-Token Ratio</b><span>' + (p.ttr||0).toFixed(3) + '</span></div><div class="track"><div class="fill" style="width:' + (p.ttr*100) + '%;background:linear-gradient(90deg,#059669,#0891b2)"></div></div></div>'
        + '<div class="xuBar"><div class="hd"><b>Shannon Entropy</b><span>' + (p.entropy||0).toFixed(3) + '</span></div><div class="track"><div class="fill" style="width:' + Math.min(100, (p.entropy||0)*15) + '%;background:linear-gradient(90deg,#f59e0b,#d97706)"></div></div></div>'
        + '<div class="xuBar"><div class="hd"><b>Burstiness</b><span>' + (p.burstiness||0).toFixed(2) + '</span></div><div class="track"><div class="fill" style="width:' + Math.min(100, (p.burstiness||0)*5) + '%;background:linear-gradient(90deg,#0891b2,#6ee7b7)"></div></div></div>'
        + '<div class="xuBar"><div class="hd"><b>Lexical Density</b><span>' + (p.lexical_density||0).toFixed(3) + '</span></div><div class="track"><div class="fill" style="width:' + ((p.lexical_density||0)*100) + '%;background:linear-gradient(90deg,#10b981,#6ee7b7)"></div></div></div>'
        + '<div class="xuBar"><div class="hd"><b>AI Markers Terdeteksi</b><span>' + (p.ai_markers_total||0) + ' frasa</span></div></div>'
        + '</div></div>'

        + '<div class="xuGrid2" style="margin-top:18px">'
        + '<div class="xuSection"><h4><i class="fa fa-code-fork" style="color:#f59e0b"></i> Frasa Khas AI Terdeteksi</h4>' + markersHtml + '</div>'
        + '<div class="xuSection"><h4><i class="fa fa-link" style="color:var(--is-emerald)"></i> Dokumen Paling Mirip</h4>' + matchesHtml + '</div>'
        + '</div>'

        + '<div class="xuForensicNote">'
        + '<i class="fa fa-info-circle"></i>'
        + '<div><b>Catatan Forensik:</b> Skor ini dihasilkan dari <b>stylometri murni lokal</b> (analisis pola statistik teks) tanpa API eksternal. Gunakan sebagai <b>screening awal</b> — keputusan final tetap membutuhkan penilaian manual oleh reviewer.</div>'
        + '</div>';

    document.getElementById('xuModalBody').innerHTML = html;

    // Trigger bar animations
    setTimeout(function(){
        document.querySelectorAll('.xuBar .fill').forEach(function(el){
            var w = el.style.width;
            el.style.width = '0%';
            setTimeout(function(){ el.style.width = w; }, 50);
        });
    }, 100);
}

// ===== Scan Massal =====
document.getElementById('xuScanAll').addEventListener('click', function(){
    if (!confirm('⚡ Scan massal akan menganalisis SELURUH koleksi (isi PDF penuh bila tersedia). Lanjutkan?')) return;
    var btn = this; btn.disabled = true;
    var prog = document.getElementById('xuScanProg');
    prog.classList.add('show');
    var offset = 0, processed = 0;
    function step(){
        fetch(baseUrl + 'bibliography/integrity-scan-all', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest' },
            body: 'offset=' + offset
        }).then(function(r){ return r.json(); }).then(function(j){
            if (!j.ok) { alert('❌ ' + (j.error || 'Gagal.')); btn.disabled = false; prog.classList.remove('show'); return; }
            processed += j.done; offset = j.offset;
            prog.innerHTML = '<div class="xuSpinner"></div> Memindai ' + processed + ' / ' + j.total + '...';
            if (j.finished) {
                prog.innerHTML = '<i class="fa fa-check-circle" style="color:var(--is-emerald)"></i> ✅ Selesai: ' + processed + ' dokumen dianalisis.';
                btn.disabled = false;
                setTimeout(function(){ location.reload(); }, 1800);
            } else { step(); }
        }).catch(function(){
            alert('Gagal terhubung ke server.');
            btn.disabled = false;
            prog.classList.remove('show');
        });
    }
    step();
});

// ===== Close modal on outside click =====
document.getElementById('xuForensicModal').addEventListener('click', function(e){
    if (e.target === this) xuCloseModal();
});

// ===== Close on ESC =====
document.addEventListener('keydown', function(e){
    if (e.key === 'Escape'){
        var m = document.getElementById('xuForensicModal');
        if (m && m.classList.contains('open')) xuCloseModal();
    }
});
</script>