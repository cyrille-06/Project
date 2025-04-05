<?php
// ici fichiers nécessaires pour la base de données et le modèle Painting
require_once '../src/Models/Database.php';
require_once '../src/Models/Painting.php';

// Connexion à la base de données
$db = new Database();
$pdo = $db->getConnection();
$painting = new Painting($pdo);

// Récupération de l'ID de la peinture depuis l'URL
$id = $_GET['id'] ?? null;
if (!$id) {
    echo "Invalid ID.";
    exit(); // arrêt du script si aucun ID n'est fourni
}

// récupération des données actuelles de la peinture
$currentPainting = $painting->getById($id);
if (!$currentPainting) {
    echo "Painting not found.";
    exit(); // Arrêt si la peinture n'existe pas
}

// si le formulaire est soumis en POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // récupération des données du formulaire
    $title = $_POST['title'] ?? '';
    $year = $_POST['year'] ?? '';
    $artist_name = $_POST['artist_name'] ?? '';
    $width = $_POST['width'] ?? null;
    $height = $_POST['height'] ?? null;

    // vérification des champs 
    if (!empty($title) && !empty($year)) {
        // Mise à jour de la peinture
        $painting->update($id, $title, $year, $artist_name, $width, $height);
        header("Location: paintings.php"); // redirection après mise à jour
        exit();
    } else {
        $error = "title and year are required"; // meessage d'erreur si champs manquants
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Painting</title>
    <!-- Feuilles de styles et police -->
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <h2>Edit Painting</h2>

    <!-- Affichage d'une erreur si présente -->
    <?php if (!empty($error)) : ?>
        <p class="error"><?= $error ?></p>
    <?php endif; ?>

    <!-- Formulaire de mise à jour -->
    <form method="POST">
        <label>Title</label>
        <input type="text" name="title" value="<?= htmlspecialchars($currentPainting['title']) ?>" required>

        <label>Year:</label>
        <input type="number" name="year" value="<?= htmlspecialchars($currentPainting['year']) ?>" required>

        <label>Artist Name:</label>
        <input type="text" name="artist_name" value="<?= htmlspecialchars($currentPainting['artist_name']) ?>">

        <label>Width (cm):</label>
        <input type="number" step="0.01" name="width" value="<?= htmlspecialchars($currentPainting['width']) ?>">

        <label>Height (cm):</label>
        <input type="number" step="0.01" name="height" value="<?= htmlspecialchars($currentPainting['height']) ?>">

        <!-- Correction du texte du bouton -->
        <button type="submit">Update Painting</button>
    </form>

    <br>
    <a href="paintings.php">Back to Paintings</a>
</body>
</html>
