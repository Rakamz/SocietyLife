<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Foto</title>
    <link rel="stylesheet" href="css/foto.css">
    <style>
        .table {
            position: relative;
            top: 105px
        }
        /* Navbar style */
.navbar {
    list-style-type: none;
    margin: 0;
    padding: 10px;
    background-color: #9e7481; /* Warna latar belakang navbar */
    overflow: hidden;
    font-family: helvetica;
}

.navbar li {
    display: inline;
    margin-right: 10px;
    text-align: center;
    float: left;
    font-size: 10px;
    color: white;
}

.navbar li a {
    text-decoration: none;
    color: white; /* Warna teks navbar */
    padding: 10px;
    font-weight: bold;
}

.navbar li a:hover {
    color: #a38991; /* Warna teks saat dihover */
}

/* Responsive Navbar */
@media screen and (max-width: 600px) {
    .navbar {
        text-align: center;
    }

    .navbar li {
        display: block;
        margin: 0;
    }
}


.daftar-foto {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    align-items: stretch;
    margin-top: 20px;
}

.container-gambar {
    position: relative;
    font-family: helvetica;
}

.deskripsi {
    max-width: 400px;
    margin-top: 10px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    position: relative;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    z-index: 1;
    font-family: helvetica;
}

.container-gambar-img {
    position: relative;
    max-width: 100%;
    height: auto;
    border-radius: 8px;
    width: 100%; /* Menjadikan lebar 100% */
    height: auto; /* Menyesuaikan tinggi agar tidak terdistorsi */
    object-fit: cover; /* Memastikan gambar memenuhi kotak tanpa terdistorsi */
}



    .container-gambar p {
        text-align: center; /* Pusatkan konten secara horizontal */
        font-size: 20px;
        

    }

    .container-gambar a {
        display: inline-block;
        margin: 5px;
        padding: 8px 15px;
        text-decoration: none;
        color: #fff;
        background-color: #944E63; /* Sesuaikan warna latar belakang sesuai kebutuhan */
        border-radius: 5px;
    }

    .container-gambar a:hover {
        background-color: #9e7481; /* Sesuaikan warna latar belakang hover sesuai kebutuhan */
    }

    /* Gaya untuk tombol */
    .tombol {
        text-align: center; /* Pusatkan tombol secara horizontal */
        margin-top: 10px; /* Jarak atas dari elemen sebelumnya */
    }

    .tombol p {
        margin: 0; /* Hilangkan margin default pada paragraf */
    }

    .tombol a {
        display: inline-block;
        margin: 5px;
        padding: 8px 15px;
        text-decoration: none;
        color: #fff;
    background-color:#944E63;
        border-radius: 5px;
    }

    .tombol a:hover {
        background-color:#944E63; /* Warna latar belakang tombol saat dihover */
    }

    form {
        display: flex;
        flex-direction: column;
        max-width: 400px;
        margin: auto;
    }
    
    table {
        width: 100%;
    }
    
    td {
        padding: 10px;
    }
    
    input[type="text"],
    input[type="file"],
    select {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        box-sizing: border-box;
    }
    
    input[type="submit"] {
        background-color:#944E63;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    
    input[type="submit"]:hover {
        background-color: #533d4449;
    }

    tbody {
        text-align: center;
    }
   

    ul ul {
        float: right;
    }


    .upload{
        box-shadow: 0 0 250px firebrick;
        top: 150px;
        position: relative;
    }

    .upload h3{
        text-align: center;
        font-family: helvetica;
    }

    .navbar ul {
        padding-top: 15px;
    }

    .add{
        z-index:1;
        position: relative;
    }
    </style>
</head>

<body>
    <ul class="navbar">
        <li>
            <h2>SnapShine</h2>
        </li>
        <?php
        // kondisi untuk guest
        session_start();
        if (!isset($_SESSION['userid'])) {
        ?>
            <ul>
                <li><a href="daftar.php">Daftar</a></li>
                <li><a href="masuk.php">Masuk</a></li>
            </ul>
            <?php
        } else {
            // Mendapatkan informasi level pengguna dari sesi atau tabel user
            $level = isset($_SESSION['level']) ? $_SESSION['level'] : '';

            // Kondisi untuk user
            if ($level == 'user') {
            ?>
                <ul>
                    <li><a href="user.php">Beranda</a></li>
                    <li><a href="album.php">Album</a></li>
                    <li><a href="foto.php">Foto</a></li>
                    <li><a href="logout.php">Keluar</a></li>
                </ul>

            <?php
                // kondisi untuk admin
            } elseif ($level == 'admin') {
            ?>
                <ul>
                    <li><a href="user.php">Beranda</a></li>
                    <li><a href="album.php">Album</a></li>
                    <li><a href="foto.php">Foto</a></li>
                    <li><a href="data-user.php">Data User</a></li>
                    <li><a href="logout.php">Keluar</a></li>
                </ul>
            <?php
                // Kondisi untuk level tidak terdeteksi
            } else {
                // Tindakan yang diambil ketika level tidak terdeteksi
                echo "Level tidak terdeteksi";
            }

            ?>



    </ul>
<?php
        }
?>


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

                    // Mendapatkan userid dari sesi
                    $userid = $_SESSION['userid'];

                    // Mengambil data album dari database berdasarkan userid
                    $sql = mysqli_query($conn, "SELECT * FROM album WHERE userid='$userid'");

                    // Melakukan iterasi melalui hasil query untuk menampilkan opsi album dalam formulir
                    while ($data = mysqli_fetch_array($sql)) {
                    ?>
                        <option value="<?= $data['albumid'] ?>">
                            <?= $data['namaalbum'] ?>
                        </option>
                    <?php
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Tambah" class="add"></td>
        </tr>
    </table>
</form>
<div class="table">

    <table border="1" cellpadding=5 cellspacing=0 class="table">
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Tanggal Unggah</th>
            <th>Lokasi File</th>
            <th>Album</th>
            <th>Disukai</th>
            <th>Aksi</th>
        </tr>
        <?php
        include "koneksi.php";
        $userid = $_SESSION['userid'];
        $sql = mysqli_query($conn, "select * from foto,album where foto.userid='$userid' and foto.albumid=album.albumid");
        while ($data = mysqli_fetch_array($sql)) {
        ?>
            <tr>
                <td><?= $data['fotoid'] ?></td>
                <td><?= $data['judulfoto'] ?></td>
                <td><?= $data['deskripsifoto'] ?></td>
                <td><?= $data['tanggalunggah'] ?></td>
                <td>
                    <img src="gambar/<?= $data['lokasifile'] ?>" width="200px">
                </td>
                <td><?= $data['namaalbum'] ?></td>
                <td>
                    <?php
                    $fotoid = $data['fotoid'];
                    $sql2 = mysqli_query($conn, "select * from likefoto where fotoid='$fotoid'");
                    echo mysqli_num_rows($sql2);
                    ?>
                </td>
                <td>
                    <a href="hapus_foto.php?fotoid=<?= $data['fotoid'] ?>">Hapus</a>
                    <a href="edit_foto.php?fotoid=<?= $data['fotoid'] ?>">Edit</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</div>

</body>

</html>