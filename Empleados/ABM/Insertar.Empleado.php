<?php
require("../../Config/Conexion.php");

$Nombre = $_POST['Nombre'];
$Apellido = $_POST['Apellido'];
$Email = $_POST['Email'];
$Telefono = $_POST['Telefono'];
$Cargo = $_POST['Cargo'];

$sql = "INSERT INTO empleados (nombre, apellido, email, telefono, cargo ) 
        VALUES (?, ?, ?, ?, ?)";

$stmt = $conexion->prepare($sql);

if ($stmt) {
    $stmt->bind_param("sssss", $Nombre, $Apellido, $Email, $Telefono, $Cargo);

    if ($stmt->execute()) {
        header("Location: ../Empleado.php"); 
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