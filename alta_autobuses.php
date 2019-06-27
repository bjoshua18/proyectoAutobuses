<?php
include("funciones.php");

if(isset($_POST['nombre'])) {
	$query = "INSERT INTO autobuses (`nombre`,`color`, `capacidad`) VALUES ('{$_POST["nombre"]}', '{$_POST["color"]}', {$_POST["capacidad"]})";
	$result = conexionBD($query);

	if(!$result)
		die('Consulta fallida =(');

	echo 'Autobus agregado satisfactoriamente';
}