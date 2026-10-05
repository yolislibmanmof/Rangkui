<style>
/* ================================================================
   DIFOSS SEARCH RESULT — EMERALD FOREST EDITION
   ================================================================ */
:root{
    --xs-emerald:#059669; --xs-teal:#0891b2; --xs-gold:#f59e0b;
    --xs-mint:#6ee7b7; --xs-deep:#0a2920; --xs-mid:#064e3b;
    --xs-ink:#0f172a; --xs-muted:#64748b; --xs-soft:#94a3b8;
}

/* ===== Progress bar scroll ===== */
#xuProgress{
    position:fixed;top:0;left:0;height:4px;width:0;z-index:3000;
    background:linear-gradient(90deg,var(--xs-emerald),var(--xs-gold),var(--xs-teal));
    box-shadow:0 0 12px rgba(5,150,105,.6);
}

/* ===== Reveal animation ===== */
.xuR{opacity:0;transform:translateY(28px);transition:all .7s cubic-bezier(.2,.8,.2,1)}
.xuR.in{opacity:1;transform:none}

/* ===== Header ===== */
.xuSrchHead{
    display:flex;align-items:center;gap:14px;flex-wrap:wrap;
    margin-bottom:22px;
}
.xuSrchBar{
    width:8px;height:40px;border-radius:8px;flex-shrink:0;
    background:linear-gradient(180deg,var(--xs-emerald),var(--xs-gold));
    box-shadow:0 4px 14px rgba(5,150,105,.3);
}
.xuSrchTitle{
    margin:0;font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1.75rem;letter-spacing:-.01em;
    color:var(--xs-ink);
}
html.xu-dark .xuSrchTitle{color:#f1f5f9}

.xuSrchCount{
    display:inline-flex;align-items:center;gap:7px;
    padding:6px 14px;border-radius:999px;
    background:rgba(5,150,105,.1);color:var(--xs-emerald);
    font-weight:700;font-size:.82rem;
    border:1px solid rgba(5,150,105,.2);
}
html.xu-dark .xuSrchCount{background:rgba(245,158,11,.1);color:var(--xs-gold);border-color:rgba(245,158,11,.25)}

.xuSrchLine{
    border:none;height:1px;
    background:linear-gradient(90deg,transparent,var(--xs-emerald),var(--xs-gold),transparent);
    margin:0 0 28px;
}

/* ===== Kartu hasil pencarian ===== */
.xuCard{
    border:none;border-radius:18px;overflow:hidden;
    box-shadow:0 8px 24px rgba(15,23,42,.06);
    transition:.35s cubic-bezier(.2,.8,.2,1);
    border:1px solid transparent;
    background:#fff;
}
.xuCard:hover{
    transform:translateY(-4px);
    box-shadow:0 18px 44px rgba(5,150,105,.18);
    border-color:rgba(5,150,105,.3);
}

/* Pita warna kiri berkilau */
.xuBar{
    width:5px;flex-shrink:0;
    background:linear-gradient(180deg,var(--xs-emerald),var(--xs-gold),var(--xs-teal));
    background-size:100% 200%;
    animation:xuBar 3s ease infinite;
}
@keyframes xuBar{0%,100%{background-position:0 0}50%{background-position:0 100%}}

.xuCardBody{padding:22px}

/* Tag GMD */
.xuTag{
    display:inline-flex;align-items:center;gap:6px;
    padding:4px 12px;
    background:linear-gradient(135deg,rgba(5,150,105,.1),rgba(8,145,178,.1));
    color:var(--xs-emerald);
    border:1px solid rgba(5,150,105,.18);
    border-radius:999px;
    font-size:.72rem;font-weight:800;
    letter-spacing:.06em;text-transform:uppercase;
}
html.xu-dark .xuTag{background:rgba(245,158,11,.08);color:var(--xs-gold);border-color:rgba(245,158,11,.2)}

/* Tanggal */
.xuSrchDate{
    color:var(--xs-soft);font-weight:600;font-size:.8rem;
    display:inline-flex;align-items:center;gap:5px;
}

/* Judul */
.xuCardTitle{
    font-family:'Neuton',Georgia,serif;
    font-size:1.25rem;font-weight:700;
    line-height:1.4;margin:0 0 12px;
}
.xuCardTitle a{
    color:var(--xs-ink);text-decoration:none;
    transition:color .25s;
}
.xuCardTitle a:hover{color:var(--xs-emerald)}
html.xu-dark .xuCardTitle a{color:#f1f5f9}
html.xu-dark .xuCardTitle a:hover{color:var(--xs-gold)}

/* Deskripsi */
.xuCardDesc{
    color:var(--xs-muted);
    font-size:.9rem;line-height:1.65;
    margin:0 0 18px;text-align:justify;
}
html.xu-dark .xuCardDesc{color:#cbd5e1}

/* Share icons */
.xuShareLbl{
    font-size:.72rem;font-weight:800;
    text-transform:uppercase;letter-spacing:.1em;
    color:var(--xs-muted);margin-right:4px;
    display:inline-flex;align-items:center;gap:5px;
}
html.xu-dark .xuShareLbl{color:#cbd5e1}

.xuShareI{
    width:30px;height:30px;border-radius:8px;
    color:#fff;display:inline-flex;align-items:center;justify-content:center;
    text-decoration:none;font-size:.85rem;
    transition:.25s;
}
.xuShareI:hover{transform:translateY(-3px) scale(1.15);box-shadow:0 8px 16px rgba(0,0,0,.2)}

/* Tombol See Detail */
.xuCardBtn{
    display:inline-flex;align-items:center;gap:8px;
    padding:9px 20px;
    background:linear-gradient(90deg,var(--xs-emerald),var(--xs-gold));
    color:#fff;text-decoration:none;
    border-radius:11px;font-weight:700;font-size:.85rem;
    transition:.25s;position:relative;overflow:hidden;
    box-shadow:0 8px 20px rgba(5,150,105,.3);
}
.xuCardBtn::before{
    content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;
    background:linear-gradient(100deg,transparent 20%,rgba(255,255,255,.25) 50%,transparent 80%);
    transition:left .6s ease;
}
.xuCardBtn:hover{color:#fff;transform:scale(1.03);filter:brightness(1.1);box-shadow:0 12px 26px rgba(5,150,105,.4)}
.xuCardBtn:hover::before{left:120%}

/* ===== Empty state ===== */
@keyframes xuPulse{0%,100%{transform:scale(1);opacity:1}50%{transform:scale(1.12);opacity:.6}}

.xuEmpty{
    text-align:center;padding:60px 20px;
    background:linear-gradient(135deg,rgba(5,150,105,.06),rgba(245,158,11,.06));
    border:1px solid rgba(5,150,105,.15);
    border-radius:22px;
    position:relative;overflow:hidden;
}
html.xu-dark .xuEmpty{background:linear-gradient(135deg,rgba(5,150,105,.12),rgba(245,158,11,.12));border-color:rgba(5,150,105,.25)}

.xuEmptyIco{
    font-size:3.5rem;color:var(--xs-emerald);
    margin-bottom:16px;display:block;
    animation:xuPulse 2s ease-in-out infinite;
    filter:drop-shadow(0 4px 14px rgba(5,150,105,.3));
}
html.xu-dark .xuEmptyIco{color:var(--xs-gold)}

.xuEmptyTitle{
    font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1.4rem;
    color:var(--xs-ink);margin:0 0 8px;
}
html.xu-dark .xuEmptyTitle{color:#f1f5f9}

.xuEmptyDesc{
    color:var(--xs-muted);
    max-width:440px;margin:0 auto;line-height:1.6;
}
html.xu-dark .xuEmptyDesc{color:#cbd5e1}

.xuEmptyBtn{
    display:inline-flex;align-items:center;gap:8px;
    margin-top:22px;padding:11px 24px;
    background:linear-gradient(90deg,var(--xs-emerald),var(--xs-gold));
    color:#fff;text-decoration:none;
    border-radius:12px;font-weight:700;font-size:.9rem;
    box-shadow:0 10px 24px rgba(5,150,105,.35);
    transition:.25s;position:relative;overflow:hidden;
}
.xuEmptyBtn::before{
    content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;
    background:linear-gradient(100deg,transparent 20%,rgba(255,255,255,.25) 50%,transparent 80%);
    transition:left .6s ease;
}
.xuEmptyBtn:hover{color:#fff;transform:translateY(-2px);box-shadow:0 14px 30px rgba(5,150,105,.45)}
.xuEmptyBtn:hover::before{left:120%}

/* ===== Dark mode card ===== */
html.xu-dark .xuCard{
    background:#0f1e1f!important;
    border-color:rgba(5,150,105,.2)!important;
    box-shadow:0 8px 24px rgba(0,0,0,.4)!important;
}
html.xu-dark .xuCard:hover{
    box-shadow:0 18px 44px rgba(5,150,105,.25)!important;
    border-color:rgba(245,158,11,.4)!important;
}
</style>

<!-- Progress bar -->
<div id="xuProgress"></div>

<div class="container py-5">

    <!-- Header -->
    <div class="xuSrchHead xuR">
        <div class="xuSrchBar"></div>
        <h2 class="xuSrchTitle">Search Result</h2>
        <span class="xuSrchCount">
            <i class="fa fa-search"></i>
            <span id="xuCount" data-target="<?= count($data) ?>">0</span> dokumen ditemukan
        </span>
    </div>
    <hr class="xuSrchLine">

    <!-- Hasil pencarian -->
    <div class="row">
        <?php if (count($data) > 0): ?>
            <?php foreach ($data as $key => $value) : ?>
                <div class="col-sm-12 col-md-12 mb-3">
                    <article class="xuCard xuR h-100">
                        <div class="row no-gutters">

                            <!-- Pita warna kiri -->
                            <div class="xuBar"></div>

                            <div class="col">
                                <div class="xuCardBody">

                                    <!-- Tag + Tanggal -->
                                    <div class="row align-items-center mb-2">
                                        <div class="col-md-9">
                                            <span class="xuTag">
                                                <i class="fa fa-tag"></i> <?= esc($value->gmd) ?>
                                            </span>
                                        </div>
                                        <div class="col-md-3 text-right">
                                            <small class="xuSrchDate">
                                                <i class="fa fa-calendar-o"></i> <?= datetimeIdn($value->input_date) ?>
                                            </small>
                                        </div>
                                    </div>

                                    <!-- Judul -->
                                    <h2 class="xuCardTitle">
                                        <a class="post-title" href="<?= base_url('beranda/detail/' . slim_encrypt($value->biblio_id)) ?>">
                                            <?= character_limiter($value->title, 160) ?>
                                        </a>
                                    </h2>

                                    <!-- Deskripsi -->
                                    <p class="xuCardDesc">
                                        <?= character_limiter($value->notes, 330) ?>
                                    </p>

                                    <!-- Share + Tombol -->
                                    <div class="row align-items-center">
                                        <div class="col-md-7">
                                            <div style="display:flex;flex-wrap:wrap;gap:6px;align-items:center">
                                                <span class="xuShareLbl">
                                                    <i class="fa fa-share-alt"></i> Share
                                                </span>
                                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?= rawurlencode(base_url('beranda/detail/' . slim_encrypt($value->biblio_id))) ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" title="Share ke Facebook" target="_blank" class="xuShareI" style="background:#1877f2"><i class="fa fa-facebook"></i></a>
                                                <a href="http://twitter.com/share?url=<?= rawurlencode(base_url('beranda/detail/' . slim_encrypt($value->biblio_id))) ?>&amp;text=<?= rawurlencode(character_limiter($value->title, 60)) ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" title="Share ke Twitter" target="_blank" class="xuShareI" style="background:#1da1f2"><i class="fa fa-twitter"></i></a>
                                                <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?= rawurlencode(base_url('beranda/detail/' . slim_encrypt($value->biblio_id))) ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" title="Share ke LinkedIn" target="_blank" class="xuShareI" style="background:#0077b5"><i class="fa fa-linkedin"></i></a>
                                                <a href="http://reddit.com/submit?url=<?= rawurlencode(base_url('beranda/detail/' . slim_encrypt($value->biblio_id))) ?>&amp;title=<?= rawurlencode(character_limiter($value->title, 60)) ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" title="Share ke Reddit" target="_blank" class="xuShareI" style="background:#ff4500"><i class="fa fa-reddit"></i></a>
                                            </div>
                                        </div>
                                        <div class="col-md-5 text-right">
                                            <a class="xuCardBtn" href="<?= base_url('beranda/detail/' . slim_encrypt($value->biblio_id)) ?>">
                                                See Detail <i class="fa fa-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            <?php endforeach; ?>

        <?php else: ?>
            <!-- Empty state -->
            <div class="col-12">
                <div class="xuR xuEmpty">
                    <i class="fa fa-search xuEmptyIco"></i>
                    <h3 class="xuEmptyTitle">Tidak Ada Hasil</h3>
                    <p class="xuEmptyDesc">Maaf, kami tidak menemukan dokumen yang cocok dengan pencarian Anda. Silakan coba kata kunci yang berbeda.</p>
                    <a href="<?= base_url() ?>" class="xuEmptyBtn">
                        <i class="fa fa-home"></i> Kembali ke Beranda
                    </a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function(){

    // 1) Progress bar scroll
    window.addEventListener('scroll', function(){
        var h = document.documentElement;
        var p = h.scrollTop / ((h.scrollHeight - h.clientHeight) || 1);
        var el = document.getElementById('xuProgress');
        if (el) el.style.width = (p * 100) + '%';
    });

    // 2) Fade-in reveal dengan stagger
    var io = new IntersectionObserver(function(es){
        es.forEach(function(en, i){
            if (en.isIntersecting){
                setTimeout(function(){ en.target.classList.add('in'); }, i * 70);
                io.unobserve(en.target);
            }
        });
    }, {threshold: .08});
    document.querySelectorAll('.xuR').forEach(function(el){ io.observe(el); });

    // 3) Counter dokumen ditemukan
    var cnt = document.getElementById('xuCount');
    if (cnt){
        var target = parseInt(cnt.getAttribute('data-target')) || 0;
        var start = null, dur = 1600;
        function step(ts){
            if (!start) start = ts;
            var p = Math.min((ts - start) / dur, 1);
            var eased = 1 - Math.pow(1 - p, 3);
            cnt.textContent = Math.floor(eased * target).toLocaleString('id-ID');
            if (p < 1) requestAnimationFrame(step);
            else cnt.textContent = target.toLocaleString('id-ID');
        }
        var obs = new IntersectionObserver(function(entries){
            if (entries[0].isIntersecting){ requestAnimationFrame(step); obs.disconnect(); }
        });
        obs.observe(cnt);
    }
});
</script>