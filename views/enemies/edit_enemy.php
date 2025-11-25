<?php
require_once("../../config/db.php");
require_once("../../model/Enemy.php");

$enemyId = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($enemyId <= 0) {
    echo "ID inválido.";
    exit;
}

$enemy = new Enemy($db);
if (!$enemy->loadById($enemyId)) {
    echo "Enemigo no encontrado.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $enemy->setName(trim($_POST['name']))
          ->setDescription(trim($_POST['description']))
          ->setIsBoss(isset($_POST['isBoss']) ? 1 : 0)
          ->setHealth(intval($_POST['health']))
          ->setStrength(intval($_POST['strength']))
          ->setDefense(intval($_POST['defense']))
          ->setImg(trim($_POST['img']));
    if ($enemy->save()) {
        header("Location: list_enemy.php");
        exit;
    } else {
        echo "Error al actualizar enemigo.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Enemy</title>
</head>
<body>
    <h1>Editar Enemy</h1>
    <form method="POST">
        <label>Nombre:</label>
        <input type="text" name="name" value="<?= htmlspecialchars($enemy->getName()) ?>" required>

        <label>Descripción:</label>
        <textarea name="description" required><?= htmlspecialchars($enemy->getDescription()) ?></textarea>

        <label>Es jefe:</label>
        <input type="checkbox" name="isBoss" <?= $enemy->getIsBoss() ? 'checked' : '' ?>>

        <label>Health:</label>
        <input type="number" name="health" value="<?= htmlspecialchars($enemy->getHealth()) ?>" required>

        <label>Strength:</label>
        <input type="number" name="strength" value="<?= htmlspecialchars($enemy->getStrength()) ?>" required>

        <label>Defense:</label>
        <input type="number" name="defense" value="<?= htmlspecialchars($enemy->getDefense()) ?>" required>

        <label>Img:</label>
        <input type="text" name="img" value="<?= htmlspecialchars($enemy->getImg()) ?>">

        <button type="submit">Guardar Cambios</button>
    </form>
</body>
</html>
