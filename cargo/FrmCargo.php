<?php
include './cargoBL.php';// Asegúrate de incluir el archivo de conexión

$bl = new cargoBL();
$lista= $bl->listar();
?>
<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>

<div class="container">
            <h1>Registrar Examen</h1> 

            <form action="saveCargo.php" method="post">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Descripcion:</label>
                    <input type="text" class="form-control" name="descripcion" id="exampleFormControlInput1" placeholder="Ingresar Descripcion">
                </div>

                
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary mb-3">Guardar</button>
                </div>
            </form>

        </div>

        <div class="container">
    <h1>Listar Usuarios</h1> 

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
                <?php
                if (!empty($lista)) {
                    $i = 0;
                    foreach ($lista as $cargo) {
                        ?> 
                        <tr>
                            <th scope="row"><?php echo $i + 1; ?></th>
                            <td><?php echo ($cargo['descripcion']); ?></td>
                          
                            <td>
                                <a href="ActualizarCargo.php?key=<?php echo $cargo['idCargo'] ?>" class="btn btn-primary">Editar</a>
                                <a href="eliminarCargo.php?key=<?php echo $cargo['idCargo'] ?>" class="btn btn-secondary">Eliminar</a>
                            </td>
                        </tr>
                        <?php
                        $i++;
                    }
                } else {
                   
                    echo '<tr><td colspan="7">No hay usuarios disponibles</td></tr>';
                }
                ?>
            </tbody>
    </table>
</div>
        <div class="container">
            <button id="btn-volver" type="button" onclick="volver();" class="btn btn-primary">Volver</button>

        </div>

    </body>

    <script>
        function volver() {
            window.location.assign('http://localhost:1234/PROYECTO_PRACTICA/');
        }
    </script>

    
</body>      

</html>