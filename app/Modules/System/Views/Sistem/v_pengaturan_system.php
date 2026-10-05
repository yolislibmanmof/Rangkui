<?php
extract($list_var);

// HELPER UNSEIALIZE AMAN (anti-crash PHP 8.2)
if (!function_exists('xuUn')) {
    function xuUn($v, $fallback = '') {
        if (!is_string($v) || $v === '') return $fallback;
        $r = @unserialize($v);
        return ($r === false) ? $fallback : $r;
    }
}

$__lib_name   = xuUn($library_name, '');
$__lib_sub    = xuUn($library_subname, '');
$__lang       = xuUn($default_lang, '');
$__session    = xuUn($session_timeout, 1800);
$__spell      = xuUn($spellchecker_enabled, 0);
$__barcode    = xuUn($barcode_encoding, '128B');
$__opac_num   = xuUn($opac_result_num, '20');
$__xml_det    = xuUn($enable_xml_detail, 0);
$__xml_res    = xuUn($enable_xml_result, 0);
$__file_dl    = xuUn($allow_file_download, 0);
$__promote    = xuUn($enable_promote_titles, 0);
$__recaptcha  = xuUn($recaptcha, []);
if (!is_array($__recaptcha)) $__recaptcha = [];
$__rec_adm    = $__recaptcha['smc'] ?? 0;
$__rec_mem    = $__recaptcha['member'] ?? 0;
?>

<style>
/* ================================================================
   DIFOSS GLOBAL SETTINGS — EMERALD FOREST EDITION
   ================================================================ */
:root{
    --gs-emerald:#059669; --gs-teal:#0891b2; --gs-gold:#f59e0b;
    --gs-mint:#6ee7b7; --gs-deep:#0a2920;
    --gs-ink:#0f172a; --gs-muted:#64748b; --gs-soft:#94a3b8;
    --gs-danger:#dc2626;
}

.xuR{opacity:0;transform:translateY(24px);transition:all .6s cubic-bezier(.2,.8,.2,1)}
.xuR.in{opacity:1;transform:none}

