<?php
include("BaseDeDatos.php");
include("DBMySql.php");
include("DBConfig.php");

$dblocal = new DBMySql($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME, $DB_PORT, 'mysql');