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
            <?php include "menu.php"?>

        <div class="content">
        <br>
            <h2>Ver Autores</h2>
            <br>
            <div class="contenedor_boton">
            <a href="dashboard_autores.php"><button class="btn2">Regresar</button></a>
            </div>
            <br><br>

            <?php 
            require "conexion.php";
            $id_autor = $_GET['id'];

            $verautores = "SELECT * FROM autores WHERE id_autor = '$id_autor'";
            $resultado = mysqli_query($conectar, $verautores);
            $fila = $resultado -> fetch_array();
            ?>

            <div class="contenedor_usuario">
                <h3>Nombre del Autor</h3>
                <h4><?php echo $fila["nombre"];?></h4>
                <hr>
                <h3>Nacionalidad</h3>
                <h4><?php echo $fila["nacionalidad"];?></h4>
                <hr>
            </div>
        </div>
    </div>

    </body>
    </html>