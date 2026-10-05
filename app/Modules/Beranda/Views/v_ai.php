<style>
/* ================================================================
   RANGKUI AI — EMERALD FOREST EDITION
   ================================================================ */
:root{
    --ai-emerald:#059669; --ai-teal:#0891b2; --ai-gold:#f59e0b;
    --ai-mint:#6ee7b7; --ai-deep:#0a2920; --ai-mid:#064e3b;
    --ai-glass:rgba(10,41,32,.92);
    --ai-txt:#e2e8f0; --ai-mut:#94a3b8;
}

html,body{background:#06181a!important;overflow:hidden!important;margin:0!important}

/* ===== LAPISAN UTAMA (EMERALD GALAXY + BINTANG) ===== */
#xuAiWrap{
    position:fixed;inset:0;z-index:9990;
    display:flex;flex-direction:column;
    background:
        radial-gradient(1px 1px at 12% 22%,rgba(255,255,255,.5) 50%,transparent 51%),
        radial-gradient(1px 1px at 34% 68%,rgba(255,255,255,.35) 50%,transparent 51%),
        radial-gradient(1.5px 1.5px at 58% 14%,rgba(255,255,255,.45) 50%,transparent 51%),
        radial-gradient(1px 1px at 76% 42%,rgba(255,255,255,.3) 50%,transparent 51%),
        radial-gradient(1.5px 1.5px at 88% 78%,rgba(255,255,255,.4) 50%,transparent 51%),
        radial-gradient(1px 1px at 45% 88%,rgba(255,255,255,.3) 50%,transparent 51%),
        radial-gradient(ellipse at 30% 0%,#0a3d2e 0%,#06181a 55%,#040f0c 100%);
}
#xuAiWrap::before{
    content:'';position:absolute;top:0;left:0;right:0;height:2px;z-index:3;
    background:linear-gradient(90deg,transparent,var(--ai-emerald),var(--ai-gold),var(--ai-teal),transparent);
}

/* ===== HEADER ===== */
.xuAiHead{
    padding:14px 24px;
    background:rgba(6,24,26,.88);
    backdrop-filter:blur(16px);-webkit-backdrop-filter:blur(16px);
    border-bottom:1px solid rgba(5,150,105,.22);
    display:flex;align-items:center;gap:14px;z-index:2;
}
.xuAiLogo{
    width:42px;height:42px;border-radius:12px;
    background:linear-gradient(135deg,var(--ai-emerald),var(--ai-gold));
    display:flex;align-items:center;justify-content:center;
    color:#fff;font-size:1.2rem;flex-shrink:0;
    box-shadow:0 6px 18px rgba(5,150,105,.4);
}
.xuAiTitle h1{
    margin:0;font-size:1.05rem;font-weight:900;letter-spacing:.02em;
    font-family:'Neuton',Georgia,serif;
    background:linear-gradient(90deg,var(--ai-gold),var(--ai-mint),var(--ai-teal));
    background-size:200% 100%;
    -webkit-background-clip:text;background-clip:text;color:transparent;
    animation:xuAiGrad 6s linear infinite;
}
@keyframes xuAiGrad{to{background-position:200% 0}}
.xuAiTitle p{margin:1px 0 0;font-size:.72rem;color:var(--ai-mut)}

.xuAiHeadRight{margin-left:auto;display:flex;align-items:center;gap:10px}
.xuAiStatus{
    display:inline-flex;align-items:center;gap:7px;
    padding:6px 14px;border-radius:999px;
    font-size:.68rem;font-weight:800;letter-spacing:.1em;text-transform:uppercase;
}
.xuAiStatus.ok{background:rgba(5,150,105,.12);color:var(--ai-mint);border:1px solid rgba(5,150,105,.35)}
.xuAiStatus.warn{background:rgba(245,158,11,.12);color:var(--ai-gold);border:1px solid rgba(245,158,11,.35)}
.xuAiStatus .dot{width:7px;height:7px;border-radius:50%;background:currentColor;animation:xuAiDot 1.5s ease-in-out infinite}
@keyframes xuAiDot{0%,100%{opacity:1}50%{opacity:.3}}

