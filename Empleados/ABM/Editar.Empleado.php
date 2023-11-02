<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Empleado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <div class="container mt-3">
        <h1 class="text-center">Editar Empleado</h1>
    </div>

    <div class="container mt-3">
        <form action="Actualizar.Empleado.php" method="post">
            <?php
            include_once('../../Config/Conexion.php');

            if (isset($_REQUEST['idEmpleado'])) {
                $empleadoId = $_REQUEST['idEmpleado'];

                $sql = "SELECT * FROM empleados WHERE idEmpleado = $empleadoId";
                $resultado = $conexion->query($sql);

                if ($resultado) {
                    $row = $resultado->fetch_assoc();
                } else {
                    echo "Error en la consulta SQL: " . $conexion->error;
                }
            } else {
                echo "No se proporcionó el ID del empleado.";
            }
            ?>

            <input type="hidden" class="form-control" id="IDEmpleado" name="IDEmpleado" required maxlength="255"
                value="<?php echo $row['idEmpleado']; ?>">

            <div class="mb-3">
                <label for="Nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="Nombre" name="Nombre" required maxlength="255"
                    value="<?php echo $row['nombre']; ?>">
            </div>

            <div class="mb-3">
                <label for="Apellido" class="form-label">Apellido</label>
                <input type="text" class="form-control" id="Apellido" name="Apellido" required maxlength="255"
                    value="<?php echo $row['apellido']; ?>">
            </div>

            <div class="mb-3">
                <label for="Email" class="form-label">Email</label>
                <input type="email" class="form-control" id="Email" name="Email" required maxlength="255"
                    value="<?php echo $row['email']; ?>">
            </div>

            <div class="mb-3">
                <label for="Telefono" class="form-label">Teléfono</label>
                <input type="text" class="form-control" id="Telefono" name="Telefono" required maxlength="20"
                    value="<?php echo $row['telefono']; ?>">
            </div>

            <div class="mb-3">
                <label for="Cargo" class="form-label">Cargo</label>
                <input type="text" class="form-control" id="Cargo" name="Cargo" required maxlength="255"
                    value="<?php echo $row['cargo']; ?>">
            </div>

            <div class="text-center mb-3">
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="../Empleado.php" class="btn btn-secondary">Volver</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>