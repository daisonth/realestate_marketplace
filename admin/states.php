<?php include("header.php"); ?>
<?php include("connection.php") ?>

<?php
if (!isset($_SESSION["admin_id"])) {
  header("location: login.php");
} else {
  $admin_id = $_SESSION["admin_id"];
}

$name = "";
if (isset($_POST["submit"])) {
  $name = $_POST["name"];

  mysqli_query($conn, "INSERT INTO state_tbl(state_name) VALUES ('$name');");
}

if (isset($_GET["remove"])) {
  $id = $_GET["remove"];

  $query = "DELETE FROM state_tbl WHERE state_id='$id'";
  $result = mysqli_query($conn, $query);
  header("location: states.php");
}

$query = "SELECT * FROM state_tbl;";
$result = mysqli_query($conn, $query);
?>

<div class="cart-table-area section-padding-100">
  <div class="container-fluid">
    <div class="row">
      <div class="f1 col-12 col-lg-8">
        <div class="daas-heading cart-title mt-50">
          <h2>States</h2>
          <a href="states.php?add=1" class="btn amado-btn mb-15">ADD <b>+</b></a>
        </div>

        <div class="cart-table clearfix">
          <table class="table table-responsive">
            <thead>
              <tr>
                <th>Sl NO</th>
                <th>NAME</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php if (isset($_GET["add"])) { ?>
                <form action="states.php" method="post">
                  <td class="cart_product_img">
                  </td>
                  <td class="cart_product_img">
                    <input type="text" class="form-control" id="title" name="name" placeholder="name..." required>
                  </td>
                  <td class="cart_product_img">
                    <input type="submit" class="btn " name="submit" value="✅">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="states.php" class="btn " name="submit">❌</a>
                  </td>
                  <td class="cart_product_img">
                  </td>
                  </tr>
                </form>
              <?php } ?>

              <?php $i = 1;
              while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                  <td class="cart_product_img">
                    <h5><?php echo $i ?></h5>
                  </td>
                  <td class="cart_product_desc">
                    <h5><?php echo $row["state_name"] ?></h5>
                  </td>
                  <td class="cart_product_img">
                    <a href="states.php?remove=<?php echo $row["state_id"] ?>" data-toggle="tooltip" data-placement="left" title="Delete"><img class="bin" src="../img/core-img/bin_black.png"></a>
                  </td>
                <?php $i++;
              } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ##### Main Content Wrapper End ##### -->

<?php include("footer.php"); ?>
