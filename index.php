<?php
include 'db.php';
$sql = "SELECT * FROM new1"; // We houden 'new1' aan omdat je database tabel zo heet
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cliëntenbeheer - KW1C</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Cliëntenoverzicht</h2>
        <a href="toevoegen.php" class="btn btn-primary">Nieuwe Cliënt Toevoegen</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Voornaam</th>
                        <th>Tussenvoegsel</th>
                        <th>Achternaam</th>
                        <th>E-mail</th>
                        <th>Acties</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['StudentID']; ?></td>
                        <td><?php echo $row['Voornaam']; ?></td>
                        <td><?php echo $row['Tussenvoegsel']; ?></td>
                        <td><?php echo $row['Achternaam']; ?></td>
                        <td><?php echo $row['Email']; ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $row['StudentID']; ?>" class="btn btn-sm btn-outline-primary">Bewerk</a>
                            <a href="delete.php?id=<?php echo $row['StudentID']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Weet u zeker dat u deze cliënt wilt verwijderen?')">Wis</a>
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