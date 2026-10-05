<style>
/* ================================================================
   DIFOSS USER PROFILE — EMERALD FOREST EDITION
   ================================================================ */
:root{
    --xp-emerald:#059669; --xp-teal:#0891b2; --xp-gold:#f59e0b;
    --xp-mint:#6ee7b7; --xp-deep:#0a2920; --xp-mid:#064e3b;
    --xp-ink:#0f172a; --xp-muted:#64748b; --xp-soft:#94a3b8;
}

/* ===== Panel utama ===== */
.xuProfilePanel{
    background:#fff;border:none;border-radius:24px;
    overflow:hidden;
    box-shadow:0 20px 50px rgba(15,23,42,.08);
    border:1px solid rgba(5,150,105,.1);
}
html.xu-dark .xuProfilePanel{background:#0f1e1f;border-color:rgba(5,150,105,.2)}

.xuProfileHead{
    padding:24px 32px;
    background:linear-gradient(135deg,var(--xp-emerald),var(--xp-teal));
    color:#fff;position:relative;overflow:hidden;
}
.xuProfileHead::after{
    content:'';position:absolute;top:-60%;right:-10%;
    width:320px;height:320px;border-radius:50%;
    background:radial-gradient(circle,rgba(245,158,11,.25),transparent 70%);
    pointer-events:none;
}
.xuProfileHead h2{
    margin:0;font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1.5rem;
    display:flex;align-items:center;gap:12px;
    position:relative;z-index:2;
}
.xuProfileHead h2 i{
    width:44px;height:44px;border-radius:13px;
    background:rgba(255,255,255,.18);
    backdrop-filter:blur(8px);-webkit-backdrop-filter:blur(8px);
    display:inline-flex;align-items:center;justify-content:center;
    font-size:1.15rem;
    box-shadow:inset 0 1px 0 rgba(255,255,255,.2);
}

/* ===== Profile Left Column ===== */
.profile_left{padding:30px}

.profile_img{
    position:relative;margin-bottom:20px;
    text-align:center;
}
.avatar-view{
    width:140px;height:140px;
    border-radius:50%;
    object-fit:cover;
    border:4px solid var(--xp-emerald);
    box-shadow:0 14px 34px rgba(5,150,105,.25);
    position:relative;z-index:2;
    transition:.3s;
}
.avatar-view:hover{
    transform:scale(1.05);
    box-shadow:0 18px 42px rgba(5,150,105,.35);
}

/* Ring berdenyut di sekitar avatar */
.profile_img::before{
    content:'';position:absolute;
    top:50%;left:50%;transform:translate(-50%,-50%);
    width:160px;height:160px;border-radius:50%;
    border:2px dashed rgba(5,150,105,.4);
    animation:xuAvatarSpin 20s linear infinite;
    z-index:1;
}
.profile_img::after{
    content:'';position:absolute;
    top:50%;left:50%;transform:translate(-50%,-50%);
    width:180px;height:180px;border-radius:50%;
    border:1px solid rgba(245,158,11,.25);
    animation:xuAvatarSpin 28s linear infinite reverse;
    z-index:1;
}
@keyframes xuAvatarSpin{to{transform:translate(-50%,-50%) rotate(360deg)}}

/* Nama & info user */
.profile_left h3{
    font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1.4rem;
    color:var(--xp-ink);text-align:center;
    margin:22px 0 6px;
    background:linear-gradient(90deg,var(--xp-ink),var(--xp-emerald),var(--xp-gold));
    background-size:200% 100%;
    -webkit-background-clip:text;background-clip:text;
    -webkit-text-fill-color:transparent;
    animation:xuProfileGrad 6s linear infinite;
}
html.xu-dark .profile_left h3{
    background:linear-gradient(90deg,#f1f5f9,var(--xp-mint),var(--xp-gold));
    -webkit-background-clip:text;background-clip:text;
    -webkit-text-fill-color:transparent;
}
@keyframes xuProfileGrad{to{background-position:200% 0}}

/* Tipe user badge */
.xuUserBadge{
    display:flex;align-items:center;justify-content:center;gap:7px;
    padding:6px 16px;border-radius:999px;
    background:linear-gradient(90deg,rgba(5,150,105,.12),rgba(245,158,11,.08));
    color:var(--xp-emerald);
    font-weight:800;font-size:.75rem;
    letter-spacing:.05em;text-transform:uppercase;
    margin:0 auto 22px;width:fit-content;
    border:1px solid rgba(5,150,105,.2);
}
html.xu-dark .xuUserBadge{background:linear-gradient(90deg,rgba(5,150,105,.18),rgba(245,158,11,.12));color:var(--xp-mint);border-color:rgba(5,150,105,.3)}

/* List user data */
.user_data{list-style:none;padding:0;margin:0 0 22px}
.user_data li{
    padding:10px 14px;margin-bottom:6px;
    background:#f8fafc;border-radius:10px;
    color:var(--xp-ink);font-size:.88rem;
    border:1px solid #e2e8f0;
    transition:.25s;
}
.user_data li:hover{
    border-color:rgba(5,150,105,.3);
    background:#fff;
    transform:translateX(4px);
}
html.xu-dark .user_data li{background:rgba(5,150,105,.06);border-color:rgba(5,150,105,.15);color:#e2e8f0}
html.xu-dark .user_data li:hover{background:rgba(5,150,105,.12);border-color:rgba(5,150,105,.3)}

.user_data li b{
    color:var(--xp-emerald);font-weight:800;
    display:inline-block;min-width:120px;
    text-transform:uppercase;letter-spacing:.04em;
    font-size:.72rem;
}
html.xu-dark .user_data li b{color:var(--xp-gold)}

/* Social media icons */
.xuSocialWrap{
    text-align:center;padding:16px;
    background:linear-gradient(135deg,rgba(5,150,105,.06),rgba(8,145,178,.04));
    border-radius:14px;margin-bottom:22px;
    border:1px solid rgba(5,150,105,.12);
}
html.xu-dark .xuSocialWrap{background:linear-gradient(135deg,rgba(5,150,105,.12),rgba(8,145,178,.08));border-color:rgba(5,150,105,.2)}

.xuSocialLabel{
    font-size:.68rem;font-weight:800;
    text-transform:uppercase;letter-spacing:.12em;
    color:var(--xp-muted);margin-bottom:12px;
    display:flex;align-items:center;justify-content:center;gap:6px;
}
html.xu-dark .xuSocialLabel{color:var(--xp-soft)}

.xuSocialIcons{display:flex;flex-wrap:wrap;justify-content:center;gap:8px}
.xuSocialIco{
    width:40px;height:40px;border-radius:10px;
    display:inline-flex;align-items:center;justify-content:center;
    color:#fff;text-decoration:none;
    font-size:1.1rem;transition:.25s;
    box-shadow:0 4px 12px rgba(0,0,0,.1);
}
.xuSocialIco:hover{
    transform:translateY(-3px) scale(1.1);
    box-shadow:0 10px 24px rgba(0,0,0,.2);
}

/* Tombol Edit Profile */
.xuEditBtn{
    width:100%;padding:12px 20px;
    border:none;border-radius:13px;
    background:linear-gradient(90deg,var(--xp-emerald),var(--xp-gold));
    color:#fff;font-weight:800;font-size:.9rem;
    letter-spacing:.04em;text-transform:uppercase;
    cursor:pointer;transition:.3s;
    box-shadow:0 10px 26px rgba(5,150,105,.35);
    display:inline-flex;align-items:center;justify-content:center;gap:9px;
    position:relative;overflow:hidden;
    margin-bottom:26px;
}
.xuEditBtn::before{
    content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;
    background:linear-gradient(100deg,transparent 20%,rgba(255,255,255,.3) 50%,transparent 80%);
    transition:left .6s ease;
}
.xuEditBtn:hover{transform:translateY(-2px);filter:brightness(1.1);box-shadow:0 14px 34px rgba(5,150,105,.45)}
.xuEditBtn:hover::before{left:120%}

/* Informasi section */
.xuInfoTitle{
    font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1.05rem;
    color:var(--xp-ink);margin:0 0 14px;
    display:flex;align-items:center;gap:9px;
    padding-bottom:10px;
    border-bottom:2px solid rgba(5,150,105,.15);
}
html.xu-dark .xuInfoTitle{color:#f1f5f9}
.xuInfoTitle i{
    width:28px;height:28px;border-radius:8px;
    background:linear-gradient(135deg,var(--xp-emerald),var(--xp-gold));
    color:#fff;display:inline-flex;align-items:center;justify-content:center;
    font-size:.8rem;
}

.xuInfoList{list-style:none;padding:0;margin:0}
.xuInfoList li{
    display:flex;align-items:center;gap:10px;
    padding:10px 14px;margin-bottom:6px;
    background:rgba(5,150,105,.04);
    border-radius:10px;
    border-left:3px solid var(--xp-emerald);
    transition:.25s;
}
.xuInfoList li:hover{
    background:rgba(5,150,105,.08);
    transform:translateX(4px);
}
html.xu-dark .xuInfoList li{background:rgba(5,150,105,.08);border-left-color:var(--xp-gold)}
html.xu-dark .xuInfoList li:hover{background:rgba(5,150,105,.14)}

.xuInfoList li b{
    color:var(--xp-emerald);font-weight:800;
    font-size:.7rem;letter-spacing:.06em;
    text-transform:uppercase;min-width:100px;
}
html.xu-dark .xuInfoList li b{color:var(--xp-gold)}
.xuInfoList li span{color:var(--xp-muted);font-size:.82rem;flex:1}
html.xu-dark .xuInfoList li span{color:#cbd5e1}
.xuInfoList li i{color:var(--xp-emerald);font-size:.85rem}
html.xu-dark .xuInfoList li i{color:var(--xp-mint)}

/* ===== MODAL ULTIMATE EMERALD ===== */
.ult-modal .modal-dialog{max-width:720px}
.ult-modal-content{
    background:#fff;border:none;border-radius:22px;
    overflow:hidden;
    box-shadow:0 40px 100px rgba(0,0,0,.35);
    border:1px solid rgba(5,150,105,.15);
}
html.xu-dark .ult-modal-content{background:#0f1e1f;border-color:rgba(5,150,105,.25)}

.ult-modal-header{
    padding:22px 28px;
    background:linear-gradient(135deg,var(--xp-emerald),var(--xp-teal));
    color:#fff;border:none;
    display:flex;align-items:center;justify-content:space-between;
    position:relative;overflow:hidden;
}
.ult-modal-header::after{
    content:'';position:absolute;top:-50%;right:-8%;
    width:240px;height:240px;border-radius:50%;
    background:radial-gradient(circle,rgba(245,158,11,.3),transparent 70%);
    pointer-events:none;
}
.ult-modal-header .modal-title{
    margin:0;font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1.3rem;
    display:flex;align-items:center;gap:10px;
    position:relative;z-index:2;
}
.ult-modal-header .close{
    width:34px;height:34px;border-radius:10px;
    background:rgba(255,255,255,.15);
    backdrop-filter:blur(8px);
    border:1px solid rgba(255,255,255,.25);
    color:#fff;opacity:1;
    display:flex;align-items:center;justify-content:center;
    transition:.25s;position:relative;z-index:2;
    margin:0;padding:0;
}
.ult-modal-header .close:hover{background:rgba(255,255,255,.28);transform:rotate(90deg)}
.ult-modal-header .close span{font-size:1.4rem;line-height:1;margin-top:-2px}

.ult-modal-body{padding:28px}

/* Alert warning */
.ult-alert-warning{
    padding:12px 16px;border-radius:12px;
    background:rgba(245,158,11,.1);
    border:1px solid rgba(245,158,11,.3);
    color:#92400e;font-size:.85rem;font-weight:600;
    margin-bottom:22px;
    display:flex;align-items:center;gap:10px;
}
html.xu-dark .ult-alert-warning{background:rgba(245,158,11,.12);color:#fde68a;border-color:rgba(245,158,11,.35)}
.ult-alert-warning i{color:var(--xp-gold);font-size:1.1rem}

/* Section divider & title */
.ult-divider{
    border:none;height:1px;
    background:linear-gradient(90deg,transparent,rgba(5,150,105,.25),transparent);
    margin:22px 0;
}
.ult-section-title{
    font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1.05rem;
    color:var(--xp-ink);margin:0 0 18px;
    display:flex;align-items:center;gap:9px;
}
html.xu-dark .ult-section-title{color:#f1f5f9}
.ult-section-title i{
    width:30px;height:30px;border-radius:9px;
    background:linear-gradient(135deg,var(--xp-emerald),var(--xp-gold));
    color:#fff;display:inline-flex;align-items:center;justify-content:center;
    font-size:.85rem;
}

/* Form groups */
.ult-modal-body .form-group{margin-bottom:16px}
.ult-modal-body label{
    font-weight:700;font-size:.72rem;
    text-transform:uppercase;letter-spacing:.08em;
    color:var(--xp-ink);margin-bottom:6px;
    display:block;
}
html.xu-dark .ult-modal-body label{color:#e2e8f0}
.ult-modal-body label .text-danger{color:var(--xp-gold)}

.ult-modal-body .form-control{
    padding:11px 14px;
    border:1.5px solid #e2e8f0;
    border-radius:11px;
    font-size:.9rem;color:var(--xp-ink);
    background:#fff;transition:.25s;
}
html.xu-dark .ult-modal-body .form-control{background:rgba(255,255,255,.06);border-color:rgba(5,150,105,.2);color:#f1f5f9}
.ult-modal-body .form-control:focus{
    border-color:var(--xp-emerald);
    box-shadow:0 0 0 4px rgba(5,150,105,.12);
    background:#fff;
}
html.xu-dark .ult-modal-body .form-control:focus{background:rgba(255,255,255,.08);border-color:var(--xp-gold);box-shadow:0 0 0 4px rgba(245,158,11,.15)}

/* Input group (media sosial) */
.ult-modal-body .input-group{display:flex}
.ult-modal-body .input-group-prepend .input-group-text{
    padding:0 14px;
    background:linear-gradient(135deg,rgba(5,150,105,.08),rgba(8,145,178,.06));
    border:1.5px solid #e2e8f0;border-right:none;
    border-radius:11px 0 0 11px;
    color:var(--xp-emerald);
    font-size:.95rem;
}
html.xu-dark .ult-modal-body .input-group-prepend .input-group-text{background:rgba(5,150,105,.12);border-color:rgba(5,150,105,.2);color:var(--xp-mint)}

.ult-modal-body .input-group .form-control{
    border-radius:0 11px 11px 0;
    flex:1;
}

/* Validation text */
.ult-modal-body .text-danger{
    font-size:.78rem;font-weight:600;
    margin-top:4px;display:block;
    color:#dc2626;
}

/* Modal footer */
.ult-modal-footer{
    padding:18px 28px;
    background:#f8fafc;
    border-top:1px solid rgba(5,150,105,.1);
    display:flex;justify-content:flex-end;gap:10px;
}
html.xu-dark .ult-modal-footer{background:rgba(5,150,105,.05);border-top-color:rgba(5,150,105,.15)}

.ult-modal-footer .btn{
    padding:10px 22px;border-radius:11px;
    font-weight:700;font-size:.85rem;
    transition:.25s;
    display:inline-flex;align-items:center;gap:7px;
}
.ult-modal-footer .btn-secondary{
    background:#fff;color:var(--xp-muted);
    border:1.5px solid #e2e8f0;
}
html.xu-dark .ult-modal-footer .btn-secondary{background:rgba(255,255,255,.05);color:#cbd5e1;border-color:rgba(5,150,105,.2)}
.ult-modal-footer .btn-secondary:hover{background:#f1f5f9;border-color:#cbd5e1}
html.xu-dark .ult-modal-footer .btn-secondary:hover{background:rgba(255,255,255,.08)}

.ult-modal-footer .btn-primary{
    background:linear-gradient(90deg,var(--xp-emerald),var(--xp-gold));
    color:#fff;border:none;
    box-shadow:0 8px 20px rgba(5,150,105,.3);
    position:relative;overflow:hidden;
}
.ult-modal-footer .btn-primary::before{
    content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;
    background:linear-gradient(100deg,transparent 20%,rgba(255,255,255,.3) 50%,transparent 80%);
    transition:left .6s ease;
}
.ult-modal-footer .btn-primary:hover{
    transform:translateY(-2px);
    box-shadow:0 12px 28px rgba(5,150,105,.4);
    filter:brightness(1.1);
}
.ult-modal-footer .btn-primary:hover::before{left:120%}

/* ===== Responsive ===== */
@media(max-width:768px){
    .profile_left{padding:22px 18px}
    .avatar-view{width:110px;height:110px}
    .profile_img::before{width:130px;height:130px}
    .profile_img::after{width:150px;height:150px}
    .ult-modal-body{padding:22px 18px}
    .ult-modal-footer{padding:16px 18px}
}
</style>

<div class="x_panel xuProfilePanel">
    <div class="xuProfileHead">
        <h2><i class="fa fa-user-circle"></i> User Profile</h2>
    </div>
    <div class="x_content">
        <div class="row">
            <div class="col-md-12">
                <div class="row">

                    <!-- KOLOM KIRI: PROFIL -->
                    <div class="col-md-4 col-sm-12 profile_left">

                        <!-- Avatar dengan ring berdenyut -->
                        <div class="profile_img">
                            <div id="crop-avatar" class="text-center">
                                <img class="img-responsive avatar-view img-cover"
                                     src="<?= base_url('uploads/images/persons/' . ($data->user_image ?: 'default.png')) ?>"
                                     alt="Avatar" title="Change the avatar">
                            </div>
                        </div>

                        <h3><?= esc($data->realname) ?></h3>

                        <!-- Badge tipe user -->
                        <div class="xuUserBadge">
                            <i class="fa fa-id-badge"></i> <?= getTypeUser($data->user_type) ?>
                        </div>

                        <!-- User data -->
                        <ul class="list-unstyled user_data">
                            <li><b>Username</b> <?= esc($data->username) ?></li>
                            <li><b>Email</b> <?= esc($data->email) ?></li>
                        </ul>

                        <!-- Social media -->
                        <?php
                        if (is_array($data->social_media)) {
                            $sm = $data->social_media;
                        } else {
                            $tmp = @unserialize($data->social_media);
                            $sm = is_array($tmp) ? $tmp : [];
                        }
                        $hasSocial = !empty(array_filter($sm));
                        ?>
                        <?php if ($hasSocial): ?>
                        <div class="xuSocialWrap">
                            <div class="xuSocialLabel"><i class="fa fa-share-alt"></i> Media Sosial</div>
                            <div class="xuSocialIcons">
                                <?php if (!empty($sm['fb'])): ?><a class="xuSocialIco" style="background:#1877f2" href="https://facebook.com/<?= esc($sm['fb']) ?>" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a><?php endif; ?>
                                <?php if (!empty($sm['tw'])): ?><a class="xuSocialIco" style="background:#1da1f2" href="https://x.com/<?= esc($sm['tw']) ?>" target="_blank" title="Twitter / X"><i class="fa fa-twitter"></i></a><?php endif; ?>
                                <?php if (!empty($sm['li'])): ?><a class="xuSocialIco" style="background:#0077b5" href="https://linkedin.com/in/<?= esc($sm['li']) ?>" target="_blank" title="LinkedIn"><i class="fa fa-linkedin"></i></a><?php endif; ?>
                                <?php if (!empty($sm['rd'])): ?><a class="xuSocialIco" style="background:#ff4500" href="https://reddit.com/user/<?= esc($sm['rd']) ?>" target="_blank" title="Reddit"><i class="fa fa-reddit"></i></a><?php endif; ?>
                                <?php if (!empty($sm['pn'])): ?><a class="xuSocialIco" style="background:#e60023" href="https://pinterest.com/<?= esc($sm['pn']) ?>" target="_blank" title="Pinterest"><i class="fa fa-pinterest"></i></a><?php endif; ?>
                                <?php if (!empty($sm['gp'])): ?><a class="xuSocialIco" style="background:#db4437" href="https://plus.google.com/<?= esc($sm['gp']) ?>" target="_blank" title="Google+"><i class="fa fa-google-plus"></i></a><?php endif; ?>
                                <?php if (!empty($sm['yt'])): ?><a class="xuSocialIco" style="background:#ff0000" href="https://youtube.com/<?= esc($sm['yt']) ?>" target="_blank" title="YouTube"><i class="fa fa-youtube-play"></i></a><?php endif; ?>
                                <?php if (!empty($sm['bl'])): ?><a class="xuSocialIco" style="background:linear-gradient(135deg,#059669,#0891b2)" href="<?= esc($sm['bl']) ?>" target="_blank" title="Blog / Website"><i class="fa fa-pencil"></i></a><?php endif; ?>
                                <?php if (!empty($sm['ym'])): ?><a class="xuSocialIco" style="background:#7b0099" href="https://yahoo.com/<?= esc($sm['ym']) ?>" target="_blank" title="Yahoo"><i class="fa fa-yahoo"></i></a><?php endif; ?>
                            </div>
                        </div>
                        <?php endif; ?>

                        <!-- Tombol Edit Profile -->
                        <button type="button"
                                class="xuEditBtn"
                                onclick='showModal(<?= htmlspecialchars(json_encode($data), ENT_QUOTES, "UTF-8") ?>)'>
                            <i class="fa fa-edit"></i> Edit Profile
                        </button>

                        <!-- Informasi tanggal -->
                        <h4 class="xuInfoTitle"><i class="fa fa-clock-o"></i> Informasi Akun</h4>
                        <ul class="list-unstyled xuInfoList">
                            <li>
                                <i class="fa fa-user-plus"></i>
                                <b>Registered</b>
                                <span><?= $data->input_date ?></span>
                            </li>
                            <li>
                                <i class="fa fa-refresh"></i>
                                <b>Last Update</b>
                                <span><?= $data->last_update ?: '—' ?></span>
                            </li>
                            <li>
                                <i class="fa fa-sign-in"></i>
                                <b>Last Login</b>
                                <span><?= $data->last_login ?: '—' ?></span>
                            </li>
                        </ul>
                    </div>

                    <!-- KOLOM KANAN: Konten tambahan (opsional) -->
                    <div class="col-md-8 col-sm-12" style="padding:30px">
                        <div style="padding:40px 28px;text-align:center;background:linear-gradient(135deg,rgba(5,150,105,.04),rgba(245,158,11,.04));border-radius:18px;border:1px dashed rgba(5,150,105,.2);min-height:400px;display:flex;flex-direction:column;align-items:center;justify-content:center">
                            <div style="width:80px;height:80px;border-radius:22px;background:linear-gradient(135deg,var(--xp-emerald),var(--xp-gold));display:flex;align-items:center;justify-content:center;margin:0 auto 18px;box-shadow:0 14px 30px rgba(5,150,105,.3)">
                                <i class="fa fa-user-circle" style="font-size:2.2rem;color:#fff"></i>
                            </div>
                            <h3 style="font-family:'Neuton',Georgia,serif;font-weight:700;color:var(--xp-ink);margin:0 0 8px">Selamat Datang, <?= esc(explode(' ', $data->realname)[0]) ?>!</h3>
                            <p style="color:var(--xp-muted);max-width:420px;margin:0 auto 20px;line-height:1.6">Anda login sebagai <b style="color:var(--xp-emerald)"><?= getTypeUser($data->user_type) ?></b>. Kelola profil Anda dengan menekan tombol Edit Profile di sebelah kiri.</p>
                            <div style="display:flex;gap:14px;flex-wrap:wrap;justify-content:center">
                                <div style="padding:14px 20px;background:#fff;border-radius:14px;border:1px solid rgba(5,150,105,.15);min-width:140px;box-shadow:0 4px 12px rgba(5,150,105,.08)">
                                    <div style="font-size:.68rem;color:var(--xp-muted);text-transform:uppercase;letter-spacing:.08em;font-weight:700;margin-bottom:4px">Tipe Akun</div>
                                    <div style="font-weight:800;color:var(--xp-emerald);font-size:.95rem"><?= getTypeUser($data->user_type) ?></div>
                                </div>
                                <div style="padding:14px 20px;background:#fff;border-radius:14px;border:1px solid rgba(5,150,105,.15);min-width:140px;box-shadow:0 4px 12px rgba(5,150,105,.08)">
                                    <div style="font-size:.68rem;color:var(--xp-muted);text-transform:uppercase;letter-spacing:.08em;font-weight:700;margin-bottom:4px">Status</div>
                                    <div style="font-weight:800;color:var(--xp-emerald);font-size:.95rem"><i class="fa fa-circle" style="color:#10b981;font-size:.5rem;vertical-align:middle"></i> Aktif</div>
                                </div>
                                <div style="padding:14px 20px;background:#fff;border-radius:14px;border:1px solid rgba(5,150,105,.15);min-width:140px;box-shadow:0 4px 12px rgba(5,150,105,.08)">
                                    <div style="font-size:.68rem;color:var(--xp-muted);text-transform:uppercase;letter-spacing:.08em;font-weight:700;margin-bottom:4px">Media Sosial</div>
                                    <div style="font-weight:800;color:var(--xp-emerald);font-size:.95rem"><?= count(array_filter($sm)) ?> Akun</div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- ============ MODAL EDIT PROFILE ============ -->
<div id="modal_action" class="modal fade ult-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ult-modal-content">
            <form action="<?= base_url('profile/save') ?>" method="post" id="profileForm">
                <?= csrf_field() ?>
                <input type="hidden" name="user_id" id="user_id" value="<?= esc($data->user_id) ?>">

                <div class="modal-header ult-modal-header">
                    <h4 class="modal-title"><i class="fa fa-user-circle"></i> Edit Profile</h4>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body ult-modal-body">
                    <div class="alert ult-alert-warning" role="alert">
                        <i class="fa fa-info-circle"></i>
                        Kosongkan kolom <b>Password</b> jika Anda tidak ingin mengubah kata sandi.
                    </div>

                    <h6 class="ult-section-title"><i class="fa fa-user"></i> Informasi Dasar</h6>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="username">Username <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="username" id="username" maxlength="50" required>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="realname">Full Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="realname" id="realname" maxlength="100" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" name="email" id="email" maxlength="200" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user_type">Tipe Keanggotaan <span class="text-danger">*</span></label>
                                <select name="user_type" id="user_type" class="form-control" required>
                                    <option value="1">Pustakawan</option>
                                    <option value="2">Pustakawan</option>
                                    <option value="3">Staff Perpustakaan</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <hr class="ult-divider">
                    <h6 class="ult-section-title"><i class="fa fa-share-alt"></i> Media Sosial</h6>

                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Facebook</label>
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-facebook"></i></span></div>
                                <input type="text" class="form-control" id="inputFacebook" name="social[fb]" placeholder="username">
                            </div>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Twitter / X</label>
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-twitter"></i></span></div>
                                <input type="text" class="form-control" id="inputTwitter" name="social[tw]" placeholder="username">
                            </div>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>LinkedIn</label>
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-linkedin"></i></span></div>
                                <input type="text" class="form-control" id="inputLinkedIn" name="social[li]" placeholder="username">
                            </div>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Reddit</label>
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-reddit"></i></span></div>
                                <input type="text" class="form-control" id="inputReddit" name="social[rd]" placeholder="username">
                            </div>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>YouTube</label>
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-youtube"></i></span></div>
                                <input type="text" class="form-control" id="inputYouTube" name="social[yt]" placeholder="channel">
                            </div>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Blog / Website</label>
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-pencil"></i></span></div>
                                <input type="url" class="form-control" id="inputBlog" name="social[bl]" placeholder="https://...">
                            </div>
                        </div>
                    </div>

                    <hr class="ult-divider">
                    <h6 class="ult-section-title"><i class="fa fa-lock"></i> Ubah Kata Sandi (Opsional)</h6>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="passwd1">Password Baru</label>
                            <input type="password" id="passwd1" name="passwd1" class="form-control" onkeyup="confirm_pass()">
                            <small id="validation_pass" class="text-danger"></small>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="passwd2">Konfirmasi Password</label>
                            <input type="password" id="passwd2" name="passwd2" class="form-control" onkeyup="confirm_pass()">
                            <small id="validation_confirm_pass" class="text-danger"></small>
                        </div>
                    </div>
                </div>

                <div class="modal-footer ult-modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fa fa-times"></i> Batal
                    </button>
                    <button type="submit" id="save_button" class="btn btn-primary">
                        <i class="fa fa-save"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ============ JAVASCRIPT ============ -->
<script>
    function showModal(data) {
        // Handle data social_media yang mungkin ter-serialize
        let sm = data.social_media;
        if (typeof sm === 'string') {
            try { sm = JSON.parse(sm); } catch (e) { sm = {}; }
        }
        if (!sm || typeof sm !== 'object') sm = {};

        // Isi form dengan data pengguna
        $('#user_id').val(data.user_id || '');
        $('#username').val(data.username || '');
        $('#realname').val(data.realname || '');
        $('#email').val(data.email || '');
        $('#user_type').val(data.user_type || '1');

        // Isi media sosial
        $('#inputFacebook').val(sm.fb || '');
        $('#inputTwitter').val(sm.tw || '');
        $('#inputLinkedIn').val(sm.li || '');
        $('#inputReddit').val(sm.rd || '');
        $('#inputPinterest').val(sm.pn || '');
        $('#inputGooglePlus').val(sm.gp || '');
        $('#inputYouTube').val(sm.yt || '');
        $('#inputBlog').val(sm.bl || '');
        $('#inputYahooMessenger').val(sm.ym || '');

        // Kosongkan password fields
        $('#passwd1').val('');
        $('#passwd2').val('');
        $('#validation_pass').text('');
        $('#validation_confirm_pass').text('');

        $('#modal_action').modal('show');
    }

    function confirm_pass() {
        const p1 = $('#passwd1').val();
        const p2 = $('#passwd2').val();
        const v1 = $('#validation_pass');
        const v2 = $('#validation_confirm_pass');

        if (p1 && p1.length < 6) {
            v1.text('Password minimal 6 karakter');
        } else {
            v1.text('');
        }

        if (p2 && p1 !== p2) {
            v2.text('Password tidak cocok');
        } else {
            v2.text('');
        }
    }

    // Validasi sebelum submit
    $('#profileForm').on('submit', function(e) {
        const p1 = $('#passwd1').val();
        const p2 = $('#passwd2').val();

        if ((p1 || p2) && p1 !== p2) {
            e.preventDefault();
            $('#validation_confirm_pass').text('Password tidak cocok. Silakan periksa kembali.');
            $('#passwd2').focus();
            return false;
        }
    });
</script>