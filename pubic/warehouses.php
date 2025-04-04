<?php

// ici j'ai inclue la configuration et le modèe pour les entrepots
require_once '../Config/config.php';
require_once '../src/Models/Warehouse.php';

// mode warehouse
$warehouseModel = new Warehouse($pdo);
//Pour recuperer la liste de tous les entrepots
$warehouses = $warehouseModel->getAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warehouse List </title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <h1>Warehouses </h1>
    <a href="create_warehouse.php"><button>Add Warehouse</button></a>
    <table>
        <tr>
        <th>Name</th>
            <th>Address</th>
        </tr>
         <?php foreach ($warehouses as $warehouse): ?>
            <tr>
            <td><?= htmlspecialchars($warehouse['name']) ?></td> 
            <td><?= htmlspecialchars($warehouse['address']) ?></td>

            <!-- la page Pour modifier un entrepot -->
            <td>
                <a href="edit_warehouse.php?id=<?= $warehouse['id_warehouse'] ?>"><button>Edit</button></a>
                <!--supprimer l'entrepot-->
                <a href="delete_warehouse.php?id=<?= $warehouse['id_warehouse'] ?>" onclick="return confirm(' you want to delete this warehouse?')">
                    <button class="delete-btn">Delete</button>
        </a>
        </td>

            </tr>
            <?php endforeach; ?>

</body>
</html>