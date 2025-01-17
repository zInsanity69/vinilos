<?php

header('Content-Type: application/json; charset=utf-8');

include "./config.php";

session_start();

$correo = $_POST["email"];
$pass = $_POST["pass"];


$slq = "SELECT nombre, rol FROM usuarios WHERE " . $correo .  " AND " . $pass;
$result = $con -> query($slq);

if ($result->num_rows > 0) {

    if ($row = $result->fetch_assoc()) {

        $_SESSION["nombre"] = $row["nombre"];
        $_SESSION["rol"] = $rol["rol"];

        echo json_encode(['success' => true]);
        
    } else {
        
        echo json_encode(['success' => false]);
}

}





?>