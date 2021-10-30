<?php
function createCardHome($id, $name, $price)
{
  return "
  <a href='../../../pages/product-page/php/index.php?product-id=$id' class='product-wrapper'>
    <div class='image-container'>image</div>
    <p class='global-content-typography-text'>$name</p>
    <p class='global-content-typography-text'><b>SGD$ $price</b></p>
  </a>
  ";
}