<?php
  session_start();
  include_once('inc/funciones.php');
?>
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Dollars</title>
    <link rel="shortcut icon" href="./favicon.ico" />
    <link rel = "stylesheet" type = "text/css" href = "./style.css" />
    <link rel = "stylesheet" type = "text/css" href = "./structure.css" />
  </head>
  <body class="logo-background">
    <header>
      <figure class="columna cuatro">
          <a href="./portada.php">
            <img src="img/logo.gif" alt="dollars"/>
          </a>
        </figure>
      <?php mostrarLogin(); ?>
    </header>

<!--    <img src="img/index.jpg" alt="logo" class = "indexImg"/>-->
    <form action="portada.html" method="GET" class="form registerForm">
        <h1>Contacto.</h1>
        <ul>
            <li>Dirección postal</li>
            <li>Teléfono</li>
            <li>nievesvvd@correo.ugr.es</li>
            <li>Nieves Victoria Velásquez Díaz</li>
        </ul>
    </form>

<?php
  include_once('./inc/piePagina.php');
?>
