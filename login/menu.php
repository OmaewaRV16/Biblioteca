<?php 
require "seguridad.php";
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$usuario = $_SESSION['username']; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styleindex.css">
    <title>Document</title>
</head>
<body>
<div class="sidebar">
    <div class="menu">
    <img class="logotec" src="imagenes/logo.gif" alt="">
    <h4><?php echo $usuario; ?></h4>
    <br>
    <ul>
        <li><a href="panel_administrativo.php"><button class="btn">Inicio</button></a></li>
        <li><a href="dashboard_autores.php"><button class="btn">Autores</button></a></li>
        <li><a href="dashboard_carreras.php"><button class="btn">Carreras</button></a></li>
        <li><a href="dashboard_libros.php"><button class="btn">Libros</button></a></li>
        <li><a href="dashboard_usuarios.php"><button class="btn">Usuarios</button></a></li>
        <li><a href="salir.php"><button class="btn">Salir</button></a></li>
    </ul>
    </div>
</div>
</body>
</html>
