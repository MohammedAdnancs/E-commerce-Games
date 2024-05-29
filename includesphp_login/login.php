<?php
session_start();

$Email = $_POST["Email_log"];
$password = $_POST["password_log"];
$_SESSION["Uemail"] = $_POST["Email_log"];
$_SESSION["pass"] = $_POST["password_log"];

require_once 'dbh.php';
require_once 'functions.php';

loginUser($conn, $Email, $password);
