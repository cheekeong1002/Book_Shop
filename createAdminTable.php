<?php
$servername = "localhost";
$username = "root";
$password = "";
$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS book_store_db";
if ($conn->query($sql) === FALSE) 
    echo "Error creating database: " . $conn->error;

$dbName = "book_store_db";
$conn = new mysqli($servername, $username, $password, $dbName);
if ($conn->connect_error){
    echo("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS admin_acc_details (
    username VARCHAR(30) PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    privilege VARCHAR(10) NOT NULL
    )";

if ($conn->query($sql) === False) 
    echo "Error creating table: " . $conn->error;

$conn->close();
?>