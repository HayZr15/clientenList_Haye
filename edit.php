<?php
include 'db.php';

// Check of er een ID is meegegeven
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM new1 WHERE StudentID = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cliënt Bewerken - KW1C</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Cliëntgegevens Aanpassen</h4>
                </div>
                <div class="card-body">
                    <form action="update.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $row['StudentID']; ?>">
                        
                        <div class="mb-3">
                            <label class="form-label">Voornaam</label>
                            <input type="text" name="voornaam" class="form-control" value="<?php echo $row['Voornaam']; ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tussenvoegsel</label>
                            <input type="text" name="tussenvoegsel" class="form-control" value="<?php echo $row['Tussenvoegsel']; ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Achternaam</label>
                            <input type="text" name="achternaam" class="form-control" value="<?php echo $row['Achternaam']; ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">E-mailadres</label>
                            <input type="email" name="email" class="form-control" value="<?php echo $row['Email']; ?>" required>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-success">Wijzigingen Opslaan</button>
                            <a href="index.php" class="btn btn-secondary">Annuleren</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>