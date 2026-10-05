<style>
/* ================================================================
   DIFOSS LIBRARY INFORMATION — EMERALD FOREST EDITION
   ================================================================ */
:root{
    --xi-emerald:#059669; --xi-teal:#0891b2; --xi-gold:#f59e0b;
    --xi-mint:#6ee7b7; --xi-deep:#0a2920; --xi-mid:#064e3b;
    --xi-ink:#0f172a; --xi-muted:#64748b; --xi-soft:#94a3b8;
}

.xuR{opacity:0;transform:translateY(28px);transition:all .7s cubic-bezier(.2,.8,.2,1)}
.xuR.in{opacity:1;transform:none}

/* ===== BACKGROUND HERO ===== */
.xuInfoHero{
    position:relative;
    padding:60px 0 80px;
    background:
        radial-gradient(900px 420px at 85% -120px,rgba(5,150,105,.14),transparent 70%),
        radial-gradient(800px 380px at 10% 110%,rgba(245,158,11,.08),transparent 70%),
        #f6f7fc;
    overflow:hidden;
}
html.xu-dark .xuInfoHero{
    background:
        radial-gradient(900px 420px at 85% -120px,rgba(5,150,105,.22),transparent 70%),
        radial-gradient(800px 380px at 10% 110%,rgba(245,158,11,.1),transparent 70%),
        #0b1020!important;
}

/* ===== HEADER SECTION ===== */
.xuInfoHead{text-align:center;margin-bottom:44px;position:relative;z-index:2}

.xuInfoKicker{
    display:inline-flex;align-items:center;gap:8px;
    padding:7px 18px;
    background:rgba(5,150,105,.1);
    color:var(--xi-emerald);
    border:1px solid rgba(5,150,105,.25);
    border-radius:999px;
    font-size:.72rem;font-weight:800;
    letter-spacing:.14em;text-transform:uppercase;
    margin-bottom:16px;
}
html.xu-dark .xuInfoKicker{background:rgba(245,158,11,.12);color:var(--xi-gold);border-color:rgba(245,158,11,.3)}

