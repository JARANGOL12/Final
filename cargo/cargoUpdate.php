<?php


include_once './cargoBL.php';

$idCargo = $_POST['idCargo']; // Asegúrate de que este nombre coincida con el del campo oculto en el formulario
$descripcion = $_POST['descripcion'];

$cargo = [
    'idCargo' => $idCargo,
    'descripcion' => $descripcion
];

// echo $cargo; // Esto no tiene sentido, mejor usar print_r para debug
print_r($cargo);

if (!empty($descripcion) && !empty($idCargo)) {
    $b1 = new cargoBL();
    $b1->actualizar($cargo);
    header('Location: http://localhost:1234/SEMANA6/cargo_view.php');
    exit(); // Es buena práctica poner exit después de header()
}
?>
