<?php

function createUser($conn, $Fname, $Lname, $Email, $Number, $birth, $password)
{

    $sql = "INSERT INTO customers (Uemail , Ufname , Ulname , Uphone , Upass) VALUES(?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo ("didnt work");
        exit();
    }

    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssss", $Email, $Fname, $Lname, $Number, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    session_start();
    $uidExists = UserEx($conn, $Email);
    $_SESSION["userid"] = $uidExists["userId"];
    $_SESSION["Uemail"] = $Email;
    $_SESSION["Ufname"] = $Fname;
    header("location: ../store.php?error=correct");
}

function UserEx($conn, $Email)
{
    $sql = "SELECT * FROM customers WHERE Uemail=?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo ("didnt work");
    }
    mysqli_stmt_bind_param($stmt, "s", $Email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function loginUser($conn, $Email, $password)
{
    $uidExists = UserEx($conn, $Email);

    if ($uidExists == false) {
        
        header("location: ../login.php?error=user_dosent_exist");
        exit();
    }

    $passhashed = $uidExists['Upass'];
    $cheackpass = password_verify($password, $passhashed);

    if ($cheackpass == false) {
        header("location: ../login.php?error=wrongpass");
        exit();
    } else if ($cheackpass == true) {
        session_start();
        $_SESSION["userid"] = $uidExists["userId"];
        $_SESSION["Uemail"] = $uidExists["Uemail"];
        $_SESSION["Ufname"] = $uidExists["Ufname"];
        header("location: ../store.php?error=correct");
        exit();
    }
}
