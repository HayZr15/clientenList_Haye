<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "websitedb_haye";

// Establishing the connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>