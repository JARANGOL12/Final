<?php

include_once 'empleadoBL.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos del formulario
    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $edad = $_POST['edad'];
    $codEmpleado = $_POST['codEmpleado'];
    $fechaIngreso = $_POST['fechaIngreso'];
    $salario = $_POST['salario'];
    $idCargo = $_POST['idCargo'];

    // Crear una instancia de EmpleadoBL
    $empleadosBL = new EmpleadoBL();

    // Llamar al método registrarEmpleado
    $resultado = $empleadosBL->registrarEmpleado($dni, $nombre, $apellido, $edad, $codEmpleado, $fechaIngreso, $salario, $idCargo);
    
    // Verificar el resultado del registro
    if ($resultado) {
        // Si el empleado se guardó con éxito, redirigir a otra página
        header('Location: http://localhost:1234/PROYECTO_PRACTICA/empleado/FrmEmpleado.php');
        exit;
    } else {
        echo "Error al registrar al empleado.";
    }
} else {
    echo "Método de solicitud no permitido.";
}
?>
