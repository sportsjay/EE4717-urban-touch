<body>
  <?php
  session_start();
  // session_unset();
  ?>
  <nav class="global-content-wrapper global-flex-row-wrapper">
    <a href="../../../pages/home/php/index.php">
      <div><img src="../../../../assets/images/icon.png" /></div>
    </a>
    <section style="position:relative" class="global-flex-row-wrapper">
      <a id="Shop" href="../../../pages/shop-page/php/index.php"
        class="global-content-typography-text"><span>Shop</span></a>
      <a id="About Us" href="../../../pages/about-us/php/index.php" class="global-content-typography-text"><span>About
          Us</span></a>
      <a id="Contact Us" href="../../../pages/support-page/php/index.php"
        class="global-content-typography-text"><span>Contact Us</span></a>

      <!-- Profile Popup -->
      <a id="Profile" onmouseout="removeProfilePopup()" onmouseover="displayProfilePopup()"
        class="global-content-typography-subtitle"><span><i class="fas fa-user-alt"></i></span></a>
      <div onmouseout="removeProfilePopup()" onmouseover="displayProfilePopup()" id="profile-popup"
        class="popup-dialog-box global-content-typography-subtext global-flex-column-wrapper">
        <span class="global-content-typography-subtext cart-modal-header">WELCOME<?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
                                                                                    echo ", " . $_SESSION["username"];
                                                                                  }
                                                                                  ?>
        </span>
        <span class="global-flex-column-wrapper cart-modal-content">
          <?php
          if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
            echo '<a href="../../../pages/login-page/php/logout.php">LOG OUT</a>';
          } else {
            echo '<a href="../../../pages/login-page/php/index.php">LOG IN</a><br>';
            echo '<a href="../../../pages/signup-page/php/index.php">SIGN UP</a>';
          }
          ?>

        </span>
      </div>

      <!-- Search Popup -->
      <a onclick="onOpenSearchPanel()" class="global-content-typography-subtitle"><span><i
            class="fas fa-search"></i></span></a>

      <!-- Cart Popup -->
      <a id="Cart" onmouseout="removeCartPopup()" onmouseover="displayCartPopup()"
        href="../../../pages/cart-page/php/index.php"
        class="hover-for-popup global-content-typography-subtitle"><span><i class="fas fa-shopping-cart"></i></span></a>
      <div onmouseout="removeCartPopup()" onmouseover="displayCartPopup()" id="cart-popup"
        class="popup-dialog-box global-content-typography-subtext global-flex-column-wrapper">
        <span class="global-content-typography-subtext cart-modal-header">MY
          BAG, <?php echo (count($_SESSION["product_id"]) - 1) < 0 ? 0 : count($_SESSION["product_id"]) - 1 ?>
          ITEMS</span>
        <span class="global-flex-column-wrapper cart-modal-content">
          <?php
          foreach ($_SESSION['product_id'] as $id) {
            $product = getProduct($id);
            foreach ($product as $_product) {
              $name =  $_product['prod_name'];
              $price = $_product['price'];
              $brand = $_product['brand'];
              $category = $_product['cat_name'];
              $gender = $_product['gender'];
              $sale_status = $_product['sale_status'];
              echo "
            <a href='../../../pages/product-page/php/index.php?product-id=$id' id='order$id' class='order-wrapper global-flex-row-wrapper'>
              <div class='product-img'><img src='../../../../assets/images/product_images/prodimg_$id.jpg' /></div>
              <div class='detail-wrapper global-flex-column-wrapper' style='flex:1'>";
              if ($sale_status == 0) {
                echo "<span class='global-content-typography-subtext'><b>SGD </b><b>$price</b></span>";
              } else {
                $price = 0.75 * $price;
                echo "<span class='global-content-typography-subtext price-after-sale'><b>SGD </b><b>$price</b></span>";
              }
              echo "
                <span class='global-content-typography-subtext'>$brand - $name</span>
                <br>
                <div class='global-flex-row-wrapper bottom-section'>
                  <span class='global-content-typography-subtext'>$category</span>
                  <span class='global-content-typography-subtext'>&#65372;</span>
                  <span class='global-content-typography-subtext'>$gender</span>
                </div>
              </div>
            </a>
            <hr id='separator$id' class='global-horizontal-line separator-line' width='100%'>
            ";
            }
          }
          ?>
        </span>
        <span class="button-container">
          <button onclick="redirectToCart()" class="global-button">GO TO CART</button>
        </span>
      </div>
    </section>
  </nav>
  <section <?php echo (count($_POST['search'])) == 0 ? "style='visibility: hidden; opacity: 0;'" : '' ?>
    id="search-panel" class="search-panel-wrapper">
    <div onclick="onCloseSearchPanel()" style="min-height: 100vh; min-width:100vw; position: absolute; top:0; left:0;  background-color: white;
  opacity: 0.7; filter: brightness(0.2); z-index:1;">
    </div>
    <div class="search-panel global-flex-column-wrapper">
      <form class="global-flex-row-wrapper search-panel__header" action="" method="POST">
        <i class="global-content-typography-title fas fa-arrow-circle-right search-panel__close-btn"
          onclick="onCloseSearchPanel()"></i>
        <input class="global-content-typography-text" type="text" name="search" placeholder="Type a product name..."
          style="flex: 1">
        <input type="submit" name="submit" value="Search" class="global-button-secondary">
      </form>
      <?php
      $searchQuery = $_POST['search'];
      $products = getProductsBySearch($searchQuery);


      if (count($_POST['search']) != 0) {
        $idx = 0;
        echo "<span class='global-content-typography-subtext'>Total ";
        foreach ($products as $_product) {
          $idx++;
        }
        echo $idx . " result(s)</span>";
      }

      foreach ($products as $_product) {
        $id = $_product['prod_id'];
        $name =  $_product['prod_name'];
        $price = $_product['price'];
        $brand = $_product['brand'];
        $category = $_product['cat_name'];
        $gender = $_product['gender'];
        $sale_status = $_product['sale_status'];
        echo "
            <a href='../../../pages/product-page/php/index.php?product-id=$id' id='order$id' class='order-wrapper global-flex-row-wrapper'>
              <div class='product-img'><img src='../../../../assets/images/product_images/prodimg_$id.jpg' /></div>
              <div class='detail-wrapper global-flex-column-wrapper' style='flex:1'>";
        if ($sale_status == 0) {
          echo "<span class='global-content-typography-subtext'><b>SGD </b><b>$price</b></span>";
        } else {
          $price = 0.75 * $price;
          echo "<span class='global-content-typography-subtext price-after-sale'><b>SGD </b><b>$price</b></span>";
        }
        echo
        "
            <span class='global-content-typography-subtext'>$brand - $name</span>
            <br>
            <div class='global-flex-row-wrapper bottom-section'>
              <span class='global-content-typography-subtext'>$category</span>
              <span class='global-content-typography-subtext'>&#65372;</span>
              <span class='global-content-typography-subtext'>$gender</span>
            </div>
          </div>
        </a>
        <hr class=' global-horizontal-line separator-line' width='100%'>
        ";
      }

      ?>
    </div>
  </section>

  <script>
  document.addEventListener(
    "DOMContentLoaded",
    function() {
      currentActiveLink();
    },
    false
  );

  function currentActiveLink() {
    var currentLocation = document.title;
    document.getElementById(currentLocation).classList.add("active");
  }

  function displayCartPopup() {
    if (document.title != "Cart") {
      var component = document.getElementById("cart-popup");
      component.style.visibility = "visible";
      component.style.opacity = 1;
    }
  }

  function removeCartPopup() {
    var component = document.getElementById("cart-popup");
    component.style.visibility = "hidden";
    component.style.opacity = 0;
  }

  function displayProfilePopup() {
    var component = document.getElementById("profile-popup");
    component.style.visibility = "visible";
    component.style.opacity = 1;
  }

  function removeProfilePopup() {
    var component = document.getElementById("profile-popup");
    component.style.visibility = "hidden";
    component.style.opacity = 0;
  }

  function onOpenSearchPanel() {
    let searchPanel = document.getElementById('search-panel');
    searchPanel.style.visibility = 'visible';
    searchPanel.style.opacity = 1;
  }

  function onCloseSearchPanel() {
    let searchPanel = document.getElementById('search-panel');
    searchPanel.style.visibility = 'hidden';
    searchPanel.style.opacity = 0;
  }

  function redirectToCart() {
    window.location.href = '../../../pages/cart-page/php/index.php';
  }

  // prevent form re-submission popup
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
  </script>
</body>