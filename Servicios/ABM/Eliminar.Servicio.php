<?php
require("../../Config/Conexion.php");

if (isset($_GET['idServicio'])) {
    $servicioId = $_GET['idServicio'];

    // Realiza la eliminación del servicio
    $sql = "DELETE FROM servicios WHERE idServicio = $servicioId";
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado) {
        header("Location: ../Servicio.php");
    } else {
        echo "Error al eliminar el Servicio: " . mysqli_error($conexion);
    }
} else {
    echo "IdServicio no proporcionado.";
}
?>