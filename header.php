<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="description" content="">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@45,300,0,6" />
  <title>Online Real Estate Shop | Home</title>

  <link rel="icon" href="img/core-img/favicon.ico">
  <link rel="stylesheet" href="css/core-style.css">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <!-- Search Wrapper Area Start -->
  <div class="search-wrapper section-padding-100">
    <div class="search-close">
      <i class="fa fa-close" aria-hidden="true"></i>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="search-content">
            <form action="#" method="get">
              <input type="search" name="search" id="search" placeholder="Type your keyword...">
              <button type="submit"><img src="img/core-img/search.png" alt=""></button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Search Wrapper Area End -->

  <!-- ##### Main Content Wrapper Start ##### -->
  <div class="main-content-wrapper d-flex clearfix">

    <!-- Mobile Nav (max width 767px)-->
    <div class="mobile-nav">
      <!-- Navbar Brand -->
      <div class="amado-navbar-brand">
        <a href="index.php"><img src="img/core-img/daas.png" alt=""></a>
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
        <a href="index.php"><img src="img/core-img/daas.png" alt=""></a>
      </div>
      <!-- Amado Nav -->
      <nav class="amado-nav">
        <ul class="nav-list">
          <li><a href="index.php" class="fav-nav"><img src="img/core-img/home.png" alt=""> Home</a></li>

          <li><a href="shop.php" class="fav-nav"><img src="img/core-img/shopping.png" alt=""> Shop</a></li>
          <li><a href="sell.php" class="fav-nav"><img src="img/core-img/sell.png" alt=""> Sell</a></li>
          <li><a href="cart.php" class="fav-nav"><img src="img/core-img/star_off.png" alt=""> My WishList</a></li>
          <?php if (isset($_SESSION["userid"])) { ?>
            <li><a href="my_listings.php" class="fav-nav"><img src="img/core-img/listings.png" alt=""> My Listings</a></li>
            <li><a href="user_account.php" class="fav-nav"><img src="img/core-img/user.png" alt=""> <?php echo $_SESSION["fname"] ?></a></li>
          <?php } ?>
          <li><a href="#" class="search-nav"><img src="img/core-img/find.png" alt=""> Search</a></li>
        </ul>
      </nav>
      <!-- Button Group -->

      <?php
      if (isset($_SESSION["userid"])) {
      ?>
        <div class="amado-btn-group mt-30 mb-100">
          <a href="logout.php" class="btn amado-btn mb-15"> LOGOUT</a>
        </div>
      <?php
      } else {
      ?>
        <div class="amado-btn-group mt-30 mb-100">
          <a href="login.php" class="btn amado-btn mb-15">LOGIN</a>
          <a href="signup.php" class="btn amado-btn active">SIGNUP</a>
        </div>
      <?php } ?>

    </header>
    <!-- Header Area End -->
