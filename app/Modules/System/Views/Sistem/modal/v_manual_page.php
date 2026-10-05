<style>
/* ================================================================
   DIFOSS MANUAL RECAPTCHA MODAL — EMERALD FOREST EDITION
   ================================================================ */
:root{
    --mr-emerald:#059669; --mr-teal:#0891b2; --mr-gold:#f59e0b;
    --mr-mint:#6ee7b7; --mr-deep:#0a2920;
    --mr-ink:#0f172a; --mr-muted:#64748b; --mr-soft:#94a3b8;
}

#manualPageModal .modal-dialog{max-width:820px}
#manualPageModal .modal-content{
    border:none;border-radius:20px;overflow:hidden;
    box-shadow:0 30px 70px rgba(0,0,0,.5);
    border:1px solid rgba(5,150,105,.2);
}
html.xu-dark #manualPageModal .modal-content{background:#0f1e1f;border-color:rgba(5,150,105,.3)}

#manualPageModal .modal-header{
    background:linear-gradient(90deg,var(--mr-emerald),var(--mr-teal),var(--mr-gold),var(--mr-emerald));
    background-size:200% 100%;
    animation:xuMrGrad 7s linear infinite;
    padding:20px 26px;border:none;color:#fff;
    position:relative;overflow:hidden;
}
#manualPageModal .modal-header::after{
    content:'';position:absolute;top:-50%;right:-8%;
    width:200px;height:200px;border-radius:50%;
    background:radial-gradient(circle,rgba(255,255,255,.15),transparent 70%);
    pointer-events:none;
}
@keyframes xuMrGrad{to{background-position:200% 0}}

#manualPageModal .modal-title{
    display:flex;align-items:center;gap:12px;
    font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1.15rem;color:#fff;
    position:relative;z-index:2;
}
#manualPageModal .modal-title::before{
    content:"\f02d";font-family:FontAwesome;
    width:38px;height:38px;border-radius:11px;
    background:rgba(255,255,255,.18);
    backdrop-filter:blur(8px);
    color:#fff;
    display:inline-flex;align-items:center;justify-content:center;
    box-shadow:inset 0 1px 0 rgba(255,255,255,.2);
}

#manualPageModal .close{
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
#manualPageModal .close:hover{background:rgba(255,255,255,.28);transform:rotate(90deg)}

#manualPageModal .modal-body{
    padding:28px 28px 10px;
    max-height:70vh;overflow-y:auto;
}
#manualPageModal .modal-body::-webkit-scrollbar{width:8px}
#manualPageModal .modal-body::-webkit-scrollbar-track{background:rgba(5,150,105,.05);border-radius:4px}
#manualPageModal .modal-body::-webkit-scrollbar-thumb{background:rgba(5,150,105,.3);border-radius:4px}
#manualPageModal .modal-body::-webkit-scrollbar-thumb:hover{background:rgba(5,150,105,.5)}

#manualPageModal .modal-footer{
    border-top:1.5px dashed rgba(5,150,105,.15);
    padding:16px 28px;
    display:flex;justify-content:flex-end;
}
html.xu-dark #manualPageModal .modal-footer{border-top-color:rgba(5,150,105,.25)}

#manualPageModal .modal-footer .btn-danger{
    background:linear-gradient(90deg,var(--mr-emerald),var(--mr-gold));
    border:none;border-radius:11px;
    padding:10px 22px;font-weight:700;color:#fff;
    position:relative;overflow:hidden;
    transition:.25s;
}
#manualPageModal .modal-footer .btn-danger::before{
    content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;
    background:linear-gradient(100deg,transparent 20%,rgba(255,255,255,.28) 50%,transparent 80%);
    transition:left .6s ease;
}
#manualPageModal .modal-footer .btn-danger:hover{filter:brightness(1.08);transform:translateY(-1px)}
#manualPageModal .modal-footer .btn-danger:hover::before{left:120%}

/* Konten dokumentasi */
#manualPageModal .doc p{
    color:var(--mr-ink);line-height:1.75;
    font-size:.9rem;margin-bottom:14px;
}
html.xu-dark #manualPageModal .doc p{color:#e2e8f0}
#manualPageModal .doc strong{color:var(--mr-emerald);font-weight:800}
html.xu-dark #manualPageModal .doc strong{color:var(--mr-mint)}
#manualPageModal .doc em{color:var(--mr-gold);font-style:italic;font-weight:600}
#manualPageModal .doc a{
    color:var(--mr-emerald);font-weight:700;
    text-decoration:none;
    border-bottom:2px dotted var(--mr-emerald);
    transition:.2s;
}
#manualPageModal .doc a:hover{color:var(--mr-gold);border-bottom-color:var(--mr-gold)}
html.xu-dark #manualPageModal .doc a{color:var(--mr-mint);border-bottom-color:var(--mr-mint)}
html.xu-dark #manualPageModal .doc a:hover{color:var(--mr-gold);border-bottom-color:var(--mr-gold)}

/* Callout localhost */
#manualPageModal .doc .xuCallout{
    padding:16px 20px;
    background:linear-gradient(135deg,rgba(5,150,105,.08),rgba(245,158,11,.04));
    border-left:4px solid var(--mr-emerald);
    border-radius:11px;margin:18px 0;
    color:var(--mr-emerald);
    font-size:.88rem;font-weight:600;
    display:flex;gap:12px;align-items:flex-start;
    border:1.5px solid rgba(5,150,105,.2);
    border-left:4px solid var(--mr-emerald);
}
#manualPageModal .doc .xuCallout::before{
    content:"\f05a";font-family:FontAwesome;
    font-size:1.15rem;flex-shrink:0;
    color:var(--mr-gold);
    margin-top:1px;
}
html.xu-dark #manualPageModal .doc .xuCallout{
    background:linear-gradient(135deg,rgba(5,150,105,.12),rgba(245,158,11,.06));
    color:var(--mr-mint);
    border-color:rgba(5,150,105,.3);
    border-left-color:var(--mr-gold);
}

