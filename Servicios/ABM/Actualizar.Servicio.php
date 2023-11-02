<?php
// Incluye el archivo de configuración de la base de datos
require("../../Config/Conexion.php");

// Verifica si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera los valores del formulario
    $IdServicio = $_POST['IdServicio'];
    $Nombre = $_POST['Nombre'];
    $Precio = $_POST['Precio'];
    $Duracion = $_POST['Duracion'];
    $Descripcion = $_POST['Descripcion'];


    // Query SQL para actualizar el Servicio
    $sql = "UPDATE servicios SET
        nombre = '$Nombre',
        descripcion = '$Descripcion',
        duracion = $Duracion,
        precio = $Precio
        WHERE idServicio = $IdServicio";

    // Ejecuta la consulta y verifica si se actualizó correctamente
    if ($conexion->query($sql) === TRUE) {
        header("location: ../Servicio.php");
    } else {
        echo "Error al actualizar el Servicio: " . $conexion->error;
    }

    // Cierra la conexión a la base de datos
    $conexion->close();
} else {
    echo "No se envió el formulario.";
}
?>