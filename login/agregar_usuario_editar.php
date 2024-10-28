<?php
require "conexion.php";

$id_usuario = $_POST['id_usuario'];
$nombres = addslashes($_POST['nombres']);
$apellidos = addslashes($_POST['apellidos']);
$email = addslashes($_POST['email']);
$contrasena = addslashes($_POST['contrasena']);
$fecha_nacimiento = addslashes($_POST['fecha_nacimiento']);

$contrasena_encriptada = password_hash($contrasena, PASSWORD_DEFAULT);

$actualizar = "UPDATE usuarios SET nombres = '$nombres', apellidos = '$apellidos', email = '$email', contrasena = '$contrasena_encriptada', fecha_nacimiento = '$fecha_nacimiento' WHERE id_usuario = '$id_usuario'";

$query = mysqli_query($conectar, $actualizar);

if ($query) {
    echo '
        <script>
          alert("SI SE GUARDARO LOS DATOS CORRECTAMENTE");
          location.href="ver.php?id=' . $id_usuario .'";
        </script>
  
      ';
  } else {
    echo '
        <script>
          alert("NO SE GUARDO EN LA BASE DE DATOS");
          location.href="editar_usuario.php?id=' . $id_usuario .'";
        </script>
  
      ';
  }

?>