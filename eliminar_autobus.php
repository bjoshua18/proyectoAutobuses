<?php

include('funciones.php');

$id = $_POST['id'];
$result = borrarAutobus($id);

if(!$result)
	die("Consulta fallida =(");

echo "Autobus eliminado correctamente.";