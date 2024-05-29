
<?php
session_start();


include_once "cartlogic.php";

if (isset($_SESSION["Ufname"])) {
    if (isset($_POST['product'])) {
        $product = $_POST['product'];
        $uid = $_POST['uid'];
        Remove_P($product, $uid);
    } else {
        header("location: ../login.php?error=notlogedin");
        exit();
    }
}