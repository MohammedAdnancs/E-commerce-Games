<?php
session_start();
?>

<img src="image/My project.png" class="logo-header-real"></img>
<header>

    <img src="image/My project.png" class="logo-header"></img>

    <div class="search-cont">
        <div class="search-bar">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" class="search-input" placeholder="search" style="font-size: 17px; letter-spacing: 1px;">
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