<?php


session_unset();
session_destroy();

header("location: ../login.php?error=logout");
exit();
