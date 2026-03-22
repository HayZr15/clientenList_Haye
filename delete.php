<?php
include('db.php');

// WEEK 8: Securely delete using Prepared Statements
$id = $_GET['id'];

$stmt = $db->prepare("DELETE FROM new1 WHERE StudentID = ?");
$stmt->bind_param("i", $id); // "i" means integer

if($stmt->execute()) {
    header("Location: index.php");
}
?>