<?php
require_once('../db.php');
$cn = new Connection();
$maquinas = $cn->getMaquinas();
$valido = true;
foreach ($maquinas as $maquina) {
    if ($maquina['dbId'] != $_POST['dbId'] && $maquina['id'] == $_POST['id']) {
        $valido = false;
        header('location:../edit.php?id=' . $_POST['id'] . '&err=id');
    }
}
if ($valido) {
    $cn->actualizarMaquina($_POST['id'], $_POST['nombre'], $_POST['ultima_calibracion'], $_POST['proxima_calibracion']);
    header('location:../home.php');
}
