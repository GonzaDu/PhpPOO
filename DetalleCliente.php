<?php

session_start();
if(!$_SESSION["login"]){
    header("location:login.php");
    die;
 }

 try
 {
    //require_once $_SERVER['DOCUMENT_ROOT'].'/Modelo/DetalleCliente.php';
    require_once 'Modelo/DetalleCliente.php';
    
     $idCliente = $_GET['idCliente'];
    
     $detalleCliente = DetalleCliente::buscarPorIdCliente($idCliente);

 }catch(Exception $e)
 {
     echo($e);
 }

?>
<html>
   <head>
   <link href="css/bootstrap.min.css" rel="stylesheet">
   </head>
   <body>

   <?php include('menu.php'); ?>

   <div class="container">
   
   <?php if (count($detalleCliente) > 0): ?>
   <table class="table">
        <tr>
            <td>IdCliente</td>
            <td>Factura</td>
            <td>Monto</td>
            <td>Fecha</td>
        </tr>
      <?php foreach($detalleCliente as $item): ?>
    <tr>
        <td><?php echo $item['idCliente']; ?></td>
        <td><?php echo $item['Factura'] ; ?> </td>
        <td><?php echo $item['Monto']; ?></td>
        <td><?php echo $item['Fecha']; ?></td>
    </tr>
      <?php endforeach; ?>
    </table>
      
    <?php else: ?>
        <p> No hay detalle Clientes para mostrar </p>
    <?php endif; ?>

    </div>

    <script src="js/bootstrap.min.js"></script>
   </body>
</html>