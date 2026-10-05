<style>
/* ================================================================
   DIFOSS BULK OPERATIONS SUITE — EMERALD FOREST EDITION
   ================================================================ */
:root{
    --xb-emerald:#059669; --xb-teal:#0891b2; --xb-gold:#f59e0b;
    --xb-mint:#6ee7b7; --xb-deep:#0a2920; --xb-mid:#064e3b;
    --xb-ink:#0f172a; --xb-muted:#64748b; --xb-soft:#94a3b8;
}

.xuBulkWrap{padding:10px 0 90px}

/* ===== HEADER ===== */
.xuBulkHead h2{
    margin:0 0 20px;
    font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1.55rem;
    color:var(--xb-ink);
    display:flex;align-items:center;gap:12px;
    letter-spacing:-.01em;
}
html.xu-dark .xuBulkHead h2{color:#f1f5f9}

.xuBulkHead h2 i{
    width:46px;height:46px;border-radius:14px;
    background:linear-gradient(135deg,var(--xb-emerald),var(--xb-gold));
    color:#fff;
    display:inline-flex;align-items:center;justify-content:center;
    font-size:1.2rem;
    box-shadow:0 10px 24px rgba(5,150,105,.35);
}

/* ===== CARD ===== */
.xuBulkCard{
    background:#fff;border-radius:18px;
    padding:20px;
    border:1px solid rgba(5,150,105,.12);
    margin-bottom:18px;
    box-shadow:0 8px 24px rgba(15,23,42,.05);
    transition:.3s cubic-bezier(.2,.8,.2,1);
}
.xuBulkCard:hover{
    border-color:rgba(5,150,105,.22);
    box-shadow:0 14px 34px rgba(5,150,105,.12);
}
html.xu-dark .xuBulkCard{background:#0f1e1f;border-color:rgba(5,150,105,.22);box-shadow:0 8px 24px rgba(0,0,0,.4)}
html.xu-dark .xuBulkCard:hover{border-color:rgba(245,158,11,.35);box-shadow:0 14px 34px rgba(5,150,105,.2)}

/* ===== FILTER GRID ===== */
.xuBulkGrid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(160px,1fr));
    gap:12px;
    align-items:end;
}

