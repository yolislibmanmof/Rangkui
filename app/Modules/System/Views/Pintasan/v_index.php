<style>
/* ================================================================
   DIFOSS PINTASAN MODUL — EMERALD FOREST EDITION
   ================================================================ */
:root{
    --sc-emerald:#059669; --sc-teal:#0891b2; --sc-gold:#f59e0b;
    --sc-mint:#6ee7b7; --sc-deep:#0a2920;
    --sc-ink:#0f172a; --sc-muted:#64748b; --sc-soft:#94a3b8;
    --sc-danger:#dc2626;
}

.xuR{opacity:0;transform:translateY(24px);transition:all .6s cubic-bezier(.2,.8,.2,1)}
.xuR.in{opacity:1;transform:none}

.xuScCard{
    background:#fff;border-radius:22px;
    box-shadow:0 16px 44px rgba(15,23,42,.08);
    overflow:hidden;
    border:1px solid rgba(5,150,105,.12);
    margin-bottom:24px;
    transition:.35s cubic-bezier(.2,.8,.2,1);
}
.xuScCard:hover{box-shadow:0 22px 54px rgba(5,150,105,.14);border-color:rgba(5,150,105,.22)}
html.xu-dark .xuScCard{background:#0f1e1f;border-color:rgba(5,150,105,.22);box-shadow:0 16px 44px rgba(0,0,0,.4)}

.xuScHead{
    padding:22px 28px;
    background:linear-gradient(90deg,var(--sc-emerald),var(--sc-teal),var(--sc-gold),var(--sc-emerald));
    background-size:200% 100%;
    color:#fff;
    display:flex;align-items:center;justify-content:space-between;
    flex-wrap:wrap;gap:14px;
    animation:xuScGrad 7s linear infinite;
    position:relative;overflow:hidden;
}
.xuScHead::after{
    content:'';position:absolute;top:-60%;right:-8%;
    width:320px;height:320px;border-radius:50%;
    background:radial-gradient(circle,rgba(245,158,11,.25),transparent 70%);
    pointer-events:none;
}
@keyframes xuScGrad{to{background-position:200% 0}}

.xuScHead h2{
    margin:0;font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1.3rem;
    display:flex;align-items:center;gap:12px;
    color:#fff;letter-spacing:-.01em;
    position:relative;z-index:2;
}
.xuScHead h2 i{
    width:42px;height:42px;border-radius:13px;
    background:rgba(255,255,255,.18);
    backdrop-filter:blur(8px);-webkit-backdrop-filter:blur(8px);
    display:inline-flex;align-items:center;justify-content:center;
    font-size:1.15rem;
    box-shadow:inset 0 1px 0 rgba(255,255,255,.2);
}

.xuScBody{padding:28px 30px}

.xuScBody label{
    font-weight:800;font-size:.74rem;
    color:var(--sc-ink);
    margin-bottom:8px;display:block;
    text-transform:uppercase;letter-spacing:.08em;
}
html.xu-dark .xuScBody label{color:#e2e8f0}

/* Info box */
.xuInfo{
    background:linear-gradient(90deg,rgba(5,150,105,.1),rgba(8,145,178,.08));
    border:1.5px solid rgba(5,150,105,.3);
    color:var(--sc-emerald);
    border-radius:12px;
    padding:13px 18px;
    font-weight:600;font-size:.85rem;
    margin-bottom:18px;
    display:flex;align-items:center;gap:10px;
    line-height:1.5;
}
.xuInfo i{font-size:1.05rem;color:var(--sc-gold);flex-shrink:0}
html.xu-dark .xuInfo{background:linear-gradient(90deg,rgba(5,150,105,.15),rgba(8,145,178,.1));border-color:rgba(5,150,105,.4);color:var(--sc-mint)}

/* Select2 */
.select2-container{width:100%!important}
.select2-container .select2-selection--single{
    border:1.5px solid #cbd5e1!important;
    border-radius:12px!important;
    background:#f8fafc!important;
    height:46px!important;
}
.select2-container--default .select2-selection--single .select2-selection__rendered{
    line-height:42px!important;color:var(--sc-ink)!important;
    font-weight:600!important;padding-left:14px!important;
}
html.xu-dark .select2-container--default .select2-selection--single .select2-selection__rendered{color:#f1f5f9!important}
.select2-container--default .select2-selection--single .select2-selection__arrow{height:44px!important}
.select2-container--default.select2-container--open .select2-selection--single{
    border-color:var(--sc-emerald)!important;
    box-shadow:0 0 0 4px rgba(5,150,105,.12)!important;
    background:#fff!important;
}
html.xu-dark .select2-container--default.select2-container--open .select2-selection--single{
    border-color:var(--sc-gold)!important;box-shadow:0 0 0 4px rgba(245,158,11,.15)!important;
    background:rgba(255,255,255,.08)!important;
}
.select2-container--default .select2-results__option--highlighted[aria-selected]{
    background:linear-gradient(90deg,var(--sc-emerald),var(--sc-gold))!important;
    color:#fff!important;
}
.select2-dropdown{border:1.5px solid var(--sc-emerald)!important;border-radius:12px!important;overflow:hidden!important}
html.xu-dark .select2-dropdown{background:#0f1e1f!important;border-color:rgba(5,150,105,.35)!important}
.select2-container--default .select2-results__option{padding:9px 14px!important;font-size:.88rem!important;color:var(--sc-ink)}
html.xu-dark .select2-container--default .select2-results__option{color:#e2e8f0}

/* Tabel pintasan terpasang */
.xuScTable{
    width:100%;border-collapse:separate;border-spacing:0;
    border:1.5px solid rgba(5,150,105,.15);
    border-radius:14px;overflow:hidden;
}
.xuScTable td{
    padding:12px 16px;
    border-bottom:1px solid #f8fafc;
    color:var(--sc-ink);font-weight:600;font-size:.9rem;
    background:#fff;
    transition:.2s;
}
html.xu-dark .xuScTable td{background:rgba(255,255,255,.02);color:#e2e8f0;border-bottom-color:rgba(5,150,105,.1)}
.xuScTable tr:last-child td{border-bottom:none}
.xuScTable tr:hover td{background:rgba(5,150,105,.05)}
html.xu-dark .xuScTable tr:hover td{background:rgba(5,150,105,.1)}

.xuScTable input[type=checkbox]{
    width:18px;height:18px;
    accent-color:var(--sc-emerald);
    cursor:pointer;margin-right:10px;
}

.xuBtnDel{
    display:inline-flex;align-items:center;gap:8px;
    padding:11px 22px;border-radius:12px;
    background:linear-gradient(90deg,#ef4444,#dc2626);
    color:#fff;border:none;
    font-weight:800;font-size:.85rem;
    cursor:pointer;transition:.25s;
    box-shadow:0 8px 20px rgba(239,68,68,.3);
    margin-top:14px;
    position:relative;overflow:hidden;
    font-family:inherit;
}
.xuBtnDel::before{
    content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;
    background:linear-gradient(100deg,transparent 20%,rgba(255,255,255,.28) 50%,transparent 80%);
    transition:left .6s ease;
}
.xuBtnDel:hover{transform:translateY(-2px);filter:brightness(1.1)}
.xuBtnDel:hover::before{left:120%}

@media(max-width:720px){
    .xuScHead{padding:18px 20px}
    .xuScHead h2{font-size:1.15rem}
    .xuScBody{padding:20px 18px}
}
</style>

<div class="xuScCard xuR">
    <div class="xuScHead">
        <h2><i class="fa fa-bolt"></i> Pintasan Modul</h2>
    </div>
    <div class="xuScBody">
        <form action="" class="inline-form">
            <div class="form-group">
                <label for="default_lang">Modul</label>
                <select name="modul" id="modul" class="form-control select2" data-placeholder="-Pilih Modul-">
                    <option></option>
                    <?php foreach ($menu as $key => $val): ?>
                        <option value="<?= $val->id; ?>"><?= formatString($val->title); ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </form>

        <div id="append-here"></div>
    </div>
</div>

<?php if (trim($sc->setting_value) !== ""): ?>
    <?php
    $list_sc = @unserialize($sc->setting_value);
    if (!is_array($list_sc)) { $list_sc = []; }
    ?>
    <div class="xuScCard xuR">
        <div class="xuScHead">
            <h2><i class="fa fa-thumb-tack"></i> Pintasan Terpasang</h2>
        </div>
        <div class="xuScBody">
            <div class="xuInfo"><i class="fa fa-info-circle"></i> Daftar Pemintas Terpasang (Untuk menghapus pemintas, hilangkan centang lalu klik tombol 'Hapus pemintas terpilih')</div>
            <form action="<?= base_url('sistem/pintasan/delete'); ?>" class="inline-form" method="post" onsubmit="return confirm('Apakah anda yakin ingin menghapus pintasan ini?')">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <table class="table table-bordered xuScTable">
                        <tbody>
                            <?php foreach ($list_sc as $k => $v): ?>
                                <tr>
                                    <td>
                                        <input type="checkbox" name="sub_list[]" value="<?= $v->id; ?>" checked> <?= esc($v->title); ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <div class="form-group">
                    <button class="xuBtnDel"><i class="fa fa-trash"></i> Hapus Pintasan</button>
                </div>
            </form>
        </div>
    </div>
<?php endif ?>

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