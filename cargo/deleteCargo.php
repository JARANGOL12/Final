<?php

include './cargoBL.php';

if (isset($_GET['key'])) {
    $idCargo = $_GET['key'];

 
    if (!empty($idCargo)) {
      
        $bl = new cargoBL();
        $bl->eliminar($idCargo);

        header('Location: http://localhost:1234/SEMANA6/cargo_view.php');
        exit();
    } else {
        echo "ID del cargo está vacío.";
    }
} 

?>