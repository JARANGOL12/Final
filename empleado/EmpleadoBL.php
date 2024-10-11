<?php

include_once 'personaDAO.php';
include_once 'empleadoDAO.php';

class EmpleadoBL {
    private $personaDAO;
    private $empleadoDAO;

    public function __construct() {
        $this->personaDAO = new PersonaDAO();
        $this->empleadoDAO = new EmpleadoDAO();
    }

    // Método para registrar una nueva persona y su empleado
    public function registrarEmpleado($dni, $nombre, $apellido, $edad, $codEmpleado, $fechaIngreso, $salario, $idCargo) {
        // Primero, guardar la persona
        $idPersona = $this->personaDAO->savePersona($dni, $nombre, $apellido, $edad);
        
        if ($idPersona) {
            // Luego, guardar el empleado
            return $this->empleadoDAO->saveEmpleado($idPersona, $codEmpleado, $fechaIngreso, $salario, $idCargo);
        }

        return false; // Retornar false si la persona no se guardó
    }

    // Método para obtener todos los empleados
    public function obtenerEmpleados() {
        return $this->empleadoDAO->listarEmpleados();
    }

    // Método para buscar un empleado por ID
    public function buscarEmpleado($idEmpleado) {
        return $this->empleadoDAO->buscarEmpleado($idEmpleado);
    }

    // Método para actualizar un empleado
    public function actualizarEmpleado($idEmpleado, $codEmpleado, $fechaIngreso, $salario, $idCargo) {
        return $this->empleadoDAO->actualizarEmpleado($idEmpleado, $codEmpleado, $fechaIngreso, $salario, $idCargo);
    }

    // Método para eliminar un empleado
    public function eliminarEmpleado($idEmpleado) {
        return $this->empleadoDAO->eliminarEmpleado($idEmpleado);
    }

    // Método para listar todas las personas (opcional)
    public function obtenerPersonas() {
        return $this->personaDAO->listarPersonas();
    }

    // Otros métodos de lógica de negocio según sea necesario...
}
?>
