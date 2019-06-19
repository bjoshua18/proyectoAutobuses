<?php

include("bbdd/BaseDeDatos.php");
include("bbdd/DBMySql.php");

function conexionBD($consulta) {
	$dbLocal = new DBMySql('localhost', 'autobuses', 'kBMXc5rXGjFQEODj', 'bus', 3306, 'mysql');
	$valor = $dbLocal->setQuery($consulta);

	return $valor;
}

function verAutobuses() {
	$buses = conexionBD("SELECT * FROM autobuses");
	
	$result = "";
	while ($bus = mysqli_fetch_assoc($buses)) { 
		$result .= "
			Nombre: {$bus['nombre']}<br/>
			Color: {$bus['color']}<br/>
			Capacidad: {$bus['capacidad']}<br/>
			<br/>
		";
	}

	return $result;
}