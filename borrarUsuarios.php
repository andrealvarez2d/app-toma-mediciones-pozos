<?php
    include_once('conexion/conexion.php');
    session_start();

    if(isset($_SESSION['usuarioID'])){
        $ID = $_SESSION['usuarioID'];
        $query = "Select * from usuario Where usuarioID='$ID'";
        $rsquery = mysqli_query($con, $query) or die('Error: ' . mysqli_error($con));
        $fileQUERYmod = mysqli_fetch_array($rsquery);
        $countQUERY = mysqli_num_rows($rsquery);
        if($countQUERY<=0){
        header('Location: index.php');
        }
        }else{
        header('Location: index.php');
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
    <form name="form3" action="borrarUsuarios.php" method="post">
    <h1>Toma De Mediciones De Manómetros De Pozos Petroleros</h1>
    <h2>Borrar usuario</h2>
    <label>¿Desea borrar este usuario?</label><br/>
    <input type="submit" value="SI" name="btn" data-bs-toggle="modal" data-bs-target="#siModal">
    <input type="submit" value="NO" name="btn" data-bs-toggle="modal" data-bs-target="#noModal">
</div>
    <div class="modal fade" id="siModal" tabindex="-1" aria-labelledby="siModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="siModalLabel">Eliminar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <p>Se Elimino Exitosamente</p>
        </div>
    </div>
    </div>
    </div>
    <div class="modal fade" id="noModal" tabindex="-1" aria-labelledby="noModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="noModalLabel">Eliminar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <p>Eliminacion Cancelada</p>
        </div>
    </div>
    </div>
    </div>
</body>
</html>
<?php

    if(isset($_POST['btn']) && $_POST['btn'] == 'SI'){
        $QUERYdel = "DELETE from usuario WHERE usuarioID='$ID'";
        //echo $QUERYmod;
        $rsQUERYdel = mysqli_query($con, $QUERYdel) or die('Error: ' . mysqli_error($con));
        if($rsQUERYdel == true){
        header('Location: index.php');
        }
        if($rsQUERYdel == false){
        echo 'Error no se pudo Eliminar el usuario';
        }
        }else if(isset($_POST['btn']) && $_POST['btn'] == 'NO'){
            header('Location: usuarios.php');
        }
        unset($_POST['btn']);
        mysqli_close($con);
?>