<?php
session_start();
include_once('config.php');
include_once('dataset.php');
include_once('usuarios.php');
include_once('entradas.php');
include_once('comentarios.php');

echo "<strong>Variables sesión</strong><br>";
echo var_dump($_SESSION);
echo "<hr>";
echo "<strong>Variables GET</strong><br>";
echo var_dump($_GET);
echo "<hr>";
echo "<strong>Variables POST</strong><br>";
echo var_dump($_POST);
echo "<hr>";

DB::conectar();

switch($_POST['action']){
  case 'login':
    login_user($_POST['username'], $_POST['password']);
    break;
  case 'register':
    registrar_user($_POST['name'], $_POST['lastName'], $_POST['username'], $_POST['password']);
    break;
  case 'logout':
    sign_out();
    break;
  case 'entry':
    addEntradas($_POST['tituloEntr'], $_POST['cuerpoEntr']);
    break;
  case 'comment':
    addComentario($_POST['cuerpoEntr'], $_POST['entrada']);
    break;
    case 'update':
    actualizarInfo($_POST['nomb'],$_POST['apell'],$_SESSION['loged'],$_POST['passw']);
    break;
}

if(isset($_GET['user'])){
  mostrarEntradas($_GET['user']);
}

/**Funcion con la que comprobamos que el usuario esta registrado 
**  para que se pueda conectar
**/
function login_user($username, $password){
  $usuarios = new Usuarios();
  if( $usuarios->existeUsuario($username, $password) ) {
    $_SESSION['loged'] = $usuarios->existeUsuario($username, $password);
    echo 'Usuario logeado';
    irA('../portada.php');
  } else {
    echo 'Usuario o contraseña incorrectos';
    irA();
  }
}

/**Funcion con la que cerramos la sesion actual del usuario
**/
function sign_out() {
  unset($_SESSION['loged']);
  irA();
}



/***********************************************************************************/

/* Funcionalidad*/

function registrar_user($nombre, $apellidos, $username, $password){
  $user = new Usuarios();
  if($user->getNombUsuario($usernme)){
    echo 'Ese nombre de usuario ya existe';
    irA();
  }else if ($user->aniadirUsuario($username, $nombre, $apellidos, $password)){
    echo 'Usuario creado con exito, por favor inicie sesión';
    irA();
  }
}

function actualizarInfo($nombre, $apellidos, $username, $passwd){
  $user = new Usuarios();
  if($user->actualizarDatos($nombre, $apellidos, $username, $passwd)){
    echo 'Datos actualizados';
    irA('../informacionUsuario.php'.$_SESSION['userSelectedURL']);
  }
}


function addEntradas($titulo, $cuerpo){
  $entrada = new Entradas();
  if($entrada->aniadirEntrada($titulo, $cuerpo, $_SESSION['loged'])){
    irA('../user.php');
  }
}

function addComentario($texto, $entrada){
  $comentario = new Comentarios();
  if($comentario->aniadirComentario($texto, $_SESSION['loged'], $entrada)){
    irA("../detallesEntrada.php?value=$entrada");
  }
}

function irA($path = '../index.php') {
  DB::desconectar();
  header("Location: $path");
}

?>
