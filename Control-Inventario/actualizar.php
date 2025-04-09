<?php
require 'conexion.php';

$id = $_POST["id"];
$nombre = $_POST["nombre"];
$cantidad = (int)$_POST["cantidad"];

$stmt = $pdo->prepare("UPDATE productos SET nombre = ?, cantidad = ? WHERE id = ?");
$stmt->execute([$nombre, $cantidad, $id]);

header("Location: index.php");