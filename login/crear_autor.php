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
        <a href="dashboard_autores.php"><button class="btn2">Regresar</button></a>
        </div>
        <br>
        <div class="">
            <form action="agregar_autor.php" method="post">
                <input type="text" name="nombre" placeholder="Insertar Nombre de Autor">
                <br><br>
                <input type="text" name="nacionalidad" placeholder="Insertar Nacionalidad">
                <br><br>
                <div class="contenedor_botons">
                <input class="btn3" type="submit">
                </div>
            </form>

        </div>
    </div>
</div>

</body>
</html>