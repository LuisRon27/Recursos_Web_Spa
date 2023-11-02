<?php
// Incluye el archivo de conexión a la base de datos MySQL
include("../../../Config/Conexion.php");


// Inicia la sesión
session_start();

$usuario = isset($_POST["usuario"]) ? $_POST["usuario"] : "";
$clave = isset($_POST["clave"]) ? $_POST["clave"] : "";

// Validar y escapar las entradas del usuario
$usuario = mysqli_real_escape_string($conexion, $usuario);

// Consulta SQL para verificar el usuario
$sql = "SELECT * FROM Usuarios WHERE username = '$usuario' AND activo = 1 AND rol IN ('admin', 'empleado', 'usuario')";
$resultado = mysqli_query($conexion, $sql);

if ($resultado && mysqli_num_rows($resultado) > 0) {
    $user = mysqli_fetch_assoc($resultado);

    // Verifica si la contraseña coincide
    if (trim($user['password']) === trim($clave)) {
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $usuario;

        // Redirige al usuario a la página adecuada según su rol
        switch ($user['rol']) {
            case 'admin':
                header("Location: ../../../Admin/Index.Admin.php");
                break;
            case 'usuario':
                header("Location: usuario.php");
                break;
            case 'empleado':
                header("Location: ../../../Empleados/Index.Empleado.php");
                break;
            default:
                echo "Rol no válido";
        }
    } else {
        // Las contraseñas no coinciden, muestra un mensaje de error y redirige al usuario a la página de inicio de sesión
        echo '<script>alert("Usuario y contraseña no coinciden");</script>';
        header("Location: ../../index.php");
        exit();
    }
} else {
    // Usuario no encontrado o no activo, muestra un mensaje de error y redirige al usuario a la página de inicio de sesión
    echo '<script>alert("Usuario no encontrado o no activo");</script>';
    header("Location: ../../index.php");
    exit();
}

// Cierra la conexión a la base de datos si es necesario
mysqli_close($conexion);
?>