.xuAiBack{
    display:inline-flex;align-items:center;gap:8px;
    padding:8px 16px;border-radius:10px;
    background:rgba(255,255,255,.05);border:1px solid rgba(255,255,255,.12);
    color:var(--ai-txt);text-decoration:none;font-weight:700;font-size:.8rem;
    transition:.25s;
}
.xuAiBack:hover{background:rgba(5,150,105,.2);border-color:rgba(5,150,105,.5);color:#fff}

/* ===== AREA CHAT ===== */
#xuAiChat{
    flex:1;overflow-y:auto;padding:26px 20px;
    display:flex;flex-direction:column;gap:16px;
    scroll-behavior:smooth;
}
#xuAiChat::-webkit-scrollbar{width:7px}
#xuAiChat::-webkit-scrollbar-track{background:rgba(5,150,105,.05)}
#xuAiChat::-webkit-scrollbar-thumb{background:linear-gradient(180deg,var(--ai-emerald),var(--ai-gold));border-radius:4px}

.xuCol{width:100%;max-width:880px;margin:0 auto;display:flex;flex-direction:column;gap:16px}

.xuMsg{display:flex;gap:12px;animation:xuFadeUp .35s ease}
@keyframes xuFadeUp{from{opacity:0;transform:translateY(10px)}to{opacity:1;transform:none}}
.xuMsg.user{justify-content:flex-end}

.xuAv{
    width:36px;height:36px;border-radius:11px;
    display:flex;align-items:center;justify-content:center;
    font-size:.85rem;flex-shrink:0;color:#fff;
}
.xuMsg.user .xuAv{background:linear-gradient(135deg,#475569,#334155);order:2}
.xuMsg.bot .xuAv{
    background:linear-gradient(135deg,var(--ai-emerald),var(--ai-gold));
    box-shadow:0 4px 14px rgba(5,150,105,.35);
}

.xuBubble{
    padding:13px 17px;border-radius:16px;
    font-size:.9rem;line-height:1.7;
    max-width:640px;word-wrap:break-word;
}
.xuMsg.user .xuBubble{
    background:linear-gradient(135deg,var(--ai-emerald),var(--ai-teal));
    color:#fff;border-top-right-radius:5px;
    box-shadow:0 6px 18px rgba(5,150,105,.3);
}
.xuMsg.bot .xuBubble{
    background:rgba(255,255,255,.05);
    border:1px solid rgba(5,150,105,.22);
    color:var(--ai-txt);border-top-left-radius:5px;
}
.xuBubble strong{color:var(--ai-gold)}
.xuBubble code{
    background:rgba(255,255,255,.08);
    padding:2px 6px;border-radius:5px;
    font-family:'JetBrains Mono','Courier New',monospace;font-size:.82em;
    color:var(--ai-mint);
}
.xuBubble p{margin:0 0 8px}
.xuBubble p:last-child{margin-bottom:0}

.xuDots{display:inline-flex;gap:4px;padding:4px 0}
.xuDots span{
    width:7px;height:7px;border-radius:50%;
    background:var(--ai-gold);
    animation:xuBlink 1.3s infinite both;
}
.xuDots span:nth-child(2){animation-delay:.2s}
.xuDots span:nth-child(3){animation-delay:.4s}
@keyframes xuBlink{0%,80%,100%{opacity:.3;transform:scale(.7)}40%{opacity:1;transform:scale(1)}}

/* Kartu dokumen */
.xuDocs{display:grid;grid-template-columns:repeat(auto-fit,minmax(230px,1fr));gap:10px;margin-top:12px}
.xuDocCard{
    padding:12px 14px;border-radius:12px;
    background:rgba(255,255,255,.04);
    border:1px solid rgba(5,150,105,.25);
    text-decoration:none;color:var(--ai-txt);
    transition:.25s;display:flex;flex-direction:column;gap:7px;
}
.xuDocCard:hover{
    background:rgba(5,150,105,.14);
    border-color:var(--ai-gold);
    transform:translateY(-2px);
    box-shadow:0 10px 24px rgba(5,150,105,.25);
}
.xuDocCard .t{
    font-weight:700;font-size:.8rem;line-height:1.45;color:#fff;
    display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;
}
.xuDocCard .m{font-size:.68rem;color:var(--ai-mut);display:flex;gap:6px;flex-wrap:wrap}
.xuDocCard .chip{padding:2px 9px;border-radius:6px;background:rgba(245,158,11,.14);color:var(--ai-gold);font-weight:700}
.xuDocCard .chip.pink{background:rgba(5,150,105,.14);color:var(--ai-mint)}

/* Saran */
.xuSuggest{display:flex;gap:8px;flex-wrap:wrap;margin-top:12px}
.xuSuggestBtn{
    padding:7px 14px;border-radius:999px;
    background:rgba(255,255,255,.05);
    border:1px solid rgba(5,150,105,.3);
    color:var(--ai-txt);font-size:.76rem;font-weight:600;
    cursor:pointer;transition:.2s;
}
.xuSuggestBtn:hover{
    background:rgba(5,150,105,.2);
    border-color:var(--ai-gold);
    transform:translateY(-1px);
    color:#fff;
}

/* ===== INPUT ===== */
#xuAiInput{
    padding:14px 20px 18px;
    background:rgba(6,24,26,.88);
    backdrop-filter:blur(16px);-webkit-backdrop-filter:blur(16px);
    border-top:1px solid rgba(5,150,105,.22);
    z-index:2;
}
.xuInputCol{max-width:880px;margin:0 auto;display:flex;gap:10px;align-items:flex-end}
.xuInputWrap{
    flex:1;display:flex;padding:11px 16px;
    background:rgba(255,255,255,.05);
    border:1.5px solid rgba(5,150,105,.28);
    border-radius:14px;transition:.25s;
}
.xuInputWrap:focus-within{
    border-color:var(--ai-gold);
    box-shadow:0 0 0 3px rgba(245,158,11,.14);
}
#xuAiText{
    flex:1;background:none;border:none;outline:none;
    color:#fff;font-size:.9rem;font-family:inherit;
    resize:none;max-height:110px;line-height:1.5;
}
#xuAiText::placeholder{color:var(--ai-mut)}

