<?php
require("../../Config/Conexion.php");

if (isset($_GET['idCita'])) {
    $citaId = $_GET['idCita'];

    // Realiza la eliminación de la cita
    $sql = "DELETE FROM citas WHERE idCita = $citaId";
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado) {
        header("Location: ../Cita.php");
    } else {
        echo "Error al eliminar la cita: " . mysqli_error($conexion);
    }
} else {
    echo "IDCita no proporcionado.";
}
?>