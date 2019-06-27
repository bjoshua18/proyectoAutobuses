<?php
include("funciones.php");


$datos_bus = $_POST;
$result = editarAutobus($datos_bus);

if(!$result)
	die('Consulta fallida =(');

echo "Autobus modificado correctamente =)";