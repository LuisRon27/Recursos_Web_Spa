<?php
// Incluye el archivo de configuración de la base de datos
require("../../Config/Conexion.php");

// Verifica si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera los valores del formulario
    $IDEmpleado = $_POST['IDEmpleado'];
    $Nombre = $_POST['Nombre'];
    $Apellido = $_POST['Apellido'];
    $Email = $_POST['Email'];
    $Telefono = $_POST['Telefono'];
    $Cargo = $_POST['Cargo'];

    // Query SQL para actualizar el Empleado
    $sql = "UPDATE empleados SET
        nombre = '$Nombre',
        apellido = '$Apellido',
        email = '$Email',
        telefono = '$Telefono',
        cargo = '$Cargo'
        WHERE idEmpleado = $IDEmpleado";

    // Ejecuta la consulta y verifica si se actualizó correctamente
    if ($conexion->query($sql) === TRUE) {
        header("location: ../Empleado.php");
    } else {
        echo "Error al actualizar el Empleado: " . $conexion->error;
    }

    // Cierra la conexión a la base de datos
    $conexion->close();
} else {
    echo "No se envió el formulario.";
}
?>