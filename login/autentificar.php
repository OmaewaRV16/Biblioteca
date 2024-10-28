<?php 
require "conexion.php";

$email = addslashes($_POST['email']);
$contrasena = addslashes($_POST['contrasena']);

$comparar = "SELECT * FROM usuarios WHERE email = '$email' LIMIT 1";

$resultado = mysqli_query($conectar, $comparar);

if (mysqli_num_rows($resultado) > 0) {

    $fila = $resultado->fetch_array();

    if (password_verify($contrasena, $fila["contrasena"])) {

        session_start();
        $_SESSION['username'] = $email;
        $_SESSION['autentificado'] = "SI";
        
        $_SESSION['tiempo_ultima_actividad'] = time();
        
        header("Location: panel_administrativo.php");
        exit();
    } else {
        echo '
        <script>
        alert("Error al iniciar sesión");
        location.href = "index.php?errorusuario=SI";
        </script>
        ';
    }
} else {
    echo '
    <script>
    alert("Usuario no encontrado");
    location.href = "index.php?errorusuario=SI";
    </script>
    ';
}

mysqli_free_result($resultado);
mysqli_close($conectar);

?>
