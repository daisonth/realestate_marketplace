<?php include("header.php"); ?>
<?php include("connection.php") ?>

<?php
if (!isset($_SESSION["admin_id"])) {
  header("location: login.php");
} else {
  $admin_id = $_SESSION["admin_id"];
}

if(isset($_GET["id"])) {
  $id = $_GET["id"];
  $query = "SELECT * FROM property_tbl WHERE owner_id=$id;";
} else {
  $query = "SELECT * FROM property_tbl;";
}
$result = mysqli_query($conn, $query);
?>


<div class="cart-table-area section-padding-100">
  <div class="container-fluid">
    <div class="row">
      <div class="f1 col-12 col-lg-8">
        <div class="cart-title mt-50">
          <h2>Listed Properties</h2>
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
                    <img src="../<?php echo $row["image_one"] ?>" alt="Image" style="width: 150px; height: 150px">
                  </td>
                  <td class="cart_product_desc">
                    <h5><?php echo $row["title"] ?></h5>
                    <a target="_blank" href="../property_details.php?id=<?php echo $row["property_id"] ?>">view</a>
                  </td>
                  <?php 
                    $price = $row["price"];
                    if($row["denomination"] == "lk") $price/=100000;
                    else $price/=10000000;
                  ?>
                  <td class="price">
                    <p>₹<?php echo $price . (($row["denomination"] == "lk") ? " Lk" : " Cr") ?></p>
                  </td>
                  <td class="qty">
                    <span><?php echo strtoupper($row["status"]) ?> <a href="switch_status.php?id=<?php echo $row["property_id"] ?>"><img src="../img/core-img/rotate.png"></a></span>
                  </td>
                  <td class="qty">
                    <a href="remove_listing.php?id=<?php echo $row["property_id"] ?>" data-toggle="tooltip" data-placement="left" title="Delete"><img class="bin" src="../img/core-img/bin_black.png"></a>
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
