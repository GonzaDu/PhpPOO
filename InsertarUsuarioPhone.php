<?php

 if( $_POST )
 {
 require_once 'Modelo/Cliente.php';

 $nombre = $_POST["txtNombre"];
 $contrasena = $_POST["txtContrasena"];

$usuario = new Usuario($nombre,$contrasena);
$seGuardo = $usuario->guardar();
echo ($seGuardo);
 }
?>