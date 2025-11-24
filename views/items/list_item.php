<?php
require_once("../../config/db.php");
require_once("../../model/Item.php");

$itemModel = new Item($db);
$items = $itemModel->getAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Создание нового айтема
    $item = new Item($db);
    $item->setName(trim($_POST['name']))
         ->setDescription(trim($_POST['description']))
         ->setType(trim($_POST['type']))
         ->setEffect(intval($_POST['effect']))
         ->setImg(trim($_POST['img']));

    if ($item->save()) {
        header("Location: list_item.php");
        exit;
    } else {
        echo "Error al guardar el item.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Items</title>
</head>
<body>
    <h1>Menu: </h1>
    <?php include('../partials/_menu.php') ?>

    <h1>Crear Item</h1>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
        <label>Nombre:</label>
        <input type="text" name="name" required>

        <label>Descripción:</label>
        <input type="text" name="description">

        <label>Tipo:</label>
        <select name="type" required>
            <option value="weapon">weapon</option>
            <option value="armor">armor</option>
            <option value="potion">potion</option>
            <option value="misc">misc</option>
        </select>

        <label>Effect (número):</label>
        <input type="number" name="effect" value="0" required>

        <label>Img (ruta o URL):</label>
        <input type="text" name="img">

        <button type="submit">Crear item</button>
    </form>

    <h1>Items existentes</h1>
    <table>
        <thead>
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Tipo</th>
                <th>Effect</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($items as $it) : ?>
                <tr>
                    <td><?= $it['img'] ?></td>
                    <td><?= $it['name'] ?></td>
                    <td><?= $it['description'] ?></td>
                    <td><?= $it['type'] ?></td>
                    <td><?= $it['effect'] ?></td>
                    <td>
                        <form action="edit_item.php" method="GET">
                            <input type="hidden" name="id" value="<?= $it['id'] ?>">
                            <button type="submit">Editar</button>
                        </form>
                        <form action="delete_item.php" method="POST">
                            <input type="hidden" name="id" value="<?= $it['id'] ?>">
                            <button type="submit">Borrar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
