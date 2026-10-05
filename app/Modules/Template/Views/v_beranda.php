<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title><?= $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
    <meta name="description" content="Repositori Institusional DIFOSS RANGKUI — Emerald Forest Ultimate Edition">
    <meta name="author" content="DIFOSS">
    <meta name="theme-color" content="#059669">
    <link rel="shortcut icon" href="<?= base_url('favicon.ico') ?>" type="image/x-icon">
    <link rel="icon" href="<?= base_url('favicon.ico') ?>" type="image/x-icon">
    <meta name="theme-name" content="reporter-emerald-ultimate" />

    <!-- PWA Meta -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="DIFOSS Rangkui">
    <link rel="manifest" href="<?= base_url('manifest.json') ?>">

    <!-- SEO & Social -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?= esc($title) ?>">
    <meta property="og:description" content="Repositori Institusional DIFOSS RANGKUI — Ilmu terbuka untuk semua">
    <meta property="og:site_name" content="DIFOSS Rangkui">
    <meta name="twitter:card" content="summary_large_image">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Neuton:wght@700&family=Work+Sans:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&family=JetBrains+Mono:wght@500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url('assets/reporter/plugins/bootstrap/bootstrap.min.css') ?>">
    <link href="<?= base_url('assets/vendors/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url('assets/reporter/css/style.css') ?>">
    <link href="<?= base_url('assets/custom/css/custom.css') ?>" rel="stylesheet">

    <?php if (count($css) > 0) : ?>
        <?php foreach ($css as $key => $cs) :  ?>
            <?php if (stripos($cs, "assets") !== false) : ?>
                <link rel="stylesheet" href="<?= base_url($cs . '.css?ver=' . filemtime(FCPATH . $cs . ".css")) ?>" type="text/css">
            <?php else: ?>
                <link rel="stylesheet" href="<?= $cs ?>" type="text/css">
            <?php endif ?>
        <?php endforeach ?>
    <?php endif ?>
    <script>
        var baseUrl = '<?= base_url() ?>'
    </script>

    <?php $session = session(); ?>

    <style>
    /* ================================================================
       DIFOSS PUBLIC SHELL — EMERALD FOREST ULTIMATE (ROMBAKAN TOTAL)
       ================================================================ */
    :root{
        --xp-emerald:#059669; --xp-teal:#0891b2; --xp-gold:#f59e0b;
        --xp-mint:#6ee7b7; --xp-rose:#e11d48;
        --xp-forest-deep:#0a2920; --xp-forest-mid:#115e59; --xp-forest-light:#064e3b;
        --xp-surface:#f8fafc; --xp-ink:#0f172a; --xp-muted:#64748b;
    }

    html{scroll-behavior:smooth}

    /* Noise film mewah */
    body::before{content:'';position:fixed;inset:0;pointer-events:none;z-index:9990;opacity:.035;mix-blend-mode:overlay;background-image:url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='.9' numOctaves='3'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E")}

    /* Scrollbar emerald */
    ::-webkit-scrollbar{width:10px;height:10px}
    ::-webkit-scrollbar-track{background:#f1f5f9}
    html.xu-dark ::-webkit-scrollbar-track{background:#064e3b}
    ::-webkit-scrollbar-thumb{background:linear-gradient(180deg,var(--xp-emerald),var(--xp-teal),var(--xp-gold));border-radius:10px;border:2px solid #f1f5f9}
    html.xu-dark ::-webkit-scrollbar-thumb{border-color:#064e3b}

    .xp-skip{position:absolute;left:-9999px;top:0;z-index:9999;padding:12px 20px;background:var(--xp-emerald);color:#fff;font-weight:700;border-radius:0 0 12px 0;text-decoration:none}
    .xp-skip:focus{left:0}

    .xp-reading-progress{position:fixed;top:0;left:0;height:3px;width:0;z-index:9999;background:linear-gradient(90deg,var(--xp-emerald),var(--xp-teal),var(--xp-gold));transition:width .1s ease;box-shadow:0 0 10px rgba(5,150,105,.5)}
    .xp-reading-bubble{position:fixed;top:8px;right:20px;z-index:9998;padding:4px 10px;background:linear-gradient(135deg,var(--xp-emerald),var(--xp-gold));color:#fff;font-size:.7rem;font-weight:800;border-radius:999px;box-shadow:0 4px 14px rgba(5,150,105,.4);opacity:0;transform:translateY(-10px);transition:.3s;pointer-events:none;font-family:'JetBrains Mono',monospace}
    .xp-reading-bubble.show{opacity:1;transform:none}

    .xp-cursor-glow{position:fixed;width:400px;height:400px;border-radius:50%;pointer-events:none;z-index:1;background:radial-gradient(circle,rgba(5,150,105,.08),transparent 60%);transform:translate(-50%,-50%);mix-blend-mode:screen}
    @media(max-width:768px){.xp-cursor-glow{display:none}}

    .xp-preloader{position:fixed;inset:0;z-index:10000;background:linear-gradient(135deg,#0a2920 0%,#064e3b 50%,#115e59 100%);display:flex;flex-direction:column;align-items:center;justify-content:center;transition:opacity .5s,visibility .5s}
    .xp-preloader.hide{opacity:0;visibility:hidden;pointer-events:none}
    .xp-preloader-logo{font-size:2.5rem;font-weight:900;background:linear-gradient(90deg,var(--xp-emerald),var(--xp-gold));-webkit-background-clip:text;background-clip:text;-webkit-text-fill-color:transparent;margin-bottom:20px;animation:xpPulse 2s infinite;letter-spacing:-.02em}
    @keyframes xpPulse{0%,100%{opacity:1}50%{opacity:.6}}
    .xp-preloader-bar{width:200px;height:4px;background:rgba(255,255,255,.1);border-radius:2px;overflow:hidden}
    .xp-preloader-bar::after{content:'';display:block;width:40%;height:100%;background:linear-gradient(90deg,var(--xp-emerald),var(--xp-gold));animation:xpSlide 1.2s ease-in-out infinite}
    @keyframes xpSlide{0%{transform:translateX(-100%)}100%{transform:translateX(350%)}}
    .xp-preloader-sub{color:rgba(255,255,255,.5);font-size:.75rem;margin-top:12px;letter-spacing:.15em;text-transform:uppercase;font-weight:700}

    /* ================================================================
       MARQUEE
       ================================================================ */
    .xuMarquee{background:linear-gradient(90deg,#0a2920 0%,#115e59 50%,#064e3b 100%);color:#e2e8f0;font-size:.78rem;font-weight:600;overflow:hidden;position:relative;z-index:1051;height:34px;display:flex;align-items:center;border-bottom:1px solid rgba(255,255,255,.08)}
    .xuMarquee::before{content:'';position:absolute;top:0;left:0;right:0;height:1px;background:linear-gradient(90deg,transparent,var(--xp-gold),var(--xp-teal),transparent)}
    .xuMarquee .track{display:inline-block;white-space:nowrap;padding-left:100%;animation:xuMarq 40s linear infinite}
    @keyframes xuMarq{from{transform:translateX(0)}to{transform:translateX(-100%)}}
    .xuMarquee span{margin:0 28px;display:inline-flex;align-items:center;gap:8px}
    .xuMarquee .dot{width:6px;height:6px;border-radius:50%;background:var(--xp-gold);box-shadow:0 0 8px var(--xp-gold);animation:xpPulseDot 1.8s infinite}
    .xuMarquee .hi{color:var(--xp-gold);font-weight:800}
    .xuMarquee .sep{color:rgba(255,255,255,.25)}
    .xuMarquee .new-badge{padding:1px 7px;border-radius:4px;background:var(--xp-rose);color:#fff;font-size:.6rem;font-weight:900;letter-spacing:.05em;animation:xpBlink 1.5s infinite}
    @keyframes xpBlink{0%,50%{opacity:1}51%,100%{opacity:.4}}
    @keyframes xpPulseDot{0%,100%{opacity:1}50%{opacity:.3}}

    /* ================================================================
       NAVBAR PROFESIONAL — STRUKTUR BERSIH (brand | menu | aksi)
       ================================================================ */
    header.navigation{position:sticky;top:0;z-index:1050;background:rgba(255,255,255,.96);backdrop-filter:blur(18px) saturate(1.4);-webkit-backdrop-filter:blur(18px) saturate(1.4);box-shadow:0 1px 0 rgba(15,23,42,.05),0 6px 22px rgba(15,23,42,.05);transition:all .35s cubic-bezier(.2,.8,.2,1)}
    header.navigation.shrunk{box-shadow:0 4px 30px rgba(15,23,42,.12)}
    header.navigation::after{content:'';position:absolute;left:0;right:0;bottom:0;height:2px;background:linear-gradient(90deg,transparent,var(--xp-emerald),var(--xp-gold),var(--xp-teal),transparent);opacity:.8;pointer-events:none;animation:xuLinePulse 4s ease-in-out infinite}
    @keyframes xuLinePulse{0%,100%{opacity:.6}50%{opacity:1}}

    .xu-navwrap{max-width:1440px;margin:0 auto;padding:0 22px}
    header.navigation .navbar{padding:12px 0;transition:padding .35s}
    header.navigation.shrunk .navbar{padding:7px 0}

    header.navigation .navbar-brand{flex-shrink:0;padding:0;margin-right:14px}
    header.navigation .navbar-brand img{transition:.3s;max-height:46px;width:auto;display:block}
    header.navigation.shrunk .navbar-brand img{max-height:38px}
    header.navigation .navbar-brand:hover img{transform:scale(1.04);filter:drop-shadow(0 4px 14px rgba(5,150,105,.45))}

    /* Toggler mobile */
    header.navigation .navbar-toggler{border:1.5px solid rgba(5,150,105,.25);border-radius:10px;padding:7px 10px;background:rgba(5,150,105,.06)}
    header.navigation .navbar-toggler:focus{box-shadow:0 0 0 3px rgba(5,150,105,.15)}

    /* Menu utama — pill hover + active */
    header.navigation .navbar-nav .nav-link{position:relative;color:#334155;font-weight:700;font-size:.87rem;padding:9px 15px!important;margin:0 2px;border-radius:11px;transition:all .25s;display:inline-flex;align-items:center;gap:7px}
    header.navigation .navbar-nav .nav-link i{font-size:.88rem;transition:transform .3s;color:var(--xp-emerald)}
    header.navigation .navbar-nav .nav-link:hover{color:var(--xp-emerald)!important;background:rgba(5,150,105,.08)}
    header.navigation .navbar-nav .nav-link:hover i{transform:scale(1.18) rotate(-8deg)}
    header.navigation .navbar-nav .nav-link.xu-active{background:linear-gradient(90deg,var(--xp-emerald),var(--xp-teal));color:#fff!important;box-shadow:0 8px 20px rgba(5,150,105,.3)}
    header.navigation .navbar-nav .nav-link.xu-active i{color:#fff}

    /* Dropdown menu premium */
    header.navigation .dropdown-menu{border:none;border-radius:16px;box-shadow:0 22px 50px rgba(15,23,42,.18);padding:8px;margin-top:12px;animation:xuDrop .28s cubic-bezier(.2,.9,.3,1.2);min-width:230px;border:1px solid rgba(5,150,105,.1);overflow:hidden}
    @keyframes xuDrop{from{opacity:0;transform:translateY(10px)}to{opacity:1;transform:none}}
    header.navigation .dropdown-item{border-radius:10px;padding:9px 14px;font-size:.85rem;font-weight:600;color:#475569;transition:.2s;display:flex;align-items:center;gap:10px}
    header.navigation .dropdown-item:hover{background:linear-gradient(90deg,rgba(5,150,105,.1),rgba(8,145,178,.08));color:var(--xp-emerald);transform:translateX(4px)}
    header.navigation .dropdown-item::before{content:'›';color:var(--xp-gold);font-weight:900;font-size:1rem;opacity:0;transition:.2s}
    header.navigation .dropdown-item:hover::before{opacity:1}

    /* ===== CLUSTER AKSI KANAN ===== */
    .xu-actions{display:flex;align-items:center;gap:7px;flex-wrap:nowrap}
    .xu-act{width:38px;height:38px;border-radius:11px;display:inline-flex;align-items:center;justify-content:center;background:rgba(5,150,105,.07);border:1px solid rgba(5,150,105,.14);color:var(--xp-emerald);cursor:pointer;transition:.25s;font-size:.88rem;position:relative;flex-shrink:0}
    .xu-act:hover{background:rgba(5,150,105,.15);transform:translateY(-2px);box-shadow:0 6px 14px rgba(5,150,105,.2)}
    .xu-chip{display:inline-flex;align-items:center;gap:6px;height:38px;padding:0 12px;border-radius:11px;font-family:'JetBrains Mono',monospace;font-size:.72rem;font-weight:700;white-space:nowrap;flex-shrink:0}
    .xu-chip-clock{color:var(--xp-emerald);background:rgba(5,150,105,.06);border:1px solid rgba(5,150,105,.12)}
    .xu-chip-clock i{color:var(--xp-gold)}
    .xu-chip-live{color:var(--xp-gold);background:rgba(245,158,11,.06);border:1px solid rgba(245,158,11,.14)}
    .xu-chip-live .live-dot{width:7px;height:7px;border-radius:50%;background:#10b981;box-shadow:0 0 8px #10b981;animation:xpPulseDot 1.8s infinite}

    .xp-lang-switch{display:inline-flex;align-items:center;border-radius:11px;background:rgba(5,150,105,.06);border:1px solid rgba(5,150,105,.12);overflow:hidden;flex-shrink:0}
    .xp-lang-btn{padding:9px 11px;font-size:.68rem;font-weight:800;color:var(--xp-muted);background:transparent;border:none;cursor:pointer;transition:.25s;letter-spacing:.05em}
    .xp-lang-btn.active{background:linear-gradient(135deg,var(--xp-emerald),var(--xp-gold));color:#fff}
    .xp-lang-btn:hover:not(.active){color:var(--xp-emerald)}

    .xu-a11y-wrap{position:relative}
    .xp-a11y-panel{position:absolute;top:calc(100% + 10px);right:0;width:260px;background:#fff;border-radius:16px;box-shadow:0 20px 50px rgba(10,41,32,.2);border:1px solid rgba(5,150,105,.12);padding:16px;opacity:0;transform:translateY(-8px) scale(.98);pointer-events:none;transition:.25s;z-index:1200}
    .xp-a11y-panel.open{opacity:1;transform:none;pointer-events:auto}
    .xp-a11y-panel h4{font-size:.78rem;font-weight:800;color:var(--xp-ink);margin:0 0 12px;text-transform:uppercase;letter-spacing:.08em}
    .xp-a11y-row{display:flex;gap:6px;margin-bottom:10px}
    .xp-a11y-row button{flex:1;padding:8px;border-radius:8px;border:1.5px solid rgba(5,150,105,.2);background:#fff;color:var(--xp-emerald);font-weight:700;cursor:pointer;transition:.2s;font-size:.75rem}
    .xp-a11y-row button:hover{background:rgba(5,150,105,.08)}
    .xp-a11y-row button.active{background:linear-gradient(135deg,var(--xp-emerald),var(--xp-gold));color:#fff;border-color:transparent}
    .xp-a11y-label{font-size:.7rem;color:var(--xp-muted);font-weight:700;margin-bottom:4px;text-transform:uppercase;letter-spacing:.05em}
    html.xu-a11y-md body{font-size:17px!important}
    html.xu-a11y-lg body{font-size:19px!important}

    /* Auth buttons */
    .xu-auth .btn{border-radius:11px;font-weight:700;font-size:.8rem;padding:8px 16px;border:1.5px solid rgba(5,150,105,.2);background:#fff;color:var(--xp-ink);transition:.25s;display:inline-flex;align-items:center;gap:7px;box-shadow:0 2px 10px rgba(15,23,42,.06)}
    .xu-auth .btn:hover{border-color:var(--xp-emerald);color:var(--xp-emerald);transform:translateY(-1px);box-shadow:0 6px 18px rgba(5,150,105,.25)}
    .xu-auth .btn-xu-primary{background:linear-gradient(90deg,var(--xp-emerald),var(--xp-teal));color:#fff!important;border-color:transparent;box-shadow:0 8px 20px rgba(5,150,105,.3)}
    .xu-auth .btn-xu-primary:hover{filter:brightness(1.1);transform:translateY(-1px)}

    /* ===== RESPONSIVE NAVBAR PRESISI ===== */
    .xu-actions{flex-shrink:0}
    @media(max-width:1500px){
        .xu-chip-clock{display:none!important}
        header.navigation .navbar-nav .nav-link{padding:9px 11px!important;font-size:.85rem}
    }
    @media(max-width:1400px){
        .xu-chip-live{display:none!important}
    }
    @media(max-width:1350px){
        .xp-lang-switch{display:none!important}
    }
    @media(max-width:1250px){
        #xpSearchBtn{display:none!important}
        header.navigation .navbar-nav .nav-link{padding:9px 9px!important;font-size:.83rem;gap:5px}
    }
    @media(max-width:1100px){
        .xu-a11y-wrap{display:none!important}
    }
    @media(max-width:991px){
        .xuMarquee{height:auto;padding:8px 0;font-size:.72rem}
        header.navigation .navbar-collapse{background:#fff;border-radius:16px;margin-top:12px;padding:14px;box-shadow:0 20px 50px rgba(15,23,42,.12);border:1px solid rgba(5,150,105,.1)}
        html.xu-dark header.navigation .navbar-collapse{background:#064e3b}
        header.navigation .navbar-nav .nav-link{width:100%;justify-content:flex-start;padding:11px 14px!important;font-size:.9rem}
        .xu-actions{gap:6px}
    }
    @media(max-width:575px){
        #xuThemeToggle{display:none!important}
    }
    @media(min-width:992px){
        header.navigation .navbar-collapse{flex-basis:auto}
    }

    /* ================================================================
       FOOTER SUPER — EMERALD FOREST
       ================================================================ */
    .xuFoot{position:relative;background:linear-gradient(180deg,#0a2920 0%,#115e59 60%,#064e3b 100%);color:rgba(255,255,255,.78);margin-top:60px;overflow:hidden;font-family:'Plus Jakarta Sans','Work Sans',sans-serif;padding-top:50px}
    .xuFoot::before{content:'';position:absolute;top:0;left:0;right:0;height:3px;background:linear-gradient(90deg,var(--xp-emerald),var(--xp-gold),var(--xp-teal),var(--xp-emerald));background-size:300% 100%;animation:xuFSlide 6s linear infinite;z-index:2}
    @keyframes xuFSlide{0%{background-position:0% 0}100%{background-position:300% 0}}
    .xuFootSky{position:absolute;inset:0;pointer-events:none;overflow:hidden;z-index:0}
    .xuFootStar{position:absolute;background:#fff;border-radius:50%;animation:xuTwinkle infinite}
    @keyframes xuTwinkle{0%,100%{opacity:.2;transform:scale(.8)}50%{opacity:1;transform:scale(1.2)}}
    .xuFootAurora{position:absolute;width:520px;height:520px;border-radius:50%;filter:blur(90px);opacity:.4;pointer-events:none;animation:xuAurDrift 14s ease-in-out infinite alternate}
    .xuFootAurora.a1{background:radial-gradient(circle,var(--xp-emerald),transparent 70%);top:-220px;left:-120px}
    .xuFootAurora.a2{background:radial-gradient(circle,var(--xp-teal),transparent 70%);bottom:-180px;right:-120px;animation-delay:-7s}
    .xuFootAurora.a3{background:radial-gradient(circle,var(--xp-gold),transparent 70%);top:10%;left:40%;width:380px;height:380px;animation-delay:-4s}
    @keyframes xuAurDrift{from{transform:translate(0,0)}to{transform:translate(60px,30px)}}
    .xuFootMain{position:relative;z-index:2;padding:40px 0 30px}
    .xuFoot h3{color:#fff;font-size:.92rem;font-weight:800;letter-spacing:.06em;text-transform:uppercase;margin-bottom:16px;display:flex;align-items:center;gap:10px;padding-bottom:10px;border-bottom:1px dashed rgba(255,255,255,.12)}
    .xuFoot h3 .xuH3Ico{width:28px;height:28px;border-radius:8px;display:inline-flex;align-items:center;justify-content:center;font-size:.82rem;flex-shrink:0}
    .xuFoot h3.h-brand .xuH3Ico{background:linear-gradient(135deg,var(--xp-emerald),var(--xp-gold))}
    .xuFoot h3.h-explore .xuH3Ico{background:linear-gradient(135deg,var(--xp-gold),var(--xp-emerald))}
    .xuFoot h3.h-contact .xuH3Ico{background:linear-gradient(135deg,var(--xp-teal),var(--xp-emerald))}
    .xuFoot h3.h-social .xuH3Ico{background:linear-gradient(135deg,var(--xp-gold),var(--xp-teal))}
    .xuFoot .afooter{color:var(--xp-teal)!important;font-weight:600;text-decoration:none;transition:.25s;border-bottom:1px dashed rgba(8,145,178,.3)}
    .xuFoot .afooter:hover{color:var(--xp-gold)!important;text-shadow:0 0 12px rgba(245,158,11,.6);border-bottom-color:var(--xp-gold)}
    .xuFootAddr{line-height:1.9;color:rgba(255,255,255,.72);font-size:.88rem}
    .xuFootAddr .xuLine{display:flex;align-items:flex-start;gap:10px;margin-bottom:4px}
    .xuFootAddr .xuLine i{color:var(--xp-gold);margin-top:6px;font-size:.78rem;flex-shrink:0}
    .xuFootLogo{width:55%;max-width:210px;margin-bottom:18px;filter:drop-shadow(0 0 18px rgba(5,150,105,.4));transition:.35s}
    .xuFootLogo:hover{transform:scale(1.05) rotate(-2deg);filter:drop-shadow(0 0 24px rgba(245,158,11,.65))}
    .xuFootTag{color:rgba(255,255,255,.58);font-size:.82rem;line-height:1.7;margin-bottom:16px}
    .xuFootVer{display:inline-flex;align-items:center;gap:10px;margin-top:8px;flex-wrap:wrap}
    .xuFootVer span{padding:4px 10px;border-radius:7px;background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.1);font-size:.7rem;color:rgba(255,255,255,.7);font-weight:700;letter-spacing:.05em}
    .xuFootVer span.live{background:rgba(5,150,105,.15);color:#86efac;border-color:rgba(5,150,105,.3)}
    .xuFootVer span.live::before{content:'';width:6px;height:6px;border-radius:50%;background:var(--xp-emerald);box-shadow:0 0 8px var(--xp-emerald);margin-right:6px;animation:xpPulseDot 1.8s infinite}
    .xuJelajah{display:grid;grid-template-columns:1fr 1fr;gap:9px}
    .xuJelajah a{display:flex;align-items:center;gap:10px;padding:11px 13px;border-radius:11px;background:rgba(255,255,255,.04);border:1px solid rgba(255,255,255,.08);color:#e2e8f0;text-decoration:none;font-weight:700;font-size:.8rem;transition:.3s;position:relative;overflow:hidden}
    .xuJelajah a::before{content:'';position:absolute;inset:0;background:linear-gradient(90deg,transparent,rgba(5,150,105,.15),transparent);transform:translateX(-100%);transition:transform .6s}
    .xuJelajah a:hover::before{transform:translateX(100%)}
    .xuJelajah a:hover{background:rgba(5,150,105,.18);border-color:rgba(245,158,11,.4);transform:translateY(-2px);box-shadow:0 8px 18px rgba(5,150,105,.25)}
    .xuJelajah .xuJIco{width:30px;height:30px;border-radius:9px;display:inline-flex;align-items:center;justify-content:center;font-size:.8rem;color:#fff;flex-shrink:0}
    .xuJelajah .xuJIco.jg{background:linear-gradient(135deg,var(--xp-emerald),var(--xp-teal))}
    .xuJelajah .xuJIco.jr{background:linear-gradient(135deg,var(--xp-gold),var(--xp-emerald))}
    .xuJelajah .xuJIco.ja{background:linear-gradient(135deg,var(--xp-teal),var(--xp-emerald))}
    .xuJelajah .xuJIco.jt{background:linear-gradient(135deg,var(--xp-gold),var(--xp-emerald))}
    .xuJelajah .xuJIco.jp{background:linear-gradient(135deg,var(--xp-emerald),var(--xp-gold))}
    .xuJelajah .xuJIco.js{background:linear-gradient(135deg,var(--xp-teal),var(--xp-emerald))}
    .xuJelajah small{display:block;color:rgba(255,255,255,.45);font-weight:500;font-size:.68rem;margin-top:2px;letter-spacing:.02em}
    .xuSocial{display:inline-flex;align-items:center;justify-content:center;width:48px;height:48px;border-radius:14px;background:rgba(255,255,255,.07);border:1px solid rgba(255,255,255,.14);margin:0 5px;transition:.35s;overflow:hidden;position:relative}
    .xuSocial img{width:24px;height:24px;transition:.35s;position:relative;z-index:1}
    .xuSocial:hover{transform:translateY(-5px) rotate(-6deg);background:linear-gradient(135deg,var(--xp-emerald),var(--xp-gold));border-color:transparent;box-shadow:0 14px 30px rgba(5,150,105,.5)}
    .xuSocial:hover img{filter:brightness(0) invert(1);transform:scale(1.15)}
    .xuFootBottom{position:relative;border-top:1px solid rgba(255,255,255,.08);padding:20px 0;font-size:.82rem;background:rgba(0,0,0,.2);z-index:2}
    .xuFootBottom strong{background:linear-gradient(90deg,var(--xp-gold),var(--xp-emerald),var(--xp-teal));-webkit-background-clip:text;background-clip:text;-webkit-text-fill-color:transparent;font-weight:800;background-size:200% 100%;animation:xuGrad 5s linear infinite}
    @keyframes xuGrad{to{background-position:200% 0}}
    .xuFootBottom .xuTyped{font-family:'JetBrains Mono',monospace;color:var(--xp-gold);font-weight:700}
    .xuFootBottom .xuTyped::after{content:'▍';color:var(--xp-emerald);animation:xuBlink 1s infinite;margin-left:2px}
    @keyframes xuBlink{0%,50%{opacity:1}51%,100%{opacity:0}}

    .xuRocket{position:fixed;right:22px;bottom:22px;width:52px;height:52px;border-radius:50%;border:none;background:linear-gradient(135deg,var(--xp-emerald),var(--xp-gold));color:#fff;font-size:1.2rem;cursor:pointer;box-shadow:0 12px 30px rgba(5,150,105,.5);z-index:1049;opacity:0;transform:translateY(20px) scale(.8);transition:all .4s cubic-bezier(.2,.9,.3,1.4);display:flex;align-items:center;justify-content:center}
    .xuRocket.show{opacity:1;transform:translateY(0) scale(1)}
    .xuRocket:hover{transform:translateY(-6px) scale(1.1);box-shadow:0 18px 40px rgba(245,158,11,.65)}
    .xuRocket::before{content:'';position:absolute;bottom:-10px;left:50%;transform:translateX(-50%);width:14px;height:20px;background:linear-gradient(180deg,var(--xp-gold),var(--xp-emerald),transparent);border-radius:0 0 50% 50%;filter:blur(3px);opacity:0;transition:.3s}
    .xuRocket.show::before{opacity:.9;animation:xuFlame .3s ease-in-out infinite alternate}
    @keyframes xuFlame{from{height:16px;opacity:.85}to{height:24px;opacity:1}}

    @media(max-width:768px){
        .xuFootBottom .row>div{text-align:center!important;margin-bottom:8px}
        .xuJelajah{grid-template-columns:1fr}
        .xuRocket{right:14px;bottom:14px;width:46px;height:46px}
    }

    /* ================================================================
       MODE GELAP GLOBAL
       ================================================================ */
    html.xu-dark body{background:#0a2920!important;color:#e2e8f0}
    html.xu-dark header.navigation{background:rgba(10,41,32,.96)!important}
    html.xu-dark header.navigation.shrunk{background:rgba(10,41,32,.98)!important}
    html.xu-dark header.navigation .navbar-nav .nav-link{color:#cbd5e1!important}
    html.xu-dark header.navigation .navbar-nav .nav-link:hover{color:var(--xp-gold)!important;background:rgba(245,158,11,.08)}
    html.xu-dark header.navigation .navbar-nav .nav-link i{color:var(--xp-gold)}
    html.xu-dark header.navigation .dropdown-menu{background:#115e59!important;border-color:rgba(5,150,105,.2)!important}
    html.xu-dark header.navigation .dropdown-item{color:#cbd5e1!important}
    html.xu-dark header.navigation .dropdown-item:hover{color:var(--xp-gold)!important}
    html.xu-dark header.navigation .navbar-toggler{background:rgba(5,150,105,.1);border-color:rgba(5,150,105,.3)}
    html.xu-dark .navbar-toggler-icon{filter:invert(1)!important}
    html.xu-dark .xu-act{background:rgba(5,150,105,.12);border-color:rgba(5,150,105,.3);color:var(--xp-gold)}
    html.xu-dark .xu-chip-clock{background:rgba(5,150,105,.1);border-color:rgba(5,150,105,.25);color:var(--xp-mint)}
    html.xu-dark .xu-auth .btn{background:#115e59;color:#e2e8f0;border-color:rgba(5,150,105,.3)}
    html.xu-dark .xp-a11y-panel{background:#115e59;border-color:rgba(5,150,105,.3)}
    html.xu-dark .xp-a11y-panel h4{color:#e2e8f0}
    html.xu-dark .xp-a11y-row button{background:#064e3b;color:var(--xp-gold);border-color:rgba(5,150,105,.3)}
    html.xu-dark .xp-a11y-row button.active{background:linear-gradient(135deg,var(--xp-emerald),var(--xp-gold));color:#fff}
    html.xu-dark .card,html.xu-dark .xuCard{background:#064e3b!important;border-color:rgba(5,150,105,.18)!important}
    html.xu-dark .table{color:#cbd5e1!important}
    html.xu-dark .table th{color:#e2e8f0!important}
    html.xu-dark .table tr{background:#064e3b!important}
    html.xu-dark .table tr:nth-child(even){background:#0a5c4a!important}
    html.xu-dark .table td{color:#cbd5e1!important}
    html.xu-dark .table td a{color:var(--xp-gold)!important}
    html.xu-dark .section-title,html.xu-dark .h2-title{color:#f1f5f9!important}
    html.xu-dark #xuTitle{background:linear-gradient(90deg,#f1f5f9,var(--xp-gold),var(--xp-teal),#f1f5f9)!important;background-size:300% 100%!important;-webkit-background-clip:text!important;background-clip:text!important;-webkit-text-fill-color:transparent!important}
    html.xu-dark [style*="background:#f8fafc"]{background:#115e59!important}
    html.xu-dark .xuAuthorCard{background:#115e59!important;border-color:rgba(5,150,105,.35)!important}
    html.xu-dark .xuAuthorName{color:#e2e8f0!important}
    html.xu-dark .xuAuthorRole{color:#94a3b8!important}
    html.xu-dark .xuAbsBox{background:linear-gradient(135deg,rgba(5,150,105,.12),rgba(8,145,178,.12))!important}
    html.xu-dark .xuAbsHead{color:var(--xp-gold)!important}
    html.xu-dark .xuAbsText{color:#cbd5e1!important}
    html.xu-dark .xuAbsBtn,html.xu-dark .xuAbsSpeed{background:#115e59!important;color:var(--xp-gold)!important;border-color:rgba(5,150,105,.35)!important}
    html.xu-dark .attachList li{background:#115e59!important;border-color:rgba(5,150,105,.25)!important}
    html.xu-dark .attachList a{color:#e2e8f0!important}
    html.xu-dark .attachList small{color:#94a3b8!important}

    /* ================================================================
       SEARCH COMMAND PALETTE
       ================================================================ */
    .xp-search-overlay{position:fixed;inset:0;z-index:9998;background:rgba(10,41,32,.85);backdrop-filter:blur(16px);display:none;align-items:flex-start;justify-content:center;padding-top:10vh}
    .xp-search-overlay.open{display:flex;animation:xpFadeIn .25s ease}
    @keyframes xpFadeIn{from{opacity:0}to{opacity:1}}
    .xp-search-box{width:100%;max-width:680px;background:#fff;border-radius:20px;overflow:hidden;box-shadow:0 30px 80px rgba(10,41,32,.5);animation:xpSlideUp .3s cubic-bezier(.2,.8,.2,1)}
    @keyframes xpSlideUp{from{transform:translateY(-20px);opacity:0}to{transform:none;opacity:1}}
    .xp-search-head{display:flex;align-items:center;gap:12px;padding:18px 24px;border-bottom:1px solid #e2e8f0;background:linear-gradient(90deg,rgba(5,150,105,.04),transparent)}
    .xp-search-head i{color:var(--xp-emerald);font-size:1.2rem}
    .xp-search-input{flex:1;border:none;outline:none;font-size:1.1rem;font-weight:600;color:var(--xp-ink);background:transparent}
    .xp-search-input::placeholder{color:var(--xp-muted);font-weight:500}
    .xp-search-hint{font-family:'JetBrains Mono',monospace;font-size:.65rem;font-weight:700;padding:4px 10px;border-radius:6px;background:#f1f5f9;color:var(--xp-muted)}
    .xp-search-results{max-height:460px;overflow-y:auto;padding:10px}
    .xp-search-item{display:flex;align-items:center;gap:14px;padding:13px 18px;border-radius:12px;cursor:pointer;transition:.15s;font-size:.9rem;color:var(--xp-ink)}
    .xp-search-item:hover,.xp-search-item.active{background:linear-gradient(90deg,rgba(5,150,105,.08),rgba(8,145,178,.04))}
    .xp-search-item i{width:36px;height:36px;border-radius:10px;display:inline-flex;align-items:center;justify-content:center;background:rgba(5,150,105,.1);color:var(--xp-emerald);font-size:1rem}
    .xp-search-item .meta{margin-left:auto;font-size:.72rem;color:var(--xp-muted)}
    .xp-search-empty{padding:40px;text-align:center;color:var(--xp-muted);font-size:.88rem}
    .xp-search-foot{padding:12px 20px;background:#f8fafc;border-top:1px solid #e2e8f0;display:flex;align-items:center;gap:16px;font-size:.74rem;color:var(--xp-muted)}
    .xp-search-foot kbd{font-family:'JetBrains Mono',monospace;font-weight:700;padding:3px 8px;border-radius:5px;background:#fff;border:1px solid #cbd5e1;font-size:.68rem}

    .xp-share-fab{position:fixed;left:22px;bottom:22px;width:52px;height:52px;border-radius:50%;border:none;background:linear-gradient(135deg,var(--xp-teal),var(--xp-emerald));color:#fff;font-size:1.2rem;cursor:pointer;box-shadow:0 12px 30px rgba(8,145,178,.5);z-index:1048;display:flex;align-items:center;justify-content:center;transition:.3s}
    .xp-share-fab:hover{transform:scale(1.1) rotate(-15deg);box-shadow:0 18px 40px rgba(5,150,105,.6)}

    .xp-ai-fab{position:fixed;right:22px;bottom:90px;width:56px;height:56px;border-radius:50%;border:none;background:linear-gradient(135deg,var(--xp-teal),var(--xp-emerald),var(--xp-gold));color:#fff;font-size:1.3rem;cursor:pointer;box-shadow:0 14px 34px rgba(8,145,178,.55);z-index:1048;display:flex;align-items:center;justify-content:center;transition:.35s cubic-bezier(.2,.9,.3,1.4);animation:xpAiFloat 3s ease-in-out infinite}
    @keyframes xpAiFloat{0%,100%{transform:translateY(0)}50%{transform:translateY(-6px)}}
    .xp-ai-fab:hover{transform:scale(1.15) rotate(-10deg);animation-play-state:paused;box-shadow:0 20px 45px rgba(5,150,105,.7)}
    .xp-ai-fab::before{content:'';position:absolute;inset:-4px;border-radius:50%;background:linear-gradient(135deg,var(--xp-emerald),var(--xp-gold));opacity:.4;filter:blur(10px);z-index:-1;animation:xpPulseDot 2s infinite}
    .xp-ai-panel{position:fixed;right:22px;bottom:160px;width:360px;max-width:calc(100vw - 44px);background:#fff;border-radius:20px;box-shadow:0 30px 80px rgba(10,41,32,.3);border:1px solid rgba(5,150,105,.15);overflow:hidden;z-index:1048;opacity:0;transform:translateY(20px) scale(.95);pointer-events:none;transition:.3s cubic-bezier(.2,.8,.2,1)}
    .xp-ai-panel.open{opacity:1;transform:none;pointer-events:auto}
    .xp-ai-head{padding:18px 20px;background:linear-gradient(135deg,var(--xp-emerald),var(--xp-teal));color:#fff;display:flex;align-items:center;gap:12px}
    .xp-ai-avatar{width:42px;height:42px;border-radius:12px;background:rgba(255,255,255,.2);display:inline-flex;align-items:center;justify-content:center;font-size:1.3rem;flex-shrink:0;backdrop-filter:blur(10px)}
    .xp-ai-head-info{flex:1}
    .xp-ai-head-info b{display:block;font-size:.95rem;font-weight:800}
    .xp-ai-head-info small{color:rgba(255,255,255,.85);font-size:.72rem;display:flex;align-items:center;gap:5px}
    .xp-ai-head-info small .dot{width:6px;height:6px;border-radius:50%;background:#86efac;box-shadow:0 0 6px #86efac;animation:xpPulseDot 1.8s infinite}
    .xp-ai-close{background:rgba(255,255,255,.2);border:none;color:#fff;width:30px;height:30px;border-radius:8px;cursor:pointer;transition:.2s}
    .xp-ai-close:hover{background:rgba(255,255,255,.35)}
    .xp-ai-body{padding:18px 20px;max-height:320px;overflow-y:auto}
    .xp-ai-msg{padding:12px 14px;border-radius:14px;margin-bottom:10px;font-size:.85rem;line-height:1.6;animation:xpSlideUp .3s ease}
    .xp-ai-msg.bot{background:rgba(5,150,105,.08);color:var(--xp-ink);border-bottom-left-radius:4px}
    .xp-ai-msg.user{background:linear-gradient(135deg,var(--xp-emerald),var(--xp-teal));color:#fff;border-bottom-right-radius:4px;margin-left:40px}
    .xp-ai-quick{display:flex;flex-wrap:wrap;gap:6px;padding:0 20px 14px}
    .xp-ai-quick button{padding:6px 12px;border-radius:999px;border:1.5px solid rgba(5,150,105,.2);background:#fff;color:var(--xp-emerald);font-size:.72rem;font-weight:700;cursor:pointer;transition:.2s}
    .xp-ai-quick button:hover{background:var(--xp-emerald);color:#fff;border-color:transparent}
    .xp-ai-foot{padding:12px 16px;background:#f8fafc;border-top:1px solid #e2e8f0;display:flex;gap:8px}
    .xp-ai-input{flex:1;padding:9px 14px;border:1.5px solid #e2e8f0;border-radius:10px;font-size:.85rem;outline:none;transition:.2s}
    .xp-ai-input:focus{border-color:var(--xp-emerald);box-shadow:0 0 0 3px rgba(5,150,105,.1)}
    .xp-ai-send{padding:9px 16px;border:none;border-radius:10px;background:linear-gradient(135deg,var(--xp-emerald),var(--xp-gold));color:#fff;font-weight:700;cursor:pointer;transition:.2s}
    .xp-ai-send:hover{filter:brightness(1.1)}
    html.xu-dark .xp-ai-panel{background:#064e3b;border-color:rgba(5,150,105,.3)}
    html.xu-dark .xp-ai-msg.bot{background:rgba(245,158,11,.08);color:#e2e8f0}
    html.xu-dark .xp-ai-foot{background:#115e59;border-color:rgba(5,150,105,.2)}
    html.xu-dark .xp-ai-input{background:#115e59;color:#e2e8f0;border-color:rgba(5,150,105,.3)}
    html.xu-dark .xp-ai-quick button{background:#115e59;color:var(--xp-gold);border-color:rgba(5,150,105,.3)}

    .xp-cookie{position:fixed;bottom:22px;left:50%;transform:translateX(-50%) translateY(150%);width:92%;max-width:560px;background:#fff;border-radius:18px;padding:18px 22px;box-shadow:0 20px 50px rgba(10,41,32,.25);border:1px solid rgba(5,150,105,.15);z-index:1047;display:flex;align-items:center;gap:16px;transition:transform .5s cubic-bezier(.2,.9,.3,1.4)}
    .xp-cookie.show{transform:translateX(-50%) translateY(0)}
    .xp-cookie-ico{width:48px;height:48px;border-radius:12px;background:linear-gradient(135deg,var(--xp-gold),var(--xp-emerald));color:#fff;font-size:1.4rem;display:inline-flex;align-items:center;justify-content:center;flex-shrink:0}
    .xp-cookie-body{flex:1}
    .xp-cookie-body b{display:block;font-size:.88rem;font-weight:800;color:var(--xp-ink);margin-bottom:3px}
    .xp-cookie-body p{font-size:.78rem;color:var(--xp-muted);margin:0;line-height:1.5}
    .xp-cookie-body a{color:var(--xp-emerald);font-weight:700;text-decoration:underline}
    .xp-cookie-btns{display:flex;gap:6px;flex-shrink:0}
    .xp-cookie-btns button{padding:9px 14px;border:none;border-radius:10px;font-weight:700;font-size:.75rem;cursor:pointer;transition:.2s}
    .xp-cookie-btns .ok{background:linear-gradient(135deg,var(--xp-emerald),var(--xp-gold));color:#fff}
    .xp-cookie-btns .ok:hover{filter:brightness(1.1)}
    .xp-cookie-btns .no{background:rgba(15,23,42,.06);color:var(--xp-muted)}
    .xp-cookie-btns .no:hover{background:rgba(15,23,42,.12)}
    html.xu-dark .xp-cookie{background:#115e59;border-color:rgba(5,150,105,.3)}
    html.xu-dark .xp-cookie-body b{color:#e2e8f0}
    html.xu-dark .xp-cookie-body p{color:#cbd5e1}
    html.xu-dark .xp-cookie-btns .no{background:rgba(255,255,255,.08);color:#e2e8f0}

    .xp-help-modal{position:fixed;inset:0;z-index:9999;background:rgba(10,41,32,.85);backdrop-filter:blur(16px);display:none;align-items:center;justify-content:center;padding:20px}
    .xp-help-modal.open{display:flex;animation:xpFadeIn .25s ease}
    .xp-help-box{background:#fff;border-radius:20px;max-width:520px;width:100%;overflow:hidden;box-shadow:0 30px 80px rgba(10,41,32,.5);animation:xpSlideUp .3s cubic-bezier(.2,.8,.2,1)}
    .xp-help-head{padding:20px 24px;background:linear-gradient(135deg,var(--xp-emerald),var(--xp-teal));color:#fff;display:flex;align-items:center;gap:12px}
    .xp-help-head i{font-size:1.3rem}
    .xp-help-head h3{margin:0;font-size:1.05rem;font-weight:800}
    .xp-help-body{padding:20px 24px;max-height:480px;overflow-y:auto}
    .xp-help-row{display:flex;align-items:center;justify-content:space-between;padding:10px 0;border-bottom:1px dashed #e2e8f0}
    .xp-help-row:last-child{border:none}
    .xp-help-row .desc{font-size:.85rem;color:var(--xp-ink);font-weight:600}
    .xp-help-row kbd{font-family:'JetBrains Mono',monospace;font-weight:700;padding:4px 10px;border-radius:6px;background:#f1f5f9;border:1px solid #cbd5e1;font-size:.72rem;color:var(--xp-emerald);box-shadow:0 2px 0 #e2e8f0}
    .xp-help-foot{padding:14px 24px;background:#f8fafc;border-top:1px solid #e2e8f0;text-align:center;font-size:.75rem;color:var(--xp-muted)}
    html.xu-dark .xp-help-box{background:#064e3b}
    html.xu-dark .xp-help-row{border-color:rgba(5,150,105,.2)}
    html.xu-dark .xp-help-row .desc{color:#e2e8f0}
    html.xu-dark .xp-help-row kbd{background:#115e59;color:var(--xp-gold);border-color:rgba(5,150,105,.3);box-shadow:0 2px 0 #0a5c4a}
    html.xu-dark .xp-help-foot{background:#115e59;border-color:rgba(5,150,105,.2);color:#cbd5e1}

    .xp-reveal{opacity:0;transform:translateY(30px);transition:opacity .8s cubic-bezier(.2,.8,.2,1),transform .8s cubic-bezier(.2,.8,.2,1)}
    .xp-reveal.visible{opacity:1;transform:none}

    .xp-toast{position:fixed;bottom:90px;right:22px;z-index:9997;min-width:300px;max-width:400px;background:#fff;border-radius:14px;padding:16px 20px;box-shadow:0 20px 50px rgba(10,41,32,.2);border-left:4px solid var(--xp-emerald);display:flex;align-items:center;gap:14px;transform:translateX(450px);transition:.4s cubic-bezier(.2,.8,.2,1)}
    .xp-toast.show{transform:none}
    .xp-toast.success{border-left-color:var(--xp-emerald)}
    .xp-toast.info{border-left-color:var(--xp-teal)}
    .xp-toast.fun{border-left-color:var(--xp-gold)}
    .xp-toast i{font-size:1.5rem}
    .xp-toast.success i{color:var(--xp-emerald)}
    .xp-toast.info i{color:var(--xp-teal)}
    .xp-toast.fun i{color:var(--xp-gold)}
    .xp-toast-body{flex:1}
    .xp-toast-title{font-weight:800;font-size:.9rem;color:var(--xp-ink)}
    .xp-toast-msg{font-size:.8rem;color:var(--xp-muted);margin-top:3px}

    @media print{
        .xuMarquee,header.navigation,.xuRocket,.xp-share-fab,.xp-search-overlay,.xp-ai-fab,.xp-ai-panel,.xp-cookie,.xp-help-modal,.xp-cursor-glow,.xp-reading-bubble,body::before{display:none!important}
        body{background:#fff!important;color:#000!important}
        .xuFoot{background:#fff!important;color:#000!important}
        .xuFoot *{color:#000!important;background:transparent!important}
    }

    a:focus-visible,button:focus-visible{outline:2px solid var(--xp-gold);outline-offset:2px}
    </style>
    <script>
    (function(){try{var s=localStorage.getItem('xuTheme');var p=window.matchMedia&&window.matchMedia('(prefers-color-scheme: dark)').matches;if(s==='dark'||(!s&&p)){document.documentElement.classList.add('xu-dark');}var a=localStorage.getItem('xuA11y');if(a&&a!=='sm')document.documentElement.classList.add('xu-a11y-'+a);}catch(e){}})();
    </script>
</head>

<body>
    <a href="#main-content" class="xp-skip">Lewati ke konten utama</a>
    <div class="xp-reading-progress" id="xpReadingProgress"></div>
    <div class="xp-reading-bubble" id="xpReadingBubble">0%</div>
    <div class="xp-cursor-glow" id="xpCursorGlow"></div>
    <div class="xp-preloader" id="xpPreloader">
        <div class="xp-preloader-logo">REPOSITORI UNIMOF</div>
        <div class="xp-preloader-bar"></div>
        <div class="xp-preloader-sub">Digital Repository For Every One</div>
    </div>

    <!-- ===== BAR MARQUEE ===== -->
    <div class="xuMarquee">
        <div class="track">
            <span><span class="dot"></span> Selamat datang di <span class="hi">DIFOSS Rangkui 4.1.0</span> Repositori Institusional Terbuka</span>
            <span class="sep">✦</span>
            <span>🌌 Jelajahi <span class="hi">Galaksi Riset</span> <span class="new-badge">NEW</span> Peta Visual Kolaborasi Ilmu</span>
            <span class="sep">✦</span>
            <span>📚 Blusukan <span class="hi">Rak Virtual 3D</span> <span class="new-badge">NEW</span> Virtual Perpustakaan Digital</span>
            <span class="sep">✦</span>
            <span>🤖 Tanya <span class="hi">AI Asisten</span> <span class="new-badge">NEW</span> Didukung Gemini</span>
            <span class="sep">✦</span>
            <span>🛡️ <span class="hi">Integrity Scanner</span> Deteksi Plagiarisme Otomatis</span>
            <span class="sep">✦</span>
            <span>📡 OAI-PMH Tersedia Untuk Harvester Global</span>
            <span class="sep">✦</span>
            <span>⌨️ Tekan <span class="hi">Ctrl+K</span> Untuk Pencarian Cepat · Tekan <span class="hi">?</span> Untuk Bantuan</span>
        </div>
    </div>

    <!-- ===== NAVBAR PROFESIONAL ===== -->
    <header class="navigation" id="xuNav">
        <div class="xu-navwrap">
            <nav class="navbar navbar-expand-lg">

                <!-- 1) BRAND -->
                <a class="navbar-brand order-1" href="<?= base_url() ?>">
                    <img loading="eager" decoding="async" fetchpriority="high" src="<?= base_url('assets/images/Difoss-Header.png') ?>" alt="<?= $title ?>">
                </a>

                <!-- 2) CLUSTER AKSI (kanan) -->
                <div class="xu-actions order-3 ml-auto ml-lg-2">
                    <button type="button" class="xu-act" id="xpSearchBtn" title="Cari (Ctrl+K)"><i class="fa fa-search"></i></button>
                    <div class="xu-chip xu-chip-clock" id="xpNavClock"><i class="fa fa-clock-o"></i><span>--:--</span></div>
                    <div class="xu-chip xu-chip-live"><span class="live-dot"></span><span id="xpNavVisitors">--</span>&nbsp;online</div>
                    <div class="xp-lang-switch">
                        <button type="button" class="xp-lang-btn active" data-lang="id">ID</button>
                        <button type="button" class="xp-lang-btn" data-lang="en">EN</button>
                    </div>
                    <div class="xu-a11y-wrap">
                        <button type="button" class="xu-act" id="xpA11yBtn" title="Aksesibilitas">Aa</button>
                        <div class="xp-a11y-panel" id="xpA11yPanel">
                            <h4>🔤 Aksesibilitas</h4>
                            <div class="xp-a11y-label">Ukuran Teks</div>
                            <div class="xp-a11y-row">
                                <button type="button" data-size="sm" class="active">Kecil</button>
                                <button type="button" data-size="md">Sedang</button>
                                <button type="button" data-size="lg">Besar</button>
                            </div>
                            <div class="xp-a11y-label">Tema</div>
                            <div class="xp-a11y-row">
                                <button type="button" data-theme="light">☀️ Terang</button>
                                <button type="button" data-theme="dark">🌙 Gelap</button>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="xu-act" id="xuThemeToggle" title="Mode gelap / terang"><i class="fa fa-moon-o" id="xuThemeIcon"></i></button>

                    <?php
                    $is_admin  = $session->has('user_id');
                    $is_member = $session->has('member_id');
                    ?>
                    <div class="xu-auth">
                        <?php if ($is_member): ?>
                            <div class="dropdown d-inline-block">
                                <a class="btn dropdown-toggle" href="#" data-toggle="dropdown">
                                    <i class="fa fa-user-circle"></i> <?= esc($session->get('member_name')) ?>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="<?= base_url('login/anggota/profil') ?>"><i class="fa fa-id-card"></i> Profil Saya</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?= base_url('login/anggota/logout') ?>"><i class="fa fa-sign-out"></i> Keluar</a>
                                </div>
                            </div>
                        <?php elseif ($is_admin): ?>
                            <a href="<?= base_url('home') ?>" class="btn btn-xu-primary"><i class="fa fa-dashboard"></i> Dashboard</a>
                            <a href="<?= base_url('login/logout') ?>" class="btn"><i class="fa fa-sign-out"></i> Keluar</a>
                        <?php else: ?>
                            <div class="dropdown d-inline-block">
                                <a class="btn btn-xu-primary dropdown-toggle" href="#" data-toggle="dropdown">
                                    <i class="fa fa-sign-in"></i> Masuk
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="<?= base_url('login/anggota') ?>"><i class="fa fa-user"></i> Anggota</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?= base_url('login') ?>"><i class="fa fa-shield"></i> Admin / Petugas</a>
                                </div>
                            </div>
                        <?php endif ?>
                    </div>
                </div>

                <!-- 3) TOGGLER (mobile) -->
                <button aria-label="Buka menu" class="navbar-toggler order-2" type="button" data-toggle="collapse" data-target="#navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- 4) MENU UTAMA -->
                <div class="collapse navbar-collapse order-4 order-lg-2" id="navigation">
                    <ul class="navbar-nav mx-auto align-items-lg-center">
                        <li class="nav-item"><a class="nav-link" href="<?= base_url() ?>"><i class="fa fa-home"></i>Beranda</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= base_url('information') ?>"><i class="fa fa-info-circle"></i>Informasi</a></li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"><i class="fa fa-compass"></i>Jelajah</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="<?= base_url('beranda/galaxy') ?>">🌌 Galaksi Riset</a>
                                <a class="dropdown-item" href="<?= base_url('beranda/rak') ?>">📚 Rak 3D</a>
                                <a class="dropdown-item" href="<?= base_url('beranda/ai') ?>">🤖 AI Asisten</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"><i class="fa fa-link"></i>Link</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" target="_blank" href="https://setiadifoss.org">🌐 DIFOSS</a>
                                <a class="dropdown-item" target="_blank" href="https://github.com/slimsetd">💻 Github</a>
                                <a class="dropdown-item" href="<?= base_url('daftar') ?>"><i class="fa fa-id-card"></i> Pendaftaran Anggota</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"><i class="fa fa-book"></i>E-Resources</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" target="_blank" href="http://onesearch.id/">🔎 One Search</a>
                                <a class="dropdown-item" target="_blank" href="http://e-resources.perpusnas.go.id/">📖 E-Resources PNRI</a>
                                <a class="dropdown-item" target="_blank" href="http://roar.eprints.org/">🌍 ROAR</a>
                                <a class="dropdown-item" target="_blank" href="https://v2.sherpa.ac.uk/opendoar/">📂 Open DOAR</a>
                                <a class="dropdown-item" target="_blank" href="https://scholar.google.co.id/">🎓 Google Scholar</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"><i class="fa fa-tablet"></i>E-Book</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" target="_blank" href="http://ipusnas.id/">📱 iPusnas</a>
                                <a class="dropdown-item" target="_blank" href="http://e-resources.perpusnas.go.id/">📚 E-Resources PNRI</a>
                            </div>
                        </li>

                        <li class="nav-item">
    <a class="nav-link" href="<?= base_url('unggah') ?>">
        <i class="fa fa-cloud-upload"></i>Unggah Karya
    </a>
</li>

                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"><i class="fa fa-video-camera"></i>Video</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" target="_blank" href="https://www.ted.com/">🎤 TED</a>
                                <a class="dropdown-item" target="_blank" href="http://99u.com/">✨ 99U</a>
                                <a class="dropdown-item" target="_blank" href="https://themoth.org/">🎙️ The Moth</a>
                                <a class="dropdown-item" target="_blank" href="http://www.ignitetalks.io/">🔥 Ignite</a>
                                <a class="dropdown-item" target="_blank" href="https://creativegood.com/">💡 Creative Good</a>
                                <a class="dropdown-item" target="_blank" href="http://www.pechakucha.org/">🎨 Pecha Kucha</a>
                                <a class="dropdown-item" target="_blank" href="http://www.veritas.org/">🧠 Veritas</a>
                                <a class="dropdown-item" target="_blank" href="http://www.ideacity.ca/">🏙️ Ideacity</a>
                                <a class="dropdown-item" target="_blank" href="https://poptech.org/">🚀 Pop Tech</a>
                                <a class="dropdown-item" target="_blank" href="https://talksat.withgoogle.com/">🔍 Talks at Google</a>
                                <a class="dropdown-item" target="_blank" href="http://bigthink.com/">💭 Big Think</a>
                                <a class="dropdown-item" target="_blank" href="http://oprah.com/">⭐ Oprah</a>
                                <a class="dropdown-item" target="_blank" href="https://www.thersa.org/">🎯 RSA</a>
                            </div>
                        </li>

                        <?php if ($session->has('user_id')) : ?>
                            <li class="nav-item"><a class="nav-link" href="<?= base_url('home') ?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                        <?php endif ?>
                    </ul>
                </div>

            </nav>
        </div>
    </header>

    <main id="main-content">
        <section class="section">
            <?= $content ?>
        </section>
    </main>

    <!-- ============ FOOTER ============ -->
    <footer class="xuFoot">
        <div class="xuFootSky" id="xuSky">
            <div class="xuFootAurora a1"></div>
            <div class="xuFootAurora a2"></div>
            <div class="xuFootAurora a3"></div>
        </div>

        <div class="xuFootMain">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 mb-4">
                        <h3 class="h-brand"><span class="xuH3Ico"><i class="fa fa-code"></i></span> DIFOSS</h3>
                        <a href="<?= base_url() ?>"><img src="<?= base_url('assets/images/Difoss-Header.png') ?>" alt="DIFOSS" class="xuFootLogo"></a>
                        <div class="xuFootTag">
                            <strong style="color:var(--xp-gold)">Friendly Open Source Software</strong> — repositori institusional terbuka untuk penyebaran ilmu pengetahuan.
                        </div>
                        <div class="xuFootVer">
                            <span class="live">● ONLINE</span>
                            <span>v4.1.0</span>
                            <span>RANGKUI</span>
                        </div>
                        <div style="margin-top:14px">
                            <i class="fa fa-exchange" style="color:var(--xp-gold);margin-right:6px"></i>
                            <a class="afooter" href="<?= base_url('oai?verb=ListRecords&metadataPrefix=oai_dc') ?>">OAI-PMH Harvester</a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mb-4">
                        <h3 class="h-explore"><span class="xuH3Ico"><i class="fa fa-compass"></i></span> Jelajah</h3>
                        <div class="xuJelajah">
                            <a href="<?= base_url('beranda/galaxy') ?>"><span class="xuJIco jg"><i class="fa fa-star"></i></span><div>Galaksi Riset<small>Peta ilmu</small></div></a>
                            <a href="<?= base_url('beranda/rak') ?>"><span class="xuJIco jr"><i class="fa fa-cube"></i></span><div>Rak 3D<small>Perpustakaan</small></div></a>
                            <a href="<?= base_url('beranda/ai') ?>"><span class="xuJIco ja"><i class="fa fa-robot"></i></span><div>AI Asisten<small>Cerdas</small></div></a>
                            <a href="<?= base_url('information') ?>"><span class="xuJIco jt"><i class="fa fa-info-circle"></i></span><div>Informasi<small>Perpustakaan</small></div></a>
                            <a href="<?= base_url('beranda/search') ?>"><span class="xuJIco jp"><i class="fa fa-search"></i></span><div>Pencarian<small>Dokumen</small></div></a>
                            <a href="https://setiadifoss.org" target="_blank"><span class="xuJIco js"><i class="fa fa-globe"></i></span><div>DIFOSS<small>Situs resmi</small></div></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mb-4">
                        <h3 class="h-contact"><span class="xuH3Ico"><i class="fa fa-envelope"></i></span> Kontak</h3>
                        <div class="xuFootAddr">
                            <div class="xuLine"><i class="fa fa-envelope"></i><a class="afooter" href="mailto:halo@setiadifoss.org">halo@setiadifoss.org</a></div>
                            <div class="xuLine"><i class="fa fa-map-marker"></i><span>UNIMOF<br>Jl Jendral Sudirman-Maumere-Waioti<br>Universitas Muhammadiyah Maumere<br>Horo!</span></div>
                            <div class="xuLine"><i class="fa fa-clock-o"></i><span>Senin – Sabtu<br>08.00 – 17.00 WITA</span></div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mb-4 text-lg-center">
                        <h3 class="h-social" style="justify-content:center"><span class="xuH3Ico"><i class="fa fa-share-alt"></i></span> Ikuti Kami</h3>
                        <div style="margin-bottom:20px;color:rgba(255,255,255,.7);font-size:.85rem">
                            Didukung oleh<br>
                            <strong style="color:var(--xp-gold)">FossStudio</strong> &amp; <strong style="color:var(--xp-teal)">Difoss Creative Tim</strong>
                        </div>
                        <div>
                            <a href="https://www.youtube.com/@difoss" target="_blank" class="xuSocial" title="YouTube"><img src="<?= base_url('assets/reporter/images/youtube.webp') ?>" alt="youtube"></a>
                            <a href="https://github.com/yolislibmanmof" target="_blank" class="xuSocial" title="GitHub"><img src="<?= base_url('assets/reporter/images/github.svg') ?>" alt="github"></a>
                            <a href="https://t.me/grupsetiadi" target="_blank" class="xuSocial" title="Telegram"><img src="<?= base_url('assets/reporter/images/telegram.svg') ?>" alt="telegram"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="xuFootBottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">© <?= date('Y') ?> <strong>Repositori Institusional</strong></div>
                    <div class="col-md-6 text-md-right">
                        <span class="xuTyped" id="xuTyped"></span>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <button class="xuRocket" id="xuRocket" title="Kembali ke atas" aria-label="Scroll to top"><i class="fa fa-rocket"></i></button>
    <button class="xp-share-fab" id="xpShareFab" title="Bagikan halaman"><i class="fa fa-share-alt"></i></button>

    <button class="xp-ai-fab" id="xpAiFab" title="Tanya AI Asisten"><i class="fa fa-robot"></i></button>
    <div class="xp-ai-panel" id="xpAiPanel">
        <div class="xp-ai-head">
            <span class="xp-ai-avatar">🤖</span>
            <div class="xp-ai-head-info">
                <b>DIFOSS AI Asisten</b>
                <small><span class="dot"></span> Online · Siap membantu</small>
            </div>
            <button class="xp-ai-close" id="xpAiClose" title="Tutup"><i class="fa fa-times"></i></button>
        </div>
        <div class="xp-ai-body" id="xpAiBody">
            <div class="xp-ai-msg bot">Halo! 👋 Saya AI Asisten REPO UNIMOF. Ada yang bisa saya bantu tentang koleksi atau fitur repositori?</div>
        </div>
        <div class="xp-ai-quick">
            <button type="button" data-q="Cara mencari dokumen?">🔍 Cara mencari</button>
            <button type="button" data-q="Apa itu Galaksi Riset?">🌌 Galaksi Riset</button>
            <button type="button" data-q="Bagaimana cara mendaftar?">📝 Daftar</button>
            <button type="button" data-q="Fitur Integrity Scanner?">🛡️ Integrity</button>
        </div>
        <div class="xp-ai-foot">
            <input type="text" class="xp-ai-input" id="xpAiInput" placeholder="Ketik pertanyaan Anda...">
            <button class="xp-ai-send" id="xpAiSend"><i class="fa fa-paper-plane"></i></button>
        </div>
    </div>

    <div class="xp-cookie" id="xpCookie">
        <span class="xp-cookie-ico">🍪</span>
        <div class="xp-cookie-body">
            <b>Kami menggunakan cookie</b>
            <p>Untuk pengalaman terbaik dan analitik anonim. <a href="<?= base_url('information') ?>">Pelajari lebih lanjut</a></p>
        </div>
        <div class="xp-cookie-btns">
            <button class="no" id="xpCookieNo">Tolak</button>
            <button class="ok" id="xpCookieOk">Terima</button>
        </div>
    </div>

    <div class="xp-help-modal" id="xpHelpModal">
        <div class="xp-help-box">
            <div class="xp-help-head"><i class="fa fa-keyboard-o"></i><h3>Pintasan Keyboard</h3></div>
            <div class="xp-help-body">
                <div class="xp-help-row"><span class="desc">Buka pencarian cepat</span><kbd>Ctrl + K</kbd></div>
                <div class="xp-help-row"><span class="desc">Buka bantuan pintasan</span><kbd>?</kbd></div>
                <div class="xp-help-row"><span class="desc">Mode gelap / terang</span><kbd>D</kbd></div>
                <div class="xp-help-row"><span class="desc">Kembali ke atas</span><kbd>T</kbd></div>
                <div class="xp-help-row"><span class="desc">Ke beranda</span><kbd>H</kbd></div>
                <div class="xp-help-row"><span class="desc">Bagikan halaman</span><kbd>S</kbd></div>
                <div class="xp-help-row"><span class="desc">Tutup modal/panel</span><kbd>Esc</kbd></div>
            </div>
            <div class="xp-help-foot">Tekan <kbd>Esc</kbd> atau klik di luar untuk menutup</div>
        </div>
    </div>

    <div class="xp-search-overlay" id="xpSearchOverlay">
        <div class="xp-search-box">
            <div class="xp-search-head">
                <i class="fa fa-search"></i>
                <input type="text" class="xp-search-input" id="xpSearchInput" placeholder="Cari dokumen, fitur, atau halaman..." autocomplete="off">
                <span class="xp-search-hint">ESC</span>
            </div>
            <div class="xp-search-results" id="xpSearchResults"></div>
            <div class="xp-search-foot">
                <span><kbd>↑</kbd> <kbd>↓</kbd> Navigasi</span>
                <span><kbd>↵</kbd> Buka</span>
                <span><kbd>ESC</kbd> Tutup</span>
            </div>
        </div>
    </div>

    <!-- JS Plugins -->
    <script src="<?= base_url('assets/reporter/plugins/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/reporter/plugins/bootstrap/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('assets/reporter/js/script.js') ?>"></script>

    <?php if (count($js) > 0) : ?>
        <?php foreach ($js as $key => $v) : ?>
            <?php if (stripos($v, "assets") !== false) : ?>
                <script src="<?= base_url($v . '.js?ver=' . filemtime(FCPATH . $v . ".js")) ?>"></script>
            <?php else : ?>
                <script src="<?= $v ?>"></script>
            <?php endif ?>
        <?php endforeach ?>
    <?php endif ?>

    <script>
    (function(){
      // PRELOADER
      window.addEventListener('load', function(){
        var p = document.getElementById('xpPreloader');
        if (p) setTimeout(function(){ p.classList.add('hide'); }, 600);
      });

      // CURSOR GLOW
      var glow = document.getElementById('xpCursorGlow');
      if (glow && window.matchMedia('(pointer: fine)').matches) {
        var gx=0, gy=0, cx=0, cy=0;
        document.addEventListener('mousemove', function(e){ cx=e.clientX; cy=e.clientY; });
        (function anim(){ gx+=(cx-gx)*.1; gy+=(cy-gy)*.1; glow.style.left=gx+'px'; glow.style.top=gy+'px'; requestAnimationFrame(anim); })();
      }

      // READING PROGRESS + BUBBLE
      var bar = document.getElementById('xpReadingProgress');
      var bub = document.getElementById('xpReadingBubble');
      var bubT = null;
      window.addEventListener('scroll', function(){
        var h = document.documentElement;
        var sc = Math.max(0, Math.min(100, (h.scrollTop/(h.scrollHeight-h.clientHeight))*100));
        if (bar) bar.style.width = sc+'%';
        if (bub) {
          bub.textContent = Math.round(sc)+'%';
          bub.classList.add('show');
          clearTimeout(bubT);
          bubT = setTimeout(function(){ bub.classList.remove('show'); }, 1500);
        }
      });

      // NAVBAR SHRINK
      var nav = document.getElementById('xuNav');
      window.addEventListener('scroll', function(){
        if (window.scrollY > 40) nav.classList.add('shrunk'); else nav.classList.remove('shrunk');
      });

      // ACTIVE NAV HIGHLIGHT
      (function(){
        var path = location.pathname.replace(/\/+$/,'');
        document.querySelectorAll('#navigation .nav-link').forEach(function(a){
          var href = a.getAttribute('href') || '';
          if (href.indexOf('javascript') === 0 || a.classList.contains('dropdown-toggle')) return;
          try {
            var p = new URL(href, location.origin).pathname.replace(/\/+$/,'');
            if (p && p === path) a.classList.add('xu-active');
          } catch(e){}
        });
      })();

      // LIVE CLOCK
      var clockEl = document.querySelector('#xpNavClock span');
      function updClock(){
        if (!clockEl) return;
        var n = new Date();
        clockEl.textContent = String(n.getHours()).padStart(2,'0')+':'+String(n.getMinutes()).padStart(2,'0')+' WIB';
      }
      updClock(); setInterval(updClock, 30000);

      // LIVE VISITORS
      var visEl = document.getElementById('xpNavVisitors');
      function updVis(){
        if (!visEl) return;
        var h = new Date().getHours();
        visEl.textContent = 12 + ((h>=9&&h<=17)?8:2) + Math.floor(Math.random()*6);
      }
      updVis(); setInterval(updVis, 45000);

      // SEARCH PALETTE
      var sOv = document.getElementById('xpSearchOverlay');
      var sIn = document.getElementById('xpSearchInput');
      var sRes = document.getElementById('xpSearchResults');
      var sAct = 0;
      var XP_PAGES = [
        {title:'Beranda', icon:'fa-home', url:'', meta:'Halaman utama'},
        {title:'Informasi', icon:'fa-info-circle', url:'information', meta:'Tentang perpustakaan'},
        {title:'Galaksi Riset', icon:'fa-star', url:'beranda/galaxy', meta:'Peta visual ilmu'},
        {title:'Rak 3D', icon:'fa-cube', url:'beranda/rak', meta:'Perpustakaan virtual'},
        {title:'AI Asisten', icon:'fa-robot', url:'beranda/ai', meta:'Chatbot cerdas'},
        {title:'Pencarian', icon:'fa-search', url:'beranda/search', meta:'Cari dokumen'},
        {title:'Pendaftaran Anggota', icon:'fa-id-card', url:'daftar', meta:'Daftar gratis'},
        {title:'DIFOSS Official', icon:'fa-globe', url:'https://setiadifoss.org', meta:'Situs resmi', external:true}
      ];
      function openSearch(){ sOv.classList.add('open'); sIn.value=''; renderSearch(''); setTimeout(function(){ sIn.focus(); },50); }
      function closeSearch(){ sOv.classList.remove('open'); }
      function renderSearch(q){
        q = (q||'').toLowerCase().trim();
        var f = XP_PAGES.filter(function(p){ return !q || p.title.toLowerCase().indexOf(q)!==-1 || (p.meta||'').toLowerCase().indexOf(q)!==-1; });
        if (!f.length) { sRes.innerHTML = '<div class="xp-search-empty"><i class="fa fa-search"></i> Tidak ditemukan untuk "'+q+'"</div>'; return; }
        sAct = 0;
        sRes.innerHTML = f.map(function(p,i){
          return '<div class="xp-search-item'+(i===0?' active':'')+'" data-url="'+p.url+'" data-external="'+(p.external?'1':'0')+'"><i class="fa '+p.icon+'"></i><div><div>'+p.title+'</div><div style="font-size:.75rem;color:#94a3b8">'+(p.meta||'')+'</div></div><span class="meta">↵</span></div>';
        }).join('');
      }
      document.getElementById('xpSearchBtn') && document.getElementById('xpSearchBtn').addEventListener('click', openSearch);
      sIn && sIn.addEventListener('input', function(){ renderSearch(this.value); });
      sIn && sIn.addEventListener('keydown', function(e){
        var items = sRes.querySelectorAll('.xp-search-item');
        if (e.key==='ArrowDown'){ e.preventDefault(); sAct=Math.min(items.length-1,sAct+1); }
        else if (e.key==='ArrowUp'){ e.preventDefault(); sAct=Math.max(0,sAct-1); }
        else if (e.key==='Enter'){ e.preventDefault(); var it=items[sAct]; if(it){ it.dataset.external==='1'?window.open(it.dataset.url,'_blank'):location.href=baseUrl+it.dataset.url; } return; }
        else if (e.key==='Escape'){ closeSearch(); return; }
        items.forEach(function(el,i){ el.classList.toggle('active', i===sAct); });
      });
      sRes && sRes.addEventListener('click', function(e){
        var it = e.target.closest('.xp-search-item');
        if (it) it.dataset.external==='1'?window.open(it.dataset.url,'_blank'):location.href=baseUrl+it.dataset.url;
      });
      sOv && sOv.addEventListener('click', function(e){ if (e.target===sOv) closeSearch(); });

      // ROKET
      var rocket = document.getElementById('xuRocket');
      window.addEventListener('scroll', function(){
        if (window.scrollY > 400) rocket.classList.add('show'); else rocket.classList.remove('show');
      });
      rocket && rocket.addEventListener('click', function(){ window.scrollTo({top:0, behavior:'smooth'}); });

      // TYPED FOOTER
      var typed = document.getElementById('xuTyped');
      var phrases = ['Powered by DIFOSS RANGKUI TEAM ⚡','Friendly Open Source Software 🌿','Ilmu terbuka untuk semua 📚','Knowledge belongs to everyone 🌍','Repositori Institusional Indonesia 🇮🇩','Tekan ? untuk pintasan keyboard ⌨️'];
      var pi=0, ci=0, dl=false;
      (function tick(){
        if (!typed) return;
        var cur = phrases[pi];
        if (!dl){ typed.textContent = cur.slice(0,++ci); if (ci===cur.length){ dl=true; setTimeout(tick,2200); return; } }
        else { typed.textContent = cur.slice(0,--ci); if (ci===0){ dl=false; pi=(pi+1)%phrases.length; } }
        setTimeout(tick, dl?30:55);
      })();

      // FOOTER STARS
      var sky = document.getElementById('xuSky');
      if (sky){
        var frag = document.createDocumentFragment();
        for (var i=0;i<80;i++){
          var s = document.createElement('span');
          s.className='xuFootStar';
          var sz = 1+Math.random()*2.2;
          s.style.width=sz+'px'; s.style.height=sz+'px';
          s.style.left=(Math.random()*100)+'%'; s.style.top=(Math.random()*100)+'%';
          s.style.animationDuration=(2+Math.random()*3)+'s'; s.style.animationDelay=(Math.random()*3)+'s';
          s.style.opacity=.3+Math.random()*.7;
          frag.appendChild(s);
        }
        sky.appendChild(frag);
      }

      // SHARE FAB
      document.getElementById('xpShareFab') && document.getElementById('xpShareFab').addEventListener('click', function(){
        if (navigator.share) navigator.share({title:document.title, url:location.href});
        else navigator.clipboard.writeText(location.href).then(function(){ showToast('Link Disalin','URL halaman telah disalin ke clipboard.','success'); });
      });

      // TOAST
      window.showToast = function(title, msg, type){
        type = type||'success';
        var icons = {success:'fa-check-circle', info:'fa-info-circle', fun:'fa-magic'};
        var t = document.createElement('div');
        t.className = 'xp-toast '+type;
        t.innerHTML = '<i class="fa '+icons[type]+'"></i><div class="xp-toast-body"><div class="xp-toast-title">'+title+'</div><div class="xp-toast-msg">'+msg+'</div></div>';
        document.body.appendChild(t);
        setTimeout(function(){ t.classList.add('show'); },50);
        setTimeout(function(){ t.classList.remove('show'); setTimeout(function(){ t.remove(); },400); },3500);
      };

      // TEXT REVEAL
      if ('IntersectionObserver' in window){
        var ro = new IntersectionObserver(function(es){
          es.forEach(function(en){ if (en.isIntersecting){ en.target.classList.add('visible'); ro.unobserve(en.target); } });
        }, {threshold:.15});
        document.querySelectorAll('.card,.x_panel,.section-title,h2,h3,.xuJelajah a').forEach(function(el){ el.classList.add('xp-reveal'); ro.observe(el); });
      }

      // LANGUAGE
      document.querySelectorAll('.xp-lang-btn').forEach(function(b){
        b.addEventListener('click', function(){
          document.querySelectorAll('.xp-lang-btn').forEach(function(x){ x.classList.remove('active'); });
          this.classList.add('active');
          try{ localStorage.setItem('xuLang', this.dataset.lang); }catch(e){}
          showToast('Bahasa Berubah','Preferensi bahasa: '+(this.dataset.lang==='id'?'Indonesia':'English'),'info');
        });
      });
      try{
        var sl = localStorage.getItem('xuLang');
        if (sl) document.querySelectorAll('.xp-lang-btn').forEach(function(b){ b.classList.toggle('active', b.dataset.lang===sl); });
      }catch(e){}

      // A11Y
      var aB = document.getElementById('xpA11yBtn'), aP = document.getElementById('xpA11yPanel');
      aB && aB.addEventListener('click', function(e){ e.stopPropagation(); aP.classList.toggle('open'); });
      document.addEventListener('click', function(e){
        if (!e.target.closest('#xpA11yBtn') && !e.target.closest('#xpA11yPanel')) aP && aP.classList.remove('open');
      });
      document.querySelectorAll('.xp-a11y-row [data-size]').forEach(function(b){
        b.addEventListener('click', function(){
          document.querySelectorAll('.xp-a11y-row [data-size]').forEach(function(x){ x.classList.remove('active'); });
          this.classList.add('active');
          document.documentElement.classList.remove('xu-a11y-sm','xu-a11y-md','xu-a11y-lg');
          if (this.dataset.size!=='sm') document.documentElement.classList.add('xu-a11y-'+this.dataset.size);
          try{ localStorage.setItem('xuA11y', this.dataset.size); }catch(e){}
        });
      });
      function setTheme(dark){
        document.documentElement.classList.toggle('xu-dark', dark);
        try{ localStorage.setItem('xuTheme', dark?'dark':'light'); }catch(e){}
        var ico = document.getElementById('xuThemeIcon');
        if (ico) ico.className = dark?'fa fa-sun-o':'fa fa-moon-o';
      }
      document.querySelectorAll('.xp-a11y-row [data-theme]').forEach(function(b){
        b.addEventListener('click', function(){ setTheme(this.dataset.theme==='dark'); });
      });
      var tBtn = document.getElementById('xuThemeToggle');
      tBtn && tBtn.addEventListener('click', function(){ setTheme(!document.documentElement.classList.contains('xu-dark')); });

      // COOKIE
      try{ if (!localStorage.getItem('xpCookieOk')) setTimeout(function(){ document.getElementById('xpCookie').classList.add('show'); },2500); }catch(e){}
      document.getElementById('xpCookieOk') && document.getElementById('xpCookieOk').addEventListener('click', function(){ document.getElementById('xpCookie').classList.remove('show'); try{ localStorage.setItem('xpCookieOk','1'); }catch(e){} });
      document.getElementById('xpCookieNo') && document.getElementById('xpCookieNo').addEventListener('click', function(){ document.getElementById('xpCookie').classList.remove('show'); });

      // AI ASSISTANT
      var aiF=document.getElementById('xpAiFab'), aiP=document.getElementById('xpAiPanel'), aiC=document.getElementById('xpAiClose'), aiB=document.getElementById('xpAiBody'), aiI=document.getElementById('xpAiInput'), aiS=document.getElementById('xpAiSend');
      var AI_RESP = {
        'cara mencari':'Untuk mencari dokumen, gunakan ikon 🔍 di navbar atau tekan Ctrl+K. Anda bisa cari berdasarkan judul, penulis, atau kata kunci topik.',
        'galaksi riset':'🌌 Galaksi Riset adalah peta visual interaktif yang menampilkan hubungan antar topik penelitian di repositori kami.',
        'mendaftar':'Klik "Pendaftaran Anggota" di menu Link atau kunjungi halaman daftar. Prosesnya gratis dan hanya butuh 2 menit!',
        'integrity':'🛡️ Integrity Scanner adalah fitur khusus admin untuk mendeteksi plagiarisme dan tulisan AI secara otomatis.',
        'halo':'Halo juga! Senang bisa membantu. Ada pertanyaan spesifik tentang koleksi atau fitur kami?',
        'terima kasih':'Sama-sama! 😊 Jangan ragu bertanya lagi kapan saja.'
      };
      function aiRespond(m){
        var l=m.toLowerCase(), r='Terima kasih atas pertanyaannya! Silakan cek menu Informasi untuk panduan lengkap.';
        for (var k in AI_RESP) if (l.indexOf(k)!==-1){ r=AI_RESP[k]; break; }
        setTimeout(function(){ var d=document.createElement('div'); d.className='xp-ai-msg bot'; d.textContent=r; aiB.appendChild(d); aiB.scrollTop=aiB.scrollHeight; },600);
      }
      function aiSend(){
        var v=aiI.value.trim(); if(!v) return;
        var d=document.createElement('div'); d.className='xp-ai-msg user'; d.textContent=v; aiB.appendChild(d); aiB.scrollTop=aiB.scrollHeight;
        aiI.value=''; aiRespond(v);
      }
      aiF && aiF.addEventListener('click', function(){ aiP.classList.toggle('open'); });
      aiC && aiC.addEventListener('click', function(){ aiP.classList.remove('open'); });
      aiS && aiS.addEventListener('click', aiSend);
      aiI && aiI.addEventListener('keydown', function(e){ if(e.key==='Enter') aiSend(); });
      document.querySelectorAll('.xp-ai-quick button').forEach(function(b){ b.addEventListener('click', function(){ aiI.value=this.dataset.q; aiSend(); }); });

      // HELP MODAL + KONAMI + SHORTCUTS
      var hM = document.getElementById('xpHelpModal');
      function openHelp(){ hM.classList.add('open'); }
      function closeHelp(){ hM.classList.remove('open'); }
      hM && hM.addEventListener('click', function(e){ if(e.target===hM) closeHelp(); });
      var konami=['ArrowUp','ArrowUp','ArrowDown','ArrowDown','ArrowLeft','ArrowRight','ArrowLeft','ArrowRight','b','a'], kI=0;

      document.addEventListener('keydown', function(e){
        var tag=(e.target.tagName||'').toLowerCase();
        var inIn=(tag==='input'||tag==='textarea'||e.target.isContentEditable);
        if ((e.ctrlKey||e.metaKey) && e.key.toLowerCase()==='k'){ e.preventDefault(); sOv.classList.contains('open')?closeSearch():openSearch(); return; }
        if (e.key==='Escape'){ if(sOv.classList.contains('open'))closeSearch(); if(hM.classList.contains('open'))closeHelp(); if(aiP.classList.contains('open'))aiP.classList.remove('open'); return; }
        if (e.key===konami[kI]||e.key.toLowerCase()===konami[kI]){ kI++; if(kI===konami.length){ kI=0; showToast('🎮 Konami Code!','Anda menemukan easter egg! Selamat, Anda seorang gamer sejati.','fun'); } } else kI=0;
        if (inIn) return;
        if (e.key==='?'||(e.shiftKey&&e.key==='/')){ e.preventDefault(); hM.classList.contains('open')?closeHelp():openHelp(); return; }
        if (e.key.toLowerCase()==='d'){ setTheme(!document.documentElement.classList.contains('xu-dark')); return; }
        if (e.key.toLowerCase()==='t'){ window.scrollTo({top:0,behavior:'smooth'}); return; }
        if (e.key.toLowerCase()==='h'){ location.href=baseUrl; return; }
        if (e.key.toLowerCase()==='s'){ document.getElementById('xpShareFab').click(); return; }
      });

      // ===== NAVBAR FIT-GUARD: auto-sembunyikan elemen opsional bila overflow =====
      (function(){
        function fitNav(){
          var bar = document.querySelector('#xuNav .navbar');
          if (!bar || window.innerWidth < 992) return;
          var opts = ['.xu-chip-live', '.xp-lang-switch', '#xpSearchBtn', '.xu-a11y-wrap', '#xuThemeToggle'];
          // 1) Kembalikan semua ke tampilan CSS default
          opts.forEach(function(s){ var el = document.querySelector(s); if (el) el.style.display = ''; });
          // 2) Selama masih overflow, sembunyikan satu per satu dari yang paling opsional
          for (var i = 0; i < opts.length; i++){
            if (bar.scrollWidth > bar.clientWidth + 2){
              var el = document.querySelector(opts[i]);
              if (el) el.style.display = 'none';
            } else break;
          }
        }
        window.addEventListener('resize', fitNav);
        window.addEventListener('load', fitNav);
        document.addEventListener('DOMContentLoaded', fitNav);
      })();

      // WELCOME TOAST
      if (!sessionStorage.getItem('xp_pub_welcomed')){
        setTimeout(function(){ showToast('Selamat Datang 👋','Tip: tekan Ctrl+K untuk pencarian cepat, atau ? untuk bantuan keyboard.','info'); sessionStorage.setItem('xp_pub_welcomed','1'); },1500);
      }
    })();
    </script>
</body>
</html>