.xuBulkIn{
    width:100%;
    padding:10px 14px;
    border:1.5px solid #e2e8f0;
    border-radius:11px;
    font-size:.88rem;
    font-family:inherit;
    color:var(--xb-ink);
    box-sizing:border-box;
    background:#fff;
    transition:.25s;
}
.xuBulkIn:focus{
    border-color:var(--xb-emerald);
    box-shadow:0 0 0 4px rgba(5,150,105,.12);
    outline:none;
}
html.xu-dark .xuBulkIn{background:rgba(255,255,255,.05);border-color:rgba(5,150,105,.25);color:#f1f5f9}
html.xu-dark .xuBulkIn:focus{border-color:var(--xb-gold);box-shadow:0 0 0 4px rgba(245,158,11,.15)}

/* ===== BUTTONS ===== */
.xuBulkBtn{
    display:inline-flex;align-items:center;justify-content:center;
    gap:8px;
    padding:10px 18px;
    border:none;border-radius:11px;
    font-weight:700;font-size:.82rem;
    cursor:pointer;transition:.25s;
    font-family:inherit;
    letter-spacing:.02em;
    position:relative;overflow:hidden;
}
.xuBulkBtn::before{
    content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;
    background:linear-gradient(100deg,transparent 20%,rgba(255,255,255,.28) 50%,transparent 80%);
    transition:left .6s ease;
}
.xuBulkBtn:hover::before{left:120%}

.xuBulkBtn.pri{
    background:linear-gradient(90deg,var(--xb-emerald),var(--xb-gold));
    color:#fff;
    box-shadow:0 8px 20px rgba(5,150,105,.35);
}
.xuBulkBtn.pri:hover{
    transform:translateY(-2px);
    filter:brightness(1.08);
    box-shadow:0 12px 28px rgba(5,150,105,.45);
}

.xuBulkBtn.ok{
    background:linear-gradient(90deg,var(--xb-emerald),var(--xb-teal));
    color:#fff;
    box-shadow:0 8px 20px rgba(5,150,105,.3);
}
.xuBulkBtn.ok:hover{transform:translateY(-2px);filter:brightness(1.08);box-shadow:0 12px 28px rgba(5,150,105,.4)}

.xuBulkBtn.warn{
    background:linear-gradient(90deg,rgba(245,158,11,.1),rgba(245,158,11,.06));
    color:#b45309;
    border:1.5px solid rgba(245,158,11,.4);
}
.xuBulkBtn.warn:hover{
    background:linear-gradient(90deg,var(--xb-gold),#d97706);
    color:#fff;border-color:transparent;
    transform:translateY(-2px);
    box-shadow:0 8px 20px rgba(245,158,11,.35);
}
html.xu-dark .xuBulkBtn.warn{background:rgba(245,158,11,.12);color:#fde68a;border-color:rgba(245,158,11,.35)}
html.xu-dark .xuBulkBtn.warn:hover{color:#fff}

.xuBulkBtn.danger{
    background:#fee2e2;
    color:#dc2626;
    border:1.5px solid rgba(220,38,38,.25);
}
.xuBulkBtn.danger:hover{
    background:#fecaca;border-color:rgba(220,38,38,.5);
    transform:translateY(-2px);
}
html.xu-dark .xuBulkBtn.danger{background:rgba(239,68,68,.12);color:#fca5a5;border-color:rgba(239,68,68,.3)}

/* ===== TABEL ===== */
.xuBulkTable{width:100%;border-collapse:collapse;font-size:.85rem}
.xuBulkTable th,
.xuBulkTable td{
    padding:11px 12px;
    border-bottom:1px solid #e2e8f0;
    text-align:left;vertical-align:top;
}
.xuBulkTable th{
    background:linear-gradient(180deg,rgba(5,150,105,.06),rgba(5,150,105,.02));
    font-weight:800;
    color:var(--xb-ink);
    font-size:.72rem;
    text-transform:uppercase;letter-spacing:.08em;
    position:sticky;top:0;z-index:2;
    border-bottom:2px solid rgba(5,150,105,.2);
}
html.xu-dark .xuBulkTable th{background:linear-gradient(180deg,rgba(5,150,105,.15),rgba(5,150,105,.08));color:#f1f5f9;border-bottom-color:rgba(5,150,105,.4)}
html.xu-dark .xuBulkTable td{border-bottom-color:rgba(5,150,105,.15)}

.xuBulkTable tbody tr{transition:.2s}
.xuBulkTable tbody tr:hover{background:rgba(5,150,105,.04)}
html.xu-dark .xuBulkTable tbody tr:hover{background:rgba(5,150,105,.1)}

/* Checkbox emerald */
.xuBulkTable input[type="checkbox"]{
    width:18px;height:18px;
    accent-color:var(--xb-emerald);
    cursor:pointer;
}

/* Judul dokumen */
.xuBulkTitle{
    color:var(--xb-ink);font-weight:600;
    display:block;line-height:1.45;
    max-width:420px;
}
html.xu-dark .xuBulkTitle{color:#e2e8f0}

/* Tahun */
.xuBulkYear{
    font-family:'JetBrains Mono',monospace;
    font-weight:700;color:var(--xb-muted);
    font-size:.82rem;
}
html.xu-dark .xuBulkYear{color:var(--xb-soft)}

/* Status badges */
.xuBulkStatus{
    display:inline-flex;align-items:center;gap:5px;
    padding:3px 10px;border-radius:999px;
    font-size:.7rem;font-weight:800;
    letter-spacing:.04em;
    white-space:nowrap;
}
.xuBulkStatus.pub{
    background:rgba(5,150,105,.12);
    color:var(--xb-emerald);
    border:1px solid rgba(5,150,105,.3);
}
.xuBulkStatus.hide{
    background:rgba(245,158,11,.12);
    color:#b45309;
    border:1px solid rgba(245,158,11,.35);
}
html.xu-dark .xuBulkStatus.pub{background:rgba(5,150,105,.2);color:var(--xb-mint);border-color:rgba(5,150,105,.4)}
html.xu-dark .xuBulkStatus.hide{background:rgba(245,158,11,.18);color:#fde68a;border-color:rgba(245,158,11,.4)}

/* ID cell */
.xuBulkId{
    font-family:'JetBrains Mono',monospace;
    font-weight:700;font-size:.78rem;
    color:var(--xb-muted);
    padding:2px 8px;border-radius:6px;
    background:rgba(5,150,105,.06);
}
html.xu-dark .xuBulkId{color:var(--xb-soft);background:rgba(5,150,105,.12)}

/* Empty state */
.xuBulkEmpty{
    text-align:center;color:var(--xb-soft);
    padding:40px 20px;
    font-size:.9rem;
}
.xuBulkEmpty i{
    font-size:2.4rem;color:var(--xb-muted);
    margin-bottom:12px;display:block;
}
.xuBulkEmpty b{color:var(--xb-emerald)}
html.xu-dark .xuBulkEmpty b{color:var(--xb-gold)}

/* Scroll container */
.xuBulkTableWrap{
    max-height:420px;overflow:auto;
    border-radius:14px;
    border:1px solid rgba(5,150,105,.08);
}
.xuBulkTableWrap::-webkit-scrollbar{width:8px;height:8px}
.xuBulkTableWrap::-webkit-scrollbar-track{background:rgba(5,150,105,.05)}
.xuBulkTableWrap::-webkit-scrollbar-thumb{background:linear-gradient(180deg,var(--xb-emerald),var(--xb-gold));border-radius:4px}

/* ===== ACTION BAR ===== */
.xuActionBar{
    position:sticky;bottom:16px;
    background:linear-gradient(135deg,var(--xb-deep),var(--xb-mid));
    border-radius:16px;
    padding:14px 18px;
    display:flex;gap:10px;
    align-items:center;flex-wrap:wrap;
    box-shadow:0 20px 50px rgba(0,0,0,.35),0 0 0 1px rgba(5,150,105,.25);
    margin-top:20px;
    z-index:10;
}
.xuActionBar::before{
    content:'';position:absolute;top:0;left:0;right:0;height:2px;
    background:linear-gradient(90deg,transparent,var(--xb-emerald),var(--xb-gold),var(--xb-teal),transparent);
    border-radius:16px 16px 0 0;
}

.xuActionBar .cnt{
    color:var(--xb-gold);
    font-family:'Neuton',Georgia,serif;
    font-weight:700;
    font-size:.95rem;
    padding-right:10px;
    border-right:1px solid rgba(255,255,255,.15);
    margin-right:4px;
    display:inline-flex;align-items:center;gap:7px;
}
.xuActionBar .cnt i{color:var(--xb-mint)}

.xuActionBar select,
.xuActionBar input{
    padding:9px 12px;
    border-radius:10px;
    border:1px solid rgba(255,255,255,.15);
    font-size:.82rem;
    background:rgba(255,255,255,.08);
    color:#fff;
    font-family:inherit;
    outline:none;
    transition:.25s;
}
.xuActionBar select:focus,
.xuActionBar input:focus{
    border-color:var(--xb-gold);
    box-shadow:0 0 0 3px rgba(245,158,11,.18);
    background:rgba(255,255,255,.12);
}
.xuActionBar select option{background:var(--xb-deep);color:#fff}
.xuActionBar input::placeholder{color:rgba(255,255,255,.4)}

.xuActionBar .xuBulkBtn{padding:9px 16px}

/* Export group separator */
.xuBarSep{
    width:1px;height:28px;
    background:linear-gradient(180deg,transparent,rgba(255,255,255,.2),transparent);
    margin:0 4px;
}

/* ===== Responsive ===== */
@media(max-width:720px){
    .xuBulkGrid{grid-template-columns:1fr}
    .xuActionBar{padding:12px;gap:8px}
    .xuActionBar .cnt{width:100%;border-right:none;padding:0;margin:0;justify-content:center;border-bottom:1px solid rgba(255,255,255,.1);padding-bottom:10px}
    .xuBarSep{display:none}
    .xuActionBar select,.xuActionBar input{flex:1;min-width:0}
    .xuBulkWrap{padding-bottom:140px}
}
</style>

<div class="xuBulkWrap">
    <div class="xuBulkHead">
        <h2><i class="fa fa-cubes"></i> Bulk Operations Suite</h2>
    </div>

    <!-- Filter -->
    <div class="xuBulkCard">
        <div class="xuBulkGrid">
            <input type="text" id="xuQ" class="xuBulkIn" placeholder="🔍 Kata kunci judul...">
            <input type="number" id="xuYFrom" class="xuBulkIn" placeholder="📅 Tahun dari">
            <input type="number" id="xuYTo" class="xuBulkIn" placeholder="📅 Tahun s/d">
            <select id="xuMin" class="xuBulkIn">
                <option value="">🎓 Semua Prodi</option>
                <?php foreach ($ministries as $m): ?>
                    <option value="<?= esc($m->code_ministry) ?>"><?= esc($m->name_prodi) ?></option>
                <?php endforeach; ?>
            </select>
            <button class="xuBulkBtn pri" id="xuLoad">
                <i class="fa fa-search"></i> Muat Dokumen
            </button>
        </div>
    </div>

    <!-- Tabel hasil -->
    <div class="xuBulkCard" style="padding:14px">
        <div class="xuBulkTableWrap">
            <table class="xuBulkTable">
                <thead>
                    <tr>
                        <th style="width:40px;text-align:center"><input type="checkbox" id="xuAll"></th>
                        <th style="width:70px">ID</th>
                        <th>Judul</th>
                        <th style="width:80px">Tahun</th>
                        <th style="width:110px">Status</th>
                    </tr>
                </thead>
                <tbody id="xuRows">
                    <tr>
                        <td colspan="5">
                            <div class="xuBulkEmpty">
                                <i class="fa fa-inbox"></i>
                                Muat dokumen untuk memulai operasi <b>bulk</b>.
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Action Bar -->
    <div class="xuActionBar">
        <span class="cnt" id="xuCnt">
            <i class="fa fa-check-square-o"></i>
            <span id="xuCntNum">0</span> dipilih
        </span>
        <select id="xuOp">
            <option value="">— Pilih Operasi —</option>
            <option value="add_topic">➕ Tambah Subyek</option>
            <option value="set_year">📅 Set Tahun Terbit</option>
            <option value="set_ministry">🎓 Set Prodi</option>
            <option value="set_status">👁️ Set Publik/Sembunyi</option>
            <option value="delete">🗑️ Hapus (bahaya)</option>
        </select>
        <input type="text" id="xuVal" style="width:180px" placeholder="Nilai...">
        <button class="xuBulkBtn ok" id="xuExec">
            <i class="fa fa-bolt"></i> Jalankan
        </button>
        <span class="xuBarSep"></span>
        <button class="xuBulkBtn warn" data-f="ris">
            <i class="fa fa-download"></i> RIS
        </button>
        <button class="xuBulkBtn warn" data-f="bibtex">
            <i class="fa fa-download"></i> BibTeX
        </button>
        <button class="xuBulkBtn warn" data-f="csv">
            <i class="fa fa-download"></i> CSV
        </button>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function(){
    var loaded = [];

    function selected(){
        var out = [];
        document.querySelectorAll('.xuRowChk:checked').forEach(function(c){ out.push(c.value); });
        return out;
    }
    function updCnt(){
        var n = selected().length;
        var el = document.getElementById('xuCntNum');
        if (el) el.textContent = n;
    }

    $('#xuLoad').on('click', function(){
        var btn = $(this);
        btn.prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Memuat...');
        $.get(baseUrl + 'bibliography/bulk-list', {
            q: $('#xuQ').val(),
            year_from: $('#xuYFrom').val(),
            year_to: $('#xuYTo').val(),
            ministry: $('#xuMin').val()
        }, function(j){
            btn.prop('disabled', false).html('<i class="fa fa-search"></i> Muat Dokumen');
            loaded = j.rows;
            var html = '';
            if (!j.rows || !j.rows.length) {
                html = '<tr><td colspan="5"><div class="xuBulkEmpty"><i class="fa fa-search"></i> Tidak ada hasil untuk filter ini.</div></td></tr>';
            } else {
                j.rows.forEach(function(r){
                    var status = r.opac_hide == 1
                        ? '<span class="xuBulkStatus hide"><i class="fa fa-lock"></i> Sembunyi</span>'
                        : '<span class="xuBulkStatus pub"><i class="fa fa-globe"></i> Publik</span>';
                    html += '<tr>'
                        + '<td style="text-align:center"><input type="checkbox" class="xuRowChk" value="' + r.biblio_id + '"></td>'
                        + '<td><span class="xuBulkId">#' + r.biblio_id + '</span></td>'
                        + '<td><span class="xuBulkTitle">' + $('<span>').text(r.title).html() + '</span></td>'
                        + '<td><span class="xuBulkYear">' + (r.publish_year || '—') + '</span></td>'
                        + '<td>' + status + '</td>'
                        + '</tr>';
                });
            }
            $('#xuRows').html(html);
            $('.xuRowChk').on('change', updCnt);
            updCnt();
        }).fail(function(){
            btn.prop('disabled', false).html('<i class="fa fa-search"></i> Muat Dokumen');
            alert('❌ Gagal memuat daftar dokumen.');
        });
    });

    $('#xuAll').on('change', function(){
        $('.xuRowChk').prop('checked', this.checked);
        updCnt();
    });

    $('#xuExec').on('click', function(){
        var ids = selected();
        var op = $('#xuOp').val();
        if (!ids.length) { alert('⚠️ Pilih minimal satu dokumen.'); return; }
        if (!op) { alert('⚠️ Pilih operasi terlebih dahulu.'); return; }
        if (op === 'delete' && !confirm('⚠️ HAPUS ' + ids.length + ' dokumen PERMANEN?\n\nTindakan ini tidak dapat dibatalkan. Lanjutkan?')) return;
        if (op !== 'delete' && !confirm('Akan memengaruhi ' + ids.length + ' dokumen. Lanjutkan?')) return;

        var btn = $(this);
        btn.prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Memproses...');
        $.post(baseUrl + 'bibliography/bulk-exec', { ids: ids, op: op, value: $('#xuVal').val() }, function(j){
            btn.prop('disabled', false).html('<i class="fa fa-bolt"></i> Jalankan');
            if (j.ok) {
                alert('✅ Berhasil: ' + j.affected + ' dokumen diproses.');
                $('#xuLoad').click();
            } else {
                alert('❌ ' + j.error);
            }
        }).fail(function(){
            btn.prop('disabled', false).html('<i class="fa fa-bolt"></i> Jalankan');
            alert('❌ Gagal terhubung ke server.');
        });
    });

    $('.xuActionBar [data-f]').on('click', function(){
        var ids = selected();
        if (!ids.length) { alert('⚠️ Pilih minimal satu dokumen untuk diekspor.'); return; }
        var f = $(this).data('f');
        var btn = $(this);
        var orig = btn.html();
        btn.prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i>');
        $.post(baseUrl + 'bibliography/bulk-export', { ids: ids, format: f }, function(j){
            btn.prop('disabled', false).html(orig);
            if (!j.ok) { alert('❌ ' + j.error); return; }
            var b = new Blob([j.text], { type: 'text/plain;charset=utf-8' });
            var a = document.createElement('a');
            a.href = URL.createObjectURL(b);
            a.download = j.filename;
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
        }).fail(function(){
            btn.prop('disabled', false).html(orig);
            alert('❌ Gagal terhubung ke server.');
        });
    });
});
</script>