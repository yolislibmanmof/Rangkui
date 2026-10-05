<style>
/* ================================================================
   DIFOSS ADD PINTASAN (ACCORDION) — EMERALD FOREST EDITION
   ================================================================ */
:root{
    --ap-emerald:#059669; --ap-teal:#0891b2; --ap-gold:#f59e0b;
    --ap-mint:#6ee7b7; --ap-deep:#0a2920;
    --ap-ink:#0f172a; --ap-muted:#64748b; --ap-soft:#94a3b8;
}

.xuAccForm{margin-top:22px}

.xuAcc{
    border:1.5px solid rgba(5,150,105,.2);
    border-radius:18px;overflow:hidden;
    box-shadow:0 10px 30px rgba(15,23,42,.08);
}
html.xu-dark .xuAcc{border-color:rgba(5,150,105,.3);box-shadow:0 10px 30px rgba(0,0,0,.4)}

.xuAcc .panel{
    border:none;border-bottom:1px solid rgba(5,150,105,.12);
    margin:0;background:#fff;
}
html.xu-dark .xuAcc .panel{background:#0f1e1f;border-bottom-color:rgba(5,150,105,.15)}
.xuAcc .panel:last-child{border-bottom:none}

.xuAcc .panel-heading{
    display:block;padding:15px 20px;
    background:linear-gradient(90deg,var(--ap-deep),var(--ap-mid),#115e59);
    text-decoration:none!important;
    position:relative;transition:.25s;
}
.xuAcc .panel-heading:hover{background:var(--ap-mid)}
html.xu-dark .xuAcc .panel-heading{background:linear-gradient(90deg,var(--ap-deep),var(--ap-mid))}
html.xu-dark .xuAcc .panel-heading:hover{background:var(--ap-mid)}

.xuAcc .panel-heading::after{
    content:"\f107";font-family:FontAwesome;
    color:var(--ap-gold);
    position:absolute;right:20px;top:50%;
    transform:translateY(-50%);transition:.3s;
}
.xuAcc .panel-heading[aria-expanded="false"]::after{transform:translateY(-50%) rotate(-90deg)}

.xuAcc .panel-title{
    font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1rem;
    color:var(--ap-mint);
    display:flex;align-items:center;gap:10px;
    margin:0;
}
.xuAcc .panel-title::before{
    content:"\f0e7";font-family:FontAwesome;
    font-size:.85rem;color:var(--ap-gold);
}

.xuAcc .panel-body{padding:16px 20px;background:#fff}
html.xu-dark .xuAcc .panel-body{background:#0f1e1f}

.xuAcc .table{margin:0;border:none!important}
.xuAcc .table td{
    border:none!important;
    padding:10px 8px;
    color:var(--ap-ink);font-weight:600;font-size:.9rem;
    border-bottom:1px dashed rgba(5,150,105,.12)!important;
    transition:.2s;
}
html.xu-dark .xuAcc .table td{color:#e2e8f0;border-bottom-color:rgba(5,150,105,.15)!important}
.xuAcc .table tr:last-child td{border-bottom:none!important}
.xuAcc .table tr:hover td{background:rgba(5,150,105,.05)}
html.xu-dark .xuAcc .table tr:hover td{background:rgba(5,150,105,.1)}

.xuAcc input[type=checkbox]{
    width:18px;height:18px;
    accent-color:var(--ap-emerald);
    cursor:pointer;margin-right:10px;
}

.xuBtnSaveSc{
    display:inline-flex;align-items:center;gap:8px;
    padding:11px 26px;border-radius:12px;
    background:linear-gradient(90deg,var(--ap-emerald),var(--ap-gold));
    color:#fff;border:none;
    font-weight:800;font-size:.88rem;
    cursor:pointer;transition:.3s;
    box-shadow:0 8px 20px rgba(5,150,105,.35);
    margin-top:18px;
    position:relative;overflow:hidden;
    font-family:inherit;
}
.xuBtnSaveSc::before{
    content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;
    background:linear-gradient(100deg,transparent 20%,rgba(255,255,255,.3) 50%,transparent 80%);
    transition:left .6s ease;
}
.xuBtnSaveSc:hover{transform:translateY(-2px);filter:brightness(1.08);box-shadow:0 12px 28px rgba(5,150,105,.45)}
.xuBtnSaveSc:hover::before{left:120%}

@media(max-width:720px){
    .xuAcc .panel-heading{padding:13px 16px}
    .xuAcc .panel-body{padding:12px 14px}
}
</style>

<form action="<?= site_url('sistem/pintasan/add'); ?>" method="post" id="frm-main" onsubmit="return confirm('Apakah anda ingin menyimpan pintasan?')" class="xuAccForm">
    <?= csrf_field(); ?>
    <div class="accordion xuAcc" id="accordion" role="tablist" aria-multiselectable="true">
        <?php
        foreach ($tree as $key => $val) :
            $slug = str_replace(" ", "-", strtolower($val["title"]));
        ?>
            <div class="panel">
                <a class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#<?= $slug ?>" aria-expanded="true" aria-controls="<?= $slug; ?>">
                    <h4 class="panel-title"><?= formatString($val["title"]); ?></h4>
                </a>
                <div id="<?= $slug; ?>" class="panel-collapse in collapse show" role="tabpanel" aria-labelledby="headingOne" style="">
                    <div class="panel-body">
                        <table class="table table-bordered">
                            <tbody>
                                <?php foreach ($val["children"] as $k => $v): ?>
                                    <tr>
                                        <td>
                                            <input
                                                type="checkbox"
                                                name="sub_list[]"
                                                value="<?= $v["id"]; ?>"
                                                <?= in_array($v["title"], $list_sc) ? "checked" : "" ?>> <?= esc($v["title"]); ?>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>

    <div class="form-group">
        <button class="xuBtnSaveSc" type="submit">
            <i class="fa fa-save"></i> Simpan
        </button>
    </div>
</form>