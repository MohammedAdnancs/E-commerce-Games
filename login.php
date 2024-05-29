<?php session_start(); ?>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Display:wght@300;400&amp;display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/26f7f6db71.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js" integrity="sha256-eTyxS0rkjpLEo16uXTS0uVCS4815lc40K2iVpWDvdSY=" crossorigin="anonymous"></script>
    <title>login page</title>
    <link rel="stylesheet" href="css-files/login-css.css">
    <link rel="stylesheet" href="css-files/footer.css">
    <link rel="stylesheet" href="css-files/dropdown.css">
</head>

<body>

    <?php include_once "dropdown.php" ?>

    <div class="log_form" id="log_form">

        <form class="form_login" id="form_login" action="includesphp_login/login.php" method="POST">

            <h1 id="log_label">Log In</h1>

            <div class="input-control" id="email_log1">

                <label for="email">Email:</label>

                <input id="Email_log" name="Email_log" type="text" value="<?php if ((isset($_SESSION["Uemail"]))) {
                                                                                echo $_SESSION["Uemail"];
                                                                            } ?>">

                <div class="error"></div>

            </div>

            <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "user_dosent_exist") {
                    echo '<p style="color:red;">user dosent exist</p>';
                    echo '<style>
                    #email_log1 input {
                        border-color: #ff3860;
                    }
                    </style>';
                }
            }
            ?>

            <div class="input-control" id="pass_log">

                <label for="password">Password:</label>

                <input id="password_log" name="password_log" type="password" value="<?php if ((isset($_SESSION["pass"]))) {
                                                                                        echo $_SESSION["pass"];
                                                                                    } ?>">

                <div class="error"></div>

            </div>
            <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "wrongpass") {
                    echo '<p style="color:red;">wrong pass</p>';
                    echo '<style>
                    #pass_log input {
                        border-color: #ff3860;
                    }
                    </style>';
                }
                session_unset();
                session_destroy();
            }
            ?>
            
            <i class="fa-sharp fa-solid fa-eye-slash" id="eye"></i>
            
            <button type="submit" class="end" id="login">Log In</button>

            <div class="gotosignup">
                <p>Already a member ?<a href="sign-up.php"><span>SignUp</span></a></p>
            </div>

        </form>



        <div>
            <img src="images/pexels-garrett-morrow-1337247.jpg" class="log-img">
        </div>


    </div>

    <?php
    include_once "footer.php";
    ?>

    <script src="js/login.js"></script>
</body>

</html>