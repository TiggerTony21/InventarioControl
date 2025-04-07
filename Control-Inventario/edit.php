<?php
include 'db .php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM productos WHERE id = ?");
    $stmt->execute([$id]);
    $producto = $stmt->fetch(PDO::FETCH_ASSOC);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre_producto = $_POST['nombre_producto'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];

    $stmt = $pdo->prepare("UPDATE productos SET nombre_producto = ?, cantidad = ?, precio = ? WHERE id = ?");
    $stmt->execute([$nombre_producto, $cantidad, $precio, $id]);

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Editar Producto</title>
</head>
<body>
    <h1>Editar Producto</h1>
    <form action="" method="POST">
        <input type="text" name="nombre_producto" value="<?php echo $producto['nombre_producto']; ?>" required>
        <input type="number" name="cantidad" value="<?php echo $producto['cantidad']; ?>" required>
        <input type="number" step="0.01" name="precio" value="<?php echo $producto['precio']; ?>" required>
        <button type="submit">Actualizar</button>
    </form>
</body>
</html>