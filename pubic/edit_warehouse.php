<?php
require_once '../src/Models/Database.php';
require_once '../src/Models/Warehouse.php';

$db = new Database();
$pdo = $db->getConnection();
$warehouse = new Warehouse($pdo);

$id = $_GET['id'] ?? null;

if (!$id) {
    echo "Invalid ID.";
    exit();
}

$currentWarehouse = $warehouse->getById($id);


if (!$currentWarehouse) {
    echo "Warehouse not found.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $address = $_POST['address'] ?? '';

    if (!empty($name)) {
        $warehouse->update($id, $name, $address);
        header("Location: warehouses.php");
        exit();
    } else {
        $error = "Name is required.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Warehouse</title>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <h2>
        Edit Warehouse
    </h2>
    <?php if (!empty($error)) : ?>
        <p class="error"><?= $error ?></p>
    <?php endif; ?>
    <form method="POST">
        <label>Name:</label>
        <input type="text" name="name" value="<?=htmlspecialchars($currentWarehouse['name']) ?>" required>
        <label>Address:</label>
        <input type="text" name="address" value="<?= htmlspecialchars($currentWarehouse['address']) ?>">
        <button type="submit">Update Warehouse</button>
    </form>
    <br>
    <a href="warehouses.php">Back to warehouses</a>

    
</body>
</html>