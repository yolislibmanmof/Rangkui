<style>
.xuAngLogin{
    width:100%;max-width:460px;
    position:relative;z-index:5;
    padding:0 6px;
    margin:60px auto 70px;          /* pusat horizontal */
}
/* Pusat vertikal otomatis di layar tinggi */
@media(min-height:760px){
    .xuAngLogin{margin:max(70px, calc(50vh - 330px)) auto 70px}
}
@media(max-width:480px){
    .xuAngLogin{margin:30px auto 40px}
}
.xuAngCard{
    position:relative;
    background:rgba(255,255,255,.08);
    backdrop-filter:blur(22px) saturate(1.4);-webkit-backdrop-filter:blur(22px) saturate(1.4);
    border-radius:24px;padding:34px 32px 28px;
    box-shadow:0 30px 70px rgba(0,0,0,.5),inset 0 1px 0 rgba(255,255,255,.12);
    animation:xuAngIn .7s cubic-bezier(.2,.8,.2,1) both;
}
@keyframes xuAngIn{from{opacity:0;transform:translateY(26px) scale(.97)}to{opacity:1;transform:none}}
.xuAngCard::before{content:"";position:absolute;inset:-2px;border-radius:26px;background:linear-gradient(120deg,#059669,#f59e0b,#0891b2,#059669);background-size:300% 300%;z-index:-1;animation:xuAngBorder 6s linear infinite}
@keyframes xuAngBorder{to{background-position:300% 0}}
.xuAngCard::after{content:"";position:absolute;inset:1px;border-radius:23px;background:linear-gradient(160deg,rgba(10,41,32,.96),rgba(6,78,59,.96));z-index:-1}

.xuAngHead{text-align:center;margin-bottom:20px}
.xuAngIco{width:54px;height:54px;margin:0 auto 10px;border-radius:16px;background:linear-gradient(135deg,#059669,#0891b2);display:flex;align-items:center;justify-content:center;font-size:1.3rem;color:#fff;box-shadow:0 12px 28px rgba(5,150,105,.4);animation:xuAngBob 4s ease-in-out infinite}
@keyframes xuAngBob{0%,100%{transform:translateY(0)}50%{transform:translateY(-7px)}}
.xuAngCard h2{margin:0 0 4px;font-family:'Neuton',Georgia,serif;font-weight:700;font-size:1.55rem;background:linear-gradient(90deg,#fff,#6ee7b7,#f59e0b);-webkit-background-clip:text;background-clip:text;-webkit-text-fill-color:transparent}
.xuAngCard .sub{color:rgba(255,255,255,.6);font-size:.82rem;margin:0}

.xuAngAlert{padding:11px 14px;border-radius:12px;margin-bottom:14px;font-size:.83rem;font-weight:600;display:flex;align-items:center;gap:9px}
.xuAngAlert.err{background:rgba(239,68,68,.14);color:#fca5a5;border:1px solid rgba(239,68,68,.4)}
.xuAngAlert.ok{background:rgba(16,185,129,.14);color:#6ee7b7;border:1px solid rgba(16,185,129,.4)}

.xuAngField{position:relative;margin-bottom:14px}
.xuAngField label{display:block;font-weight:800;font-size:.64rem;color:rgba(255,255,255,.75);letter-spacing:.12em;text-transform:uppercase;margin-bottom:6px}
.xuAngField > i{position:absolute;left:16px;top:calc(50% + 11px);transform:translateY(-50%);color:#f59e0b;font-size:.92rem;z-index:2;transition:.25s}
.xuAngField:focus-within > i{color:#6ee7b7;transform:translateY(-50%) scale(1.12)}
.xuAngField input{width:100%;padding:12px 46px;background:rgba(255,255,255,.07);border:1px solid rgba(255,255,255,.18);border-radius:13px;color:#fff;font-size:.92rem;font-weight:500;outline:none;transition:.25s;box-sizing:border-box}
.xuAngField input::placeholder{color:rgba(255,255,255,.4)}
.xuAngField input:focus{border-color:rgba(251,191,36,.6);background:rgba(255,255,255,.12);box-shadow:0 0 0 4px rgba(245,158,11,.15)}

.xuAngPw{position:absolute;right:8px;top:calc(50% + 11px);transform:translateY(-50%);width:32px;height:32px;border:none;border-radius:9px;background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.12);color:rgba(255,255,255,.7);cursor:pointer;transition:.2s;display:flex;align-items:center;justify-content:center}
.xuAngPw:hover{background:rgba(245,158,11,.15);color:#f59e0b;border-color:rgba(245,158,11,.3)}

.xuAngSubmit{width:100%;padding:13px;border:none;border-radius:13px;background:linear-gradient(90deg,#059669,#f59e0b);color:#fff;font-weight:800;font-size:.92rem;letter-spacing:.05em;text-transform:uppercase;cursor:pointer;transition:.3s;box-shadow:0 14px 34px rgba(5,150,105,.4);margin-top:4px;position:relative;overflow:hidden;display:inline-flex;align-items:center;justify-content:center;gap:9px}
.xuAngSubmit::before{content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;background:linear-gradient(100deg,transparent 20%,rgba(255,255,255,.25) 50%,transparent 80%);transition:left .6s ease}
.xuAngSubmit:hover{transform:translateY(-2px);box-shadow:0 20px 44px rgba(5,150,105,.55);filter:brightness(1.1)}
.xuAngSubmit:hover::before{left:120%}

.xuAngDivider{display:flex;align-items:center;gap:12px;margin:20px 0 14px;color:rgba(255,255,255,.4);font-size:.66rem;font-weight:800;letter-spacing:.18em;text-transform:uppercase}
.xuAngDivider::before,.xuAngDivider::after{content:"";flex:1;height:1px;background:linear-gradient(90deg,transparent,rgba(255,255,255,.2),transparent)}
.xuAngFoot{text-align:center;font-size:.82rem;color:rgba(255,255,255,.6)}
.xuAngFoot a{color:#6ee7b7;font-weight:800;text-decoration:none;border-bottom:1px dashed rgba(110,231,183,.4);transition:.2s}
.xuAngFoot a:hover{color:#f59e0b;border-bottom-color:#f59e0b}
.xuAngBack{display:block;margin-top:10px;font-size:.74rem}
.xuAngBack a{color:rgba(255,255,255,.5);font-weight:600;text-decoration:none;transition:.2s}
.xuAngBack a:hover{color:#6ee7b7}

@media(max-width:480px){.xuAngCard{padding:28px 22px 24px;border-radius:20px}}
</style>

<div class="xuAngLogin">
    <div class="xuAngCard">

        <div class="xuAngHead">
            <div class="xuAngIco"><i class="fa fa-id-badge"></i></div>
            <h2>Login Anggota</h2>
            <p class="sub">Masuk dengan ID Anggota dan kata sandi Anda</p>
        </div>

        <?php if ($err = session()->getFlashdata('error')): ?>
            <div class="xuAngAlert err"><i class="fa fa-exclamation-circle"></i> <?= esc($err) ?></div>
        <?php endif; ?>
        <?php if ($msg = session()->getFlashdata('msg')): ?>
            <div class="xuAngAlert ok"><i class="fa fa-check-circle"></i> <?= esc($msg) ?></div>
        <?php endif; ?>

        <form method="post" action="<?= base_url('login/anggota') ?>" autocomplete="off">
            <?= csrf_field() ?>
            <div class="xuAngField">
                <label for="xaMid">ID Anggota (NIM/NIDN)</label>
                <i class="fa fa-user"></i>
                <input type="text" id="xaMid" name="member_id" placeholder="Masukkan ID anggota Anda" required autofocus>
            </div>
            <div class="xuAngField">
                <label for="xaMpass">Kata Sandi</label>
                <i class="fa fa-lock"></i>
                <input type="password" id="xaMpass" name="mpasswd" placeholder="••••••••" required>
                <button type="button" class="xuAngPw" id="xaPwBtn" title="Lihat / sembunyikan sandi">
                    <i class="fa fa-eye" id="xaPwIco"></i>
                </button>
            </div>
            <button type="submit" class="xuAngSubmit"><i class="fa fa-sign-in"></i> Masuk</button>
        </form>

        <div class="xuAngDivider">DIFOSS RANGKUI</div>

        <div class="xuAngFoot">
            Belum punya akun? <a href="<?= base_url('daftar') ?>">Daftar di sini</a>
            <span class="xuAngBack"><a href="<?= base_url('login') ?>"><i class="fa fa-arrow-left"></i> Login Admin / Petugas</a></span>
        </div>

    </div>
</div>

<script>
(function(){
    var inp = document.getElementById('xaMpass');
    var btn = document.getElementById('xaPwBtn');
    var ico = document.getElementById('xaPwIco');
    if (btn && inp){
        btn.addEventListener('click', function(){
            var show = inp.type === 'password';
            inp.type = show ? 'text' : 'password';
            ico.className = show ? 'fa fa-eye-slash' : 'fa fa-eye';
        });
    }
})();
</script>