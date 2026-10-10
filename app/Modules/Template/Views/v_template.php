<!DOCTYPE html>
<html lang="id">

<head>
    <title><?= $title ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?= base_url('favicon.ico') ?>" type="image/ico" />

    <!-- Preconnect for performance -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="dns-prefetch" href="<?= base_url() ?>">

    <!-- Font Premium -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&family=JetBrains+Mono:wght@500;700&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="<?= base_url('assets/vendors/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= base_url('assets/vendors/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= base_url('assets/vendors/nprogress/nprogress.css') ?>" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?= base_url('assets/vendors/iCheck/skins/flat/green.css') ?>" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="<?= base_url('assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') ?>" rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?= base_url('assets/vendors/jqvmap/dist/jqvmap.min.css') ?>" rel="stylesheet" />
    <!-- bootstrap-daterangepicker -->
    <link href="<?= base_url('assets/vendors/bootstrap-daterangepicker/daterangepicker.css') ?>" rel="stylesheet">
    <!-- Select2 -->
    <link href="<?= base_url('assets/vendors/select2/dist/css/select2.min.css') ?>" rel="stylesheet" />
    <!-- Datatables -->
    <link href="<?= base_url('assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') ?>" rel="stylesheet">
    <!-- PNotify -->
    <link href="<?= base_url('assets/vendors/pnotify/dist/pnotify.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendors/pnotify/dist/pnotify.buttons.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendors/pnotify/dist/pnotify.nonblock.css') ?>" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="<?= base_url('assets/build/css/custom.min.css') ?>" rel="stylesheet">
    <!-- SummerNote -->
    <link href="<?= base_url('assets/vendors/summernote/summernote.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendors/summernote/summernote-bs4.min.css') ?>" rel="stylesheet">
    <script src="<?= base_url('assets/vendors/popperjs/popper.min') ?>"></script>
    <!-- Custom -->
    <link href="<?= base_url('assets/custom/css/custom.css') ?>" rel="stylesheet">
    <!-- ULTIMATE THEME -->
    <link href="<?= base_url('assets/ultimate-theme.css') ?>" rel="stylesheet">

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
    <?php
    $session = session();
    // ===== NOTIFIKASI REAL-TIME (dihitung dari database) =====
    $xpNotifItems = [];
    $xpNotifTotal = 0;
    try {
        $xpDb = \Config\Database::connect();
        try {
            $n = (int) $xpDb->table('xu_submission')->where('status','menunggu')->where('current_stage','admin')->countAllResults();
            if ($n > 0) $xpNotifItems[] = ['icon'=>'fa-tasks','color'=>'#f59e0b','count'=>$n,'title'=>$n.' dokumen menunggu persetujuan Anda','desc'=>'Pipeline Persetujuan','url'=>'bibliography/pipeline'];
        } catch (\Throwable $e) {}
        try {
            $n = (int) $xpDb->table('member')->where('is_pending',1)->countAllResults();
            if ($n > 0) $xpNotifItems[] = ['icon'=>'fa-user-plus','color'=>'#0ea5e9','count'=>$n,'title'=>$n.' pendaftaran anggota baru','desc'=>'Menunggu verifikasi','url'=>'membership/online'];
        } catch (\Throwable $e) {}
        try {
            $n = (int) $xpDb->table('biblio')->groupStart()->where('integrity_similarity >=',70)->orWhere('integrity_ai_risk >=',65)->groupEnd()->countAllResults();
            if ($n > 0) $xpNotifItems[] = ['icon'=>'fa-shield','color'=>'#ef4444','count'=>$n,'title'=>$n.' dokumen flagged integritas','desc'=>'Perlu review forensik','url'=>'bibliography/integrity-dashboard'];
        } catch (\Throwable $e) {}
        foreach ($xpNotifItems as $it) $xpNotifTotal += $it['count'];
    } catch (\Throwable $e) { $xpNotifItems = []; $xpNotifTotal = 0; }
    ?>

    <!-- ===== DROPDOWN HALUS UNTUK MENU FITUR BARU ===== -->
    <style>
        /* Transisi halus untuk submenu existing */
        .ult-sub{transition:max-height .45s cubic-bezier(.4,0,.2,1), opacity .3s ease;overflow:hidden}
        .ult-has-sub > a .ult-caret{transition:transform .35s cubic-bezier(.4,0,.2,1)}
        .ult-has-sub.ult-open > a .ult-caret{transform:rotate(180deg)}

        /* Ikon grup gradien untuk dropdown fitur baru */
        .ult-grp-ico{width:28px;height:28px;border-radius:8px;display:inline-flex;align-items:center;justify-content:center;font-size:.8rem;color:#fff;flex-shrink:0;box-shadow:0 3px 8px rgba(0,0,0,.18);margin-right:10px}
        .ult-grp-ico.wf{background:linear-gradient(135deg,#f59e0b,#ef4444)}
        .ult-grp-ico.ops{background:linear-gradient(135deg,#8b5cf6,#ec4899)}
        .ult-grp-ico.mem{background:linear-gradient(135deg,#0ea5e9,#22d3ee)}

        /* Submenu fitur baru dengan dot indikator */
        .ult-sub.xu-feat li a{display:flex;align-items:center;gap:8px;position:relative;padding-left:46px!important}
        .ult-sub.xu-feat li a::before{content:'';position:absolute;left:28px;top:50%;width:6px;height:6px;border-radius:50%;background:currentColor;opacity:.45;transform:translateY(-50%);transition:.25s}
        .ult-sub.xu-feat li a:hover{padding-left:50px!important}
        .ult-sub.xu-feat li a:hover::before{opacity:1;transform:translateY(-50%) scale(1.4)}
        .ult-sub.xu-feat li a.ult-active::before{opacity:1;background:#fde047}
        .ult-sub.xu-feat li a i{font-size:.82rem;opacity:.9}
        /* Avatar inisial gradien (pengganti img.jpg yang hilang) */
        .ult-ava{width:38px;height:38px;border-radius:50%;background:linear-gradient(135deg,#059669,#0891b2);color:#fff;font-weight:800;display:inline-flex;align-items:center;justify-content:center;font-size:.95rem;box-shadow:0 4px 12px rgba(5,150,105,.45);flex-shrink:0;margin-right:2px;border:2px solid rgba(255,255,255,.15)}
        /* Judul grup dropdown */
        .ult-has-sub.xu-feat > a{font-weight:700}
    </style>

    <!-- =========================================== -->
    <!-- ===== DIFOSS PRO — EMERALD FOREST ===== -->
    <!-- =========================================== -->
    <style>
    :root{
        --xp-emerald:#059669; --xp-teal:#0891b2; --xp-gold:#f59e0b;
        --xp-sapphire:#1e40af; --xp-rose:#e11d48;
        --xp-forest-deep:#0a2920; --xp-forest-mid:#115e59; --xp-forest-light:#064e3b;
        --xp-surface:#f8fafc; --xp-ink:#0f172a; --xp-muted:#64748b;
        --xp-radius:14px;
    }

    /* ===== SKIP LINK (Aksesibilitas) ===== */
    .xp-skip{position:absolute;left:-9999px;top:0;z-index:9999;padding:12px 20px;background:var(--xp-gold);color:#fff;font-weight:700;border-radius:0 0 12px 0;text-decoration:none}
    .xp-skip:focus{left:0}

    /* ===== SIDEBAR EMERALD FOREST ===== */
    body.xu-pro .ult-sidebar{
        background:
            radial-gradient(600px 300px at 100% 0%, rgba(14,165,233,.12), transparent 60%),
            radial-gradient(500px 400px at 0% 100%, rgba(5,150,105,.18), transparent 60%),
            linear-gradient(180deg,#0a2920 0%, #0d3d2f 35%, #115e59 70%, #064e3b 100%);
        border-right:1px solid rgba(5,150,105,.2);
        box-shadow:8px 0 40px rgba(5,20,15,.4);
    }
    body.xu-pro .ult-sidebar::before{
        content:'';position:absolute;top:0;left:0;right:0;height:1px;
        background:linear-gradient(90deg,transparent,rgba(245,158,11,.5),transparent);
    }
    body.xu-pro .ult-brand img{filter:drop-shadow(0 0 14px rgba(245,158,11,.5)) hue-rotate(-20deg)}
    body.xu-pro .ult-brand b{
        background:linear-gradient(90deg,#f59e0b,#0891b2);
        -webkit-background-clip:text;background-clip:text;
        -webkit-text-fill-color:transparent;
    }

    /* Label section divider */
    .xp-section-label{
        display:flex;align-items:center;gap:10px;
        padding:14px 14px 8px;margin-top:8px;
        font-size:.62rem;font-weight:800;letter-spacing:.18em;
        color:rgba(245,158,11,.85);text-transform:uppercase;
    }
    .xp-section-label::after{content:'';flex:1;height:1px;background:linear-gradient(90deg,rgba(245,158,11,.4),transparent)}

    /* Menu item dengan indicator bar */
    body.xu-pro .ult-menu > li > a{position:relative;overflow:hidden}
    body.xu-pro .ult-menu > li > a::before{
        content:'';position:absolute;left:0;top:0;bottom:0;width:0;
        background:linear-gradient(180deg,var(--xp-gold),var(--xp-emerald));
        transition:width .3s cubic-bezier(.4,0,.2,1);
    }
    body.xu-pro .ult-menu > li > a:hover::before{width:3px}
    body.xu-pro .ult-active{
        background:linear-gradient(90deg,var(--xp-emerald),var(--xp-teal))!important;
        box-shadow:0 10px 24px rgba(5,150,105,.5),inset 0 0 0 1px rgba(255,255,255,.1)!important;
    }
    body.xu-pro .ult-active::before{width:4px!important}
    body.xu-pro .ult-menu > li > a > .fa:first-child{
        width:32px;height:32px;border-radius:8px;
        display:inline-flex;align-items:center;justify-content:center;
        background:rgba(255,255,255,.06);transition:.25s;
    }
    body.xu-pro .ult-menu > li > a:hover > .fa:first-child{
        background:rgba(245,158,11,.2);color:var(--xp-gold);
    }
    body.xu-pro .ult-active > .fa:first-child{
        background:rgba(255,255,255,.2)!important;color:#fff!important;
    }

    /* Submenu refined */
    body.xu-pro .ult-sub{background:rgba(0,0,0,.15);border-radius:10px;margin:4px 6px}
    body.xu-pro .ult-sub a{
        border-left:2px solid transparent;
        transition:.2s;
    }
    body.xu-pro .ult-sub a:hover{border-left-color:var(--xp-gold);background:rgba(245,158,11,.08)}

    /* Status dot di footer sidebar */
    .xp-status-dot{
        width:8px;height:8px;border-radius:50%;
        background:#10b981;box-shadow:0 0 10px #10b981;
        display:inline-block;animation:xpPulse 2s infinite;
    }
    @keyframes xpPulse{0%,100%{opacity:1}50%{opacity:.4}}
    body.xu-pro .ult-side-foot{
        background:rgba(0,0,0,.25);
        border-top:1px solid rgba(5,150,105,.2);
        padding:16px 18px;
    }
    body.xu-pro .ult-side-foot a{
        width:38px;height:38px;border-radius:10px;
        display:inline-flex;align-items:center;justify-content:center;
        background:rgba(255,255,255,.06);transition:.25s;
    }
    body.xu-pro .ult-side-foot a:hover{
        background:linear-gradient(135deg,var(--xp-emerald),var(--xp-teal));
        color:#fff;transform:translateY(-2px);
        box-shadow:0 8px 16px rgba(5,150,105,.4);
    }

    /* ===== TOPBAR PRO ===== */
    body.xu-pro .ult-topbar{
        background:rgba(255,255,255,.85);
        backdrop-filter:blur(20px) saturate(180%);
        -webkit-backdrop-filter:blur(20px) saturate(180%);
        border-bottom:1px solid rgba(5,150,105,.1);
        padding:14px 28px;
        box-shadow:0 4px 30px rgba(5,20,15,.06);
    }
    body.xu-pro .ult-top-title{
        background:linear-gradient(90deg,var(--xp-emerald),var(--xp-teal),var(--xp-gold));
        -webkit-background-clip:text;background-clip:text;
        -webkit-text-fill-color:transparent;
        font-weight:900;letter-spacing:-.01em;
    }

    /* Breadcrumb otomatis */
    .xp-breadcrumb{
        display:flex;align-items:center;gap:6px;
        font-size:.72rem;color:var(--xp-muted);
        margin-top:4px;
    }
    .xp-breadcrumb a{color:var(--xp-muted);text-decoration:none;transition:.2s}
    .xp-breadcrumb a:hover{color:var(--xp-emerald)}
    .xp-breadcrumb .sep{opacity:.4}
    .xp-breadcrumb .current{color:var(--xp-emerald);font-weight:700}

    /* Command palette trigger */
    .xp-cmd-trigger{
        display:inline-flex;align-items:center;gap:8px;
        padding:8px 14px;border-radius:10px;
        background:rgba(5,150,105,.06);
        border:1px solid rgba(5,150,105,.15);
        color:var(--xp-muted);font-size:.82rem;
        cursor:pointer;transition:.2s;
        margin-left:12px;
    }
    .xp-cmd-trigger:hover{background:rgba(5,150,105,.1);color:var(--xp-emerald)}
    .xp-cmd-trigger kbd{
        font-family:'JetBrains Mono',monospace;
        font-size:.65rem;font-weight:700;
        padding:2px 6px;border-radius:4px;
        background:#fff;border:1px solid rgba(5,150,105,.2);
        color:var(--xp-emerald);
    }
    .xp-cmd-trigger i{color:var(--xp-emerald)}

    /* Notifikasi bell */
    .xp-bell{
        position:relative;width:40px;height:40px;border-radius:10px;
        display:inline-flex;align-items:center;justify-content:center;
        background:rgba(5,150,105,.06);color:var(--xp-emerald);
        cursor:pointer;transition:.2s;border:1px solid transparent;
    }
    .xp-bell:hover{background:rgba(5,150,105,.12);border-color:rgba(5,150,105,.2)}
    .xp-bell-badge{
        position:absolute;top:4px;right:4px;
        min-width:16px;height:16px;padding:0 4px;border-radius:999px;
        background:var(--xp-rose);color:#fff;
        font-size:.62rem;font-weight:800;
        display:flex;align-items:center;justify-content:center;
        border:2px solid #fff;
    }
    .xp-bell-badge::after{
        content:'';position:absolute;inset:0;border-radius:999px;
        border:2px solid var(--xp-rose);animation:xpRing 2s infinite;
    }
    @keyframes xpRing{0%{transform:scale(1);opacity:.8}100%{transform:scale(2.2);opacity:0}}

    /* Dark mode toggle */
    .xp-theme-toggle{
        width:40px;height:40px;border-radius:10px;
        display:inline-flex;align-items:center;justify-content:center;
        background:rgba(5,150,105,.06);color:var(--xp-emerald);
        cursor:pointer;transition:.2s;border:1px solid transparent;
    }
    .xp-theme-toggle:hover{background:rgba(5,150,105,.12);border-color:rgba(5,150,105,.2)}

    /* Time display */
    .xp-time{
        font-family:'JetBrains Mono',monospace;
        font-size:.78rem;font-weight:700;
        color:var(--xp-muted);letter-spacing:.02em;
        padding:6px 12px;border-radius:8px;
        background:rgba(5,150,105,.06);
        border:1px solid rgba(5,150,105,.1);
    }
    .xp-time .date{color:var(--xp-emerald);font-weight:800}

    /* User menu upgrade */
    body.xu-pro .ult-user > a{gap:12px}
    body.xu-pro .ult-usermenu{
        border:1px solid rgba(5,150,105,.1);
        box-shadow:0 20px 50px rgba(5,20,15,.15);
    }
    body.xu-pro .ult-usermenu .dropdown-item:hover{
        background:linear-gradient(90deg,rgba(5,150,105,.1),transparent);
        color:var(--xp-emerald);
        padding-left:20px;
    }

    /* ===== COMMAND PALETTE (Ctrl+K) ===== */
    .xp-cmd-overlay{
        position:fixed;inset:0;z-index:5000;
        background:rgba(10,41,32,.7);
        backdrop-filter:blur(12px);
        -webkit-backdrop-filter:blur(12px);
        display:none;align-items:flex-start;justify-content:center;
        padding-top:15vh;
    }
    .xp-cmd-overlay.open{display:flex;animation:xpFade .2s ease}
    @keyframes xpFade{from{opacity:0}to{opacity:1}}
    .xp-cmd-box{
        width:100%;max-width:640px;
        background:#fff;border-radius:18px;
        overflow:hidden;
        box-shadow:0 30px 80px rgba(10,41,32,.4);
        animation:xpSlideUp .3s cubic-bezier(.2,.8,.2,1);
    }
    @keyframes xpSlideUp{from{transform:translateY(-20px);opacity:0}to{transform:none;opacity:1}}
    .xp-cmd-head{
        display:flex;align-items:center;gap:12px;
        padding:16px 20px;border-bottom:1px solid #e2e8f0;
        background:linear-gradient(90deg,rgba(5,150,105,.04),transparent);
    }
    .xp-cmd-head i{color:var(--xp-emerald);font-size:1.1rem}
    .xp-cmd-input{
        flex:1;border:none;outline:none;
        font-size:1rem;font-weight:600;
        color:var(--xp-ink);background:transparent;
    }
    .xp-cmd-input::placeholder{color:var(--xp-muted);font-weight:500}
    .xp-cmd-hint{
        font-family:'JetBrains Mono',monospace;
        font-size:.65rem;font-weight:700;
        padding:3px 8px;border-radius:6px;
        background:#f1f5f9;color:var(--xp-muted);
    }
    .xp-cmd-results{max-height:420px;overflow-y:auto;padding:8px}
    .xp-cmd-item{
        display:flex;align-items:center;gap:12px;
        padding:11px 14px;border-radius:10px;
        cursor:pointer;transition:.15s;
        font-size:.88rem;color:var(--xp-ink);
    }
    .xp-cmd-item:hover,.xp-cmd-item.active{
        background:linear-gradient(90deg,rgba(5,150,105,.1),rgba(8,145,178,.05));
    }
    .xp-cmd-item i{
        width:32px;height:32px;border-radius:8px;
        display:inline-flex;align-items:center;justify-content:center;
        background:rgba(5,150,105,.1);color:var(--xp-emerald);
        font-size:.9rem;
    }
    .xp-cmd-item .meta{margin-left:auto;font-size:.7rem;color:var(--xp-muted)}
    .xp-cmd-empty{padding:30px;text-align:center;color:var(--xp-muted);font-size:.85rem}
    .xp-cmd-foot{
        padding:10px 16px;background:#f8fafc;border-top:1px solid #e2e8f0;
        display:flex;align-items:center;gap:14px;font-size:.72rem;color:var(--xp-muted);
    }
    .xp-cmd-foot kbd{
        font-family:'JetBrains Mono',monospace;font-weight:700;
        padding:2px 6px;border-radius:4px;background:#fff;
        border:1px solid #cbd5e1;font-size:.68rem;
    }

    /* ===== FLOATING ACTION BUTTON ===== */
    .xp-fab{
        position:fixed;bottom:28px;right:28px;z-index:1000;
        width:56px;height:56px;border-radius:16px;
        background:linear-gradient(135deg,var(--xp-emerald),var(--xp-teal));
        color:#fff;border:none;cursor:pointer;
        box-shadow:0 14px 30px rgba(5,150,105,.4),0 0 0 4px rgba(5,150,105,.1);
        font-size:1.4rem;transition:.3s cubic-bezier(.2,.8,.2,1);
        display:flex;align-items:center;justify-content:center;
    }
    .xp-fab:hover{
        transform:translateY(-4px) rotate(90deg) scale(1.05);
        box-shadow:0 20px 40px rgba(5,150,105,.5);
    }
    .xp-fab i{transition:transform .3s}

    /* ===== FOOTER UPGRADE ===== */
    body.xu-pro footer.ult-footer{
        background:
            radial-gradient(400px 180px at 20% 50%, rgba(245,158,11,.12), transparent 60%),
            radial-gradient(400px 180px at 80% 50%, rgba(5,150,105,.18), transparent 60%),
            linear-gradient(90deg,#0a2920 0%,#0d3d2f 50%,#115e59 100%);
    }
    body.xu-pro footer.ult-footer::before{
        background:linear-gradient(90deg,var(--xp-emerald),var(--xp-gold),var(--xp-teal),var(--xp-emerald));
        background-size:300% 100%;
    }
    body.xu-pro footer.ult-footer strong{
        background:linear-gradient(90deg,var(--xp-gold),var(--xp-teal));
        -webkit-background-clip:text;background-clip:text;
        -webkit-text-fill-color:transparent;
    }
    body.xu-pro .ult-footer-ver{
        border-color:rgba(245,158,11,.4);
        background:rgba(245,158,11,.08);
        color:var(--xp-gold);
        text-shadow:0 0 10px rgba(245,158,11,.5);
    }

    /* ===== TOAST NOTIFICATION ===== */
    .xp-toast{
        position:fixed;bottom:100px;right:28px;z-index:4500;
        min-width:280px;max-width:380px;
        background:#fff;border-radius:14px;
        padding:14px 18px;
        box-shadow:0 20px 50px rgba(5,20,15,.2);
        border-left:4px solid var(--xp-emerald);
        display:flex;align-items:center;gap:12px;
        transform:translateX(420px);transition:.4s cubic-bezier(.2,.8,.2,1);
    }
    .xp-toast.show{transform:none}
    .xp-toast.success{border-left-color:var(--xp-emerald)}
    .xp-toast.warning{border-left-color:var(--xp-gold)}
    .xp-toast.error{border-left-color:var(--xp-rose)}
    .xp-toast i{font-size:1.4rem}
    .xp-toast.success i{color:var(--xp-emerald)}
    .xp-toast.warning i{color:var(--xp-gold)}
    .xp-toast.error i{color:var(--xp-rose)}
    .xp-toast-body{flex:1}
    .xp-toast-title{font-weight:800;font-size:.88rem;color:var(--xp-ink)}
    .xp-toast-msg{font-size:.78rem;color:var(--xp-muted);margin-top:2px}

    /* ===== RESPONSIVE MOBILE ===== */
    @media(max-width:768px){
        .xp-cmd-trigger{display:none}
        .xp-time{display:none}
        .xp-fab{bottom:16px;right:16px;width:48px;height:48px;border-radius:14px}
    }

    /* ===== MOBILE BOTTOM NAV ===== */
    .xp-mobile-nav{
        display:none;
        position:fixed;bottom:0;left:0;right:0;z-index:950;
        background:rgba(255,255,255,.95);
        backdrop-filter:blur(20px);
        border-top:1px solid rgba(5,150,105,.1);
        padding:8px 4px;
    }
    @media(max-width:768px){
        .xp-mobile-nav{display:flex;justify-content:space-around}
        body.xu-pro footer.ult-footer{margin-bottom:60px!important}
    }
    .xp-mobile-nav a{
        display:flex;flex-direction:column;align-items:center;gap:3px;
        padding:6px 10px;color:var(--xp-muted);text-decoration:none;
        font-size:.62rem;font-weight:700;transition:.2s;border-radius:10px;
    }
    .xp-mobile-nav a i{font-size:1.15rem}
    .xp-mobile-nav a:hover,.xp-mobile-nav a.active{color:var(--xp-emerald)}

    /* ===== FOCUS STATES (Accessibility) ===== */
    body.xu-pro a:focus-visible,body.xu-pro button:focus-visible{
        outline:2px solid var(--xp-gold);outline-offset:2px;
    }

    /* ===== PAGE LOADING ===== */
    .xp-page-loader{
        position:fixed;top:0;left:0;height:3px;z-index:9999;
        background:linear-gradient(90deg,var(--xp-emerald),var(--xp-teal),var(--xp-gold));
        width:0;transition:width .8s ease;
    }
    .xp-page-loader.done{width:100%;opacity:0;transition:width .3s,opacity .4s .3s}

    /* ===== PANEL NOTIFIKASI ===== */
    .xp-notif-panel{position:absolute;top:calc(100% + 10px);right:0;width:340px;background:#fff;border-radius:16px;box-shadow:0 24px 60px rgba(5,20,15,.2);border:1px solid rgba(5,150,105,.12);overflow:hidden;opacity:0;transform:translateY(-8px) scale(.98);pointer-events:none;transition:.25s cubic-bezier(.2,.8,.2,1);z-index:1200}
    .xp-notif-panel.open{opacity:1;transform:none;pointer-events:auto}
    .xp-notif-head{display:flex;justify-content:space-between;align-items:center;padding:14px 18px;background:linear-gradient(90deg,rgba(5,150,105,.06),transparent);border-bottom:1px solid #eef2f7}
    .xp-notif-head b{font-size:.9rem;color:var(--xp-ink)}
    .xp-notif-head span{font-size:.7rem;color:var(--xp-muted)}
    .xp-notif-body{max-height:320px;overflow-y:auto}
    .xp-notif-item{display:flex;align-items:center;gap:12px;padding:13px 18px;text-decoration:none;transition:.15s;border-bottom:1px solid #f5f7fa}
    .xp-notif-item:hover{background:linear-gradient(90deg,rgba(5,150,105,.06),transparent)}
    .xp-notif-ico{width:38px;height:38px;border-radius:10px;display:inline-flex;align-items:center;justify-content:center;font-size:1rem;flex-shrink:0}
    .xp-notif-txt{flex:1;min-width:0}
    .xp-notif-txt .t{font-size:.83rem;font-weight:700;color:var(--xp-ink);line-height:1.3}
    .xp-notif-txt .d{font-size:.7rem;color:var(--xp-muted);margin-top:2px}
    .xp-notif-count{min-width:24px;height:24px;padding:0 7px;border-radius:999px;color:#fff;font-size:.7rem;font-weight:800;display:flex;align-items:center;justify-content:center}
    .xp-notif-empty{padding:36px 20px;text-align:center;color:var(--xp-muted);font-size:.85rem}
    .xp-notif-empty i{display:block;font-size:2rem;color:var(--xp-emerald);margin-bottom:10px}
    </style>

    <!-- Dark Mode CSS (cache-buster agar tidak tertahan cache lama) -->
  

    <!-- ===== DARK MODE CORE — INLINE, ANTI-CACHE & ANTI-SPECIFICITY ===== -->
    <style id="xuDarkCore">
    /* 1. Background dasar: tubuh, shell, area konten */
    html.xu-dark body,
    html.xu-dark body.ult-body.xu-pro,
    html.xu-dark .ult-shell,
    html.xu-dark .ult-main,
    html.xu-dark main.ult-content,
    html.xu-dark .ult-content{
        background-color:#0b1220 !important;
        background-image:none !important;
        color:#e2e8f0 !important;
    }
    /* 2. MATIKAN lapisan gradien dekoratif (penyebab tepi putih/keunguan) */
    html.xu-dark body.xu-pro::before,
    html.xu-dark body.xu-pro::after,
    html.xu-dark .ult-main::before,
    html.xu-dark .ult-main::after,
    html.xu-dark .ult-content::before,
    html.xu-dark .ult-content::after{
        background-image:none !important;
        background-color:transparent !important;
    }
    /* 3. Topbar */
    html.xu-dark body.xu-pro .ult-topbar,
    html.xu-dark header.ult-topbar{
        background-color:rgba(15,23,42,.92) !important;
        background-image:none !important;
        border-bottom:1px solid rgba(5,150,105,.2) !important;
        box-shadow:0 4px 30px rgba(0,0,0,.45) !important;
    }
    html.xu-dark .ult-burger{color:#94a3b8 !important}
    html.xu-dark .xp-breadcrumb,
    html.xu-dark .xp-breadcrumb a{color:#94a3b8 !important}
    html.xu-dark .xp-breadcrumb .current{color:#34d399 !important}
    /* 4. Chip topbar: search, jam, bell, toggle */
    html.xu-dark .xp-cmd-trigger,
    html.xu-dark .xp-time,
    html.xu-dark .xp-bell,
    html.xu-dark .xp-theme-toggle{
        background-color:rgba(255,255,255,.06) !important;
        border-color:rgba(148,163,184,.25) !important;
        color:#94a3b8 !important;
    }
    html.xu-dark .xp-cmd-trigger kbd{background:#1e293b !important;border-color:rgba(148,163,184,.3) !important;color:#34d399 !important}
    html.xu-dark .xp-time .date{color:#34d399 !important}
    html.xu-dark .xp-bell,
    html.xu-dark .xp-theme-toggle{color:#34d399 !important}
    html.xu-dark .xp-bell-badge{border-color:#0f172a !important}
    /* 5. Dropdown user & mobile nav */
    html.xu-dark .dropdown-menu,
    html.xu-dark body.xu-pro .ult-usermenu{background-color:#1e293b !important;border-color:rgba(5,150,105,.25) !important}
    html.xu-dark .dropdown-item{color:#cbd5e1 !important}
    html.xu-dark .dropdown-divider{border-color:rgba(148,163,184,.15) !important}
    html.xu-dark .xp-mobile-nav{background-color:rgba(15,23,42,.95) !important;border-color:rgba(5,150,105,.2) !important}
    html.xu-dark .xp-mobile-nav a{color:#94a3b8 !important}
    </style>
    <!-- Prevent flash: apply dark class ASAP -->
    <script>
        (function(){
            var mode = localStorage.getItem('rangkui_dark_mode');
            if (mode === 'dark' || (!mode && window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('xu-dark');
            }
        })();
    </script>

</head>

<body class="nav-md ult-body xu-pro">
    <a href="#main-content" class="xp-skip">Lewati ke konten utama</a>
    <div class="xp-page-loader" id="xpLoader"></div>

    <div class="ult-shell">

        <!-- ============ SIDEBAR ============ -->
        <aside class="ult-sidebar">
            <div class="ult-brand">
                <a href="<?= base_url('/home') ?>">
                    <img src="<?= base_url('assets/images/logo.png') ?>" alt="logo ETD">
                    <span>ETD <b>System</b></span>
                </a>
            </div>
            <div class="ult-version">
                <code>Version : 4.1.0</code>
                <code>Code name : Rangkui</code>
            </div>

            <nav class="ult-nav">
                <p class="ult-nav-label">Menu Utama</p>
                <ul class="ult-menu">
                    <li><a href="<?= base_url() ?>"><i class="fa fa-globe"></i><span>Website</span></a></li>
                    <li><a href="<?= base_url('home') ?>"><i class="fa fa-bar-chart-o"></i><span>Dashboard</span></a></li>

                    <div class="xp-section-label">🧠 Intelligence</div>

                    <li>
                        <a href="<?= base_url('bibliography/analytics') ?>" style="position:relative">
                            <i class="fa fa-line-chart" style="color:#f59e0b"></i>
                            <span>Analitik Komando</span>
                            <span style="margin-left:auto;padding:3px 10px;border-radius:999px;background:linear-gradient(90deg,#059669,#0891b2);color:#fff;font-size:.62rem;font-weight:800;letter-spacing:.06em;">AI</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('bibliography/scanner') ?>">
                            <i class="fa fa-stethoscope" style="color:#10b981"></i>
                            <span>Scanner Kebersihan</span>
                        </a>
                    </li>

<div class="xp-section-label">🛡️ Audit & Integritas</div>

<!-- ===== AUDIT GERBANG PLAGIARISME (alat admin) ===== -->
<li>
    <a href="<?= base_url('plagiarism/audit') ?>" style="position:relative">
        <i class="fa fa-history" style="color:#10b981"></i>
        <span>Audit Gerbang</span>
        <span style="margin-left:auto;padding:3px 10px;border-radius:999px;background:linear-gradient(90deg,#059669,#0891b2);color:#fff;font-size:.6rem;font-weight:800;letter-spacing:.06em;">GATE</span>
    </a>
</li>

<!-- ===== DASBOR FORENSIK (tetap) ===== -->
<li>
    <a href="<?= base_url('bibliography/integrity-dashboard') ?>">
        <i class="fa fa-area-chart" style="color:#f59e0b"></i>
        <span>Dasbor Forensik</span>
    </a>
</li>

                    <div class="xp-section-label">⚙️ Operasi</div>

                    <!-- ===== DROPDOWN 1: WORKFLOW & FORENSIK ===== -->
                    <li class="ult-has-sub xu-feat">
                        <a href="javascript:;">
                            <span class="ult-grp-ico wf"><i class="fa fa-cogs"></i></span>
                            <span>Workflow & Forensik</span>
                            <i class="fa fa-chevron-down ult-caret"></i>
                        </a>
                        <ul class="ult-sub xu-feat">
                            <li>
                                <a href="<?= base_url('bibliography/pipeline') ?>">
                                    <i class="fa fa-tasks" style="color:#f59e0b"></i>
                                    <span>Pipeline Persetujuan</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= base_url('bibliography/integrity') ?>">
                                    <i class="fa fa-shield" style="color:#ef4444"></i>
                                    <span>Integrity Scanner</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= base_url('bibliography/integrity-dashboard') ?>">
                                    <i class="fa fa-area-chart" style="color:#22d3ee"></i>
                                    <span>Dasbor Forensik</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- ===== DROPDOWN 2: OPERASI MASSAL ===== -->
                    <li class="ult-has-sub xu-feat">
                        <a href="javascript:;">
                            <span class="ult-grp-ico ops"><i class="fa fa-magic"></i></span>
                            <span>Operasi Massal</span>
                            <i class="fa fa-chevron-down ult-caret"></i>
                        </a>
                        <ul class="ult-sub xu-feat">
                            <li>
                                <a href="<?= base_url('bibliography/bulk') ?>">
                                    <i class="fa fa-cubes" style="color:#ec4899"></i>
                                    <span>Bulk Operations</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- ===== DROPDOWN 3: KEANGGOTAAN ONLINE ===== -->
                    <li class="ult-has-sub xu-feat">
                        <a href="javascript:;">
                            <span class="ult-grp-ico mem"><i class="fa fa-id-badge"></i></span>
                            <span>Keanggotaan Online</span>
                            <i class="fa fa-chevron-down ult-caret"></i>
                        </a>
                        <ul class="ult-sub xu-feat">
                            <li>
                                <a href="<?= base_url('membership/online') ?>">
                                    <i class="fa fa-user-plus" style="color:#0ea5e9"></i>
                                    <span>Pendaftaran Online</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= base_url('membership/reg-settings') ?>">
                                    <i class="fa fa-sliders" style="color:#22d3ee"></i>
                                    <span>Pengaturan Pendaftaran</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <div class="xp-section-label">📚 Lainnya</div>

   <!-- MENU SUBMISSION (HARDCODED FALLBACK) -->
   <li class="ult-has-sub">
       <a href="javascript:;">
           <i class="fa fa-cloud-upload"></i>
           <span>Submission</span>
           <i class="fa fa-chevron-down ult-caret"></i>
       </a>
       <ul class="ult-sub">
           <li>
               <a href="<?= base_url('submission/dashboard') ?>">
                   Dashboard Submission
               </a>
           </li>
       </ul>
   </li>
   <!-- AKHIR MENU SUBMISSION -->

                    <?php foreach ($menus as $key => $menu):
                        $menu = (object) $menu;
                    ?>
                        <?php if (array_key_exists('children', (array) $menu)) : ?>
                            <li class="ult-has-sub">
                                <a href="javascript:;"><i class="fa <?= $menu->icon; ?>"></i><span><?= $menu->title; ?></span><i class="fa fa-chevron-down ult-caret"></i></a>
                                <ul class="ult-sub">
                                    <?php foreach ($menu->children as $sub) :
                                        $sub = (object) $sub;
                                    ?>
                                        <?php if ((int) $sub->level == 3): ?>
                                            <li><a href="<?= base_url() . $sub->url ?>"><?= $sub->title; ?></a></li>
                                        <?php else: ?>
                                            <li class="ult-has-sub">
                                                <a href="javascript:;"><?= $sub->title; ?><i class="fa fa-chevron-down ult-caret"></i></a>
                                                <ul class="ult-sub">
                                                    <!-- TAMBAHAN: Cek apakah children ada dan berupa array sebelum di-loop -->
                                                    <?php if (isset($sub->children) && is_array($sub->children)): ?>
                                                        <?php foreach ($sub->children as $subsub):
                                                            $subsub = (object) $subsub; ?>
                                                            <li><a href="<?= base_url() . $subsub->url ?>"><?= $subsub->title; ?></a></li>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </ul>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach ?>
                                </ul>
                            </li>
                        <?php else: ?>
                            <li><a href="<?= base_url() . $menu->url ?>"><i class="fa <?= $menu->icon; ?>"></i><span><?= $menu->title; ?></span></a></li>
                        <?php endif ?>
                    <?php endforeach ?>
                </ul>
            </nav>

            <div class="ult-side-foot">
                <span class="xp-status-dot" title="System online"></span>
                <a href="javascript:;" id="ultFullscreen" title="Layar Penuh"><i class="fa fa-expand"></i></a>
                <a href="<?= base_url('logout'); ?>" title="Logout"><i class="fa fa-power-off"></i></a>
            </div>
        </aside>

        <!-- ============ AREA UTAMA ============ -->
        <div class="ult-main">

            <header class="ult-topbar">
                <a href="javascript:;" id="menu_toggle" class="ult-burger"><i class="fa fa-bars"></i></a>
                <div>
                    <div class="ult-top-title"><?= $title ?></div>
                    <div class="xp-breadcrumb" id="xpBreadcrumb"></div>
                </div>

                <button class="xp-cmd-trigger" id="xpCmdBtn" type="button">
                    <i class="fa fa-search"></i>
                    <span>Cari cepat...</span>
                    <kbd>Ctrl K</kbd>
                </button>

                <div class="xp-time" id="xpTime">
                    <span class="date">--</span>
                    <span>·</span>
                    <span class="clock">--:--</span>
                </div>

               <button class="xp-theme-toggle" id="xpThemeBtn" title="Toggle Dark Mode">
               <i class="fa fa-moon-o" id="xpThemeIcon"></i>
               </button>

                <div class="xp-bell-wrap" style="position:relative">
                    <div class="xp-bell" id="xpBell" title="Notifikasi">
                        <i class="fa fa-bell"></i>
                        <?php if ($xpNotifTotal > 0): ?>
                        <span class="xp-bell-badge"><?= $xpNotifTotal > 9 ? '9+' : $xpNotifTotal ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="xp-notif-panel" id="xpNotifPanel">
                        <div class="xp-notif-head">
                            <b>Notifikasi</b>
                            <span><?= $xpNotifTotal ?> belum dibaca</span>
                        </div>
                        <div class="xp-notif-body">
                            <?php if (empty($xpNotifItems)): ?>
                                <div class="xp-notif-empty"><i class="fa fa-check-circle"></i> Semua beres! Tidak ada notifikasi baru.</div>
                            <?php else: ?>
                                <?php foreach ($xpNotifItems as $it): ?>
                                <a class="xp-notif-item" href="<?= base_url($it['url']) ?>">
                                    <span class="xp-notif-ico" style="background:<?= $it['color'] ?>1a;color:<?= $it['color'] ?>"><i class="fa <?= $it['icon'] ?>"></i></span>
                                    <div class="xp-notif-txt">
                                        <div class="t"><?= esc($it['title']) ?></div>
                                        <div class="d"><?= esc($it['desc']) ?></div>
                                    </div>
                                    <span class="xp-notif-count" style="background:<?= $it['color'] ?>"><?= $it['count'] ?></span>
                                </a>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="ult-user dropdown">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <span class="ult-ava"><?= esc(strtoupper(substr(trim((string) ($session->name ?? 'A')), 0, 1))) ?></span>
                        <span><?= $session->name ?></span>
                        <i class="fa fa-chevron-down ult-mini-caret"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right ult-usermenu">
                        <a class="dropdown-item" href="<?= base_url('profile') ?>"><i class="fa fa-user"></i> Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?= base_url('login/logout') ?>"><i class="fa fa-sign-out"></i> Log Out</a>
                    </div>
                </div>
            </header>

            <main class="ult-content" role="main" id="main-content">
                <?= $content ?>
            </main>

        </div>
    </div>

    <!-- ============ FOOTER ============ -->
    <footer class="ult-footer">
        <div class="ult-footer-left">
            <span class="ult-footer-copy">© <?= date('Y') ?></span>
            <span class="ult-footer-sep"></span>
            <strong>Repositori Institusional</strong>
            <span class="ult-footer-sep"></span>
            <span class="ult-footer-note">Mengelola karya ilmiah dengan bangga</span>
        </div>
        <div class="ult-footer-right">
            <span class="ult-footer-ver">v4.1.0 · Rangkui</span>
            <span class="ult-footer-sep"></span>
            <span>Powered by <strong>DIFOSS TIM</strong> ⚡</span>
        </div>
    </footer>

    <!-- ===== COMMAND PALETTE ===== -->
    <div class="xp-cmd-overlay" id="xpCmd">
        <div class="xp-cmd-box">
            <div class="xp-cmd-head">
                <i class="fa fa-search"></i>
                <input type="text" class="xp-cmd-input" id="xpCmdInput" placeholder="Ketik untuk mencari halaman, fitur, atau aksi..." autocomplete="off">
                <span class="xp-cmd-hint">ESC</span>
            </div>
            <div class="xp-cmd-results" id="xpCmdResults"></div>
            <div class="xp-cmd-foot">
                <span><kbd>↑</kbd> <kbd>↓</kbd> Navigasi</span>
                <span><kbd>↵</kbd> Pilih</span>
                <span><kbd>ESC</kbd> Tutup</span>
            </div>
        </div>
    </div>

    <!-- ===== FLOATING ACTION BUTTON ===== -->
    <button class="xp-fab" id="xpFab" title="Aksi Cepat">
        <i class="fa fa-plus"></i>
    </button>

    <!-- ===== MOBILE BOTTOM NAV ===== -->
    <nav class="xp-mobile-nav">
        <a href="<?= base_url('home') ?>"><i class="fa fa-home"></i><span>Home</span></a>
        <a href="<?= base_url('bibliography/analytics') ?>"><i class="fa fa-line-chart"></i><span>Analitik</span></a>
        <a href="<?= base_url('bibliography/integrity-dashboard') ?>"><i class="fa fa-shield"></i><span>Forensik</span></a>
        <a href="javascript:;" id="xpMobileCmd"><i class="fa fa-search"></i><span>Cari</span></a>
        <a href="<?= base_url('profile') ?>"><i class="fa fa-user"></i><span>Profil</span></a>
    </nav>

    <!-- ============ SCRIPTS ============ -->
    <script src="<?= base_url('assets/vendors/jquery/dist/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/select2/dist/js/select2.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/fastclick/lib/fastclick.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/nprogress/nprogress.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/Chart.js/dist/Chart.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/gauge.js/dist/gauge.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/iCheck/icheck.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/skycons/skycons.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/Flot/jquery.flot.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/Flot/jquery.flot.pie.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/Flot/jquery.flot.time.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/Flot/jquery.flot.stack.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/Flot/jquery.flot.resize.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/flot-spline/js/jquery.flot.spline.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/flot.curvedlines/curvedLines.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/DateJS/build/date.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/jqvmap/dist/jquery.vmap.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/moment/min/moment.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/bootstrap-daterangepicker/daterangepicker.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/datatables.net-buttons/js/buttons.flash.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/datatables.net-buttons/js/buttons.html5.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/datatables.net-buttons/js/buttons.print.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/jszip/dist/jszip.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/pdfmake/build/pdfmake.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/pdfmake/build/vfs_fonts.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/summernote/summernote.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/summernote/summernote-bs4.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/pnotify/dist/pnotify.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/pnotify/dist/pnotify.buttons.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/pnotify/dist/pnotify.nonblock.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js') ?>"></script>
    <script src="<?= base_url('assets/build/js/custom.js') ?>"></script>
    <script src="<?= base_url('assets/custom/js/custom.js') ?>"></script>

    <!-- Interaksi Ultimate -->
    <script>
        $(function() {
            $('#menu_toggle').on('click', function(e) {
                e.preventDefault();
                $('body').toggleClass('ult-collapsed');
            });
            $('.ult-has-sub > a').on('click', function(e) {
                e.preventDefault();
                $(this).parent().toggleClass('ult-open');
            });
            var path = location.pathname.replace(/\/+$/, '');
            $('.ult-menu a').each(function() {
                var href = $(this).attr('href') || '';
                if (href.indexOf('javascript') === 0) return;
                try {
                    var p = new URL(href, location.origin).pathname.replace(/\/+$/, '');
                    if (p !== '' && p === path) {
                        $(this).addClass('ult-active');
                        $(this).closest('.ult-has-sub').addClass('ult-open');
                    }
                } catch (e) {}
            });
            $('#ultFullscreen').on('click', function() {
                if (!document.fullscreenElement) { document.documentElement.requestFullscreen(); }
                else { document.exitFullscreen(); }
            });
        });
    </script>

    <?php if (count($js) > 0) : ?>
        <?php foreach ($js as $v) : ?>
            <?php if (stripos($v, "assets") !== false) : ?>
                <?php $jsPath = FCPATH . $v . ".js"; ?>
                <script src="<?= base_url($v . '.js?ver=' . (file_exists($jsPath) ? filemtime($jsPath) : time())) ?>"></script>
            <?php else : ?>
                <script src="<?= $v ?>"></script>
            <?php endif ?>
        <?php endforeach ?>
    <?php endif ?>

    <?php if (!is_null($session->getFlashdata('alert'))): ?>
        <script>
            new PNotify({
                title: '<?= $session->getFlashdata('alert')['msg'] ?>',
                text: '<?= $session->getFlashdata('alert')['text'] ?>',
                type: '<?= $session->getFlashdata('alert')['status'] ?>',
                styling: 'bootstrap3'
            });
        </script>
    <?php endif ?>

    <!-- ===== DIFOSS PRO ENGINE ===== -->
    <script>
    (function(){
        // ===== COMMAND PALETTE DATA =====
        var XP_PAGES = [
            {title:'Dashboard', icon:'fa-bar-chart-o', url:'home', meta:'Beranda utama'},
            {title:'Website Publik', icon:'fa-globe', url:'', meta:'Lihat situs depan'},
            {title:'Analitik Komando', icon:'fa-line-chart', url:'bibliography/analytics', meta:'AI · Statistik'},
            {title:'Scanner Kebersihan', icon:'fa-stethoscope', url:'bibliography/scanner', meta:'Diagnosis metadata'},
            {title:'Audit Gerbang', icon:'fa-history', url:'plagiarism/audit', meta:'🛡️ Riwayat cek similaritas'},
            {title:'Pipeline Persetujuan', icon:'fa-tasks', url:'bibliography/pipeline', meta:'Workflow multi-level'},
            {title:'Integrity Scanner', icon:'fa-shield', url:'bibliography/integrity', meta:'Scan similarity + AI'},
            {title:'Dasbor Forensik', icon:'fa-area-chart', url:'bibliography/integrity-dashboard', meta:'Laporan integritas'},
            {title:'Bulk Operations', icon:'fa-cubes', url:'bibliography/bulk', meta:'Operasi massal'},
            {title:'Pendaftaran Online', icon:'fa-user-plus', url:'membership/online', meta:'Daftar anggota'},
            {title:'Pengaturan Pendaftaran', icon:'fa-sliders', url:'membership/reg-settings', meta:'Konfigurasi'},
            {title:'Profile Saya', icon:'fa-user', url:'profile', meta:'Data pribadi'},
            {title:'Logout', icon:'fa-sign-out', url:'login/logout', meta:'Keluar sesi'}
        ];

        // ===== PAGE LOADER =====
        var loader = document.getElementById('xpLoader');
        if (loader){
            loader.style.width = '60%';
            setTimeout(function(){ loader.style.width = '100%'; }, 100);
            setTimeout(function(){ loader.classList.add('done'); }, 400);
        }

        // ===== BREADCRUMB =====
        var bc = document.getElementById('xpBreadcrumb');
        if (bc){
            var parts = location.pathname.split('/').filter(Boolean);
            var html = '<a href="' + baseUrl + '">Home</a>';
            parts.forEach(function(p, i){
                html += '<span class="sep">›</span>';
                if (i === parts.length - 1) {
                    html += '<span class="current">' + p.replace(/-/g,' ') + '</span>';
                } else {
                    html += '<a href="' + baseUrl + parts.slice(0,i+1).join('/') + '">' + p + '</a>';
                }
            });
            bc.innerHTML = html;
        }

        // ===== REAL-TIME CLOCK =====
        var clockEl = document.querySelector('#xpTime .clock');
        var dateEl = document.querySelector('#xpTime .date');
        function updateClock(){
            var now = new Date();
            var hh = String(now.getHours()).padStart(2,'0');
            var mm = String(now.getMinutes()).padStart(2,'0');
            var ss = String(now.getSeconds()).padStart(2,'0');
            if (clockEl) clockEl.textContent = hh + ':' + mm + ':' + ss;
            if (dateEl) {
                var days = ['Min','Sen','Sel','Rab','Kam','Jum','Sab'];
                var months = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];
                dateEl.textContent = days[now.getDay()] + ', ' + now.getDate() + ' ' + months[now.getMonth()];
            }
        }
        updateClock();
        setInterval(updateClock, 1000);

        // ===== COMMAND PALETTE =====
        var cmdOverlay = document.getElementById('xpCmd');
        var cmdInput = document.getElementById('xpCmdInput');
        var cmdResults = document.getElementById('xpCmdResults');
        var cmdActive = 0;

        function renderCmd(q){
            q = (q || '').toLowerCase().trim();
            var filtered = XP_PAGES.filter(function(p){
                return !q || p.title.toLowerCase().indexOf(q) !== -1 || (p.meta||'').toLowerCase().indexOf(q) !== -1;
            });
            if (!filtered.length) {
                cmdResults.innerHTML = '<div class="xp-cmd-empty"><i class="fa fa-search"></i> Tidak ditemukan untuk "' + q + '"</div>';
                return;
            }
            cmdActive = 0;
            cmdResults.innerHTML = filtered.map(function(p,i){
                return '<div class="xp-cmd-item' + (i===0?' active':'') + '" data-url="' + p.url + '">'
                    + '<i class="fa ' + p.icon + '"></i>'
                    + '<div><div>' + p.title + '</div><div style="font-size:.72rem;color:#94a3b8">' + (p.meta||'') + '</div></div>'
                    + '<span class="meta">↵</span>'
                    + '</div>';
            }).join('');
        }

        function openCmd(){ cmdOverlay.classList.add('open'); cmdInput.value=''; renderCmd(''); setTimeout(function(){cmdInput.focus();},50); }
        function closeCmd(){ cmdOverlay.classList.remove('open'); }

        document.getElementById('xpCmdBtn').addEventListener('click', openCmd);
        document.getElementById('xpMobileCmd') && document.getElementById('xpMobileCmd').addEventListener('click', function(e){ e.preventDefault(); openCmd(); });
        cmdOverlay.addEventListener('click', function(e){ if (e.target === cmdOverlay) closeCmd(); });

        cmdInput.addEventListener('input', function(){ renderCmd(this.value); });
        cmdInput.addEventListener('keydown', function(e){
            var items = cmdResults.querySelectorAll('.xp-cmd-item');
            if (e.key === 'ArrowDown') { e.preventDefault(); cmdActive = Math.min(items.length-1, cmdActive+1); }
            else if (e.key === 'ArrowUp') { e.preventDefault(); cmdActive = Math.max(0, cmdActive-1); }
            else if (e.key === 'Enter') { e.preventDefault(); var url = items[cmdActive].dataset.url; location.href = baseUrl + url; return; }
            else if (e.key === 'Escape') { closeCmd(); return; }
            items.forEach(function(el,i){ el.classList.toggle('active', i===cmdActive); });
        });
        cmdResults.addEventListener('click', function(e){
            var item = e.target.closest('.xp-cmd-item');
            if (item) location.href = baseUrl + item.dataset.url;
        });

        // Global Ctrl+K
        document.addEventListener('keydown', function(e){
            if ((e.ctrlKey || e.metaKey) && e.key.toLowerCase() === 'k') {
                e.preventDefault();
                cmdOverlay.classList.contains('open') ? closeCmd() : openCmd();
            }
            if (e.key === 'Escape' && cmdOverlay.classList.contains('open')) closeCmd();
        });

// ===== FAB =====
document.getElementById('xpFab').addEventListener('click', function(){
    // Tampilkan modal aksi cepat
    var html = '<div class="xp-cmd-overlay open" id="xpFabMenu" style="padding-top:20vh">'
        + '<div class="xp-cmd-box" style="max-width:480px">'
        + '<div class="xp-cmd-head"><i class="fa fa-bolt" style="color:#f59e0b"></i><b style="flex:1">Aksi Cepat</b><button onclick="this.closest(\'.xp-cmd-overlay\').remove()" style="background:none;border:none;font-size:1.5rem;cursor:pointer;color:#94a3b8">&times;</button></div>'
        + '<div class="xp-cmd-results" style="max-height:300px">'
        + '<a href="' + baseUrl + 'unggah" target="_blank" class="xp-cmd-item"><i class="fa fa-cloud-upload"></i><div><div>Unggah Dokumen</div><div style="font-size:.72rem;color:#94a3b8">Form submission publik</div></div></a>'
        + '<a href="' + baseUrl + 'cek-similaritas" target="_blank" class="xp-cmd-item"><i class="fa fa-shield"></i><div><div>Cek Similaritas</div><div style="font-size:.72rem;color:#94a3b8">Scan plagiarisme mandiri</div></div></a>'
        + '<a href="' + baseUrl + 'beranda/ai" target="_blank" class="xp-cmd-item"><i class="fa fa-robot"></i><div><div>Rangkui AI</div><div style="font-size:.72rem;color:#94a3b8">Asisten riset hybrid</div></div></a>'
        + '<a href="' + baseUrl + 'bibliography/pipeline" class="xp-cmd-item"><i class="fa fa-tasks"></i><div><div>Pipeline Persetujuan</div><div style="font-size:.72rem;color:#94a3b8">Review dokumen pending</div></div></a>'
        + '</div></div></div>';
    document.body.insertAdjacentHTML('beforeend', html);
    document.getElementById('xpFabMenu').addEventListener('click', function(e){
        if (e.target === this) this.remove();
    });
});

        // ===== BELL (panel notifikasi real) =====
        var xpBell = document.getElementById('xpBell');
        var xpPanel = document.getElementById('xpNotifPanel');
        xpBell.addEventListener('click', function(e){
            e.stopPropagation();
            xpPanel.classList.toggle('open');
        });
        document.addEventListener('click', function(e){
            if (!e.target.closest('.xp-bell-wrap')) xpPanel.classList.remove('open');
        });

        // ===== THEME TOGGLE (Dark Mode) =====
        var xpThemeBtn = document.getElementById('xpThemeBtn');
        var xpThemeIcon = document.getElementById('xpThemeIcon');
        var DARK_KEY = 'rangkui_dark_mode';

        function updateThemeUI(mode) {
            if (!xpThemeIcon) return;
            if (mode === 'dark') {
                xpThemeIcon.className = 'fa fa-sun-o';
                xpThemeBtn.title = 'Switch to Light Mode';
            } else {
                xpThemeIcon.className = 'fa fa-moon-o';
                xpThemeBtn.title = 'Switch to Dark Mode';
            }
        }

        function toggleTheme() {
            var isDark = document.documentElement.classList.contains('xu-dark');
            var newMode = isDark ? 'light' : 'dark';
            document.documentElement.classList.toggle('xu-dark', !isDark);
            localStorage.setItem(DARK_KEY, newMode);
            updateThemeUI(newMode);
            showXpToast(
                newMode === 'dark' ? '🌙 Mode Gelap Aktif' : '☀️ Mode Terang Aktif',
                'Preferensi tersimpan untuk kunjungan berikutnya.',
                'success'
            );
        }

        if (xpThemeBtn) {
            // Sync UI dengan mode saat ini (sudah di-apply oleh inline script di <head>)
            var currentMode = document.documentElement.classList.contains('xu-dark') ? 'dark' : 'light';
            updateThemeUI(currentMode);

            xpThemeBtn.addEventListener('click', toggleTheme);

            // Sync antar tab
            window.addEventListener('storage', function(e) {
                if (e.key === DARK_KEY && e.newValue) {
                    document.documentElement.classList.toggle('xu-dark', e.newValue === 'dark');
                    updateThemeUI(e.newValue);
                }
            });

            // Auto-detect OS preference change (jika user belum set manual)
            if (window.matchMedia) {
                window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', function(e) {
                    if (!localStorage.getItem(DARK_KEY)) {
                        var mode = e.matches ? 'dark' : 'light';
                        document.documentElement.classList.toggle('xu-dark', e.matches);
                        updateThemeUI(mode);
                    }
                });
            }
        }

        // ===== TOAST =====
        window.showXpToast = function(title, msg, type){
            type = type || 'success';
            var icons = {success:'fa-check-circle', warning:'fa-exclamation-circle', error:'fa-times-circle'};
            var t = document.createElement('div');
            t.className = 'xp-toast ' + type;
            t.innerHTML = '<i class="fa ' + icons[type] + '"></i>'
                + '<div class="xp-toast-body"><div class="xp-toast-title">' + title + '</div><div class="xp-toast-msg">' + msg + '</div></div>';
            document.body.appendChild(t);
            setTimeout(function(){ t.classList.add('show'); }, 50);
            setTimeout(function(){
                t.classList.remove('show');
                setTimeout(function(){ t.remove(); }, 400);
            }, 3500);
        };

        // ===== WELCOME TOAST (sekali per sesi) =====
        if (!sessionStorage.getItem('xp_welcomed')) {
            setTimeout(function(){
                showXpToast('Selamat datang, <?= esc($session->name) ?>', 'Tip: tekan Ctrl+K untuk mencari cepat ke halaman mana pun.', 'success');
                sessionStorage.setItem('xp_welcomed','1');
            }, 800);
        }
    })();
    </script>
</body>
</html>    <?php $session = session(); ?>