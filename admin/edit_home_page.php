<?php include("header.php"); ?>
<?php include("connection.php") ?>

<?php
if (!isset($_SESSION["admin_id"])) {
  header("location: login.php");
} else {
  $admin_id = $_SESSION["admin_id"];
}

$query = "SELECT * FROM home_tbl";
$result = mysqli_query($conn, $query);
?>

<div class="cart-table-area section-padding-100">
  <div class="container-fluid">
    <div class="row">
      <div class="f1 col-12 col-lg-8">
        <div class="cart-title mt-50">
          <h2>Edit Home Page</h2>
        </div>

        <div class="cart-table clearfix">
          <table class="table table-responsive">
            <thead>
              <tr>
                <th>IMAGE</th>
                <th>TITLE</th>
                <th>SUB TITLE</th>
                <th>HYPERLINK</th>
              </tr>
            </thead>
            <tbody>
              <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                  <td class="cart_product_img">
                    <img src="<?php echo $row["card_image"] ?>" alt="Image" style="width: 150px; height: 150px">
                  </td>
                  <td class="cart_product_desc">
                    <h5><?php echo $row["title"] ?></h5>
                  </td>
                  <td class="cart_product_desc">
                    <h5><?php echo $row["sub_title"] ?></h5>
                  </td>
                  <td class="qty">
                    <h5><?php echo $row["card_link"] ?></h5>
                  </td>
                  <td class="qty">
                    <a href="remove_listing.php?id=<?php echo $row["property_id"] ?>" data-toggle="tooltip" data-placement="left" title="Delete"><img class="bin" src="img/core-img/bin_black.png"></a>
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
