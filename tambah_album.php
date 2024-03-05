<?php
include "koneksi.php";
session_start();

// Memastikan nilai $_SESSION['userid'] telah diinisialisasi dan valid
if(!isset($_SESSION['userid'])) {
    // Tindakan jika nilai $_SESSION['userid'] tidak valid, seperti mengembalikan pengguna ke halaman login
    header("location:login.php");
    exit; // Penting untuk menghentikan eksekusi skrip setelah pengalihan header
}

$namaalbum = $_POST['namaalbum'];
$deskripsi = $_POST['deskripsi'];
$tanggal_dibuat = date('Y-m-d H:i:s');
$userid = $_SESSION['userid'];

// Menjalankan query SQL untuk menambahkan album
$sql = "INSERT INTO album (namaalbum, deskripsi, tanggal_dibuat, userid) VALUES ('$namaalbum', '$deskripsi', '$tanggal_dibuat', '$userid')";
if(mysqli_query($conn, $sql)) {
    // Tindakan jika query berhasil dieksekusi, misalnya mengarahkan pengguna kembali ke halaman album
    header("location:album.php");
} else {
    // Tindakan jika terjadi kesalahan saat menjalankan query
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Menutup koneksi database
mysqli_close($conn);
?>
