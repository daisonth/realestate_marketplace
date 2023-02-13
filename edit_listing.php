<?php include("header.php"); ?>

<?php
include("connection.php");

if (!isset($_SESSION["userid"]) || !isset($_GET["id"])) {
  header("location: login.php");
} else {
  $userid = $_SESSION["userid"];
  $property_id = $_GET["id"];
}

$query = "SELECT * FROM property_tbl WHERE property_id='$property_id';";
$result = mysqli_query($conn, $query);

if ($result->num_rows > 0) {
  $row = mysqli_fetch_assoc($result);

  $title = $row["title"];
  $discription = $row["discription"];
  $property_type = $row["property_type"];
  $size = $row["size"];
  $size_format = $row["size_format"];
  $property_address = $row["property_address"];
  $city = $row["city"];
  $pin = $row["pin"];
  $price = $row["price"];
  $denomination = $row["denomination"];
  $fname = $row["fname"];
  $lname = $row["lname"];
  $email = $row["email"];
  $phoneno = $row["phoneno"];
  $images[0] = $row["image_one"];
  $images[1] = $row["image_two"];
  $images[2] = $row["image_three"];
  $images[3] = $row["image_four"];
}

if (isset($_POST["submit"])) {
  $title = $_POST["title"];
  $discription = $_POST["discription"];
  $property_type = $_POST["property_type"];
  $size = $_POST["size"];
  $size_format = $_POST["size_format"];
  $property_address = $_POST["address"];
  $city = $_POST["city"];
  $pin = $_POST["pin"];
  $price = $_POST["price"];
  $denomination = $_POST["denomination"];
  $email = $_POST["email"];
  $phoneno = $_POST["phoneno"];
  $fname = $_POST["fname"];
  $lname = $_POST["lname"];
  $logs = "";

  for ($i = 0; $i < 4; $i++) {
    $var = "img" . $i;
    if (file_exists($_FILES[$var]['name']) || is_uploaded_file($_FILES[$var]['tmp_name'])) {
      $target_dir = "uploads/";
      $target_file = $target_dir . basename($_FILES[$var]["name"]);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

      // Check if image file is a actual image or fake image
      $check = getimagesize($_FILES[$var]["tmp_name"]);
      if ($check !== false) {
        $logs = $logs . "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        $logs = $logs . "File is not an image.";
        $uploadOk = 0;
      }

      // Check if file already exists
      if (file_exists($target_file)) {
        $logs = $logs . "Sorry, file already exists.";
        $images[$i] = "";
        $uploadOk = 0;
      }

      // Check file size is less than 5mb
      if ($_FILES[$var]["size"] > 5000000) {
        $logs = $logs . "Sorry, your file is too large.";
        $uploadOk = 0;
      }

      // Only Allow jpg, jpeg, png and gif file formats
      if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
      ) {
        $logs = $logs . "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
      }

      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
        $logs = $logs . "Sorry, your file was not uploaded.";
        echo $logs;
        // if everything is ok, try to upload file
      } else {
        $target_file = $target_dir . $userid . "_" . basename($_FILES[$var]["name"]);
        if (move_uploaded_file($_FILES[$var]["tmp_name"], $target_file)) {
          $logs = $logs . "The file " . htmlspecialchars(basename($_FILES[$var]["name"])) . " has been uploaded.";
          if ($images[$i] != "") {
            unlink($images[$i]);
          }
          $images[$i] = $target_file;
        } else {
          $logs = $logs . "Sorry, there was an error uploading your file.";
          echo $logs;
        }
      }
    }
    // else {
    //   echo "no image $i, ";
    // }
  }

  $query = "UPDATE active_listings_tbl set owner_id='$userid', title='$title', discription='$discription', property_type='$property_type', size='$size', size_format='$size_format', property_address='$property_address', city='$city', pin='$pin', price='$price', denomination='$denomination', fname='$fname', lname='$lname', email='$email', phoneno='$phoneno', image_one='$images[0]', image_two='$images[1]', image_three='$images[2]', image_four='$images[3]' WHERE property_id='$property_id'";

  if (mysqli_query($conn, $query)) {
    header("location: property_details.php?id=$property_id");
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}

