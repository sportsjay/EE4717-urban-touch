<?php
function createCardHome($id, $brand, $name, $price)
{
  return "
  <a href='../../../pages/product-page/php/index.php?product-id=$id' class='global-flex-column-wrapper product-wrapper hover-transition hover-animation'>
    <div class='image-container'><img src='../../../../assets/images/product_images/prodimg_$id.jpg' /></div>
    <div class='card-content global-flex-column-wrapper'>
      <span class='global-content-typography-text'><b  style='text-transform:uppercase'>$brand</b></span><span style='margin-bottom: 15px' class='global-content-typography-subtext'>$name</span>
      <span class='global-content-typography-text'><b>SGD $price</b></span>
    </div>
  </a>
  ";
}