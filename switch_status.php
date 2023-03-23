<?php
include("connection.php");
session_start();
if (isset($_GET["id"]) && isset($_SESSION["userid"])) {
  $id = $_GET["id"];
  $userid = $_SESSION["userid"];
  $resutl = mysqli_query($conn, "select status from property_tbl where property_id=$id");
  $row = mysqli_fetch_row($resutl);
  $status = $row[0];
  if ($status == "disabled") {
    header("location: checkout.php?listing_id=$id");
  } else if ($status == "active") {
    $status = "inactive";
    $result = mysqli_query($conn, "update property_tbl set status='$status' where owner_id=$userid and property_id=$id");
    header("location: my_listings.php");
  } else if ($status == "inactive") {
    $status = "active";
    $result = mysqli_query($conn, "update property_tbl set status='$status' where owner_id=$userid and property_id=$id");
    header("location: my_listings.php");
  }
} else {
  header("location: my_listings.php?");
}