?>

<div class="cart-table-area section-padding-100">
  <section>
    <div class="container py-5">
      <div class="row">
        <div class="col">
          <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
            <h2 class="text-center">Edit Property Details</h2>
          </nav>
        </div>
      </div>
      <form action="edit_listing.php?id=<?php echo $property_id ?>" method="post" enctype="multipart/form-data">
        <h4>Property Details</h4>
        <div class="col-188">
          <div class="card mb-4">
            <div class="card-body">

              <div class="row">
                <div class="col-sm">
                  <p class="mb-0"><b>Title</b></p>
                </div>
                <div class="col-sm">
                  <input type="text" class="form-control" id="title" value="<?php echo $title ?>" name="title" placeholder="Title" required>
                </div>
              </div>

              <hr>
              <div class="row">
                <div class="col-sm">
                  <p class="mb-0"><b>Discription</b></p>
                </div>
                <div class="col-sm">
                  <textarea type="textbox" class="form-control" id="discription" cols="30" rows="5" name="discription" placeholder="Discription"><?php echo $discription ?></textarea>
                </div>
              </div>

              <hr>
              <div class="row">
                <div class="col-sm">
                  <p class="mb-0"><b>Property Type</b></p>
                </div>
                <div class="col-sm">
                  <select class="form-select w-100" name="property_type" value="" required>
                    <option <?php if ($property_type == "house") {
                              echo "selected";
                            } ?> value="house">House</option>
                    <option <?php if ($property_type == "ville") {
                              echo "selected";
                            } ?> value="ville">Villa</option>
                    <option <?php if ($property_type == "plot") {
                              echo "selected";
                            } ?> value="plot">Plot</option>
                    <option <?php if ($property_type == "land") {
                              echo "selected";
                            } ?> value="land">Land</option>
                    <option <?php if ($property_type == "flat") {
                              echo "selected";
                            } ?> value="flat">Flat</option>
                    <option <?php if ($property_type == "appartment") {
                              echo "selected";
                            } ?> value="appartment">Appartment</option>
                  </select>
                </div>
              </div>

              <hr>
              <div class="row">
                <div class="col-sm">
                  <p class="mb-0"><b>Size Details</b></p>
                </div>
                <div class="col-sm" style="max-width: 30%;">
                  <input type="number" class="form-control" id="size" placeholder="Size Details" name="size" value="<?php echo $size ?>" required>
                </div>
                <div class="col-sm" style="max-width: 20%;">
                  <select class="form-select w-100" name="size_format" required>
                    <option <?php if ($size_format == "Cent") {
                              echo "selected";
                            } ?> value="Cent">Per Cent</option>
                    <option <?php if ($size_format == "sqft") {
                              echo "selected";
                            } ?> value="Sqrft">Sqrft</option>
                    <option <?php if ($size_format == "Acres") {
                              echo "selected";
                            } ?> value="Acres">Acres</option>
                    <option <?php if ($size_format == "bhk") {
                              echo "selected";
                            } ?> value="bhk">BHK</option>
                    <option <?php if ($size_format == "Hector") {
                              echo "selected";
                            } ?> value="Hector">Hector</option>
                  </select>
                </div>
              </div>

              <hr>
              <div class="row">
                <div class="col-sm">
                  <p class="mb-0"><b>Property Address</b></p>
                </div>
                <div class="col-sm">
                  <input type="text" class="form-control" id="property_address" placeholder="Property Address" name="address" value="<?php echo $property_address ?>" required>
                </div>
              </div>

              <hr>
              <div class="row">
                <div class="col-sm">
                  <p class="mb-0"><b>City</b></p>
                </div>
                <div class="col-sm">
                  <input type="text" class="form-control" id="city" placeholder="City" value="<?php echo $city ?>" name="city" required>
                </div>
              </div>

              <hr>
              <div class="row">
                <div class="col-sm">
                  <p class="mb-0"><b>Pin Code</b></p>
                </div>
                <div class="col-sm">
                  <input type="text" class="form-control" id="zipCode" placeholder="Pin Code" value="<?php echo $pin ?>" name="pin" required>
                </div>
              </div>

              <hr>
              <div class="row">
                <div class="col-sm">
                  <p class="mb-0"><b>Total Price</b></p>
                </div>
                <div class="col-sm" style="max-width: 30%;">
                  <input type="number" class="form-control" id="price" value="<?php echo $price ?>" placeholder="Price" name="price" required>
                </div>
                <div class="col-sm" style="max-width: 20%;">
                  <select class="form-select w-100" name="denomination" value="<?php echo $denomination ?>" required>
                    <option <?php if ($denomination == "lk") {
                              echo "selected";
                            } ?> value="lk">Lakhs</option>
                    <option <?php if ($denomination == "cr") {
                              echo "selected";
                            } ?> value="cr">Crore</option>
                  </select>
                </div>
              </div>

            </div>
          </div>

          <h4>Upload Images</h4>
          <div class="col-188">
            <div class="card mb-4">
              <div class="card-body">

                <?php for ($j = 0; $j < 4; $j++) { ?>
                  <div class="row mb-3">
                    <div class="col-sm custom-file mx-3">
                      <input type="file" class="custom-file-input" id="<?php echo "constomfile" . $j ?>" name="<?php echo "img" . $j ?>">
                      <label class="custom-file-label" for="<?php echo "constomfile" . $j ?>"><?php echo $images[$j] ?></label>
                    </div>
                    <div class="col-sm custom-file mx-3">
                      <input type="file" class="custom-file-input" id="<?php echo "constomfile" . ++$j ?>" name="<?php echo "img" . $j ?>">
                      <label class="custom-file-label" for="<?php echo "constomfile" . $j ?>"><?php echo $images[$j] ?></label>
                    </div>
                  </div>
                <?php } ?>

              </div>
            </div>
          </div>

          <h4>Contact Details</h4>
          <div class="col-188">
            <div class="card mb-4">
              <div class="card-body">

                <div class="row">
                  <div class="col-sm">
                    <p class="mb-0"><b>First Name</b></p>
                  </div>
                  <div class="col-sm">
                    <input type="text" class="form-control contactfill" id="first_name" name="fname" value="<?php echo $fname ?>" placeholder="First Name">
                  </div>
                </div>

                <hr>
                <div class="row">
                  <div class="col-sm">
                    <p class="mb-0"><b>Last Name</b></p>
                  </div>
                  <div class="col-sm">
                    <input type="text" class="form-control contactfill" id="last_name" name="lname" value="<?php echo $lname ?>" placeholder="Last Name">
                  </div>
                </div>

                <hr>
                <div class="row">
                  <div class="col-sm">
                    <p class="mb-0"><b>Phone Number</b></p>
                  </div>
                  <div class="col-sm">
                    <input type="text" class="form-control contactfill" id="phone_number" min="0" placeholder="Phone No" name="phoneno" value="<?php echo $phoneno ?>">
                  </div>
                </div>

                <hr>
                <div class="row">
                  <div class="col-sm">
                    <p class="mb-0"><b>Email</b></p>
                  </div>
                  <div class="col-sm">
                    <input type="email" class="form-control contactfill" id="email" placeholder="Email" name="email" value="<?php echo $email ?>">
                  </div>
                </div>

              </div>
            </div>
          </div>

        </div>
        <div class="amado-btn-group mt-30 mb-100 float-right">
          <input type="submit" class="btn amado-btn mb-15" name="submit" value="SAVE">
        </div>
      </form>
    </div>
  </section>
</div>

<script type="text/javascript">
  const custom_file_input = document.querySelectorAll(".custom-file-input");
  custom_file_input.forEach((i) => i.addEventListener("change", fileup));

  function fileup() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName.slice(0, 10));
  }
</script>

<?php include("footer.php"); ?>
