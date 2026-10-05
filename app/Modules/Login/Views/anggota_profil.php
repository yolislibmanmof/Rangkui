<?php
// Status keanggotaan otomatis
$__expired = false;
try { $__expired = strtotime($m->expire_date) < strtotime(date('Y-m-d')); } catch (\Throwable $e) {}
?>
<style>
/* ================================================================
   DIFOSS PROFIL ANGGOTA — EMERALD FOREST EDITION
   ================================================================ */
:root{
    --pp-emerald:#059669; --pp-teal:#0891b2; --pp-gold:#f59e0b;
    --pp-mint:#6ee7b7; --pp-deep:#0a2920; --pp-mid:#064e3b;
    --pp-ink:#0f172a; --pp-muted:#64748b; --pp-soft:#94a3b8;
}

.xuProWrap{max-width:680px;margin:32px auto;padding:0 16px}

/* ===== KARTU ===== */
.xuProCard{
    background:#fff;border-radius:22px;overflow:hidden;
    box-shadow:0 20px 54px rgba(15,23,42,.12);
    border:1px solid rgba(5,150,105,.12);
    transition:.35s cubic-bezier(.2,.8,.2,1);
    animation:xuProIn .7s cubic-bezier(.2,.8,.2,1) both;
}
@keyframes xuProIn{from{opacity:0;transform:translateY(26px)}to{opacity:1;transform:none}}
.xuProCard:hover{box-shadow:0 26px 64px rgba(5,150,105,.16);border-color:rgba(5,150,105,.25)}
html.xu-dark .xuProCard{background:#0f1e1f;border-color:rgba(5,150,105,.25);box-shadow:0 20px 54px rgba(0,0,0,.45)}

/* ===== HEADER ===== */
.xuProHead{
    padding:34px 30px;
    background:linear-gradient(135deg,var(--pp-deep) 0%,var(--pp-mid) 55%,#115e59 100%);
    color:#fff;
    display:flex;align-items:center;gap:20px;
    position:relative;overflow:hidden;
}
.xuProHead::after{
    content:'';position:absolute;top:-60%;right:-10%;
    width:300px;height:300px;border-radius:50%;
    background:radial-gradient(circle,rgba(245,158,11,.28),transparent 70%);
    filter:blur(50px);pointer-events:none;
}
.xuProHead::before{
    content:'';position:absolute;bottom:-60%;left:-8%;
    width:260px;height:260px;border-radius:50%;
    background:radial-gradient(circle,rgba(8,145,178,.22),transparent 70%);
    filter:blur(50px);pointer-events:none;
}

/* Foto dengan ring emas */
.xuProAvatar{position:relative;flex-shrink:0;z-index:2}
.xuProAvatar img{
    width:88px;height:108px;border-radius:14px;
    border:3px solid rgba(245,158,11,.75);
    object-fit:cover;display:block;
    box-shadow:0 12px 30px rgba(0,0,0,.4);
    transition:.3s;
}
.xuProAvatar img:hover{transform:scale(1.04) rotate(-1.5deg);box-shadow:0 16px 38px rgba(245,158,11,.35)}
.xuProAvatar::after{
    content:'';position:absolute;inset:-7px;
    border:1.5px dashed rgba(110,231,183,.45);
    border-radius:18px;
    animation:xuProRing 14s linear infinite;
}
@keyframes xuProRing{to{transform:rotate(360deg)}}

.xuProId{position:relative;z-index:2;min-width:0}
.xuProId h2{
    margin:0;font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1.5rem;letter-spacing:-.01em;
    line-height:1.2;
}
.xuProId .chips{display:flex;gap:8px;flex-wrap:wrap;margin-top:9px}
.xuProChip{
    display:inline-flex;align-items:center;gap:6px;
    padding:4px 12px;border-radius:999px;
    font-size:.7rem;font-weight:800;letter-spacing:.05em;
    background:rgba(255,255,255,.12);
    border:1px solid rgba(255,255,255,.25);
    backdrop-filter:blur(8px);-webkit-backdrop-filter:blur(8px);
}
.xuProChip.cat{background:rgba(110,231,183,.18);border-color:rgba(110,231,183,.4);color:var(--pp-mint)}
.xuProChip.type{background:rgba(245,158,11,.16);border-color:rgba(245,158,11,.4);color:#fde68a}
.xuProChip.ok{background:rgba(16,185,129,.2);border-color:rgba(16,185,129,.45);color:#a7f3d0}
.xuProChip.bad{background:rgba(239,68,68,.2);border-color:rgba(239,68,68,.45);color:#fecaca}

/* ===== BODY ===== */
.xuProBody{padding:28px 30px}
.xuProBody .sec-t{
    margin:0 0 14px;
    font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1.05rem;color:var(--pp-ink);
    display:flex;align-items:center;gap:10px;
    padding-bottom:12px;
    border-bottom:1.5px dashed rgba(5,150,105,.2);
}
html.xu-dark .xuProBody .sec-t{color:#f1f5f9;border-bottom-color:rgba(5,150,105,.3)}
.xuProBody .sec-t i{
    width:30px;height:30px;border-radius:9px;
    background:linear-gradient(135deg,var(--pp-emerald),var(--pp-gold));
    color:#fff;display:inline-flex;align-items:center;justify-content:center;
    font-size:.82rem;
    box-shadow:0 6px 14px rgba(5,150,105,.3);
}

.xuProRow{
    display:flex;gap:12px;align-items:flex-start;
    padding:12px 10px;margin:0 -10px;
    border-radius:11px;
    border-bottom:1px solid rgba(5,150,105,.08);
    transition:.2s;
}
.xuProRow:last-child{border-bottom:none}
.xuProRow:hover{background:rgba(5,150,105,.05);transform:translateX(4px)}
html.xu-dark .xuProRow{border-bottom-color:rgba(5,150,105,.15)}
html.xu-dark .xuProRow:hover{background:rgba(5,150,105,.1)}

.xuProRow .ico{
    width:34px;height:34px;border-radius:10px;flex-shrink:0;
    background:linear-gradient(135deg,rgba(5,150,105,.12),rgba(245,158,11,.08));
    border:1px solid rgba(5,150,105,.2);
    color:var(--pp-emerald);
    display:flex;align-items:center;justify-content:center;
    font-size:.85rem;
    transition:.25s;
}
.xuProRow:hover .ico{background:linear-gradient(135deg,var(--pp-emerald),var(--pp-gold));color:#fff;border-color:transparent;transform:rotate(-8deg) scale(1.06)}
html.xu-dark .xuProRow .ico{background:linear-gradient(135deg,rgba(5,150,105,.2),rgba(245,158,11,.12));color:var(--pp-mint);border-color:rgba(5,150,105,.35)}
html.xu-dark .xuProRow:hover .ico{color:#fff}

.xuProRow .txt{min-width:0}
.xuProRow .lbl{
    font-weight:800;color:var(--pp-soft);
    font-size:.68rem;text-transform:uppercase;letter-spacing:.09em;
    display:block;margin-bottom:2px;
}
.xuProRow .val{
    color:var(--pp-ink);font-size:.92rem;font-weight:600;
    word-break:break-word;line-height:1.5;
}
html.xu-dark .xuProRow .val{color:#e2e8f0}
html.xu-dark .xuProRow .lbl{color:var(--pp-soft)}

/* ===== RESPONSIVE ===== */
@media(max-width:560px){
    .xuProHead{flex-direction:column;text-align:center;padding:28px 20px}
    .xuProId .chips{justify-content:center}
    .xuProBody{padding:22px 18px}
    .xuProRow{flex-direction:row}
}
</style>

<div class="xuProWrap">
    <div class="xuProCard">

        <div class="xuProHead">
            <div class="xuProAvatar">
                <img src="<?= base_url('uploads/images/persons/' . ($m->member_image ?: 'no_image.jpg')) ?>" alt="<?= esc($m->member_name) ?>">
            </div>
            <div class="xuProId">
                <h2><?= esc($m->member_name) ?></h2>
                <div class="chips">
                    <span class="xuProChip cat"><i class="fa fa-graduation-cap"></i> <?= esc($m->member_category) ?></span>
                    <span class="xuProChip type"><i class="fa fa-id-badge"></i> <?= esc($m->member_type_id) ?></span>
                    <?php if (!$__expired): ?>
                        <span class="xuProChip ok"><i class="fa fa-check-circle"></i> Keanggotaan Aktif</span>
                    <?php else: ?>
                        <span class="xuProChip bad"><i class="fa fa-exclamation-circle"></i> Kedaluwarsa</span>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="xuProBody">
            <h3 class="sec-t"><i class="fa fa-address-card"></i> Informasi Keanggotaan</h3>

            <div class="xuProRow">
                <span class="ico"><i class="fa fa-id-card"></i></span>
                <span class="txt"><span class="lbl">ID Anggota</span><span class="val"><?= esc($m->member_id) ?></span></span>
            </div>
            <div class="xuProRow">
                <span class="ico"><i class="fa fa-envelope"></i></span>
                <span class="txt"><span class="lbl">Email</span><span class="val"><?= esc($m->member_email) ?></span></span>
            </div>
            <div class="xuProRow">
                <span class="ico"><i class="fa fa-whatsapp"></i></span>
                <span class="txt"><span class="lbl">No. HP / WA</span><span class="val"><?= esc($m->member_phone) ?></span></span>
            </div>
            <div class="xuProRow">
                <span class="ico"><i class="fa fa-university"></i></span>
                <span class="txt"><span class="lbl">Institusi</span><span class="val"><?= esc($m->inst_name) ?></span></span>
            </div>
            <div class="xuProRow">
                <span class="ico"><i class="fa fa-calendar-plus-o"></i></span>
                <span class="txt"><span class="lbl">Tanggal Daftar</span><span class="val"><?= $m->register_date ?></span></span>
            </div>
            <div class="xuProRow">
                <span class="ico"><i class="fa fa-calendar-check-o"></i></span>
                <span class="txt"><span class="lbl">Berlaku Hingga</span><span class="val"><?= $m->expire_date ?></span></span>
            </div>
        </div>

    </div>
</div>