<?php
session_start();
$index = $_POST["delete_product"];
if ($index) {
  array_splice($_SESSION["product_id"], 1, $index);
};

function createOrderCard($id, $name, $brand, $category, $price, $gender, $idx)
{
  return "
  <div id='order$idx' class='order-wrapper global-flex-row-wrapper'>
    <div class='product-img'>image</div>
    <div class='detail-wrapper global-flex-column-wrapper' style='flex:1'>
      <span class='global-content-typography-text'><b>S$ </b><b id='price$idx'>$price</b></span>
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
    <form action='' method='POST'>
    <input type='text' name='delete_product' hidden value='$idx'>
      <input onclick='calculateTotalPrice()' type='submit' class='delete-button' value='&#9587;'>
    </form>
  </div>
  <hr id='separator$id' class='global-horizontal-line separator-line' width='100%'>
  ";
}
