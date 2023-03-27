<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="description" content="">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Online Real Estate Shop | Home</title>

  <link rel="icon" href="img/core-img/favicon.ico">
  <link rel="stylesheet" href="css/core-style.css">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <?php include("connection.php") ?>

  <?php
  $fname = "";
  $lname = "";
  $email = "";
  $phoneno = "";
  $address = "";
  $city = "";
  $state = "";
  $pincode = "";
  $password = "";
  $con_password = "";

  if (isset($_POST["signup"])) {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $phoneno = $_POST["phoneno"];
    $address = addslashes($_POST["address"]);
    $city = $_POST["city"];
    $state = $_POST["state"];
    $pincode = $_POST["pin"];
    $password = $_POST["password"];
    $con_password = $_POST["con_password"];

    if ($password == $con_password) {
      $query = "INSERT INTO users_tbl(firstname, lastname, password, email, phoneno, address, city, state, pincode) VALUES ('$fname','$lname','$password','$email','$phoneno','$address','$city','$state','$pincode')";

      if (mysqli_query($conn, $query)) {
        header("location: login.php");
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
    } else {
      echo "password missmatch";
    }
  }
  ?>

  <!-- ##### Main Content Wrapper Start ##### -->
  <div class="main-content-wrapper d-flex clearfix">

    <!-- Mobile Nav (max width 767px)-->
    <div class="mobile-nav">
      <!-- Navbar Brand -->
      <a href="index.php"><img src="img/core-img/daas.png" alt=""></a>
    </div>

    <!-- Header Area Start -->
    <header class="header-area clearfix">
      <!-- Logo -->
      <div class="logo">
        <a href="index.php"><img src="img/core-img/daas.png" alt=""></a>
      </div>
    </header>
    <!-- Header Area End -->

    <div class="cart-table-area section-padding-100">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-lg-8">
            <div class="checkout_details_area mt-50 clearfix">

              <div class="cart-title">
                <h2>SignUp</h2>
              </div>

              <form action="signup.php" method="post">
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <input type="text" class="form-control" id="first_name" name="fname" value="<?php echo $fname ?>" placeholder="First Name" required>
                  </div>
                  <div class="col-md-6 mb-3">
                    <input type="text" class="form-control" id="last_name" name="lname" value="<?php echo $lname ?>" placeholder="Last Name" required>
                  </div>
                  <div class="col-12 mb-3">
                    <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="<?php echo $email ?>" required>
                  </div>
                  <div class="col-12 mb-3">
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password" value="<?php echo $password ?>" required>
                  </div>
                  <div class="col-12 mb-3">
                    <input type="password" class="form-control" id="password" placeholder="Confirm Password" name="con_password" value="<?php echo $con_password ?>" required>
                  </div>
                  <div class="col-12 mb-3">
                    <input type="text" class="form-control" id="street_address" placeholder="Address" name="address" value="<?php echo $address ?>">
                  </div>

                  <div class="col-md-6 mb-3">
                    <div class="signup-select">
                      <?php
                      $query = "SELECT * FROM city_tbl";
                      $result = mysqli_query($conn, $query); ?>
                      <select class="city-select form-control" name="city" value="<?php echo $city ?>" required>
                        <option value="City" selected>City</option>
                        <?php while ($row = mysqli_fetch_array($result)) { ?>
                          <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>
                        <?php }
                        $result->free_result(); ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-6 mb-3">
                    <div class="signup-select">
                      <?php
                      $query = "SELECT * FROM state_tbl";
                      $result = mysqli_query($conn, $query); ?>
                      <select class="state-select form-control" name="state" value="<?php echo $state ?>" required>
                        <option value="state" selected>state</option>
                        <?php while ($row = mysqli_fetch_array($result)) { ?>
                          <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>
                        <?php }
                        $result->free_result(); ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-6 mb-3">
                    <input type="text" class="form-control" id="zipCode" placeholder="Pin Code" name="pin" value="<?php echo $pincode ?>">
                  </div>
                  <div class="col-md-6 mb-3">
                    <input type="text" class="form-control" id="phone_number" min="0" placeholder="Phone No" name="phoneno" value="<?php echo $phoneno ?>" required>
                  </div>
                  <div class="col-md-6 mb-15">
                    <p>if you already have an account, <a href="login.php" class="text-weight-bold">login Here</a></p>
                    <input type="submit" class="btn amado-btn mb-15" name="signup" value="SignUp">
                  </div>
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
