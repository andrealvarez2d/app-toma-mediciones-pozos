<?php
    include_once('conexion/conexion.php');
    session_start();

    if(isset($_SESSION['usuarioID'])){
        $ID = $_SESSION['usuarioID'];
        $query = "Select * from usuario Where usuarioID='$ID'";
        $rsquery = mysqli_query($con, $query) or die('Error: ' . mysqli_error($con));
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
    <h1>Toma De Mediciones De Manómetros De Pozos Petroleros</h1>
    <h2>Welcome <?php echo $_SESSION['nombreUsuario'];?></h2>
    <ul class="nav justify-content-center nav-fill bg-light">
    <li class="nav-item">
        <a class="nav-link" href="pozos.php">Pozos Petroleros</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="usuarios.php">Opciones del usuario</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="procesos/proceLogout.php">Cerrar Sesión</a>
    </li>
</ul>
    </div>
</body>
</html>