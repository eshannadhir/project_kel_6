<?php
// masukkan file koneksi.php 
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];

    // lakukan query delete  ke database
    $query = "DELETE FROM pengaduan WHERE id_pengaduan = $id";

    if (mysqli_query($conn, $query)) {
        //jika berhasil melakukan hapus data di database kembali ke admin.php
        header("location:admin.php");
        exit;
    } else {
        // jika gagal tampilkan pesan error
        myqli_error($conn);
        echo "gagal menghapus data: " . mysqli_error($conn);
        header("location:admin.php");
        exit;
    }
}

mysqli_close($conn);
?>