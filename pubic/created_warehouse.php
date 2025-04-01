<?php
require '../autoload.php';
use App\Models\Database;
use App\Controllers\WarehouseController;

$db = (new Database())->getConnection();
$controller = new WarehouseController($db);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $controller->create($_POST['name'], $_POST['address']);
    header("Location: warehouses.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Warehouse</title>
</head>
<body>
    <h1>Add New Warehouse</h1>
    <form method="POST">
        Name: <input type="text" name="name" required><br>
        Address: <input type="text" name="address"><br>
        <button type="submit">Save</button>
    </form>
</body>
</html>
