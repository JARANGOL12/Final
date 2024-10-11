<!DOCTYPE html>

<?php
include './cargoBL.php';
$id = $_GET['key'];

$bl = new cargoBL(); 
$lista = $bl->buscar($id);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Cargo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>Actualizar Cargo</h1> 
        <form action="cargoUpdate.php" method="post">
            <?php
            if (!empty($lista)) {
                foreach ($lista as $value) {
            ?>
                <input type="hidden" class="form-control" name="idCargo" value="<?php echo $value['idCargo']; ?>">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Cargo:</label>
                    <input type="text" class="form-control" name="descripcion" value="<?php echo $value['descripcion']; ?>" id="exampleFormControlInput1" placeholder="Ingresa el nombre del área">
                </div>
            <?php
                }
            } else {
                echo "<p>No se encontró información para el ID proporcionado.</p>";
            }
            ?>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary mb-3">Actualizar</button>
            </div>
        </form>
    </div>
    <div class="container">
        <button id="btn-volver" type="button" onclick="volver();" class="btn btn-primary">Volver</button>
    </div>

    <script>
        function volver() {
            window.location.assign('http://localhost:1234/SEMANA6/cargo_view.php');
        }
    </script>
</body>
</html>
