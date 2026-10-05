<?php
// Data statistik untuk hero counter
$__db = \Config\Database::connect();
$xu = ['judul' => 0, 'penulis' => 0, 'gmd' => 0, 'view' => 0, 'latest' => []];
try { $xu['judul']   = (int) $__db->query("SELECT COUNT(*) c FROM biblio")->getRow()->c; } catch (\Throwable $e) {}
try { $xu['penulis'] = (int) $__db->query("SELECT COUNT(*) c FROM mst_author")->getRow()->c; } catch (\Throwable $e) {}
try { $xu['gmd']     = (int) $__db->query("SELECT COUNT(*) c FROM mst_gmd")->getRow()->c; } catch (\Throwable $e) {}
try { $xu['view']    = (int) $__db->query("SELECT COALESCE(SUM(hits),0) c FROM biblio")->getRow()->c; } catch (\Throwable $e) {}
?>

<style>
/* ================================================================
   DIFOSS BERANDA — EMERALD GALAXY ULTIMATE
   ================================================================ */
:root{
    --xe-emerald:#059669;--xe-teal:#0891b2;--xe-gold:#f59e0b;
    --xe-mint:#6ee7b7;--xe-forest-deep:#0a2920;--xe-forest-mid:#064e3b;
}

/* ================= HERO GALAXY ================= */
#xuHero{
    position:relative;overflow:hidden;
    background:
        radial-gradient(900px 520px at 8% 112%,rgba(8,145,178,.32),transparent 60%),
        radial-gradient(1100px 620px at 92% -10%,rgba(5,150,105,.30),transparent 60%),
        radial-gradient(700px 400px at 50% 50%,rgba(245,158,11,.10),transparent 70%),
        linear-gradient(160deg,#0a2920 0%,#064e3b 45%,#0a2920 100%);
    min-height:720px;
    display:flex;flex-direction:column;align-items:center;justify-content:center;
    padding:90px 20px 150px;
    isolation:isolate;
}
#xuHero::before{content:'';position:absolute;top:0;left:0;right:0;height:1px;background:linear-gradient(90deg,transparent,var(--xe-gold),var(--xe-teal),transparent);z-index:4}
#xuHero::after{
    content:'';position:absolute;inset:0;pointer-events:none;z-index:1;opacity:.35;mix-blend-mode:overlay;
    background-image:
        radial-gradient(circle at 20% 30%,rgba(110,231,183,.12) 0,transparent 40%),
        radial-gradient(circle at 80% 70%,rgba(251,191,36,.10) 0,transparent 40%);
}

#xuStars{position:absolute;inset:0;pointer-events:none;z-index:2}

