<?php
// Inclusion des fichiers nécessaires
require_once '../src/Models/Database.php';
require_once '../src/Models/Warehouse.php';

// Connexion à la base de données
$db = new Database();
$pdo = $db->getConnection();
$warehouse = new Warehouse($pdo);

// Récupération de l'ID de l'entrepôt via la méthode GET
$id = $_GET['id'] ?? null;

if (!$id) {
    echo "Invalid ID.";
    exit(); // Arrêt du script si aucun ID n'est fourni
}

// Récupération des données actuelles de l'entrepôt
$currentWarehouse = $warehouse->getById($id);

if (!$currentWarehouse) {
    echo "Warehouse not found.";
    exit(); // Arrêt si aucun entrepôt n'est trouvé avec cet ID
}

// Traitement du formulaire si la méthode est POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des valeurs soumises
    $name = $_POST['name'] ?? '';
    $address = $_POST['address'] ?? '';

    // Vérification que le nom n'est pas vide
    if (!empty($name)) {
        // Mise à jour de l'entrepôt
        $warehouse->update($id, $name, $address);
        // Redirection vers la liste des entrepôts
        header("Location: warehouses.php");
        exit();
    } else {
        $error = "Name is required."; // message d'erreur si nom manquant
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Métadonnées HTML -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Warehouse</title>
    
    <!-- Police Lato + style CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <h2>Edit Warehouse</h2>

    <!-- Affichage de l'erreur si elle existe -->
    <?php if (!empty($error)) : ?>
        <p class="error"><?= $error ?></p>
    <?php endif; ?>

    <!-- Formulaire de modification de l'entrepôt -->
    <form method="POST">
        <label>Name:</label>
        <input type="text" name="name" value="<?= htmlspecialchars($currentWarehouse['name']) ?>" required>

        <label>Address:</label>
        <input type="text" name="address" value="<?= htmlspecialchars($currentWarehouse['address']) ?>">

        <button type="submit">Update Warehouse</button>
    </form>

    <br>
    <!-- Lien de retour vers la liste des entrepôts -->
    <a href="warehouses.php">Back to warehouses</a>
</body>
</html>
