<?php include("header.php"); ?>
<?php include("connection.php"); ?>

<?php
if (isset($_SESSION["userid"])) {
  $userid = $_SESSION["userid"];
  $fname = $_SESSION["fname"];
  $query = "SELECT t1.*, t2.city_name city_name, t3.state_name state_name FROM users_tbl t1 
JOIN city_tbl t2 ON t1.city=t2.city_id 
JOIN state_tbl t3 ON t1.state=t3.state_id
WHERE userid='$userid';";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_assoc($result);
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
      <div class="col-188">
        <div class="card mb-4">
          <div class="card-body">

            <div class="row">
              <div class="col-sm">
                <p class="mb-0"><b>Full Name</b></p>
              </div>
              <div class="col-sm">
                <p class="text-right text-muted mb-0"><?php echo $row["firstname"] . " " . $row["lastname"] ?></p>
              </div>
            </div>

            <hr>
            <div class="row">
              <div class="col-sm">
                <p class="mb-0"><b>Email</b></p>
              </div>
              <div class="col-sm">
                <p class="text-right text-muted mb-0"><?php echo $row["email"] ?></p>
              </div>
            </div>
            <hr>

            <div class="row">
              <div class="col-sm">
                <p class="mb-0"><b>Phone</b></p>
              </div>
              <div class="col-sm">
                <p class="text-right text-muted mb-0"><?php echo $row["phoneno"] ?></p>
              </div>
            </div>

            <hr>
            <div class="row">
              <div class="col-sm">
                <p class="mb-0"><b>Pin Code</b></p>
              </div>
              <div class="col-sm">
                <p class="text-right text-muted mb-0"><?php echo $row["pincode"] ?></p>
              </div>
            </div>

            <hr>
            <div class="row">
              <div class="col-sm">
                <p class="mb-0"><b>Address</b></p>
              </div>
              <div class="col-sm">
                <p class="text-right text-muted mb-0"><?php echo $row["address"] . " " . $row["city_name"] . ", " . $row["state_name"] ?></p>
              </div>
            </div>

          </div>
        </div>
      </div>
      <div class="amado-btn-group mt-30 mb-100 float-right">
        <a href="edit_user.php" class="btn amado-btn mb-15"> EDIT</a>
      </div>

    </div>
  </section>
</div>
<?php include("footer.php"); ?>
