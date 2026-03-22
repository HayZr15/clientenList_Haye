<?php
/* English comments for AVO English requirements */
// Connection details for XAMPP
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "websitedb_haye";

// Create the connection
$db = new mysqli($host, $user, $pass, $dbname);

// Check if the connection works
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>