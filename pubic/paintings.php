<?php
require_once '../config/config.php';
require_once '../src/Models/Painting.php';

$paintingModel = new Painting($pdo);
$paintings = $paintingModel->getAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Paintings List</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.css">

</head>
<body>
    <h1>Paintings</h1>
    <a href="create_painting.php"><button>Add Painting</button></a>
    <table>
        <tr>
            <th>Title</th>
            <th>Year</th>
            <th>Artist</th>
            <th>Width</th>
            <th>Height</th>
        </tr>
        <?php foreach ($paintings as $painting): ?>
        <tr>
            <td><?= htmlspecialchars($painting['title']) ?></td>
            <td><?= $painting['year'] ?></td>
            <td><?= htmlspecialchars($painting['artist_name']) ?></td>
            <td><?= $painting['width'] ?> cm</td>
            <td><?= $painting['height'] ?> cm</td>
            <td>
                <a href="edit_painting.php?id=<?= $painting['id_painting'] ?>"><button>Edit</button></a>
                <a href="delete_painting.php?id=<?= $painting['id_painting'] ?>" onclick="return confirm('Are you sure?')">
                    <button class="delete-btn">Delete</button>
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
