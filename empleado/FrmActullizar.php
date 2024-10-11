<?php
if (isset($_GET['key'])) {
    $idPersona = $_GET['key'];  // Obtener el ID desde la URL
    $empleadoBL = new EmpleadoBL(); // Instanciar EmpleadoBL

    // Utilizar buscarEmpleado para obtener los datos del empleado
    $empleado = $empleadoBL->buscarEmpleado($idPersona);  
    
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Empleado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>
<body>
    <div class ="container">
    <h1>Actualizar Empleado</h1>
    <form method="POST" action="updateEmpleado.php">
    <input type="hidden" name="idPersona" value="<?php echo $empleado['idPersona']; ?>">


    <label for="dni">DNI:</label>
    <input type="text" name="dni" value="<?php echo $empleado['dni']; ?>" required>

    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" value="<?php echo $empleado['nombre']; ?>" required>

    <label for="apellido">Apellido:</label>
    <input type="text" name="apellido" value="<?php echo $empleado['apellido']; ?>" required>

    <label for="edad">Edad:</label>
    <input type="text" name="edad" value="<?php echo $empleado['edad']; ?>" required>

    <label for="codEmpleado">Código de Empleado:</label>
    <input type="text" name="codEmpleado" value="<?php echo $empleado['codEmpleado']; ?>" 

    <label for="fechaIngreso">Fecha de Ingreso:</label>
    <input type="date" name="fechaIngreso" value="<?php echo $empleado['fechaIngreso']; ?>" required>

    <label for="salario">Salario:</label>
    <input type="text" name="salario" value="<?php echo $empleado['salario']; ?>" required>

    <label for="idCargo">Cargo:</label>
    <input type="text" name="idCargo" value="<?php echo $empleado['idCargo']; ?>" required>

    <input type="submit" value="Actualizar">
</form>
        </div>
</body>
</html>