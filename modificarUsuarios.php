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
    <form name="form3" action="modificarUsuarios.php" method="post">
    <h1>Toma De Mediciones De Manómetros De Pozos Petroleros</h1>
    <h2>Modificar Usuario</h2>
    <label>Usuario:</label><br/>
    <input type="text" name="usuario" value="<?php echo $fileQUERYmod['nombreUsuario']; ?>" required><br/>
    <label>Password:</label><br/>
    <input type="password" name="contra" required><br/>
    <br/>
    <input type="submit" value="Modificar" name="btn">
    <a href="usuarios.php" class="botones">Regresar</a>
    </div>
</body>
</html>

<?php
    $user = null;
    $pwd = null;

    if(isset($_POST['btn']) && $_POST['btn'] == 'Modificar'){
        if(isset($_POST['usuario']) && isset($_POST['contra']) && !empty($_POST['usuario']) && !
        empty($_POST['contra'])){
            $user = $_POST['usuario'];
            $query = "Select * from usuario Where usuarioID='$ID'";

            $rsquery = mysqli_query($con, $query) or die('Error: ' . mysqli_error($con));
            $filequery = mysqli_fetch_array($rsquery);
            if($filequery['password'] === md5($_POST['contra'])){
            $password = $filequery['password'];
            }else{
            $password = md5($_POST['contra']);
            }

            $QUERYmod = "UPDATE usuario SET nombreUsuario='$user', password='$password'";
            $QUERYmod .= "WHERE usuarioID='$ID'";
            $rsQUERYmod = mysqli_query($con, $QUERYmod) or die('Error: ' . mysqli_error($con));
            if($rsQUERYmod == true){
            header('Location: ../mediciones/index.php');
            }
            if($rsQUERYmod == false){
            echo 'Error no se pudo Actualizar el usuario';
            }
            mysqli_close($con);

            unset($_POST['btn']);
            unset($_POST['usuario']);
            unset($_POST['contra']);
            unset($user);
            unset($pwd);
        }
    }
?>