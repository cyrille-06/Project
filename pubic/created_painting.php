<?php
require '../autoload.php';
use App\Models\Database;
use App\Controllers\PaintingController;

$db = (new Database())->getConnection();
$controller = new PaintingController($db);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $controller->create($_POST['title'], $_POST['year'], $_POST['artist_name'], $_POST['width'], $_POST['height']);
    header("Location: paintings.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Painting</title>
</head>
<body>
    <h1>Add New Painting</h1>
    <form method="POST">
        Title: <input type="text" name="title" required><br>
        Year: <input type="number" name="year" required><br>
        Artist Name: <input type="text" name="artist_name"><br>
        Width: <input type="number" name="width"><br>
        Height: <input type="number" name="height"><br>
        <button type="submit">Save</button>
    </form>
</body>
</html>
