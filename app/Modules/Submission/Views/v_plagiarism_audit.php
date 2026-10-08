<style>
.paWrap{max-width:1200px;margin:0 auto;padding:26px 20px 60px;font-family:'Plus Jakarta Sans',system-ui,sans-serif}
.paHead{display:flex;align-items:center;gap:14px;flex-wrap:wrap;margin-bottom:20px}
.paHeadIco{width:48px;height:48px;border-radius:14px;background:linear-gradient(135deg,#059669,#f59e0b);display:flex;align-items:center;justify-content:center;color:#fff;font-size:1.2rem;box-shadow:0 8px 20px rgba(5,150,105,.35)}
.paHead h2{margin:0;font-family:'Neuton',Georgia,serif;font-size:1.4rem;color:#0f172a}
html.xu-dark .paHead h2{color:#f1f5f9}
.paHead p{margin:2px 0 0;font-size:.82rem;color:#64748b}
html.xu-dark .paHead p{color:#94a3b8}
.paGrid{display:grid;grid-template-columns:repeat(auto-fit,minmax(170px,1fr));gap:14px;margin-bottom:20px}
.paCard{background:#fff;border:1px solid rgba(5,150,105,.12);border-radius:14px;padding:16px 18px;box-shadow:0 4px 14px rgba(15,23,42,.05)}
html.xu-dark .paCard{background:#0f1e1f;border-color:rgba(5,150,105,.22)}
.paCard .n{font-family:'Neuton',Georgia,serif;font-size:1.9rem;font-weight:700;line-height:1;color:#059669}
.paCard .n.warn{color:#f59e0b}.paCard .n.bad{color:#ef4444}.paCard .n.info{color:#0891b2}
.paCard .l{font-size:.7rem;font-weight:800;text-transform:uppercase;letter-spacing:.08em;color:#64748b;margin-top:6px}
html.xu-dark .paCard .l{color:#94a3b8}
.paTools{display:flex;gap:10px;flex-wrap:wrap;margin-bottom:18px}
.paBtn{display:inline-flex;align-items:center;gap:8px;padding:10px 18px;border:none;border-radius:11px;font-weight:700;font-size:.82rem;cursor:pointer;transition:.25s;text-decoration:none}
.paBtnPri{background:linear-gradient(90deg,#059669,#0891b2);color:#fff;box-shadow:0 8px 18px rgba(5,150,105,.3)}
.paBtnPri:hover{transform:translateY(-2px);color:#fff}
.paBtnGold{background:linear-gradient(90deg,#f59e0b,#d97706);color:#fff;box-shadow:0 8px 18px rgba(245,158,11,.3)}
.paBtnGold:hover{transform:translateY(-2px);color:#fff}
.paBtnGhost{background:rgba(5,150,105,.08);color:#059669;border:1.5px solid rgba(5,150,105,.25)}
html.xu-dark .paBtnGhost{background:rgba(5,150,105,.12);color:#6ee7b7}
.paProg{display:none;margin:-6px 0 16px;font-size:.82rem;font-weight:700;color:#059669}
.paTableWrap{background:#fff;border:1px solid rgba(5,150,105,.12);border-radius:14px;overflow:hidden;box-shadow:0 4px 14px rgba(15,23,42,.05)}
html.xu-dark .paTableWrap{background:#0f1e1f;border-color:rgba(5,150,105,.22)}
.paTable{width:100%;border-collapse:collapse;font-size:.82rem}
.paTable thead tr{background:linear-gradient(90deg,#0f172a,#1e293b)}
.paTable th{padding:11px 14px;text-align:left;color:#fff;font-size:.68rem;font-weight:800;text-transform:uppercase;letter-spacing:.08em}
.paTable td{padding:11px 14px;border-bottom:1px solid #f1f5f9;color:#0f172a;vertical-align:middle}
html.xu-dark .paTable td{border-bottom-color:rgba(148,163,184,.1);color:#e2e8f0}
.paTable tbody tr:hover{background:rgba(5,150,105,.04)}
.paScore{font-family:'JetBrains Mono',monospace;font-weight:800}
.paBadge{display:inline-block;padding:3px 10px;border-radius:999px;font-size:.66rem;font-weight:800;letter-spacing:.05em;text-transform:uppercase}
.paBadge.ok{background:rgba(5,150,105,.12);color:#059669;border:1px solid rgba(5,150,105,.3)}
.paBadge.no{background:rgba(239,68,68,.12);color:#dc2626;border:1px solid rgba(239,68,68,.3)}
html.xu-dark .paBadge.ok{color:#6ee7b7}html.xu-dark .paBadge.no{color:#fca5a5}
.paMono{font-family:'JetBrains Mono',monospace;font-size:.72rem;color:#64748b}
html.xu-dark .paMono{color:#94a3b8}
.paEmpty{padding:36px;text-align:center;color:#94a3b8;font-size:.88rem}
</style>

<div class="paWrap">
    <div class="paHead">
        <div class="paHeadIco"><i class="fa fa-history"></i></div>
        <div>
            <h2>Audit Gerbang Plagiarisme</h2>
            <p>Riwayat cek similaritas mandiri mahasiswa + manajemen sidik jari koleksi</p>
        </div>
    </div>

    <div class="paGrid">
        <div class="paCard"><div class="n info"><?= $total ?></div><div class="l">Total Cek</div></div>
        <div class="paCard"><div class="n"><?= $lulus ?></div><div class="l">Lolos Gerbang</div></div>
        <div class="paCard"><div class="n bad"><?= $gagal ?></div><div class="l">Ditolak</div></div>
        <div class="paCard"><div class="n warn"><?= $avg ?>%</div><div class="l">Rata-rata Skor</div></div>
        <div class="paCard"><div class="n"><?= number_format($fp) ?></div><div class="l">Sidik Jari Koleksi</div></div>
    </div>

    <div class="paTools">
        <button class="paBtn paBtnPri" id="paBuild"><i class="fa fa-refresh"></i> Bangun Sidik Jari Dokumen Baru</button>
        <button class="paBtn paBtnGold" id="paBuildForce"><i class="fa fa-bolt"></i> Bangun Ulang SEMUA</button>
        <a class="paBtn paBtnGhost" href="<?= base_url('cek-similaritas') ?>" target="_blank"><i class="fa fa-external-link"></i> Buka Halaman Publik</a>
    </div>
    <div class="paProg" id="paProg"></div>

    <div class="paTableWrap">
        <?php if (empty($rows)): ?>
            <div class="paEmpty"><i class="fa fa-inbox" style="font-size:2rem;display:block;margin-bottom:8px"></i>Belum ada riwayat cek similaritas.</div>
        <?php else: ?>
        <table class="paTable">
            <thead>
                <tr>
                    <th style="width:44px">#</th>
                    <th>Waktu</th>
                    <th>NIM</th>
                    <th>Nama File</th>
                    <th style="width:80px">Skor</th>
                    <th style="width:90px">Status</th>
                    <th>Token</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rows as $r): ?>
                <tr>
                    <td class="paMono"><?= $r->check_id ?></td>
                    <td><?= date('d M Y · H:i', strtotime($r->created_at)) ?></td>
                    <td><?= esc($r->student_id ?? '—') ?></td>
                    <td title="<?= esc($r->file_name) ?>"><?= esc(mb_strimwidth($r->file_name, 0, 34, '…')) ?></td>
                    <td class="paScore" style="color:<?= $r->similarity_score <= 25 ? '#059669' : '#ef4444' ?>"><?= $r->similarity_score ?>%</td>
                    <td><span class="paBadge <?= $r->status === 'lulus' ? 'ok' : 'no' ?>"><?= $r->status ?></span></td>
                    <td class="paMono"><?= $r->token ? esc(substr($r->token, 0, 10)) . '…' : '—' ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>
    </div>
</div>

<script>
(function(){
    var baseUrl = '<?= base_url() ?>';
    function runBuild(force){
        var prog = document.getElementById('paProg');
        prog.style.display = 'block';
        var offset = 0, processed = 0;
        function step(){
            var fd = new FormData();
            fd.append('offset', offset);
            fd.append('force', force);
            fetch(baseUrl + 'cek-similaritas/build', {method:'POST', body:fd})
                .then(function(r){ return r.json(); })
                .then(function(j){
                    if (!j.ok){ prog.innerHTML = '⚠️ ' + (j.error || 'Gagal'); return; }
                    processed += j.done; offset = j.offset;
                    prog.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Memproses ' + processed + ' / ' + j.total + ' dokumen…';
                    if (j.finished) {
                        prog.innerHTML = '✅ Selesai: ' + processed + ' dokumen difingerprint. Muat ulang halaman untuk memperbarui statistik.';
                    } else { step(); }
                })
                .catch(function(){ prog.innerHTML = '⚠️ Gagal terhubung ke server'; });
        }
        step();
    }
    document.getElementById('paBuild').addEventListener('click', function(){ runBuild(0); });
    document.getElementById('paBuildForce').addEventListener('click', function(){
        if (confirm('Bangun ulang SEMUA sidik jari koleksi? Proses ini lama untuk koleksi besar.')) runBuild(1);
    });
})();
</script>