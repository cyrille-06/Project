<?php
require '../autoload.php';
use App\Models\Database;
use App\Controllers\WarehouseController;

$db = (new Database())->getConnection();
$controller = new WarehouseController($db);

if (!isset($_GET['id'])) {
    die("Warehouse ID required.");
}

$id = $_GET['id'];
$warehouse = $controller->get($id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $controller->update($id, $_POST['name'], $_POST['address']);
    header("Location: warehouses.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Edit Warehouse </title>
</head>
<body>
    <h1>Edit Warehouse</h1>
    <form method="POST">
        Name: <input type="text" name="name" value="<?= $warehouse['name'] ?>" required><br>
        Address: <input type="text" name="address" value="<?= $warehouse['address'] ?>"><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
