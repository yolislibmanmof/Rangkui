<?php
$s = $scan;
$issues = [
    ['key'=>'no_abstract','label'=>'Judul Tanpa Abstrak','icon'=>'fa-file-text-o','color'=>'#f59e0b','desc'=>'Dokumen tercantum tapi tidak punya abstrak — akan diisi placeholder','fix'=>'scanner-fix-abstract','fixLabel'=>'Isi Placeholder'],
    ['key'=>'broken_files','label'=>'Lampiran Rusak','icon'=>'fa-unlink','color'=>'#ef4444','desc'=>'Relasi ke file yang sudah hilang dari database','fix'=>'scanner-fix-files','fixLabel'=>'Bersihkan Relasi'],
    ['key'=>'no_year','label'=>'Tahun Kosong','icon'=>'fa-calendar-times-o','color'=>'#059669','desc'=>'Dokumen tanpa tahun terbit — akan diisi dari tanggal input','fix'=>'scanner-fix-year','fixLabel'=>'Isi dari Tanggal Input'],
    ['key'=>'no_author','label'=>'Tanpa Penulis','icon'=>'fa-user-times','color'=>'#dc2626','desc'=>'Dokumen tanpa relasi penulis — disembunyikan dari publik','fix'=>'scanner-hide-no-author','fixLabel'=>'Sembunyikan dari Publik'],
    ['key'=>'no_topic','label'=>'Tanpa Subyek','icon'=>'fa-tags','color'=>'#0891b2','desc'=>'Dokumen belum diindeks subyek — perlu pengisian manual','fix'=>null,'fixLabel'=>null],
];
$total = 0; foreach ($issues as $i) $total += (int)$s[$i['key']];
$total += count($s['duplicates']);
$clean = $total === 0;
?>
<style>
/* ================================================================
   DIFOSS SCANNER KEBERSIHAN DATA — EMERALD FOREST EDITION
   ================================================================ */
:root{
    --xs-emerald:#059669; --xs-teal:#0891b2; --xs-gold:#f59e0b;
    --xs-mint:#6ee7b7; --xs-deep:#0a2920; --xs-mid:#064e3b;
    --xs-ink:#0f172a; --xs-muted:#64748b; --xs-soft:#94a3b8;
}

.xuScanWrap{padding:10px 0}

