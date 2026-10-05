<style>
/* ================================================================
   DIFOSS EDIT CONTENT — EMERALD FOREST EDITION
   ================================================================ */
:root{
    --ce-emerald:#059669; --ce-teal:#0891b2; --ce-gold:#f59e0b;
    --ce-mint:#6ee7b7; --ce-deep:#0a2920;
    --ce-ink:#0f172a; --ce-muted:#64748b; --ce-soft:#94a3b8;
    --ce-danger:#dc2626;
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
    background:linear-gradient(90deg,var(--ce-emerald),var(--ce-teal),var(--ce-gold),var(--ce-emerald));
    background-size:200% 100%;
    color:#fff;
    animation:xuCeGrad 7s linear infinite;
    position:relative;overflow:hidden;
}
.xuFormHead::after{
    content:'';position:absolute;top:-60%;right:-8%;
    width:320px;height:320px;border-radius:50%;
    background:radial-gradient(circle,rgba(245,158,11,.25),transparent 70%);
    pointer-events:none;
}
@keyframes xuCeGrad{to{background-position:200% 0}}

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

/* Edit info card */
.xuEditInfoCard{
    background:linear-gradient(135deg,rgba(245,158,11,.08),rgba(245,158,11,.04));
    border:1.5px solid rgba(245,158,11,.25);
    border-radius:12px;
    padding:14px 18px;margin-bottom:22px;
    display:flex;align-items:center;gap:14px;
}
.xuEditInfoCard .eiIco{
    width:42px;height:42px;border-radius:11px;
    background:linear-gradient(135deg,var(--ce-gold),#d97706);
    color:#fff;
    display:flex;align-items:center;justify-content:center;
    font-size:1.1rem;flex-shrink:0;
    box-shadow:0 6px 14px rgba(245,158,11,.3);
}
.xuEditInfoCard .eiInfo{min-width:0;flex:1}
.xuEditInfoCard .eiLabel{
    font-size:.68rem;font-weight:800;
    color:var(--ce-gold);
    text-transform:uppercase;letter-spacing:.08em;
    margin-bottom:2px;
}
.xuEditInfoCard .eiTitle{
    font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1rem;color:var(--ce-ink);
    overflow:hidden;text-overflow:ellipsis;white-space:nowrap;
}
.xuEditInfoCard .eiPath{
    font-family:'JetBrains Mono',monospace;
    font-size:.72rem;color:var(--ce-muted);
    font-weight:700;letter-spacing:.03em;
    margin-top:2px;
}
html.xu-dark .xuEditInfoCard{background:linear-gradient(135deg,rgba(245,158,11,.12),rgba(245,158,11,.06));border-color:rgba(245,158,11,.35)}
html.xu-dark .xuEditInfoCard .eiLabel{color:var(--ce-gold)}
html.xu-dark .xuEditInfoCard .eiTitle{color:#f1f5f9}
html.xu-dark .xuEditInfoCard .eiPath{color:var(--ce-soft)}

.xuFormBody .control-label{
    font-weight:800;font-size:.74rem;
    color:var(--ce-ink);
    margin-bottom:8px;display:block;
    text-transform:uppercase;letter-spacing:.08em;
    display:flex;align-items:center;gap:8px;
    flex-wrap:wrap;
}
html.xu-dark .xuFormBody .control-label{color:#e2e8f0}

.xuFormBody .text-danger{color:var(--ce-danger)!important;margin-left:4px}

.xuFormBody .control-label i{
    color:var(--ce-gold);
    font-weight:700;font-size:.7rem;
    font-style:normal;
    text-transform:none;letter-spacing:.02em;
    padding:3px 9px;border-radius:6px;
    background:rgba(245,158,11,.1);
    border:1px solid rgba(245,158,11,.25);
    display:inline-flex;align-items:center;gap:4px;
    font-family:'JetBrains Mono',monospace;
}
.xuFormBody .control-label i::before{content:'ⓘ '}
html.xu-dark .xuFormBody .control-label i{color:var(--ce-gold);background:rgba(245,158,11,.12);border-color:rgba(245,158,11,.35)}

.xuFormBody .form-control{
    width:100%;padding:11px 14px;
    border:1.5px solid #cbd5e1;
    border-radius:12px;font-size:.9rem;
    outline:none;background:#f8fafc;
    color:var(--ce-ink);
    font-family:inherit;
    transition:.25s;
    box-sizing:border-box;
}
.xuFormBody .form-control:hover{
    border-color:var(--ce-emerald);
    background:rgba(5,150,105,.04);
}
.xuFormBody .form-control:focus{
    border-color:var(--ce-emerald);
    background:#fff;
    box-shadow:0 0 0 4px rgba(5,150,105,.12);
}
html.xu-dark .xuFormBody .form-control{background:rgba(255,255,255,.05);border-color:rgba(5,150,105,.25);color:#f1f5f9}
html.xu-dark .xuFormBody .form-control:hover{background:rgba(5,150,105,.08)}
html.xu-dark .xuFormBody .form-control:focus{border-color:var(--ce-gold);background:rgba(255,255,255,.08);box-shadow:0 0 0 4px rgba(245,158,11,.15)}

.xuFormBody .form-group{margin-bottom:22px}

.xuFormBody textarea.form-control{
    min-height:220px;line-height:1.6;
    font-family:inherit;resize:vertical;
}

.xuFieldHint{
    font-size:.72rem;color:var(--ce-muted);
    margin-top:6px;font-weight:600;
    display:flex;align-items:center;gap:5px;
}
.xuFieldHint i{color:var(--ce-gold);font-size:.7rem}
html.xu-dark .xuFieldHint{color:var(--ce-soft)}

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
    color:var(--ce-emerald);
    font-weight:700;font-size:.88rem;
    text-decoration:none;transition:.25s;
    border:1.5px solid rgba(5,150,105,.25);
    font-family:inherit;
}
.xuBtnCancel:hover{
    background:rgba(5,150,105,.14);
    border-color:rgba(5,150,105,.45);
    transform:translateY(-2px);
    text-decoration:none;color:var(--ce-emerald);
}
html.xu-dark .xuBtnCancel{background:rgba(5,150,105,.12);color:var(--ce-mint);border-color:rgba(5,150,105,.3)}

.xuBtnReset{
    display:inline-flex;align-items:center;gap:8px;
    padding:11px 22px;border-radius:12px;
    background:#fff;color:var(--ce-danger);
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
    background:linear-gradient(90deg,var(--ce-emerald),var(--ce-gold));
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
    .xuFormHead{padding:18px 20px}
    .xuFormHead h2{font-size:1.15rem}
    .xuFormBody{padding:20px 18px}
    .xuFormFoot{padding:18px;flex-direction:column}
    .xuBtnSave,.xuBtnReset,.xuBtnCancel{width:100%;justify-content:center;margin:0}
}
</style>

<div class="xuFormCard xuR">
    <div class="xuFormHead">
        <h2><i class="fa fa-pencil-square"></i> Edit Content Form</h2>
    </div>

    <form class="form-horizontal form-label-left" method="post" action="<?= site_url('sistem/konten/update'); ?>" id="frm-konten">
        <?= csrf_field(); ?>
        <input type="hidden" name="w_id" value="<?= $list_content->content_id; ?>">
        <div class="xuFormBody">
            <!-- Edit info card -->
            <div class="xuEditInfoCard">
                <div class="eiIco"><i class="fa fa-pencil"></i></div>
                <div class="eiInfo">
                    <div class="eiLabel">Sedang mengedit konten</div>
                    <div class="eiTitle"><?= esc($list_content->content_title) ?></div>
                    <div class="eiPath">/<?= esc(ltrim($list_content->content_path, '/')) ?></div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-8">
                    <label class="control-label">Content Title <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" required name="content_title" value="<?= esc($list_content->content_title); ?>">
                    <div class="xuFieldHint"><i class="fa fa-info-circle"></i> Judul halaman yang akan tampil di navigasi</div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-8">
                    <label class="control-label">Path <i>Must Unique</i> <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" required name="content_path" value="<?= esc($list_content->content_path); ?>">
                    <div class="xuFieldHint"><i class="fa fa-info-circle"></i> URL slug unik, gunakan huruf kecil dan strip</div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <label class="control-label">Content Description <span class="text-danger">*</span></label>
                    <textarea name="content_desc" id="editor" class="form-control editor-wrapper" required><?= esc($list_content->content_desc); ?></textarea>
                </div>
            </div>
        </div>
        <div class="xuFormFoot">
            <a href="javascript:void(0)" onclick="if(window.history.length>1){window.history.back();}else{location.href='<?= site_url('sistem/konten') ?>';}" class="xuBtnCancel">
                <i class="fa fa-arrow-left"></i> Kembali
            </a>
            <button type="reset" class="xuBtnReset"><i class="fa fa-undo"></i> Reset</button>
            <button type="submit" class="xuBtnSave"><i class="fa fa-paper-plane"></i> Submit</button>
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