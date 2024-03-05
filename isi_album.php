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

    <style>
        .pinggir{
            background-color: inherit;
        }
        /* Lazy Load Styles */
        .card-image {
            display: block;
            min-height: 20rem;
            /* layout hack */
            background: #fff center center no-repeat;
            background-size: cover;
            /* blur the lowres image */
        }

        .card-image>img {
            display: block;
            width: 100%;
            opacity: 1;
            /* visually hide the img element */
        }

        .card-image.is-loaded {
            filter: none;
            /* remove the blur on fullres image */
            transition: filter 1s;
        }




        /* Layout Styles */
        html,
        body {
            width: 100%;
            height: 100%;
            margin: 0;
            font-size: 16px;
            font-family: sans-serif;
        }

        .card-list {
            display: block;
            margin: 1rem auto;
            padding: 0;
            font-size: 0;
            text-align: center;
            list-style: none;
        }

        .card {
            display: inline-block;
            width: 90%;
            max-width: 20rem;
            margin: 1rem;
            font-size: 1rem;
            text-decoration: none;
            overflow: hidden;
            box-shadow: 0 0 3rem -1rem rgba(0, 0, 0, 0.5);
            transition: transform 0.1s ease-in-out, box-shadow 0.1s;
        }

        .card:hover {
            transform: translateY(-0.5rem) scale(1.0125);
            box-shadow: 0 0.5em 3rem -1rem rgba(0, 0, 0, 0.5);
        }

        .card-description {
            display: block;
            padding: 1em 0.5em;
            color: #515151;
            text-decoration: none;
        }

        .card-description>h2 {
            margin: 0 0 0.5em;
        }

        .card-description>p {
            margin: 0;
        }
    </style>
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
            <?php
            // Sertakan file koneksi ke database
            include "koneksi.php";

            // Pastikan albumid ada dalam parameter URL
            if (isset($_GET['albumid'])) {
                // Ambil albumid dari parameter URL
                $albumid = $_GET['albumid'];

                // Query untuk mendapatkan foto-foto dari album berdasarkan albumid
                $query = "SELECT * FROM foto WHERE albumid = $albumid";
                $result = mysqli_query($conn, $query);

                // Periksa apakah ada foto dalam album
                if (mysqli_num_rows($result) > 0) {
                    // Tampilkan judul album
                    $query_album = "SELECT namaalbum FROM album WHERE albumid = $albumid";
                    $result_album = mysqli_query($conn, $query_album);
                    $album = mysqli_fetch_assoc($result_album);
                    echo "<h1>Album: " . $album['namaalbum'] . "</h1>";

                    // Tampilkan foto-foto dalam album
                    while ($foto = mysqli_fetch_assoc($result)) {
            ?>

                        <ul class="card-list">

                            <li class="card">
                            <a class="card-image" href="isi_foto.php?fotoid=<?= $foto['fotoid'] ?>">
    <img src="gambar/<?= $foto['lokasifile'] ?>" alt="" />
</a>
<a class="card-description" href="isi_foto.php?fotoid=<?= $foto['fotoid'] ?>">
    <h2><?= $foto['judulfoto']?> </h2>
    <p><?= $foto['deskripsifoto']?> </p>
</a>

                            </li>
                        </ul>
            <?php }
                } else {
                    // Tampilkan pesan jika album tidak memiliki foto
                    echo "<p>Album ini belum memiliki foto.</p>";
                }
            } else {
                // Jika albumid tidak diberikan dalam parameter URL
                echo "Albumid tidak ditemukan dalam parameter URL.";
            }
            ?>

            <!-- Tambahkan kode HTML atau PHP lainnya di sini sesuai kebutuhan -->


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