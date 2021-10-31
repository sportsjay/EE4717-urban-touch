<?php
function createCardHome($id, $name, $price)
{
  return "
  <a href='../../../pages/product-page/php/index.php?product-id=$id' class='global-flex-column-wrapper product-wrapper'>
    <div class='image-container'>image</div>
    <div class='card-content global-flex-column-wrapper'>
      <span class='global-content-typography-text'>$name</span>
      <span class='global-content-typography-text'><b>SGD$ $price</b></span>
    </div>
  </a>
  ";
}