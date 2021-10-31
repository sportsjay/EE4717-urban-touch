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
  <?php include '../../../components/cart-page/order-wrapper' ?>
  <!-- Banner -->
  <header></header>
  <!-- Body -->
  <div class="cart-page global-content-wrapper global-flex-row-wrapper">
    <div class="left-section global-flex-column-wrapper">
      <span class="global-content-typography-title">MY CART</span>
      <hr class="global-horizontal-line" width="100px" style="margin-left: 0;">
      <br>
      <div class="order-container global-flex-column-wrapper">
        <?php echo createOrderCard(1, "Name", "Brand", "Shoes", "20") ?>
        <?php echo createOrderCard(2, "Name", "Brand", "Shoes", "20") ?>
        <?php echo createOrderCard(3, "Name", "Brand", "Shoes", "20") ?>
      </div>
    </div>
    <div class="right-section global-flex-column-wrapper">
      <span class="global-content-typography-subtitle">SUMMARY</span>
      <hr class="global-horizontal-line" width="90px" style="margin-left: 0; border-width: 1px">
      <br>
      <span class="global-content-typography-text">4 PRODUCTS</span>
      <br>
      <table>
        <td>
          <span class="global-content-typography-text">Total Product Price</span>
        </td>
        <td>
          <span class="global-content-typography-text"><b>SGD$ 199</b></span>
        </td>
        </tr>
        <tr>
          <td>
            <span class="global-content-typography-text">Delivery Fee</span>
          </td>
          <td>
            <span class="global-content-typography-text"><b>SGD$ 28</b></span>
          </td>
        </tr>
        <tr>
          <td>
            <span class="global-content-typography-text">Tax (7% GST)</span>
          </td>
          <td>
            <span class="global-content-typography-text"><b>SGD$ 28</b></span>
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
            <span class="global-content-typography-text"><b>SGD$ 228</b></span>
          </td>
        </tr>
      </table>
      <br><br>
      <a class="global-button">GO TO CHECKOUT</a>
    </div>
  </div>
  <!-- Footer -->
  <?php include '../../../components/footer/php/index.php' ?>

  <script>
  function deleteEntry(orderId) {
    document.getElementById("order" + orderId).style.display = "none";
    document.getElementById("separator" + orderId).style.display = "none";
  }
  </script>
</body>

</html>