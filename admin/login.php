<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="description" content="">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin Login | DAAS Real Estate</title>
  <link rel="icon" href="../img/core-img/favicon.ico">
  <link rel="stylesheet" href="../css/core-style.css">
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <?php
  include("connection.php");
  $email = "";
  $password = "";
  $error = false;

  if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $query = "SELECT admin_id,fname FROM admin_tbl WHERE emailid='$email' AND password='$password';";
    $result = mysqli_query($conn, $query);

    if ($result->num_rows > 0) {
      $row = mysqli_fetch_row($result);
      session_start();
      $_SESSION["admin_id"] = $row[0];
      $_SESSION["fname"] = $row[1];
      header("location: index.php");
    } else {
      // echo "login failed";
      $error = true;
    }
  }
  ?>
  <!-- ##### Main Content Wrapper Start ##### -->
  <div class="main-content-wrapper d-flex clearfix">

    <!-- Mobile Nav (max width 767px)-->
    <div class="mobile-nav">
      <!-- Navbar Brand -->
      <a href="../index.php"><img src="../img/core-img/daas.png" alt=""></a>
    </div>

    <!-- Header Area Start -->
    <header class="header-area clearfix">
      <!-- Logo -->
      <div class="logo">
        <a href="../index.php"><img src="../img/core-img/daas.png" alt=""></a>
      </div>
    </header>
    <!-- Header Area End -->

    <div class="cart-table-area section-padding-100">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-lg-8">
            <div class="checkout_details_area mt-50 clearfix">
              <div class="cart-title">
                <h2>Admin Login</h2>
              </div>
              <form action="login.php" method="post">
                <div class="row">
                  <div class="col-12 mb-3 mt-3">
                    <input type="email" class="form-control" id="email" placeholder="Email" value="<?php echo $email ?>" name="email" required>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 mb-3">
                    <input type="password" class="form-control" id="password" placeholder="Password" value="<?php echo $email ?>" name="password" required>
                  </div>
                </div>
                <div class="amado-btn-group mt-30 mb-100">
                  <p><?php if($error) echo "Login failed! Try again with valid credentials"; ?></p>
                  <input type="submit" class="btn amado-btn mb-15" name="login" value="Login">
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
