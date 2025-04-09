<?php
require 'conexion.php';

$stmt = $pdo->query("SELECT * FROM productos");
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h1>Inventario</h1>
<a href="agregar.php">Agregar nuevo producto</a>
<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Cantidad</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($productos as $producto): ?>
        <tr>
            <td><?= $producto["id"] ?></td>
            <td><?= htmlspecialchars($producto["nombre"]) ?></td>
            <td><?= (int)$producto["cantidad"] ?></td>
            <td>
                <a href="editar.php?id=<?= $producto["id"] ?>">Editar</a> |
                <a href="eliminar.php?id=<?= $producto["id"] ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>