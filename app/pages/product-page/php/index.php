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
        <?php
        $product_id = $_GET['product-id'];
        if ($product_id) {
          $product = getProduct($product_id);
          foreach ($product as $_product) {
            $prod_name =  $_product['prod_name'];
            $price = $_product['price'];
            $brand = $_product['brand'];
            $cat_name = $_product['cat_name'];
            echo "<span class='global-content-typography-text'>$brand</span>
            <span class='global-content-typography-subtitle'>$prod_name</span>
            <br>
            <span class='global-content-typography-text'>SGD$ $price</span>
           ";
          }
        } else
          echo "ID not found!"
        ?>
        <?php echo "<span class='global-content-typography-text'>$brand</span>"; ?>

      </div>
    </div>
  </div>
  <!-- Footer -->
  <?php include '../../../components/footer/php/index.php' ?>
</body>

</html>