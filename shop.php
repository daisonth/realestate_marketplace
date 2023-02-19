<?php include("header.php"); ?>
<?php include("connection.php") ?>

<?php
if (!isset($_SESSION["userid"])) {
  header("location: login.php");
} else {
  $userid = $_SESSION["userid"];
}

$low = ((isset($_GET["low"])) ? $_GET["low"] : 0);
$sort = ((isset($_GET["sort"])) ? $_GET["sort"] : "date");
$order = ((isset($_GET["order"])) ? $_GET["order"] : "ASC");
$view = ((isset($_GET["view"])) ? $_GET["view"] : "10");
$type = ((isset($_GET["type"])) ? $_GET["type"] : "all");
$where_clause = "";
$where_clause1 = "";

if ($type != "all") $where_clause = "WHERE t1.property_type='$type'";
if ($userid != NULL) $where_clause1 = "WHERE user_id='$userid'";
// $query = "SELECT * FROM property_tbl ORDER BY $sort $order LIMIT $low," . $low + $view;
$query = "SELECT t1.* ,t2.wishlist_id FROM `property_tbl` AS t1 LEFT JOIN (SELECT * FROM wishlist_tbl $where_clause1 ) AS t2 ON t1.property_id = t2.property_id $where_clause ORDER BY t1.$sort $order LIMIT $low," . $low + $view;
if (!($result = mysqli_query($conn, $query))) {
  header("location: shop.php");
}

$result2 = mysqli_query($conn, "SELECT COUNT(property_id) FROM `property_tbl` WHERE status='active'");
$row2 = mysqli_fetch_array($result2);
$rnum = $row2[0];

$result1 = mysqli_query($conn, "SELECT category_name FROM category_tbl;");
?>

<div class="shop_sidebar_area">

  <!-- ##### Single Widget ##### -->
  <div class="widget catagory mb-50">
    <!-- Widget Title -->
    <h6 class="widget-title mb-30">Property Type</h6>

    <!--  Catagories  -->
    <div class="catagories-menu">
      <ul>
        <li class="<?php echo (($type == "any") ? "active" : "") ?>"><a href="shop.php?sort=<?php echo $sort ?>&order=<?php echo $order ?>&view=<?php echo $view ?>&low=<?php echo $low ?>">All</a></li>
        <?php while ($row = mysqli_fetch_array($result1)) { ?>
          <li class="<?php echo (($type == "$row[0]") ? "active" : "") ?>"><a href="shop.php?sort=<?php echo $sort ?>&order=<?php echo $order ?>&view=<?php echo $view ?>&low=<?php echo $low ?>&type=<?php echo $row[0] ?>"><?php echo $row[0] ?></a></li>
        <?php } ?>
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
            <p>Showing <?php echo (($view < $rnum) ? $view : $rnum) ?> 0f <?php echo $rnum ?></p>
          </div>
          <!-- Sorting -->
          <div class="product-sorting d-flex">
            <div class="sort-by-date d-flex align-items-center mr-15">
              <p>Sort by</p>
              <form action="#" method="get">
                <select name="select" id="sortBydate" onchange="location = this.value;">
                  <option <?php if ($sort == "date") echo "selected" ?> value="shop.php?view=<?php echo $view ?>&order=<?php echo $order ?>&sort=date">Date</option>
                  <option <?php if ($sort == "price" && $order == "ASC") echo "selected" ?> value="shop.php?view=<?php echo $view ?>&sort=price&order=ASC">Price: Low to High</option>
                  <option <?php if ($sort == "price" && $order == "DESC") echo "selected" ?> value="shop.php?view=<?php echo $view ?>&sort=price&order=DESC">Price: High to Low</option>
                </select>
              </form>
            </div>
            <div class="view-product d-flex align-items-center">
              <p>View</p>
              <form action="#" method="get">
                <select name="select" id="viewProduct" onchange="location = this.value;">
                  <option <?php if ($view == "10") echo "selected" ?> value="shop.php?sort=<?php echo $sort ?>&order=<?php echo $order ?>&view=10">10</option>
                  <option <?php if ($view == "20") echo "selected" ?> value="shop.php?sort=<?php echo $sort ?>&order=<?php echo $order ?>&view=20">20</option>
                  <option <?php if ($view == "40") echo "selected" ?> value="shop.php?sort=<?php echo $sort ?>&order=<?php echo $order ?>&view=40">40</option>
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
            <a href="property_details.php?id=<?php echo $row["property_id"] ?>">
              <div class="product-img">
                <img class="pimg" src="<?php echo $row["image_one"] ?>" alt="">
                <!-- Hover Thumb -->
                <img class="pimg hover-img" src="<?php echo $row["image_two"] ?>" alt="">
              </div>
            </a>

            <!-- Product Description -->
            <div class="product-description d-flex align-items-center justify-content-between">
              <!-- Product Meta Data -->
              <div class="product-meta-data">
                <div class="line"></div>
                <a href="property_details.php?id=<?php echo $row["property_id"] ?>">
                  <p class="title-p"><?php echo $row["title"] ?></p>
                </a>
                <a href="property_details.php?id=<?php echo $row["property_id"] ?>">
                  <h6><?php echo $row["city"] ?></h6>
                </a>
              </div>
              <!-- Ratings & Cart -->
              <div class="ratings-cart text-right">
                <div class="product-meta-data">
                  <p class="product-price product-price-c">₹<?php echo $row["price"] . (($row["denomination"] == "lk") ? " Lk" : " Cr") ?></p>
                </div>
                <div class="cart">
                  <a href="wishlist.php?id=<?php echo $row["property_id"] ?>" data-toggle="tooltip" data-placement="left" title="<?php echo (($row["wishlist_id"] != null) ? "Remove From Wishlist" : "Add To Wishlist"); ?>">
                    <img class="<?php echo (($row["wishlist_id"] != null) ? "daas-star-on" : "daas-star-off"); ?>" src="img/core-img/<?php echo (($row["wishlist_id"] != null) ? "star_on" : "star_off"); ?>.png" alt="" class="star">
                  </a>
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
            <div class="amado-btn-group mt-30 mb-100">
              <a href="shop.php?sort=<?php echo $sort ?>&order=<?php echo $order ?>&view=<?php echo $view ?>&low=<?php echo (($view > $rnum) ? 0 : ($low + $view)); ?>" class="btn amado-btn mb-15"> NEXT ></a>
            </div>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</div>
</div>
<!-- ##### Main Content Wrapper End ##### -->

<?php include("footer.php"); ?>
