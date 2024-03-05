<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Album</title>
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/postingan.css">
    <link rel="icon" href="gambar/SL_logo_b.png" type="image/icon type">

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
                    <a href="data-user.php">
                        <i class='bx bx-user'></i>
                        <span class="links_name">Data User</span>
                    </a>
                    <span class="tooltip">Data User</span>
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

            <form action="tambah_foto.php" method="post" enctype="multipart/form-data" class="upload">
                <h3>Upload Foto</h3>
                <table>
                    <tr>
                        <td>Judul</td>
                        <td><input type="text" name="judulfoto"></td>
                    </tr>
                    <tr>
                        <td>Deskripsi</td>
                        <td><input type="text" name="deskripsifoto"></td>
                    </tr>
                    <tr>
                        <td>Picture</td>
                        <td><input type="file" name="lokasifile"></td>
                    </tr>
                    <tr>
                        <td>Album</td>
                        <td>
                            <select name="albumid">
                                <?php
                                include "koneksi.php";
                                $userid = $_SESSION['userid'];
                                $sql = mysqli_query($conn, "select * from album where userid='$userid'");
                                while ($data = mysqli_fetch_array($sql)) {
                                ?>
                                    <option value="<?= $data['albumid'] ?>"><?= $data['namaalbum'] ?></option>
                                <?php
                                }
                                ?>
                            </select>

                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="Tambah"></td>
                    </tr>
                </table>
            </form>
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