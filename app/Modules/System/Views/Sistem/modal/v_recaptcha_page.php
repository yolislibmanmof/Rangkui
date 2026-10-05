<style>
/* ================================================================
   DIFOSS RECAPTCHA API KEYS MODAL — EMERALD FOREST EDITION
   ================================================================ */
:root{
    --kc-emerald:#059669; --kc-teal:#0891b2; --kc-gold:#f59e0b;
    --kc-mint:#6ee7b7; --kc-deep:#0a2920;
    --kc-ink:#0f172a; --kc-muted:#64748b; --kc-soft:#94a3b8;
    --kc-danger:#dc2626;
}

#keyCaptcha .modal-dialog{max-width:640px}
#keyCaptcha .modal-content{
    border:none;border-radius:20px;overflow:hidden;
    box-shadow:0 30px 70px rgba(0,0,0,.5);
    border:1px solid rgba(5,150,105,.2);
}
html.xu-dark #keyCaptcha .modal-content{background:#0f1e1f;border-color:rgba(5,150,105,.3)}

#keyCaptcha .modal-header{
    background:linear-gradient(90deg,var(--kc-emerald),var(--kc-teal),var(--kc-gold),var(--kc-emerald));
    background-size:200% 100%;
    animation:xuKcGrad 7s linear infinite;
    padding:20px 26px;border:none;color:#fff;
    position:relative;overflow:hidden;
}
#keyCaptcha .modal-header::after{
    content:'';position:absolute;top:-50%;right:-8%;
    width:200px;height:200px;border-radius:50%;
    background:radial-gradient(circle,rgba(255,255,255,.15),transparent 70%);
    pointer-events:none;
}
@keyframes xuKcGrad{to{background-position:200% 0}}

#keyCaptcha .modal-title{
    display:flex;align-items:center;gap:12px;
    font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1.15rem;color:#fff;
    position:relative;z-index:2;
}
#keyCaptcha .modal-title::before{
    content:"\f084";font-family:FontAwesome;
    width:38px;height:38px;border-radius:11px;
    background:rgba(255,255,255,.18);
    backdrop-filter:blur(8px);
    color:#fff;
    display:inline-flex;align-items:center;justify-content:center;
    box-shadow:inset 0 1px 0 rgba(255,255,255,.2);
}

#keyCaptcha .close{
    color:#fff;opacity:.9;font-size:1.6rem;text-shadow:none;
    width:34px;height:34px;border-radius:10px;
    background:rgba(255,255,255,.15);
    backdrop-filter:blur(8px);
    border:1px solid rgba(255,255,255,.25);
    display:flex;align-items:center;justify-content:center;
    transition:.25s;
    position:relative;z-index:2;
    margin:0;padding:0;
}
#keyCaptcha .close:hover{background:rgba(255,255,255,.28);transform:rotate(90deg)}

#keyCaptcha .modal-body{padding:28px}

#keyCaptcha label.control-label{
    font-weight:800;font-size:.74rem;
    color:var(--kc-ink);
    margin-bottom:8px;display:flex;align-items:center;gap:9px;
    text-transform:uppercase;letter-spacing:.08em;
}
html.xu-dark #keyCaptcha label.control-label{color:#e2e8f0}
#keyCaptcha label.control-label::before{
    content:"\f084";font-family:FontAwesome;
    width:28px;height:28px;border-radius:9px;
    background:linear-gradient(135deg,rgba(5,150,105,.15),rgba(245,158,11,.08));
    color:var(--kc-emerald);
    display:inline-flex;align-items:center;justify-content:center;
    font-size:.8rem;
    border:1px solid rgba(5,150,105,.2);
}
html.xu-dark #keyCaptcha label.control-label::before{color:var(--kc-mint);background:linear-gradient(135deg,rgba(5,150,105,.2),rgba(245,158,11,.12));border-color:rgba(5,150,105,.35)}

