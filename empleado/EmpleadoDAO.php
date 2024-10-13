<?php


class EmpleadoDAO{
    private $bd;

    // Constructor para establecer la conexión a la base de datos
    public function __construct() {
        $database = new conexionBD();
        $this->bd = $database->openConexion(); // Cambiar a 'conectar' para obtener la conexión PDO
    }

    // Método para guardar un empleado
    public function saveEmpleado($idPersona, $codEmpleado, $fechaIngreso, $salario, $idCargo) {
        $sql = "INSERT INTO empleado (idPersona, codEmpleado, fechaIngreso, salario, idCargo) VALUES (:idPersona, :codEmpleado, :fechaIngreso, :salario, :idCargo)";
        $stmt = $this->bd->prepare($sql);
        
        // Vincular parámetros
        $stmt->bindParam(':idPersona', $idPersona);
        $stmt->bindParam(':codEmpleado', $codEmpleado);
        $stmt->bindParam(':fechaIngreso', $fechaIngreso);
        $stmt->bindParam(':salario', $salario);
        $stmt->bindParam(':idCargo', $idCargo);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            return $this->bd->lastInsertId(); // Retorna el ID del empleado recién insertado
        } else {
            echo "Error: " . implode(", ", $stmt->errorInfo());
            return false; // Retorna false en caso de error
        }
    }

    // Método para listar todos los empleados
    public function listarEmpleados() {
        $sql = "SELECT e.idEmpleado, e.codEmpleado, e.fechaIngreso, e.salario, p.nombre, p.apellido,p.edad,p.dni, c.descripcion AS cargo
                FROM empleado e 
                INNER JOIN persona p ON e.idPersona = p.idPersona
                INNER JOIN cargo c ON e.idCargo = c.idCargo";
        $stmt = $this->bd->query($sql); 

        if (!$stmt) {
            echo "Error en la consulta";
            return [];
        }

        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retorna todas las filas como un array asociativo
    }

    // Método para buscar un empleado por ID
    public function buscarEmpleado($idEmpleado) {
        $sql = "SELECT e.idEmpleado, e.codEmpleado, e.idCargo, e.salario, e.fechaIngreso, p.idPersona, p.dni, p.nombre, p.apellido, p.edad 
            FROM empleado e
            JOIN persona p ON e.idPersona = p.idPersona 
            WHERE e.idEmpleado = :idEmpleado";
    $stmt = $this->bd->prepare($sql);
    $stmt->bindParam(':idEmpleado', $idEmpleado);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC); // Retorna la fila como un array asociativo
    }


    public function actualizarEmpleado($idEmpleado, $idPersona, $dni, $nombre, $apellido, $edad, $codEmpleado, $fechaIngreso, $salario, $idCargo) {
        $sql = "UPDATE empleado e
        JOIN persona p ON e.idPersona = p.idPersona
        SET p.dni = :dni, p.nombre = :nombre, p.apellido = :apellido, p.edad = :edad,
            e.codEmpleado = :codEmpleado, e.fechaIngreso = :fechaIngreso, e.salario = :salario, e.idCargo = :idCargo
        WHERE e.idEmpleado = :idEmpleado";

        $stmt = $this->bd->prepare($sql);
        $stmt->bindParam(':idEmpleado', $idEmpleado);
        $stmt->bindParam(':dni', $dni);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':edad', $edad);
$stmt->bindParam(':codEmpleado', $codEmpleado);
$stmt->bindParam(':fechaIngreso', $fechaIngreso);
$stmt->bindParam(':salario', $salario);
$stmt->bindParam(':idCargo', $idCargo);

return $stmt->execute();
// Retorna true si la actualización fue exitosa
    
    }

    // Método para eliminar un empleado
    public function eliminarEmpleado($idEmpleado) {
        $sql = "DELETE FROM empleado WHERE idEmpleado = :idEmpleado";
        $stmt = $this->bd->prepare($sql);
        $stmt->bindParam(':idEmpleado', $idEmpleado);

        return $stmt->execute(); 
    }

    public function __destruct() {
        $this->bd = null;
    }
}
