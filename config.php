<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = "localhost";
$user = "root";
$pass = ""; // Tu contraseña de MySQL
$db   = "tiendavinilos";

$con = new mysqli($host, $user, $pass, $db);

if ($con->connect_error) {
    die("Conexión fallida: " . $con->connect_error);
}

?>
