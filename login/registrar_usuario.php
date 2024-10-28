<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styleindex.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Document</title>
</head>
<body>
    <div class="contimg">
        <a href=""><img class="tecnm2" src="imagenes/logo.gif" alt=""></a>
    </div>
    <div class="frm">
        <form action="agregar_usuario.php" method="post">
            <br>
            <div class="usu">
                <input type="text" name="nombres" placeholder="Nombres" id="prueba" required>
            </div>

            <div class="usu">
            <input type="text" name="apellidos" placeholder="Apellidos" id="prueba" required>
            </div>

            <div class="usu">
                <input type="email" name="email" id="prueba" placeholder="Email" required>
            </div>

            <div class="pass">
                <input type="password" name="contrasena" id="prueba" placeholder="Contraseña" required>
            </div>

            <div class="usu">
                <p>Fecha de Nacimiento:</p> <br> <input type="date" name="fecha_nacimiento" id="prueba" required>
            </div>

            <div class="contenedor_botones">
                <button type="submit" name="" class="btninicio">Registrarse</button>
                <br>
            </div>
        </form>
        <br>
        <a href="index.php"><i class="fa-solid fa-arrow-left"></i> Regresar</a>
    </div>
</body>
</html>