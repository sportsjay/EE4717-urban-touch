<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/index.css" />
  <title>About Us</title>
  <link rel="shortcut icon" type="image/x-icon" href="../../../../assets/images/favicon.png">
  <script src="https://kit.fontawesome.com/f8c6106aef.js" crossorigin="anonymous"></script>
</head>
<?php include '../../../sql/query/get_product.php' ?>

<body>
  <!-- Navigation -->
  <?php include '../../../components/navigation/php/index.php' ?>
  <!-- Banner -->
  <header class="about-us global-content-wrapper  global-flex-column-wrapper">
    <span class="global-content-typography-title">ABOUT US</span>
    <hr class="global-horizontal-line" width="90px">
  </header>
  <!-- Body -->
  <div class="tagline-img global-flex-column-wrapper global-content-wrapper">
    <span class="global-content-typography-title">Founded on <span
        style="color: var(--global-color-primary-orange);">Fit</span>. Built on <span
        style="color: var(--global-color-primary-orange);">Service</span>. <br>Focused on <span
        style="color: var(--global-color-primary-orange);">Style</span>.</span>
  </div>
  <div class="about-us global-flex-column-wrapper">
    <section class="global-flex-column-wrapper global-content-wrapper">
      <img src="../../../../assets/images/icon.png" />
      <span class="global-content-typography-text">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus laoreet libero eget lorem facilisis, sed
        dignissim orci eleifend. Sed pretium sem sit amet magna tristique, quis commodo augue vulputate. Sed imperdiet
        augue at mi sodales semper. Aliquam blandit enim vel an
      </span>
    </section>
    <section id="our-founders" class=" global-content-wrapper">
      <div class="global-flex-row-wrapper">
        <img src="../../../../assets/images/founder.png" width="350px" height="auto" />
        <div class="global-flex-column-wrapper">
          <header class="global-content-typography-title">OUR FOUNDERS</header>
          <hr class="global-horizontal-line" width="130px">
          <span class="global-content-typography-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus
            laoreet libero eget lorem facilisis, sed dignissim orci eleifend. Sed pretium sem sit amet magna tristique,
            quis commodo augue.<br><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus laoreet libero
            eget
            lorem facilisis, sed dignissim orci eleifend. Sed pretium sem sit amet magna tristique</span>
        </div>
      </div>
    </section>
    <section id="our-location" class="global-flex-row-wrapper global-content-wrapper">
      <div class="global-flex-column-wrapper">
        <header class="global-content-typography-title">FIND US ON</header>
        <hr class="global-horizontal-line" width="110px">
        <table class="global-content-typography-text">
          <tr>
            <td><i class="fas fa-location-arrow"></i></td>
            <td>20 Nanyang Avenue, Singapore 639809</td>
          </tr>
          <tr>
            <td><i class="fas fa-envelope"></i></td>
            <td>urbantouch@gmail.com</td>
          </tr>
          <tr>
            <td><i class="fas fa-phone-alt"></i></td>
            <td>(+65) 1234 1234</td>
          </tr>
        </table>
      </div>
      <iframe width="400" height="330" frameborder="1"
        style="border:1px solid var(--global-color-primary-gray); border-radius:10px"
        src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDqkx_xHFEJAl3tVpoXVQfgyuXLPdOSN9o&q=20+Nanyang+Avenue"
        allowfullscreen>
      </iframe>
    </section>

  </div>
  <!-- Footer -->
  <?php include '../../../components/footer/php/index.php' ?>
</body>

</html>