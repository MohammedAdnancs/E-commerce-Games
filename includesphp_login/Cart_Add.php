<?php
session_start();


include_once "cartlogic.php";

if (isset($_SESSION["Ufname"])) {
    if (isset($_POST['product'])) {
        $product = $_POST['product'];
        
        Add_P($product);
    } else {
        header("location: ../login.php?error=notlogedin");
        exit();
    }
}