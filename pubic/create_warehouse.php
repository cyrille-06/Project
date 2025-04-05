<?php
// Configuration et modèle Warehouse
require_once '../Config/config.php';
require_once '../src/Models/Warehouse.php';
require_once '../src/Models/Database.php'; 

// pour se connecter à la base de données
$dbInstance = new Database();
$db = $dbInstance->getConnection();
$warehouse = new Warehouse($pdo);

// Traitement de l'ajout d'entrepôt
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST)) {
        $stmt = $db->prepare('INSERT INTO warehouses (name, address) VALUES (?, ?)');
        $stmt->execute([
            $_POST['name'],
            $_POST['address']
        ]);
    }
}


// Vérifier si l'ID de l'entrepôt est dans l'URL et valide
if (isset($_GET['id']) && ctype_digit($_GET['id'])) {
    $id = (int) $_GET['id'];

    $warehouseModel = new Warehouse($pdo);

    // Supprimer l'entrepôt avec l'ID donné
    if ($warehouseModel->delete($id)) {
        // Redirection vers la liste des entrepôts
        header('Location: warehouse.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Warehouse</title>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.css">

</head>
<body>
<h2>
    Add a new warehouse
</h2>
<form action="create_warehouse.php"method="POST">
    <label>Name:</label>
    <input type="text" name="name" required>
    <label>Address:</label>
    <input type="text" name="address">
<button type="submit">Add warehouse</button>
    <br>
    <a href="warehouses.php"> Back to warehouses List </a>
</body>
</html>