/* ===== HEADER ===== */
.xuScanHead{
    display:flex;align-items:center;gap:14px;
    flex-wrap:wrap;margin-bottom:24px;
}
.xuScanHead h2{
    margin:0;font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1.6rem;
    color:var(--xs-ink);
    display:flex;align-items:center;gap:12px;
    letter-spacing:-.01em;
}
html.xu-dark .xuScanHead h2{color:#f1f5f9}

.xuScanHead h2 i{
    width:44px;height:44px;border-radius:14px;
    background:linear-gradient(135deg,var(--xs-emerald),var(--xs-gold));
    color:#fff;
    display:inline-flex;align-items:center;justify-content:center;
    font-size:1.2rem;
    box-shadow:0 8px 20px rgba(5,150,105,.35);
}
.xuScanHead .sub{color:var(--xs-muted);font-size:.88rem;font-weight:600}
html.xu-dark .xuScanHead .sub{color:var(--xs-soft)}

/* ===== Tombol Pindai Ulang ===== */
.xuScanBtnScan{
    display:inline-flex;align-items:center;gap:9px;
    padding:12px 24px;
    background:linear-gradient(90deg,var(--xs-emerald),var(--xs-gold));
    color:#fff;border:none;border-radius:12px;
    font-weight:800;font-size:.9rem;
    cursor:pointer;transition:.25s;
    box-shadow:0 8px 22px rgba(5,150,105,.35);
    text-decoration:none;
    position:relative;overflow:hidden;
    margin-left:auto;
}
.xuScanBtnScan::before{
    content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;
    background:linear-gradient(100deg,transparent 20%,rgba(255,255,255,.28) 50%,transparent 80%);
    transition:left .6s ease;
}
.xuScanBtnScan:hover{
    filter:brightness(1.08);
    transform:translateY(-2px);
    box-shadow:0 12px 28px rgba(5,150,105,.45);
    color:#fff;
}
.xuScanBtnScan:hover::before{left:120%}

/* ===== HERO STATUS ===== */
.xuScanHero{
    padding:28px;border-radius:22px;
    margin-bottom:24px;
    display:flex;align-items:center;gap:22px;
    flex-wrap:wrap;
    position:relative;overflow:hidden;
}
.xuScanHero.clean{
    background:linear-gradient(135deg,rgba(5,150,105,.12),rgba(110,231,183,.08));
    border:1.5px solid rgba(5,150,105,.35);
}
.xuScanHero.dirty{
    background:linear-gradient(135deg,rgba(239,68,68,.08),rgba(245,158,11,.08));
    border:1.5px solid rgba(239,68,68,.35);
}
html.xu-dark .xuScanHero.clean{background:linear-gradient(135deg,rgba(5,150,105,.18),rgba(110,231,183,.1));border-color:rgba(5,150,105,.4)}
html.xu-dark .xuScanHero.dirty{background:linear-gradient(135deg,rgba(239,68,68,.14),rgba(245,158,11,.1));border-color:rgba(239,68,68,.4)}

.xuScanHero .big-ico{
    width:64px;height:64px;border-radius:18px;
    display:inline-flex;align-items:center;justify-content:center;
    font-size:1.9rem;color:#fff;flex-shrink:0;
    box-shadow:0 12px 28px rgba(0,0,0,.2);
}
.xuScanHero.clean .big-ico{background:linear-gradient(135deg,var(--xs-emerald),var(--xs-mint))}
.xuScanHero.dirty .big-ico{background:linear-gradient(135deg,#ef4444,#f59e0b)}

.xuScanHero h3{
    margin:0;font-family:'Neuton',Georgia,serif;
    font-size:1.35rem;font-weight:700;
    color:var(--xs-ink);letter-spacing:-.01em;
}
html.xu-dark .xuScanHero h3{color:#f1f5f9}
.xuScanHero p{margin:4px 0 0;color:var(--xs-muted);font-size:.88rem;line-height:1.55}
html.xu-dark .xuScanHero p{color:var(--xs-soft)}

.xuScanHero .big-num{
    margin-left:auto;
    font-family:'Neuton',Georgia,serif;
    font-size:3.2rem;font-weight:700;line-height:1;
    letter-spacing:-.02em;
}
.xuScanHero.clean .big-num{
    background:linear-gradient(135deg,var(--xs-emerald),var(--xs-gold));
    -webkit-background-clip:text;background-clip:text;
    -webkit-text-fill-color:transparent;
}
.xuScanHero.dirty .big-num{color:#dc2626}

/* ===== GRID KARTU MASALAH ===== */
.xuScanGrid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(280px,1fr));
    gap:16px;margin-bottom:24px;
}

.xuScanCard{
    background:#fff;border-radius:18px;
    padding:22px;
    border:1px solid rgba(5,150,105,.1);
    box-shadow:0 8px 24px rgba(15,23,42,.06);
    transition:.35s cubic-bezier(.2,.8,.2,1);
    display:flex;flex-direction:column;
    position:relative;overflow:hidden;
}
html.xu-dark .xuScanCard{background:#0f1e1f;border-color:rgba(5,150,105,.2);box-shadow:0 8px 24px rgba(0,0,0,.4)}

.xuScanCard::before{
    content:'';position:absolute;top:0;left:0;right:0;height:3px;
    transition:height .3s ease;
}
.xuScanCard:hover{
    box-shadow:0 18px 42px rgba(5,150,105,.18);
    transform:translateY(-4px);
    border-color:rgba(5,150,105,.3);
}
.xuScanCard:hover::before{height:5px}
html.xu-dark .xuScanCard:hover{box-shadow:0 18px 42px rgba(5,150,105,.25);border-color:rgba(245,158,11,.4)}

.xuScanCard .head{
    display:flex;align-items:center;gap:10px;
    margin-bottom:14px;
}
.xuScanCard .head i{
    font-size:1.4rem;
    width:38px;height:38px;border-radius:10px;
    background:rgba(5,150,105,.08);
    display:inline-flex;align-items:center;justify-content:center;
}
html.xu-dark .xuScanCard .head i{background:rgba(5,150,105,.15)}

.xuScanCard .head h4{
    margin:0;font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1rem;
    color:var(--xs-ink);flex:1;
}
html.xu-dark .xuScanCard .head h4{color:#f1f5f9}

.xuScanCard .num{
    font-family:'Neuton',Georgia,serif;
    font-size:2.3rem;font-weight:700;
    line-height:1;margin-bottom:8px;
    letter-spacing:-.02em;
}

.xuScanCard .desc{
    font-size:.82rem;color:var(--xs-muted);
    line-height:1.55;flex:1;margin-bottom:14px;
}
html.xu-dark .xuScanCard .desc{color:var(--xs-soft)}

.xuScanCard .fix{
    display:inline-flex;align-items:center;justify-content:center;gap:7px;
    padding:10px 16px;border-radius:11px;
    background:linear-gradient(90deg,var(--xs-emerald),var(--xs-gold));
    color:#fff;font-weight:700;font-size:.82rem;
    border:none;cursor:pointer;transition:.25s;
    text-decoration:none;width:100%;
    position:relative;overflow:hidden;
}
.xuScanCard .fix::before{
    content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;
    background:linear-gradient(100deg,transparent 20%,rgba(255,255,255,.28) 50%,transparent 80%);
    transition:left .6s ease;
}
.xuScanCard .fix:hover:not(:disabled){
    filter:brightness(1.1);
    transform:translateY(-2px);
    box-shadow:0 8px 20px rgba(5,150,105,.35);
}
.xuScanCard .fix:hover:not(:disabled)::before{left:120%}
.xuScanCard .fix:disabled{opacity:.45;cursor:not-allowed}

.xuScanCard .fix.manual{
    background:rgba(5,150,105,.08);
    color:var(--xs-muted);
    cursor:default;
    border:1.5px dashed rgba(5,150,105,.25);
}
html.xu-dark .xuScanCard .fix.manual{background:rgba(5,150,105,.12);color:var(--xs-soft);border-color:rgba(5,150,105,.3)}

/* ===== DUPLIKAT ===== */
.xuScanDupes{
    background:#fff;border-radius:18px;
    padding:24px;
    border:1px solid rgba(239,68,68,.15);
    box-shadow:0 8px 24px rgba(15,23,42,.06);
    margin-bottom:20px;
    position:relative;overflow:hidden;
}
.xuScanDupes::before{
    content:'';position:absolute;top:0;left:0;right:0;height:3px;
    background:linear-gradient(90deg,#ef4444,#f59e0b,#ef4444);
    background-size:200% 100%;
    animation:xuScanDangerLine 3s linear infinite;
}
@keyframes xuScanDangerLine{to{background-position:200% 0}}
html.xu-dark .xuScanDupes{background:#0f1e1f;border-color:rgba(239,68,68,.25);box-shadow:0 8px 24px rgba(0,0,0,.4)}

.xuScanDupes h3{
    margin:0 0 10px;
    font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1.15rem;
    color:var(--xs-ink);
    display:flex;align-items:center;gap:9px;
}
html.xu-dark .xuScanDupes h3{color:#f1f5f9}
.xuScanDupes h3 i{
    width:34px;height:34px;border-radius:10px;
    background:linear-gradient(135deg,#ef4444,#f59e0b);
    color:#fff;
    display:inline-flex;align-items:center;justify-content:center;
    font-size:.9rem;
    box-shadow:0 6px 14px rgba(239,68,68,.35);
}

.xuScanDupes > p{
    color:var(--xs-muted);font-size:.83rem;
    margin:0 0 16px;line-height:1.55;
}
html.xu-dark .xuScanDupes > p{color:var(--xs-soft)}

.xuDupeRow{
    display:flex;flex-direction:column;gap:7px;
    padding:14px 16px;border-radius:12px;
    background:rgba(239,68,68,.04);
    border-left:3px solid #ef4444;
    margin-bottom:10px;
    transition:.2s;
}
.xuDupeRow:hover{background:rgba(239,68,68,.08);transform:translateX(3px)}
html.xu-dark .xuDupeRow{background:rgba(239,68,68,.08);border-left-color:#f59e0b}
html.xu-dark .xuDupeRow:hover{background:rgba(239,68,68,.14)}

.xuDupeRow .score{
    display:inline-block;
    padding:3px 10px;
    background:#dc2626;color:#fff;
    border-radius:8px;
    font-weight:800;font-size:.7rem;
    letter-spacing:.04em;
    margin-bottom:4px;width:fit-content;
    box-shadow:0 4px 10px rgba(220,38,38,.3);
}

.xuDupeRow .title{
    font-size:.85rem;font-weight:600;
    color:#334155;line-height:1.45;
}
html.xu-dark .xuDupeRow .title{color:#e2e8f0}
.xuDupeRow .title small{
    color:var(--xs-muted);font-weight:700;
    font-size:.72rem;letter-spacing:.04em;
    font-family:'JetBrains Mono',monospace;
}
html.xu-dark .xuDupeRow .title small{color:var(--xs-soft)}

.xuDupeRow .actions{
    display:flex;gap:10px;margin-top:6px;
    flex-wrap:wrap;
}
.xuDupeLink{
    display:inline-flex;align-items:center;gap:5px;
    padding:5px 12px;border-radius:8px;
    background:rgba(5,150,105,.08);
    color:var(--xs-emerald)!important;
    font-size:.73rem;font-weight:700;
    text-decoration:none;
    transition:.2s;
    border:1px solid rgba(5,150,105,.18);
}
.xuDupeLink:hover{
    background:linear-gradient(90deg,var(--xs-emerald),var(--xs-gold));
    color:#fff!important;
    transform:translateY(-1px);
    box-shadow:0 4px 12px rgba(5,150,105,.25);
    border-color:transparent;
}
html.xu-dark .xuDupeLink{background:rgba(5,150,105,.15);color:var(--xs-mint)!important;border-color:rgba(5,150,105,.3)}
html.xu-dark .xuDupeLink:hover{color:#fff!important}

/* ===== Responsive ===== */
@media(max-width:640px){
    .xuScanHero{padding:22px;gap:14px}
    .xuScanHero .big-num{font-size:2.4rem;margin-left:0;width:100%;text-align:right}
    .xuScanHead h2{font-size:1.3rem}
    .xuScanHead h2 i{width:38px;height:38px;font-size:1.05rem}
    .xuScanBtnScan{padding:10px 18px;font-size:.82rem}
}
</style>

<div class="xuScanWrap">
    <div class="xuScanHead">
        <h2><i class="fa fa-stethoscope"></i> Scanner Kebersihan Data</h2>
        <span class="sub">— diagnosis &amp; perbaikan otomatis kualitas repositori</span>
        <a href="<?= base_url('bibliography/scanner') ?>" class="xuScanBtnScan"><i class="fa fa-refresh"></i> Pindai Ulang</a>
    </div>

    <!-- Hero status -->
    <?php if ($clean): ?>
        <div class="xuScanHero clean">
            <div class="big-ico"><i class="fa fa-check-circle"></i></div>
            <div>
                <h3>Repositori Anda Bersih Sempurna!</h3>
                <p>Tidak ada masalah ditemukan — semua dokumen lengkap dan konsisten.</p>
            </div>
            <div class="big-num">0</div>
        </div>
    <?php else: ?>
        <div class="xuScanHero dirty">
            <div class="big-ico"><i class="fa fa-exclamation-triangle"></i></div>
            <div>
                <h3>Ditemukan <?= $total ?> Masalah</h3>
                <p>Klik tombol perbaikan di bawah setiap kartu untuk menyelesaikan sekaligus.</p>
            </div>
            <div class="big-num"><?= $total ?></div>
        </div>
    <?php endif; ?>

    <!-- Grid kartu masalah -->
    <div class="xuScanGrid">
        <?php foreach ($issues as $i): $cnt = (int)$s[$i['key']]; ?>
            <div class="xuScanCard" style="border-left:4px solid <?= $i['color'] ?>; --card-c:<?= $i['color'] ?>;">
                <style>.xuScanCard[style*="--card-c:<?= $i['color'] ?>"]::before{background:linear-gradient(90deg,<?= $i['color'] ?>,transparent)}</style>
                <div class="head">
                    <i class="fa <?= $i['icon'] ?>" style="color:<?= $i['color'] ?>"></i>
                    <h4><?= $i['label'] ?></h4>
                </div>
                <div class="num" style="color:<?= $i['color'] ?>"><?= $cnt ?></div>
                <div class="desc"><?= $i['desc'] ?></div>
                <?php if ($i['fix']): ?>
                    <button type="button" class="fix" data-endpoint="<?= $i['fix'] ?>" <?= $cnt === 0 ? 'disabled' : '' ?>>
                        <i class="fa fa-wrench"></i> <?= $i['fixLabel'] ?>
                    </button>
                <?php else: ?>
                    <div class="fix manual"><i class="fa fa-hand-paper-o"></i> Perlu Pengisian Manual</div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Duplikat lolos -->
    <?php if (!empty($s['duplicates'])): ?>
        <div class="xuScanDupes">
            <h3><i class="fa fa-clone"></i> Duplikat Lolos (<?= count($s['duplicates']) ?> pasang terdeteksi, skor ≥70%)</h3>
            <p>Pasangan dokumen dengan judul sangat mirip — perlu verifikasi manual untuk menentukan mana yang harus dihapus atau digabung.</p>
            <?php foreach ($s['duplicates'] as $d): ?>
                <div class="xuDupeRow">
                    <span class="score"><?= $d['score'] ?>% mirip</span>
                    <div class="title"><small>[#<?= $d['a'] ?>]</small> <?= esc($d['ta']) ?></div>
                    <div class="title"><small>[#<?= $d['b'] ?>]</small> <?= esc($d['tb']) ?></div>
                    <div class="actions">
                        <a href="<?= base_url('bibliography/edit?bbi=' . slim_encrypt($d['a'])) ?>" target="_blank" class="xuDupeLink">
                            <i class="fa fa-pencil"></i> Edit Dokumen A <i class="fa fa-external-link"></i>
                        </a>
                        <a href="<?= base_url('bibliography/edit?bbi=' . slim_encrypt($d['b'])) ?>" target="_blank" class="xuDupeLink">
                            <i class="fa fa-pencil"></i> Edit Dokumen B <i class="fa fa-external-link"></i>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<script>
document.addEventListener('DOMContentLoaded', function(){
    document.querySelectorAll('.xuScanCard .fix[data-endpoint]').forEach(function(btn){
        btn.addEventListener('click', function(){
            if (btn.disabled) return;
            var endpoint = btn.getAttribute('data-endpoint');
            var orig = btn.innerHTML;
            btn.disabled = true;
            btn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Memproses...';
            $.ajax({
                url: baseUrl + 'bibliography/' + endpoint,
                method: 'POST',
                success: function(j){
                    if (j && j.ok) {
                        btn.innerHTML = '<i class="fa fa-check"></i> ' + (j.fixed || 0) + ' diperbaiki';
                        btn.style.background = 'linear-gradient(90deg,#059669,#6ee7b7)';
                        setTimeout(function(){ window.location.reload(); }, 1200);
                    } else {
                        btn.innerHTML = '<i class="fa fa-times"></i> Gagal';
                        setTimeout(function(){ btn.innerHTML = orig; btn.disabled = false; }, 2000);
                    }
                },
                error: function(){
                    btn.innerHTML = '<i class="fa fa-times"></i> Gagal terhubung';
                    setTimeout(function(){ btn.innerHTML = orig; btn.disabled = false; }, 2000);
                }
            });
        });
    });
});
</script>