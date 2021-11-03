<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/index.css" />
  <title>Cart</title>
  <script src="https://kit.fontawesome.com/f8c6106aef.js" crossorigin="anonymous"></script>
</head>

<body>
  <!-- Navigation -->
  <?php include '../../../components/navigation/php/index.php' ?>
  <?php include '../../../sql/query/get_product.php' ?>
  <?php include '../../../components/cart-page/order-wrapper.php' ?>
  <!-- Banner -->
  <header></header>
  <!-- Body -->
  <div class="cart-page global-content-wrapper global-flex-row-wrapper">
    <div class="left-section global-flex-column-wrapper">
      <span class="global-content-typography-title">MY SHOPPING CART</span>
      <hr class="global-horizontal-line" width="230px" style="margin-left: 0;">
      <br>
      <div class="order-container global-flex-column-wrapper">
        <?php
        session_start();
        $idx = 0;
        foreach ($_SESSION['product_id'] as $id) {
          $product = getProduct($id);
          foreach ($product as $_product) {
            $prod_name =  $_product['prod_name'];
            $price = $_product['price'];
            $brand = $_product['brand'];
            $cat_name = $_product['cat_name'];
            $gender = $_product['gender'];
            $sale_status = $_product['sale_status'];
            echo createOrderCard($id, $_product['prod_name'], $_product['brand'], $_product['cat_name'], $_product['price'], $_product['gender'], $idx);
          }
          $idx += 1;
        }
        ?>
      </div>
    </div>
    <div class="right-section global-flex-column-wrapper">
      <span class="global-content-typography-subtitle">SUMMARY</span>
      <hr class="global-horizontal-line" width="90px" style="margin-left: 0; border-width: 1px">
      <br>
      <span class="global-content-typography-text"><?php echo count($_SESSION["product_id"]) - 1 ?> PRODUCT(S)</span>
      <br>
      <table>
        <td>
          <span class="global-content-typography-text">Total Product Price</span>
        </td>
        <td>
          <span class="global-content-typography-text"><b id="total_prod_price">SGD 0</b></span>
        </td>
        </tr>
        <tr>
          <td>
            <span class="global-content-typography-text">Delivery Fee</span>
          </td>
          <td>
            <span class="global-content-typography-text"><b>SGD 12.00</b></span>
          </td>
        </tr>
        <tr>
          <td>
            <span class="global-content-typography-text">Tax (7% GST)</span>
          </td>
          <td>
            <span class="global-content-typography-text"><b id="gst_price">SGD 0</b></span>
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <hr class="global-horizontal-line" width="100%" style="border-width: 1px">
          </td>
        </tr>
        <tr>
          <td>
            <span class="global-content-typography-text">Grand Total
            </span>
          </td>
          <td>
            <span class="global-content-typography-text"><b id="grand_total">SGD 228</b></span>
          </td>
        </tr>
      </table>
      <br><br>

      <button onclick="openModal()" class="global-button">GO TO CHECKOUT</button>
    </div>
  </div>
  <div id="checkout-modal" class="checkout-modal global-flex-column-wrapper">
    <div style="min-height: 100vh; min-width:100vw; position: absolute; top:0; left:0;  background-color: aliceblue;
  opacity: 0.7; z-index:1;">
    </div>
    <form class="modal-item global-flex-column-wrapper" action="../../../sql/query/create_order.php" method="POST">
      <span onclick="closeModal()" style="cursor:pointer" class='global-content-typography-subtext'>&#9587;</span>
      <span class="global-content-typography-subtitle">CONFIRM TRANSACTION</span>
      <input type="text" hidden name="id_list" value="<?php
                                                      echo implode(',', $_SESSION['product_id']) ?>">
      <input type="submit" class="global-button" value="CONFIRM">
    </form>
  </div>
  <!-- Footer -->
  <?php include '../../../components/footer/php/index.php' ?>

  <script>
  document.addEventListener(
    "DOMContentLoaded",
    function() {
      calculateTotalPrice();
    },
    false);

  function closeModal() {
    document.getElementById("checkout-modal").style.visibility = "hidden";
  }

  function openModal() {
    document.getElementById("checkout-modal").style.visibility = "unset";
  }

  function calculateTotalPrice() {
    let totalPrice = 0
    for (let idx = 1; idx < <?php echo count($_SESSION['product_id'])  ?>; idx++) {
      totalPrice += parseInt(document.getElementById(`price${idx}`).innerHTML)
    }
    document.getElementById('total_prod_price').innerHTML = `SGD ${parseFloat(totalPrice).toFixed(2)}`;
    document.getElementById('gst_price').innerHTML = `SGD ${parseFloat(totalPrice*0.07).toFixed(2)}`;
    document.getElementById('grand_total').innerHTML =
      `SGD ${parseFloat(totalPrice + totalPrice*0.07 + 12).toFixed(2)}`;
  }

  // prevent form re-submission popup
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
  </script>
</body>

</html>