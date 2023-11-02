<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agregar Cita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-3">
        <h1 class="text-center">Agregar Cita</h1>
    </div>

    <div class="container mt-3">
        <form action="Insertar.Cita.php" method="post">

            <div class="m-auto">
                <div class="">
                    <label for="IDCliente" class="form-label">Cliente</label>
                    <select class="form-select mb-3" id="IDCliente" name="IDCliente">
                        <option selected disabled>--Seleccionar Ciente--</option>
    
                        <?php
                        include("../../Config/Conexion.php");
    
                        $sql = $conexion->query("SELECT idCliente, CONCAT(nombre, ' ',apellido) AS cliente FROM clientes;");
    
                        while ($resultado = $sql->fetch_assoc()) {
                            echo "<option value='" . $resultado['idCliente'] . "'>" . $resultado['cliente'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <a href="../../Clientes/Cliente.php" class="btn btn-primary">Registrar</a>
            </div>

            <label for="IDEmpleado" class="form-label">Empleado</label>
            <select class="form-select mb-3" id="IDEmpleado" name="IDEmpleado">
                <option selected disabled>--Seleccionar Empleado--</option>

                <?php
                include("../../Config/Conexion.php");

                $sql = $conexion->query("SELECT idEmpleado, CONCAT(nombre, ' ',apellido) AS empleado FROM empleados;");

                while ($resultado = $sql->fetch_assoc()) {
                    echo "<option value='" . $resultado['idEmpleado'] . "'>" . $resultado['empleado'] . "</option>";
                }
                ?>
            </select>


            <label for="IDServicio" class="form-label">Servicio</label>
            <select class="form-select mb-3" id="IDServicio" name="IDServicio">
                <option selected disabled>--Seleccionar Servicio--</option>
                <?php
                include("../../Config/Conexion.php");
                $sql = $conexion->query("SELECT idServicio, nombre, descripcion, duracion, precio FROM servicios;");
                while ($resultado = $sql->fetch_assoc()) {
                    echo "<option value='" . $resultado['idServicio'] . "' data-precio='" . $resultado['precio'] . "' data-hora='" . $resultado['duracion'] . "'>" . $resultado['nombre'] . "</option>";
                }
                ?>
            </select>

            <div class="mb-3">
                <label for="Precio" class="form-label">Precio</label>
                <input type="number" disabled class="form-control" id="Precio" name="Precio" required maxlength="255">
            </div>

            <div class="mb-3">
                <label for="Duracion" class="form-label">Duracion</label>
                <input type="number" disabled class="form-control" id="Duracion" name="Duracion" required
                    maxlength="20">
            </div>

            <div class="mb-3">
                <label for="Fecha" class="form-label">Fecha</label>
                <input type="date" class="form-control" id="Fecha" name="Fecha" required maxlength="255">
            </div>

            <div class="mb-3">
                <label for="Hora" class="form-label">Hora</label>
                <input type="time" class="form-control" id="Hora" name="Hora" required maxlength="255">
            </div>

            <div class="text-center mb-3">
                <button type="submit" class="btn btn-primary">Agregar</button>
                <a href="../Cita.php" class="btn btn-secondary">Volver</a>
            </div>

        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <script>
        document.getElementById('IDServicio').addEventListener('change', function () {
            var select = this;
            var selectedOption = select.options[select.selectedIndex];
            var precio = selectedOption.getAttribute('data-precio');
            var hora = selectedOption.getAttribute('data-hora');

            // Actualizar los campos de precio y hora
            document.getElementById('Precio').value = precio;
            document.getElementById('Duracion').value = hora;
        });
    </script>

</body>

</html>