<?php

require("Validacion.php");

$val = new Validacion();

$nombre = $_POST['nombre'];

$error_nombre = $val->validaTexto($nombre, false, false, true, "No escribas caracteres siniestros >=(");

if($error_nombre === true)
	header("Location:formulario.php");
else
	header("Location:formulario.php?error=nombre");