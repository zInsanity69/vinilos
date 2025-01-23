<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tiendavinilos";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(["mensaje" => "Error al conectar con la base de datos"]));
}



$sql = "SELECT nombre,descripcion,precio,artista,portada,fecha FROM discos ";

$result = $conn->query($sql);
$discos = [];

if ($result->num_rows > 0) {
    while ($fila = $result->fetch_assoc()) {
        $discos[] = $fila;
    }
}
$filas = "";

    foreach ($discos as $disco) {
        $filas .= '<div class="vinylPrint" name="vinylPrint">
            <h4 class="name">'.$disco["nombre"].'</h4>
            <img class="imgContainer" alt="img" src="'.$disco["portada"].'">
            <h6 class="description" name="description">'.$disco["descripcion"].'</h6>
            <h6 class="price" name="price">'.$disco["precio"]."€".'</h6>
            <h6 class="date" name="date">'.$disco["fecha"].'</h6>
        </div>';
}
echo $filas;

$conn->close();


?>