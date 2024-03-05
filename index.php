<?php
// Fungsi untuk menghitung waktu yang lalu
function waktuYangLalu($timestamp)
{
    $waktu_sekarang = time();
    $selisih = $waktu_sekarang - strtotime($timestamp);

    if ($selisih < 60) {
        return 'beberapa detik yang lalu';
    } elseif ($selisih < 3600) {
        $menit = round($selisih / 60);
        return $menit . ' menit yang lalu';
    } elseif ($selisih < 86400) {
        $jam = round($selisih / 3600);
        return $jam . ' jam yang lalu';
    } else {
        $hari = round($selisih / 86400);
        return $hari . ' hari yang lalu';
    }
}



?>


<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Beranda </title>
    <link rel="stylesheet" href="style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/postingan.css">

    <link rel="icon" href="gambar/SL_logo_b.png" type="image/icon type">
</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <img src="gambar/SL_w_nobg.png" alt="" style="height: 75px;">
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
                    <a href="data-user.php">
                        <i class='bx bx-user'></i>
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

        <div class="grid align__item">
            <?php
            include "koneksi.php";
            $sql = mysqli_query($conn, "SELECT * FROM foto, user WHERE foto.userid=user.userid");
            while ($data = mysqli_fetch_array($sql)) {
            ?>
                <div class="post">

                    <div class="register">
                        <img src="gambar/<?= $data['lokasifile'] ?>" width="200px">
                        <p><?= $data['tanggal_dibuat'] ?></p>
                    </div>
                    <div class="komentar">
                        <div class="kolomkomen">
                            <div class="top-username">
                                <h1><?= $data['username'] ?></h1>
                            </div>
                            <div class="isikomen">
                                <?php
                                $sql_komen = mysqli_query($conn, "SELECT * FROM komentarfoto, user WHERE komentarfoto.userid=user.userid AND komentarfoto.fotoid = '{$data['fotoid']}'");
                                while ($data_komen = mysqli_fetch_array($sql_komen)) {
                                ?>
                                    <div class="komen">
                                        <p><b><?= $data_komen['username'] ?></b> : <?= $data_komen['isikomentar'] ?></p>
                                        <p class="waktuk"><?= waktuYangLalu($data_komen['tanggalkomentar']) ?></p>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="inputk">
                            <div class="like">
                                <a href="login.php">
                                    <i class="bx bx-heart" style="font-size: 30px;"></i></a>
                                <p>
                                    <?php
                                    $fotoid = $data['fotoid'];
                                    $sql2 = mysqli_query($conn, "SELECT * FROM likefoto WHERE fotoid='$fotoid'");
                                    echo mysqli_num_rows($sql2);
                                    ?>
                                </p>
                            </div>
                            <div class="jumlah-komen">
                                <a href="login.php">
                                    <i class="bx bx-comment" style="font-size: 30px;"></i>
                                </a>
                                <p>
                                    <?php
                                    $fotoid = $data['fotoid'];
                                    $sql2 = mysqli_query($conn, "SELECT * FROM komentarfoto WHERE fotoid='$fotoid'");
                                    echo mysqli_num_rows($sql2);
                                    ?>
                                </p>
                            </div>
                            <div class="comment">
                                <form action="login.php" method="post">
                                    <input type="hidden" name="fotoid" value="<?= $data['fotoid'] ?>"><a href="login.php">

                                        <input type="text" name="isikomentar" placeholder="Tambahkan Komentar...">
                                    </a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
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
    <script>
        // Memilih elemen input pencarian
        var input = document.getElementById("search-input");

        // Mendengarkan perubahan input
        input.addEventListener("input", function() {
            searchPosts();
        });

        function searchPosts() {
            var filter, posts, post, title, i, txtValue;
            filter = input.value.toUpperCase();
            posts = document.querySelectorAll(".post");

            for (i = 0; i < posts.length; i++) {
                post = posts[i];
                title = post.querySelector(".post-title");
                if (title) {
                    txtValue = title.textContent || title.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        post.style.display = "";
                    } else {
                        post.style.display = "none";
                    }
                }
            }
        }
    </script>

</body>

</html>