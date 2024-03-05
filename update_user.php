<?php
include "koneksi.php";
session_start();

$userid = $_POST['userid'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$level = $_POST['level'];
$namalengkap = $_POST['namalengkap'];

// Cek apakah ada username atau password yang sama
$checkQuery = mysqli_query($conn, "SELECT * FROM user WHERE (username = '$username' OR password = '$password') AND userid != '$userid'");
if(mysqli_num_rows($checkQuery) > 0) {
    // Jika ada username atau password yang sama, tampilkan pesan alert menggunakan JavaScript
    echo "<script>alert('Username atau password sudah digunakan. Silakan gunakan yang lain.'); window.location.href = 'data-user.php';</script>";
    exit(); // Keluar dari skrip untuk menghentikan pembaruan
}

// Lindungi nilai string dengan tanda kutip
$sql = mysqli_query($conn, "UPDATE user SET username='$username', password='$password', email='$email',  namalengkap='$namalengkap' WHERE userid='$userid'");

header("location:data-user.php");
?>
