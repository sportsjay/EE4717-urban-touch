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
<?php include '../../../components/home-page/product-card.php' ?>
<?php include '../../../sql/query/get_product.php' ?>
<?php

session_start();
// session_unset();
if (count($_SESSION["product_id"]) == 0) {
  $_SESSION["product_id"] = array(0);
}
$added_product_id = $_POST["product_id"];
if ($added_product_id > 0) {
  if (!array_search($added_product_id, $_SESSION["product_id"], TRUE)) array_push($_SESSION["product_id"], $added_product_id);
}
?>

<body>

  <!-- Navigation -->
  <?php include '../../../components/navigation/php/index.php' ?>
  <!-- Banner -->
  <header></header>
  <!-- Get the data of the product to display -->
  <?php
  $product_id = $_GET['product-id'];
  if ($product_id) {
    $product = getProduct($product_id);
    foreach ($product as $_product) {
      $prod_name =  $_product['prod_name'];
      $price = $_product['price'];
      $brand = $_product['brand'];
      $rating = $_product['rating'];
      $cat_name = $_product['cat_name'];
      $gender = $_product['gender'];
      $sale_status = $_product['sale_status'];
    }
  } else
    echo "ID not found!"
  ?>
  <div class="product-page global-content-wrapper global-flex-column-wrapper">
    <div class="product-wrapper global-flex-row-wrapper">
      <div class="left-section">
        <img src='../../../../assets/images/product_images/prodimg_<?php echo $product_id ?>.jpg' />
      </div>
      <div class="right-section global-flex-column-wrapper">
        <?php echo "<span style='text-transform:uppercase' class='global-content-typography-title'>$brand</span>"; ?>
        <hr class="global-horizontal-line" width="100%">
        <?php echo "<span class='global-content-typography-subtitle'>$prod_name</span>"; ?>
        <br><br>
        <?php
        if ($sale_status == 0) {
          echo "<span  class='global-content-typography-title'>SGD $price</span>";
        } else {
          $price_sale = 0.8 * $price;
          echo "<span class='global-content-typography-text price-before-sale'><b>SGD $price</b></span>";
          echo "<span class='global-content-typography-title price-after-sale'><b>NOW SGD $price_sale</b></span>";
        }
        ?>
        <br><br><br>
        <div class="global-flex-row-wrapper" style="gap: 20px">
          <div class="stars" style="--rating: <?php echo $rating ?>"></div><span class="global-content-typography-text"
            style="margin: auto 0 auto 0">8 reviews</span>
        </div>
        <br><br><br>
        <span style="margin-bottom: 10px;" class="global-content-typography-subtitle">PRODUCT DETAILS</span>
        <?php echo "<li><span class='global-content-typography-text'>Category: $cat_name</span></li>"; ?>
        <?php echo "<li><span class='global-content-typography-text'>Gender: $gender</span></li>"; ?>
        <br><br><br>
        <form action="" method="POST"><input type="submit"
            <?php echo array_search($_GET['product-id'], $_SESSION["product_id"], TRUE) ? 'disabled' : '' ?>
            value="<?php echo array_search($_GET['product-id'], $_SESSION["product_id"], TRUE) ? 'ITEM IS ALREADY ADDED' : 'ADD TO CART' ?>"
            class="global-button add-to-cart-btn"><input type="text" hidden name="product_id"
            value="<?php echo $product_id ?>"></form>
      </div>
    </div>
    <div class="recommendation-items global-flex-column-wrapper">
      <span class="global-content-typography-subtitle">PRODUCTS YOU MIGHT ALSO LIKE</span>
      <hr class="global-horizontal-line" width="170px">
      <span class="items-wrapper global-flex-row-wrapper">
        <?php
        $result = getRandomProductByBrand(3, $cat_name);
        if ($result) {
          foreach ($result as $product) {
            echo createCardHome($product['prod_id'], $product['brand'], $product['prod_name'], $product['price']);
          }
        }
        ?>
      </span>
    </div>
  </div>
  <!-- Footer -->
  <?php include '../../../components/footer/php/index.php' ?>
  <script>
  // prevent form re-submission popup
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
  </script>
</body>

</html>