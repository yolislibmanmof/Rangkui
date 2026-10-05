<style>
/* ================================================================
   DIFOSS EDIT MODUL — EMERALD FOREST EDITION
   ================================================================ */
:root{
    --me-emerald:#059669; --me-teal:#0891b2; --me-gold:#f59e0b;
    --me-mint:#6ee7b7; --me-deep:#0a2920;
    --me-ink:#0f172a; --me-muted:#64748b; --me-soft:#94a3b8;
    --me-danger:#dc2626;
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
    background:linear-gradient(90deg,var(--me-emerald),var(--me-teal),var(--me-gold),var(--me-emerald));
    background-size:200% 100%;
    color:#fff;
    animation:xuMeGrad 7s linear infinite;
    position:relative;overflow:hidden;
}
.xuFormHead::after{
    content:'';position:absolute;top:-60%;right:-8%;
    width:320px;height:320px;border-radius:50%;
    background:radial-gradient(circle,rgba(245,158,11,.25),transparent 70%);
    pointer-events:none;
}
@keyframes xuMeGrad{to{background-position:200% 0}}

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

.xuFormBody .control-label{
    font-weight:800;font-size:.74rem;
    color:var(--me-ink);
    margin-bottom:8px;display:block;
    text-transform:uppercase;letter-spacing:.08em;
}
html.xu-dark .xuFormBody .control-label{color:#e2e8f0}

.xuFormBody .text-danger{color:var(--me-danger)!important;margin-left:4px}

.xuFormBody .form-control,.xuFormBody textarea.form-control{
    width:100%;padding:11px 14px;
    border:1.5px solid #cbd5e1;
    border-radius:12px;font-size:.9rem;
    outline:none;background:#f8fafc;
    color:var(--me-ink);
    font-family:inherit;
    transition:.25s;
    box-sizing:border-box;
}
.xuFormBody .form-control:hover{
    border-color:var(--me-emerald);
    background:rgba(5,150,105,.04);
}
.xuFormBody .form-control:focus{
    border-color:var(--me-emerald);
    background:#fff;
    box-shadow:0 0 0 4px rgba(5,150,105,.12);
}
html.xu-dark .xuFormBody .form-control{background:rgba(255,255,255,.05);border-color:rgba(5,150,105,.25);color:#f1f5f9}
html.xu-dark .xuFormBody .form-control:hover{background:rgba(5,150,105,.08)}
html.xu-dark .xuFormBody .form-control:focus{border-color:var(--me-gold);background:rgba(255,255,255,.08);box-shadow:0 0 0 4px rgba(245,158,11,.15)}

.xuFormBody textarea.form-control{min-height:110px;line-height:1.6;resize:vertical}

.xuFormBody .form-group{margin-bottom:22px}

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
    background:linear-gradient(135deg,var(--me-gold),#d97706);
    color:#fff;
    display:flex;align-items:center;justify-content:center;
    font-size:1.1rem;flex-shrink:0;
    box-shadow:0 6px 14px rgba(245,158,11,.3);
}
.xuEditInfoCard .eiInfo{min-width:0;flex:1}
.xuEditInfoCard .eiLabel{
    font-size:.68rem;font-weight:800;
    color:var(--me-gold);
    text-transform:uppercase;letter-spacing:.08em;
    margin-bottom:2px;
}
.xuEditInfoCard .eiTitle{
    font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1rem;color:var(--me-ink);
    overflow:hidden;text-overflow:ellipsis;white-space:nowrap;
}
html.xu-dark .xuEditInfoCard{background:linear-gradient(135deg,rgba(245,158,11,.12),rgba(245,158,11,.06));border-color:rgba(245,158,11,.35)}
html.xu-dark .xuEditInfoCard .eiLabel{color:var(--me-gold)}
html.xu-dark .xuEditInfoCard .eiTitle{color:#f1f5f9}

/* Icon preview */
.icon-preview{
    display:inline-flex;margin-left:12px;
    width:52px;height:52px;border-radius:13px;
    background:linear-gradient(135deg,rgba(5,150,105,.15),rgba(245,158,11,.12));
    border:1.5px solid rgba(5,150,105,.3);
    color:var(--me-emerald);
    font-size:1.4rem;
    align-items:center;justify-content:center;
    vertical-align:middle;
    transition:.3s;
    box-shadow:0 6px 14px rgba(5,150,105,.2);
}
.icon-preview:hover{transform:scale(1.08) rotate(-6deg)}
html.xu-dark .icon-preview{background:linear-gradient(135deg,rgba(5,150,105,.2),rgba(245,158,11,.15));border-color:rgba(5,150,105,.4);color:var(--me-mint)}

/* Select2 */
.select2-container{width:100%!important}
.select2-container .select2-selection--single{
    border:1.5px solid #cbd5e1!important;
    border-radius:12px!important;
    background:#f8fafc!important;
    height:46px!important;
}
.select2-container--default .select2-selection--single .select2-selection__rendered{
    line-height:42px!important;color:var(--me-ink)!important;
    font-weight:600!important;padding-left:14px!important;
}
html.xu-dark .select2-container--default .select2-selection--single .select2-selection__rendered{color:#f1f5f9!important}
.select2-container--default .select2-selection--single .select2-selection__arrow{height:44px!important}
.select2-container--default.select2-container--open .select2-selection--single{
    border-color:var(--me-emerald)!important;
    box-shadow:0 0 0 4px rgba(5,150,105,.12)!important;
    background:#fff!important;
}
html.xu-dark .select2-container--default.select2-container--open .select2-selection--single{
    border-color:var(--me-gold)!important;box-shadow:0 0 0 4px rgba(245,158,11,.15)!important;
    background:rgba(255,255,255,.08)!important;
}
.select2-container--default .select2-results__option--highlighted[aria-selected]{
    background:linear-gradient(90deg,var(--me-emerald),var(--me-gold))!important;
    color:#fff!important;
}
.select2-dropdown{border:1.5px solid var(--me-emerald)!important;border-radius:12px!important;overflow:hidden!important}
html.xu-dark .select2-dropdown{background:#0f1e1f!important;border-color:rgba(5,150,105,.35)!important}
.select2-container--default .select2-results__option{padding:9px 14px!important;font-size:.88rem!important;color:var(--me-ink)}
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
    color:var(--me-emerald);
    font-weight:700;font-size:.88rem;
    text-decoration:none;transition:.25s;
    border:1.5px solid rgba(5,150,105,.25);
    font-family:inherit;
}
.xuBtnCancel:hover{
    background:rgba(5,150,105,.14);
    border-color:rgba(5,150,105,.45);
    transform:translateY(-2px);
    text-decoration:none;color:var(--me-emerald);
}
html.xu-dark .xuBtnCancel{background:rgba(5,150,105,.12);color:var(--me-mint);border-color:rgba(5,150,105,.3)}

.xuBtnSave{
    display:inline-flex;align-items:center;gap:8px;
    padding:11px 26px;border-radius:12px;
    background:linear-gradient(90deg,var(--me-emerald),var(--me-gold));
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
    .xuBtnSave,.xuBtnCancel{width:100%;justify-content:center;margin:0}
}
</style>

<div class="xuFormCard xuR">
    <div class="xuFormHead">
        <h2><i class="fa fa-pencil-square"></i> Form Ubah Modul</h2>
    </div>

    <form class="form-horizontal form-label-left" action="<?= base_url('sistem/modul/update'); ?>" method="post" onsubmit="return confirm('Apakah anda yakin ingin mengubah modul ini ?')" id="frm-main">
        <?= csrf_field(); ?>
        <input type="hidden" name="w_id" value="<?= $list_menu->id; ?>">
        <div class="xuFormBody">
            <!-- Edit info card -->
            <div class="xuEditInfoCard">
                <div class="eiIco"><i class="fa <?= esc($list_menu->icon); ?>"></i></div>
                <div class="eiInfo">
                    <div class="eiLabel">Sedang mengedit modul</div>
                    <div class="eiTitle"><?= esc($list_menu->title) ?></div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-8">
                    <label class="control-label">Nama Modul <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="title" value="<?= esc($list_menu->title); ?>">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-8">
                    <label class="control-label">Icon Modul <span class="text-danger">*</span></label>
                    <div style="display:flex;align-items:center;flex-wrap:wrap">
                        <div style="flex:1;min-width:220px">
                            <select id="iconSelect" name="icon" style="width: 200px;" class="form-control-sm" data-placeholder="--Pilih Icon Modul--">
                                <option></option>
                                <?php foreach ($list_icon as $key => $val): ?>
                                    <option value="<?= $val->class_name; ?>" <?= ($list_menu->icon == $val->class_name) ? "selected" : ""; ?>><?= $val->icon_name; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <span class="icon-preview" id="iconPreview"><i class="<?= esc($list_menu->icon); ?>"></i></span>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-10">
                    <label class="control-label">Deskripsi Modul <span class="text-danger">*</span></label>
                    <textarea name="desc" class="form-control" rows="3"><?= esc($list_menu->desc); ?></textarea>
                </div>
            </div>
        </div>
        <div class="xuFormFoot">
            <a href="javascript:void(0)" onclick="if(window.history.length>1){window.history.back();}else{location.href='<?= base_url('sistem/modul') ?>';}" class="xuBtnCancel">
                <i class="fa fa-arrow-left"></i> Kembali
            </a>
            <button type="submit" class="xuBtnSave"><i class="fa fa-refresh"></i> Ubah</button>
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

    // ===== Live icon preview (bekerja utk native select & Select2) =====
    var sel = document.getElementById('iconSelect');
    var prev = document.getElementById('iconPreview');
    function updPreview(){
        if (sel && prev && sel.value){
            prev.innerHTML = '<i class="' + sel.value + '"></i>';
        }
    }
    if (sel){
        sel.addEventListener('change', updPreview);
        // Jika Select2 aktif, ia memicu change pada select native
    }
});
</script>