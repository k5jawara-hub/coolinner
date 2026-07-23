<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Monochrome · Stories</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <style>
        /* ===== RESET ===== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #0a0a0a;
            color: #e8e8e8;
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
            padding: 0;
        }

        /* ===== NOISE OVERLAY ===== */
        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIzMDAiIGhlaWdodD0iMzAwIj48ZmlsdGVyIGlkPSJmIj48ZmVUdXJidWxlbmNlIHR5cGU9ImZyYWN0YWxOb2lzZSIgYmFzZUZyZXF1ZW5jeT0iLjc1IiBudW1PY3RhdmVzPSI0IiAvPjwvZmlsdGVyPjxyZWN0IHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbHRlcj0idXJsKCNmKSIgb3BhY2l0eT0iMC4wNCIgLz48L3N2Zz4=');
            pointer-events: none;
            z-index: 9999;
            opacity: 0.4;
        }

        /* ===== SCROLLBAR ===== */
        ::-webkit-scrollbar {
            width: 6px;
        }
        ::-webkit-scrollbar-track {
            background: #0a0a0a;
        }
        ::-webkit-scrollbar-thumb {
            background: #333;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        /* ===== NAVIGASI ===== */
        nav {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            padding: 20px 48px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(10, 10, 10, 0.8);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.04);
            z-index: 1000;
            transition: 0.3s;
        }

        nav .logo {
            font-family: 'Playfair Display', serif;
            font-size: 26px;
            font-weight: 700;
            letter-spacing: -0.5px;
            background: linear-gradient(135deg, #fff 50%, #888);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        nav .logo span {
            font-style: italic;
            font-weight: 400;
            background: none;
            -webkit-text-fill-color: #666;
        }

        nav ul {
            display: flex;
            gap: 36px;
            list-style: none;
            align-items: center;
        }

        nav ul li a {
            color: #aaa;
            text-decoration: none;
            font-size: 13px;
            font-weight: 400;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: 0.3s;
            position: relative;
        }

        nav ul li a::after {
            content: '';
            position: absolute;
            bottom: -6px;
            left: 0;
            width: 0;
            height: 1.5px;
            background: #fff;
            transition: 0.4s;
        }

        nav ul li a:hover {
            color: #fff;
        }
        nav ul li a:hover::after {
            width: 100%;
        }

        .btn-upload {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #aaa;
            padding: 8px 20px;
            border-radius: 40px;
            font-family: 'Inter', sans-serif;
            font-size: 12px;
            font-weight: 400;
            letter-spacing: 0.5px;
            cursor: pointer;
            transition: 0.3s;
            text-transform: uppercase;
            text-decoration: none;
        }

        .btn-upload:hover {
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            border-color: rgba(255, 255, 255, 0.2);
        }

        /* ===== HERO ===== */
        .hero {
            min-height: 55vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 120px 24px 40px;
            position: relative;
        }

        .hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(42px, 10vw, 100px);
            font-weight: 700;
            line-height: 1.05;
            letter-spacing: -3px;
            background: linear-gradient(180deg, #ffffff 20%, #777);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: fadeDown 1s ease-out;
        }

        .hero .subtitle {
            font-size: 16px;
            font-weight: 300;
            color: #888;
            letter-spacing: 4px;
            text-transform: uppercase;
            margin-top: 14px;
            animation: fadeDown 1.2s ease-out;
        }

        .hero .divider {
            width: 50px;
            height: 1px;
            background: rgba(255, 255, 255, 0.12);
            margin: 20px auto;
            animation: fadeDown 1.4s ease-out;
        }

        .hero .desc {
            max-width: 480px;
            color: #999;
            font-weight: 300;
            line-height: 1.8;
            font-size: 15px;
            animation: fadeDown 1.6s ease-out;
        }

        @keyframes fadeDown {
            0% {
                opacity: 0;
                transform: translateY(-25px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ===== GALERI SECTION ===== */
        .gallery-section {
            padding: 20px 40px 80px;
            max-width: 1400px;
            margin: 0 auto;
        }

        .gallery-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 40px;
            padding-bottom: 18px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.04);
        }

        .gallery-header-left {
            display: flex;
            align-items: baseline;
            gap: 24px;
            flex-wrap: wrap;
        }

        .gallery-header h2 {
            font-family: 'Playfair Display', serif;
            font-size: 32px;
            font-weight: 400;
            letter-spacing: -0.5px;
        }

        .gallery-header h2 span {
            color: #555;
            font-weight: 300;
        }

        .filter-group {
            display: flex;
            gap: 8px;
        }

        .filter-btn {
            background: transparent;
            border: 1px solid rgba(255, 255, 255, 0.06);
            padding: 6px 18px;
            border-radius: 40px;
            font-family: 'Inter', sans-serif;
            font-size: 12px;
            font-weight: 300;
            color: #666;
            cursor: pointer;
            transition: 0.3s;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        .filter-btn:hover {
            color: #ccc;
            border-color: rgba(255, 255, 255, 0.12);
        }

        .filter-btn.active {
            color: #fff;
            border-color: rgba(255, 255, 255, 0.2);
            background: rgba(255, 255, 255, 0.04);
        }

        .gallery-header .count {
            color: #666;
            font-size: 13px;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        /* ===== GRID GALERI ===== */
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 24px;
        }

        .gallery-item {
            position: relative;
            border-radius: 18px;
            overflow: hidden;
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.04);
            transition: 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            cursor: pointer;
            aspect-ratio: 4/3;
        }

        .gallery-item:hover {
            transform: scale(1.03);
            border-color: rgba(255, 255, 255, 0.15);
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.6);
            z-index: 10;
        }

        .gallery-item img,
        .gallery-item video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: 0.6s;
            filter: none;
        }

        .gallery-item:hover img,
        .gallery-item:hover video {
            transform: scale(1.05);
        }

        .gallery-item .overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 30px 20px 16px;
            background: linear-gradient(transparent, rgba(0, 0, 0, 0.75));
            opacity: 0;
            transition: 0.4s;
            transform: translateY(20px);
        }

        .gallery-item:hover .overlay {
            opacity: 1;
            transform: translateY(0);
        }

        .gallery-item .overlay h3 {
            font-size: 15px;
            font-weight: 600;
            letter-spacing: 0.3px;
            color: #fff;
        }

        .gallery-item .overlay p {
            font-size: 12px;
            color: #aaa;
            font-weight: 300;
            margin-top: 3px;
        }

        .gallery-item .badge-type {
            position: absolute;
            top: 14px;
            left: 14px;
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(8px);
            color: #999;
            padding: 0.2rem 0.9rem;
            border-radius: 40px;
            font-size: 0.6rem;
            font-weight: 300;
            letter-spacing: 0.8px;
            border: 1px solid rgba(255, 255, 255, 0.06);
            text-transform: uppercase;
            pointer-events: none;
        }

        /* ===== LIGHTBOX ===== */
        .lightbox {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(0, 0, 0, 0.92);
            backdrop-filter: blur(20px);
            z-index: 99999;
            align-items: center;
            justify-content: center;
            padding: 40px;
            animation: fadeIn 0.4s ease-out;
        }

        .lightbox.active {
            display: flex;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        .lightbox-content {
            max-width: 90vw;
            max-height: 90vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .lightbox-content img,
        .lightbox-content video {
            max-width: 90vw;
            max-height: 85vh;
            object-fit: contain;
            border-radius: 12px;
            box-shadow: 0 40px 80px rgba(0, 0, 0, 0.8);
            animation: zoomIn 0.4s ease-out;
            filter: none;
        }

        @keyframes zoomIn {
            0% {
                transform: scale(0.9);
                opacity: 0;
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        .lightbox .close {
            position: absolute;
            top: 30px;
            right: 40px;
            color: #fff;
            font-size: 36px;
            cursor: pointer;
            transition: 0.3s;
            opacity: 0.5;
            font-weight: 300;
            font-family: 'Inter', sans-serif;
        }

        .lightbox .close:hover {
            opacity: 1;
            transform: rotate(90deg);
        }

        .lightbox .info {
            position: absolute;
            bottom: 40px;
            left: 50%;
            transform: translateX(-50%);
            color: #888;
            font-size: 13px;
            font-weight: 300;
            letter-spacing: 1px;
            text-align: center;
        }

        /* ===== EMPTY STATE ===== */
        .empty-state {
            text-align: center;
            padding: 80px 20px;
            grid-column: 1/-1;
        }

        .empty-state .icon {
            font-size: 56px;
            opacity: 0.25;
            display: block;
            margin-bottom: 16px;
        }

        .empty-state h3 {
            font-weight: 400;
            font-size: 20px;
            color: #888;
        }

        .empty-state p {
            font-size: 14px;
            margin-top: 6px;
            color: #444;
        }

        /* ===== FOOTER ===== */
        footer {
            border-top: 1px solid rgba(255, 255, 255, 0.03);
            padding: 36px 40px 28px;
            text-align: center;
            color: #444;
            font-weight: 300;
            font-size: 12px;
            letter-spacing: 1px;
        }

        footer a {
            color: #666;
            text-decoration: none;
            transition: 0.3s;
        }
        footer a:hover {
            color: #fff;
        }

        /* ===== NOTIFIKASI ===== */
        .notification {
            position: fixed;
            top: 100px;
            right: 40px;
            background: rgba(0, 0, 0, 0.9);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 16px 24px;
            border-radius: 12px;
            color: #fff;
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            z-index: 99999;
            transform: translateX(120%);
            transition: 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            max-width: 400px;
        }

        .notification.show {
            transform: translateX(0);
        }

        .notification.success {
            border-color: rgba(76, 175, 80, 0.3);
        }

        .notification.error {
            border-color: rgba(244, 67, 54, 0.3);
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            nav {
                padding: 14px 20px;
                flex-direction: column;
                gap: 10px;
            }
            nav ul {
                gap: 20px;
                flex-wrap: wrap;
                justify-content: center;
            }
            nav ul li a {
                font-size: 11px;
                letter-spacing: 0.5px;
            }
            .hero {
                min-height: 40vh;
                padding: 130px 20px 30px;
            }
            .hero h1 {
                font-size: 40px;
            }
            .gallery-section {
                padding: 20px 16px 60px;
            }
            .gallery-grid {
                grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
                gap: 14px;
            }
            .gallery-header h2 {
                font-size: 24px;
            }
            .gallery-header-left {
                gap: 14px;
            }
            .filter-btn {
                font-size: 10px;
                padding: 4px 12px;
            }
            .lightbox {
                padding: 16px;
            }
            .lightbox .close {
                top: 16px;
                right: 18px;
                font-size: 28px;
            }
            .notification {
                top: 140px;
                right: 16px;
                left: 16px;
                max-width: none;
            }
        }

        @media (max-width: 480px) {
            .gallery-grid {
                grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));
                gap: 10px;
            }
            .gallery-item .overlay h3 {
                font-size: 12px;
            }
            .gallery-item .overlay p {
                font-size: 10px;
            }
            .gallery-header {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>
</head>
<body>

    <!-- ===== NAVIGASI ===== -->
    <nav>
        <div class="logo">✦ Monochrome <span>· Stories</span></div>
        <ul>
            <li><a href="#gallery">Galeri</a></li>
            <li><a href="#about">Tentang</a></li>
            <li><a href="upload.php" class="btn-upload"><i class="fas fa-cloud-upload-alt"></i> Upload</a></li>
        </ul>
    </nav>

    <!-- ===== NOTIFIKASI ===== -->
    <div class="notification" id="notification"></div>

    <!-- ===== HERO ===== -->
    <section class="hero">
        <h1>Menangkap Bayangan</h1>
        <div class="subtitle">Sebuah narasi visual</div>
        <div class="divider"></div>
        <p class="desc">
            Setiap bingkai adalah cerita. Tanpa warna, hanya kontras, 
            tekstur, dan emosi yang berbicara.
        </p>
    </section>

    <!-- ===== GALERI ===== -->
    <section class="gallery-section" id="gallery">
        <div class="gallery-header">
            <div class="gallery-header-left">
                <h2>Koleksi <span>·</span></h2>
                <div class="filter-group" id="filterGroup">
                    <button class="filter-btn active" data-filter="all">Semua</button>
                    <button class="filter-btn" data-filter="foto">Foto</button>
                    <button class="filter-btn" data-filter="video">Video</button>
                </div>
            </div>
            <span class="count" id="photoCount">0 momen</span>
        </div>

        <div class="gallery-grid" id="galleryGrid">
            <!-- Konten akan di-render oleh JavaScript -->
        </div>
    </section>

    <!-- ===== ABOUT ===== -->
    <section id="about" style="padding:30px 40px 70px; max-width:800px; margin:0 auto; text-align:center;">
        <div style="border-top:1px solid rgba(255,255,255,0.04); padding-top:40px;">
            <p style="color:#666; font-size:14px; line-height:2; font-weight:300; letter-spacing:0.3px;">
                Koleksi ini adalah ruang untuk merenung dan mengapresiasi keindahan 
                dalam setiap sudut gelap dan terang.
                <br />
                Setiap momen diabadikan untuk dikenang.
            </p>
            <p style="color:#444; font-size:12px; margin-top:16px; letter-spacing:1px; text-transform:uppercase;">
                ✦ Light &amp; Shadow · Forever ✦
            </p>
        </div>
    </section>

    <!-- ===== FOOTER ===== -->
    <footer>
        © 2026 · monochrome stories &mdash; dibuat dengan <a href="#">ketenangan</a>
    </footer>

    <!-- ===== LIGHTBOX ===== -->
    <div class="lightbox" id="lightbox">
        <span class="close" id="lightboxClose">✕</span>
        <div class="lightbox-content" id="lightboxContent">
            <!-- Media akan di-render oleh JavaScript -->
        </div>
        <div class="info" id="lightboxInfo"></div>
    </div>

    <script>
        // ================================================================
        //  AMBIL DATA DARI PHP (data.json)
        // ================================================================

        let items = [];
        let currentFilter = 'all';

        async function loadData() {
            try {
                const response = await fetch('data.json');
                if (!response.ok) {
                    // Jika file belum ada, buat default
                    items = [
                        { id: 1, type: 'foto', title: 'senja di bukit', desc: 'Matahari tenggelam di balik perbukitan.', views: 23, src: 'https://picsum.photos/id/1015/800/800' },
                        { id: 2, type: 'foto', title: 'kopi pagi', desc: 'Secangkir kopi hitam di pagi hari.', views: 41, src: 'https://picsum.photos/id/106/800/800' },
                        { id: 3, type: 'video', title: 'perjalanan pantai', desc: 'Suara ombak dan angin pantai selatan.', views: 67, src: 'https://www.w3schools.com/html/mov_bbb.mp4' },
                        { id: 4, type: 'foto', title: 'daun di jalan', desc: 'Daun kering berjatuhan di trotoar.', views: 12, src: 'https://picsum.photos/id/152/800/800' },
                        { id: 5, type: 'video', title: 'kota malam', desc: 'Gemerlap lampu kota dari ketinggian.', views: 88, src: 'https://www.w3schools.com/html/mov_bbb.mp4' },
                        { id: 6, type: 'foto', title: 'kucing hitam', desc: 'Kucing hitam kesayangan duduk manis.', views: 34, src: 'https://picsum.photos/id/219/800/800' },
                        { id: 7, type: 'video', title: 'hujan di taman', desc: 'Genangan air dan dedaunan basah.', views: 56, src: 'https://www.w3schools.com/html/mov_bbb.mp4' },
                        { id: 8, type: 'foto', title: 'bangunan tua', desc: 'Arsitektur klasik kolonial yang kokoh.', views: 19, src: 'https://picsum.photos/id/104/800/800' },
                    ];
                    // Simpan default ke data.json
                    await saveData(items);
                } else {
                    const data = await response.json();
                    if (data && data.length > 0) {
                        items = data;
                    } else {
                        // Jika data.json kosong, gunakan default
                        items = [
                            { id: 1, type: 'foto', title: 'senja di bukit', desc: 'Matahari tenggelam di balik perbukitan.', views: 23, src: 'https://picsum.photos/id/1015/800/800' },
                            { id: 2, type: 'foto', title: 'kopi pagi', desc: 'Secangkir kopi hitam di pagi hari.', views: 41, src: 'https://picsum.photos/id/106/800/800' },
                            { id: 3, type: 'video', title: 'perjalanan pantai', desc: 'Suara ombak dan angin pantai selatan.', views: 67, src: 'https://www.w3schools.com/html/mov_bbb.mp4' },
                            { id: 4, type: 'foto', title: 'daun di jalan', desc: 'Daun kering berjatuhan di trotoar.', views: 12, src: 'https://picsum.photos/id/152/800/800' },
                            { id: 5, type: 'video', title: 'kota malam', desc: 'Gemerlap lampu kota dari ketinggian.', views: 88, src: 'https://www.w3schools.com/html/mov_bbb.mp4' },
                            { id: 6, type: 'foto', title: 'kucing hitam', desc: 'Kucing hitam kesayangan duduk manis.', views: 34, src: 'https://picsum.photos/id/219/800/800' },
                            { id: 7, type: 'video', title: 'hujan di taman', desc: 'Genangan air dan dedaunan basah.', views: 56, src: 'https://www.w3schools.com/html/mov_bbb.mp4' },
                            { id: 8, type: 'foto', title: 'bangunan tua', desc: 'Arsitektur klasik kolonial yang kokoh.', views: 19, src: 'https://picsum.photos/id/104/800/800' },
                        ];
                        await saveData(items);
                    }
                }
                renderGallery();
            } catch (error) {
                console.error('Error loading data:', error);
                showNotification('Gagal memuat data', 'error');
            }
        }

        async function saveData(data) {
            try {
                const response = await fetch('save_data.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(data)
                });
                if (!response.ok) {
                    throw new Error('Gagal menyimpan data');
                }
            } catch (error) {
                console.error('Error saving data:', error);
            }
        }

        // ================================================================
        //  RENDER GALERI
        // ================================================================

        const grid = document.getElementById('galleryGrid');
        const countEl = document.getElementById('photoCount');

        function renderGallery() {
            const filtered = currentFilter === 'all' 
                ? items 
                : items.filter(item => item.type === currentFilter);

            countEl.textContent = `${filtered.length} momen`;

            if (filtered.length === 0) {
                grid.innerHTML = `
                    <div class="empty-state">
                        <span class="icon">◌</span>
                        <h3>Tidak ada konten</h3>
                        <p>Upload foto atau video pertama Anda!</p>
                    </div>
                `;
                return;
            }

            grid.innerHTML = filtered.map((item) => {
                const isVideo = item.type === 'video';
                let mediaTag = '';
                if (isVideo) {
                    mediaTag = `<video muted playsinline preload="metadata"><source src="${item.src}" type="video/mp4" /></video>`;
                } else {
                    mediaTag = `<img src="${item.src}" alt="${item.title}" loading="lazy" />`;
                }

                return `
                    <div class="gallery-item" data-id="${item.id}">
                        ${mediaTag}
                        <span class="badge-type"><i class="fas ${isVideo ? 'fa-film' : 'fa-camera'}"></i> ${item.type}</span>
                        <div class="overlay">
                            <h3>${item.title}</h3>
                            <p>✦ ${item.views} tayangan · klik untuk perbesar</p>
                        </div>
                    </div>
                `;
            }).join('');

            // Event listener untuk lightbox
            document.querySelectorAll('.gallery-item').forEach((item) => {
                item.addEventListener('click', () => {
                    const id = parseInt(item.dataset.id);
                    const data = items.find(it => it.id === id);
                    if (data) openLightbox(data);
                });
            });
        }

        // ================================================================
        //  FILTER
        // ================================================================

        const filterBtns = document.querySelectorAll('.filter-btn');
        filterBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                filterBtns.forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                currentFilter = this.dataset.filter;
                renderGallery();
            });
        });

        // ================================================================
        //  LIGHTBOX
        // ================================================================

        const lightbox = document.getElementById('lightbox');
        const lightboxContent = document.getElementById('lightboxContent');
        const lightboxInfo = document.getElementById('lightboxInfo');
        const closeBtn = document.getElementById('lightboxClose');
        let currentVideo = null;

        function openLightbox(data) {
            lightboxContent.innerHTML = '';
            
            if (data.type === 'video') {
                const video = document.createElement('video');
                video.src = data.src;
                video.controls = true;
                video.autoplay = true;
                video.muted = false;
                video.style.maxWidth = '90vw';
                video.style.maxHeight = '85vh';
                video.style.borderRadius = '12px';
                video.style.boxShadow = '0 40px 80px rgba(0,0,0,0.8)';
                lightboxContent.appendChild(video);
                currentVideo = video;
            } else {
                const img = document.createElement('img');
                img.src = data.src;
                img.alt = data.title;
                img.style.maxWidth = '90vw';
                img.style.maxHeight = '85vh';
                img.style.borderRadius = '12px';
                img.style.boxShadow = '0 40px 80px rgba(0,0,0,0.8)';
                lightboxContent.appendChild(img);
            }

            lightboxInfo.textContent = `${data.title} · ${data.views} tayangan · klik di luar untuk tutup`;
            lightbox.classList.add('active');
            document.body.style.overflow = 'hidden';

            // Increment views
            data.views += 1;
            updateViewCounts();
            saveData(items); // Simpan perubahan views
        }

        function updateViewCounts() {
            const allItems = currentFilter === 'all' 
                ? items 
                : items.filter(item => item.type === currentFilter);
            
            allItems.forEach((item) => {
                const itemEl = document.querySelector(`.gallery-item[data-id="${item.id}"]`);
                if (itemEl) {
                    const p = itemEl.querySelector('.overlay p');
                    if (p) {
                        p.textContent = `✦ ${item.views} tayangan · klik untuk perbesar`;
                    }
                }
            });
        }

        function closeLightbox() {
            if (currentVideo) {
                currentVideo.pause();
                currentVideo = null;
            }
            lightbox.classList.remove('active');
            document.body.style.overflow = '';
            lightboxContent.innerHTML = '';
        }

        closeBtn.addEventListener('click', closeLightbox);
        lightbox.addEventListener('click', (e) => {
            if (e.target === lightbox) closeLightbox();
        });

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') closeLightbox();
        });

        // ================================================================
        //  NOTIFIKASI
        // ================================================================

        function showNotification(message, type = 'success') {
            const notif = document.getElementById('notification');
            notif.textContent = message;
            notif.className = `notification ${type}`;
            
            // Force reflow
            void notif.offsetWidth;
            
            notif.classList.add('show');
            
            setTimeout(() => {
                notif.classList.remove('show');
            }, 4000);
        }

        // ================================================================
        //  CEK PARAMETER URL UNTUK NOTIFIKASI UPLOAD
        // ================================================================

        function checkUploadStatus() {
            const urlParams = new URLSearchParams(window.location.search);
            const status = urlParams.get('upload');
            if (status === 'success') {
                showNotification('✅ File berhasil diupload!', 'success');
                // Hapus parameter dari URL
                window.history.replaceState({}, document.title, window.location.pathname);
                loadData(); // Reload data
            } else if (status === 'error') {
                showNotification('❌ Gagal upload file. Coba lagi.', 'error');
                window.history.replaceState({}, document.title, window.location.pathname);
            }
        }

        // ================================================================
        //  INIT
        // ================================================================

        loadData();
        checkUploadStatus();

        // Refresh data setiap 10 detik (untuk update dari upload)
        setInterval(() => {
            loadData();
        }, 10000);
    </script>

</body>
</html>