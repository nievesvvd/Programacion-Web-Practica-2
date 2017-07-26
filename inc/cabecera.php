<?php
    session_start();
    require_once('dataset.php');
    include_once('funciones.php');
    if(!isset($_SESSION['loged'])){
      header('Location: ./index.php');
    } else {
      DB::conectar();
    }
    $_SESSION['userSelectedURL']= isset($_GET['user']) ? '?user='.$_GET['user'] : "";
    $_SESSION['userSelected']= isset($_GET['user']) ? $_GET['user'] : $_SESSION['loged'];
?>
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Dollars</title>
    <link rel = "shortcut icon" href="../img/favicon.ico" />
    <link rel = "stylesheet" type = "text/css" href = "./style.css" />
    <link rel = "stylesheet" type = "text/css" href = "./structure.css" />
  </head>

  <body>
        <!-- ********************* Logo e icono de usuario ********************* -->
    <div class="contenedor">
      <header class="fila">
        <figure class="columna cuatro">
          <a href="./portada.php">
            <img src="img/logo.gif" alt="dollars"/>
          </a>
        </figure>

        <figure class="tres columna">
          <a href = "./portada.php">
            <img src="img/bar_name.png" alt="nombreRed" id="headerPic"/>
          </a>
        </figure>

        <figure class="item-post columna diez"  id="color">
          <a href="./user.php?user=<?php echo $_SESSION['loged'] ?>" class="caption">
            <img src="img/icon.jpg" alt="profilePicture" class="profilepic"/>
            <p ><strong><?php echo getName($_SESSION['loged']) ?></strong></p>
          </a>
          <form action="inc/actions.php" method = "POST" >
            <input type="hidden" name="action" value="logout">
            <button type="submit" class = "profileButton"> Salir</button>
          </form>
        </figure>
      </header>
      <!-- ******************** Logo e icono de usuario ******************** -->

      <!-- ******************** biografia | fotos | info ******************* -->
      <nav class="fila">
        <ul>
          <li><a href="./user.php<?php echo $_SESSION['userSelectedURL'] ?>">Biografía</a></li>
          <li><a href="./fotos.php<?php echo $_SESSION['userSelectedURL'] ?>">Fotos</a></li>
          <li><a href="./informacionUsuario.php<?php echo $_SESSION['userSelectedURL'] ?>">Información</a></li>
        </ul>
      </nav>
      <!-- ******************** biografia | fotos | info ******************* -->
