<style>
/* ================================================================
   DIFOSS NEW USER FORM — EMERALD FOREST EDITION
   ================================================================ */
:root{
    --nf-emerald:#059669; --nf-teal:#0891b2; --nf-gold:#f59e0b;
    --nf-mint:#6ee7b7; --nf-deep:#0a2920;
    --nf-ink:#0f172a; --nf-muted:#64748b; --nf-soft:#94a3b8;
    --nf-danger:#dc2626;
}

.xuR{opacity:0;transform:translateY(24px);transition:all .6s cubic-bezier(.2,.8,.2,1)}
.xuR.in{opacity:1;transform:none}

.xuFormCard{
    background:#fff;border-radius:22px;
    box-shadow:0 16px 44px rgba(15,23,42,.08);
    overflow:hidden;
    border:1px solid rgba(5,150,105,.12);
    margin-bottom:24px;
    transition:.35s cubic-bezier(.2,.8,.2,1);
}
.xuFormCard:hover{box-shadow:0 22px 54px rgba(5,150,105,.14);border-color:rgba(5,150,105,.22)}
html.xu-dark .xuFormCard{background:#0f1e1f;border-color:rgba(5,150,105,.22);box-shadow:0 16px 44px rgba(0,0,0,.4)}

.xuFormHead{
    padding:22px 28px;
    background:linear-gradient(90deg,var(--nf-emerald),var(--nf-teal),var(--nf-gold),var(--nf-emerald));
    background-size:200% 100%;
    color:#fff;
    animation:xuNfGrad 7s linear infinite;
    position:relative;overflow:hidden;
}
.xuFormHead::after{
    content:'';position:absolute;top:-60%;right:-8%;
    width:320px;height:320px;border-radius:50%;
    background:radial-gradient(circle,rgba(245,158,11,.25),transparent 70%);
    pointer-events:none;
}
@keyframes xuNfGrad{to{background-position:200% 0}}

.xuFormHead h2{
    margin:0;font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1.3rem;
    display:flex;align-items:center;gap:12px;
    color:#fff;letter-spacing:-.01em;
    position:relative;z-index:2;
}
.xuFormHead h2 i{
    width:42px;height:42px;border-radius:13px;
    background:rgba(255,255,255,.18);
    backdrop-filter:blur(8px);-webkit-backdrop-filter:blur(8px);
    display:inline-flex;align-items:center;justify-content:center;
    font-size:1.15rem;
    box-shadow:inset 0 1px 0 rgba(255,255,255,.2);
}

.xuFormBody{padding:28px 30px}

/* Section header */
.xuSec{
    font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1rem;
    color:var(--nf-emerald);
    margin:28px 0 16px;
    display:flex;align-items:center;gap:11px;
    padding-bottom:11px;
    border-bottom:1.5px dashed rgba(5,150,105,.2);
}
.xuSec:first-of-type{margin-top:0}
.xuSec i{
    width:34px;height:34px;border-radius:10px;
    background:linear-gradient(135deg,rgba(5,150,105,.15),rgba(245,158,11,.08));
    color:var(--nf-emerald);
    display:inline-flex;align-items:center;justify-content:center;
    font-size:.9rem;
    border:1px solid rgba(5,150,105,.2);
}
html.xu-dark .xuSec{color:var(--nf-mint);border-bottom-color:rgba(5,150,105,.3)}
html.xu-dark .xuSec i{color:var(--nf-mint);background:linear-gradient(135deg,rgba(5,150,105,.2),rgba(245,158,11,.12));border-color:rgba(5,150,105,.35)}

.xuFormBody label.control-label,
.xuFormBody .xuLabel{
    font-weight:800;font-size:.74rem;
    color:var(--nf-ink);
    margin-bottom:7px;display:block;
    text-transform:uppercase;letter-spacing:.08em;
}
html.xu-dark .xuFormBody label.control-label{color:#e2e8f0}

.xuFormBody .required{color:var(--nf-danger)!important;margin-left:4px}

.xuFormBody .form-control{
    width:100%;padding:11px 14px;
    border:1.5px solid #cbd5e1;
    border-radius:12px;font-size:.9rem;
    outline:none;background:#f8fafc;
    color:var(--nf-ink);
    font-family:inherit;
    transition:.25s;
    box-sizing:border-box;
}
.xuFormBody .form-control:hover{
    border-color:var(--nf-emerald);
    background:rgba(5,150,105,.04);
}
.xuFormBody .form-control:focus{
    border-color:var(--nf-emerald);
    background:#fff;
    box-shadow:0 0 0 4px rgba(5,150,105,.12);
}
html.xu-dark .xuFormBody .form-control{background:rgba(255,255,255,.05);border-color:rgba(5,150,105,.25);color:#f1f5f9}
html.xu-dark .xuFormBody .form-control:hover{background:rgba(5,150,105,.08)}
html.xu-dark .xuFormBody .form-control:focus{border-color:var(--nf-gold);background:rgba(255,255,255,.08);box-shadow:0 0 0 4px rgba(245,158,11,.15)}

.xuFormBody .form-group{margin-bottom:18px}

/* Social icon left */
.xuSocial{position:relative}
.xuSocial .form-control{padding-left:40px!important}
.xuSocial .form-control-feedback{
    position:absolute;left:13px;top:50%;
    transform:translateY(-50%);z-index:3;font-size:1rem;
    pointer-events:none;
}

/* File dropzone */
.xuFile{
    display:block;width:100%;
    padding:13px 14px;
    border:2px dashed #cbd5e1!important;
    border-radius:12px!important;
    background:#f8fafc;
    cursor:pointer;transition:.25s;
    font-size:.88rem;color:var(--nf-muted);
}
.xuFile:hover{border-color:var(--nf-emerald)!important;background:rgba(5,150,105,.04);color:var(--nf-emerald)}
html.xu-dark .xuFile{background:rgba(255,255,255,.03);border-color:rgba(5,150,105,.25)!important;color:var(--nf-soft)}
html.xu-dark .xuFile:hover{border-color:var(--nf-gold)!important;background:rgba(245,158,11,.08);color:var(--nf-gold)}

.xuFormBody small.text-muted{color:var(--nf-muted);font-weight:600;font-size:.75rem}
html.xu-dark .xuFormBody small.text-muted{color:var(--nf-soft)}

/* Checkbox kelompok */
.xuCheck{
    display:flex;align-items:center;gap:10px;
    padding:11px 15px;
    border:1.5px solid #cbd5e1;
    border-radius:12px;background:#f8fafc;
    cursor:pointer;transition:.25s;
    margin-bottom:8px;
    font-weight:600!important;
    color:var(--nf-ink)!important;
    font-size:.85rem!important;
}
.xuCheck:hover{border-color:var(--nf-emerald);background:rgba(5,150,105,.04)}
.xuCheck input{width:18px;height:18px;accent-color:var(--nf-emerald);cursor:pointer;margin:0;flex-shrink:0}
html.xu-dark .xuCheck{background:rgba(255,255,255,.05);border-color:rgba(5,150,105,.25);color:#e2e8f0!important}
html.xu-dark .xuCheck:hover{border-color:var(--nf-gold);background:rgba(245,158,11,.08)}

/* Select2 */
.select2-container{width:100%!important}
.select2-container .select2-selection--single{
    border:1.5px solid #cbd5e1!important;
    border-radius:12px!important;
    background:#f8fafc!important;
    height:46px!important;
}
.select2-container--default .select2-selection--single .select2-selection__rendered{
    line-height:42px!important;color:var(--nf-ink)!important;
    font-weight:600!important;padding-left:14px!important;
}
html.xu-dark .select2-container--default .select2-selection--single .select2-selection__rendered{color:#f1f5f9!important}
.select2-container--default .select2-selection--single .select2-selection__arrow{height:44px!important}
.select2-container--default.select2-container--open .select2-selection--single{
    border-color:var(--nf-emerald)!important;
    box-shadow:0 0 0 4px rgba(5,150,105,.12)!important;
    background:#fff!important;
}
html.xu-dark .select2-container--default.select2-container--open .select2-selection--single{
    border-color:var(--nf-gold)!important;box-shadow:0 0 0 4px rgba(245,158,11,.15)!important;
    background:rgba(255,255,255,.08)!important;
}
.select2-container--default .select2-results__option--highlighted[aria-selected]{
    background:linear-gradient(90deg,var(--nf-emerald),var(--nf-gold))!important;
    color:#fff!important;
}
.select2-dropdown{border:1.5px solid var(--nf-emerald)!important;border-radius:12px!important;overflow:hidden!important}
html.xu-dark .select2-dropdown{background:#0f1e1f!important;border-color:rgba(5,150,105,.35)!important}
.select2-container--default .select2-results__option{padding:9px 14px!important;font-size:.88rem!important;color:var(--nf-ink)}
html.xu-dark .select2-container--default .select2-results__option{color:#e2e8f0}

/* ===== FOOTER ===== */
.xuFormFoot{
    padding:22px 30px;
    border-top:1.5px dashed rgba(5,150,105,.15);
    background:linear-gradient(135deg,rgba(5,150,105,.03),rgba(245,158,11,.02));
    display:flex;gap:10px;justify-content:flex-end;flex-wrap:wrap;
}
html.xu-dark .xuFormFoot{border-top-color:rgba(5,150,105,.25);background:linear-gradient(135deg,rgba(5,150,105,.06),rgba(245,158,11,.03))}

.xuBtnCancel{
    display:inline-flex;align-items:center;gap:8px;
    padding:11px 22px;border-radius:12px;
    background:rgba(5,150,105,.08);
    color:var(--nf-emerald);
    font-weight:700;font-size:.88rem;
    text-decoration:none;transition:.25s;
    border:1.5px solid rgba(5,150,105,.25);
    font-family:inherit;
}
.xuBtnCancel:hover{
    background:rgba(5,150,105,.14);
    border-color:rgba(5,150,105,.45);
    transform:translateY(-2px);
    text-decoration:none;color:var(--nf-emerald);
}
html.xu-dark .xuBtnCancel{background:rgba(5,150,105,.12);color:var(--nf-mint);border-color:rgba(5,150,105,.3)}

.xuBtnReset{
    display:inline-flex;align-items:center;gap:8px;
    padding:11px 22px;border-radius:12px;
    background:#fff;color:var(--nf-danger);
    border:1.5px solid rgba(220,38,38,.35);
    font-weight:700;font-size:.88rem;
    cursor:pointer;transition:.25s;
    font-family:inherit;
    position:relative;overflow:hidden;
}
.xuBtnReset::before{
    content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;
    background:linear-gradient(100deg,transparent 20%,rgba(220,38,38,.08) 50%,transparent 80%);
    transition:left .6s ease;
}
.xuBtnReset:hover{background:#fef2f2;border-color:rgba(220,38,38,.5);transform:translateY(-2px)}
.xuBtnReset:hover::before{left:120%}
html.xu-dark .xuBtnReset{background:rgba(255,255,255,.03);color:#fca5a5;border-color:rgba(220,38,38,.4)}
html.xu-dark .xuBtnReset:hover{background:rgba(220,38,38,.12);border-color:rgba(220,38,38,.6)}

.xuBtnSave{
    display:inline-flex;align-items:center;gap:8px;
    padding:11px 26px;border-radius:12px;
    background:linear-gradient(90deg,var(--nf-emerald),var(--nf-gold));
    color:#fff;border:none;
    font-weight:800;font-size:.88rem;
    letter-spacing:.03em;
    cursor:pointer;transition:.3s;
    box-shadow:0 10px 26px rgba(5,150,105,.35);
    position:relative;overflow:hidden;
    font-family:inherit;
}
.xuBtnSave::before{
    content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;
    background:linear-gradient(100deg,transparent 20%,rgba(255,255,255,.3) 50%,transparent 80%);
    transition:left .6s ease;
}
.xuBtnSave:hover{transform:translateY(-2px);filter:brightness(1.08);box-shadow:0 14px 32px rgba(5,150,105,.45)}
.xuBtnSave:hover::before{left:120%}

.xuFormBody .text-danger{color:var(--nf-danger);font-weight:700;font-size:.78rem}

@media(max-width:720px){
    .xuFormHead{padding:18px 20px}
    .xuFormHead h2{font-size:1.15rem}
    .xuFormBody{padding:20px 18px}
    .xuFormFoot{padding:18px;flex-direction:column}
    .xuBtnSave,.xuBtnReset,.xuBtnCancel{width:100%;justify-content:center;margin:0}
}
</style>

<div class="xuFormCard xuR">
    <div class="xuFormHead">
        <h2><i class="fa fa-user-plus"></i> Form New User</h2>
    </div>

    <form name="frm-main" id="frm-main" class="form-horizontal form-label-left" method="post" action="<?= base_url('sistem/pustakawan/save'); ?>" enctype="multipart/form-data" onsubmit="return confirm('Apakah anda yakin ingin menambah pengguna ?')">
        <div class="xuFormBody">
            <?= csrf_field(); ?>

            <div class="xuSec"><i class="fa fa-id-card"></i> Informasi Akun</div>

            <div class="form-group row">
                <div class="col-md-6">
                    <label for="username" class="control-label">Nama Pengguna<span class="required">*</span></label>
                    <input type="text" id="username" name="username" required="required" class="form-control" value="<?= set_value('username'); ?>" placeholder="Contoh: admin_perpus">
                </div>
                <div class="col-md-6">
                    <label for="realName" class="control-label">Nama Asli<span class="required">*</span></label>
                    <input type="text" id="realName" name="realName" required="required" class="form-control" value="<?= set_value('realName'); ?>" placeholder="Nama lengkap pengguna">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6">
                    <label for="userType" class="control-label">Tipe Keanggotaan<span class="required">*</span></label>
                    <select id="userType" name="userType" class="form-control select2" data-placeholder="--Pilih Tipe Anggota--" required>
                        <option></option>
                        <option value="1" <?= set_select('userType', '1', true); ?>>Pustakawan</option>
                        <option value="2" <?= set_select('userType', '2', true); ?>>Pustakawan</option>
                        <option value="3" <?= set_select('userType', '3', true); ?>>Staf Perpustakaan</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="eMail" class="control-label">E-mail</label>
                    <input type="email" id="eMail" name="eMail" class="form-control" value="<?= set_value('eMail'); ?>" placeholder="nama@email.com">
                </div>
            </div>

            <div class="xuSec"><i class="fa fa-share-alt"></i> Media Sosial</div>

            <div class="form-group row">
                <div class="col-md-3 col-sm-6 xuSocial">
                    <input type="text" class="form-control" id="inputFacebook" name="social[fb]" placeholder="Facebook" value="<?= set_value('social')['fb'] ?? '' ?>">
                    <span class="fa fa-facebook form-control-feedback left" style="color:#1877f2" aria-hidden="true"></span>
                </div>
                <div class="col-md-3 col-sm-6 xuSocial">
                    <input type="text" class="form-control" id="inputTwitter" name="social[tw]" placeholder="Twitter" value="<?= set_value('social')['tw'] ?? '' ?>">
                    <span class="fa fa-twitter form-control-feedback left" style="color:#1da1f2" aria-hidden="true"></span>
                </div>
                <div class="col-md-3 col-sm-6 xuSocial">
                    <input type="text" class="form-control" id="inputLinkedIn" name="social[li]" placeholder="LinkedIn" value="<?= set_value('social')['li'] ?? '' ?>">
                    <span class="fa fa-linkedin form-control-feedback left" style="color:#0a66c2" aria-hidden="true"></span>
                </div>
                <div class="col-md-3 col-sm-6 xuSocial">
                    <input type="text" class="form-control" id="inputReddit" name="social[rd]" placeholder="Reddit" value="<?= set_value('social')['rd'] ?? '' ?>">
                    <span class="fa fa-reddit form-control-feedback left" style="color:#ff4500" aria-hidden="true"></span>
                </div>
                <div class="col-md-3 col-sm-6 xuSocial">
                    <input type="text" class="form-control" id="inputPinterest" name="social[pn]" placeholder="Pinterest" value="<?= set_value('social')['pn'] ?? '' ?>">
                    <span class="fa fa-pinterest form-control-feedback left" style="color:#e60023" aria-hidden="true"></span>
                </div>
                <div class="col-md-3 col-sm-6 xuSocial">
                    <input type="text" class="form-control" id="inputGooglePlus" name="social[gp]" placeholder="Google Plus+" value="<?= set_value('social')['gp'] ?? '' ?>">
                    <span class="fa fa-google-plus form-control-feedback left" style="color:#db4437" aria-hidden="true"></span>
                </div>
                <div class="col-md-3 col-sm-6 xuSocial">
                    <input type="text" class="form-control" id="inputYouTube" name="social[yt]" placeholder="YouTube" value="<?= set_value('social')['yt'] ?? '' ?>">
                    <span class="fa fa-youtube form-control-feedback left" style="color:#ff0000" aria-hidden="true"></span>
                </div>
                <div class="col-md-3 col-sm-6 xuSocial">
                    <input type="text" class="form-control" id="inputBlog" name="social[bl]" placeholder="Blog" value="<?= set_value('social')['bl'] ?? '' ?>">
                    <span class="fa fa-pencil form-control-feedback left" style="color:#8b5cf6" aria-hidden="true"></span>
                </div>
                <div class="col-md-3 col-sm-6 xuSocial">
                    <input type="text" class="form-control" id="inputYahooMessenger" name="social[ym]" placeholder="Yahoo! Messenger" value="<?= set_value('social')['ym'] ?? '' ?>">
                    <span class="fa fa-yahoo form-control-feedback left" style="color:#6001a9" aria-hidden="true"></span>
                </div>
            </div>

            <div class="xuSec"><i class="fa fa-camera"></i> Foto & Kelompok</div>

            <div class="form-group row">
                <div class="col-md-6">
                    <label for="image" class="control-label">Foto Pengguna</label>
                    <input type="file" id="image" name="image" class="form-control-file border rounded xuFile">
                    <small class="text-muted"><i class="fa fa-info-circle"></i> Maksimum 500 KB · Format JPG/PNG</small>
                </div>
                <div class="col-md-6">
                    <label class="control-label">Kelompok</label>
                    <label class="xuCheck"><input type="checkbox" name="groups[]" value="2" <?= set_checkbox('groups', '2'); ?> required> admin</label>
                    <label class="xuCheck"><input type="checkbox" name="groups[]" value="3" <?= set_checkbox('groups', '3'); ?>> Operator</label>
                    <label class="xuCheck"><input type="checkbox" name="groups[]" value="4" <?= set_checkbox('groups', '4'); ?>> User</label>
                </div>
            </div>

            <div class="xuSec"><i class="fa fa-lock"></i> Keamanan</div>

            <div class="form-group row">
                <div class="col-md-6">
                    <label for="passwd1" class="control-label">Kata Sandi Baru<span class="required">*</span></label>
                    <input type="password" id="passwd1" name="passwd1" required="required" class="form-control" value="<?= set_value('passwd1'); ?>" placeholder="Minimal 6 karakter">
                </div>
                <div class="col-md-6">
                    <label for="passwd2" class="control-label">Konfirmasi Kata Sandi Baru<span class="required">*</span></label>
                    <input type="password" id="passwd2" name="passwd2" required="required" class="form-control" placeholder="Ketik ulang kata sandi">
                    <?php if (session()->get('validation')): ?>
                        <small class="text-danger"><?= session()->get('validation')->getError('passwd2'); ?></small>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="xuFormFoot">
            <a href="javascript:void(0)" onclick="if(window.history.length>1){window.history.back();}else{location.href='<?= base_url('sistem/pustakawan') ?>';}" class="xuBtnCancel">
                <i class="fa fa-arrow-left"></i> Kembali
            </a>
            <button type="reset" class="xuBtnReset"><i class="fa fa-undo"></i> Reset</button>
            <button type="submit" class="xuBtnSave"><i class="fa fa-save"></i> Simpan</button>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function(){
    var io = new IntersectionObserver(function(es){
        es.forEach(function(en){
            if (en.isIntersecting){ en.target.classList.add('in'); io.unobserve(en.target); }
        });
    }, {threshold:.06});
    document.querySelectorAll('.xuR').forEach(function(el){ io.observe(el); });
});
</script>