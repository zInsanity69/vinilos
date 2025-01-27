<?php

include "../config.php"; 

// Configuración de encabezados
header('Content-Type: application/json; charset=utf-8');// Archivo de configuración con la conexión a la base de datos

session_start();

// Validar si los datos están presentes
if (empty($_POST["email"]) || empty($_POST["pass"])) {
    echo json_encode(['success' => false, 'error' => 'Correo y contraseña son obligatorios']);
    exit;
}

$email = $_POST["email"];
$pass = $_POST["pass"];

// Consulta SQL preparada para evitar inyecciones
$sql = "SELECT nombre, rol FROM usuarios WHERE correo = ? and pass = ?";
$stmt = $con->prepare($sql);

if (!$stmt) {
    echo json_encode(['success' => false, 'error' => 'Error en la consulta SQL']);
    exit;
}

$stmt->bind_param("ss", $email , $pass);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

        // Guardar datos del usuario en la sesión
        $_SESSION["nombre"] = $row["nombre"];
        $_SESSION["rol"] = $row["rol"];

        echo json_encode(['success' => true, 'rol' => $row["rol"]]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Contraseña incorrecta']);
    }
    
// Cerrar conexión
$stmt->close();
$con->close();

?>
