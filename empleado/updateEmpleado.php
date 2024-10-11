<?php
include_once 'empleadoBL.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Captura los datos del formulario
    $idPersona = $_POST['idPersona']; // Asegúrate de que este campo esté en el formulario
    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $edad = $_POST['edad'];
    $codEmpleado = $_POST['codEmpleado'];
    $fechaIngreso = $_POST['fechaIngreso'];
    $salario = $_POST['salario'];
    $idCargo = $_POST['idCargo'];

    
    $empleadoBL = new EmpleadoBL();

    
    $personaActualizada = $empleadoBL->personaDAO->actualizarPersona($dni, $nombre, $apellido, $edad, $idPersona);

    if ($personaActualizada) {  
        $empleadoActualizado = $empleadoBL->empleadoDAO->actualizarEmpleado($idPersona, $codEmpleado, $fechaIngreso, $salario, $idCargo);

        if ($empleadoActualizado) {
          
            header('Location:http://localhost:1234/PROYECTO_PRACTICA/empleado/FrmEmpleado.php');
            exit();
        } else {
            echo "Error al actualizar el empleado.";
        }
    } else {
        echo "Error al actualizar la persona.";
    }
}
?>

