<?php
function createCard($id, $brand, $name, $category, $price)
{
  return "
  <a href='../../../pages/product-page/php/index.php?product-id=$id' class='product-card
global-flex-column-wrapper'>
  <div class='image-container'>image</div>
  <div class='global-flex-column-wrapper' style='flex:1;'>
    <span class='global-content-typography-subtext'><b>$brand</b></span>
    <hr class='global-horizontal-line' width='100%'>
    <div class='global-flex-column-wrapper' style='flex:1; justify-content:space-between'>
      <span class='global-content-typography-subtext'>$name</span>
      <div class='lower-section global-flex-row-wrapper'>
        <span class=' global-content-typography-subtext'>$category</span>
        <span class='global-content-typography-subtext'><b>SGD$ $price</b></span>
      </div>
    </div>
  </div>
</a>
";
}