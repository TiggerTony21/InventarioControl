<?php
include 'db.php';

// Obtener productos
$stmt = $pdo->query("SELECT * FROM productos");
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Control de Inventario</title>
</head>
<body>
    <h1>Control de Inventario</h1>

    <h2>Agregar Producto</h2>
    <form action="create.php" method="POST">
        <input type="text" name="nombre_producto" placeholder="Nombre del Producto" required>
        <input type="number" name="cantidad" placeholder="Cantidad" required>
        <input type="number" step="0.01" name="precio" placeholder="Precio" required>
        <button type="submit">Agregar</button>
    </form>

    <h2>Lista de Productos</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($productos as $producto): ?>
        <tr>
            <td><?php echo $producto['id']; ?></td>
            <td><?php echo $producto['nombre_producto']; ?></td>
            <td><?php echo $producto['cantidad']; ?></td>
            <td><?php echo $producto['precio']; ?></td>
            <td>
                <a href="edit.php?id=<?php echo $producto['id']; ?>">Editar</a>
                <a href="delete.php?id=<?php echo $producto['id']; ?>">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>