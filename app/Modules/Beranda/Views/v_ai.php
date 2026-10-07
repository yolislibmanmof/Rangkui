<style>
:root{
    --ai-emerald:#059669; --ai-teal:#0891b2; --ai-gold:#f59e0b;
    --ai-mint:#6ee7b7; --ai-deep:#0a2920; --ai-mid:#064e3b;
    --ai-txt:#e2e8f0; --ai-mut:#94a3b8;
}
html,body{background:#06181a!important;overflow:hidden!important;margin:0!important}
#xuAiWrap{
    position:fixed;inset:0;z-index:9990;display:flex;flex-direction:column;
    background:
        radial-gradient(1px 1px at 12% 22%,rgba(255,255,255,.5) 50%,transparent 51%),
        radial-gradient(1px 1px at 34% 68%,rgba(255,255,255,.35) 50%,transparent 51%),
        radial-gradient(1.5px 1.5px at 58% 14%,rgba(255,255,255,.45) 50%,transparent 51%),
        radial-gradient(ellipse at 30% 0%,#0a3d2e 0%,#06181a 55%,#040f0c 100%);
}
#xuAiWrap::before{content:'';position:absolute;top:0;left:0;right:0;height:2px;z-index:3;background:linear-gradient(90deg,transparent,var(--ai-emerald),var(--ai-gold),var(--ai-teal),transparent)}
.xuAiHead{padding:14px 24px;background:rgba(6,24,26,.88);backdrop-filter:blur(16px);border-bottom:1px solid rgba(5,150,105,.22);display:flex;align-items:center;gap:14px;z-index:2}
.xuAiLogo{width:42px;height:42px;border-radius:12px;background:linear-gradient(135deg,var(--ai-emerald),var(--ai-gold));display:flex;align-items:center;justify-content:center;color:#fff;font-size:1.2rem;box-shadow:0 6px 18px rgba(5,150,105,.4)}
.xuAiTitle h1{margin:0;font-size:1.05rem;font-weight:900;font-family:'Neuton',Georgia,serif;background:linear-gradient(90deg,var(--ai-gold),var(--ai-mint),var(--ai-teal));background-size:200% 100%;-webkit-background-clip:text;background-clip:text;color:transparent;animation:xuAiGrad 6s linear infinite}
@keyframes xuAiGrad{to{background-position:200% 0}}
.xuAiTitle p{margin:1px 0 0;font-size:.72rem;color:var(--ai-mut)}
.xuAiHeadRight{margin-left:auto;display:flex;align-items:center;gap:10px}
.xuAiStatus{display:inline-flex;align-items:center;gap:7px;padding:6px 14px;border-radius:999px;font-size:.68rem;font-weight:800;letter-spacing:.1em;text-transform:uppercase}
.xuAiStatus.ok{background:rgba(5,150,105,.12);color:var(--ai-mint);border:1px solid rgba(5,150,105,.35)}
.xuAiStatus.warn{background:rgba(245,158,11,.12);color:var(--ai-gold);border:1px solid rgba(245,158,11,.35)}
.xuAiStatus .dot{width:7px;height:7px;border-radius:50%;background:currentColor;animation:xuAiDot 1.5s ease-in-out infinite}
@keyframes xuAiDot{0%,100%{opacity:1}50%{opacity:.3}}
.xuAiBack{display:inline-flex;align-items:center;gap:8px;padding:8px 16px;border-radius:10px;background:rgba(255,255,255,.05);border:1px solid rgba(255,255,255,.12);color:var(--ai-txt);text-decoration:none;font-weight:700;font-size:.8rem;transition:.25s}
.xuAiBack:hover{background:rgba(5,150,105,.2);border-color:rgba(5,150,105,.5);color:#fff}
#xuAiChat{flex:1;overflow-y:auto;padding:26px 20px;display:flex;flex-direction:column;gap:16px;scroll-behavior:smooth}
#xuAiChat::-webkit-scrollbar{width:7px}
#xuAiChat::-webkit-scrollbar-thumb{background:linear-gradient(180deg,var(--ai-emerald),var(--ai-gold));border-radius:4px}
.xuCol{width:100%;max-width:880px;margin:0 auto;display:flex;flex-direction:column;gap:16px}
.xuMsg{display:flex;gap:12px;animation:xuFadeUp .35s ease}
@keyframes xuFadeUp{from{opacity:0;transform:translateY(10px)}to{opacity:1;transform:none}}
.xuMsg.user{justify-content:flex-end}
.xuAv{width:36px;height:36px;border-radius:11px;display:flex;align-items:center;justify-content:center;font-size:.85rem;color:#fff}
.xuMsg.user .xuAv{background:linear-gradient(135deg,#475569,#334155);order:2}
.xuMsg.bot .xuAv{background:linear-gradient(135deg,var(--ai-emerald),var(--ai-gold));box-shadow:0 4px 14px rgba(5,150,105,.35)}
.xuBubble{padding:13px 17px;border-radius:16px;font-size:.9rem;line-height:1.7;max-width:680px;word-wrap:break-word}
.xuMsg.user .xuBubble{background:linear-gradient(135deg,var(--ai-emerald),var(--ai-teal));color:#fff;border-top-right-radius:5px;box-shadow:0 6px 18px rgba(5,150,105,.3)}
.xuMsg.bot .xuBubble{background:rgba(255,255,255,.05);border:1px solid rgba(5,150,105,.22);color:var(--ai-txt);border-top-left-radius:5px}
.xuBubble strong{color:var(--ai-gold)}
.xuBubble p{margin:0 0 10px}
.xuBubble p:last-child{margin-bottom:0}
.xuDots{display:inline-flex;gap:4px;padding:4px 0}
.xuDots span{width:7px;height:7px;border-radius:50%;background:var(--ai-gold);animation:xuBlink 1.3s infinite both}
.xuDots span:nth-child(2){animation-delay:.2s}
.xuDots span:nth-child(3){animation-delay:.4s}
@keyframes xuBlink{0%,80%,100%{opacity:.3;transform:scale(.7)}40%{opacity:1;transform:scale(1)}}
.xuDocs{display:grid;grid-template-columns:repeat(auto-fit,minmax(230px,1fr));gap:10px;margin-top:12px}
.xuDocCard{padding:12px 14px;border-radius:12px;background:rgba(255,255,255,.04);border:1px solid rgba(5,150,105,.25);text-decoration:none;color:var(--ai-txt);transition:.25s;display:flex;flex-direction:column;gap:7px}
.xuDocCard:hover{background:rgba(5,150,105,.14);border-color:var(--ai-gold);transform:translateY(-2px);box-shadow:0 10px 24px rgba(5,150,105,.25)}
.xuDocCard .t{font-weight:700;font-size:.8rem;line-height:1.45;color:#fff;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden}
.xuDocCard .m{font-size:.68rem;color:var(--ai-mut);display:flex;gap:6px;flex-wrap:wrap}
.xuDocCard .chip{padding:2px 9px;border-radius:6px;background:rgba(245,158,11,.14);color:var(--ai-gold);font-weight:700}
.xuDocCard .chip.pink{background:rgba(5,150,105,.14);color:var(--ai-mint)}
.xuSuggest{display:flex;gap:8px;flex-wrap:wrap;margin-top:12px}
.xuSuggestBtn{padding:7px 14px;border-radius:999px;background:rgba(255,255,255,.05);border:1px solid rgba(5,150,105,.3);color:var(--ai-txt);font-size:.76rem;font-weight:600;cursor:pointer;transition:.2s}
.xuSuggestBtn:hover{background:rgba(5,150,105,.2);border-color:var(--ai-gold);transform:translateY(-1px);color:#fff}
#xuAiInput{padding:14px 20px 18px;background:rgba(6,24,26,.88);backdrop-filter:blur(16px);border-top:1px solid rgba(5,150,105,.22);z-index:2}
.xuInputCol{max-width:880px;margin:0 auto;display:flex;gap:10px;align-items:flex-end}
.xuInputWrap{flex:1;display:flex;padding:11px 16px;background:rgba(255,255,255,.05);border:1.5px solid rgba(5,150,105,.28);border-radius:14px;transition:.25s}
.xuInputWrap:focus-within{border-color:var(--ai-gold);box-shadow:0 0 0 3px rgba(245,158,11,.14)}
#xuAiText{flex:1;background:none;border:none;outline:none;color:#fff;font-size:.9rem;font-family:inherit;resize:none;max-height:110px;line-height:1.5}
#xuAiText::placeholder{color:var(--ai-mut)}
#xuAiSend{width:46px;height:46px;border-radius:13px;border:none;background:linear-gradient(135deg,var(--ai-emerald),var(--ai-gold));color:#fff;font-size:1rem;cursor:pointer;display:flex;align-items:center;justify-content:center;box-shadow:0 6px 18px rgba(5,150,105,.4)}
#xuAiSend:hover:not(:disabled){transform:translateY(-2px);filter:brightness(1.1)}
#xuAiSend:disabled{opacity:.5;cursor:not-allowed}
.xuHint{max-width:880px;margin:8px auto 0;font-size:.68rem;color:var(--ai-mut);text-align:center}
.xuHero{width:100%;max-width:780px;margin:26px auto 10px;text-align:center;padding:36px 26px 30px;border-radius:24px;background:rgba(255,255,255,.03);border:1px solid rgba(5,150,105,.22);backdrop-filter:blur(8px);overflow:hidden;animation:xuHeroIn .8s cubic-bezier(.2,.8,.2,1);z-index:1;max-height:1000px;transition:all .55s ease}
@keyframes xuHeroIn{from{opacity:0;transform:translateY(28px) scale(.95)}to{opacity:1;transform:none}}
.xuHero.hide{opacity:0;transform:scale(.9) translateY(-14px);pointer-events:none;max-height:0;padding:0;margin:0;border-width:0}
.xuAurora{position:absolute;inset:0;pointer-events:none;filter:blur(48px);opacity:.55}
.xuAurora span{position:absolute;width:240px;height:240px;border-radius:50%}
.xuAurora span:nth-child(1){background:rgba(5,150,105,.5);top:-70px;left:-50px;animation:xuDrift 9s ease-in-out infinite alternate}
.xuAurora span:nth-child(2){background:rgba(245,158,11,.4);bottom:-80px;right:-40px;animation:xuDrift 11s ease-in-out infinite alternate-reverse}
.xuAurora span:nth-child(3){background:rgba(8,145,178,.35);top:28%;right:20%;width:170px;height:170px;animation:xuDrift 7s ease-in-out infinite alternate}
@keyframes xuDrift{from{transform:translate(0,0) scale(1)}to{transform:translate(46px,26px) scale(1.18)}}
.xuHeroOrb{width:88px;height:88px;margin:0 auto 20px;border-radius:26px;background:linear-gradient(135deg,var(--ai-emerald),var(--ai-gold));display:flex;align-items:center;justify-content:center;font-size:2.3rem;color:#fff;box-shadow:0 16px 44px rgba(5,150,105,.55);position:relative;animation:xuFloat 4.5s ease-in-out infinite;z-index:1}
.xuHeroOrb::before{content:'';position:absolute;inset:-11px;border-radius:34px;border:1.5px dashed rgba(5,150,105,.55);animation:xuSpinSlow 14s linear infinite}
@keyframes xuFloat{0%,100%{transform:translateY(0)}50%{transform:translateY(-9px)}}
@keyframes xuSpinSlow{to{transform:rotate(360deg)}}
.xuOrbDot{position:absolute;width:9px;height:9px;border-radius:50%;z-index:2}
.xuOrbDot.d1{background:var(--ai-gold);top:-4px;right:10px;animation:xuBlink 2s infinite}
.xuOrbDot.d2{background:var(--ai-teal);bottom:-2px;left:6px;animation:xuBlink 2.6s .4s infinite}
.xuOrbDot.d3{background:var(--ai-mint);top:40%;left:-6px;animation:xuBlink 3s .8s infinite}
.xuHeroTitle{margin:0 0 8px;font-size:2.1rem;font-weight:900;color:#fff;position:relative;z-index:1;font-family:'Neuton',Georgia,serif}
.xuHeroTitle span{background:linear-gradient(90deg,var(--ai-gold),var(--ai-mint),var(--ai-teal),var(--ai-gold));background-size:300% 100%;-webkit-background-clip:text;background-clip:text;color:transparent;animation:xuAiGrad 5s linear infinite}
.xuHeroTag{min-height:1.5em;margin:0 auto 18px;color:var(--ai-mut);font-size:.9rem;max-width:560px;position:relative;z-index:1}
.xuHeroTag::after{content:'▍';color:var(--ai-mint);animation:xuBlink 1s infinite}
.xuHeroFeats{display:flex;justify-content:center;gap:10px;flex-wrap:wrap;margin-bottom:18px;position:relative;z-index:1}
.xuHeroFeats span{display:inline-flex;align-items:center;gap:7px;padding:7px 14px;border-radius:999px;background:rgba(255,255,255,.05);border:1px solid rgba(5,150,105,.28);font-size:.75rem;font-weight:700;color:var(--ai-txt)}
.xuHeroFeats span i{color:var(--ai-mint)}
.xuHeroAsk{margin:0 0 12px;font-size:.8rem;color:var(--ai-mut);position:relative;z-index:1}
.xuSuggestCenter{justify-content:center}
.xuParticle{position:absolute;border-radius:50%;background:rgba(110,231,183,.4);pointer-events:none;z-index:0;animation:xuRise linear infinite}
@keyframes xuRise{from{transform:translateY(0);opacity:0}12%{opacity:.7}88%{opacity:.4}to{transform:translateY(-110vh);opacity:0}}

/* ===== ROUTE BADGE ===== */
.xuRouteBadge{display:inline-flex;align-items:center;gap:6px;padding:4px 12px;border-radius:999px;font-size:.65rem;font-weight:800;letter-spacing:.12em;text-transform:uppercase;margin-bottom:10px;font-family:'JetBrains Mono',monospace}

/* ===== HEADINGS in bubble ===== */
.xuBubble h2.xuH2{font-size:1.15rem;color:#6ee7b7;margin:14px 0 8px;font-family:'Neuton',Georgia,serif}
.xuBubble h3.xuH3{font-size:1.02rem;color:#fbbf24;margin:12px 0 6px;font-family:'Neuton',Georgia,serif}
.xuBubble h4.xuH4{font-size:.92rem;color:#f59e0b;margin:10px 0 5px;font-weight:700}

/* ===== CODE BLOCKS ===== */
.xuCodeBlock{margin:10px 0;border-radius:10px;overflow:hidden;background:#0a1628;border:1px solid rgba(5,150,105,.3);box-shadow:0 4px 14px rgba(0,0,0,.3)}
.xuCodeHead{padding:5px 12px;background:linear-gradient(90deg,rgba(5,150,105,.15),rgba(245,158,11,.08));border-bottom:1px solid rgba(5,150,105,.25);font-family:'JetBrains Mono',monospace;font-size:.68rem;font-weight:700;color:#6ee7b7;text-transform:uppercase;letter-spacing:.1em}
.xuCode{display:block;padding:14px 16px;font-family:'JetBrains Mono',monospace;font-size:.82rem;line-height:1.6;color:#e2e8f0;white-space:pre-wrap;word-break:break-word;overflow-x:auto}
.xuInlineCode{background:rgba(245,158,11,.15);color:#fbbf24;padding:2px 7px;border-radius:5px;font-family:'JetBrains Mono',monospace;font-size:.82em;border:1px solid rgba(245,158,11,.25)}

/* ===== BLOCKQUOTE ===== */
.xuQuote{margin:10px 0;padding:10px 16px;border-left:3px solid #f59e0b;background:rgba(245,158,11,.08);border-radius:0 8px 8px 0;font-style:italic;color:#fde68a}

/* ===== LISTS ===== */
.xuUl,.xuOl{margin:8px 0 8px 20px;padding:0}
.xuUl li,.xuOl li{margin:4px 0;line-height:1.6}

/* ===== HR ===== */
.xuHr{border:none;border-top:1px dashed rgba(5,150,105,.3);margin:14px 0}

/* ===== CITATION ===== */
.xuCit{display:inline-flex;align-items:center;justify-content:center;min-width:22px;height:22px;padding:0 6px;background:rgba(245,158,11,.2);color:#f59e0b;border:1px solid rgba(245,158,11,.4);border-radius:6px;font-size:.72rem;font-weight:800;text-decoration:none;margin:0 2px;transition:.2s;font-family:'JetBrains Mono',monospace}
.xuCit:hover{background:#f59e0b;color:#0a2920;transform:translateY(-1px);box-shadow:0 4px 10px rgba(245,158,11,.4)}

/* ================================================================
   KETERBACAAN JAWABAN — KONTRAS TINGGI (menimpa warna gelap layout)
   ================================================================ */

/* Bubble bot: background sedikit lebih terang + teks dasar putih keperakan */
.xuMsg.bot .xuBubble{
    background:rgba(16,38,42,.94) !important;
    border:1px solid rgba(110,231,183,.35) !important;
    color:#eef4fb !important;
    box-shadow:0 10px 30px rgba(0,0,0,.45);
}

/* PAKSA semua elemen teks di dalam bubble menjadi terang */
.xuMsg.bot .xuBubble p,
.xuMsg.bot .xuBubble li,
.xuMsg.bot .xuBubble ul li,
.xuMsg.bot .xuBubble ol li,
.xuMsg.bot .xuBubble blockquote,
.xuMsg.bot .xuBubble span:not(.xuRouteBadge):not(.xuCodeHead),
.xuMsg.bot .xuBubble div:not(.xuCodeHead):not(.xuDocs):not(.xuDocCard):not(.xuSuggest){
    color:#e9f0f8 !important;
}

/* Aksen warna yang tetap hidup di mode gelap */
.xuMsg.bot .xuBubble strong{color:#ffd166 !important;}          /* bold = emas terang */
.xuMsg.bot .xuBubble em{color:#9be8c8 !important;}              /* italic = mint */
.xuMsg.bot .xuBubble h2.xuH2,
.xuMsg.bot .xuBubble h3.xuH3,
.xuMsg.bot .xuBubble h4.xuH4{color:#7ef0c0 !important;}         /* heading = hijau neon */
.xuMsg.bot .xuBubble a:not(.xuDocCard):not(.xuSuggestBtn){color:#6ee7b7 !important;text-decoration:underline;}

/* Inline code & blockquote */
.xuMsg.bot .xuBubble .xuInlineCode{
    background:rgba(245,158,11,.18) !important;
    color:#ffd166 !important;
    border:1px solid rgba(245,158,11,.45) !important;
}
.xuMsg.bot .xuBubble .xuQuote{
    background:rgba(245,158,11,.10) !important;
    color:#ffe3a3 !important;
    border-left:3px solid #f59e0b !important;
}

/* Code block: teks kode putih bersih */
.xuMsg.bot .xuBubble .xuCode{color:#eaf2fc !important;}
.xuMsg.bot .xuBubble .xuCodeHead{color:#8be9c4 !important;}

/* Sitasi [1] tetap emas kontras */
.xuMsg.bot .xuBubble .xuCit{color:#f59e0b !important;background:rgba(245,158,11,.16) !important;}

/* Ukuran font sedikit dinaikkan untuk kenyamanan baca */
.xuMsg.bot .xuBubble{font-size:.92rem !important;line-height:1.75 !important;}

/* Bubble user tetap gradien emerald dengan teks putih */
.xuMsg.user .xuBubble,
.xuMsg.user .xuBubble p{color:#ffffff !important;}

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
            <p>Hybrid Intelligence — repositori & pengetahuan universal</p>
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
                    <span><i class="fa fa-code"></i> Coding & Matematika</span>
                    <span><i class="fa fa-globe"></i> Pengetahuan Umum</span>
                    <span><i class="fa fa-star"></i> Sitasi Akademik</span>
                </div>
                <p class="xuHeroAsk">Coba ketik pertanyaan apa saja — repositori, coding, sains, atau filsafat:</p>
                <div class="xuSuggest xuSuggestCenter" id="xuSuggest">
                    <button class="xuSuggestBtn" data-q="Rekomendasikan karya tentang machine learning">🤖 ML di repositori</button>
                    <button class="xuSuggestBtn" data-q="Jelaskan quantum computing untuk pemula">⚛️ Quantum</button>
                    <button class="xuSuggestBtn" data-q="Tulis kode Python bubble sort">💻 Coding</button>
                    <button class="xuSuggestBtn" data-q="Siapa penulis paling produktif di repositori?">📊 Statistik</button>
                </div>
            </div>
        </div>
    </div>

    <div id="xuAiInput">
        <div class="xuInputCol">
            <div class="xuInputWrap">
                <textarea id="xuAiText" rows="1" placeholder="Tanyakan apa saja — repositori, coding, sains, filsafat…" maxlength="1200"></textarea>
            </div>
            <button id="xuAiSend" title="Kirim (Enter)"><i class="fa fa-paper-plane"></i></button>
        </div>
        <div class="xuHint">Enter kirim • Shift+Enter baris baru • Max 1200 karakter • 20 pertanyaan/menit</div>
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
    var currentDocs = [];

    // Hero typing
    var tagEl = document.getElementById('xuHeroTag');
    var tagText = 'Asisten riset hybrid — cerdas menjelajahi repositori, menjawab coding, sains, hingga filsafat.';
    (function typeTag(i){
        if (!tagEl) return;
        if (i <= tagText.length) {
            tagEl.textContent = tagText.slice(0, i);
            setTimeout(function(){ typeTag(i + 1); }, 22);
        }
    })(0);

    // Particles
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

    input.addEventListener('input', function(){
        this.style.height = 'auto';
        this.style.height = Math.min(this.scrollHeight, 110) + 'px';
    });

    document.addEventListener('click', function(e){
        var btn = e.target.closest('.xuSuggestBtn');
        if (btn){ input.value = btn.getAttribute('data-q'); sendMsg(); }
    });

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
        return String(s).replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;');
    }

    function renderMarkdown(s){
        if (!s) return '';
        s = esc(s);
        s = s.replace(/```(\w+)?\n([\s\S]*?)```/g, function(_, lang, code){
            return '<pre class="xuCodeBlock" data-lang="' + (lang||'text') + '"><div class="xuCodeHead"><span>' + (lang||'text') + '</span></div><code class="xuCode">' + code.trim() + '</code></pre>';
        });
        s = s.replace(/`([^`]+)`/g, '<code class="xuInlineCode">$1</code>');
        s = s.replace(/^### (.+)$/gm, '<h4 class="xuH4">$1</h4>');
        s = s.replace(/^## (.+)$/gm, '<h3 class="xuH3">$1</h3>');
        s = s.replace(/^# (.+)$/gm, '<h2 class="xuH2">$1</h2>');
        s = s.replace(/\*\*([^*]+)\*\*/g, '<strong>$1</strong>');
        s = s.replace(/\*([^*]+)\*/g, '<em>$1</em>');
        s = s.replace(/^>\s*(.+)$/gm, '<blockquote class="xuQuote">$1</blockquote>');
        s = s.replace(/\[(\d+)\]/g, function(_, num){
            var idx = parseInt(num) - 1;
            if (currentDocs && currentDocs[idx]) {
                var url = baseUrl + 'beranda/detail/' + currentDocs[idx].biblio_id;
                return '<a href="' + url + '" class="xuCit" title="' + esc(currentDocs[idx].title) + '" target="_blank">[' + num + ']</a>';
            }
            return '[' + num + ']';
        });
        s = s.replace(/^\s*[-*]\s+(.+)$/gm, '<li>$1</li>');
        s = s.replace(/(<li>.*?<\/li>\n?)+/g, function(m){ return '<ul class="xuUl">' + m + '</ul>'; });
        s = s.replace(/^---$/gm, '<hr class="xuHr">');
        return s.split(/\n\n+/).map(function(p){
            p = p.trim();
            if (!p) return '';
            if (p.startsWith('<h') || p.startsWith('<ul') || p.startsWith('<ol') || p.startsWith('<pre') || p.startsWith('<blockquote') || p.startsWith('<hr')) return p;
            return '<p>' + p.replace(/\n/g, '<br>') + '</p>';
        }).join('');
    }

    function routeBadge(route){
        var map = {
            'repo':    {icon:'fa-graduation-cap', label:'REPOSITORI', color:'#059669'},
            'general': {icon:'fa-globe',          label:'AI CERDAS',  color:'#8b5cf6'},
            'hybrid':  {icon:'fa-bolt',           label:'HYBRID',     color:'#f59e0b'}
        };
        var m = map[route] || map.repo;
        return '<span class="xuRouteBadge" style="background:' + m.color + '22;color:' + m.color + ';border:1px solid ' + m.color + '44"><i class="fa ' + m.icon + '"></i> ' + m.label + '</span>';
    }

    function renderDocs(docs){
        if (!docs || !docs.length) return '';
        var h = '<div style="margin-top:14px;font-size:.72rem;color:#94a3b8;font-weight:700;letter-spacing:.1em;text-transform:uppercase">📚 Sumber Rujukan</div>';
        h += '<div class="xuDocs">';
        docs.forEach(function(d, i){
            h += '<a class="xuDocCard" href="' + baseUrl + 'beranda/detail/' + d.biblio_id + '" target="_blank">'
                + '<div style="display:flex;align-items:center;gap:6px">'
                + '<span style="width:22px;height:22px;border-radius:6px;background:rgba(245,158,11,.18);color:#f59e0b;font-size:.72rem;font-weight:800;display:inline-flex;align-items:center;justify-content:center;flex-shrink:0">[' + (i+1) + ']</span>'
                + '<div class="t">' + esc(d.title) + '</div></div>'
                + '<div class="m"><span class="chip">' + esc((d.authors || '-').split(',')[0]) + '</span><span class="chip pink">' + esc(d.publish_year || '-') + '</span></div></a>';
        });
        return h + '</div>';
    }

    function renderSuggestions(suggestions){
        if (!suggestions || !suggestions.length) return '';
        var h = '<div class="xuSuggest" style="margin-top:12px">';
        suggestions.forEach(function(s){
            h += '<button class="xuSuggestBtn" data-q="' + esc(s) + '">💬 ' + esc(s) + '</button>';
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
                setTimeout(step, 5 + Math.random() * 8);
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
        setMode('🧠 MEMIKIR…', false);
        var bubble = addMsg('bot', '<div class="xuDots"><span></span><span></span><span></span></div>');
        var fd = new FormData();
        fd.append('q', q);
        fetch(baseUrl + 'beranda/ai/chat', {method: 'POST', body: fd, headers: {'Accept': 'application/json'}})
        .then(function(r){ return r.text().then(function(t){ return {status: r.status, text: t}; }); })
        .then(function(res){
            send.disabled = false;
            var j = null;
            try { j = JSON.parse(res.text); } catch(e){ j = null; }
            if (!j || typeof j.ok === 'undefined'){
                bubble.innerHTML = '<p>⚠️ Respons server tidak valid (HTTP ' + res.status + '). Pastikan route <code>beranda/ai/chat</code> terdaftar.</p>';
                setMode('ERROR', true);
                return;
            }
            if (!j.ok){
                bubble.innerHTML = '<p>⚠️ ' + esc(j.error || 'Terjadi kesalahan.') + '</p>';
                setMode('SIAP', true);
                return;
            }
            currentDocs = j.docs || [];
            var modeLabel = j.mode === 'ai' ? '🤖 ' + (j.model || 'AI') : '💾 LOKAL';
            if (j.route === 'general') modeLabel = '🌍 ' + (j.model || 'AI CERDAS');
            if (j.route === 'hybrid') modeLabel = '⚡ HYBRID';
            setMode(modeLabel, j.mode !== 'ai');
            bubble.innerHTML = '';
            var typingText = (j.answer || '').slice(0, 50);
            typeWriter(bubble, typingText, function(){
                var html = routeBadge(j.route || 'repo')
                         + renderMarkdown(j.answer || '')
                         + ((j.route === 'repo' || j.route === 'hybrid') ? renderDocs(j.docs) : '')
                         + renderSuggestions(j.suggestions);
                bubble.innerHTML = html;
                chat.scrollTop = chat.scrollHeight;
            });
        })
        .catch(function(err){
            send.disabled = false;
            bubble.innerHTML = '<p>⚠️ Gagal terhubung: ' + esc(err.message) + '</p>';
            setMode('OFFLINE', true);
        });
    }
})();
</script>