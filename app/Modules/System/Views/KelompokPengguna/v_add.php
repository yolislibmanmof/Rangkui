<style>
/* ================================================================
   DIFOSS USER GROUP FORM (ADD/UPDATE) — EMERALD FOREST EDITION
   ================================================================ */
:root{
    --gf-emerald:#059669; --gf-teal:#0891b2; --gf-gold:#f59e0b;
    --gf-mint:#6ee7b7; --gf-deep:#0a2920;
    --gf-ink:#0f172a; --gf-muted:#64748b; --gf-soft:#94a3b8;
    --gf-danger:#dc2626;
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
    background:linear-gradient(90deg,var(--gf-emerald),var(--gf-teal),var(--gf-gold),var(--gf-emerald));
    background-size:200% 100%;
    color:#fff;
    animation:xuGfGrad 7s linear infinite;
    position:relative;overflow:hidden;
}
.xuFormHead::after{
    content:'';position:absolute;top:-60%;right:-8%;
    width:320px;height:320px;border-radius:50%;
    background:radial-gradient(circle,rgba(245,158,11,.25),transparent 70%);
    pointer-events:none;
}
@keyframes xuGfGrad{to{background-position:200% 0}}

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
    color:var(--gf-ink);margin-bottom:8px;display:block;
    text-transform:uppercase;letter-spacing:.08em;
}
html.xu-dark .xuFormBody .control-label{color:#e2e8f0}

.xuFormBody .required{color:var(--gf-danger);margin-left:4px}

.xuFormBody .form-control{
    width:100%;padding:11px 14px;
    border:1.5px solid #cbd5e1;
    border-radius:12px;font-size:.9rem;
    outline:none;background:#f8fafc;
    color:var(--gf-ink);
    font-family:inherit;
    box-sizing:border-box;
    transition:.25s;
}
.xuFormBody .form-control:hover{border-color:var(--gf-emerald);background:rgba(5,150,105,.04)}
.xuFormBody .form-control:focus{
    border-color:var(--gf-emerald);
    background:#fff;
    box-shadow:0 0 0 4px rgba(5,150,105,.12);
}
html.xu-dark .xuFormBody .form-control{background:rgba(255,255,255,.05);border-color:rgba(5,150,105,.25);color:#f1f5f9}
html.xu-dark .xuFormBody .form-control:hover{background:rgba(5,150,105,.08)}
html.xu-dark .xuFormBody .form-control:focus{border-color:var(--gf-gold);background:rgba(255,255,255,.08);box-shadow:0 0 0 4px rgba(245,158,11,.15)}

.xuFormBody .form-group{margin-bottom:20px}

/* ===== PRIVILEGE MATRIX ===== */
.xuPrivWrap{
    border:1.5px solid rgba(5,150,105,.2);
    border-radius:16px;overflow:hidden;
    box-shadow:0 6px 18px rgba(5,150,105,.08);
    margin-top:10px;
}
html.xu-dark .xuPrivWrap{border-color:rgba(5,150,105,.3);box-shadow:0 6px 18px rgba(5,150,105,.15)}

.xuPrivTable{width:100%;border-collapse:collapse;margin:0}

.xuPrivTable thead th{
    background:linear-gradient(180deg,rgba(5,150,105,.08),rgba(5,150,105,.03));
    color:var(--gf-emerald);
    font-weight:800;font-size:.72rem;
    text-transform:uppercase;letter-spacing:.08em;
    padding:13px 16px;border:none;
    border-bottom:1.5px solid rgba(5,150,105,.2);
}
html.xu-dark .xuPrivTable thead th{
    background:linear-gradient(180deg,rgba(5,150,105,.15),rgba(5,150,105,.06));
    color:var(--gf-mint);border-bottom-color:rgba(5,150,105,.35);
}

.xuPrivTable tbody td{
    padding:12px 16px;
    border-top:1px solid rgba(5,150,105,.1);
    color:var(--gf-ink);font-size:.88rem;font-weight:600;
    vertical-align:middle;
}
html.xu-dark .xuPrivTable tbody td{border-top-color:rgba(5,150,105,.15);color:#e2e8f0}

.xuPrivTable tbody tr{transition:.2s}
.xuPrivTable tbody tr:hover{background:rgba(5,150,105,.05)}
html.xu-dark .xuPrivTable tbody tr:hover{background:rgba(5,150,105,.1)}

.xuPrivTable input[type=checkbox]{
    width:20px;height:20px;
    accent-color:var(--gf-emerald);
    cursor:pointer;
    transition:transform .2s;
}
.xuPrivTable input[type=checkbox]:hover{transform:scale(1.15)}

.xuModIcon{
    width:32px;height:32px;border-radius:9px;
    background:linear-gradient(135deg,rgba(5,150,105,.12),rgba(245,158,11,.08));
    color:var(--gf-emerald);
    display:inline-flex;align-items:center;justify-content:center;
    margin-right:10px;font-size:.85rem;
    border:1px solid rgba(5,150,105,.2);
    transition:.25s;
    vertical-align:middle;
}
.xuPrivTable tbody tr:hover .xuModIcon{
    background:linear-gradient(135deg,var(--gf-emerald),var(--gf-gold));
    color:#fff;border-color:transparent;
    transform:rotate(-6deg);
}
html.xu-dark .xuModIcon{color:var(--gf-mint);background:linear-gradient(135deg,rgba(5,150,105,.2),rgba(245,158,11,.12));border-color:rgba(5,150,105,.35)}
html.xu-dark .xuPrivTable tbody tr:hover .xuModIcon{color:#fff}

/* Tombol bantu */
.xuMiniBtn{
    display:inline-flex;align-items:center;gap:6px;
    padding:7px 14px;border-radius:10px;
    background:#fff;color:var(--gf-emerald);
    border:1.5px solid rgba(5,150,105,.3);
    font-weight:700;font-size:.78rem;
    cursor:pointer;transition:.25s;
    margin:0 8px 10px 0;
    font-family:inherit;
    position:relative;overflow:hidden;
}
.xuMiniBtn::before{
    content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;
    background:linear-gradient(100deg,transparent 20%,rgba(5,150,105,.12) 50%,transparent 80%);
    transition:left .6s ease;
}
.xuMiniBtn:hover{background:rgba(5,150,105,.06);transform:translateY(-1px);border-color:rgba(5,150,105,.5)}
.xuMiniBtn:hover::before{left:120%}
html.xu-dark .xuMiniBtn{background:rgba(255,255,255,.05);color:var(--gf-mint);border-color:rgba(5,150,105,.35)}
html.xu-dark .xuMiniBtn:hover{background:rgba(5,150,105,.12);border-color:rgba(5,150,105,.5)}

.xuMiniClear{
    color:var(--gf-danger);
    border-color:rgba(220,38,38,.35);
    background:#fef2f2;
}
.xuMiniClear:hover{background:#fee2e2;border-color:rgba(220,38,38,.6)}
html.xu-dark .xuMiniClear{color:#fca5a5;background:rgba(220,38,38,.12);border-color:rgba(220,38,38,.4)}
html.xu-dark .xuMiniClear:hover{background:rgba(220,38,38,.18);border-color:rgba(220,38,38,.6)}

/* ===== FOOTER FORM ===== */
.xuFormFoot{
    padding:22px 30px;
    border-top:1.5px dashed rgba(5,150,105,.15);
    background:linear-gradient(135deg,rgba(5,150,105,.03),rgba(245,158,11,.02));
    display:flex;gap:10px;justify-content:flex-end;flex-wrap:wrap;
}
html.xu-dark .xuFormFoot{border-top-color:rgba(5,150,105,.25);background:linear-gradient(135deg,rgba(5,150,105,.06),rgba(245,158,11,.03))}

.xuBtnSave{
    display:inline-flex;align-items:center;gap:8px;
    padding:11px 26px;border-radius:12px;
    background:linear-gradient(90deg,var(--gf-emerald),var(--gf-gold));
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

.xuBtnCancel{
    display:inline-flex;align-items:center;gap:8px;
    padding:11px 22px;border-radius:12px;
    background:rgba(5,150,105,.08);
    color:var(--gf-emerald);
    font-weight:700;font-size:.88rem;
    text-decoration:none;transition:.25s;
    border:1.5px solid rgba(5,150,105,.25);
    font-family:inherit;
}
.xuBtnCancel:hover{
    background:rgba(5,150,105,.14);
    border-color:rgba(5,150,105,.45);
    transform:translateY(-2px);
    text-decoration:none;color:var(--gf-emerald);
}
html.xu-dark .xuBtnCancel{background:rgba(5,150,105,.12);color:var(--gf-mint);border-color:rgba(5,150,105,.3)}
html.xu-dark .xuBtnCancel:hover{background:rgba(5,150,105,.18);border-color:rgba(245,158,11,.4)}

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
        <h2><i class="fa fa-shield"></i> User Group Form</h2>
    </div>

    <form name="frm-main" id="frm-main" class="form-horizontal form-label-left" method="post" action="<?= base_url('sistem/user-groups/save'); ?>" onsubmit="return confirm('Are you sure you want to add a new group?')">
        <?= csrf_field(); ?>
        <div class="xuFormBody">
            <div class="form-group row">
                <div class="col-md-8">
                    <label for="username" class="control-label">Group Name<span class="required">*</span></label>
                    <input type="text" id="username" name="username" required="required" class="form-control" placeholder="Masukkan nama kelompok">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-10">
                    <label class="control-label">Privilege</label>
                    <!-- Tombol bantu centang -->
                    <div>
                        <button type="button" class="xuMiniBtn" onclick="xuPrivAll('read',true)"><i class="fa fa-check-square-o"></i> Semua Read</button>
                        <button type="button" class="xuMiniBtn" onclick="xuPrivAll('write',true)"><i class="fa fa-check-square-o"></i> Semua Write</button>
                        <button type="button" class="xuMiniBtn xuMiniClear" onclick="xuPrivAll('',false)"><i class="fa fa-square-o"></i> Kosongkan</button>
                    </div>
                    <div class="xuPrivWrap">
                        <table class="table table-bordered xuPrivTable">
                            <thead>
                                <tr>
                                    <th>Module Name</th>
                                    <th class="text-center" style="width:110px">Read</th>
                                    <th class="text-center" style="width:110px">Write</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($list_menu)): ?>
                                    <tr>
                                        <td colspan="3" style="text-align:center;padding:24px;color:var(--gf-soft);font-size:.85rem">
                                            <i class="fa fa-inbox" style="font-size:1.4rem;color:var(--gf-emerald);display:block;margin-bottom:8px"></i>
                                            Belum ada modul tersedia.
                                        </td>
                                    </tr>
                                <?php else: foreach ($list_menu as $key => $val): ?>
                                    <tr>
                                        <td><span class="xuModIcon"><i class="fa <?= $val->icon ?>"></i></span> <?= $val->title; ?></td>
                                        <td class="text-center"><input type="checkbox" name="read[]" value="<?= $val->id; ?>"></td>
                                        <td class="text-center"><input type="checkbox" name="write[]" value="<?= $val->id; ?>"></td>
                                    </tr>
                                <?php endforeach; endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="xuFormFoot">
            <a href="javascript:void(0)" onclick="if(window.history.length>1){window.history.back();}else{location.href='<?= base_url('sistem/user-groups') ?>';}" class="xuBtnCancel">
                <i class="fa fa-arrow-left"></i> Kembali
            </a>
            <button type="submit" class="xuBtnSave"><i class="fa fa-save"></i> Save</button>
        </div>
    </form>
</div>

<script>
function xuPrivAll(which, on){
    var sel = which ? 'input[name="'+which+'[]"]' : 'input[name="read[]"],input[name="write[]"]';
    document.querySelectorAll('#frm-main '+sel).forEach(function(c){ c.checked = on; });
}
document.addEventListener('DOMContentLoaded', function(){
    var io = new IntersectionObserver(function(es){
        es.forEach(function(en){
            if (en.isIntersecting){ en.target.classList.add('in'); io.unobserve(en.target); }
        });
    }, {threshold:.06});
    document.querySelectorAll('.xuR').forEach(function(el){ io.observe(el); });
});
</script>