<?php
require 'koneksi.php';

// Ambil ID dari URL
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID tidak valid.");
}
$id = intval($_GET['id']);

// Ambil data pengaduan berdasarkan ID
$query = "SELECT * FROM pengaduan WHERE id_pengaduan = $id";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    die("Data tidak ditemukan.");
}

// Proses pengiriman tanggapan
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tanggapan = mysqli_real_escape_string($conn, $_POST['tanggapan']);
    $updateQuery = "UPDATE pengaduan SET tanggapan = '$tanggapan' WHERE id_pengaduan = $id";
    if (mysqli_query($conn, $updateQuery)) {
        header("Location: admin.php");
        exit;
    } else {
        echo "Gagal mengirim tanggapan: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tanggapan</title>

    <style>
  body {
    background-image: url('../img/login.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    min-height: 100vh;
    margin: 0;
    display: flex; /* flex horizontal */
    flex-direction: row; /* letakkan sidebar dan konten berdampingan */
}

.sidebar {
    width: 250px;
    background-color: #343a40;
    color: white;
    padding: 30px;
    height: 100vh;
    position: relative;
    flex-shrink: 0; /* tetap di ukuran 250px */
    box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
}

.container {
    flex: 1;
    background-color: rgba(255, 255, 255, 0.7);
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    margin: 50px auto; /* tengah vertikal */
    margin-left: 300px; /* Jarak dari sidebar */
    max-width: 1000px;
}

.sidebar .nav-link {
      color: white;
      margin-bottom: 10px;
      transition: background-color 0.3s ease;
    }

    .sidebar h4 {
      text-align: center;
      margin-bottom: 20px;
    }

    .sidebar .nav-link:hover {
      background-color: #495057;
      border-radius: 5px;
    }



   
</style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>

 <div class="sidebar">
    <h4>Panel aksi</h4>
    <ul class="nav flex-column">
      <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
      <li class="nav-item"><a class="nav-link" href="admin.php">admin</a></li>
    </ul>
  </div>

    <div class="container mt-5">
        <h1 class="text-center" style="color: #fff">Kirim Tanggapan</h1>
        <form method="POST" class="mt-4">
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control" id="judul" value="<?= ($data['judul']); ?>" disabled>
            </div>
            <div class="mb-3">
                <label for="isi_laporan" class="form-label">Isi Laporan</label>
                <textarea class="form-control" id="isi_laporan" rows="4" disabled><?= ($data['isi_laporan']); ?></textarea>
            </div>
            <div class="mb-3">
                <label for="tanggapan" class="form-label">Tanggapan</label>
                <textarea class="form-control" id="tanggapan" name="tanggapan" rows="4" required><?= ($data['tanggapan']); ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Kirim Tanggapan</button>
            <a href="admin.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>