<div class="dropdown">
  <img src="images/My project.png" alt="Menu" class="menu-img">
  <div class="dropdown-content">

    <ul class="navbar-nav">

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
      </li>

      <li class="nav-item">
        <a href="contactus.php" class="nav-link">
          <i class="fa-solid fa-phone"></i>
          <span class="link-text">Contact Us</span>
        </a>
      </li>

      <li class="nav-item">
        <a href="about-us.php" class="nav-link">
          <i class="fa-solid fa-address-card"></i>
          <span class="link-text">About Us</span>
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
    </ul>
  </div>
</div>