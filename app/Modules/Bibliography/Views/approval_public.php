<style>
/* ================================================================
   DIFOSS PERSETUJUAN DOKUMEN — EMERALD FOREST EDITION
   ================================================================ */
:root{
    --ap-emerald:#059669; --ap-teal:#0891b2; --ap-gold:#f59e0b;
    --ap-mint:#6ee7b7; --ap-deep:#0a2920; --ap-mid:#064e3b;
    --ap-ink:#0f172a; --ap-muted:#64748b; --ap-soft:#94a3b8;
}

.xuApprWrap{
    max-width:880px;margin:40px auto;padding:0 16px;
    font-family:'Plus Jakarta Sans',system-ui,sans-serif;
}

/* ===== KARTU UTAMA ===== */
.xuApprCard{
    background:#fff;border-radius:22px;
    overflow:hidden;
    box-shadow:0 24px 64px rgba(5,150,105,.18),0 4px 12px rgba(0,0,0,.04);
    border:1px solid rgba(5,150,105,.12);
    transition:.35s cubic-bezier(.2,.8,.2,1);
}
.xuApprCard:hover{
    box-shadow:0 28px 72px rgba(5,150,105,.22),0 6px 16px rgba(0,0,0,.06);
}
html.xu-dark .xuApprCard{
    background:#0f1e1f;
    border-color:rgba(5,150,105,.25);
    box-shadow:0 24px 64px rgba(0,0,0,.5);
}

