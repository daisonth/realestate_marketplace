<?php
include("header.php");
include("connection.php");

$userid = NULL;
if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];

$low = ((isset($_GET["low"])) ? $_GET["low"] : 0);
$sort = ((isset($_GET["sort"])) ? $_GET["sort"] : "date");
$order = ((isset($_GET["order"])) ? $_GET["order"] : "DESC");
$view = ((isset($_GET["view"])) ? $_GET["view"] : "10");
$type = ((isset($_GET["property-type"])) ? $_GET["property-type"] : "all");
$city = ((isset($_GET["fileter-city"])) ? $_GET["fileter-city"] : "all");
$state = ((isset($_GET["fileter-state"])) ? $_GET["fileter-state"] : "all");
$where_clause = "where t1.status='active'";
$where_clause1 = "";

if ($type != "all") $where_clause = $where_clause . " AND t1.property_type='$type'";
if ($city != "all") $where_clause = $where_clause . " AND t1.city='$city'";
if ($state != "all") $where_clause = $where_clause . " AND t5.state_id='$state'";
if ($userid != NULL) $where_clause1 = "WHERE user_id='$userid'";

$tot = $low + $view;
$query = "SELECT t1.* ,t2.wishlist_id, t3.category_name category_name, t4.city_name city_name FROM property_tbl AS t1 
LEFT JOIN (SELECT * FROM wishlist_tbl $where_clause1 ) 
AS t2 ON t1.property_id = t2.property_id 
JOIN category_tbl AS t3 ON t1.property_type = t3.category_id 
JOIN city_tbl as t4 ON t1.city = t4.city_id 
JOIN (SELECT tt2.city_id city_id, tt1.state_name state_name, tt1.state_id FROM state_tbl as tt1 join city_tbl as tt2 on tt1.state_id=tt2.state_id ) 
AS t5 ON t4.city_id = t5.city_id $where_clause ORDER BY t1.$sort $order LIMIT $low,$tot";

if (!($result = mysqli_query($conn, $query))) {
  header("location: shop.php");
}

$result2 = mysqli_query($conn, "SELECT COUNT(property_id) FROM `property_tbl` WHERE status='active'");
$row2 = mysqli_fetch_array($result2);
$rnum = $row2[0];

$result_property_type = mysqli_query($conn, "SELECT * FROM category_tbl;");
$result_states = mysqli_query($conn, "SELECT * FROM state_tbl;");
$result_cities = mysqli_query($conn, "SELECT * FROM city_tbl;");

$link = 'shop.php?property-type=' . $type . '&fileter-city=' . $city . '&fileter-state=' . $state;
?>

<div class="shop_sidebar_area">
  <form action="shop.php" method="GET">

    <div class="filter-item">
      <label for="property_type">Property Type : </label>
      <select id="property_type" class="property-type-select" name="property-type" value="all">
        <option value="all">All Properties</option>
        <?php while ($row0 = mysqli_fetch_array($result_property_type)) { ?>
          <option <?php if ($type == $row0[0]) echo "selected" ?> value="<?php echo $row0[0] ?>"><?php echo $row0[1] ?></option>
        <?php } ?>
      </select>
    </div>
    <br>
    <br>
    <br>
    <div class="filter-item">
      <label for="fileter-city">City : </label>
      <select id="fileter-city" class="city-select" name="fileter-city" value="all">
        <option value="all">All Cities</option>
        <?php while ($row1 = mysqli_fetch_array($result_cities)) { ?>
          <option <?php if ($city == $row1[0]) echo "selected" ?> value="<?php echo $row1[0] ?>"><?php echo $row1[1] ?></option>
        <?php } ?>
      </select>
    </div>
    <br>
    <br>
    <br>
    <div class="filter-item">
      <label for="fileter-state">State : </label>
      <select id="fileter-state" class="state-select" name="fileter-state" value="all">
        <option value="all">All States</option>
        <?php while ($row2 = mysqli_fetch_array($result_states)) { ?>
          <option <?php if ($state == $row2[0]) echo "selected" ?> value="<?php echo $row2[0] ?>"><?php echo $row2[1] ?></option>
        <?php } ?>
      </select>
    </div>
    <nav aria-label="navigation">
      <ul class="pagination justify-content-end mt-50">
        <div class="amado-btn-group mt-30 mb-100">
          <input type="submit" class="btn amado-btn mb-15" value="Search" name="submit">
        </div>
      </ul>
    </nav>
  </form>
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
          <div class=" product-sorting d-flex">
            <div class="sort-by-date d-flex align-items-center mr-15">
              <p>Sort by</p>
              <form action="#" method="get">
                <select name="select" id="sortBydate" onchange="location = this.value;">
                  <option <?php if ($sort == "date") echo "selected" ?> value="<?php echo $link . '&sort=date' ?>">Date</option>
                  <option <?php if ($sort == "price" && $order == "ASC")  echo "selected" ?> value="<?php echo $link . '&sort=price&order=ASC' ?>">Price: Low to High</option>
                  <option <?php if ($sort == "price" && $order == "DESC") echo "selected" ?> value="<?php echo $link . '&sort=price&order=DESC' ?>">Price: High to Low</option>
                </select>
              </form>
            </div>
            <div class="view-product d-flex align-items-center">
              <p>View</p>
              <form action="#" method="get">
                <select name="select" id="viewProduct" onchange="location = this.value;">
                  <?php $link = $link . '&sort=' . $sort . '&order=' . $order; ?>
                  <option <?php if ($view == "10") echo "selected" ?> value="<?php echo $link . '&view=10' ?>">10</option>
                  <option <?php if ($view == "20") echo "selected" ?> value="<?php echo $link . '&view=20' ?>">20</option>
                  <option <?php if ($view == "40") echo "selected" ?> value="<?php echo $link . '&view=40' ?>">40</option>
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
                  <h6><?php echo $row["city_name"] ?></h6>
                </a>
              </div>
              <!-- Ratings & Cart -->
              <?php 
                $price = $row["price"];
                if($row["denomination"] == "lk") $price/=100000;
                else $price/=10000000;
              ?>
              <div class="ratings-cart text-right">
                <div class="product-meta-data">
                  <p class="product-price product-price-c">₹<?php echo $price . (($row["denomination"] == "lk") ? " Lk" : " Cr") ?></p>
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
<!-- ##### Main Content Wrapper End ##### -->

<?php include("footer.php"); ?>
