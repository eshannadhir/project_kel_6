<?php
require 'admin/koneksi.php';

// Cek apakah parameter id ada di URL
if (!isset($_GET['id'])) {
    echo "ID tidak ditemukan di URL.";
    exit;
}

$id = intval($_GET['id']); // Ubah ke integer untuk keamanan

// Query database
$query = "SELECT * FROM pengaduan WHERE id_pengaduan = $id";
$result = mysqli_query($conn, $query);

// Jika query gagal
if (!$result) {
    echo "Query gagal: " . mysqli_error($conn);
    exit;
}

// Ambil data
$show = mysqli_fetch_assoc($result);

// Jika data tidak ditemukan
if (!$show) {
    echo "Data dengan ID $id tidak ditemukan.";
    exit;
}
?>
<!doctype html> 
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      body {
        display: flex;
        justify-content: center; /* Pusatkan secara horizontal */
        align-items: center; /* Pusatkan secara vertikal */
        min-height: 100vh; /* Pastikan tinggi body mencakup seluruh layar */
        margin: 0; /* Hilangkan margin default */
        background-color: #f8f9fa; /* Warna latar belakang */
        font-family: 'Arial', sans-serif; /* Ganti dengan font yang diinginkan */
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        height: 100vh;
      }

      .detail-container {
        background-color: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        width: 90%;
        max-width: 600px;
        background-color: rgba(255, 255, 255, 0.8);
        backdrop-filter: blur(10px); /* Efek blur pada latar belakang */
        
      }

      h1 {
        font-size: 1.8rem;
        margin-bottom: 20px;
      }

      .detail-item {
        margin-bottom: 10px;
      }

    </style>
  </head>
  <body>

      

     <!-- Navbar -->
 <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color :rgb(38, 102, 222);">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="img/logo.png" alt="Logo" style="width: 50px;">
            <span class="ms-2" style="color: white;">Layanan Pengaduan Masyarakat</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>


            </div>
        </div>
    </div>
</nav>





    <div class="detail-container">
      <h1 class="text-center">TANGGAPAN ADMIN</h1>
      <div class="detail-item"><strong>Judul:</strong> <?= htmlspecialchars($show['judul']); ?></div>
      <div class="detail-item"><strong>Isi Laporan:</strong> <?= htmlspecialchars($show['isi_laporan']); ?></div>
      <div class="detail-item"><strong>Tanggal Pelapor:</strong> <?= htmlspecialchars($show['tanggal_pelapor']); ?></div>
      <div class="detail-item"><strong>Kategori Laporan:</strong> <?= htmlspecialchars($show['kategori_laporan']); ?></div>
      <div class="detail-item"><strong>Tanggapan Admin:</strong> <?= !empty($show['tanggapan']) ? nl2br(htmlspecialchars($show['tanggapan'])) : '**Belum ada tanggapan**' ?></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>