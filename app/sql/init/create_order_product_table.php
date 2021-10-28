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

// sql to create table
$sql = "CREATE TABLE order_product (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
order_id INT(6) NOT NULL, 
product_id INT(6) NOT NULL
)";

if (mysqli_query($conn, $sql)) {
  echo "Table order_product created successfully";
} else {
  echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);