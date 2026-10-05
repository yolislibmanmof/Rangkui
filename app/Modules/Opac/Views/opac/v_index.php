<style>
/* ================================================================
   DIFOSS OPAC — EMERALD FOREST EDITION (FINAL)
   ================================================================ */
:root{
    --xo-emerald:#059669; --xo-teal:#0891b2; --xo-gold:#f59e0b;
    --xo-mint:#6ee7b7; --xo-deep:#0a2920; --xo-mid:#064e3b;
}

.xuR{opacity:0;transform:translateY(26px);transition:all .7s cubic-bezier(.2,.8,.2,1)}
.xuR.in{opacity:1;transform:none}

/* ===== Kartu OPAC ===== */
.xuOpacCard{
    background:#fff;border-radius:24px;
    box-shadow:0 20px 50px rgba(15,23,42,.1);
    overflow:hidden;
    border:1px solid rgba(5,150,105,.18);
}
html.xu-dark .xuOpacCard{background:#0f1e1f;border-color:rgba(5,150,105,.25)}

/* ===== Header ===== */
.xuOpacHead{
    padding:22px 28px;
    background:linear-gradient(90deg,var(--xo-emerald),var(--xo-teal),var(--xo-gold),var(--xo-emerald));
    background-size:200% 100%;
    color:#fff;
    display:flex;align-items:center;justify-content:space-between;
    flex-wrap:wrap;gap:14px;
    animation:xuOpacGrad 7s linear infinite;
    position:relative;overflow:hidden;
}
.xuOpacHead::after{
    content:"";position:absolute;top:-60%;right:-8%;
    width:320px;height:320px;border-radius:50%;
    background:radial-gradient(circle,rgba(245,158,11,.22),transparent 70%);
    pointer-events:none;
}
@keyframes xuOpacGrad{to{background-position:200% 0}}

.xuOpacHead h2{
    margin:0;font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1.4rem;
    display:flex;align-items:center;gap:12px;color:#fff;
    letter-spacing:-.01em;
    position:relative;z-index:2;
}
.xuOpacHead h2 i{
    width:42px;height:42px;border-radius:13px;
    background:rgba(255,255,255,.2);
    backdrop-filter:blur(8px);-webkit-backdrop-filter:blur(8px);
    display:inline-flex;align-items:center;justify-content:center;
    font-size:1.1rem;
    box-shadow:inset 0 1px 0 rgba(255,255,255,.2);
    animation:xuOpacPulse 3s ease-in-out infinite;
}
@keyframes xuOpacPulse{
    0%,100%{box-shadow:inset 0 1px 0 rgba(255,255,255,.2),0 0 0 0 rgba(245,158,11,.4)}
    50%{box-shadow:inset 0 1px 0 rgba(255,255,255,.2),0 0 0 8px rgba(245,158,11,0)}
}
.xuOpacHead h2 small{
    font-family:'Plus Jakarta Sans',sans-serif;
    font-weight:500;opacity:.85;font-size:.82rem;
    letter-spacing:.02em;margin-left:4px;
}

.xuOpacActions{
    display:flex;align-items:center;gap:10px;flex-wrap:wrap;
    position:relative;z-index:2;
}

/* Badge LIVE */
.xuLive{
    display:inline-flex;align-items:center;gap:7px;
    padding:6px 14px;border-radius:999px;
    background:rgba(255,255,255,.18);
    backdrop-filter:blur(8px);-webkit-backdrop-filter:blur(8px);
    font-size:.72rem;font-weight:800;letter-spacing:.12em;text-transform:uppercase;
    border:1px solid rgba(255,255,255,.25);
}
.xuLiveDot{
    width:8px;height:8px;border-radius:50%;
    background:var(--xo-mint);
    box-shadow:0 0 10px var(--xo-mint);
    animation:xuOpacBlink 1.6s infinite;
}
@keyframes xuOpacBlink{0%,100%{opacity:1}50%{opacity:.3}}

/* Tombol aksi */
.xuOpacBtn{
    display:inline-flex;align-items:center;gap:8px;
    padding:8px 16px;border-radius:11px;
    background:rgba(255,255,255,.18);
    backdrop-filter:blur(8px);-webkit-backdrop-filter:blur(8px);
    color:#fff;text-decoration:none;
    font-weight:700;font-size:.83rem;
    transition:.25s;
    border:1px solid rgba(255,255,255,.28);
    cursor:pointer;position:relative;overflow:hidden;
}
.xuOpacBtn::before{
    content:"";position:absolute;top:0;left:-100%;width:100%;height:100%;
    background:linear-gradient(100deg,transparent 20%,rgba(255,255,255,.25) 50%,transparent 80%);
    transition:left .6s ease;
}
.xuOpacBtn:hover{
    background:rgba(255,255,255,.32);
    transform:translateY(-2px);color:#fff;
    box-shadow:0 8px 20px rgba(0,0,0,.15);
    text-decoration:none;
}
.xuOpacBtn:hover::before{left:120%}
.xuOpacBtn i{font-size:.85rem}

/* ===== Toolbar Search ===== */
.xuOpacToolbar{
    padding:18px 24px;
    background:linear-gradient(135deg,rgba(5,150,105,.03),rgba(245,158,11,.02));
    border-bottom:1px solid rgba(5,150,105,.1);
    display:flex;gap:12px;flex-wrap:wrap;align-items:center;
}
html.xu-dark .xuOpacToolbar{
    background:linear-gradient(135deg,rgba(5,150,105,.08),rgba(245,158,11,.04));
    border-bottom-color:rgba(5,150,105,.2);
}

.xuOpacSearch{
    display:flex;align-items:center;gap:10px;
    padding:10px 14px;
    border-radius:14px;
    border:1.5px solid rgba(5,150,105,.2);
    background:#fff;
    flex:1;min-width:260px;
    transition:.25s;
    box-shadow:0 4px 12px rgba(15,23,42,.04);
}
.xuOpacSearch:focus-within{
    border-color:var(--xo-emerald);
    box-shadow:0 0 0 4px rgba(5,150,105,.12),0 4px 12px rgba(15,23,42,.06);
}
html.xu-dark .xuOpacSearch{background:#0a2920;border-color:rgba(5,150,105,.3)}
html.xu-dark .xuOpacSearch:focus-within{
    border-color:var(--xo-gold);
    box-shadow:0 0 0 4px rgba(245,158,11,.15),0 4px 12px rgba(0,0,0,.2);
}

.xuOpacSearch i{
    color:var(--xo-emerald);font-size:1rem;flex-shrink:0;
}
html.xu-dark .xuOpacSearch i{color:var(--xo-gold)}

.xuOpacSearch input{
    flex:1;border:none;outline:none;background:transparent;
    font-weight:600;color:#0f172a;
    font-family:'Plus Jakarta Sans',sans-serif;
    font-size:.88rem;
}
.xuOpacSearch input::placeholder{color:#94a3b8;font-weight:500}
html.xu-dark .xuOpacSearch input{color:#f1f5f9}
html.xu-dark .xuOpacSearch input::placeholder{color:#64748b}

.xuOpacSearch button{
    border:none;border-radius:10px;
    padding:7px 16px;
    background:linear-gradient(90deg,var(--xo-emerald),var(--xo-gold));
    color:#fff;font-weight:800;font-size:.78rem;
    letter-spacing:.03em;
    cursor:pointer;transition:.25s;
    font-family:inherit;
    position:relative;overflow:hidden;
}
.xuOpacSearch button::before{
    content:"";position:absolute;top:0;left:-100%;width:100%;height:100%;
    background:linear-gradient(100deg,transparent 20%,rgba(255,255,255,.28) 50%,transparent 80%);
    transition:left .6s ease;
}
.xuOpacSearch button:hover{
    transform:translateY(-1px);
    filter:brightness(1.08);
    box-shadow:0 6px 14px rgba(5,150,105,.35);
}
.xuOpacSearch button:hover::before{left:120%}

/* Tombol clear search */
.xuClearSearch{
    background:rgba(220,38,38,.1);
    color:var(--xo-deep);
    border:1px solid rgba(220,38,38,.2);
    padding:7px 14px;border-radius:10px;
    font-size:.78rem;font-weight:700;
    cursor:pointer;transition:.25s;
    font-family:inherit;
    display:inline-flex;align-items:center;gap:6px;
}
.xuClearSearch:hover{background:rgba(220,38,38,.15);border-color:rgba(220,38,38,.35)}
html.xu-dark .xuClearSearch{
    background:rgba(220,38,38,.15);color:#fca5a5;
    border-color:rgba(220,38,38,.35);
}

/* Quick link chips */
.xuQuickLinks{
    display:flex;gap:8px;flex-wrap:wrap;align-items:center;
}
.xuQuickLink{
    display:inline-flex;align-items:center;gap:5px;
    padding:6px 12px;border-radius:999px;
    background:rgba(5,150,105,.08);
    border:1px solid rgba(5,150,105,.15);
    color:var(--xo-emerald);
    font-size:.76rem;font-weight:700;
    cursor:pointer;transition:.25s;
    text-decoration:none;
}
.xuQuickLink:hover{
    background:rgba(5,150,105,.14);
    border-color:rgba(5,150,105,.3);
    transform:translateY(-1px);
    color:var(--xo-emerald);text-decoration:none;
}
.xuQuickLink i{font-size:.72rem;color:var(--xo-gold)}
html.xu-dark .xuQuickLink{
    background:rgba(5,150,105,.15);
    border-color:rgba(5,150,105,.25);
    color:var(--xo-mint);
}
html.xu-dark .xuQuickLink:hover{
    background:rgba(5,150,105,.22);
    border-color:rgba(245,158,11,.4);
}

/* ===== Iframe wrapper ===== */
.xuFrameWrap{
    position:relative;margin:0 24px 24px;border-radius:18px;overflow:hidden;
    background:#f1f5f9;
}
html.xu-dark .xuFrameWrap{background:#0a2920}

/* Border gradien beranimasi */
.xuFrameWrap::before{
    content:"";position:absolute;inset:-2px;border-radius:20px;
    background:linear-gradient(120deg,var(--xo-emerald),var(--xo-gold),var(--xo-teal),var(--xo-emerald));
    background-size:300% 300%;z-index:0;
    animation:xuOpacBorder 6s linear infinite;
}
@keyframes xuOpacBorder{to{background-position:300% 0}}

.xuFrameInner{
    position:relative;z-index:1;border-radius:18px;overflow:hidden;
    background:#f8fafc;
}
html.xu-dark .xuFrameInner{background:#06181a}

.iframe-opac{width:100%;height:72vh;border:0;display:block;background:#fff}
html.xu-dark .iframe-opac{background:#0a2920}

/* Fullscreen mode */
.xuFrameWrap:fullscreen,
.xuFrameWrap:-webkit-full-screen{
    margin:0;border-radius:0;background:#0a2920;
}
.xuFrameWrap:fullscreen::before,
.xuFrameWrap:-webkit-full-screen::before{
    inset:0;border-radius:0;
}
.xuFrameWrap:fullscreen .xuFrameInner,
.xuFrameWrap:-webkit-full-screen .xuFrameInner{border-radius:0}
.xuFrameWrap:fullscreen .iframe-opac,
.xuFrameWrap:-webkit-full-screen .iframe-opac{height:100vh}

/* ===== Progress bar ===== */
#xuBar{
    position:absolute;top:0;left:0;height:3px;width:0;
    background:linear-gradient(90deg,var(--xo-mint),var(--xo-emerald),var(--xo-gold));
    z-index:5;
    box-shadow:0 0 12px rgba(5,150,105,.5);
    transition:width .3s ease;
}

/* ===== Loading overlay ===== */
.xuLoading{
    position:absolute;inset:0;z-index:4;
    display:flex;flex-direction:column;align-items:center;justify-content:center;
    background:#f8fafc;gap:16px;
    transition:opacity .5s;
}
html.xu-dark .xuLoading{background:#06181a}

.xuSpinner{
    width:48px;height:48px;border-radius:50%;
    border:4px solid rgba(5,150,105,.15);
    border-top-color:var(--xo-emerald);
    border-right-color:var(--xo-gold);
    animation:xuOpacSpin 1s linear infinite;
}
@keyframes xuOpacSpin{to{transform:rotate(360deg)}}

.xuLoadingText{
    font-family:'Plus Jakarta Sans',sans-serif;
    font-weight:800;font-size:.85rem;
    letter-spacing:.04em;
    color:var(--xo-emerald);
    display:flex;align-items:center;gap:8px;
}
html.xu-dark .xuLoadingText{color:var(--xo-mint)}
.xuLoadingText::before{
    content:"";width:6px;height:6px;border-radius:50%;
    background:var(--xo-gold);box-shadow:0 0 8px var(--xo-gold);
    animation:xuOpacBlink 1.2s infinite;
}

/* ===== Status bar info ===== */
.xuStatusBar{
    padding:8px 24px 12px;
    display:flex;align-items:center;justify-content:space-between;
    font-size:.75rem;font-weight:600;
    color:#64748b;
    font-family:'JetBrains Mono',monospace;
}
.xuStatusBar b{color:var(--xo-emerald);font-weight:800}
html.xu-dark .xuStatusBar{color:var(--xo-soft)}
html.xu-dark .xuStatusBar b{color:var(--xo-mint)}

/* ===== Responsif ===== */
@media(max-width:640px){
    .xuOpacHead{padding:18px 20px;gap:10px}
    .xuOpacHead h2{font-size:1.15rem}
    .xuOpacHead h2 small{display:none}
    .xuOpacHead h2 i{width:36px;height:36px;font-size:.95rem}
    .xuLive,.xuOpacBtn{padding:6px 12px;font-size:.72rem}
    .xuOpacToolbar{padding:14px 16px;gap:8px}
    .xuOpacSearch{min-width:100%;padding:8px 12px}
    .xuFrameWrap{margin:0 16px 16px}
    .iframe-opac{height:65vh}
    .xuStatusBar{padding:6px 16px 10px;font-size:.7rem}
    .xuQuickLinks{width:100%}
}
</style>

<div class="xuOpacCard xuR">
    <div class="xuOpacHead">
        <h2>
            <i class="fa fa-globe"></i>
            OPAC <small>Open Public Access Catalogue</small>
        </h2>
        <div class="xuOpacActions">
            <span class="xuLive"><span class="xuLiveDot"></span> LIVE</span>
            <a href="javascript:void(0)" onclick="xuReload()" class="xuOpacBtn">
                <i class="fa fa-refresh"></i> Muat Ulang
            </a>
            <a href="javascript:void(0)" onclick="xuFullscreen()" class="xuOpacBtn">
                <i class="fa fa-expand"></i> Fullscreen
            </a>
            <a href="<?= base_url() ?>" target="_blank" class="xuOpacBtn">
                <i class="fa fa-external-link"></i> Tab Baru
            </a>
        </div>
    </div>

    <!-- Toolbar Search & Quick Links -->
    <div class="xuOpacToolbar">
        <div class="xuOpacSearch">
            <i class="fa fa-search"></i>
            <input type="text" id="xuOpacKeyword" 
                   placeholder="Cari judul, pengarang, ISBN, atau subjek koleksi..."
                   autocomplete="off">
            <button type="button" onclick="xuSearchOpac()">
                <i class="fa fa-search"></i> Cari
            </button>
        </div>
        <div class="xuQuickLinks">
            <span class="xuQuickLink" onclick="xuQuickSearch('populer')">
                <i class="fa fa-fire"></i> Populer
            </span>
            <span class="xuQuickLink" onclick="xuQuickSearch('baru')">
                <i class="fa fa-star"></i> Terbaru
            </span>
            <span class="xuQuickLink" onclick="xuQuickSearch('')">
                <i class="fa fa-list"></i> Semua
            </span>
        </div>
    </div>

    <div class="x_content" style="padding:0">
        <div class="xuFrameWrap" id="xuFrameWrap">
            <div id="xuBar"></div>
            <div class="xuLoading" id="xuLoading">
                <div class="xuSpinner"></div>
                <div class="xuLoadingText">Memuat katalog publik</div>
            </div>
            <div class="xuFrameInner">
                <iframe src="<?= base_url() ?>" frameborder="0" class="iframe-opac" id="xuFrame"></iframe>
            </div>
        </div>
        <div class="xuStatusBar">
            <span>
                <i class="fa fa-clock-o"></i>
                <span id="xuStatusText">Katalog siap</span>
            </span>
            <span>
                URL: <b id="xuCurrentUrl"><?= base_url() ?></b>
            </span>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function(){
    // ===== Fade-in saat scroll =====
    var io = new IntersectionObserver(function(es){
        es.forEach(function(en){
            if (en.isIntersecting){
                en.target.classList.add('in');
                io.unobserve(en.target);
            }
        });
    }, {threshold: .08});
    document.querySelectorAll('.xuR').forEach(function(el){ io.observe(el); });

    // ===== Referensi elemen =====
    var fr = document.getElementById('xuFrame');
    var bar = document.getElementById('xuBar');
    var ld = document.getElementById('xuLoading');
    var statusText = document.getElementById('xuStatusText');
    var currentUrl = document.getElementById('xuCurrentUrl');
    var keywordInput = document.getElementById('xuOpacKeyword');

    // ===== Loading handlers =====
    function startLoad(msg){
        if (bar){ bar.style.width = '15%'; bar.style.opacity = '1'; }
        if (ld){ ld.style.opacity = '1'; ld.style.pointerEvents = 'auto'; }
        if (statusText){ statusText.textContent = msg || 'Memuat...'; }
    }
    function doneLoad(){
        if (bar){ bar.style.width = '100%'; setTimeout(function(){ bar.style.opacity = '0'; }, 400); }
        if (ld){ ld.style.opacity = '0'; ld.style.pointerEvents = 'none'; }
        setTimeout(function(){
            if (bar){ bar.style.width = '0'; bar.style.opacity = '1'; }
        }, 900);
        if (statusText){ statusText.textContent = 'Katalog siap'; }
    }

    if (fr){
        startLoad('Memuat katalog publik');
        fr.addEventListener('load', doneLoad);
    }

    // ===== Reload iframe =====
    window.xuReload = function(){
        startLoad('Memuat ulang...');
        try{ fr.contentWindow.location.reload(); }
        catch(e){ fr.src = fr.src; }
    };

    // ===== Fullscreen =====
    window.xuFullscreen = function(){
        var wrap = document.getElementById('xuFrameWrap');
        if (!wrap) return;

        if (!document.fullscreenElement && !document.webkitFullscreenElement){
            if (wrap.requestFullscreen) wrap.requestFullscreen();
            else if (wrap.webkitRequestFullscreen) wrap.webkitRequestFullscreen();
            else if (wrap.msRequestFullscreen) wrap.msRequestFullscreen();
            if (statusText) statusText.textContent = 'Mode layar penuh';
        } else {
            if (document.exitFullscreen) document.exitFullscreen();
            else if (document.webkitExitFullscreen) document.webkitExitFullscreen();
        }
    };

    // ===== Search di OPAC =====
    window.xuSearchOpac = function(){
        var q = (keywordInput.value || '').trim();
        if (!q){
            keywordInput.focus();
            return;
        }
        startLoad('Mencari: ' + q);
        var url = "<?= base_url() ?>index.php?keywords=" + encodeURIComponent(q);
        fr.src = url;
        if (currentUrl) currentUrl.textContent = url;
    };

    // ===== Quick search (populer/baru/semua) =====
    window.xuQuickSearch = function(type){
        startLoad('Memuat: ' + type);
        var url = "<?= base_url() ?>index.php";
        if (type === 'populer'){
            url += "?keywords=populer";
            keywordInput.value = 'populer';
        } else if (type === 'baru'){
            url += "?keywords=baru";
            keywordInput.value = 'baru';
        } else {
            url += "?keywords=";
            keywordInput.value = '';
        }
        fr.src = url;
        if (currentUrl) currentUrl.textContent = url;
    };

    // ===== Enter key untuk search =====
    if (keywordInput){
        keywordInput.addEventListener('keydown', function(e){
            if (e.key === 'Enter'){
                e.preventDefault();
                window.xuSearchOpac();
            }
        });
    }

    // ===== Shortcut keyboard =====
    document.addEventListener('keydown', function(e){
        // Ctrl+K atau Cmd+K = fokus ke search
        if ((e.ctrlKey || e.metaKey) && e.key === 'k'){
            e.preventDefault();
            if (keywordInput) keywordInput.focus();
        }
        // F11 = fullscreen
        if (e.key === 'F11' && !e.ctrlKey){
            e.preventDefault();
            window.xuFullscreen();
        }
        // Ctrl+R = reload iframe (bukan page)
        if ((e.ctrlKey || e.metaKey) && e.key === 'r'){
            e.preventDefault();
            window.xuReload();
        }
    });

    // ===== Status bar saat fullscreen =====
    document.addEventListener('fullscreenchange', function(){
        if (!document.fullscreenElement){
            if (statusText) statusText.textContent = 'Katalog siap';
        }
    });
});
</script>
