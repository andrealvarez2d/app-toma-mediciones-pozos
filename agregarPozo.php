<?php
    include_once('conexion/conexion.php');
    session_start();
    $nombre = null;
    $extension = null;

    if(isset($_POST['btn']) && $_POST['btn'] == 'Guardar'){
        if(isset($_POST['nombre']) && isset($_POST['extension']) && !empty($_POST['nombre']) && !empty($_POST['extension'])){
            $nombre = $_POST['nombre'];
            $extension = $_POST['extension'];
            $query = "INSERT INTO pozos_petroleros (nombrePozo, extension) values('$nombre', '$extension')";
            $rsQuery = mysqli_query($con, $query) or die(mysqli_error($con));

            if($rsQuery == true){

            mysqli_close($con);

            unset($_POST['btn']);
            unset($_POST['nombre']);
            unset($_POST['extension']);
            unset($nombre);
            unset($extension);
            header('Location: pozos.php');

        }
        if($rsQuery == false){
            session_destroy();
            header('Location: agregarPozo.php');
            echo 'error', '<br />';
        }
    }else{
        session_destroy();
        header('Location: agregarPozo.php');
        echo 'error', '<br />';
        }
        }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="shortcut icon" href="img/pozo-de-petroleo.png">
    <title>Toma De Mediciones De Manómetros De Pozos Petroleros</title>
</head>
<body>
<div class="position-absolute top-50 start-50 translate-middle">
    <form name="form4" action="agregarPozo.php" method="post">
    <h1>Toma De Mediciones De Manómetros De Pozos Petroleros</h1>
    <h2>Agregar Pozo</h2>
    <label>Nombre:</label><br/>
    <input type="text" name="nombre" required><br/>
    <label>Extensión:</label><br/>
    <input type="text" name="extension" required><br/>

    <br/>
    <input type="submit" value="Guardar" name="btn" data-bs-toggle="modal" data-bs-target="#guardarModal">
    <a href="pozos.php" class="botones">Regresar</a>
    </div>
    <div class="modal fade" id="guardarModal" tabindex="-1" aria-labelledby="guardarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="guardarModalLabel">Agregar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <p>Pozo Agregado Exitosamente</p>
        </div>
    </div>
    </div>
    </div>
</body>
</html>