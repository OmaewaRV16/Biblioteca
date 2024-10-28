<?php

require "conexion.php";

$nombres = addslashes($_POST['nombres']);
$apellidos = addslashes($_POST['apellidos']);
$email = addslashes($_POST['email']);
$contrasena = addslashes($_POST['contrasena']);
$fecha_nacimiento = addslashes($_POST['fecha_nacimiento']);

$contrasena_encriptada = password_hash($contrasena, PASSWORD_DEFAULT);

$verficar_usuario = mysqli_query($conectar, "SELECT * FROM usuarios WHERE email = '$email' ");

if (mysqli_num_rows($verficar_usuario) > 0) {
  echo '
  <script>
    alert("ESTE USUARIO YA ESTA REGISTRADO");
    location.href="alta_usuarios.php";
  </script>

';
  exit;
}

$insertar = "INSERT INTO usuarios (nombres, apellidos, email, contrasena, fecha_nacimiento) VALUES ('$nombres', '$apellidos', '$email', '$contrasena_encriptada', '$fecha_nacimiento')";

$query = mysqli_query($conectar, $insertar);

if ($query) {
    echo '
        <script>
          alert("SI SE GUARDARO LOS DATOS CORRECTAMENTE");
          location.href="dashboard_usuarios.php";
        </script>
  
      ';
  } else {
    echo '
        <script>
          alert("NO SE GUARDO EN LA BASE DE DATOS");
          location.href="alta_usuarios.php";
        </script>
  
      ';
  }


?>