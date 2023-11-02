<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Servicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <div class="container mt-3">
        <h1 class="text-center">Editar Servicio</h1>
    </div>

    <div class="container mt-3">
        <form action="Actualizar.Servicio.php" method="post">
            <?php
            include_once('../../Config/Conexion.php');

            if (isset($_REQUEST['idServicio'])) {
                $servicioId = $_REQUEST['idServicio'];

                $sql = "SELECT * FROM servicios WHERE idServicio = $servicioId";
                $resultado = $conexion->query($sql);

                if ($resultado) {
                    $row = $resultado->fetch_assoc();
                } else {
                    echo "Error en la consulta SQL: " . $conexion->error;
                }
            } else {
                echo "No se proporcionó el ID del servicio.";
            }
            ?>

            <input type="hidden" class="form-control" id="IdServicio" name="IdServicio" required maxlength="255"
                value="<?php echo $row['idServicio']; ?>">

            <div class="mb-3">
                <label for="Nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="Nombre" name="Nombre" required maxlength="255"
                    value="<?php echo $row['nombre']; ?>">
            </div>

            <div class="mb-3">
                <label for="Precio" class="form-label">Precio</label>
                <input type="number" class="form-control" id="Precio" name="Precio" required  value="<?php echo $row['precio']; ?>">
            </div>

            <div class="mb-3">
                <label for="Duracion" class="form-label">Duracion</label>
                <input type="number" class="form-control" id="Duracion" name="Duracion" required maxlength="255"  value="<?php echo $row['duracion']; ?>">
            </div>


            <div class="mb-3">
                <label for="Descripcion" class="form-label">Descripcion</label>
                <textarea class="form-control" name="Descripcion" id="Descripcion" rows="3"><?php echo $row['descripcion']; ?></textarea>
            </div>

            <div class="text-center mb-3">
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="../Servicio.php" class="btn btn-secondary">Volver</a>
            </div>
        </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>