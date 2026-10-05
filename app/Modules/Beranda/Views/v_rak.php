<style>
/* ================================================================
   DIFOSS RAK VIRTUAL 3D — EMERALD FOREST EDITION (FINAL)
   ================================================================ */
:root{
    --rv-emerald:#059669; --rv-teal:#0891b2; --rv-gold:#f59e0b;
    --rv-mint:#6ee7b7; --rv-deep:#0a2920; --rv-mid:#064e3b;
    --rv-txt:#f1f5f9;
}

html,body{background:#040f0c!important;overflow:hidden!important;margin:0!important}

#xuRakWrap{position:fixed;inset:0;z-index:9990}
#xuRakCanvas{width:100%;height:100%;display:block}

/* ===== PANEL GLASS ===== */
.xuRakPanel{
    position:fixed;z-index:9995;
    background:rgba(10,41,32,.82);
    backdrop-filter:blur(16px) saturate(1.4);
    -webkit-backdrop-filter:blur(16px) saturate(1.4);
    border:1px solid rgba(5,150,105,.3);
    border-radius:16px;
    color:var(--rv-txt);
    box-shadow:0 18px 50px rgba(0,0,0,.55),inset 0 1px 0 rgba(255,255,255,.06);
    overflow:hidden;
}
.xuRakPanel::before{
    content:'';position:absolute;top:0;left:0;right:0;height:2px;
    background:linear-gradient(90deg,transparent,var(--rv-emerald),var(--rv-gold),var(--rv-teal),transparent);
}

/* ===== HEADER ===== */
.xuRakHead{top:20px;left:20px;max-width:380px;padding:18px 22px}
.xuRakHead h1{
    margin:0;font-family:'Neuton',Georgia,serif;
    font-size:1.3rem;font-weight:700;letter-spacing:-.02em;
    background:linear-gradient(90deg,var(--rv-mint),var(--rv-gold),var(--rv-teal));
    background-size:200% 100%;
    -webkit-background-clip:text;background-clip:text;color:transparent;
    animation:rvGrad 6s linear infinite;
}
@keyframes rvGrad{to{background-position:200% 0}}
.xuRakHead p{margin:8px 0 0;font-size:.78rem;color:#94a3b8;line-height:1.55}

/* ===== CONTROLS ===== */
.xuRakCtrls{top:20px;right:20px;padding:10px;display:flex;flex-direction:column;gap:7px;width:max-content}
.xuRakBtn{
    width:44px;height:44px;border-radius:12px;
    border:1px solid rgba(5,150,105,.3);
    background:rgba(255,255,255,.04);
    color:var(--rv-txt);cursor:pointer;
    display:flex;align-items:center;justify-content:center;
    font-size:1rem;transition:.25s;
}
.xuRakBtn:hover{
    background:linear-gradient(135deg,rgba(5,150,105,.25),rgba(245,158,11,.2));
    transform:scale(1.08);
    border-color:rgba(5,150,105,.55);
    box-shadow:0 8px 22px rgba(5,150,105,.3);
}

/* ===== HINT BAR ===== */
.xuRakHint{
    bottom:20px;left:50%;transform:translateX(-50%);
    padding:12px 24px;font-size:.82rem;
    display:flex;gap:14px;align-items:center;
    flex-wrap:wrap;justify-content:center;
    max-width:calc(100vw - 40px);
}
.xuRakHint .xuK{
    background:rgba(5,150,105,.12);
    border:1px solid rgba(5,150,105,.3);
    border-radius:6px;padding:3px 10px;
    font-weight:800;color:var(--rv-mint);
    font-size:.72rem;font-family:'JetBrains Mono',monospace;
}
.xuRakHint .xuK i{margin-right:4px;color:var(--rv-gold)}

/* ===== BOOK INFO PANEL ===== */
.xuRakBookInfo{
    position:fixed;bottom:100px;left:50%;
    transform:translateX(-50%);z-index:9996;
    background:rgba(10,41,32,.95);
    backdrop-filter:blur(16px);-webkit-backdrop-filter:blur(16px);
    border:1.5px solid var(--rv-emerald);
    border-radius:18px;padding:18px 24px;
    min-width:320px;max-width:480px;
    display:none;color:var(--rv-txt);
    box-shadow:0 24px 60px rgba(0,0,0,.7),0 0 40px rgba(5,150,105,.2);
}
.xuRakBookInfo.show{display:block;animation:xuPop .35s cubic-bezier(.2,.9,.3,1.3)}
@keyframes xuPop{from{opacity:0;transform:translateX(-50%) translateY(12px)}to{opacity:1;transform:translateX(-50%) translateY(0)}}
.xuRakBookInfo h3{
    margin:0 0 8px;font-family:'Neuton',Georgia,serif;
    font-size:1.1rem;font-weight:700;color:#fff;line-height:1.4;letter-spacing:-.01em;
}
.xuRakBookInfo .meta{display:flex;gap:8px;flex-wrap:wrap;margin-bottom:14px}
.xuRakBookInfo .chip{
    padding:4px 11px;border-radius:999px;font-size:.7rem;font-weight:800;letter-spacing:.04em;
    background:rgba(5,150,105,.18);color:var(--rv-mint);border:1px solid rgba(5,150,105,.35);
}
.xuRakBookInfo .chip.gold{background:rgba(245,158,11,.15);color:#fde68a;border:1px solid rgba(245,158,11,.4)}
.xuRakBookInfo a{
    display:inline-flex;align-items:center;gap:8px;margin-top:6px;
    padding:10px 20px;border-radius:11px;
    background:linear-gradient(90deg,var(--rv-emerald),var(--rv-gold));
    color:#fff;font-weight:800;font-size:.85rem;text-decoration:none;
    box-shadow:0 10px 24px rgba(5,150,105,.35);
    position:relative;overflow:hidden;transition:.25s;
}
.xuRakBookInfo a::before{
    content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;
    background:linear-gradient(100deg,transparent 20%,rgba(255,255,255,.3) 50%,transparent 80%);
    transition:left .6s ease;
}
.xuRakBookInfo a:hover{transform:translateY(-2px);filter:brightness(1.08);box-shadow:0 14px 30px rgba(5,150,105,.45)}
.xuRakBookInfo a:hover::before{left:120%}
.xuRakBookInfo .close{
    position:absolute;top:10px;right:14px;background:none;border:none;
    color:#94a3b8;font-size:1.1rem;cursor:pointer;transition:.2s;
}
.xuRakBookInfo .close:hover{color:var(--rv-mint);transform:rotate(90deg)}

/* ===== LOADER ===== */
.xuRakLoader{
    position:fixed;inset:0;z-index:9999;
    background:linear-gradient(135deg,#040f0c 0%,#0a2920 55%,#064e3b 100%);
    display:flex;flex-direction:column;align-items:center;justify-content:center;
    gap:22px;color:var(--rv-txt);transition:opacity .7s;
}
.xuRakLoader.hide{opacity:0;pointer-events:none}
.xuRakSpin{width:72px;height:72px;position:relative}
.xuRakSpin::before,.xuRakSpin::after{content:'';position:absolute;inset:0;border-radius:14px;border:3px solid transparent}
.xuRakSpin::before{border-top-color:var(--rv-emerald);animation:xuSpin 1.2s linear infinite}
.xuRakSpin::after{border-bottom-color:var(--rv-gold);animation:xuSpin 1.8s linear infinite reverse}
@keyframes xuSpin{to{transform:rotate(360deg)}}
.xuRakLoadTxt{
    font-family:'Plus Jakarta Sans',sans-serif;font-size:.88rem;font-weight:800;letter-spacing:.12em;
    background:linear-gradient(90deg,var(--rv-mint),var(--rv-gold));
    -webkit-background-clip:text;background-clip:text;-webkit-text-fill-color:transparent;
}

/* ===== BACK BUTTON ===== */
.xuRakBack{
    position:fixed;top:20px;left:50%;transform:translateX(-50%);z-index:9996;
    padding:10px 22px;background:rgba(10,41,32,.85);
    backdrop-filter:blur(10px);-webkit-backdrop-filter:blur(10px);
    border:1px solid rgba(5,150,105,.35);border-radius:999px;
    color:var(--rv-txt);font-weight:700;text-decoration:none;font-size:.82rem;
    transition:.25s;display:flex;align-items:center;gap:8px;
}
.xuRakBack:hover{border-color:var(--rv-gold);color:var(--rv-gold);transform:translateX(-50%) translateY(-2px);box-shadow:0 10px 26px rgba(245,158,11,.25)}

/* ===== CROSSHAIR ===== */
.xuRakCrosshair{
    position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);
    width:18px;height:18px;pointer-events:none;z-index:9994;opacity:.35;
}
.xuRakCrosshair::before,.xuRakCrosshair::after{
    content:'';position:absolute;
    background:linear-gradient(90deg,var(--rv-mint),var(--rv-gold));
    border-radius:2px;box-shadow:0 0 6px rgba(110,231,183,.6);
}
.xuRakCrosshair::before{left:50%;top:0;width:2px;height:100%;transform:translateX(-50%)}
.xuRakCrosshair::after{top:50%;left:0;width:100%;height:2px;transform:translateY(-50%)}

@media(max-width:640px){
    .xuRakHead{max-width:calc(100% - 90px);width:auto}
    .xuRakHint{font-size:.72rem;padding:10px 16px;gap:8px}
    .xuRakBookInfo{min-width:280px;max-width:calc(100% - 32px);padding:16px 18px}
}
</style>

<div class="xuRakLoader" id="xuRakLoader">
    <div class="xuRakSpin"></div>
    <div class="xuRakLoadTxt">MEMPERSIAPKAN RAK VIRTUAL DIFOSS…</div>
</div>

<div id="xuRakWrap"></div>
<div class="xuRakCrosshair"></div>

<div class="xuRakPanel xuRakHead">
    <h1>📚 Rak Virtual 3D</h1>
    <p>Klik buku berpenanda emas untuk lihat detail — atau klik ▶ / area kosong untuk mode jelajah WASD.</p>
</div>

<div class="xuRakPanel xuRakCtrls">
    <button class="xuRakBtn" id="xuRakPlay" title="Masuk mode jelajah (klik untuk kunci mouse)"><i class="fa fa-play"></i></button>
    <button class="xuRakBtn" onclick="xuRakReset()" title="Reset posisi"><i class="fa fa-home"></i></button>
    <button class="xuRakBtn" onclick="xuRakAutoRotate()" id="xuRakRotBtn" title="Rotasi otomatis"><i class="fa fa-refresh"></i></button>
</div>

<div class="xuRakPanel xuRakHint">
    <span><span class="xuK"><i class="fa fa-hand-pointer-o"></i>Klik Buku</span> Buka Detail</span>
    <span><span class="xuK"><i class="fa fa-arrows"></i>WASD</span> Jalan</span>
    <span><span class="xuK"><i class="fa fa-mouse-pointer"></i>Mouse</span> Lihat</span>
    <span><span class="xuK">ESC</span> Keluar mode</span>
</div>

<div class="xuRakBookInfo" id="xuRakInfo">
    <button class="close" onclick="document.getElementById('xuRakInfo').classList.remove('show')">✕</button>
    <h3 id="xuRakInfoTitle"></h3>
    <div class="meta">
        <span class="chip" id="xuRakInfoDept"></span>
        <span class="chip gold" id="xuRakInfoYear"></span>
    </div>
    <a id="xuRakInfoLink" href="#"><i class="fa fa-book"></i> Buka Dokumen</a>
</div>

<a href="<?= base_url() ?>" class="xuRakBack"><i class="fa fa-home"></i> Kembali ke Beranda</a>

<script>
/* Pemuat Three.js mandiri + 3 CDN cadangan */
(function(){
    var SOURCES = [
        'https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js',
        'https://unpkg.com/three@0.149.0/build/three.min.js',
        'https://cdn.jsdelivr.net/npm/three@0.149.0/build/three.min.js'
    ];
    function tryLoad(i){
        if (i >= SOURCES.length){
            document.querySelector('.xuRakLoadTxt').textContent = 'Three.js tidak dapat dimuat dari semua CDN — periksa firewall/antivirus';
            return;
        }
        var s = document.createElement('script');
        s.src = SOURCES[i];
        s.onload = function(){ if (window.__xuRakInit) window.__xuRakInit(); };
        s.onerror = function(){ tryLoad(i + 1); };
        document.head.appendChild(s);
    }
    if (window.THREE) { if (window.__xuRakInit) window.__xuRakInit(); } else { tryLoad(0); }
})();
</script>
<script>
window.__xuRakInit = function(){
    if (!window.THREE) {
        document.querySelector('.xuRakLoadTxt').textContent = 'Three.js gagal dimuat — periksa koneksi internet';
        return;
    }

    var wrap = document.getElementById('xuRakWrap');
    var scene = new THREE.Scene();
    scene.background = new THREE.Color(0x0a2920);
    scene.fog = new THREE.Fog(0x0a2920, 15, 60);

    var camera = new THREE.PerspectiveCamera(65, window.innerWidth/window.innerHeight, 0.1, 200);
    camera.position.set(0, 1.6, 8);

    var renderer = new THREE.WebGLRenderer({antialias:true});
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
    renderer.setSize(window.innerWidth, window.innerHeight);
    renderer.shadowMap.enabled = true;
    renderer.shadowMap.type = THREE.PCFSoftShadowMap;
    wrap.appendChild(renderer.domElement);

    // Lantai, grid, langit-langit
    var floor = new THREE.Mesh(new THREE.PlaneGeometry(80, 80), new THREE.MeshStandardMaterial({color:0x0a1f1a, roughness:.75, metalness:.15}));
    floor.rotation.x = -Math.PI/2; floor.receiveShadow = true;
    scene.add(floor);
    var grid = new THREE.GridHelper(80, 40, 0x059669, 0x064e3b);
    grid.position.y = 0.01; scene.add(grid);
    var ceil = new THREE.Mesh(new THREE.PlaneGeometry(80, 80), new THREE.MeshStandardMaterial({color:0x06181a, roughness:1}));
    ceil.rotation.x = Math.PI/2; ceil.position.y = 4; scene.add(ceil);

    // Cahaya
    scene.add(new THREE.AmbientLight(0x6ee7b7, 0.35));
    var dir = new THREE.DirectionalLight(0xffd9a0, 0.85);
    dir.position.set(5, 10, 5); dir.castShadow = true;
    dir.shadow.mapSize.set(1024, 1024);
    dir.shadow.camera.left = -25; dir.shadow.camera.right = 25;
    dir.shadow.camera.top = 25; dir.shadow.camera.bottom = -25;
    scene.add(dir);

    function addLamp(x, z){
        var p = new THREE.PointLight(0xffc86b, 1.2, 12, 2);
        p.position.set(x, 3.6, z); scene.add(p);
        var bulb = new THREE.Mesh(new THREE.SphereGeometry(0.12, 16, 16), new THREE.MeshBasicMaterial({color:0xfff0c0}));
        bulb.position.copy(p.position); scene.add(bulb);
        var cord = new THREE.Mesh(new THREE.CylinderGeometry(.01,.01,.4,8), new THREE.MeshStandardMaterial({color:0x0a2920}));
        cord.position.set(x, 3.8, z); scene.add(cord);
    }

    // Kayu walnut + trim emerald
    function woodTexture(){
        var c = document.createElement('canvas'); c.width = 256; c.height = 256;
        var x = c.getContext('2d');
        var g = x.createLinearGradient(0,0,256,0);
        g.addColorStop(0,'#3a2817'); g.addColorStop(.5,'#5a3a24'); g.addColorStop(1,'#3a2817');
        x.fillStyle = g; x.fillRect(0,0,256,256);
        x.fillStyle = 'rgba(5,150,105,.08)'; x.fillRect(0,0,256,256);
        x.strokeStyle = 'rgba(0,0,0,.22)'; x.lineWidth = 1;
        for (var i=0;i<40;i++){
            x.beginPath(); x.moveTo(0, i*6 + Math.random()*3);
            x.bezierCurveTo(80, i*6+Math.random()*4, 180, i*6-Math.random()*4, 256, i*6+Math.random()*3);
            x.stroke();
        }
        var t = new THREE.CanvasTexture(c);
        t.wrapS = t.wrapT = THREE.RepeatWrapping; t.repeat.set(2, 2);
        return t;
    }
    var woodMat = new THREE.MeshStandardMaterial({map:woodTexture(), roughness:.82, metalness:.08});
    var trimMat = new THREE.MeshStandardMaterial({color:0x059669, roughness:.3, metalness:.6, emissive:0x059669, emissiveIntensity:.15});

    var shelves = [];
    var books = [];      // buku asli (interaktif)
    var beacons = [];    // penanda emas buku asli

    function buildShelf(x, z, rotY){
        var g = new THREE.Group();
        var pilar = new THREE.BoxGeometry(.15, 3, .5);
        var p1 = new THREE.Mesh(pilar, woodMat); p1.position.set(-1.5, 1.5, 0); p1.castShadow = true; g.add(p1);
        var p2 = new THREE.Mesh(pilar, woodMat); p2.position.set( 1.5, 1.5, 0); p2.castShadow = true; g.add(p2);
        for (var i=0;i<4;i++){
            var sh = new THREE.Mesh(new THREE.BoxGeometry(3.3, .08, .55), woodMat);
            sh.position.set(0, 0.1 + i*0.85, 0);
            sh.receiveShadow = true; sh.castShadow = true;
            g.add(sh);
            var trim = new THREE.Mesh(new THREE.BoxGeometry(3.3, .025, .025), trimMat);
            trim.position.set(0, 0.14 + i*0.85, .27); g.add(trim);
        }
        var top = new THREE.Mesh(new THREE.BoxGeometry(3.3, .12, .55), woodMat);
        top.position.set(0, 3.05, 0); g.add(top);
        var crown = new THREE.Mesh(new THREE.BoxGeometry(3.3, .03, .03), trimMat);
        crown.position.set(0, 3.12, .27); g.add(crown);
        g.position.set(x, 0, z); g.rotation.y = rotY || 0;
        scene.add(g);
        shelves.push({group:g, x:x, z:z});
        addLamp(x, z);
    }

    var layout = [
        {x:-6, z: 0, r:0}, {x:-3, z:-5, r:Math.PI/6}, {x:3, z:-5, r:-Math.PI/6},
        {x: 6, z: 0, r:Math.PI}, {x: 3, z: 5, r:Math.PI-Math.PI/6}, {x:-3, z: 5, r:Math.PI+Math.PI/6},
        {x: 0, z:-8, r:0}, {x: 0, z: 8, r:Math.PI}
    ];
    layout.forEach(function(L){ buildShelf(L.x, L.z, L.r); });

    // Sampul prosedural palet emerald
    function makeCoverTexture(title){
        var c = document.createElement('canvas'); c.width = 256; c.height = 360;
        var x = c.getContext('2d');
        var palettes = [{h1:160,h2:180},{h1:35,h2:25},{h1:195,h2:215},{h1:165,h2:145},{h1:40,h2:20},{h1:175,h2:195}];
        var pal = palettes[Math.floor(Math.random()*palettes.length)];
        var g = x.createLinearGradient(0,0,256,360);
        g.addColorStop(0,'hsl('+pal.h1+',62%,38%)');
        g.addColorStop(1,'hsl('+pal.h2+',70%,22%)');
        x.fillStyle = g; x.fillRect(0,0,256,360);
        x.fillStyle = 'rgba(245,158,11,.35)'; x.fillRect(0,0,256,6);
        x.fillStyle = 'rgba(255,255,255,.14)'; x.fillRect(0,6,256,46);
        x.fillStyle = 'rgba(255,255,255,.95)'; x.font = 'bold 21px sans-serif'; x.textAlign = 'center';
        var words = (title || 'Dokumen').split(' '), line = '', y = 110;
        for (var i=0; i<words.length && y<300; i++){
            var test = line + words[i] + ' ';
            if (x.measureText(test).width > 216 && line){ x.fillText(line, 128, y); line = words[i]+' '; y += 30; }
            else line = test;
        }
        if (line) x.fillText(line, 128, y);
        x.fillStyle = 'rgba(245,158,11,.8)'; x.font = 'bold 15px sans-serif';
        x.fillText('DIFOSS', 128, 332);
        return new THREE.CanvasTexture(c);
    }

    function buildSlots(){
        var slots = [];
        shelves.forEach(function(S){
            for (var row=0; row<4; row++){
                var y = 0.18 + row*0.85;
                for (var i=0; i<8; i++){
                    slots.push({sx:S.x, sz:S.z, rot:S.group.rotation.y, lx:-1.35 + i*0.39, ly:y, lz:0});
                }
            }
        });
        slots.sort(function(){return Math.random()-.5;});
        return slots;
    }
    function worldFromSlot(slot){
        var cosR = Math.cos(slot.rot), sinR = Math.sin(slot.rot);
        return { x: slot.sx + slot.lx*cosR - slot.lz*sinR, z: slot.sz + slot.lx*sinR + slot.lz*cosR };
    }

    // ===== BUKU ASLI + PENANDA EMAS =====
    function placeBooks(list, slots){
        var loader = new THREE.TextureLoader();
        loader.crossOrigin = 'anonymous';
        var placed = 0;
        list.forEach(function(b, idx){
            if (idx >= slots.length) return;
            var slot = slots[idx];
            var imgUrl = baseUrl + 'uploads/images/docs/' + b.image;
            var w = 0.18 + Math.random()*0.08;
            var h = 0.55 + Math.random()*0.18;
            var paperMat = new THREE.MeshStandardMaterial({color:0xf5ecd8, roughness:.9});
            var spineColors = [0x059669, 0x0891b2, 0xf59e0b, 0x6ee7b7, 0x064e3b];
            var backMat = new THREE.MeshStandardMaterial({color:spineColors[Math.floor(Math.random()*spineColors.length)], roughness:.85, metalness:.08});
            var book = new THREE.Mesh(new THREE.BoxGeometry(w, h, 0.38), [paperMat,paperMat,paperMat,paperMat,paperMat,backMat]);
            book.castShadow = true; book.receiveShadow = true;
            book.userData = {biblio:b};
            if (b.image) {
                loader.load(imgUrl, function(tex){
                    if (tex.encoding !== undefined) tex.encoding = THREE.sRGBEncoding;
                    else if (tex.colorSpace !== undefined) tex.colorSpace = 'srgb';
                    book.material[4] = new THREE.MeshStandardMaterial({map:tex, roughness:.6});
                }, undefined, function(){
                    book.material[4] = new THREE.MeshBasicMaterial({map:makeCoverTexture(b.title)});
                });
            } else {
                book.material[4] = new THREE.MeshBasicMaterial({map:makeCoverTexture(b.title)});
            }
            var wp = worldFromSlot(slot);
            book.position.set(wp.x, slot.ly + h/2, wp.z);
            book.rotation.y = slot.rot;
            scene.add(book);
            books.push(book);

            // Penanda emas: bola bercahaya + sinar vertikal (mengambang animasi)
            var by = slot.ly + h + 0.14;
            var beacon = new THREE.Mesh(new THREE.SphereGeometry(0.05, 12, 12), new THREE.MeshBasicMaterial({color:0xfbbf24}));
            beacon.position.set(wp.x, by, wp.z);
            var beam = new THREE.Mesh(new THREE.CylinderGeometry(0.008, 0.008, 0.4, 6), new THREE.MeshBasicMaterial({color:0xfbbf24, transparent:true, opacity:.4}));
            beam.position.set(wp.x, by + 0.24, wp.z);
            scene.add(beacon); scene.add(beam);
            beacons.push({mesh:beacon, y:by, ph:Math.random()*6.28});

            placed++;
        });
        return placed;
    }

    // ===== BUKU DEKORATIF (pengisi rak) =====
    function fillDeco(slots, startIdx){
        var spineColors = [0x059669,0x0891b2,0xf59e0b,0x6ee7b7,0x064e3b,0x134e4a,0x78350f];
        var paperMat = new THREE.MeshStandardMaterial({color:0xf5ecd8, roughness:.9});
        for (var i=startIdx; i<slots.length; i++){
            if (Math.random() < 0.25) continue;
            var slot = slots[i];
            var w = 0.16 + Math.random()*0.1;
            var h = 0.5 + Math.random()*0.22;
            var mat = new THREE.MeshStandardMaterial({color:spineColors[Math.floor(Math.random()*spineColors.length)], roughness:.85, metalness:.05});
            var deco = new THREE.Mesh(new THREE.BoxGeometry(w, h, 0.36), [paperMat,paperMat,paperMat,paperMat,mat,mat]);
            var wp = worldFromSlot(slot);
            deco.position.set(wp.x, slot.ly + h/2, wp.z);
            deco.rotation.y = slot.rot;
            deco.castShadow = true; deco.receiveShadow = true;
            scene.add(deco);
        }
    }

    // ===== KONTROL =====
    var yaw = Math.PI, pitch = 0;
    var keys = {w:false, a:false, s:false, d:false};
    var locked = false, autoRotate = false;
    var velocity = new THREE.Vector3();
    var ray = new THREE.Raycaster();
    var mouse = new THREE.Vector2();

    function showBookInfo(b){
        document.getElementById('xuRakInfoTitle').textContent = b.title;
        document.getElementById('xuRakInfoDept').textContent = b.departement || '—';
        document.getElementById('xuRakInfoYear').textContent = b.publish_year || '—';
        document.getElementById('xuRakInfoLink').href = baseUrl + 'beranda/detail/' + (window.slim_encrypt ? slim_encrypt(b.biblio_id) : b.biblio_id);
        document.getElementById('xuRakInfo').classList.add('show');
    }

    document.addEventListener('keydown', function(e){
        var k = e.key.toLowerCase();
        if (k in keys) keys[k] = true;
        if (e.key === 'Escape' && locked) document.exitPointerLock && document.exitPointerLock();
    });
    document.addEventListener('keyup', function(e){
        var k = e.key.toLowerCase();
        if (k in keys) keys[k] = false;
    });
    document.addEventListener('mousemove', function(e){
        if (!locked) return;
        yaw   -= e.movementX * 0.0025;
        pitch -= e.movementY * 0.0025;
        pitch = Math.max(-1.3, Math.min(1.3, pitch));
    });
    document.addEventListener('pointerlockchange', function(){
        locked = (document.pointerLockElement === renderer.domElement);
        document.querySelector('.xuRakCrosshair').style.opacity = locked ? '.75' : '.35';
        document.getElementById('xuRakPlay').innerHTML = locked ? '<i class="fa fa-pause"></i>' : '<i class="fa fa-play"></i>';
    });
    document.getElementById('xuRakPlay').addEventListener('click', function(){
        if (locked) document.exitPointerLock && document.exitPointerLock();
        else renderer.domElement.requestPointerLock && renderer.domElement.requestPointerLock();
    });

    // ===== KLIK BUKU: LANGSUNG (tanpa lock) ATAU crosshair (saat lock) =====
    renderer.domElement.addEventListener('click', function(e){
        if (!locked) {
            // Raycast dari posisi mouse: klik buku = buka detail; klik kosong = mode jelajah
            var rect = renderer.domElement.getBoundingClientRect();
            mouse.x = ((e.clientX - rect.left)/rect.width)*2 - 1;
            mouse.y = -((e.clientY - rect.top)/rect.height)*2 + 1;
            ray.setFromCamera(mouse, camera);
            var hits = ray.intersectObjects(books);
            if (hits.length){ showBookInfo(hits[0].object.userData.biblio); return; }
            renderer.domElement.requestPointerLock && renderer.domElement.requestPointerLock();
            return;
        }
        ray.setFromCamera(new THREE.Vector2(0,0), camera);
        var hits = ray.intersectObjects(books);
        if (hits.length) showBookInfo(hits[0].object.userData.biblio);
    });

    // Kursor pointer saat hover buku asli (mode bebas)
    renderer.domElement.addEventListener('mousemove', function(e){
        if (locked) return;
        var rect = renderer.domElement.getBoundingClientRect();
        mouse.x = ((e.clientX - rect.left)/rect.width)*2 - 1;
        mouse.y = -((e.clientY - rect.top)/rect.height)*2 + 1;
        ray.setFromCamera(mouse, camera);
        renderer.domElement.style.cursor = ray.intersectObjects(books).length ? 'pointer' : 'grab';
    });

    window.xuRakReset = function(){
        camera.position.set(0, 1.6, 8);
        yaw = Math.PI; pitch = 0;
        velocity.set(0,0,0);
    };
    window.xuRakAutoRotate = function(){
        autoRotate = !autoRotate;
        document.getElementById('xuRakRotBtn').style.background = autoRotate ? 'rgba(5,150,105,.35)' : 'rgba(255,255,255,.04)';
    };

    window.addEventListener('resize', function(){
        camera.aspect = window.innerWidth/window.innerHeight;
        camera.updateProjectionMatrix();
        renderer.setSize(window.innerWidth, window.innerHeight);
    });

    // ===== LOOP ANIMASI =====
    var clock = new THREE.Clock();
    function animate(){
        requestAnimationFrame(animate);
        var dt = Math.min(clock.getDelta(), 0.1);
        var t = clock.elapsedTime;

        if (autoRotate && !locked) yaw += dt * 0.15;

        var speed = 4;
        var fwd = new THREE.Vector3(-Math.sin(yaw), 0, -Math.cos(yaw));
        var right = new THREE.Vector3(Math.cos(yaw), 0, -Math.sin(yaw));
        var move = new THREE.Vector3();
        if (keys.w) move.add(fwd);
        if (keys.s) move.sub(fwd);
        if (keys.d) move.add(right);
        if (keys.a) move.sub(right);
        if (move.lengthSq() > 0) move.normalize().multiplyScalar(speed*dt);
        velocity.lerp(move, 0.25);
        camera.position.add(velocity);
        camera.position.x = Math.max(-35, Math.min(35, camera.position.x));
        camera.position.z = Math.max(-35, Math.min(35, camera.position.z));
        camera.position.y = 1.6;
        camera.rotation.order = 'YXZ';
        camera.rotation.y = yaw;
        camera.rotation.x = pitch;

        // Penanda emas mengambang
        for (var i=0;i<beacons.length;i++){
            var bc = beacons[i];
            bc.mesh.position.y = bc.y + Math.sin(t*2 + bc.ph)*0.05;
        }

        // Hover highlight saat lock
        if (locked) {
            ray.setFromCamera(new THREE.Vector2(0,0), camera);
            var hits = ray.intersectObjects(books);
            books.forEach(function(b){ b.scale.set(1,1,1); });
            if (hits.length) hits[0].object.scale.set(1.08, 1.08, 1.08);
        }

        renderer.render(scene, camera);
    }

    // ===== MUAT DATA + ISI RAK =====
    fetch(baseUrl + 'beranda/rak/data')
        .then(function(r){ return r.json(); })
        .then(function(list){
            list = list || [];
            var slots = buildSlots();
            var n = placeBooks(list, slots);
            fillDeco(slots, Math.min(list.length, slots.length));
            document.querySelector('.xuRakLoadTxt').textContent = n
                ? 'Memuat ' + n + ' buku koleksi…'
                : 'Menata rak koleksi…';
            setTimeout(function(){ document.getElementById('xuRakLoader').classList.add('hide'); }, 600);
            animate();
        })
        .catch(function(){
            fillDeco(buildSlots(), 0);
            document.querySelector('.xuRakLoadTxt').textContent = 'Menata rak koleksi…';
            setTimeout(function(){ document.getElementById('xuRakLoader').classList.add('hide'); }, 600);
            animate();
        });
};
</script>