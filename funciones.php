<?php

include("bbdd/BaseDeDatos.php");
include("bbdd/DBMySql.php");
include("clases/Autobus.php");
include("clases/Validacion.php");

if(isset($_POST['alta'])) {
	validaAltaAutobus();
}

if(isset($_POST['editar'])) {
	editarAutobus();
}

if(isset($_GET['borrar'])) {
	borrarAutobus($_GET['borrar']);
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

function validaAltaAutobus() {
	$nombre = validarString($_POST['nombre']);
	$color = validarString($_POST['color']);
	$capacidad = validarString($_POST['capacidad']);

	if($nombre === null && $color === null && $capacidad===null)
		header("Location:alta_autobuses.php?error=string");
	else
		altaAutobus($nombre, $color, $capacidad);
}

function validarString($string) {
	$val = new Validacion();
	$error = $val->validaTexto($string, false, false, true, "Introduce un texto correcto");
	if($error === true)
		return $string;
	else
	return null;
		
}

function altaAutobus($nombre, $color, $capacidad) {
	$autobus = new Autobus($nombre, $color, $capacidad);
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
	$id = htmlentities($_POST['id']);
	$nombre = htmlentities($_POST['nombre']);
	$color = htmlentities($_POST['color']);
	$capacidad = htmlentities($_POST['capacidad']);

	$consulta = "
	UPDATE autobuses 
		SET 
			nombre='$nombre', 
			color='$color', 
			capacidad='$capacidad'
		WHERE id=$id";

	conexionBD($consulta);
	header("Location:editar_autobuses.php?id=$id");
}

function borrarAutobus($id) {
	$consulta = "DELETE FROM autobuses WHERE id=$id";
	conexionBD($consulta);
	header("Location:ver_autobuses.php");
}

function getActiveSection($num) {
	$active = ['', '', '', '', ''];
	for ($i=0; $i < count($active); $i++)
		if(($num - 1) === $i)
			$active[$i] = 'active';
	return $active;
}