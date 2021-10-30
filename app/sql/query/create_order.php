<?php
$servername = "localhost";
$username = "f32ee";
$password = "f32ee";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

/**
 * Parse id list into array of id
 */
$ids = $_POST['id_list'];
$list_id = explode(",", $ids);

if (count($list_id) > 0) {
  /**
   * Insert new order
   */
  function randomString()
  {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randstring = '';
    for ($i = 0; $i < 10; $i++) {
      $randstring = $characters[rand(0, strlen($characters))];
    }
    return $randstring;
  }

  $order_code = randomString();
  $insert_order_query = 'INSERT INTO orders (order_code) VALUES ("' . $order_code . '")';

  if (mysqli_query($conn, $insert_order_query)) {
    /**
     * retrieve queried id and store it to $last_id
     */
    $last_id = mysqli_insert_id($conn);
  } else {
    echo "Error: " . $insert_order_query . "<br>" . mysqli_error($conn);
  }

  /**
   * Insert order-products
   */
  $insert_order_product_query = '';
  foreach ($list_id as $product_id) {
    /**
     * Create relation for order-product to order table
     * by adding order_id = $last_id
     */
    $insert_order_product_query .= "INSERT INTO order_product (order_id, product_id)
VALUES ('" . $last_id . "','" . $product_id . ");";
  }

  if (mysqli_multi_query($conn, $insert_order_product_query)) {
    echo "New orders created successfully";
  } else {
    echo "Error: " . $insert_order_product_query . "<br>" . mysqli_error($conn);
  }
} else {
  echo "Not sufficient cart";
}