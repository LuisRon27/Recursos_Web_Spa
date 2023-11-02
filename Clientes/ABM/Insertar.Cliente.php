<?php
require("../../Config/Conexion.php");

$Nombre = $_POST['Nombre'];
$Apellido = $_POST['Apellido'];
$Email = $_POST['Email'];
$Telefono = $_POST['Telefono'];
$Direccion = $_POST['Direccion'];

$sql = "INSERT INTO clientes (nombre, apellido, email, telefono, direccion ) 
        VALUES (?, ?, ?, ?, ?)";

$stmt = $conexion->prepare($sql);

if ($stmt) {
    $stmt->bind_param("sssss", $Nombre, $Apellido, $Email, $Telefono, $Direccion);

    if ($stmt->execute()) {
        header("Location: ../Cliente.php"); 
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