<?php

include("bbdd/BaseDeDatos.php");
include("bbdd/DBMySql.php");

function conexionBD($consulta) {
	$dbLocal = new DBMySql('localhost', 'autobuses', 'kBMXc5rXGjFQEODj', 'bus', 3306, 'mysql');
	$valor = $dbLocal->setQuery($consulta);

	return $valor;
}

function menu() {
	return "
		<li><a href='index.php'>Inicio</a></li>
		<li><a href='alta_autobuses.php'>Alta Autobuses</a></li>
		<li><a href='ver_autobuses.php'>Ver autobuses</a></li>
		<li><a href='alta_conductores.php'>Alta Conductores</a></li>
		<li><a href='ver_conductores.php'>Ver Conductores</a></li>
	";
	
}

function verAutobuses() {
	$buses = conexionBD("SELECT * FROM autobuses");
	
	$result = "";
	while ($bus = mysqli_fetch_assoc($buses)) { 
		$result .= "
			<h3>Nombre: <span>{$bus['nombre']}</span></h3>
			<h4>Color: <span>{$bus['color']}</span></h4>
			<h4>Capacidad: <span>{$bus['capacidad']}</span></h4>
		";
	}

	return $result;
}