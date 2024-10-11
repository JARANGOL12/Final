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
        $sql = "SELECT * FROM empleado WHERE idEmpleado = :idEmpleado";
        $stmt = $this->bd->prepare($sql);
        $stmt->bindParam(':idEmpleado', $idEmpleado);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC); // Retorna la fila como un array asociativo
    }

    // Método para actualizar un empleado
    public function actualizarEmpleado($idEmpleado, $codEmpleado, $fechaIngreso, $salario, $idCargo) {
        $sql = "UPDATE empleado SET codEmpleado = :codEmpleado, fechaIngreso = :fechaIngreso, salario = :salario, idCargo = :idCargo WHERE idEmpleado = :idEmpleado";
        $stmt = $this->bd->prepare($sql);

        // Vincular parámetros
        $stmt->bindParam(':codEmpleado', $codEmpleado);
        $stmt->bindParam(':fechaIngreso', $fechaIngreso);
        $stmt->bindParam(':salario', $salario);
        $stmt->bindParam(':idCargo', $idCargo);
        $stmt->bindParam(':idEmpleado', $idEmpleado);

        if (!$stmt->execute()) {
            echo "Error: " . implode(", ", $stmt->errorInfo());
        }

        return true;
    }

    // Método para eliminar un empleado
    public function eliminarEmpleado($idEmpleado) {
        $sql = "DELETE FROM empleado WHERE idEmpleado = :idEmpleado";
        $stmt = $this->bd->prepare($sql);
        $stmt->bindParam(':idEmpleado', $idEmpleado);

        return $stmt->execute(); // Retorna el resultado de la ejecución
    }

    // Cerrar la conexión al final
    public function __destruct() {
        $this->bd = null; // Cerrar la conexión PDO
    }
}
