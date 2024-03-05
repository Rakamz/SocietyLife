<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sign Up</title>
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/login.css?v=<?php echo time()?>">
  <link rel="icon" href="gambar/SL_logo_b.png" type="image/icon type">
  <style>
    .register{
      padding: 1px;
    }
  </style>
</head>
<body class="align">
  <div class="grid align__item">
    <div class="register">
      <img src="gambar/SL_w_nobg.png" alt="">
      <h2>Sign Up</h2>
      <form action="proses_register.php" method="post" enctype="multipart/form-data" class="form"> <!-- Tambahkan enctype="multipart/form-data" untuk mengunggah file -->
        <div class="form__field">
          <input type="email" name="email" placeholder="Email">
        </div>
        <div class="form__field">
          <input type="text" name="namalengkap" placeholder="Full Name">
        </div>
        <div class="form__field">
          <input type="text" name="username" placeholder="Username">
        </div>
        <div class="form__field">
          <input type="password" name="password" placeholder="Password">
        </div>
        <div class="form__field">
          <input type="submit" value="Sign Up">
        </div>
      </form>
      <p>Already have an accout? <a href="login.php">Log In</a></p>
    </div>
  </div>
</body>
</html>
