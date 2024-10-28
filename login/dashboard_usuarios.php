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
<div class="container">
    <?php include "menu.php"; ?>

    <div class="content">
        <br>
        <h2>Usuarios</h2>
        <br>
        <div class="contenedor_boton">
            <a href="alta_usuarios.php"><button class="btn2">Crear usuario</button></a>
        </div>

        <div>
            <table>
                <tr>
                    <th>ID</th>
                    <th>NOMBRES</th>
                    <th>APELLIDOS</th>
                    <th>EMAIL</th>
                    <th>VER</th>
                    <th>EDITAR</th>
                    <th>ELIMINAR</th>
                </tr>

                <?php
                include "conexion.php";

                $limit = 5;
                $offset = 0;

                if (isset($_GET['page']) && is_numeric($_GET['page'])) {
                    $page = (int) $_GET['page'];
                    $offset = ($page - 1) * $limit;
                } else {
                    $page = 1;
                }

                $count_query = "SELECT COUNT(*) AS total FROM usuarios";
                $count_result = mysqli_query($conectar, $count_query);
                $count_row = mysqli_fetch_assoc($count_result);
                $total_usuarios = $count_row['total'];
                $total_paginas = ceil($total_usuarios / $limit);

                $todos_datos = "SELECT * FROM usuarios ORDER BY id_usuario ASC LIMIT $limit OFFSET $offset";
                $resultado = mysqli_query($conectar, $todos_datos);

                while ($fila = mysqli_fetch_assoc($resultado)) {
                ?>
                    <tr>
                        <td><?php echo $fila["id_usuario"]; ?></td>
                        <td><?php echo $fila["nombres"]; ?></td>
                        <td><?php echo $fila["apellidos"]; ?></td>
                        <td><?php echo $fila["email"]; ?></td>
                        <td><a href="ver.php?id=<?php echo $fila['id_usuario']; ?>"><i class="fa fa-eye" style="color: black;"></i></a></td>
                        <td><a href="editar_usuario.php?id=<?php echo $fila['id_usuario']; ?>"><i class="fa fa-pencil-alt" style="color: black;"></i></a></td>
                        <td>
                            <a href="#" onClick="validar('eliminar_usuario.php?id=<?php echo $fila['id_usuario']; ?>')"><i class="fa fa-trash" style="color: black;"></i></a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>

            <div class="pagination">
                <?php if ($page > 1): ?>
                    <a href="?page=<?php echo $page - 1; ?>">&laquo; Anterior</a>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $total_paginas; $i++): ?>
                    <a href="?page=<?php echo $i; ?>" class="<?php echo ($i == $page) ? 'active' : ''; ?>">
                        <?php echo $i; ?>
                    </a>
                <?php endfor; ?>

                <?php if ($page < $total_paginas): ?>
                    <a href="?page=<?php echo $page + 1; ?>">Siguiente &raquo;</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<script>
    function validar(url) {
        var eliminar = confirm("¿Deseas eliminar este usuario?");
        if (eliminar == true) {
            window.location = url;
        }
    }
</script>
</body>
</html>
