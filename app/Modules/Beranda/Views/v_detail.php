<style>
/* ================================================================
   DIFOSS DETAIL DOKUMEN — EMERALD FOREST EDITION
   ================================================================ */
:root{
    --xd-emerald:#059669; --xd-teal:#0891b2; --xd-gold:#f59e0b;
    --xd-mint:#6ee7b7; --xd-deep:#0a2920; --xd-mid:#064e3b;
    --xd-ink:#0f172a; --xd-muted:#64748b; --xd-soft:#94a3b8;
}

#xuProgress{
    position:fixed;top:0;left:0;height:4px;width:0;z-index:3000;
    background:linear-gradient(90deg,var(--xd-emerald),var(--xd-gold),var(--xd-teal));
    box-shadow:0 0 12px rgba(5,150,105,.6);
}

.xuR{opacity:0;transform:translateY(26px);transition:all .7s cubic-bezier(.2,.8,.2,1)}
.xuR.in{opacity:1;transform:none}

/* ====== JUDUL DOKUMEN (EMERALD GRADIENT) ====== */
#xuTitle{
    font-family:'Neuton',Georgia,serif!important;
    font-weight:700!important;font-size:1.75rem!important;line-height:1.25!important;
    background:linear-gradient(90deg,var(--xd-ink),var(--xd-emerald),var(--xd-gold),var(--xd-ink))!important;
    background-size:300% 100%!important;
    -webkit-background-clip:text!important;background-clip:text!important;
    -webkit-text-fill-color:transparent!important;
    animation:xuDetailGrad 7s linear infinite!important;
    margin-bottom:18px!important;
}
html.xu-dark #xuTitle{
    background:linear-gradient(90deg,#f1f5f9,var(--xd-mint),var(--xd-gold),#f1f5f9)!important;
    -webkit-background-clip:text!important;background-clip:text!important;
    -webkit-text-fill-color:transparent!important;
}
@keyframes xuDetailGrad{to{background-position:300% 0}}

/* ====== KOLOM COVER ====== */
#xuCoverCol{position:relative;overflow:hidden}
#xuShine{
    position:absolute;top:0;left:-100%;width:100%;height:100%;
    background:linear-gradient(100deg,transparent 20%,rgba(255,255,255,.35) 50%,transparent 80%);
    pointer-events:none;transition:left .7s ease;z-index:3;
}
#xuTilt{width:100%;max-width:360px}
#xuTilt img{width:100%!important;height:auto!important;display:block}
#xuCoverCol{align-self:flex-start!important}

/* ====== FITUR 1: ABSTRAK BERBUNYI + TERJEMAHAN ====== */
.xuAbsBox{
    padding:24px;
    background:linear-gradient(135deg,rgba(5,150,105,.06),rgba(245,158,11,.04));
    border-left:4px solid var(--xd-emerald);
    border-radius:12px;position:relative;
}
html.xu-dark .xuAbsBox{background:linear-gradient(135deg,rgba(5,150,105,.12),rgba(245,158,11,.08))}

.xuAbsHead{
    font-weight:700;font-size:.85rem;
    text-transform:uppercase;letter-spacing:.08em;
    color:var(--xd-emerald);margin-bottom:14px;
    display:flex;align-items:center;gap:8px;
}
html.xu-dark .xuAbsHead{color:var(--xd-mint)}

.xuAbsToolbar{
    display:flex;flex-wrap:wrap;gap:8px;
    margin-bottom:16px;padding-bottom:14px;
    border-bottom:1px dashed rgba(5,150,105,.25);
    align-items:center;
}

.xuAbsBtn{
    display:inline-flex;align-items:center;gap:7px;
    padding:8px 14px;border-radius:10px;
    background:#fff;
    border:1.5px solid rgba(5,150,105,.3);
    color:var(--xd-emerald);
    font-weight:700;font-size:.8rem;
    cursor:pointer;transition:.25s;
    text-decoration:none!important;
}
html.xu-dark .xuAbsBtn{background:rgba(5,150,105,.1);color:var(--xd-mint);border-color:rgba(5,150,105,.3)}

.xuAbsBtn:hover{
    background:linear-gradient(90deg,var(--xd-emerald),var(--xd-gold));
    color:#fff;border-color:transparent;
    transform:translateY(-2px);
    box-shadow:0 8px 20px rgba(5,150,105,.3);
}
.xuAbsBtn.active{
    background:linear-gradient(90deg,var(--xd-emerald),var(--xd-gold));
    color:#fff;border-color:transparent;
}
.xuAbsBtn i{font-size:.9rem}

.xuAbsSpeed{
    padding:7px 12px;
    border:1.5px solid rgba(5,150,105,.3);
    border-radius:10px;
    font-weight:700;font-size:.8rem;
    color:var(--xd-emerald);
    background:#fff;cursor:pointer;outline:none;
}
html.xu-dark .xuAbsSpeed{background:rgba(5,150,105,.1);color:var(--xd-mint);border-color:rgba(5,150,105,.3)}
.xuAbsSpeed:focus{border-color:var(--xd-emerald);box-shadow:0 0 0 3px rgba(5,150,105,.15)}

