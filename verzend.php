<?php
include('db.php');

// Only process the data if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Map POST data to variables
    $v = $_POST['v_naam'];
    $a = $_POST['a_naam'];
    $e = $_POST['e_mail'];

    // Prepare SQL statement using $conn
    $stmt = $conn->prepare("INSERT INTO new1 (Voornaam, Achternaam, Email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $v, $a, $e);

    // If successful, return to the overview page
    if($stmt->execute()) { 
        header("Location: index.php"); 
        exit();
    } else {
        echo "Error saving data: " . $conn->error;
    }
}
?>