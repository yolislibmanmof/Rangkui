<style>
/* ================================================================
   DIFOSS FORM BIBLIOGRAPHY — EMERALD FOREST EDITION
   ================================================================ */
:root{
    --bf-emerald:#059669; --bf-teal:#0891b2; --bf-gold:#f59e0b;
    --bf-mint:#6ee7b7; --bf-deep:#0a2920; --bf-mid:#064e3b;
    --bf-ink:#0f172a; --bf-muted:#64748b; --bf-soft:#94a3b8;
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
    background:linear-gradient(90deg,var(--bf-emerald),var(--bf-teal),var(--bf-gold),var(--bf-emerald));
    background-size:200% 100%;
    color:#fff;
    display:flex;align-items:center;gap:12px;
    animation:xbfGrad 7s linear infinite;
    position:relative;overflow:hidden;
}
.xuFormHead::after{
    content:'';position:absolute;top:-60%;right:-8%;
    width:320px;height:320px;border-radius:50%;
    background:radial-gradient(circle,rgba(245,158,11,.25),transparent 70%);
    pointer-events:none;
}
@keyframes xbfGrad{to{background-position:200% 0}}

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

/* ===== WIZARD STEPS ===== */
.wizard_horizontal ul.wizard_steps{
    display:flex;list-style:none;
    margin:0 0 28px;padding:0;
    gap:16px;flex-wrap:wrap;
}
.wizard_horizontal ul.wizard_steps li{
    flex:1;min-width:150px;position:relative;
}
.wizard_horizontal ul.wizard_steps li a{
    display:flex;align-items:center;gap:12px;
    padding:14px 18px;border-radius:13px;
    background:#f8fafc;
    border:1.5px solid #eef0f6;
    text-decoration:none!important;
    transition:.3s;color:var(--bf-muted);
    position:relative;z-index:2;
    font-weight:600;
}
html.xu-dark .wizard_horizontal ul.wizard_steps li a{background:rgba(255,255,255,.04);border-color:rgba(5,150,105,.2);color:var(--bf-soft)}

.wizard_horizontal ul.wizard_steps li a:hover{
    border-color:rgba(5,150,105,.4);
    background:rgba(5,150,105,.04);
}

.wizard_horizontal ul.wizard_steps li.is-selected a,
.wizard_horizontal ul.wizard_steps li a.selected{
    background:linear-gradient(90deg,var(--bf-emerald),var(--bf-gold));
    color:#fff!important;
    border-color:transparent;
    box-shadow:0 10px 26px rgba(5,150,105,.35);
}
.wizard_horizontal ul.wizard_steps li.is-done a{
    background:linear-gradient(90deg,var(--bf-teal),var(--bf-mint));
    color:#fff!important;
    border-color:transparent;
    box-shadow:0 8px 22px rgba(8,145,178,.3);
}

.wizard_horizontal .step_no{
    width:34px;height:34px;border-radius:10px;
    background:rgba(5,150,105,.12);
    color:var(--bf-emerald);
    display:inline-flex;align-items:center;justify-content:center;
    font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:.95rem;
    flex-shrink:0;line-height:1;
    transition:.3s;
}
html.xu-dark .wizard_horizontal .step_no{background:rgba(5,150,105,.2);color:var(--bf-mint)}

