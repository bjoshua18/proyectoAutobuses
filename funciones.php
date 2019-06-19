<?php

include("bbdd/BaseDeDatos.php");
include("bbdd/DBMySql.php");

if(isset($_POST['alta'])) {
	altaAutobus();
}

function conexionBD($consulta) {
	$dbLocal = new DBMySql('localhost', 'autobuses', 'kBMXc5rXGjFQEODj', 'bus', 3306, 'mysql');
	$valor = $dbLocal->setQuery($consulta);

	return $valor;
}

function menu($num) {
	$active = getActiveSection($num);
	return "
		<li><a href='index.php' class='{$active[0]}'>Inicio</a></li>
		<li><a href='alta_autobuses.php' class='{$active[1]}'>Alta Autobuses</a></li>
		<li><a href='ver_autobuses.php' class='{$active[2]}'>Ver autobuses</a></li>
		<li><a href='alta_conductores.php' class='{$active[3]}'>Alta Conductores</a></li>
		<li><a href='ver_conductores.php' class='{$active[4]}'>Ver Conductores</a></li>
	";
}

function altaAutobus() {
	echo 'funcion alta';
	// 13:30
}

function verAutobuses() {
	$buses = conexionBD("SELECT * FROM autobuses");
	
	$result = "";
	while ($bus = mysqli_fetch_assoc($buses)) { 
		$result .= "
			<h3>Nombre: <span>{$bus['nombre']}</span><a href='editar_autobuses.php?id={$bus['id']}' class='editar'><img src='images/editar.png'/></a></h3>
			<h4>Color: <span>{$bus['color']}</span></h4>
			<h4>Capacidad: <span>{$bus['capacidad']}</span></h4>
		";
	}

	return $result;
}

function getActiveSection($num) {
	$active = ['', '', '', '', ''];
	for ($i=0; $i < count($active); $i++)
		if($num === $i)
			$active[$i] = 'active';
	return $active;
}