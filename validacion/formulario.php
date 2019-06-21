<?php
	$error = '';

	if(isset($_GET['error']) && ($_GET['error'] == 'nombre')) {
		$error = 'Debe escribir su nombre';
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Formulario Prueba</title>
</head>
<body>
	<form action="control_validacion.php" method="post">
		<input type="text" name="nombre" id="nombre" placeholder="Nombre">
		<br/>
		<input type="submit" value="Enviar">
		<br/>
		<?= $error ?>
	</form>
</body>
</html>