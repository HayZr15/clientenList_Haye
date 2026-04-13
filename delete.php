<?php
include('db.php');

// Check if an ID is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Use $conn instead of $db (database connection from db.php)
    $stmt = $conn->prepare("DELETE FROM new1 WHERE StudentID = ?");
    $stmt->bind_param("i", $id);

    // Execute the deletion and redirect to home
    if($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
?>