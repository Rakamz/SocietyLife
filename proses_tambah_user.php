<?php
include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$namalengkap = $_POST['namalengkap'];

// Set level ke nilai default
$level = "user";

// Set tanggal_dibuat ke tanggal dan waktu saat ini
$tanggal_dibuat = date('Y-m-d H:i:s');

$sql = mysqli_query($conn, "INSERT INTO user (username, password, email, namalengkap, level, tanggal_dibuat) VALUES ('$username', '$password', '$email', '$namalengkap', '$level', '$tanggal_dibuat')");

header("location: data-user.php");
?>
