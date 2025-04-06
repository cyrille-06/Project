<?php
require_once '../Config/config.php';
require_once '../src/Models/Painting.php';
require_once '../src/Models/Warehouse.php';

// Si le formulaire est soumis via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['painting_id']) && isset($_POST['warehouse_id'])) {
        $painting_id = $_POST['painting_id'];
        $warehouse_id = $_POST['warehouse_id'];

        // Vérifier si la peinture est déjà assignée à cet entrepôt
        $stmt = $pdo->prepare('SELECT * FROM storage WHERE id_painting = :painting_id AND id_warehouse = :warehouse_id');
        $stmt->execute([':painting_id' => $painting_id, ':warehouse_id' => $warehouse_id]);

        // Si la combinaison existe déjà, afficher un message d'erreur
        if ($stmt->rowCount() > 0) {
            echo "This painting is already assigned to the selected warehouse.";
        } else {
            // Si elle n'existe pas, procéder à l'insertion
            $stmt = $pdo->prepare('INSERT INTO storage (id_painting, id_warehouse) VALUES (:painting_id, :warehouse_id)');
            $stmt->execute([':painting_id' => $painting_id, ':warehouse_id' => $warehouse_id]);

            echo "Painting successfully assigned to warehouse!";
        }
    } else {
        echo "Invalid parameters.";
    }
}

// Récupérer la liste des peintures
$paintings = $pdo->query('SELECT * FROM paintings')->fetchAll();
$warehouses = $pdo->query('SELECT * FROM warehouses')->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assign Painting to Warehouse</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
</head>
<body>
    <h1>Assign Painting to Warehouse</h1>
    <form action="assign_painting.php" method="POST">
        <!-- Liste déroulante pour choisir la peinture -->
        <label for="painting_id">Select Painting:</label>
        <select name="painting_id" id="painting_id" required>
            <?php foreach ($paintings as $painting): ?>
                <option value="<?= $painting['id_painting'] ?>"><?= htmlspecialchars($painting['title']) ?> (<?= $painting['year'] ?>)</option>
            <?php endforeach; ?>
        </select>

        <!-- Liste déroulante pour choisir l'entrepôt -->
        <label for="warehouse_id">Select Warehouse:</label>
        <select name="warehouse_id" id="warehouse_id" required>
            <?php foreach ($warehouses as $warehouse): ?>
                <option value="<?= $warehouse['id_warehouse'] ?>"><?= htmlspecialchars($warehouse['name']) ?> (<?= htmlspecialchars($warehouse['address']) ?>)</option>
            <?php endforeach; ?>
        </select>

        <!-- Bouton pour soumettre le formulaire -->
        <button type="submit">Assign</button>
        <a href="warehouses.php">Back to Warehouse List</a>
    </form>
</body>
</html>
