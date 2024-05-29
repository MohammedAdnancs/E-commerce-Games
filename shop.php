<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=stylesheet href="css-files/shop.css">
    <title>shop</title>

    <link rel="icon" href="images/d-and-d.svg">
    <link rel="stylesheet" href="css-files/navbar.css">
    <script src="https://kit.fontawesome.com/26f7f6db71.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css-files/footer.css">
    <link rel="stylesheet" href="css-files/header.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js" integrity="sha256-eTyxS0rkjpLEo16uXTS0uVCS4815lc40K2iVpWDvdSY=" crossorigin="anonymous"></script>
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
                echo "<a href='sign-up.php' class='sign-up'>" . $_SESSION['Ufname'] . "</a>";
                echo "<a href='login.php' class='log-in'>Log out</a>";
            } else {
                echo "<a href='login.php' class='log-in'>Log in</a>";
                echo "<a href='sign-up.php' class='sign-up'>sign up</a>";
            }
            ?>
        </div>

    </header>
    <div id="searchresult" class="serchShop"></div>

    <?php

    include_once "navbar.php";

    require_once 'includesphp_login/dbh.php';

    if (isset($_GET['type'])) {

        if ($_GET['type'] == 'CONSOLES') {
            $sql = "SELECT * FROM Consoles";
        }
        if ($_GET['type'] == 'GAMES') {
            $sql = "SELECT * FROM allgames";
        }
        if ($_GET['type'] == 'E-CARDS') {
            $sql = "SELECT * FROM ecards";
        }
    } else {
        $sql = "SELECT * FROM Consoles";
    }
    $all_products = $conn->query($sql);
    ?>

    <div id=con1>
        <?php
        if (isset($_GET['type'])) {
            if ($_GET['type'] == 'CONSOLES') {
        ?>
                <div class="tp" id="Cons">
                    <h1 class="let">C </h1>
                    <h1 class="let">O </h1>
                    <h1 class="let">N </h1>
                    <h1 class="let">S </h1>
                    <h1 class="let">O </h1>
                    <h1 class="let">L </h1>
                    <h1 class="let">E </h1>
                    <h1 class="let">S </h1>
                </div>

            <?php
            } elseif ($_GET['type'] == 'GAMES') {
            ?>

                <div class="tp" id="gamestp">
                    <h1 class="let">G </h1>
                    <h1 class="let">A </h1>
                    <h1 class="let">M </h1>
                    <h1 class="let">E </h1>
                    <h1 class="let">S </h1>
                </div>

            <?php
            } elseif ($_GET['type'] == 'E-CARDS') {
            ?>

                <div class="tp" id="etp">
                    <h1 class="let">E </h1>
                    <h1 class="let">- </h1>
                    <h1 class="let">C </h1>
                    <h1 class="let">A </h1>
                    <h1 class="let">R </h1>
                    <h1 class="let">D </h1>
                    <h1 class="let">S </h1>
                </div>

            <?php
            }
            ?>
        <?php
        } else {
        ?>
            <div class="tp">
                <h1 class="let">C </h1>
                <h1 class="let">O </h1>
                <h1 class="let">N </h1>
                <h1 class="let">S </h1>
                <h1 class="let">O </h1>
                <h1 class="let">L </h1>
                <h1 class="let">E </h1>
                <h1 class="let">S </h1>
            </div>
        <?php
        }
        ?>

        <div class="product-list" id="GAMES-LIST">

            <?php
            while ($row = mysqli_fetch_assoc($all_products)) {
            ?>
                <div class="card">

                    <div class="imgBx">
                        <?php
                        if (isset($_GET['type'])) {
                            if ($_GET['type'] == 'CONSOLES') {
                                echo '<img src="data:image;base64,' . base64_encode($row['C_image']) . '"alt="" >';
                            }
                            if ($_GET['type'] == 'GAMES') {
                                echo '<img src="data:image;base64,' . base64_encode($row['G_image']) . '"alt="" >';
                            }
                            if ($_GET['type'] == 'E-CARDS') {
                                echo '<img src="data:image;base64,' . base64_encode($row['E_image']) . '"alt="" >';
                            }
                        } else {
                            echo '<img src="data:image;base64,' . base64_encode($row['C_image']) . '"alt="" >';
                        }
                        ?>
                    </div>

                    <div class="contentBx">
                        <h2>
                            <?php
                            if (isset($_GET['type'])) {
                                if ($_GET['type'] == 'CONSOLES') {
                                    echo $row["C_name"];
                                }
                                if ($_GET['type'] == 'GAMES') {
                                    echo $row["G_name"];
                                }
                                if ($_GET['type'] == 'E-CARDS') {
                                    echo $row["E_name"];
                                }
                            } else {
                                echo $row["C_name"];
                            }

                            ?>
                        </h2>
                        <h2>
                            <?php
                            if (isset($_GET['type'])) {
                                if ($_GET['type'] == 'CONSOLES') {
                                    echo $row["C_price"] . "$";
                                }
                                if ($_GET['type'] == 'GAMES') {
                                    echo $row["G_price"] . "$";
                                }
                                if ($_GET['type'] == 'E-CARDS') {
                                    echo $row["E_price"];
                                }
                            } else {
                                echo $row["C_price"] . "$";
                            }
                            ?>
                        </h2>

                        <?php
                        if (isset($_GET['type'])) {
                            if ($_GET['type'] == 'CONSOLES') {
                        ?>
                                <a href="single-product.php?product=<?= $row["C_name"]; ?>">Buy Now</a>
                            <?php
                            } elseif ($_GET['type'] == 'GAMES') {
                            ?>
                                <a href="single-product.php?product=<?= $row["G_name"]; ?>">Buy Now</a>
                            <?php
                            } elseif ($_GET['type'] == 'E-CARDS') {
                            ?>
                                <a href="single-product.php?product=<?= $row["E_name"]; ?>">Buy Now</a>
                            <?php
                            }
                        } else { ?><a href="single-product.php?product=<?= $row["C_name"]; ?>">Buy Now</a>
                        <?php
                        }
                        ?>

                    </div>

                </div>
            <?php
            }
            ?>
        </div>
    </div>

    <div id="nbutton">
        <a href="shop.php?type=CONSOLES" class="page-button">CONSOLES</a>
        <a href="shop.php?type=E-CARDS" class="page-button">E-CARDS</a>
        <a href="shop.php?type=GAMES" class="page-button">GAMES</a>
    </div>

    <?php
    include_once "footer.php";
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

    <script src="js/shop.js"></script>
</body>

</html>