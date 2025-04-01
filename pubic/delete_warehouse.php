<?php
// Inclure la configuration et le modèle Warehouse
require_once '../config/config.php';
require_once '../src/Models/Warehouse.php';

// Vérifier si l'ID de l'entrepôt est passé en paramètre dans l'URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    
    // Instancier le modèle Warehouse
    $warehouseModel = new Warehouse($pdo);
    
    // Supprimer l'entrepôt avec l'ID spécifié
    $deleted = $warehouseModel->delete($id);

    if ($deleted) {
        // Si l'entrepôt a été supprimé, rediriger vers la liste des entrepôts
        header('Location: warehouses.php');
        exit;
    } else {
        // Si une erreur s'est produite pendant la suppression
        echo "An error occurred while deleting the warehouse.";
    }
} else {
    // Si l'ID n'est pas valide ou absent
    echo "Invalid ID.";
}
?>
