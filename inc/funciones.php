<?php
include_once('usuarios.php');
include_once('entradas.php');
include_once('comentarios.php');

/**Funciones relacionadas con los usuarios**/
function getName($id){
  $usuarios = new Usuarios();
  $conectados=$usuarios->getNombUsuario($id);
  return $conectados;
}

function usuariosConectados($id){
  $usuarios = new Usuarios();
  $conectados=$usuarios->usuariosConectados();
  if($conectados){
    foreach($conectados as $fila){
      if($fila['username']!=$id){
        echo '<figure class="item columna doce">
                <a href="./user.php?user='.$fila['username'].'" class="caption">
                  <p>'.$fila['nombre'].'</p>
                  <img src="img/icon.jpg" alt="profileImage" class="profilepic"/>
                </a>
              </figure>';
      }
    }
  }
}
function webUsuarios($usuario){
  $usuarios = new Usuarios();
  $conectados=$usuarios->getUsuarios();
  if($conectados){
    foreach($conectados as $fila){
      if($fila['username']!=$usuario){
        echo '<figure class="item columna dos">
          <a href="./user.php?user='.$fila['username'].'" class="caption">
            <p>'.$fila['nombre'].'</p>
            <img src="img/icon.jpg" alt="profileImage" class="profilepic"/>
          </a>
        </figure>';
      }
    }
  }
}

function actualizarInfo($id){
  $usuarios = new Usuarios();
  $conectado=$usuarios->getInfoUsuario($id);
  if($_SESSION['loged']== $id){
    
    echo  '<form action="inc/actions.php" method="POST" class="inputForm infoForm" onsubmit="return(validacion());>
            <article class="fila">
              <h3 class="tag">Nombre</h3>
              <h3><small>'.$conectado['nombre'].'</small></h3>
              <input id ="nomb" class="indexInput" type="text" name="nomb" placeholder="cambiar">
            </article>

            <article class="fila">
            <h3 class="tag">Apellidos</h3>
            <h3><small>'.$conectado['apellidos'].'</small></h3>
            <input id ="apell" class="indexInput" type="text" name="apell" placeholder="cambiar">
            </article>

            <article class="fila">
            <h3 class="tag">Nombre usuario</h3>
            <h3><small>'.$conectado['username'].'</small></h3>
            </article>

            <article class="fila">
            <h3 class="tag">Nueva contraseña</h3>
            <input id ="passw" class="indexInput" type="password" name="passw" placeholder="cambiar contraseña">
            </article>

            <article class="fila">
            <h3 class="tag">Repita la nueva contraseña</h3>
            <input id ="passwRep" class="indexInput" type="password" name="passwRep" placeholder="Repita la contraseña">
            </article>

            <article class="fila columna cinco">
              <button class="entryButton" type="submit">Actualizar</button>
              <button class="entryButton" type="button">Cambiar foto</button>
              <input type="hidden" name="action" value="update">
            </article>
          </form>';
  }else{

    echo '<form action="#" method="POST" class="inputForm infoForm">
            <article class="fila">
              <h3 >Nombre: <small>'.$conectado['nombre'].'</small></h3>
            </article>

            <article class="fila">
            <h3>Apellidos: <small>'.$conectado['apellidos'].'</small></h3>
            </article>

            <article class="fila">
            <h3>Nombre usuario: <small>'.$conectado['username'].'</small></h3>
            </article>
          </form>';
    
  }
}

