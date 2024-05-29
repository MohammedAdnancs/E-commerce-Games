<?php
session_start();
?>
<!DOCTYPE html>
<html>
</body>

</html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css-files/aboutus.css">
    <link rel="stylesheet" href="css-files/dropdown.css">

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
    <script src="https://kit.fontawesome.com/26f7f6db71.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Display:wght@300;400&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js" integrity="sha256-eTyxS0rkjpLEo16uXTS0uVCS4815lc40K2iVpWDvdSY=" crossorigin="anonymous"></script>
    <script src="js/about_us.js"></script>
    <title>About Us</title>
</head>

<body>
    <div id="dropd" style=""> <?php include_once "dropdown.php" ?> </div>
    <div class="about">
        <img src="images/wallhaven-wykww6_1600x1200.png" class="loma">
        <div class="innnercont">
            <h1>about us</h1>
            <p class="text">
                Step into a world of endless possibilities at our gaming store. We offer a wide selection of the
                latest video games, consoles, and accessories for gamers of all levels. From classic titles to
                cutting-edge technology, our knowledgeable staff is ready to assist you in finding your next gaming
                adventure. Come and explore the ultimate gaming experience today!
            </p>
            <p class="topic"> Get to now us better:</p>
            <div class="icon">
                <a href="#" class="fac"><i class="fa-brands fa-facebook-f" style="color:#3B5998"></i></a>
                <a href="#" class="fac"><i class="fa-solid fa-envelope" style="color:#D65A31"></i></a>
                <a href="#" class="fac"><i class="fa-brands fa-instagram" style="color:#860640"></i></a>
                <a href="#" class="fac"><i class="fa-brands fa-twitter" style="color:#1DA1F2"></i></a>
            </div>
        </div>

    </div>
</body>

</html>