#keyCaptcha .form-control{
    width:100%;padding:11px 14px;
    border:1.5px solid #cbd5e1;
    border-radius:12px;font-size:.9rem;
    outline:none;background:#f8fafc;
    color:var(--kc-ink);
    box-shadow:inset 0 1px 3px rgba(15,23,42,.05);
    transition:.25s;
    font-family:'JetBrains Mono',monospace;
    font-weight:700;letter-spacing:.03em;
    box-sizing:border-box;
}
#keyCaptcha .form-control:hover{
    border-color:var(--kc-emerald);
    background:rgba(5,150,105,.04);
}
#keyCaptcha .form-control:focus{
    border-color:var(--kc-emerald);
    background:#fff;
    box-shadow:0 0 0 4px rgba(5,150,105,.12);
}
html.xu-dark #keyCaptcha .form-control{background:rgba(255,255,255,.05);border-color:rgba(5,150,105,.25);color:#f1f5f9}
html.xu-dark #keyCaptcha .form-control:hover{background:rgba(5,150,105,.08)}
html.xu-dark #keyCaptcha .form-control:focus{border-color:var(--kc-gold);background:rgba(255,255,255,.08);box-shadow:0 0 0 4px rgba(245,158,11,.15)}

#keyCaptcha .form-group{margin-bottom:20px}

#keyCaptcha .xuKeyWrap{position:relative}
#keyCaptcha .xuKeyWrap .form-control{padding-right:48px}

#keyCaptcha .xuBtnCopy{
    position:absolute;right:8px;top:50%;
    transform:translateY(-50%);
    width:36px;height:36px;border-radius:10px;
    background:linear-gradient(135deg,rgba(5,150,105,.1),rgba(245,158,11,.06));
    border:1.5px solid rgba(5,150,105,.2);
    color:var(--kc-emerald);
    cursor:pointer;transition:.3s;
    display:inline-flex;align-items:center;justify-content:center;
    font-size:.95rem;
}
#keyCaptcha .xuBtnCopy:hover{
    background:linear-gradient(135deg,var(--kc-emerald),var(--kc-gold));
    border-color:transparent;
    color:#fff;
    transform:translateY(-50%) scale(1.08);
    box-shadow:0 6px 14px rgba(5,150,105,.35);
}
#keyCaptcha .xuBtnCopy.copied{
    background:linear-gradient(135deg,var(--kc-emerald),var(--kc-gold))!important;
    border-color:transparent!important;
    color:#fff!important;
    box-shadow:0 6px 14px rgba(5,150,105,.35);
}
html.xu-dark #keyCaptcha .xuBtnCopy{background:rgba(5,150,105,.15);border-color:rgba(5,150,105,.3);color:var(--kc-mint)}
html.xu-dark #keyCaptcha .xuBtnCopy:hover{background:linear-gradient(135deg,var(--kc-emerald),var(--kc-gold));color:#fff}

/* Hint localhost */
#keyCaptcha .xuHint{
    padding:14px 18px;
    background:linear-gradient(135deg,rgba(5,150,105,.08),rgba(245,158,11,.04));
    border:1.5px solid rgba(5,150,105,.25);
    border-radius:12px;
    color:var(--kc-emerald);
    font-size:.84rem;font-weight:600;
    margin-bottom:20px;
    display:flex;gap:11px;align-items:flex-start;
    line-height:1.55;
}
#keyCaptcha .xuHint::before{
    content:"\f05a";font-family:FontAwesome;
    font-size:1.1rem;flex-shrink:0;margin-top:1px;
    color:var(--kc-gold);
}
#keyCaptcha .xuHint a{color:var(--kc-emerald);font-weight:800;border-bottom:2px dotted var(--kc-emerald);text-decoration:none}
#keyCaptcha .xuHint a:hover{color:var(--kc-gold);border-bottom-color:var(--kc-gold)}
html.xu-dark #keyCaptcha .xuHint{
    background:linear-gradient(135deg,rgba(5,150,105,.12),rgba(245,158,11,.06));
    border-color:rgba(5,150,105,.35);
    color:var(--kc-mint);
}
html.xu-dark #keyCaptcha .xuHint a{color:var(--kc-mint);border-bottom-color:var(--kc-mint)}
html.xu-dark #keyCaptcha .xuHint a:hover{color:var(--kc-gold);border-bottom-color:var(--kc-gold)}

#keyCaptcha .modal-footer{
    border-top:1.5px dashed rgba(5,150,105,.15);
    padding:18px 28px;
    display:flex;gap:10px;justify-content:flex-end;
}
html.xu-dark #keyCaptcha .modal-footer{border-top-color:rgba(5,150,105,.25)}

