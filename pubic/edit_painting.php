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
 if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $title =$_POST['title'] ??'';
    $year = $_POST['year'] ?? '';
    $artist_name = $_POST['artist_name'] ?? '';
    $width = $_POST['width'] ?? null;
    $height = $_POST['height'] ?? null;
    if(!empty($title) && !empty($year)){
        $painting->update($id,$title,$year,$artist_name,$width,$height);
        header ("Location: paintings.php");
        exit();

    } else{
        $error = "title and year are required";
    }

 }
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Painting</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.css">
 </head>
 <body>
    <h2>
        Edit Painting
    </h2>
    <?php if (!empty($error)) : ?>
        <p class="error"><?= $error ?></p>
    <?php endif; ?>

    <form method="POST">
        <label>Title</label>
        <input type="text" name="title" value="<?= htmlspecialchars($currentPainting['title']) ?>" required>
        <label>Year:</label>
        <input type="number" name="year" value="<?= htmlspecialchars($currentPainting['year']) ?>" required>
        <label>Artist Name:</label>
        <input type="text" name="artist_name" value="<?= htmlspecialchars($currentPainting['artist_name']) ?>">

        <label>width(cm):</label>
        <input type="number" step="0,01" name="width" value="<?= htmlspecialchars($currentPainting['width']) ?>">
        <label>Height (cm):</label>
        <input type="number" step="0.01" name="height" value="<?= htmlspecialchars($currentPainting['height']) ?>">
<button type="submit">Update Paiting</button>
    </form>

    <br>
    <a href="paintings.php">Back to Paintings </a>
    
 </body>
 </html>
