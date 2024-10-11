<?php
include '../cargo/cargoBL.php';
include '../empleado/EmpleadoBL.php';

$bl = new cargoBL();
$lista = $bl->listar();

$empleadoBL = new EmpleadoBL();
$listaEmpleados = $empleadoBL->obtenerEmpleados(); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Empleado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
<div class="container">
    <h1>Registrar Empleado</h1> 

    <form action="saveEmpleado.php" method="post">
        <!-- Campo de Nombre -->
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingresar nombre" required>
        </div>

        <!-- Campo de Apellido -->
        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido:</label>
            <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Ingresar apellido" required>
        </div>

        <!-- Campo de DNI -->
        <div class="mb-3">
            <label for="dni" class="form-label">DNI:</label>
            <input type="number" class="form-control" name="dni" id="dni" placeholder="Ingresar DNI" required>
        </div>

        <!-- Campo de Edad -->
        <div class="mb-3">
            <label for="edad" class="form-label">Edad:</label>
            <input type="number" class="form-control" name="edad" id="edad" placeholder="Ingresar edad" required>
        </div>

        <!-- Campo de CodEmpleado -->
        <div class="mb-3">
            <label for="codEmpleado" class="form-label">CodEmpleado:</label>
            <input type="text" class="form-control" name="codEmpleado" id="codEmpleado" placeholder="Ingresar código de empleado" required>
        </div>

        <div class="mb-3">
            <label for="idCargo" class="form-label">Cargo:</label>
            <select name="idCargo" id="idCargo" class="form-select" required>
                <?php
                // Verificar si la lista contiene cargos y llenarlos en el select
                if (!empty($lista)) {
                    foreach ($lista as $cargo) {
                        echo "<option value='" . htmlspecialchars($cargo['idCargo']) . "'>" . htmlspecialchars($cargo['descripcion']) . "</option>";
                    }
                } else {
                    echo "<option value=''>No hay cargos disponibles</option>";
                }
                ?>
            </select>
        </div>

        <!-- Campo de Fecha de Ingreso -->
        <div class="mb-3">
            <label for="fechaIngreso" class="form-label">Fecha de Ingreso:</label>
            <input type="date" class="form-control" name="fechaIngreso" id="fechaIngreso" required>
        </div>

        <!-- Campo de Salario -->
        <div class="mb-3">
            <label for="salario" class="form-label">Salario:</label>
            <input type="number" step="0.01" class="form-control" name="salario" id="salario" placeholder="Ingresar salario" required>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary mb-3">Guardar</button>
        </div>
    </form>
</div>

<div class="container">
    <h1>Empleados Registrados</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>DNI</th>
                <th>Edad</th>
                <th>Cod Empleado</th>
                <th>Cargo</th>
                <th>Fecha Ingreso </th>
                <th>Salario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        if (!empty($listaEmpleados)) {
            foreach ($listaEmpleados as $empleado) { ?>
                <tr>
                    <td><?= htmlspecialchars($empleado['nombre']); ?></td>
                    <td><?= htmlspecialchars($empleado['apellido']); ?></td>
                    <td><?= htmlspecialchars($empleado['dni']); ?></td>
                    <td><?= htmlspecialchars($empleado['edad']); ?></td>
                    <td><?= htmlspecialchars($empleado['codEmpleado']); ?></td>
                    <td><?= htmlspecialchars($empleado['cargo']); ?></td>
                    <td><?= htmlspecialchars($empleado['fechaIngreso']); ?></td>
                    <td><?= htmlspecialchars($empleado['salario']); ?></td>
                    <td>
                        <a href="actualizarEmpleado.php?id=<?= urlencode($empleado['idEmpleado']); ?>" class="btn btn-primary">Editar</a>
                        <a href="eliminarEmpleado.php?id=<?= urlencode($empleado['idEmpleado']); ?>" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
            <?php } // Cierra el foreach
        } else { ?>
            <tr>
                <td colspan="8" class="text-center">No hay empleados disponibles.</td> <!-- Mensaje cuando no hay empleados -->
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

<script>
    function volver() {
        window.location.assign('http://localhost:8080/sem5/dashboard.php');
    }
</script>
</body>
</html>