.xuInfoTitle{
    font-family:'Neuton',Georgia,serif;
    font-size:clamp(2rem,5vw,2.6rem);
    font-weight:700;color:var(--xi-ink);
    margin:0 0 14px;line-height:1.15;
    letter-spacing:-.02em;
}
.xuInfoTitle span{
    color:transparent;
    background:linear-gradient(90deg,var(--xi-emerald),var(--xi-gold));
    -webkit-background-clip:text;background-clip:text;
    -webkit-text-fill-color:transparent;
    background-size:200% 100%;
    animation:xiGrad 6s linear infinite;
}
@keyframes xiGrad{to{background-position:200% 0}}
html.xu-dark .xuInfoTitle{color:#f1f5f9}
html.xu-dark .xuInfoTitle span{
    background:linear-gradient(90deg,var(--xi-mint),var(--xi-gold));
    -webkit-background-clip:text;background-clip:text;
    -webkit-text-fill-color:transparent;
}

.xuInfoSub{
    color:var(--xi-muted);
    max-width:560px;margin:0 auto;
    font-size:.98rem;line-height:1.65;
}
html.xu-dark .xuInfoSub{color:var(--xi-soft)}

/* ===== KARTU INFO ===== */
.xuInfoCard{
    background:#fff;border-radius:22px;
    box-shadow:0 16px 44px rgba(15,23,42,.08);
    overflow:hidden;margin-bottom:26px;
    border:1px solid rgba(5,150,105,.1);
    transition:.35s cubic-bezier(.2,.8,.2,1);
}
.xuInfoCard:hover{
    box-shadow:0 22px 54px rgba(5,150,105,.14);
    border-color:rgba(5,150,105,.22);
}
html.xu-dark .xuInfoCard{
    background:#0f1e1f;
    border-color:rgba(5,150,105,.25);
    box-shadow:0 16px 44px rgba(0,0,0,.4);
}

.xuInfoHeadBar{
    padding:22px 26px;color:#fff;
    font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1.15rem;
    display:flex;align-items:center;gap:12px;
    position:relative;overflow:hidden;
}
.xuInfoHeadBar::after{
    content:'';position:absolute;top:-50%;right:-8%;
    width:220px;height:220px;border-radius:50%;
    background:radial-gradient(circle,rgba(255,255,255,.15),transparent 70%);
    pointer-events:none;
}

.xuInfoHeadBar i{
    width:40px;height:40px;border-radius:12px;
    background:rgba(255,255,255,.18);
    backdrop-filter:blur(8px);-webkit-backdrop-filter:blur(8px);
    display:inline-flex;align-items:center;justify-content:center;
    font-size:1.05rem;
    box-shadow:inset 0 1px 0 rgba(255,255,255,.2);
    flex-shrink:0;
    position:relative;z-index:2;
}
.xuInfoHeadBar span.hd-text{position:relative;z-index:2}

.xuInfoHeadBar.contact{background:linear-gradient(90deg,var(--xi-emerald),var(--xi-gold))}
.xuInfoHeadBar.hours{background:linear-gradient(90deg,var(--xi-teal),var(--xi-mint))}
.xuInfoHeadBar.location{background:linear-gradient(90deg,var(--xi-emerald),var(--xi-teal))}

/* ===== CONTACT ROWS ===== */
.xuInfoBody{padding:22px 26px}

.xuContactRow{
    display:flex;gap:14px;
    padding:14px 0;
    border-bottom:1px dashed rgba(5,150,105,.15);
    transition:.25s;
}
.xuContactRow:hover{transform:translateX(4px)}
.xuContact-row:last-child{border-bottom:none}

.xuContactIco{
    width:46px;height:46px;border-radius:14px;
    background:linear-gradient(135deg,rgba(5,150,105,.12),rgba(245,158,11,.08));
    color:var(--xi-emerald);
    display:flex;align-items:center;justify-content:center;
    flex-shrink:0;font-size:1.1rem;
    border:1px solid rgba(5,150,105,.2);
    transition:.3s;
}
.xuContact-row:hover .xuContactIco{
    background:linear-gradient(135deg,var(--xi-emerald),var(--xi-gold));
    color:#fff;border-color:transparent;
    transform:rotate(-8deg) scale(1.08);
    box-shadow:0 10px 24px rgba(5,150,105,.35);
}
html.xu-dark .xuContactIco{
    background:linear-gradient(135deg,rgba(5,150,105,.2),rgba(245,158,11,.12));
    color:var(--xi-mint);border-color:rgba(5,150,105,.35);
}
html.xu-dark .xuContact-row:hover .xuContactIco{color:#fff}

.xuContactLbl{
    font-size:.7rem;font-weight:800;
    text-transform:uppercase;letter-spacing:.1em;
    color:var(--xi-soft);margin-bottom:4px;
}
.xuContactVal{
    color:var(--xi-ink);font-weight:600;font-size:.95rem;
    line-height:1.5;
}
html.xu-dark .xuContactVal{color:#e2e8f0}
html.xu-dark .xuContactLbl{color:var(--xi-soft)}

/* ===== CLOCK BADGE ===== */
.xuClockBadge{
    display:inline-flex;align-items:center;gap:7px;
    padding:5px 14px;border-radius:999px;
    font-size:.75rem;font-weight:800;
    letter-spacing:.04em;
    margin-left:auto;position:relative;z-index:2;
    border:1px solid rgba(255,255,255,.25);
    background:rgba(255,255,255,.15);
    backdrop-filter:blur(8px);-webkit-backdrop-filter:blur(8px);
}
.xuOpen{background:rgba(5,150,105,.2)!important;color:#fff;border-color:rgba(5,150,105,.4)!important}
.xuClosed{background:rgba(239,68,68,.2)!important;color:#fff;border-color:rgba(239,68,68,.4)!important}
.xuBreak{background:rgba(245,158,11,.2)!important;color:#fff;border-color:rgba(245,158,11,.4)!important}

.xuDot{
    width:8px;height:8px;border-radius:50%;
    background:#fff;
    box-shadow:0 0 10px currentColor;
    animation:xiBlink 1.6s infinite;
}
@keyframes xiBlink{0%,100%{opacity:1}50%{opacity:.35}}

/* ===== DAY BLOCKS ===== */
.xuDayBlock{
    background:linear-gradient(135deg,rgba(5,150,105,.04),rgba(8,145,178,.02));
    border:1.5px solid rgba(5,150,105,.15);
    border-radius:16px;
    padding:18px 20px;margin-bottom:12px;
    transition:.3s cubic-bezier(.2,.8,.2,1);
    position:relative;overflow:hidden;
}
.xuDayBlock::before{
    content:'';position:absolute;top:0;left:0;bottom:0;width:3px;
    background:linear-gradient(180deg,var(--xi-emerald),var(--xi-gold));
    opacity:.5;transition:opacity .3s;
}
.xuDayBlock:hover{
    border-color:rgba(5,150,105,.35);
    box-shadow:0 12px 30px rgba(5,150,105,.12);
    transform:translateY(-3px);
}
.xuDayBlock:hover::before{opacity:1}
html.xu-dark .xuDayBlock{
    background:linear-gradient(135deg,rgba(5,150,105,.1),rgba(8,145,178,.06));
    border-color:rgba(5,150,105,.25);
}
html.xu-dark .xuDayBlock:hover{border-color:rgba(245,158,11,.4);box-shadow:0 12px 30px rgba(5,150,105,.2)}

.xuDayTitle{
    display:flex;align-items:center;justify-content:space-between;
    margin-bottom:12px;padding-bottom:10px;
    border-bottom:1px dashed rgba(5,150,105,.15);
}
html.xu-dark .xuDayTitle{border-bottom-color:rgba(5,150,105,.25)}

.xuDayTitle b{
    color:var(--xi-ink);
    font-family:'Neuton',Georgia,serif;
    font-size:1.05rem;font-weight:700;
    display:inline-flex;align-items:center;gap:10px;
}
html.xu-dark .xuDayTitle b{color:#f1f5f9}

.xuDayTitle b i{
    width:28px;height:28px;border-radius:8px;
    background:linear-gradient(135deg,var(--xi-emerald),var(--xi-gold));
    color:#fff;
    display:inline-flex;align-items:center;justify-content:center;
    font-size:.8rem;
    box-shadow:0 6px 14px rgba(5,150,105,.3);
}

.xuDayInfo{font-size:.88rem}
.xuDayInfo dt{
    color:var(--xi-muted);font-weight:700;
    font-size:.72rem;text-transform:uppercase;
    letter-spacing:.08em;padding:5px 0;
}
.xuDayInfo dd{
    color:var(--xi-ink);font-weight:700;
    font-family:'JetBrains Mono',monospace;
    font-size:.88rem;padding:5px 0;margin:0;
}
html.xu-dark .xuDayInfo dt{color:var(--xi-soft)}
html.xu-dark .xuDayInfo dd{color:#e2e8f0}

/* ===== MAP WRAPPER ===== */
.xuMapWrap{
    position:relative;border-radius:18px;
    overflow:hidden;
    box-shadow:0 16px 44px rgba(15,23,42,.12);
    isolation:isolate;
}
.xuMapWrap::before{
    content:"";position:absolute;inset:-2px;
    border-radius:20px;z-index:0;
    background:linear-gradient(120deg,var(--xi-emerald),var(--xi-gold),var(--xi-teal),var(--xi-emerald));
    background-size:300% 300%;
    animation:xiBorder 6s linear infinite;
}
@keyframes xiBorder{to{background-position:300% 0}}

#map{
    position:relative;z-index:1;
    height:440px;width:100%;
    background:linear-gradient(135deg,#e8ecf5,#d7e0ee);
    border-radius:16px;
}
html.xu-dark #map{background:linear-gradient(135deg,#0a2920,#064e3b)}

/* OpenLayers popup override */
.ol-popup{
    background:#fff;border-radius:12px;
    box-shadow:0 12px 30px rgba(0,0,0,.2);
    padding:12px 16px;font-size:.85rem;
    border:1px solid rgba(5,150,105,.2);
    min-width:180px;
}
html.xu-dark .ol-popup{background:#0f1e1f;border-color:rgba(5,150,105,.4);color:#e2e8f0}

/* ===== FEATURE CARDS (Collections & Membership) ===== */
.xuFeatCard{
    background:#fff;border-radius:22px;
    padding:30px 28px;
    box-shadow:0 12px 34px rgba(15,23,42,.07);
    border:1px solid rgba(5,150,105,.1);
    height:100%;
    transition:.4s cubic-bezier(.2,.8,.2,1);
    position:relative;overflow:hidden;
}
.xuFeatCard::before{
    content:'';position:absolute;top:0;left:0;right:0;height:4px;
    background:linear-gradient(90deg,var(--fc1),var(--fc2));
    transform:scaleX(0);transform-origin:left;
    transition:transform .4s ease;
}
.xuFeatCard:hover{
    transform:translateY(-7px);
    box-shadow:0 26px 60px rgba(5,150,105,.18);
    border-color:rgba(5,150,105,.3);
}
.xuFeatCard:hover::before{transform:scaleX(1)}
html.xu-dark .xuFeatCard{
    background:#0f1e1f;
    border-color:rgba(5,150,105,.25);
    box-shadow:0 12px 34px rgba(0,0,0,.4);
}
html.xu-dark .xuFeatCard:hover{box-shadow:0 26px 60px rgba(5,150,105,.25);border-color:rgba(245,158,11,.4)}

.xuFeatIco{
    width:62px;height:62px;border-radius:18px;
    display:flex;align-items:center;justify-content:center;
    font-size:1.55rem;color:#fff;margin-bottom:18px;
    background:linear-gradient(135deg,var(--fc1),var(--fc2));
    box-shadow:0 12px 28px rgba(5,150,105,.3);
    transition:.4s;
}
.xuFeatCard:hover .xuFeatIco{
    transform:rotate(-8deg) scale(1.1);
    box-shadow:0 16px 36px rgba(5,150,105,.4);
}

.xuFeatCard h3{
    font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1.3rem;
    color:var(--xi-ink);margin-bottom:12px;
    letter-spacing:-.01em;
}
html.xu-dark .xuFeatCard h3{color:#f1f5f9}

.xuFeatCard p{
    color:var(--xi-muted);
    line-height:1.75;font-size:.9rem;
    margin:0;text-align:justify;
}
html.xu-dark .xuFeatCard p{color:var(--xi-soft)}

/* ===== TOMBOL DAFTAR ===== */
.xuFeatBtn{
    display:inline-flex;align-items:center;gap:9px;
    margin-top:20px;
    padding:11px 24px;
    background:linear-gradient(90deg,var(--xi-emerald),var(--xi-teal));
    color:#fff;text-decoration:none;
    border-radius:12px;font-weight:800;
    font-size:.88rem;letter-spacing:.02em;
    transition:.3s;
    box-shadow:0 10px 24px rgba(5,150,105,.3);
    position:relative;overflow:hidden;
}
.xuFeatBtn::before{
    content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;
    background:linear-gradient(100deg,transparent 20%,rgba(255,255,255,.3) 50%,transparent 80%);
    transition:left .6s ease;
}
.xuFeatBtn:hover{
    filter:brightness(1.08);
    transform:translateY(-2px);
    color:#fff;text-decoration:none;
    box-shadow:0 14px 32px rgba(5,150,105,.4);
}
.xuFeatBtn:hover::before{left:120%}

/* ===== RESPONSIVE ===== */
@media(max-width:768px){
    .xuInfoHero{padding:40px 0 60px}
    .xuInfoHeadBar{padding:18px 20px;font-size:1rem}
    .xuInfoBody{padding:18px 20px}
    .xuDayBlock{padding:14px 16px}
    #map{height:320px}
    .xuFeatCard{padding:24px 22px}
}
</style>

<div class="xuInfoHero">
    <div class="container">

        <!-- Header -->
        <div class="xuInfoHead xuR">
            <span class="xuInfoKicker">
                <i class="fa fa-info-circle"></i> About Us
            </span>
            <h2 class="xuInfoTitle">Library <span>Information</span></h2>
            <p class="xuInfoSub">Selengkapnya mengenai perpustakaan kami — kontak, jam layanan, lokasi, dan keanggotaan.</p>
        </div>

        <div class="row">

            <!-- Kolom Kiri: Kontak + Jam -->
            <div class="col-md-6">

                <!-- Contact Information -->
                <div class="xuInfoCard xuR">
                    <div class="xuInfoHeadBar contact">
                        <i class="fa fa-address-card"></i>
                        <span class="hd-text">Contact Information</span>
                    </div>
                    <div class="xuInfoBody">
                        <div class="xuContact-row">
                            <div class="xuContactIco"><i class="fa fa-map-marker"></i></div>
                            <div>
                                <div class="xuContactLbl">Address</div>
                                <div class="xuContactVal">Jenderal Sudirman Road, Senayan, Jakarta, Indonesia, 10270</div>
                            </div>
                        </div>
                        <div class="xuContact-row">
                            <div class="xuContactIco"><i class="fa fa-phone"></i></div>
                            <div>
                                <div class="xuContactLbl">Phone Number</div>
                                <div class="xuContactVal">(021) 5711144</div>
                            </div>
                        </div>
                        <div class="xuContact-row">
                            <div class="xuContactIco"><i class="fa fa-fax"></i></div>
                            <div>
                                <div class="xuContactLbl">Fax Number</div>
                                <div class="xuContactVal">(021) 5711144</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Opening Hours -->
                <div class="xuInfoCard xuR">
                    <div class="xuInfoHeadBar hours">
                        <i class="fa fa-clock-o"></i>
                        <span class="hd-text">Opening Hours</span>
                        <span id="xuStatus" class="xuClockBadge">
                            <span class="xuDot"></span> Memeriksa...
                        </span>
                    </div>
                    <div class="xuInfoBody">
                        <div class="xuDayBlock">
                            <div class="xuDayTitle">
                                <b><i class="fa fa-calendar"></i> Monday - Friday</b>
                            </div>
                            <dl class="row m-0 xuDayInfo">
                                <dt class="col-md-3">Open</dt><dd class="col-md-9">08.00 AM</dd>
                                <dt class="col-md-3">Break</dt><dd class="col-md-9">12.00 - 13.00 PM</dd>
                                <dt class="col-md-3">Close</dt><dd class="col-md-9">20.00 PM</dd>
                            </dl>
                        </div>
                        <div class="xuDayBlock">
                            <div class="xuDayTitle">
                                <b><i class="fa fa-calendar"></i> Saturday</b>
                            </div>
                            <dl class="row m-0 xuDayInfo">
                                <dt class="col-md-3">Open</dt><dd class="col-md-9">08.00 AM</dd>
                                <dt class="col-md-3">Break</dt><dd class="col-md-9">12.00 - 13.00 PM</dd>
                                <dt class="col-md-3">Close</dt><dd class="col-md-9">17.00 PM</dd>
                            </dl>
                        </div>
                        <div class="xuDayBlock" style="opacity:.85">
                            <div class="xuDayTitle">
                                <b><i class="fa fa-calendar"></i> Sunday</b>
                                <span class="xuClockBadge xuClosed" style="margin-left:auto;font-size:.68rem">
                                    <span class="xuDot"></span> Tutup
                                </span>
                            </div>
                            <dl class="row m-0 xuDayInfo">
                                <dt class="col-md-3">Status</dt><dd class="col-md-9" style="color:var(--xi-soft);font-style:italic">Libur mingguan</dd>
                            </dl>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Kolom Kanan: Peta -->
            <div class="col-md-6">
                <div class="xuInfoCard xuR" style="height:100%">
                    <div class="xuInfoHeadBar location">
                        <i class="fa fa-map"></i>
                        <span class="hd-text">Our Location</span>
                    </div>
                    <div style="padding:18px">
                        <div class="xuMapWrap">
                            <div id="map"></div>
                            <div id="popup" class="ol-popup">
                                <a href="#" id="popup-closer" class="ol-popup-closer"></a>
                                <div id="popup-content"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Collections & Membership -->
            <div class="col-md-6" style="margin-top:26px">
                <div class="xuFeatCard xuR" style="--fc1:var(--xi-emerald);--fc2:var(--xi-teal)">
                    <div class="xuFeatIco"><i class="fa fa-book"></i></div>
                    <h3>Collections</h3>
                    <p>We have many types of collections in our library, range from Fictions to Sciences Material, from printed material to digital collections such CD-ROM, CD, VCD and DVD. We also collect daily serials publications such as newspaper and also monthly serials such as magazines.</p>
                </div>
            </div>
            <div class="col-md-6" style="margin-top:26px">
                <div class="xuFeatCard xuR" style="--fc1:var(--xi-teal);--fc2:var(--xi-mint)">
                    <div class="xuFeatIco"><i class="fa fa-id-card"></i></div>
                    <h3>Library Membership</h3>
                    <p>To be able to loan our library collections, you must first become library member. There is terms and conditions that you must obey.</p>
                    <a href="<?= base_url('login') ?>" class="xuFeatBtn">
                        <i class="fa fa-user-plus"></i> Daftar Anggota
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function(){
    // ===== Fade-in reveal (staggered) =====
    var io = new IntersectionObserver(function(es){
        es.forEach(function(en, i){
            if (en.isIntersecting){
                setTimeout(function(){ en.target.classList.add('in'); }, i * 70);
                io.unobserve(en.target);
            }
        });
    }, {threshold: .08});
    document.querySelectorAll('.xuR').forEach(function(el){ io.observe(el); });

    // ===== Status buka/tutup (real-time) =====
    var st = document.getElementById('xuStatus');
    if (st){
        var now = new Date();
        var day = now.getDay(); // 0=Minggu, 1=Senin, ..., 6=Sabtu
        var h = now.getHours();
        var m = now.getMinutes();
        var t = h + m/60;
        var open = false, label = 'Tutup';

        if (day >= 1 && day <= 5){ // Senin - Jumat
            if ((t >= 8 && t < 12) || (t >= 13 && t < 20)){
                open = true;
            } else if (t >= 12 && t < 13){
                label = 'Istirahat';
            }
        } else if (day === 6){ // Sabtu
            if ((t >= 8 && t < 12) || (t >= 13 && t < 17)){
                open = true;
            } else if (t >= 12 && t < 13){
                label = 'Istirahat';
            }
        } else { // Minggu
            label = 'Tutup (Minggu)';
        }

        if (open){
            st.className = 'xuClockBadge xuOpen';
            label = 'Buka Sekarang';
        } else if (label === 'Istirahat'){
            st.className = 'xuClockBadge xuBreak';
        } else {
            st.className = 'xuClockBadge xuClosed';
        }
        st.innerHTML = '<span class="xuDot"></span> ' + label;
    }
});
</script>