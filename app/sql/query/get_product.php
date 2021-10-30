<?php
$servername = "localhost";
$username = "f32ee";
$password = "f32ee";
$dbname = "f32ee";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

function getProduct($id)
{
  global $conn;

  $sql = "SELECT product.id as prod_id, product.name as prod_name, brand, price, gender, rating, sale_status, category.name as cat_name FROM product JOIN category ON category.id=product.category_id
    WHERE product.id=" . $id;
  $result = mysqli_query($conn, $sql);

  if (mysqli_error($conn)) {
    return mysqli_error($conn);
  } else if (mysqli_num_rows($result) > 0) {
    return $result;
  } else {
    return "0 results";
  }

  mysqli_close($conn);
}

function getProducts($n)
{
  global $conn;

  $sql = "SELECT product.id as prod_id, product.name as prod_name, price, gender, rating, sale_status, category.name as cat_name FROM product JOIN category ON category.id=product.category_id LIMIT " . $n;
  $result = mysqli_query($conn, $sql);

  if (mysqli_error($conn)) {
    return mysqli_error($conn);
  } else if (mysqli_num_rows($result) > 0) {
    return $result;
  } else {
    return "0 results";
  }
}

function getRandomProducts($n)
{
  global $conn;

  $sql = "SELECT product.id as prod_id, product.name as prod_name, price, gender, rating, sale_status, category.name as cat_name FROM product JOIN category ON category.id=product.category_id ORDER BY RAND() LIMIT " . $n;
  $result = mysqli_query($conn, $sql);
  if (mysqli_error($conn)) {
    return mysqli_error($conn);
  } else if (mysqli_num_rows($result) > 0) {
    return $result;
  } else {

    return "0 results";
  }

  mysqli_close($conn);
}