#xuAiSend{
    width:46px;height:46px;border-radius:13px;border:none;
    background:linear-gradient(135deg,var(--ai-emerald),var(--ai-gold));
    color:#fff;font-size:1rem;cursor:pointer;
    display:flex;align-items:center;justify-content:center;
    flex-shrink:0;transition:.25s;
    box-shadow:0 6px 18px rgba(5,150,105,.4);
}
#xuAiSend:hover:not(:disabled){transform:translateY(-2px);filter:brightness(1.1)}
#xuAiSend:disabled{opacity:.5;cursor:not-allowed}

.xuHint{max-width:880px;margin:8px auto 0;font-size:.68rem;color:var(--ai-mut);text-align:center}

/* ===== HERO WELCOME ===== */
.xuHero{
    width:100%;max-width:780px;margin:26px auto 10px;
    text-align:center;position:relative;
    padding:36px 26px 30px;border-radius:24px;
    background:rgba(255,255,255,.03);
    border:1px solid rgba(5,150,105,.22);
    backdrop-filter:blur(8px);-webkit-backdrop-filter:blur(8px);
    overflow:hidden;transition:all .55s ease;
    animation:xuHeroIn .8s cubic-bezier(.2,.8,.2,1);
    z-index:1;max-height:1000px;
}
@keyframes xuHeroIn{from{opacity:0;transform:translateY(28px) scale(.95)}to{opacity:1;transform:none}}
.xuHero.hide{
    opacity:0;transform:scale(.9) translateY(-14px);
    pointer-events:none;max-height:0;padding-top:0;padding-bottom:0;
    margin:0 auto;border-width:0;
}

/* Aurora emerald */
.xuAurora{position:absolute;inset:0;pointer-events:none;filter:blur(48px);opacity:.55}
.xuAurora span{position:absolute;width:240px;height:240px;border-radius:50%}
.xuAurora span:nth-child(1){background:rgba(5,150,105,.5);top:-70px;left:-50px;animation:xuDrift 9s ease-in-out infinite alternate}
.xuAurora span:nth-child(2){background:rgba(245,158,11,.4);bottom:-80px;right:-40px;animation:xuDrift 11s ease-in-out infinite alternate-reverse}
.xuAurora span:nth-child(3){background:rgba(8,145,178,.35);top:28%;right:20%;width:170px;height:170px;animation:xuDrift 7s ease-in-out infinite alternate}
@keyframes xuDrift{from{transform:translate(0,0) scale(1)}to{transform:translate(46px,26px) scale(1.18)}}

