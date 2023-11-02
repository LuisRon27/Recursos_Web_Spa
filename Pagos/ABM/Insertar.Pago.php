<?php
require("../../Config/Conexion.php");

$IDCita = $_POST['IDCliente'];
$Fecha = $_POST['Fecha']; 
$MetodoPago = $_POST['MetodoPago']; 

// Query SQL para insertar en la tabla pagos
$sql = "INSERT INTO pagos (idCita, fecha, metodo_pago) 
        VALUES (?, ?, ?)";

// Query SQL para actualizar el Estado a 'Completada' en la tabla citas
$sql2 = "UPDATE citas SET estado = 'Completada' WHERE idCita = ?";

// Comienza una transacción
$conexion->begin_transaction();

// Prepara y ejecuta la primera consulta
$stmt = $conexion->prepare($sql);

if ($stmt) {
    $stmt->bind_param("iss", $IDCita, $Fecha, $MetodoPago);

    if ($stmt->execute()) {
        // Prepara y ejecuta la segunda consulta
        $stmt2 = $conexion->prepare($sql2);
        $stmt2->bind_param("i", $IDCita);

        if ($stmt2->execute()) {
            // Confirma la transacción si ambas consultas tienen éxito
            $conexion->commit();
            header("Location: ../Pago.php");
            exit;
        } else {
            // Si la segunda consulta falla, deshace la transacción
            $conexion->rollback();
            echo "Error al actualizar el estado de la cita.";
        }
        $stmt2->close();
    } else {
        // Si la primera consulta falla, no es necesario deshacer la transacción
        echo "Error al guardar los datos del pago.";
    }

    $stmt->close();
} else {
    echo "Error al preparar la consulta.";
}

$conexion->close();
?>
