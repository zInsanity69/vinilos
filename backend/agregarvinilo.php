<?php

header('Content-Type: application/json;');

include "../config.php";

if (isset($_POST["nombre"], $_POST["artista"], $_POST["descripcion"], $_POST["precio"], $_POST["fecha"]) && isset($_FILES["imagen"])) {
    $nombreVinilo = $_POST["nombre"];
    $nombreArtista = $_POST["artista"];
    $descripcion = $_POST["descripcion"];
    $precio = $_POST["precio"];
    $fecha = $_POST["fecha"];

    $imagen = $_FILES["imagen"];
    $rutaDestino = "../portadas/" . basename($imagen["name"]);

    // Subir la imagen al servidor
    if (move_uploaded_file($imagen["tmp_name"], $rutaDestino)) {
        // Verificar si el artista ya existe en la tabla `artistas`
        $sqlBuscarArtista = "SELECT id FROM artistas WHERE artista = ?";
        $stmtBuscarArtista = $con->prepare($sqlBuscarArtista);
        $stmtBuscarArtista->bind_param("s", $nombreArtista);
        $stmtBuscarArtista->execute();
        $resultadoArtista = $stmtBuscarArtista->get_result();

        if ($resultadoArtista->num_rows > 0) {
            // Si el artista existe, obtener su ID
            $filaArtista = $resultadoArtista->fetch_assoc();
            $idArtista = $filaArtista["id"];
        } else {
            // Si el artista no existe, insertarlo en la tabla `artistas`
            $sqlInsertarArtista = "INSERT INTO artistas (artista) VALUES (?)";
            $stmtInsertarArtista = $con->prepare($sqlInsertarArtista);
            $stmtInsertarArtista->bind_param("s", $nombreArtista);

            if ($stmtInsertarArtista->execute()) {
                // Obtener el ID del nuevo artista insertado
                $idArtista = $stmtInsertarArtista->insert_id;
            } else {
                echo json_encode(["success" => false, "message" => "Error al insertar el artista"]);
                exit;
            }
        }

        $rutaDestino = "/portadas/" . basename(trim($imagen["name"]));

        // Insertar el vinilo en la tabla `vinilos`
        $sqlInsertarVinilo = "INSERT INTO discos (nombre, artista, descripcion, precio, fecha, portada, publicacion) 
                              VALUES (?, ?, ?, ?, ?, ?, 0)";
        $stmtInsertarVinilo = $con->prepare($sqlInsertarVinilo);
        $stmtInsertarVinilo->bind_param("sissss", $nombreVinilo, $idArtista, $descripcion, $precio, $fecha, $rutaDestino);

        if ($stmtInsertarVinilo->execute()) {
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["success" => false, "message" => "Error al insertar el vinilo"]);
        }
    } else {
        echo json_encode(["success" => false, "message" => "Error al subir la imagen"]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Datos incompletos"]);
}
?>
