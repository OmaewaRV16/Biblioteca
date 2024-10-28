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
            <h2>Alta Usuarios</h2>
            <br>
            <div class="contenedor_boton">
            <a href="dashboard_usuarios.php"><button class="btn">Regresar</button></a>
            </div>
            <br>

            <div class="frm2">
            <form action="agregar_usuario_panel.php" method="post">
            <br>
            <div class="usu">
                <input type="text" name="nombres" placeholder="Nombres" required>
            </div>

            <div class="usu">
            <input type="text" name="apellidos" placeholder="Apellidos" required>
            </div>

            <div class="usu">
                <input type="email" name="email" placeholder="Email" required>
            </div>

            <div class="pass">
                <input type="password" name="contrasena" placeholder="Contraseña" required>
            </div>

            <div class="usu">
                <p>Fecha de Nacimiento:</p> <br> <input type="date" name="fecha_nacimiento" required>
            </div>

            <br>
            <div class="contenedor_botons">
                <button type="submit" name="" class="btninicio">Registrar</button>
                <br>
            </div>
        </form>
        </div>
    </div>

    </body>
    </html>