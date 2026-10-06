<style>
.bkWrap{padding:30px 24px;max-width:1200px;margin:0 auto;}
.bkCard{background:#fff;border-radius:20px;box-shadow:0 16px 44px rgba(15,23,42,.08);overflow:hidden;border:1px solid rgba(5,150,105,.12);}
.bkHead{padding:28px 32px;background:linear-gradient(135deg,#0a2920,#064e3b,#115e59);color:#fff;display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:16px;}
.bkHead h2{margin:0;font-family:'Neuton',Georgia,serif;font-weight:700;font-size:1.4rem;display:flex;align-items:center;gap:12px;}
.bkHead h2 i{width:44px;height:44px;border-radius:13px;background:linear-gradient(135deg,#059669,#f59e0b);display:inline-flex;align-items:center;justify-content:center;font-size:1.15rem;box-shadow:0 8px 20px rgba(5,150,105,.45);}
.bkSel{padding:10px 16px;border:1.5px solid rgba(255,255,255,.3);border-radius:11px;background:rgba(255,255,255,.1);color:#fff;font-weight:700;font-size:.9rem;cursor:pointer;backdrop-filter:blur(8px);}
.bkSel option{color:#0f172a;background:#fff;}
.bkBody{padding:28px 32px;}
.bkActions{display:flex;gap:10px;margin-bottom:22px;flex-wrap:wrap;}
.bkBtn{display:inline-flex;align-items:center;gap:8px;padding:10px 18px;border:none;border-radius:11px;font-weight:700;font-size:.85rem;cursor:pointer;text-decoration:none;transition:.25s;}
.bkBtnPri{background:linear-gradient(90deg,#059669,#0891b2);color:#fff;box-shadow:0 8px 18px rgba(5,150,105,.3);}
.bkBtnPri:hover{transform:translateY(-2px);box-shadow:0 12px 24px rgba(5,150,105,.4);color:#fff;}
.bkBtnSuc{background:linear-gradient(90deg,#10b981,#059669);color:#fff;box-shadow:0 8px 18px rgba(16,185,129,.3);}
.bkBtnSuc:hover{transform:translateY(-2px);color:#fff;}
.bkTable{width:100%;border-collapse:collapse;border-radius:12px;overflow:hidden;}
.bkTable thead tr{background:linear-gradient(90deg,#0f172a,#1e293b);}
.bkTable th{padding:13px 16px;text-align:left;color:#fff;font-size:.74rem;font-weight:800;text-transform:uppercase;letter-spacing:.08em;}
.bkTable th.ctr{text-align:center;}
.bkTable td{padding:14px 16px;border-bottom:1px solid #f1f5f9;font-size:.88rem;color:#0f172a;}
.bkTable td.ctr{text-align:center;}
.bkTable tbody tr{transition:.2s;}
.bkTable tbody tr:hover{background:rgba(5,150,105,.04);}
.bkSks{display:inline-block;padding:4px 12px;border-radius:999px;font-weight:800;font-size:.82rem;font-family:'JetBrains Mono',monospace;}
.bkSksHi{background:rgba(5,150,105,.12);color:#059669;border:1px solid rgba(5,150,105,.3);}
.bkSksLo{background:rgba(239,68,68,.12);color:#dc2626;border:1px solid rgba(239,68,68,.3);}
.bkEmpty{padding:40px;text-align:center;color:#94a3b8;font-size:.9rem;}
.bkEmpty i{font-size:2.2rem;color:#cbd5e1;display:block;margin-bottom:10px;}
</style>

<div class="bkWrap">
    <div class="bkCard">
        <div class="bkHead">
            <h2><i class="fa fa-users"></i> Laporan BKD Dosen — Semester <?= esc($semester) ?></h2>
            <form method="get" action="<?= base_url('bkd/laporan') ?>">
                <select name="semester" class="bkSel" onchange="this.form.submit()">
                    <?php foreach ($semesters as $s): ?>
                        <option value="<?= $s ?>" <?= $s == $semester ? 'selected' : '' ?>>
                            <?= substr($s, 0, 4) ?> - <?= substr($s, 4) == 1 ? 'Ganjil' : 'Genap' ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </form>
        </div>
        <div class="bkBody">
            <div class="bkActions">
                <form method="post" action="<?= base_url('bkd/generate') ?>" style="margin:0;">
                    <input type="hidden" name="semester" value="<?= esc($semester) ?>">
                    <button type="submit" class="bkBtn bkBtnPri">
                        <i class="fa fa-refresh"></i> Generate Ulang Laporan
                    </button>
                </form>
                <a href="<?= base_url('bkd/export/xlsx?semester=' . urlencode($semester)) ?>" class="bkBtn bkBtnSuc">
                    <i class="fa fa-file-excel-o"></i> Export Excel
                </a>
            </div>

            <?php if (empty($reports)): ?>
                <div class="bkEmpty">
                    <i class="fa fa-inbox"></i>
                    Belum ada data untuk semester <?= esc($semester) ?>.<br>
                    Klik <strong>"Generate Ulang Laporan"</strong> untuk menghitung SKS dosen.
                </div>
            <?php else: ?>
                <div style="overflow-x:auto;">
                    <table class="bkTable">
                        <thead>
                            <tr>
                                <th style="width:50px;">No</th>
                                <th>Nama Dosen</th>
                                <th class="ctr" style="width:100px;">Bimbingan</th>
                                <th class="ctr" style="width:100px;">Penguji</th>
                                <th class="ctr" style="width:130px;">SKS Bimbingan</th>
                                <th class="ctr" style="width:130px;">SKS Penguji</th>
                                <th class="ctr" style="width:130px;">Total SKS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach ($reports as $r): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><strong><?= esc($r->supervisor_name) ?></strong></td>
                                <td class="ctr"><?= $r->total_pembimbing ?></td>
                                <td class="ctr"><?= $r->total_penguji ?></td>
                                <td class="ctr"><?= number_format($r->sks_pembimbing, 2) ?></td>
                                <td class="ctr"><?= number_format($r->sks_penguji, 2) ?></td>
                                <td class="ctr">
                                    <span class="bkSks <?= $r->total_sks >= 12 ? 'bkSksHi' : 'bkSksLo' ?>">
                                        <?= number_format($r->total_sks, 2) ?>
                                    </span>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>