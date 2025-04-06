<?php
// Inclusion des classes nécessaires pour la base de données et la gestion des peintures
require_once '../src/Models/Database.php';
require_once '../src/Models/Painting.php';

// Création d'une instance de connexion à la base de données
$db = new Database();
$pdo = $db->getConnection();

// Création d'une instance de l'objet Painting avec la connexion PDO
$painting = new Painting($pdo);

// Vérifie si le formulaire a été soumis en POST
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Récupération des données du formulaire avec des valeurs par défaut vides
    $title = $_POST['title'] ?? '';
    $year = $_POST['year'] ?? '';
    $artist_name = $_POST['artist_name'] ?? '';
    $width = $_POST['width'] ?? '';
    $height = $_POST['height'] ?? '';
}

// Si les champs obligatoires sont remplis, on crée la peinture
if (!empty($title) && !empty($year)) {
    // Appel à la méthode create() pour insérer une nouvelle peinture en base
    $painting->create($title, $year, $artist_name, $width, $height);
    
    // Redirection vers la liste des peintures après l'ajout
    header("Location: paintings.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Painting</title>
        <!-- Inclusion de la feuille de styles principale -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>

    <!-- Titre de la page -->
    <h2>Add a New Painting</h2>

    <!-- Formulaire pour ajouter une nouvelle peinture -->
    <form action="create_painting.php" method="POST">

        <!-- Champ pour le titre -->
        <label>Title:</label>
        <input type="text" name="title" required>

        <!-- Champ pour l'année  -->
        <label>Year:</label>
        <input type="number" name="year" required>

        <!-- Champ pour le nom de l'artiste -->
        <label>Artist Name:</label>
        <input type="text" name="artist_name">

        <!-- Champ pour la largeur en cm  -->
        <label>Width (cm):</label>
        <input type="number" step="0.01" name="width">

        <!-- Champ pour la hauteur en cm -->
        <label>Height (cm):</label>
        <input type="number" step="0.01" name="height">

        <!-- Bouton de soumission -->
        <button type="submit">Add Painting</button>
    </form>

    <br>

    <!-- Lien de retour vers la liste des peintures -->
    <a href="paintings.php">Back to Paintings List</a>

</body>
</html>
