<?php

require "conexion.php";

$nombre = addslashes($_POST['nombre']);
$nacionalidad = addslashes($_POST['nacionalidad']);

$verificar_nombre = mysqli_query($conectar, "SELECT * FROM autores WHERE nombre = '$nombre'");

if (mysqli_num_rows($verificar_nombre) > 0) {
    echo '
    <script>
        alert("Esta autor ya está registrada");
        location.href="crear_autor.php";
    </script>
    ';
    exit;
}

$insertar = "INSERT INTO autores (nombre, nacionalidad) VALUES ('$nombre', '$nacionalidad')";
$query = mysqli_query($conectar, $insertar);

if ($query) {
    echo '
    <script>
        alert("El autor se guardó correctamente");
        location.href="dashboard_autores.php";
    </script>
    ';
} else {
    echo '
    <script>
        alert("No se pudo guardar el autor en la base de datos");
        location.href="crear_autor.php";
    </script>
    ';
}

?>