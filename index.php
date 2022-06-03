<?php
if (isset($_COOKIE['usuario'])) {
    header('location:./home.php');
} ?>
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
        margin-left: 20%;
        margin-right: 20%;
    }

    .container {
        text-align: center;
    }

    .alert {
        margin-top: 10%;
    }
</style>

<body>
    <div class="container">
        <form action="controladores/validarLogin.php" method="POST">
            <img src="./logo.png" alt="logo">
            <h1>Inicio de sesión</h1>
            <br>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="usuario">
                <label for="nombre">Nombre de usuario</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="password" name="password" placeholder="admin">
                <label for="password">Contraseña</label>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
            <?php
            if (isset($_GET['err'])) {

                echo "<div class='alert alert-danger' role='alert'>
                    Nombre de usuario o contraseña incorrectos
                     </div>";
            }
            ?>
        </form>
    </div>
</body>

</html>