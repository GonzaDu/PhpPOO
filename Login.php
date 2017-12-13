<?php
  session_start();
  
    if( $_POST )
 {
     #Comprueba que las variables existan
     if ( isset( $_POST['usuario'] ) and isset( $_POST['contrasena'] ) ){
        $usuario = $_POST['usuario'];
        $contrasena = $_POST['contrasena'];
            # archivo php necesario
            require_once 'Modelo/Usuario.php';
            $Usuarios = Usuario::autenticarUsuario($usuario,$contrasena);
       if(count($Usuarios) > 0){
                //crea instancia de sesion segura
                $_SESSION["id"]= $Usuarios[0]['id'];//variable de sesion;
                $_SESSION["usuario"]= $Usuarios[0]['usuario'];//variable de sesion;
                $_SESSION["login"] = true;
                # si usuario existe -> redireccionar a nueva pagina 
                header('Location:BuscarCliente.php');
            }else
              echo 'Error: Acceso Denegado';     
   }
  }
  
 
?>


<form id="form" name="form" method="post" action="">
<span>Nombre de Usuario</span>
<br />
<input id="usuario" name="usuario" type="text" value="" />
<br />
<span>Contraseña</span>
<br />
<input id="contrasena" name="contrasena" type="password" value="" />
<br />
<input name="enviar" id="enviar" type="submit" value="Entrar" />
</form>