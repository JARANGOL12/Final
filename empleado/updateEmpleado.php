<?php
include_once 'empleadoBL.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recoger los datos del formulario
    $idEmpleado = $_POST['idEmpleado']; // Agregar este campo
    $idPersona = $_POST['idPersona'];
    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $edad = $_POST['edad'];
    $codEmpleado = $_POST['codEmpleado'];
    $fechaIngreso = $_POST['fechaIngreso'];
    $salario = $_POST['salario'];
    $idCargo = $_POST['idCargo'];

    // Llamar a la lógica de negocio para actualizar
    $empleadoBL = new EmpleadoBL();
    $resultado = $empleadoBL->actualizarEmpleado($idEmpleado, $idPersona, $dni, $nombre, $apellido, $edad, $codEmpleado, $fechaIngreso, $salario, $idCargo);

    if ($resultado) {
        echo "Empleado actualizado con éxito.";
    } else {
        echo "Error al actualizar el empleado.";
    }
} else {
    echo "No se han enviado datos.";
}
?>
