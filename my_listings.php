<?php include("header.php"); ?>
<?php include("connection.php") ?>

<?php
if (!isset($_SESSION["userid"])) {
  header("location: login.php");
} else {
  $userid = $_SESSION["userid"];
}

$query = "SELECT * FROM active_listings_tbl WHERE owner='$userid'";
$result = mysqli_query($conn, $query);
?>

<div class="cart-table-area section-padding-100">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 col-lg-8">
        <div class="cart-title mt-50">
          <h2>Your Listings</h2>
        </div>

        <div class="cart-table clearfix">
          <table class="table table-responsive">
            <thead>
              <tr>
                <th>IMAGE</th>
                <th>DETAILS</th>
                <th>PRICE</th>
                <th>STATUS</th>
              </tr>
            </thead>
            <tbody>
              <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                  <td class="cart_product_img">
                    <a href="property_details.php?id=<?php echo $row["listing_id"] ?>"><img src="<?php echo $row["image_one"] ?>" alt="Image" style="width: 150px; height: 150px"></a>
                  </td>
                  <td class="cart_product_desc">
                    <p><?php echo strtoupper($row["title"]) ?></p>
                    <a href="property_details.php?id=<?php echo $row["listing_id"] ?>">view</a>
                  </td>
                  <td class="price">
                    <p><?php echo $row["price"] ?></p>
                  </td>
                  <td class="qty">
                    <span><?php echo strtoupper($row["status"]) ?></span>
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
