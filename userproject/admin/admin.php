<?php
require 'koneksi.php';

// Ambil semua data pengaduan
$query = "SELECT * FROM pengaduan";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
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
      background-color: rgba(255, 255, 255, 0.6); /* Transparansi pada kontainer */
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
      background-color: rgba(255, 255, 255, 0.6); /* Transparansi pada tabel */
      border-radius: 10px;
      overflow: hidden;
    }

    .table th, .table td {
      opacity: 0.8; /* Membuat teks di dalam tabel sedikit pudar */
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
      <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
      <li class="nav-item"><a class="nav-link" href="admin.php">admin</a></li>
      <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
    </ul>
  </div>

    <div class="container mt-5">
        <h1 class="text-center">Halaman Admin</h1>
        <table class="table table-bordered mt-4">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Isi Laporan</th>
                    <th>Tanggal Pelapor</th>
                    <th>Kategori</th>
                    <th>Tanggapan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= ($row['judul']); ?></td>
                    <td><?= ($row['isi_laporan']); ?></td>
                    <td><?= ($row['tanggal_pelapor']); ?></td>
                    <td><?= ($row['kategori_laporan']); ?></td>
                    <td><?= ($row['tanggapan']); ?></td>
                    <td>
                       
                        <form action="hapus.php" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus?');">
                             <input type="hidden" name="id" value="<?= $row['id_pengaduan']; ?>">
                             <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                         </form>
                     </td>
                </tr>
                <?php
                    }
                } else {
                    echo "<tr><td colspan='7' class='text-center'>Belum ada data pengaduan.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <br>
  <br>
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>