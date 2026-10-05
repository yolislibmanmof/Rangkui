<style>
/* ================================================================
   DIFOSS BARCODE GENERATOR — EMERALD FOREST EDITION
   ================================================================ */
:root{
    --bc-emerald:#059669; --bc-teal:#0891b2; --bc-gold:#f59e0b;
    --bc-mint:#6ee7b7; --bc-deep:#0a2920;
    --bc-ink:#0f172a; --bc-muted:#64748b; --bc-soft:#94a3b8;
}

.xuR{opacity:0;transform:translateY(24px);transition:all .6s cubic-bezier(.2,.8,.2,1)}
.xuR.in{opacity:1;transform:none}

/* ===== KARTU ===== */
.xuBcCard{
    background:#fff;border-radius:22px;
    box-shadow:0 16px 44px rgba(15,23,42,.08);
    overflow:hidden;
    border:1px solid rgba(5,150,105,.12);
    margin-bottom:24px;
    transition:.35s cubic-bezier(.2,.8,.2,1);
}
.xuBcCard:hover{box-shadow:0 22px 54px rgba(5,150,105,.14);border-color:rgba(5,150,105,.22)}
html.xu-dark .xuBcCard{background:#0f1e1f;border-color:rgba(5,150,105,.22);box-shadow:0 16px 44px rgba(0,0,0,.4)}

/* ===== HEADER ===== */
.xuBcHead{
    padding:22px 28px;
    background:linear-gradient(90deg,var(--bc-emerald),var(--bc-teal),var(--bc-gold),var(--bc-emerald));
    background-size:200% 100%;
    color:#fff;
    display:flex;align-items:center;justify-content:space-between;
    flex-wrap:wrap;gap:14px;
    animation:xuBcGrad 7s linear infinite;
    position:relative;overflow:hidden;
}
.xuBcHead::after{
    content:'';position:absolute;top:-60%;right:-8%;
    width:320px;height:320px;border-radius:50%;
    background:radial-gradient(circle,rgba(245,158,11,.25),transparent 70%);
    pointer-events:none;
}
@keyframes xuBcGrad{to{background-position:200% 0}}

.xuBcHead h2{
    margin:0;font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1.3rem;
    display:flex;align-items:center;gap:12px;
    color:#fff;letter-spacing:-.01em;
    position:relative;z-index:2;
}
.xuBcHead h2 i{
    width:42px;height:42px;border-radius:13px;
    background:rgba(255,255,255,.18);
    backdrop-filter:blur(8px);-webkit-backdrop-filter:blur(8px);
    display:inline-flex;align-items:center;justify-content:center;
    font-size:1.15rem;
    box-shadow:inset 0 1px 0 rgba(255,255,255,.2);
}

.xuBcBody{padding:28px 30px}

/* ===== SIZE ROW ===== */
.xuSizeRow{
    display:grid;grid-template-columns:1fr 260px;
    gap:20px;align-items:center;
    margin-bottom:26px;padding:20px;
    background:linear-gradient(135deg,rgba(5,150,105,.04),rgba(245,158,11,.02));
    border:1.5px solid rgba(5,150,105,.2);
    border-radius:16px;
    transition:.3s;
}
.xuSizeRow:hover{border-color:rgba(5,150,105,.35);box-shadow:0 8px 22px rgba(5,150,105,.08)}
html.xu-dark .xuSizeRow{background:linear-gradient(135deg,rgba(5,150,105,.08),rgba(245,158,11,.04));border-color:rgba(5,150,105,.3)}
html.xu-dark .xuSizeRow:hover{border-color:rgba(245,158,11,.4)}

@media (max-width:700px){.xuSizeRow{grid-template-columns:1fr}}

.xuSizeRow label{
    font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1.02rem;
    color:var(--bc-ink);
    margin-bottom:8px;
    display:flex;align-items:center;gap:10px;
}
.xuSizeRow label i{
    color:var(--bc-emerald);
    width:30px;height:30px;border-radius:9px;
    background:linear-gradient(135deg,rgba(5,150,105,.12),rgba(245,158,11,.08));
    display:inline-flex;align-items:center;justify-content:center;
    font-size:.82rem;
    border:1px solid rgba(5,150,105,.2);
}
html.xu-dark .xuSizeRow label{color:#f1f5f9}
html.xu-dark .xuSizeRow label i{color:var(--bc-mint);background:linear-gradient(135deg,rgba(5,150,105,.2),rgba(245,158,11,.12));border-color:rgba(5,150,105,.35)}

.xuSizeRow .form-control{
    width:100%;padding:11px 14px;
    border:1.5px solid #cbd5e1;
    border-radius:12px;font-size:.9rem;
    outline:none;background:#fff;
    color:var(--bc-ink);
    font-family:inherit;
    box-sizing:border-box;
    transition:.25s;font-weight:700;
}
.xuSizeRow .form-control:focus{
    border-color:var(--bc-emerald);
    background:#fff;
    box-shadow:0 0 0 4px rgba(5,150,105,.12);
}
html.xu-dark .xuSizeRow .form-control{background:rgba(255,255,255,.05);border-color:rgba(5,150,105,.25);color:#f1f5f9}
html.xu-dark .xuSizeRow .form-control:focus{border-color:var(--bc-gold);background:rgba(255,255,255,.08);box-shadow:0 0 0 4px rgba(245,158,11,.15)}

/* Preview */
.xuPreview{
    background:#fff;
    border:1.5px dashed rgba(5,150,105,.35);
    border-radius:14px;
    padding:18px;text-align:center;
    min-height:110px;
    display:flex;flex-direction:column;
    align-items:center;justify-content:center;gap:10px;
    position:relative;overflow:hidden;
}
.xuPreview::before{
    content:'';position:absolute;inset:0;
    background:radial-gradient(circle at 50% 100%,rgba(245,158,11,.08),transparent 60%);
    pointer-events:none;
}
html.xu-dark .xuPreview{background:rgba(255,255,255,.03);border-color:rgba(5,150,105,.4)}

.xuPreviewLabel{
    font-size:.7rem;font-weight:800;
    color:var(--bc-muted);
    text-transform:uppercase;letter-spacing:.1em;
    position:relative;z-index:1;
}
html.xu-dark .xuPreviewLabel{color:var(--bc-soft)}

.xuPreviewBars{
    display:flex;align-items:flex-end;gap:1px;justify-content:center;
    position:relative;z-index:1;
    padding:6px 0;
}
.xuPreviewBars span{
    display:block;
    background:var(--bc-ink);
    height:40px;
    border-radius:1px;
    transition:height .4s cubic-bezier(.2,.8,.2,1);
}
html.xu-dark .xuPreviewBars span{background:#e2e8f0}

.xuPreviewSize{
    font-family:'JetBrains Mono',monospace;
    font-size:.82rem;font-weight:800;
    color:var(--bc-emerald);
    letter-spacing:.04em;
    position:relative;z-index:1;
    padding:3px 12px;border-radius:999px;
    background:rgba(5,150,105,.08);
    border:1px solid rgba(5,150,105,.2);
}
html.xu-dark .xuPreviewSize{color:var(--bc-mint);background:rgba(5,150,105,.15);border-color:rgba(5,150,105,.35)}

/* ===== HELPER BAR ===== */
.xuHelperBar{
    display:flex;flex-wrap:wrap;gap:8px;
    margin-bottom:20px;padding:14px;
    background:linear-gradient(90deg,rgba(5,150,105,.05),rgba(245,158,11,.03));
    border:1.5px solid rgba(5,150,105,.2);
    border-radius:12px;
}
html.xu-dark .xuHelperBar{background:linear-gradient(90deg,rgba(5,150,105,.1),rgba(245,158,11,.06));border-color:rgba(5,150,105,.3)}

.xuMiniBtn{
    display:inline-flex;align-items:center;gap:6px;
    padding:8px 14px;border-radius:10px;
    background:#fff;color:var(--bc-emerald);
    border:1.5px solid rgba(5,150,105,.3);
    font-weight:700;font-size:.78rem;
    cursor:pointer;transition:.25s;
    font-family:inherit;
    position:relative;overflow:hidden;
}
.xuMiniBtn::before{
    content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;
    background:linear-gradient(100deg,transparent 20%,rgba(5,150,105,.12) 50%,transparent 80%);
    transition:left .6s ease;
}
.xuMiniBtn:hover{
    background:rgba(5,150,105,.08);
    transform:translateY(-1px);
    border-color:rgba(5,150,105,.5);
}
.xuMiniBtn:hover::before{left:120%}
html.xu-dark .xuMiniBtn{background:rgba(255,255,255,.05);color:var(--bc-mint);border-color:rgba(5,150,105,.35)}
html.xu-dark .xuMiniBtn:hover{background:rgba(5,150,105,.12);border-color:rgba(5,150,105,.5)}

.xuMiniWarn{
    color:#b45309;
    border-color:rgba(245,158,11,.4);
    background:#fffbeb;
}
.xuMiniWarn:hover{background:#fef3c7;border-color:rgba(245,158,11,.6)}
html.xu-dark .xuMiniWarn{color:#fcd34d;background:rgba(245,158,11,.12);border-color:rgba(245,158,11,.4)}
html.xu-dark .xuMiniWarn:hover{background:rgba(245,158,11,.18);border-color:rgba(245,158,11,.6)}

.xuMiniDanger{
    color:#b91c1c;
    border-color:rgba(220,38,38,.35);
    background:#fef2f2;
}
.xuMiniDanger:hover{background:#fee2e2;border-color:rgba(220,38,38,.6)}
html.xu-dark .xuMiniDanger{color:#fca5a5;background:rgba(220,38,38,.12);border-color:rgba(220,38,38,.4)}
html.xu-dark .xuMiniDanger:hover{background:rgba(220,38,38,.18);border-color:rgba(220,38,38,.6)}

/* ===== BARCODE GRID ===== */
.xuBcGrid{
    display:grid;grid-template-columns:repeat(3,1fr);
    gap:14px;margin-bottom:22px;
}
@media (max-width:768px){.xuBcGrid{grid-template-columns:1fr 1fr}}
@media (max-width:480px){.xuBcGrid{grid-template-columns:1fr}}

.xuBcItem{position:relative}
.xuBcItem label{
    display:flex;align-items:center;gap:8px;
    font-size:.74rem;font-weight:800;
    color:var(--bc-ink);
    margin-bottom:7px;
    text-transform:uppercase;letter-spacing:.06em;
}
html.xu-dark .xuBcItem label{color:#e2e8f0}

.xuBcNum{
    width:24px;height:24px;border-radius:7px;
    background:linear-gradient(135deg,var(--bc-emerald),var(--bc-gold));
    color:#fff;
    display:inline-flex;align-items:center;justify-content:center;
    font-size:.74rem;font-weight:900;
    flex-shrink:0;
    box-shadow:0 4px 10px rgba(5,150,105,.25);
    font-family:'JetBrains Mono',monospace;
}

.xuBcItem input{
    width:100%;padding:11px 14px;
    border:1.5px solid #cbd5e1;
    border-radius:11px;
    font-size:.9rem;
    font-family:'JetBrains Mono',monospace;
    font-weight:700;letter-spacing:.02em;
    color:var(--bc-ink);
    background:#fff;
    outline:none;transition:.25s;
    box-sizing:border-box;
}
.xuBcItem input:hover{border-color:var(--bc-emerald)}
.xuBcItem input:focus{
    border-color:var(--bc-emerald);
    background:#fff;
    box-shadow:0 0 0 4px rgba(5,150,105,.12);
}
.xuBcItem input::placeholder{color:#cbd5e1;font-weight:600;letter-spacing:0}
.xuBcItem input:not(:placeholder-shown){
    background:linear-gradient(135deg,rgba(5,150,105,.06),rgba(245,158,11,.03));
    border-color:var(--bc-emerald);
    color:var(--bc-emerald);
}
html.xu-dark .xuBcItem input{background:rgba(255,255,255,.05);border-color:rgba(5,150,105,.25);color:#f1f5f9}
html.xu-dark .xuBcItem input:hover{border-color:var(--bc-mint)}
html.xu-dark .xuBcItem input:focus{border-color:var(--bc-gold);background:rgba(255,255,255,.08);box-shadow:0 0 0 4px rgba(245,158,11,.15)}
html.xu-dark .xuBcItem input:not(:placeholder-shown){color:var(--bc-mint);background:rgba(5,150,105,.1);border-color:var(--bc-mint)}

/* ===== FOOT ===== */
.xuBcFoot{
    padding:22px 30px;
    border-top:1.5px dashed rgba(5,150,105,.15);
    background:linear-gradient(135deg,rgba(5,150,105,.03),rgba(245,158,11,.02));
    display:flex;gap:10px;justify-content:flex-end;
    flex-wrap:wrap;align-items:center;
}
html.xu-dark .xuBcFoot{border-top-color:rgba(5,150,105,.25);background:linear-gradient(135deg,rgba(5,150,105,.06),rgba(245,158,11,.03))}

.xuBcInfo{
    margin-right:auto;
    font-size:.8rem;color:var(--bc-muted);
    font-weight:600;
    display:flex;align-items:center;gap:8px;
}
.xuBcInfo i{
    color:var(--bc-gold);
    width:24px;height:24px;border-radius:7px;
    background:rgba(245,158,11,.12);
    border:1px solid rgba(245,158,11,.3);
    display:inline-flex;align-items:center;justify-content:center;
    font-size:.72rem;
}
html.xu-dark .xuBcInfo{color:var(--bc-soft)}

.xuBtnGen{
    display:inline-flex;align-items:center;gap:8px;
    padding:11px 26px;border-radius:12px;
    background:linear-gradient(90deg,var(--bc-emerald),var(--bc-gold));
    color:#fff;border:none;
    font-weight:800;font-size:.88rem;
    letter-spacing:.03em;
    cursor:pointer;transition:.25s;
    box-shadow:0 10px 26px rgba(5,150,105,.35);
    position:relative;overflow:hidden;
    font-family:inherit;
}
.xuBtnGen::before{
    content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;
    background:linear-gradient(100deg,transparent 20%,rgba(255,255,255,.3) 50%,transparent 80%);
    transition:left .6s ease;
}
.xuBtnGen:hover{
    transform:translateY(-2px);
    filter:brightness(1.08);
    box-shadow:0 14px 32px rgba(5,150,105,.45);
}
.xuBtnGen:hover::before{left:120%}

@media(max-width:720px){
    .xuBcHead{padding:18px 20px}
    .xuBcHead h2{font-size:1.15rem}
    .xuBcBody{padding:20px 18px}
    .xuBcFoot{padding:18px;flex-direction:column}
    .xuBcInfo{margin-right:0}
    .xuBtnGen{width:100%;justify-content:center}
}
</style>

<div class="xuBcCard xuR">
    <div class="xuBcHead">
        <h2><i class="fa fa-barcode"></i> Barcode Generator</h2>
    </div>
    <div class="xuBcBody">
        <form action="" class="form" id="frm-barcode">
            <!-- Seksi Ukuran (dengan preview visual) -->
            <div class="xuSizeRow">
                <div>
                    <label for="barcodeSize"><i class="fa fa-expand"></i> Barcode Size</label>
                    <select name="barcodeSize" id="barcodeSize" class="form-control">
                        <option value="1">Big — untuk label besar (cover buku)</option>
                        <option value="2" selected>Medium — ukuran standar</option>
                        <option value="3">Small — untuk label kecil (kaset, kartu)</option>
                    </select>
                </div>
                <div class="xuPreview">
                    <div class="xuPreviewLabel">Preview</div>
                    <div class="xuPreviewBars" id="xuBars"></div>
                    <div class="xuPreviewSize" id="xuSizeLabel">Medium</div>
                </div>
            </div>

            <!-- Tombol Bantu -->
            <div class="xuHelperBar">
                <button type="button" class="xuMiniBtn" onclick="xuFillSeq()">
                    <i class="fa fa-list-ol"></i> Isi Urutan 001–009
                </button>
                <button type="button" class="xuMiniBtn" onclick="xuFillDate()">
                    <i class="fa fa-calendar"></i> Isi dengan Tanggal
                </button>
                <button type="button" class="xuMiniBtn xuMiniWarn" onclick="xuDuplicate()">
                    <i class="fa fa-clone"></i> Duplikat Baris 1 ke Semua
                </button>
                <button type="button" class="xuMiniBtn xuMiniDanger" onclick="xuClearAll()">
                    <i class="fa fa-eraser"></i> Kosongkan Semua
                </button>
            </div>

            <!-- 9 Input Barcode (layout 3 kolom tetap) -->
            <div class="xuBcGrid">
                <?php for ($i = 1; $i <= 9; $i++): ?>
                    <div class="xuBcItem">
                        <label>
                            <span class="xuBcNum"><?= $i ?></span>
                            Barcode <?= $i ?>
                        </label>
                        <input type="text" class="xuBcInput" data-index="<?= $i ?>" placeholder="Ketik kode..." maxlength="40">
                    </div>
                <?php endfor; ?>
            </div>

            <div class="xuBcFoot">
                <span class="xuBcInfo"><i class="fa fa-info-circle"></i> Isilah kode yang ingin dicetak, lalu klik Generate</span>
                <button type="submit" class="xuBtnGen"><i class="fa fa-magic"></i> Generate Barcode</button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function(){
    // ===== Fade-in reveal =====
    var io = new IntersectionObserver(function(es){
        es.forEach(function(en){
            if (en.isIntersecting){ en.target.classList.add('in'); io.unobserve(en.target); }
        });
    }, {threshold:.06});
    document.querySelectorAll('.xuR').forEach(function(el){ io.observe(el); });

    // ===== Preview ukuran barcode dinamis =====
    var sel = document.getElementById('barcodeSize');
    var bars = document.getElementById('xuBars');
    var szl = document.getElementById('xuSizeLabel');

    function updPreview(){
        var v = sel.value;
        var cfg = {
            '1': {n:28, h:36, gap:3, label:'Big'},
            '2': {n:34, h:26, gap:2, label:'Medium'},
            '3': {n:42, h:18, gap:1, label:'Small'}
        }[v];
        bars.innerHTML = '';
        for (var i = 0; i < cfg.n; i++){
            var s = document.createElement('span');
            s.style.width = (i % 3 === 0 ? 2 : 1) * cfg.gap + 1 + 'px';
            s.style.height = cfg.h + 'px';
            bars.appendChild(s);
        }
        szl.textContent = cfg.label;
    }
    sel.addEventListener('change', updPreview);
    updPreview();
});

// ===== Helper functions =====
function xuGetInputs(){ return document.querySelectorAll('.xuBcInput'); }

function xuFillSeq(){
    var inputs = xuGetInputs();
    for (var i = 0; i < inputs.length; i++){
        inputs[i].value = String(i + 1).padStart(3, '0');
        inputs[i].dispatchEvent(new Event('input'));
    }
}

function xuFillDate(){
    var d = new Date();
    var base = d.getFullYear() + String(d.getMonth() + 1).padStart(2, '0') + String(d.getDate()).padStart(2, '0');
    var inputs = xuGetInputs();
    for (var i = 0; i < inputs.length; i++){
        inputs[i].value = base + '-' + String(i + 1).padStart(2, '0');
        inputs[i].dispatchEvent(new Event('input'));
    }
}

function xuDuplicate(){
    var inputs = xuGetInputs();
    var first = inputs[0].value.trim();
    if (!first){ alert('Isi Barcode 1 terlebih dahulu'); return; }
    for (var i = 1; i < inputs.length; i++){
        inputs[i].value = first;
        inputs[i].dispatchEvent(new Event('input'));
    }
}

function xuClearAll(){
    if (!confirm('Kosongkan semua input barcode?')) return;
    xuGetInputs().forEach(function(i){
        i.value = '';
        i.dispatchEvent(new Event('input'));
    });
}
</script>