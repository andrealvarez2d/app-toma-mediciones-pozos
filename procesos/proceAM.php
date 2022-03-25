<?php
    include_once('../conexion/conexion.php');
    session_start();

    $medicion = $_POST['medicion'];
    $fecha = $_POST['fecha'];
    $id = $_POST['pozoID'];
    $query = "INSERT INTO mediciones_manometro (medicion, fecha, pozoID) values('$medicion', '$fecha', '$id')";
    $rsQuery = mysqli_query($con, $query) or die(mysqli_error($con));

    if($rsQuery == true){
        header('Location: ../pozos.php');
        mysqli_close($con);

        unset($_POST['btn']);
        unset($_POST['medicion']);
        unset($_POST['fecha']);
        unset($_POST['pozoID']);
        unset($medicion);
        unset($fecha);
        unset($id);

    }
    if($rsQuery == false){
        session_destroy();
        header('Location: ../pozos.php');
        echo 'error', '<br />';
    }
?>