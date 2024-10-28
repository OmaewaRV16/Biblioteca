<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Ver</title>
</head>
<body>
    <div class="container">
        <?php include "menu.php"; ?>

        <div class="content">
            <br>
            <h2>Ver Autores</h2>
            <br>
            <div class="contenedor_boton">
                <a href="dashboard_libros.php"><button class="btn2">Regresar</button></a>
            </div>
            <br><br>

            <?php 
            require "conexion.php";
            $id_libro = $_GET['id'];

            $todos_datos = "SELECT * FROM libros 
                            INNER JOIN autores ON libros.autor = autores.id_autor 
                            INNER JOIN carreras ON libros.carrera = carreras.id_carreras 
                            WHERE libros.id_libro = '$id_libro'";
            $resultado = mysqli_query($conectar, $todos_datos);

            if ($resultado) {
                if (mysqli_num_rows($resultado) > 0) {
                    $fila = $resultado->fetch_array();
                } else {
                    echo "No se encontraron resultados.";
                }
            } else {
                echo "Error en la consulta: " . mysqli_error($conectar);
            }
            ?>

            <div class="contenedor_usuario">
                <h3>Titulo</h3>
                <h4><?php echo isset($fila["titulo"]) ? $fila["titulo"] : ''; ?></h4>
                <hr>
                <h3>Autor</h3>
                <h4><?php echo isset($fila["nombre"]) ? $fila["nombre"] : ''; ?></h4>
                <hr>
                <h3>Año</h3>
                <h4><?php echo isset($fila["anio"]) ? $fila["anio"] : ''; ?></h4>
                <hr>
                <h3>Editorial</h3>
                <h4><?php echo isset($fila["editorial"]) ? $fila["editorial"] : ''; ?></h4>
                <hr>
                <h3>Carrera</h3>
                <h4><?php echo isset($fila["nombre_carrera"]) ? $fila["nombre_carrera"] : ''; ?></h4>
                <br>
                <div class="contenedor_boton">
                    <a href="editar_libro.php?id=<?php echo isset($fila['id_libro']) ? $fila['id_libro'] : ''; ?>"><button class="btn">Editar</button></a>
                </div>
            </div>
            <br><br><br>
        </div>
    </div>
</body>
</html>
