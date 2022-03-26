<?php
    include_once('conexion/conexion.php');
    session_start();
    $id = $_GET["pozoID"];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="shortcut icon" href="img/pozo-de-petroleo.png">
    <title>Toma De Mediciones De Manómetros De Pozos Petroleros</title>
</head>
<body>
<div class="position-absolute top-50 start-50 translate-middle">
    <h1>Toma De Mediciones De Manómetros De Pozos Petroleros</h1>
    <h2>Grafica del histórico</h2>
    <canvas id="myChart">
    <script>
    const labels = [
        <?php
        $QUERYmod = "SELECT * FROM mediciones_manometro WHERE pozoID ='$id' ORDER BY fecha";
        $rsQUERYmod = mysqli_query($con, $QUERYmod) or die('Error: ' . mysqli_error($con));
        //$fileQUERYmod = mysqli_fetch_array($rsQUERYmod);
        while ($fileQUERYmod = mysqli_fetch_array($rsQUERYmod)){
            ?>
            '<?php echo $fileQUERYmod['fecha']?>',
            <?php
        }
?>
    ];

    const data = {
    labels: labels,
    datasets: [{
        label: 'Mediciones',
        backgroundColor: 'rgba(120, 0, 0, 0.2)',
        borderColor: 'rgba(120, 0, 0)',
        <?php
        $QUERYmod = "SELECT * FROM mediciones_manometro WHERE pozoID ='$id'";
        $rsQUERYmod = mysqli_query($con, $QUERYmod) or die('Error: ' . mysqli_error($con));
        ?>

        data: [<?php while ($fileQUERYmod = mysqli_fetch_array($rsQUERYmod)){?>
            '<?php echo $fileQUERYmod['medicion']?>',
            <?php
        }
?>
        ],
    }]
    };

    const config = {
    type: 'line',
    data: data,
    options: {}
    };
</script>
    </canvas>
    <a href="pozos.php" class="botones">Regresar</a>
</div>
<script>
    const myChart = new Chart(
    document.getElementById('myChart'),
    config
    );
</script>
</body>
</html>