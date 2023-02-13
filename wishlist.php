<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("connection.php");
session_start();

if (isset($_GET["id"])) {
  $property_id = $_GET["id"];
  $userid = $_SESSION["userid"];
  $query = "SELECT wishlist_id FROM `wishlist_tbl` WHERE property_id=$property_id AND user_id=$userid";
  $result = mysqli_query($conn, $query);
  if ($result->num_rows > 0) {
    $query = "DELETE FROM wishlist_tbl WHERE property_id=$property_id AND user_id=$userid";
    $result = mysqli_query($conn, $query);
  } else {
    $query = "INSERT INTO `wishlist_tbl`(`property_id`, `user_id`) VALUES ('$property_id','$userid')";
    $result = mysqli_query($conn, $query);
  }
}

header("location: shop.php");
