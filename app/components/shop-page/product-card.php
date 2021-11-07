<?php
function createCard($id, $brand, $name, $category, $price, $sale_status)
{
  echo "
  <a href='../../../pages/product-page/php/index.php?product-id=$id' class='product-card
global-flex-column-wrapper'>
  <div class='image-container'><img src='../../../../assets/images/product_images/prodimg_$id.jpg' /></div>
  <div class='global-flex-column-wrapper' style='flex:1;'>
    <span class='global-content-typography-subtext'><b>$brand</b></span>
    <hr class='global-horizontal-line' width='100%'>
    <div class='global-flex-column-wrapper' style='flex:1; justify-content:space-between'>
      <span class='global-content-typography-subtext'>$name</span>
      <div class='lower-section global-flex-row-wrapper'>
        <span class=' global-content-typography-subtext'>$category</span>";
  if ($sale_status == 0) {
    echo "<span class='global-content-typography-subtext'><b>SGD $price</b></span>";
  } else {
    $price_sale = 0.75 * $price;
    echo "<span class='global-content-typography-subtext price-after-sale'><b>SGD $price_sale</b></span>";
  }
  echo "
      </div>
    </div>
  </div>
</a>
";
}