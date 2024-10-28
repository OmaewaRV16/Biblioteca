<?php
require "conexion.php";
if (
    isset($_POST['id_libro'], $_POST['autor'], $_POST['anio'], 
          $_POST['editorial'], $_POST['carrera'])
) {

    $id_libro = $_POST['id_libro'];
    $autor = $_POST['autor'];
    $anio = $_POST['anio'];
    $editorial = $_POST['editorial'];
    $carrera = $_POST['carrera'];

    $verificar_carrera = $conectar->prepare("SELECT * FROM carreras WHERE id_carreras = ?");
    $verificar_carrera->bind_param('i', $carrera);
    $verificar_carrera->execute();
    $resultado = $verificar_carrera->get_result();

    if ($resultado->num_rows == 0) {
        echo '<script>
            alert("La carrera seleccionada no existe.");
            location.href="editar_libro.php?id=' . $id_libro . '";
        </script>';
        exit;
    }


    $consulta = "
        UPDATE libros 
        SET autor = ?, anio = ?, editorial = ?, carrera = ? 
        WHERE id_libro = ?";

    $stmt = $conectar->prepare($consulta);
    $stmt->bind_param('iissi', $autor, $anio, $editorial, $carrera, $id_libro);

    if ($stmt->execute()) {
        echo '<script>
            alert("Libro actualizado exitosamente.");
            location.href="dashboard_libros.php";
        </script>';
    } else {
        echo '<script>
            alert("Error al actualizar el libro: ' . $stmt->error . '");
            location.href="editar_libro.php?id=' . $id_libro . '";
        </script>';
    }


    $stmt->close();
    $conectar->close();
} else {
    echo '<script>
        alert("Faltan datos en el formulario.");
        location.href="editar_libro.php?id=' . $_POST['id_libro'] . '";
    </script>';
}
?>
