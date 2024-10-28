<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$tiempoInactividad = 3600;

if (!isset($_SESSION["autentificado"]) || $_SESSION["autentificado"] != "SI") {
    header("Location: index.php");
    exit();
}

if (isset($_SESSION['tiempo_ultima_actividad'])) {

    $tiempoInactivo = time() - $_SESSION['tiempo_ultima_actividad'];

    if ($tiempoInactivo > $tiempoInactividad) {
        session_unset();
        session_destroy();


        echo "<script>alert('La sesión ha expirado por inactividad.'); window.location.href = 'index.php';</script>";
        exit();
    }
}

$_SESSION['tiempo_ultima_actividad'] = time();
?>
