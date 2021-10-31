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

/**
 * ### Get product based on product ID
 * 
 * @param int $id
 * @return string[]|string|null|false
 */
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

/**
 * ### Get n-number of products 
 * 
 * @param int $n
 * @return string[]|string|null|false
 */
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

/**
 * ### Get n-number of random products 
 * 
 * @param int $n
 * @return string[]|string|null|false
 */
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

/**
 * ### Get n-number of random products by brand
 * 
 * @param string $n 
 * @param string $brand
 * @return string[]|string|null|false
 */
function getRandomProductByBrand($n = 3, $brand = "")
{
  global $conn;

  $sql = "SELECT product.id as prod_id, product.name as prod_name, price, gender, rating, sale_status, category.name as cat_name FROM product JOIN category ON category.id=product.category_id";
  if ($brand) $sql .= " WHERE brand=" . "'" . $brand . "'";
  $sql .=  " ORDER BY RAND() LIMIT " . $n;

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

/**
 * ### Get n-number of random products by brand
 * 
 * @param string $n 
 * @param string $brand
 * @return string[]|string|null|false
 */
function getSaleProducts($n)
{
  global $conn;

  $sql = "SELECT product.id as prod_id, product.name as prod_name, price, gender, rating, sale_status, category.name as cat_name FROM product JOIN category ON category.id=product.category_id WHERE sale_status=TRUE";
  $sql .=  " ORDER BY RAND() LIMIT " . $n;

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