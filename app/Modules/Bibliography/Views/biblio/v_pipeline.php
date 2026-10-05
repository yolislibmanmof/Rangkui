<?php
$stageColors = ['pembimbing' => '#f59e0b', 'penguji' => '#0891b2', 'admin' => '#059669', 'selesai' => '#10b981'];
$stageLabels = ['pembimbing' => 'Menunggu Pembimbing', 'penguji' => 'Menunggu Penguji', 'admin' => 'Menunggu Admin', 'selesai' => 'Selesai'];
?>
<style>
/* ================================================================
   DIFOSS PIPELINE PERSETUJUAN — EMERALD FOREST EDITION
   ================================================================ */
:root{
    --xp-emerald:#059669; --xp-teal:#0891b2; --xp-gold:#f59e0b;
    --xp-mint:#6ee7b7; --xp-deep:#0a2920; --xp-mid:#064e3b;
    --xp-ink:#0f172a; --xp-muted:#64748b; --xp-soft:#94a3b8;
}

.xuPipeWrap{padding:10px 0}

/* ===== HEADER ===== */
.xuPipeHead{
    display:flex;align-items:center;gap:14px;
    margin-bottom:24px;flex-wrap:wrap;
}
.xuPipeHead h2{
    margin:0;font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1.55rem;
    color:var(--xp-ink);
    display:flex;align-items:center;gap:12px;
    letter-spacing:-.01em;
}
html.xu-dark .xuPipeHead h2{color:#f1f5f9}

.xuPipeHead h2 i{
    width:46px;height:46px;border-radius:14px;
    background:linear-gradient(135deg,var(--xp-emerald),var(--xp-gold));
    color:#fff;
    display:inline-flex;align-items:center;justify-content:center;
    font-size:1.2rem;
    box-shadow:0 10px 24px rgba(5,150,105,.35);
}

/* ===== Tombol Ajukan ===== */
.xuAjukanBtn{
    margin-left:auto;
    display:inline-flex;align-items:center;gap:9px;
    padding:12px 24px;border:none;border-radius:12px;
    background:linear-gradient(90deg,var(--xp-emerald),var(--xp-gold));
    color:#fff;font-weight:800;font-size:.88rem;
    cursor:pointer;
    box-shadow:0 10px 26px rgba(5,150,105,.35);
    transition:.25s;
    position:relative;overflow:hidden;
}
.xuAjukanBtn::before{
    content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;
    background:linear-gradient(100deg,transparent 20%,rgba(255,255,255,.28) 50%,transparent 80%);
    transition:left .6s ease;
}
.xuAjukanBtn:hover{
    transform:translateY(-2px);
    filter:brightness(1.1);
    box-shadow:0 14px 32px rgba(5,150,105,.45);
}
.xuAjukanBtn:hover::before{left:120%}

/* ===== BOARD KANBAN ===== */
.xuPipeBoard{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(280px,1fr));
    gap:18px;
}

