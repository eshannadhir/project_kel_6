<?php
require  'admin/koneksi.php';
// lakukan penuisan query
$query = "SELECT * FROM pengaduan";
//Proses query ke database
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <title>Layanan Pengaduan Masyarakat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
          font-family: 'Georgia', serif;
          font-family: 'Roboto', sans-serif;
         
              
        }
        form {
          background-color: rgba(255, 255, 255, 0.9);
          padding: 20px;
          border-radius: 10px;
          box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        } 

        html {
           scroll-behavior: smooth;
        }

          .navbar {
            background-color: rgba(0, 153, 204, 0.9); /* Transparansi */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
          }

          .card {
              box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
              border-radius: 10px;
          }
        </style>
</head>
<body>

     <!-- Navbar -->
 <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-primary">
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
                <a class="nav-link active" aria-current="page" href="#index">Home</a>
                <a class="nav-link active" aria-current="page" href="#lapor">lapor</a>
                <a class="nav-link active" aria-current="page" href="#data">Data</a>

            </div>
        </div>
    </div>
</nav>



  <div class="container-fluid my-5 py-5" style="background-color: #fff;">
    <div class="row justify-content-center">
      <div class="col-md-7" id="index">
        <h1 class="font-italic mb-4 fw-bold text-center">Apa itu pengaduan?</h1>
        <p style="font-size: 1.2rem;">
        
        Pengaduan adalah penyampaian keluhan atau ketidakpuasan seseorang kepada pihak berwenang atas pelayanan, 
        tindakan, atau situasi yang dirasa merugikan, dengan tujuan meminta penyelesaian atau perbaikan.
        </p>
       <br> 
        <center> <a href="https://www.youtube.com/watch?v=WSnrNEumbyM" class="btn btn-primary">Apa itu Lapor</a> </center>    
      <div class="container-fluid py-5">
    <div class="text-center mb-5">
        <h2 class="font-italic mb-4 fw-bold">Kenapa harus menggunakan layanan ini?</h2>
        <p style="font-size: 1.2rem;">Layanan ini memberikan kemudahan bagi masyarakat untuk menyampaikan keluhan dan mendapatkan tanggapan yang cepat.</p>
    </div>
    <div class="container">
        <div class="row text-center justify-content-between"> 
            <!-- Story 1 -->
            <div class="col-md-4 mb-4">
                <div style="height: 300px; background-color: #e0e0e0;">
                    <img src="img/keadilan.jpeg" alt="Story 1" class="img-fluid h-100 w-100" style="object-fit: cover;">
                </div>
                </div>
            <!-- Story 2 -->
            <div class="col-md-4 mb-4">
                <div style="height: 300px; background-color: #e0e0e0;">
                    <img src="img/keadilan pancasila.jpeg" alt="Story 2" class="img-fluid h-100 w-100" style="object-fit: cover;">
                </div>
            </div>
            <!-- Story 3 -->
            <div class="col-md-4 mb-4">
                <div style="height: 300px; background-color: #e0e0e0;">
                    <img src="img/laporwapres.jpeg" alt="Story 3" class="img-fluid h-100 w-100" style="object-fit: cover;">
                </div>
            </div>
        </div>
    </div>
</div>

<form action="lapor_proses.php" method="POST" id="lapor">
    <h3 class="text-center mb-4">Lapor Pengaduan</h3>
    <p class="text-center">Silakan isi form berikut untuk melaporkan pengaduan Anda.</p>
  

 <div class="mb-3">
     <label for="judul" class="form-label">Judul</label>
     <input type="text" name="judul" class="form-control" required>
   </div>

   <div class="mb-3">
  <label for="isi_laporan" class="form-label">Isi Laporan</label>
  <textarea name="isi_laporan" class="form-control" rows="8" required></textarea>
</div>

   <div class="mb-3">
    <label for="tanggal_pelapor" class="form-label">Tanggal Pelaporan</label>
    <input type="date" name="tanggal_pelapor" class="form-control" required>
   </div>

   <div class="mb-3">
    <label for="kategori_laporan" class="form-label">Pilih jenis kategori pengaduan</label>
    <select name="kategori_laporan" class="form-select" required>
      <option value="nol">pilih jenis kategori laporan</option>
        <option value="sampah">Sampah</option>
        <option value="kebakaran">Kebakaran</option>
        <option value="jalan">Jalan</option>
        <option value="masyarakat">Bencana alam</option>
        <option value="bantuan sosisal">Bantuan Sosial</option>
        </select>
   </div>

    

   <button type="submit" class="btn btn-md btn-primary">Lapor</button>
</form> 
<div class="container mt-5" id=data>
  <h3 class="text-center mb-4">Data Pengaduan Masyarakat</h3>
  <div class="row g-4">

    <?php
    // Reset pointer hasil query
    mysqli_data_seek($result, 0);
     
    //Mengecek apakah ada data dalam hasil query.
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        $tanggapan = !empty($row['tanggapan']) ? $row['tanggapan'] : "**Belum ada tanggapan**";
    ?>
        <div class="col-md-4">
          <div class="card shadow-sm h-100">
            <div class="card-body">
              <h5 class="card-title"><?= htmlspecialchars($row['judul']) ?></h5>
              <p class="card-text">
                <strong>Kategori:</strong> <?= htmlspecialchars($row['kategori_laporan']) ?><br>
                <strong>Tanggal:</strong> <?= htmlspecialchars($row['tanggal_pelapor']) ?><br>
                <strong>Isi:</strong> <?= htmlspecialchars(substr($row['isi_laporan'], 0, 100)) ?>...
              </p>
              <hr>
              <p><strong>Tanggapan Admin:</strong><br><?= nl2br(htmlspecialchars($tanggapan)) ?></p>
              <a href="tanggapan_admin.php?id=<?= $row['id_pengaduan'] ?>" class="btn btn-primary btn-sm mt-2">Lihat Detail</a>
            </div>
          </div>
        </div>
    <?php
      }
    } else {
      echo "<p class='text-center text-danger'>Belum ada laporan.</p>";
    }
    ?>

  </div>
</div>



      <?php
    // Pengecekan Jumlah Data
    if(mysqli_num_rows($result) > 0) {
      //Tampilkan Data
      $no = 1;
      while ($show = mysqli_fetch_assoc($result)) {
        echo "
         <tr>
         <td>$no</td>
         <td>$show[judul]</td>
         <td>$show[isi_laporan]</td>
         <td>$show[tanggal_pelapor]</td>
         <td>$show[kategori_laporan]</td>
         <td> 
          <a href='lapor.php' class='btn btn-primary'>Lapor</a>
          </td>
         </tr>
        ";
        $no++;
      }
    }else{
      echo "<div class='text-danger'>Data Tidak Ada</div>";
    }
    ?>

      </div>
    </div>
  </div>

      <footer class="text-white text-center py-4 bg-primary">
      <p>&copy; 2025 Layanan Pengaduan Masyarakat</p>
      <p>Email: info@lapor | Telp: (021) 123456</p>
    </footer>
      
  
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
