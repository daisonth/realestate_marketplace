<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="description" content="">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

  <!-- Title  -->
  <title>Amado - Furniture Ecommerce Template | Home</title>

  <!-- Favicon  -->
  <link rel="icon" href="img/core-img/favicon.ico">

  <!-- Core Style CSS -->
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
        <a href="index.php"><img src="img/core-img/logo.png" alt=""></a>
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
        <a href="index.php"><img src="img/core-img/logo.png" alt=""></a>
      </div>
    </header>
    <!-- Header Area End -->
    <div class="cart-table-area section-padding-100">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-lg-8">
            <div class="checkout_details_area mt-50 clearfix">

              <div class="cart-title">
                <h2>Login</h2>
              </div>

              <form action="#" method="post">
                <div class="row">
                  <div class="col-12 mb-3">
                    <input type="email" class="form-control" id="email" placeholder="Email" value="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 mb-3">
                    <input type="password" class="form-control" id="password" placeholder="Password" value="">
                  </div>
                </div>
                <div class="amado-btn-group mt-30 mb-100">
                  <a href="login.php" class="btn amado-btn mb-15">Login</a>
                </div>
              </form>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  <!-- ##### Main Content Wrapper End ##### -->

  <?php include("footer.php"); ?>
