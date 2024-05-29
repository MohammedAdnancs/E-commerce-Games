<?php
session_start();
?>
<!DOCTYPE html>

<html>

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script type='text/javascript'>
        (function(I, L, T, i, c, k, s) {
            if (I.iticks) return;
            I.iticks = {
                host: c,
                settings: s,
                clientId: k,
                cdn: L,
                queue: []
            };
            var h = T.head || T.documentElement;
            var e = T.createElement(i);
            var l = I.location;
            e.async = true;
            e.src = (L || c) + '/client/inject-v2.min.js';
            h.insertBefore(e, h.firstChild);
            I.iticks.call = function(a, b) {
                I.iticks.queue.push([a, b]);
            };
        })(window, 'https://cdn-v1.intelliticks.com/prod/common', document, 'script', 'https://app.intelliticks.com', '3qSWcxXzqau8hsi6X_c', {});
    </script>

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Display:wght@300;400&display=swap" rel="stylesheet">

    <title>home store</title>

    <script src="js/store.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js" integrity="sha256-eTyxS0rkjpLEo16uXTS0uVCS4815lc40K2iVpWDvdSY=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css-files/store.css">
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
    <div id="allhome">
        <div class="container">

            <span class="next">&#10095;</span>
            <span class="prev">&#10094;</span>

            <section class="slides-row">

                <div class="slide" id="lastimagedup">
                    <img class="slid-img" src="images/play5.jpg"><video style="display: none;" id="video" class="slid-video" autoplay loop muted src="images/play5.mp4"></video>
                </div>

                <div class="slide">
                    <img class="slid-img" src="images/DeadspaceeI.webp">
                    <video style="display: none;" id="video" class="slid-video" autoplay loop muted src="images/deadspace.mp4"></video>
                </div>

                <div class="slide">
                    <img class="slid-img" src="images/EldenringI.webp">
                    <video style="display: none;" id="video" class="slid-video" autoplay loop muted src="images/elden ring.mp4"></video>
                </div>

                <div class="slide">
                    <img class="slid-img" src="images/GodofwarI.webp">
                    <video style="display: none;" id="video" class="slid-video" autoplay loop muted src="images/God of War Ragnarök.mp4"></video>
                </div>

                <div class="slide">
                    <img class="slid-img" src="images/resdientevilI.webp">
                    <video style="display: none;" id="video" class="slid-video" autoplay loop muted src="images/resdientevil.mp4"></video>
                </div>

                <div class="slide">
                    <img class="slid-img" src="images/Hogwartslegacy I.webp">
                    <video style="display: none;" id="video" class="slid-video" autoplay loop muted src="images/hogwarts.mp4"></video>
                </div>

                <div class="slide">
                    <img class="slid-img" src="images/play5.jpg"><video style="display: none;" id="video" class="slid-video" autoplay loop muted src="images/play5.mp4"></video>
                </div>

                <div class="slide" id="firstimagedup">
                    <img class="slid-img" src="images/DeadspaceeI.webp"> <video style="display: none;" id="video" class="slid-video" autoplay loop muted src="images/deadspace.mp4"></video>
                </div>

            </section>


            <section class="dots">
                <div class="dot active">
                </div>
                <div class="dot">
                </div>
                <div class="dot">
                </div>
                <div class="dot">
                </div>
                <div class="dot">
                </div>
                <div class="dot">
                </div>
            </section>
        </div>
        <div class="Best-Sellers" id="B">
            <h2><span>Best Sellers</span></h2>
        </div>

        <div class="container-best-sellers">
            <?php
            require_once 'includesphp_login/dbh.php';

            $sql = "SELECT * FROM bestsgames";
            $all_products = $conn->query($sql);
            while ($row = mysqli_fetch_assoc($all_products)) {
            ?>
                <div class="card">

                    <div class="imgBox">
                        <?php echo '<img src="data:image;base64,' . base64_encode($row['C_image']) . '"alt="" >'; ?>
                    </div>

                    <div class="contentBox">
                        <h3>
                            <?php echo $row["C_name"];  ?>
                        </h3>
                        <h2 class="price">
                            $<?php echo $row["C_price"]; ?>
                        </h2>
                        <a href="single-product.php?product=<?= $row["C_name"]; ?>" class="buy">Buy Now</a>
                    </div>

                </div>
            <?php
            }
            ?>
        </div>

        <div class="Recommended" id="R">
            <h2><span>Recommended</span></h2>
        </div>
        <div class="container-Recommended">

            <?php
            require_once 'includesphp_login/dbh.php';

            $sql = "SELECT * FROM recommended_g";
            $all_products = $conn->query($sql);
            while ($row = mysqli_fetch_assoc($all_products)) {
            ?>
                <div class="card">

                    <div class="imgBox">
                        <?php echo '<img src="data:image;base64,' . base64_encode($row['C_image']) . '"alt="" >'; ?>
                    </div>

                    <div class="contentBox">
                        <h3>
                            <?php echo $row["C_name"];  ?>
                        </h3>
                        <h2 class="price">
                            $<?php echo $row["C_price"]; ?>
                        </h2>
                        <a href="single-product.php?product=<?= $row["C_name"]; ?>" class="buy">Buy Now</a>
                    </div>

                </div>
            <?php
            }
            ?>

        </div>

        <div class="New" id="N">

            <h2><span>New-arrivals</span></h2>

        </div>
        <div class="container-New">

            <div class="New-move">

                <?php
                require_once 'includesphp_login/dbh.php';

                $sql = "SELECT * FROM newarrivals";
                $all_products = $conn->query($sql);
                while ($row = mysqli_fetch_assoc($all_products)) {
                ?>
                    <div class="card">

                        <div class="imgBox">
                            <?php echo '<img src="data:image;base64,' . base64_encode($row['C_image']) . '"alt="" >'; ?>
                        </div>

                        <div class="contentBox">
                            <h3>
                                <?php echo $row["C_name"];  ?>
                            </h3>
                            <h2 class="price">
                                $<?php echo $row["C_price"]; ?>
                            </h2>
                            <a href="single-product.php?product=<?= $row["C_name"]; ?>" class="buy">Buy Now</a>
                        </div>

                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <?php
    include_once "footer.php";
    ?>

    <script>
        const swiper = new Swiper('.swiper', {

            autoplay: {

                delay: 3000,
                diableOnInteraction: false,

            },
            // Optional parameters
            loop: true,

            // If we need pagination
            pagination: {

                el: '.swiper-pagination',
                clickable: true,

            },

            // Navigation arrows
            navigation: {

                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',

            },

        });
    </script>

    <scrip src="store.js"></scrip>
    <script type="text/javascript" src="js/slider.js"></script>

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


    <script>
        $(document).ready(function() {
            $('.slid-img').show();
        });
        var cip = $(".slides-row").hover(hoverVideo, hideVideo);

        function hideVideo(e) {
            $('.slid-img').show();
            $('.slid-video').hide();
            $('.slid-video').get(0).currentTime = 0;
            $('.slid-video').get(1).currentTime = 0;
            $('.slid-video').get(2).currentTime = 0;
            $('.slid-video').get(3).currentTime = 0;
            $('.slid-video').get(4).currentTime = 0;
            $('.slid-video').get(5).currentTime = 0;
            $('.slid-video').get(6).currentTime = 0;
        }

        function hoverVideo(e) {
            $('.slid-img').hide();
            $('.slid-video').show();
        }
    </script>

</body>

</html>