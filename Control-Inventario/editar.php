<?php
require 'conexion.php';

$id = $_GET["id"];
$stmt = $pdo->prepare("SELECT * FROM productos WHERE id = ?");
$stmt->execute([$id]);
$producto = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<h1>Editar producto</h1>
<form method="POST" action="actualizar.php">
    <input type="hidden" name="id" value="<?= $producto["id"] ?>">
    <label>Nombre: <input type="text" name="nombre" value="<?= htmlspecialchars($producto["nombre"]) ?>" required></label><br>
    <label>Cantidad: <input type="number" name="cantidad" value="<?= $producto["cantidad"] ?>" required></label><br>
    <button type="submit">Actualizar</button>
</form>
<a href="index.php">Volver</a>