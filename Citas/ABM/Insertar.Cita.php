<?php
require("../../Config/Conexion.php");

$IDCliente = $_POST['IDCliente'];
$IDEmpleado = $_POST['IDEmpleado'];
$IDServicio = $_POST['IDServicio'];
$Fecha = $_POST['Fecha'];
$Hora = $_POST['Hora'];
$Estado = 'Programada';

$sql = "INSERT INTO citas (idCliente, idEmpleado, idServicio, fecha, hora, estado) 
        VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $conexion->prepare($sql);

if ($stmt) {
    $stmt->bind_param("iiisss", $IDCliente, $IDEmpleado, $IDServicio, $Fecha, $Hora, $Estado);

    if ($stmt->execute()) {
        header("Location: ../Cita.php"); 
        exit;
    } else {
        echo "Error al guardar los datos en la base de datos.";
    }

    $stmt->close();
} else {
    echo "Error al preparar la consulta.";
}

$conexion->close();
?>
