<?php 

    
  $conn = new mysqli('localhost', 'root', '');

    
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }


    $sql = "CREATE DATABASE myDB";
    if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
    } else {
    echo "Error creating database: " . $conn->error;
    }


    $conn->close();
    echo "<br>";
    $conn = new mysqli('localhost', 'root', '', 'myDB');


if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}


$sql = "CREATE TABLE Users (
    Id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(30) NOT NULL,
    LastName VARCHAR(30) NOT NULL,
    PersonalNumber VARCHAR(30) NOT NULL UNIQUE,
    Email VARCHAR(50),
    Pass VARCHAR(1024),
    StatusId VARCHAR(50)
    )";


if ($conn->query($sql) === TRUE) {
    echo "Table Users created successfully";
  } else {
    echo "Error creating table: " . $conn->error;
  }
  echo "<br> <h1><a href='register.php'> next </a></h1>";
  $conn->close();

?>