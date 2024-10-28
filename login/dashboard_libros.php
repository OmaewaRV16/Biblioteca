<?php
include "conexion.php"; 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Panel Administrativo - Libros</title>
    <style>
        .highlight {
            background-color: yellow;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php include "menu.php"; ?>

        <div class="content">
            <br>
            <h2>Libros</h2>
            <br>
            <div class="contenedor_boton">
                <a href="crear_libro.php"><button class="btn2">Crear Libro</button></a>
                <a href="dashboard_libros.php"><button class="btn2">Ver Todos</button></a>
            </div>
            <br>
            <div>
                <div class="contenedor_buscar">
                <h4><a href="<!-- descargar_reporte.php -->">Descargar Reporte (.pdf)</a></h4>
                    <br>
                    <form action="libros.php" method="GET">
                        <input type="search" name="buscar" id="buscar" placeholder="Buscar Libro">
                        <button type="submit" class="btnn">Buscar</button>
                    </form>
                </div>
                <table>
                    <tr>
                        <th>ID Libro</th>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Año</th>
                        <th>Editorial</th>
                        <th>Carrera</th>
                        <th>Ver</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>

                    <?php
                    $limit = 5;
                    $offset = 0;

                    if (isset($_GET['page']) && is_numeric($_GET['page'])) {
                        $page = (int) $_GET['page'];
                        $offset = ($page - 1) * $limit;
                    } else {
                        $page = 1;
                    }

                    $buscar = isset($_GET['buscar']) ? mysqli_real_escape_string($conectar, $_GET['buscar']) : '';

                    $count_query = "SELECT COUNT(*) AS total FROM libros 
                                    INNER JOIN autores ON libros.autor = autores.id_autor
                                    INNER JOIN carreras ON libros.carrera = carreras.id_carreras" . 
                                    ($buscar ? " WHERE libros.titulo LIKE '%$buscar%'" : "");

                    $count_result = mysqli_query($conectar, $count_query);
                    $count_row = mysqli_fetch_assoc($count_result);
                    $total_libros = $count_row['total'];
                    $total_paginas = ceil($total_libros / $limit);

                    $todos_datos = "SELECT * FROM libros 
                                    INNER JOIN autores ON libros.autor = autores.id_autor
                                    INNER JOIN carreras ON libros.carrera = carreras.id_carreras" . 
                                    ($buscar ? " WHERE libros.titulo LIKE '%$buscar%'" : "") . 
                                    " LIMIT $limit OFFSET $offset";

                    $resultado = mysqli_query($conectar, $todos_datos);

                    while ($fila = mysqli_fetch_assoc($resultado)) {
                        // Resalta el texto de búsqueda en el título del libro
                        $titulo = $fila["titulo"];
                        if ($buscar) {
                            $titulo = str_ireplace($buscar, "<span class='highlight'>$buscar</span>", $titulo);
                        }
                    ?>
                        <tr>
                            <td class="tdb"><?php echo $fila["id_libro"]; ?></td>
                            <td><?php echo $titulo; ?></td> <!-- Muestra el título con el texto resaltado -->
                            <td><?php echo $fila["nombre"]; ?></td>
                            <td><?php echo $fila["anio"]; ?></td>
                            <td><?php echo $fila["editorial"]; ?></td>
                            <td><?php echo $fila["nombre_carrera"]; ?></td>
                            <td><a href="ver_libro.php?id=<?php echo $fila['id_libro']; ?>"><i class="fa fa-eye" style="color: black;"></i></a></td>
                            <td><a href="editar_libro.php?id=<?php echo $fila['id_libro']; ?>"><i class="fa fa-pencil-alt" style="color: black;"></i></a></td>
                            <td><a href="#" onClick="validar('eliminar_libro.php?id=<?php echo $fila['id_libro']; ?>')"><i class="fa fa-trash" style="color: black;"></i></a></td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
                
                <div class="pagination">
                    <?php if ($page > 1): ?>
                        <a href="?page=<?php echo $page - 1; ?>&buscar=<?php echo urlencode($buscar); ?>">&laquo; Anterior</a>
                    <?php endif; ?>

                    <?php for ($i = 1; $i <= $total_paginas; $i++): ?>
                        <a href="?page=<?php echo $i; ?>&buscar=<?php echo urlencode($buscar); ?>" 
                           class="<?php echo ($i == $page) ? 'active' : ''; ?>">
                            <?php echo $i; ?>
                        </a>
                    <?php endfor; ?>

                    <?php if ($page < $total_paginas): ?>
                        <a href="?page=<?php echo $page + 1; ?>&buscar=<?php echo urlencode($buscar); ?>">Siguiente &raquo;</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        function validar(url) {
            var eliminar = confirm("¿Deseas eliminar este libro?");
            if (eliminar == true) {
                window.location = url;
            }
        }
    </script>
</body>
</html>
