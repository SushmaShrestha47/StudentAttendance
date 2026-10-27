<?php
// Database Connection

$servername = "localhost";
$username = "root";
$password = "";
$database = "attendance_db";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Uncomment the line below to test the connection
// echo "Connected successfully";
?>