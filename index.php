<?php 
include('db.php'); 

// Totaal aantal studenten ophalen voor het dashboard
$countResult = $db->query("SELECT COUNT(*) AS total FROM new1");
$countRow = $countResult->fetch_assoc();
$total = $countRow['total'];
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Studenten Administratie - Haye</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f4f7f6; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .card { border: none; border-radius: 8px; }
        .table thead { background-color: #e9ecef; }
        .stats-badge { background-color: #343a40; color: white; padding: 8px 15px; border-radius: 20px; font-weight: 600; }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold m-0">Studentenoverzicht</h2>
            <p class="text-muted">Beheer van ingeschreven studenten</p>
        </div>
        <div class="stats-badge">
            Totaal: <?php echo $total; ?> studenten
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4 mb-4">
            <div class="card shadow-sm p-4">
                <h5 class="card-title mb-3">Nieuwe inschrijving</h5>
                <form action="verzend.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Voornaam</label>
                        <input type="text" name="v_naam" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Achternaam</label>
                        <input type="text" name="a_naam" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">E-mailadres</label>
                        <input type="email" name="e_mail" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 fw-bold">Student Toevoegen</button>
                </form>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="table-responsive">
                    <table class="table table-hover m-0">
                        <thead>
                            <tr>
                                <th class="ps-4">ID</th>
                                <th>Naam</th>
                                <th>E-mail</th>
                                <th class="text-end pe-4">Acties</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $list = $db->query("SELECT * FROM new1 ORDER BY StudentID DESC");
                            while($row = $list->fetch_assoc()) {
                                echo "<tr>
                                        <td class='ps-4 text-muted'>#{$row['StudentID']}</td>
                                        <td class='fw-semibold'>{$row['Voornaam']} {$row['Achternaam']}</td>
                                        <td>{$row['Email']}</td>
                                        <td class='text-end pe-4'>
                                            <a href='edit.php?id={$row['StudentID']}' class='btn btn-sm btn-outline-dark me-1'>Bewerk</a>
                                            <a href='delete.php?id={$row['StudentID']}' class='btn btn-sm btn-outline-danger' onclick='return confirm(\"Weet je zeker dat je deze student wilt verwijderen?\")'>Verwijder</a>
                                        </td>
                                      </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>