<?php

require "conexion.php";

$nombre_carrera = addslashes($_POST['nombre_carrera']);

$verificar_carrera = mysqli_query($conectar, "SELECT * FROM carreras WHERE nombre_carrera = '$nombre_carrera'");

if (mysqli_num_rows($verificar_carrera) > 0) {
    echo '
    <script>
        alert("Esta carrera ya está registrada");
        location.href="crear_carrera.php";
    </script>
    ';
    exit;
}

$insertar = "INSERT INTO carreras (nombre_carrera) VALUES ('$nombre_carrera')";
$query = mysqli_query($conectar, $insertar);

if ($query) {
    echo '
    <script>
        alert("La carrera se guardó correctamente");
        location.href="dashboard_carreras.php";
    </script>
    ';
} else {
    echo '
    <script>
        alert("No se pudo guardar la carrera en la base de datos");
        location.href="crear_carrera.php";
    </script>
    ';
}

?>
