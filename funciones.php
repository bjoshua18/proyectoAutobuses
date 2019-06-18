<?php

include("bbdd/BaseDeDatos.php");
include("bbdd/DBMySql.php");

function conexionBD($consulta) {
	$dbLocal = new DBMySql('localhost', 'autobuses', 'kBMXc5rXGjFQEODj', 'bus', 3306, 'mysql');
	$dbLocal->setQuery($consulta);

	return $dbLocal;
}

function verAutobuses() {
	$dbLocal = conexionBD("SELECT * FROM autobuses");
	$buses = $dbLocal->queryToArray();
	$result = "";
	for ($i=0; $i < count($buses); $i++) { 
		$result .= "
			Nombre: {$buses[$i]['nombre']}<br/>
			Color: {$buses[$i]['color']}<br/>
			Capacidad: {$buses[$i]['capacidad']}<br/>
			<br/>
		";
	}

	return $result;
}