.xuHeroOrb{
    width:88px;height:88px;margin:0 auto 20px;border-radius:26px;
    background:linear-gradient(135deg,var(--ai-emerald),var(--ai-gold));
    display:flex;align-items:center;justify-content:center;
    font-size:2.3rem;color:#fff;
    box-shadow:0 16px 44px rgba(5,150,105,.55);
    position:relative;animation:xuFloat 4.5s ease-in-out infinite;z-index:1;
}
.xuHeroOrb::before{
    content:'';position:absolute;inset:-11px;border-radius:34px;
    border:1.5px dashed rgba(5,150,105,.55);
    animation:xuSpinSlow 14s linear infinite;
}
.xuHeroOrb::after{
    content:'';position:absolute;inset:-22px;border-radius:42px;
    border:1px solid rgba(245,158,11,.3);
    animation:xuSpinSlow 20s linear infinite reverse;
}
@keyframes xuFloat{0%,100%{transform:translateY(0)}50%{transform:translateY(-9px)}}
@keyframes xuSpinSlow{to{transform:rotate(360deg)}}

.xuOrbDot{position:absolute;width:9px;height:9px;border-radius:50%;z-index:2}
.xuOrbDot.d1{background:var(--ai-gold);top:-4px;right:10px;animation:xuBlink 2s infinite}
.xuOrbDot.d2{background:var(--ai-teal);bottom:-2px;left:6px;animation:xuBlink 2.6s .4s infinite}
.xuOrbDot.d3{background:var(--ai-mint);top:40%;left:-6px;animation:xuBlink 3s .8s infinite}

.xuHeroTitle{
    margin:0 0 8px;font-size:2.1rem;font-weight:900;
    letter-spacing:.02em;color:#fff;position:relative;z-index:1;
    font-family:'Neuton',Georgia,serif;
}
.xuHeroTitle span{
    background:linear-gradient(90deg,var(--ai-gold),var(--ai-mint),var(--ai-teal),var(--ai-gold));
    background-size:300% 100%;
    -webkit-background-clip:text;background-clip:text;color:transparent;
    animation:xuAiGrad 5s linear infinite;
}

.xuHeroTag{
    min-height:1.5em;margin:0 auto 18px;
    color:var(--ai-mut);font-size:.9rem;
    max-width:560px;position:relative;z-index:1;
}
.xuHeroTag::after{content:'▍';color:var(--ai-mint);animation:xuBlink 1s infinite}

.xuHeroFeats{
    display:flex;justify-content:center;gap:10px;flex-wrap:wrap;
    margin-bottom:18px;position:relative;z-index:1;
}
.xuHeroFeats span{
    display:inline-flex;align-items:center;gap:7px;
    padding:7px 14px;border-radius:999px;
    background:rgba(255,255,255,.05);
    border:1px solid rgba(5,150,105,.28);
    font-size:.75rem;font-weight:700;color:var(--ai-txt);
    animation:xuPopIn .5s cubic-bezier(.2,.9,.3,1.4) both;
}
.xuHeroFeats span i{color:var(--ai-mint)}
.xuHeroFeats span:nth-child(1){animation-delay:.15s}
.xuHeroFeats span:nth-child(2){animation-delay:.3s}
.xuHeroFeats span:nth-child(3){animation-delay:.45s}
.xuHeroFeats span:nth-child(4){animation-delay:.6s}
@keyframes xuPopIn{from{opacity:0;transform:scale(.55)}to{opacity:1;transform:scale(1)}}

.xuHeroAsk{margin:0 0 12px;font-size:.8rem;color:var(--ai-mut);position:relative;z-index:1}
.xuSuggestCenter{justify-content:center}
.xuSuggest .xuSuggestBtn{animation:xuPopIn .5s cubic-bezier(.2,.9,.3,1.4) both}
.xuSuggest .xuSuggestBtn:nth-child(1){animation-delay:.75s}
.xuSuggest .xuSuggestBtn:nth-child(2){animation-delay:.9s}
.xuSuggest .xuSuggestBtn:nth-child(3){animation-delay:1.05s}
.xuSuggest .xuSuggestBtn:nth-child(4){animation-delay:1.2s}

.xuParticle{
    position:absolute;border-radius:50%;
    background:rgba(110,231,183,.4);
    pointer-events:none;z-index:0;
    animation:xuRise linear infinite;
}
@keyframes xuRise{from{transform:translateY(0);opacity:0}12%{opacity:.7}88%{opacity:.4}to{transform:translateY(-110vh);opacity:0}}

@media(max-width:640px){
    .xuAiHead{padding:12px 16px}
    .xuAiTitle p{display:none}
    #xuAiChat{padding:18px 12px}
    .xuHero{padding:26px 16px 22px}
    .xuHeroTitle{font-size:1.6rem}
}
</style>

