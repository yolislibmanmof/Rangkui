<style>
.pgWrap{max-width:860px;margin:30px auto;padding:0 16px;font-family:'Plus Jakarta Sans',system-ui,sans-serif}
.pgCard{background:#fff;border-radius:20px;box-shadow:0 16px 44px rgba(5,150,105,.14);overflow:hidden;border:1px solid rgba(5,150,105,.15)}
.pgHead{padding:28px 32px;background:linear-gradient(135deg,#0a2920,#064e3b,#115e59);color:#fff}
.pgHead h2{margin:0;font-family:'Neuton',Georgia,serif;font-size:1.45rem;display:flex;align-items:center;gap:12px}
.pgHead h2 i{width:44px;height:44px;border-radius:13px;background:linear-gradient(135deg,#059669,#f59e0b);display:inline-flex;align-items:center;justify-content:center;font-size:1.1rem}
.pgHead p{margin:8px 0 0;opacity:.88;font-size:.88rem}
.pgBody{padding:28px 32px}
.pgLbl{display:block;font-weight:800;font-size:.74rem;text-transform:uppercase;letter-spacing:.08em;color:#0f172a;margin-bottom:8px}
.pgIn{width:100%;padding:12px 15px;border:1.5px solid #e2e8f0;border-radius:12px;font-size:.9rem;background:#f8fafc;margin-bottom:16px;box-sizing:border-box}
.pgIn:focus{outline:none;border-color:#059669;box-shadow:0 0 0 4px rgba(5,150,105,.12)}
.pgDrop{border:2.5px dashed rgba(5,150,105,.4);border-radius:16px;padding:26px;text-align:center;cursor:pointer;background:rgba(5,150,105,.04);transition:.25s;margin-bottom:16px}
.pgDrop:hover{border-color:#059669;background:rgba(5,150,105,.08)}
.pgDrop.has{border-style:solid;border-color:#059669;background:rgba(5,150,105,.1)}
.pgDrop .ic{font-size:2rem;color:#059669;margin-bottom:8px}
.pgDrop .fn{font-family:'JetBrains Mono',monospace;font-size:.82rem;color:#0f172a;font-weight:700}
.pgBtn{display:inline-flex;align-items:center;justify-content:center;gap:8px;padding:13px 24px;border:none;border-radius:12px;background:linear-gradient(90deg,#059669,#0891b2);color:#fff;font-weight:800;font-size:.92rem;cursor:pointer;width:100%;box-shadow:0 10px 24px rgba(5,150,105,.35)}
.pgBtn:disabled{opacity:.55;cursor:not-allowed}
.pgBtn.gold{background:linear-gradient(90deg,#f59e0b,#d97706)}
.pgProg{display:none;margin-top:16px;font-size:.85rem;color:#059669;font-weight:700}
.pgBar{height:10px;background:#e2e8f0;border-radius:6px;overflow:hidden;margin:14px 0 6px}
.pgBar .fill{height:100%;width:0;border-radius:6px;transition:width 1s cubic-bezier(.4,0,.2,1)}
.pgScore{font-family:'Neuton',Georgia,serif;font-size:2.4rem;font-weight:700;line-height:1}
.pgResult{display:none;margin-top:24px;padding:22px;border-radius:16px;border:1.5px solid}
.pgResult.ok{background:rgba(5,150,105,.07);border-color:rgba(5,150,105,.4)}
.pgResult.bad{background:rgba(239,68,68,.07);border-color:rgba(239,68,68,.4)}
.pgMatch{background:#fff;border:1px solid rgba(5,150,105,.2);border-radius:11px;padding:11px 14px;margin-bottom:8px;display:flex;gap:10px;align-items:center}
.pgMatch .sc{min-width:56px;text-align:center;padding:4px 8px;border-radius:8px;color:#fff;font-weight:800;font-size:.78rem;font-family:'JetBrains Mono',monospace}
.pgMatch .ti{flex:1;font-size:.84rem;font-weight:600;color:#0f172a;line-height:1.45}
.pgMatch a{color:#059669;font-weight:700;font-size:.76rem;white-space:nowrap;text-decoration:none}
.pgSnip{background:#fff;border-left:3px solid #f59e0b;border-radius:0 10px 10px 0;padding:10px 14px;margin-bottom:8px;font-size:.83rem;color:#334155;font-style:italic}
.pgSnip b{color:#b45309;font-style:normal}
.pgToken{margin-top:14px;padding:14px;background:rgba(5,150,105,.1);border:1.5px dashed rgba(5,150,105,.5);border-radius:12px;font-size:.84rem;color:#065f46}
.pgToken code{display:block;font-family:'JetBrains Mono',monospace;background:#fff;padding:8px 10px;border-radius:8px;margin-top:6px;word-break:break-all;font-size:.78rem}
.pgAdvice{margin-top:14px;padding:14px;background:rgba(8,145,178,.08);border:1.5px solid rgba(8,145,178,.3);border-radius:12px;font-size:.85rem;color:#0f172a;white-space:pre-wrap;display:none}
.pgAdmin{margin-top:26px;padding:18px;background:#f8fafc;border:1.5px solid rgba(5,150,105,.2);border-radius:14px;font-size:.85rem;color:#475569}
.pgAdmin b{color:#0f172a}
</style>

<div class="pgWrap">
    <div class="pgCard">
        <div class="pgHead">
            <h2><i class="fa fa-shield"></i> Gerbang Plagiarisme — Cek Similaritas Mandiri</h2>
            <p>Uji kemiripan tugas akhir Anda terhadap <?= number_format($fp_count) ?> dokumen dalam repositori SEBELUM submit ke admin. Gratis, instan, dan rahasia.</p>
        </div>
        <div class="pgBody">
            <label class="pgLbl">NIM / NPM (opsional)</label>
            <input type="text" id="pgNim" class="pgIn" placeholder="Contoh: 01023621722004">

            <label class="pgLbl">Unggah PDF Tugas Akhir</label>
            <div class="pgDrop" id="pgDrop">
                <div class="ic"><i class="fa fa-file-pdf-o"></i></div>
                <div id="pgDropTxt">Klik atau seret file PDF ke sini (maks 25MB)</div>
                <div class="fn" id="pgFileName" style="display:none"></div>
                <input type="file" id="pgFile" accept="application/pdf" style="display:none">
            </div>

            <button class="pgBtn" id="pgScan" disabled><i class="fa fa-search"></i> Scan Similaritas Sekarang</button>
            <div class="pgProg" id="pgProg"><i class="fa fa-spinner fa-spin"></i> Menganalisis dokumen… membandingkan dengan koleksi repositori…</div>

            <div class="pgResult" id="pgResult">
                <div style="display:flex;align-items:center;gap:18px;flex-wrap:wrap">
                    <div>
                        <div class="pgScore" id="pgScoreVal">0%</div>
                        <div style="font-size:.75rem;color:#64748b;font-weight:700;text-transform:uppercase;letter-spacing:.08em">Skor Similaritas</div>
                    </div>
                    <div style="flex:1;min-width:200px">
                        <div class="pgBar"><div class="fill" id="pgBarFill"></div></div>
                        <div style="font-size:.78rem;color:#64748b">Ambang batas lulus: <b id="pgThr"><?= $threshold ?>%</b></div>
                    </div>
                </div>
                <div id="pgVerdict" style="margin-top:12px;font-weight:800;font-size:.95rem"></div>
                <div id="pgMatches" style="margin-top:16px"></div>
                <div id="pgSnips" style="margin-top:14px"></div>
                <button class="pgBtn gold" id="pgAdviceBtn" style="margin-top:14px;width:auto;padding:10px 18px;font-size:.82rem;display:none">
                    <i class="fa fa-magic"></i> Minta Saran Perbaikan AI
                </button>
                <div class="pgAdvice" id="pgAdvice"></div>
                <div class="pgToken" id="pgToken" style="display:none"></div>
            </div>

            <?php if (session()->get('user_id')): ?>
            <div class="pgAdmin">
                <b><i class="fa fa-cogs"></i> Panel Admin:</b> Sidik jari koleksi = <b><?= number_format($fp_count) ?> dokumen</b>.
                <div style="margin-top:10px;display:flex;gap:8px;flex-wrap:wrap">
                    <button class="pgBtn" id="pgBuild" style="width:auto;padding:9px 16px;font-size:.8rem"><i class="fa fa-refresh"></i> Bangun Sidik Jari Dokumen Baru</button>
                    <button class="pgBtn gold" id="pgBuildForce" style="width:auto;padding:9px 16px;font-size:.8rem"><i class="fa fa-bolt"></i> Bangun Ulang SEMUA</button>
                </div>
                <div class="pgProg" id="pgBuildProg"></div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
(function(){
    var baseUrl = '<?= base_url() ?>';
    var drop = document.getElementById('pgDrop');
    var fileInp = document.getElementById('pgFile');
    var scanBtn = document.getElementById('pgScan');
    var currentFile = null;
    var lastSnippets = '';
    var lastMatchTitle = '';

    drop.addEventListener('click', function(){ fileInp.click(); });
    drop.addEventListener('dragover', function(e){ e.preventDefault(); drop.style.borderColor = '#059669'; });
    drop.addEventListener('dragleave', function(){ drop.style.borderColor = ''; });
    drop.addEventListener('drop', function(e){
        e.preventDefault(); drop.style.borderColor = '';
        if (e.dataTransfer.files.length) setFile(e.dataTransfer.files[0]);
    });
    fileInp.addEventListener('change', function(){ if (this.files.length) setFile(this.files[0]); });

    function setFile(f){
        if (f.type !== 'application/pdf'){ alert('Hanya file PDF yang diterima'); return; }
        if (f.size > 25 * 1024 * 1024){ alert('Ukuran maksimal 25MB'); return; }
        currentFile = f;
        drop.classList.add('has');
        document.getElementById('pgDropTxt').style.display = 'none';
        var fn = document.getElementById('pgFileName');
        fn.style.display = 'block';
        fn.textContent = f.name + ' (' + (f.size / 1048576).toFixed(2) + ' MB)';
        scanBtn.disabled = false;
    }

    scanBtn.addEventListener('click', function(){
        if (!currentFile) return;
        scanBtn.disabled = true;
        document.getElementById('pgProg').style.display = 'block';
        document.getElementById('pgResult').style.display = 'none';

        var fd = new FormData();
        fd.append('pdf_file', currentFile);
        fd.append('student_id', document.getElementById('pgNim').value.trim());

        fetch(baseUrl + 'cek-similaritas/scan', { method: 'POST', body: fd })
            .then(function(r){ return r.json(); })
            .then(function(j){
                scanBtn.disabled = false;
                document.getElementById('pgProg').style.display = 'none';
                if (!j.ok){ alert('⚠️ ' + (j.error || 'Gagal scan')); return; }
                renderResult(j);
            })
            .catch(function(e){
                scanBtn.disabled = false;
                document.getElementById('pgProg').style.display = 'none';
                alert('Gagal terhubung ke server: ' + e.message);
            });
    });

    function colorOf(s){ return s < 20 ? '#059669' : (s < 50 ? '#f59e0b' : '#ef4444'); }

    function renderResult(j){
        var box = document.getElementById('pgResult');
        box.style.display = 'block';
        box.className = 'pgResult ' + (j.status === 'lulus' ? 'ok' : 'bad');

        document.getElementById('pgScoreVal').textContent = j.score + '%';
        document.getElementById('pgScoreVal').style.color = colorOf(j.score);
        document.getElementById('pgThr').textContent = j.threshold + '%';

        var fill = document.getElementById('pgBarFill');
        fill.style.width = '0%';
        fill.style.background = colorOf(j.score);
        setTimeout(function(){ fill.style.width = Math.min(100, j.score) + '%'; }, 60);

        var verdict = document.getElementById('pgVerdict');
        if (j.status === 'lulus') {
            verdict.innerHTML = '✅ <span style="color:#059669">LOLOS GERBANG PLAGIARISME.</span> Dokumen Anda siap diajukan ke admin. Token pra-approval berlaku 24 jam.';
        } else {
            verdict.innerHTML = '⚠️ <span style="color:#dc2626">BELUM LOLOS.</span> Similarity di atas ambang batas. Perbaiki bagian yang ditandai, lalu scan ulang sebelum submit.';
        }

        var mh = '';
        if (j.matches && j.matches.length) {
            mh = '<div style="font-size:.75rem;font-weight:800;color:#64748b;text-transform:uppercase;letter-spacing:.08em;margin-bottom:8px">Dokumen Paling Mirip</div>';
            j.matches.forEach(function(m){
                var c = colorOf(m.score);
                mh += '<div class="pgMatch"><span class="sc" style="background:' + c + '">' + m.score + '%</span>'
                    + '<span class="ti">' + esc(m.title) + ' <small style="color:#94a3b8">(' + (m.year || '-') + ')</small></span>'
                    + '<a href="' + baseUrl + 'beranda/detail/' + m.biblio_id + '" target="_blank">Lihat <i class="fa fa-external-link"></i></a></div>';
            });
        } else {
            mh = '<div style="font-size:.85rem;color:#059669;font-weight:700"><i class="fa fa-check-circle"></i> Tidak ditemukan kemiripan signifikan dengan koleksi.</div>';
        }
        document.getElementById('pgMatches').innerHTML = mh;

        var sh = '';
        if (j.snippets && j.snippets.length) {
            lastSnippets = j.snippets.map(function(s){ return s.text; }).join('\n\n');
            lastMatchTitle = (j.matches && j.matches[0]) ? j.matches[0].title : '';
            sh = '<div style="font-size:.75rem;font-weight:800;color:#64748b;text-transform:uppercase;letter-spacing:.08em;margin-bottom:8px">Bagian Teks Anda yang Terdeteksi Mirip</div>';
            j.snippets.forEach(function(s){
                sh += '<div class="pgSnip"><b>' + s.ratio + '% mirip:</b> "' + esc(s.text) + '"</div>';
            });
            document.getElementById('pgAdviceBtn').style.display = 'inline-flex';
        } else {
            document.getElementById('pgAdviceBtn').style.display = 'none';
        }
        document.getElementById('pgSnips').innerHTML = sh;

        var tk = document.getElementById('pgToken');
        if (j.token) {
            tk.style.display = 'block';
            tk.innerHTML = '🎫 <b>Token Pra-Approval</b> (simpan & lampirkan saat submit, berlaku s/d ' + j.expires + '):'
                + '<code id="pgTokenVal">' + j.token + '</code>'
                + '<button class="pgBtn" style="width:auto;padding:7px 14px;font-size:.75rem;margin-top:8px" onclick="navigator.clipboard.writeText(document.getElementById(\'pgTokenVal\').textContent);this.textContent=\'✅ Tersalin!\'"><i class="fa fa-copy"></i> Salin Token</button>';
        } else {
            tk.style.display = 'none';
        }

        document.getElementById('pgAdvice').style.display = 'none';
        box.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }

    document.getElementById('pgAdviceBtn').addEventListener('click', function(){
        var btn = this;
        btn.disabled = true;
        btn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> AI menganalisis…';
        var fd = new FormData();
        fd.append('snippets', lastSnippets);
        fd.append('match_title', lastMatchTitle);
        fetch(baseUrl + 'cek-similaritas/advice', { method: 'POST', body: fd })
            .then(function(r){ return r.json(); })
            .then(function(j){
                btn.disabled = false;
                btn.innerHTML = '<i class="fa fa-magic"></i> Minta Saran Perbaikan AI';
                var box = document.getElementById('pgAdvice');
                box.style.display = 'block';
                box.textContent = j.ok ? j.advice : ('⚠️ ' + (j.error || 'Gagal'));
            })
            .catch(function(){ btn.disabled = false; btn.innerHTML = '<i class="fa fa-magic"></i> Minta Saran Perbaikan AI'; });
    });

    function esc(s){ return String(s == null ? '' : s).replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;'); }

    // ===== ADMIN BUILD =====
    function runBuild(force){
        var prog = document.getElementById('pgBuildProg');
        prog.style.display = 'block';
        var offset = 0, processed = 0;
        function step(){
            var fd = new FormData();
            fd.append('offset', offset);
            fd.append('force', force);
            fetch(baseUrl + 'cek-similaritas/build', { method: 'POST', body: fd })
                .then(function(r){ return r.json(); })
                .then(function(j){
                    if (!j.ok){ prog.innerHTML = '⚠️ ' + j.error; return; }
                    processed += j.done; offset = j.offset;
                    prog.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Memproses ' + processed + ' / ' + j.total + ' dokumen…';
                    if (j.finished) {
                        prog.innerHTML = '✅ Selesai: ' + processed + ' dokumen difingerprint. Muat ulang halaman untuk melihat jumlah terbaru.';
                    } else { step(); }
                })
                .catch(function(){ prog.innerHTML = '⚠️ Gagal terhubung'; });
        }
        step();
    }
    var b1 = document.getElementById('pgBuild');
    if (b1) b1.addEventListener('click', function(){ runBuild(0); });
    var b2 = document.getElementById('pgBuildForce');
    if (b2) b2.addEventListener('click', function(){
        if (confirm('Bangun ulang SEMUA sidik jari koleksi? Proses ini lama untuk koleksi besar.')) runBuild(1);
    });
})();
</script>