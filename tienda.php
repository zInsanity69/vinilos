<?php

    include_once("configuracion.php");

    $sql="SELECT ";




?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/tienda.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Tienda</title>
</head>
<body>
    <header class="headerContainer">
        <h1>Tienda</h1>
    </header>
    <main>
        <div class="vinylContainer" name="vinylContainer" id="vinylContainer">
            <h3>Mira nuestra selección de vinilos</h3>
            <div class="vinylPrint" name="vinylPrint" id="vinylPrint">
                <label for="name">Nombre</label>
                <h4 class="name" id="name" name="name"></h4>
                <img src="<?= $imagen; ?>" alt="<?= $nombre; ?>">
                <label for="description">Descripción</label>
                <h6 class="description" name="description" id="description" ></h6>
                <label for="Price">Precio:</label>
                <h6 class="price" name="price" id="price"></h6>
                <h6 class="date" name="date" id="date"></h6>
            </div>
        </div>
    </main>
<footer>
    <div class="social-media">
        <h3>Redes sociales</h3>
        
    </div>
    <div class="icons">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="24" height="24" stroke-width="2"> <path d="M4 4l11.733 16h4.267l-11.733 -16z"></path> <path d="M4 20l6.768 -6.768m2.46 -2.46l6.772 -6.772"></path> </svg>
    </div>

<div class="container footer line-container">

    <div class="navbar-nav line6 line-footer">
        <ul>
            <li class="nav-item"><a href="#">AVISO LEGAL</a></li>
            <li class="nav-item"><a href="#">POLÍTICA DE COOKIES</a></li>
            <li class="nav-item"><a href="#">CONDICIONES DE CONTRATACIÓN</a></li>
            <li class="nav-item"><a href="#">CONTRATO DE DESENTIMIENTO</a></li>
            <li class="nav-item"><a href="#">CANAL ÉTICO</a></li></ul><p>Copyright © 2024 Vinilea S.L. Todos los derechos reservados.</p></div>
    </div>
</footer>
    
    
</body>
</html>