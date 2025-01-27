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
        <div class="form-check w-50 align-self-center">
            <input type="text" id="buscar" class="form-control" placeholder="Introduce un nombre">
        </div>
        <div class="form-check align-self-center">
            <!-- Botón para abrir el modal -->
            <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modalAgregarVinilo">Añadir vinilos</button>
        </div>
        <div class="form-check align-self-center">
            <input type="checkbox" id="filtroMostrar" class="form-check-input">
            <label for="filtroMostrar" class="form-check-label">Solo publicados</label>
        </div>
    </div>

    <!-- Listado de vinilos -->
    <div class="row listado_vinilos"></div>
</div>

<!-- Modal para añadir vinilos -->
<div class="modal fade" id="modalAgregarVinilo" tabindex="-1" role="dialog" aria-labelledby="modalAgregarViniloLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAgregarViniloLabel">Añadir Nuevo Vinilo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formAgregarVinilo">
                    <div class="form-group">
                        <label for="nombre">Nombre del Vinilo</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="artista">Artista</label>
                        <input type="text" id="artista" name="artista" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <textarea id="descripcion" name="descripcion" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="precio">Precio</label>
                        <input type="number" id="precio" name="precio" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha">Fecha</label>
                        <input type="date" id="fecha" name="fecha" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="imagen">Imagen</label>
                        <input type="file" id="imagen" name="imagen" class="form-control-file" accept="image/*" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar Vinilo</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<!-- Script personalizado -->
<script src="./backend/js/getvinilos.js"></script>

</body>
</html>

