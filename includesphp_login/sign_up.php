<?php
session_start();

$Fname = $_POST["first_name"];
$Lname = $_POST["last_name"];
$Email = $_POST["Email"];
$Number = $_POST["phone_number"];
$birth = $_POST["birthday"];
$password = $_POST["password"];
$password2 = $_POST["password2"];


$_SESSION["first_name"] = $_POST["first_name"];
$_SESSION["last_name"] = $_POST["last_name"];
$_SESSION["Email"] = $_POST["Email"];
$_SESSION["phone_number"] = $_POST["phone_number"];
$_SESSION["birthday"] = $_POST["birthday"];
$_SESSION["password"] = $password = $_POST["password"];
$_SESSION["password2"] = $_POST["password2"];


require_once 'dbh.php';
require_once 'functions.php';

if (UserEx($conn, $Email) !== false) {
    header("location: ../sign-up.php?error=UserEx");
    exit();
}



createUser($conn, $Fname, $Lname, $Email, $Number, $birth, $password);
