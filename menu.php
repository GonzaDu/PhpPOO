    <header class="row">
      <nav class="navbar navbar-inverse">
        <div class="container">
          <div class="navbar-header">
            <a class="navbar-brand" href="#">WebSiteName</a>
          </div>
          a
          <ul class="nav navbar-nav">
            <li>
              <a href="BuscarCliente.php">Consulta</a>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li>
              <a href="#">
                <span class="glyphicon glyphicon-user"></span> <?php echo "User :  " . $_SESSION["usuario"] . "";?></a>
            </li>
            <li>
              <a href="cerrarSesion.php"><span class="glyphicon glyphicon-log-in"></span>Salir</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>