.xuAbsText{line-height:1.75;color:#334155;font-size:.92rem;text-align:justify}
html.xu-dark .xuAbsText{color:#cbd5e1}

.xuAbsText .xuHl{
    background:linear-gradient(120deg,#fef3c7 0%,#fde68a 100%);
    padding:2px 4px;border-radius:4px;
    box-shadow:0 0 0 2px rgba(245,158,11,.35);
    transition:all .3s;
}
html.xu-dark .xuAbsText .xuHl{
    background:linear-gradient(120deg,rgba(245,158,11,.25),rgba(245,158,11,.15));
    box-shadow:0 0 0 2px rgba(245,158,11,.4);
    color:#fff;
}

.xuAbsStatus{
    display:none;align-items:center;gap:8px;
    font-size:.78rem;color:var(--xd-emerald);font-weight:700;
    margin-left:auto;padding:6px 14px;
    background:rgba(5,150,105,.1);border-radius:999px;
}
html.xu-dark .xuAbsStatus{background:rgba(5,150,105,.18);color:var(--xd-mint)}
.xuAbsStatus.show{display:inline-flex}
.xuAbsStatus .xuDot{
    width:8px;height:8px;border-radius:50%;
    background:var(--xd-emerald);
    animation:xuDetailPulse 1.2s ease-in-out infinite;
}
html.xu-dark .xuAbsStatus .xuDot{background:var(--xd-mint)}
@keyframes xuDetailPulse{0%,100%{opacity:1;transform:scale(1)}50%{opacity:.4;transform:scale(.8)}}

.xuAbsTransBox{
    display:none;margin-top:16px;padding:18px 20px;
    background:linear-gradient(135deg,rgba(8,145,178,.06),rgba(5,150,105,.06));
    border:1.5px solid rgba(5,150,105,.25);
    border-radius:12px;
}
html.xu-dark .xuAbsTransBox{background:linear-gradient(135deg,rgba(8,145,178,.12),rgba(5,150,105,.12));border-color:rgba(5,150,105,.35)}
.xuAbsTransBox.show{display:block;animation:xuDetailFadeIn .4s ease}
@keyframes xuDetailFadeIn{from{opacity:0;transform:translateY(6px)}to{opacity:1;transform:none}}

.xuAbsTransHead{
    display:flex;justify-content:space-between;align-items:center;
    margin-bottom:12px;padding-bottom:12px;
    border-bottom:1px dashed rgba(5,150,105,.3);
    flex-wrap:wrap;gap:8px;
}
.xuAbsTransHead b{
    color:var(--xd-emerald);
    font-size:.78rem;text-transform:uppercase;letter-spacing:.06em;
    display:flex;align-items:center;gap:7px;
}
html.xu-dark .xuAbsTransHead b{color:var(--xd-mint)}

.xuAbsTransText{color:var(--xd-ink);font-size:.9rem;line-height:1.75}
html.xu-dark .xuAbsTransText{color:#e2e8f0}

.xuAbsLangSelect{
    padding:6px 12px;
    border:1.5px solid rgba(5,150,105,.4);
    border-radius:8px;background:#fff;
    color:var(--xd-emerald);
    font-weight:700;font-size:.78rem;
    cursor:pointer;outline:none;
}
html.xu-dark .xuAbsLangSelect{background:rgba(5,150,105,.1);color:var(--xd-mint);border-color:rgba(5,150,105,.4)}
.xuAbsLangSelect:focus{border-color:var(--xd-gold);box-shadow:0 0 0 3px rgba(245,158,11,.15)}

/* ====== KARTU PENULIS PREMIUM ====== */
.xuAuthorCard{
    display:inline-flex;align-items:center;gap:11px;
    padding:8px 12px 8px 8px;
    background:#fff;
    border:1.5px solid rgba(5,150,105,.25);
    border-radius:16px;
    margin:4px 8px 4px 0;
    box-shadow:0 4px 14px rgba(5,150,105,.12);
    transition:.25s;flex-wrap:wrap;
}
html.xu-dark .xuAuthorCard{background:#0f1e1f;border-color:rgba(5,150,105,.25)}

.xuAuthorCard:hover{
    transform:translateY(-2px);
    box-shadow:0 10px 24px rgba(5,150,105,.2);
    border-color:rgba(5,150,105,.5);
}

.xuAuthorAvatar{
    width:36px;height:36px;border-radius:12px;
    background:linear-gradient(135deg,var(--xd-emerald),var(--xd-gold));
    color:#fff;font-weight:900;font-size:1rem;
    display:inline-flex;align-items:center;justify-content:center;
    flex-shrink:0;
    box-shadow:0 4px 10px rgba(5,150,105,.35);
}

.xuAuthorName{color:var(--xd-ink)!important;font-weight:800;font-size:.9rem;text-decoration:none!important}
.xuAuthorName:hover{color:var(--xd-emerald)!important}
html.xu-dark .xuAuthorName{color:#f1f5f9!important}
html.xu-dark .xuAuthorName:hover{color:var(--xd-gold)!important}

.xuAuthorRole{color:var(--xd-soft);font-size:.68rem;font-weight:700;text-transform:uppercase;letter-spacing:.06em}

.xuAuthorSearchBtn{
    display:inline-flex;align-items:center;gap:6px;
    padding:7px 13px;border-radius:999px;
    background:rgba(5,150,105,.1);
    color:var(--xd-emerald)!important;
    font-weight:800;font-size:.75rem;
    text-decoration:none!important;transition:.2s;
}
.xuAuthorSearchBtn:hover{background:rgba(5,150,105,.22);transform:translateY(-1px)}
html.xu-dark .xuAuthorSearchBtn{background:rgba(5,150,105,.15);color:var(--xd-mint)!important}

.xuAuthorProfileBtn{
    position:relative;
    display:inline-flex;align-items:center;gap:7px;
    padding:8px 16px;border-radius:999px;
    background:linear-gradient(90deg,var(--xd-emerald),var(--xd-gold));
    color:#fff!important;font-weight:800;font-size:.75rem;
    text-decoration:none!important;overflow:hidden;
    box-shadow:0 6px 16px rgba(5,150,105,.4);
    transition:.25s;
}
.xuAuthorProfileBtn:hover{
    transform:translateY(-2px) scale(1.03);
    box-shadow:0 10px 22px rgba(245,158,11,.5);
    color:#fff!important;
}
.xuAuthorProfileBtn::after{
    content:'';position:absolute;top:0;left:-80%;
    width:60%;height:100%;
    background:linear-gradient(100deg,transparent,rgba(255,255,255,.55),transparent);
    transform:skewX(-20deg);transition:left .5s ease;
}
.xuAuthorProfileBtn:hover::after{left:120%}
.xuAuthorProfileBtn.xuMini{padding:4px 12px;font-size:.7rem;box-shadow:0 3px 10px rgba(5,150,105,.3)}

/* ====== TOMBOL AKSI ====== */
.xuActBtn{
    display:inline-flex;align-items:center;gap:7px;
    padding:9px 16px;border-radius:10px;
    font-weight:600;font-size:.85rem;
    text-decoration:none;transition:.25s;
    border:none;cursor:pointer;
}
.xuActBtn.primary{
    background:linear-gradient(90deg,var(--xd-emerald),var(--xd-gold));
    color:#fff;box-shadow:0 6px 16px rgba(5,150,105,.35);
}
.xuActBtn.primary:hover{transform:translateY(-2px);box-shadow:0 10px 24px rgba(5,150,105,.45);filter:brightness(1.1)}
.xuActBtn.xml{background:linear-gradient(90deg,#ef4444,#dc2626);color:#fff}
.xuActBtn.xml:hover{transform:translateY(-2px);filter:brightness(1.1)}
.xuActBtn.mendeley{background:#fff;color:#c4122f;border:1px solid #fee2e2}
.xuActBtn.mendeley:hover{transform:translateY(-2px);box-shadow:0 6px 14px rgba(196,18,47,.2)}
.xuActBtn.outline{background:#fff;border:1.5px solid}
.xuActBtn.ris{color:var(--xd-teal);border-color:rgba(8,145,178,.35)}
.xuActBtn.ris:hover{background:rgba(8,145,178,.06);transform:translateY(-2px)}
.xuActBtn.bib{color:#b45309;border-color:rgba(180,83,9,.35)}
.xuActBtn.bib:hover{background:rgba(180,83,9,.06);transform:translateY(-2px)}
html.xu-dark .xuActBtn.outline{background:rgba(5,150,105,.08)}
html.xu-dark .xuActBtn.mendeley{background:rgba(255,255,255,.05);color:#fca5a5;border-color:rgba(239,68,68,.3)}

/* ====== SHARE BOX ====== */
.xuShareBox{
    padding:16px;background:#f8fafc;border-radius:14px;margin-bottom:22px;
    border:1px solid rgba(5,150,105,.1);
}
html.xu-dark .xuShareBox{background:rgba(5,150,105,.06);border-color:rgba(5,150,105,.18)}
.xuShareBox .lbl{
    font-size:.75rem;font-weight:700;text-transform:uppercase;letter-spacing:.1em;
    color:var(--xd-muted);margin-bottom:10px;
}
html.xu-dark .xuShareBox .lbl{color:var(--xd-soft)}

.xuShareIco{
    width:40px;height:40px;border-radius:10px;
    color:#fff;display:inline-flex;align-items:center;justify-content:center;
    text-decoration:none;transition:.25s;
}
.xuShareIco:hover{transform:translateY(-3px) scale(1.08);box-shadow:0 8px 18px rgba(0,0,0,.2)}

/* ====== TABEL INFORMASI DETAIL ====== */
.xuDetailInfoHead{
    padding:22px 28px;
    background:linear-gradient(90deg,var(--xd-emerald),var(--xd-teal));
    color:#fff;
}
.xuDetailInfoHead h2{
    margin:0;font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1.25rem;
    display:flex;align-items:center;gap:10px;
}

.xuInfoTable{width:100%;border-collapse:collapse}
.xuInfoTable tr{transition:background .2s}
.xuInfoTable tr:hover{background:rgba(5,150,105,.04)!important}
html.xu-dark .xuInfoTable tr:hover{background:rgba(5,150,105,.1)!important}
.xuInfoTable tr:nth-child(even){background:#f8fafc}
html.xu-dark .xuInfoTable tr:nth-child(even){background:rgba(5,150,105,.05)}
.xuInfoTable th{
    width:220px;padding:14px 20px;border:none;
    color:#334155;font-weight:700;vertical-align:top;
}
html.xu-dark .xuInfoTable th{color:#e2e8f0}
.xuInfoTable th i{color:var(--xd-emerald);margin-right:10px;width:18px}
html.xu-dark .xuInfoTable th i{color:var(--xd-mint)}
.xuInfoTable td{padding:14px 20px;border:none;color:#475569;vertical-align:top}
html.xu-dark .xuInfoTable td{color:#cbd5e1}

.xuInfoTable a{color:var(--xd-emerald);font-weight:700;text-decoration:none;transition:.2s}
.xuInfoTable a:hover{color:var(--xd-gold)}
.xuInfoTable .role{color:var(--xd-soft);font-weight:500}
.xuInfoTable .sup{color:var(--xd-emerald);font-weight:600}
.xuInfoTable .exam{color:var(--xd-gold);font-weight:600}
.xuInfoTable .doi{color:var(--xd-teal);text-decoration:none}
html.xu-dark .xuInfoTable .doi{color:var(--xd-mint)}

.xuTopicChip{
    display:inline-block;padding:4px 12px;
    background:rgba(5,150,105,.1);color:var(--xd-emerald);
    border:1px solid rgba(5,150,105,.2);
    border-radius:999px;margin:3px;
    font-size:.82rem;font-weight:600;
    text-decoration:none;transition:.2s;
}
.xuTopicChip:hover{background:linear-gradient(90deg,var(--xd-emerald),var(--xd-gold));color:#fff;border-color:transparent;transform:translateY(-1px)}
html.xu-dark .xuTopicChip{background:rgba(5,150,105,.15);color:var(--xd-mint);border-color:rgba(5,150,105,.3)}

/* ====== LAMPIRAN BERKAS ====== */
.xuAttachHead{
    padding:22px 28px;
    background:linear-gradient(90deg,var(--xd-emerald),var(--xd-gold));
    color:#fff;
}
.xuAttachHead h2{
    margin:0;font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1.25rem;
    display:flex;align-items:center;gap:10px;
}

.attachList{list-style:none;padding:0;margin:0;display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:12px}
.attachList li{
    padding:16px;background:#f8fafc;
    border:1px solid #e2e8f0;border-radius:14px;
    transition:.25s;
}
html.xu-dark .attachList li{background:rgba(5,150,105,.06);border-color:rgba(5,150,105,.18)}
.attachList li:hover{transform:translateY(-2px);border-color:var(--xd-emerald);box-shadow:0 10px 24px rgba(5,150,105,.15)}

.attachIcon{
    width:42px;height:42px;border-radius:10px;
    color:#fff;display:flex;align-items:center;justify-content:center;
    flex-shrink:0;
}
.attachIcon.pdf{background:linear-gradient(135deg,var(--xd-emerald),var(--xd-teal))}
.attachIcon.open{background:linear-gradient(135deg,var(--xd-emerald),var(--xd-gold))}
.attachIcon.lock{background:rgba(239,68,68,.12);color:#ef4444}

.attachLink{
    color:var(--xd-ink);font-weight:600;text-decoration:none;
    display:block;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;
}
.attachLink:hover{color:var(--xd-emerald)}
html.xu-dark .attachLink{color:#f1f5f9}
html.xu-dark .attachLink:hover{color:var(--xd-gold)}

.attachSmall{color:var(--xd-muted);font-size:.78rem}
.attachSmall i.unlock{color:var(--xd-emerald)}
html.xu-dark .attachSmall{color:var(--xd-soft)}

.attachLoginLink{color:var(--xd-emerald);font-weight:600;text-decoration:none}
.attachLoginLink:hover{color:var(--xd-gold)}

/* ====== EMPTY STATE ====== */
.xuEmptyAttach{
    text-align:center;padding:40px 20px;
    color:var(--xd-soft);
}
.xuEmptyAttach i{font-size:2.8rem;margin-bottom:12px;display:block;color:var(--xd-muted)}

/* ====== SECTION HEADER ====== */
.xuSecBar{
    width:8px;height:40px;border-radius:8px;flex-shrink:0;
    background:linear-gradient(180deg,var(--xd-emerald),var(--xd-gold));
    box-shadow:0 4px 14px rgba(5,150,105,.3);
}
.xuSecTitle{
    font-family:'Neuton',Georgia,serif;
    margin:0;font-weight:700;letter-spacing:-.01em;
    color:var(--xd-ink);font-size:1.5rem;
}
html.xu-dark .xuSecTitle{color:#f1f5f9}
.xuSecBadge{
    font-size:.85rem;color:var(--xd-muted);
    background:rgba(5,150,105,.1);padding:4px 12px;border-radius:999px;
    font-weight:600;
}
html.xu-dark .xuSecBadge{background:rgba(245,158,11,.1);color:var(--xd-gold)}
.xuSecLine{
    border:none;height:1px;
    background:linear-gradient(90deg,transparent,var(--xd-emerald),var(--xd-gold),transparent);
    margin-top:18px;
}

/* ====== RESPONSIVE ====== */
@media (max-width:600px){
    .xuAbsToolbar{flex-direction:column;align-items:stretch}
    .xuAbsStatus{margin-left:0;justify-content:center}
    .xuInfoTable th{width:140px;padding:10px 14px;font-size:.85rem}
    .xuInfoTable td{padding:10px 14px;font-size:.85rem}
}
</style>

<div id="xuProgress"></div>
<?php $session = session(); ?>
<?php
$__an=[];foreach($data->author as $__v){$__an[]=$__v->author_name;}
$__cite=implode(', ',$__an).' ('.$data->publish_year.'). '.$data->title.'. '.($data->publisher_place?$data->publisher_place.': ':'').$data->publisher.'.';
$__abstract = isset($data->notes) ? trim(strip_tags($data->notes)) : '';

$__pdf = '';
foreach ($data->attachment as $__at) {
    if ($__at->access_type == 'public' && (substr($__at->file_name, -4) === '.pdf' || stripos(($__at->mime_type ?? ''), 'pdf') !== false)) {
        $__pdf = $__at->file_name;
        break;
    }
}
?>

<!-- ============ META GOOGLE SCHOLAR + DUBLIN CORE + OPEN GRAPH ============ -->
<meta name="citation_title" content="<?= esc($data->title) ?>">
<?php foreach ($data->author as $__a) : ?>
<meta name="citation_author" content="<?= esc($__a->author_name) ?>">
<?php endforeach ?>
<meta name="citation_publication_date" content="<?= esc($data->publish_year) ?>">
<meta name="citation_publisher" content="<?= esc($data->publisher) ?>">
<meta name="citation_place" content="<?= esc($data->publisher_place) ?>">
<meta name="citation_language" content="<?= esc($data->language) ?>">
<meta name="citation_abstract_html_url" content="<?= current_url() ?>">
<?php foreach ($data->topic as $__t) : ?>
<meta name="citation_keywords" content="<?= esc($__t->topic) ?>">
<?php endforeach ?>
<?php if (!empty($__pdf)) : ?>
<meta name="citation_pdf_url" content="<?= base_url('uploads/repository/' . $__pdf) ?>">
<?php endif ?>
<meta name="DC.Title" content="<?= esc($data->title) ?>">
<?php foreach ($data->author as $__a) : ?>
<meta name="DC.Creator" content="<?= esc($__a->author_name) ?>">
<?php endforeach ?>
<meta name="DC.Date" content="<?= esc($data->publish_year) ?>">
<meta name="DC.Publisher" content="<?= esc($data->publisher) ?>">
<meta name="DC.Language" content="<?= esc($data->language) ?>">
<meta property="og:title" content="<?= esc($data->title) ?>">
<meta property="og:type" content="article">
<meta property="og:url" content="<?= current_url() ?>">
<meta property="og:description" content="<?= esc(substr($__abstract, 0, 200)) ?>">
<?php if (!empty($data->image)) : ?>
<meta property="og:image" content="<?= base_url('uploads/images/docs/' . $data->image) ?>">
<?php endif ?>

<div class="container py-5">

    <!-- ============ HEADER DETAIL ============ -->
    <div class="row align-items-center mb-4">
        <div class="col-12">
            <div style="display:flex;align-items:center;gap:14px;flex-wrap:wrap">
                <div class="xuSecBar"></div>
                <h2 class="xuSecTitle">Record Details</h2>
                <span class="xuSecBadge"><i class="fa fa-book"></i> ETD</span>
            </div>
            <hr class="xuSecLine">
        </div>
    </div>

    <!-- ============ KARTU UTAMA ============ -->
    <div class="card xuR mb-4" style="border:none;border-radius:22px;overflow:hidden;box-shadow:0 20px 50px rgba(15,23,42,.08)">
        <div class="row no-gutters">

            <!-- Kolom Cover -->
            <div class="col-lg-4" id="xuCoverCol" style="background:linear-gradient(160deg,#0a2920,#064e3b 60%,#115e59);padding:30px;display:flex;align-items:center;justify-content:center;flex-direction:column">
                <div id="xuShine"></div>
                <div id="xuTilt" style="perspective:900px;position:relative;z-index:2">
                    <?php if (empty($data->image) || is_null($data->image)) : ?>
                        <img class="no_image" src="<?= base_url('assets/images/no_image.jpg'); ?>" alt="no_image" style="max-width:100%;border-radius:14px;box-shadow:0 20px 40px rgba(0,0,0,.5);transition:transform .15s ease">
                    <?php else : ?>
                        <img src="<?= base_url('uploads/images/docs/' . $data->image) ?>" alt="book cover" style="max-width:100%;border-radius:14px;box-shadow:0 20px 40px rgba(0,0,0,.5);transition:transform .15s ease">
                    <?php endif ?>
                </div>

                <!-- Badge GMD -->
                <div style="margin-top:22px;display:inline-flex;align-items:center;gap:8px;padding:8px 16px;background:rgba(245,158,11,.15);border:1px solid rgba(245,158,11,.4);border-radius:999px;color:#fbbf24;font-weight:700;font-size:.85rem;position:relative;z-index:2">
                    <i class="fa fa-tags"></i> <?= esc($data->gmd) ?>
                </div>
            </div>

            <!-- Kolom Info -->
            <div class="col-lg-8" style="padding:34px">
                <h3 id="xuTitle"><?= esc($data->title) ?></h3>

                <!-- Penulis -->
                <div style="margin-bottom:20px">
                    <?php foreach ($data->author as $key => $value) : ?>
                        <div class="xuAuthorCard">
                            <span class="xuAuthorAvatar"><?= esc(strtoupper(substr(trim($value->author_name), 0, 1))) ?></span>
                            <span style="display:flex;flex-direction:column;line-height:1.25">
                                <a class="xuAuthorName" href="<?= base_url('beranda/search?author=' . rawurlencode($value->author_name)) ?>" title="Lihat dokumen lain dari penulis ini"><?= esc($value->author_name) ?></a>
                                <span class="xuAuthorRole"><?= authority_type($value->authority_type) ?></span>
                            </span>
                            <a class="xuAuthorSearchBtn" href="<?= base_url('beranda/search?author=' . rawurlencode($value->author_name)) ?>" title="Lihat semua karya penulis ini"><i class="fa fa-book"></i> Karya</a>
                            <a class="xuAuthorProfileBtn" href="<?= base_url('beranda/author/' . (int)$value->author_id) ?>" title="Lihat Profil Penulis"><i class="fa fa-id-badge"></i> Lihat Profil <i class="fa fa-arrow-right"></i></a>
                        </div>
                    <?php endforeach ?>
                </div>

                <!-- Tombol Aksi -->
                <div style="display:flex;flex-wrap:wrap;gap:10px;margin-bottom:22px">
                    <a target="_blank" href="?p=show_detail&amp;inXML=true&amp;id=<?= rawurlencode($data->biblio_id) ?>" class="xuActBtn xml">
                        <i class="fa fa-code"></i> XML
                    </a>
                    <a href="https://www.mendeley.com/import/?url=<?= rawurlencode(current_url()) ?>" target="_blank" class="xuActBtn mendeley">
                        <i class="fa fa-bookmark"></i> Import Mendeley
                    </a>
                    <button type="button" onclick="xuCopy()" class="xuActBtn primary">
                        <i class="fa fa-clipboard"></i> Salin Sitasi
                    </button>
                    <button type="button" onclick="xuDownloadRIS()" class="xuActBtn outline ris">
                        <i class="fa fa-download"></i> RIS
                    </button>
                    <button type="button" onclick="xuDownloadBibTeX()" class="xuActBtn outline bib">
                        <i class="fa fa-file-text-o"></i> BibTeX
                    </button>
                </div>

                <!-- Tombol Share -->
                <div class="xuShareBox">
                    <div class="lbl"><i class="fa fa-share-alt"></i> Bagikan Dokumen</div>
                    <div style="display:flex;flex-wrap:wrap;gap:8px">
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?= rawurlencode(current_url()) ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" title="Share to Facebook" target="_blank" class="xuShareIco" style="background:#1877f2"><i class="fa fa-facebook"></i></a>
                        <a href="http://twitter.com/share?url=<?= rawurlencode(current_url()) ?>&amp;text=<?= rawurlencode(character_limiter($data->title, 60)) ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" title="Share to Twitter" target="_blank" class="xuShareIco" style="background:#1da1f2"><i class="fa fa-twitter"></i></a>
                        <a href="https://plus.google.com/share?url=<?= rawurlencode(current_url()) ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" title="Share to Google Plus" target="_blank" class="xuShareIco" style="background:#db4437"><i class="fa fa-google-plus"></i></a>
                        <a href="http://www.digg.com/submit?url=<?= rawurlencode(current_url()) ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" title="Share to Digg" target="_blank" class="xuShareIco" style="background:#000"><i class="fa fa-digg"></i></a>
                        <a href="http://reddit.com/submit?url=<?= rawurlencode(current_url()) ?>&amp;title=<?= rawurlencode(character_limiter($data->title, 60)) ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" title="Share to Reddit" target="_blank" class="xuShareIco" style="background:#ff4500"><i class="fa fa-reddit"></i></a>
                        <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?= rawurlencode(current_url()) ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" title="Share to LinkedIn" target="_blank" class="xuShareIco" style="background:#0077b5"><i class="fa fa-linkedin"></i></a>
                        <a href="http://www.stumbleupon.com/submit?url=<?= rawurlencode(current_url()) ?>&amp;title=<?= rawurlencode(character_limiter($data->title, 60)) ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" title="Share to Stumbleupon" target="_blank" class="xuShareIco" style="background:#eb4924"><i class="fa fa-stumbleupon"></i></a>
                    </div>
                </div>

                <!-- ============ ABSTRAK (FITUR 1) ============ -->
                <?php if (!empty($data->notes)) : ?>
                    <div class="xuAbsBox">
                        <div class="xuAbsHead">
                            <i class="fa fa-file-text-o"></i> Abstrak / Catatan
                        </div>

                        <div class="xuAbsToolbar">
                            <button type="button" class="xuAbsBtn" id="xuBtnSpeak" title="Dengarkan abstrak">
                                <i class="fa fa-volume-up"></i> <span>Dengarkan</span>
                            </button>
                            <button type="button" class="xuAbsBtn" id="xuBtnStop" style="display:none" title="Hentikan pembacaan">
                                <i class="fa fa-stop"></i> Hentikan
                            </button>
                            <select class="xuAbsSpeed" id="xuSpeed" title="Kecepatan baca">
                                <option value="0.75">🐢 0.75x</option>
                                <option value="0.9" selected>🎯 0.9x Jelas</option>
                                <option value="1">1x Normal</option>
                                <option value="1.25">⚡ 1.25x</option>
                            </select>
                            <select class="xuAbsSpeed" id="xuEngine" title="Mesin suara">
                                <option value="ggl" selected>🇮🇩 Google Indonesia</option>
                                <option value="sys">🖥️ Suara Sistem</option>
                            </select>
                            <select class="xuAbsSpeed" id="xuVoiceSel" title="Pilih suara sistem" style="max-width:220px"></select>
                            <span class="xuAbsStatus" id="xuStatus">
                                <span class="xuDot"></span> Sedang membacakan...
                            </span>
                            <button type="button" class="xuAbsBtn" id="xuBtnTranslate" style="margin-left:auto">
                                <i class="fa fa-globe"></i> Terjemahkan
                            </button>
                        </div>

                        <div class="xuAbsText" id="xuAbsText"><?= nl2br(esc($__abstract)) ?></div>

                        <div class="xuAbsTransBox" id="xuTransBox">
                            <div class="xuAbsTransHead">
                                <b><i class="fa fa-language"></i> <span id="xuLangLabel">Terjemahan</span></b>
                                <div style="display:flex;gap:8px;align-items:center;flex-wrap:wrap">
                                    <select class="xuAbsLangSelect" id="xuLangSelect">
                                        <option value="en">🇬🇧 English</option>
                                        <option value="ar">🇸🇦 العربية (Arab)</option>
                                        <option value="ms">🇲🇾 Melayu</option>
                                        <option value="id">🇮🇩 Indonesia (Asli)</option>
                                    </select>
                                    <button type="button" class="xuAbsBtn" id="xuBtnBackOrig" style="padding:6px 12px;font-size:.75rem">
                                        <i class="fa fa-undo"></i> Asli
                                    </button>
                                </div>
                            </div>
                            <div class="xuAbsTransText" id="xuTransText">Pilih bahasa lalu tunggu...</div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- ============ TABEL INFORMASI DETAIL ============ -->
    <div class="card xuR mb-4" style="border:none;border-radius:22px;overflow:hidden;box-shadow:0 20px 50px rgba(15,23,42,.08)">
        <div class="xuDetailInfoHead">
            <h2><i class="fa fa-info-circle"></i> Detail Information</h2>
        </div>
        <div style="padding:8px">
            <table class="xuInfoTable m-0">
                <tbody>
                    <?php
                    $rows = [
                        ['label' => 'Item Type', 'icon' => 'fa-cube', 'value' => '<div itemprop="alternativeHeadline">' . esc($data->item_type) . '</div>'],
                        ['label' => 'Penulis', 'icon' => 'fa-users', 'value' => function() use ($data) {
                            $out = '';
                            foreach ($data->author as $v) {
                                $out .= '<div style="padding:5px 0;display:flex;align-items:center;gap:10px;flex-wrap:wrap"><a href="' . base_url('beranda/search?author=' . rawurlencode($v->author_name)) . '">' . esc($v->author_name) . '</a> <span class="role">— ' . authority_type($v->authority_type) . '</span> <a class="xuAuthorProfileBtn xuMini" href="' . base_url('beranda/author/' . (int)$v->author_id) . '"><i class="fa fa-id-badge"></i> Profil <i class="fa fa-arrow-right"></i></a></div>';
                            }
                            return $out;
                        }],
                        ['label' => 'Student ID', 'icon' => 'fa-id-card', 'value' => '<div itemprop="numberOfPages">' . esc($data->student_id) . '</div>'],
                        ['label' => 'Dosen Pembimbing', 'icon' => 'fa-graduation-cap', 'value' => function() use ($data) {
                            $out = '';
                            foreach ($data->supervisor as $v) {
                                $out .= '<div style="padding:4px 0"><a href="' . base_url('beranda/search?supervisor=' . rawurlencode($v->supervisor_name)) . '" class="sup">' . esc($v->supervisor_name) . '</a> <span class="role">— ' . esc($v->supervisor_number) . ' — Pembimbing ' . $v->level . '</span></div>';
                            }
                            return $out;
                        }],
                        ['label' => 'Penguji', 'icon' => 'fa-gavel', 'value' => function() use ($data) {
                            $out = '';
                            foreach ($data->examiner as $v) {
                                $out .= '<div style="padding:4px 0"><a href="' . base_url('beranda/search?examiner=' . rawurlencode($v->examiner_name)) . '" class="exam">' . esc($v->examiner_name) . '</a> <span class="role">— ' . esc($v->examiner_number) . ' — Penguji ' . $v->level . '</span></div>';
                            }
                            return $out;
                        }],
                        ['label' => 'Kode Prodi PDDIKTI', 'icon' => 'fa-barcode', 'value' => esc($data->code_ministry)],
                        ['label' => 'Edisi', 'icon' => 'fa-book', 'value' => '<div itemprop="bookEdition">' . esc($data->edition) . '</div>'],
                        ['label' => 'Departement', 'icon' => 'fa-building', 'value' => esc($data->departement)],
                        ['label' => 'Kontributor', 'icon' => 'fa-handshake-o', 'value' => function() use ($data) {
                            $out = '';
                            foreach ($data->contributor as $v) {
                                $out .= '<div style="padding:4px 0"><a href="' . base_url('beranda/search?contributor=' . rawurlencode($v->contributor_name)) . '">' . esc($v->contributor_name) . '</a> <span class="role">— Kontributor ' . $v->level . '</span></div>';
                            }
                            return $out;
                        }],
                        ['label' => 'Bahasa', 'icon' => 'fa-language', 'value' => '<div><meta itemprop="inLanguage" content="">' . esc($data->language) . '</div>'],
                        ['label' => 'Penerbit', 'icon' => 'fa-institution', 'value' => '<span itemprop="publisher" itemtype="http://schema.org/Organization" itemscope="">' . esc($data->publisher) . '</span> : <span itemprop="publisher">' . esc($data->publisher_place) . '</span>, <span itemprop="datePublished">' . esc($data->publish_year) . '</span>'],
                        ['label' => 'Subyek', 'icon' => 'fa-tags', 'value' => function() use ($data) {
                            $out = '';
                            foreach ($data->topic as $v) {
                                $out .= '<a href="' . base_url('beranda/search?topic=' . rawurlencode($v->topic)) . '" itemprop="keywords" class="xuTopicChip">' . esc($v->topic) . '</a>';
                            }
                            return $out;
                        }],
                        ['label' => 'No Panggil', 'icon' => 'fa-hashtag', 'value' => esc($data->call_number)],
                        ['label' => 'Copyright', 'icon' => 'fa-copyright', 'value' => esc($data->copyright)],
                        ['label' => 'DOI', 'icon' => 'fa-link', 'value' => !empty($data->url_crossref) ? '<a href="' . esc($data->url_crossref) . '" target="_blank" class="doi">' . esc($data->url_crossref) . '</a>' : '<span style="color:var(--xd-soft)">—</span>'],
                    ];

                    foreach ($rows as $i => $row) :
                        $val = is_callable($row['value']) ? $row['value']() : $row['value'];
                    ?>
                        <tr>
                            <th>
                                <i class="fa <?= $row['icon'] ?>"></i>
                                <?= $row['label'] ?>
                            </th>
                            <td><?= $val ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

<!-- ============ LAMPIRAN BERKAS ============ -->
<div class="card xuR" style="border:none;border-radius:22px;overflow:hidden;box-shadow:0 20px 50px rgba(15,23,42,.08)">
    <div class="xuAttachHead">
        <h2><i class="fa fa-paperclip"></i> Lampiran Berkas</h2>
    </div>
    <div style="padding:20px 28px" itemprop="associatedMedia">
        <?php
        $hasAttachment = false;
        foreach ($data->attachment as $value) {
            if ($value->access_type == 'public') { $hasAttachment = true; break; }
        }
        ?>
        <?php if ($hasAttachment) : ?>
            <ul class="attachList" style="list-style:none;margin:0;padding:0">
                <?php foreach ($data->attachment as $key => $value) :
                    if ($value->access_type == 'public'):
                        $enc = base64_encode($data->biblio_id . '|' . $value->file_id . '|' . $value->file_name);
                        // ✅ FALLBACK JUDUL: jika file_title kosong, pakai nama file
                        $judulFile = (!empty($value->file_title) && $value->file_title !== '-')
                                   ? $value->file_title
                                   : $value->file_name;
                ?>
                    <li style="margin-bottom:10px">
                        <div style="display:flex;align-items:center;gap:12px;background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.12);border-radius:14px;padding:14px 16px">
                            <div style="width:42px;height:42px;border-radius:10px;background:rgba(16,185,129,.15);display:flex;align-items:center;justify-content:center;flex-shrink:0">
                                <i class="fa fa-file-pdf-o" style="font-size:20px;color:#10b981"></i>
                            </div>
                            <div style="flex:1;min-width:0">
                                <!-- ✅ LINK LANGSUNG: href ke file PDF, target blank.
                                     Class openPopUp DIHAPUS agar tidak konflik handler popup.
                                     Klik PASTI membuka file bahkan tanpa JavaScript. -->
                                <a class="download_file"
                                   data-file="<?= $enc ?>"
                                   href="<?= base_url('uploads/repository/' . rawurlencode($value->file_name)) ?>"
                                   target="_blank"
                                   rel="noopener"
                                   style="color:#ffffff;font-weight:700;text-decoration:none;display:block;overflow:hidden;text-overflow:ellipsis;white-space:nowrap">
                                    <i class="fa fa-download" style="margin-right:6px;color:#10b981"></i><?= esc($judulFile) ?>
                                </a>
                                <small style="color:rgba(255,255,255,.55)"><i class="fa fa-unlock"></i> Public access</small>
                            </div>
                        </div>
                    </li>
                <?php endif;
                endforeach; ?>
            </ul>
        <?php else : ?>
            <div style="text-align:center;padding:30px;color:rgba(255,255,255,.5)">
                <i class="fa fa-folder-open-o" style="font-size:34px;display:block;margin-bottom:10px"></i>
                Belum ada lampiran berkas untuk dokumen ini.
            </div>
        <?php endif; ?>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function(){
    // ===== Progress bar scroll =====
    window.addEventListener('scroll', function(){
        var h = document.documentElement;
        var p = h.scrollTop / ((h.scrollHeight - h.clientHeight) || 1);
        var el = document.getElementById('xuProgress');
        if (el) el.style.width = (p * 100) + '%';
    });

    // ===== Tilt 3D cover =====
    var t = document.getElementById('xuTilt');
    if (t){
        var im = t.querySelector('img');
        if (im){
            t.addEventListener('mousemove', function(e){
                var r = t.getBoundingClientRect();
                var x = (e.clientX - r.left) / r.width - .5;
                var y = (e.clientY - r.top) / r.height - .5;
                im.style.transform = 'rotateY(' + (x * 15) + 'deg) rotateX(' + (-y * 15) + 'deg) scale(1.04)';
            });
            t.addEventListener('mouseleave', function(){ im.style.transform = 'none'; });
        }
    }

    // ===== Shine effect =====
    var cw = document.getElementById('xuCoverCol');
    var sh = document.getElementById('xuShine');
    if (cw && sh){
        cw.addEventListener('mousemove', function(e){
            var r = cw.getBoundingClientRect();
            sh.style.left = ((e.clientX - r.left) / r.width * 130 - 15) + '%';
        });
        cw.addEventListener('mouseleave', function(){ sh.style.left = '-100%'; });
    }

    // ===== Fade-in reveal =====
    var io = new IntersectionObserver(function(es){
        es.forEach(function(en, i){
            if (en.isIntersecting){
                setTimeout(function(){ en.target.classList.add('in'); }, i * 60);
                io.unobserve(en.target);
            }
        });
    }, {threshold: .08});
    document.querySelectorAll('.xuR').forEach(function(el){ io.observe(el); });

    // ============ TTS + TERJEMAHAN (TAHAN BANTING) ============
    var absText = <?= json_encode($__abstract) ?>;
    var savedEn = <?= json_encode(isset($data->notes_en) ? (string)$data->notes_en : '') ?>;
    var btnSpeak = document.getElementById('xuBtnSpeak');
    var btnStop  = document.getElementById('xuBtnStop');
    var btnTrans = document.getElementById('xuBtnTranslate');
    var btnBack  = document.getElementById('xuBtnBackOrig');
    var speedSel = document.getElementById('xuSpeed');
    var engineSel= document.getElementById('xuEngine');
    var voiceSel = document.getElementById('xuVoiceSel');
    var statusEl = document.getElementById('xuStatus');
    var transBox = document.getElementById('xuTransBox');
    var transTxt = document.getElementById('xuTransText');
    var langSel  = document.getElementById('xuLangSelect');
    var langLbl  = document.getElementById('xuLangLabel');
    var txtEl    = document.getElementById('xuAbsText');

    function log(m){ console.log('🔊 [RANGKUI TTS]', m); }
    function esc(s){ var d = document.createElement('div'); d.textContent = s; return d.innerHTML.replace(/\n/g, '<br>'); }

    if (btnSpeak){
        var synth = window.speechSynthesis || null;
        var utter = null, speaking = false, cache = {};
        var gglAudio = null, gglQueue = [], gglBase = null;

        function fillVoices(){
            if (!synth || !voiceSel) return;
            var vs = synth.getVoices();
            if (!vs || !vs.length) return;
            voiceSel.innerHTML = '';
            vs.forEach(function(v, i){
                var o = document.createElement('option');
                o.value = i;
                o.textContent = v.name + ' (' + v.lang + ')';
                voiceSel.appendChild(o);
            });
            var idx = -1;
            vs.forEach(function(v, i){
                var n = v.name.toLowerCase();
                if (idx < 0 && v.lang.toLowerCase().indexOf('id') === 0 && (n.indexOf('ardi') > -1 || n.indexOf('male') > -1 || n.indexOf('pria') > -1)) idx = i;
            });
            if (idx < 0) vs.forEach(function(v, i){ if (idx < 0 && v.lang.toLowerCase().indexOf('id') === 0) idx = i; });
            if (idx > -1) voiceSel.value = idx;
            log('Suara sistem tersedia: ' + vs.length);
        }
        fillVoices();
        if (synth && synth.onvoiceschanged !== undefined) synth.onvoiceschanged = fillVoices;

        function engineVal(){ return engineSel ? engineSel.value : 'sys'; }
        if (engineSel) engineSel.addEventListener('change', function(){
            if (voiceSel) voiceSel.style.display = (engineSel.value === 'sys') ? 'inline-block' : 'none';
            stopAll();
        });
        if (voiceSel) voiceSel.style.display = (engineVal() === 'sys') ? 'inline-block' : 'none';

        function setUI(on){
            speaking = on;
            btnSpeak.classList.toggle('active', on);
            btnSpeak.querySelector('span').textContent = on ? 'Jeda' : 'Dengarkan';
            btnSpeak.querySelector('i').className = on ? 'fa fa-pause' : 'fa fa-volume-up';
            btnStop.style.display = on ? 'inline-flex' : 'none';
            if (statusEl) statusEl.classList.toggle('show', on);
            if (!on && txtEl) txtEl.innerHTML = <?= json_encode(nl2br(esc($__abstract))) ?>;
        }

        function stopAll(){
            if (synth) synth.cancel();
            if (gglAudio){ gglAudio.pause(); gglAudio = null; }
            gglQueue = [];
            setUI(false);
        }

        function sysSpeak(){
            if (!synth){ xuToast('⚠️ Browser tanpa speechSynthesis'); return; }
            try{ synth.resume(); }catch(e){}
            synth.cancel();
            utter = new SpeechSynthesisUtterance(absText);
            var vs = synth.getVoices();
            if (vs && voiceSel && voiceSel.value !== '') utter.voice = vs[parseInt(voiceSel.value, 10)];
            utter.lang = 'id-ID';
            utter.rate = parseFloat(speedSel ? speedSel.value : 1);
            utter.pitch = 0.85;
            utter.volume = 1;
            var started = false;
            utter.onstart = function(){ started = true; setUI(true); log('Sistem: BICARA DIMULAI'); };
            utter.onend = function(){ setUI(false); };
            utter.onerror = function(ev){ log('Sistem error: ' + (ev && ev.error)); xuToast('⚠️ Suara sistem: ' + (ev && ev.error ? ev.error : 'gagal')); setUI(false); };
            utter.onboundary = function(e){
                if (e.charIndex !== undefined && txtEl){
                    var cl = e.charLength || 50;
                    txtEl.innerHTML = esc(absText.substring(0, e.charIndex)) +
                        '<span class="xuHl">' + esc(absText.substring(e.charIndex, e.charIndex + cl)) + '</span>' +
                        esc(absText.substring(e.charIndex + cl));
                }
            };
            synth.speak(utter);
            setTimeout(function(){
                if (!started && !synth.speaking) xuToast('⚠️ Suara sistem diam. Cek volume atau ganti suara.');
            }, 2500);
        }

        var bases = [
            'https://translate.googleapis.com/translate_tts?ie=UTF-8&client=chrome&tl=id&q=',
            'https://translate.googleapis.com/translate_tts?ie=UTF-8&client=gtx&tl=id&q=',
            'https://translate.google.com/translate_tts?ie=UTF-8&client=tw-ob&tl=id&q='
        ];
        function probe(cb){
            if (gglBase){ cb(gglBase); return; }
            var i = 0;
            (function next(){
                if (i >= bases.length){ log('Semua endpoint Google gagal'); cb(null); return; }
                var a = new Audio(bases[i] + encodeURIComponent('tes suara'));
                a.addEventListener('canplaythrough', function(){ gglBase = bases[i]; log('Endpoint Google aktif: #' + i); cb(gglBase); }, {once: true});
                a.addEventListener('error', function(){ log('Endpoint #' + i + ' ditolak'); i++; next(); }, {once: true});
                a.load();
            })();
        }
        function chunkText(t, max){
            var sents = t.replace(/\s+/g, ' ').match(/[^.!?]+[.!?]*/g) || [t];
            var out = [], cur = '';
            sents.forEach(function(s){
                if ((cur + s).length > max){
                    if (cur) out.push(cur);
                    cur = (s.length > max) ? '' : s;
                    if (s.length > max) for (var i = 0; i < s.length; i += max) out.push(s.substr(i, max));
                } else cur += s;
            });
            if (cur) out.push(cur);
            return out;
        }
        function nextChunk(){
            if (!gglQueue.length){ stopAll(); return; }
            var c = gglQueue.shift();
            gglAudio = new Audio(gglBase + encodeURIComponent(c));
            gglAudio.playbackRate = parseFloat(speedSel ? speedSel.value : 1);
            gglAudio.onended = nextChunk;
            gglAudio.onerror = function(){ xuToast('⚠️ Audio Google terputus'); stopAll(); };
            gglAudio.play().catch(function(err){ xuToast('⚠️ Browser memblokir autoplay'); stopAll(); });
        }
        function gglSpeak(){
            probe(function(base){
                if (!base){ xuToast('⚠️ Google TTS tak dapat diakses — pakai 🖥️ Suara Sistem'); return; }
                gglQueue = chunkText(absText, 170);
                setUI(true);
                nextChunk();
            });
        }

        btnSpeak.addEventListener('click', function(){
            if (speaking){ stopAll(); return; }
            if (engineVal() === 'ggl') gglSpeak(); else sysSpeak();
        });
        if (btnStop) btnStop.addEventListener('click', stopAll);
        if (speedSel) speedSel.addEventListener('change', function(){ if (speaking){ stopAll(); btnSpeak.click(); } });

        // ========== TERJEMAHAN ==========
        var langNames = {en: '🇬🇧 English', ar: '🇸🇦 العربية', ms: '🇲🇾 Melayu', id: '🇮🇩 Bahasa Indonesia (Asli)'};
        if (btnTrans) btnTrans.addEventListener('click', function(){ transBox.classList.add('show'); doTrans(langSel.value); });
        if (btnBack) btnBack.addEventListener('click', function(){ transBox.classList.remove('show'); });
        if (langSel) langSel.addEventListener('change', function(){ doTrans(langSel.value); });

        function chunkSplit(t, max){
            var sents = t.replace(/\s+/g, ' ').match(/[^.!?]+[.!?]*/g) || [t];
            var out = [], cur = '';
            sents.forEach(function(s){
                if ((cur + s).length > max){ if (cur) out.push(cur); cur = s; }
                else cur += s;
            });
            if (cur) out.push(cur);
            return out;
        }

        function doTrans(lang){
            langLbl.textContent = 'Terjemahan — ' + langNames[lang];
            if (lang === 'id'){ transTxt.innerHTML = '<em>Ini adalah bahasa asli dokumen.</em>'; return; }
            if (cache[lang]){ transTxt.innerHTML = cache[lang]; return; }
            if (lang === 'en' && savedEn){ cache[lang] = esc(savedEn); transTxt.innerHTML = cache[lang]; return; }
            transTxt.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Menerjemahkan...';
            var src = absText.substring(0, 5000);

            fetch('https://translate.googleapis.com/translate_a/single?client=gtx&sl=id&tl=' + lang + '&dt=t&q=' + encodeURIComponent(src))
                .then(function(r){ if (!r.ok) throw new Error('http'); return r.json(); })
                .then(function(j){
                    var out = '';
                    if (Array.isArray(j) && Array.isArray(j[0])){
                        j[0].forEach(function(seg){ if (seg && seg[0]) out += seg[0]; });
                    }
                    if (!out) throw new Error('empty');
                    cache[lang] = esc(out.trim());
                    transTxt.innerHTML = cache[lang];
                })
                .catch(function(){
                    var chunks = chunkSplit(src, 450);
                    var i = 0, acc = '';
                    (function next(){
                        if (i >= chunks.length){
                            if (acc.trim()){ cache[lang] = esc(acc.trim()); transTxt.innerHTML = cache[lang]; }
                            else transTxt.innerHTML = '<em>Maaf, terjemahan gagal. Coba lagi nanti.</em>';
                            return;
                        }
                        fetch('https://api.mymemory.translated.net/get?q=' + encodeURIComponent(chunks[i]) + '&langpair=id|' + lang)
                            .then(function(r){ return r.json(); })
                            .then(function(j){
                                if (j.responseStatus === 200 && j.responseData && j.responseData.translatedText) acc += j.responseData.translatedText + ' ';
                                i++; next();
                            })
                            .catch(function(){ i++; next(); });
                    })();
                });
        }

        window.addEventListener('beforeunload', stopAll);
    }
});

// ===== Toast emerald =====
function xuToast(m){
    var t = document.createElement('div');
    t.textContent = m;
    Object.assign(t.style, {
        position: 'fixed', bottom: '24px', left: '50%',
        transform: 'translateX(-50%)',
        background: 'linear-gradient(90deg,#059669,#f59e0b)',
        color: '#fff', padding: '12px 22px', borderRadius: '999px',
        fontWeight: '700', boxShadow: '0 12px 30px rgba(5,150,105,.45)',
        zIndex: 4000, fontSize: '.9rem'
    });
    document.body.appendChild(t);
    setTimeout(function(){
        t.style.transition = 'all .5s';
        t.style.opacity = '0';
        t.style.transform = 'translateX(-50%) translateY(10px)';
    }, 2000);
    setTimeout(function(){ t.remove(); }, 2600);
}

function xuCopy(){
    var c = <?= json_encode($__cite) ?>;
    if (navigator.clipboard){
        navigator.clipboard.writeText(c).then(function(){ xuToast('✅ Sitasi berhasil disalin ke papan klip!'); });
    } else {
        var ta = document.createElement('textarea');
        ta.value = c;
        document.body.appendChild(ta);
        ta.select();
        try{ document.execCommand('copy'); xuToast('✅ Sitasi berhasil disalin!'); }catch(e){}
        document.body.removeChild(ta);
    }
}

// ============ RIS & BIBTEX GENERATOR ============
var __metaB = <?= json_encode([
    'title'     => $data->title,
    'authors'   => $__an,
    'year'      => $data->publish_year,
    'publisher' => $data->publisher,
    'place'     => $data->publisher_place,
    'abstract'  => $__abstract,
    'url'       => current_url(),
    'keywords'  => array_map(function($t){ return $t->topic; }, $data->topic)
]) ?>;

function xuBlobDownload(name, text){
    var b = new Blob([text], {type: 'text/plain;charset=utf-8'});
    var a = document.createElement('a');
    a.href = URL.createObjectURL(b);
    a.download = name;
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
    xuToast('✅ Berkas sitasi diunduh!');
}

function xuDownloadRIS(){
    var m = __metaB, L = [];
    L.push('TY  - THES');
    m.authors.forEach(function(a){ L.push('AU  - ' + a); });
    L.push('TI  - ' + m.title);
    L.push('PY  - ' + m.year);
    L.push('PB  - ' + m.publisher);
    L.push('PP  - ' + m.place);
    L.push('UR  - ' + m.url);
    L.push('AB  - ' + m.abstract);
    m.keywords.forEach(function(k){ L.push('KW  - ' + k); });
    L.push('ER  - ');
    xuBlobDownload('DIFOSS-' + (m.year || 'tanpa-tahun') + '.ris', L.join('\r\n'));
}

function xuDownloadBibTeX(){
    var m = __metaB;
    var key = ((m.authors[0] || 'difoss').split(/[,\s]+/)[0] || 'difoss').toLowerCase() + (m.year || '');
    var t = '@mastersthesis{' + key + ',\n'
        + '  title    = {' + m.title + '},\n'
        + '  author   = {' + m.authors.join(' and ') + '},\n'
        + '  year     = {' + m.year + '},\n'
        + '  school   = {' + m.publisher + '},\n'
        + '  address  = {' + m.place + '},\n'
        + '  keywords = {' + m.keywords.join(', ') + '},\n'
        + '  url      = {' + m.url + '}\n'
        + '}\n';
    xuBlobDownload('DIFOSS-' + (m.year || 'tanpa-tahun') + '.bib', t);
}
</script>