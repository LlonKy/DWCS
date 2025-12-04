<?php
    $provincias = $data['provincias'] ?? [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escuelas</title>
</head>
<body>
    <h1>Listado de Escuelas de Galicia</h1>
    <form action="?controller=EscuelaController&action=listaEscuelas" method="POST">
           <label for="f_provincia">Provincia:</label>
            <select name="cod_provincia" id="f_provincia">
                <option value="">-- Todas --</option>
                <?php foreach ($provincias as $p): ?>
                    <option value="<?= $p->getCodProvincia(); ?>"
                        <?= (isset($_REQUEST['cod_provincia']) && $_REQUEST['cod_provincia'] == $p->getCodProvincia()) ? 'selected' : '' ?>>

                        <?= htmlspecialchars($p->getNombre()); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        <select name="cod_municipio" id="f_municipio">
            <option value="">-- Todos --</option>
            <?php
            $municipios = $data['municipios'];
            foreach ($municipios as $m) {
                echo "<option value='$m->codMunicipio'>$m->nombre</option>";
            }
    
            ?>
        </select>
        <label for="nombre">Filtrar por nombre</label>
        <input type="text" name="nombre" id="nombre">
        <label for="enviar">Filtrar</label>
        <input type="submit" id="enviar" value="Enviar">

        <?= "<a href='?controller=EscuelaController&action=altaEscuela'>Añadir Escuela</a> "?>

    </form>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Direccion</th>
            <th>Municipio</th>
            <th>Hora Apertura</th>
            <th>Hora Cierre</th>
            <th>Comedor</th>
            <th>Acciones</th>
        </tr>
        <?php
            $escuelas = $data['escuelas'];
            foreach ($escuelas as $row) {
            echo "<tr>";
            echo "<td> " . $row->nombre . " </td>";
            echo "<td> " . $row->direccion . " </td>";
            echo "<td> " . $row->nombre_municipio . " </td>";
            echo "<td> " . $row->horaApertura . " </td>";
            echo "<td> " . $row->horaCierre . " </td>";
            echo "<td> " . $row->comedor . " </td>";
            echo "<td> <a href='?controller=EscuelaController&action=deleteEscuela&cod_escuela=$row->codEscuela'>Eliminar Escuela</a> </td>";

            echo "</tr>";
            }
        ?>
    </table>

        <!-- ==============================
     SCRIPT AJAX
================================= -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const provinciaSelect = document.getElementById('f_provincia');
            const municipioSelect = document.getElementById('f_municipio');

            provinciaSelect.addEventListener('change', function () {
                const codProvincia = this.value;

                // Limpiar municipios
                municipioSelect.innerHTML = '<option value="">-- Todos --</option>';



                // Petición AJAX
                fetch(`?controller=MunicipioController&action=getMunicipiosProvinciaJSON&cod_provincia=${codProvincia}`)
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(m => {
                            const option = document.createElement('option');
                            option.value = m.cod_municipio;
                            option.textContent = m.nombre;
                            municipioSelect.appendChild(option);
                        });
                    })
                    .catch(err => console.error("Error cargando municipios: ", err));
            });
        });
    </script>
</body>
</html>