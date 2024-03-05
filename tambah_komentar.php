<?php
session_start();
include "koneksi.php";

// Pastikan data yang dibutuhkan tersedia
if(isset($_POST['fotoid'], $_POST['isikomentar'])) {
    // Ambil data yang dikirimkan melalui formulir
    $fotoid = $_POST['fotoid'];
    $isikomentar = $_POST['isikomentar'];
    
    // Lakukan validasi atau sanitasi data jika diperlukan

    // Lakukan query untuk menyimpan komentar ke dalam database
    $query = "INSERT INTO komentarfoto (fotoid, userid, isikomentar, tanggalkomentar) VALUES ('$fotoid', '{$_SESSION['userid']}', '$isikomentar', NOW())";

    // Jalankan query
    $result = mysqli_query($conn, $query);

    if($result) {
        // Komentar berhasil ditambahkan
header("location: user-beranda.php");
    } else {
        // Terjadi kesalahan saat menambahkan komentar
        echo "Error: " . mysqli_error($conn);
    }
} else {
    // Data yang dibutuhkan tidak tersedia
    echo "Mohon lengkapi data komentar.";
}
?>
