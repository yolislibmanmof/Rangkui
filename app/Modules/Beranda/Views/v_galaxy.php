<style>
/* ================================================================
   DIFOSS GALAKSI RISET — EMERALD FOREST EDITION
   ================================================================ */
:root{
    --xg-emerald:#059669; --xg-teal:#0891b2; --xg-gold:#f59e0b;
    --xg-mint:#6ee7b7; --xg-deep:#0a2920; --xg-mid:#064e3b;
    --glass:rgba(10,41,32,.78);
    --stroke:rgba(5,150,105,.32);
    --txt:#e2e8f0; --mut:#94a3b8;
}

html,body{background:#040f0c!important;overflow:hidden!important}

/* ===== WRAPPER & CANVAS ===== */
#xuGalaxyWrap{
    position:fixed;inset:0;z-index:9990;
    background:radial-gradient(ellipse at 50% 40%,#0a3d2e 0%,#06181a 55%,#040f0c 100%);
}
#xuGalaxyCanvas{width:100%;height:100%;display:block;cursor:grab}
#xuGalaxyCanvas:active{cursor:grabbing}

#xuVignette{
    position:fixed;inset:0;z-index:9991;pointer-events:none;
    background:radial-gradient(ellipse at center,transparent 55%,rgba(4,15,12,.65) 100%);
}

/* ===== PANEL DASAR ===== */
.xuGalaxyPanel{
    position:fixed;z-index:9995;
    background:var(--glass);
    backdrop-filter:blur(16px) saturate(1.3);-webkit-backdrop-filter:blur(16px) saturate(1.3);
    border:1px solid var(--stroke);border-radius:16px;
    color:var(--txt);
    box-shadow:0 18px 50px rgba(0,0,0,.55),inset 0 1px 0 rgba(255,255,255,.06);
    overflow:hidden;
}
.xuGalaxyPanel::before{
    content:'';position:absolute;top:0;left:0;right:0;height:2px;
    background:linear-gradient(90deg,transparent,rgba(5,150,105,.8),rgba(245,158,11,.7),rgba(8,145,178,.6),transparent);
}

/* ===== HEAD + PENCARIAN ===== */
.xuHead{top:20px;left:20px;width:340px;padding:18px 20px 16px}
.xuHeadTop{display:flex;align-items:center;gap:10px}

