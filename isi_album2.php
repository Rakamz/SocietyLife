<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Album</title>
    <link rel="stylesheet" href="style.css">

    <link rel="icon" href="gambar/SL_logo_b.png" type="image/icon type">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/postingan.css">
    <link rel="stylesheet" href="css/album.css">

    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>

    <div class="sidebar">
        <!-- Sidebar content here -->
    </div>

    <section class="home-section">

        <div class="text">
            <h1>SocietyLife</h1>
        </div>

        <div class="pinggir">
            
            <form action="tambah_album.php" method="post" style="border-color: darkgrey;" class="upload">
                <!-- Form for adding new album -->
            </form>
        
            <main class="cd__main">
                <div class="grid">
                    <?php
                    include "koneksi.php";
                    session_start();
                    $userid = $_SESSION['userid'];

                    // Query untuk mendapatkan data album beserta foto-foto yang dimiliki oleh pengguna yang sedang login
                    $sql = mysqli_query($conn, "SELECT album.*, user.username, foto.lokasifile FROM album INNER JOIN user ON album.userid = user.userid LEFT JOIN foto ON album.albumid = foto.albumid WHERE album.userid='$userid' GROUP BY album.albumid ORDER BY foto.tanggal_dibuat DESC");
                    
                    // Looping untuk menampilkan setiap album
                    while ($data = mysqli_fetch_array($sql)) {
                    ?>
                        <div class="grid__item">
                            <div class="card">
                                <?php if($data['lokasifile']) { ?>
                                    <!-- Menampilkan foto album jika ada -->
                                    <img src="gambar/<?= $data['lokasifile'] ?>" alt="<?= $data['namaalbum'] ?>">
                                <?php } else { ?>
                                    <!-- Jika album tidak memiliki foto, tampilkan pesan -->
                                    <div class="empty-image">Album ini belum memiliki foto</div>
                                <?php } ?>
                                <div class="card__content">
                                    <!-- Tampilkan informasi album -->
                                    <p style="color:grey; text-align:center;"><?= $data['tanggal_dibuat'] ?></p>
                                    <h1 class="card__header"><?= $data['namaalbum'] ?></h1>
                                    <p class="card__text"><?= $data['deskripsi'] ?></p>
                                    <!-- Link untuk melihat detail album -->
                                    <a href="isi_album.php?albumid=<?= $data['albumid'] ?>" class="card__btn">Lihat <span>&rarr;</span></a>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </main>

        </div>

    </section>

    <script>
        // Script JavaScript untuk manajemen sidebar
    </script>
</body>

</html>