/**Funciones relacionadas con las entradas**/
function entradas(){
  $entradas = new Entradas();
  $valores=$entradas->getAllEntradas();
  if($valores){
    foreach($valores as $fila){
      $difference = $fila['fecha'];
      echo '<article class="postPreview columna tres">
            <figure class="item-post fila">
              <a href="./user.php?user='.$fila['usuario'].'" class="caption">
                <img src="img/icon.jpg" alt="profileImage" class="profilepic"/>
                <p><strong>'.getName($fila['usuario']).'</strong></p>
                <p><small>'.$difference.'</small></p>
              </a>
            </figure>
            <div class="fila">
              <a href="./detallesEntrada.php?value='.$fila['idEntrada'].'"><h1>'.$fila['titulo'].'</h1></a>
              <p class="muestra">'.$fila['cuerpo'].'</p>
            </div>
          </article>';
    }
  }
}
function entradasUser($usuario){
  $entradas = new Entradas();
  $valores=$entradas->getUserEntrada($usuario);
  if($valores){
    foreach($valores as $fila){
      $difference = $fila['fecha'];
      echo '<article class="postPreview columna tres">
            <figure class="item-post fila">
              <a href="./user.php?user='.$fila['usuario'].'" class="caption">
                <img src="img/icon.jpg" alt="profileImage" class="profilepic"/>
                <p><strong>'.getName($fila['usuario']).'</strong></p>
                <p><small>'.$difference.'</small></p>
              </a>
            </figure>
            <div class="fila">
              <a href="./detallesEntrada.php?value='.$fila['idEntrada'].'"><h1>'.$fila['titulo'].'</h1></a>
              <p class="muestra">'.$fila['cuerpo'].'</p>
            </div>
          </article>';
    }
  }
}


function crearEntrada($usuario){
  if($_SESSION['userSelected']== $usuario || $_GET['user']==null){
    echo '<article class="postPreview fila">
            <figure class="item-post columna dos" id="color">
              <a href="./user.php'.$_SESSION['userSelectedURL'].'" class="caption">
                <img src="./img/icon.jpg" alt="profileImage" class="profilepic"/>
                <p><strong>'.getName($_SESSION['userSelected']).'</strong></p>
              </a>
            </figure>
            <section class="columna nueve">
              <form action="./inc/actions.php" method="POST" onsubmit="return(validarLong());">
              <div class="fila">
                <input class="columna doce entryTitle" type="text" id="tituloEntrada" name="tituloEntr" placeholder="Introduzca aquí el título de la entrada">
                <input class="columna doce entryBody" type="text" id="cuerpoEntrada" name="cuerpoEntr" placeholder="Introduzca aquí la nueva entrada">
              </div>
              <article class="fila">
                <button class="entryButton" type="button" class="button" onclick="subirFoto()"> Subir foto</button>
                <button class="entryButton" type="submit" class="button" onclick="validarLong()">Enviar</button>
                <input type="hidden" name="action" value="entry">
              </article>
              </form>
            </section>
            </article>';
  }
}

function detallesEntrada($entrada){
  $entradas = new Entradas();
  $valores=$entradas->getEntrada($entrada);
  if($valores){
    foreach($valores as $fila){
      echo '<article class="fila entryBorder">
              <article class="fila">
                <figure class="item-post columna tres">
                  <a href="../user.php?user='.$fila['usuario'].'" class="caption">
                    <img src="img/icon.jpg" alt="profileImage" class="profilepic"/>
                    <p><strong>'.getName($fila['usuario']).'</strong></p>
                    <p><small>'.$fila['fecha'].'</small></p>
                  </a>
                </figure>
              </article>
              <article class="fila">
                <h2 id="entryTitle">'.$fila['titulo'].'</h2>
                <p>'.$fila['cuerpo'].'</p>
              </article>
            </article>';
    }
  }
}

/**Funciones relacionadas con los comentarios**/
function verComentario($entrada){
  $comentario = new Comentarios();
  $valores=$comentario->getComentarios($entrada);
  if($valores){
    foreach($valores as $fila){
      echo '<article class="fila">
              <figure class="entryPost columna una">
                <a href="../user.php?user='.$fila['usuario'].'" class="caption">
                  <img src="./img/icon.jpg" alt="profileImage" class="profilepic"/>
                </a>
              </figure>
              <div class="columna dos">
                <p class="entryPost"><small>'.$fila['usuario'].' - '.$fila['fecha'].'</small></p>
                <p class="entryPost"><small>'.$fila['comentario'].'</small></p>
              </div>
            </article>';
    }
  }
}

/**Otras funciones**/
function mostrarLogin(){
  if (!isset($_SESSION['loged'])){
    echo '<form action="inc/actions.php" method = "POST" class="inputForm loginForm" >
        Usuario: <input class="indexInput" type="text" name="username">
        Contraseña: <input class="indexInput" type="password" name="password">
        <input type="hidden" name="action" value="login">
        <button type="submit"> Inicio</button>
      </form>';
  }
}

?>