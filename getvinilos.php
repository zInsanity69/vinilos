<?php

include "./config.php";

header('Content-Type: application/json;');

// Iniciar la sesión
session_start();

// Habilitar errores (solo para desarrollo)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Verificar si el usuario tiene un rol de administrador
if (!isset($_SESSION["rol"]) || $_SESSION["rol"] != 1) {
    echo json_encode(['success' => false, 'message' => 'Acceso no autorizado']);
    exit;
}

// Verificar conexión a la base de datos
if ($con->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Error de conexión: ' . $conn->connect_error]);
    exit;
}

// Consulta SQL para obtener los vinilos
$sql = "SELECT d.id as id, nombre, descripcion, precio, a.artista as artista, portada, fecha, publicacion  FROM discos d JOIN artistas a ON d.artista = a.id";

// Ejecutar la consulta
$result = $con->query($sql);

if (!$result) {
    echo json_encode(['success' => false, 'message' => 'Error en la consulta: ' . $conn->error]);
    exit;
}

$vinilos = array();

// Verificar si hay resultados
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $vinilos[] = $row;
    }

    // Retornar los vinilos en formato JSON
    echo json_encode(['success' => true, 'vinilos' => $vinilos]);
} else {
    // Si no hay resultados, indicar que no se encontraron vinilos
    echo json_encode(['success' => false, 'message' => 'No se encontraron vinilos.']);
}

// Cerrar la conexión
$con->close();

?>
