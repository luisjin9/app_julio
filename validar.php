<?php
$usuario=$_POST['Usuario'];
$contraseña=$_POST['Contraseña'];
session_start();
$_SESSION['Usuario']=$Usuario;

$conexion=mysqli_connect("localhost","root"," ","NORMAGRUP");

$consulta="SELECT*FROM usuario where usuario='$usuario' and contraseña='$contraseña'";
$resultado= mysqli_query($conexion,$consulta);

$filas=mysqli_num_rows($resultado);

if($filas){    
    header("location:home.php");

}else{ 
    ?>
    <?php
    include(index.php);
    ?>
    <h1 class="bad">ERROR EN LA AUTENTIFICACION</h1>;
    <?php

}
 
mysqli_free result($resultado);
mysqli_close($ );