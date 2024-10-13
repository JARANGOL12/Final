<?php
include_once 'empleadoBL.php'; 

if (isset($_GET['id'])) {
    $idEmpleado = $_GET['id'];  
    $empleadoBL = new EmpleadoBL(); 

    // Buscar el empleado usando el ID
    $empleado = $empleadoBL->buscarEmpleado($idEmpleado);

    if (!$empleado) {
        echo "Empleado no encontrado.";
        exit;
    }
} else {
    echo "No se ha proporcionado un ID.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Empleado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>Actualizar Empleado</h1>
        
        <!-- Formulario que envía datos a 'updateEmpleado.php' -->
        <form method="POST" action="updateEmpleado.php">
            <!-- Campo oculto con el ID del empleado -->
            <input type="hidden" name="idEmpleado" value="<?php echo $idEmpleado; ?>">
            <input type="hidden" name="idPersona" value="<?php echo $empleado['idPersona']; ?>">

            <!-- Campos para editar los detalles del empleado -->
            <div class="mb-3">
                <label for="dni" class="form-label">DNI:</label>
                <input type="text" name="dni" class="form-control" value="<?php echo $empleado['dni']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" name="nombre" class="form-control" value="<?php echo $empleado['nombre']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido:</label>
                <input type="text" name="apellido" class="form-control" value="<?php echo $empleado['apellido']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="edad" class="form-label">Edad:</label>
                <input type="number" name="edad" class="form-control" value="<?php echo $empleado['edad']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="codEmpleado" class="form-label">Código de Empleado:</label>
                <input type="text" name="codEmpleado" class="form-control" value="<?php echo $empleado['codEmpleado']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="fechaIngreso" class="form-label">Fecha de Ingreso:</label>
                <input type="date" name="fechaIngreso" class="form-control" value="<?php echo $empleado['fechaIngreso']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="salario" class="form-label">Salario:</label>
                <input type="text" name="salario" class="form-control" value="<?php echo $empleado['salario']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="idCargo" class="form-label">Cargo:</label>
                <input type="text" name="idCargo" class="form-control" value="<?php echo $empleado['idCargo']; ?>" required>
            </div>

            <!-- Botón para enviar los datos -->
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</body>
</html>
