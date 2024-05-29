<?php
include_once "dbh.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pname = $_POST['pname'];
    $price = $_POST['price'];
    $info = $_POST['info'];
    // Assuming you have a column named 'id' to uniquely identify the product
    $product = $_GET['product'];
    // Update the 'allproducts' table with the new values


    $sql = " UPDATE allproducts SET P_name = '$pname' , P_price = '$price', P_info = '$info' WHERE P_name = '$product' ";
    $result = mysqli_query($conn, $sql);

    $sql = " UPDATE allgames SET G_name = '$pname' , G_price = '$price' WHERE G_name = '$product' ";
    $result = mysqli_query($conn, $sql);

    $sql = " UPDATE consoles SET C_name = '$pname' , C_price = '$price'  WHERE C_name = '$product' ";
    $result = mysqli_query($conn, $sql);

    $sql = " UPDATE ecards SET E_name = '$pname' , E_price = '$price'  WHERE E_name = '$product' ";
    $result = mysqli_query($conn, $sql);

    $sql = " UPDATE cart SET P_Name = '$pname' , P_price = '$price'  WHERE P_Name = '$product' ";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Item edited successfully";
    } else {
        echo "Error editing item";
    }
}
