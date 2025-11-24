<?php

require_once("../../config/db.php");
require_once("../../model/Item.php");

$items = [];

try {
    $stmt = $db->query("SELECT * FROM items");
    $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error al leer en base de datos: " . $e->getMessage();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $item = new Item($db);
    $item->setName($_POST['name'])
         ->setDescription($_POST['description'])
         ->setType($_POST['type'])
         ->setEffect($_POST['effect'])
         ->setImg($_POST['img']);

    if ($item->save()) {
        echo "Item guardado con éxito";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Item</title>
</head>

<body>
    <h1>Menu: </h1>
    <?php include('../partials/_menu.php') ?>

    <h1>Crear Item</h1>
    <form action=<?= $_SERVER['PHP_SELF'] ?> method='POST'>
        <label for="nameInput">Nombre:</label>
        <input type="text" name="name" id="nameInput">

        <label for="descriptionInput">Descripción:</label>
        <input type="text" name="description" id="descriptionInput">

        <label for="typeInput">Tipo:</label>
        <select name="type" id="typeInput">
            <option value="weapon">Arma</option>
            <option value="armor">Armadura</option>
            <option value="potion">Poción</option>
            <option value="misc">Misceláneo</option>
        </select>

        <label for="effectInput">Efecto:</label>
        <input type="number" name="effect" id="effectInput" value="0">

        <label for="imgInput">Imagen (URL o nombre archivo):</label>
        <input type="text" name="img" id="imgInput">

        <button type="submit">Crear item</button>
    </form>

    <h1>Items creados:</h1>
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
                    <td><?= $item['img'] ?></td>
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
