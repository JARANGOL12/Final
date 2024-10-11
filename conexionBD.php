<?php
class ConexionBD{
      private $SERVIDOR= "mysql:host=localhost;dbname=bd_parcial";
      private $USUARIO ="root";
      private $PASSWORD ="@arango@12";

      public function openConexion(){
            try {
                  $cn = new PDO($this->SERVIDOR,$this->USUARIO,$this->PASSWORD);
                  $cn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                  // prueba de la conexion

                  echo "Conectado a la base de datos Parcial";
                  return $cn;

            } catch (PDOException $exc) {
                echo $exc ->getTraceAsString();
                print "Error:".$exc->getMessage();
                die();
            }
      }
}