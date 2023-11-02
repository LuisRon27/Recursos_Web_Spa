<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pagos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <!--navbar-->


    <!--Title-->
    <div class="container mt-3">
        <h1 class="text-center">Lista de Pagos</h1>
    </div>

    <!--Table-->
    <div class="container">
        <div class="container mb-3">
            <a href="ABM/Agregar.Pago.php" class="btn btn-primary">Agregar</a>
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
                        <th scope="col">IdPago</th>
                        <th scope="col">IdCita</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Metodo de Pago</th>
                        <th scope="col">Monto</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require("../Config/Conexion.php");

                    $sql = $conexion->query("SELECT P.idPago, P.idCita, CONCAT(CLT.nombre, ' ', CLT.apellido) AS cliente, P.fecha, P.metodo_pago, S.precio AS Monto
                    FROM pagos P, citas C, servicios S, clientes CLT
                    WHERE P.idCita = C.idCita
                    AND C.idServicio = S.idServicio
                    AND C.idCliente = CLT.idCliente
                    ORDER BY P.fecha DESC;");

                    while ($resultado = $sql->fetch_assoc()) {
                        ?>
                        <tr>
                            <th scope="row">
                                <?php echo $resultado['idPago'] ?>
                            </th>
                            <td scope="row">
                                <?php echo $resultado['idCita'] ?>
                            </td>
                            <td scope="row">
                                <?php echo $resultado['cliente'] ?>
                            </td>
                            <td scope="row">
                                <?php echo $resultado['fecha'] ?>
                            </td>
                            <td scope="row">
                                <?php echo $resultado['metodo_pago'] ?>
                            </td>
                            <td scope="row">
                                <?php echo $resultado['Monto'] ?> $
                            </td>

                        </tr>

                        <?php
                    }
                    ?>
                </tbody>
            </table>

            <div class="d-flex justify-content-end me-5">
                <?php
                require("../Config/Conexion.php");

                $sql = $conexion->query("SELECT SUM(S.precio) AS MontoTotal
                FROM pagos P
                JOIN citas C ON P.idCita = C.idCita
                JOIN servicios S ON C.idServicio = S.idServicio
                JOIN clientes CLT ON C.idCliente = CLT.idCliente
                WHERE P.fecha >= DATE_SUB(NOW(), INTERVAL 1 MONTH);
                ");

                while ($resultado = $sql->fetch_assoc()) {
                    ?>
                    <h5 class="me-1" >Total: </h5>
                    <p class="ms-2">
                        <?php echo $resultado['MontoTotal'] ?> $
                    </p>
                    <?php
                }
                ?>
            </div>
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