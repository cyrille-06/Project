<?php

// Définition de la classe Painting
class Painting {
    // Cette variable stocke la connexion à la base de données (PDO)
    private $pdo;

    // Le constructeur initialise la connexion à la base de données
    public function __construct($pdo) {
        $this->pdo = $pdo; // On sauvegarde la connexion dans $pdo
    }

    // Cette méthode récupère toutes les peintures de la base de données
    public function getAll() {
        // On fait une requête SQL pour récupérer toutes les peintures
        $stmt = $this->pdo->query("SELECT * FROM paintings");
        // On retourne toutes les peintures sous forme de tableau associatif
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Cette méthode permet de créer une nouvelle peinture dans la base de données
    public function create($title, $year, $artist, $width, $height) {
        // On prépare la requête SQL pour insérer une nouvelle peinture
        $stmt = $this->pdo->prepare("INSERT INTO paintings (title, year, artist_name, width, height) VALUES (?, ?, ?, ?, ?)");
        // On exécute la requête avec les données fournies
        return $stmt->execute([$title, $year, $artist, $width, $height]);
    }

    // Cette méthode permet de récupérer une peinture spécifique par son ID
    public function get($id) {
        // On prépare la requête SQL pour récupérer une peinture par son ID
        $stmt = $this->pdo->prepare("SELECT * FROM paintings WHERE id_painting = ?");
        // On exécute la requête avec l'ID de la peinture
        $stmt->execute([$id]);
        // On retourne les données de la peinture trouvée
        return $stmt->fetch(PDO::FETCH_ASSOC); 
    }

    // Cette méthode permet de mettre à jour une peinture existante
    public function update($id, $title, $year, $artist, $width, $height) {
        // On prépare la requête SQL pour mettre à jour les informations de la peinture
        $stmt = $this->pdo->prepare("UPDATE paintings SET title=?, year=?, artist_name=?, width=?, height=? WHERE id_painting=?");
        // On exécute la requête avec les nouvelles données
        return $stmt->execute([$title, $year, $artist, $width, $height, $id]);
    }

    // Cette méthode permet de supprimer une peinture de la base de données
    public function delete($id) {
        // On prépare la requête SQL pour supprimer la peinture par son ID
        $stmt = $this->pdo->prepare("DELETE FROM paintings WHERE id_painting = ?");
        // On exécute la requête pour supprimer la peinture
        return $stmt->execute([$id]);
    }

    // Cette méthode permet de récupérer une peinture par son ID (identique à get(), mais ici pour vérifier l'existence)
    public function getById($id) {
        // On prépare la requête SQL pour récupérer la peinture par son ID
        $stmt = $this->pdo->prepare("SELECT * FROM paintings WHERE id_painting=?");
        // On exécute la requête avec l'ID
        $stmt->execute([$id]);
        // On retourne la peinture trouvée
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Cette méthode permet de récupérer toutes les peintures qui sont stockées dans un entrepôt spécifique
    public function getPaintingsByWarehouse($id_warehouse) {
        // On prépare une requête SQL qui fait une jointure entre les peintures et les entrepôts
        $stmt = $this->pdo->prepare("
            SELECT p.*
            FROM paintings p
            INNER JOIN storage s ON p.id_painting = s.id_painting
            WHERE s.id_warehouse = :id_warehouse
        ");
        // On exécute la requête avec l'ID de l'entrepôt
        $stmt->execute(['id_warehouse' => $id_warehouse]);
        // On retourne toutes les peintures associées à cet entrepôt
        return $stmt->fetchAll();
    }
}

?>
