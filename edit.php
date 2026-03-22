<?php
include('db.php');

$id = $_GET['id'];

// Get current data
$stmt = $db->prepare("SELECT * FROM new1 WHERE StudentID = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$s = $result->fetch_assoc();

// Update logic
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $v = $_POST['v_naam']; 
    $a = $_POST['a_naam']; 
    $e = $_POST['e_mail'];

    $update = $db->prepare("UPDATE new1 SET Voornaam=?, Achternaam=?, Email=? WHERE StudentID=?");
    $update->bind_param("sssi", $v, $a, $e, $id);
    
    if($update->execute()) {
        header("Location: index.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <div class="card p-4 shadow-sm">
        <h2>Edit Student Details</h2>
        <form method="POST">
            <input type="text" name="v_naam" class="form-control mb-2" value="<?php echo $s['Voornaam']; ?>" required>
            <input type="text" name="a_naam" class="form-control mb-2" value="<?php echo $s['Achternaam']; ?>" required>
            <input type="email" name="e_mail" class="form-control mb-2" value="<?php echo $s['Email']; ?>" required>
            <button type="submit" class="btn btn-warning w-100">Update Student</button>
            <a href="index.php" class="btn btn-link w-100 text-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>