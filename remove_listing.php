<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("connection.php");
session_start();

if (isset($_GET["id"])) {
  $id = $_GET["id"];
  $query = "SELECT * FROM property_tbl WHERE property_id='$id'";
  $result = mysqli_query($conn, $query);
  print_r($result);
  $row = mysqli_fetch_assoc($result);
  unlink($row["image_one"]);
  unlink($row["image_two"]);
  unlink($row["image_three"]);
  unlink($row["image_four"]);
  $query = "DELETE FROM property_tbl WHERE property_id='$id'";
  $result = mysqli_query($conn, $query);
}

header("location: my_listings.php");
