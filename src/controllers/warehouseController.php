<?php

// Définition de la classe WarehouseController, qui sert à gérer les opérations sur les entrepôts
class WarehouseController {
    
    // Propriété privée qui va contenir une instance du modèle Warehouse
    private $warehouseModel;

    // Constructeur de la classe. Il prend une instance de connexion PDO pour initialiser le modèle.
    public function __construct($pdo) {
        // Création d'une instance de la classe Warehouse avec la connexion à la base de données
        $this->warehouseModel = new Warehouse($pdo);
    }

    // Méthode pour récupérer la liste de tous les entrepôts
    public function showAll() {
        // Appelle la méthode getAll() du modèle Warehouse pour obtenir tous les entrepôts
        return $this->warehouseModel->getAll(); 
    }

    // Méthode pour créer un nouvel entrepôt avec un nom et une adresse
    public function create($name, $address) {
        // Appelle la méthode create() du modèle Warehouse pour insérer un nouvel entrepôt
        return $this->warehouseModel->create($name, $address); 
    }

    // Méthode pour récupérer les données d'un entrepôt spécifique via son ID
    public function edit($id) {
        // Appelle la méthode getById() du modèle pour récupérer un entrepôt par son identifiant
        return $this->warehouseModel->getById($id); 
    }

    // Méthode pour mettre à jour un entrepôt existant
    public function update($id, $name, $address) {
        // Appelle la méthode update() du modèle Warehouse avec les nouvelles données
        return $this->warehouseModel->update($id, $name, $address);
    }

    // Méthode pour supprimer un entrepôt de la base de données
    public function delete($id) {
        // Appelle la méthode delete() du modèle Warehouse pour supprimer un entrepôt via son ID
        return $this->warehouseModel->delete($id); 
    }
}
?>
