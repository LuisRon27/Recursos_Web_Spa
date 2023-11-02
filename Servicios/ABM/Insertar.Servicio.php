<?php
require("../../Config/Conexion.php");

$Nombre = $_POST['Nombre'];
$Precio = $_POST['Precio'];
$Duracion = $_POST['Duracion'];
$Descripcion = $_POST['Descripcion'];

$sql = "INSERT INTO servicios (nombre, descripcion, duracion, precio)
        VALUES (?, ?, ?, ?)";

$stmt = $conexion->prepare($sql);

if ($stmt) {
    $stmt->bind_param("ssii", $Nombre, $Descripcion, $Duracion, $Precio);

    if ($stmt->execute()) {
        header("Location: ../Servicio.php"); 
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