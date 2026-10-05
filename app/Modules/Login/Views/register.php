<?php
$settings = $settings ?? null;
$regOpen  = $settings ? (int)$settings->reg_open : 1;
$old = $old ?? [];
$errors = $errors ?? [];
?>
<style>
/* ================================================================
   DIFOSS DAFTAR ANGGOTA — EMERALD SOLID FORM (FINAL, TENANG)
   ================================================================ */
:root{
    --xr-emerald:#059669; --xr-teal:#0891b2; --xr-gold:#f59e0b;
    --xr-mint:#6ee7b7; --xr-deep:#0a2920; --xr-mid:#064e3b;
    --xr-err:#ef4444; --xr-ok:#10b981;
}

.xuRegWrap{
    max-width:1180px;width:100%;
    margin:40px auto;padding:0 22px;
    font-family:'Plus Jakarta Sans',system-ui,sans-serif;
    box-sizing:border-box;
}

/* ===== Kartu SOLID gelap + napas glow lembut ===== */
.xuRegCard{
    position:relative;
    background:linear-gradient(165deg,rgba(10,41,32,.97) 0%,rgba(6,78,59,.97) 100%);
    border:1px solid rgba(110,231,183,.22);
    border-radius:28px;overflow:hidden;
    box-shadow:0 30px 80px rgba(0,0,0,.45);
    animation:xuRegBreathe 7s ease-in-out infinite;
}
@keyframes xuRegBreathe{
    0%,100%{box-shadow:0 30px 80px rgba(0,0,0,.45),0 0 0 0 rgba(5,150,105,0)}
    50%{box-shadow:0 30px 80px rgba(0,0,0,.45),0 0 36px 2px rgba(5,150,105,.16)}
}

/* Garis aksen tipis di ATAS (bergerak pelan, tidak menyilaukan) */
.xuRegCard::before{
    content:"";position:absolute;top:0;left:0;right:0;height:3px;z-index:3;
    background:linear-gradient(90deg,var(--xr-emerald),var(--xr-gold),var(--xr-teal),var(--xr-emerald));
    background-size:200% 100%;
    animation:xuRegLine 9s linear infinite;
}
@keyframes xuRegLine{0%{background-position:0% 0}100%{background-position:200% 0}}

/* ===== HEADER kartu ===== */
.xuRegHead{
    padding:34px 40px;
    background:linear-gradient(135deg,rgba(5,150,105,.16) 0%,rgba(8,145,178,.10) 60%,transparent 100%);
    border-bottom:1px solid rgba(110,231,183,.14);
    color:#fff;position:relative;overflow:hidden;
}
.xuRegHead::after{
    content:"";position:absolute;top:-60%;right:-10%;
    width:380px;height:380px;border-radius:50%;
    background:radial-gradient(circle,rgba(245,158,11,.14),transparent 70%);
    filter:blur(70px);pointer-events:none;
}
.xuRegHead h2{
    margin:0;font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1.75rem;
    display:flex;align-items:center;gap:14px;
    position:relative;z-index:1;
    color:#fff;text-shadow:0 2px 12px rgba(0,0,0,.35);
}
.xuRegHead h2 i{
    width:52px;height:52px;border-radius:16px;
    background:linear-gradient(135deg,var(--xr-emerald),var(--xr-gold));
    display:inline-flex;align-items:center;justify-content:center;
    font-size:1.35rem;color:#fff;
    box-shadow:0 10px 26px rgba(5,150,105,.45);
    animation:xuRegBob 4s ease-in-out infinite;
}
@keyframes xuRegBob{0%,100%{transform:translateY(0)}50%{transform:translateY(-6px)}}
.xuRegHead p{
    margin:8px 0 0;color:var(--xr-mint);
    font-size:.88rem;position:relative;z-index:1;
    font-weight:500;
}

/* ===== BODY form (solid, tanpa bocor) ===== */
.xuRegBody{padding:40px 46px;background:transparent}

.xuRegGrid{
    display:grid;grid-template-columns:1fr 1fr;
    gap:20px 30px;align-items:stretch;
}
.xuRegGrid .full{grid-column:1/-1}

/* ===== Field ===== */
.xuRegField label{
    display:block;font-weight:800;
    font-size:.68rem;color:rgba(255,255,255,.78);
    letter-spacing:.12em;text-transform:uppercase;
    margin-bottom:8px;
}
.xuRegField .req{color:var(--xr-gold);margin-left:2px}

