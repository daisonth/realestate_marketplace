<?php include("header.php"); ?>
<?php include("connection.php") ?>

<?php
if (isset($_GET["listing_id"]) && isset($_SESSION["userid"])) {
  $listing_id = $_GET["listing_id"];
  $userid = $_SESSION["userid"];
} else {
  header("location: index.php");
}

if (isset($_GET["status"])) {
  $status = $_GET["status"];
  $result = mysqli_query($conn, "update property_tbl set status='$status'");
  header("location: index.php");
}
$query = "SELECT * FROM property_tbl WHERE property_id='$listing_id'";
$result = mysqli_query($conn, $query);
if ($result->num_rows > 0) {
  $row = mysqli_fetch_assoc($result);
} else {
  header("location: index.php");
}

?>

<div class="cart-table-area section-padding-50 mb-3">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 col-lg-4">
        <div class="cart-summary">
          <h4>Listing Summary</h4>
          <div class="bg-white mb-4" style="max-height: 200px; overflow: scroll;">
            <span><b>Title :</b> <?php echo $row["title"] ?></span>
            <br><span><b>Price :</b> <?php echo $row["price"] . " " . $row["denomination"] ?></span>
            <br><span><b>Size :</b> <?php echo $row["size"] . " " . $row["size_format"] ?></span>
            <br><span><b>City :</b> <?php echo $row["city"] ?></span>
          </div>
          <h5>Payment Method</h5><br>
          <div class="payment-method">

            <div class="custom-control custom-checkbox mr-sm-2">
              <input type="checkbox" class="custom-control-input" id="credit" checked>
              <label class="custom-control-label" for="credit">Credit Card</label>
            </div>

            <div class="custom-control custom-checkbox mr-sm-2">
              <input type="checkbox" class="custom-control-input" id="debit">
              <label class="custom-control-label" for="debit">Debit Card</label>
            </div>

            <div class="custom-control custom-checkbox mr-sm-2">
              <input type="checkbox" class="custom-control-input" id="netbanking">
              <label class="custom-control-label" for="netbanking">Net Banking</label>
            </div>

            <div class="custom-control custom-checkbox mr-sm-2">
              <input type="checkbox" class="custom-control-input" id="paypal">
              <label class="custom-control-label" for="paypal">Paytm </label>
            </div>

            <div class="custom-control custom-checkbox mr-sm-2">
              <input type="checkbox" class="custom-control-input" id="UPI">
              <label class="custom-control-label" for="UPI">UPI </label>
            </div>
          </div>

          <ul class="summary-table">
            <li><span>Number of listings:</span> <span>1 nos</span></li>
            <li><span>subtotal:</span> <span>₹500.00</span></li>
            <li><span>total:</span> <span>₹500.00</span></li>
          </ul>
          <div class="cart-btn mt-100">
            <a href="checkout.php?listing_id=<?php echo $listing_id ?>&status=active" class="btn amado-btn w-100">Checkout</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ##### Main Content Wrapper End ##### -->

<?php include("footer.php"); ?>
