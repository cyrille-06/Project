<?php

// Définition de la classe Warehouse (Entrepôt)
class Warehouse {
    // Cette variable stocke la connexion à la base de données (PDO)
    private $pdo;

    // Le constructeur initialise la connexion à la base de données
    public function __construct($pdo) {
        $this->pdo = $pdo; // On sauvegarde la connexion dans $pdo
    }

    // Cette méthode récupère tous les entrepôts de la base de données
    public function getAll() {
        // On fait une requête SQL pour récupérer tous les entrepôts
        $stmt = $this->pdo->query("SELECT * FROM warehouses");
        // On retourne tous les entrepôts sous forme de tableau associatif
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Cette méthode permet d'ajouter un nouveau entrepôt à la base de données
    public function create($name, $address) {
        // On prépare la requête SQL pour insérer un nouvel entrepôt
        $stmt = $this->pdo->prepare("INSERT INTO warehouses (name, address) VALUES (?, ?)");
        // On exécute la requête avec les informations de l'entrepôt
        return $stmt->execute([$name, $address]);
    }

    // Cette méthode permet de mettre à jour un entrepôt existant
    public function update($id, $name, $address) {
        // On prépare la requête SQL pour mettre à jour un entrepôt
        $stmt = $this->pdo->prepare("UPDATE warehouses SET name = ?, address = ? WHERE id_warehouse = ?");
        // On exécute la requête avec les nouvelles informations de l'entrepôt
        return $stmt->execute([$name, $address, $id]);
    }

    // Cette méthode permet de supprimer un entrepôt de la base de données
    public function delete($id) {
        // On prépare la requête SQL pour supprimer un entrepôt par son ID
        $stmt = $this->pdo->prepare("DELETE FROM warehouses WHERE id_warehouse = ?");
        // On exécute la requête pour supprimer l'entrepôt
        return $stmt->execute([$id]);
    }

    // Cette méthode permet de récupérer un entrepôt spécifique par son ID
    public function getById($id) {
        // On prépare la requête SQL pour récupérer un entrepôt par son ID
        $stmt = $this->pdo->prepare("SELECT * FROM warehouses WHERE id_warehouse = ?");
        // On exécute la requête avec l'ID de l'entrepôt
        $stmt->execute([$id]);
        // On retourne l'entrepôt trouvé
        return $stmt->fetch();
    }

    // Cette méthode permet de récupérer une peinture spécifique par son ID
    public function getPaintingById($id) {
        // On prépare la requête SQL pour récupérer une peinture par son ID
        $stmt = $this->pdo->prepare("SELECT * FROM paintings WHERE id_painting = ?");
        // On exécute la requête avec l'ID de la peinture
        $stmt->execute([$id]);
        // On retourne la peinture trouvée
        return $stmt->fetch(); 
    }

    // Cette méthode permet de récupérer tous les entrepôts de la base de données (alternative à getAll)
    public function getAllWarehouses() {
        // On prépare la requête SQL pour récupérer tous les entrepôts
        $stmt = $this->pdo->prepare("SELECT * FROM warehouses");
        // On exécute la requête
        $stmt->execute();
        // On retourne tous les entrepôts sous forme de tableau associatif
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>
