<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agregar Pago</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-3">
        <h1 class="text-center">Agregar Pago</h1>
    </div>

    <div class="container mt-3">
        <form action="Insertar.Pago.php" method="post">
            <label for="IDCliente" class="form-label">Cliente</label>
            <select class="form-select mb-3" id="IDCliente" name="IDCliente">
                <option selected disabled>--Seleccionar Cliente--</option>

                <?php
                include("../../Config/Conexion.php");

                $sql = $conexion->query("SELECT C.idCita, CONCAT(CLT.nombre, ' ', CLT.apellido) AS cliente, C.estado, S.precio AS Monto, S.nombre AS Servicio
                FROM citas C, clientes CLT, servicios S
                WHERE C.idCliente = CLT.idCliente
                AND C.idServicio = S.idServicio
                AND estado = 'Programada';");

                while ($resultado = $sql->fetch_assoc()) {
                    echo "<option value='" . $resultado['idCita'] . "' data-monto='" . $resultado['Monto'] . "' data-servicio='" . $resultado['Servicio'] . "'>" . $resultado['idCita'] . " | " . $resultado['cliente'] . "</option>";
                }
                ?>
            </select>

            <label for="MetodoPago" class="form-label">Método de Pago</label>
            <select class="form-select" id="MetodoPago" name="MetodoPago" aria-label="Default select example">
                <option selected>--Seleccionar Método de Pago--</option>
                <option value="Tarjeta de Débito">Tarjeta de Débito</option>
                <option value="Efectivo">Efectivo</option>
                <option value="Pago móvil">Pago móvil</option>
            </select>

            <div class="mb-3">
                <label for="Servicio" class="form-label">Servicio</label>
                <input type="text" disabled class="form-control" id="Servicio" name="Servicio" required maxlength="255"
                    readonly>
            </div>

            <div class="mb-3">
                <label for="Monto" class="form-label">Monto</label>
                <input type="text" disabled class="form-control" id="Monto" name="Monto" required maxlength="255"
                    readonly>
            </div>

            <div class="mb-3">
                <label for="Fecha" class="form-label">Fecha</label>
                <input type="date" class="form-control" id="Fecha" name="Fecha" required maxlength="255">
            </div>


            <div class="text-center mb-3">
                <button onclick="return confirm('¿Desea confirmar el Pago?');" type="submit" class="btn btn-primary">Agregar</button>
                <a href="../Pago.php" class="btn btn-secondary">Volver</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <script>
        // Obtén la fecha actual en el formato deseado (AAAA-MM-DD)
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); // Enero es 0
        var yyyy = today.getFullYear();
        var formattedDate = yyyy + '-' + mm + '-' + dd;

        // Establece la fecha actual como valor predeterminado en el campo de entrada
        document.getElementById('Fecha').value = formattedDate;

        document.getElementById('IDCliente').addEventListener('change', function () {
            var select = this;
            var selectedOption = select.options[select.selectedIndex];
            var monto = selectedOption.getAttribute('data-monto');
            var servicio = selectedOption.getAttribute('data-servicio');

            // Actualizar los campos de monto y servicio
            document.getElementById('Monto').value = monto;
            document.getElementById('Servicio').value = servicio;
        });
    </script>
</body>

</html>