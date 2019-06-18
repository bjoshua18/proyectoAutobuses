<?php
include("BaseDeDatos.php");
include("DBMySql.php");

$dblocal = new DBMySql('localhost', 'autobuses', 'kBMXc5rXGjFQEODj', 'bus', 3306, 'mysql');
$dblocal->setQuery('SELECT * FROM autobuses');

$dblocal->verConfiguracion();

echo '<pre>';
print_r($dblocal->queryToArray());
echo '</pre>';