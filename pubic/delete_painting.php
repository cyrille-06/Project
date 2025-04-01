<?php
// Inclure la configuration et le modèle Painting
require_once '../config/config.php';
require_once '../src/Models/Painting.php';

// Vérifier si l'ID de la peinture est passé en paramètre dans l'URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    
    // Instancier le modèle Painting
    $paintingModel = new Painting($pdo);
    
    // Supprimer la peinture avec l'ID spécifié
    $deleted = $paintingModel->delete($id);

    if ($deleted) {
        // Si la peinture a été supprimée, rediriger vers la liste des peintures
        header('Location: paintings.php');
        exit;
    } else {
        // Si une erreur s'est produite pendant la suppression
        echo "An error occurred while deleting the painting.";
    }
} else {
    // Si l'ID n'est pas valide ou absent
    echo "Invalid ID.";
}
?>
