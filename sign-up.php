<?php session_start(); ?>


<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Display:wght@300;400&amp;display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/26f7f6db71.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js" integrity="sha256-eTyxS0rkjpLEo16uXTS0uVCS4815lc40K2iVpWDvdSY=" crossorigin="anonymous"></script>
    <title>sign up</title>
    <link rel="stylesheet" href="css-files/sign up-css.css">
    <link rel="stylesheet" href="css-files/footer.css">
    <link rel="stylesheet" href="css-files/dropdown.css">
</head>

<body>

    <?php include_once "dropdown.php" ?>

    <div class="log_form">

        <form id="form_SignUp" class="form_SignUp" action="includesphp_login/sign_up.php" method="post">

            <h1>Sign Up</h1>

            <div id="name">

                <div class="input-control" id="fname">

                    <label for="first_name">First Name:</label>

                    <input id="first_name" name="first_name" type="text" value="<?php if ((isset($_SESSION["first_name"]))) {
                                                                                    echo $_SESSION["first_name"];
                                                                                } ?>">

                    <div class="error"></div>
                </div>

                <div class="input-control" id="lname">

                    <label for="last_name">Last Name:</label>

                    <input id="last_name" name="last_name" type="text" value="<?php if ((isset($_SESSION["last_name"]))) {
                                                                                    echo $_SESSION["last_name"];
                                                                                } ?>">

                    <div class="error"></div>

                </div>

            </div>


            <div id="info">
                <div class="input-control" id="email2">

                    <label for="email">Email:</label>

                    <input id="Email" name="Email" type="text" value="<?php if ((isset($_SESSION["Email"]))) {
                                                                            echo $_SESSION["Email"];
                                                                        } ?>">

                    <div class="error"></div>
                </div>

                <?php
                if (isset($_GET["error"])) {
                    if ($_GET["error"] == "UserEx") {
                        echo '<p style="color:red;">the email aleardy exist</p>';
                        echo '<style>
                        #email2 input {
                            border-color: #ff3860;
                        }
                        </style>';
                    }
                }
                ?>

                <div class="input-control" id="number">

                    <label for="phone_number">Phone Number:</label>

                    <input id="phone_number" name="phone_number" type="phone_number" value="<?php if ((isset($_SESSION["phone_number"]))) {
                                                                                                echo $_SESSION["phone_number"];
                                                                                            } ?>">

                    <div class="error"></div>
                </div>

                <div class="input-control" id="age">

                    <label for="birthday">Birthday:</label>

                    <input type="date" id="birthday" name="birthday" style="text-align: center;" value="<?php if ((isset($_SESSION["birthday"]))) {
                                                                                                            echo $_SESSION["birthday"];
                                                                                                        } ?>">

                    <div class="error"></div>
                </div>
            </div>

            <div id="pass">
                <div class="input-control" id="pass1">

                    <label for="password">Password:</label>

                    <input id="password" name="password" type="password" style="display: inline-block;" value="<?php if ((isset($_SESSION["password"]))) {
                                                                                                                    echo $_SESSION["password"];
                                                                                                                } ?>">

                    <div class="error" style="height: 37px;"></div>

                </div>

                <i class="fa-sharp fa-solid fa-eye-slash" id="eye"></i>

                <div class="input-control" id="pass2">

                    <label for="password2">Confirm Password:</label>

                    <input id="password2" name="password2" type="password" value="<?php if ((isset($_SESSION["password2"]))) {
                                                                                        echo $_SESSION["password2"];
                                                                                    } ?>">

                    <div class="error" style="height: 37px;"></div>

                </div>
            </div>

            <button type="submit" class="end" id="submit">Sign Up</button>

            <div class="gotologin">
                <p>Already a member ?<a href="login.php"><span>Login</span></a></p>
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