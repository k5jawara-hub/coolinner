<?php
// ================================================================
//  UPLOAD.PHP - Halaman untuk upload foto & video
// ================================================================

// Cek apakah ada file yang diupload
$uploadStatus = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['media_file'])) {
    $file = $_FILES['media_file'];
    $title = $_POST['title'] ?? 'Untitled';
    $desc = $_POST['desc'] ?? '';
    $type = $_POST['type'] ?? 'foto';
    
    // Validasi file
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'mp4', 'webm', 'ogg'];
    $fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    
    if (!in_array($fileExtension, $allowedExtensions)) {
        $uploadStatus = 'error';
    } elseif ($file['error'] !== UPLOAD_ERR_OK) {
        $uploadStatus = 'error';
    } else {
        // Buat folder uploads jika belum ada
        $uploadDir = 'uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        
        // Generate nama file unik
        $newFilename = time() . '_' . uniqid() . '.' . $fileExtension;
        $uploadPath = $uploadDir . $newFilename;
        
        // Pindahkan file
        if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
            // Baca data.json
            $dataFile = 'data.json';
            $items = [];
            
            if (file_exists($dataFile)) {
                $jsonContent = file_get_contents($dataFile);
                $items = json_decode($jsonContent, true) ?? [];
            }
            
            // Buat ID baru
            $maxId = 0;
            foreach ($items as $item) {
                if ($item['id'] > $maxId) $maxId = $item['id'];
            }
            $newId = $maxId + 1;
            
            // Tambahkan item baru
            $newItem = [
                'id' => $newId,
                'type' => $type,
                'title' => htmlspecialchars($title),
                'desc' => htmlspecialchars($desc),
                'views' => 0,
                'src' => $uploadPath
            ];
            
            $items[] = $newItem;
            
            // Simpan ke data.json
            file_put_contents($dataFile, json_encode($items, JSON_PRETTY_PRINT));
            
            $uploadStatus = 'success';
        } else {
            $uploadStatus = 'error';
        }
    }
    
    // Redirect ke halaman utama dengan status
    header('Location: index.php?upload=' . $uploadStatus);
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Upload · Monochrome Stories</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #0a0a0a;
            color: #e8e8e8;
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem;
        }

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

        .upload-container {
            max-width: 600px;
            width: 100%;
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 24px;
            padding: 48px 40px;
            position: relative;
            z-index: 1;
        }

        .upload-container h1 {
            font-family: 'Playfair Display', serif;
            font-size: 32px;
            font-weight: 400;
            margin-bottom: 8px;
        }

        .upload-container .sub {
            color: #666;
            font-weight: 300;
            font-size: 14px;
            margin-bottom: 32px;
        }

        .form-group {
            margin-bottom: 24px;
        }

        .form-group label {
            display: block;
            color: #999;
            font-size: 12px;
            font-weight: 400;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 8px;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px 16px;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 12px;
            color: #e8e8e8;
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            transition: 0.3s;
            outline: none;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: rgba(255, 255, 255, 0.15);
            background: rgba(255, 255, 255, 0.05);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 80px;
        }

        .form-group select option {
            background: #1a1a1a;
        }

        .form-group input[type="file"] {
            padding: 12px;
            cursor: pointer;
        }

        .form-group input[type="file"]::file-selector-button {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 8px 16px;
            border-radius: 8px;
            color: #aaa;
            font-family: 'Inter', sans-serif;
            font-size: 12px;
            cursor: pointer;
            transition: 0.3s;
            margin-right: 12px;
        }

        .form-group input[type="file"]::file-selector-button:hover {
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
        }

        .btn-submit {
            width: 100%;
            padding: 14px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            color: #e8e8e8;
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            font-weight: 400;
            letter-spacing: 1px;
            text-transform: uppercase;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-submit:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: rgba(255, 255, 255, 0.2);
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #666;
            text-decoration: none;
            font-size: 13px;
            transition: 0.3s;
        }

        .back-link:hover {
            color: #aaa;
        }

        .file-info {
            color: #555;
            font-size: 12px;
            margin-top: 6px;
        }

        @media (max-width: 600px) {
            .upload-container {
                padding: 32px 20px;
            }
            .upload-container h1 {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>

    <div class="upload-container">
        <h1>✦ Upload Momen</h1>
        <p class="sub">Tambahkan foto atau video ke galeri</p>

        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="type">Jenis Media</label>
                <select name="type" id="type" required>
                    <option value="foto">📷 Foto</option>
                    <option value="video">🎬 Video</option>
                </select>
            </div>

            <div class="form-group">
                <label for="title">Judul</label>
                <input type="text" name="title" id="title" placeholder="Masukkan judul..." required />
            </div>

            <div class="form-group">
                <label for="desc">Deskripsi</label>
                <textarea name="desc" id="desc" placeholder="Ceritakan tentang momen ini..."></textarea>
            </div>

            <div class="form-group">
                <label for="media_file">Pilih File</label>
                <input type="file" name="media_file" id="media_file" accept=".jpg,.jpeg,.png,.gif,.webp,.mp4,.webm,.ogg" required />
                <div class="file-info">Format: JPG, PNG, GIF, WebP, MP4, WebM, OGG</div>
            </div>

            <button type="submit" class="btn-submit">
                <i class="fas fa-cloud-upload-alt"></i> Upload
            </button>
        </form>

        <a href="index.php" class="back-link">← Kembali ke Galeri</a>
    </div>

</body>
</html>