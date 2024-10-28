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
            <a href="dashboard_usuarios.php"><button class="btn">Regresar</button></a>
            </div>
            <br><br>

            <?php 
            require "conexion.php";
            $id_usuario = $_GET['id'];

            $verautores = "SELECT * FROM usuarios WHERE id_usuario = '$id_usuario'";
            $resultado = mysqli_query($conectar, $verautores);
            $fila = $resultado -> fetch_array();
            ?>

            <div class="contenedor_usuario">
                <h3>Nombre del usuario  </h3>
                <h4><?php echo $fila["nombres"] . " " . $fila["apellidos"];?></h4>
                <hr>
                <h3>Correo Electronico</h3>
                <h4><?php echo $fila["email"];?></h4>
                <hr>
                <h3>Contraseña</h3>
                <h4><?php echo $fila["contrasena"]?></h4>
                <hr>
                <h3>Fecha de nacimiento</h3>
                <h4><?php echo $fila["fecha_nacimiento"]?></h4>
                <hr>
            </div>
            <br>
            <div class="contenedor_botons">
                    <a href="editar_usuario.php?id=<?php echo $fila['id_usuario']; ?>"><button class="btn">Editar Usuario</button></a>
            </div>
            <br><br>
        </div>
    </div>

    </body>
    </html>