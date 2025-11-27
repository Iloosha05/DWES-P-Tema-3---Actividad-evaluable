<?php
require_once("../../config/db.php");
require_once("../../model/Enemy.php");

$enemyModel = new Enemy($db);
$enemies = $enemyModel->getAll();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Enemigos</title>
</head>

<body>
    <h1>Menu: </h1>
    <?php include('../partials/_menu.php') ?>
    <a href="/views/enemies/create_enemy.php">Crear un enemigo</a>
    <h1>Enemigos creados:</h1>
    <table>
        <thead>
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Jefe</th>
                <th>Vida</th>
                <th>Fuerza</th>
                <th>Defensa</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($enemies as $enemy) : ?>
                <tr>
                    <td><?= $enemy['img'] ?></td>
                    <td><?= $enemy['name'] ?></td>
                    <td><?= $enemy['description'] ?></td>
                    <td><?= $enemy['isBoss'] ? "Sí" : "No" ?></td>
                    <td><?= $enemy['health'] ?></td>
                    <td><?= $enemy['strength'] ?></td>
                    <td><?= $enemy['defense'] ?></td>

                    <td>
                        <form action="edit_enemy.php" method="GET">
                            <input type="hidden" name="id" value="<?= $enemy['id'] ?>">
                            <button type="submit">Editar</button>
                        </form>

                        <form action="delete_enemy.php" method="POST">
                            <input type="hidden" name="id" value="<?= $enemy['id'] ?>">
                            <button type="submit">Borrar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html