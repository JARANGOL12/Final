<?php
include_once 'cargoDAO.php'; 

class  cargoBL{

      function guardarCargo($descripcion){
            $dao= new cargoDAO();
            try {
                  $dao ->guardarCargo($descripcion);
                  echo " Cargo guardado exitosamente";

            } catch (PDOException $exc) {
                  echo $exc ->getMessage();
            }
      }
      function listar(){
            $dao = new cargoDAO();
            try {
                  return $dao ->listar();

            } catch (PDOException $exc) {
                  echo $exc->getMessage();

            }
      }
      function buscar($id){
            $dao = new cargoDao();
        try {
            return $dao->buscar($id);
        } catch (PDOException $exc) {

            echo $exc->getMessage();
        }
      }
      function actualizar($cargo){
            $dao = new cargoDAO();
            try {
                  return $dao->actualizar($cargo);
            } catch ( PDOException  $exc) {
                  $exc->getMessage();
            }
      }
      function eliminar($id){
            $dao = new cargoDAO();
            try {
                  return $dao->eliminar($id);

            } catch (PDOException $exc) {
                  echo $exc ->getMessage();
            }
      }
}