<?php
$index = (int)$_GET["i"];

$productos = json_decode(file_get_contents("productos.json"), true);
unset($productos[$index]);
$productos = array_values($productos); // Reindexar

file_put_contents("productos.json", json_encode($productos, JSON_PRETTY_PRINT));

header("Location: index.php");