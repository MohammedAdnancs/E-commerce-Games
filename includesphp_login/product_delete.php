<?php
session_start();
if (isset($_POST['product'])) {
    $product = $_POST['product'];
    $pname = $_POST['pname'];
    require_once 'dbh.php';

    $sql = "DELETE FROM allproducts WHERE P_id = '$product' ";
    $sql_run = $conn->query($sql);

    $sql1 = "DELETE FROM allgames WHERE G_name = '$pname' ";
    $sql1_run = $conn->query($sql1);

    $sql2 = "DELETE FROM consoles WHERE C_name = '$pname' ";
    $sql2_run = $conn->query($sql2);

    $sql3 = "DELETE FROM ecards WHERE E_name = '$pname' ";
    $sql3_run = $conn->query($sql3);

    $sql4 = "DELETE FROM cart WHERE P_name = '$pname' ";
    $sql4_run = $conn->query($sql4);

    if ($conn->query($sql) === TRUE) {
        echo "Row deleted successfully.";
    } else {
        echo "Error deleting row: " . $conn->error;
    }
}