.xuRegField input,
.xuRegField select,
.xuRegField textarea{
    width:100%;
    padding:13px 16px;
    border:1.5px solid rgba(255,255,255,.16);
    border-radius:13px;
    font-size:.92rem;font-weight:500;
    background:rgba(255,255,255,.06);
    color:#fff;
    outline:none;
    transition:border-color .25s,box-shadow .25s,background .25s;
    box-sizing:border-box;
    min-height:48px;
}
.xuRegField textarea{min-height:86px;resize:vertical;padding:12px 16px}
.xuRegField input::placeholder,
.xuRegField textarea::placeholder{color:rgba(255,255,255,.38)}
.xuRegField select{
    appearance:none;-webkit-appearance:none;
    background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath fill='%23f59e0b' d='M6 8L0 0h12z'/%3E%3C/svg%3E");
    background-repeat:no-repeat;background-position:right 16px center;
    padding-right:40px;
}
.xuRegField select option{background:#064e3b;color:#fff}

.xuRegField input:focus,
.xuRegField select:focus,
.xuRegField textarea:focus{
    border-color:rgba(251,191,36,.55);
    background:rgba(255,255,255,.10);
    box-shadow:0 0 0 4px rgba(245,158,11,.12);
}

/* Hint validasi */
.xuRegHint{
    font-size:.72rem;margin-top:6px;font-weight:700;
    letter-spacing:.02em;min-height:1em;
}
.xuRegHint.ok{color:var(--xr-mint)}
.xuRegHint.bad{color:#fca5a5}
.xuRegHint[style]{color:rgba(255,255,255,.55)!important}

/* ===== Foto dengan preview ===== */
.xuFotoBox{
    display:flex;gap:18px;align-items:flex-start;
    padding:16px;border-radius:16px;
    background:rgba(255,255,255,.04);
    border:1px dashed rgba(255,255,255,.18);
}
.xuFotoPrev{
    width:118px;height:148px;
    border-radius:14px;
    border:2px dashed rgba(110,231,183,.4);
    background:rgba(255,255,255,.06);
    display:flex;align-items:center;justify-content:center;
    color:rgba(255,255,255,.4);font-size:2.4rem;
    overflow:hidden;flex-shrink:0;
    transition:.3s;
}
.xuFotoPrev.has-img{border-style:solid;border-color:var(--xr-mint)}
.xuFotoPrev img{width:100%;height:100%;object-fit:cover}
.xuFotoInfo{flex:1}
.xuFotoInfo input[type=file]{
    padding:10px 14px!important;
    font-size:.82rem!important;
    min-height:auto!important;
    cursor:pointer;
}
.xuFotoInfo input[type=file]::file-selector-button{
    background:linear-gradient(90deg,var(--xr-emerald),var(--xr-teal));
    color:#fff;border:none;padding:8px 16px;
    border-radius:9px;font-weight:700;font-size:.76rem;
    cursor:pointer;margin-right:12px;
    transition:.25s;
}
.xuFotoInfo input[type=file]::file-selector-button:hover{filter:brightness(1.15)}

.xuFotoBadge{
    display:inline-flex;align-items:center;gap:7px;
    padding:7px 14px;border-radius:999px;
    font-size:.72rem;font-weight:800;
    letter-spacing:.04em;margin-top:10px;
}
.xuFotoBadge.ok{background:rgba(16,185,129,.15);color:var(--xr-mint);border:1px solid rgba(16,185,129,.35)}
.xuFotoBadge.bad{background:rgba(239,68,68,.15);color:#fca5a5;border:1px solid rgba(239,68,68,.35)}
.xuFotoBadge.wait{background:rgba(255,255,255,.08);color:rgba(255,255,255,.7);border:1px solid rgba(255,255,255,.15)}

/* ===== Error box ===== */
.xuRegErr{
    background:rgba(239,68,68,.12);
    border:1.5px solid rgba(239,68,68,.4);
    border-radius:14px;padding:14px 18px;
    margin-bottom:20px;color:#fca5a5;
    font-size:.84rem;font-weight:600;
    animation:xuRegShake .4s ease;
}
@keyframes xuRegShake{0%,100%{transform:translateX(0)}25%{transform:translateX(-5px)}75%{transform:translateX(5px)}}
.xuRegErr ul{margin:0;padding-left:20px}
.xuRegErr li{margin:4px 0}

/* ===== Tombol submit ===== */
.xuRegSubmit{
    width:100%;padding:16px;
    border:none;border-radius:14px;
    background:linear-gradient(90deg,var(--xr-emerald),var(--xr-gold));
    color:#fff;font-weight:800;font-size:1rem;
    letter-spacing:.05em;text-transform:uppercase;
    cursor:pointer;transition:.3s;
    box-shadow:0 14px 34px rgba(5,150,105,.4);
    margin-top:16px;
    position:relative;overflow:hidden;
    display:inline-flex;align-items:center;justify-content:center;gap:10px;
    min-height:54px;
}
.xuRegSubmit::before{
    content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;
    background:linear-gradient(100deg,transparent 20%,rgba(255,255,255,.28) 50%,transparent 80%);
    transition:left .65s ease;
}
.xuRegSubmit:hover:not(:disabled){
    transform:translateY(-2px);
    filter:brightness(1.1);
    box-shadow:0 20px 44px rgba(5,150,105,.55);
}
.xuRegSubmit:hover:not(:disabled)::before{left:120%}
.xuRegSubmit:disabled{opacity:.5;cursor:not-allowed}

/* ===== Footer + pendaftaran ditutup ===== */
.xuRegFoot{
    text-align:center;margin-top:22px;
    font-size:.85rem;color:rgba(255,255,255,.6);
}
.xuRegFoot a{
    color:var(--xr-mint);font-weight:800;
    text-decoration:none;
    border-bottom:1px dashed rgba(110,231,183,.4);
    transition:.2s;
}
.xuRegFoot a:hover{color:var(--xr-gold);border-bottom-color:var(--xr-gold)}

.xuClosed{
    padding:50px 30px;text-align:center;
    color:var(--xr-gold);
    background:rgba(245,158,11,.08);
    border:1px solid rgba(245,158,11,.3);
    border-radius:16px;
}
.xuClosed i{font-size:2.4rem;margin-bottom:14px;display:block}
.xuClosed h3{margin:10px 0;font-family:'Neuton',Georgia,serif;font-weight:700;color:#fff;font-size:1.5rem}
.xuClosed p{margin:0;color:rgba(255,255,255,.7);font-size:.92rem}

/* ===== Responsif ===== */
@media(max-width:720px){
    .xuRegGrid{grid-template-columns:1fr}
    .xuRegHead{padding:28px 24px}
    .xuRegHead h2{font-size:1.4rem;gap:10px}
    .xuRegHead h2 i{width:46px;height:46px;font-size:1.2rem}
    .xuRegBody{padding:28px 22px}
    .xuFotoBox{flex-direction:column;align-items:stretch}
    .xuFotoPrev{width:100%;height:200px}
}
</style>

<div class="xuRegWrap">
  <div class="xuRegCard">

    <div class="xuRegHead">
      <h2><i class="fa fa-id-card"></i> Pendaftaran Anggota Online</h2>
      <p>Repositori DIFOSS — daftar mandiri, verifikasi admin, notifikasi WhatsApp</p>
    </div>

    <div class="xuRegBody">

      <?php if (!$regOpen): ?>
        <div class="xuClosed">
          <i class="fa fa-lock"></i>
          <h3>Pendaftaran Ditutup</h3>
          <p>Saat ini pendaftaran anggota sedang tidak dibuka. Silakan hubungi perpustakaan.</p>
        </div>
      <?php else: ?>

      <?php if (!empty($errors)): ?>
        <div class="xuRegErr">
          <ul><?php foreach ($errors as $e): ?><li><?= esc($e) ?></li><?php endforeach; ?></ul>
        </div>
      <?php endif; ?>

      <form method="POST" action="<?= base_url('daftar') ?>" enctype="multipart/form-data" id="xuRegForm" autocomplete="off">
        <?= csrf_field() ?>
        <div class="xuRegGrid">

          <div class="xuRegField">
            <label>Nama Lengkap <span class="req">*</span></label>
            <input type="text" name="member_name" required placeholder="Nama lengkap sesuai identitas" value="<?= esc($old['member_name'] ?? '') ?>">
          </div>

          <div class="xuRegField">
            <label>NIM / NIDN / No. Induk <span class="req">*</span></label>
            <input type="text" name="member_id" id="xuRegId" required placeholder="Nomor induk Anda" value="<?= esc($old['member_id'] ?? '') ?>">
            <div class="xuRegHint" id="xuRegIdHint"></div>
          </div>

          <div class="xuRegField">
            <label>Email Aktif <span class="req">*</span></label>
            <input type="email" name="member_email" id="xuRegEmail" required placeholder="email@domain.com" value="<?= esc($old['member_email'] ?? '') ?>">
            <div class="xuRegHint" id="xuRegEmailHint"></div>
          </div>

          <div class="xuRegField">
            <label>No. HP / WhatsApp Aktif <span class="req">*</span></label>
            <input type="text" name="member_phone" placeholder="08xxxxxxxxxx" required value="<?= esc($old['member_phone'] ?? '') ?>">
            <div class="xuRegHint">Notifikasi persetujuan dikirim via WhatsApp ke nomor ini.</div>
          </div>

          <div class="xuRegField">
            <label>Kategori <span class="req">*</span></label>
            <select name="member_category" id="xuRegCat" required>
              <option value="">— Pilih Kategori —</option>
              <option value="Mahasiswa" <?= ($old['member_category']??'')=='Mahasiswa'?'selected':'' ?>>Mahasiswa</option>
              <option value="Dosen" <?= ($old['member_category']??'')=='Dosen'?'selected':'' ?>>Dosen</option>
              <option value="Staff" <?= ($old['member_category']??'')=='Staff'?'selected':'' ?>>Staff</option>
            </select>
          </div>

          <div class="xuRegField">
            <label>Jenis Anggota <span class="req">*</span></label>
            <select name="member_type_id" required>
              <option value="">— Pilih Jenis —</option>
              <?php foreach ($types as $t): ?>
                <option value="<?= $t->member_type_id ?>" <?= ($old['member_type_id']??'')==$t->member_type_id?'selected':'' ?>><?= esc($t->member_type_name) ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="xuRegField">
            <label>Institusi / Fakultas / Prodi</label>
            <input type="text" name="inst_name" placeholder="Nama institusi atau prodi" value="<?= esc($old['inst_name'] ?? '') ?>">
          </div>

          <div class="xuRegField">
            <label>Jenis Kelamin</label>
            <select name="gender">
              <option value="">— Pilih —</option>
              <option value="L" <?= ($old['gender']??'')=='L'?'selected':'' ?>>Laki-laki</option>
              <option value="P" <?= ($old['gender']??'')=='P'?'selected':'' ?>>Perempuan</option>
            </select>
          </div>

          <div class="xuRegField full">
            <label>Alamat</label>
            <textarea name="member_address" rows="2" placeholder="Alamat lengkap (opsional)"><?= esc($old['member_address'] ?? '') ?></textarea>
          </div>

          <div class="xuRegField">
            <label>Kata Sandi <span class="req">*</span></label>
            <input type="password" name="mPasswd" minlength="6" required placeholder="Minimal 6 karakter">
          </div>

          <div class="xuRegField">
            <label>Ulangi Kata Sandi <span class="req">*</span></label>
            <input type="password" id="xuRegPass2" required placeholder="Ketik ulang sandi">
            <div class="xuRegHint" id="xuRegPass2Hint"></div>
          </div>

          <div class="xuRegField full">
            <label>Pas Foto Resmi <span class="req">*</span></label>
            <div class="xuFotoBox">
              <div class="xuFotoPrev" id="xuFotoPrev"><i class="fa fa-user"></i></div>
              <div class="xuFotoInfo">
                <input type="file" name="member_image" id="xuFoto" accept="image/*" required>
                <div id="xuFotoBadge" class="xuFotoBadge wait">
                  <i class="fa fa-info-circle"></i> Pilih foto untuk validasi latar otomatis
                </div>
              </div>
            </div>
          </div>

        </div>

        <button type="submit" class="xuRegSubmit" id="xuRegSubmit">
          <i class="fa fa-paper-plane"></i> Kirim Pendaftaran
        </button>
      </form>
      <?php endif; ?>

      <div class="xuRegFoot">
        Sudah terdaftar? <a href="<?= base_url('login') ?>">Masuk di sini</a>
      </div>

    </div>
  </div>
</div>

<script>
(function(){
  var SET = <?= json_encode([
      'Mahasiswa' => $settings->warna_mahasiswa ?? 'biru',
      'Dosen'     => $settings->warna_dosen ?? 'merah',
      'Staff'     => $settings->warna_staff ?? 'merah',
  ]) ?>;
  var detectedColor = null;

  // ========== Deteksi warna latar foto (canvas-based) ==========
  function detectBackground(file, cb){
    var url = URL.createObjectURL(file);
    var img = new Image();
    img.onload = function(){
      var s = 64, c = document.createElement('canvas');
      c.width = s; c.height = s;
      var ctx = c.getContext('2d');
      ctx.drawImage(img, 0, 0, s, s);
      var d = ctx.getImageData(0, 0, s, s).data;
      var r = 0, g = 0, b = 0, n = 0;
      for (var y = 0; y < s; y++) {
        for (var x = 0; x < s; x++) {
          if (x < 4 || x >= s - 4 || y < 4 || y >= s - 4) {
            var i = (y * s + x) * 4;
            r += d[i]; g += d[i + 1]; b += d[i + 2]; n++;
          }
        }
      }
      r /= n; g /= n; b /= n;
      var col = 'lainnya';
      if (b > r + 15 && b > g + 5) col = 'biru';
      else if (r > b + 15 && r > g + 15) col = 'merah';
      URL.revokeObjectURL(url);
      cb(col);
    };
    img.src = url;
  }

  function validateFoto(){
    var cat = document.getElementById('xuRegCat').value;
    var badge = document.getElementById('xuFotoBadge');
    if (!detectedColor) {
      badge.className = 'xuFotoBadge wait';
      badge.innerHTML = '<i class="fa fa-info-circle"></i> Pilih foto untuk validasi latar otomatis';
      return true;
    }
    if (!cat) {
      badge.className = 'xuFotoBadge wait';
      badge.innerHTML = '<i class="fa fa-info-circle"></i> Latar terdeteksi: <b>' + detectedColor + '</b> — pilih kategori';
      return true;
    }
    var need = SET[cat] || 'biru';
    if (detectedColor === need) {
      badge.className = 'xuFotoBadge ok';
      badge.innerHTML = '<i class="fa fa-check-circle"></i> Latar <b>' + detectedColor + '</b> — cocok untuk ' + cat;
      return true;
    }
    badge.className = 'xuFotoBadge bad';
    badge.innerHTML = '<i class="fa fa-times-circle"></i> Latar <b>' + detectedColor + '</b> — ' + cat + ' wajib latar <b>' + need + '</b>';
    return false;
  }

  document.getElementById('xuFoto').addEventListener('change', function(){
    var f = this.files[0];
    if (!f) return;
    var prev = document.getElementById('xuFotoPrev');
    prev.innerHTML = '<img src="' + URL.createObjectURL(f) + '">';
    prev.classList.add('has-img');
    detectBackground(f, function(col){ detectedColor = col; validateFoto(); });
  });
  document.getElementById('xuRegCat').addEventListener('change', validateFoto);

  // ========== Cek email / ID real-time ==========
  function liveCheck(inputId, hintId, field){
    var inp = document.getElementById(inputId);
    var hint = document.getElementById(hintId);
    var t = null;
    inp.addEventListener('input', function(){
      clearTimeout(t);
      var v = inp.value.trim();
      if (v.length < 4) { hint.textContent = ''; return; }
      t = setTimeout(function(){
        fetch(baseUrl + 'daftar/cek?field=' + field + '&value=' + encodeURIComponent(v))
          .then(function(r){ return r.json(); })
          .then(function(j){
            if (j.exists) { hint.className = 'xuRegHint bad'; hint.textContent = '✗ Sudah terdaftar'; }
            else { hint.className = 'xuRegHint ok'; hint.textContent = '✓ Tersedia'; }
          }).catch(function(){});
      }, 500);
    });
  }
  liveCheck('xuRegEmail', 'xuRegEmailHint', 'email');
  liveCheck('xuRegId', 'xuRegIdHint', 'id');

  // ========== Konfirmasi sandi ==========
  var p2 = document.getElementById('xuRegPass2');
  p2.addEventListener('input', function(){
    var h = document.getElementById('xuRegPass2Hint');
    var m = document.querySelector('input[name="mPasswd"]').value;
    if (p2.value !== m) { h.className = 'xuRegHint bad'; h.textContent = '✗ Tidak sama'; }
    else { h.className = 'xuRegHint ok'; h.textContent = '✓ Sama'; }
  });

  // ========== Blokir submit bila validasi gagal ==========
  document.getElementById('xuRegForm').addEventListener('submit', function(e){
    if (!validateFoto()) {
      e.preventDefault();
      alert('Pas foto tidak sesuai ketentuan latar untuk kategori yang dipilih.');
      return;
    }
    if (p2.value !== document.querySelector('input[name="mPasswd"]').value) {
      e.preventDefault();
      alert('Konfirmasi kata sandi tidak sama.');
    }
  });
})();
</script>