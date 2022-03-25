<?php
    include_once('../conexion/conexion.php');
    session_start();
    $id = $_POST['pozoID'];

    if(isset($_POST['btn']) && $_POST['btn'] == 'SI'){
        $QUERYdel = "DELETE from pozos_petroleros WHERE pozoID='$id'";
        $rsQUERYdel = mysqli_query($con, $QUERYdel) or die('Error: ' . mysqli_error($con));
        if($rsQUERYdel == true){
            header('Location: ../pozos.php');
        }
        if($rsQUERYdel == false){
        echo 'Error no se pudo Eliminar';
        echo '<a href="pozos.php">Regresar</a>';
        }
        }else if(isset($_POST['btn']) && $_POST['btn'] == 'NO'){
            header('Location: ../pozos.php');
        }
        unset($_POST['btn']);
        mysqli_close($con);
?>