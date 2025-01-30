<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = getenv('MYSQLHOST');
$user = getenv('MYSQLUSER');
$pass = getenv('MYSQLPASSWORD'); // Tu contraseña de MySQL
$db   = getenv('MYSQLDATABASE');

$con = new mysqli($host, $user, $pass, $db);

if ($con->connect_error) {
    die("Conexión fallida: " . $con->connect_error);
}

?>
