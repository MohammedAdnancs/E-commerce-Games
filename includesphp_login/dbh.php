<?php

$serverName = "localhost";
$dbUserName = "root";
$dbpassword = "";
$dbName = "gamingstore";

$conn = mysqli_connect($serverName, $dbUserName, $dbpassword, $dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}