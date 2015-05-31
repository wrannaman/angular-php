<?php
include "connection.php";

if ($mysqli->query("CREATE TABLE Videos(
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL UNIQUE,
  category VARCHAR(255),
  length INT,
  rented BIT NOT NULL
)")) {
  echo "Table created successfully";
} else {
  echo "Already Created";
}

if ($mysqli->query("CREATE TABLE Users(
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL UNIQUE,
  email VARCHAR(255),
  password VARCHAR(255)
)")) {
  echo "Users created successfully";
} else {
  echo "Already Created User Table";
}

?>
