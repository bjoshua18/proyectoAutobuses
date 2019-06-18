<?php
include("BaseDeDatos.php");

$prueba = new BaseDeDatos('localhost', 'root', '', 'bus', 3306, 'mysql');

$prueba->verConfiguracion();