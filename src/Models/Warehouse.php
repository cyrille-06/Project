<?php
class Warehouse {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    

    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM warehouses");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    
    // Fonction de création pour ajouter un entrepôt
    public function create($name, $address) {
        $stmt = $this->pdo->prepare("INSERT INTO warehouses (name, address) VALUES (?, ?)");
        return $stmt->execute([$name, $address]);
    }

    // Fonction pour mettre à jour un entrepôt
    public function update($id, $name, $address) {
        $stmt = $this->pdo->prepare("UPDATE warehouses SET name = ?, address = ? WHERE id_warehouse = ?");
        return $stmt->execute([$name, $address, $id]);
    }

    // Fonction pour supprimer un entrepôt
    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM warehouses WHERE id_warehouse = ?");
        return $stmt->execute([$id]);
    }

    public function getById($id){
        $stmt = $this->pdo->prepare("SELECT * FROM warehouses WHERE id_warehouse = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
    public function getPaintingById($id){
        $stmt = $this->pdo->prepare("SELECT * FROM paintings WHERE id_painting = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(); 
    
}
}

?>
