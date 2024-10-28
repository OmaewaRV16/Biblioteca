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
        <?php include "menu.php"?>

    <div class="content">
        <br>
        <h2>Crear Carreras</h2>
        <br>
        <div class="contenedor_boton">
            <a href="dashboard_carreras.php"><button class="btn2">Regresar</button></a>
        </div>
        <br>
        <?php
        require "conexion.php";
        $id_carreras = $_GET['id'];

        $vercarrera = "SELECT * FROM carreras WHERE id_carreras = '$id_carreras'";
        $resultado = mysqli_query($conectar, $vercarrera);
        $fila = $resultado->fetch_array();
        ?>
        <div class="">
            <form action="agregar_carrera_editar.php" method="post">
                <input type="hidden" name="id_carreras" value="<?php echo $id_carreras; ?>">
                <input type="text" name="nombre_carrera" placeholder="Insertar Carrera" value="<?php echo $fila['nombre_carrera']; ?>" >
                <br><br>
                <div class="contenedor_botons">
                    <button class="btn3" type="submit">Editar</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
