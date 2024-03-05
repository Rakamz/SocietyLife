<?php
session_start();
include "koneksi.php";

if(isset($_POST['email'], $_POST['namalengkap'], $_POST['username'], $_POST['password'])) {
    $email = $_POST['email'];
    $namalengkap = $_POST['namalengkap'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Handle file upload if a file is uploaded
    if(isset($_FILES["foto"]) && $_FILES["foto"]["error"] == 0) {
        // Jika ada file yang diunggah
        $foto_dir = "uploads/"; // Direktori untuk menyimpan foto
        $foto_path = $foto_dir . basename($_FILES["foto"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($foto_path,PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["foto"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($foto_path)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["foto"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // Jika gagal mengunggah foto, atur path foto ke "user.png" secara default
            $foto_path = "gambar/profil/user.png";
        } else {
            // Jika berhasil mengunggah foto, pindahkan file ke direktori yang ditentukan
            if (move_uploaded_file($_FILES["foto"]["tmp_name"], $foto_path)) {
                echo "The file ". basename( $_FILES["foto"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        // Jika tidak ada file yang diunggah, atur path foto ke "user.png" secara default
        $foto_path = "gambar/profil/user.png";
    }

    // Insert data into database
    // ...

    // For example, you can insert $foto_path into database
} else {
    echo "Please fill all required fields.";
}
?>
