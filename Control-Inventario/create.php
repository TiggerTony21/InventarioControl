<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre_producto = $_POST['nombre_producto'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];

    $stmt = $pdo->prepare("INSERT INTO productos (nombre_producto, cantidad, precio) VALUES (?, ?, ?)");
    $stmt->execute([$nombre_producto, $cantidad, $precio]);

    header("Location: index.php");
    exit();
}
?>