.xuSysCard{
    background:#fff;border-radius:22px;
    box-shadow:0 16px 44px rgba(15,23,42,.1);
    overflow:hidden;
    border:1px solid rgba(5,150,105,.12);
    margin-bottom:24px;
    transition:.35s cubic-bezier(.2,.8,.2,1);
}
.xuSysCard:hover{box-shadow:0 22px 54px rgba(5,150,105,.14);border-color:rgba(5,150,105,.22)}
html.xu-dark .xuSysCard{background:#0f1e1f;border-color:rgba(5,150,105,.22);box-shadow:0 16px 44px rgba(0,0,0,.4)}

.xuSysHead{
    padding:22px 28px;
    background:linear-gradient(90deg,var(--gs-emerald),var(--gs-teal),var(--gs-gold),var(--gs-emerald));
    background-size:200% 100%;
    color:#fff;
    display:flex;align-items:center;justify-content:space-between;
    flex-wrap:wrap;gap:14px;
    animation:xuGsGrad 7s linear infinite;
    position:relative;overflow:hidden;
}
.xuSysHead::after{
    content:'';position:absolute;top:-60%;right:-8%;
    width:320px;height:320px;border-radius:50%;
    background:radial-gradient(circle,rgba(245,158,11,.25),transparent 70%);
    pointer-events:none;
}
@keyframes xuGsGrad{to{background-position:200% 0}}

.xuSysHead h2{
    margin:0;font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1.3rem;
    display:flex;align-items:center;gap:12px;
    color:#fff;letter-spacing:-.01em;
    position:relative;z-index:2;
}
.xuSysHead h2 i{
    width:42px;height:42px;border-radius:13px;
    background:rgba(255,255,255,.18);
    backdrop-filter:blur(8px);-webkit-backdrop-filter:blur(8px);
    display:inline-flex;align-items:center;justify-content:center;
    font-size:1.15rem;
    box-shadow:inset 0 1px 0 rgba(255,255,255,.2);
}

.xuSysBody{padding:28px 30px}

.xuSysRow{display:grid;grid-template-columns:1fr 1fr;gap:28px}
@media (max-width:900px){.xuSysRow{grid-template-columns:1fr}}

.xuSec{margin-bottom:26px}

.xuSecTitle{
    font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1.05rem;
    color:var(--gs-emerald);
    display:flex;align-items:center;gap:11px;
    margin-bottom:16px;padding-bottom:11px;
    border-bottom:1.5px dashed rgba(5,150,105,.2);
}
.xuSecTitle i{
    width:34px;height:34px;border-radius:10px;
    background:linear-gradient(135deg,rgba(5,150,105,.15),rgba(245,158,11,.08));
    color:var(--gs-emerald);
    display:inline-flex;align-items:center;justify-content:center;
    font-size:.9rem;
    border:1px solid rgba(5,150,105,.2);
}
html.xu-dark .xuSecTitle{color:var(--gs-mint);border-bottom-color:rgba(5,150,105,.3)}
html.xu-dark .xuSecTitle i{color:var(--gs-mint);background:linear-gradient(135deg,rgba(5,150,105,.2),rgba(245,158,11,.12));border-color:rgba(5,150,105,.35)}

.xuSysBody label{
    font-weight:800;font-size:.74rem;
    color:var(--gs-ink);
    margin-bottom:8px;display:block;
    text-transform:uppercase;letter-spacing:.08em;
}
html.xu-dark .xuSysBody label{color:#e2e8f0}

.xuSysBody .form-control{
    width:100%;padding:11px 14px;
    border:1.5px solid #cbd5e1;
    border-radius:12px;font-size:.9rem;
    outline:none;background:#f8fafc;
    color:var(--gs-ink);
    font-family:inherit;
    transition:.25s;
    box-sizing:border-box;
}
.xuSysBody .form-control:hover{
    border-color:var(--gs-emerald);
    background:rgba(5,150,105,.04);
}
.xuSysBody .form-control:focus{
    border-color:var(--gs-emerald);
    background:#fff;
    box-shadow:0 0 0 4px rgba(5,150,105,.12);
}
html.xu-dark .xuSysBody .form-control{background:rgba(255,255,255,.05);border-color:rgba(5,150,105,.25);color:#f1f5f9}
html.xu-dark .xuSysBody .form-control:hover{background:rgba(5,150,105,.08)}
html.xu-dark .xuSysBody .form-control:focus{border-color:var(--gs-gold);background:rgba(255,255,255,.08);box-shadow:0 0 0 4px rgba(245,158,11,.15)}

.xuSysBody .form-group{margin-bottom:18px}

.xuFieldHint{
    font-size:.72rem;color:var(--gs-muted);
    margin-top:5px;font-weight:600;
    display:flex;align-items:center;gap:5px;
}
.xuFieldHint i{color:var(--gs-gold);font-size:.7rem}
html.xu-dark .xuFieldHint{color:var(--gs-soft)}

/* Radio custom */
.xuRadio{display:flex;gap:12px;flex-wrap:wrap}
.xuRadio label{
    display:inline-flex;align-items:center;gap:9px;
    padding:10px 18px;
    border:1.5px solid #cbd5e1;
    border-radius:12px;background:#f8fafc;
    cursor:pointer;transition:.25s;
    font-weight:600!important;
    color:var(--gs-muted);
    font-size:.85rem;
}
.xuRadio label:hover{border-color:var(--gs-emerald);background:rgba(5,150,105,.04)}
.xuRadio input{width:18px;height:18px;accent-color:var(--gs-emerald);cursor:pointer;margin:0}
.xuRadio input:checked ~ span{color:var(--gs-emerald);font-weight:700}
.xuRadio label:has(input:checked){border-color:var(--gs-emerald);background:rgba(5,150,105,.08);box-shadow:0 4px 12px rgba(5,150,105,.15)}
html.xu-dark .xuRadio label{background:rgba(255,255,255,.05);border-color:rgba(5,150,105,.25);color:var(--gs-soft)}
html.xu-dark .xuRadio label:hover{border-color:var(--gs-gold);background:rgba(245,158,11,.08)}
html.xu-dark .xuRadio input{accent-color:var(--gs-gold)}
html.xu-dark .xuRadio input:checked ~ span{color:var(--gs-gold)}
html.xu-dark .xuRadio label:has(input:checked){border-color:var(--gs-gold);background:rgba(245,158,11,.12)}

/* Tombol aksi captcha */
.xuBtnIco{
    display:inline-flex;align-items:center;justify-content:center;
    width:44px;height:44px;border-radius:12px;
    background:linear-gradient(135deg,rgba(5,150,105,.08),rgba(245,158,11,.05));
    border:1.5px solid rgba(5,150,105,.25);
    color:var(--gs-emerald);
    font-size:1.05rem;
    cursor:pointer;transition:.3s;
    text-decoration:none!important;
    position:relative;overflow:hidden;
}
.xuBtnIco::before{
    content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;
    background:linear-gradient(100deg,transparent 20%,rgba(255,255,255,.28) 50%,transparent 80%);
    transition:left .6s ease;
}
.xuBtnIco:hover{
    border-color:var(--gs-gold);
    color:var(--gs-gold);
    background:linear-gradient(135deg,rgba(5,150,105,.12),rgba(245,158,11,.12));
    transform:translateY(-2px);
    box-shadow:0 8px 18px rgba(5,150,105,.25);
    text-decoration:none!important;
}
.xuBtnIco:hover::before{left:120%}
html.xu-dark .xuBtnIco{background:rgba(5,150,105,.12);border-color:rgba(5,150,105,.3);color:var(--gs-mint)}
html.xu-dark .xuBtnIco:hover{border-color:var(--gs-gold);color:var(--gs-gold);background:rgba(245,158,11,.12)}

/* Select2 ringan */
.select2-container{width:100%!important}
.select2-container .select2-selection--single{
    border:1.5px solid #cbd5e1!important;
    border-radius:12px!important;
    background:#f8fafc!important;
    height:46px!important;
}
.select2-container--default .select2-selection--single .select2-selection__rendered{
    line-height:42px!important;color:var(--gs-ink)!important;
    font-weight:600!important;padding-left:14px!important;
}
html.xu-dark .select2-container--default .select2-selection--single .select2-selection__rendered{color:#f1f5f9!important}
.select2-container--default .select2-selection--single .select2-selection__arrow{height:44px!important}
.select2-container--default.select2-container--open .select2-selection--single{
    border-color:var(--gs-emerald)!important;
    box-shadow:0 0 0 4px rgba(5,150,105,.12)!important;
    background:#fff!important;
}
html.xu-dark .select2-container--default.select2-container--open .select2-selection--single{
    border-color:var(--gs-gold)!important;box-shadow:0 0 0 4px rgba(245,158,11,.15)!important;
    background:rgba(255,255,255,.08)!important;
}
.select2-container--default .select2-results__option--highlighted[aria-selected]{
    background:linear-gradient(90deg,var(--gs-emerald),var(--gs-gold))!important;
    color:#fff!important;
}
.select2-dropdown{border:1.5px solid var(--gs-emerald)!important;border-radius:12px!important;overflow:hidden!important}
html.xu-dark .select2-dropdown{background:#0f1e1f!important;border-color:rgba(5,150,105,.35)!important}
.select2-container--default .select2-results__option{padding:9px 14px!important;font-size:.88rem!important;color:var(--gs-ink)}
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
    color:var(--gs-emerald);
    font-weight:700;font-size:.88rem;
    text-decoration:none;transition:.25s;
    border:1.5px solid rgba(5,150,105,.25);
    font-family:inherit;
}
.xuBtnCancel:hover{
    background:rgba(5,150,105,.14);
    border-color:rgba(5,150,105,.45);
    transform:translateY(-2px);
    text-decoration:none;color:var(--gs-emerald);
}
html.xu-dark .xuBtnCancel{background:rgba(5,150,105,.12);color:var(--gs-mint);border-color:rgba(5,150,105,.3)}

.xuBtnSave{
    display:inline-flex;align-items:center;gap:8px;
    padding:11px 26px;border-radius:12px;
    background:linear-gradient(90deg,var(--gs-emerald),var(--gs-gold));
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

@media(max-width:720px){
    .xuSysHead{padding:18px 20px}
    .xuSysHead h2{font-size:1.15rem}
    .xuSysBody{padding:20px 18px}
    .xuFormFoot{padding:18px;flex-direction:column}
    .xuBtnSave,.xuBtnCancel{width:100%;justify-content:center;margin:0}
}
</style>

<div class="xuSysCard xuR">
    <div class="xuSysHead">
        <h2><i class="fa fa-cog"></i> Modify Global Application Preferences</h2>
    </div>

    <form name="mainForm" id="mainForm" method="post" action="/sistem/pengaturan-sistem/create">
        <?= csrf_field(); ?>
        <div class="xuSysBody">
            <div class="xuSysRow">

                <!-- KOLOM KIRI -->
                <div>
                    <div class="xuSec">
                        <div class="xuSecTitle"><i class="fa fa-institution"></i> Library Identity</div>
                        <div class="form-group">
                            <label for="library_name">Library Name</label>
                            <input type="text" class="form-control" name="library_name" id="library_name" value="<?= esc($__lib_name); ?>" tabindex="1" placeholder="Contoh: Perpustakaan DIFOSS">
                            <div class="xuFieldHint"><i class="fa fa-info-circle"></i> Nama utama perpustakaan yang tampil di OPAC</div>
                        </div>
                        <div class="form-group">
                            <label for="library_subname">Additional Library Name</label>
                            <input type="text" class="form-control" name="library_subname" id="library_subname" value="<?= esc($__lib_sub); ?>" tabindex="2" placeholder="Sub-judul atau slogan">
                            <div class="xuFieldHint"><i class="fa fa-info-circle"></i> Sub-nama opsional (ditampilkan di bawah nama utama)</div>
                        </div>
                    </div>

                    <div class="xuSec">
                        <div class="xuSecTitle"><i class="fa fa-globe"></i> Language & Session</div>
                        <div class="form-group">
                            <label for="default_lang">Default Application Language</label>
                            <select class="form-control select2" name="default_lang" id="default_lang" tabindex="3" data-placeholder="--Please Select Language--" data-allow-clear="true">
                                <option></option>
                                <?php foreach ($list_lang as $k => $val): ?>
                                    <option value="<?= $val->language_id; ?>" <?= $__lang == $val->language_id ? "selected" : "" ?>><?= $val->language_name; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="session_timeout">Session Expired (detik)</label>
                            <input type="number" class="form-control" name="session_timeout" id="session_timeout" value="<?= (int)$__session; ?>" tabindex="5" min="60" max="86400">
                            <div class="xuFieldHint"><i class="fa fa-info-circle"></i> Durasi sesi login (default: 1800 = 30 menit)</div>
                        </div>
                    </div>

                    <div class="xuSec">
                        <div class="xuSecTitle"><i class="fa fa-barcode"></i> Barcode & Spell Checker</div>
                        <div class="form-group">
                            <label for="spellchecker_enabled">Enable Spell Checker</label>
                            <select class="form-control select2" name="spellchecker_enabled" id="spellchecker_enabled" tabindex="11">
                                <option value="0" <?= $__spell == 0 ? "selected" : ""; ?>>Impossible</option>
                                <option value="1" <?= $__spell == 1 ? "selected" : ""; ?>>Possible</option>
                            </select>
                        </div>
                        <?php
                        $options_bc = [
                            "ISBN"   => "isbn numbers (still EAN-13)",
                            "39"     => "code 39",
                            "128"    => "code 128",
                            "128C"   => "code 128 (compact form for digits)",
                            "128B"   => "code 128, full printable ascii",
                            "I25"    => "interleaved 2 of 5",
                            "128RAW" => "Raw code 128",
                            "CBR"    => "Codabars",
                            "MSI"    => "MSI",
                            "PLS"    => "Plesseys",
                            "93"     => "code 93"
                        ];
                        ?>
                        <div class="form-group">
                            <label for="barcode_encoding">Barcode Encoding</label>
                            <select class="form-control select2" name="barcode_encoding" id="barcode_encoding" tabindex="12" data-placeholder="--Choose Barcode Encoding--">
                                <option></option>
                                <?php foreach ($options_bc as $key => $val) : ?>
                                    <option value="<?= $key; ?>" <?= ($__barcode == $key) ? "selected" : ""; ?>><?= $val ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>

                    <div class="xuSec">
                        <div class="xuSecTitle"><i class="fa fa-shield"></i> Recaptcha Security</div>
                        <div class="form-group">
                            <label for="enable_recaptcha_admin">Recaptcha Admin</label>
                            <select class="form-control select2" name="enable_recaptcha_admin" id="enable_recaptcha_admin" tabindex="14">
                                <option value="0" <?= $__rec_adm == 0 ? "selected" : ""; ?>>Impossible</option>
                                <option value="1" <?= $__rec_adm == 1 ? "selected" : ""; ?>>Possible</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="enable_recaptcha_member">Recaptcha Member</label>
                            <select class="form-control select2" name="enable_recaptcha_member" id="enable_recaptcha_member" tabindex="15">
                                <option value="0" <?= $__rec_mem == 0 ? "selected" : ""; ?>>Impossible</option>
                                <option value="1" <?= $__rec_mem == 1 ? "selected" : ""; ?>>Possible</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Recaptcha Tools</label>
                            <div style="display:flex;gap:8px;flex-wrap:wrap">
                                <a href="#" data-toggle="modal" data-target="#keyCaptcha" title="Recaptcha API Key" class="xuBtnIco" tabindex="16"><i class="fa fa-key"></i></a>
                                <a href="#" data-toggle="modal" data-target="#manualPageModal" title="Manual Page" class="xuBtnIco"><i class="fa fa-question"></i></a>
                            </div>
                            <div class="xuFieldHint"><i class="fa fa-info-circle"></i> Kunci API & panduan aktivasi Recaptcha V2</div>
                        </div>
                    </div>
                </div>

                <!-- KOLOM KANAN -->
                <div>
                    <div class="xuSec">
                        <div class="xuSecTitle"><i class="fa fa-search"></i> OPAC Display</div>
                        <?php
                        $options_opac = ["10"=>"10","20"=>"20","30"=>"30","40"=>"40","50"=>"50"];
                        ?>
                        <div class="form-group">
                            <label for="opac_result_num">Number of Collections Displayed in OPAC Search Results</label>
                            <select class="form-control select2" name="opac_result_num" id="opac_result_num" tabindex="4" data-placeholder="--Select Opac Result--">
                                <option></option>
                                <?php foreach ($options_opac as $val) : ?>
                                    <option value="<?= $val; ?>" <?= $__opac_num == $val ? "selected" : ""; ?>><?= $val ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="enable_promote_titles">Show Selected Titles on the OPAC Page</label>
                            <div class="xuRadio">
                                <label><input type="radio" name="enable_promote_titles" value="1" tabindex="9" <?= $__promote == 1 ? "checked" : ""; ?>> <span>Yes</span></label>
                                <label><input type="radio" name="enable_promote_titles" value="0" tabindex="10" <?= $__promote == 0 ? "checked" : ""; ?>> <span>No</span></label>
                            </div>
                        </div>
                    </div>

                    <div class="xuSec">
                        <div class="xuSecTitle"><i class="fa fa-code"></i> XML Features</div>
                        <div class="form-group">
                            <label for="enable_xml_detail">Detail XML OPAC</label>
                            <select class="form-control select2" name="enable_xml_detail" id="enable_xml_detail" tabindex="6">
                                <option value="0" <?= $__xml_det == 0 ? "selected" : ""; ?>>Impossible</option>
                                <option value="1" <?= $__xml_det == 1 ? "selected" : ""; ?>>Possible</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="enable_xml_result">Results XML OPAC</label>
                            <select class="form-control select2" name="enable_xml_result" id="enable_xml_result" tabindex="7">
                                <option value="0" <?= $__xml_res == 0 ? "selected" : ""; ?>>Impossible</option>
                                <option value="1" <?= $__xml_res == 1 ? "selected" : ""; ?>>Possible</option>
                            </select>
                        </div>
                    </div>

                    <div class="xuSec">
                        <div class="xuSecTitle"><i class="fa fa-download"></i> File Access</div>
                        <div class="form-group">
                            <label for="allow_file_download">Enable OPAC File Download</label>
                            <select class="form-control select2" name="allow_file_download" id="allow_file_download" tabindex="8">
                                <option value="0" <?= $__file_dl == 0 ? "selected" : ""; ?>>Not Allowed</option>
                                <option value="1" <?= $__file_dl == 1 ? "selected" : ""; ?>>Allowed</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="xuFormFoot">
            <a href="javascript:void(0)" onclick="if(window.history.length>1){window.history.back();}else{location.href='<?= base_url('sistem') ?>';}" class="xuBtnCancel">
                <i class="fa fa-arrow-left"></i> Kembali
            </a>
            <button type="submit" class="xuBtnSave" name="updateData" tabindex="18"><i class="fa fa-save"></i> Save Configuration</button>
        </div>
    </form>
</div>

<?php
global $contentPath;

echo view($contentPath . 'Sistem\modal\v_recaptcha_page');
echo view($contentPath . 'Sistem\modal\v_manual_page');
?>

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