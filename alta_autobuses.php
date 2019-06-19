<?php
include("funciones.php");

$menu = menu(1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Alta autobuses</title>
	<link rel="stylesheet" href="estilos.css">
</head>
<body>
	<header>
		<h1><img src="images/logo.png" alt="Logo"/></h1>
		<h2>Alta Autobuses</h2>
	</header>
	<nav>
		<ul>
			<?= $menu ?>
		</ul>
	</nav>
	<form method="post" action="">
		<label for="nombre">Nombre</label>
		<input type="text" name="nombre" id="nombre"/>

		<label for="color">Color</label>
		<input type="text" name="color" id="color"/>
		
		<label for="capacidad">Capacidad</label>
		<input type="text" name="capacidad" id="capacidad"/>
		<input type="submit" value="Dar de Alta" name="alta"/>

		<div class="clearfix"></div>
	</form>
	<article id="autobus">
		<img src="images/autobus.png" alt="autobus">
	</article>
</body>
</html>