<?php include("header.php"); ?>
<?php include("connection.php") ?>

<?php
if (!isset($_SESSION["userid"])) {
  header("location: login.php");
} else {
  $userid = $_SESSION["userid"];
}

// $query = "SELECT * FROM property_tbl WHERE owner_id='$userid'";
$query = "SELECT t1.* FROM property_tbl AS t1 INNER JOIN wishlist_tbl AS t2 ON t1.property_id = t2.property_id WHERE t2.user_id='$userid'";
$result = mysqli_query($conn, $query);
?>

<div class="cart-table-area section-padding-100">
  <div class="container-fluid">
    <div class="row">
      <div class="f1 col-12 col-lg-8">
        <div class="cart-title mt-50">
          <h2>Your Wishlist</h2>
        </div>

        <div class="cart-table clearfix">
          <table class="table table-responsive">
            <thead>
              <tr>
                <th>IMAGE</th>
                <th>DETAILS</th>
                <th>PRICE</th>
                <th>STATUS</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                  <td class="cart_product_img">
                    <a href="property_details.php?id=<?php echo $row["property_id"] ?>"><img src="<?php echo $row["image_one"] ?>" alt="Image" style="width: 150px; height: 150px"></a>
                  </td>
                  <td class="cart_product_desc">
                    <h5><?php echo $row["title"] ?></h5>
                    <a href="property_details.php?id=<?php echo $row["property_id"] ?>">view</a>
                  </td>
                  <td class="price">
                    <p>₹<?php echo $row["price"] . (($row["denomination"] == "lk") ? " Lk" : " Cr") ?></p>
                  </td>
                  <td class="qty">
                    <span><?php echo strtoupper($row["status"]) ?></span>
                  </td>
                  <td class="qty">
                    <a href="wishlist.php?id=<?php echo $row["property_id"] ?>" data-toggle="tooltip" data-placement="left" title="Remove"><img class="daas-star" src="img/core-img/star_on.png" alt="" class="star"></a>
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
