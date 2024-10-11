<?php

include '../conexionBD.php';
@include './cargo.php';

class cargoDao{
      function guardarCargo($descripcion){
            $database = new ConexionBD();
            $bd =$database->openConexion();

            try {
                  $sql = "INSERT INTO cargo(descripcion) VALUES(?)";
                  $stmt = $bd->prepare($sql); 
                  $stmt->bindParam(1, $descripcion);
                  $stmt->execute();
                  echo " Cargo guardado exitosamente.";
            } catch (PDOException $exc ){
                  echo $exc->getMessage();
            }
      }
      function actualizar($cargo){
            $database = new conexionBD();
            $bd = $database->openConexion();
        
            try {
                $sql = "UPDATE cargo SET descripcion = :descripcion WHERE idCargo = :idCargo";
                $stmt = $bd->prepare($sql); 
                $stmt->bindParam(":descripcion", $cargo['descripcion']);
                $stmt->bindParam(":idCargo", $cargo['idCargo']);  
                $stmt->execute(); 
                echo "Se actualizó exitosamente.";
            } catch (PDOException $exc) {
                echo $exc->getMessage(); 
            }


      }
      function buscar($id){
            $database = new ConexionBD();
            $bd=$database->openConexion();
            try {
                  $sql ="SELECT * FROM cargo WHERE idCargo=?";
                  $stmt = $bd->prepare($sql);
                  $stmt->bindParam(1,$id);
                  $stmt->execute();
                  return $stmt->fetchAll();
            } catch (PDOException $exc) {

                  echo $exc->getMessage();
            }
      }
      function listar(){
            $database = new ConexionBD();
            $bd=$database->openConexion();
            try {
                  $sql ="SELECT * FROM cargo ";
                  $stmt =$bd->prepare($sql);
                  $stmt->execute();
                  return $stmt->fetchAll();
            } catch (PDOException $exc) {
                  echo $exc->getMessage();
            }

      }
      function eliminar($id){
            $database = new ConexionBD();
            $bd=$database->openConexion();
            try {
                  $sql = "DELETE FROM cargo WHERE idCargo= :idCargo";
                  $stmt=$bd->prepare($sql);
                  $stmt->bindParam("idCargo",$id,PDO::PARAM_INT);
                  $stmt->execute();
                  echo "Registro elimiando ecitosamente";
            } catch (PDOException $exc) {
                  echo $exc->getMessage();
            }
      }
}