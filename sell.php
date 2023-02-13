<?php include("header.php"); ?>

<?php
include("connection.php");

if (!isset($_SESSION["userid"])) {
  header("location: login.php");
} else {
  $userid = $_SESSION["userid"];
}

$title = "";
$discription = "";
$property_type = "";
$size = "";
$size_format = "";
$property_address = "";
$city = "";
$state = "";
$pin = "";
$price = "";
$denomination = "";
$email = "";
$phoneno = "";
$fname = "";
$lname = "";

$query1 = "SELECT firstname,lastname,email,phoneno FROM users_tbl WHERE userid='$userid';";
$result = mysqli_query($conn, $query1);
if ($result->num_rows > 0) {
  $row = mysqli_fetch_row($result);
  $fname = $row[0];
  $lname = $row[1];
  $email = $row[2];
  $phoneno = $row[3];
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
  if (isset($_POST["email"])) $email = $_POST["email"];
  if (isset($_POST["phoneno"])) $phoneno = $_POST["phoneno"];
  if (isset($_POST["fname"])) $fname = $_POST["fname"];
  if (isset($_POST["lname"])) $lname = $_POST["lname"];
  $date = date('y-m-d');
  $images = array();
  $logs = "";

  for ($i = 1; $i <= 4; $i++) {
    $target_dir = "uploads/";
    $var = "img" . $i;
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
        $images[$i - 1] = $target_file;
      } else {
        $logs = $logs . "Sorry, there was an error uploading your file.";
        echo $logs;
      }
    }
  }
  $query = "INSERT INTO property_tbl(`owner_id`,`title`, `discription`, `property_type`, `size`, `size_format`,
`property_address`, `city`, `pin`, `price`, `denomination`, `fname`, `lname`, `email`, `phoneno`, `image_one`, 
`image_two`, `image_three`, `image_four`, `date`) VALUES ('$userid','$title','$discription','$property_type',
'$size','$size_format','$property_address','$city','$pin', '$price','$denomination','$fname','$lname','$email',
'$phoneno','$images[0]','$images[1]','$images[2]', '$images[3]','$date')";

  if (mysqli_query($conn, $query)) {
    header("location: index.php");
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
            <h2 class="text-center">List Property For Sale</h2>
          </nav>
        </div>
      </div>
      <form action="sell.php" method="post" enctype="multipart/form-data">
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
                  <textarea type="textbox" class="form-control" id="discription" cols="30" rows="5" name="discription" placeholder="Discription" value="<?php echo $discription ?>"></textarea>
                </div>
              </div>

              <hr>
              <div class="row">
                <div class="col-sm">
                  <p class="mb-0"><b>Property Type</b></p>
                </div>
                <div class="col-sm">
                  <select class="form-select w-100" name="property_type" value="<?php echo $property_type ?>" required>
                    <option selected>Property Type</option>
                    <option value="house">House</option>
                    <option value="ville">Villa</option>
                    <option value="plot">Plot</option>
                    <option value="land">Land</option>
                    <option value="flat">Flat</option>
                    <option value="appartment">Appartment</option>
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
                  <select class="form-select w-100" name="size_format" value="<?php echo $size_format ?>" required>
                    <option value="cent">Per Cent</option>
                    <option value="sqrft">Sqrft</option>
                    <option value="acres">Acres</option>
                    <option value="bhk">BHK</option>
                    <option value="hector">Hector</option>
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
                  <input type="number" class="form-control" id="price" step="any" value="<?php echo $price ?>" placeholder="Price" name="price" required>
                </div>
                <div class="col-sm" style="max-width: 20%;">
                  <select class="form-select w-100" name="denomination" value="<?php echo $denomination ?>" required>
                    <option value="lk">Lakhs</option>
                    <option value="cr">Crore</option>
                  </select>
                </div>
              </div>

            </div>
          </div>

          <h4>Upload Images</h4>
          <div class="col-188">
            <div class="card mb-4">
              <div class="card-body">

                <?php for ($j = 1; $j <= 4; $j++) { ?>
                  <div class="row mb-3">
                    <div class="col-sm custom-file mx-3">
                      <input type="file" class="custom-file-input" id="<?php echo "constomfile" . $j ?>" name="<?php echo "img" . $j ?>" required>
                      <label class="custom-file-label" for="<?php echo "constomfile" . $j ?>">Choose image <?php echo $j ?></label>
                    </div>
                    <div class="col-sm custom-file mx-3">
                      <input type="file" class="custom-file-input" id="<?php echo "constomfile" . ++$j ?>" name="<?php echo "img" . $j ?>" required>
                      <label class="custom-file-label" for="<?php echo "constomfile" . $j ?>">Choose image <?php echo $j ?></label>
                    </div>
                  </div>
                <?php } ?>

              </div>
            </div>
          </div>

          <h4>Contact Details</h4>
          <div class="custom-control custom-checkbox mb-1">
            <input type="checkbox" class="custom-control-input" id="contactcb" checked>
            <label class="custom-control-label" for="contactcb">Use Default Contact Details</label>
          </div>
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
          <input type="submit" class="btn amado-btn mb-15" name="submit" value="submit">
        </div>
      </form>
    </div>
  </section>
</div>

<script type="text/javascript">
  const contactcb = document.getElementById(`contactcb`);
  const contactfill = document.querySelectorAll(`.contactfill`);
  const custom_file_input = document.querySelectorAll(".custom-file-input");
  contactToggle();
  contactcb.addEventListener(`click`, contactToggle);

  function contactToggle() {
    if (contactcb.checked) {
      contactfill.forEach((i) => i.disabled = true);
      document.querySelector("#first_name").value = "<?php echo $fname ?>";
      document.querySelector("#last_name").value = "<?php echo $lname ?>";
      document.querySelector("#email").value = "<?php echo $email ?>";
      document.querySelector("#phone_number").value = "<?php echo $phoneno ?>";
    } else {
      contactfill.forEach((i) => i.disabled = false);
      document.querySelector("#first_name").value = "";
      document.querySelector("#last_name").value = "";
      document.querySelector("#email").value = "";
      document.querySelector("#phone_number").value = "";
    }
  }


  custom_file_input.forEach((i) => i.addEventListener("change", fileup));

  function fileup() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName.slice(0, 10));
  }
</script>

<?php include("footer.php"); ?>
