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

    public function add($name, $address) {
        $stmt = $this->pdo->prepare("INSERT INTO warehouses (name, address) VALUES (?, ?)");
        return $stmt->execute([$name, $address]);
    }

    public function get($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM warehouses WHERE id_warehouse = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $name, $address) {
        $stmt = $this->pdo->prepare("UPDATE warehouses SET name=?, address=? WHERE id_warehouse=?");
        return $stmt->execute([$name, $address, $id]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM warehouses WHERE id_warehouse = ?");
        return $stmt->execute([$id]);
    }
}
?>