<div id="xuAiWrap">
    <div class="xuAiHead">
        <div class="xuAiLogo"><i class="fa fa-robot"></i></div>
        <div class="xuAiTitle">
            <h1>RANGKUI AI</h1>
            <p>Asisten cerdas repositori DIFOSS</p>
        </div>
        <div class="xuAiHeadRight">
            <span class="xuAiStatus ok" id="xuModeWrap">
                <span class="dot"></span>
                <span id="xuMode">SIAP</span>
            </span>
            <a href="<?= base_url() ?>" class="xuAiBack"><i class="fa fa-arrow-left"></i> Beranda</a>
        </div>
    </div>

    <div id="xuAiChat">
        <div class="xuCol" id="xuCol">
            <!-- HERO WELCOME -->
            <div class="xuHero" id="xuHero">
                <div class="xuAurora"><span></span><span></span><span></span></div>
                <div class="xuHeroOrb">
                    <i class="fa fa-robot"></i>
                    <span class="xuOrbDot d1"></span>
                    <span class="xuOrbDot d2"></span>
                    <span class="xuOrbDot d3"></span>
                </div>
                <h2 class="xuHeroTitle">RANGKUI <span>AI</span></h2>
                <p class="xuHeroTag" id="xuHeroTag"></p>
                <div class="xuHeroFeats">
                    <span><i class="fa fa-search"></i> Pencarian Cerdas</span>
                    <span><i class="fa fa-file-text-o"></i> Ringkasan Abstrak</span>
                    <span><i class="fa fa-users"></i> Temukan Penulis</span>
                    <span><i class="fa fa-star"></i> Rekomendasi</span>
                </div>
                <p class="xuHeroAsk">Coba ketik pertanyaan, atau klik salah satu saran:</p>
                <div class="xuSuggest xuSuggestCenter" id="xuSuggest">
                    <button class="xuSuggestBtn" data-q="Rekomendasikan karya tentang machine learning">🤖 Machine learning</button>
                    <button class="xuSuggestBtn" data-q="Tesis tentang kesehatan masyarakat">🏥 Kesehatan</button>
                    <button class="xuSuggestBtn" data-q="Ringkasan dokumen terbaru">📚 Dokumen baru</button>
                    <button class="xuSuggestBtn" data-q="Siapa penulis paling produktif?">✍️ Penulis</button>
                </div>
            </div>
        </div>
    </div>

    <div id="xuAiInput">
        <div class="xuInputCol">
            <div class="xuInputWrap">
                <textarea id="xuAiText" rows="1" placeholder="Tanyakan apa saja tentang repositori DIFOSS…" maxlength="500"></textarea>
            </div>
            <button id="xuAiSend" title="Kirim (Enter)"><i class="fa fa-paper-plane"></i></button>
        </div>
        <div class="xuHint">Enter untuk kirim • Shift+Enter baris baru • Maksimal 10 pertanyaan per menit</div>
    </div>
</div>

