<?php
require_once '../src/Models/Database.php';
require_once '../src/Models/Painting.php';

$db = new Database();
$pdo = $db->getConnection();
$painting = new Painting($pdo);
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $title = $_POST['title'] ?? '';
    $year = $_POST['year'] ?? '';
    $artist_name = $_POST['artist_name'] ?? '';
    $width = $_POST['width'] ?? '';
    $height = $_POST['height'] ?? '';
}
if(!empty($title) && !empty($year)){
    $painting->create($title, $year, $artist_name, $width, $height);
    header("Location: paintings.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Painting </title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.css">

</head>
<body>
    <H2> Add a new Paintings </h2>
    <form action="create_painting.php" method="POST">
        <label>Title:</label>
        <input type="text" name="title" required>

        <label>Year:</label>
        <input type="number" name="year" required>

        <label>Artist Name:</label>
        <input type="text" name="artist_name">

        <label>Width (cm):</label>
        <input type="number" step="0.01" name="width">

        <label>Height (cm):</label>
        <input type="number" step="0.01" name="height">
        <button type ="submit"> Add Painting </button>
</form>
<br> 
<a href="paintings.php">Back Paintigns List </a>

</body>
</html>