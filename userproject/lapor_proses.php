<?php
// Menghubungkan ke file koneksi database
require 'admin/koneksi.php';

// Cek apakah request yang masuk adalah POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Ambil data dari form dan bersihkan dengan htmlspecialchars untuk mencegah XSS
    $judul = htmlspecialchars($_POST['judul']);
    $isi_laporan = htmlspecialchars($_POST['isi_laporan']);
    $tanggal = htmlspecialchars($_POST['tanggal_pelapor']);
    $kategori_laporan = htmlspecialchars($_POST['kategori_laporan']);
    $tanggapan = htmlspecialchars($_POST['tanggapan']);

    // Menyusun query SQL untuk menyimpan data pengaduan ke dalam tabel
    $query = "INSERT INTO pengaduan (judul, isi_laporan, tanggal_pelapor, kategori_laporan, tanggapan)
              VALUES ('$judul', '$isi_laporan', '$tanggal', '$kategori_laporan' , '$tanggapan')";

    // Menjalankan query ke database
    $result = mysqli_query($conn, $query);

    // Mengecek apakah data berhasil disimpan
    if ($result) {
        // Jika berhasil, alihkan ke halaman index.php
        header("Location: index.php");
    } else {
        // Jika gagal, tampilkan pesan error
        echo "Error: " . mysqli_error($con); // Tampilkan pesan error
    }

    // Tutup koneksi database
    mysqli_close($conn);
    exit;
}
?>
