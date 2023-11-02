<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
// Inicia la sesión si no está activa
session_status() === PHP_SESSION_ACTIVE ?: session_start();

// Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // Si el usuario no ha iniciado sesión, redirige a la página de inicio de sesión
    header("Location: ../Login-register/index.php");
    exit(); // Asegura que el script se detenga después de la redirección
}


?>

<body>
    <h1>Empleado</h1>
    <nav>
    <ul>
        <li><a href="">Inicio</a></li>
        <li><a href="">Empleado</a></li>
        <li><a href="../Login-register/assets/php/logout.php">Cerrar sesión</a></li>
    </ul>
</nav>

</body>
</html>
