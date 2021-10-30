<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/index.css" />
  <title>Product</title>
  <script src="https://kit.fontawesome.com/f8c6106aef.js" crossorigin="anonymous"></script>

</head>
<?php include '../../../sql/query/get_product.php' ?>
<?php
$product_id = $_GET['product-id'];
echo $product_id;
$product = getProduct($product_id)
?>

<body>
  <!-- Navigation -->
  <?php include '../../../components/navigation/php/index.php' ?>
  <!-- Banner -->
  <header></header>
  <!-- Body -->
  <div class="product-page global-content-wrapper global-flex-column-wrapper">
    <div class="product-component global-flex-row-wrapper">
      <div class="left-section">
        <img src="../../../../assets/images/founder.png">
      </div>
      <div class="right-section global-flex-column-wrapper">
        <span class="global-content-typography-text">Brand</span>
        <span class="global-content-typography-subtitle">Product name</span>
        <br>
        <span class="global-content-typography-text">SGD$ 42.00</span>
        <div class="description global-flex-column-wrapper">

          - Short sleeve tee with brand logo
          - Round neckline
          - Regular fit
          - Slip on style
          - Cotton

        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <?php include '../../../components/footer/php/index.php' ?>
</body>

</html>