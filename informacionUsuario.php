<?php
  include_once('inc/cabecera.php');
  include_once('inc/funciones.php');
?>
      <!-- ********************** usuarios de la web *********************** -->
      <section class="scroll fila">
        <?php webUsuarios($_SESSION['loged']);?>
      </section>
      <!-- ********************** usuarios de la web *********************** -->


      <section class="fila">
        <!-- ********************** informacion del usuario **************** -->
        <section class="columna diez">
          <?php actualizarInfo($_SESSION['userSelected']); ?>
        </section>

        <!-- ********************** informacion del usuario **************** -->

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