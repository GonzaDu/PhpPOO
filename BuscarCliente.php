<?php

session_start();
if(!$_SESSION["login"]){
    header("location:Login.php");
    die;
 }

 if( $_POST )
 {
 require_once 'Modelo/Cliente.php';

 $nombre = $_POST["txtNombre"];

 $clientes = Cliente::buscarPorNombre($nombre);
 }
?>
<html>
   <head>
   <link href="css/bootstrap.min.css" rel="stylesheet">
   </head>
   <body>

   <?php include('menu.php'); ?>

   <div class="container">

   <div class="pure-g">
        <div class="pure-u-1-12">
            <form id="form" name="form" method="post">
                <table style="width:500px;">
                    <tr>
                        <td>
                            <label for="txtNombre">Nombre</label>
                        </td>
                        <td>
                            <input type="text" id="txtNombre" name="txtNombre">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button type="submit" class="pure-button pure-button-primary">Buscar</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
   
   <?php  if( $_POST ) if (count($clientes) > 0): ?>
   <table class="table">
        <tr>
            <td>Id</td>
            <td>Nombre</td>
            <td>Apellido</td>
            <td>Ci</td>
            <td>Direccion</td>
            <td></td>
        </tr>
      <?php foreach($clientes as $item): ?>
    <tr>
        <td><?php echo $item['id']; ?></td>
        <td><?php echo $item['Nombre']; ?></td>
        <td><?php echo $item['Apellido']; ?></td>
        <td><?php echo $item['ci']; ?></td>
        <td><?php echo $item['Direccion']; ?></td>
        <td><a class='btn btn-info' role='button' href='DetalleCliente.php?idCliente=<?php echo $item['id'];?>'><i class='fa fa-history' aria-hidden='true'></i>Detalle</a></td>
    </tr>
      <?php endforeach; ?>
    </table>
      
    <?php else: ?>
        <p> No hay clientes para mostrar </p>
    <?php endif; ?>
    </div>

    <script src="js/bootstrap.min.js"></script>
   </body>
</html>