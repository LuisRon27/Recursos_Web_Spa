<?php
require("../../Config/Conexion.php");

if (isset($_GET['idCliente'])) {
    $clienteId = $_GET['idCliente'];

    // Realiza la eliminación del cliente
    $sql = "DELETE FROM clientes WHERE idCliente = $clienteId";
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado) {
        header("Location: ../Cliente.php");
    } else {
        echo "Error al eliminar el cliente: " . mysqli_error($conexion);
    }
} else {
    echo "IDCliente no proporcionado.";
}
?>