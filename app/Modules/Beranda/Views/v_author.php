<?php
// ===== HITUNGAN STATISTIK (FITUR 2) =====
$__totalKarya = count($works);
$__totalUnduh = 0;
foreach ($works as $__w) { $__totalUnduh += (int)$__w->downloads; }

// h-index sederhana: h karya yang masing-masing punya >= h unduhan
$__dl = array_map(function($w){ return (int)$w->downloads; }, $works);
rsort($__dl);
$__h = 0;
foreach ($__dl as $__i => $__c) { if ($__c >= $__i + 1) { $__h = $__i + 1; } else { break; } }

$__tahunAktif = [];
foreach ($yearly as $__y) { if (!empty($__y->y)) $__tahunAktif[] = $__y->y; }
$__rentang = $__tahunAktif ? (min($__tahunAktif) . ' – ' . max($__tahunAktif)) : '—';
$__maxY = 1;
foreach ($yearly as $__y) { $__maxY = max($__maxY, (int)$__y->total); }
$__initial = strtoupper(substr(trim($profile->author_name), 0, 1));
?>
<style>
/* ================================================================
   DIFOSS AUTHOR PROFILE — EMERALD FOREST EDITION
   ================================================================ */
:root{
    --xa-emerald:#059669; --xa-teal:#0891b2; --xa-gold:#f59e0b;
    --xa-mint:#6ee7b7; --xa-deep:#0a2920; --xa-mid:#064e3b;
    --xa-ink:#0f172a; --xa-muted:#64748b; --xa-soft:#94a3b8;
}

.xuR{opacity:0;transform:translateY(26px);transition:all .7s cubic-bezier(.2,.8,.2,1)}
.xuR.in{opacity:1;transform:none}

.xuAuWrap{max-width:1100px;margin:0 auto;padding:40px 16px}

