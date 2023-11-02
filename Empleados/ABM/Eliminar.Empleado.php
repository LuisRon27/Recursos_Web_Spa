<?php
require("../../Config/Conexion.php");

if (isset($_GET['idEmpleado'])) {
    $empleadoId = $_GET['idEmpleado'];

    // Realiza la eliminación del empleado
    $sql = "DELETE FROM empleados WHERE idEmpleado = $empleadoId";
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado) {
        header("Location: ../Empleado.php");
    } else {
        echo "Error al eliminar el Empleado: " . mysqli_error($conexion);
    }
} else {
    echo "IDEmpleado no proporcionado.";
}
?>