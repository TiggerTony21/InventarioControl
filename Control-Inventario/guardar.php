<?php
$nombre = $_POST["nombre"];
$cantidad = (int)$_POST["cantidad"];

$productos = json_decode(file_get_contents("productos.json"), true);

$productos[] = ["nombre" => $nombre, "cantidad" => $cantidad];

file_put_contents("productos.json", json_encode($productos, JSON_PRETTY_PRINT));

header("Location: index.php");