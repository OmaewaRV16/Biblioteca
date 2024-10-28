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
            <h2>Crear Libro</h2>
            <br>
            <div class="contenedor_boton">
                <a href="dashboard_libros.php"><button class="btn2">Regresar</button></a>
            </div>
            <br>

            <div class="">
            <?php
            include 'conexion.php';
            $query_autores = "SELECT id_autor, nombre FROM autores";
            $result_autores = mysqli_query($conectar, $query_autores);

            $query_carreras = "SELECT id_carreras, nombre_carrera FROM carreras";
            $result_carreras = mysqli_query($conectar, $query_carreras);
            ?>


                <form action="agregar_libro.php" method="post">
                    <input type="text" name="titulo" placeholder="Insertar Titulo del Libro">
                    <br><br>

                    <select name="autor">
                        <option value="" disabled selected>Escoge el Autor</option>
                        <?php
                        while ($autor = mysqli_fetch_assoc($result_autores)) {
                            echo "<option value='" . $autor['id_autor'] . "'>" . $autor['nombre'] . "</option>";
                        }
                        ?>
                    </select>
                    <br><br>

                    <input type="text" name="anio" placeholder="Insertar Año">
                    <br><br>
                    <input type="text" name="editorial" placeholder="Insertar Editorial">
                    <br><br>

                    <select name="carrera">
                        <option value="" disabled selected>Inserta la Carrera</option>
                        <?php
                        while ($carrera = mysqli_fetch_assoc($result_carreras)) {
                            echo "<option value='" . $carrera['id_carreras'] . "'>" . $carrera['nombre_carrera'] . "</option>";
                        }
                        ?>
                    </select>
                    <br><br>

                    <div class="contenedor_botons">
                        <input class="btn3" type="submit" value="Agregar Libro">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
