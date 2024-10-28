<?php
include "conexion.php";

$id = $_GET["id"];

$consulta = "DELETE FROM carreras WHERE id_carreras = '$id' ";
$resultado = mysqli_query($conectar, $consulta);
if ($resultado) {
    echo '
    <script>
    alert("Se ha eliminado tu usuario de manera correcta");
    location.href = "dashboard_carreras.php";
    </script>
    ';
}
?>