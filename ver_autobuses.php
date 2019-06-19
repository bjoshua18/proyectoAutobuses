<?php
include("funciones.php");

$menu = menu(2);
$resultado = verAutobuses();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Ver autobuses</title>
	<link rel="stylesheet" href="estilos.css">
</head>
<body>
	<header>
		<h1><img src="images/logo.png" alt="Logo"/></h1>
		<h2>Ver Autobuses</h2>
	</header>
	<nav>
		<ul>
			<?= $menu ?>
		</ul>
	</nav>
	<section>
		<?= $resultado ?>
	</section>
	<article id="ver_autobuses">
		<img src="images/autobus.png" alt="autobus">
	</article>
	<div class="nuevobus">
		<a href="alta_autobuses.php"><img src="images/nuevobus.png" alt="Dar de alta autobus"></a>
	</div>
</body>
</html>