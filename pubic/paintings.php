<?php
// j'ai inclus le fichier de configuration pour établir la connexion à la base de données
require_once '../config/config.php';

// j'ai inclus le modèle Painting pour gérer les peintures
require_once '../src/Models/Painting.php';

// je crée une instance de la classe Painting avec la connexion à la base de données
$paintingModel = new Painting($pdo);

// ici c'est la récupération de toutes les peintures de la base de données via la méthode getAll()
$paintings = $paintingModel->getAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Paintings List</title>
    
    <!-- Lien vers la police Lato depuis Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <!-- Dupliqué: Lien vers une autre feuille de style CSS. Cette ligne peut être supprimée -->
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <!-- Titre principal de la page -->
    <h1>Paintings</h1>
    
    <!-- Lien vers la page de création d'une nouvelle peinture avec un bouton -->
    <a href="create_painting.php"><button>Add Painting</button></a>
    
    <!-- Tableau pour afficher la liste des peintures -->
    <table>
        <!-- En-tête du tableau avec les noms des colonnes -->
        <tr>
            <th>Title</th>
            <th>Year</th>
            <th>Artist</th>
            <th>Width</th>
            <th>Height</th>
        </tr>
        
        <!-- ici c'est la Boucle PHP pour afficher chaque peinture récupérée de la base de données -->
        <?php foreach ($paintings as $painting): ?>
        <tr>
            <!-- Affichage du titre de la peinture, sécurisé contre les attaques XSS -->
            <td><?= htmlspecialchars($painting['title']) ?></td>
            <!-- Affichage de l'année de la peinture -->
            <td><?= $painting['year'] ?></td>
            <!-- Affichage du nom de l'artiste -->
            <td><?= htmlspecialchars($painting['artist_name']) ?></td>
            <!-- Affichage de la largeur de la peinture  -->
            <td><?= $painting['width'] ?> cm</td>
            <!-- Affichage de la hauteur de la peinture -->
            <td><?= $painting['height'] ?> cm</td>
            <td>
                <!-- Lien pour modifier une peinture avec l'ID de la peinture -->
                <a href="edit_painting.php?id=<?= $painting['id_painting'] ?>"><button>Edit</button></a>
                <!-- Lien pour supprimer une peinture avec l'ID de la peinture, confirmation avant suppression -->
                <a href="delete_painting.php?id=<?= $painting['id_painting'] ?>" onclick="return confirm('Are you sure?')">
                    <button class="delete-btn">Delete</button>
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
