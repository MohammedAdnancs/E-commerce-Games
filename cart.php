<?php
session_start();
?>

<!DOCTYPE html>

<html>

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Display:wght@300;400&display=swap" rel="stylesheet">

    <title>Cart</title>

    <script src="js/store.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js" integrity="sha256-eTyxS0rkjpLEo16uXTS0uVCS4815lc40K2iVpWDvdSY=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css-files/cart.css">
    <link rel="stylesheet" href="css-files/navbar.css">
    <link rel="stylesheet" href="css-files/header.css">
    <link rel="stylesheet" href="css-files/footer.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <a href="https://www.flaticon.com/free-icons/gamer" title="gamer icons"></a>

    <script src="https://kit.fontawesome.com/26f7f6db71.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>

    <img src="images/My project.png" class="logo-header-real"></img>

    <div id="cart">

        <header>

            <img src="image/My project.png" class="logo-header"></img>

            <div class="search-cont">
                <div class="search-bar">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" class="search-input" placeholder="search" id="search" style="font-size: 17px; letter-spacing: 1px;">
                    <button class="search-button">Search</i></button>
                </div>
            </div>

            <div class="user">
                <a href="#" class="cart-icon"><i class="fa-solid fa-cart-shopping"></i></a>

                <?php
                if (isset($_SESSION["Ufname"])) {
                    echo "<a href='#' class='sign-up'>" . $_SESSION['Ufname'] . "</a>";
                    echo "<a href='includesphp_login/log_out.php' class='log-in'>Log out</a>";
                } else {
                    echo "<a href='login.php' class='log-in'>Log in</a>";
                    echo "<a href='sign-up.php' class='sign-up'>sign up</a>";
                }
                ?>
            </div>

        </header>

        <div id="searchresult"></div>

        <?php
        include_once "navbar.php";
        ?>
        <div class="big_container">
            <?php
            require_once 'includesphp_login/dbh.php';
            if (isset($_SESSION["Ufname"])) {
                $userID = $_SESSION["userid"];
                $sql = "SELECT * FROM cart WHERE C_ID = $userID";
                $all_products = $conn->query($sql);
                $tot = 0;

                while ($row = mysqli_fetch_assoc($all_products)) {
            ?>
                    <div class="container">

                        <div class="imgBox">
                            <?php echo '<img src="data:image;base64,' . base64_encode($row['P_img']) . '"alt="" >'; ?>
                        </div>
                        <div class="info">

                            <div class="proName">
                                <h1>
                                    <?php echo $row["P_Name"];  ?>
                                </h1>
                            </div>
                            <div class="proPrice">
                                <h1>
                                    $<?php echo $row["P_Price"];  ?>
                                </h1>
                            </div>

                        </div>


                        <div class="qua">
                            <h3 class="qt">Quantity:</h3>
                            <h1 class="qn"><?php echo $row["Quantity"];  ?></h1>
                            <div class="adb">
                                <a class="uq" value="1" name="<?php echo $row["P_ID"]; ?>">+</a>
                                <a class="uq" value="-1" name="<?php echo $row["P_ID"]; ?>">-</a>
                            </div>
                        </div>
                        <a class="del" id="removeP" name="<?php echo $row["P_ID"]; ?>">X</a>



                    </div>
                    <div id="message"></div>
            <?php

                    $tot += (int) $row["P_Price"]  * (int) $row["Quantity"];
                }
            }
            ?>
        </div>


        <div class="totMoneycontainer" id="tot">

            <div class="proName">

                <h1>Your Total is :</h1>

                <h1 CLASS="tot_money"> <?php if (isset($_SESSION["Ufname"])) {
                                            echo $tot;
                                        } else {
                                            echo 0;
                                        }  ?></h1>

                <a href="thankyou.php" class="del" id="ZORAR">Check Out</a>
            </div>


        </div>

        <?php
        include_once "footer.php";
        ?>

    </div>

    <script>
        $(document).ready(function() {

            $(".del").click(function() {
                let product = $(this).attr("name");
                let uid = '<?php echo $userID ?>'
                $.ajax({
                    type: "POST",
                    url: "includesphp_login/Cart_Delete.php",
                    data: {
                        product: product,
                        uid: uid,
                    },
                    cache: false,
                    success: function(data) {
                        $('#cart').load(location.href + "#cart");
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr);

                    }
                });
            });
        });
    </script>


    <script>
        $(document).ready(function() {

            $(".uq").click(function() {
                let product = $(this).attr("name");
                let uid = '<?php echo $userID ?>'
                let val = $(this).attr("value");
                $.ajax({
                    type: "POST",
                    url: "includesphp_login/Cart_Edit.php",
                    data: {
                        product: product,
                        uid: uid,
                        val: val,
                    },
                    cache: false,
                    success: function(data) {
                        $('#cart').load(location.href + "#cart");
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr);

                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {

            $("#search").keyup(function() {
                var input = $(this).val();

                if (input != "") {
                    $.ajax({
                        url: "live.php",
                        method: "POST",
                        data: {
                            input: input
                        },

                        success: function(data) {
                            $("#searchresult").html(data);
                            $("#searchresult").css("display", "block");
                        }
                    });
                } else {
                    $("#searchresult").css("display", "none");
                }
            })
        });
    </script>

</body>


</html>