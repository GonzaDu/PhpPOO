<?php
session_start();
if(!$_SESSION["login"]){
    header("location:login.php");
    die;
 }
 require_once 'Usuario.php';
 $Usuarios = Usuario::recuperarTodos();
?>
<html>
   <head></head>
   <body>
   
   <?php if (count($Usuarios) > 0): ?>
            <ul>
      <?php foreach($Usuarios as $item): ?>
      <li> <?php echo $item['usuario'] . ' - ' . $item['contrasena']; ?> </li>
      <?php endforeach; ?>
      </ul>
      <?php else: ?>
            <p> No hay Usuarios para mostrar </p>
        <?php endif; ?>
        
   </body>
</html>