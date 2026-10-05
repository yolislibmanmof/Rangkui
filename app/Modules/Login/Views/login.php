<style>
/* ================================================================
   DIFOSS LOGIN — EMERALD GALAXY GATE (0% ungu, 100% emerald)
   ================================================================ */
:root{
    --xl-emerald:#059669; --xl-teal:#0891b2; --xl-gold:#f59e0b;
    --xl-mint:#6ee7b7; --xl-deep:#0a2920; --xl-mid:#064e3b;
}

html,body{margin:0;padding:0}
body{background:#0a2920}

.xuLoginWrap{
    position:fixed;inset:0;
    display:flex;align-items:center;justify-content:center;
    padding:40px 20px;
    background:
        radial-gradient(900px 520px at 8% 112%,rgba(8,145,178,.30),transparent 60%),
        radial-gradient(1100px 620px at 92% -10%,rgba(5,150,105,.28),transparent 60%),
        linear-gradient(160deg,#0a2920 0%,#064e3b 45%,#0a2920 100%);
    overflow:hidden;z-index:9999;
    font-family:'Plus Jakarta Sans','Work Sans',sans-serif;
}

/* Garis neon atas */
.xuLoginWrap::before{
    content:'';position:fixed;top:0;left:0;right:0;height:3px;z-index:10;
    background:linear-gradient(90deg,var(--xl-emerald),var(--xl-gold),var(--xl-teal),var(--xl-emerald));
    background-size:300% 100%;animation:xuLineSlide 6s linear infinite;
}
@keyframes xuLineSlide{0%{background-position:0% 0}100%{background-position:300% 0}}

#xuStars,#xuNet{position:absolute;inset:0;pointer-events:none;z-index:1}

.xuOrb{position:absolute;border-radius:50%;filter:blur(90px);opacity:.5;pointer-events:none;animation:xuFloat 10s ease-in-out infinite;z-index:1}
@keyframes xuFloat{0%,100%{transform:translateY(0) scale(1)}50%{transform:translateY(-34px) scale(1.12)}}

/* Kartu fitur melayang di kiri-kanan */
.xuSide{
    position:absolute;top:50%;transform:translateY(-50%);
    display:flex;flex-direction:column;gap:22px;z-index:3;pointer-events:none;
}
.xuSide.left{left:5vw}
.xuSide.right{right:5vw}

.xuFloatCard{
    width:230px;
    background:rgba(255,255,255,.06);
    backdrop-filter:blur(14px);-webkit-backdrop-filter:blur(14px);
    border:1px solid rgba(255,255,255,.14);
    border-radius:18px;padding:18px 20px;
    box-shadow:0 18px 40px rgba(0,0,0,.35),inset 0 1px 0 rgba(255,255,255,.08);
    animation:xuFloatY 6s ease-in-out infinite;
    transition:.3s;
}
.xuFloatCard .ic{
    width:42px;height:42px;border-radius:12px;
    display:flex;align-items:center;justify-content:center;
    font-size:1.1rem;color:#fff;margin-bottom:12px;
    box-shadow:0 8px 20px rgba(5,150,105,.3);
}
.xuFloatCard h4{margin:0 0 6px;color:#fff;font-size:.95rem;font-weight:800;letter-spacing:-.01em}
.xuFloatCard p{margin:0;color:rgba(255,255,255,.6);font-size:.78rem;line-height:1.55}

.xuSide.left .xuFloatCard:nth-child(1){animation-delay:0s}
.xuSide.left .xuFloatCard:nth-child(2){animation-delay:1.5s}
.xuSide.right .xuFloatCard:nth-child(1){animation-delay:.8s}
.xuSide.right .xuFloatCard:nth-child(2){animation-delay:2.2s}
@keyframes xuFloatY{0%,100%{transform:translateY(0)}50%{transform:translateY(-18px)}}

/* Kartu login utama */
.xuLoginCard{
    position:relative;
    width:100%;max-width:420px;
    background:rgba(255,255,255,.08);
    backdrop-filter:blur(22px) saturate(1.4);-webkit-backdrop-filter:blur(22px) saturate(1.4);
    border:1px solid rgba(255,255,255,.18);
    border-radius:26px;
    padding:42px 38px 34px;
    box-shadow:0 30px 70px rgba(0,0,0,.5),inset 0 1px 0 rgba(255,255,255,.12);
    z-index:5;
    animation:xuCardIn .8s cubic-bezier(.2,.8,.2,1) both;
}
@keyframes xuCardIn{from{opacity:0;transform:translateY(30px) scale(.96)}to{opacity:1;transform:none}}

/* Border gradient animated emerald-teal-gold */
.xuLoginCard::before{
    content:"";position:absolute;inset:-2px;border-radius:28px;
    background:linear-gradient(120deg,var(--xl-emerald),var(--xl-gold),var(--xl-teal),var(--xl-emerald));
    background-size:300% 300%;z-index:-1;
    animation:xuBorder 6s linear infinite;
}
@keyframes xuBorder{to{background-position:300% 0}}

.xuLoginCard::after{
    content:"";position:absolute;inset:1px;border-radius:25px;
    background:linear-gradient(160deg,rgba(10,41,32,.96),rgba(6,78,59,.96));
    z-index:-1;
}

.xuLoginTitle{
    text-align:center;margin:0 0 6px;
    font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1.9rem;
    background:linear-gradient(90deg,#fff,var(--xl-mint),var(--xl-gold));
    -webkit-background-clip:text;background-clip:text;
    -webkit-text-fill-color:transparent;
    letter-spacing:-.01em;
}
.xuLoginSub{
    text-align:center;color:rgba(255,255,255,.6);
    font-size:.85rem;margin:0 0 26px;
}

/* Field dengan ikon */
.xuField{position:relative;margin-bottom:16px}
.xuField label{
    display:block;font-size:.7rem;font-weight:800;
    color:rgba(255,255,255,.7);letter-spacing:.1em;text-transform:uppercase;
    margin-bottom:6px;
}
.xuField i.field-ic{
    position:absolute;left:16px;top:calc(50% + 10px);
    transform:translateY(-50%);
    color:var(--xl-gold);font-size:.95rem;z-index:2;
    transition:.25s;
}
.xuField input{
    width:100%;
    padding:13px 46px 13px 46px;
    background:rgba(255,255,255,.07);
    border:1px solid rgba(255,255,255,.18);
    border-radius:14px;
    color:#fff;font-size:.95rem;font-weight:500;
    outline:none;transition:.25s;
    box-sizing:border-box;
}
.xuField input::placeholder{color:rgba(255,255,255,.4)}
.xuField input:focus{
    border-color:rgba(251,191,36,.6);
    background:rgba(255,255,255,.12);
    box-shadow:0 0 0 4px rgba(245,158,11,.15);
}
.xuField input:focus ~ i.field-ic,
.xuField:focus-within i.field-ic{color:var(--xl-mint);transform:translateY(-50%) scale(1.1)}

/* Toggle lihat password */
.xuPwToggle{
    position:absolute;right:8px;top:calc(50% + 10px);
    transform:translateY(-50%);
    width:34px;height:34px;
    background:rgba(255,255,255,.06);
    border:1px solid rgba(255,255,255,.12);
    border-radius:10px;
    color:rgba(255,255,255,.7);
    cursor:pointer;transition:.2s;
    display:flex;align-items:center;justify-content:center;
}
.xuPwToggle:hover{background:rgba(245,158,11,.15);color:var(--xl-gold);border-color:rgba(245,158,11,.3)}

/* Tombol submit */
.xuSubmit{
    width:100%;padding:14px;border:none;
    border-radius:14px;
    background:linear-gradient(90deg,var(--xl-emerald),var(--xl-gold));
    color:#fff;font-weight:800;font-size:1rem;
    letter-spacing:.04em;text-transform:uppercase;
    cursor:pointer;transition:.3s;
    box-shadow:0 14px 34px rgba(5,150,105,.4);
    margin-top:8px;position:relative;overflow:hidden;
    display:inline-flex;align-items:center;justify-content:center;gap:8px;
}
.xuSubmit::before{
    content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;
    background:linear-gradient(100deg,transparent 20%,rgba(255,255,255,.25) 50%,transparent 80%);
    transition:left .6s ease;
}
.xuSubmit:hover{
    transform:translateY(-2px);
    box-shadow:0 20px 44px rgba(5,150,105,.55);
    filter:brightness(1.1);
}
.xuSubmit:hover::before{left:120%}

/* Error box */
.xuErr{
    background:rgba(239,68,68,.15);
    border:1px solid rgba(239,68,68,.4);
    color:#fca5a5;border-radius:12px;
    padding:12px 16px;text-align:center;
    font-size:.85rem;font-weight:600;
    margin-bottom:18px;
    display:flex;align-items:center;justify-content:center;gap:8px;
    animation:xuShake .4s ease;
}
@keyframes xuShake{0%,100%{transform:translateX(0)}25%{transform:translateX(-6px)}75%{transform:translateX(6px)}}

/* Divider */
.xuDivider{
    display:flex;align-items:center;gap:12px;
    margin:26px 0 22px;
    color:rgba(255,255,255,.4);
    font-size:.72rem;font-weight:700;letter-spacing:.15em;text-transform:uppercase;
}
.xuDivider::before,.xuDivider::after{content:"";flex:1;height:1px;background:linear-gradient(90deg,transparent,rgba(255,255,255,.2),transparent)}

/* Footer dalam kartu */
.xuFoot{
    text-align:center;color:rgba(255,255,255,.55);
    font-size:.78rem;line-height:1.9;
}
.xuFoot a{
    color:var(--xl-mint);text-decoration:none;font-weight:700;transition:.2s;
    border-bottom:1px dashed rgba(110,231,183,.35);
}
.xuFoot a:hover{
    color:var(--xl-gold);
    text-shadow:0 0 12px rgba(245,158,11,.5);
    border-bottom-color:var(--xl-gold);
}
.xuFoot code{
    color:rgba(255,255,255,.4);background:rgba(255,255,255,.05);
    font-family:'JetBrains Mono',monospace;font-size:.68rem;
    padding:2px 8px;border-radius:5px;
    border:1px solid rgba(255,255,255,.08);
}
.xuLogo{
    display:block;margin:0 auto 10px;
    filter:drop-shadow(0 0 18px rgba(5,150,105,.5));
    transition:.3s;
}
.xuLogo:hover{transform:scale(1.06);filter:drop-shadow(0 0 24px rgba(245,158,11,.65))}

/* Responsif */
@media(max-width:1100px){.xuSide{display:none}}
@media(max-width:480px){
    .xuLoginCard{padding:34px 24px 28px;border-radius:22px}
    .xuLoginWrap{padding:20px 14px}
}
</style>

<div class="xuLoginWrap">
    <canvas id="xuNet"></canvas>
    <canvas id="xuStars"></canvas>
    <div class="xuOrb" style="top:-80px;left:8%;width:480px;height:480px;background:radial-gradient(circle,rgba(5,150,105,.5),transparent 65%)"></div>
    <div class="xuOrb" style="bottom:-100px;right:8%;width:420px;height:420px;background:radial-gradient(circle,rgba(245,158,11,.4),transparent 65%);animation-delay:2s"></div>
    <div class="xuOrb" style="top:40%;left:55%;width:340px;height:340px;background:radial-gradient(circle,rgba(8,145,178,.4),transparent 65%);animation-delay:4s"></div>

    <!-- Efek samping KIRI -->
    <div class="xuSide left">
        <div class="xuFloatCard">
            <div class="ic" style="background:linear-gradient(135deg,var(--xl-emerald),var(--xl-teal))"><i class="fa fa-book"></i></div>
            <h4>Koleksi Digital</h4>
            <p>Akses ribuan karya ilmiah institusi kapan saja, di mana saja.</p>
        </div>
        <div class="xuFloatCard">
            <div class="ic" style="background:linear-gradient(135deg,var(--xl-teal),var(--xl-gold))"><i class="fa fa-search"></i></div>
            <h4>Pencarian Cerdas</h4>
            <p>Temukan dokumen berdasarkan judul, penulis, atau subyek.</p>
        </div>
    </div>

    <!-- Efek samping KANAN -->
    <div class="xuSide right">
        <div class="xuFloatCard">
            <div class="ic" style="background:linear-gradient(135deg,var(--xl-gold),var(--xl-emerald))"><i class="fa fa-unlock-alt"></i></div>
            <h4>Akses Terbuka</h4>
            <p>Repositori terbuka untuk penyebaran ilmu pengetahuan.</p>
        </div>
        <div class="xuFloatCard">
            <div class="ic" style="background:linear-gradient(135deg,var(--xl-emerald),var(--xl-gold))"><i class="fa fa-shield"></i></div>
            <h4>Aman &amp; Terpercaya</h4>
            <p>Data terlindungi dengan standar keamanan tinggi.</p>
        </div>
    </div>

    <!-- Kartu Login -->
    <div class="xuLoginCard">
        <form action="<?= base_url('login/auth') ?>" enctype="multipart/form-data" method="POST" autocomplete="off">
            <h1 class="xuLoginTitle">Login</h1>
            <p class="xuLoginSub">Masuk ke dasbor REPOSITORI UNIMOF</p>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="xuErr"><i class="fa fa-exclamation-circle"></i> <?= session()->getFlashdata('error') ?></div>
            <?php endif; ?>

            <div class="xuField">
                <label for="xuUsername">Username</label>
                <i class="fa fa-user field-ic"></i>
                <input type="text" id="xuUsername" name="username" placeholder="Masukkan username Anda" required autofocus />
            </div>

            <div class="xuField">
                <label for="xuPassword">Password</label>
                <i class="fa fa-lock field-ic"></i>
                <input type="password" id="xuPassword" name="password" placeholder="••••••••" required />
                <button type="button" class="xuPwToggle" id="xuPwToggle" title="Lihat / sembunyikan sandi" aria-label="Toggle password visibility">
                    <i class="fa fa-eye" id="xuPwIcon"></i>
                </button>
            </div>

            <button type="submit" class="xuSubmit"><i class="fa fa-sign-in"></i> Login</button>

            <div class="xuDivider">REPOSITORI UNIMOF</div>

            <div class="xuFoot">
                <a href="<?= base_url() ?>"><img src="<?= base_url('assets/images/Difoss-Header.png') ?>" alt="DIFOSS" width="140" class="xuLogo"></a>
                <span><a href="<?= base_url('oai?verb=ListRecords&metadataPrefix=oai_dc') ?>">OAI-PMH Harvester</a></span>
                <div>Designed &amp; Developed By <a href="https://github.com/yolislibmanmof/Rangkui" target="_blank" rel="noopener">YOLIS LIBMAN</a></div>
                <code>Version 4.1.0</code> · <code>RANGKUI</code>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function(){
    var W = window.innerWidth, H = window.innerHeight;

    // ===== Toggle lihat password =====
    var pwInput = document.getElementById('xuPassword');
    var pwBtn = document.getElementById('xuPwToggle');
    var pwIcon = document.getElementById('xuPwIcon');
    if (pwBtn && pwInput) {
        pwBtn.addEventListener('click', function(){
            var show = pwInput.type === 'password';
            pwInput.type = show ? 'text' : 'password';
            pwIcon.className = show ? 'fa fa-eye-slash' : 'fa fa-eye';
        });
    }

    // ===== Partikel bintang berkedip =====
    var cv = document.getElementById('xuStars');
    if (cv){
        var ctx = cv.getContext('2d');
        cv.width = W; cv.height = H;
        window.addEventListener('resize', function(){
            cv.width = window.innerWidth;
            cv.height = window.innerHeight;
        });
        var stars = [];
        for (var i = 0; i < 140; i++){
            stars.push({
                x: Math.random() * cv.width,
                y: Math.random() * cv.height,
                r: Math.random() * 1.8 + .3,
                a: Math.random(),
                d: Math.random() * .005 + .002
            });
        }
        (function loop(){
            ctx.clearRect(0, 0, cv.width, cv.height);
            stars.forEach(function(s){
                s.a += s.d;
                if (s.a > 1 || s.a < 0) s.d = -s.d;
                ctx.beginPath();
                ctx.arc(s.x, s.y, s.r, 0, Math.PI * 2);
                ctx.fillStyle = 'rgba(255,255,255,' + Math.abs(s.a).toFixed(2) + ')';
                ctx.fill();
            });
            requestAnimationFrame(loop);
        })();
    }

    // ===== Network effect (emerald-gold) =====
    var nt = document.getElementById('xuNet');
    if (nt && W > 1100){
        var nx = nt.getContext('2d');
        nt.width = W; nt.height = H;
        window.addEventListener('resize', function(){
            nt.width = window.innerWidth;
            nt.height = window.innerHeight;
        });
        var pts = [];
        var N = Math.floor(W / 55);
        for (var j = 0; j < N; j++){
            pts.push({
                x: Math.random() * W,
                y: Math.random() * H,
                vx: (Math.random() - .5) * .4,
                vy: (Math.random() - .5) * .4
            });
        }
        (function draw(){
            nx.clearRect(0, 0, nt.width, nt.height);
            pts.forEach(function(p){
                p.x += p.vx; p.y += p.vy;
                if (p.x < 0 || p.x > nt.width) p.vx *= -1;
                if (p.y < 0 || p.y > nt.height) p.vy *= -1;
            });
            // Garis koneksi — emerald
            for (var a = 0; a < pts.length; a++){
                for (var b = a + 1; b < pts.length; b++){
                    var dx = pts[a].x - pts[b].x;
                    var dy = pts[a].y - pts[b].y;
                    var dist = Math.sqrt(dx * dx + dy * dy);
                    if (dist < 150){
                        nx.strokeStyle = 'rgba(5,150,105,' + (0.22 * (1 - dist / 150)) + ')';
                        nx.lineWidth = 1;
                        nx.beginPath();
                        nx.moveTo(pts[a].x, pts[a].y);
                        nx.lineTo(pts[b].x, pts[b].y);
                        nx.stroke();
                    }
                }
            }
            // Titik node — gold
            pts.forEach(function(p){
                nx.fillStyle = 'rgba(245,158,11,.65)';
                nx.beginPath();
                nx.arc(p.x, p.y, 1.8, 0, Math.PI * 2);
                nx.fill();
            });
            requestAnimationFrame(draw);
        })();
    }

    // ===== Auto-focus field =====
    if (pwInput && !document.getElementById('xuUsername').value) {
        document.getElementById('xuUsername').focus();
    }
});
</script>