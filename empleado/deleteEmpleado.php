<?php
include_once 'empleadoBL.php'; // Asegúrate de que esta clase esté disponible

// Obtener el ID del empleado de la URL
$idEmpleado = $_GET['key'] ?? null;

if ($idEmpleado) {
    // Crear una instancia de EmpleadoBL
    $empleadoBL = new EmpleadoBL();
    
    // Llamar a la función de eliminación
    $resultado = $empleadoBL->empleadoDAO->eliminarEmpleado($idEmpleado); // Asegúrate de que esta función exista en tu EmpleadoDAO

    if ($resultado) {
        // Redirige a la lista de empleados o a otra página relevante
        header('Location: http://localhost:8080/EXMPARCIAL/formularioEmpleado.php');
        exit();
    } else {
        echo "Error al eliminar el empleado.";
    }
} else {
    echo "ID no especificado.";
}
?>
