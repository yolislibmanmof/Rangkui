<!-- ================================================================
     DIFOSS SEND MAIL — EMERALD FOREST EDITION
     ================================================================ -->
<style>
:root{
    --sm-emerald:#059669; --sm-teal:#0891b2; --sm-gold:#f59e0b;
    --sm-mint:#6ee7b7; --sm-deep:#0a2920; --sm-mid:#064e3b;
    --sm-ink:#0f172a; --sm-muted:#64748b; --sm-soft:#94a3b8;
}

.xuMailWrap{
    max-width:920px;margin:30px auto;padding:0 16px;
    font-family:'Plus Jakarta Sans',system-ui,sans-serif;
}

/* ===== KARTU UTAMA ===== */
.xuMailCard{
    background:#fff;border-radius:22px;
    overflow:hidden;
    box-shadow:0 20px 54px rgba(5,150,105,.14),0 4px 12px rgba(0,0,0,.04);
    border:1px solid rgba(5,150,105,.12);
}
html.xu-dark .xuMailCard{
    background:#0f1e1f;
    border-color:rgba(5,150,105,.25);
    box-shadow:0 20px 54px rgba(0,0,0,.5);
}

/* ===== HEADER ===== */
.xuMailHead{
    padding:28px 32px;
    background:linear-gradient(135deg,var(--sm-deep) 0%,var(--sm-mid) 55%,#115e59 100%);
    color:#fff;position:relative;overflow:hidden;
}
.xuMailHead::after{
    content:'';position:absolute;top:-70%;right:-10%;
    width:340px;height:340px;border-radius:50%;
    background:radial-gradient(circle,rgba(245,158,11,.28),transparent 70%);
    filter:blur(50px);pointer-events:none;
}
.xuMailHead::before{
    content:'';position:absolute;bottom:-60%;left:-8%;
    width:280px;height:280px;border-radius:50%;
    background:radial-gradient(circle,rgba(8,145,178,.22),transparent 70%);
    filter:blur(50px);pointer-events:none;
}
.xuMailHead h2{
    margin:0;font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1.5rem;
    display:flex;align-items:center;gap:12px;
    letter-spacing:-.01em;position:relative;z-index:2;
}
.xuMailHead h2 i{
    width:46px;height:46px;border-radius:14px;
    background:linear-gradient(135deg,var(--sm-emerald),var(--sm-gold));
    display:inline-flex;align-items:center;justify-content:center;
    font-size:1.2rem;color:#fff;
    box-shadow:0 10px 24px rgba(5,150,105,.45);
    flex-shrink:0;
}
.xuMailHead p{
    margin:8px 0 0;opacity:.88;font-size:.88rem;
    position:relative;z-index:2;padding-left:58px;
}

/* ===== BODY ===== */
.xuMailBody{padding:30px 32px 34px}

/* ===== LABEL & INPUT ===== */
.xuMailLabel{
    display:block;
    font-weight:800;font-size:.74rem;
    text-transform:uppercase;letter-spacing:.08em;
    color:var(--sm-ink);
    margin-bottom:8px;
}
html.xu-dark .xuMailLabel{color:#e2e8f0}

.xuMailInput{
    width:100%;padding:12px 16px;
    border:1.5px solid #e2e8f0;border-radius:12px;
    font-size:.92rem;color:var(--sm-ink);
    background:#fff;font-family:inherit;
    transition:.25s;box-sizing:border-box;
}
.xuMailInput:focus{
    outline:none;border-color:var(--sm-emerald);
    box-shadow:0 0 0 4px rgba(5,150,105,.12);
}
html.xu-dark .xuMailInput{
    background:rgba(255,255,255,.05);
    border-color:rgba(5,150,105,.25);
    color:#f1f5f9;
}
html.xu-dark .xuMailInput:focus{
    border-color:var(--sm-gold);
    box-shadow:0 0 0 4px rgba(245,158,11,.15);
}
.xuMailInput::placeholder{color:var(--sm-soft);font-weight:500}

.xuMailGrid{
    display:grid;grid-template-columns:1fr 1fr;gap:16px;
    margin-bottom:20px;
}
@media(max-width:700px){.xuMailGrid{grid-template-columns:1fr}}

/* ===== EDITOR BOX ===== */
.xuEditorBox{
    border:1.5px solid rgba(5,150,105,.2);
    border-radius:14px;overflow:hidden;
    background:#fff;
    transition:.25s;
}
.xuEditorBox:focus-within{
    border-color:var(--sm-emerald);
    box-shadow:0 0 0 4px rgba(5,150,105,.1);
}
html.xu-dark .xuEditorBox{
    background:rgba(255,255,255,.03);
    border-color:rgba(5,150,105,.3);
}

/* ===== TOOLBAR ===== */
.xuEditorToolbar{
    display:flex;flex-wrap:wrap;gap:6px;
    padding:12px 14px;
    background:linear-gradient(180deg,rgba(5,150,105,.06),rgba(5,150,105,.02));
    border-bottom:1.5px solid rgba(5,150,105,.15);
    margin:0;
}
html.xu-dark .xuEditorToolbar{
    background:linear-gradient(180deg,rgba(5,150,105,.12),rgba(5,150,105,.05));
    border-bottom-color:rgba(5,150,105,.3);
}

.xuEditorToolbar .btn-group{
    display:inline-flex;gap:3px;
    margin:0;
}
.xuEditorToolbar .btn-group + .btn-group{
    padding-left:8px;
    border-left:1.5px solid rgba(5,150,105,.15);
}
html.xu-dark .xuEditorToolbar .btn-group + .btn-group{border-left-color:rgba(5,150,105,.3)}

.xuEditorToolbar .btn{
    width:34px;height:34px;
    display:inline-flex;align-items:center;justify-content:center;
    background:#fff;
    border:1.5px solid rgba(5,150,105,.2);
    border-radius:9px;
    color:var(--sm-emerald);
    font-size:.85rem;
    padding:0;margin:0;
    box-shadow:none;
    transition:.2s;
    position:relative;
}
.xuEditorToolbar .btn:hover{
    background:linear-gradient(135deg,var(--sm-emerald),var(--sm-teal));
    color:#fff;border-color:transparent;
    transform:translateY(-2px);
    box-shadow:0 6px 14px rgba(5,150,105,.3);
}
.xuEditorToolbar .btn:active,
.xuEditorToolbar .btn.active{
    background:linear-gradient(135deg,var(--sm-emerald),var(--sm-gold));
    color:#fff;border-color:transparent;
}
html.xu-dark .xuEditorToolbar .btn{
    background:rgba(255,255,255,.05);
    border-color:rgba(5,150,105,.3);
    color:var(--sm-mint);
}
html.xu-dark .xuEditorToolbar .btn:hover{color:#fff}

.xuEditorToolbar .caret{
    margin-left:4px;
    border-top-color:currentColor;
}

/* Dropdown editor (font, size, link) */
.xuEditorToolbar .dropdown-menu{
    border:1.5px solid rgba(5,150,105,.2);
    border-radius:12px;
    box-shadow:0 16px 40px rgba(15,23,42,.15);
    padding:6px;min-width:150px;
}
html.xu-dark .xuEditorToolbar .dropdown-menu{
    background:#0f1e1f;border-color:rgba(5,150,105,.35);
}
.xuEditorToolbar .dropdown-menu > li > a{
    padding:8px 12px;border-radius:8px;
    color:var(--sm-ink);font-size:.85rem;
    transition:.15s;display:block;
}
.xuEditorToolbar .dropdown-menu > li > a:hover{
    background:rgba(5,150,105,.1);
    color:var(--sm-emerald);
}
html.xu-dark .xuEditorToolbar .dropdown-menu > li > a{color:#e2e8f0}
html.xu-dark .xuEditorToolbar .dropdown-menu > li > a:hover{color:var(--sm-mint)}

.xuEditorToolbar .dropdown-menu .input-append{
    display:flex;gap:6px;padding:6px;
}
.xuEditorToolbar .dropdown-menu .input-append input{
    flex:1;padding:7px 10px;
    border:1.5px solid rgba(5,150,105,.25);
    border-radius:8px;font-size:.82rem;
    outline:none;min-width:140px;
}
.xuEditorToolbar .dropdown-menu .input-append input:focus{border-color:var(--sm-emerald)}
html.xu-dark .xuEditorToolbar .dropdown-menu .input-append input{background:rgba(255,255,255,.05);color:#f1f5f9}

/* Magic overlay file input (insert image) */
.xuEditorToolbar input[data-role="magic-overlay"]{
    position:absolute;inset:0;opacity:0;cursor:pointer;
    width:100%;height:100%;
}

/* ===== EDITOR AREA ===== */
#editor-one.editor-wrapper{
    min-height:280px;
    padding:18px 20px;
    font-size:.92rem;line-height:1.7;
    color:var(--sm-ink);
    background:#fff;
    outline:none;
}
#editor-one.editor-wrapper:focus{
    background:rgba(5,150,105,.02);
}
html.xu-dark #editor-one.editor-wrapper{
    background:rgba(255,255,255,.03);
    color:#e2e8f0;
}
#editor-one.editor-wrapper img{
    max-width:100%;border-radius:10px;
    margin:8px 0;
}

/* ===== RESIZABLE TEXTAREA ===== */
.xuMailNote{
    width:100%;padding:12px 16px;
    border:1.5px solid #e2e8f0;border-radius:12px;
    font-size:.9rem;color:var(--sm-ink);
    background:#fff;font-family:inherit;
    resize:vertical;min-height:90px;
    transition:.25s;box-sizing:border-box;
}
.xuMailNote:focus{
    outline:none;border-color:var(--sm-teal);
    box-shadow:0 0 0 4px rgba(8,145,178,.12);
}
html.xu-dark .xuMailNote{
    background:rgba(255,255,255,.05);
    border-color:rgba(5,150,105,.25);
    color:#f1f5f9;
}
html.xu-dark .xuMailNote:focus{border-color:var(--sm-gold);box-shadow:0 0 0 4px rgba(245,158,11,.15)}

/* ===== TOMBOL KIRIM ===== */
.xuSendBtn{
    width:100%;
    padding:14px 26px;
    border:none;border-radius:13px;
    background:linear-gradient(90deg,var(--sm-emerald),var(--sm-gold));
    color:#fff;font-weight:800;font-size:.95rem;
    letter-spacing:.03em;
    cursor:pointer;transition:.25s;
    box-shadow:0 12px 28px rgba(5,150,105,.35);
    display:inline-flex;align-items:center;justify-content:center;gap:9px;
    font-family:inherit;
    position:relative;overflow:hidden;
    margin-top:8px;
}
.xuSendBtn::before{
    content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;
    background:linear-gradient(100deg,transparent 20%,rgba(255,255,255,.3) 50%,transparent 80%);
    transition:left .6s ease;
}
.xuSendBtn:hover{
    filter:brightness(1.08);
    transform:translateY(-2px);
    box-shadow:0 16px 36px rgba(5,150,105,.45);
}
.xuSendBtn:hover::before{left:120%}

/* ===== RESPONSIVE ===== */
@media(max-width:640px){
    .xuMailWrap{margin:16px auto}
    .xuMailHead{padding:22px 20px}
    .xuMailHead h2{font-size:1.25rem}
    .xuMailHead p{padding-left:0;margin-top:12px}
    .xuMailBody{padding:22px 18px 26px}
    .xuEditorToolbar{padding:10px}
    #editor-one.editor-wrapper{min-height:220px}
}
</style>

<div class="xuMailWrap">
    <div class="xuMailCard">
        <div class="xuMailHead">
            <h2><i class="fa fa-envelope"></i> Send Mail</h2>
            <p>Kirim notifikasi email ke anggota atau alamat tujuan lainnya.</p>
        </div>
        <div class="xuMailBody">
            <form name="mainForm" id="mainForm" method="post" action="/admin/modules/bibliography/sendmail.php?ajaxload=1" target="submitExec" enctype="multipart/form-data">
                <input type="hidden" name="csrf_token" value="db3e0e9f0900e6dff20189dfc94e613f32542d4e6f1931eccaeb243764a26e56">
                <input type="hidden" name="form_name" value="mainForm">

                <div class="xuMailGrid">
                    <div>
                        <label for="toEmail" class="xuMailLabel">To Email</label>
                        <input type="email" name="toEmail" id="toEmail" class="xuMailInput" value="" maxlength="256" placeholder="nama@domain.com">
                    </div>
                    <div>
                        <label for="subjectEmail" class="xuMailLabel">Subject Email</label>
                        <input type="text" name="subjectEmail" id="subjectEmail" class="xuMailInput" value="" maxlength="256" placeholder="Subjek pesan...">
                    </div>
                </div>

                <div style="margin-bottom:20px">
                    <label class="xuMailLabel">Description</label>
                    <div class="xuEditorBox">
                        <div class="btn-toolbar editor xuEditorToolbar" data-role="editor-toolbar" data-target="#editor-one">
                            <div class="btn-group">
                                <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i class="fa fa-font"></i><b class="caret"></b></a>
                                <ul class="dropdown-menu"></ul>
                            </div>

                            <div class="btn-group">
                                <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="fa fa-text-height"></i>&nbsp;<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a data-edit="fontSize 5"><p style="font-size: 17px">Huge</p></a></li>
                                    <li><a data-edit="fontSize 3"><p style="font-size: 14px">Normal</p></a></li>
                                    <li><a data-edit="fontSize 1"><p style="font-size: 11px">Small</p></a></li>
                                </ul>
                            </div>

                            <div class="btn-group">
                                <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
                                <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a>
                                <a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="fa fa-strikethrough"></i></a>
                                <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="fa fa-underline"></i></a>
                            </div>

                            <div class="btn-group">
                                <a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="fa fa-list-ul"></i></a>
                                <a class="btn" data-edit="insertorderedlist" title="Number list"><i class="fa fa-list-ol"></i></a>
                                <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="fa fa-dedent"></i></a>
                                <a class="btn" data-edit="indent" title="Indent (Tab)"><i class="fa fa-indent"></i></a>
                            </div>

                            <div class="btn-group">
                                <a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="fa fa-align-left"></i></a>
                                <a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="fa fa-align-center"></i></a>
                                <a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="fa fa-align-right"></i></a>
                                <a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="fa fa-align-justify"></i></a>
                            </div>

                            <div class="btn-group">
                                <a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="fa fa-link"></i></a>
                                <div class="dropdown-menu input-append">
                                    <input class="span2" placeholder="URL" type="text" data-edit="createLink" />
                                    <button class="btn" type="button">Add</button>
                                </div>
                                <a class="btn" data-edit="unlink" title="Remove Hyperlink"><i class="fa fa-cut"></i></a>
                            </div>

                            <div class="btn-group">
                                <a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="fa fa-picture-o"></i></a>
                                <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" />
                            </div>

                            <div class="btn-group">
                                <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>
                                <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a>
                            </div>
                        </div>

                        <div id="editor-one" class="editor-wrapper"></div>
                        <textarea name="descr" id="descr" style="display: none"></textarea>
                    </div>
                </div>

                <div style="margin-bottom:22px">
                    <label class="xuMailLabel">Catatan Tambahan (auto-resize)</label>
                    <textarea class="resizable_textarea xuMailNote" placeholder="Catatan internal opsional — tinggi area menyesuaikan isi teks..."></textarea>
                </div>

                <button type="submit" class="xuSendBtn">
                    <i class="fa fa-paper-plane"></i> Send Email
                </button>
            </form>

            <iframe name="submitExec" class="noBlock" style="visibility: hidden; width: 100%; height: 0;"></iframe>
        </div>
    </div>
</div>