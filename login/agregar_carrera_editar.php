<?php
require "conexion.php";

$id_carreras = $_POST['id_carreras'];
$nombre_carrera = addslashes($_POST['nombre_carrera']);


$verificar_carrera = mysqli_query($conectar, "SELECT * FROM carreras WHERE nombre_carrera = '$nombre_carrera' AND id_carreras != '$id_carreras'");

if (mysqli_num_rows($verificar_carrera) > 0) {
    echo '
    <script>
        alert("Esta carrera ya está registrada");
        location.href="editar_carrera.php";
    </script>
    ';
    exit;
}


$actualizar = "UPDATE carreras SET nombre_carrera = '$nombre_carrera' WHERE id_carreras = '$id_carreras'";
$query = mysqli_query($conectar, $actualizar);

if ($query) {
    echo '
    <script>
        alert("La carrera se actualizó correctamente");
        location.href="dashboard_carreras.php";
    </script>
    ';
} else {
    echo '
    <script>
        alert("No se pudo actualizar la carrera en la base de datos");
        location.href="editar_carrera.php";
    </script>
    ';
}
?>
