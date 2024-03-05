<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <title>Login</title>
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/login.css?v=<?php echo time()?>">
  <link rel="icon" href="gambar/SL_logo_b.png" type="image/icon type">

<script>
        // Ambil parameter error dari URL
        const urlParams = new URLSearchParams(window.location.search);
        const error = urlParams.get('error');

        // Jika terdapat parameter error, tampilkan pesan kesalahan
        if (error === '1') {
            alert("Username atau password salah!");
        }
    </script>
</head>
<body class="align">

  <div class="grid align__item">

    <div class="register">

    <img src="gambar/SL_w_nobg.png" alt="">

      <h2>Login</h2>

      <form action="proses_login.php" method="post" class="form">

        <div class="form__field">
        <tr>
                <td><input type="text" name="username" placeholder="Username"></td>
            </tr>
        </div>

        <div class="form__field">
        <tr>
                <td><input type="password" name="password" placeholder="Password"></td>
            </tr>
        </div>

        <div class="form__field">
        <tr>
                <td><input type="submit" name="" value="Log In"></td>
            </tr>
        </div>

      </form>

      <p>Don't have an account?<a href="register.php">Sign Up</a></p>

    </div>

  </div>

  
</body>
</html>