/* List langkah */
#manualPageModal .doc ol{
    counter-reset:step;list-style:none;
    padding:0;margin:18px 0;
}
#manualPageModal .doc ol li{
    counter-increment:step;position:relative;
    padding:12px 16px 12px 54px;
    margin-bottom:10px;
    background:linear-gradient(135deg,rgba(5,150,105,.04),rgba(245,158,11,.02));
    border-radius:11px;
    border:1.5px solid rgba(5,150,105,.15);
    color:var(--mr-ink);
    font-size:.88rem;line-height:1.6;
    transition:.25s;
}
#manualPageModal .doc ol li:hover{
    background:linear-gradient(135deg,rgba(5,150,105,.08),rgba(245,158,11,.04));
    border-color:var(--mr-emerald);
    transform:translateX(3px);
    box-shadow:0 6px 14px rgba(5,150,105,.12);
}
html.xu-dark #manualPageModal .doc ol li{
    background:rgba(255,255,255,.03);
    border-color:rgba(5,150,105,.2);
    color:#e2e8f0;
}
html.xu-dark #manualPageModal .doc ol li:hover{
    background:rgba(5,150,105,.1);
    border-color:var(--mr-gold);
}
#manualPageModal .doc ol li::before{
    content:counter(step);
    position:absolute;left:14px;top:50%;
    transform:translateY(-50%);
    width:30px;height:30px;border-radius:50%;
    background:linear-gradient(135deg,var(--mr-emerald),var(--mr-gold));
    color:#fff;
    font-family:'Neuton',Georgia,serif;
    font-weight:800;font-size:.88rem;
    display:flex;align-items:center;justify-content:center;
    box-shadow:0 4px 10px rgba(5,150,105,.3);
}
#manualPageModal .doc ol li strong{color:var(--mr-emerald)}
#manualPageModal .doc ol li em{color:var(--mr-gold);font-style:italic;font-weight:600}
html.xu-dark #manualPageModal .doc ol li strong{color:var(--mr-mint)}
html.xu-dark #manualPageModal .doc ol li em{color:var(--mr-gold)}

@media(max-width:720px){
    #manualPageModal .modal-body{padding:20px 18px}
    #manualPageModal .modal-footer{padding:14px 18px}
    #manualPageModal .doc ol li{padding-left:46px}
}
</style>

<div id="manualPageModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Manual Recaptcha V2</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>

            <div class="modal-body">
                <div class="doc">
                    <p>In the update dated April 13, 2018, Setiadi's development has integrated the <strong>Recaptcha version 2</strong> feature. This feature functions to protect your Setiadi system from <em>spammers</em> attempting to repeatedly access your system, which may affect your server's performance.</p>
                    <p>To use this feature, you need to insert an <em>API</em> key that you can obtain from the following link <br> <a href="https://www.google.com/recaptcha" target="_blank"><strong>https://www.google.com/recaptcha</strong></a>, provided you already have a Gmail account for the <em>logIn</em> process.</p>

                    <div class="xuCallout">
                        <div>For users operating on a local server such as <em>localhost</em>, you <strong>do not need</strong> to obtain an API key. Setiadi's developer has already included an API key that can be used locally only.</div>
                    </div>

                    <p>For users running Setiadi online, you need to update your API key at the link above.</p>
                    <p><strong>Steps to obtain an API key from Google:</strong></p>
                    <ol>
                        <li>Visit the following page <a href="https://www.google.com/recaptcha" target="_blank"><strong>https://www.google.com/recaptcha</strong></a></li>
                        <li>Click the <em><strong>Get reCAPTCHA</strong></em> button at the top right corner.</li>
                        <li>Then, you will be asked to log in with your Gmail account.</li>
                        <li>In the <em>Register a new site</em> section, there is a sub-section labeled "Label" with a text box below it. Enter the label name for the <em>API</em> you are going to use.</li>
                        <li>Next, check the box for <strong>reCAPTCHA v2</strong>.</li>
                        <li>Then, you will see a section labeled <em>Domains</em>.</li>
                        <li>Enter the domain name or IP address you are using to run your Setiadi system in the text box.</li>
                        <li>Next, click the checkbox next to the text <em>Accept the re...</em>.</li>
                        <li>Then click register.</li>
                        <li>After that, a list will appear. Focus on the section labeled <strong>Keys</strong>.</li>
                        <li>Copy and paste the <strong>Site Key</strong> and <strong>Secret Key</strong> into the system module (system > system settings > Recaptcha API Key, click the key icon).</li>
                        <li>Insert the <strong>Site Key</strong> in the text box under <strong>PublicKey</strong>.</li>
                        <li>Insert the <strong>Secret Key</strong> in the text box under <strong>PrivateKey</strong>.</li>
                        <li>Click save, then change the Recaptcha Admin setting to <strong>Enabled</strong> to activate this feature on the Admin login page.</li>
                        <li>Click save, then change the Recaptcha Member setting to <strong>Enabled</strong> to activate this feature on the Member login page.</li>
                    </ol>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
            </div>

        </div>
    </div>
</div>