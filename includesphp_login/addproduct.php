<?php
session_start();
require_once 'dbh.php';


$pname = $_POST["product-name"];
$price = $_POST["product-price"];
$info = $_POST["product-description"];
$type = $_POST["Producttype"];


$img_name = $_FILES['product-image']['name'];
$img_tmp_name = $_FILES['product-image']['tmp_name'];
$img_size = $_FILES['product-image']['size'];
$img_type = $_FILES['product-image']['type'];

$p_image_folder = 'uploaded_img/' . $img_name;

//Create the destination folder if it doesn't exist
if (!file_exists('uploaded_img')) {
  mkdir('uploaded_img', 0777, true);
}

//Read the contents of the uploaded file
$img_data = file_get_contents($img_tmp_name);
// Insert the image as a blob into the database
$insert_query = mysqli_prepare($conn, "INSERT INTO allproducts (P_name, P_price, P_info, P_image) VALUES (?, ?, ?, ?)");
mysqli_stmt_bind_param($insert_query, "ssss", $pname, $price, $info, $img_data);
mysqli_stmt_execute($insert_query);

if (mysqli_stmt_affected_rows($insert_query) > 0) {
  //Move the uploaded file to the destination folder
  move_uploaded_file($img_tmp_name, $p_image_folder);
} else {
  echo "Failed to upload the image.";
}

if ($type == "Game") {
  $insert_query = mysqli_prepare($conn, "INSERT INTO allgames (G_name, G_price, G_image) VALUES (?, ?, ?)");
  mysqli_stmt_bind_param($insert_query, "sss", $pname, $price, $img_data);
  mysqli_stmt_execute($insert_query);
} else if ($type == "Console") {
  $insert_query = mysqli_prepare($conn, "INSERT INTO consoles (C_name, C_price, C_image) VALUES (?, ?, ?)");
  mysqli_stmt_bind_param($insert_query, "sss", $pname, $price, $img_data);
  mysqli_stmt_execute($insert_query);
} else if ($type == "e-card") {
  $insert_query = mysqli_prepare($conn, "INSERT INTO ecards (E_name, E_price,  E_image) VALUES (?, ?, ?)");
  mysqli_stmt_bind_param($insert_query, "sss", $pname, $price, $img_data);
  mysqli_stmt_execute($insert_query);
}

mysqli_stmt_close($insert_query);
mysqli_close($conn);