/* ===== HEADER ===== */
.xuApprHead{
    padding:32px 34px;
    background:linear-gradient(135deg,var(--ap-deep) 0%,var(--ap-mid) 55%,#115e59 100%);
    color:#fff;
    position:relative;overflow:hidden;
}
.xuApprHead::after{
    content:'';position:absolute;top:-70%;right:-12%;
    width:360px;height:360px;border-radius:50%;
    background:radial-gradient(circle,rgba(245,158,11,.3),transparent 70%);
    filter:blur(50px);pointer-events:none;
}
.xuApprHead::before{
    content:'';position:absolute;bottom:-60%;left:-10%;
    width:300px;height:300px;border-radius:50%;
    background:radial-gradient(circle,rgba(8,145,178,.25),transparent 70%);
    filter:blur(50px);pointer-events:none;
}

.xuApprHead h2{
    margin:0;font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1.5rem;
    display:flex;align-items:center;gap:12px;
    letter-spacing:-.01em;
    position:relative;z-index:2;
}
.xuApprHead h2 i{
    width:46px;height:46px;border-radius:14px;
    background:linear-gradient(135deg,var(--ap-emerald),var(--ap-gold));
    display:inline-flex;align-items:center;justify-content:center;
    font-size:1.2rem;color:#fff;
    box-shadow:0 10px 24px rgba(5,150,105,.45);
    flex-shrink:0;
}
.xuApprHead p{
    margin:8px 0 0;
    opacity:.88;font-size:.9rem;
    max-width:580px;line-height:1.55;
    position:relative;z-index:2;
    padding-left:58px;
}

/* ===== BODY ===== */
.xuApprBody{padding:30px 34px 34px}

/* ===== KARTU DOKUMEN ===== */
.xuApprDoc{
    background:linear-gradient(135deg,rgba(5,150,105,.05),rgba(245,158,11,.03));
    border:1.5px solid rgba(5,150,105,.18);
    border-radius:16px;padding:22px;
    margin-bottom:22px;
    position:relative;overflow:hidden;
}
.xuApprDoc::before{
    content:'';position:absolute;top:0;left:0;bottom:0;
    width:4px;
    background:linear-gradient(180deg,var(--ap-emerald),var(--ap-gold));
}
html.xu-dark .xuApprDoc{
    background:linear-gradient(135deg,rgba(5,150,105,.1),rgba(245,158,11,.05));
    border-color:rgba(5,150,105,.3);
}

.xuApprDoc h3{
    margin:0 0 14px;
    font-family:'Neuton',Georgia,serif;
    font-size:1.2rem;font-weight:700;
    color:var(--ap-ink);line-height:1.4;
    letter-spacing:-.01em;
}
html.xu-dark .xuApprDoc h3{color:#f1f5f9}

.xuApprDoc p{
    margin:6px 0;color:var(--ap-muted);
    font-size:.88rem;line-height:1.6;
}
html.xu-dark .xuApprDoc p{color:var(--ap-soft)}

.xuApprDoc p b{
    color:var(--ap-emerald);font-weight:800;
    display:inline-block;min-width:150px;
}
html.xu-dark .xuApprDoc p b{color:var(--ap-gold)}

.xuApprAbstract{
    margin-top:14px;padding:14px 16px;
    background:#fff;
    border-radius:10px;
    border:1px dashed rgba(5,150,105,.25);
    color:var(--ap-ink);
    font-size:.86rem;line-height:1.65;
    font-style:italic;
}
html.xu-dark .xuApprAbstract{
    background:rgba(255,255,255,.04);
    border-color:rgba(5,150,105,.35);
    color:#e2e8f0;
}

.xuApprAbstractLabel{
    display:flex;align-items:center;gap:7px;
    font-weight:800;font-size:.72rem;
    text-transform:uppercase;letter-spacing:.08em;
    color:var(--ap-emerald);
    margin:12px 0 6px;
}
.xuApprAbstractLabel i{
    width:22px;height:22px;border-radius:6px;
    background:rgba(5,150,105,.12);
    display:inline-flex;align-items:center;justify-content:center;
    font-size:.7rem;
}
html.xu-dark .xuApprAbstractLabel{color:var(--ap-mint)}

/* ===== PDF PREVIEW ===== */
.xuPdfBox{margin:22px 0}
.xuPdfHead{
    display:flex;align-items:center;gap:10px;
    font-weight:800;font-size:.9rem;
    color:var(--ap-ink);margin-bottom:12px;
}
html.xu-dark .xuPdfHead{color:#f1f5f9}

.xuPdfHead .pdf-ico{
    width:32px;height:32px;border-radius:9px;
    background:linear-gradient(135deg,#ef4444,#dc2626);
    color:#fff;
    display:inline-flex;align-items:center;justify-content:center;
    font-size:.95rem;flex-shrink:0;
    box-shadow:0 6px 14px rgba(239,68,68,.3);
}

.xuPdfFrame{
    width:100%;height:580px;
    border:1.5px solid rgba(5,150,105,.25);
    border-radius:14px;
    background:#f1f5f9;
    transition:.3s;
}
.xuPdfFrame:focus{
    outline:none;
    border-color:var(--ap-emerald);
    box-shadow:0 0 0 4px rgba(5,150,105,.12);
}
html.xu-dark .xuPdfFrame{background:#0a2920;border-color:rgba(5,150,105,.35)}

.xuPdfOpen{
    display:inline-flex;align-items:center;gap:7px;
    margin-top:12px;
    padding:9px 16px;border-radius:11px;
    background:linear-gradient(135deg,rgba(5,150,105,.1),rgba(245,158,11,.08));
    color:var(--ap-emerald);
    font-weight:700;font-size:.78rem;
    text-decoration:none;
    border:1.5px solid rgba(5,150,105,.25);
    transition:.25s;
    position:relative;overflow:hidden;
}
.xuPdfOpen::before{
    content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;
    background:linear-gradient(100deg,transparent 20%,rgba(255,255,255,.3) 50%,transparent 80%);
    transition:left .6s ease;
}
.xuPdfOpen:hover{
    background:linear-gradient(90deg,var(--ap-emerald),var(--ap-gold));
    color:#fff;border-color:transparent;
    transform:translateY(-2px);
    box-shadow:0 8px 20px rgba(5,150,105,.3);
}
.xuPdfOpen:hover::before{left:120%}
html.xu-dark .xuPdfOpen{background:rgba(5,150,105,.15);color:var(--ap-mint);border-color:rgba(5,150,105,.35)}
html.xu-dark .xuPdfOpen:hover{color:#fff}

/* ===== ALERT NO-PDF ===== */
.xuPdfAlert{
    background:linear-gradient(135deg,rgba(245,158,11,.1),rgba(245,158,11,.04));
    border:1.5px solid rgba(245,158,11,.35);
    border-radius:13px;padding:16px 20px;
    color:#b45309;font-size:.86rem;font-weight:600;
    display:flex;align-items:center;gap:10px;
    margin:22px 0;
}
.xuPdfAlert i{
    width:30px;height:30px;border-radius:8px;
    background:rgba(245,158,11,.18);
    color:var(--ap-gold);
    display:inline-flex;align-items:center;justify-content:center;
    font-size:.9rem;flex-shrink:0;
}
html.xu-dark .xuPdfAlert{
    background:linear-gradient(135deg,rgba(245,158,11,.14),rgba(245,158,11,.06));
    color:#fde68a;border-color:rgba(245,158,11,.4);
}
html.xu-dark .xuPdfAlert i{background:rgba(245,158,11,.25)}

/* ===== FORM ===== */
.xuApprForm{
    background:linear-gradient(135deg,rgba(8,145,178,.04),rgba(5,150,105,.03));
    border:1.5px solid rgba(5,150,105,.15);
    border-radius:16px;
    padding:24px;
    margin-top:22px;
}
html.xu-dark .xuApprForm{
    background:linear-gradient(135deg,rgba(8,145,178,.08),rgba(5,150,105,.06));
    border-color:rgba(5,150,105,.25);
}

.xuApprFormTitle{
    margin:0 0 16px;
    font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1.05rem;
    color:var(--ap-ink);
    display:flex;align-items:center;gap:10px;
    padding-bottom:12px;
    border-bottom:1.5px dashed rgba(5,150,105,.18);
}
html.xu-dark .xuApprFormTitle{color:#f1f5f9;border-bottom-color:rgba(5,150,105,.3)}

.xuApprFormTitle i{
    width:30px;height:30px;border-radius:9px;
    background:linear-gradient(135deg,var(--ap-emerald),var(--ap-gold));
    color:#fff;
    display:inline-flex;align-items:center;justify-content:center;
    font-size:.85rem;
    box-shadow:0 6px 14px rgba(5,150,105,.3);
}

.xuApprLabel{
    display:block;
    font-weight:800;font-size:.74rem;
    text-transform:uppercase;letter-spacing:.08em;
    color:var(--ap-ink);
    margin-bottom:8px;
}
html.xu-dark .xuApprLabel{color:#e2e8f0}

.xuApprNote{
    width:100%;padding:12px 16px;
    border:1.5px solid #e2e8f0;
    border-radius:12px;
    font-size:.9rem;
    margin-bottom:14px;
    box-sizing:border-box;
    background:#fff;
    color:var(--ap-ink);
    font-family:inherit;
    resize:vertical;
    transition:.25s;
}
.xuApprNote:focus{
    outline:none;
    border-color:var(--ap-emerald);
    box-shadow:0 0 0 4px rgba(5,150,105,.12);
    background:#fff;
}
html.xu-dark .xuApprNote{
    background:rgba(255,255,255,.05);
    border-color:rgba(5,150,105,.25);
    color:#f1f5f9;
}
html.xu-dark .xuApprNote:focus{
    border-color:var(--ap-gold);
    box-shadow:0 0 0 4px rgba(245,158,11,.15);
}
.xuApprNote::placeholder{color:var(--ap-soft);font-weight:500}

/* ===== ACTIONS ===== */
.xuApprActions{
    display:flex;gap:10px;flex-wrap:wrap;
    margin-top:6px;
}
.xuApprBtn{
    flex:1;padding:13px 18px;
    border:none;border-radius:12px;
    font-weight:800;font-size:.9rem;
    cursor:pointer;transition:.25s;
    min-width:140px;
    font-family:inherit;
    display:inline-flex;align-items:center;justify-content:center;gap:8px;
    letter-spacing:.02em;
    position:relative;overflow:hidden;
}
.xuApprBtn::before{
    content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;
    background:linear-gradient(100deg,transparent 20%,rgba(255,255,255,.3) 50%,transparent 80%);
    transition:left .6s ease;
}
.xuApprBtn:hover::before{left:120%}
.xuApprBtn:hover{
    filter:brightness(1.08);
    transform:translateY(-2px);
}

.xuApprBtn.ok{
    background:linear-gradient(90deg,var(--ap-emerald),var(--ap-teal));
    color:#fff;
    box-shadow:0 10px 24px rgba(5,150,105,.35);
}
.xuApprBtn.ok:hover{box-shadow:0 14px 32px rgba(5,150,105,.45)}

.xuApprBtn.rev{
    background:linear-gradient(90deg,rgba(245,158,11,.12),rgba(245,158,11,.08));
    color:#b45309;
    border:1.5px solid rgba(245,158,11,.4);
}
.xuApprBtn.rev:hover{
    background:linear-gradient(90deg,var(--ap-gold),#d97706);
    color:#fff;border-color:transparent;
    box-shadow:0 10px 24px rgba(245,158,11,.35);
}
html.xu-dark .xuApprBtn.rev{
    background:rgba(245,158,11,.14);
    color:#fde68a;
    border-color:rgba(245,158,11,.4);
}
html.xu-dark .xuApprBtn.rev:hover{color:#fff}

.xuApprBtn.no{
    background:rgba(239,68,68,.1);
    color:#dc2626;
    border:1.5px solid rgba(239,68,68,.3);
}
.xuApprBtn.no:hover{
    background:linear-gradient(90deg,#ef4444,#dc2626);
    color:#fff;border-color:transparent;
    box-shadow:0 10px 24px rgba(239,68,68,.35);
}
html.xu-dark .xuApprBtn.no{
    background:rgba(239,68,68,.14);
    color:#fca5a5;
    border-color:rgba(239,68,68,.35);
}
html.xu-dark .xuApprBtn.no:hover{color:#fff}

/* ===== FOOTER NOTE ===== */
.xuApprFooter{
    margin-top:22px;padding-top:18px;
    border-top:1.5px dashed rgba(5,150,105,.15);
    font-size:.78rem;color:var(--ap-soft);
    text-align:center;line-height:1.6;
}
html.xu-dark .xuApprFooter{border-top-color:rgba(5,150,105,.25)}

/* ===== RESPONSIVE ===== */
@media(max-width:640px){
    .xuApprWrap{margin:20px auto}
    .xuApprHead{padding:24px 20px}
    .xuApprHead h2{font-size:1.25rem}
    .xuApprHead p{padding-left:0;margin-top:14px}
    .xuApprBody{padding:22px 20px 26px}
    .xuApprDoc{padding:18px 16px}
    .xuApprDoc h3{font-size:1.05rem}
    .xuApprDoc p b{min-width:120px;display:block}
    .xuPdfFrame{height:420px}
    .xuApprForm{padding:18px}
    .xuApprActions{flex-direction:column}
    .xuApprBtn{min-width:100%}
}
</style>

<div class="xuApprWrap">
    <div class="xuApprCard">
        <div class="xuApprHead">
            <h2><i class="fa fa-check-circle"></i> Persetujuan Dokumen</h2>
            <p>Yth. <b><?= esc($step->approver_name) ?></b>, silakan tinjau dokumen lengkap berikut lalu berikan persetujuan Anda.</p>
        </div>
        <div class="xuApprBody">
            <!-- ===== Info Dokumen ===== -->
            <div class="xuApprDoc">
                <h3><?= esc($biblio->title) ?></h3>
                <p><b>Diajukan oleh:</b> <?= esc($sub->student_name ?? '') ?: '—' ?></p>
                <p><b>Tanggal pengajuan:</b> <?= $sub->created_at ?></p>

                <?php if (!empty($biblio->notes)): ?>
                    <div class="xuApprAbstractLabel">
                        <i class="fa fa-file-text-o"></i> Abstrak
                    </div>
                    <div class="xuApprAbstract">
                        <?= nl2br(esc(substr($biblio->notes, 0, 600))) ?><?= strlen($biblio->notes) > 600 ? '…' : '' ?>
                    </div>
                <?php else: ?>
                    <p><b>Abstrak:</b> <em style="color:var(--ap-soft)">(Tidak ada abstrak)</em></p>
                <?php endif; ?>
            </div>

            <!-- ===== PDF Preview ===== -->
            <?php if (!empty($pdf)): ?>
                <div class="xuPdfBox">
                    <div class="xuPdfHead">
                        <span class="pdf-ico"><i class="fa fa-file-pdf-o"></i></span>
                        Pratinjau Dokumen Lengkap (PDF)
                    </div>
                    <iframe class="xuPdfFrame" src="<?= base_url('uploads/repository/' . $pdf->file_name) ?>"></iframe>
                    <a class="xuPdfOpen" target="_blank" href="<?= base_url('uploads/repository/' . $pdf->file_name) ?>">
                        <i class="fa fa-external-link"></i> Buka PDF di Tab Baru (layar penuh)
                    </a>
                </div>
            <?php else: ?>
                <div class="xuPdfAlert">
                    <i class="fa fa-info-circle"></i>
                    Dokumen ini tidak memiliki lampiran PDF untuk pratinjau. Pertimbangkan untuk meminta lampiran sebelum menyetujui.
                </div>
            <?php endif; ?>

            <!-- ===== Form Aksi ===== -->
            <form method="post" action="<?= base_url('persetujuan/act') ?>" class="xuApprForm">
                <?= csrf_field() ?>
                <input type="hidden" name="token" value="<?= esc($step->token) ?>">

                <h3 class="xuApprFormTitle">
                    <i class="fa fa-gavel"></i> Keputusan Anda
                </h3>

                <label class="xuApprLabel">Catatan / Alasan (Opsional)</label>
                <textarea name="note" class="xuApprNote" placeholder="Tulis catatan untuk mahasiswa atau admin..." rows="3"></textarea>

                <div class="xuApprActions">
                    <button type="submit" name="action" value="setuju" class="xuApprBtn ok">
                        <i class="fa fa-check"></i> Setujui
                    </button>
                    <button type="submit" name="action" value="revisi" class="xuApprBtn rev">
                        <i class="fa fa-pencil"></i> Minta Revisi
                    </button>
                    <button type="submit" name="action" value="tolak" class="xuApprBtn no">
                        <i class="fa fa-times"></i> Tolak
                    </button>
                </div>
            </form>

            <div class="xuApprFooter">
                <i class="fa fa-lock"></i> Tautan persetujuan ini bersifat rahasia dan hanya berlaku untuk Anda.
            </div>
        </div>
    </div>
</div>