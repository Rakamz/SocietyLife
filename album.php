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
        <div class="logo-details">
            <img src="gambar/SL_w_nobg.png" alt="" style="height: 75px;">
            <div class="logo_name">SocietyLife</div>
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <?php
        session_start();

        if (!isset($_SESSION['userid'])) {
            // Jika pengguna adalah guest
        ?>
            <ul class="nav-list">
                <li>
                    <i class='bx bx-search'></i>
                    <input type="text" placeholder="Search...">
                    <span class="tooltip">Search</span>
                </li>
                <li>
                    <a href="login.php">
                        <i class='bx bx-user'></i>
                        <span class="links_name">Login</span>
                    </a>
                    <span class="tooltip">Login</span>
                </li>
                <li>
                    <a href="register.php">
                        <i class='bx bx-user'></i>
                        <span class="links_name">Register</span>
                    </a>
                    <span class="tooltip">Register</span>
                </li>
            </ul>
        <?php
        } elseif ($_SESSION['level'] == 'user') {
            // Jika pengguna adalah user
        ?>
            <ul class="nav-list">
                <li>
                    <i class='bx bx-search'></i>
                    <input type="text" placeholder="Search...">
                    <span class="tooltip">Search</span>
                </li>
                <li>
                    <a href="index.php">
                        <i class='bx bx-grid-alt'></i>
                        <span class="links_name">Beranda</span>
                    </a>
                    <span class="tooltip">Beranda</span>
                </li>
                <li>
                    <a href="foto.php">
                        <i class='bx bx-image'></i>
                        <span class="links_name">Add Image</span>
                    </a>
                    <span class="tooltip">Add Image</span>
                </li>
                <li>
                    <a href="album.php">
                        <i class='bx bx-images'></i>
                        <span class="links_name">Album</span>
                    </a>
                    <span class="tooltip">Album</span>
                </li>
                <li class="profile">
                    <div class="profile-details">
                        <div class="name_job">
                            <div class="name"></div>
                            <div class="job"><?= $_SESSION['namalengkap'] ?></div>
                        </div>
                    </div>
                    <a href="logout.php"><i class='bx bx-log-out' id="log_out"></i></a>
                </li>
            </ul>
        <?php
        } elseif ($_SESSION['level'] == 'admin') {
            // Jika pengguna adalah admin
        ?>
            <ul class="nav-list">
                <li>
                    <i class='bx bx-search'></i>
                    <input type="text" placeholder="Search...">
                    <span class="tooltip">Search</span>
                </li>
                <li>
                    <a href="index.php">
                        <i class='bx bx-grid-alt'></i>
                        <span class="links_name">Beranda</span>
                    </a>
                    <span class="tooltip">Beranda</span>
                </li>
                <li>
                    <a href="foto.php">
                        <i class='bx bx-image'></i>
                        <span class="links_name">Add Image</span>
                    </a>
                    <span class="tooltip">Add Image</span>
                </li>
                <li>
                    <a href="#">
                        <i class='bx bx-pie-user'></i>
                        <span class="links_name">User</span>
                    </a>
                    <span class="tooltip">User</span>
                </li>
                <li>
                    <a href="">
                        <i class='bx bx-images'></i>
                        <span class="links_name">Album</span>
                    </a>
                    <span class="tooltip">Album</span>
                </li>
                <li class="profile">
                    <div class="profile-details">
                        <div class="name_job">
                            <div class="name"></div>
                            <div class="job"><?= $_SESSION['namalengkap'] ?></div>
                        </div>
                    </div>
                    <a href="logout.php"><i class='bx bx-log-out' id="log_out"></i></a>
                </li>
            </ul>
        <?php
        }
        ?>
    </div>

    <section class="home-section">

        <div class="text">
            <h1>SocietyLife</h1>
        </div>

        <div class="pinggir">
            
            <form action="tambah_album.php" method="post" style="border-color: darkgrey;" class="upload">
                <table>
                    <b><h3>Tambah Album</h3></b>
                    <tr>
                        <td>Nama Album</td>
                        <td><input type="text" name="namaalbum"></td>
                    </tr>
                    <tr>
                        <td>Deskripsi</td>
                        <td><input type="text" name="deskripsi"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="Tambah"></td>
                    </tr>
                </table>
            </form>
        
      <main class="cd__main">
         <div class="grid"><?php
include "koneksi.php";
$userid = $_SESSION['userid'];
$sql = mysqli_query($conn, "SELECT album.*, user.username, foto.lokasifile FROM album INNER JOIN user ON album.userid = user.userid LEFT JOIN foto ON album.albumid = foto.albumid WHERE album.userid='$userid' GROUP BY album.albumid ORDER BY foto.tanggal_dibuat DESC");
while ($data = mysqli_fetch_array($sql)) {
    ?>
    <div class="grid__item">
        <div class="card">
            <?php if($data['lokasifile']) { ?>
                <img src="gambar/<?= $data['lokasifile'] ?>" alt="Belum Ada Foto Yang Ditambahkan">
            <?php } else { ?>
                <div class="empty-image">Album ini belum memiliki foto</div>
            <?php } ?>
            <div class="card__content">
                <p style="color:grey; text-align:center;"><?= $data['tanggal_dibuat'] ?></p>
                <h1 class="card__header"><?= $data['namaalbum'] ?></h1>
                <p class="card__text"><?= $data['deskripsi'] ?></p>
                <a href="isi_album.php?albumid=<?= $data['albumid'] ?>" class="card__btn">Lihat <span>&rarr;</span></a>
            </div>
        </div>
    </div>
<?php
}
?>

  </div>
</div>
         <!-- END EDMO HTML (Happy Coding!)-->
      </main>


        </div>

    </section>

    <script>
        let sidebar = document.querySelector(".sidebar");
        let closeBtn = document.querySelector("#btn");
        let searchBtn = document.querySelector(".bx-search");

        closeBtn.addEventListener("click", () => {
            sidebar.classList.toggle("open");
            menuBtnChange(); //calling the function(optional)
        });

        searchBtn.addEventListener("click", () => { // Sidebar open when you click on the search iocn
            sidebar.classList.toggle("open");
            menuBtnChange(); //calling the function(optional)
        });

        // following are the code to change sidebar button(optional)
        function menuBtnChange() {
            if (sidebar.classList.contains("open")) {
                closeBtn.classList.replace("bx-menu", "bx-menu-alt-right"); //replacing the iocns class
            } else {
                closeBtn.classList.replace("bx-menu-alt-right", "bx-menu"); //replacing the iocns class
            }
        }
    </script>
</body>

</html>