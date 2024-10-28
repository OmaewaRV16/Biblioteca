<?php
include "conexion.php";

$id_autor = $_GET["id"];

$consulta = "DELETE FROM autores WHERE id_autor = '$id_autor' ";
$resultado = mysqli_query($conectar, $consulta);
if ($resultado) {
    echo '
    <script>
    alert("Se ha eliminado tu usuario de manera correcta");
    location.href = "dashboard_autores.php";
    </script>
    ';
}
?>