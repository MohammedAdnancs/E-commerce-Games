<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Display:wght@300;400&display=swap" rel="stylesheet">

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
  <title>Contact Us</title>

  <script src="store.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
  <link rel="stylesheet" href="css-files/Contact_Us.css">
  <link rel="stylesheet" href="css-files/footer.css">
  <link rel="stylesheet" href="css-files/dropdown.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
  <a href="https://www.flaticon.com/free-icons/gamer" title="gamer icons"></a>
  <script src="https://kit.fontawesome.com/26f7f6db71.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>

<body>

  <section class="header_img">
    <img src="images/wallpaper-mania.com_High_resolution_wallpaper_background_ID_77700812861.jpg" class="abc">
    <div class="home_b"> <?php include_once "dropdown.php" ?> </div>

    <h1>
      <span>K</span>
      <span>E</span>
      <span>E</span>
      <span>P</span>
      <span>&nbsp;</span>
      <span>I</span>
      <span>N</span>
      <span>&nbsp;</span>
      <span>T</span>
      <span>O</span>
      <span>U</span>
      <span>C</span>
      <span>H</span>
    </h1>

    <!-- <p class="kit">Keep In Touch</p> -->
  </section>

  <section class="Contact">

    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d55251.33564057918!2d31.22344493519765!3d30.059558098303356!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583fa60b21beeb%3A0x79dfb296e8423bba!2sCairo%2C%20Cairo%20Governorate!5e0!3m2!1sen!2seg!4v1680964733134!5m2!1sen!2seg" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
    </iframe>

    <section class="phone_numbers">

      <h2 class="phone">Our Branches :</h2>

      <p>Giza branch : <a>01013466916</a></p>

      <p>6 october branch : <a>01222530352</a></p>

      <p>Maadi branch : <a>01018206007</a></p>

      <p>Tanta branch : <a>01018206007</a></p>

      <p>Fifth Settlement branch : <a>01018206007</a></p>

    </section>

  </section>

  <section class="to_sec">

    <section class="frequently_asked_questions">
      <h2 class="freq">Frequently asked questions</h2>

      <div class="container" style="width:370px ;">
        <div class=" upper">What is the return policy</div>
        <div class="lower">What is the return policy</div>
        <div class="inside">We return within 30 days from purchasing</div>
      </div>

      <div class="container" style="width:400px ;">
        <div class=" upper">What is the delivery charge?</div>
        <div class="lower">What is the delivery charge?</div>
        <div class="inside">Depends on how far the branch from you</div>
      </div>

      <div class="container" style="width:540px ;">
        <div class=" upper">What payment methods do you accept?</div>
        <div class="lower">What payment methods do you accept?</div>
        <div class="inside">cash on delivery and online payments visa master card</div>
      </div>

      <div class="container" style="width:400px ;">
        <div class=" upper">Are the games new or used?</div>
        <div class="lower">Are the games new or used?</div>
        <div class="inside">We sell new games unless specified otherwise.</div>
      </div>

    </section>

    <section class="Social_i">
      <h2 class="Hot">Hotlines</h2>

      <div class="hotline">
        <p class="numa">First number : <span>19666</span></p>
        <p class="numa">second number : <span>15977</span></p>
      </div>


      <h2 class="Soc">Social Media</h2>
      <div class="wrapper">
        <ul>
          <li class="facebook"><a href="#"><i class="fa fa-facebook fa-2x" aria-hidden="true"></i></a></li>
          <li class="twitter"><a href="#"><i class="fa fa-twitter fa-2x" aria-hidden="true"></i></a></li>
          <li class="instagram"><a href="#"><i class="fa fa-instagram fa-2x" aria-hidden="true"></i></a></li>
          <li class="google"><a href="#"><i class="fa fa-google fa-2x" aria-hidden="true"></i></a></li>
        </ul>

      </div>
    </section>

  </section>

  <?php include_once "footer.php" ?>
</body>

</html>