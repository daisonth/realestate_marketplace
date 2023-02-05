<?php include("header.php"); ?>
<?php include("connection.php"); ?>

<?php
if (isset($_SESSION["userid"])) {
  $userid = $_SESSION["userid"];
  $fname = $_SESSION["fname"];
  $query = "SELECT * FROM users_tbl WHERE userid='$userid';";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_assoc($result);

  $lname = $row["lastname"];
  $email = $row["email"];
  $phoneno = $row["phoneno"];
  $address = $row["address"];
  $city = $row["city"];
  $state = $row["state"];
  $pincode = $row["pincode"];
  $password = $row["password"];
  $con_password = $row["password"];
  $dp = $row["dp"];

  if (isset($_POST["save"])) {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $phoneno = $_POST["phoneno"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $pincode = $_POST["pin"];
    $password = $_POST["password"];
    $con_password = $_POST["con_password"];

    if ($password == $con_password) {
      $query = "UPDATE users_tbl SET firstname='$fname', lastname='$lname', email='$email', phoneno='$phoneno', address='$address', city='$city', state='$state', pincode='$pincode' WHERE userid='$userid' ";

      if (mysqli_query($conn, $query)) {
        $_SESSION["fname"] = $fname;
        header("location: user_account.php");
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
    } else {
      echo "password missmatch";
    }
  }
} else {
  header("location: index.php");
}
?>
<div class="cart-table-area section-padding-100">
  <section>
    <div class="container py-5">
      <div class="row">
        <div class="col">
          <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
            <h2 class="text-center">Accout Details</h2>
          </nav>
        </div>
      </div>
      <form action="edit_user.php" method="POST">
        <div class="col-188">
          <div class="card mb-4">
            <div class="card-body">

              <div class="row">
                <div class="col-sm">
                  <p class="mb-0"><b>Fist Name</b></p>
                </div>
                <div class="col-sm">
                  <input type="text" class="form-control" id="first_name" name="fname" value="<?php echo $fname ?>" placeholder="First Name" required>
                </div>
              </div>

              <hr>
              <div class="row">
                <div class="col-sm">
                  <p class="mb-0"><b>Last Name</b></p>
                </div>
                <div class="col-sm">
                  <input type="text" class="form-control" id="last_name" name="lname" value="<?php echo $lname ?>" placeholder="Last Name" required>
                </div>
              </div>

              <hr>
              <div class="row">
                <div class="col-sm">
                  <p class="mb-0"><b>Email</b></p>
                </div>
                <div class="col-sm">
                  <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="<?php echo $email ?>" required>
                </div>
              </div>
              <hr>

              <div class="row">
                <div class="col-sm">
                  <p class="mb-0"><b>Phone</b></p>
                </div>
                <div class="col-sm">
                  <input type="number" class="form-control" id="phone_number" min="0" placeholder="Phone No" name="phoneno" value="<?php echo $phoneno ?>" required>
                </div>
              </div>

              <hr>
              <div class="row">
                <div class="col-sm">
                  <p class="mb-0"><b>Pin Code</b></p>
                </div>
                <div class="col-sm">
                  <input type="text" class="form-control" id="zipCode" placeholder="Pin Code" name="pin" value="<?php echo $pincode ?>">
                </div>
              </div>

              <hr>
              <div class="row">
                <div class="col-sm">
                  <p class="mb-0"><b>Address</b></p>
                </div>
                <div class="col-sm">
                  <input type="text" class="form-control" id="street_address" placeholder="Address" name="address" value="<?php echo $address ?>">
                </div>
              </div>

              <hr>
              <div class="row">
                <div class="col-sm">
                  <p class="mb-0"><b>City</b></p>
                </div>
                <div class="col-sm">
                  <input type="text" class="form-control" id="city" placeholder="City" name="city" value="<?php echo $city ?>">
                </div>
              </div>

              <hr>
              <div class="row">
                <div class="col-sm">
                  <p class="mb-0"><b>State</b></p>
                </div>
                <div class="col-sm">
                  <input type="text" class="form-control" id="state" placeholder="State" name="state" value="<?php echo $state ?>">
                </div>
              </div>

            </div>
          </div>
        </div>
        <div class="amado-btn-group mt-30 mb-100 float-right">
          <input type="submit" class="btn amado-btn mb-15" name="save" value="SAVE">
        </div>
      </form>
    </div>
  </section>
</div>
<?php include("footer.php"); ?>
