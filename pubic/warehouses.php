<?php
// Inclure la configuration et le modèle pour les entrepôts
require_once '../config/config.php';
require_once '../src/Models/Warehouse.php';

// Instancier le modèle Warehouse
$warehouseModel = new Warehouse($pdo);
// Récupérer la liste de tous les entrepôts
$warehouses = $warehouseModel->getAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warehouses List</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <h1>Warehouses</h1>
    <a href="create_warehouse.php"><button>Add Warehouse</button></a>
    <table>
        <tr>
            <th>Name</th>
            <th>Address</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($warehouses as $warehouse): ?>
        <tr>
            <td><?= htmlspecialchars($warehouse['name']) ?></td>
            <td><?= htmlspecialchars($warehouse['address']) ?></td>
            <td>
                <!-- Modifier l'entrepôt -->
                <a href="edit_warehouse.php?id=<?= $warehouse['id_warehouse'] ?>"><button>Edit</button></a>
                
                <!-- Supprimer l'entrepôt -->
                <a href="delete_warehouse.php?id=<?= $warehouse['id_warehouse'] ?>" onclick="return confirm('Are you sure you want to delete this warehouse?')">
                    <button class="delete-btn">Delete</button>
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