.xuPipeCol{
    background:#f8fafc;border-radius:18px;
    padding:18px;
    border:1.5px solid #e2e8f0;
    position:relative;overflow:hidden;
}
.xuPipeCol::before{
    content:'';position:absolute;top:0;left:0;right:0;height:3px;
    background:linear-gradient(90deg,var(--col-c),transparent);
}
html.xu-dark .xuPipeCol{background:#0f1e1f;border-color:rgba(5,150,105,.2)}

.xuPipeCol h3{
    margin:0 0 16px;
    font-family:'Neuton',Georgia,serif;
    font-size:1rem;font-weight:700;
    color:var(--xp-ink);
    display:flex;align-items:center;gap:10px;
}
html.xu-dark .xuPipeCol h3{color:#f1f5f9}

.xuPipeCol h3 .dot{
    width:11px;height:11px;border-radius:50%;
    box-shadow:0 0 10px currentColor;
}
.xuPipeCol h3 .count{
    margin-left:auto;
    font-family:'Plus Jakarta Sans',sans-serif;
    font-size:.72rem;font-weight:800;
    padding:3px 11px;border-radius:999px;
    background:#fff;border:1.5px solid #e2e8f0;
    color:var(--xp-muted);
}
html.xu-dark .xuPipeCol h3 .count{background:rgba(5,150,105,.1);border-color:rgba(5,150,105,.25);color:var(--xp-soft)}

/* ===== KARTU DOKUMEN ===== */
.xuPipeCard{
    background:#fff;border-radius:13px;
    padding:15px;margin-bottom:12px;
    border:1px solid #e2e8f0;
    box-shadow:0 2px 8px rgba(0,0,0,.04);
    transition:.3s cubic-bezier(.2,.8,.2,1);
    position:relative;
}
.xuPipeCard::before{
    content:'';position:absolute;top:0;left:0;bottom:0;width:3px;
    background:var(--xp-emerald);opacity:0;transition:opacity .25s;
    border-radius:0 3px 3px 0;
}
.xuPipeCard:hover{
    box-shadow:0 10px 26px rgba(5,150,105,.15);
    transform:translateY(-3px);
    border-color:rgba(5,150,105,.25);
}
.xuPipeCard:hover::before{opacity:1}
html.xu-dark .xuPipeCard{background:#0a2920;border-color:rgba(5,150,105,.2)}
html.xu-dark .xuPipeCard:hover{box-shadow:0 10px 26px rgba(5,150,105,.25);border-color:rgba(245,158,11,.35)}

.xuPipeCard .title{
    font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:.95rem;
    color:var(--xp-ink);
    margin-bottom:8px;line-height:1.4;
}
html.xu-dark .xuPipeCard .title{color:#f1f5f9}

.xuPipeCard .meta{
    font-size:.78rem;color:var(--xp-muted);line-height:1.65;
}
.xuPipeCard .meta b{color:var(--xp-ink);font-weight:700}
html.xu-dark .xuPipeCard .meta{color:var(--xp-soft)}
html.xu-dark .xuPipeCard .meta b{color:#e2e8f0}

/* ===== STATUS BADGE ===== */
.xuStBadge{
    display:inline-block;
    padding:3px 10px;border-radius:999px;
    font-size:.66rem;font-weight:800;
    color:#fff;margin-bottom:8px;
    letter-spacing:.04em;
    box-shadow:0 4px 10px rgba(0,0,0,.15);
}

/* ===== ACTION BUTTONS ===== */
.xuPipeActions{display:flex;gap:8px;margin-top:12px}
.xuPipeBtn{
    flex:1;padding:8px 10px;
    border:none;border-radius:9px;
    font-weight:700;font-size:.76rem;
    cursor:pointer;transition:.25s;
    display:inline-flex;align-items:center;justify-content:center;gap:6px;
}
.xuPipeBtn.ok{
    background:linear-gradient(90deg,var(--xp-emerald),var(--xp-teal));
    color:#fff;
    box-shadow:0 6px 16px rgba(5,150,105,.3);
}
.xuPipeBtn.ok:hover{filter:brightness(1.1);transform:translateY(-1px);box-shadow:0 10px 22px rgba(5,150,105,.4)}

.xuPipeBtn.no{
    background:#fee2e2;color:#dc2626;
    border:1.5px solid rgba(220,38,38,.25);
}
.xuPipeBtn.no:hover{background:#fecaca;border-color:rgba(220,38,38,.5);transform:translateY(-1px)}
html.xu-dark .xuPipeBtn.no{background:rgba(239,68,68,.15);color:#fca5a5;border-color:rgba(239,68,68,.3)}

.xuEmpty{
    padding:30px 20px;text-align:center;
    color:var(--xp-soft);font-size:.85rem;
    font-style:italic;
}

/* ===== LINK & COPY BUTTONS ===== */
.xuLinkBtn{
    background:rgba(5,150,105,.1);
    color:var(--xp-emerald);
    border:1px solid rgba(5,150,105,.25);
    padding:7px 13px;border-radius:9px;
    font-weight:700;font-size:.75rem;
    cursor:pointer;transition:.2s;
    display:inline-flex;align-items:center;gap:6px;
}
.xuLinkBtn:hover{
    background:linear-gradient(90deg,var(--xp-emerald),var(--xp-gold));
    color:#fff;border-color:transparent;
    transform:translateY(-1px);
    box-shadow:0 6px 14px rgba(5,150,105,.3);
}
html.xu-dark .xuLinkBtn{background:rgba(5,150,105,.15);color:var(--xp-mint);border-color:rgba(5,150,105,.3)}
html.xu-dark .xuLinkBtn:hover{color:#fff}

.xuCopyBtn{
    background:rgba(8,145,178,.1);
    color:var(--xp-teal);
    border:1px solid rgba(8,145,178,.25);
    padding:7px 13px;border-radius:9px;
    font-weight:700;font-size:.75rem;
    cursor:pointer;transition:.2s;
    display:inline-flex;align-items:center;gap:6px;
}
.xuCopyBtn:hover{
    background:linear-gradient(90deg,var(--xp-teal),var(--xp-emerald));
    color:#fff;border-color:transparent;
    transform:translateY(-1px);
}
html.xu-dark .xuCopyBtn{background:rgba(8,145,178,.15);color:var(--xp-mint);border-color:rgba(8,145,178,.3)}
html.xu-dark .xuCopyBtn:hover{color:#fff}

/* ===== WHATSAPP BUTTON (brand asli dipertahankan) ===== */
.xuWaBtn{
    display:inline-flex;align-items:center;gap:7px;
    padding:9px 16px;border-radius:10px;
    background:linear-gradient(90deg,#25d366,#128c7e);
    color:#fff;font-weight:700;font-size:.78rem;
    text-decoration:none;margin:4px 6px 4px 0;
    transition:.25s;
    box-shadow:0 6px 14px rgba(37,211,102,.3);
}
.xuWaBtn:hover{
    filter:brightness(1.1);
    transform:translateY(-2px);
    box-shadow:0 10px 22px rgba(37,211,102,.4);
    color:#fff;
}

/* ===== MODAL UMUM ===== */
.xuModal{
    display:none;position:fixed;inset:0;
    background:rgba(10,41,32,.65);
    backdrop-filter:blur(6px);-webkit-backdrop-filter:blur(6px);
    z-index:2000;
    align-items:center;justify-content:center;
    padding:16px;
}
.xuModalContent{
    background:#fff;border-radius:22px;
    max-width:580px;width:100%;
    padding:28px;
    max-height:92vh;overflow:auto;
    box-shadow:0 40px 100px rgba(0,0,0,.4);
    border:1px solid rgba(5,150,105,.18);
    position:relative;overflow-x:hidden;
}
.xuModalContent::before{
    content:'';position:absolute;top:0;left:0;right:0;height:3px;
    background:linear-gradient(90deg,var(--xp-emerald),var(--xp-gold),var(--xp-teal));
}
html.xu-dark .xuModalContent{background:#0f1e1f;border-color:rgba(5,150,105,.3)}

.xuModalContent.wide{max-width:640px}

.xuModalTitle{
    margin:0 0 18px;
    font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1.3rem;
    color:var(--xp-ink);
    display:flex;align-items:center;gap:11px;
}
html.xu-dark .xuModalTitle{color:#f1f5f9}
.xuModalTitle i{
    width:38px;height:38px;border-radius:11px;
    background:linear-gradient(135deg,var(--xp-emerald),var(--xp-gold));
    color:#fff;
    display:inline-flex;align-items:center;justify-content:center;
    font-size:1rem;
    box-shadow:0 6px 14px rgba(5,150,105,.3);
}

/* ===== FORM ELEMENTS ===== */
.xuIn{
    width:100%;padding:11px 14px;
    border:1.5px solid #e2e8f0;
    border-radius:11px;
    font-size:.88rem;color:var(--xp-ink);
    margin-bottom:13px;box-sizing:border-box;
    background:#fff;
    transition:.25s;
    font-family:inherit;
}
.xuIn:focus{
    border-color:var(--xp-emerald);
    box-shadow:0 0 0 4px rgba(5,150,105,.12);
    outline:none;
}
html.xu-dark .xuIn{background:rgba(255,255,255,.06);border-color:rgba(5,150,105,.25);color:#f1f5f9}
html.xu-dark .xuIn:focus{border-color:var(--xp-gold);box-shadow:0 0 0 4px rgba(245,158,11,.15)}

.xuLbl{
    display:block;font-weight:800;
    font-size:.72rem;
    text-transform:uppercase;letter-spacing:.08em;
    color:var(--xp-ink);margin-bottom:7px;
}
html.xu-dark .xuLbl{color:#e2e8f0}

.xuCheckbox{
    display:flex;align-items:center;gap:9px;
    font-size:.85rem;font-weight:700;
    color:var(--xp-ink);
    margin:8px 0 12px;
    cursor:pointer;
}
html.xu-dark .xuCheckbox{color:#e2e8f0}
.xuCheckbox input[type="checkbox"]{
    width:18px;height:18px;
    accent-color:var(--xp-emerald);
    cursor:pointer;
}

.xuDocInfoBox{
    background:linear-gradient(135deg,rgba(5,150,105,.06),rgba(8,145,178,.04));
    border:1px solid rgba(5,150,105,.18);
    border-radius:13px;
    padding:14px 16px;margin-bottom:16px;
    font-size:.85rem;color:var(--xp-muted);
    line-height:1.55;
}
.xuDocInfoBox b{color:var(--xp-ink);font-size:.95rem;display:block;margin-bottom:4px}
html.xu-dark .xuDocInfoBox{background:linear-gradient(135deg,rgba(5,150,105,.12),rgba(8,145,178,.08));border-color:rgba(5,150,105,.3);color:var(--xp-soft)}
html.xu-dark .xuDocInfoBox b{color:#f1f5f9}

.xuModalActions{
    display:flex;gap:10px;margin-top:18px;
}
.xuModalActions .xuPipeBtn.no{flex:0 0 auto;padding:11px 22px}
.xuModalActions .xuAjukanBtn{margin-left:0;flex:1;justify-content:center}

/* ===== STEP LINK LIST (modal) ===== */
.xuStepBox{
    border:1.5px solid #e2e8f0;
    border-radius:15px;
    padding:16px;margin-bottom:13px;
    background:#fafbfc;
    position:relative;
}
html.xu-dark .xuStepBox{background:rgba(5,150,105,.05);border-color:rgba(5,150,105,.2)}

.xuStepHead{
    display:flex;align-items:center;gap:9px;
    margin-bottom:12px;padding-bottom:10px;
    border-bottom:1px dashed rgba(5,150,105,.15);
}
.xuStepHead b{
    font-family:'Neuton',Georgia,serif;
    text-transform:capitalize;
    color:var(--xp-ink);font-size:1rem;font-weight:700;
}
html.xu-dark .xuStepHead b{color:#f1f5f9}

.xuStepActions{
    display:flex;gap:8px;flex-wrap:wrap;margin-top:10px;
}

.xuStepLink{
    color:var(--xp-muted);word-break:break-all;
    display:block;margin-top:10px;
    background:#fff;padding:9px 12px;
    border-radius:9px;border:1px dashed #cbd5e1;
    font-size:.75rem;
    font-family:'JetBrains Mono',monospace;
}
html.xu-dark .xuStepLink{background:rgba(255,255,255,.04);border-color:rgba(5,150,105,.25);color:var(--xp-soft)}

.xuStepMsg{
    display:block;margin-top:10px;
    font-size:.8rem;font-weight:600;
    padding:8px 12px;border-radius:9px;
}
.xuStepMsg.ok{color:var(--xp-emerald);background:rgba(5,150,105,.08)}
.xuStepMsg.err{color:#dc2626;background:rgba(239,68,68,.08)}
html.xu-dark .xuStepMsg.ok{color:var(--xp-mint);background:rgba(5,150,105,.15)}
html.xu-dark .xuStepMsg.err{color:#fca5a5;background:rgba(239,68,68,.12)}

/* ===== HASIL CHAIN (sukses) ===== */
.xuChainBox{
    background:linear-gradient(135deg,rgba(5,150,105,.08),rgba(110,231,183,.04));
    border:1.5px solid rgba(5,150,105,.35);
    border-radius:14px;
    padding:16px;margin-top:10px;
}
.xuChainBox b{
    color:var(--xp-emerald);font-size:.88rem;
    display:flex;align-items:center;gap:8px;
}
html.xu-dark .xuChainBox{background:linear-gradient(135deg,rgba(5,150,105,.14),rgba(110,231,183,.06));border-color:rgba(5,150,105,.4)}
html.xu-dark .xuChainBox b{color:var(--xp-mint)}
.xuChainLinks{
    margin-top:12px;display:flex;flex-direction:column;gap:8px;
}

/* ===== Loading & close button ===== */
.xuModalClose{
    text-align:right;margin-top:16px;
}
.xuModalClose .xuPipeBtn.no{flex:0 0 auto;padding:11px 22px}

/* ===== Responsive ===== */
@media(max-width:640px){
    .xuPipeHead h2{font-size:1.2rem}
    .xuPipeHead h2 i{width:40px;height:40px;font-size:1.05rem}
    .xuAjukanBtn{padding:10px 18px;font-size:.8rem}
    .xuModalContent{padding:22px 18px}
}
</style>

<div class="xuPipeWrap">
    <div class="xuPipeHead">
        <h2><i class="fa fa-tasks"></i> Pipeline Persetujuan Dokumen</h2>
        <button type="button" class="xuAjukanBtn" id="xuBtnAjukan">
            <i class="fa fa-paper-plane"></i> Ajukan Persetujuan
        </button>
    </div>

    <div class="xuPipeBoard">
        <?php foreach ($stages as $stage => $items): ?>
            <div class="xuPipeCol" style="--col-c:<?= $stageColors[$stage] ?>;">
                <h3>
                    <span class="dot" style="background:<?= $stageColors[$stage] ?>;color:<?= $stageColors[$stage] ?>"></span>
                    <?= $stageLabels[$stage] ?>
                    <span class="count"><?= count($items) ?></span>
                </h3>
                <?php if (empty($items)): ?>
                    <div class="xuEmpty">Tidak ada dokumen di tahap ini.</div>
                <?php else: ?>
                    <?php foreach ($items as $sub): ?>
                        <div class="xuPipeCard">
                            <span class="xuStBadge" style="background:<?= $stageColors[$stage] ?>"><?= ucfirst($sub->status) ?></span>
                            <div class="title"><?= esc($sub->title) ?></div>
                            <div class="meta">
                                <b>Mahasiswa:</b> <?= esc($sub->student_name ?: ($sub->member_name ?: '—')) ?><br>
                                <b>Pembimbing:</b> <?= esc($sub->supervisors ?: '—') ?><br>
                                <b>Diajukan:</b> <?= $sub->created_at ?>
                            </div>
                            <div style="margin-top:10px">
                                <button type="button" class="xuLinkBtn" onclick="xuBukaLink(<?= $sub->submission_id ?>)">
                                    <i class="fa fa-link"></i> Tautan & Tahap
                                </button>
                            </div>
                            <?php if ($stage === 'admin' && $sub->status === 'menunggu'): ?>
                                <div class="xuPipeActions">
                                    <form method="post" action="<?= base_url('bibliography/approve') ?>" style="flex:1;margin:0">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="submission_id" value="<?= $sub->submission_id ?>">
                                        <button class="xuPipeBtn ok"><i class="fa fa-check"></i> Setujui & Terbitkan</button>
                                    </form>
                                    <button class="xuPipeBtn no" onclick="xuReject(<?= $sub->submission_id ?>)">
                                        <i class="fa fa-times"></i> Tolak
                                    </button>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- ===== MODAL AJUKAN PERSETUJUAN ===== -->
<div id="xuAjukanModal" class="xuModal">
    <div class="xuModalContent">
        <h3 class="xuModalTitle">
            <i class="fa fa-paper-plane"></i> Ajukan Persetujuan Dokumen
        </h3>

        <label class="xuLbl">Pilih Dokumen (status draft)</label>
        <select id="xuSelDoc" class="xuIn">
            <option value="">— Pilih dokumen —</option>
            <?php foreach ($docs as $d): ?>
                <option value="<?= $d->biblio_id ?>"><?= esc($d->title) ?></option>
            <?php endforeach; ?>
        </select>

        <div id="xuDocInfo" style="display:none">
            <div class="xuDocInfoBox">
                <b id="xuDocTitle"></b>
                Penulis: <span id="xuDocAuthor">—</span>
            </div>

            <label class="xuLbl">Tahap 1 — Nama Pembimbing</label>
            <input type="text" id="xuPembimbingName" class="xuIn" placeholder="Nama dosen pembimbing">

            <label class="xuLbl">No. WhatsApp Pembimbing</label>
            <input type="text" id="xuPembimbingPhone" class="xuIn" placeholder="08xxxxxxxxxx">

            <label class="xuCheckbox">
                <input type="checkbox" id="xuWithPenguji"> Sertakan Tahap 2 — Penguji
            </label>

            <div id="xuPengujiBox" style="display:none">
                <label class="xuLbl">Nama Penguji</label>
                <input type="text" id="xuPengujiName" class="xuIn">
                <label class="xuLbl">No. WhatsApp Penguji</label>
                <input type="text" id="xuPengujiPhone" class="xuIn" placeholder="08xxxxxxxxxx">
            </div>

            <div id="xuHasil" style="margin-top:10px"></div>

            <div class="xuModalActions">
                <button type="button" class="xuPipeBtn no" onclick="xuTutupModal()">
                    <i class="fa fa-times"></i> Batal
                </button>
                <button type="button" class="xuAjukanBtn" id="xuBtnProses">
                    <i class="fa fa-magic"></i> Buat Rantai Persetujuan & Siapkan WA
                </button>
            </div>
        </div>
    </div>
</div>

<!-- ===== MODAL TAUTAN & TAHAP ===== -->
<div id="xuLinkModal" class="xuModal" style="z-index:2001">
    <div class="xuModalContent wide">
        <h3 class="xuModalTitle">
            <i class="fa fa-link"></i> Tahap Persetujuan & Tautan
        </h3>
        <div id="xuLinkList"></div>
        <div class="xuModalClose">
            <button type="button" class="xuPipeBtn no" onclick="xuTutupLink()">
                <i class="fa fa-times"></i> Tutup
            </button>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function(){
    // ====== HANDLER AJUKAN ======
    $('#xuBtnAjukan').on('click', function(){ $('#xuAjukanModal').css('display','flex'); });
    $('#xuWithPenguji').on('change', function(){ $('#xuPengujiBox').toggle(this.checked); });

    // Tutup modal saat klik backdrop
    $('.xuModal').on('click', function(e){
        if (e.target === this) $(this).hide();
    });

    $('#xuSelDoc').on('change', function(){
        var v = $(this).val();
        if (!v) { $('#xuDocInfo').hide(); return; }
        $.get(baseUrl + 'bibliography/approval-detect', { biblio_id: v }, function(j){
            $('#xuDocTitle').text(j.title);
            $('#xuDocAuthor').text(j.authors.join(', ') || '—');
            $('#xuPembimbingName').val(j.supervisors[0] || '');
            $('#xuDocInfo').show();
            $('#xuHasil').html('');
        });
    });

    $('#xuBtnProses').on('click', function(){
        var btn = $(this);
        btn.prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Memproses...');
        $.ajax({
            url: baseUrl + 'bibliography/approval-submit',
            method: 'POST',
            data: {
                biblio_id: $('#xuSelDoc').val(),
                pembimbing_name: $('#xuPembimbingName').val(),
                pembimbing_phone: $('#xuPembimbingPhone').val(),
                penguji_name: $('#xuWithPenguji').is(':checked') ? $('#xuPengujiName').val() : '',
                penguji_phone: $('#xuWithPenguji').is(':checked') ? $('#xuPengujiPhone').val() : ''
            },
            success: function(j){
                btn.prop('disabled', false).html('<i class="fa fa-magic"></i> Buat Rantai Persetujuan & Siapkan WA');
                if (!j.ok) { alert(j.error || 'Gagal membuat rantai persetujuan.'); return; }
                var html = '<div class="xuChainBox"><b><i class="fa fa-check-circle"></i> Rantai persetujuan dibuat! Kirim tautan berikut via WA:</b><div class="xuChainLinks">';
                j.links.forEach(function(l){
                    html += '<a class="xuWaBtn" target="_blank" href="' + l.wa + '"><i class="fa fa-comment"></i> WA ' + l.stage.toUpperCase() + ': ' + l.name + '</a>';
                    html += '<small style="color:var(--xp-muted);word-break:break-all;font-family:\'JetBrains Mono\',monospace;font-size:.72rem;display:block;margin-top:-4px">' + l.link + '</small>';
                });
                html += '</div></div>';
                $('#xuHasil').html(html);
                setTimeout(function(){ location.reload(); }, 4000);
            },
            error: function(xhr){
                btn.prop('disabled', false).html('<i class="fa fa-magic"></i> Buat Rantai Persetujuan & Siapkan WA');
                var j = xhr.responseJSON || {};
                alert(j.error || 'Gagal terhubung ke server.');
            }
        });
    });
});

// ====== FUNGSI GLOBAL ======
function xuReject(id){
    var note = prompt('Alasan penolakan:', 'Dokumen tidak memenuhi syarat');
    if (note === null) return;
    var f = document.createElement('form');
    f.method = 'POST'; f.action = baseUrl + 'bibliography/reject';
    f.innerHTML = '<input type="hidden" name="submission_id" value="' + id + '"><input type="hidden" name="note" value="' + note.replace(/"/g,'&quot;') + '"><?= csrf_field() ?>';
    document.body.appendChild(f); f.submit();
}
function xuTutupModal(){ document.getElementById('xuAjukanModal').style.display = 'none'; }
function xuTutupLink(){ document.getElementById('xuLinkModal').style.display = 'none'; }

function xuSalin(t){
    if (navigator.clipboard) {
        navigator.clipboard.writeText(t).then(function(){ alert('✅ Tautan disalin ke clipboard!'); });
    } else {
        prompt('Salin tautan ini secara manual:', t);
    }
}

function xuBukaLink(sid){
    document.getElementById('xuLinkModal').style.display = 'flex';
    document.getElementById('xuLinkList').innerHTML = '<div style="text-align:center;padding:30px"><i class="fa fa-spinner fa-spin" style="font-size:1.8rem;color:var(--xp-emerald)"></i><div style="margin-top:10px;color:var(--xp-muted);font-size:.85rem">Memuat tahap...</div></div>';

    $.get(baseUrl + 'bibliography/approval-steps', { submission_id: sid }, function(j){
        var html = '';
        j.steps.forEach(function(st){
            var badge = st.status === 'pending' ? '<span class="xuStBadge" style="background:#f59e0b">Menunggu</span>'
                        : st.status === 'setuju' ? '<span class="xuStBadge" style="background:#10b981">Setuju</span>'
                        : '<span class="xuStBadge" style="background:#ef4444">' + (st.status || '?') + '</span>';

            html += '<div class="xuStepBox">';
            html += '<div class="xuStepHead"><b>' + st.stage + '</b> ' + badge + '</div>';

            html += '<label class="xuLbl">Nama Penyetuju</label>';
            html += '<input class="xuIn" id="xuNm' + st.step_id + '" value="' + (st.name || '').replace(/"/g,'&quot;') + '">';

            html += '<label class="xuLbl">No. WhatsApp</label>';
            html += '<input class="xuIn" id="xuPh' + st.step_id + '" value="' + (st.phone || '').replace(/"/g,'&quot;') + '">';

            html += '<div class="xuStepActions">';
            html += '<button class="xuPipeBtn ok" style="flex:0 0 auto;padding:8px 16px" onclick="xuSimpanStep(' + st.step_id + ',' + sid + ')"><i class="fa fa-save"></i> Simpan</button>';
            if (st.status === 'pending') {
                html += '<button class="xuCopyBtn" onclick="xuSalin(\'' + st.link + '\')"><i class="fa fa-copy"></i> Salin Tautan</button>';
                if (st.wa) html += '<a class="xuWaBtn" target="_blank" href="' + st.wa + '" style="margin:0"><i class="fa fa-comment"></i> Kirim WA</a>';
            }
            html += '</div>';

            if (st.status === 'pending') {
                html += '<small class="xuStepLink">' + st.link + '</small>';
            } else if (st.status === 'setuju') {
                html += '<small class="xuStepMsg ok"><i class="fa fa-check-circle"></i> Tahap ini sudah disetujui.</small>';
            } else {
                html += '<small class="xuStepMsg err"><i class="fa fa-times-circle"></i> Tahap ini tidak aktif.</small>';
            }
            html += '</div>';
        });
        document.getElementById('xuLinkList').innerHTML = html;
    });
}

function xuSimpanStep(id, sid){
    var name = document.getElementById('xuNm' + id).value;
    var phone = document.getElementById('xuPh' + id).value;
    $.post(baseUrl + 'bibliography/approval-step-update', {
        step_id: id,
        name: name,
        phone: phone
    }, function(){
        alert('✅ Data tersimpan.');
        xuBukaLink(sid);
    }).fail(function(){
        alert('❌ Gagal menyimpan.');
    });
}
</script>