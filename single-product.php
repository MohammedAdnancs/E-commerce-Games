<?php

include_once "includesphp_login/dbh.php";

if (isset($_GET['product'])) {

    $product = $_GET['product'];

    $query = "SELECT * FROM allproducts WHERE P_name = '$product' ";
    $query_run = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($query_run);
} else {
    echo "something went wrong";
}

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

    <title>product</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script src="js/store.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js" integrity="sha256-eTyxS0rkjpLEo16uXTS0uVCS4815lc40K2iVpWDvdSY=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css-files/single-product.css">
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
            <a href="cart.php" class="cart-icon"><i class="fa-solid fa-cart-shopping"></i></a>

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

    <div class="container">
        <div class="box">
            <div class="images">
                <div class="img-holder active">
                    <?php echo '<img src="data:image;base64,' . base64_encode($row['P_image']) . '"alt="" >'; ?>
                </div>
            </div>
            <div class="basic-info">
                <h1>
                    <?php
                    echo $row['P_name'];
                    ?>
                </h1>
                <div class="rate">
                    <i class="filled fas fa-star"></i>
                    <i class="filled fas fa-star"></i>
                    <i class="filled fas fa-star"></i>
                    <i class="filled fas fa-star"></i>
                    <i class="filled fas fa-star"></i>
                </div>
                <span>$<?php echo $row['P_price']; ?></span>
                <div class="options">
                    <a id="Buy" name="<?= $row["P_name"]; ?>">
                        <p class=" tb">Add to Cart</p>
                    </a>
                </div>
            </div>
            <div class="description">
                <p><?php echo $row['P_info']; ?></p>
            </div>

            <div class="message" id="message">

            </div>

        </div>
    </div>

    <?php
    include_once "footer.php";
    ?>

    <?php
    if (isset($_SESSION["Ufname"])) {
    ?>
        <script>
            $(document).ready(function() {

                $("#Buy").click(function() {
                    let product = $(this).attr("name");
                    $.ajax({
                        type: "POST",
                        url: "includesphp_login/Cart_Add.php",
                        data: {
                            product: product,
                        },
                        cache: false,
                        success: function(data) {
                            const message = document.getElementById('message');
                            message.innerHTML = "Item has been added";
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr);
                        }
                    });
                });
            });
        </script>
    <?php
    } else {
    ?>
        <script>
            $(document).ready(function() {

                $("#Buy").click(function() {
                    let product = $(this).attr("name");
                    $.ajax({
                        type: "POST",
                        url: "includesphp_login/Cart_Add.php",
                        data: {
                            product: product,
                        },
                        cache: false,
                        success: function(data, status) {
                            const message = document.getElementById('message');
                            message.innerHTML = "Please log in first";
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr);
                        }
                    });
                });
            });
        </script>
    <?php
    }
    ?>



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