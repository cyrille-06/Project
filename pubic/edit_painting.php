<?php
require '../autoload.php';
use App\Models\Database;
use App\Controllers\PaintingController;

$db = (new Database())->getConnection();
$controller = new PaintingController($db);

if (!isset($_GET['id'])) {
    die("Painting ID required.");
}

$id = $_GET['id'];
$painting = $controller->get($id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $controller->update($id, $_POST['title'], $_POST['year'], $_POST['artist_name'], $_POST['width'], $_POST['height']);
    header("Location: paintings.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Painting</title>
</head>
<body>
    <h1>Edit Painting</h1>
    <form method="POST">
        Title: <input type="text" name="title" value="<?= $painting['title'] ?>" required><br>
        Year: <input type="number" name="year" value="<?= $painting['year'] ?>" required><br>
        Artist Name: <input type="text" name="artist_name" value="<?= $painting['artist_name'] ?>"><br>
        Width: <input type="number" step="0.1" name="width" value="<?= $painting['width'] ?>"><br>
        Height: <input type="number" step="0.1" name="height" value="<?= $painting['height'] ?>"><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
