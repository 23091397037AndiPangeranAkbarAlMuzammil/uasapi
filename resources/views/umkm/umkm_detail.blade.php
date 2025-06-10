<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detail UMKM - {{ $umkm->nama_usaha }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: auto;
        }
        .card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            overflow: hidden;
            transition: transform 0.3s ease;
        }
        .card:hover {
            transform: scale(1.02);
        }
        .card img {
            width: 100%;
            height: 300px;
            object-fit: cover;
        }
        .card-body {
            padding: 20px;
        }
        h2 {
            margin-top: 0;
            color: #333;
        }
        p {
            color: #666;
        }
        .info {
            margin-top: 10px;
            padding: 10px;
            background: #eee;
            border-radius: 5px;
        }
        .btn {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 20px;
            background: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s ease;
        }
        .btn:hover {
            background: #0056b3;
        }
        .back-link {
            display: inline-block;
            margin-bottom: 15px;
            color: #007BFF;
            text-decoration: none;
        }
        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <a href="/" class="back-link">&larr; Kembali ke Daftar UMKM</a>

    <div class="card">
        <img src="{{ $umkm->gambar_usaha ? asset('storage/' . $umkm->gambar_usaha) : 'https://via.placeholder.com/600x300?text=No+Image' }}" 
             alt="{{ $umkm->nama_usaha }}">

        <div class="card-body">
            <h2>{{ $umkm->nama_usaha }}</h2>
            <p>{{ $umkm->deskripsi }}</p>

            <div class="info">
                <strong>Alamat:</strong> {{ $umkm->alamat ?? 'Belum tersedia' }}
            </div>
            <div class="info">
                <strong>Kontak:</strong> {{ $umkm->kontak ?? 'Belum tersedia' }}
            </div>

            <a href="#" class="btn" onclick="alert('Silakan hubungi kontak UMKM ini!')">Hubungi Sekarang</a>
        </div>
    </div>
</div>

</body>
</html>
