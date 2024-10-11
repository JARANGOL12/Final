<?php


include_once '../conexionBD.php';
class personaDAO{

    private $bd;

    public function __construct() {
        $database = new conexionBD();
        $this->bd = $database->openConexion(); // Cambiado a conectar para obtener la conexión PDO
    }

    public function savePersona($dni, $nombre, $apellido, $edad) {
        // Consulta de inserción
        $sql = "INSERT INTO persona (dni, nombre, apellido, edad) VALUES (:dni, :nombre, :apellido, :edad)";
        
        $stmt = $this->bd->prepare($sql);
        $stmt->bindParam(':dni', $dni);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':edad', $edad);

        if ($stmt->execute()) {
            return $this->bd->lastInsertId(); // Retorna el ID de la persona recién insertada
        } else {
            echo "Error: " . implode(", ", $stmt->errorInfo());
            return false; // Retornar false en caso de error
        }
    }

    public function listarPersonas() {
        $sql = "SELECT * FROM persona";
        $stmt = $this->bd->query($sql); // Ejecuta la consulta y obtiene el resultado

        if (!$stmt) {
            echo "Error en la consulta";
            return [];
        }

        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retorna todas las filas como un array asociativo
    }

    public function buscarPersona($idPersona) {
        $sql = "SELECT * FROM persona WHERE idPersona = :idPersona";
        $stmt = $this->bd->prepare($sql);
        $stmt->bindParam(':idPersona', $idPersona);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC); // Retorna la fila como un array asociativo
    }

    public function actualizarPersona($dni, $nombre, $apellido, $edad, $idPersona) {
        $sql = "UPDATE persona SET dni = :dni, nombre = :nombre, apellido = :apellido, edad = :edad WHERE idPersona = :idPersona";
        $stmt = $this->bd->prepare($sql);
        $stmt->bindParam(':dni', $dni);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':edad', $edad);
        $stmt->bindParam(':idPersona', $idPersona);

        if (!$stmt->execute()) {
            echo "Error: " . implode(", ", $stmt->errorInfo());
        }
        
        return true;
    }

    public function eliminarPersona($idPersona) {
        $sql = "DELETE FROM persona WHERE idPersona = :idPersona";
        $stmt = $this->bd->prepare($sql);
        $stmt->bindParam(':idPersona', $idPersona);

        return $stmt->execute(); // Retorna el resultado de la ejecución
    }

    public function __destruct() {
        $this->bd = null; // Cerrar la conexión PDO
    }
  }
 




