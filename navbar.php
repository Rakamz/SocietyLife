<!-- SIDE BAR -->
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
     
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/postingan.css">
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
        <img src="gambar/SL_w_nobg.png" alt="" style="height: 75px;">
      
        <div class="logo_name">SocietyLife</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    
    <?php
        session_start();
        if(!isset($_SESSION['userid'])){
    ?>
    
    <ul class="nav-list">
      <li>
          <i class='bx bx-search' ></i>
         <input type="text" placeholder="Search...">
         <span class="tooltip">Search</span>
      </li>
      <li>
       <a href="login.php">
         <i class='bx bx-user' ></i>
         <span class="links_name">Login</span>
       </a>
       <span class="tooltip">Login</span>
     </li>
      </li>
      <li>
       <a href="register.php">
         <i class='bx bx-user' ></i>
         <span class="links_name">Register</span>
       </a>
       <span class="tooltip">Register</span>
     </li>
    </ul>

    
    <?php
        }else{
    ?>   

        <ul class="nav-list">
      <li>
          <i class='bx bx-search' ></i>
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
       <a href="#">
         <i class='bx bx-user' ></i>
         <span class="links_name">User</span>
       </a>
       <span class="tooltip">User</span>
     </li>
     <li>
       <a href="foto.php">
         <i class='bx bx-image' ></i>
         <span class="links_name">Add Image</span>
       </a>
       <span class="tooltip">Add Image</span>
     </li>
     <li>
       <a href="album.php">
         <i class='bx bx-images' ></i>
         <span class="links_name">Album</span>
       </a>
       <span class="tooltip">Album</span>
     </li>
     <li class="profile">
         <div class="profile-details">
           <img src="profile.jpg" alt="profileImg">
           <div class="name_job">
             <div class="name">Prem Shahi</div>
             <div class="job"><?=$_SESSION['namalengkap']?></div>
           </div>
         </div>
         <a href="logout.php"><i class='bx bx-log-out' id="log_out" ></i>
</a>
     </li>
  
    </ul>
    <?php
        }
    ?>
  </div>



  </body>
</head>