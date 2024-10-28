<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Panel Administrativo</title>
</head>
<body>
    <div class="container">
        <?php include "menu.php"; ?>

        <div class="content">
            <br>
            <h2>Editar Libro</h2>
            <br>
            <div class="contenedor_boton">
                <a href="dashboard_libros.php"><button class="btn">Regresar</button></a>
            </div>
            <br><br>

            <div>
                <?php
                include 'conexion.php'; // Conexión a la base de datos

                // Validar y sanitizar el id_libro
                if (isset($_GET['id'])) {
                    $id_libro = mysqli_real_escape_string($conectar, $_GET['id']);
                    
                    // Consulta para obtener el libro
                    $verlibros = "SELECT * FROM libros WHERE id_libro = '$id_libro'";
                    $resultado = mysqli_query($conectar, $verlibros);
                    if (!$resultado || mysqli_num_rows($resultado) == 0) {
                        echo '<script>
                            alert("Error: Libro no encontrado.");
                            location.href="dashboard_libros.php";
                        </script>';
                        exit; // Salir si hay un error en la consulta
                    }
                    $fila = $resultado->fetch_array();

                    // Consulta de autores
                    $ver_autor = "SELECT * FROM autores";
                    $resultadoautor = mysqli_query($conectar, $ver_autor);
                    if (!$resultadoautor) {
                        echo "Error en la consulta de autores";
                        exit; // Salir si hay un error en la consulta
                    }

                    // Consulta de carreras
                    $ver_carrera = "SELECT * FROM carreras";
                    $resultadocarrera = mysqli_query($conectar, $ver_carrera);
                    if (!$resultadocarrera) {
                        echo "Error en la consulta de carreras";
                        exit; // Salir si hay un error en la consulta
                    }
                } else {
                    echo '<script>
                        alert("Faltan datos para editar el libro.");
                        location.href="dashboard_libros.php";
                    </script>';
                    exit;
                }
                ?>

                <form action="agregar_libro_editar.php" method="post">
                    <input type="hidden" name="id_libro" value="<?php echo $fila['id_libro']; ?>"> <!-- Campo oculto para el ID del libro -->
                    
                    <input type="text" name="titulo" placeholder="Insertar Titulo del Libro" value="<?php echo $fila['titulo']; ?>" disabled>
                    <br><br>

                    <select name="autor" required>
                        <?php 
                        $variable_autor = $fila["autor"];
                        while ($filaautor = $resultadoautor->fetch_array()) {
                        ?>
                        <option value="<?php echo $filaautor["id_autor"]; ?>" <?php if ($filaautor["id_autor"] == $variable_autor) echo "selected"; ?>>
                            <?php echo $filaautor["nombre"]; ?>
                        </option>
                        <?php } ?>
                    </select>
                    <br><br>

                    <input type="text" name="anio" placeholder="Insertar Año" value="<?php echo $fila["anio"]; ?>" required>
                    <br><br>

                    <input type="text" name="editorial" placeholder="Insertar Editorial" value="<?php echo $fila["editorial"]; ?>" required>
                    <br><br>

                    <select name="carrera" required>
                        <option value="" disabled>Selecciona la Carrera</option>
                        <?php while ($filacarrera = $resultadocarrera->fetch_array()) { ?>
                        <option value="<?php echo $filacarrera["id_carreras"]; ?>" <?php if ($filacarrera["id_carreras"] == $fila["carrera"]) echo "selected"; ?>>
                            <?php echo $filacarrera["nombre_carrera"]; ?>
                        </option>
                        <?php } ?>
                    </select>
                    <br><br>

                    <div class="contenedor_botons">
                        <button class="btn" type="submit">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