.wizard_horizontal ul.wizard_steps li.is-selected .step_no,
.wizard_horizontal ul.wizard_steps li.is-done .step_no{
    background:rgba(255,255,255,.28);
    color:#fff;
}
.wizard_horizontal .step_descr{
    font-weight:700;font-size:.92rem;
    letter-spacing:.01em;line-height:1.2;
}
.wizard_horizontal ul.wizard_steps li.is-selected .step_descr{color:#fff}

/* Garis penghubung tipis */
.wizard_horizontal ul.wizard_steps li:not(:last-child)::after{
    content:"";position:absolute;
    top:50%;right:-16px;width:16px;height:1px;
    background:linear-gradient(90deg,rgba(5,150,105,.4),rgba(5,150,105,.2));
    transform:translateY(-50%);z-index:1;
}
.wizard_horizontal ul.wizard_steps li.is-done:not(:last-child)::after{
    background:linear-gradient(90deg,var(--bf-mint),rgba(110,231,183,.4));
}

/* ===== FORM FIELDS ===== */
.xuFormBody .control-label{
    display:block;font-weight:800;
    font-size:.84rem;color:var(--bf-ink);
    margin-bottom:9px;letter-spacing:.02em;
    display:flex;align-items:center;gap:6px;flex-wrap:wrap;
}
html.xu-dark .xuFormBody .control-label{color:#e2e8f0}

.xuFormBody .required{color:#ef4444;font-weight:800}

.xuFormBody .form-control{
    width:100%;padding:13px 16px;
    border:1.5px solid #cbd5e1;
    border-radius:12px;font-size:.92rem;
    outline:none;transition:.25s;
    background:#f8fafc;color:var(--bf-ink);
    box-sizing:border-box;
    box-shadow:inset 0 1px 3px rgba(15,23,42,.05);
    font-family:inherit;
}
html.xu-dark .xuFormBody .form-control{background:rgba(255,255,255,.05);border-color:rgba(5,150,105,.2);color:#f1f5f9}

.xuFormBody textarea.form-control{min-height:100px;resize:vertical}

.xuFormBody .form-control:hover{
    border-color:var(--bf-emerald);
    background:rgba(5,150,105,.04);
}
.xuFormBody .form-control:focus{
    border-color:var(--bf-emerald);
    background:#fff;
    box-shadow:0 0 0 4px rgba(5,150,105,.12),0 4px 12px rgba(5,150,105,.08);
}
html.xu-dark .xuFormBody .form-control:hover{background:rgba(5,150,105,.08)}
html.xu-dark .xuFormBody .form-control:focus{background:rgba(255,255,255,.08);border-color:var(--bf-gold);box-shadow:0 0 0 4px rgba(245,158,11,.15)}

.xuFormBody .form-group{margin-bottom:22px}
.xuFormBody .form-text{
    font-size:.76rem;margin-top:7px;
    color:var(--bf-muted);font-weight:600;
}
html.xu-dark .xuFormBody .form-text{color:var(--bf-soft)}
.xuFormBody .form-text.text-danger{color:#dc2626}

.xuFormBody .form-control::placeholder{
    color:var(--bf-soft);font-weight:500;
}

/* ===== SELECT2 ===== */
.select2-container--default .select2-selection--single,
.select2-container--default .select2-selection--multiple{
    border:1.5px solid #cbd5e1;border-radius:12px;
    min-height:48px;padding:5px 10px;
    background:#f8fafc;
    box-shadow:inset 0 1px 3px rgba(15,23,42,.05);
}
html.xu-dark .select2-container--default .select2-selection--single,
html.xu-dark .select2-container--default .select2-selection--multiple{background:rgba(255,255,255,.05);border-color:rgba(5,150,105,.25)}

.select2-container--default .select2-selection--single:hover,
.select2-container--default .select2-selection--multiple:hover{
    border-color:var(--bf-emerald);
    background:rgba(5,150,105,.04);
}
.select2-container--default.select2-container--focus .select2-selection--multiple,
.select2-container--default.select2-container--open .select2-selection{
    border-color:var(--bf-emerald);
    box-shadow:0 0 0 4px rgba(5,150,105,.12);
    background:#fff;
}
html.xu-dark .select2-container--default.select2-container--focus .select2-selection--multiple,
html.xu-dark .select2-container--default.select2-container--open .select2-selection{background:rgba(255,255,255,.08);border-color:var(--bf-gold);box-shadow:0 0 0 4px rgba(245,158,11,.15)}

.select2-container--default .select2-selection__rendered{
    color:var(--bf-ink);line-height:36px;font-weight:500;
}
html.xu-dark .select2-container--default .select2-selection__rendered{color:#f1f5f9}

.select2-container--default .select2-selection__placeholder{
    color:var(--bf-soft);font-weight:500;
}
.select2-container--default .select2-selection--single .select2-selection__arrow{height:46px}

.select2-container--default .select2-selection--multiple .select2-selection__choice{
    background:linear-gradient(90deg,var(--bf-emerald),var(--bf-teal));
    border:none;color:#fff;
    border-radius:8px;padding:5px 12px;
    font-size:.82rem;font-weight:600;
    margin:3px 4px 3px 0;
}
.select2-container--default .select2-selection--multiple .select2-selection__choice__remove{
    color:#fff;margin-right:7px;font-weight:700;
}
.select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover{color:#fef3c7}

.select2-dropdown{
    border:1.5px solid rgba(5,150,105,.25);
    border-radius:12px;
    box-shadow:0 18px 44px rgba(15,23,42,.18);
    overflow:hidden;
}
html.xu-dark .select2-dropdown{background:#0f1e1f;border-color:rgba(5,150,105,.35)}

.select2-results__option{padding:10px 15px;font-size:.88rem;color:var(--bf-ink)}
html.xu-dark .select2-results__option{color:#e2e8f0}

.select2-results__option--highlighted[aria-selected]{
    background:linear-gradient(90deg,var(--bf-emerald),var(--bf-gold))!important;
    color:#fff!important;
}
.select2-search--dropdown .select2-search__field{
    border:1.5px solid #cbd5e1;border-radius:9px;
    padding:8px 12px;outline:none;
}
.select2-search--dropdown .select2-search__field:focus{
    border-color:var(--bf-emerald);
    box-shadow:0 0 0 3px rgba(5,150,105,.12);
}

/* ===== ATTACHMENT ROW ===== */
#tambahin .row{
    background:#f8fafc;
    border:1.5px solid rgba(5,150,105,.15);
    border-radius:14px;padding:14px;
    margin-bottom:10px;align-items:center;
    transition:.25s;
}
#tambahin .row:hover{border-color:rgba(5,150,105,.3);background:rgba(5,150,105,.03)}
html.xu-dark #tambahin .row{background:rgba(5,150,105,.05);border-color:rgba(5,150,105,.2)}
html.xu-dark #tambahin .row:hover{background:rgba(5,150,105,.08);border-color:rgba(5,150,105,.35)}

#addRow{
    background:linear-gradient(90deg,var(--bf-emerald),var(--bf-teal))!important;
    border:none;color:#fff;border-radius:10px;
    font-weight:700;
    box-shadow:0 6px 16px rgba(5,150,105,.3);
    transition:.25s;
    position:relative;overflow:hidden;
}
#addRow::before{
    content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;
    background:linear-gradient(100deg,transparent 20%,rgba(255,255,255,.3) 50%,transparent 80%);
    transition:left .6s ease;
}
#addRow:hover{filter:brightness(1.08);transform:translateY(-2px);box-shadow:0 10px 22px rgba(5,150,105,.4)}
#addRow:hover::before{left:120%}

/* ===== ACTION BAR ===== */
.actionBar{
    display:flex;gap:12px;justify-content:flex-end;
    padding-top:22px;border-top:1.5px dashed rgba(5,150,105,.15);
    margin-top:12px;flex-wrap:wrap;
}
.actionBar a,.actionBar button{
    display:inline-flex;align-items:center;gap:8px;
    padding:11px 22px;border-radius:12px;
    font-weight:700;font-size:.9rem;
    text-decoration:none!important;
    border:none;cursor:pointer;transition:.25s;
    position:relative;overflow:hidden;
}
.btnFinish,.actionBar .buttonNext{
    background:linear-gradient(90deg,var(--bf-emerald),var(--bf-gold));
    color:#fff;
    box-shadow:0 10px 26px rgba(5,150,105,.35);
}
.btnFinish::before,.actionBar .buttonNext::before{
    content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;
    background:linear-gradient(100deg,transparent 20%,rgba(255,255,255,.3) 50%,transparent 80%);
    transition:left .6s ease;
}
.btnFinish:hover::before,.actionBar .buttonNext:hover::before{left:120%}

.buttonPrevious{
    background:rgba(5,150,105,.08);
    color:var(--bf-emerald);
    border:1.5px solid rgba(5,150,105,.25);
}
html.xu-dark .buttonPrevious{background:rgba(5,150,105,.12);color:var(--bf-mint);border-color:rgba(5,150,105,.3)}

.actionBar a:hover,.actionBar button:hover{
    transform:translateY(-2px);filter:brightness(1.08);
}

/* ===== STEP 3 APPROVAL ===== */
#approvalSection{padding:50px 20px}
#approvalSection .glyphicon-ok-sign{
    color:var(--bf-emerald)!important;
    text-shadow:0 0 30px rgba(5,150,105,.4);
}
#approvalSection h1{
    font-family:'Neuton',Georgia,serif;
    font-weight:700;
    background:linear-gradient(90deg,var(--bf-emerald),var(--bf-gold));
    -webkit-background-clip:text;background-clip:text;
    -webkit-text-fill-color:transparent;
    margin:16px 0 10px;
    font-size:2.2rem;
}
html.xu-dark #approvalSection h1{
    background:linear-gradient(90deg,var(--bf-mint),var(--bf-gold));
    -webkit-background-clip:text;background-clip:text;
    -webkit-text-fill-color:transparent;
}
#approvalSection p{color:var(--bf-muted);max-width:440px;margin:0 auto;line-height:1.6}
html.xu-dark #approvalSection p{color:var(--bf-soft)}

/* ===== INPUT FILE CUSTOM ===== */
.xuFileWrap{display:flex;align-items:center;gap:10px;width:100%}
.xuFileBtn{
    display:inline-flex;align-items:center;justify-content:center;gap:7px;
    padding:11px 16px;border-radius:11px;
    background:linear-gradient(90deg,var(--bf-emerald),var(--bf-gold));
    color:#fff;font-weight:700;font-size:.82rem;
    cursor:pointer;transition:.25s;
    box-shadow:0 6px 16px rgba(5,150,105,.3);
    white-space:nowrap;flex-shrink:0;text-align:center;
    position:relative;overflow:hidden;
}
.xuFileBtn::before{
    content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;
    background:linear-gradient(100deg,transparent 20%,rgba(255,255,255,.3) 50%,transparent 80%);
    transition:left .6s ease;
}
.xuFileBtn:hover{transform:translateY(-2px);filter:brightness(1.1);box-shadow:0 10px 22px rgba(5,150,105,.4)}
.xuFileBtn:hover::before{left:120%}
.xuFileBtn i{font-size:.88rem}

.xuFileName{
    flex:1;padding:11px 14px;
    border:1.5px solid #cbd5e1;
    border-radius:11px;
    background:#f8fafc;color:var(--bf-muted);
    font-size:.88rem;
    overflow:hidden;text-overflow:ellipsis;white-space:nowrap;
    min-width:0;
    font-family:'JetBrains Mono',monospace;
}
.xuFileName.has-file{
    color:var(--bf-ink);font-weight:600;
    border-color:rgba(5,150,105,.4);
    background:rgba(5,150,105,.05);
}
html.xu-dark .xuFileName{background:rgba(255,255,255,.05);border-color:rgba(5,150,105,.25);color:var(--bf-soft)}
html.xu-dark .xuFileName.has-file{color:#f1f5f9;border-color:rgba(245,158,11,.4);background:rgba(245,158,11,.08)}

input[type=file].xuFileInput{
    position:absolute;width:1px;height:1px;
    opacity:0;overflow:hidden;pointer-events:none;
}

/* Mode kompak (attachment rows) */
.xuFileWrap.xuCompact{gap:0}
.xuFileWrap.xuCompact .xuFileBtn{
    width:100%;padding:9px 6px;font-size:.72rem;border-radius:10px;
}
.xuFileWrap.xuCompact .xuFileBtn span.btnlbl{display:inline}
.xuFileWrap.xuCompact .xuFileName{display:none}
.xuFileWrap.xuCompact .xuFileBtn.has-file{
    background:linear-gradient(90deg,var(--bf-teal),var(--bf-mint));
}

/* ===== DROPDOWN DI ATTACHMENT ===== */
#tambahin select.form-control,
.attachment-row select.form-control{
  color:var(--bf-ink) !important;
  font-size:.82rem !important;
  font-weight:600 !important;
  height:46px !important;
  line-height:normal !important;
  padding:0 30px 0 12px !important;
  border:1.5px solid #cbd5e1 !important;
  border-radius:11px !important;
  background-color:#f8fafc !important;
  background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23059669' d='M6 8L1 3h10z'/%3E%3C/svg%3E") !important;
  background-repeat:no-repeat !important;
  background-position:right 10px center !important;
  background-size:10px !important;
  -webkit-appearance:none !important;
  -moz-appearance:none !important;
  appearance:none !important;
  cursor:pointer !important;
  text-overflow:ellipsis !important;
  white-space:nowrap !important;
  overflow:hidden !important;
  min-width:0 !important;
  box-shadow:inset 0 1px 3px rgba(15,23,42,.05) !important;
  display:flex !important;
  align-items:center !important;
}
#tambahin select.form-control:hover,
.attachment-row select.form-control:hover{
  border-color:var(--bf-emerald) !important;
  background-color:rgba(5,150,105,.04) !important;
}
#tambahin select.form-control:focus,
.attachment-row select.form-control:focus{
  border-color:var(--bf-emerald) !important;
  background-color:#fff !important;
  box-shadow:0 0 0 3px rgba(5,150,105,.12) !important;
  outline:none !important;
}
#tambahin select.form-control option,
.attachment-row select.form-control option{
  color:var(--bf-ink) !important;
  background:#fff !important;
  font-weight:600 !important;
}
html.xu-dark #tambahin select.form-control,
html.xu-dark .attachment-row select.form-control{
  color:#f1f5f9 !important;
  background-color:rgba(255,255,255,.05) !important;
  border-color:rgba(5,150,105,.25) !important;
  background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23f59e0b' d='M6 8L1 3h10z'/%3E%3C/svg%3E") !important;
}
html.xu-dark #tambahin select.form-control:focus,
html.xu-dark .attachment-row select.form-control:focus{
  border-color:var(--bf-gold) !important;
  background-color:rgba(255,255,255,.08) !important;
  box-shadow:0 0 0 3px rgba(245,158,11,.15) !important;
}
html.xu-dark #tambahin select.form-control option,
html.xu-dark .attachment-row select.form-control option{
  color:#f1f5f9 !important;background:#0f1e1f !important;
}

/* Samakan tinggi kolom attachment */
#tambahin .row > [class*="col-"]{display:flex;align-items:center}
#tambahin .form-control{height:46px;box-sizing:border-box}
#tambahin textarea.form-control{height:auto}

/* Dropdown Send Mail & Edition */
#sendMail.form-control,
.xuFormBody select#edition.form-control{
  color:var(--bf-ink) !important;
  font-size:.92rem !important;
  font-weight:600 !important;
  height:48px !important;
  line-height:normal !important;
  padding:0 38px 0 16px !important;
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
  box-shadow:inset 0 1px 3px rgba(15,23,42,.05) !important;
}
#sendMail.form-control:hover,
.xuFormBody select#edition.form-control:hover{
  border-color:var(--bf-emerald) !important;
  background-color:rgba(5,150,105,.04) !important;
}
#sendMail.form-control:focus,
.xuFormBody select#edition.form-control:focus{
  border-color:var(--bf-emerald) !important;
  background-color:#fff !important;
  box-shadow:0 0 0 4px rgba(5,150,105,.12) !important;
  outline:none !important;
}
#sendMail.form-control option,
.xuFormBody select#edition.form-control option{
  color:var(--bf-ink) !important;
  background:#fff !important;
  font-weight:600 !important;
}
html.xu-dark #sendMail.form-control,
html.xu-dark .xuFormBody select#edition.form-control{
  color:#f1f5f9 !important;background-color:rgba(255,255,255,.05) !important;
  border-color:rgba(5,150,105,.25) !important;
  background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='13' height='13' viewBox='0 0 12 12'%3E%3Cpath fill='%23f59e0b' d='M6 8L1 3h10z'/%3E%3C/svg%3E") !important;
}
html.xu-dark #sendMail.form-control:focus,
html.xu-dark .xuFormBody select#edition.form-control:focus{
  border-color:var(--bf-gold) !important;
  background-color:rgba(255,255,255,.08) !important;
  box-shadow:0 0 0 4px rgba(245,158,11,.15) !important;
}
html.xu-dark #sendMail.form-control option,
html.xu-dark .xuFormBody select#edition.form-control option{
  color:#f1f5f9 !important;background:#0f1e1f !important;
}

