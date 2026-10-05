<?php
function xu_wa($phone){ $p = preg_replace('/[^0-9]/','',$phone); if (substr($p,0,1)==='0') $p='62'.substr($p,1); return $p; }
$tpl = $settings->wa_template ?? 'Halo {nama}, pendaftaran Anda disetujui. ID: {id}';
// Palet kategori: Mahasiswa=teal, Dosen=red (bahaya/khusus), Staff=gold
$catColor = ['Mahasiswa'=>'#0891b2','Dosen'=>'#dc2626','Staff'=>'#f59e0b'];
?>
<style>
/* ================================================================
   DIFOSS PENDAFTARAN ONLINE — EMERALD FOREST EDITION
   ================================================================ */
:root{
    --po-emerald:#059669; --po-teal:#0891b2; --po-gold:#f59e0b;
    --po-mint:#6ee7b7; --po-deep:#0a2920;
    --po-ink:#0f172a; --po-muted:#64748b; --po-soft:#94a3b8;
}

.xuOnWrap{padding:8px 0}

/* ===== HEADER ===== */
.xuOnHead{display:flex;align-items:center;gap:12px;margin-bottom:24px;flex-wrap:wrap}
.xuOnHead h2{
    margin:0;font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1.5rem;color:var(--po-ink);
    display:flex;align-items:center;gap:12px;letter-spacing:-.01em;
}
html.xu-dark .xuOnHead h2{color:#f1f5f9}

.xuOnHead h2 i{
    width:46px;height:46px;border-radius:14px;
    background:linear-gradient(135deg,var(--po-emerald),var(--po-gold));
    color:#fff;display:inline-flex;align-items:center;justify-content:center;
    font-size:1.2rem;
    box-shadow:0 10px 24px rgba(5,150,105,.35);
}

.xuOnCount{
    padding:5px 14px;border-radius:999px;
    background:linear-gradient(90deg,var(--po-gold),var(--po-emerald));
    color:#fff;font-weight:800;font-size:.76rem;
    letter-spacing:.04em;
    box-shadow:0 6px 14px rgba(245,158,11,.3);
    animation:poPulse 2.2s ease-in-out infinite;
}
@keyframes poPulse{0%,100%{box-shadow:0 6px 14px rgba(245,158,11,.3)}50%{box-shadow:0 6px 22px rgba(245,158,11,.55)}}

/* ===== SECTION ===== */
.xuOnSec{
    margin-bottom:28px;
    background:#fff;
    border-radius:18px;
    padding:22px 24px;
    border:1px solid rgba(5,150,105,.1);
    box-shadow:0 8px 24px rgba(15,23,42,.05);
}
html.xu-dark .xuOnSec{background:#0f1e1f;border-color:rgba(5,150,105,.2);box-shadow:0 8px 24px rgba(0,0,0,.35)}

.xuOnSec h3{
    font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1.1rem;
    color:var(--po-ink);
    margin:0 0 16px;
    display:flex;align-items:center;gap:10px;
    padding-bottom:12px;
    border-bottom:1.5px dashed rgba(5,150,105,.2);
}
html.xu-dark .xuOnSec h3{color:#f1f5f9;border-bottom-color:rgba(5,150,105,.3)}

.xuOnSec h3 .sec-ico{
    width:30px;height:30px;border-radius:9px;
    display:inline-flex;align-items:center;justify-content:center;
    font-size:.85rem;color:#fff;flex-shrink:0;
    box-shadow:0 6px 14px rgba(0,0,0,.18);
}
.xuOnSec h3 .sec-ico.pending{background:linear-gradient(135deg,var(--po-gold),#d97706)}
.xuOnSec h3 .sec-ico.approved{background:linear-gradient(135deg,var(--po-emerald),var(--po-teal))}
.xuOnSec h3 .sec-ico.rejected{background:linear-gradient(135deg,#ef4444,#dc2626)}

/* ===== GRID CARDS ===== */
.xuOnGrid{display:grid;grid-template-columns:repeat(auto-fill,minmax(300px,1fr));gap:16px}

.xuOnCard{
    background:linear-gradient(135deg,rgba(5,150,105,.03),rgba(245,158,11,.02));
    border-radius:16px;padding:18px;
    border:1px solid rgba(5,150,105,.15);
    box-shadow:0 6px 18px rgba(15,23,42,.05);
    display:flex;gap:14px;
    transition:.3s cubic-bezier(.2,.8,.2,1);
    position:relative;overflow:hidden;
}
.xuOnCard::before{
    content:'';position:absolute;top:0;left:0;bottom:0;width:3px;
    background:linear-gradient(180deg,var(--po-emerald),var(--po-gold));
    opacity:.6;
}
.xuOnCard:hover{
    transform:translateY(-4px);
    box-shadow:0 16px 40px rgba(5,150,105,.18);
    border-color:rgba(5,150,105,.35);
}
.xuOnCard:hover::before{opacity:1;width:4px}
html.xu-dark .xuOnCard{background:linear-gradient(135deg,rgba(5,150,105,.08),rgba(245,158,11,.04));border-color:rgba(5,150,105,.25)}
html.xu-dark .xuOnCard:hover{border-color:rgba(245,158,11,.45);box-shadow:0 16px 40px rgba(5,150,105,.25)}

.xuOnCard img{
    width:76px;height:96px;object-fit:cover;
    border-radius:12px;
    border:2.5px solid var(--po-gold);
    flex-shrink:0;
    box-shadow:0 8px 20px rgba(0,0,0,.12);
    transition:.3s;
}
.xuOnCard:hover img{transform:scale(1.04) rotate(-1.5deg);box-shadow:0 12px 28px rgba(245,158,11,.35)}

.xuOnCard .info{flex:1;min-width:0}
.xuOnCard .nm{
    font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1rem;
    color:var(--po-ink);margin-bottom:4px;
    line-height:1.3;
}
html.xu-dark .xuOnCard .nm{color:#f1f5f9}

.xuOnCard .meta{
    font-size:.76rem;color:var(--po-muted);
    line-height:1.6;word-break:break-all;
    font-family:'JetBrains Mono',monospace;font-weight:500;
}
html.xu-dark .xuOnCard .meta{color:var(--po-soft)}

.xuOnCat{
    display:inline-block;
    padding:3px 10px;border-radius:999px;
    color:#fff;font-size:.64rem;font-weight:800;
    margin-bottom:6px;
    letter-spacing:.05em;text-transform:uppercase;
    box-shadow:0 4px 10px rgba(0,0,0,.15);
}

/* ===== ACTION BUTTONS ===== */
.xuOnActions{display:flex;gap:8px;margin-top:12px;flex-wrap:wrap}

.xuApBtn{
    display:inline-flex;align-items:center;gap:6px;
    padding:7px 14px;border-radius:10px;
    border:none;font-weight:700;font-size:.74rem;
    cursor:pointer;transition:.25s;
    text-decoration:none;
    font-family:inherit;letter-spacing:.02em;
    position:relative;overflow:hidden;
}
.xuApBtn::before{
    content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;
    background:linear-gradient(100deg,transparent 20%,rgba(255,255,255,.28) 50%,transparent 80%);
    transition:left .6s ease;
}
.xuApBtn:hover{filter:brightness(1.08);transform:translateY(-1px);text-decoration:none}
.xuApBtn:hover::before{left:120%}

.xuApBtn.ok{
    background:linear-gradient(90deg,var(--po-emerald),var(--po-teal));
    color:#fff;box-shadow:0 6px 14px rgba(5,150,105,.3);
}
.xuApBtn.no{
    background:rgba(239,68,68,.1);color:#dc2626;
    border:1.5px solid rgba(239,68,68,.3);
}
.xuApBtn.no:hover{background:linear-gradient(90deg,#ef4444,#dc2626);color:#fff;border-color:transparent;box-shadow:0 6px 14px rgba(239,68,68,.35)}
html.xu-dark .xuApBtn.no{background:rgba(239,68,68,.14);color:#fca5a5;border-color:rgba(239,68,68,.35)}
html.xu-dark .xuApBtn.no:hover{color:#fff}

.xuApBtn.wa{
    background:linear-gradient(90deg,#25d366,#128c7e);
    color:#fff;box-shadow:0 6px 14px rgba(37,211,102,.3);
}

.xuApBtn.settings{
    background:linear-gradient(90deg,var(--po-emerald),var(--po-gold));
    color:#fff;margin-left:auto;
    padding:9px 18px;font-size:.82rem;
    box-shadow:0 8px 20px rgba(5,150,105,.3);
}

/* ===== EMPTY STATE ===== */
.xuEmpty{
    padding:30px;text-align:center;
    color:var(--po-soft);
    background:linear-gradient(135deg,rgba(5,150,105,.05),rgba(245,158,11,.03));
    border:1.5px dashed rgba(5,150,105,.25);
    border-radius:14px;font-size:.88rem;font-weight:600;
}
.xuEmpty i{font-size:1.8rem;color:var(--po-emerald);display:block;margin-bottom:8px}
html.xu-dark .xuEmpty{background:linear-gradient(135deg,rgba(5,150,105,.08),rgba(245,158,11,.04));border-color:rgba(5,150,105,.35);color:var(--po-soft)}
html.xu-dark .xuEmpty i{color:var(--po-mint)}

/* ===== REJECTED CARD ===== */
.xuOnCard.rejected .nm{text-decoration:line-through;opacity:.7}
.xuOnCard.rejected em{
    color:#dc2626;font-weight:600;
    padding:4px 8px;background:rgba(239,68,68,.08);
    border-radius:6px;border:1px solid rgba(239,68,68,.2);
    font-style:normal;display:inline-block;margin-top:4px;
    font-size:.72rem;
}
html.xu-dark .xuOnCard.rejected em{color:#fca5a5;background:rgba(239,68,68,.12);border-color:rgba(239,68,68,.3)}

@media(max-width:640px){
    .xuOnHead h2{font-size:1.25rem}
    .xuOnGrid{grid-template-columns:1fr}
    .xuApBtn.settings{margin-left:0;width:100%;justify-content:center}
    .xuOnSec{padding:18px 16px}
}
</style>

<div class="xuOnWrap">
    <div class="xuOnHead">
        <h2><i class="fa fa-user-plus"></i> Pendaftaran Online</h2>
        <span class="xuOnCount"><?= count($pending) ?> menunggu verifikasi</span>
        <a href="<?= base_url('membership/reg-settings') ?>" class="xuApBtn settings"><i class="fa fa-cog"></i> Pengaturan</a>
    </div>

    <!-- MENUNGGU -->
    <div class="xuOnSec">
        <h3><span class="sec-ico pending"><i class="fa fa-hourglass-half"></i></span> Menunggu Verifikasi</h3>
        <?php if (empty($pending)): ?>
            <div class="xuEmpty"><i class="fa fa-check-circle"></i> Tidak ada pendaftaran menunggu. 🎉</div>
        <?php else: ?>
            <div class="xuOnGrid">
                <?php foreach ($pending as $m): ?>
                <div class="xuOnCard">
                    <img src="<?= base_url('uploads/images/persons/' . $m->member_image) ?>" alt="">
                    <div class="info">
                        <span class="xuOnCat" style="background:<?= $catColor[$m->member_category] ?? '#64748b' ?>"><?= esc($m->member_category) ?></span>
                        <div class="nm"><?= esc($m->member_name) ?></div>
                        <div class="meta">
                            ID: <?= esc($m->member_id) ?><br>
                            <?= esc($m->member_email) ?><br>
                            WA: <?= esc($m->member_phone) ?><br>
                            <?= esc($m->inst_name) ?>
                        </div>
                        <div class="xuOnActions">
                            <form method="post" action="<?= base_url('membership/approve') ?>" style="margin:0">
                                <?= csrf_field() ?>
                                <input type="hidden" name="member_id" value="<?= esc($m->member_id) ?>">
                                <button class="xuApBtn ok"><i class="fa fa-check"></i> Setujui</button>
                            </form>
                            <button class="xuApBtn no" onclick="xuTolak('<?= esc($m->member_id) ?>')"><i class="fa fa-times"></i> Tolak</button>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- AKTIF -->
    <div class="xuOnSec">
        <h3><span class="sec-ico approved"><i class="fa fa-check-circle"></i></span> Disetujui (Aktif)</h3>
        <?php if (empty($approved)): ?>
            <div class="xuEmpty"><i class="fa fa-inbox"></i> Belum ada anggota online aktif.</div>
        <?php else: ?>
            <div class="xuOnGrid">
                <?php foreach ($approved as $m):
                    $waMsg = str_replace(['{nama}','{id}'], [$m->member_name, $m->member_id], $tpl);
                ?>
                <div class="xuOnCard">
                    <img src="<?= base_url('uploads/images/persons/' . $m->member_image) ?>" alt="">
                    <div class="info">
                        <span class="xuOnCat" style="background:<?= $catColor[$m->member_category] ?? '#64748b' ?>"><?= esc($m->member_category) ?></span>
                        <div class="nm"><?= esc($m->member_name) ?></div>
                        <div class="meta">ID: <?= esc($m->member_id) ?><br>WA: <?= esc($m->member_phone) ?></div>
                        <div class="xuOnActions">
                            <a class="xuApBtn wa" target="_blank" href="https://wa.me/<?= xu_wa($m->member_phone) ?>?text=<?= urlencode($waMsg) ?>"><i class="fa fa-comment"></i> Kirim WA</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- DITOLAK -->
    <?php if (!empty($rejected)): ?>
    <div class="xuOnSec">
        <h3><span class="sec-ico rejected"><i class="fa fa-ban"></i></span> Ditolak</h3>
        <div class="xuOnGrid">
            <?php foreach ($rejected as $m): ?>
            <div class="xuOnCard rejected">
                <img src="<?= base_url('uploads/images/persons/' . $m->member_image) ?>" alt="" style="filter:grayscale(.7);opacity:.7">
                <div class="info">
                    <div class="nm"><?= esc($m->member_name) ?></div>
                    <div class="meta">ID: <?= esc($m->member_id) ?><br><em><?= esc($m->approval_note) ?></em></div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php endif; ?>
</div>

<script>
function xuTolak(id){
    var note = prompt('Alasan penolakan (tercatat di sistem):', 'Data tidak lengkap / tidak valid');
    if (note === null) return;
    var f = document.createElement('form');
    f.method = 'POST';
    f.action = baseUrl + 'membership/reject';
    f.innerHTML = '<input type="hidden" name="member_id" value="' + id + '"><input type="hidden" name="note" value="' + note.replace(/"/g,'&quot;') + '"><?= csrf_field() ?>';
    document.body.appendChild(f);
    f.submit();
}
</script>