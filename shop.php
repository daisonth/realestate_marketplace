<?php include("header.php"); ?>
<?php include("connection.php") ?>

<?php
if (!isset($_SESSION["userid"])) {
  header("location: login.php");
} else {
  $userid = $_SESSION["userid"];
}

$query = "SELECT * FROM active_listings_tbl";
$result = mysqli_query($conn, $query);
?>


<div class="shop_sidebar_area">

  <!-- ##### Single Widget ##### -->
  <div class="widget catagory mb-50">
    <!-- Widget Title -->
    <h6 class="widget-title mb-30">Property Type</h6>

    <!--  Catagories  -->
    <div class="catagories-menu">
      <ul>
        <li class="active"><a href="#">All</a></li>
        <li><a href="#">Beds</a></li>
        <li><a href="#">Accesories</a></li>
        <li><a href="#">Furniture</a></li>
        <li><a href="#">Home Deco</a></li>
        <li><a href="#">Dressings</a></li>
        <li><a href="#">Tables</a></li>
      </ul>
    </div>
  </div>

  <!-- ##### Single Widget ##### -->
  <div class="widget brands mb-50">
    <!-- Widget Title -->
    <h6 class="widget-title mb-30">States</h6>

    <div class="widget-desc">
      <!-- Single Form Check -->
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="amado">
        <label class="form-check-label" for="amado">Amado</label>
      </div>
      <!-- Single Form Check -->
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="ikea">
        <label class="form-check-label" for="ikea">Ikea</label>
      </div>
      <!-- Single Form Check -->
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="furniture">
        <label class="form-check-label" for="furniture">Furniture Inc</label>
      </div>
      <!-- Single Form Check -->
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="factory">
        <label class="form-check-label" for="factory">The factory</label>
      </div>
      <!-- Single Form Check -->
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="artdeco">
        <label class="form-check-label" for="artdeco">Artdeco</label>
      </div>
    </div>
  </div>
  <!-- ##### Single Widget ##### -->
  <div class="widget price mb-50">
    <!-- Widget Title -->
    <h6 class="widget-title mb-30">Price</h6>

    <div class="widget-desc">
      <div class="slider-range">
        <div data-min="10" data-max="1000" data-unit="₹" class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-value-min="10" data-value-max="1000" data-label-result="">
          <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
          <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
          <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
        </div>
        <div class="range-price">$10 - $1000</div>
      </div>
    </div>
  </div>
</div>

<div class="amado_product_area section-padding-100">
  <div class="container-fluid">

    <div class="row">
      <div class="col-12">
        <div class="product-topbar d-xl-flex align-items-end justify-content-between">
          <!-- Total Products -->
          <div class="total-products">
            <p>Showing 1-8 0f 25</p>
          </div>
          <!-- Sorting -->
          <div class="product-sorting d-flex">
            <div class="sort-by-date d-flex align-items-center mr-15">
              <p>Sort by</p>
              <form action="#" method="get">
                <select name="select" id="sortBydate">
                  <option value="value">Date</option>
                  <option value="value">Price: Low to High</option>
                  <option value="value">Price: High to Low</option>
                </select>
              </form>
            </div>
            <div class="view-product d-flex align-items-center">
              <p>View</p>
              <form action="#" method="get">
                <select name="select" id="viewProduct">
                  <option value="value">10</option>
                  <option value="value">20</option>
                  <option value="value">40</option>
                  <option value="value">80</option>
                </select>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="row">
      <?php while ($row = mysqli_fetch_assoc($result)) { ?>

        <!-- Single Product Area -->
        <div class="col-12 col-sm-6 col-md-12 col-xl-6">
          <div class="single-product-wrapper">
            <!-- Product Image -->
            <a href="property_details.php?id=<?php echo $row["listing_id"] ?>">
              <div class="product-img">
                <img src="<?php echo $row["image_one"] ?>" alt="">
                <!-- Hover Thumb -->
                <img class="hover-img" src="<?php echo $row["image_two"] ?>" alt="">
              </div>
            </a>

            <!-- Product Description -->
            <div class="product-description d-flex align-items-center justify-content-between">
              <!-- Product Meta Data -->
              <div class="product-meta-data">
                <div class="line"></div>
                <a href="property_details.php?id=<?php echo $row["listing_id"] ?>">
                  <p class="title-p"><?php echo $row["title"] ?></p>
                </a>
                <a href="property_details.php?id=<?php echo $row["listing_id"] ?>">
                  <h6><?php echo $row["city"] ?></h6>
                </a>
              </div>
              <!-- Ratings & Cart -->
              <div class="ratings-cart text-right">
                <div class="product-meta-data">
                  <p class="product-price product-price-c">₹<?php echo $row["price"] . " <br>" . $row["price_format"] ?></p>
                </div>
                <div class="cart">
                  <a href="cart.html" data-toggle="tooltip" data-placement="left" title="Add To Wishlist"><img src="img/core-img/star.png" alt=""></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
    <div class="row">
      <div class="col-12">
        <!-- Pagination -->
        <nav aria-label="navigation">
          <ul class="pagination justify-content-end mt-50">
            <li class="page-item active"><a class="page-link" href="#">01.</a></li>
            <li class="page-item"><a class="page-link" href="#">02.</a></li>
            <li class="page-item"><a class="page-link" href="#">03.</a></li>
            <li class="page-item"><a class="page-link" href="#">04.</a></li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</div>
</div>
<!-- ##### Main Content Wrapper End ##### -->

<?php include("footer.php"); ?>
