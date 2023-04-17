<?php
include("header.php");
include("connection.php");

if (!isset($_GET["id"]) || !isset($_SESSION["userid"])) {
  header("location: shop.php");
} else {
  $property_id = $_GET["id"];
  $userid = $_SESSION["userid"];
}

$query = "SELECT t1.*, t2.city_name FROM property_tbl as t1 
JOIN city_tbl as t2 ON t1.city = t2.city_id 
WHERE t1.property_id='$property_id'";

$result = mysqli_query($conn, $query);
if ($result->num_rows > 0) $row = mysqli_fetch_assoc($result);
else header("location: login.php");
?>

<!-- product details area start -->
<div class="single-product-area section-padding-100 clearfix">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 col-lg-7">
        <div class="single_product_thumb">
          <div id="product_details_slider" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li class="active" data-target="#product_details_slider" data-slide-to="0" style="background-image: url(<?php echo $row["image_one"] ?>);"> </li>
              <li data-target="#product_details_slider" data-slide-to="1" style="background-image: url(<?php echo $row["image_two"] ?>);"> </li>
              <li data-target="#product_details_slider" data-slide-to="2" style="background-image: url(<?php echo $row["image_three"] ?>);"> </li>
              <li data-target="#product_details_slider" data-slide-to="3" style="background-image: url(<?php echo $row["image_four"] ?>);"> </li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <a class="gallery_img" href="<?php echo $row["image_one"] ?>">
                  <img class="d-block w-100" src="<?php echo $row["image_one"] ?>" alt="First slide">
                </a>
              </div>
              <div class="carousel-item">
                <a class="gallery_img" href="<?php echo $row["image_two"] ?>">
                  <img class="d-block w-100" src="<?php echo $row["image_two"] ?>" alt="Second slide">
                </a>
              </div>
              <div class="carousel-item">
                <a class="gallery_img" href="<?php echo $row["image_three"] ?>">
                  <img class="d-block w-100" src="<?php echo $row["image_three"] ?>" alt="Third slide">
                </a>
              </div>
              <div class="carousel-item">
                <a class="gallery_img" href="<?php echo $row["image_four"] ?>">
                  <img class="d-block w-100" src="<?php echo $row["image_four"] ?>" alt="Fourth slide">
                </a>
              </div>
            </div>
          </div>
        </div><br>
        <?php echo $row["map"] ?>
      </div>
      <div class="col-12 col-lg-5">
        <div class="single_product_desc">
          <!-- product meta data -->
          <div class="product-meta-data">
            <div class="line"></div>
            <?php 
              $price = $row["price"];
              if($row["denomination"] == "lk") $price/=100000;
              else $price/=10000000;
            ?>
            <p class="product-price">₹<?php echo $price . (($row["denomination"] == "lk") ? " Lk" : " Cr") ?></p>
            <h4><?php echo $row["title"] ?></h4>
            <!-- Avaiable -->
            <p class="avaibility"><i class="fa fa-circle"></i> <?php echo $row["status"] ?></p>
          </div>

          <div class="short_overview my-5">
            <p><?php echo $row["discription"] ?></p>
          </div>
          <hr>
          <!-- Add to Cart Form -->
          <div class="short_overview my-5">
            <p><b>Property Type : </b> <?php echo $row["property_type"] ?></p>
            <p><b>Property Size : </b> <?php echo $row["size"] . " " . $row["size_format"] ?></p>
            <p><b>Location : </b> <?php echo $row["property_address"] ?></p>
            <p><b>City : </b> <?php echo $row["city_name"] ?></p>
            <p><b>Area Zipcode : </b> <?php echo $row["pin"] ?></p>

            <?php if ($row["owner_id"] == $userid) { ?>
              <div class="amado-btn-group mt-30 mb-100">
                <a href="edit_listing.php?id=<?php echo $property_id ?>" class="btn amado-btn mb-15"> EDIT LISTING</a>
              </div>
            <?php } else { ?>

              <div class="amado-btn-group mt-30 mb-100">
                <button type="button" class="btn amado-btn mb-15 btn-primary" data-toggle="modal" data-target="#myModal">
                  Contact Owner
                </button>
              </div>

              <!-- The Modal -->
              <div class="modal" id="myModal">
                <div class="modal-dialog">
                  <div class="modal-content">

                    <div class="modal-header">
                      <h4 class="modal-title">
                        Owner Contact Details
                      </h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">
                      <h5>Email : <a href="mailto:<?php echo $row["email"] ?>"><b><?php echo $row["email"] ?></b></a></h5>
                      <h5>Phone No : <a href="tel:<?php echo $row["phoneno"] ?>"><b><?php echo $row["phoneno"] ?></h5>
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                  </div>
                </div>
              </div>
            <?php } ?>

          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Product Details Area End -->
</div>
<!-- ##### Main Content Wrapper End ##### -->

<?php include("footer.php"); ?>
