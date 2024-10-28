<?php
require "conexion.php";

// Recoger los datos del formulario
$titulo = addslashes($_POST['titulo']);
$anio = addslashes($_POST['anio']);
$editorial = addslashes($_POST['editorial']);
$autor_id = addslashes($_POST['autor']);  // ID del autor seleccionado
$carrera_id = addslashes($_POST['carrera']);  // ID de la carrera seleccionada

// Verificar que el autor exista
$verificar_autor = mysqli_query($conectar, "SELECT * FROM autores WHERE id_autor = '$autor_id'");
if (mysqli_num_rows($verificar_autor) == 0) {
    echo '
    <script>
        alert("El autor seleccionado no existe.");
        location.href="crear_libro.php";  // Regresar al formulario de crear libro
    </script>
    ';
    exit;
}

// Verificar que la carrera exista
$verificar_carrera = mysqli_query($conectar, "SELECT * FROM carreras WHERE id_carreras = '$carrera_id'");
if (mysqli_num_rows($verificar_carrera) == 0) {
    echo '
    <script>
        alert("La carrera seleccionada no existe.");
        location.href="crear_libro.php";  // Regresar al formulario de crear libro
    </script>
    ';
    exit;
}

// Insertar el nuevo libro en la base de datos
$insertar = "INSERT INTO libros (titulo, anio, editorial, autor, carrera) VALUES ('$titulo', '$anio', '$editorial', '$autor_id', '$carrera_id')";
$query = mysqli_query($conectar, $insertar);

if ($query) {
    echo '
    <script>
        alert("El libro se guardó correctamente");
        location.href="dashboard_libros.php";  // Redirigir a la página del dashboard
    </script>
    ';
} else {
    echo '
    <script>
        alert("No se pudo guardar el libro en la base de datos");
        location.href="crear_libro.php";  // Regresar al formulario de crear libro
    </script>
    ';
}
?>
