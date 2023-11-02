<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Citas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body>

    <!--navbar-->


    <!--Title-->
    <div class="container mt-3">
        <h1 class="text-center">Lista de Citas</h1>
    </div>

    <!--Table-->
    <div class="container">
        <div class="container mb-3">
            <a href="ABM/Agregar.Cita.php" class="btn btn-primary">Agregar</a>
            <a href="" class="btn btn-secondary">Volver</a>
        </div>
        <!-- Campo de búsqueda -->
        <div class="mb-3">
            <input type="text" id="searchInput" class="form-control" placeholder="Buscar Cliente">
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="table-dark table-header">
                    <tr>
                        <th scope="col">IdCita</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Servicio</th>
                        <th scope="col">Empleado</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Hora</th>
                        <th scope="col">Estado</th>
                        <th class="text-center" scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require("../Config/Conexion.php");

                    $sql = $conexion->query("SELECT C.idCita, CONCAT(CLT.nombre, ' ', CLT.apellido) AS cliente, S.nombre AS servicio, CONCAT(E.nombre, ' ', E.apellido) AS empleado, C.fecha, C.hora, C.estado
                    FROM citas C
                    INNER JOIN clientes CLT ON C.idCliente = CLT.idCliente
                    INNER JOIN servicios S ON C.idServicio = S.idServicio
                    INNER JOIN empleados E ON C.idEmpleado = E.idEmpleado
                    ORDER BY C.fecha DESC;");

                    while ($resultado = $sql->fetch_assoc()) {
                        ?>
                        <tr>
                            <th scope="row">
                                <?php echo $resultado['idCita'] ?>
                            </th>
                            <td>
                                <?php echo $resultado['cliente'] ?>
                            </td>
                            <td>
                                <?php echo $resultado['servicio'] ?>
                            </td>
                            <td>
                                <?php echo $resultado['empleado'] ?>
                            </td>
                            <td>
                                <?php echo $resultado['fecha'] ?>
                            </td>
                            <td>
                                <?php echo $resultado['hora'] ?>
                            </td>
                            <td scope="row">
                                <?php
                                $estado = $resultado['estado'];
                                if ($estado === 'Programada') {
                                    echo 'Programada <i class=" ms-3  bi bi-clock-fill text-primary"></i>';
                                } elseif ($estado === 'Cancelada') {
                                    echo 'Cancelada <i class=" ms-4  bi bi-x-square-fill text-danger"></i>';
                                } elseif ($estado === 'Completada') {
                                    echo 'Completada <i class=" ms-3  bi bi-check-square-fill text-success"></i>';
                                }
                                ?>
                            </td>


                            <td class="d-flex justify-content-center" style="gap: 1rem; padding: 1.5rem 0.5rem;">
                                <a href="ABM/Editar.Cita.php?idCita=<?php echo $resultado['idCita']; ?>"
                                    class="btn btn-warning me-2">Editar</a>
                                <a href="ABM/Eliminar.Cita.php?idCita=<?php echo $resultado['idCita']; ?>"
                                    onclick="return confirm('¿Seguro que desea eliminar esta Cita?');"
                                    class="btn btn-danger">Eliminar</a>
                            </td>
                        </tr>

                        <?php
                    }
                    ?>
                </tbody>
            </table>
            <div id="noRecordsMessage" class="alert alert-warning text-center" style="display: none;">No hay registros
            </div>
        </div>
    </div>

    <!-- footer -->


    <script src="../js/Script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>