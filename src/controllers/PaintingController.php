<?php

// D la classe PaintingController, qui gère les actions liées aux peintures
class PaintingController {
    
    // une propriété pour stocker l'objet du modèle Painting
    private $paintingModel;

    // Constructeur qui prend une connexion PDO et crée une instance du modèle Painting
    public function __construct($pdo) {
        // Création d'une instance de Painting, en passant la connexion PDO
        $this->paintingModel = new Painting($pdo);
    }

    // Méthode pour récupérer toutes les peintures
    public function showAll() {
        // Appelle la méthode getAll() du modèle Painting pour récupérer toutes les peintures
        return $this->paintingModel->getAll();
    }

    // Méthode pour créer une nouvelle peinture
    public function create($title, $year, $artist, $width, $height) {
        // Appelle la méthode add() du modèle Painting pour ajouter une peinture avec les informations passées en paramètre
        return $this->paintingModel->add($title, $year, $artist, $width, $height);
    }

    // Méthode pour obtenir une peinture spécifique en fonction de son identifiant
    public function edit($id) {
        // Appelle la méthode get() du modèle Painting pour récupérer une peinture spécifique par son ID
        return $this->paintingModel->get($id);
    }

    // Méthode pour mettre à jour une peinture existante
    public function update($id, $title, $year, $artist, $width, $height) {
        // Appelle la méthode update() du modèle Painting pour mettre à jour les informations d'une peinture
        return $this->paintingModel->update($id, $title, $year, $artist, $width, $height);
    }

    // Méthode pour supprimer une peinture
    public function delete($id) {
        // Appelle la méthode delete() du modèle Painting pour supprimer une peinture en fonction de son ID
        return $this->paintingModel->delete($id);
    }
}
?>
