<?php
// Incluye el archivo de configuración de la base de datos
require("../../Config/Conexion.php");

// Verifica si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera los valores del formulario
    $IDCita = $_POST['IDCita'];
    $IDCliente = $_POST['idCliente'];
    $IDEmpleado = $_POST['IDEmpleado'];
    $IDServicio = $_POST['IDServicio'];
    $Fecha = $_POST['Fecha'];
    $Hora = $_POST['Hora'];
    $Estado =  $_POST['Estado'];

    // Query SQL para actualizar 
    $sql = "UPDATE citas SET
        idCliente = $IDCliente,
        idServicio= $IDServicio,
        idEmpleado = $IDEmpleado,
        fecha = '$Fecha',
        hora = '$Hora',
        estado = '$Estado'
        WHERE idCita = $IDCita";

    // Ejecuta la consulta y verifica si se actualizó correctamente
    if ($conexion->query($sql) === TRUE) {
        header("location: ../Cita.php");
    } else {
        echo "Error al actualizar la Cita: " . $conexion->error;
    }

    // Cierra la conexión a la base de datos
    $conexion->close();
} else {
    echo "No se envió el formulario.";
}
?>