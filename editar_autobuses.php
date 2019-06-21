<?php
include("funciones.php");

$menu = menu(0);

if(isset($_GET['id'])) {
	$id = $_GET['id'];
}

$datos_bus = cargarAutobusEditar($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Editar autobus <?= $id ?></title>
	<link rel="stylesheet" href="estilos.css">
</head>
<body>
	<header>
		<h1><img src="images/logo.png" alt="Logo"/></h1>
		<h2>Editar Autobus <?= $id ?></h2>
	</header>
	<nav>
		<ul>
			<?= $menu ?>
		</ul>
	</nav>
	<form method="post" action="funciones.php">
		<input type="hidden" name="id" value="<?= $id ?>">
		<label for="nombre">Nombre</label>
		<input type="text" name="nombre" id="nombre" value="<?= $datos_bus['nombre'] ?>"/>

		<label for="color">Color</label>
		<input type="text" name="color" id="color" value="<?= $datos_bus['color'] ?>"/>
		
		<label for="capacidad">Capacidad</label>
		<input type="text" name="capacidad" id="capacidad" value="<?= $datos_bus['capacidad'] ?>"/>
		
		<input type="submit" value="Guardar" name="editar" class="editar" />
		<a href="funciones.php?borrar=<?= $id ?>" class="borrar">Eliminar</a>

		<div class="clearfix"></div>
	</form>
	<article id="ver_autobuses">
		<img src="images/autobus.png" alt="autobus">
	</article>
</body>
</html>