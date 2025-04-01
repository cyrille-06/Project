<?php
class Painting {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM paintings");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function add($title, $year, $artist, $width, $height) {
        $stmt = $this->pdo->prepare("INSERT INTO paintings (title, year, artist_name, width, height) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([$title, $year, $artist, $width, $height]);
    }

    public function get($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM paintings WHERE id_painting = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $title, $year, $artist, $width, $height) {
        $stmt = $this->pdo->prepare("UPDATE paintings SET title=?, year=?, artist_name=?, width=?, height=? WHERE id_painting=?");
        return $stmt->execute([$title, $year, $artist, $width, $height, $id]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM paintings WHERE id_painting = ?");
        return $stmt->execute([$id]);
    }
}
?>
