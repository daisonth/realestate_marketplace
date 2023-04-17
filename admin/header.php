<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php
session_start();
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="description" content="">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@45,300,0,6" />
  <title>Admin | DAAS Real Estats</title>
  <link rel="icon" href="../img/core-img/favicon.ico">
  <link rel="stylesheet" href="../css/core-style.css">
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <!-- ##### Main Content Wrapper Start ##### -->
  <div class="main-content-wrapper d-flex clearfix">

    <!-- Mobile Nav (max width 767px)-->
    <div class="mobile-nav">
      <!-- Navbar Brand -->
      <div class="amado-navbar-brand">
        <a href="index.php"><img src="../img/core-img/daas.png" alt=""></a>
      </div>
      <!-- Navbar Toggler -->
      <div class="amado-navbar-toggler">
        <span></span><span></span><span></span>
      </div>
    </div>

    <!-- Header Area Start -->
    <header class="header-area clearfix">
      <!-- Close Icon -->
      <div class="nav-close">
        <i class="fa fa-close" aria-hidden="true"></i>
      </div>
      <!-- Logo -->
      <div class="logo">
        <a href="index.php"><img src="../img/core-img/daas.png" alt=""></a>
        <p class="text-center">ADMIN PANEL</p>
      </div>
      <!-- Amado Nav -->
      <nav class="amado-nav">
        <ul class="nav-list">
          <li><a href="index.php" class="fav-nav"><img src="../img/core-img/dashboard.png" alt=""> Dashboard</a></li>
          <li><a href="edit_home_page.php" class="fav-nav"><img src="../img/core-img/home.png" alt=""> Edit Home Page</a></li>
          <li><a href="properties_listed.php" class="fav-nav"><img src="../img/core-img/shopping.png" alt=""> Listed Properties</a></li>
          <li><a href="registerd_users.php" class="fav-nav"><img src="../img/core-img/users.png" alt=""> Registerd Users</a></li>
          <li><a href="categories.php" class="fav-nav"><img src="../img/core-img/listings.png" alt=""> Categories</a></li>
          <li><a href="cities.php" class="fav-nav"><img src="../img/core-img/city.png" alt=""> Cities</a></li>
          <li><a href="states.php" class="fav-nav"><img src="../img/core-img/state.png" alt=""> States</a></li>
          <!-- <li><a href="states.php" class="fav-nav"><img src="../img/core-img/user.png" alt=""> <?php echo $_SESSION["fname"] ?></a></li> -->
        </ul>
      </nav>
      <!-- Button Group -->
      <div class="amado-btn-group mt-30 mb-100">
        <a href="../logout.php" class="btn amado-btn mb-15"> LOGOUT</a>
      </div>
    </header>
    <!-- Header Area End -->
