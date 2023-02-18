<?php include("header.php"); ?>

<?php
if (!isset($_SESSION["admin_id"])) {
  header("location: login.php");
} else {
  $userid = $_SESSION["admin_id"];
}

$registerd_users = "?";
$properties_listed = "?";
$sold_properties = "?";
$active_listings = "?";
$property_categories = "?";
$cities = "?";

$result = mysqli_query($conn, "SELECT COUNT(userid) FROM users_tbl;");
if ($row = $result->fetch_row()) $registerd_users = $row[0];

$result = mysqli_query($conn, "SELECT COUNT(property_id) FROM property_tbl;");
if ($row = $result->fetch_row()) $properties_listed = $row[0];

$result = mysqli_query($conn, "SELECT COUNT(property_id) FROM property_tbl WHERE status='sold';");
if ($row = $result->fetch_row()) $sold_properties = $row[0];

$result = mysqli_query($conn, "SELECT COUNT(property_id) FROM property_tbl WHERE status='active';");
if ($row = $result->fetch_row()) $active_listings = $row[0];

// $result = mysqli_query($conn, "SELECT COUNT(property_id) FROM category_tbl;");
// if ($row = $result->fetch_row()) $active_listings = $row[0];

// $result = mysqli_query($conn, "SELECT COUNT(city_id) FROM city_tbl;");
// if ($row = $result->fetch_row()) $active_listings = $row[0];
?>

<div class="container mt-100">
  <div class="col">
    <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
      <h2 class="text-center">ADMIN DASHBOARD</h2>
    </nav>
  </div>
  <div class="row">

    <div class="col-12 col-sm-6 col-md-12 col-xl-6">
      <div class="single-product-wrapper">
        <div class="card border-primary">
          <div class="card-body bg-primary text-white">
            <div class="row">
              <div class="col-3">
                <i class="fa fa-random fa-5x"></i>
              </div>
              <div class="col-9 text-right">
                <h1><?php echo $registerd_users ?></h1>
                <h4>Registerd Users</h4>
              </div>
            </div>
          </div>
          <a href="#" target="_blank">
            <div class="card-footer bg-light text-primary">
              <span class="float-left">More details</span>
              <span class="float-right"><i class="fa fa-arrow-circle-right"></i></span>
              <div class="clearfix"></div>
            </div>
          </a>
        </div>
      </div>
    </div>

    <div class="col-12 col-sm-6 col-md-12 col-xl-6">
      <div class="single-product-wrapper">
        <div class="card border-primary">
          <div class="card border-secondary">
            <div class="card-body bg-secondary text-white">
              <div class="row">
                <div class="col-3">
                  <i class="fa fa-user-graduate fa-5x"></i>
                </div>
                <div class="col-9 text-right">
                  <h1><?php echo $properties_listed ?></h1>
                  <h4>Properties Listed</h4>
                </div>
              </div>
            </div>
            <a href="#" target="_blank">
              <div class="card-footer bg-light text-secondary">
                <span class="float-left">More details</span>
                <span class="float-right"><i class="fa fa-arrow-circle-right"></i></span>
                <div class="clearfix"></div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12 col-sm-6 col-md-12 col-xl-6">
      <div class="single-product-wrapper">
        <div class="card border-primary">
          <div class="card border-success">
            <div class="card-body bg-success text-white">
              <div class="row">
                <div class="col-3">
                  <i class="fa fa-user-tie fa-5x"></i>
                </div>
                <div class="col-9 text-right">
                  <h1><?php echo $sold_properties ?></h1>
                  <h4>Sold Properties</h4>
                </div>
              </div>
            </div>
            <a href="#" target="_blank">
              <div class="card-footer bg-light text-success">
                <span class="float-left">More details</span>
                <span class="float-right"><i class="fa fa-arrow-circle-right"></i></span>
                <div class="clearfix"></div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12 col-sm-6 col-md-12 col-xl-6">
      <div class="single-product-wrapper">
        <div class="card border-primary">
          <div class="card border-danger">
            <div class="card-body bg-danger text-white">
              <div class="row">
                <div class="col-3">
                  <i class="fa fa-book fa-5x"></i>
                </div>
                <div class="col-9 text-right">
                  <h1><?php echo $active_listings ?></h1>
                  <h4>Active Listings</h4>
                </div>
              </div>
            </div>
            <a href="#" target="_blank">
              <div class="card-footer bg-light text-danger">
                <span class="float-left">More details</span>
                <span class="float-right"><i class="fa fa-arrow-circle-right"></i></span>
                <div class="clearfix"></div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12 col-sm-6 col-md-12 col-xl-6">
      <div class="single-product-wrapper">
        <div class="card border-primary">
          <div class="card border-warning">
            <div class="card-body bg-warning text-white">
              <div class="row">
                <div class="col-3">
                  <i class="fa fa-university fa-5x"></i>
                </div>
                <div class="col-9 text-right">
                  <h1><?php echo $property_categories ?></h1>
                  <h4>Property Categories</h4>
                </div>
              </div>
            </div>
            <a href="#" target="_blank">
              <div class="card-footer bg-light text-warning">
                <span class="float-left">More details</span>
                <span class="float-right"><i class="fa fa-arrow-circle-right"></i></span>
                <div class="clearfix"></div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12 col-sm-6 col-md-12 col-xl-6">
      <div class="single-product-wrapper">
        <div class="card border-primary">
          <div class="card border-info">
            <div class="card-body bg-info text-white">
              <div class="row">
                <div class="col-3">
                  <i class="fa fa-suitcase fa-5x"></i>
                </div>
                <div class="col-9 text-right">
                  <h1><?php echo $cities ?></h1>
                  <h4>Cities</h4>
                </div>
              </div>
            </div>
            <a href="#" target="_blank">
              <div class="card-footer bg-light text-info">
                <span class="float-left">More details</span>
                <span class="float-right"><i class="fa fa-arrow-circle-right"></i></span>
                <div class="clearfix"></div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
<?php include("footer.php"); ?>
