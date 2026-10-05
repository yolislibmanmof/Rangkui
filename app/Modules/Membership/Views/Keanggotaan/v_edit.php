<style>
/* ================================================================
   DIFOSS EDIT MEMBERSHIP — EMERALD FOREST EDITION
   ================================================================ */
:root{
    --em-emerald:#059669; --em-teal:#0891b2; --em-gold:#f59e0b;
    --em-mint:#6ee7b7; --em-deep:#0a2920; --em-mid:#064e3b;
    --em-ink:#0f172a; --em-muted:#64748b; --em-soft:#94a3b8;
}

.xuR{opacity:0;transform:translateY(24px);transition:all .6s cubic-bezier(.2,.8,.2,1)}
.xuR.in{opacity:1;transform:none}

/* ===== KARTU UTAMA ===== */
.xuFormCard{
    background:#fff;border-radius:22px;
    box-shadow:0 16px 44px rgba(15,23,42,.08);
    overflow:hidden;
    border:1px solid rgba(5,150,105,.12);
    margin-bottom:24px;
    transition:.35s cubic-bezier(.2,.8,.2,1);
}
.xuFormCard:hover{
    box-shadow:0 22px 54px rgba(5,150,105,.14);
    border-color:rgba(5,150,105,.22);
}
html.xu-dark .xuFormCard{background:#0f1e1f;border-color:rgba(5,150,105,.22);box-shadow:0 16px 44px rgba(0,0,0,.4)}

.xuFormHead{
    padding:24px 28px;
    background:linear-gradient(90deg,var(--em-emerald),var(--em-teal),var(--em-gold),var(--em-emerald));
    background-size:200% 100%;
    color:#fff;
    display:flex;align-items:center;gap:12px;
    animation:xuEmGrad 7s linear infinite;
    position:relative;overflow:hidden;
}
.xuFormHead::after{
    content:'';position:absolute;top:-60%;right:-8%;
    width:320px;height:320px;border-radius:50%;
    background:radial-gradient(circle,rgba(245,158,11,.25),transparent 70%);
    pointer-events:none;
}
@keyframes xuEmGrad{to{background-position:200% 0}}

.xuFormHead h2{
    margin:0;font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1.35rem;
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
.xuFormBody{padding:28px}

/* ===== FORM FIELDS ===== */
.xuFormBody .control-label{
    display:block;font-weight:800;
    font-size:.82rem;color:var(--em-ink);
    margin-bottom:8px;letter-spacing:.03em;
}
html.xu-dark .xuFormBody .control-label{color:#e2e8f0}

.xuFormBody .form-control{
    width:100%;padding:12px 15px;
    border:1.5px solid #cbd5e1;
    border-radius:12px;font-size:.92rem;
    outline:none;transition:.25s;
    background:#f8fafc;color:var(--em-ink);
    box-sizing:border-box;
    font-family:inherit;
}
html.xu-dark .xuFormBody .form-control{background:rgba(255,255,255,.05);border-color:rgba(5,150,105,.2);color:#f1f5f9}

.xuFormBody textarea.form-control{min-height:80px;resize:vertical}

.xuFormBody .form-control:hover{
    border-color:var(--em-emerald);
    background:rgba(5,150,105,.04);
}
.xuFormBody .form-control:focus{
    border-color:var(--em-emerald);
    background:#fff;
    box-shadow:0 0 0 4px rgba(5,150,105,.12);
}
html.xu-dark .xuFormBody .form-control:hover{background:rgba(5,150,105,.08)}
html.xu-dark .xuFormBody .form-control:focus{background:rgba(255,255,255,.08);border-color:var(--em-gold);box-shadow:0 0 0 4px rgba(245,158,11,.15)}

.xuFormBody .form-group{margin-bottom:20px}
.xuFormBody small{
    font-size:.75rem;color:var(--em-muted);
    font-weight:600;margin-top:4px;display:block;
}
html.xu-dark .xuFormBody small{color:var(--em-soft)}

/* ===== CHECKBOX & RADIO ===== */
.xuCheck,.xuRadio{
    display:flex;align-items:center;gap:10px;
    padding:11px 15px;
    border:1.5px solid #cbd5e1;
    border-radius:12px;
    background:#f8fafc;
    cursor:pointer;transition:.25s;
    margin-bottom:8px;
    font-weight:600;color:var(--em-ink);
    font-size:.88rem;
}
.xuCheck:hover,.xuRadio:hover{
    border-color:var(--em-emerald);
    background:rgba(5,150,105,.04);
}
.xuCheck input,.xuRadio input{
    width:18px;height:18px;
    accent-color:var(--em-emerald);
    cursor:pointer;margin:0;
}
html.xu-dark .xuCheck,html.xu-dark .xuRadio{background:rgba(255,255,255,.05);border-color:rgba(5,150,105,.2);color:#e2e8f0}
html.xu-dark .xuCheck:hover,html.xu-dark .xuRadio:hover{background:rgba(5,150,105,.08)}

.xuRadioGroup{display:flex;gap:12px;flex-wrap:wrap}
.xuRadioGroup .xuRadio{flex:1;min-width:120px;justify-content:center}

/* ===== UPLOAD FOTO ===== */
.xuFileWrap{display:flex;align-items:center;gap:10px;width:100%}
.xuFileBtn{
    display:inline-flex;align-items:center;gap:7px;
    padding:11px 16px;border-radius:11px;
    background:linear-gradient(90deg,var(--em-emerald),var(--em-gold));
    color:#fff;font-weight:700;font-size:.82rem;
    cursor:pointer;transition:.25s;
    box-shadow:0 6px 16px rgba(5,150,105,.3);
    white-space:nowrap;flex-shrink:0;
    position:relative;overflow:hidden;
}
.xuFileBtn::before{
    content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;
    background:linear-gradient(100deg,transparent 20%,rgba(255,255,255,.3) 50%,transparent 80%);
    transition:left .6s ease;
}
.xuFileBtn:hover{transform:translateY(-2px);filter:brightness(1.1);box-shadow:0 10px 22px rgba(5,150,105,.4)}
.xuFileBtn:hover::before{left:120%}

.xuFileName{
    flex:1;padding:11px 14px;
    border:1.5px solid #cbd5e1;
    border-radius:11px;
    background:#f8fafc;color:var(--em-muted);
    font-size:.85rem;
    overflow:hidden;text-overflow:ellipsis;white-space:nowrap;
    min-width:0;
    font-family:'JetBrains Mono',monospace;
}
.xuFileName.has-file{
    color:var(--em-ink);font-weight:600;
    border-color:rgba(5,150,105,.4);
    background:rgba(5,150,105,.05);
}
html.xu-dark .xuFileName{background:rgba(255,255,255,.05);border-color:rgba(5,150,105,.25);color:var(--em-soft)}
html.xu-dark .xuFileName.has-file{color:#f1f5f9;border-color:rgba(245,158,11,.4);background:rgba(245,158,11,.08)}

input[type=file].xuFileInput{
    position:absolute;width:1px;height:1px;
    opacity:0;overflow:hidden;pointer-events:none;
}

/* ===== AVATAR PREVIEW ===== */
.xuAvatarWrap{
    position:relative;margin-top:14px;
    display:inline-block;
}
.xuAvatar{
    width:140px;height:140px;
    object-fit:cover;
    border-radius:16px;
    border:3px solid var(--em-gold);
    box-shadow:0 12px 30px rgba(5,150,105,.2);
    transition:.3s;
}
.xuAvatar:hover{
    transform:scale(1.04) rotate(-1.5deg);
    box-shadow:0 16px 38px rgba(245,158,11,.35);
}
.xuAvatarWrap::after{
    content:'';position:absolute;inset:-8px;
    border:1.5px dashed rgba(110,231,183,.45);
    border-radius:22px;
    animation:xuEmRing 14s linear infinite;
    pointer-events:none;
}
@keyframes xuEmRing{to{transform:rotate(360deg)}}

.xuAvatarLbl{
    font-size:.72rem;color:var(--em-soft);
    margin-top:8px;font-weight:700;
    letter-spacing:.04em;
    display:flex;align-items:center;gap:6px;
}
html.xu-dark .xuAvatarLbl{color:var(--em-soft)}

/* ===== SECTION DIVIDER ===== */
.xuSection{
    font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1.05rem;
    color:var(--em-ink);
    margin:28px 0 16px;padding-bottom:10px;
    border-bottom:1.5px dashed rgba(5,150,105,.25);
    display:flex;align-items:center;gap:10px;
}
html.xu-dark .xuSection{color:#f1f5f9;border-bottom-color:rgba(5,150,105,.35)}

.xuSection i{
    width:30px;height:30px;border-radius:9px;
    background:linear-gradient(135deg,rgba(5,150,105,.12),rgba(245,158,11,.08));
    color:var(--em-emerald);
    display:inline-flex;align-items:center;justify-content:center;
    font-size:.85rem;
    border:1px solid rgba(5,150,105,.2);
}
html.xu-dark .xuSection i{color:var(--em-mint);background:linear-gradient(135deg,rgba(5,150,105,.2),rgba(245,158,11,.12));border-color:rgba(5,150,105,.35)}

/* ===== DROPDOWN SELECT ===== */
.xuFormBody select.form-control{
  color:var(--em-ink) !important;
  font-size:.92rem !important;
  font-weight:600 !important;
  height:48px !important;
  line-height:normal !important;
  padding:0 38px 0 15px !important;
  border:1.5px solid #cbd5e1 !important;
  border-radius:12px !important;
  background-color:#f8fafc !important;
  background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='13' height='13' viewBox='0 0 12 12'%3E%3Cpath fill='%23059669' d='M6 8L1 3h10z'/%3E%3C/svg%3E") !important;
  background-repeat:no-repeat !important;
  background-position:right 14px center !important;
  background-size:12px !important;
  -webkit-appearance:none !important;
  -moz-appearance:none !important;
  appearance:none !important;
  cursor:pointer !important;
}
.xuFormBody select.form-control:hover{
  border-color:var(--em-emerald) !important;
  background-color:rgba(5,150,105,.04) !important;
}
.xuFormBody select.form-control:focus{
  border-color:var(--em-emerald) !important;
  background-color:#fff !important;
  box-shadow:0 0 0 4px rgba(5,150,105,.12) !important;
  outline:none !important;
}
.xuFormBody select.form-control option{
  color:var(--em-ink) !important;
  background:#fff !important;
  font-weight:600 !important;
}
html.xu-dark .xuFormBody select.form-control{
  color:#f1f5f9 !important;background-color:rgba(255,255,255,.05) !important;
  border-color:rgba(5,150,105,.25) !important;
  background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='13' height='13' viewBox='0 0 12 12'%3E%3Cpath fill='%23f59e0b' d='M6 8L1 3h10z'/%3E%3C/svg%3E") !important;
}
html.xu-dark .xuFormBody select.form-control:focus{
  border-color:var(--em-gold) !important;
  background-color:rgba(255,255,255,.08) !important;
  box-shadow:0 0 0 4px rgba(245,158,11,.15) !important;
}
html.xu-dark .xuFormBody select.form-control option{
  color:#f1f5f9 !important;background:#0f1e1f !important;
}

/* ===== TOMBOL AKSI ===== */
.xuActions{
    display:flex;gap:12px;justify-content:flex-end;
    padding-top:22px;border-top:1.5px dashed rgba(5,150,105,.15);
    margin-top:14px;flex-wrap:wrap;
}

.xuSave{
    display:inline-flex;align-items:center;gap:8px;
    padding:12px 28px;border-radius:12px;
    background:linear-gradient(90deg,var(--em-emerald),var(--em-gold));
    color:#fff;font-weight:800;font-size:.95rem;
    border:none;cursor:pointer;transition:.25s;
    box-shadow:0 10px 26px rgba(5,150,105,.35);
    position:relative;overflow:hidden;
    font-family:inherit;
}
.xuSave::before{
    content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;
    background:linear-gradient(100deg,transparent 20%,rgba(255,255,255,.3) 50%,transparent 80%);
    transition:left .6s ease;
}
.xuSave:hover{
    transform:translateY(-2px);
    filter:brightness(1.08);
    box-shadow:0 14px 32px rgba(5,150,105,.45);
}
.xuSave:hover::before{left:120%}

.xuCancel{
    display:inline-flex;align-items:center;gap:8px;
    padding:12px 24px;border-radius:12px;
    background:rgba(5,150,105,.08);
    color:var(--em-emerald);
    font-weight:700;font-size:.92rem;
    text-decoration:none;transition:.25s;
    border:1.5px solid rgba(5,150,105,.25);
}
.xuCancel:hover{
    transform:translateY(-2px);
    background:rgba(5,150,105,.12);
    border-color:rgba(5,150,105,.4);
    text-decoration:none;
}
html.xu-dark .xuCancel{background:rgba(5,150,105,.12);color:var(--em-mint);border-color:rgba(5,150,105,.3)}
html.xu-dark .xuCancel:hover{background:rgba(5,150,105,.18);border-color:rgba(245,158,11,.4)}

/* ===== PASSWORD FEEDBACK ===== */
#passwordFeedback{
    font-weight:700!important;
    margin-top:6px;font-size:.78rem;
}
#passwordFeedback.err{
    color:#dc2626!important;
    padding:6px 10px;
    background:rgba(220,38,38,.08);
    border-radius:8px;
    border:1px solid rgba(220,38,38,.25);
    display:inline-block;
}
#passwordFeedback.ok{
    color:var(--em-emerald)!important;
    padding:6px 10px;
    background:rgba(5,150,105,.08);
    border-radius:8px;
    border:1px solid rgba(5,150,105,.25);
    display:inline-block;
}

/* ===== RESPONSIVE ===== */
@media(max-width:720px){
    .xuFormBody{padding:20px 16px}
    .xuFormHead{padding:18px 20px}
    .xuFormHead h2{font-size:1.15rem}
    .xuActions{gap:8px}
    .xuSave,.xuCancel{padding:10px 18px;font-size:.85rem}
    .xuRadioGroup{flex-direction:column}
    .xuRadioGroup .xuRadio{min-width:100%}
    .xuAvatar{width:120px;height:120px}
}
</style>

<div class="xuFormCard xuR">
    <div class="xuFormHead">
        <h2><i class="fa fa-pencil-square-o"></i> Perbaharui Keanggotaan</h2>
    </div>
    <div class="xuFormBody">
        <div id="mainContent" style="display: block;">
            <form name="mainForm" id="mainForm" class="form-horizontal" method="post" action="<?= base_url('membership/update') ?>" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <input type="hidden" name="form_name" value="mainForm">
                <input type="hidden" name="original_member_id" value="<?= $data->member_id ?>">

                <div class="xuSection"><i class="fa fa-id-card"></i> Informasi Utama</div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="memberId" class="control-label">Member ID*</label>
                            <input type="text" name="member_id" id="memberId" class="form-control" maxlength="50" required value="<?= $data->member_id ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="memberName" class="control-label">Member Name*</label>
                            <input type="text" name="member_name" id="memberName" class="form-control" maxlength="100" required value="<?= $data->member_name ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="birthDate" class="control-label">Date of Birth</label>
                            <input class="form-control" type="date" name="birth_date" id="birthDate" value="<?= $data->birth_date ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="instName" class="control-label">Institution</label>
                            <input type="text" name="inst_name" id="instName" class="form-control" maxlength="256" value="<?= $data->inst_name ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="sinceDate" class="control-label">Member Since</label>
                            <input class="form-control" type="date" name="member_since_date" id="sinceDate" value="<?= $data->member_since_date ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="memberTypeID" class="control-label">Membership Type*</label>
                            <select name="member_type_id" id="memberTypeID" class="form-control" required>
                                <?php foreach ($mst_data as $value): ?>
                                    <option value="<?= $value->member_type_id ?>" <?= $value->member_type_id == $data->member_type_id ? 'selected' : '' ?>>
                                        <?= $value->member_type_name ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="regDate" class="control-label">Registration Date</label>
                            <input class="form-control" type="date" name="register_date" id="regDate" value="<?= $data->register_date ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="memberPIN" class="control-label">Identification Number*</label>
                            <input type="text" name="pin" id="memberPIN" class="form-control" maxlength="256" required value="<?= $data->pin ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Valid Until</label>
                            <input class="form-control" type="date" name="expire_date" id="expDate" value="<?= $data->expire_date ?>">
                        </div>
                    </div>
                </div>

                <div class="xuSection"><i class="fa fa-map-marker"></i> Alamat & Kontak</div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="memberPostal" class="control-label">Postal Code</label>
                            <input type="text" name="postal_code" id="memberPostal" class="form-control" maxlength="256" value="<?= $data->postal_code ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Gender</label>
                            <div class="xuRadioGroup">
                                <label class="xuRadio"><input type="radio" name="gender" value="1" <?= $data->gender == 1 ? 'checked' : '' ?>> Male</label>
                                <label class="xuRadio"><input type="radio" name="gender" value="0" <?= $data->gender == 0 ? 'checked' : '' ?>> Female</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="memberAddress" class="control-label">Address</label>
                            <textarea name="member_address" id="memberAddress" class="form-control" rows="2" maxlength="30720"><?= $data->member_address ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="memberMailAddress" class="control-label">Address Mail</label>
                            <textarea name="member_mail_address" id="memberMailAddress" class="form-control" rows="2" maxlength="30720"><?= $data->member_mail_address ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="memberPhone" class="control-label">Phone Number</label>
                            <input type="text" name="member_phone" id="memberPhone" class="form-control" maxlength="256" value="<?= $data->member_phone ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="memberFax" class="control-label">Fax Number</label>
                            <input type="text" name="member_fax" id="memberFax" class="form-control" maxlength="256" value="<?= $data->member_fax ?>">
                        </div>
                    </div>
                </div>

                <div class="xuSection"><i class="fa fa-lock"></i> Akun & Keamanan</div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="memberNotes" class="control-label">Notes</label>
                            <textarea name="member_notes" id="memberNotes" class="form-control" rows="2" maxlength="30720"><?= $data->member_notes ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="image" class="control-label">Foto</label>
                            <input type="file" name="member_image" id="image" class="form-control">
                            <small>Maximum 500 KB (kosongkan jika tidak diubah)</small>
                            <?php if (!empty($data->member_image)) : ?>
                                <div class="xuAvatarWrap">
                                    <img class="xuAvatar" src="<?= base_url("uploads/membership/var/") . $data->member_image ?>" alt="Avatar" title="Foto anggota saat ini">
                                </div>
                                <div class="xuAvatarLbl">
                                    <i class="fa fa-info-circle"></i> Foto anggota saat ini
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="memberPasswd" class="control-label">New Password</label>
                            <input type="password" name="mPasswd" id="memberPasswd" class="form-control" placeholder="Kosongkan jika tidak diubah">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="memberEmail" class="control-label">E-mail*</label>
                            <input type="email" name="member_email" id="memberEmail" class="form-control" maxlength="256" required value="<?= $data->member_email ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="memberPasswd2" class="control-label">Confirmation New Password</label>
                            <input type="password" name="memberPasswd2" id="memberPasswd2" class="form-control" onkeyup="validatePassword()" placeholder="Kosongkan jika tidak diubah">
                            <small id="passwordFeedback"></small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Suspend Membership</label>
                            <label class="xuCheck"><input type="checkbox" name="is_pending[]" value="1" <?= $data->is_pending == 1 ? 'checked' : '' ?>> Yes, suspend this membership</label>
                        </div>
                    </div>
                </div>

                <div class="xuActions">
                    <a href="<?= base_url('membership') ?>" class="xuCancel"><i class="fa fa-times"></i> Cancel</a>
                    <input type="submit" class="xuSave" value="Update Member" onclick="return validateForm()">
                </div>
            </form>
            <script>
                function validatePassword() {
                    var password = document.getElementById("memberPasswd").value;
                    var confirmPassword = document.getElementById("memberPasswd2").value;
                    var feedback = document.getElementById("passwordFeedback");
                    feedback.className = '';

                    if (password || confirmPassword) {
                        if (password !== confirmPassword) {
                            feedback.textContent = "⚠ Passwords do not match!";
                            feedback.className = 'err';
                            return false;
                        } else if (password && confirmPassword) {
                            feedback.textContent = "✓ Passwords match";
                            feedback.className = 'ok';
                            return true;
                        }
                    }
                    feedback.textContent = "";
                    feedback.className = '';
                    return true;
                }

                function validateForm() {
                    return validatePassword();
                }

                document.addEventListener('DOMContentLoaded',function(){
                    // ===== Fade-in reveal =====
                    var io=new IntersectionObserver(function(es){
                        es.forEach(function(en){
                            if(en.isIntersecting){
                                en.target.classList.add('in');
                                io.unobserve(en.target);
                            }
                        });
                    },{threshold:.06});
                    document.querySelectorAll('.xuR').forEach(function(el){io.observe(el);});

                    // ===== File input custom wrapper =====
                    document.querySelectorAll('input[type=file]').forEach(function(inp){
                        if(inp.classList.contains('xuFileInput')) return;
                        inp.classList.add('xuFileInput');
                        var wrap=document.createElement('div');
                        wrap.className='xuFileWrap';
                        var btn=document.createElement('label');
                        btn.className='xuFileBtn';
                        btn.innerHTML='<i class="fa fa-cloud-upload"></i> Choose File';
                        btn.setAttribute('for',inp.id||('xufile_'+Math.random().toString(36).substr(2,9)));
                        if(!inp.id) inp.id=btn.getAttribute('for');
                        var name=document.createElement('span');
                        name.className='xuFileName';
                        name.textContent='No file chosen';
                        inp.parentNode.insertBefore(wrap,inp);
                        wrap.appendChild(btn);
                        wrap.appendChild(name);
                        wrap.appendChild(inp);
                        inp.addEventListener('change',function(){
                            if(inp.files&&inp.files.length>0){
                                var n=inp.files[0].name;
                                name.textContent=n.length>28?n.substr(0,25)+'...':n;
                                name.classList.add('has-file');
                            }else{
                                name.textContent='No file chosen';
                                name.classList.remove('has-file');
                            }
                        });
                    });
                });
            </script>
        </div>
    </div>
</div>