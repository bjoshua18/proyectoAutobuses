<?php
include("funciones.php");

$id = $_POST['id'];

$datos_bus = cargarAutobusEditar($id);

if(!$datos_bus)
	die('Consulta fallida =(');

echo json_encode($datos_bus);