/* Logo orb emerald */
.xuLogoOrb{
    width:34px;height:34px;border-radius:50%;
    background:radial-gradient(circle at 30% 30%,#fff,#6ee7b7 35%,#059669 70%,#0a2920);
    box-shadow:0 0 18px rgba(110,231,183,.65);
    flex-shrink:0;
    animation:xuOrb 3s ease-in-out infinite;
}
@keyframes xuOrb{0%,100%{transform:scale(1)}50%{transform:scale(1.08)}}

.xuHead h1{
    margin:0;font-family:'Neuton',Georgia,serif;
    font-size:1.3rem;font-weight:700;letter-spacing:-.01em;
    background:linear-gradient(90deg,#6ee7b7,#f59e0b,#0891b2);
    background-size:200% 100%;
    -webkit-background-clip:text;background-clip:text;color:transparent;
    animation:xuGradTxt 5s linear infinite;
}
@keyframes xuGradTxt{to{background-position:200% 0}}

.xuVer{
    margin-left:auto;
    font-size:.62rem;font-weight:800;letter-spacing:.12em;
    color:var(--xg-gold);
    border:1px solid rgba(245,158,11,.45);
    padding:3px 8px;border-radius:999px;
}

.xuSub{margin:8px 0 12px;font-size:.78rem;color:var(--mut);line-height:1.5}

/* Search */
.xuSearchWrap{
    position:relative;display:flex;align-items:center;gap:9px;
    padding:10px 13px;
    background:rgba(255,255,255,.05);
    border:1px solid rgba(5,150,105,.35);
    border-radius:12px;transition:.25s;
}
.xuSearchWrap:focus-within{
    border-color:var(--xg-gold);
    box-shadow:0 0 0 3px rgba(245,158,11,.15);
}
.xuSearchWrap i{color:var(--mut);font-size:.85rem}
#xuSearch{flex:1;background:none;border:none;outline:none;color:#fff;font-size:.85rem;font-weight:600}
#xuSearch::placeholder{color:#64748b}

.xuSearchList{
    position:absolute;top:calc(100% + 6px);left:0;right:0;
    background:rgba(10,41,32,.96);
    border:1px solid var(--stroke);border-radius:12px;
    overflow:hidden;display:none;max-height:230px;overflow-y:auto;
}
.xuSearchList.show{display:block}

.xuSItem{
    display:flex;align-items:center;gap:9px;
    padding:9px 13px;font-size:.8rem;font-weight:600;
    cursor:pointer;border-bottom:1px solid rgba(5,150,105,.12);
    transition:.15s;
}
.xuSItem:last-child{border-bottom:none}
.xuSItem:hover{background:rgba(5,150,105,.18)}
.xuSItem i{
    width:20px;height:20px;border-radius:6px;
    display:flex;align-items:center;justify-content:center;
    font-size:.65rem;flex-shrink:0;
}
.xuSItem .a{background:rgba(245,158,11,.15);color:var(--xg-gold)}
.xuSItem .t{background:rgba(110,231,183,.15);color:var(--xg-mint)}
.xuSItem small{margin-left:auto;color:var(--mut)}

.xuHintRow{margin-top:10px;display:flex;align-items:center;gap:6px;font-size:.68rem;color:var(--mut);flex-wrap:wrap}
.xuKbd{
    background:rgba(5,150,105,.12);
    border:1px solid rgba(5,150,105,.25);
    border-radius:5px;padding:1px 7px;
    font-weight:800;color:var(--xg-mint);font-size:.62rem;
}

/* ===== KONTROL ===== */
.xuCtrls{top:20px;right:20px;padding:10px;display:flex;flex-direction:column;gap:7px}
.xuBtn{
    width:42px;height:42px;border-radius:12px;
    border:1px solid rgba(5,150,105,.3);
    background:rgba(255,255,255,.04);
    color:var(--txt);cursor:pointer;
    display:flex;align-items:center;justify-content:center;
    font-size:.95rem;transition:.2s;position:relative;
}
.xuBtn:hover{
    background:rgba(5,150,105,.25);
    transform:scale(1.08);
    border-color:rgba(5,150,105,.6);
}
.xuBtn.on{
    background:linear-gradient(135deg,rgba(245,158,11,.25),rgba(5,150,105,.25));
    border-color:rgba(245,158,11,.5);
    color:var(--xg-gold);
    box-shadow:0 0 14px rgba(245,158,11,.25);
}
.xuSep{height:1px;background:linear-gradient(90deg,transparent,rgba(5,150,105,.4),transparent);margin:2px 4px}

/* ===== STATISTIK ===== */
.xuStats{bottom:20px;right:20px;padding:14px 18px;min-width:170px}
.xuStatRow{
    display:flex;align-items:center;gap:12px;
    padding:7px 0;border-bottom:1px dashed rgba(5,150,105,.2);
}
.xuStatRow:last-child{border-bottom:none}
.xuStatIco{
    width:32px;height:32px;border-radius:10px;
    background:color-mix(in srgb,var(--c) 18%,transparent);
    color:var(--c);
    display:flex;align-items:center;justify-content:center;
    font-size:.8rem;flex-shrink:0;
    border:1px solid color-mix(in srgb,var(--c) 40%,transparent);
}
.xuStatRow b{
    display:block;font-family:'Neuton',Georgia,serif;
    font-size:1.15rem;font-weight:700;
    color:#fff;line-height:1;
    font-variant-numeric:tabular-nums;
}
.xuStatRow span{
    font-size:.62rem;font-weight:800;
    letter-spacing:.1em;text-transform:uppercase;
    color:var(--mut);
}

/* ===== LEGENDA ===== */
.xuLegend{bottom:20px;left:20px;width:250px}
.xuLegendHead{
    display:flex;align-items:center;gap:8px;
    padding:12px 16px;cursor:pointer;
    font-size:.72rem;font-weight:800;
    letter-spacing:.1em;text-transform:uppercase;
    color:var(--mut);
}
.xuLegendHead i.chev{margin-left:auto;transition:.3s}
.xuLegend.closed .chev{transform:rotate(-90deg)}

.xuLegendBody{
    max-height:200px;transition:max-height .4s ease,opacity .3s;
    opacity:1;padding:0 16px 14px;
}
.xuLegend.closed .xuLegendBody{max-height:0;opacity:0;padding-bottom:0}

.xuLRow{display:flex;align-items:center;gap:10px;margin:7px 0;font-size:.75rem;color:#cbd5e1}
.xuDot{width:13px;height:13px;border-radius:50%;flex-shrink:0;box-shadow:0 0 8px currentColor}
.xuLine{width:22px;height:0;flex-shrink:0;border-top:2px solid}

/* ===== TOOLTIP ===== */
#xuTip{
    position:fixed;z-index:9997;pointer-events:none;
    background:rgba(10,41,32,.94);
    backdrop-filter:blur(10px);
    border:1px solid rgba(245,158,11,.4);
    border-radius:12px;padding:10px 14px;
    max-width:240px;opacity:0;transform:translateY(6px);
    transition:opacity .18s,transform .18s;
    box-shadow:0 12px 30px rgba(0,0,0,.6);
}
#xuTip.show{opacity:1;transform:none}
#xuTip b{display:block;font-size:.85rem;color:#fff;margin-bottom:3px}
#xuTip span{font-size:.7rem;color:var(--mut)}
#xuTip em{
    display:block;margin-top:5px;font-style:normal;
    font-size:.65rem;font-weight:800;
    color:var(--xg-gold);
    letter-spacing:.06em;text-transform:uppercase;
}

/* ===== INFO / LOADER / BACK ===== */
.xuGalaxyInfo{
    position:fixed;top:20px;left:50%;transform:translateX(-50%);
    z-index:9996;padding:11px 24px;
    background:linear-gradient(90deg,rgba(5,150,105,.92),rgba(245,158,11,.92));
    color:#fff;border-radius:999px;
    font-weight:800;font-size:.83rem;
    box-shadow:0 10px 30px rgba(5,150,105,.5);
    opacity:0;transition:.3s;pointer-events:none;
}
.xuGalaxyInfo.show{opacity:1;transform:translateX(-50%) translateY(4px)}

.xuGalaxyLoader{
    position:fixed;inset:0;z-index:9999;
    display:flex;align-items:center;justify-content:center;
    background:#040f0c;color:var(--txt);
    flex-direction:column;gap:22px;transition:opacity .7s;
}
.xuGalaxyLoader.hide{opacity:0;pointer-events:none}

.xuSpin{
    width:70px;height:70px;border-radius:50%;
    background:conic-gradient(from 0deg,transparent 0%,#6ee7b7 20%,#f59e0b 45%,#059669 70%,transparent 100%);
    animation:xuRot 1.1s linear infinite;position:relative;
}
.xuSpin::after{content:'';position:absolute;inset:6px;border-radius:50%;background:#040f0c}
@keyframes xuRot{to{transform:rotate(360deg)}}

.xuLoadTxt{
    font-family:'Plus Jakarta Sans',sans-serif;
    font-size:.85rem;font-weight:800;
    letter-spacing:.12em;
    background:linear-gradient(90deg,var(--xg-mint),var(--xg-gold));
    -webkit-background-clip:text;background-clip:text;
    -webkit-text-fill-color:transparent;
}

.xuGalaxyBack{
    position:fixed;bottom:20px;left:50%;transform:translateX(-50%);
    z-index:9996;
    display:flex;align-items:center;gap:9px;
    padding:11px 24px;
    background:var(--glass);
    backdrop-filter:blur(10px);
    border:1px solid var(--stroke);
    border-radius:999px;
    color:var(--txt);font-weight:700;
    text-decoration:none;font-size:.8rem;
    transition:.25s;
}
.xuGalaxyBack:hover{
    border-color:var(--xg-gold);
    color:var(--xg-gold);
    transform:translateX(-50%) translateY(-2px);
    box-shadow:0 10px 26px rgba(245,158,11,.25);
}

@media (max-width:760px){
    .xuHead{width:calc(100% - 90px)}
    .xuLegend{display:none}
}
</style>

<div class="xuGalaxyLoader" id="xuLoader">
    <div class="xuSpin"></div>
    <div class="xuLoadTxt">MERANGKAI GALAKSI RISET DIFOSS…</div>
</div>

<div id="xuGalaxyWrap"><canvas id="xuGalaxyCanvas"></canvas></div>
<div id="xuVignette"></div>

<div class="xuGalaxyPanel xuHead">
    <div class="xuHeadTop">
        <span class="xuLogoOrb"></span>
        <h1>Galaksi Riset</h1>
        <span class="xuVer">ULTIMATE</span>
    </div>
    <p class="xuSub">Peta hidup kolaborasi penulis & topik repositori DIFOSS — setiap cahaya adalah ilmu.</p>
    <div class="xuSearchWrap">
        <i class="fa fa-search"></i>
        <input id="xuSearch" type="text" placeholder="Cari penulis / topik…" autocomplete="off">
        <div class="xuSearchList" id="xuSearchList"></div>
    </div>
    <div class="xuHintRow">
        <span class="xuKbd">KLIK</span> buka profil
        <span class="xuKbd">DRAG</span> geser
        <span class="xuKbd">SCROLL</span> zoom
    </div>
</div>

<div class="xuGalaxyPanel xuCtrls">
    <button class="xuBtn" onclick="xuZoom(1.25)" title="Perbesar"><i class="fa fa-plus"></i></button>
    <button class="xuBtn" onclick="xuZoom(0.8)" title="Perkecil"><i class="fa fa-minus"></i></button>
    <button class="xuBtn" onclick="xuReset()" title="Reset pandangan"><i class="fa fa-crosshairs"></i></button>
    <div class="xuSep"></div>
    <button class="xuBtn" id="xuTLabels" onclick="xuToggle('labels')" title="Tampilkan semua label"><i class="fa fa-font"></i></button>
    <button class="xuBtn on" id="xuTFx" onclick="xuToggle('fx')" title="Efek partikel & komet"><i class="fa fa-bolt"></i></button>
    <button class="xuBtn" id="xuTRot" onclick="xuToggle('rot')" title="Rotasi orbit otomatis"><i class="fa fa-refresh"></i></button>
    <div class="xuSep"></div>
    <button class="xuBtn" onclick="xuDemo()" title="Mode demo (data sintetis)"><i class="fa fa-magic"></i></button>
</div>

<div class="xuGalaxyPanel xuStats">
    <div class="xuStatRow"><span class="xuStatIco" style="--c:#f59e0b"><i class="fa fa-star"></i></span><div><b id="xNAuth">0</b><span>Penulis</span></div></div>
    <div class="xuStatRow"><span class="xuStatIco" style="--c:#6ee7b7"><i class="fa fa-cloud"></i></span><div><b id="xNTop">0</b><span>Topik</span></div></div>
    <div class="xuStatRow"><span class="xuStatIco" style="--c:#0891b2"><i class="fa fa-link"></i></span><div><b id="xNEdge">0</b><span>Hubungan</span></div></div>
</div>

<div class="xuGalaxyPanel xuLegend" id="xuLegend">
    <div class="xuLegendHead" onclick="document.getElementById('xuLegend').classList.toggle('closed')">
        <i class="fa fa-map-signs"></i> Legenda <i class="fa fa-chevron-down chev"></i>
    </div>
    <div class="xuLegendBody">
        <div class="xuLRow"><span class="xuDot" style="color:#f59e0b;background:radial-gradient(circle at 30% 30%,#fff,#f59e0b 40%,#b45309)"></span> Bintang = penulis (ukuran = karya)</div>
        <div class="xuLRow"><span class="xuDot" style="color:#6ee7b7;background:radial-gradient(circle at 30% 30%,#fff,#6ee7b7 40%,#059669)"></span> Nebula = topik (ukuran = populer)</div>
        <div class="xuLRow"><span class="xuLine" style="border-color:#059669"></span> Kolaborasi antar penulis</div>
        <div class="xuLRow"><span class="xuLine" style="border-color:#f59e0b;border-top-style:dashed"></span> Penulis → topik</div>
    </div>
</div>

<div id="xuTip"></div>
<div class="xuGalaxyInfo" id="xuInfo"></div>
<a href="<?= base_url() ?>" class="xuGalaxyBack"><i class="fa fa-home"></i> Kembali ke Beranda</a>

<script>
(function(){
  'use strict';
  var canvas=document.getElementById('xuGalaxyCanvas'),ctx=canvas.getContext('2d');
  var W,H,dpr,nodes=[],edges=[],cam={x:0,y:0,z:1},drag=null,hover=null,selected=null,camAnim=null;
  var rotA=0,cosR=1,sinR=0,introStart=0,demoOn=false;
  var settings={labels:false,fx:true,rot:false};
  var stars=[],shoots=[],nextShoot=0;

  function resize(){dpr=Math.min(window.devicePixelRatio||1,2);W=window.innerWidth;H=window.innerHeight;canvas.width=W*dpr;canvas.height=H*dpr;canvas.style.width=W+'px';canvas.style.height=H+'px';ctx.setTransform(dpr,0,0,dpr,0,0);}
  resize();window.addEventListener('resize',resize);
  for(var i=0;i<170;i++)stars.push({x:Math.random()*2-1,y:Math.random()*2-1,s:Math.random()*1.6+0.3,b:Math.random()});

  function w2s(x,y){return{x:(x-cam.x)*cam.z+W/2,y:(y-cam.y)*cam.z+H/2};}
  function s2w(x,y){return{x:(x-W/2)/cam.z+cam.x,y:(y-H/2)/cam.z+cam.y};}
  function rotPt(x,y){return{x:x*cosR-y*sinR,y:x*sinR+y*cosR};}
  function unrotPt(x,y){return{x:x*cosR+y*sinR,y:-x*sinR+y*cosR};}
  function easeOutBack(t){var c=1.70158;t-=1;return 1+t*t*((c+1)*t+c);}
  function easeInOut(t){return t<.5?4*t*t*t:1-Math.pow(-2*t+2,3)/2;}
  function qpt(ax,ay,cx,cy,bx,by,t){var u=1-t;return{x:u*u*ax+2*u*t*cx+t*t*bx,y:u*u*ay+2*u*t*cy+t*t*by};}

  function countTo(id,val){var el=document.getElementById(id),s=null;function st(ts){if(!s)s=ts;var p=Math.min((ts-s)/900,1);el.textContent=Math.floor(val*p);if(p<1)requestAnimationFrame(st);else el.textContent=val;}requestAnimationFrame(st);}
  function showInfo(t){var el=document.getElementById('xuInfo');el.textContent=t;el.classList.add('show');clearTimeout(showInfo._t);showInfo._t=setTimeout(function(){el.classList.remove('show');},2600);}

  // ================= RENDER LOOP =================
  function draw(now){
    ctx.clearRect(0,0,W,H);
    if(settings.rot&&!drag)rotA+=0.00045;
    cosR=Math.cos(rotA);sinR=Math.sin(rotA);
    if(camAnim){var ck=Math.min(1,(now-camAnim.t0)/camAnim.d),ce=easeInOut(ck);cam.x=camAnim.fx+(camAnim.tx-camAnim.fx)*ce;cam.y=camAnim.fy+(camAnim.ty-camAnim.fy)*ce;cam.z=camAnim.fz+(camAnim.tz-camAnim.fz)*ce;if(ck>=1)camAnim=null;}
    var ik=easeOutBack(Math.min(1,(now-introStart)/1400));

    // Nebula latar (EMERALD)
    if(settings.fx){
      var clouds=[['rgba(5,150,105,.08)',.25,.3],['rgba(245,158,11,.06)',.75,.65],['rgba(8,145,178,.05)',.55,.15]];
      clouds.forEach(function(c,i){
        var cx=W*c[1]+Math.sin(now/6000+i*2)*40-cam.x*.03*cam.z,cy=H*c[2]+Math.cos(now/7000+i)*30-cam.y*.03*cam.z;
        var g=ctx.createRadialGradient(cx,cy,0,cx,cy,Math.max(W,H)*.45);
        g.addColorStop(0,c[0]);g.addColorStop(1,'transparent');
        ctx.fillStyle=g;ctx.fillRect(0,0,W,H);
      });
    }
    // Bintang latar berkelip
    stars.forEach(function(s){
      var px=(s.x*.5-cam.x*.04)*cam.z+W/2,py=(s.y*.5-cam.y*.04)*cam.z+H/2;
      ctx.globalAlpha=.25+s.b*.45+(settings.fx?Math.sin(now/600+s.b*10)*.2:0);
      ctx.fillStyle='#fff';ctx.fillRect(px,py,s.s,s.s);
    });
    ctx.globalAlpha=1;
    // Komet (emerald trail)
    if(settings.fx){
      if(now>nextShoot){nextShoot=now+4000+Math.random()*6000;shoots.push({x:Math.random()*W*.8,y:Math.random()*H*.3,vx:7+Math.random()*5,vy:2.5+Math.random()*2,life:1});}
      shoots=shoots.filter(function(s){return s.life>0;});
      shoots.forEach(function(s){
        s.x+=s.vx;s.y+=s.vy;s.life-=.02;
        var g=ctx.createLinearGradient(s.x,s.y,s.x-s.vx*9,s.y-s.vy*9);
        g.addColorStop(0,'rgba(110,231,183,'+(s.life*.9)+')');
        g.addColorStop(.5,'rgba(245,158,11,'+(s.life*.4)+')');
        g.addColorStop(1,'transparent');
        ctx.strokeStyle=g;ctx.lineWidth=1.6;ctx.beginPath();ctx.moveTo(s.x,s.y);ctx.lineTo(s.x-s.vx*9,s.y-s.vy*9);ctx.stroke();
      });
    }

    // Posisi dunia node (intro + goyangan organik)
    nodes.forEach(function(n){
      n.wx=n.sx+(n.fx-n.sx)*ik+Math.sin(now/1500+n.phase)*2.5;
      n.wy=n.sy+(n.fy-n.sy)*ik+Math.cos(now/1700+n.phase)*2.5;
      var rp=rotPt(n.wx,n.wy),sp=w2s(rp.x,rp.y);
      n.px=sp.x;n.py=sp.y;n.pr=n.r*cam.z;
    });

    // Garis (kurva) + partikel energi
    edges.forEach(function(e){
      var a=e.a,b=e.b;
      if(a.px<-60||a.px>W+60||b.px<-60||b.px>W+60)return;
      var mx=(a.px+b.px)/2,my=(a.py+b.py)/2,dx=b.px-a.px,dy=b.py-a.py,len=Math.sqrt(dx*dx+dy*dy)+.01;
      var cx=mx-dy/len*len*.14*e.bend,cy=my+dx/len*len*.14*e.bend;
      ctx.strokeStyle=e.color;ctx.lineWidth=Math.max(.4,e.width*cam.z);ctx.globalAlpha=e.alpha;
      ctx.beginPath();ctx.moveTo(a.px,a.py);ctx.quadraticCurveTo(cx,cy,b.px,b.py);ctx.stroke();
      if(settings.fx&&cam.z>.45&&len>50){
        var tt=((now/2200)+e.off)%1,pp=qpt(a.px,a.py,cx,cy,b.px,b.py,tt);
        ctx.globalAlpha=.9;ctx.fillStyle=e.color;
        ctx.beginPath();ctx.arc(pp.x,pp.y,Math.max(1,1.5*cam.z),0,Math.PI*2);ctx.fill();
      }
    });
    ctx.globalAlpha=1;

    // Node
    nodes.forEach(function(n){
      var r=n.pr,p=n.px,q=n.py;
      if(p<-r*3||p>W+r*3||q<-r*3||q>H+r*3)return;
      var pulse=settings.fx?(1+Math.sin(now/900+n.phase)*.12):1;
      r*=pulse;
      if(n.type==='author'){
        // Bintang penulis — gold hangat
        var g=ctx.createRadialGradient(p,q,0,p,q,r*3.2);
        g.addColorStop(0,'rgba(245,158,11,.55)');g.addColorStop(.35,'rgba(245,158,11,.14)');g.addColorStop(1,'transparent');
        ctx.fillStyle=g;ctx.fillRect(p-r*3.2,q-r*3.2,r*6.4,r*6.4);
        // Duri cahaya bintang
        ctx.save();ctx.translate(p,q);ctx.rotate(now/4000+n.phase);
        ctx.strokeStyle='rgba(245,158,11,'+(0.35*pulse)+')';ctx.lineWidth=1;
        var L=r*2.6;
        ctx.beginPath();ctx.moveTo(-L,0);ctx.lineTo(L,0);ctx.moveTo(0,-L);ctx.lineTo(0,L);ctx.stroke();
        ctx.restore();
        var gr=ctx.createRadialGradient(p-r*.3,q-r*.3,0,p,q,r);
        gr.addColorStop(0,'#fff');gr.addColorStop(.4,'#fde68a');gr.addColorStop(1,'#b45309');
        ctx.fillStyle=gr;ctx.beginPath();ctx.arc(p,q,r,0,Math.PI*2);ctx.fill();
      }else{
        // Nebula topik — emerald/mint
        var g2=ctx.createRadialGradient(p,q,0,p,q,r*3);
        g2.addColorStop(0,'rgba(110,231,183,.45)');g2.addColorStop(.5,'rgba(5,150,105,.12)');g2.addColorStop(1,'transparent');
        ctx.fillStyle=g2;ctx.fillRect(p-r*3,q-r*3,r*6,r*6);
        // Cincin nebula berputar
        ctx.save();ctx.translate(p,q);ctx.rotate(-now/3000+n.phase);
        ctx.strokeStyle='rgba(110,231,183,.45)';ctx.lineWidth=1;
        ctx.beginPath();ctx.ellipse(0,0,r*1.7,r*.7,0,0,Math.PI*2);ctx.stroke();
        ctx.restore();
        var gr2=ctx.createRadialGradient(p-r*.3,q-r*.3,0,p,q,r);
        gr2.addColorStop(0,'#fff');gr2.addColorStop(.5,'#6ee7b7');gr2.addColorStop(1,'#059669');
        ctx.fillStyle=gr2;ctx.beginPath();ctx.arc(p,q,r,0,Math.PI*2);ctx.fill();
      }
      // Cincin hover / terpilih
      if(n===hover||n===selected){
        ctx.strokeStyle=n===selected?'rgba(245,158,11,.9)':'rgba(110,231,183,.7)';
        ctx.lineWidth=1.4;ctx.setLineDash([5,5]);ctx.lineDashOffset=-now/40;
        ctx.beginPath();ctx.arc(p,q,r+7,0,Math.PI*2);ctx.stroke();ctx.setLineDash([]);
        if(n===selected){
          var oa=now/300;
          ctx.fillStyle='#f59e0b';
          ctx.beginPath();ctx.arc(p+Math.cos(oa)*(r+13),q+Math.sin(oa)*(r+13),2.2,0,Math.PI*2);ctx.fill();
        }
      }
      // Label
      if(n===hover||n===selected||settings.labels||r>10){
        ctx.font='700 '+Math.max(10,11*cam.z)+'px system-ui,sans-serif';
        ctx.textAlign='center';
        var txt=n.name.length>26?n.name.substring(0,23)+'…':n.name;
        ctx.lineWidth=3;ctx.strokeStyle='rgba(0,0,0,.85)';
        ctx.fillStyle=n.type==='author'?'#fde68a':'#6ee7b7';
        ctx.strokeText(txt,p,q+r+15*cam.z);ctx.fillText(txt,p,q+r+15*cam.z);
      }
    });

    requestAnimationFrame(draw);
  }

  // ================= GRAPH =================
  function runPhysics(){
    for(var it=0;it<130;it++){
      for(var i=0;i<nodes.length;i++)for(var j=i+1;j<nodes.length;j++){
        var a=nodes[i],b=nodes[j],dx=b.fx-a.fx,dy=b.fy-a.fy,d2=dx*dx+dy*dy+.01,d=Math.sqrt(d2),f=4200/d2;
        a.vx-=dx/d*f;a.vy-=dy/d*f;b.vx+=dx/d*f;b.vy+=dy/d*f;
      }
      edges.forEach(function(e){
        var dx=e.b.fx-e.a.fx,dy=e.b.fy-e.a.fy,d=Math.sqrt(dx*dx+dy*dy)+.01,f=(d-130)*.012;
        e.a.vx+=dx/d*f;e.a.vy+=dy/d*f;e.b.vx-=dx/d*f;e.b.vy-=dy/d*f;
      });
      nodes.forEach(function(n){n.vx-=n.fx*.001;n.vy-=n.fy*.001;n.fx+=n.vx*.3;n.fy+=n.vy*.3;n.vx*=.85;n.vy*=.85;});
    }
  }

  function buildGraph(data){
    nodes=[];edges=[];selected=null;hover=null;
    var nMap={};
    var maxA=Math.max.apply(null,[1].concat(data.authors.map(function(a){return a.works;})));
    data.authors.forEach(function(a,i){
      var ang=(i/Math.max(1,data.authors.length))*Math.PI*2,rad=200+Math.random()*160;
      var n={id:'a'+a.id,type:'author',name:a.name,data:a,fx:Math.cos(ang)*rad,fy:Math.sin(ang)*rad,vx:0,vy:0,phase:Math.random()*6.28,sx:(Math.random()-.5)*60,sy:(Math.random()-.5)*60,r:4+(a.works/maxA)*14};
      nodes.push(n);nMap[n.id]=n;
    });
    var maxT=Math.max.apply(null,[1].concat(data.topics.map(function(t){return t.works;})));
    data.topics.forEach(function(t,i){
      var ang=(i/Math.max(1,data.topics.length))*Math.PI*2+.5,rad=430+Math.random()*90;
      var n={id:'t'+t.id,type:'topic',name:t.name,data:t,fx:Math.cos(ang)*rad,fy:Math.sin(ang)*rad,vx:0,vy:0,phase:Math.random()*6.28,sx:(Math.random()-.5)*60,sy:(Math.random()-.5)*60,r:3+(t.works/maxT)*10};
      nodes.push(n);nMap[n.id]=n;
    });
    // Edge kolaborasi penulis — emerald
    data.coauthor.forEach(function(c,idx){
      var a=nMap['a'+c.from_id],b=nMap['a'+c.to_id];
      if(a&&b)edges.push({a:a,b:b,color:'#059669',width:.3+Math.min(c.weight*.4,2),alpha:.5,bend:idx%2?1:-1,off:Math.random()});
    });
    // Edge penulis-topik — gold (dashed style via dashed stroke on render)
    data.authorTopic.forEach(function(at,idx){
      var a=nMap['a'+at.author_id],t=nMap['t'+at.topic_id];
      if(a&&t)edges.push({a:a,b:t,color:'#f59e0b',width:.3+Math.min(at.weight*.3,1.5),alpha:.28,bend:idx%2?1:-1,off:Math.random()});
    });
    runPhysics();
    introStart=performance.now();
    countTo('xNAuth',data.authors.length);countTo('xNTop',data.topics.length);countTo('xNEdge',edges.length);
  }

  // ================= INTERAKSI =================
  var tip=document.getElementById('xuTip');
  function hitTest(sx,sy){
    var w=s2w(sx,sy);
    for(var i=nodes.length-1;i>=0;i--){
      var n=nodes[i],rp=rotPt(n.wx,n.wy),dx=w.x-rp.x,dy=w.y-rp.y,hr=Math.max(n.r*1.35,10/cam.z);
      if(dx*dx+dy*dy<=hr*hr)return n;
    }
    return null;
  }
  function moveTip(e,n){
    if(!n){tip.classList.remove('show');return;}
    tip.innerHTML='<b>'+n.name+'</b><span>'+(n.type==='author'?'Penulis':'Topik')+' • '+n.data.works+' karya</em></span><em>'+(n.type==='author'?'Klik → profil penulis':'Klik → cari topik')+'</em>';
    tip.style.left=Math.min(W-260,e.clientX+16)+'px';
    tip.style.top=Math.min(H-110,e.clientY+16)+'px';
    tip.classList.add('show');
  }
  canvas.addEventListener('mousedown',function(e){camAnim=null;var n=hitTest(e.clientX,e.clientY);drag=n?{node:n,moved:false}:{cam:true,sx:e.clientX,sy:e.clientY,cx:cam.x,cy:cam.y,moved:false};});
  canvas.addEventListener('mousemove',function(e){
    hover=hitTest(e.clientX,e.clientY);moveTip(e,hover);
    canvas.style.cursor=hover?'pointer':(drag?'grabbing':'grab');
    if(drag){
      if(drag.cam){cam.x=drag.cx-(e.clientX-drag.sx)/cam.z;cam.y=drag.cy-(e.clientY-drag.sy)/cam.z;if(Math.abs(e.clientX-drag.sx)+Math.abs(e.clientY-drag.sy)>4)drag.moved=true;}
      else{var w=s2w(e.clientX,e.clientY),ur=unrotPt(w.x,w.y);drag.node.fx=ur.x;drag.node.fy=ur.y;drag.node.sx=ur.x;drag.node.sy=ur.y;drag.moved=true;}
    }
  });
  canvas.addEventListener('mouseup',function(){
    if(drag&&drag.node&&!drag.moved){
      var n=drag.node;
      if(n.data.id>=9000){showInfo('✨ '+n.name+' — '+(n.type==='author'?'penulis':'topik')+' demo • '+n.data.works+' karya');}
      else if(n.type==='author'){window.location.href='<?= base_url('beranda/author/') ?>'+n.data.id;}
      else{window.location.href='<?= base_url('beranda/search?topic=') ?>'+encodeURIComponent(n.name);}
    }
    drag=null;
  });
  canvas.addEventListener('wheel',function(e){e.preventDefault();camAnim=null;var f=e.deltaY<0?1.15:.87;var b=s2w(e.clientX,e.clientY);cam.z=Math.max(.15,Math.min(4,cam.z*f));var a=s2w(e.clientX,e.clientY);cam.x+=b.x-a.x;cam.y+=b.y-a.y;},{passive:false});
  // Touch
  canvas.addEventListener('touchstart',function(e){if(e.touches.length===1){var t=e.touches[0],n=hitTest(t.clientX,t.clientY);drag=n?{node:n,moved:false}:{cam:true,sx:t.clientX,sy:t.clientY,cx:cam.x,cy:cam.y,moved:false};}},{passive:true});
  canvas.addEventListener('touchmove',function(e){e.preventDefault();if(e.touches.length===1&&drag){var t=e.touches[0];if(drag.cam){cam.x=drag.cx-(t.clientX-drag.sx)/cam.z;cam.y=drag.cy-(t.clientY-drag.sy)/cam.z;}else{var w=s2w(t.clientX,t.clientY),ur=unrotPt(w.x,w.y);drag.node.fx=ur.x;drag.node.fy=ur.y;}}},{passive:false});
  canvas.addEventListener('touchend',function(){if(drag&&drag.node&&!drag.moved){var n=drag.node;if(n.data.id<9000){if(n.type==='author')window.location.href='<?= base_url('beranda/author/') ?>'+n.data.id;else window.location.href='<?= base_url('beranda/search?topic=') ?>'+encodeURIComponent(n.name);}}drag=null;});

  // Kontrol global
  window.xuZoom=function(f){var b=s2w(W/2,H/2);cam.z=Math.max(.15,Math.min(4,cam.z*f));var a=s2w(W/2,H/2);cam.x+=b.x-a.x;cam.y+=b.y-a.y;};
  window.xuReset=function(){camAnim={t0:performance.now(),d:700,fx:cam.x,fy:cam.y,fz:cam.z,tx:0,ty:0,tz:1};rotA=0;selected=null;};
  window.xuToggle=function(k){settings[k]=!settings[k];var id=k==='labels'?'xuTLabels':k==='fx'?'xuTFx':'xuTRot';document.getElementById(id).classList.toggle('on',settings[k]);};
  function flyTo(n){selected=n;var rp=rotPt(n.wx,n.wy);camAnim={t0:performance.now(),d:950,fx:cam.x,fy:cam.y,fz:cam.z,tx:rp.x,ty:rp.y,tz:Math.max(1.6,cam.z)};showInfo('🎯 '+n.name);}

  // Pencarian
  var sIn=document.getElementById('xuSearch'),sList=document.getElementById('xuSearchList');
  sIn.addEventListener('input',function(){
    var q=sIn.value.trim().toLowerCase();
    if(q.length<2){sList.classList.remove('show');return;}
    var hits=nodes.filter(function(n){return n.name.toLowerCase().indexOf(q)>-1;}).slice(0,8);
    if(!hits.length){sList.classList.remove('show');return;}
    sList.innerHTML=hits.map(function(n,i){return '<div class="xuSItem" data-i="'+i+'"><i class="'+(n.type==='author'?'a fa fa-star':'t fa fa-cloud')+'"></i>'+n.name+'<small>'+n.data.works+' karya</small></div>';}).join('');
    sList.classList.add('show');
    sList._hits=hits;
  });
  sIn.addEventListener('keydown',function(e){if(e.key==='Enter'&&sList._hits&&sList._hits[0]){flyTo(sList._hits[0]);sList.classList.remove('show');sIn.blur();}});
  sList.addEventListener('mousedown',function(e){var it=e.target.closest('.xuSItem');if(it&&sList._hits){flyTo(sList._hits[+it.getAttribute('data-i')]);sList.classList.remove('show');}});

  // Mode demo
  window.xuDemo=function(){
    if(demoOn){location.reload();return;}
    demoOn=true;
    var synth={authors:[],topics:[],coauthor:[],authorTopic:[]};
    var names=['Rina','Budi','Sari','Andi','Dewi','Eko','Fitri','Gilang','Hana','Intan','Joko','Kartika','Lukman','Maya','Nina','Omar','Putri','Raka','Sinta','Tono','Umar','Vina','Wati','Yoga','Zahra'];
    var tops=['Machine Learning','Kesehatan Masyarakat','Bioteknologi','Pendidikan','Ekonomi Digital','Lingkungan','Hukum Kesehatan','Genetika','Farmasi','Gizi'];
    names.forEach(function(n,i){synth.authors.push({id:9000+i,name:n+' (demo)',works:1+Math.floor(Math.random()*8)});});
    tops.forEach(function(t,i){synth.topics.push({id:900+i,name:t,works:2+Math.floor(Math.random()*10)});});
    for(var i=0;i<names.length;i++){
      if(i>0&&Math.random()<.6)synth.coauthor.push({from_id:9000+i,to_id:9000+Math.floor(Math.random()*i),weight:1+Math.floor(Math.random()*3)});
      var t1=Math.floor(Math.random()*tops.length);
      synth.authorTopic.push({author_id:9000+i,topic_id:900+t1,weight:1+Math.floor(Math.random()*4)});
      if(Math.random()<.5)synth.authorTopic.push({author_id:9000+i,topic_id:900+((t1+1)%tops.length),weight:1});
    }
    buildGraph(synth);
    showInfo('✨ Mode Demo aktif — klik 🪄 lagi untuk kembali ke data asli');
  };

  // Muat data
  fetch('<?= base_url('beranda/galaxy/data') ?>')
    .then(function(r){return r.json();})
    .then(function(data){
      if(!data.authors||!data.authors.length){document.querySelector('.xuLoadTxt').textContent='GALAKSI KOSONG — BELUM ADA DATA PENULIS';return;}
      buildGraph(data);
      requestAnimationFrame(draw);
      setTimeout(function(){document.getElementById('xuLoader').classList.add('hide');},500);
    })
    .catch(function(){document.querySelector('.xuLoadTxt').textContent='GAGAL MEMUAT DATA GALAKSI';});
})();
</script>