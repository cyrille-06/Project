<?php
require_once '../Config/config.php';
require_once '../src/Models/Painting.php';
// pour verifier l'id de la peinture est dans l'url
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
// modele de painting
$paintingModel =  new Painting($pdo);

// pour supprimer une peinture 

$deleted = $paintingModel->delete($id);

if($deleted){
    // ce diriger vers la liste des peintures
    header('Location: paintings.php');
    exit;
}else{
    echo "error : unable to delete.";
}

} else{
    echo "Invalid painting";
}
