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

function getProduct(string $id)
{
  global $conn;

  $sql = "SELECT id, name, price, gender, rating, sale_status, category FROM product JOIN category ON category.id=product.category_id
    WHERE id=" . $id;
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    // while ($row = mysqli_fetch_assoc($result)) {
    //   echo "id: " . $row["id"] . " - Name: " . $row["firstname"] . " " . $row["lastname"] . "<br>";
    // }
    return mysqli_fetch_assoc($result);
  } else {
    return "0 results";
  }

  mysqli_close($conn);
}

function getproducts(int $n)
{
  global $conn;

  $sql = "SELECT id, name, price, gender, rating, sale_status LIMIT " . $n . " FROM product";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    // while ($row = mysqli_fetch_assoc($result)) {
    //   echo "id: " . $row["id"] . " - Name: " . $row["firstname"] . " " . $row["lastname"] . "<br>";
    // }
    return mysqli_fetch_assoc($result);
  } else {
    return "0 results";
  }

  mysqli_close($conn);
}

function getRandomProducts(int $n)
{
  global $conn;

  $sql = "SELECT id, name, price, gender, rating, sale_status ORDER BY RAND() LIMIT " . $n . " FROM product";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    // while ($row = mysqli_fetch_assoc($result)) {
    //   echo "id: " . $row["id"] . " - Name: " . $row["firstname"] . " " . $row["lastname"] . "<br>";
    // }
    return mysqli_fetch_assoc($result);
  } else {
    return "0 results";
  }

  mysqli_close($conn);
}