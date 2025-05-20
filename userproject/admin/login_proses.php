<?php
session_start();

// Koneksi database
require 'koneksi.php';

// Cek method POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password']; // tanpa hash
 // Jangan htmlspecialchars password, biarkan asli
}

// Cek input kosong
if (empty($email) || empty($password)) {
    $_SESSION['login_error'] = "Email dan password harus diisi!";
    echo "<meta http-equiv='refresh' content='1;url=login.php'>";
    exit;
}

// Ambil data admin berdasarkan email
$queryadmin = "SELECT * FROM admin WHERE email = ?";
$stmt = mysqli_prepare($conn, $queryadmin);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$resultadmin = mysqli_stmt_get_result($stmt);
$admin = mysqli_fetch_assoc($resultadmin);

// Jika data ditemukan
if ($admin) {
    // Verifikasi password dengan hash di database
    if (password_verify($password, $admin['password'])) {
        $_SESSION['id'] = $admin['id'];
        $_SESSION['email'] = $admin['email'];
        echo "<meta http-equiv='refresh' content='1;url=dashboard.php'>";
        exit;
    } else {
        $_SESSION['login_error'] = "Email atau Password Salah!";
        echo "<meta http-equiv='refresh' content='1;url=login.php'>";
        exit;
    }
}

// Jika data tidak ditemukan
$_SESSION['login_error'] = "Email atau Password Salah!";
echo "<meta http-equiv='refresh' content='1;url=login.php'>";
exit;
?>
