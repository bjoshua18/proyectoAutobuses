<?php
include("funciones.php");

if(isset($_POST['nombre'])) {
	$result = altaAutobus($_POST["nombre"], $_POST["color"], $_POST["capacidad"]);

	if(!$result)
		die('Consulta fallida =(');

	echo 'Autobus agregado satisfactoriamente';
}