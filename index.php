<?php
    session_start();
    include_once('./inc/config.php');
    if(isset($_SESSION['loged'])){
        header('Location: ./portada.php');
    }
?>
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Dollars</title>
    <link rel="shortcut icon" href="./favicon.ico" />
    <link rel = "stylesheet" type = "text/css" href = "./style.css" />
  </head>
  <body class="logo-background">
    <header>
      <img src="img/logo.gif" alt="dollars"/>
      <form action="inc/actions.php" method = "POST" class="inputForm loginForm" >
        Usuario: <input class="indexInput" type="text" name="username">
        Contraseña: <input class="indexInput" type="password" name="password">
        <input type="hidden" name="action" value="login">
        <button type="submit"> Inicio</button>
      </form>
    </header>

<!--    dar de alta a los usuarios que se registren-->
    <form action="inc/actions.php" method="POST" class="inputForm registerForm" onsubmit="return(validacion());">
      <h1>¿No tienes cuenta? Regístrate.</h1>
      <input id ="nomb" class="indexInput" type="text" name="name" placeholder="Nombre" required>
      <input id ="apell" class="indexInput" type="text" name="lastName" placeholder="Apellidos"required>
      <input id ="user" class="indexInput" type="text" name="username" placeholder="Nombre Usuario" required>
      <input id ="passw" class="indexInput" type="password" name="password" placeholder="Contraseña" required>
      <input id ="passwRep" class="indexInput" type="password" name="repeatPassword" placeholder="Repita la contraseña" required>
      <input type="hidden" name="action" value="register">
      <button id="access" type="submit" onclick="validacion()">Registrar</button>
    </form>
<?php
  include_once('./inc/piePagina.php');
?>