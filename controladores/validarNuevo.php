<?php
require_once('../db.php');
$cn = new Connection();
$maquinas = $cn->getMaquinas();
$valido = true;
foreach ($maquinas as $maquina) {
    if ($maquina['id'] == $_POST['id']) {
        $valido = false;
        header('location:../nuevo.php?err=id');
    }
}
if ($valido) {
    $cn->nuevaMaquina($_POST['id'], $_POST['nombre'], $_POST['ultima_calibracion'], $_POST['proxima_calibracion']);
    header('location:../home.php');
}
