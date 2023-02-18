<?php include("header.php"); ?>
<?php include("connection.php") ?>

<?php
if (isset($_SESSION["userid"])) {
  $userid = $_SESSION["userid"];
}

$query = "SELECT * FROM home_tbl";
$result = mysqli_query($conn, $query);
?>

<!-- Product Catagories Area Start -->
<div class="products-catagories-area clearfix">
  <div class="amado-pro-catagory clearfix">

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
      <!-- Single Catagory -->
      <div class="single-products-catagory clearfix">
        <a href="<?php echo $row["card_link"] ?>">
          <img src="<?php echo substr($row["card_image"], 3) ?>" alt="">
          <!-- Hover Content -->
          <div class="hover-content">
            <div class="line"></div>
            <p><?php echo $row["sub_title"] ?></p>
            <h4><?php echo $row["title"] ?></h4>
          </div>
        </a>
      </div>

    <?php } ?>
    <!-- Single Catagory -->
  </div>
</div>
<!-- Product Catagories Area End -->

<?php include("footer.php"); ?>
