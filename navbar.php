<?php
session_start();
?>
<nav class="navbar">

    <ul class="navbar-nav">

        <li class="logo-nav">
            <a class="nav-link-logo">
                <span class="material-symbols-outlined">keyboard_double_arrow_right</span>
                <span class="link-text">Welcome</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="store.php" class="nav-link">
                <i class="fa-solid fa-house-chimney"></i>
                <span class="link-text">Home</span>
            </a>
        </li>

        <li class="nav-item-shop-menu">

            <a href="shop.php" class="nav-link-shop">
                <i class="fa-solid fa-store"></i>
                <span class="link-text">Shop</span>
            </a>

            <div class="shop-sub-menu">

                <ul class="submen-shop">

                    <a href="shop.php?type=GAMES" class="submen-shop-link">
                        <i class="fa-solid fa-alien-8bit"></i>
                        <li class="text-submen-shop">Games</li>
                    </a>
                    <a href="shop.php?type=E-CARDS" class="submen-shop-link">
                        <i class="fa-solid fa-gift-card"></i>
                        <li class="text-submen-shop" id="Access">E-cards</li>
                    </a>
                    <a href="shop.php?type=CONSOLES" class="submen-shop-link">
                        <i class="fa-solid fa-gamepad-modern"></i>
                        <li class="text-submen-shop">CONSOLES</li>
                    </a>

                </ul>

            </div>

        </li>

        <li class="nav-item">
            <a href="contactus.php" class="nav-link">
                <i class="fa-solid fa-phone"></i>
                <span class="link-text">Contact Us</span>
            </a>
        </li>

        <?php

require_once 'includesphp_login/dbh.php';
if (isset($_SESSION['Ufname'])) {
    $userFirstName = $_SESSION['Ufname'];
    if ($userFirstName === 'Admin') {
        echo '<li class="nav-item">
                <a href="admin.php" class="nav-link">
                <i class="fa-sharp fa-solid fa-screwdriver-wrench"></i>
                    <span class="link-text">ADMIN ONLY</span>
                </a>
              </li>';
    }
}
?>



        <li class="nav-item">
            <a href="about-us.php" class="nav-link">
                <i class="fa-solid fa-address-card"></i>
                <span class="link-text">About Us</span>
            </a>
        </li>

    </ul>
</nav>