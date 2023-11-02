// Función para buscar y filtrar
function filterTable() {
    var input, filter, table, tr, td, i, j, txtValue;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    table = document.querySelector("table");
    tr = table.getElementsByTagName("tr");
    var noRecordsMessage = document.getElementById("noRecordsMessage");

    // Iterar sobre las filas de datos (omitir la fila del encabezado)
    var matchesFound = false;
    for (i = 1; i < tr.length; i++) { // Comienza desde 1 para omitir la fila de encabezado
        tds = tr[i].getElementsByTagName("td");
        var matches = false;

        // Iterar sobre las celdas de cada fila
        for (j = 0; j < tds.length; j++) {
            td = tds[j];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    matches = true;
                    matchesFound = true;
                    break;
                }
            }
        }

        // Mostrar u ocultar la fila según si hay coincidencias
        if (matches) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
    }

    // Mostrar o ocultar el mensaje "No hay registros"
    if (!matchesFound) {
        noRecordsMessage.style.display = "block";
    } else {
        noRecordsMessage.style.display = "none";
    }
}

// Agregar un evento de escucha al campo de búsqueda
document.getElementById("searchInput").addEventListener("input", filterTable);