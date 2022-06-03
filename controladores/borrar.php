<?php

require_once('../db.php');
$cn = new Connection();
$cn->borrarMaquina($_GET['id']);
header('location: ../home.php');
