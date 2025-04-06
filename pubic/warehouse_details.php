<?php

// Inclusion des fichiers nécessaires
require_once '../src/Models/Database.php'; // Fichier pour la connexion à la base de données
require_once '../Config/config.php'; // Fichier de configuration des paramètres 
require_once '../src/Models/Warehouse.php'; // Classe Warehouse pour gérer les entrepôts
require_once '../src/Models/Painting.php'; // Classe Painting pour gérer les œuvres d'art

// Vérifie si l'ID de l'entrepôt est passé dans l'URL et est un nombre valide
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    // Si c'est valide, on récupère l'ID de l'entrepôt depuis l'URL
    $warehouse_id = $_GET['id'];

    // Crée une instance du modèle Warehouse pour récupérer les informations sur cet entrepôt
    $warehouseModel = new Warehouse($pdo);
    // Récupère les données de l'entrepôt à partir de l'ID
    $warehouse = $warehouseModel->getById($warehouse_id);

    // Crée une instance du modèle Painting pour obtenir les œuvres associées à cet entrepôt
    $paintingModel = new Painting($pdo);
    // Récupère toutes les œuvres qui sont dans l'entrepôt spécifié
    $paintings = $paintingModel->getPaintingsByWarehouse($warehouse_id);

} else {
    // Si l'ID n'est pas valide, affiche un message d'erreur
    echo "Invalid warehouse ID";
    exit(); // Arrête l'exécution du script
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warehouse Details</title>
    <link rel="stylesheet" href="assets/css/styles.css"> <!-- Lien vers le fichier CSS -->

    <!-- Importation de la police Lato depuis Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
</head>
<body>
    <h1>Details for Warehouse: <?= htmlspecialchars($warehouse['name']) ?></h1> <!-- Affiche le nom de l'entrepôt -->
    <h2>Paintings in this Warehouse:</h2> <!-- Titre de la liste des œuvres -->

    <!-- Vérifie si des œuvres ont été trouvées pour cet entrepôt -->
    <?php if (isset($paintings) && is_array($paintings) && count($paintings) > 0): ?>
        <!-- Si oui, les afficher dans une liste -->
        <ul>
            <?php foreach ($paintings as $painting): ?>
                <li>
                    <?= htmlspecialchars($painting['title'] ?? 'No title') ?> <!-- Affiche le titre de l'œuvre -->
                    (<?= htmlspecialchars($painting['year'] ?? 'Unknown year') ?>) <!-- Affiche l'année de l'œuvre -->
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <!-- Si aucune œuvre n'est trouvée, afficher un message -->
        <p>No paintings found in this warehouse.</p>
    <?php endif; ?>

    <!-- Lien pour retourner à la liste des entrepôts -->
    <a href="warehouses.php">Back to Warehouse List</a>
</body>
</html>
