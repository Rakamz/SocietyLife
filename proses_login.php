<?php
include "koneksi.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data yang dikirim melalui form
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Query untuk mengecek keberadaan user dengan username dan password yang sesuai
    $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    // Hitung jumlah baris hasil query
    $cek = mysqli_num_rows($result);

    if ($cek == 1) {
        // Jika data ditemukan, ambil informasi user
        $data = mysqli_fetch_array($result);
        
        // Set session
        $_SESSION['userid'] = $data['userid'];
        $_SESSION['namalengkap'] = $data['namalengkap'];
        $_SESSION['level'] = $data['level']; // Menyimpan informasi level user

        // Redirect ke halaman berdasarkan level user
        if ($data['level'] == 'admin') {
            header("location: admin-beranda.php");
        } else {
            header("location: user-beranda.php");
        }
    } else {
        // Jika data tidak ditemukan, redirect kembali ke halaman login (index.php)
        header("location: login.php");
    }
} else {
    // Jika bukan metode POST, redirect kembali ke halaman login (index.php)
    header("location: login.php");
}
?>
