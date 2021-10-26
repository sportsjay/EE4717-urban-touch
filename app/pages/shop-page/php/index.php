<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/index.css" />
  <title>Shop</title>
</head>
<?php include '../../../utils/connectDB.php' ?>

<body>
  <!-- Navigation -->
  <?php include '../../../components/navigation/php/index.php' ?>
  <!-- Banner -->
  <header></header>
  <!-- Body -->
  <div class="content global-flex-row-wrapper global-padding-horizontal">
    <div class="utilities-wrapper global-flex-column-wrapper">test
      <section class="filter-wrapper"></section>
      <section class="recommendation-wrapper"></section>
    </div>
    <div class="product-list"></div>
  </div>
  <!-- Footer -->
  <?php include '../../../components/footer/php/index.php' ?>
</body>

</html>