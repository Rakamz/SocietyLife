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
    <style>
        .level{
            background-color: grey;
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
                            <div class="name"></td>
                            <div class="job"><?= $_SESSION['namalengkap'] ?></td>
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
                            <div class="name"></td>
                            <div class="job"><?= $_SESSION['namalengkap'] ?></td>
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

        <form action="update_user.php" method="post" enctype="multipart/form-data">
        <?php
            include "koneksi.php";
            $userid=$_GET['userid'];
            $sql=mysqli_query($conn,"select * from user where userid='$userid'");
            while($data=mysqli_fetch_array($sql)){
        ?>
        <input type="text" name="userid" value="<?=$data['userid']?>" hidden>
        <table>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" value="<?=$data['username']?>"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" value="<?=$data['password']?>"></td>
            </tr>
            <tr>
                <td>Nama Lengkap</td>
                <td><input type="text" name="namalengkap" value="<?=$data['namalengkap']?>"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email" value="<?=$data['email']?>"></td>
            </tr>
            <tr>
                <td>level</td>
                <td><input type="text" name="level" value="<?=$data['level']?>" disabled class="level"></td>
            </tr>
            <tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Ubah"></td>
            </tr>
        </table>
        <?php
            }
        ?>
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