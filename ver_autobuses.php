<?php
include("funciones.php");

$buses = conexionBD("SELECT * FROM autobuses");

if(!$buses)
	die('Consulta fallida =(');

$json = array();
while($bus = mysqli_fetch_array($buses))
	$json[] = $bus;

echo json_encode($json);