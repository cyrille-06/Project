<?php
require_once '../src/Models/Database.php';
require_once '../src/Models/Painting.php';

$db = new Database();
$pdo = $db->getConnection();
$painting = new Painting($pdo);

$id = $_GET['id'] ?? null;
if (!$id) {
    echo "Invalid ID.";
    exit();
}

$currentPainting = $painting->getById($id);

if (!$currentPainting) {
    echo "Painting not found.";
    exit();
}