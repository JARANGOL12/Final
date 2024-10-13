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

    
    public function registrarEmpleado($dni, $nombre, $apellido, $edad, $codEmpleado, $fechaIngreso, $salario, $idCargo) {
       
        $idPersona = $this->personaDAO->savePersona($dni, $nombre, $apellido, $edad);
        
        if ($idPersona) {
         
            return $this->empleadoDAO->saveEmpleado($idPersona, $codEmpleado, $fechaIngreso, $salario, $idCargo);
        }

        return false; 
    }

    
    public function obtenerEmpleados() {
        return $this->empleadoDAO->listarEmpleados();
    }


  

 
    public function actualizarEmpleado($idEmpleado, $idPersona, $dni, $nombre, $apellido, $edad, $codEmpleado, $fechaIngreso, $salario, $idCargo) {
        $empleadoDAO = new EmpleadoDAO();
        return $empleadoDAO->actualizarEmpleado($idEmpleado, $idPersona, $dni, $nombre, $apellido, $edad, $codEmpleado, $fechaIngreso, $salario, $idCargo);
    }

  
    public function eliminarEmpleado($idEmpleado) {
        return $this->empleadoDAO->eliminarEmpleado($idEmpleado);
    }

  
    public function obtenerPersonas() {
        return $this->personaDAO->listarPersonas();
    }
    public function buscarEmpleado($idEmpleado) {
        $empleadoDAO = new EmpleadoDAO();
        return $empleadoDAO->buscarEmpleado($idEmpleado);
    }
   
}
?>
