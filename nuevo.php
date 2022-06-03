<?php
if (!isset($_COOKIE['usuario'])) {
    header('location:./');
}

define('FECHA_ACTUAL', date('Y-m-d'));
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
    form {
        margin-left: 30%;
        margin-right: 30%;
    }

    h1 {
        margin-top: 8%;
        text-align: center;
    }

    .form-group {
        margin-top: 1%;
        font-size: 16pt;
        margin-bottom: 2%;
    }

    .alert {
        margin-top: 10%;
    }
</style>

<body>
    <div class="container">
        <h1>Nueva Máquina</h1>
        <form action="./controladores/validarNuevo.php" method="POST" onsubmit="return validar(this)">

            <div class="form-group">
                <label for="maquinaId">Id</label>
                <input type="number" class="form-control" id="maquinaId" name="id" required>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="ultima_calibracion">Ultima Calibración</label>
                <input type="date" class="form-control" id="ultima_calibracion" name="ultima_calibracion" required>
            </div>
            <div class="form-group">
                <label for="proxima_calibracion">Próxima Calibración</label>
                <input type="date" class="form-control" id="proxima_calibracion" name="proxima_calibracion" min="<?= FECHA_ACTUAL ?>" required>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="./home.php" class="btn btn-danger">Volver</a>
            <?php
            if (isset($_GET['err'])) {
                if ($_GET['err'] == 'id') {
                    echo "<div class='alert alert-danger' role='alert'>
                        Error: Id ya utilizado por otra máquina
                         </div>";
                }
            }
            ?>
            <div class='alert alert-danger' id="dateError" role='alert' style="display:none;">
                La fecha de última calibración no puede ser mayor que la de la próxima calibración
            </div>
        </form>
    </div>
</body>
<script>
    function validar(form) {
        let result = true;
        if (new Date(form.elements['ultima_calibracion'].value).getTime() > new Date(form.elements['proxima_calibracion'].value).getTime()) {
            result = false;
            document.getElementById('dateError').style.display = 'block';
        } else {
            document.getElementById('dateError').style.display = 'none';
        }
        return result;
    }
</script>

</html>