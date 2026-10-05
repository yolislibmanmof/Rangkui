<style>
/* ================================================================
   DIFOSS PENDAFTARAN TERKIRIM — EMERALD FOREST EDITION
   ================================================================ */
:root{
    --ok-emerald:#059669; --ok-teal:#0891b2; --ok-gold:#f59e0b;
    --ok-mint:#6ee7b7; --ok-deep:#0a2920; --ok-mid:#064e3b;
}

.xuOkWrap{
    max-width:560px;margin:60px auto;padding:0 16px;
    text-align:center;
    font-family:'Plus Jakarta Sans',system-ui,sans-serif;
    position:relative;z-index:5;
}
@media(min-height:760px){.xuOkWrap{margin:max(60px, calc(50vh - 330px)) auto 70px}}
@media(max-width:480px){.xuOkWrap{margin:30px auto 40px}}

/* ===== KARTU KACA (konsisten dengan Login Anggota) ===== */
.xuOkCard{
    position:relative;
    background:rgba(255,255,255,.08);
    backdrop-filter:blur(22px) saturate(1.4);-webkit-backdrop-filter:blur(22px) saturate(1.4);
    border-radius:24px;padding:42px 34px 32px;
    box-shadow:0 30px 70px rgba(0,0,0,.5),inset 0 1px 0 rgba(255,255,255,.12);
    animation:xuOkIn .7s cubic-bezier(.2,.8,.2,1) both;
}
@keyframes xuOkIn{from{opacity:0;transform:translateY(26px) scale(.97)}to{opacity:1;transform:none}}
.xuOkCard::before{
    content:"";position:absolute;inset:-2px;border-radius:26px;
    background:linear-gradient(120deg,#059669,#f59e0b,#0891b2,#059669);
    background-size:300% 300%;z-index:-1;
    animation:xuOkBorder 6s linear infinite;
}
@keyframes xuOkBorder{to{background-position:300% 0}}
.xuOkCard::after{
    content:"";position:absolute;inset:1px;border-radius:23px;
    background:linear-gradient(160deg,rgba(10,41,32,.96),rgba(6,78,59,.96));
    z-index:-1;
}

/* ===== IKON SUKSES dengan ring pulsa ===== */
.xuOkIcoWrap{position:relative;width:88px;height:88px;margin:0 auto 20px}
.xuOkIcoWrap .ring{
    position:absolute;inset:0;border-radius:50%;
    border:2px solid rgba(110,231,183,.5);
    animation:xuOkRing 2.2s ease-out infinite;
}
.xuOkIcoWrap .ring.r2{animation-delay:1.1s;border-color:rgba(245,158,11,.45)}
@keyframes xuOkRing{from{transform:scale(1);opacity:.8}to{transform:scale(1.7);opacity:0}}
.xuOkIco{
    position:absolute;inset:0;border-radius:50%;
    background:linear-gradient(135deg,var(--ok-emerald),var(--ok-gold));
    color:#fff;display:flex;align-items:center;justify-content:center;
    font-size:2.2rem;
    box-shadow:0 14px 34px rgba(5,150,105,.5);
    animation:xuOkPop .6s .15s cubic-bezier(.2,.9,.3,1.4) both;
}
@keyframes xuOkPop{from{transform:scale(.4);opacity:0}to{transform:scale(1);opacity:1}}

.xuOkCard h2{
    font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1.7rem;margin:0 0 8px;
    background:linear-gradient(90deg,#fff,#6ee7b7,#f59e0b);
    -webkit-background-clip:text;background-clip:text;
    -webkit-text-fill-color:transparent;
}
.xuOkCard > p{color:rgba(255,255,255,.65);line-height:1.7;font-size:.9rem;margin:0 0 6px}

/* Chip status */
.xuOkStatus{
    display:inline-flex;align-items:center;gap:7px;
    padding:5px 14px;border-radius:999px;
    background:rgba(245,158,11,.16);
    border:1px solid rgba(245,158,11,.4);
    color:#fde68a;font-size:.7rem;font-weight:800;
    letter-spacing:.1em;text-transform:uppercase;
    margin:6px 0 4px;
}
.xuOkStatus .dot{width:7px;height:7px;border-radius:50%;background:#fbbf24;box-shadow:0 0 8px #fbbf24;animation:xuOkBlink 1.6s infinite}
@keyframes xuOkBlink{0%,100%{opacity:1}50%{opacity:.35}}

/* ===== TIMELINE LANGKAH ===== */
.xuOkSteps{
    text-align:left;
    background:rgba(255,255,255,.05);
    border:1px solid rgba(255,255,255,.12);
    border-radius:16px;padding:20px 20px 8px;
    margin:20px 0 22px;
}
.xuOkStep{display:flex;gap:13px;align-items:flex-start;position:relative;padding-bottom:20px}
.xuOkStep:last-child{padding-bottom:12px}
.xuOkStep::before{
    content:'';position:absolute;left:16px;top:36px;bottom:2px;width:2px;
    background:linear-gradient(180deg,rgba(110,231,183,.5),rgba(110,231,183,.06));
}
.xuOkStep:last-child::before{display:none}
.xuOkNum{
    width:34px;height:34px;border-radius:50%;flex-shrink:0;
    background:linear-gradient(135deg,var(--ok-emerald),var(--ok-teal));
    color:#fff;display:flex;align-items:center;justify-content:center;
    font-size:.85rem;position:relative;z-index:1;
    box-shadow:0 6px 16px rgba(5,150,105,.35);
}
.xuOkStep.first .xuOkNum{background:linear-gradient(135deg,var(--ok-gold),#d97706);box-shadow:0 6px 16px rgba(245,158,11,.4)}
.xuOkStep .txt{font-size:.85rem;color:rgba(255,255,255,.78);line-height:1.55;padding-top:6px}
.xuOkStep .txt b{color:var(--ok-mint)}
.xuOkStep .txt .wa{color:#fde68a}

/* ===== TOMBOL ===== */
.xuOkBtn{
    display:inline-flex;align-items:center;gap:9px;
    padding:13px 28px;border-radius:13px;
    background:linear-gradient(90deg,var(--ok-emerald),var(--ok-gold));
    color:#fff;font-weight:800;font-size:.9rem;
    letter-spacing:.05em;text-transform:uppercase;
    text-decoration:none;
    box-shadow:0 14px 34px rgba(5,150,105,.4);
    position:relative;overflow:hidden;transition:.3s;
}
.xuOkBtn::before{
    content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;
    background:linear-gradient(100deg,transparent 20%,rgba(255,255,255,.25) 50%,transparent 80%);
    transition:left .6s ease;
}
.xuOkBtn:hover{transform:translateY(-2px);filter:brightness(1.1);box-shadow:0 20px 44px rgba(5,150,105,.55);color:#fff;text-decoration:none}
.xuOkBtn:hover::before{left:120%}

.xuOkAlt{margin-top:14px;font-size:.8rem;color:rgba(255,255,255,.55)}
.xuOkAlt a{color:var(--ok-mint);font-weight:800;text-decoration:none;border-bottom:1px dashed rgba(110,231,183,.4);transition:.2s}
.xuOkAlt a:hover{color:var(--ok-gold);border-bottom-color:var(--ok-gold)}

@media(max-width:480px){.xuOkCard{padding:34px 22px 26px;border-radius:20px}}
</style>

<div class="xuOkWrap">
    <div class="xuOkCard">

        <div class="xuOkIcoWrap">
            <span class="ring r1"></span>
            <span class="ring r2"></span>
            <div class="xuOkIco"><i class="fa fa-check"></i></div>
        </div>

        <h2>Pendaftaran Terkirim!</h2>
        <p>Terima kasih. Data Anda telah kami terima dan menunggu verifikasi admin.</p>
        <span class="xuOkStatus"><span class="dot"></span> Status: Menunggu Verifikasi</span>

        <div class="xuOkSteps">
            <div class="xuOkStep first">
                <span class="xuOkNum"><i class="fa fa-check"></i></span>
                <span class="txt">Formulir terkirim (status: <b>Menunggu</b>)</span>
            </div>
            <div class="xuOkStep">
                <span class="xuOkNum"><i class="fa fa-user-shield"></i></span>
                <span class="txt">Admin memverifikasi data Anda</span>
            </div>
            <div class="xuOkStep">
                <span class="xuOkNum"><i class="fa fa-whatsapp"></i></span>
                <span class="txt">Setelah disetujui, Anda diberitahu via <span class="wa">WhatsApp</span></span>
            </div>
            <div class="xuOkStep">
                <span class="xuOkNum"><i class="fa fa-unlock"></i></span>
                <span class="txt">Login &amp; akses koleksi terbuka</span>
            </div>
        </div>

        <a class="xuOkBtn" href="<?= base_url() ?>"><i class="fa fa-home"></i> Kembali ke Beranda</a>
        <div class="xuOkAlt">atau <a href="<?= base_url('login/anggota') ?>">Login Anggota</a> bila sudah disetujui</div>

    </div>
</div>