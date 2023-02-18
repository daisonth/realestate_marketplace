<?php include("header.php"); ?>
<?php include("connection.php") ?>

<?php
if (!isset($_SESSION["admin_id"])) {
  header("location: login.php");
} else {
  $admin_id = $_SESSION["admin_id"];
}

$query = "SELECT t1.*, t2.count as count FROM users_tbl AS t1 LEFT JOIN (SELECT owner_id, COUNT(property_id) as count FROM property_tbl GROUP BY owner_id ) AS t2 ON t1.userid = t2.owner_id;";
$result = mysqli_query($conn, $query);
?>

<div class="cart-table-area section-padding-100">
  <div class="container-fluid">
    <div class="row">
      <div class="f1 col-12 col-lg-8">
        <div class="cart-title mt-50">
          <h2>Registerd Users </h2>
        </div>

        <div class="cart-table clearfix">
          <table class="table table-responsive">
            <thead>
              <tr>
                <th></th>
                <th>ADDRESS</th>
                <th>CONTACT</th>
                <th>NO. OF LISTINGS</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                  <td class="cart_product_img">
                    <h5><?php echo $row["firstname"] . " " . $row["lastname"] ?></h5>
                  </td>
                  <td class="cart_product_desc">
                    <h5><?php echo $row["address"] . ", " . $row["city"] . ", " . $row["state"] . ", Pin:" . $row["pincode"] ?></h5>
                  </td>
                  <td class="price">
                    <h5><?php echo $row["phoneno"] ?></h5>
                    <h5><?php echo $row["email"] ?></h5>
                  </td>
                  <td class="qty">
                    <?php if ($row["count"] != NULL) { ?>
                      <h5><?php echo $row["count"] ?></h5>
                      <a target="_blank" href="properties_listed.php?id=<?php echo $row["userid"] ?>">view Listings</a>
                    <?php } else { ?>
                      <h5>0</h5>
                    <?php } ?>
                  </td>
                  <td class="qty">
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ##### Main Content Wrapper End ##### -->

<?php include("footer.php"); ?>
