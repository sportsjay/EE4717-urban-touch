<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/index.css" />
  <title>Shop</title>
  <script src="https://kit.fontawesome.com/f8c6106aef.js" crossorigin="anonymous"></script>

</head>
<?php include '../../../utils/connectDB.php' ?>

<body>
  <!-- Navigation -->
  <?php include '../../../components/navigation/php/index.php' ?>
  <!-- Banner -->
  <header></header>
  <!-- Body -->
  <div class="shop-page global-flex-row-wrapper global-padding-horizontal">
    <div class="utilities-wrapper global-flex-column-wrapper">
      <form action="" method="POST" onsubmit="return validateForm()">
        <section class="filter-wrapper global-flex-column-wrapper">

          <span class="global-content-typography-subtitle">FILTER</span>
          <hr class="global-horizontal-line" width="100%">
          <span class="global-content-typography-text form-subtitle">Price<span
              class="global-content-typography-subtext">(SGD):</span></span>

          <div class="form-items global-flex-row-wrapper">
            <label class="global-content-typography-text" for="price_low">Low:</label>
            <input class="global-content-typography-subtext" type="text" id="price_low" name="price_low" size="20">
          </div>
          <div class="form-items global-flex-row-wrapper">
            <label class="global-content-typography-text" for="price_high">High:</label>
            <input class="global-content-typography-subtext" type="text" id="price_high" name="price_high" size="20">
          </div>
          <br>

          <hr class="global-horizontal-line" width="100%">
          <span class="global-content-typography-text form-subtitle">Gender:</span>
          <div class="form-items global-flex-row-wrapper">
            <input type="checkbox" id="male" name="gender[]" value="Male">
            <label class="global-content-typography-text" for="male">Male</label>
          </div>
          <div class="form-items global-flex-row-wrapper">
            <input type="checkbox" id="female" name="gender[]" value="Female">
            <label class="global-content-typography-text" for="female">Female</label>
          </div>
          <br>

          <hr class="global-horizontal-line" width="100%">
          <span class="global-content-typography-text form-subtitle">Category:</span>
          <div class="form-items global-flex-row-wrapper">
            <input type="checkbox" id="clothing" name="category[]" value="Clothing">
            <label class="global-content-typography-text" for="clothing">Clothing</label>
          </div>
          <div class="form-items global-flex-row-wrapper">
            <input type="checkbox" id="shoe" name="category[]" value="Shoe">
            <label class="global-content-typography-text" for="shoe">Shoe</label>
          </div>
          <div class="form-items global-flex-row-wrapper">
            <input type="checkbox" id="pants" name="category[]" value="Pants">
            <label class="global-content-typography-text" for="pants">Pants</label>
          </div>
          <div class="form-items global-flex-row-wrapper">
            <input type="checkbox" id="bags" name="category[]" value="Bags">
            <label class="global-content-typography-text" for="bags">Bags</label>
          </div>
          <div class="form-items global-flex-row-wrapper">
            <input type="checkbox" id="watches" name="category[]" value="Watches">
            <label class="global-content-typography-text" for="watches">Watches</label>
          </div>
          <br>
          <span id="error-message" class="global-content-typography-subtext"
            style="color: var(--global-color-danger); display:none;">&#10060; Price
            must be in digits</span>
          <br>
          <input type="submit" name="SUBMIT" value="APPLY" class="global-button">
        </section>
      </form>
      <section class="recommendation-wrapper"></section>
    </div>
    <div class="product-list">test
    </div>
  </div>
  <!-- Footer -->
  <?php include '../../../components/footer/php/index.php' ?>

  <script>
  // for filter form
  let valid = 1;

  const priceLowForm = document.querySelector("input[name='price_low']");
  priceLowForm.addEventListener("input", (event) => {
    if (priceLowForm.value && (!validatePrice(event.target.value))) {
      priceLowForm.classList.add("input-danger");
      valid = 0;
    } else {
      priceLowForm.classList.remove("input-danger");
      valid = 1
    }
  });

  const priceHighForm = document.querySelector("input[name='price_high']");
  priceHighForm.addEventListener("input",
    (event) => {
      if (priceHighForm.value && (!validatePrice(event.target.value))) {
        priceHighForm.classList.add("input-danger");
        valid = 0;
      } else {
        priceHighForm.classList.remove("input-danger");
        valid = 1;
      }

    });

  function validatePrice(price) {
    let pattern = /^[0-9.]+$/;
    return pattern.test(price);
  }

  function validateForm() {
    if (valid == 0) {
      document.getElementById('error-message').style.display = "unset";
      return false;
    }
    return true;
  }
  </script>
</body>

</html>