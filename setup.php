<?php
// Connect to MySQL without specifying a database
$conn = new mysqli("localhost", "root", "");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create the 'ecommerce' database
$sql = "CREATE DATABASE IF NOT EXISTS ecommerce";
if ($conn->query($sql) === TRUE) {
    echo "Database 'ecommerce' created successfully.<br>";
} else {
    echo "Error creating database: " . $conn->error;
}

// Select the 'ecommerce' database
$conn->select_db("ecommerce");

// Create the 'users' table
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table 'users' created successfully.";
} else {
    echo "Error creating table: " . $conn->error;
}

// Close the connection
$conn->close();
?>
