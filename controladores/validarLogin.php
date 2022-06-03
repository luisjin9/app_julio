<?php
require_once('../db.php');
$nombre = $_POST['nombre'];
$password = $_POST['password'];
$usuarioValido = false;

$cn = new Connection();

$usuarios = $cn->getUsuarios();


foreach ($usuarios as $usuario) {
    if ($usuario['nombre'] == $nombre && password_verify($password, $usuario['password'])) {
        $usuarioValido = true;
        $usuarioId = $usuario['id'];
        break;
    }
}

if ($usuarioValido) {
    setcookie("usuario", $usuarioId, time() + 60 * 60 * 24, '/');
    header('Location:../home.php');
} else {
    header('Location:../index.php?err');
}
