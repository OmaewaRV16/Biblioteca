<?php session_start();
if (isset($_SESSION['autentificado']) == "SI") { { 
    header("Location: panel_administrativo.php");
    }
}
?>
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
        <img class="tecnm2" src="imagenes/logo.gif" alt="">
    </div>
    <div class="frm">
        <form action="autentificar.php" method="post">
            <br>
            <?php
            $errorusuario = isset($_GET['errorusuario']);
            if ($errorusuario == "SI") {
                echo '<div class="error-container">';
                echo '<h3 class="avisoerror">Datos Incorrectos!!!</h3>';
                echo '</div>';
            }
            ?>
            <br>
            <div class="usu">
                <input type="email" name="email" id="prueba" placeholder="Email" required>
            </div>

            <div class="pass">
                <input type="password" name="contrasena" id="prueba" placeholder="Contraseña" required>
            </div>

            <div class="contenedor_botones">
                <button type="submit" name="" class="btninicio">Login</button>
                <br>
            </div>
        </form>
        <br>
        <a href="registrar_usuario.php">Registrarse <i class="fa-solid fa-pencil"></i></a>
        <br><br>
        <a href="../pagina_principal.php">Regresar <i class="fas fa-arrow-left"></i></a>
    </div>
</body>
</html>