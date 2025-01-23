<?php

header('Content-Type: application/json;');
// Incluir el archivo de configuración para la base de datos
include "../config.php";

// Comprobar si los parámetros 'id' y 'estado' están definidos
if (isset($_POST['id']) && isset($_POST['estado'])) {
    $id = $_POST['id'];
    $estado = $_POST['estado'];

    // Consulta SQL para actualizar el estado del disco (campo booleano)
    $sql = "UPDATE discos SET publicacion = ? WHERE id = ?";

    // Preparar la consulta
    if ($stmt = $con->prepare($sql)) {
        // Vincular los parámetros
        $stmt->bind_param("si", $estado, $id);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            // Respuesta exitosa
            echo json_encode(['success' => true]);
        } else {
            // Respuesta fallida
            echo json_encode(['success' => false,]);
        }

        // Cerrar la declaración
        $stmt->close();
    } else {
        echo json_encode(['success' => false]);
    }
} else {
    echo json_encode(['success' => false]);
}

// Cerrar la conexión
$con->close();
?>
