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
            <h2>Editar Usuario</h2>
            <br>
            <div class="contenedor_boton">
            <a href="dashboard_usuarios.php"><button class="btn">Regresar</button></a>
            </div>
            <br>

            <?php
            require "conexion.php";
            $id_usuario = $_GET['id'];
            
            $verusuario = "SELECT * FROM usuarios WHERE id_usuario = '$id_usuario'";
            $resultado = mysqli_query($conectar, $verusuario);
            $fila = $resultado -> fetch_array();
            ?>

            <div class="frm2">
            <form action="agregar_usuario_editar.php" method="post">
            <br>
            <div class="usu">
                <input type="text" name="nombres" placeholder="Nombres" required value="<?php echo $fila["nombres"]; ?>">
            </div>

            <div class="usu">
            <input type="text" name="apellidos" placeholder="Apellidos" required value="<?php echo $fila["apellidos"]; ?>">
            </div>

            <div class="usu">
                <input type="email" name="email" placeholder="Email" required value="<?php echo $fila["email"]; ?>" >
            </div>

            <div class="pass">
                <input type="password" name="contrasena" placeholder="Contraseña" required value="<?php echo $fila["contrasena"]; ?>">
            </div>

            <div class="usu">
                <p>Fecha de Nacimiento:</p> <br> <input type="date" name="fecha_nacimiento" required value="<?php echo $fila["fecha_nacimiento"]; ?>">
            </div>

            <input type="hidden" name="id_usuario" value="<?php echo $fila["id_usuario"]?>">
            <input type="hidden" name="email" value="<?php echo $fila["email"]?>">

            <br>
            <div class="contenedor_botons">
                <button type="submit" name="" class="btninicio">Editar</button>
                <br>
            </div>
        </form>
        </div>
    </div>

    </body>
    </html>