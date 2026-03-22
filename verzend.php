<?php
include('db.php');

// WEEK 8: Secure data handling using Prepared Statements
$v = $_POST['v_naam'];
$a = $_POST['a_naam'];
$e = $_POST['e_mail'];

// Prepare the statement
$stmt = $db->prepare("INSERT INTO new1 (Voornaam, Achternaam, Email) VALUES (?, ?, ?)");
// "sss" means three strings
$stmt->bind_param("sss", $v, $a, $e);

if($stmt->execute()) { 
    header("Location: index.php"); 
}
?>