/* Floating Badges di pojok hero */
.xuFloatBadge{
    position:absolute;z-index:6;
    display:flex;align-items:center;gap:10px;
    padding:10px 16px;
    background:rgba(255,255,255,.08);
    border:1px solid rgba(255,255,255,.18);
    border-radius:999px;
    backdrop-filter:blur(16px);-webkit-backdrop-filter:blur(16px);
    color:#fff;font-size:.75rem;font-weight:700;
    box-shadow:0 10px 30px rgba(0,0,0,.25);
    animation:xuFloatBadge 5s ease-in-out infinite;
}
.xuFloatBadge .ico{width:30px;height:30px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:.78rem;color:#fff;flex-shrink:0}
.xuFloatBadge.b1{top:18%;left:6%;animation-delay:0s}
.xuFloatBadge.b1 .ico{background:linear-gradient(135deg,#10b981,#059669)}
.xuFloatBadge.b2{top:28%;right:6%;animation-delay:-1.5s}
.xuFloatBadge.b2 .ico{background:linear-gradient(135deg,#f59e0b,#d97706)}
.xuFloatBadge.b3{bottom:24%;left:8%;animation-delay:-3s}
.xuFloatBadge.b3 .ico{background:linear-gradient(135deg,#0891b2,#0e7490)}
@keyframes xuFloatBadge{0%,100%{transform:translateY(0)}50%{transform:translateY(-10px)}}
@media(max-width:991px){.xuFloatBadge{display:none}}

/* Orbs */
.xuOrb{position:absolute;border-radius:50%;filter:blur(90px);pointer-events:none;z-index:1}
.xuOrb.o1{top:-100px;left:8%;width:540px;height:540px;background:radial-gradient(circle,rgba(5,150,105,.55),transparent 65%);animation:xuFloat 9s ease-in-out infinite}
.xuOrb.o2{bottom:-120px;right:8%;width:460px;height:460px;background:radial-gradient(circle,rgba(245,158,11,.45),transparent 65%);animation:xuFloat 11s ease-in-out 2s infinite}
.xuOrb.o3{top:38%;left:58%;width:340px;height:340px;background:radial-gradient(circle,rgba(8,145,178,.40),transparent 65%);animation:xuFloat 13s ease-in-out 4s infinite}

@keyframes xuFloat{0%,100%{transform:translateY(0) scale(1)}50%{transform:translateY(-38px) scale(1.09)}}
@keyframes xuPulse{0%,100%{opacity:1}50%{opacity:.3}}
@keyframes xuGrad{to{background-position:300% 0}}
@keyframes xuBlink{0%,50%{opacity:1}51%,100%{opacity:0}}
@keyframes xuWaveDrift{from{transform:translateX(-10px)}to{transform:translateX(10px)}}
@keyframes xuCaretBlink{0%,50%{border-color:var(--xe-mint)}51%,100%{border-color:transparent}}

/* Hero Badge */
.xuHeroBadge{
    display:inline-flex;align-items:center;gap:9px;
    padding:8px 18px;
    background:rgba(255,255,255,.06);
    border:1px solid rgba(251,191,36,.35);
    border-radius:999px;
    color:rgba(255,255,255,.85);
    font-size:.72rem;font-weight:700;
    letter-spacing:.22em;text-transform:uppercase;
    margin-bottom:26px;
    backdrop-filter:blur(12px);
    box-shadow:0 6px 20px rgba(0,0,0,.15);
}
.xuHeroBadge .dot{width:7px;height:7px;border-radius:50%;background:var(--xe-gold);box-shadow:0 0 12px var(--xe-gold);animation:xuPulse 1.6s infinite}

/* Hero Title */
.xuHeroTitle{
    font-family:'Neuton',Georgia,serif;
    font-size:clamp(2.5rem,6vw,4.5rem);
    font-weight:700;line-height:1.08;
    margin:0 0 20px;
    color:transparent;
    background:linear-gradient(95deg,#f8fafc 0%,#6ee7b7 30%,#fbbf24 65%,#5eead4 100%);
    background-size:250% 100%;
    -webkit-background-clip:text;background-clip:text;
    -webkit-text-fill-color:transparent;
    animation:xuGrad 8s linear infinite;
    letter-spacing:-.02em;
    text-shadow:0 0 80px rgba(110,231,183,.2);
}

#xuTyping{
    color:rgba(255,255,255,.72);
    font-size:1.08rem;line-height:1.6;
    margin-bottom:38px;min-height:1.8em;
    border-right:2px solid var(--xe-mint);
    padding-right:4px;
    animation:xuCaretBlink 1s infinite;
    display:inline-block;
}

/* Search Box */
.xuSearchBox{
    position:relative;z-index:5;width:100%;max-width:740px;
    display:flex;
    background:rgba(255,255,255,.07);
    backdrop-filter:blur(22px) saturate(1.4);
    -webkit-backdrop-filter:blur(22px) saturate(1.4);
    border-radius:22px;overflow:hidden;
    border:1px solid rgba(255,255,255,.18);
    box-shadow:0 26px 70px rgba(0,0,0,.35),inset 0 1px 0 rgba(255,255,255,.12);
    transition:.35s cubic-bezier(.2,.8,.2,1);
}
.xuSearchBox:focus-within{
    border-color:rgba(251,191,36,.55);
    box-shadow:0 26px 80px rgba(0,0,0,.4),0 0 0 4px rgba(5,150,105,.18);
    transform:translateY(-2px);
}
.xuSearchBox .ico{padding:0 22px;display:flex;align-items:center;color:var(--xe-gold);font-size:1.2rem}
.xuSearchBox input{flex:1;border:none;outline:none;padding:21px 14px;font-size:1.02rem;background:transparent;color:#fff;font-weight:500}
.xuSearchBox input::placeholder{color:rgba(255,255,255,.45)}
.xuSearchBox button{
    background:linear-gradient(90deg,var(--xe-emerald),var(--xe-gold));
    color:#fff;border:none;
    padding:0 40px;font-weight:800;font-size:.95rem;
    cursor:pointer;letter-spacing:.03em;
    transition:.3s;display:flex;align-items:center;gap:9px;
    position:relative;overflow:hidden;
}
.xuSearchBox button:hover{filter:brightness(1.12);gap:13px}
.xuSearchBox button::before{
    content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;
    background:linear-gradient(100deg,transparent 20%,rgba(255,255,255,.3) 50%,transparent 80%);
    transition:left .6s ease;
}
.xuSearchBox button:hover::before{left:120%}
.xuSearchHint{text-align:center;margin-top:16px;color:rgba(255,255,255,.50);font-size:.8rem}
.xuSearchHint kbd{
    background:rgba(255,255,255,.10);
    border:1px solid rgba(255,255,255,.22);
    border-radius:6px;padding:3px 9px;
    font-family:'JetBrains Mono',monospace;font-size:.68rem;
    font-weight:700;color:var(--xe-mint);margin:0 2px;
}

/* Counters */
.xuCounters{position:relative;z-index:5;display:flex;gap:32px;flex-wrap:wrap;justify-content:center;margin-top:52px}
.xuCounters .sep{width:1px;background:linear-gradient(180deg,transparent,rgba(255,255,255,.25),transparent);align-self:stretch}
.xuCountWrap{text-align:center;min-width:130px;padding:0 8px}
.xuCounter{
    font-family:'Neuton',Georgia,serif;
    font-size:clamp(2rem,4vw,2.8rem);
    font-weight:700;line-height:1;
    color:transparent;
    background:linear-gradient(90deg,var(--xe-mint),var(--xe-gold));
    -webkit-background-clip:text;background-clip:text;
    -webkit-text-fill-color:transparent;
    letter-spacing:-.02em;font-variant-numeric:tabular-nums;
}
.xuCountWrap.pink .xuCounter{background:linear-gradient(90deg,#fbbf24,#f59e0b);-webkit-background-clip:text;background-clip:text;-webkit-text-fill-color:transparent}
.xuCountWrap.blue .xuCounter{background:linear-gradient(90deg,var(--xe-teal),var(--xe-mint));-webkit-background-clip:text;background-clip:text;-webkit-text-fill-color:transparent}
.xuCountWrap.rose .xuCounter{background:linear-gradient(90deg,#fb7185,#f43f5e);-webkit-background-clip:text;background-clip:text;-webkit-text-fill-color:transparent}
.xuCountLabel{color:rgba(255,255,255,.55);font-size:.72rem;font-weight:800;letter-spacing:.18em;text-transform:uppercase;margin-top:8px}

/* Wave */
.xuWave{position:absolute;bottom:-1px;left:0;width:100%;z-index:3}
.xuWave1{fill:#f6f7fc;opacity:.75;animation:xuWaveDrift 14s ease-in-out infinite alternate}
.xuWave2{fill:#f6f7fc;animation:xuWaveDrift 18s ease-in-out 3s infinite alternate-reverse}

/* Scroll indicator */
.xuScrollCue{
    position:absolute;bottom:30px;left:50%;transform:translateX(-50%);
    z-index:6;color:rgba(255,255,255,.55);
    display:flex;flex-direction:column;align-items:center;gap:8px;
    font-size:.68rem;font-weight:700;letter-spacing:.2em;text-transform:uppercase;
    cursor:pointer;
}
.xuScrollCue .arrow{
    width:32px;height:32px;border-radius:50%;
    border:2px solid rgba(255,255,255,.25);
    display:flex;align-items:center;justify-content:center;
    animation:xuBounceDown 2s infinite;
}
@keyframes xuBounceDown{0%,100%{transform:translateY(0);border-color:rgba(255,255,255,.25)}50%{transform:translateY(6px);border-color:var(--xe-gold)}}

/* ================= SLIDER PREMIUM ================= */
.xuSliderWrap{position:relative;z-index:5;max-width:1280px;margin:-90px auto 0;padding:0 20px}
.xuSliderWrap .swiper{border-radius:26px;overflow:hidden;box-shadow:0 30px 80px rgba(10,41,32,.35);border:1px solid rgba(5,150,105,.2)}
.xuSliderWrap .swiper-slide{position:relative;min-height:420px;display:flex;align-items:flex-end}
.xuSliderWrap .swiper-slide::before{
    content:'';position:absolute;inset:0;z-index:1;
    background:linear-gradient(0deg,rgba(10,41,32,.95) 0%,rgba(10,41,32,.55) 40%,transparent 70%);
    pointer-events:none;
}
.xuSliderWrap .swiper-slide img{width:100%;height:420px;object-fit:cover;display:block}
.xuSlideCap{
    position:relative;z-index:3;padding:40px 50px;
    color:#fff;max-width:600px;
}
.xuSlideCap .kicker{
    display:inline-block;padding:4px 12px;border-radius:6px;
    background:var(--xe-gold);color:#0a2920;
    font-size:.65rem;font-weight:900;letter-spacing:.15em;text-transform:uppercase;
    margin-bottom:14px;
}
.xuSlideCap h3{
    font-family:'Neuton',Georgia,serif;
    font-size:clamp(1.5rem,3vw,2.2rem);font-weight:700;
    line-height:1.2;margin:0 0 10px;color:#fff;
}
.xuSlideCap p{color:rgba(255,255,255,.75);font-size:.9rem;line-height:1.6;margin:0 0 18px}
.xuSlideCap .btn{
    display:inline-flex;align-items:center;gap:8px;
    padding:10px 24px;border-radius:11px;
    background:linear-gradient(90deg,var(--xe-emerald),var(--xe-teal));
    color:#fff;text-decoration:none;font-weight:700;font-size:.85rem;
    transition:.25s;border:none;cursor:pointer;
}
.xuSlideCap .btn:hover{filter:brightness(1.15);transform:translateX(3px)}

/* Slide default (bila folder slider kosong) — tidak akan pernah gelap */
.xuSlideDefault{position:relative;background:linear-gradient(135deg,#064e3b 0%,#0a2920 55%,#115e59 100%)}
.xuSlideDefault::after{content:'';position:absolute;inset:0;background:radial-gradient(circle at 80% 20%,rgba(245,158,11,.28),transparent 55%),radial-gradient(circle at 15% 80%,rgba(110,231,183,.22),transparent 55%);pointer-events:none}
.xuSlideGrad1{background:linear-gradient(135deg,#0a2920,#115e59)}
.xuSlideGrad2{background:linear-gradient(135deg,#064e3b,#0891b2)}
.xuSlideDefault .xuSlideCap{width:100%}

/* Fallback bila Swiper tidak aktif: tampilkan slide pertama saja */
.xuSliderWrap .swiper:not(.swiper-initialized) .swiper-wrapper{display:block}
.xuSliderWrap .swiper:not(.swiper-initialized) .swiper-slide{display:none}
.xuSliderWrap .swiper:not(.swiper-initialized) .swiper-slide:first-child{display:flex}
.xuSliderWrap .swiper-pagination-bullet{background:rgba(255,255,255,.5);opacity:1}
.xuSliderWrap .swiper-pagination-bullet-active{background:var(--xe-gold)}

/* ================= SECTION: KENAPA DIFOSS ================= */
.xuWhy{padding:90px 0 40px;background:#f8fafc;position:relative;overflow:hidden}
html.xu-dark .xuWhy{background:#0b1020}
.xuWhy::before{
    content:'';position:absolute;top:-100px;right:-100px;width:400px;height:400px;
    border-radius:50%;background:radial-gradient(circle,rgba(5,150,105,.08),transparent 70%);
    pointer-events:none;
}
.xuWhy::after{
    content:'';position:absolute;bottom:-150px;left:-150px;width:500px;height:500px;
    border-radius:50%;background:radial-gradient(circle,rgba(245,158,11,.06),transparent 70%);
    pointer-events:none;
}
.xuSecHead{text-align:center;margin-bottom:60px;position:relative;z-index:2}
.xuSecKicker{
    display:inline-flex;align-items:center;gap:8px;
    padding:7px 18px;
    background:rgba(5,150,105,.08);
    color:var(--xe-emerald);
    border:1px solid rgba(5,150,105,.2);
    border-radius:999px;
    font-size:.7rem;font-weight:800;
    letter-spacing:.18em;text-transform:uppercase;
    margin-bottom:16px;
}
html.xu-dark .xuSecKicker{background:rgba(245,158,11,.1);color:var(--xe-gold);border-color:rgba(245,158,11,.25)}
.xuSecTitle{
    font-family:'Neuton',Georgia,serif;
    font-size:clamp(1.9rem,4vw,2.8rem);
    font-weight:700;color:#0f172a;
    margin:0 0 12px;line-height:1.15;
}
.xuSecTitle span{
    color:transparent;
    background:linear-gradient(90deg,var(--xe-emerald),var(--xe-gold));
    -webkit-background-clip:text;background-clip:text;
    -webkit-text-fill-color:transparent;
}
html.xu-dark .xuSecTitle{color:#f1f5f9}
.xuSecSub{color:#64748b;max-width:580px;margin:0 auto;font-size:1rem;line-height:1.6}

.xuWhyGrid{display:grid;grid-template-columns:repeat(auto-fit,minmax(240px,1fr));gap:22px;position:relative;z-index:2}
.xuFeatCard{
    position:relative;overflow:hidden;
    background:#fff;border-radius:20px;
    padding:32px 26px;border:1px solid rgba(15,23,42,.06);
    box-shadow:0 10px 30px rgba(15,23,42,.06);
    transition:all .4s cubic-bezier(.2,.8,.2,1);
    cursor:default;
}
html.xu-dark .xuFeatCard{background:#0f1e1f;border-color:rgba(5,150,105,.2)}
.xuFeatCard::before{
    content:'';position:absolute;top:0;left:0;right:0;height:4px;
    background:linear-gradient(90deg,var(--c1),var(--c2));
    transform:scaleX(0);transform-origin:left;
    transition:transform .4s ease;
}
.xuFeatCard:hover{transform:translateY(-10px);box-shadow:0 30px 60px rgba(5,150,105,.18)}
.xuFeatCard:hover::before{transform:scaleX(1)}
.xuFeatIco{
    width:60px;height:60px;border-radius:16px;
    display:flex;align-items:center;justify-content:center;
    font-size:1.5rem;color:#fff;
    background:linear-gradient(135deg,var(--c1),var(--c2));
    box-shadow:0 12px 28px rgba(5,150,105,.25);
    margin-bottom:20px;transition:.4s;
}
.xuFeatCard:hover .xuFeatIco{transform:rotate(-8deg) scale(1.08)}
.xuFeatCard h3{font-size:1.1rem;font-weight:800;color:#0f172a;margin:0 0 10px}
html.xu-dark .xuFeatCard h3{color:#f1f5f9}
.xuFeatCard p{font-size:.87rem;color:#64748b;line-height:1.65;margin:0}
html.xu-dark .xuFeatCard p{color:#94a3b8}
.xuFeatCard .more{
    display:inline-flex;align-items:center;gap:6px;
    margin-top:16px;font-size:.78rem;font-weight:800;
    color:var(--c1);text-decoration:none;transition:.25s;
}
.xuFeatCard:hover .more{gap:10px}

/* ================= KOLEKSI TERBARU (UPGRADED) ================= */
.xuNewCol{padding-top:80px;padding-bottom:80px}
.xuNewHead{text-align:center;margin-bottom:52px}
.xuNewKicker{
    display:inline-flex;align-items:center;gap:8px;
    padding:7px 18px;
    background:rgba(5,150,105,.08);
    color:var(--xe-emerald);
    border:1px solid rgba(5,150,105,.2);
    border-radius:999px;
    font-size:.7rem;font-weight:800;
    letter-spacing:.18em;text-transform:uppercase;
    margin-bottom:16px;
}
html.xu-dark .xuNewKicker{background:rgba(245,158,11,.1);color:var(--xe-gold);border-color:rgba(245,158,11,.25)}
.xuNewTitle{
    font-family:'Neuton',Georgia,serif;
    font-size:clamp(1.8rem,4vw,2.6rem);
    font-weight:700;color:#0f172a;
    margin:0 0 12px;line-height:1.15;
}
.xuNewTitle span{
    color:transparent;
    background:linear-gradient(90deg,var(--xe-emerald),var(--xe-gold));
    -webkit-background-clip:text;background-clip:text;
    -webkit-text-fill-color:transparent;
}
html.xu-dark .xuNewTitle{color:#f1f5f9}
.xuNewSub{color:#64748b;max-width:560px;margin:0 auto;font-size:1rem;line-height:1.6}
html.xu-dark .xuNewSub{color:#94a3b8}

/* Card dengan thumbnail */
.xuCard{
    position:relative;overflow:hidden;
    background:#fff;border-radius:22px;
    border:1px solid rgba(15,23,42,.06);
    box-shadow:0 10px 30px rgba(15,23,42,.06);
    transition:all .45s cubic-bezier(.2,.8,.2,1);
    cursor:pointer;height:100%;
    display:flex;flex-direction:column;
}
html.xu-dark .xuCard{background:#0f1e1f;border-color:rgba(5,150,105,.2);box-shadow:0 10px 30px rgba(0,0,0,.3)}
.xuCard:hover{transform:translateY(-9px);box-shadow:0 32px 70px rgba(5,150,105,.22);border-color:rgba(5,150,105,.35)}
html.xu-dark .xuCard:hover{box-shadow:0 32px 70px rgba(5,150,105,.3);border-color:rgba(245,158,11,.4)}

/* Thumbnail Cover */
.xuCardCover{
    position:relative;height:180px;overflow:hidden;
    background:linear-gradient(135deg,#064e3b 0%,#0a2920 100%);
    display:flex;align-items:center;justify-content:center;
}
.xuCardCover::before{
    content:'';position:absolute;inset:0;
    background:
        radial-gradient(circle at 20% 30%,rgba(110,231,183,.25),transparent 50%),
        radial-gradient(circle at 80% 70%,rgba(251,191,36,.18),transparent 50%);
    pointer-events:none;
}
.xuCardCover i{font-size:3rem;color:rgba(255,255,255,.85);z-index:2;transition:.4s}
.xuCard:hover .xuCardCover i{transform:scale(1.15) rotate(-8deg);color:var(--xe-gold)}
.xuCardCover .yr{
    position:absolute;top:14px;right:14px;z-index:3;
    padding:5px 12px;border-radius:999px;
    background:rgba(255,255,255,.15);backdrop-filter:blur(10px);
    color:#fff;font-size:.72rem;font-weight:800;
    border:1px solid rgba(255,255,255,.25);
}

.xuCard::before{
    content:'';position:absolute;top:0;left:0;right:0;height:4px;
    background:linear-gradient(90deg,var(--xe-emerald),var(--xe-teal),var(--xe-gold));
    background-size:200% 100%;animation:xuGrad 4s linear infinite;z-index:2;
}
.xuShine{
    position:absolute;top:0;left:-100%;width:100%;height:100%;
    background:linear-gradient(100deg,transparent 20%,rgba(5,150,105,.08) 50%,transparent 80%);
    pointer-events:none;transition:left .7s ease;z-index:1;
}
.xuCard:hover .xuShine{left:120%}
.xuCardBody{padding:24px;display:flex;flex-direction:column;flex:1;position:relative;z-index:2}

.xuCardTop{display:flex;align-items:center;justify-content:space-between;margin-bottom:14px;flex-wrap:wrap;gap:8px}
.xuCardTag{
    display:inline-flex;align-items:center;gap:6px;
    padding:4px 12px;
    background:linear-gradient(135deg,rgba(5,150,105,.10),rgba(8,145,178,.10));
    color:var(--xe-emerald);
    border:1px solid rgba(5,150,105,.18);
    border-radius:999px;
    font-size:.66rem;font-weight:800;
    letter-spacing:.06em;text-transform:uppercase;
}
html.xu-dark .xuCardTag{background:rgba(245,158,11,.08);color:var(--xe-gold);border-color:rgba(245,158,11,.2)}
.xuCardDate{color:#94a3b8;font-weight:600;font-size:.74rem;display:inline-flex;align-items:center;gap:5px}

.xuCardTitle{font-size:1.05rem;font-weight:800;line-height:1.5;color:#0f172a;margin:0 0 12px;min-height:3.3em}
.xuCardTitle a{color:inherit;text-decoration:none;transition:color .2s}
.xuCard:hover .xuCardTitle a{color:var(--xe-emerald)}
html.xu-dark .xuCardTitle{color:#f1f5f9}
html.xu-dark .xuCard:hover .xuCardTitle a{color:var(--xe-gold)}

.xuCardDesc{color:#64748b;font-size:.83rem;line-height:1.65;margin:0 0 18px;min-height:4.2em;text-align:justify;flex:1}
html.xu-dark .xuCardDesc{color:#94a3b8}

.xuCardStats{
    display:flex;align-items:center;gap:14px;
    padding:12px 0 14px;
    border-top:1px dashed rgba(15,23,42,.08);
    font-size:.72rem;color:#94a3b8;font-weight:600;
}
html.xu-dark .xuCardStats{border-top-color:rgba(5,150,105,.15)}
.xuCardStats span{display:inline-flex;align-items:center;gap:5px}
.xuCardStats i{color:var(--xe-emerald)}
html.xu-dark .xuCardStats i{color:var(--xe-gold)}

.xuCardBtn{
    display:inline-flex;align-items:center;justify-content:center;gap:8px;
    padding:11px 22px;width:100%;
    background:linear-gradient(90deg,var(--xe-emerald),var(--xe-teal));
    color:#fff;text-decoration:none;
    border-radius:12px;
    font-weight:700;font-size:.83rem;
    box-shadow:0 8px 20px rgba(5,150,105,.3);
    transition:.3s;
    position:relative;overflow:hidden;
}
.xuCardBtn::before{
    content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;
    background:linear-gradient(100deg,transparent 20%,rgba(255,255,255,.3) 50%,transparent 80%);
    transition:left .6s ease;
}
.xuCardBtn:hover{filter:brightness(1.12);color:#fff;text-decoration:none;box-shadow:0 14px 30px rgba(5,150,105,.4)}
.xuCardBtn:hover::before{left:120%}

/* ================= CTA BAND ================= */
.xuCTA{
    position:relative;overflow:hidden;
    margin:20px auto 80px;max-width:1280px;
    padding:56px 50px;
    border-radius:28px;
    background:linear-gradient(120deg,var(--xe-emerald) 0%,var(--xe-teal) 55%,#064e3b 100%);
    color:#fff;
    display:flex;align-items:center;justify-content:space-between;gap:24px;flex-wrap:wrap;
    box-shadow:0 30px 70px rgba(5,150,105,.3);
    isolation:isolate;
}
.xuCTA::before{
    content:'';position:absolute;top:-60%;right:-8%;width:520px;height:420px;
    border-radius:50%;
    background:radial-gradient(circle,rgba(255,255,255,.25),transparent 65%);
    animation:xuFloat 12s ease-in-out infinite alternate;
}
.xuCTA::after{
    content:'';position:absolute;bottom:-40%;left:-10%;width:380px;height:380px;
    border-radius:50%;
    background:radial-gradient(circle,rgba(245,158,11,.2),transparent 65%);
    animation:xuFloat 15s ease-in-out 2s infinite alternate;
}
.xuCTA .wrap{position:relative;z-index:2;flex:1;min-width:280px}
.xuCTA .wrap h3{font-family:'Neuton',Georgia,serif;font-size:clamp(1.5rem,3vw,2.1rem);margin:0 0 8px;font-weight:700}
.xuCTA .wrap p{margin:0;opacity:.92;font-size:.95rem;line-height:1.6}
.xuCTA .btn{
    position:relative;z-index:2;
    display:inline-flex;align-items:center;gap:10px;
    padding:15px 34px;border-radius:999px;
    background:#fff;color:var(--xe-emerald);
    font-weight:900;font-size:.95rem;text-decoration:none;
    box-shadow:0 14px 34px rgba(0,0,0,.25);transition:.3s;
    white-space:nowrap;
}
.xuCTA .btn:hover{transform:translateY(-3px) scale(1.03);color:#064e3b;text-decoration:none}

/* ================= DARK MODE ================= */
html.xu-dark body{background:#0b1020!important}
html.xu-dark #xuHero{background:radial-gradient(900px 520px at 8% 112%,rgba(8,145,178,.28),transparent 60%),radial-gradient(1100px 620px at 92% -10%,rgba(5,150,105,.25),transparent 60%),linear-gradient(160deg,#06181a 0%,#042f23 45%,#06181a 100%)}
html.xu-dark .xuFloatBadge{background:rgba(5,150,105,.2);border-color:rgba(5,150,105,.3)}
html.xu-dark .xuWave1,html.xu-dark .xuWave2{fill:#0b1020!important}
html.xu-dark .xuSliderWrap .swiper{border-color:rgba(5,150,105,.25)}
html.xu-dark .xuCardCover{background:linear-gradient(135deg,#0a5c4a 0%,#06181a 100%)}
html.xu-dark .xuCardFoot{border-top-color:rgba(5,150,105,.15)}

@media (max-width:768px){
    #xuHero{padding:60px 18px 110px;min-height:auto}
    .xuCounters{gap:18px;margin-top:36px}
    .xuCounters .sep{display:none}
    .xuCountWrap{min-width:100px}
    .xuSearchBox button{padding:0 20px;font-size:.82rem}
    .xuSearchBox input{padding:18px 12px;font-size:.92rem}
    .xuSliderWrap{margin-top:-50px}
    .xuSliderWrap .swiper-slide{min-height:280px}
    .xuSliderWrap .swiper-slide img{height:280px}
    .xuSlideCap{padding:24px 28px}
    .xuCTA{padding:38px 28px;margin:20px 16px 60px}
    .xuScrollCue{display:none}
    .xuFeatCard{padding:26px 22px}
}
</style>

<!-- ============ HERO GALAXY ============ -->
<div id="xuHero">
    <canvas id="xuStars"></canvas>
    <div class="xuOrb o1"></div>
    <div class="xuOrb o2"></div>
    <div class="xuOrb o3"></div>

    <!-- Floating Badges -->
    <div class="xuFloatBadge b1">
        <span class="ico"><i class="fa fa-check"></i></span>
        <div>
            <div style="font-size:.62rem;opacity:.7;letter-spacing:.1em">TERPERCAYA</div>
            <div>1.200+ Peneliti</div>
        </div>
    </div>
    <div class="xuFloatBadge b2">
        <span class="ico"><i class="fa fa-trophy"></i></span>
        <div>
            <div style="font-size:.62rem;opacity:.7;letter-spacing:.1em">AKREDITASI</div>
            <div>OAI-PMH Ready</div>
        </div>
    </div>
    <div class="xuFloatBadge b3">
        <span class="ico"><i class="fa fa-shield"></i></span>
        <div>
            <div style="font-size:.62rem;opacity:.7;letter-spacing:.1em">INTEGRITAS</div>
            <div>100% Terverifikasi</div>
        </div>
    </div>

    <!-- Judul Hero -->
    <div style="position:relative; z-index:5; text-align:center; max-width:820px;">
        <div class="xuHeroBadge">
            <span class="dot"></span>
            Repositori Digital Terintegrasi
        </div>
        <h1 class="xuHeroTitle">Jelajahi Galaksi<br>Ilmu Pengetahuan</h1>
        <p id="xuTyping"></p>
    </div>

    <!-- Search Box -->
    <div style="position:relative; z-index:5; width:100%; max-width:740px;">
        <form action="<?= base_url('beranda/search') ?>" method="get" class="xuSearchBox">
            <div class="ico"><i class="fa fa-search"></i></div>
            <input type="search" id="search-query" name="s" placeholder="Ketik judul, pengarang, atau subyek..." autocomplete="off" required>
            <button type="submit">Cari <i class="fa fa-arrow-right"></i></button>
        </form>
        <div class="xuSearchHint">
            Tekan <kbd>Ctrl</kbd> + <kbd>K</kbd> untuk pencarian cepat
        </div>
    </div>

    <!-- Counters -->
    <div class="xuCounters">
        <div class="xuCountWrap">
            <div class="xuCounter" data-target="<?= $xu['judul'] ?>">0</div>
            <div class="xuCountLabel">Koleksi</div>
        </div>
        <div class="sep"></div>
        <div class="xuCountWrap pink">
            <div class="xuCounter" data-target="<?= $xu['penulis'] ?>">0</div>
            <div class="xuCountLabel">Penulis</div>
        </div>
        <div class="sep"></div>
        <div class="xuCountWrap blue">
            <div class="xuCounter" data-target="<?= $xu['gmd'] ?>">0</div>
            <div class="xuCountLabel">Kategori</div>
        </div>
        <div class="sep"></div>
        <div class="xuCountWrap rose">
            <div class="xuCounter" data-target="<?= $xu['view'] ?>">0</div>
            <div class="xuCountLabel">Total Dilihat</div>
        </div>
    </div>

    <!-- Scroll cue -->
    <a href="#xuWhy" class="xuScrollCue">
        <span>Scroll</span>
        <span class="arrow"><i class="fa fa-chevron-down"></i></span>
    </a>

    <!-- Wave -->
    <svg viewBox="0 0 1440 120" class="xuWave" preserveAspectRatio="none">
        <path d="M0,40 C360,120 720,0 1080,80 C1260,110 1380,50 1440,60 L1440,120 L0,120Z" class="xuWave1"/>
        <path d="M0,80 C240,30 480,100 720,60 C960,20 1200,90 1440,50 L1440,120 L0,120Z" class="xuWave2"/>
    </svg>
</div>

<!-- ============ SLIDER KOLEKSI (ANTI-GELAP) ============ -->
<div class="xuSliderWrap">
    <div class="swiper" id="xuSlider">
        <div class="swiper-wrapper">
            <?php
            $directory = 'uploads/images/sliders';
            $sliders = [];
            if (is_dir($directory)) {
                $sliders = array_values(array_filter(array_diff(scandir($directory), array('..', '.')), function ($file) {
                    return preg_match('/\.(jpg|jpeg|png|webp)$/i', $file);
                }));
            }
            $sliderMeta = [
                ['kicker' => 'FITUR UNGGULAN', 'title' => 'Galaksi Riset Interaktif', 'desc' => 'Peta visual kolaborasi ilmu pengetahuan yang memukau.', 'url' => 'beranda/galaxy', 'btn' => 'Jelajahi Galaksi', 'ico' => 'fa-star'],
                ['kicker' => 'TEKNOLOGI', 'title' => 'AI Asisten Cerdas', 'desc' => 'Tanyakan apa saja tentang koleksi kami, dijawab dalam detik.', 'url' => 'beranda/ai', 'btn' => 'Tanya AI Sekarang', 'ico' => 'fa-robot'],
                ['kicker' => 'AKSES TERBUKA', 'title' => 'Repositori 24/7', 'desc' => 'Ribuan karya ilmiah tersedia kapan saja, di mana saja.', 'url' => 'beranda/search', 'btn' => 'Mulai Mencari', 'ico' => 'fa-book'],
            ];
            ?>
            <?php if (!empty($sliders)): foreach ($sliders as $key => $val): $m = $sliderMeta[$key % count($sliderMeta)]; ?>
                <div class="swiper-slide">
                    <img src="<?= base_url($directory . '/' . $val) ?>" alt="Slider <?= $key + 1 ?>" loading="lazy">
                    <div class="xuSlideCap">
                        <span class="kicker"><?= $m['kicker'] ?></span>
                        <h3><?= $m['title'] ?></h3>
                        <p><?= $m['desc'] ?></p>
                        <a href="<?= base_url($m['url']) ?>" class="btn"><?= $m['btn'] ?> <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            <?php endforeach; else: foreach ($sliderMeta as $key => $m): ?>
                <div class="swiper-slide xuSlideDefault xuSlideGrad<?= $key ?>">
                    <div class="xuSlideCap">
                        <span class="kicker"><?= $m['kicker'] ?></span>
                        <h3><i class="fa <?= $m['ico'] ?>" style="margin-right:10px;color:var(--xe-gold)"></i><?= $m['title'] ?></h3>
                        <p><?= $m['desc'] ?></p>
                        <a href="<?= base_url($m['url']) ?>" class="btn"><?= $m['btn'] ?> <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            <?php endforeach; endif; ?>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</div>

<!-- ============ KENAPA DIFOSS? ============ -->
<section class="xuWhy" id="xuWhy">
    <div class="container">
        <div class="xuSecHead">
            <span class="xuSecKicker"><i class="fa fa-star"></i> Kenapa DIFOSS</span>
            <h2 class="xuSecTitle">Pengalaman Riset <span>Kelas Dunia</span></h2>
            <p class="xuSecSub">Platform repositori dengan fitur premium yang dirancang untuk mempercepat penyebaran ilmu pengetahuan.</p>
        </div>

        <div class="xuWhyGrid">
            <div class="xuFeatCard" style="--c1:#059669;--c2:#0891b2">
                <div class="xuFeatIco"><i class="fa fa-star"></i></div>
                <h3>Galaksi Riset</h3>
                <p>Peta visual interaktif yang menampilkan hubungan antar topik penelitian seperti rasi bintang.</p>
                <a href="<?= base_url('beranda/galaxy') ?>" class="more">Jelajahi <i class="fa fa-arrow-right"></i></a>
            </div>
            <div class="xuFeatCard" style="--c1:#f59e0b;--c2:#059669">
                <div class="xuFeatIco"><i class="fa fa-cube"></i></div>
                <h3>Rak Virtual 3D</h3>
                <p>Blusukan di perpustakaan digital tiga dimensi — susuri rak demi rak seperti dunia nyata.</p>
                <a href="<?= base_url('beranda/rak') ?>" class="more">Masuk Rak <i class="fa fa-arrow-right"></i></a>
            </div>
            <div class="xuFeatCard" style="--c1:#0891b2;--c2:#059669">
                <div class="xuFeatIco"><i class="fa fa-robot"></i></div>
                <h3>AI Asisten</h3>
                <p>Tanyakan apa saja tentang koleksi kami — asisten cerdas menjawab dalam hitungan detik.</p>
                <a href="<?= base_url('beranda/ai') ?>" class="more">Tanya AI <i class="fa fa-arrow-right"></i></a>
            </div>
            <div class="xuFeatCard" style="--c1:#059669;--c2:#f59e0b">
                <div class="xuFeatIco"><i class="fa fa-shield"></i></div>
                <h3>Integrity Scanner</h3>
                <p>Setiap dokumen diverifikasi keasliannya secara otomatis dengan fingerprint n-gram.</p>
                <a href="<?= base_url('information') ?>" class="more">Pelajari <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</section>

<!-- ============ KOLEKSI TERBARU ============ -->
<div class="container xuNewCol">
    <div class="xuNewHead">
        <span class="xuNewKicker"><i class="fa fa-bolt"></i> Fresh Drop</span>
        <h2 class="xuNewTitle">New <span>Collections</span></h2>
        <p class="xuNewSub">Koleksi terbaru dari repositori institusional yang siap dijelajahi.</p>
    </div>

    <div class="row">
        <?php if (empty($data)): ?>
            <div class="col-12"><p style="text-align:center;color:var(--xp-muted)">Belum ada koleksi.</p></div>
        <?php else: ?>
        <?php foreach ($data as $key => $value) : ?>
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                <article class="xuCard">
                    <div class="xuCardCover">
                        <span class="yr"><?= esc($value->publish_year ?? '—') ?></span>
                        <i class="fa fa-book"></i>
                    </div>
                    <div class="xuShine"></div>
                    <div class="xuCardBody">
                        <div class="xuCardTop">
                            <span class="xuCardTag"><i class="fa fa-tag"></i> <?= esc($value->gmd) ?></span>
                            <small class="xuCardDate"><i class="fa fa-calendar-o"></i> <?= datetimeIdn($value->input_date) ?></small>
                        </div>
                        <h3 class="xuCardTitle">
                            <a href="<?= base_url('beranda/detail/' . slim_encrypt($value->biblio_id)) ?>">
                                <?= character_limiter($value->title, 60) ?>
                            </a>
                        </h3>
                        <p class="xuCardDesc"><?= character_limiter(strip_tags($value->notes ?? ''), 120) ?></p>
                        <div class="xuCardStats">
                            <span><i class="fa fa-eye"></i> <?= number_format($value->hits ?? 0, 0, ',', '.') ?></span>
                            <span><i class="fa fa-download"></i> ETD</span>
                        </div>
                        <a class="xuCardBtn" href="<?= base_url('beranda/detail/' . slim_encrypt($value->biblio_id)) ?>">
                            Lihat Detail <i class="fa fa-arrow-right"></i>
                        </a>
                    </div>
                </article>
            </div>
        <?php endforeach; ?>
        <?php endif ?>
    </div>
</div>

<!-- ============ CTA BAND ============ -->
<div class="container">
    <div class="xuCTA">
        <div class="wrap">
            <h3>Mulai Berbagi Ilmu Hari Ini</h3>
            <p>Bergabunglah dengan ribuan peneliti dan kontribusikan karya Anda ke repositori terbuka.</p>
        </div>
        <a class="btn" href="<?= base_url('daftar') ?>"><i class="fa fa-rocket"></i> Daftar Gratis</a>
    </div>
</div>

<!-- ============ MESIN ANIMASI ============ -->
<script>
document.addEventListener('DOMContentLoaded', function(){
    // 1) Partikel Bintang Canvas
    var cv = document.getElementById('xuStars');
    if(cv){
        var ctx = cv.getContext('2d');
        function resizeCv(){ cv.width = cv.parentElement.offsetWidth; cv.height = cv.parentElement.offsetHeight; }
        resizeCv();
        var stars = [];
        for(var i=0;i<150;i++){
            stars.push({
                x: Math.random()*cv.width, y: Math.random()*cv.height,
                r: Math.random()*1.8+.3, a: Math.random(), d: Math.random()*.005+.002
            });
        }
        function drawStars(){
            ctx.clearRect(0,0,cv.width,cv.height);
            stars.forEach(function(s){
                s.a += s.d;
                if(s.a > 1 || s.a < 0) s.d = -s.d;
                ctx.beginPath();
                ctx.arc(s.x, s.y, s.r, 0, Math.PI*2);
                ctx.fillStyle = 'rgba(255,255,255,' + Math.abs(s.a).toFixed(2) + ')';
                ctx.fill();
            });
            requestAnimationFrame(drawStars);
        }
        drawStars();
        window.addEventListener('resize', resizeCv);
    }

    // 2) Typing Effect
    var el = document.getElementById('xuTyping');
    if(el){
        var texts = [
            'Temukan ribuan karya ilmiah dari berbagai disiplin ilmu...',
            'Akses skripsi, tesis, dan disertasi kapan saja, di mana saja...',
            'Repositori digital untuk generasi peneliti masa depan...',
            'Ilmu terbuka untuk semua, tanpa batas ruang dan waktu.'
        ];
        var ti=0, ci=0, isDel=false;
        function typeLoop(){
            var cur = texts[ti];
            if(!isDel){
                el.textContent = cur.substring(0, ci+1); ci++;
                if(ci >= cur.length){ isDel=true; setTimeout(typeLoop, 2200); return; }
                setTimeout(typeLoop, 45);
            } else {
                el.textContent = cur.substring(0, ci-1); ci--;
                if(ci <= 0){ isDel=false; ti=(ti+1)%texts.length; setTimeout(typeLoop, 400); return; }
                setTimeout(typeLoop, 25);
            }
        }
        typeLoop();
    }

    // 3) Counter Animasi
    document.querySelectorAll('.xuCounter').forEach(function(el){
        var target = parseInt(el.getAttribute('data-target'));
        if(isNaN(target) || target<=0) return;
        var start = null, dur = 2200;
        function step(ts){
            if(!start) start = ts;
            var p = Math.min((ts-start)/dur, 1);
            var eased = 1 - Math.pow(1-p, 4);
            el.textContent = Math.floor(eased*target).toLocaleString('id-ID');
            if(p<1) requestAnimationFrame(step);
            else el.textContent = target.toLocaleString('id-ID');
        }
        var obs = new IntersectionObserver(function(entries){
            if(entries[0].isIntersecting){ requestAnimationFrame(step); obs.disconnect(); }
        }, {threshold:.3});
        obs.observe(el);
    });

    // 4) Kartu animasi masuk
    document.querySelectorAll('.xuCard, .xuFeatCard').forEach(function(card, idx){
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        var obs = new IntersectionObserver(function(entries){
            if(entries[0].isIntersecting){
                setTimeout(function(){
                    card.style.transition = 'all .6s cubic-bezier(.2,.8,.2,1)';
                    card.style.opacity = '1';
                    card.style.transform = 'none';
                }, idx*100);
                obs.disconnect();
            }
        }, {threshold:.15});
        obs.observe(card);
    });

    // 5) Swiper slider — aman dari double-init & loop rusak
    (function(){
        if (typeof Swiper === 'undefined') return;
        var el = document.getElementById('xuSlider');
        if (!el || el.classList.contains('swiper-initialized')) return;
        var n = el.querySelectorAll('.swiper-slide').length;
        if (!n) return;
        new Swiper(el, {
            loop: n > 1,
            autoplay: n > 1 ? { delay: 5500, disableOnInteraction: false } : false,
            speed: 900,
            pagination: { el: el.querySelector('.swiper-pagination'), clickable: true }
        });
    })();
});
</script>