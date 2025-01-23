<?php

include "./config.php";

// Iniciar la sesión
session_start();

// Verificar si el usuario tiene un rol de administrador
if (!isset($_SESSION["rol"]) || $_SESSION["rol"] != 1) {
    header("Location: ./Login.html");
    exit; // Asegurarse de que no se ejecute el resto del código si la redirección ocurre
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Vinilos</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h1 class="text-center">Bienvenido al Catálogo de Vinilos</h1>

    <!-- Buscador y filtros -->
    <div class="my-4 d-flex justify-content-between">
        <div class="form-group w-50">
            <label for="buscar">Buscar</label>
            <input type="text" id="buscar" class="form-control" placeholder="Introduce un nombre">
        </div>
        <div class="form-check align-self-center">
            <input type="checkbox" id="filtroMostrar" class="form-check-input">
            <label for="filtroMostrar" class="form-check-label">Solo publicados</label>
        </div>
    </div>

    <!-- Listado de vinilos -->
    <div class="row listado_vinilos"></div>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<!-- Script personalizado -->
<script src="./backend/js/cargarDiscos.js"></script>

</body>
</html>