/* ===== PANEL AI EKSTRAKSI ===== */
.xuAiPanel{
    background:#fff;border-radius:22px;
    box-shadow:0 16px 44px rgba(15,23,42,.08);
    overflow:hidden;
    border:1px solid rgba(5,150,105,.18);
    margin-bottom:24px;position:relative;
    transition:.35s cubic-bezier(.2,.8,.2,1);
}
.xuAiPanel:hover{
    box-shadow:0 22px 54px rgba(5,150,105,.14);
    border-color:rgba(5,150,105,.28);
}
html.xu-dark .xuAiPanel{background:#0f1e1f;border-color:rgba(5,150,105,.25);box-shadow:0 16px 44px rgba(0,0,0,.4)}

.xuAiPanel::before{
    content:"";position:absolute;top:0;left:0;right:0;height:3px;
    background:linear-gradient(90deg,var(--bf-emerald),var(--bf-gold),var(--bf-teal),var(--bf-emerald));
    background-size:300% 100%;
    animation:xuAiGrad 6s linear infinite;z-index:2;
}
@keyframes xuAiGrad{to{background-position:300% 0}}

.xuAiHead{
    padding:24px 28px;
    background:linear-gradient(135deg,#0a2920 0%,#064e3b 55%,#115e59 100%);
    color:#fff;
    display:flex;align-items:center;gap:14px;
    position:relative;overflow:hidden;
}
.xuAiHead::after{
    content:"";position:absolute;top:-50%;right:-10%;
    width:300px;height:300px;border-radius:50%;
    background:radial-gradient(circle,rgba(245,158,11,.3),transparent 70%);
    filter:blur(60px);pointer-events:none;
}
.xuAiHead::before{
    content:"";position:absolute;bottom:-50%;left:-8%;
    width:280px;height:280px;border-radius:50%;
    background:radial-gradient(circle,rgba(8,145,178,.25),transparent 70%);
    filter:blur(60px);pointer-events:none;
}

.xuAiHead h2{
    margin:0;font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1.3rem;
    display:flex;align-items:center;gap:12px;
    color:#fff;position:relative;z-index:1;
}
.xuAiHead h2 i{
    width:44px;height:44px;border-radius:13px;
    background:linear-gradient(135deg,var(--bf-emerald),var(--bf-gold));
    display:inline-flex;align-items:center;justify-content:center;
    font-size:1.15rem;
    box-shadow:0 8px 20px rgba(5,150,105,.45);
}

.xuAiBadge{
    display:inline-flex;align-items:center;gap:7px;
    padding:5px 13px;
    background:rgba(245,158,11,.18);
    border:1px solid rgba(245,158,11,.45);
    border-radius:999px;
    color:#fde68a;
    font-size:.72rem;font-weight:700;
    letter-spacing:.08em;text-transform:uppercase;
    margin-left:auto;position:relative;z-index:1;
}
.xuAiBadge .dot{
    width:7px;height:7px;border-radius:50%;
    background:#fde68a;
    box-shadow:0 0 8px #fde68a;
    animation:xuAiPulse 1.6s infinite;
}
@keyframes xuAiPulse{0%,100%{opacity:1}50%{opacity:.3}}

.xuAiBody{padding:26px}

.xuAiDropzone{
    position:relative;
    border:2.5px dashed rgba(5,150,105,.4);
    border-radius:18px;padding:32px 20px;
    text-align:center;
    background:linear-gradient(135deg,rgba(5,150,105,.04),rgba(245,158,11,.03));
    transition:.3s;cursor:pointer;
    margin-bottom:16px;
}
.xuAiDropzone:hover,.xuAiDropzone.dragover{
    border-color:var(--bf-emerald);
    background:linear-gradient(135deg,rgba(5,150,105,.08),rgba(245,158,11,.06));
    transform:translateY(-2px);
    box-shadow:0 10px 28px rgba(5,150,105,.15);
}
html.xu-dark .xuAiDropzone{background:linear-gradient(135deg,rgba(5,150,105,.08),rgba(245,158,11,.05));border-color:rgba(5,150,105,.4)}

.xuAiDropzone .icon{
    width:68px;height:68px;border-radius:20px;
    background:linear-gradient(135deg,var(--bf-emerald),var(--bf-gold));
    color:#fff;
    display:inline-flex;align-items:center;justify-content:center;
    font-size:1.9rem;margin-bottom:14px;
    box-shadow:0 12px 30px rgba(5,150,105,.4);
}
.xuAiDropzone h4{
    font-family:'Neuton',Georgia,serif;
    font-weight:700;color:var(--bf-ink);
    margin:0 0 6px;font-size:1.15rem;
}
html.xu-dark .xuAiDropzone h4{color:#f1f5f9}

.xuAiDropzone p{color:var(--bf-muted);margin:0 0 14px;font-size:.88rem}
html.xu-dark .xuAiDropzone p{color:var(--bf-soft)}

.xuAiDropzone input[type=file]{position:absolute;inset:0;opacity:0;cursor:pointer}

.xuAiFileInfo{
    display:none;align-items:center;gap:12px;
    padding:12px 16px;
    background:rgba(5,150,105,.05);
    border:1.5px solid rgba(5,150,105,.25);
    border-radius:12px;margin-bottom:16px;
}
.xuAiFileInfo.show{display:flex}
html.xu-dark .xuAiFileInfo{background:rgba(5,150,105,.1);border-color:rgba(5,150,105,.35)}

.xuAiFileInfo .file-icon{
    width:40px;height:40px;border-radius:10px;
    background:linear-gradient(135deg,#ef4444,#dc2626);
    color:#fff;
    display:inline-flex;align-items:center;justify-content:center;
    font-size:1.1rem;flex-shrink:0;
}
.xuAiFileInfo .file-name{
    flex:1;color:var(--bf-ink);font-weight:700;font-size:.9rem;
    overflow:hidden;text-overflow:ellipsis;white-space:nowrap;
    font-family:'JetBrains Mono',monospace;
}
html.xu-dark .xuAiFileInfo .file-name{color:#f1f5f9}

.xuAiFileInfo .file-size{color:var(--bf-muted);font-size:.8rem;font-weight:600}
html.xu-dark .xuAiFileInfo .file-size{color:var(--bf-soft)}

.xuAiFileInfo .file-remove{
    background:none;border:none;
    color:#ef4444;font-size:1.1rem;
    cursor:pointer;padding:4px 8px;border-radius:6px;
    transition:.2s;
}
.xuAiFileInfo .file-remove:hover{background:rgba(239,68,68,.1)}

.xuAiBtn{
    display:inline-flex;align-items:center;justify-content:center;gap:9px;
    padding:14px 26px;
    background:linear-gradient(90deg,var(--bf-emerald),var(--bf-gold));
    color:#fff;border:none;border-radius:13px;
    font-weight:800;font-size:.95rem;
    cursor:pointer;transition:.3s;
    box-shadow:0 10px 26px rgba(5,150,105,.35);
    width:100%;
    position:relative;overflow:hidden;
}
.xuAiBtn::before{
    content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;
    background:linear-gradient(100deg,transparent 20%,rgba(255,255,255,.3) 50%,transparent 80%);
    transition:left .6s ease;
}
.xuAiBtn:hover:not(:disabled){
    transform:translateY(-2px);
    filter:brightness(1.08);
    box-shadow:0 14px 32px rgba(5,150,105,.45);
}
.xuAiBtn:hover:not(:disabled)::before{left:120%}
.xuAiBtn:disabled{opacity:.6;cursor:not-allowed}
.xuAiBtn i{font-size:1rem}

.xuAiStatus{
    display:none;margin-top:16px;
    padding:14px 18px;border-radius:12px;
    font-size:.88rem;font-weight:600;line-height:1.5;
}
.xuAiStatus.show{
    display:flex;align-items:flex-start;gap:10px;
    animation:xuAiFadeIn .4s ease;
}
@keyframes xuAiFadeIn{from{opacity:0;transform:translateY(6px)}to{opacity:1;transform:none}}

.xuAiStatus.info{
    background:rgba(8,145,178,.1);
    color:var(--bf-teal);
    border:1.5px solid rgba(8,145,178,.3);
}
.xuAiStatus.success{
    background:rgba(5,150,105,.1);
    color:var(--bf-emerald);
    border:1.5px solid rgba(5,150,105,.3);
}
.xuAiStatus.error{
    background:rgba(239,68,68,.1);
    color:#dc2626;
    border:1.5px solid rgba(239,68,68,.3);
}
html.xu-dark .xuAiStatus.info{background:rgba(8,145,178,.15);color:var(--bf-mint);border-color:rgba(8,145,178,.4)}
html.xu-dark .xuAiStatus.success{background:rgba(5,150,105,.15);color:var(--bf-mint);border-color:rgba(5,150,105,.4)}
html.xu-dark .xuAiStatus.error{background:rgba(239,68,68,.15);color:#fca5a5;border-color:rgba(239,68,68,.4)}

.xuAiStatus i{font-size:1.1rem;flex-shrink:0;margin-top:2px}
.xuAiStatus .status-text{flex:1}

.xuAiSpinner{
    display:inline-block;width:14px;height:14px;
    border:2.5px solid rgba(245,158,11,.3);
    border-top-color:var(--bf-gold);
    border-radius:50%;
    animation:xuAiSpin 1s linear infinite;
}
@keyframes xuAiSpin{to{transform:rotate(360deg)}}

/* ===== DUPLIKAT BOX ===== */
#xuDupBox{
    display:none;margin-top:12px;
    padding:14px 16px;border-radius:12px;
    background:rgba(245,158,11,.08);
    border:1.5px solid rgba(245,158,11,.45);
}
html.xu-dark #xuDupBox{background:rgba(245,158,11,.12);border-color:rgba(245,158,11,.5)}

/* ===== TOPIC CHIPS ===== */
#xuTopikChips{
    display:none;margin-top:12px;
    padding:14px 16px;border-radius:12px;
    background:rgba(5,150,105,.05);
    border:1.5px dashed rgba(5,150,105,.4);
}
html.xu-dark #xuTopikChips{background:rgba(5,150,105,.1);border-color:rgba(5,150,105,.4)}

/* Inline AI buttons (suggest topics, generate english) */
.xuFormBody .control-label button.btn{
    background:linear-gradient(90deg,var(--bf-emerald),var(--bf-gold))!important;
    color:#fff!important;border:none!important;
    border-radius:8px!important;
    font-weight:700!important;
    padding:5px 14px!important;
    font-size:.72rem!important;
    transition:.25s!important;
    position:relative;overflow:hidden;
    box-shadow:0 4px 12px rgba(5,150,105,.25);
}
.xuFormBody .control-label button.btn#xuBtnEn{
    background:linear-gradient(90deg,var(--bf-teal),var(--bf-mint))!important;
    box-shadow:0 4px 12px rgba(8,145,178,.25);
}
.xuFormBody .control-label button.btn:hover{
    transform:translateY(-1px);
    filter:brightness(1.08);
    box-shadow:0 6px 16px rgba(5,150,105,.35);
}

/* Validasi text-danger */
.validasi.text-danger{
    font-size:.78rem;font-weight:600;
    color:#dc2626;margin-top:4px;display:block;
}

/* ===== RESPONSIVE ===== */
@media(max-width:720px){
    .xuFormBody{padding:20px 16px}
    .xuFormHead{padding:18px 20px}
    .xuFormHead h2{font-size:1.15rem}
    .xuAiHead{padding:18px 20px}
    .xuAiHead h2{font-size:1.1rem}
    .wizard_horizontal ul.wizard_steps li a{padding:11px 14px;gap:8px}
    .wizard_horizontal .step_no{width:28px;height:28px;font-size:.85rem}
    .wizard_horizontal .step_descr{font-size:.82rem}
    .actionBar{gap:8px}
    .actionBar a,.actionBar button{padding:9px 16px;font-size:.82rem}
}
</style>

<!-- ============ PANEL AI EKSTRAKSI ============ -->
<div class="xuAiPanel xuR">
    <div class="xuAiHead">
        <h2><i class="fa fa-magic"></i> Katalogisasi Otomatis AI</h2>
        <div class="xuAiBadge"><span class="dot"></span> Gemini 2.5</div>
    </div>
    <div class="xuAiBody">
        <div class="xuAiDropzone" id="xuAiDrop">
            <input type="file" id="xuAiFile" accept="application/pdf">
            <div class="icon"><i class="fa fa-file-pdf-o"></i></div>
            <h4>Unggah PDF Tesis / Disertasi</h4>
            <p>Seret & letakkan file di sini, atau klik untuk memilih. AI akan membaca halaman judul, abstrak, dan metadata.</p>
            <div class="xuAiBtn" style="width:auto;padding:9px 22px;font-size:.85rem;pointer-events:none">
                <i class="fa fa-cloud-upload"></i> Pilih File PDF
            </div>
            <p style="margin-top:12px;font-size:.75rem;color:var(--bf-soft)"><i class="fa fa-info-circle"></i> Maksimal 20MB • Hanya PDF</p>
        </div>

        <div class="xuAiFileInfo" id="xuAiFileInfo">
            <div class="file-icon"><i class="fa fa-file-pdf-o"></i></div>
            <div class="file-name" id="xuAiFileName">file.pdf</div>
            <div class="file-size" id="xuAiFileSize">0 KB</div>
            <button type="button" class="file-remove" id="xuAiFileRemove" title="Hapus file"><i class="fa fa-times"></i></button>
        </div>

        <button type="button" class="xuAiBtn" id="xuAiExtractBtn" disabled>
            <i class="fa fa-magic"></i> <span>Ekstrak Metadata Otomatis</span>
        </button>

        <div class="xuAiStatus" id="xuAiStatus">
            <i class="fa fa-info-circle"></i>
            <div class="status-text"></div>
        </div>
    </div>
</div>

<!-- ============ KARTU FORM UTAMA ============ -->
<div class="xuFormCard xuR">
    <div class="xuFormHead">
        <h2><i class="fa fa-plus-circle"></i> Add New Bibliography</h2>
    </div>
    <div class="xuFormBody">
        <div id="wizardus" class="form_wizard wizard_horizontal">
            <ul class="wizard_steps">
                <li>
                    <a href="#step-1">
                        <span class="step_no">1</span>
                        <span class="step_descr">GMD</span>
                    </a>
                </li>
                <li>
                    <a href="#step-2">
                        <span class="step_no">2</span>
                        <span class="step_descr">Bibliography</span>
                    </a>
                </li>
                <li>
                    <a href="#step-3">
                        <span class="step_no">3</span>
                        <span class="step_descr">Approval</span>
                    </a>
                </li>
            </ul>
            <form class="form-horizontal" action="<?= base_url('bibliography/save') ?>" method="POST" enctype="multipart/form-data" id="form-bibliography">
                <div id="step-1">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="gmd" class="control-label">Gmd Type</label>
                                <select class="form-control select2add" style="width: 100%" data-type="gmd" name="gmd" id="gmd">
                                    <option value="" disabled hidden selected></option>
                                    <?php foreach ($mst_data['mst_gmd'] as $val): ?>
                                        <option value="<?= $val->gmd_id ?>"><?= $val->gmd_name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="step-2">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="item_type" class="control-label">Item Type</label>
                            <select class="form-control select2add" style="width: 100%" data-type="item_type" name="item_type" id="item_type">
                                <option value="" disabled hidden selected></option>
                                <?php foreach ($mst_data['mst_item_type'] as $val): ?>
                                    <option value="<?= $val->item_type_id ?>"><?= $val->item_type_name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title" class="control-label">Title <span class="required">*</span></label>
                            <textarea name="title" class="form-control" id="title" required></textarea>
                            <span class="validasi text-danger"></span>
                            <!-- FITUR #2: Detektor Duplikat -->
                            <div id="xuDupBox">
                                <div style="display:flex;align-items:center;gap:8px;font-weight:800;color:#b45309;font-size:.85rem;margin-bottom:10px;">
                                    <i class="fa fa-exclamation-triangle"></i> Kemungkinan Duplikat Terdeteksi — periksa sebelum menyimpan
                                </div>
                                <div id="xuDupList"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="author" class="control-label">Author</label>
                            <select class="form-control select2add" style="width: 100%" data-type="author" name="author[]" id="author" multiple>
                                <?php foreach ($mst_data['mst_authors'] as $val): ?>
                                    <option value="<?= $val->author_id ?>"><?= $val->author_name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="student_id" class="control-label">Student Id</label>
                            <input class="form-control" type="text" name="student_id" id="student_id" value="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cp_email" class="control-label">Contact Email</label>
                            <input class="form-control" type="email" name="cp_email" id="cp_email" value="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="supervisor" class="control-label">Supervisor</label>
                        <div class="form-group">
                            <select class="form-control select2add" style="width: 100%" data-type="supervisor" name="supervisor[]" id="supervisor" multiple>
                                <?php foreach ($mst_data['mst_supervisor'] as $val): ?>
                                    <option value="<?= $val->supervisor_id ?>"><?= $val->supervisor_name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="examiner" class="control-label">Examiner</label>
                        <div class="form-group">
                            <select class="form-control select2add" style="width: 100%" data-type="examiner" name="examiner[]" id="examiner" multiple>
                                <?php foreach ($mst_data['mst_examiner'] as $val): ?>
                                    <option value="<?= $val->examiner_id ?>"><?= $val->examiner_name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="contributor" class="control-label">Contributor</label>
                            <select class="form-control select2add" style="width: 100%" data-type="contributor" name="contributor[]" id="contributor" multiple>
                                <?php foreach ($mst_data['mst_contributor'] as $val): ?>
                                    <option value="<?= $val->contributor_id ?>"><?= $val->contributor_name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ministry" class="control-label">Code Ministry Pddikti</label>
                            <select class="form-control select2" name="ministry" id="ministry">
                                <?php foreach ($mst_data['mst_ministry'] as $val): ?>
                                    <option value="<?= $val->code_ministry ?>"><?= $val->name_prodi ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="place" class="control-label">Publishing Place</label>
                            <select class="form-control select2add" style="width: 100%" data-type="place" name="place" id="place">
                                <option value="" disabled hidden selected></option>
                                <?php foreach ($mst_data['mst_place'] as $val): ?>
                                    <option value="<?= $val->place_id ?>"><?= $val->place_name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="edition" class="control-label">Date Type</label>
                            <select class="form-control" name="edition" id="edition">
                                <option value="0">Pilih</option>
                                <option value="Published">Published</option>
                                <option value="In Press">In Press</option>
                                <option value="Submitted">Submitted</option>
                                <option value="Unpublished">Unpublished</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="collation" class="control-label">Collation</label>
                            <input class="form-control" type="text" name="collation" id="collation" value="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="specDetailInfo" class="control-label">Specific Detail Info</label>
                            <input class="form-control" type="text" name="specDetailInfo" id="specDetailInfo" value="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="language" class="control-label">Language</label>
                            <select class="form-control select2add" style="width: 100%" data-type="language" name="language" id="language">
                                <option value="" disabled hidden selected></option>
                                <?php foreach ($mst_data['mst_language'] as $val): ?>
                                    <option value="<?= $val->language_id ?>"><?= $val->language_name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="departement" class="control-label">Department</label>
                            <input class="form-control" type="text" name="departement" id="departement" value="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="copyright" class="control-label">Copyright</label>
                            <select class="form-control select2add" style="width: 100%" data-type="copyright" name="copyright" id="copyright">
                                <option value="" disabled hidden selected></option>
                                <?php foreach ($mst_data['mst_copyright'] as $val): ?>
                                    <option value="<?= $val->copyright_id ?>"><?= $val->copyright_name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="publisher" class="control-label">Publisher</label>
                            <select class="form-control select2add" style="width: 100%" data-type="publisher" name="publisher" id="publisher">
                                <option value="" disabled hidden selected></option>
                                <?php foreach ($mst_data['mst_publisher'] as $val): ?>
                                    <option value="<?= $val->publisher_id ?>"><?= $val->publisher_name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="license" class="control-label">License</label>
                            <select class="form-control select2add" style="width: 100%" data-type="license" name="license" id="license">
                                <option value="" disabled hidden selected></option>
                                <?php foreach ($mst_data['mst_license'] as $val): ?>
                                    <option value="<?= $val->license_id ?>"><?= $val->license_name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="year" class="control-label">Publish Year</label>
                            <input class="form-control" type="text" name="year" id="year" value="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="image" class="control-label">Upload Image</label>
                            <input type="file" class="form-control" name="image" id="image" value="">
                            <small class="form-text text-danger">Maximum 500 KB</small>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Attachment</label>
                            <span id="tambahin">
                                <div class="row">
                                    <div class="col-md-2">
                                        <input type="text" name="title_file[]" placeholder="File Title" class="form-control">
                                    </div>
                                    <div class="col-md-1">
                                        <input type="text" name="url_file[]" placeholder="File URL" class="form-control">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" name="desk_file[]" placeholder="File Description" class="form-control">
                                    </div>
                                    <div class="col-md-2">
                                        <select id="acc_type" class="form-control" name="akses_file[]">
                                            <option value="private">private</option>
                                            <option value="public">public</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <select id="acc_member" class="form-control" name="akses_member[]">
                                            <option value="0" selected>Limit Member</option>
                                            <option value="1">All Member</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="file" name="attc_file[]" placeholder="File" class="form-control" onchange="return validExt(this,2097152,['pdf'])" accept="application/pdf">
                                        <small class="form-text text-danger">Max PDF size 50 MB</small>
                                    </div>
                                    <div class="col-sm-1">
                                        <button type="button" class="btn btn-success btn-block" id="addRow"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="topic" class="control-label">Subject
                                <button type="button" id="xuBtnTopik" class="btn btn-sm">
                                    <i class="fa fa-magic"></i> Sarankan Subyek (AI)
                                </button>
                            </label>
                            <select class="form-control select2" name="topic[]" id="topic" multiple>
                                <?php foreach ($mst_data['mst_topic'] as $val): ?>
                                    <option value="<?= $val->topic_id ?>"><?= $val->topic ?></option>
                                <?php endforeach; ?>
                            </select>
                            <!-- FITUR #4: chip saran subyek -->
                            <div id="xuTopikChips">
                                <div style="font-size:.75rem;color:var(--bf-muted);font-weight:700;margin-bottom:8px;"><i class="fa fa-lightbulb-o"></i> Klik chip untuk menambahkan ke Subject:</div>
                                <div id="xuTopikList" style="display:flex;flex-wrap:wrap;gap:8px;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="notes" class="control-label">Abstract</label>
                            <textarea class="form-control" name="notes" id="notes"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="notes_en" class="control-label">Abstract (English)
                                <button type="button" id="xuBtnEn" class="btn btn-sm">
                                    <i class="fa fa-globe"></i> Generate dari Abstrak
                                </button>
                            </label>
                            <textarea class="form-control" name="notes_en" id="notes_en" placeholder="Klik 'Generate dari Abstrak' untuk membuat terjemahan Inggris otomatis — atau ketik manual..."></textarea>
                            <small class="form-text">Tersimpan permanen & langsung dipakai di halaman publik (tombol Terjemahkan → instan).</small>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="class" class="control-label">
                                Classification
                                <button type="button" id="xuBtnDdc" class="btn btn-sm">
                                    <i class="fa fa-magic"></i> Saran DDC (AI)
                                </button>
                            </label>
                            <input class="form-control" type="text" name="class" id="class" value="">
                            <small class="form-text">Contoh: 370.193 (Dewey Decimal Classification)</small>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="callNumber" class="control-label">Call Num.</label>
                            <input class="form-control" type="text" name="callNumber" id="callNumber" value="">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="urlcrossref" class="control-label">Url Crossref</label>
                            <input class="form-control" type="text" name="urlcrossref" id="urlcrossref" value="">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="sendMail" class="control-label">Send Email Approved</label>
                            <select class="form-control" name="sendMail" id="sendMail">
                                <option value="0">Pilih</option>
                                <option value="Send">Send</option>
                                <option value="Not Send">Not Send</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div id="step-3">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="form-group" id="approvalSection">
                                <i class="glyphicon glyphicon-ok-sign" style="font-size: 50pt; color: var(--bf-emerald);"></i>
                                <h1>Congratulations</h1>
                                <p>The data is complete, you can now press the save button to save the data.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function(){
    // ===== Fade-in reveal =====
    var io = new IntersectionObserver(function(es){
        es.forEach(function(en){
            if (en.isIntersecting){
                en.target.classList.add('in');
                io.unobserve(en.target);
            }
        });
    }, {threshold: .06});
    document.querySelectorAll('.xuR').forEach(function(el){ io.observe(el); });

    // ===== File input custom wrapper =====
    document.querySelectorAll('input[type=file]').forEach(function(inp){
        if (inp.classList.contains('xuFileInput')) return;
        if (inp.id === 'xuAiFile') return;
        inp.classList.add('xuFileInput');

        var inAttachment = inp.closest('#tambahin') || inp.closest('.attachment-row');
        var compact = !!inAttachment;

        var wrap = document.createElement('div');
        wrap.className = 'xuFileWrap' + (compact ? ' xuCompact' : '');

        var btn = document.createElement('label');
        btn.className = 'xuFileBtn';
        btn.innerHTML = '<i class="fa fa-cloud-upload"></i> <span class="btnlbl">Choose File</span>';
        btn.setAttribute('for', inp.id || ('xufile_' + Math.random().toString(36).substr(2, 9)));
        if (!inp.id) inp.id = btn.getAttribute('for');

        var name = document.createElement('span');
        name.className = 'xuFileName';
        name.textContent = 'No file chosen';

        inp.parentNode.insertBefore(wrap, inp);
        wrap.appendChild(btn);
        wrap.appendChild(name);
        wrap.appendChild(inp);

        inp.addEventListener('change', function(){
            if (inp.files && inp.files.length > 0){
                var n = inp.files[0].name;
                var short = n.length > 18 ? n.substr(0, 15) + '...' : n;
                name.textContent = short;
                name.classList.add('has-file');
                if (compact){
                    btn.classList.add('has-file');
                    btn.title = n;
                    btn.querySelector('.btnlbl').textContent = short;
                }
            } else {
                name.textContent = 'No file chosen';
                name.classList.remove('has-file');
                if (compact){
                    btn.classList.remove('has-file');
                    btn.title = '';
                    btn.querySelector('.btnlbl').textContent = 'Choose File';
                }
            }
        });
    });
});

// ============ FITUR #1: KATALOGISASI AI v2 ============
(function(){
    var drop = document.getElementById('xuAiDrop');
    var fileInp = document.getElementById('xuAiFile');
    var fileInfo = document.getElementById('xuAiFileInfo');
    var fileName = document.getElementById('xuAiFileName');
    var fileSize = document.getElementById('xuAiFileSize');
    var fileRemove = document.getElementById('xuAiFileRemove');
    var extractBtn = document.getElementById('xuAiExtractBtn');
    var statusBox = document.getElementById('xuAiStatus');
    if (!drop) return;

    var currentFile = null;

    function showStatus(msg, type, icon){
        statusBox.className = 'xuAiStatus show ' + type;
        statusBox.querySelector('i').className = 'fa fa-' + (icon || 'info-circle');
        statusBox.querySelector('.status-text').innerHTML = msg;
    }
    function hideStatus(){ statusBox.className = 'xuAiStatus'; }
    function formatSize(b){
        if (b < 1024) return b + ' B';
        if (b < 1048576) return (b / 1024).toFixed(1) + ' KB';
        return (b / 1048576).toFixed(2) + ' MB';
    }

    function handleFile(f){
        if (!f) return;
        if (f.type !== 'application/pdf'){
            showStatus('Hanya file PDF yang diterima', 'error', 'exclamation-triangle');
            fileInp.value = ''; return;
        }
        if (f.size > 20 * 1024 * 1024){
            showStatus('Ukuran file maksimal 20MB', 'error', 'exclamation-triangle');
            fileInp.value = ''; return;
        }
        currentFile = f;
        fileName.textContent = f.name;
        fileSize.textContent = formatSize(f.size);
        fileInfo.classList.add('show');
        extractBtn.disabled = false;
        hideStatus();
    }
    function clearFile(){
        currentFile = null;
        fileInp.value = '';
        fileInfo.classList.remove('show');
        extractBtn.disabled = true;
        hideStatus();
    }

    fileInp.addEventListener('change', function(){ handleFile(this.files[0]); });
    fileRemove.addEventListener('click', clearFile);
    drop.addEventListener('dragover', function(e){ e.preventDefault(); drop.classList.add('dragover'); });
    drop.addEventListener('dragleave', function(){ drop.classList.remove('dragover'); });
    drop.addEventListener('drop', function(e){
        e.preventDefault(); drop.classList.remove('dragover');
        if (e.dataTransfer.files.length) handleFile(e.dataTransfer.files[0]);
    });

    function findOptionByLabel(sel, label){
        var key = String(label).toLowerCase().trim();
        for (var i = 0; i < sel.options.length; i++){
            if (sel.options[i].text.toLowerCase().trim() === key) return sel.options[i];
        }
        return null;
    }

    function createViaAddOpti(type, name){
        return new Promise(function(resolve){
            $.ajax({
                url: baseUrl + 'bibliography/addopti',
                method: 'POST',
                data: { name: name, tbl: type },
                success: function(resp){
                    if (resp && resp.status === 'success' && resp.data && resp.data.id !== undefined && String(resp.data.id) !== ''){
                        resolve({ id: String(resp.data.id), text: resp.data.val });
                    } else resolve(null);
                },
                error: function(){ resolve(null); }
            });
        });
    }

    function ensureOption(sel, type, label){
        return new Promise(function(resolve){
            if (!sel || !label) return resolve(false);
            var ex = findOptionByLabel(sel, label);
            if (ex){ ex.selected = true; return resolve(true); }
            createViaAddOpti(type, String(label)).then(function(res){
                if (res){ sel.appendChild(new Option(res.text, res.id, true, true)); resolve(true); }
                else resolve(false);
            });
        });
    }

    function setText(id, val){
        if (!val) return false;
        var el = document.getElementById(id);
        if (el && !el.value){ el.value = val; return true; }
        return false;
    }

    function attachPdfToForm(file, titleText){
        var attc = document.querySelector('#tambahin input[type="file"][name="attc_file[]"]');
        if (!attc || !file) return false;
        
        try {
            // 1. Masukkan file ke input secara programatik
            var dt = new DataTransfer();
            dt.items.add(file);
            attc.files = dt.files;
            
            // 2. Update UI secara manual agar file terlihat, TANPA memicu onchange (menghindari error validExt)
            var wrap = attc.parentNode;
            var nameSpan = wrap.querySelector('.xuFileName');
            var btn = wrap.querySelector('.xuFileBtn');
            
            if (nameSpan && btn) {
                var short = file.name.length > 18 ? file.name.substr(0, 15) + '...' : file.name;
                nameSpan.textContent = short;
                nameSpan.classList.add('has-file');
                btn.classList.add('has-file');
                btn.title = file.name;
                var btnlbl = btn.querySelector('.btnlbl');
                if (btnlbl) btnlbl.textContent = short;
            }
        } catch(e){ 
            console.error("❌ Gagal attach file:", e);
            return false; 
        }
        
        // 3. Isi field pendukung di baris attachment yang sama
        var row = attc.closest('.row');
        if (row){
            var t = row.querySelector('input[name="title_file[]"]');
            if (t && !t.value) t.value = String(titleText || file.name).substring(0, 90);
            
            var d = row.querySelector('input[name="desk_file[]"]');
            if (d && !d.value) d.value = 'Dokumen penuh — diunggah otomatis oleh AI';
            
            var a = row.querySelector('select[name="akses_file[]"]');
            if (a) a.value = 'public';
        }
        
        console.log("✅ File PDF berhasil di-attach dan UI diperbarui");
        return true;
    }

    extractBtn.addEventListener('click', function(){
        if (!currentFile) return;
        
        extractBtn.disabled = true;
        extractBtn.innerHTML = '<span class="xuAiSpinner"></span> <span>AI sedang membaca PDF... (15-30 detik)</span>';
        showStatus('Menganalisis dokumen dengan Gemini. Mohon tunggu 15-30 detik...', 'info', 'spinner');

        var fd = new FormData();
        fd.append('pdf_file', currentFile);

        fetch(baseUrl + 'bibliography/extract-ai', { method: 'POST', body: fd })
            .then(function(r){ 
                console.log("📡 Status Response Server:", r.status);
                return r.json().catch(function(e){ 
                    console.error("❌ Error Parse JSON:", e);
                    return {ok: false, error: 'Respons tidak valid'}; 
                }); 
            })
            .then(function(j){
                console.log(" DATA LENGKAP DARI SERVER:", j);
                
                if (!j.ok){
                    extractBtn.disabled = false;
                    extractBtn.innerHTML = '<i class="fa fa-magic"></i> <span>Ekstrak Metadata Otomatis</span>';
                    showStatus('<strong>Ekstraksi gagal:</strong> ' + (j.error || 'Kesalahan tidak diketahui'), 'error', 'exclamation-triangle');
                    return;
                }

                var d = j.data || {};
                console.log("🔍 Isi data:", d);
                
                var filled = [];

                function setField(id, val) {
                    console.log("👉 Mencoba mengisi ID:", id, "| Nilai:", val);
                    if (!val || String(val).trim() === '') {
                        console.log("   ️ Dilewati: Nilai kosong");
                        return false;
                    }
                    var el = document.getElementById(id);
                    if (el) {
                        el.value = String(val).trim();
                        if (el.tagName === 'TEXTAREA') {
                            el.style.height = 'auto';
                            el.style.height = (el.scrollHeight) + 'px';
                        }
                        console.log("   ✅ BERHASIL!");
                        return true;
                    }
                    console.log("   ❌ GAGAL: ID '" + id + "' tidak ditemukan");
                    return false;
                }

                // ✅ ISI SEMUA FIELD TEKS
                if (setField('title', d.title)) filled.push('Judul');
                if (setField('notes', d.notes)) filled.push('Abstrak');
                if (setField('year', d.publish_year)) filled.push('Tahun');
                if (setField('departement', d.department)) filled.push('Departemen');
                if (setField('student_id', d.student_id)) filled.push('NIM');
                if (setField('collation', d.collation)) filled.push('Kolasi');
                if (setField('class', d.classification)) filled.push('Klasifikasi');

                // ✅ ISI DROPDOWN GMD
                if (d.gmd) {
                    var gmdSel = document.getElementById('gmd');
                    if (gmdSel) {
                        gmdSel.value = String(d.gmd);
                        filled.push('Jenis Karya (GMD)');
                        if (typeof $ !== 'undefined') { try { $(gmdSel).trigger('change'); } catch(e){} }
                    }
                }

                // ✅ ISI DROPDOWN LANGUAGE
                if (d.language) {
                    var langSel = document.getElementById('language');
                    if (langSel) {
                        langSel.value = d.language.toLowerCase();
                        filled.push('Bahasa');
                        if (typeof $ !== 'undefined') { try { $(langSel).trigger('change'); } catch(e){} }
                    }
                }

                // ✅ PROSES FIELD ARRAY (Author, Supervisor, Subject)
                var jobs = [];
                function group(selId, type, values, label){
                    var sel = document.getElementById(selId);
                    if (!sel || !values || !Array.isArray(values) || values.length === 0) return;
                    values.forEach(function(v){
                        jobs.push(ensureOption(sel, type, v).then(function(ok){
                            if (ok && filled.indexOf(label) === -1) filled.push(label);
                        }));
                    });
                }
                
                group('author', 'author', d.authors, 'Penulis');
                group('supervisor', 'supervisor', d.supervisors, 'Pembimbing');
                group('topic', 'topic', d.subjects, 'Subyek');

                // ✅ CATATAN: Fallback abstrak manual dihapus karena variabel 'textToAnalyze'
                // hanya tersedia di backend PHP. Abstrak sepenuhnya bergantung pada
                // AI (Gemini) atau fallback lokal heuristik di controller.

                Promise.all(jobs).then(function(){
                    ['author', 'supervisor', 'topic'].forEach(function(id){
                        var sel = document.getElementById(id);
                        if (sel && typeof $ !== 'undefined'){ 
                            try { $(sel).trigger('change'); } catch(e){} 
                        }
                    });

                    var attached = attachPdfToForm(currentFile, d.title);
                    if (attached) filled.push('Lampiran PDF');

                    extractBtn.disabled = false;
                    extractBtn.innerHTML = '<i class="fa fa-magic"></i> <span>Ekstrak Metadata Otomatis</span>';
                    
                    var successMsg = filled.length > 0 
                        ? '<strong>Sukses!</strong> Terisi otomatis: ' + filled.join(', ') + '. Silakan verifikasi.' 
                        : '<strong>Selesai.</strong> Namun tidak ada field yang terisi. Buka Console (F12) untuk lihat log.';
                    if (j.warning) successMsg += '<br><small>⚠️ ' + j.warning + '</small>';
                    
                    showStatus(successMsg, 'success', 'check-circle');
                    
                    setTimeout(function(){
                        var w = document.getElementById('wizardus');
                        if (w) w.scrollIntoView({behavior: 'smooth', block: 'start'});
                    }, 800);
                });
            })
            .catch(function(err){
                console.error("❌ Fetch Error:", err);
                extractBtn.disabled = false;
                extractBtn.innerHTML = '<i class="fa fa-magic"></i> <span>Ekstrak Metadata Otomatis</span>';
                showStatus('<strong>Gagal terhubung:</strong> ' + err.message, 'error', 'exclamation-triangle');
            });
    });
})();
</script>

<script>
// ============ FITUR #2: DETEKTOR DUPLIKAT CERDAS ============
document.addEventListener('DOMContentLoaded', function(){
    var titleEl = document.getElementById('title');
    var box = document.getElementById('xuDupBox');
    var list = document.getElementById('xuDupList');
    if (!titleEl || !box || !list) return;

    var last = '';

    function render(items){
        if (!items || !items.length){ box.style.display = 'none'; list.innerHTML = ''; return; }
        box.style.display = 'block';
        var html = '';
        items.forEach(function(it){
            var lvl = it.score >= 70 ? '#dc2626' : (it.score >= 50 ? '#d97706' : '#64748b');
            var safe = String(it.title).replace(/&/g, '&amp;').replace(/</g, '&lt;');
            html += '<div style="display:flex;align-items:center;gap:10px;padding:8px 10px;border-radius:9px;background:rgba(255,255,255,.65);margin-bottom:6px;">'
                + '<span style="min-width:52px;text-align:center;padding:4px 8px;border-radius:8px;background:' + lvl + ';color:#fff;font-weight:800;font-size:.75rem;">' + it.score + '%</span>'
                + '<span style="flex:1;color:#0f172a;font-weight:600;font-size:.83rem;line-height:1.4;">' + safe + '</span>'
                + '<a href="' + baseUrl + 'bibliography/edit?bbi=' + encodeURIComponent(it.enc) + '" target="_blank" style="color:#059669;font-weight:700;font-size:.75rem;white-space:nowrap;">Lihat <i class="fa fa-external-link"></i></a>'
                + '</div>';
        });
        list.innerHTML = html;
    }

    setInterval(function(){
        if (typeof $ === 'undefined') return;
        var val = titleEl.value.trim();
        if (val === last) return;
        last = val;
        if (val.length < 8){ box.style.display = 'none'; list.innerHTML = ''; return; }
        $.ajax({
            url: baseUrl + 'bibliography/check-duplicate',
            method: 'POST',
            data: { title: val },
            success: function(j){
                if (j && j.ok) render(j.results);
            }
        });
    }, 1500);
});
</script>

<script>
// ============ FITUR #3: ABSTRAK INGGRIS OTOMATIS ============
document.addEventListener('DOMContentLoaded', function(){
    var btn = document.getElementById('xuBtnEn');
    var src = document.getElementById('notes');
    var out = document.getElementById('notes_en');
    if (!btn || !src || !out) return;

    btn.addEventListener('click', function(){
        var text = src.value.trim();
        if (!text){ alert('Isi abstrak Indonesia terlebih dahulu (atau jalankan Ekstrak AI).'); return; }
        btn.disabled = true;
        btn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Menerjemahkan...';
        fetch('https://translate.googleapis.com/translate_a/single?client=gtx&sl=id&tl=en&dt=t&q=' + encodeURIComponent(text.substring(0, 5000)))
            .then(function(r){ if (!r.ok) throw 0; return r.json(); })
            .then(function(j){
                var s = '';
                if (Array.isArray(j) && Array.isArray(j[0])) j[0].forEach(function(g){ if (g && g[0]) s += g[0]; });
                if (!s) throw 0;
                out.value = s.trim();
                btn.disabled = false;
                btn.innerHTML = '<i class="fa fa-refresh"></i> Perbarui Terjemahan';
            })
            .catch(function(){
                btn.disabled = false;
                btn.innerHTML = '<i class="fa fa-globe"></i> Generate dari Abstrak';
                alert('Terjemahan gagal. Periksa koneksi internet, coba lagi.');
            });
    });
});
</script>

<script>
// ============ FITUR #4: SUGGESTER SUBYEK AI ============
document.addEventListener('DOMContentLoaded', function(){
    var btn = document.getElementById('xuBtnTopik');
    var wrap = document.getElementById('xuTopikChips');
    var list = document.getElementById('xuTopikList');
    var sel = document.getElementById('topic');
    var titleEl = document.getElementById('title');
    var absEl = document.getElementById('notes');
    if (!btn || !list || !sel) return;

    function escT(s){ return String(s).replace(/&/g, '&amp;').replace(/</g, '&lt;'); }

    function findOptionByLabel(label){
        var key = String(label).toLowerCase().trim();
        for (var i = 0; i < sel.options.length; i++){
            if (sel.options[i].text.toLowerCase().trim() === key) return sel.options[i];
        }
        return null;
    }
    function createViaAddOpti(name){
        return new Promise(function(resolve){
            $.ajax({
                url: baseUrl + 'bibliography/addopti', method: 'POST',
                data: { name: name, tbl: 'topic' },
                success: function(r){
                    (r && r.status === 'success' && r.data && String(r.data.id) !== '')
                        ? resolve({id: String(r.data.id), text: r.data.val})
                        : resolve(null);
                },
                error: function(){ resolve(null); }
            });
        });
    }
    function markAdded(chip, label){
        chip.style.background = 'rgba(5,150,105,.15)';
        chip.style.borderColor = 'rgba(5,150,105,.5)';
        chip.style.color = '#059669';
        chip.style.cursor = 'default';
        chip.innerHTML = '<i class="fa fa-check"></i> ' + escT(label);
        chip.disabled = true;
    }
    function addTopic(label, chip){
        var ex = findOptionByLabel(label);
        if (ex){
            ex.selected = true;
            if (typeof $ !== 'undefined'){ try { $(sel).trigger('change'); } catch(e){} }
            markAdded(chip, label);
            return;
        }
        createViaAddOpti(label).then(function(res){
            if (res){
                sel.appendChild(new Option(res.text, res.id, true, true));
                if (typeof $ !== 'undefined'){ try { $(sel).trigger('change'); } catch(e){} }
            }
            markAdded(chip, label);
        });
    }

    btn.addEventListener('click', function(){
        var t = titleEl ? titleEl.value.trim() : '';
        var a = absEl ? absEl.value.trim() : '';
        if (a.length < 20 && t.length < 5){ alert('Isi judul/abstrak terlebih dahulu (atau jalankan Ekstrak AI).'); return; }
        btn.disabled = true;
        btn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Menganalisis...';
        var fd = new FormData();
        fd.append('title', t);
        fd.append('abstract', a);
        fetch(baseUrl + 'bibliography/suggest-topics', { method: 'POST', body: fd })
            .then(function(r){ return r.json(); })
            .then(function(j){
                btn.disabled = false;
                btn.innerHTML = '<i class="fa fa-magic"></i> Sarankan Subyek (AI)';
                if (!j.ok){ alert('Gagal: ' + (j.error || 'kesalahan tidak diketahui')); return; }
                wrap.style.display = 'block';
                list.innerHTML = '';
                j.topics.forEach(function(tp){
                    var b = document.createElement('button');
                    b.type = 'button';
                    b.style.cssText = 'display:inline-flex;align-items:center;gap:7px;padding:7px 14px;border-radius:999px;background:linear-gradient(90deg,rgba(5,150,105,.12),rgba(245,158,11,.1));border:1.5px solid rgba(5,150,105,.4);color:#059669;font-weight:700;font-size:.8rem;cursor:pointer;transition:.2s;';
                    b.innerHTML = '<i class="fa fa-plus"></i> ' + escT(tp);
                    b.addEventListener('click', function(){ addTopic(tp, b); });
                    list.appendChild(b);
                });
            })
            .catch(function(){
                btn.disabled = false;
                btn.innerHTML = '<i class="fa fa-magic"></i> Sarankan Subyek (AI)';
                alert('Gagal terhubung ke server.');
            });
    });

    // ✅ FITUR #5: AUTO-DDC CLASSIFICATION
    var btnDdc = document.getElementById('xuBtnDdc');
    if (btnDdc) {
        btnDdc.addEventListener('click', function() {
            var title = document.getElementById('title')?.value || '';
            var abstract = document.getElementById('notes')?.value || '';
            var dept = document.getElementById('departement')?.value || '';
            
            if (!title && !abstract) {
                alert('Isi judul atau abstrak terlebih dahulu');
                return;
            }
            
            var btn = this;
            btn.disabled = true;
            btn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Menganalisis...';
            
            var fd = new FormData();
            fd.append('title', title);
            fd.append('abstract', abstract);
            fd.append('department', dept);
            
            fetch(baseUrl + 'bibliography/suggest-ddc', { method: 'POST', body: fd })
                .then(function(r) { return r.json(); })
                .then(function(j) {
                    btn.disabled = false;
                    btn.innerHTML = '<i class="fa fa-magic"></i> Saran DDC (AI)';
                    if (!j.ok) { alert(j.error || 'Gagal mendapatkan saran DDC'); return; }
                    
                    var d = j.data;
                    if (d.primary) {
                        document.getElementById('class').value = d.primary;
                        var msg = '✅ DDC Disarankan: ' + d.primary;
                        if (d.primary_label) msg += '\n\n📚 ' + d.primary_label;
                        if (d.explanation) msg += '\n\n💡 ' + d.explanation;
                        if (d.alternatives && d.alternatives.length > 0) {
                            msg += '\n\n📋 Alternatif lain:';
                            d.alternatives.forEach(function(alt) {
                                msg += '\n  • ' + alt.code + ' - ' + alt.label;
                            });
                        }
                        alert(msg);
                    }
                })
                .catch(function() {
                    btn.disabled = false;
                    btn.innerHTML = '<i class="fa fa-magic"></i> Saran DDC (AI)';
                    alert('Gagal terhubung ke server AI');
                });
        });
    }
});
</script>