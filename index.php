<?php
// Step 1: Include the database connection file
include 'db.php'; 

// Step 2: Prepare the SQL query to fetch all clients
$sql = "SELECT * FROM new1";

// Step 3: Execute the query
$result = $conn->query($sql); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Management - KW1C</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Client Overview</h2>
        <a href="toevoegen.php" class="btn btn-primary">Add New Client</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Infix</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    // Step 4: Loop through all results and display them in the table
                    while($row = $result->fetch_assoc()): 
                    ?>
                    <tr>
                        <td><?php echo $row['StudentID']; ?></td>
                        <td><?php echo $row['Voornaam']; ?></td>
                        <td><?php echo isset($row['Tussenvoegsel']) ? $row['Tussenvoegsel'] : '-'; ?></td>
                        <td><?php echo $row['Achternaam']; ?></td>
                        <td><?php echo $row['Email']; ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $row['StudentID']; ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                            <a href="delete.php?id=<?php echo $row['StudentID']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this client?')">Delete</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>