/* ===== Kartu utama ===== */
.xuAuCard{
    background:#fff;border:none;border-radius:22px;overflow:hidden;
    box-shadow:0 20px 50px rgba(15,23,42,.08);
    margin-bottom:24px;
    transition:.35s cubic-bezier(.2,.8,.2,1);
}
html.xu-dark .xuAuCard{background:#0f1e1f;box-shadow:0 20px 50px rgba(0,0,0,.4)}

/* ===== Header identitas ===== */
.xuAuHead{
    padding:34px;
    background:linear-gradient(135deg,#0a2920 0%,#064e3b 55%,#115e59 100%);
    color:#fff;display:flex;gap:22px;align-items:center;flex-wrap:wrap;
    position:relative;overflow:hidden;
}
.xuAuHead::after{
    content:'';position:absolute;top:-60%;right:-10%;
    width:420px;height:420px;
    background:radial-gradient(circle,rgba(245,158,11,.25),transparent 70%);
    pointer-events:none;
}
.xuAuHead::before{
    content:'';position:absolute;bottom:-50%;left:-8%;
    width:360px;height:360px;
    background:radial-gradient(circle,rgba(8,145,178,.2),transparent 70%);
    pointer-events:none;
}

.xuAuAvatar{
    width:86px;height:86px;border-radius:24px;
    background:linear-gradient(135deg,var(--xa-emerald),var(--xa-gold));
    display:flex;align-items:center;justify-content:center;
    font-size:2.2rem;font-weight:900;flex-shrink:0;
    box-shadow:0 14px 30px rgba(5,150,105,.45);
    position:relative;z-index:2;
}

.xuAuName{
    font-family:'Neuton',Georgia,serif;
    font-size:1.55rem;font-weight:700;letter-spacing:-.01em;
    margin:0;color:#fff!important;
    text-shadow:0 2px 12px rgba(0,0,0,.35);
    position:relative;z-index:2;
}

.xuAuBadges{
    display:flex;gap:8px;flex-wrap:wrap;margin-top:10px;
    position:relative;z-index:2;
}
.xuAuBadge{
    display:inline-flex;align-items:center;gap:6px;
    padding:5px 13px;border-radius:999px;
    font-size:.75rem;font-weight:700;
    background:rgba(255,255,255,.12);
    backdrop-filter:blur(8px);-webkit-backdrop-filter:blur(8px);
    border:1px solid rgba(255,255,255,.25);
    color:#e2e8f0;text-decoration:none;
    transition:.25s;
}
.xuAuBadge:hover{background:rgba(255,255,255,.22);color:#fff}

/* ===== Statistik ===== */
.xuAuStats{
    display:grid;grid-template-columns:repeat(auto-fit,minmax(150px,1fr));
    gap:14px;padding:22px 34px;
    background:#fff;
}
html.xu-dark .xuAuStats{background:#0f1e1f}

.xuAuStat{
    padding:18px 16px;border-radius:16px;
    background:#f8fafc;border:1px solid #e2e8f0;
    text-align:center;position:relative;overflow:hidden;
    transition:.25s;
}
.xuAuStat:hover{transform:translateY(-2px);box-shadow:0 8px 20px rgba(5,150,105,.15)}
html.xu-dark .xuAuStat{background:rgba(5,150,105,.06);border-color:rgba(5,150,105,.2)}

.xuAuStat::before{
    content:'';position:absolute;top:0;left:0;right:0;height:4px;
    background:var(--ac,var(--xa-emerald));
}
.xuAuStat b{
    display:block;font-family:'Neuton',Georgia,serif;
    font-size:1.65rem;font-weight:700;
    color:var(--xa-ink);
    margin-bottom:2px;
}
html.xu-dark .xuAuStat b{color:#f1f5f9}

.xuAuStat span{
    font-size:.7rem;font-weight:800;
    text-transform:uppercase;letter-spacing:.08em;
    color:var(--xa-muted);
}
html.xu-dark .xuAuStat span{color:var(--xa-soft)}

/* ===== Section head ===== */
.xuAuSecHead{
    padding:20px 34px 0;font-weight:800;font-size:1.05rem;
    color:var(--xa-ink);
    display:flex;align-items:center;gap:10px;
}
html.xu-dark .xuAuSecHead{color:#f1f5f9}

.xuAuSecHead i{
    width:32px;height:32px;border-radius:10px;
    background:linear-gradient(135deg,var(--xa-emerald),var(--xa-gold));
    color:#fff;display:inline-flex;align-items:center;justify-content:center;
    font-size:.85rem;
    box-shadow:0 6px 14px rgba(5,150,105,.3);
}

.xuAuBody{padding:20px 34px 30px}

/* ===== Grafik batang ===== */
.xuAuChart{
    display:flex;align-items:flex-end;gap:14px;
    min-height:190px;padding:10px 6px 0;flex-wrap:wrap;
}
.xuAuBarCol{
    display:flex;flex-direction:column;align-items:center;
    gap:8px;flex:1;min-width:52px;
}
.xuAuBar{
    width:100%;max-width:56px;border-radius:10px 10px 4px 4px;
    background:linear-gradient(180deg,var(--xa-gold),var(--xa-emerald));
    position:relative;
    transition:height 1s cubic-bezier(.2,.8,.2,1);
    box-shadow:0 8px 18px rgba(5,150,105,.3);
}
.xuAuBar em{
    position:absolute;top:-22px;left:50%;transform:translateX(-50%);
    font-style:normal;font-weight:800;font-size:.78rem;
    color:var(--xa-emerald);
}
html.xu-dark .xuAuBar em{color:var(--xa-mint)}
.xuAuBarCol span{font-size:.75rem;font-weight:700;color:var(--xa-muted)}
html.xu-dark .xuAuBarCol span{color:var(--xa-soft)}

/* ===== Chip kolaborator ===== */
.xuAuChips{display:flex;flex-wrap:wrap;gap:9px}
.xuAuChip{
    display:inline-flex;align-items:center;gap:8px;
    padding:8px 15px;border-radius:999px;
    background:rgba(5,150,105,.08);
    border:1px solid rgba(5,150,105,.18);
    color:#475569;font-weight:600;font-size:.85rem;
    text-decoration:none;transition:.25s;
}
.xuAuChip:hover{
    background:linear-gradient(90deg,var(--xa-emerald),var(--xa-gold));
    color:#fff;transform:translateY(-2px);
    box-shadow:0 8px 20px rgba(5,150,105,.3);
}
html.xu-dark .xuAuChip{background:rgba(5,150,105,.1);color:#cbd5e1;border-color:rgba(5,150,105,.2)}
html.xu-dark .xuAuChip:hover{color:#fff}

.xuAuChip i{font-size:.8rem}
.xuAuChip .n{
    background:rgba(255,255,255,.25);
    padding:1px 8px;border-radius:999px;
    font-size:.7rem;font-weight:800;
}
html.xu-dark .xuAuChip .n{background:rgba(255,255,255,.15)}

.xuAuSub{
    font-size:.78rem;font-weight:800;
    color:var(--xa-muted);
    text-transform:uppercase;letter-spacing:.1em;
    margin:18px 0 12px;
    display:flex;align-items:center;gap:6px;
}
html.xu-dark .xuAuSub{color:var(--xa-soft)}

/* ===== Galeri karya ===== */
.xuAuWorks{
    display:grid;grid-template-columns:repeat(auto-fill,minmax(240px,1fr));
    gap:16px;
}
.xuAuWork{
    border:1px solid #e2e8f0;border-radius:16px;overflow:hidden;
    background:#fff;text-decoration:none;
    transition:.25s;display:flex;flex-direction:column;
}
.xuAuWork:hover{
    transform:translateY(-4px);
    box-shadow:0 16px 34px rgba(5,150,105,.18);
    border-color:rgba(5,150,105,.4);
}
html.xu-dark .xuAuWork{background:#0a2920;border-color:rgba(5,150,105,.2)}
html.xu-dark .xuAuWork:hover{border-color:rgba(245,158,11,.4);box-shadow:0 16px 34px rgba(5,150,105,.25)}

.xuAuWork img{
    width:100%;height:150px;object-fit:cover;
    background:#f1f5f9;
}
html.xu-dark .xuAuWork img{background:#06181a}

.xuAuWorkBody{
    padding:14px 16px;display:flex;flex-direction:column;gap:8px;flex:1;
}
.xuAuWorkTitle{
    color:var(--xa-ink);font-weight:700;font-size:.88rem;
    line-height:1.45;
    display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient:vertical;overflow:hidden;
}
html.xu-dark .xuAuWorkTitle{color:#f1f5f9}

.xuAuWorkMeta{
    margin-top:auto;display:flex;gap:8px;flex-wrap:wrap;
}
.xuAuMini{
    padding:3px 10px;border-radius:999px;
    font-size:.7rem;font-weight:800;
}

/* Empty state */
.xuAuEmpty{
    color:var(--xa-soft);text-align:center;padding:24px;
    font-size:.88rem;
}
</style>

<div class="xuAuWrap">

    <!-- KARTU IDENTITAS -->
    <div class="xuAuCard xuR">
        <div class="xuAuHead">
            <div class="xuAuAvatar"><?= esc($__initial) ?></div>
            <div style="position:relative;z-index:2">
                <h1 class="xuAuName"><?= esc($profile->author_name) ?></h1>
                <div class="xuAuBadges">
                    <span class="xuAuBadge"><i class="fa fa-user"></i> <?= authority_type($profile->authority_type) ?></span>
                    <?php if (!empty($profile->orcid_id)) : ?>
                        <a class="xuAuBadge" href="https://orcid.org/<?= esc($profile->orcid_id) ?>" target="_blank"><i class="fa fa-id-badge"></i> ORCID: <?= esc($profile->orcid_id) ?></a>
                    <?php endif; ?>
                    <span class="xuAuBadge"><i class="fa fa-calendar"></i> Aktif: <?= esc($__rentang) ?></span>
                </div>
            </div>
        </div>
        <div class="xuAuStats">
            <div class="xuAuStat" style="--ac:var(--xa-emerald)"><b><?= $__totalKarya ?></b><span>Total Karya</span></div>
            <div class="xuAuStat" style="--ac:var(--xa-teal)"><b><?= number_format($__totalUnduh) ?></b><span>Total Unduhan</span></div>
            <div class="xuAuStat" style="--ac:var(--xa-gold)"><b><?= $__h ?></b><span>Indeks-H Karya</span></div>
            <div class="xuAuStat" style="--ac:var(--xa-mint)"><b><?= count($collab['coauthor']) + count($collab['supervisor']) ?></b><span>Kolaborator</span></div>
        </div>
    </div>

    <!-- GRAFIK PRODUKTIVITAS -->
    <div class="xuAuCard xuR">
        <div class="xuAuSecHead"><i class="fa fa-bar-chart"></i> Produktivitas per Tahun</div>
        <div class="xuAuBody">
            <?php if ($yearly) : ?>
                <div class="xuAuChart">
                    <?php foreach ($yearly as $__y) :
                        $__hpx = max(18, (int)round(((int)$__y->total / $__maxY) * 150));
                    ?>
                        <div class="xuAuBarCol">
                            <div class="xuAuBar" style="height:<?= $__hpx ?>px"><em><?= (int)$__y->total ?></em></div>
                            <span><?= esc($__y->y) ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else : ?>
                <div class="xuAuEmpty">Belum ada data tahun publikasi.</div>
            <?php endif; ?>
        </div>
    </div>

    <!-- JARINGAN KOLABORATOR -->
    <div class="xuAuCard xuR">
        <div class="xuAuSecHead"><i class="fa fa-share-alt"></i> Jaringan Kolaborator</div>
        <div class="xuAuBody">
            <div class="xuAuSub"><i class="fa fa-users"></i> Rekan Penulis</div>
            <div class="xuAuChips">
                <?php if ($collab['coauthor']) : foreach ($collab['coauthor'] as $__c) : ?>
                    <a class="xuAuChip" href="<?= base_url('beranda/author/' . (int)$__c->author_id) ?>"><i class="fa fa-user"></i> <?= esc($__c->author_name) ?> <span class="n"><?= (int)$__c->total ?> karya</span></a>
                <?php endforeach; else : ?><span class="xuAuEmpty">Belum ada rekan penulis tercatat.</span><?php endif; ?>
            </div>
            <div class="xuAuSub"><i class="fa fa-graduation-cap"></i> Dosen Pembimbing</div>
            <div class="xuAuChips">
                <?php if ($collab['supervisor']) : foreach ($collab['supervisor'] as $__s) : ?>
                    <a class="xuAuChip" href="<?= base_url('beranda/search?supervisor=' . rawurlencode($__s->supervisor_name)) ?>"><i class="fa fa-graduation-cap"></i> <?= esc($__s->supervisor_name) ?> <span class="n"><?= (int)$__s->total ?> karya</span></a>
                <?php endforeach; else : ?><span class="xuAuEmpty">Belum ada pembimbing tercatat.</span><?php endif; ?>
            </div>
        </div>
    </div>

    <!-- GALERI KARYA -->
    <div class="xuAuCard xuR">
        <div class="xuAuSecHead"><i class="fa fa-book"></i> Galeri Karya (<?= $__totalKarya ?>)</div>
        <div class="xuAuBody">
            <?php if ($works) : ?>
                <div class="xuAuWorks">
                    <?php foreach ($works as $__w) :
                        $__url = function_exists('slim_encrypt') ? base_url('beranda/detail/' . slim_encrypt($__w->biblio_id)) : base_url('beranda/detail/' . $__w->biblio_id);
                    ?>
                        <a class="xuAuWork" href="<?= $__url ?>">
                            <?php if (!empty($__w->image)) : ?>
                                <img src="<?= base_url('uploads/images/docs/' . $__w->image) ?>" alt="cover">
                            <?php else : ?>
                                <img src="<?= base_url('assets/images/no_image.jpg') ?>" alt="no cover">
                            <?php endif; ?>
                            <div class="xuAuWorkBody">
                                <div class="xuAuWorkTitle"><?= esc($__w->title) ?></div>
                                <div class="xuAuWorkMeta">
                                    <span class="xuAuMini" style="background:rgba(5,150,105,.12);color:var(--xa-emerald)"><?= esc($__w->publish_year ?: '—') ?></span>
                                    <span class="xuAuMini" style="background:rgba(8,145,178,.12);color:var(--xa-teal)"><i class="fa fa-download"></i> <?= (int)$__w->downloads ?></span>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php else : ?>
                <div class="xuAuEmpty">Belum ada karya tercatat.</div>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function(){
    var io = new IntersectionObserver(function(es){
        es.forEach(function(en, i){
            if (en.isIntersecting){
                setTimeout(function(){ en.target.classList.add('in'); }, i * 70);
                io.unobserve(en.target);
            }
        });
    }, {threshold: .08});
    document.querySelectorAll('.xuR').forEach(function(el){ io.observe(el); });
});
</script>