#keyCaptcha .modal-footer .btn-danger{
    background:rgba(5,150,105,.08);
    color:var(--kc-emerald);
    border:1.5px solid rgba(5,150,105,.25);
    border-radius:11px;
    padding:10px 22px;font-weight:700;
    transition:.25s;
    font-family:inherit;
}
#keyCaptcha .modal-footer .btn-danger:hover{
    background:rgba(5,150,105,.14);
    border-color:rgba(5,150,105,.45);
    transform:translateY(-1px);
    color:var(--kc-emerald);
}
html.xu-dark #keyCaptcha .modal-footer .btn-danger{background:rgba(5,150,105,.12);color:var(--kc-mint);border-color:rgba(5,150,105,.3)}
html.xu-dark #keyCaptcha .modal-footer .btn-danger:hover{background:rgba(5,150,105,.18);border-color:rgba(245,158,11,.4);color:var(--kc-mint)}

#keyCaptcha .modal-footer .btn-primary{
    background:linear-gradient(90deg,var(--kc-emerald),var(--kc-gold));
    border:none;border-radius:11px;
    padding:10px 24px;font-weight:800;color:#fff;
    box-shadow:0 8px 22px rgba(5,150,105,.35);
    position:relative;overflow:hidden;
    transition:.3s;
    font-family:inherit;
}
#keyCaptcha .modal-footer .btn-primary::before{
    content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;
    background:linear-gradient(100deg,transparent 20%,rgba(255,255,255,.28) 50%,transparent 80%);
    transition:left .6s ease;
}
#keyCaptcha .modal-footer .btn-primary:hover{transform:translateY(-2px);filter:brightness(1.08);box-shadow:0 12px 28px rgba(5,150,105,.45)}
#keyCaptcha .modal-footer .btn-primary:hover::before{left:120%}

@media(max-width:720px){
    #keyCaptcha .modal-body{padding:20px 18px}
    #keyCaptcha .modal-footer{padding:14px 18px;flex-direction:column}
    #keyCaptcha .modal-footer button{width:100%;margin:0}
}
</style>

<div id="keyCaptcha" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Recaptcha V2 — API Keys</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>

            <form class="form-horizontal form-label-left" action="sistem/pengaturan-sistem/update-key" id="frm-captcha" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <!-- Hint localhost -->
                    <div class="xuHint">
                        <div>Jika dijalankan di <strong>localhost</strong>, Anda tidak perlu mengubah kunci ini. Untuk server online, peroleh kunci baru dari <a href="https://www.google.com/recaptcha" target="_blank">google.com/recaptcha</a>.</div>
                    </div>

                    <!-- Publickey Field -->
                    <div class="form-group">
                        <label class="control-label" for="publickey">Public Key (Site Key)</label>
                        <div class="xuKeyWrap">
                            <input type="text" id="publickey" name="publickey" class="form-control" value="<?= esc($publicKey ?? ''); ?>" autofocus>
                            <button type="button" class="xuBtnCopy" data-target="publickey" title="Salin kunci"><i class="fa fa-copy"></i></button>
                        </div>
                    </div>

                    <!-- Privatekey Field -->
                    <div class="form-group">
                        <label class="control-label" for="privatekey">Private Key (Secret Key)</label>
                        <div class="xuKeyWrap">
                            <input type="text" id="privatekey" name="privatekey" class="form-control" value="<?= esc($privateKey ?? ''); ?>">
                            <button type="button" class="xuBtnCopy" data-target="privatekey" title="Salin kunci"><i class="fa fa-copy"></i></button>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                    <button type="submit" name="save" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Save</button>
                </div>
            </form>

        </div>
    </div>
</div>

<script>
(function(){
    document.querySelectorAll('#keyCaptcha .xuBtnCopy').forEach(function(b){
        b.addEventListener('click', function(){
            var id = this.getAttribute('data-target'), inp = document.getElementById(id);
            if (!inp || !inp.value) return;
            if (navigator.clipboard){
                navigator.clipboard.writeText(inp.value).then(() => { xuCopied(b); });
            } else {
                inp.select(); document.execCommand('copy'); xuCopied(b);
            }
        });
    });
    function xuCopied(b){
        b.classList.add('copied');
        var ico = b.querySelector('i'); if (ico){ ico.className = 'fa fa-check'; }
        setTimeout(() => {
            b.classList.remove('copied');
            if (ico){ ico.className = 'fa fa-copy'; }
        }, 1500);
    }
})();
</script>