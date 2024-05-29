<?php

function Add_P($product)
{
    require_once 'dbh.php';

    $product_Name = $_POST['product'];

    $sql = "SELECT * FROM allproducts WHERE P_name = '$product_Name' ";

    $all_products = $conn->query($sql);
    $row = mysqli_fetch_assoc($all_products);
    $product_ID = $row['P_id'];
    $product_img = $row['P_image'];
    $product_price = $row['P_price'];
    $customer_ID = $_SESSION["userid"];
    $customer_Name = $_SESSION["Ufname"];

    $sql = "SELECT * FROM cart WHERE P_Name = '$product_Name' AND C_ID ='$customer_ID' ";
    $sql_run = $conn->query($sql);
    $row2 = mysqli_fetch_array($sql_run);

    if ($row2) {
        $oldQuantity = $row2['Quantity'];
        $newQuantity = $oldQuantity + 1;
        $sql = "UPDATE cart SET Quantity = '$newQuantity' WHERE P_name = '$product_Name'  AND  P_ID ='$product_ID' ";
        $sql_run = $conn->query($sql);
    } else {
        echo $product_ID;
        echo $product_price;
        echo $customer_ID;
        echo $customer_Name;
        $img = mysqli_real_escape_string($conn, $product_img);
        $Quantity = 1;
        $sql = "INSERT INTO cart (C_ID,C_Name,P_ID,P_Name,P_Price,P_img,Quantity) VALUES('$customer_ID' ,'$customer_Name','$product_ID' , '$product_Name','$product_price','$img','$Quantity')";
        $sql_run = $conn->query($sql);
    }
    header("location: ../cart.php?error=correct");
    exit();
}

function Remove_P($cartItemId , $username)
{
    require_once 'dbh.php';
    $sql = "DELETE FROM cart WHERE P_ID = '$cartItemId' AND C_ID = '$username' ";
    $sql_run = $conn->query($sql);
    if ($conn->query($sql) === TRUE) {
        echo "Row deleted successfully.";
    } else {
        echo "Error deleting row: " . $conn->error;
    }   
}

function Edit_P($cartItemId, $username, $changeAmount)
{
    require_once 'dbh.php';
    $operator = ($changeAmount > 0) ? "+" : "-";
    
    $cartItemId = mysqli_real_escape_string($conn, $cartItemId);
    $username = mysqli_real_escape_string($conn, $username);
    
    $sql = "UPDATE cart SET Quantity = Quantity $operator ABS($changeAmount) WHERE P_ID = '$cartItemId' AND C_ID = '$username'";
    $sql_run = $conn->query($sql);
    
    if ($sql_run === TRUE) {
        if ($changeAmount < 0) {
            // Quantity decreased, check if it's zero and delete the row if true
            $checkZeroSql = "SELECT Quantity FROM cart WHERE P_ID = '$cartItemId' AND C_ID = '$username'";
            $checkZeroResult = $conn->query($checkZeroSql);
            if ($checkZeroResult && $checkZeroResult->num_rows > 0) {
                $row = $checkZeroResult->fetch_assoc();
                $quantity = $row['Quantity'];
                if ($quantity == 0) {
                    $deleteSql = "DELETE FROM cart WHERE P_ID = '$cartItemId' AND C_ID = '$username'";
                    $deleteResult = $conn->query($deleteSql);
                    if ($deleteResult === TRUE) {
                        echo "Row deleted successfully.";
                    } else {
                        echo "Error deleting row: " . $conn->error;
                    }
                } else {
                    echo "Quantity updated successfully.";
                }
            }
        } else {
            echo "Quantity updated successfully.";
        }
    } else {
        echo "Error updating quantity: " . $conn->error;
    }
}
