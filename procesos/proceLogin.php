<?php
    include_once('../conexion/conexion.php');
    session_start();
    $user = null;
    $pwd = null;

    if(isset($_POST['btn']) && $_POST['btn'] == 'Entrar'){
        if(isset($_POST['usuario']) && isset($_POST['contra']) && !empty($_POST['usuario']) && !
        empty($_POST['contra'])){
            $user = $_POST['usuario'];
            $pwd = md5($_POST['contra']);
            $query = "Select * From usuario Where nombreUsuario='$user' And password='$pwd'";
            $rsQuery = mysqli_query($con, $query) or die(mysqli_error($con));
            $fileQUERY = mysqli_fetch_array($rsQuery);
            if($rsQuery == true){

            $_SESSION['usuarioID'] = $fileQUERY['usuarioID'];
            $_SESSION['nombreUsuario'] = $fileQUERY['nombreUsuario'];

            echo '<br />';
            header('Location: ../menu.php');
            mysqli_close($con);

            unset($_POST['btn']);
            unset($_POST['usuario']);
            unset($_POST['contra']);
            unset($user);
            unset($pwd);
            }
            if($rsQuery == false){
                session_destroy();
                header('Location: index.php');
                echo 'error', '<br />';
            }
        }
        }
?>