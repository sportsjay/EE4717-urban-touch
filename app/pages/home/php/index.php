<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/index.css" />
  <title>Home</title>
  <script src="https://kit.fontawesome.com/f8c6106aef.js" crossorigin="anonymous"></script>
  <script src="../script/index.js"></script>
</head>

<body>
  <!-- Navigation -->
  <?php include '../../../components/navigation/php/index.php' ?>
  <?php include '../../../components/home-page/product-card.php' ?>
  <?php require __DIR__ . '../../../../sql/query/get_product.php' ?>

  <!-- Banner -->
  <header class="banner">

    <!-- Slideshow container -->
    <div class="slideshow-container">

      <!-- Full-width images with number and caption text -->
      <div class="mySlides fade">
        <div class="numbertext">1 / 3</div>
        <img src="../../../../assets/images/banner1.jpg">
        <div class="text">
          <p class="global-content-typography-title">AVAILABLE STOREWIDE<br>FROM <span
              style="color:var(--global-color-primary-orange)">23 NOV</span></p>
          <p class="global-content-typography-subtitle">SAVE THE DATE!
          </p>
        </div>
      </div>

      <div class="mySlides fade">
        <div class="numbertext">2 / 3</div>
        <img src="../../../../assets/images/christmas.jpg">
        <div class="text">
          <p class="global-content-typography-title">Christmas Is Coming!<br>Holiday Gift
            <span style="color:var(--global-color-primary-orange)">SALE</span>
          </p>
          <p class="global-content-typography-subtitle">UP TO 50% OFF
          </p>
        </div>
      </div>

      <div class="mySlides fade">
        <div class="numbertext">3 / 3</div>
        <img src="../../../../assets/images/banner2.png">
        <div class="text">
          <p class="global-content-typography-title">Enjoy <span
              style="color:var(--global-color-primary-orange)">FREE</span> Shipping<br>On Your First Purchase!</p>
          <p class="global-content-typography-subtitle">USE THE PROMO CODE: <span
              style="color:var(--global-color-primary-orange)">DRESS2IMPRESS</span>
          </p>
        </div>
      </div>
    </div>
    <br>

    <!-- Next and previous buttons -->
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>

    <!-- The dots/circles -->
    <div style="text-align:center">
      <span class="dot" onclick="currentSlide(1)"></span>
      <span class="dot" onclick="currentSlide(2)"></span>
      <span class="dot" onclick="currentSlide(3)"></span>
    </div>

  </header>
  <!-- Body -->
  <div class="home content global-flex-column-wrapper global-padding-horizontal">
    <div class="global-flex-row-wrapper">
      <div class="global-flex-column-wrapper">
        <span class="global-content-typography-title">SEASONAL SALE</span>
        <hr class="global-horizontal-line" width="150px">
      </div>
      <div class="global-button">View More</div>
    </div>
    <section class="global-flex-row-wrapper product-list">

      <?php
      $result = getRandomProducts(5);
      if ($result) {
        foreach ($result as $product) {
          echo createCardHome($product['prod_id'], $product['prod_name'], $product['price']);
        }
      } else {
        echo "error:" . "<br>";
        echo mysqli_error($conn);
      }
      ?>
    </section>

    <div class="global-flex-row-wrapper">
      <div class="global-flex-column-wrapper">
        <span class="global-content-typography-title">MOST POPULAR</span>
        <hr class="global-horizontal-line" width="150px">
      </div>
      <div class="global-button">View More</div>
    </div>
    <section class="global-flex-row-wrapper product-list">
      <?php
      $result = getRandomProducts(5);
      if ($result) {
        $idx = 1;
        foreach ($result as $product) {
          echo "<span class='num-indicator'>0<br>" . $idx . "</span>";
          echo createCardHome($product['prod_id'], $product['prod_name'], $product['price']);
          $idx += 1;
        }
      } else {
        echo "error:" . "<br>";
        echo mysqli_error($conn);
      }
      ?>
    </section>

    <div class="global-flex-row-wrapper">
      <div class="global-flex-column-wrapper">
        <span class="global-content-typography-title">UNDER RETAIL</span>
        <hr class="global-horizontal-line" width="150px">
      </div>
      <div class="global-button">View More</div>
    </div>
    <section class="global-flex-row-wrapper product-list">
      <?php
      $result = getRandomProducts(8);
      if ($result) {
        foreach ($result as $product) {
          echo createCardHome($product['prod_id'], $product['prod_name'], $product['price']);
        }
      } else {
        echo "error:" . "<br>";
        echo mysqli_error($conn);
      }
      ?>
    </section>
    <span class="featured-brands global-content-typography-title">FEATURED BRANDS</span>
    <hr class="global-horizontal-line" width="160px">
    <section class="global-flex-row-wrapper brands-wrapper">
      <img src="../../../../assets/images/fossil.svg">
      <img src="../../../../assets/images/adidas.svg">
      <img src="../../../../assets/images/herschel.svg">
      <img src="../../../../assets/images/mango.svg">
      <img src="../../../../assets/images/timberland-logo.svg">
    </section>
  </div>
  <!-- Footer -->
  <?php include '../../../components/footer/php/index.php' ?>
</body>

</html>