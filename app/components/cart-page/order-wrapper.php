<?php
session_start();
$index = $_POST["delete_product"];
if ($index) {
  if (($key = array_search($index, $_SESSION["product_id"])) !== false) {
    unset($_SESSION["product_id"][$key]);
  }
};

function createOrderCard($id, $name, $brand, $category, $price, $gender, $sale_status, $idx)
{
  echo "
  <a href='../../../pages/product-page/php/index.php?product-id=$id' id='order$idx' class='order-wrapper global-flex-row-wrapper'>
    <div class='product-img'><img src='../../../../assets/images/product_images/prodimg_$id.jpg' /></div>
    <div class='detail-wrapper global-flex-column-wrapper' style='flex:1'>";
  if ($sale_status == 0) {
    echo "<span class='global-content-typography-text'><b>SGD </b><b id='price$idx'>$price</b></span>";
  } else {
    $price = 0.75 * $price;
    echo "<span class='global-content-typography-text price-after-sale'><b>SGD </b><b id='price$idx'>$price</b></span>";
  }
  echo "
      <span class='global-content-typography-text'>$brand - $name</span>
      <br>
      <div class='global-flex-row-wrapper bottom-section'>
        <span class='global-content-typography-subtext'>Category:</span>
        <span class='global-content-typography-subtext'>$category</span>
        <br>
        <span class='global-content-typography-subtext'>&#65372;</span>
        <br>
        <span class='global-content-typography-subtext'>Gender:</span>
        <span class='global-content-typography-subtext'>$gender</span>
      </div>
    </div>
    <form style='cursor: initial' action='' method='POST'>
    <input type='text' name='delete_product' hidden value='$id'>
      <input onclick='calculateTotalPrice()' type='submit' class='delete-button' value='&#9587;'>
    </form>
  </a>
  <hr id='separator$id' class='global-horizontal-line separator-line' width='100%'>
  ";
}