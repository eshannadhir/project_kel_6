<?php
require 'koneksi.php';

// Query untuk mengambil data pengaduan
$query1 = "SELECT * FROM pengaduan";
$result = mysqli_query($conn, $query1);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  <title>Dashboard</title>
  <style>
    body {
      background-image: url('../img/login.jpg'); /* Background gambar */
      background-size: cover;
      background-color: black;
      background-position: center;
      background-repeat: no-repeat;
      min-height: 100vh;
      margin: 0;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: flex-start;
      padding-top: 50px; /* Tambahkan jarak dari atas */
    }

    .container {
      background-color: rgba(255, 255, 255, 0.7); /* Transparansi pada kontainer */
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      margin-top: 100px; /* Tambahkan jarak lebih besar dari atas */
      margin-left: 300px; /* Jarak dari sidebar */
      width: calc(100% - 320px); /* Sesuaikan lebar kontainer agar tetap responsif */
      max-width: 1200px;
    }

    .sidebar {
      height: 100vh;
      position: fixed;
      top: 0;
      left: 0;
      width: 250px;
      background-color: #343a40;
      color: white;
      padding: 20px;
      box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
    }

    .sidebar h4 {
      text-align: center;
      margin-bottom: 20px;
    }

    .sidebar .nav-link {
      color: white;
      margin-bottom: 10px;
      transition: background-color 0.3s ease;
    }

    .sidebar .nav-link:hover {
      background-color: #495057;
      border-radius: 5px;
    }

    .table {
      margin-top: 20px;
      background-color: rgba(255, 255, 255, 0.8); /* Transparansi pada tabel */
      border-radius: 10px;
      overflow: hidden;
    }

    .table th, .table td {
      opacity: 0.9; /* Membuat teks di dalam tabel sedikit pudar */
    }

    .logout-link {
      margin-top: 20px;
      display: inline-block;
      color: #dc3545;
      font-weight: bold;
      text-decoration: none;
    }

    .logout-link:hover {
      text-decoration: underline;
    }
  </style>
</head>

<body>
  <!-- Sidebar -->
  <div class="sidebar">
    <h4>Panel aksi</h4>
    <ul class="nav flex-column">
      <li class="nav-item"><a class="nav-link" href="#">Dashboard</a></li>
      <li class="nav-item"><a class="nav-link" href="admin.php">admin</a></li>
      <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
    </ul>
  </div>

  <!-- Kontainer Utama -->
  <div class="container">
    <h2 class="text-center fw-bold">Dashboard List Aduan Masyarakat</h2>

    <table class="table table-bordered table-striped">
      <thead class="table-dark">
        <tr>
          <th>No</th>
          <th>Judul</th>
          <th>Isi Laporan</th>
          <th>Tanggal Pengaduan</th>
          <th>Kategori Laporan</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        if (mysqli_num_rows($result) > 0) {
          $no = 1;
          while ($show = mysqli_fetch_assoc($result)) {
            echo "
            <tr>
              <td>{$no}</td>
              <td>" . htmlspecialchars($show['judul']) . "</td>
              <td>" . htmlspecialchars(substr($show['isi_laporan'], 0, 50)) . "...</td>
              <td>" . htmlspecialchars($show['tanggal_pelapor']) . "</td>
              <td>" . htmlspecialchars($show['kategori_laporan']) . "</td>
               <td>" . (empty($show['tanggapan']) 
                    ? "<span class='badge bg-warning text-dark'>Belum Ditanggapi</span>" 
                    : "<span class='badge bg-success'>Sudah Ditanggapi</span>") . "</td>
              <td>
                <a href='edit_tanggapan.php?id=" . htmlspecialchars($show['id_pengaduan']) . "' class='btn btn-sm btn-primary'>Berikan Tanggapan</a>
              </td>
            </tr>
            ";
            $no++;
          }
        } else {
          echo "<tr><td colspan='6' class='text-center text-danger'>Data Tidak Ada</td></tr>";
        }
        ?>
      </tbody>
    </table>

   
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>

</html>