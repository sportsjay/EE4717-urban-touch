<?php
include "./get_product.php";

$servername = "localhost";
$username = "f32ee";
$password = "f32ee";
$dbname = "f32ee";
session_start();
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

/**
 * Parse id list into array of id
 */
$ids = $_POST['id_list'];
$list_id = explode(",", $ids);

if (count($list_id) > 1) {
  /**
   * Insert new order
   */
  function randomString()
  {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randstring = '';
    for ($i = 0; $i < 10; $i++) {
      $randstring .= $characters[rand(0, strlen($characters))];
    }
    return $randstring;
  }

  $order_code = randomString();
  $insert_order_query = 'INSERT INTO orders (order_code) VALUES ("' . $order_code . '");';

  if (mysqli_query($conn, $insert_order_query)) {
    /**
     * retrieve queried id and store it to $last_id
     */
    $last_id = mysqli_insert_id($conn);
  } else {
    echo "Error: " . $insert_order_query . "<br>" . mysqli_error($conn);
  }
  echo $insert_order_query . '<br>';
  /**
   * Insert order-products
   */
  $insert_order_product_query = '';
  foreach ($list_id as $product_id) {
    /**
     * Create relation for order-product to order table
     * by adding order_id = $last_id
     */
    if ($product_id)
      $insert_order_product_query .= "INSERT INTO order_product (order_id, product_id)
VALUES (" . $last_id . "," . $product_id . ");";
  }
  echo $insert_order_product_query . '<br>';
  if (mysqli_multi_query($conn, $insert_order_product_query)) {
    echo "New orders created successfully <br>";

    /**
     * Email
     */
    $create_message = "Thank you for ordering in Urban Touch, you can refer to your order using this order code: " . $order_code;

    $to = 'f32ee@localhost';
    $subject = 'Order Confirmation';
    $message = $create_message;
    $headers = 'From: f32ee@localhost' . "\r\n" .
      'Reply-To: f32ee@localhost' . "\r\n" .
      'X-Mailer: PHP/' . phpversion();
    mail(
      $to,
      $subject,
      $message,
      $headers,
      '-ff32ee@localhost'
    );
    echo ("mail sent to : " . $to);

    // Reset cart list after enter
    $_SESSION['product_id'] = [];
  } else {
    echo "Error: " . $insert_order_product_query . "<br>" . mysqli_error($conn);
  }
} else {
  echo "Not sufficient in cart";
}