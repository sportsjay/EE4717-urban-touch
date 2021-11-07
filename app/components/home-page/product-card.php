<?php
function createCardHome($id, $brand, $name, $price, $sale_status)
{
  echo "
  <a href='../../../pages/product-page/php/index.php?product-id=$id' class='global-flex-column-wrapper product-wrapper hover-transition hover-animation'>
    <div class='image-container'><img src='../../../../assets/images/product_images/prodimg_$id.jpg' /></div>
    <div class='card-content global-flex-column-wrapper'>
      <span class='global-content-typography-text'><b  style='text-transform:uppercase'>$brand</b></span>
      <span style='margin-bottom: 15px' class='global-content-typography-subtext'>$name</span>
      ";
  if ($sale_status == 0) {
    echo "<span class='global-content-typography-text'><b>SGD $price</b></span>";
  } else {
    $price_sale = 0.75 * $price;
    echo "<span class='global-content-typography-text price-after-sale'><b>SGD $price_sale</b></span>";
  }
  echo "
    </div>
  </a>
  ";
}