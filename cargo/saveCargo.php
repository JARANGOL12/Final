<?php
include_once './cargoBL.php';

$descripcion =$_POST['descripcion'];

if(!empty($descripcion)){
      $cargoBL = new cargoBL();
      $result = $cargoBL->guardarCargo($descripcion);

    
      header('Location:http://localhost:1234/PROYECTO_PRACTICA/cargo/FrmCargo.php');
      exit;
}