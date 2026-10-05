<?php $s = $settings; ?>
<style>
/* ================================================================
   DIFOSS PENGATURAN PENDAFTARAN — EMERALD FOREST EDITION
   ================================================================ */
:root{
    --rs-emerald:#059669; --rs-teal:#0891b2; --rs-gold:#f59e0b;
    --rs-mint:#6ee7b7; --rs-deep:#0a2920;
    --rs-ink:#0f172a; --rs-muted:#64748b; --rs-soft:#94a3b8;
}

.xuSetWrap{max-width:700px;margin:30px auto;padding:0 16px}

.xuSetCard{
    background:#fff;border-radius:22px;
    padding:32px 34px;
    border:1px solid rgba(5,150,105,.12);
    box-shadow:0 16px 44px rgba(15,23,42,.1);
    animation:xuSetIn .7s cubic-bezier(.2,.8,.2,1) both;
    position:relative;overflow:hidden;
}
.xuSetCard::before{
    content:'';position:absolute;top:0;left:0;right:0;height:4px;
    background:linear-gradient(90deg,var(--rs-emerald),var(--rs-gold),var(--rs-teal));
}
@keyframes xuSetIn{from{opacity:0;transform:translateY(24px)}to{opacity:1;transform:none}}
html.xu-dark .xuSetCard{background:#0f1e1f;border-color:rgba(5,150,105,.25);box-shadow:0 16px 44px rgba(0,0,0,.4)}

.xuSetCard h2{
    margin:0 0 24px;
    font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1.4rem;
    color:var(--rs-ink);
    display:flex;align-items:center;gap:12px;
    padding-bottom:16px;
    border-bottom:1.5px dashed rgba(5,150,105,.2);
}
html.xu-dark .xuSetCard h2{color:#f1f5f9;border-bottom-color:rgba(5,150,105,.3)}

.xuSetCard h2 i{
    width:44px;height:44px;border-radius:13px;
    background:linear-gradient(135deg,var(--rs-emerald),var(--rs-gold));
    color:#fff;display:inline-flex;align-items:center;justify-content:center;
    font-size:1.15rem;
    box-shadow:0 10px 24px rgba(5,150,105,.35);
}

.xuSetRow{margin-bottom:20px}
.xuSetRow label{
    display:block;
    font-weight:800;font-size:.74rem;
    color:var(--rs-ink);margin-bottom:8px;
    text-transform:uppercase;letter-spacing:.08em;
}
html.xu-dark .xuSetRow label{color:#e2e8f0}

.xuSetRow select,
.xuSetRow textarea,
.xuSetRow input[type=text]{
    width:100%;padding:12px 15px;
    border:1.5px solid #cbd5e1;
    border-radius:12px;font-size:.9rem;
    background:#f8fafc;color:var(--rs-ink);
    font-family:inherit;
    box-sizing:border-box;
    transition:.25s;
}
.xuSetRow select:focus,
.xuSetRow textarea:focus,
.xuSetRow input[type=text]:focus{
    outline:none;
    border-color:var(--rs-emerald);
    background:#fff;
    box-shadow:0 0 0 4px rgba(5,150,105,.12);
}
html.xu-dark .xuSetRow select,
html.xu-dark .xuSetRow textarea,
html.xu-dark .xuSetRow input[type=text]{
    background:rgba(255,255,255,.05);
    border-color:rgba(5,150,105,.25);
    color:#f1f5f9;
}
html.xu-dark .xuSetRow select:focus,
html.xu-dark .xuSetRow textarea:focus,
html.xu-dark .xuSetRow input[type=text]:focus{
    border-color:var(--rs-gold);
    background:rgba(255,255,255,.08);
    box-shadow:0 0 0 4px rgba(245,158,11,.15);
}

.xuSetRow textarea{min-height:110px;resize:vertical;font-family:'JetBrains Mono',monospace;font-size:.85rem;line-height:1.6}

.xuSetRow .hint{
    font-size:.73rem;color:var(--rs-muted);
    margin-top:6px;line-height:1.55;
    display:flex;align-items:flex-start;gap:6px;
}
.xuSetRow .hint i{color:var(--rs-gold);margin-top:2px}
.xuSetRow .hint b{color:var(--rs-emerald);font-weight:800}
html.xu-dark .xuSetRow .hint{color:var(--rs-soft)}
html.xu-dark .xuSetRow .hint b{color:var(--rs-mint)}

.xuSetRow .placeholder-tag{
    display:inline-block;padding:2px 8px;
    background:rgba(5,150,105,.1);
    color:var(--rs-emerald);
    border-radius:6px;font-family:'JetBrains Mono',monospace;
    font-size:.72rem;font-weight:700;
    border:1px solid rgba(5,150,105,.25);
    margin:0 2px;
}
html.xu-dark .xuSetRow .placeholder-tag{background:rgba(5,150,105,.15);color:var(--rs-mint);border-color:rgba(5,150,105,.35)}

/* Color preview */
.xuColorPreview{
    display:inline-flex;align-items:center;gap:8px;
    margin-top:8px;padding:6px 12px;
    border-radius:999px;font-size:.72rem;font-weight:700;
    border:1px solid rgba(5,150,105,.2);
    background:#fff;
}
.xuColorPreview .dot{width:14px;height:14px;border-radius:50%;border:2px solid #fff;box-shadow:0 0 0 1px rgba(0,0,0,.1)}
html.xu-dark .xuColorPreview{background:rgba(255,255,255,.05);border-color:rgba(5,150,105,.3)}

/* ===== SWITCH ===== */
.xuSwitch{
    display:flex;align-items:center;gap:14px;
    padding:16px 18px;border-radius:14px;
    background:linear-gradient(135deg,rgba(5,150,105,.08),rgba(245,158,11,.04));
    border:1.5px solid rgba(5,150,105,.25);
    margin-bottom:22px;
    cursor:pointer;
    transition:.25s;
    position:relative;
}
.xuSwitch:hover{border-color:rgba(5,150,105,.45);box-shadow:0 6px 18px rgba(5,150,105,.12)}
html.xu-dark .xuSwitch{background:linear-gradient(135deg,rgba(5,150,105,.14),rgba(245,158,11,.08));border-color:rgba(5,150,105,.35)}
html.xu-dark .xuSwitch:hover{border-color:rgba(245,158,11,.45)}

.xuSwitch input{
    width:22px;height:22px;
    accent-color:var(--rs-emerald);
    cursor:pointer;flex-shrink:0;
}
.xuSwitch .sw-ico{
    width:34px;height:34px;border-radius:10px;
    background:linear-gradient(135deg,var(--rs-emerald),var(--rs-gold));
    color:#fff;display:inline-flex;align-items:center;justify-content:center;
    font-size:.95rem;flex-shrink:0;
    box-shadow:0 6px 14px rgba(5,150,105,.3);
}
.xuSwitch label{
    margin:0!important;flex:1;
    font-size:.88rem;font-weight:700!important;
    color:var(--rs-ink);line-height:1.5;
    text-transform:none!important;letter-spacing:0!important;
    cursor:pointer;
}
.xuSwitch label small{display:block;font-size:.74rem;color:var(--rs-muted);font-weight:500!important;margin-top:3px}
html.xu-dark .xuSwitch label{color:#e2e8f0}
html.xu-dark .xuSwitch label small{color:var(--rs-soft)}

/* ===== SUBSECTION ===== */
.xuSubSec{
    margin:26px 0 20px;
    padding:10px 0;
    font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1.05rem;
    color:var(--rs-ink);
    display:flex;align-items:center;gap:10px;
    border-bottom:1.5px dashed rgba(5,150,105,.2);
}
html.xu-dark .xuSubSec{color:#f1f5f9;border-bottom-color:rgba(5,150,105,.3)}

.xuSubSec i{
    width:30px;height:30px;border-radius:9px;
    background:linear-gradient(135deg,rgba(5,150,105,.12),rgba(245,158,11,.08));
    color:var(--rs-emerald);
    display:inline-flex;align-items:center;justify-content:center;
    font-size:.85rem;
    border:1px solid rgba(5,150,105,.2);
}
html.xu-dark .xuSubSec i{color:var(--rs-mint);background:linear-gradient(135deg,rgba(5,150,105,.2),rgba(245,158,11,.12));border-color:rgba(5,150,105,.35)}

/* ===== SAVE BUTTON ===== */
.xuSetSave{
    padding:13px 30px;
    border:none;border-radius:13px;
    background:linear-gradient(90deg,var(--rs-emerald),var(--rs-gold));
    color:#fff;font-weight:800;
    cursor:pointer;
    font-size:.92rem;letter-spacing:.03em;
    box-shadow:0 10px 26px rgba(5,150,105,.35);
    transition:.25s;
    position:relative;overflow:hidden;
    display:inline-flex;align-items:center;gap:9px;
    font-family:inherit;
    margin-top:8px;
}
.xuSetSave::before{
    content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;
    background:linear-gradient(100deg,transparent 20%,rgba(255,255,255,.3) 50%,transparent 80%);
    transition:left .6s ease;
}
.xuSetSave:hover{transform:translateY(-2px);filter:brightness(1.08);box-shadow:0 14px 32px rgba(5,150,105,.45)}
.xuSetSave:hover::before{left:120%}

.xuSetCancel{
    padding:13px 24px;
    border-radius:13px;
    background:rgba(5,150,105,.08);
    color:var(--rs-emerald);
    font-weight:700;font-size:.9rem;
    border:1.5px solid rgba(5,150,105,.25);
    text-decoration:none;
    display:inline-flex;align-items:center;gap:8px;
    transition:.25s;
    font-family:inherit;
    margin-right:10px;
}
.xuSetCancel:hover{
    background:rgba(5,150,105,.14);
    border-color:rgba(5,150,105,.4);
    transform:translateY(-2px);
    text-decoration:none;color:var(--rs-emerald);
}
html.xu-dark .xuSetCancel{background:rgba(5,150,105,.12);color:var(--rs-mint);border-color:rgba(5,150,105,.3)}
html.xu-dark .xuSetCancel:hover{background:rgba(5,150,105,.18);border-color:rgba(245,158,11,.4)}

.xuSetActions{display:flex;gap:10px;flex-wrap:wrap;padding-top:20px;border-top:1.5px dashed rgba(5,150,105,.15);margin-top:12px}

@media(max-width:640px){
    .xuSetCard{padding:24px 20px}
    .xuSetCard h2{font-size:1.2rem}
    .xuSetActions{flex-direction:column}
    .xuSetSave,.xuSetCancel{width:100%;justify-content:center;margin:0}
}
</style>

<div class="xuSetWrap">
    <div class="xuSetCard">
        <h2><i class="fa fa-cog"></i> Pengaturan Pendaftaran Online</h2>
        <form method="post" action="<?= base_url('membership/reg-settings') ?>">
            <?= csrf_field() ?>

            <div class="xuSwitch" onclick="var cb=document.getElementById('reg_open');cb.checked=!cb.checked;">
                <input type="checkbox" name="reg_open" id="reg_open" value="1" <?= ((int)$s->reg_open === 1) ? 'checked' : '' ?> onclick="event.stopPropagation()">
                <span class="sw-ico"><i class="fa fa-power-off"></i></span>
                <label for="reg_open" onclick="event.stopPropagation()">
                    Pendaftaran online DIBUKA
                    <small>Bila dicabut, halaman /daftar menampilkan "Pendaftaran Ditutup"</small>
                </label>
            </div>

            <div class="xuSubSec"><i class="fa fa-palette"></i> Warna Latar Kartu Anggota</div>

            <div class="xuSetRow">
                <label for="warna_mahasiswa">Mahasiswa</label>
                <select name="warna_mahasiswa" id="warna_mahasiswa">
                    <option value="biru" <?= $s->warna_mahasiswa=='biru'?'selected':'' ?>>🔵 Biru</option>
                    <option value="merah" <?= $s->warna_mahasiswa=='merah'?'selected':'' ?>>🔴 Merah</option>
                </select>
            </div>

            <div class="xuSetRow">
                <label for="warna_dosen">Dosen</label>
                <select name="warna_dosen" id="warna_dosen">
                    <option value="merah" <?= $s->warna_dosen=='merah'?'selected':'' ?>>🔴 Merah</option>
                    <option value="biru" <?= $s->warna_dosen=='biru'?'selected':'' ?>>🔵 Biru</option>
                </select>
            </div>

            <div class="xuSetRow">
                <label for="warna_staff">Staff</label>
                <select name="warna_staff" id="warna_staff">
                    <option value="merah" <?= $s->warna_staff=='merah'?'selected':'' ?>>🔴 Merah</option>
                    <option value="biru" <?= $s->warna_staff=='biru'?'selected':'' ?>>🔵 Biru</option>
                </select>
            </div>

            <div class="xuSubSec"><i class="fa fa-whatsapp"></i> Template Pesan WhatsApp</div>

            <div class="xuSetRow">
                <label for="wa_template">Template Pesan</label>
                <textarea name="wa_template" id="wa_template" rows="4"><?= esc($s->wa_template) ?></textarea>
                <div class="hint">
                    <i class="fa fa-info-circle"></i>
                    <div>
                        Placeholder tersedia:
                        <span class="placeholder-tag">{nama}</span> = nama anggota,
                        <span class="placeholder-tag">{id}</span> = ID anggota.
                        Tombol "Kirim WA" di halaman pendaftaran memakai template ini.
                    </div>
                </div>
            </div>

            <div class="xuSetActions">
                <a href="<?= base_url('membership') ?>"
   onclick="if(window.history.length>1){window.history.back();return false;}"
   class="xuSetCancel">
   <i class="fa fa-arrow-left"></i> Kembali
</a>
                <button class="xuSetSave" type="submit"><i class="fa fa-save"></i> Simpan Pengaturan</button>
            </div>
        </form>
    </div>
</div>