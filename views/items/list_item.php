<?php
require_once("../../config/db.php");
require_once("../../model/Item.php");

$itemModel = new Item($db);
$items = $itemModel->getAll();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Ítems</title>
</head>

<body>
    <h1>Menu: </h1>
    <?php include('../partials/_menu.php') ?>
    <h1>Ítems creados:</h1>
    <table>
        <thead>
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Tipo</th>
                <th>Efecto</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($items as $item) : ?>
                <tr>
                    <td>img</td>
                    <td><?= $item['name'] ?></td>
                    <td><?= $item['description'] ?></td>
                    <td><?= $item['type'] ?></td>
                    <td><?= $item['effect'] ?></td>
                    <td>
                        <form action="edit_item.php" method="GET">
                            <input type="hidden" name="id" value="<?= $item['id'] ?>">
                            <button type="submit">Editar</button>
                        </form>
                        <form action="delete_item.php" method="POST">
                            <input type="hidden" name="id" value="<?= $item['id'] ?>">
                            <button type="submit">Borrar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>
