<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <!--navbar-->


    <!--Title-->
    <div class="container mt-3">
        <h1 class="text-center">Lista de Clientes</h1>
    </div>

    <!--Table-->
    <div class="container">
        <div class="container mb-3">
            <a href="ABM/Agregar.Cliente.php" class="btn btn-primary">Agregar</a>
            <a href="" class="btn btn-secondary">Volver</a>
        </div>
        <!-- Campo de búsqueda -->
        <div class="mb-3">
            <input type="text" id="searchInput" class="form-control" placeholder="Buscar cliente">
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="table-dark text-center table-header">
                    <tr>
                        <th scope="col">IdCliente</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Direccion</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require("../Config/Conexion.php");

                    $sql = $conexion->query("SELECT idCliente, nombre, apellido, email, telefono, direccion FROM clientes ORDER BY idCliente;");

                    while ($resultado = $sql->fetch_assoc()) {
                        ?>
                        <tr>
                            <th scope="row">
                                <?php echo $resultado['idCliente'] ?>
                            </th>
                            <td scope="row">
                                <?php echo $resultado['nombre'] ?>
                            </td>
                            <td scope="row">
                                <?php echo $resultado['apellido'] ?>
                            </td>
                            <td scope="row">
                                <?php echo $resultado['email'] ?>
                            </td>
                            <td scope="row">
                                <?php echo $resultado['telefono'] ?>
                            </td>
                            <td scope="row">
                                <?php echo $resultado['direccion'] ?>
                            </td>
                            <td scope="row" class="d-flex justify-content-center"
                                style="gap: 1rem; padding: 1.5rem 0.5rem;">
                                <a href="ABM/Editar.Cliente.php?idCliente=<?php echo $resultado['idCliente']; ?>"
                                    class="btn btn-warning me-2">Editar</a>
                                <a href="ABM/Eliminar.Cliente.php?idCliente=<?php echo $resultado['idCliente']; ?>"
                                onclick="return confirm('¿Seguro que desea eliminar este cliente?');" class="btn btn-danger">Eliminar</a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        <div id="noRecordsMessage" class="alert alert-warning text-center" style="display: none;">No hay registros</div>
        </div>
    </div>

    <!-- footer -->


    <script src="../js/Script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>