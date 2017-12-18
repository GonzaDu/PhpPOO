<?php

header("Access-Control-Allow-Origin: *");

 require_once 'Modelo/Usuario.php';

 $nombre = $_POST['usuario'];
 $contrasena = $_POST['contrasena'];
/*
$usuario = new Usuario($nombre,$contrasena);
$seGuardo = $usuario->guardar();
//echo((string)$seGuardo);
*/

$seGuardo = Usuario::insertarUsuario($nombre,$contrasena);

if($seGuardo)
{
    echo("success");
    
}
else
{
    echo("error");    
    
}

?>