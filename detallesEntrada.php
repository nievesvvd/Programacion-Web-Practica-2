<?php
  include_once('inc/cabecera.php');
  include_once('inc/funciones.php');
?>
      <!-- ********************** usuarios de la web *********************** -->
      <section class="scroll fila">
        <?php webUsuarios($_SESSION['loged']);?>
      </section>
      <!-- ********************** usuarios de la web *********************** -->

      <!-- ******************** Entradas de los usuarios ******************* -->
      <section class="fila">
       <!-- *************************** Entradas ************************** -->
        <section class="columna diez">
          <?php detallesEntrada($_GET['value']); ?>
          <!-- **************** Comentarios de los usuarios **************** -->
          <article class="fila entryBorder">
            <?php verComentario($_GET['value']);?>
          </article>

            <!-- ******************* Añadir comentario ********************* -->
          <article class="fila">
            <article class=" columna">
              <figure class="entryPost columna una">
                <a href="../nieves.html" class="caption">
                  <img src="./img/icon.jpg" alt="profileNieves" class="profilepic"/>
                </a>
              </figure>
              <section class="columna nueve">
                <form action="./inc/actions.php" method="POST" onSubmit="return(validarComent());">
                    <input class="columna doce entryBody" type="text" name="cuerpoEntr" id="cuerpoEntr" placeholder="Introduzca aquí el comentario">
                    <article class="fila">
                    <input type="hidden" name="action" value="comment">
                    <input type="hidden" name="entrada" value="<?php echo $_GET['value']; ?>">
                    <button class="entryButton button" type="submit" >Enviar</button>
                    </article>
                </form>
              </section>
            </article>
          </article>
        </section>
        <!-- *************************** Entradas ************************** -->
        <!-- ******************* Entradas de los usuarios ****************** -->

        <!-- ********************* usuarios conectados ********************* -->
        <aside class="columna dos lateral sideScroll fila">
          <h3 id="sideNote">Usuarios conectados</h3>
          <?php usuariosConectados($_SESSION['loged']);?>
        </aside>
      </section>
    <!-- ********************** usuarios conectados ********************** -->
    <?php
      include_once('inc/piePagina.php');
     ?>
