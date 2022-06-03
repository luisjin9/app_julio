<?php
if (!isset($_COOKIE['usuario'])) {
    header('location:./');
}

require_once('db.php');
$cn = new Connection();
$maquinas = $cn->getMaquinas();

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>NORMAGRUP</title>
</head>
<style>
    .headBtns {
        margin-top: 2%;
        margin-left: 5%;
    }

    .headBtns a {
        position: absolute;
        margin-top: 1%;
    }

    .container {
        text-align: center;
    }

    .maquina {
        text-align: left;
        margin-top: 3%;
        padding: 2%;
    }

    img {
        margin-top: -5%;
    }
</style>

<body>
    <div class="headBtns">
        <button class="btn btn-danger" onClick="cerrarSesion()">CERRAR SESIÓN</button><br>
        <a href="./nuevo.php" class="btn btn-primary">NUEVA MÁQUINA</a>
    </div>
    <div class="container">
        <img src="./logo.png" alt="logo">
        <h1>
            Máquinas
        </h1>

        <?php
        $fechaActual = date("d-m-Y");
        $fechaMaxima = date("d-m-Y", strtotime($fechaActual . "+ 2 month"));
        foreach ($maquinas as $maquina) {
            $maquina['ultima_calibracion'] =  date('d-m-Y', strtotime($maquina['ultima_calibracion']));
            $maquina['proxima_calibracion'] =  date('d-m-Y', strtotime($maquina['proxima_calibracion']));

            if (strtotime($maquina['proxima_calibracion']) <  strtotime($fechaMaxima)) {
                $maquina['fecha_class'] = "bg-warning";
            } else {
                $maquina['fecha_class'] = "bg-success";
            }
            $maquina['ultima_calibracion'] =  date('d/m/Y', strtotime($maquina['ultima_calibracion']));
            $maquina['proxima_calibracion'] =  date('d/m/Y', strtotime($maquina['proxima_calibracion']));
        ?>
            <div class="maquina <?= $maquina['fecha_class'] ?>" id="<?= $maquina['id'] ?>">
                <h3>
                    [<?= $maquina['id'] ?>]
                    <?= $maquina['nombre'] ?>
                </h3>
                <p>Última calibración: <i><?= $maquina['ultima_calibracion'] ?></i></p>
                <p>Próxima calibración: <i><?= $maquina['proxima_calibracion'] ?></i></p>
                <a href="./editar.php?id=<?= $maquina['id'] ?>" class="btn btn-secondary">EDITAR</a>
                <a href="./controladores/borrar.php?id=<?= $maquina['id'] ?>" class="btn btn-danger" onclick="return confirm('¿Seguro que quieres borrar el plato?')" onclick="return confirm('¿Seguro que quieres borrar la máquina?')">BORRAR</a>
            </div>

        <?php
        }
        ?>
    </div>
</body>

<script>
    function cerrarSesion() {
        document.cookie = 'usuario=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
        window.location.replace('./')
    }
</script>

</html>