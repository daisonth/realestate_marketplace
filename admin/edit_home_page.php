<?php include("header.php"); ?>
<?php include("connection.php") ?>

<?php
if (!isset($_SESSION["admin_id"])) {
  header("location: login.php");
} else {
  $admin_id = $_SESSION["admin_id"];
}

$title = "";
$sub_title = "";
$hyperlink = "";
$title = "";
$title = "";

if (isset($_POST["submit"])) {
  $title = $_POST["title"];
  $sub_title = $_POST["sub_title"];
  $hyperlink = $_POST["hyperlink"];
  $image = "";
  $logs = "";

  $target_dir = "../img/home/";
  $target_file = $target_dir . basename($_FILES["img"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  // Check if image file is a actual image or fake image
  $check = getimagesize($_FILES["img"]["tmp_name"]);
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
  if ($_FILES["img"]["size"] > 5000000) {
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
    $target_file = $target_dir . basename($_FILES["img"]["name"]);
    if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
      $logs = $logs . "The file " . htmlspecialchars(basename($_FILES["img"]["name"])) . " has been uploaded.";
      $image = $target_file;
    } else {
      $logs = $logs . "Sorry, there was an error uploading your file.";
      echo $logs;
    }
  }
  mysqli_query($conn, "INSERT INTO home_tbl(title, sub_title, card_image, card_link) VALUES ('$title','$sub_title','$image','$hyperlink')");
}

if (isset($_GET["remove"])) {
  $id = $_GET["remove"];
  $query = "SELECT * FROM home_tbl WHERE card_id='$id'";
  $result = mysqli_query($conn, $query);
  print_r($result);
  $row = mysqli_fetch_assoc($result);
  unlink($row["card_image"]);
  $query = "DELETE FROM home_tbl WHERE card_id='$id'";
  $result = mysqli_query($conn, $query);
  header("location: edit_home_page.php");
}

$query = "SELECT * FROM home_tbl";
$result = mysqli_query($conn, $query);
?>

<div class="cart-table-area section-padding-100">
  <div class="container-fluid">
    <div class="row">
      <div class="f1 col-12 col-lg-8">
        <div class="daas-heading cart-title mt-50">
          <h2>Edit Home Page</h2>
          <a href="edit_home_page.php?edit=1" class="btn amado-btn mb-15">ADD <b>+</b></a>
        </div>

        <div class="cart-table clearfix">
          <table class="table table-responsive">
            <thead>
              <tr>
                <th>IMAGE</th>
                <th>TITLE</th>
                <th>SUB TITLE</th>
                <th>HYPERLINK</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php if (isset($_GET["edit"])) { ?>
                <form action="edit_home_page.php" method="post" enctype="multipart/form-data">
                  <tr>
                    <td class="cart_product_img">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="img" name="img" required>
                        <label class="custom-file-label" for="img">Choose image</label>
                      </div>
                    </td>
                    <td class="cart_product_img">
                      <input type="text" class="form-control" id="title" name="title" placeholder="Title..." required>
                    </td>
                    <td class="cart_product_img">
                      <input type="text" class="form-control" id="title" name="sub_title" placeholder="Sub Title..." required>
                    </td>
                    <td class="cart_product_img">
                      <input type="text" class="form-control" id="title" name="hyperlink" placeholder="hyperlink..." required>
                    </td>
                    <td class="cart_product_img">
                      <input type="submit" class="btn " name="submit" value="✅">
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="edit_home_page.php" class="btn " name="submit">❌</a>
                    </td>
                  </tr>
                </form>
              <?php } ?>

              <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                  <td class="cart_product_img">
                    <img src="<?php echo $row["card_image"] ?>" alt="Image" style="width: 150px; height: 150px;">
                  </td>
                  <td class="cart_product_desc">
                    <h5><?php echo $row["title"] ?></h5>
                  </td>
                  <td class="cart_product_desc">
                    <h5><?php echo $row["sub_title"] ?></h5>
                  </td>
                  <td class="qty">
                    <h5><?php echo $row["card_link"] ?></h5>
                  </td>
                  <td class="qty">
                    <a href="edit_home_page.php?remove=<?php echo $row["card_id"] ?>" data-toggle="tooltip" data-placement="left" title="Delete"><img class="bin" src="../img/core-img/bin_black.png"></a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ##### Main Content Wrapper End ##### -->

<?php include("footer.php"); ?>
