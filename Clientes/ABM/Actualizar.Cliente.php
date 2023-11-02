<?php
// Incluye el archivo de configuración de la base de datos
require("../../Config/Conexion.php");

// Verifica si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera los valores del formulario
    $IDCliente = $_POST['IDCliente'];
    $Nombre = $_POST['Nombre'];
    $Apellido = $_POST['Apellido'];
    $Email = $_POST['Email'];
    $Telefono = $_POST['Telefono'];
    $Direccion = $_POST['Direccion'];

    // Query SQL para actualizar el cliente
    $sql = "UPDATE clientes SET
        nombre = '$Nombre',
        apellido = '$Apellido',
        email = '$Email',
        telefono = '$Telefono',
        direccion = '$Direccion'
        WHERE idCliente = $IDCliente";

    // Ejecuta la consulta y verifica si se actualizó correctamente
    if ($conexion->query($sql) === TRUE) {
        header("location: ../Cliente.php");
    } else {
        echo "Error al actualizar el cliente: " . $conexion->error;
    }

    // Cierra la conexión a la base de datos
    $conexion->close();
} else {
    echo "No se envió el formulario.";
}
?>