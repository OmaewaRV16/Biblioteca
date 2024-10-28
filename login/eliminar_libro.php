<?php
include "conexion.php";

$id_libro = $_GET["id"];

$consulta = "DELETE FROM libros WHERE id_libro = '$id_libro' ";
$resultado = mysqli_query($conectar, $consulta);
if ($resultado) {
    echo '
    <script>
    alert("Se ha eliminado tu usuario de manera correcta");
    location.href = "dashboard_libros.php";
    </script>
    ';
}
?>