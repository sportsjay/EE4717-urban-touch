<html>

<body>
  <nav class="global-content-wrapper global-flex-row-wrapper">
    <a href="../../../pages/home/php/index.php">
      <div><img src="../../../../assets/images/icon.png" /></div>
    </a>
    <section class="global-flex-row-wrapper">
      <a href="../../../pages/shop-page/php/index.php" class="global-content-typography-text"><span>Shop</span></a>
      <a href="../../../pages/about-us/php/index.php" class="global-content-typography-text"><span>About Us</span></a>
      <a href="../../../pages/support-page/php/index.php"
        class="global-content-typotextubtitle"><span>Support</span></a>
      <a href="#" onclick="onOpenSearchPanel()" class="global-content-typotextubtitle"><span><i
            class="fas fa-search"></i></span></a>
      <a href="../../../pages/cart-page/php/index.php" class="global-content-typotextubtitle"><span><i
            class="fas fa-shopping-cart"></i></span></a>
    </section>
  </nav>
  <!-- Search panel -->
  <section id="search-panel" class="search-panel global-flex-column-wrapper">
    <form class="global-flex-row-wrapper search-panel__header" action="" method="POST">
      <i class="fas fa-arrow-circle-right search-panel__close-btn" onclick="onCloseSearchPanel()"></i>
      <input type="text" name="search" placeholder="Search a product name..." style="flex: 1">
      <input type="submit" name="submit" value="search" class="global-button-secondary">
    </form>
    <?php
    $searchQuery = $_POST['search'];
    $products = getProductsBySearch($searchQuery);

    foreach ($products as $_product) {
      /**
       * Add Design Here...
       */
      echo $_product['prod_name'];
    }

    ?>
  </section>
  <script>
  function onOpenSearchPanel() {
    let searchPanel = document.getElementById('search-panel');
    console.log(...searchPanel.style)
    searchPanel.style.visibility = '';
  }

  function onCloseSearchPanel() {
    let searchPanel = document.getElementById('search-panel');
    searchPanel.style.visibility = 'hidden';
  }
  </script>
</body>

</html>