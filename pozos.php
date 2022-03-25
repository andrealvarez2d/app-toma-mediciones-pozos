<?php
    include_once('conexion/conexion.php');
    session_start();
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
    <table class="table table-striped table-danger">
    <tr>
        <td>ID</td>
        <td>Nombre del pozo</td>
        <td>Extensión</td>
        <td>Opciones del historico</td>
        <td>Opciones del pozo</td>
    </tr>
    <?php
    $query = "Select * from pozos_petroleros";
    $rsquery = mysqli_query($con, $query) or die('Error: ' . mysqli_error($con));
    while($fileQUERY = mysqli_fetch_assoc($rsquery)){
    ?>
    <tr>
        <td><?php echo $fileQUERY['pozoID']; ?></td>
        <td><?php echo $fileQUERY['nombrePozo']; ?></td>
        <td><?php echo $fileQUERY['extension']; ?></td>
        <td>
            <a href="agregarMedicion.php?pozoID=<?php echo $fileQUERY['pozoID']; ?>"><img src="img/agregar-archivo.png" alt="Agregar mediciones"></a>
            <a href="modificarHistorico.php?pozoID=<?php echo $fileQUERY['pozoID']; ?>"><img src="img/editar-archivo.png" alt="Modificar mediciones"></a>
            <a href="mostrarHistorico.php?pozoID=<?php echo $fileQUERY['pozoID']; ?>"><img src="img/conexion-grafica.png" alt="Mostrar historico"></a>
        </td>
        <td>
            <a href="modificarPozo.php?pozoID=<?php echo $fileQUERY['pozoID']; ?>"><img src="img/editar2.png" alt="Modificar pozo"></a>
            <a href="eliminarPozo.php?pozoID=<?php echo $fileQUERY['pozoID']; ?>"><img src="img/basura.png" alt="Eliminar pozo"></a>
        </td>
    </tr>
    <?php } ?>
    </table>
    <?php
    mysqli_close($con);
    ?>
    <br/>
    <a href="agregarPozo.php" title="Agregar" class="botones">Agregar pozo</a>
    <a href="menu.php" title="Regresar" class="botones">Regresar al menu</a>
    </div>
</body>
</html>