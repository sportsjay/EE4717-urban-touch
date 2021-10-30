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
$sql = "CREATE TABLE product (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
name VARCHAR(30) NOT NULL,
brand VARCHAR(64) NOT NULL,
price FLOAT NOT NULL,
gender VARCHAR(50) NOT NULL,
rating INT(6) NOT NULL DEFAULT 0,
sale_status BOOLEAN NOT NULL DEFAULT 0,
picture VARCHAR(64) DEFAULT '',
category_id INT(6) NOT NULL 
)";

if (mysqli_query($conn, $sql)) {
  echo "Table Product created successfully";
} else {
  echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);