<script>
(function(){
    var col = document.getElementById('xuCol');
    var chat = document.getElementById('xuAiChat');
    var input = document.getElementById('xuAiText');
    var send = document.getElementById('xuAiSend');
    var modeEl = document.getElementById('xuMode');
    var modeWrap = document.getElementById('xuModeWrap');
    var baseUrl = <?= json_encode(base_url()) ?>;

    // ===== HERO: tagline efek ketik =====
    var tagEl = document.getElementById('xuHeroTag');
    var tagText = 'Asisten cerdas yang membantu Anda menjelajahi ribuan karya ilmiah repositori DIFOSS.';
    (function typeTag(i){
        if (!tagEl) return;
        if (i <= tagText.length) {
            tagEl.textContent = tagText.slice(0, i);
            setTimeout(function(){ typeTag(i + 1); }, 22);
        }
    })(0);

    // ===== Partikel emerald mengambang =====
    (function(){
        var wrap = document.getElementById('xuAiWrap');
        for (var i = 0; i < 18; i++){
            var p = document.createElement('span');
            p.className = 'xuParticle';
            var s = 2 + Math.random() * 3;
            p.style.width = s + 'px';
            p.style.height = s + 'px';
            p.style.left = (Math.random() * 100) + '%';
            p.style.bottom = '-10px';
            p.style.animationDuration = (9 + Math.random() * 14) + 's';
            p.style.animationDelay = (Math.random() * 10) + 's';
            wrap.appendChild(p);
        }
    })();

    function hideHero(){
        var h = document.getElementById('xuHero');
        if (h && !h.classList.contains('hide')) h.classList.add('hide');
    }

    // Auto-resize textarea
    input.addEventListener('input', function(){
        this.style.height = 'auto';
        this.style.height = Math.min(this.scrollHeight, 110) + 'px';
    });

    // Saran klik
    document.getElementById('xuSuggest').addEventListener('click', function(e){
        var btn = e.target.closest('.xuSuggestBtn');
        if (btn){ input.value = btn.getAttribute('data-q'); sendMsg(); }
    });

    // Enter kirim
    input.addEventListener('keydown', function(e){
        if (e.key === 'Enter' && !e.shiftKey){ e.preventDefault(); sendMsg(); }
    });
    send.addEventListener('click', sendMsg);

    function setMode(txt, warn){
        modeEl.textContent = txt;
        modeWrap.className = 'xuAiStatus ' + (warn ? 'warn' : 'ok');
    }

    function addMsg(role, html){
        var m = document.createElement('div');
        m.className = 'xuMsg ' + role;
        var av = role === 'user' ? '👤' : '<i class="fa fa-robot"></i>';
        m.innerHTML = '<div class="xuAv">' + av + '</div><div class="xuBubble"></div>';
        m.querySelector('.xuBubble').innerHTML = html;
        col.appendChild(m);
        chat.scrollTop = chat.scrollHeight;
        return m.querySelector('.xuBubble');
    }

    function esc(s){
        if (s === null || s === undefined) return '';
        return String(s).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
    }

    function renderMarkdown(s){
        s = esc(s).replace(/\*\*([^*]+)\*\*/g, '<strong>$1</strong>').replace(/`([^`]+)`/g, '<code>$1</code>');
        return s.split(/\n\n+/).map(function(p){
            return '<p>' + p.replace(/\n/g, '<br>') + '</p>';
        }).join('');
    }

    function renderDocs(docs){
        if (!docs || !docs.length) return '';
        var h = '<div class="xuDocs">';
        docs.forEach(function(d){
            h += '<a class="xuDocCard" href="' + baseUrl + 'beranda/detail-plain/' + d.biblio_id + '">'
                + '<div class="t">' + esc(d.title) + '</div>'
                + '<div class="m"><span class="chip">' + esc((d.authors || '-').split(',')[0]) + '</span><span class="chip pink">' + esc(d.publish_year || '-') + '</span></div></a>';
        });
        return h + '</div>';
    }

    function typeWriter(el, text, cb){
        var i = 0;
        el.textContent = '';
        (function step(){
            if (i < text.length){
                el.textContent += text.charAt(i++);
                chat.scrollTop = chat.scrollHeight;
                setTimeout(step, 6 + Math.random() * 10);
            } else cb();
        })();
    }

    function sendMsg(){
        var q = input.value.trim();
        if (!q || send.disabled) return;

        addMsg('user', esc(q));
        hideHero();
        input.value = '';
        input.style.height = 'auto';
        send.disabled = true;
        setMode('MEMIKIR…', false);

        var bubble = addMsg('bot', '<div class="xuDots"><span></span><span></span><span></span></div>');

        fetch(baseUrl + 'beranda/ai/chat?q=' + encodeURIComponent(q), {headers: {'Accept': 'application/json'}})
            .then(function(r){
                return r.text().then(function(t){ return {status: r.status, text: t}; });
            })
            .then(function(res){
                send.disabled = false;
                var j = null;
                try { j = JSON.parse(res.text); } catch(e){ j = null; }

                if (!j || typeof j.ok === 'undefined'){
                    bubble.innerHTML = '<p>⚠️ Respons server tidak valid (HTTP ' + res.status + '). Pastikan route GET ai/chat terdaftar di Routes.php.</p>';
                    setMode('ERROR', true);
                    return;
                }
                if (!j.ok){
                    bubble.innerHTML = '<p>⚠️ ' + esc(j.error || 'Terjadi kesalahan.') + '</p>';
                    setMode('SIAP', true);
                    return;
                }

                setMode(j.mode === 'ai' ? 'AI AKTIF' : 'MODE LOKAL', j.mode !== 'ai');
                bubble.innerHTML = '';

                typeWriter(bubble, j.answer || '', function(){
                    bubble.innerHTML = renderMarkdown(j.answer || '') + renderDocs(j.docs);
                    chat.scrollTop = chat.scrollHeight;
                });
            })
            .catch(function(err){
                send.disabled = false;
                bubble.innerHTML = '<p>⚠️ Gagal terhubung ke server: ' + esc(err.message) + '</p>';
                setMode('OFFLINE', true);
            });
    }
})();
</script>