<?php

include("bbdd/BaseDeDatos.php");
include("bbdd/DBMySql.php");
include("clases/Autobus.php");

if(isset($_POST['alta'])) {
	altaAutobus();
}

if(isset($_POST['editar'])) {
	editarAutobus();
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
	$autobus = new Autobus($_POST['nombre'], $_POST['color'], $_POST['capacidad']);
	conexionBD($autobus->darDeAlta());
	header('Location:ver_autobuses.php');
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

function cargarAutobusEditar($id) {
	$consulta = "SELECT * FROM autobuses WHERE id=$id";
	$valor = conexionBD($consulta);
	return mysqli_fetch_assoc($valor);
}

function editarAutobus() {
	echo 'Editando...';
}

function getActiveSection($num) {
	$active = ['', '', '', '', ''];
	for ($i=0; $i < count($active); $i++)
		if(($num - 1) === $i)
			$active[$i] = 'active';
	return $active;
}