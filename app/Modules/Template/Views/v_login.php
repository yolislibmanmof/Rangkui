<!DOCTYPE html>
<html lang="id">

<head>
    <title><?= $title ?></title>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#059669">
    <link rel="icon" href="<?= base_url('favicon.ico') ?>" type="image/ico" />

    <!-- Font Premium -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Neuton:wght@700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&family=JetBrains+Mono:wght@500;700&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="<?= base_url('assets/vendors/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= base_url('assets/vendors/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">

    <!-- PNotify -->
    <link href="<?= base_url('assets/vendors/pnotify/dist/pnotify.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendors/pnotify/dist/pnotify.buttons.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendors/pnotify/dist/pnotify.nonblock.css') ?>" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?= base_url('assets/build/css/custom.min.css') ?>" rel="stylesheet">
    <!-- Custom -->
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

    <style>
    /* ================================================================
       DIFOSS LOGIN SHELL — EMERALD FIREFLY GATE
       FINAL POLISHED EDITION
       ================================================================ */

    /* ───────────────────────────────────────────────────────
       1. ROOT TOKENS
       ─────────────────────────────────────────────────────── */
    :root{
        --xl-emerald:#059669;
        --xl-teal:#0891b2;
        --xl-gold:#f59e0b;
        --xl-mint:#6ee7b7;
        --xl-deep:#0a2920;
        --xl-mid:#064e3b;
        --xl-ring:rgba(5,150,105,.18);
    }

    /* ───────────────────────────────────────────────────────
       2. BASE RESET
       ─────────────────────────────────────────────────────── */
    html{height:100%}
    body.xu-login{
        height:100%;
        margin:0!important;
        min-height:100vh;
        overflow-x:hidden;
        position:relative;
        font-family:'Plus Jakarta Sans','Work Sans',sans-serif!important;
        background:
            radial-gradient(900px 520px at 8% 112%,rgba(8,145,178,.30),transparent 60%),
            radial-gradient(1100px 620px at 92% -10%,rgba(5,150,105,.28),transparent 60%),
            radial-gradient(700px 400px at 50% 50%,rgba(245,158,11,.08),transparent 70%),
            linear-gradient(160deg,#0a2920 0%,#064e3b 45%,#0a2920 100%)!important;
    }

    /* ───────────────────────────────────────────────────────
       3. KEYFRAMES
       ─────────────────────────────────────────────────────── */
    @keyframes xlSlide{0%{background-position:0% 0}100%{background-position:300% 0}}
    @keyframes xlFloat{0%,100%{transform:translateY(0) scale(1)}50%{transform:translateY(-30px) scale(1.08)}}
    @keyframes xlPulse{0%,100%{opacity:1}50%{opacity:.3}}
    @keyframes xlUp{from{opacity:0;transform:translateY(26px)}to{opacity:1;transform:none}}
    @keyframes xlBob{0%,100%{transform:translateY(0)}50%{transform:translateY(-9px)}}

    /* ───────────────────────────────────────────────────────
       4. LAYERS (orb, canvas, neon)
       ─────────────────────────────────────────────────────── */
    body.xu-login::before{
        content:'';
        position:fixed;top:0;left:0;right:0;height:3px;z-index:40;
        background:linear-gradient(90deg,var(--xl-emerald),var(--xl-gold),var(--xl-teal),var(--xl-emerald));
        background-size:300% 100%;
        animation:xlSlide 6s linear infinite;
    }
    #xuFxFire{position:fixed;inset:0;pointer-events:none;z-index:0}

    .xu-orb{position:fixed;border-radius:50%;filter:blur(90px);pointer-events:none;z-index:0}
    .xu-orb.a1{top:-120px;left:-80px;width:480px;height:480px;background:radial-gradient(circle,rgba(5,150,105,.5),transparent 65%);animation:xlFloat 10s ease-in-out infinite}
    .xu-orb.a2{bottom:-140px;right:-80px;width:420px;height:420px;background:radial-gradient(circle,rgba(245,158,11,.4),transparent 65%);animation:xlFloat 12s ease-in-out 2s infinite}
    .xu-orb.a3{top:35%;right:20%;width:300px;height:300px;background:radial-gradient(circle,rgba(8,145,178,.35),transparent 65%);animation:xlFloat 14s ease-in-out 4s infinite}

    /* ───────────────────────────────────────────────────────
       5. SHELL LAYOUT (brand → content → footer)
       ─────────────────────────────────────────────────────── */
    .xu-shell-login{
        position:relative;z-index:2;
        min-height:100vh;
        display:flex;flex-direction:column;align-items:center;
        padding:30px 16px 20px;
    }
    .xu-login-mid{
        flex:1;
        display:flex;align-items:center;justify-content:center;
        width:100%;
    }

    /* Netralisasi wrap bawaan view */
    .xuLoginWrap{
        position:relative!important;inset:auto!important;z-index:2!important;
        background:transparent!important;overflow:visible!important;
        min-height:auto!important;padding:6px 16px 30px!important;
    }
    body.xu-login .login_wrapper{
        background:transparent!important;
        margin:0!important;padding:0!important;max-width:none!important;
    }

    /* ───────────────────────────────────────────────────────
       6. BRAND TOP (logo naik-turun)
       ─────────────────────────────────────────────────────── */
    .xu-login-top{
        text-align:center;margin-bottom:14px;
        animation:xlUp .7s ease both;
    }
    .xu-logo-ring{
        width:78px;height:78px;margin:0 auto 12px;border-radius:24px;
        background:rgba(255,255,255,.07);
        border:1px solid rgba(251,191,36,.35);
        backdrop-filter:blur(14px);-webkit-backdrop-filter:blur(14px);
        display:flex;align-items:center;justify-content:center;
        box-shadow:0 14px 40px rgba(0,0,0,.35),inset 0 1px 0 rgba(255,255,255,.12);
        animation:xlBob 4s ease-in-out infinite;
    }
    .xu-logo-ring img{width:46px;filter:drop-shadow(0 0 14px rgba(245,158,11,.55))}
    .xu-login-brand{font-size:1.3rem;font-weight:900;color:#fff;letter-spacing:-.01em}
    .xu-login-brand b{
        background:linear-gradient(90deg,var(--xl-gold),var(--xl-mint));
        -webkit-background-clip:text;background-clip:text;
        -webkit-text-fill-color:transparent;
    }
    .xu-login-sub{
        display:inline-flex;align-items:center;gap:8px;margin-top:8px;
        padding:5px 14px;border-radius:999px;
        background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.14);
        color:rgba(255,255,255,.7);font-size:.64rem;font-weight:800;
        letter-spacing:.22em;text-transform:uppercase;
    }
    .xu-login-sub .dot{
        width:6px;height:6px;border-radius:50%;
        background:var(--xl-gold);
        box-shadow:0 0 10px var(--xl-gold);
        animation:xlPulse 1.6s infinite;
    }

    /* ───────────────────────────────────────────────────────
       7. FOOTER
       ─────────────────────────────────────────────────────── */
    .xu-login-foot{
        text-align:center;margin-top:18px;
        color:rgba(255,255,255,.45);font-size:.72rem;font-weight:600;
        letter-spacing:.06em;
        animation:xlUp .8s .25s ease both;
    }
    .xu-login-foot .live{color:#86efac}
    .xu-login-foot strong{
        background:linear-gradient(90deg,var(--xl-gold),var(--xl-mint));
        -webkit-background-clip:text;background-clip:text;
        -webkit-text-fill-color:transparent;
        font-weight:800;
    }

    /* ───────────────────────────────────────────────────────
       8. FORM OVERRIDES (agar view menyatu)
       ─────────────────────────────────────────────────────── */
    .login_wrapper input[type=text],
    .login_wrapper input[type=password],
    .login_wrapper input[type=email],
    .login_wrapper .form-control{
        background:rgba(255,255,255,.08)!important;
        border:1px solid rgba(255,255,255,.18)!important;
        color:#fff!important;
        border-radius:13px!important;
        padding:12px 16px!important;
        font-size:.92rem!important;
        transition:border-color .25s,box-shadow .25s,background .25s!important;
        box-shadow:none!important;
    }
    .login_wrapper input::placeholder{color:rgba(255,255,255,.4)}
    .login_wrapper input:focus{
        border-color:rgba(251,191,36,.55)!important;
        box-shadow:0 0 0 4px rgba(5,150,105,.18)!important;
        background:rgba(255,255,255,.12)!important;
        outline:none!important;
    }
    .login_wrapper button[type=submit],
    .login_wrapper .btn-success,
    .login_wrapper .btn-primary{
        background:linear-gradient(90deg,var(--xl-emerald),var(--xl-gold))!important;
        border:none!important;color:#fff!important;
        font-weight:800!important;border-radius:13px!important;
        box-shadow:0 14px 34px rgba(5,150,105,.4)!important;
        transition:transform .25s,filter .25s,box-shadow .25s!important;
    }
    .login_wrapper button[type=submit]:hover,
    .login_wrapper .btn-success:hover,
    .login_wrapper .btn-primary:hover{
        filter:brightness(1.12)!important;
        transform:translateY(-2px)!important;
        box-shadow:0 18px 42px rgba(5,150,105,.55)!important;
    }
    .login_wrapper a{color:var(--xl-mint)!important;transition:color .2s}
    .login_wrapper a:hover{color:var(--xl-gold)!important}

    /* Ikon field tidak menimpa placeholder */
    .login_wrapper .xuField input,
    .login_wrapper .xuField input:focus{padding-left:46px!important;padding-right:46px!important}

    /* Toggle password (fallback) */
    .xu-pw-wrap{position:relative}
    .xu-pw-wrap input{width:100%;padding-right:46px!important}
    .xu-pw-toggle{
        position:absolute;right:6px;top:50%;transform:translateY(-50%);
        width:36px;height:36px;border:none;border-radius:10px;
        background:rgba(255,255,255,.06);color:rgba(255,255,255,.6);
        cursor:pointer;transition:.2s;
    }
    .xu-pw-toggle:hover{color:var(--xl-gold);background:rgba(255,255,255,.12)}

    /* ───────────────────────────────────────────────────────
       9. KARTU SAMPING (floating feature cards)
       ─────────────────────────────────────────────────────── */
    .xuSide{
        position:fixed!important;z-index:1!important;
        align-items:stretch;
    }
    .xuFloatCard{
        width:230px!important;min-height:150px!important;
        box-sizing:border-box;
        display:flex!important;flex-direction:column!important;
        justify-content:flex-start;
    }
    .xuFloatCard .ic{flex-shrink:0}
    .xuFloatCard h4{flex-shrink:0}
    .xuFloatCard p{flex:1;margin-top:2px}

    /* ───────────────────────────────────────────────────────
       10. RESPONSIVE — LEBAR
       ─────────────────────────────────────────────────────── */
    @media(max-width:480px){
        .xu-shell-login{padding:22px 12px 16px}
        .xu-logo-ring{width:66px;height:66px}
    }

    /* ───────────────────────────────────────────────────────
       11. RESPONSIVE — TINGGI (anti-scroll)
       ─────────────────────────────────────────────────────── */
    @media(max-height:860px){
        .xu-shell-login{padding:16px 16px 10px!important}
        .xu-login-top{margin-bottom:10px!important}
        .xu-logo-ring{width:58px;height:58px;margin:0 auto 8px;border-radius:18px}
        .xu-logo-ring img{width:34px}
        .xu-login-brand{font-size:1.05rem}
        .xu-login-sub{margin-top:6px;padding:4px 12px;font-size:.58rem}
        .xuLoginCard{padding:26px 28px 22px!important}
        .xuLoginTitle{font-size:1.5rem!important;margin-bottom:4px!important}
        .xuLoginSub{margin-bottom:16px!important;font-size:.8rem!important}
        .xuField{margin-bottom:12px!important}
        .xuField label{margin-bottom:4px!important;font-size:.62rem!important}
        .xuField input{padding:11px 44px!important}
        .xuSubmit{padding:12px!important;margin-top:2px!important}
        .xuDivider{margin:16px 0 12px!important}
        .xuFoot{font-size:.72rem!important;line-height:1.7!important}
        .xuLogo{width:110px!important;margin:0 auto 6px!important}
        .xu-login-foot{margin-top:12px!important}
    }
    @media(max-height:740px){
        .xu-shell-login{padding:12px 14px 8px!important}
        .xu-login-top{margin-bottom:6px!important}
        .xu-logo-ring{width:50px;height:50px;border-radius:16px}
        .xu-logo-ring img{width:30px}
        .xu-login-brand{font-size:.98rem}
        .xu-login-sub{display:none!important}
        .xuLoginCard{padding:22px 24px 18px!important}
        .xuLoginTitle{font-size:1.35rem!important}
        .xuLoginSub{margin-bottom:12px!important}
        .xuFoot .xuLogo{display:none!important}
        .xuFoot code{display:none!important}
        .xu-login-foot{margin-top:8px!important;font-size:.66rem!important}
    }
    @media(max-height:620px){
        .xu-login-top{display:none!important}
        .xuLoginCard{padding:18px 22px 16px!important}
        .xuDivider{margin:12px 0 10px!important}
        .xuFoot{line-height:1.5!important}
    }
    </style>
</head>


<body class="login xu-login">

    <!-- Latar hidup: kunang-kunang + bintang jatuh -->
    <canvas id="xuFxFire"></canvas>
    <div class="xu-orb a1"></div>
    <div class="xu-orb a2"></div>
    <div class="xu-orb a3"></div>

    <div class="xu-shell-login">

        <!-- Brand dengan logo NAIK-TURUN -->
        <div class="xu-login-top">
            <div class="xu-logo-ring">
                <img src="<?= base_url('assets/images/logo.png') ?>" alt="DIFOSS">
            </div>
            <div class="xu-login-brand">ETD <b>System</b></div>
            <div class="xu-login-sub"><span class="dot"></span> Repositori Institusional</div>
        </div>

        <!-- Konten (kartu login dari view) -->
        <div class="xu-login-mid">
            <div class="login_wrapper">
                <?= $content ?>
            </div>
        </div>

        <!-- Footer -->
        <div class="xu-login-foot">
            © <?= date('Y') ?> <strong>DIFOSS RANGKUI</strong> · v4.1.0 · <span class="live">● ONLINE</span>
        </div>

    </div>

    <!-- SCRIPTS -->
    <script src="<?= base_url('assets/vendors/jquery/dist/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/fastclick/lib/fastclick.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/pnotify/dist/pnotify.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/pnotify/dist/pnotify.buttons.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/pnotify/dist/pnotify.nonblock.js') ?>"></script>
    <script src="<?= base_url('assets/build/js/custom.js') ?>"></script>

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
        /* ============================================================
           EFEK KUNANG-KUNANG EMERALD + BINTANG JATUH
           ============================================================ */
        var cv = document.getElementById('xuFxFire');
        if (cv) {
            var ctx = cv.getContext('2d');
            function resize(){ cv.width = innerWidth; cv.height = innerHeight; }
            resize();
            addEventListener('resize', resize);

            var flies = [];
            var COLORS = ['110,231,183','245,158,11','34,211,238'];
            for (var i = 0; i < 42; i++){
                flies.push({
                    x: Math.random() * cv.width,
                    y: Math.random() * cv.height,
                    r: 1 + Math.random() * 2.2,
                    c: COLORS[i % COLORS.length],
                    vy: -(.15 + Math.random() * .45),
                    sway: 12 + Math.random() * 26,
                    ph: Math.random() * Math.PI * 2,
                    sp: .004 + Math.random() * .012,
                    blink: Math.random() * Math.PI * 2
                });
            }

            var meteors = [];
            function spawnMeteor(){
                meteors.push({
                    x: Math.random() * cv.width * .8 + cv.width * .2,
                    y: -40,
                    vx: -(4 + Math.random() * 4),
                    vy: 3 + Math.random() * 2.5,
                    life: 1
                });
            }
            setInterval(function(){ if (meteors.length < 3 && Math.random() < .8) spawnMeteor(); }, 3800);

            var t = 0;
            (function draw(){
                t++;
                ctx.clearRect(0, 0, cv.width, cv.height);

                flies.forEach(function(f){
                    f.ph += f.sp;
                    f.blink += .05;
                    f.y += f.vy;
                    var x = f.x + Math.sin(f.ph) * f.sway;
                    if (f.y < -10) { f.y = cv.height + 10; f.x = Math.random() * cv.width; }
                    var a = .35 + Math.abs(Math.sin(f.blink)) * .6;
                    ctx.save();
                    ctx.shadowBlur = 14;
                    ctx.shadowColor = 'rgba(' + f.c + ',.9)';
                    ctx.fillStyle = 'rgba(' + f.c + ',' + a.toFixed(2) + ')';
                    ctx.beginPath();
                    ctx.arc(x, f.y, f.r, 0, Math.PI * 2);
                    ctx.fill();
                    ctx.restore();
                });

                for (var m = meteors.length - 1; m >= 0; m--){
                    var mt = meteors[m];
                    mt.x += mt.vx; mt.y += mt.vy; mt.life -= .012;
                    if (mt.life <= 0 || mt.x < -100 || mt.y > cv.height + 100) { meteors.splice(m, 1); continue; }
                    var grad = ctx.createLinearGradient(mt.x, mt.y, mt.x - mt.vx * 14, mt.y - mt.vy * 14);
                    grad.addColorStop(0, 'rgba(255,255,255,' + (mt.life * .9).toFixed(2) + ')');
                    grad.addColorStop(.4, 'rgba(110,231,183,' + (mt.life * .5).toFixed(2) + ')');
                    grad.addColorStop(1, 'rgba(110,231,183,0)');
                    ctx.strokeStyle = grad;
                    ctx.lineWidth = 2;
                    ctx.beginPath();
                    ctx.moveTo(mt.x, mt.y);
                    ctx.lineTo(mt.x - mt.vx * 14, mt.y - mt.vy * 14);
                    ctx.stroke();
                }

                requestAnimationFrame(draw);
            })();
        }

        /* ============================================================
           TOGGLE LIHAT PASSWORD (fallback bila view belum punya)
           ============================================================ */
        document.querySelectorAll('.login_wrapper input[type="password"]').forEach(function(inp){
            if (inp.parentElement && inp.parentElement.querySelector('.xu-pw-toggle')) return;
            if (inp.closest('.xuField') && inp.closest('.xuField').querySelector('.xuPwToggle')) return;
            var wrap = document.createElement('div');
            wrap.className = 'xu-pw-wrap';
            inp.parentNode.insertBefore(wrap, inp);
            wrap.appendChild(inp);
            var btn = document.createElement('button');
            btn.type = 'button';
            btn.className = 'xu-pw-toggle';
            btn.title = 'Lihat / sembunyikan sandi';
            btn.innerHTML = '<i class="fa fa-eye"></i>';
            btn.addEventListener('click', function(){
                var show = inp.type === 'password';
                inp.type = show ? 'text' : 'password';
                btn.innerHTML = show ? '<i class="fa fa-eye-slash"></i>' : '<i class="fa fa-eye"></i>';
            });
            wrap.appendChild(btn);
        });
    })();
    </script>

    <?php $session = session(); ?>
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

</body>
</html>