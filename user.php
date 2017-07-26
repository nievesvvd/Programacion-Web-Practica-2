<?php
  include_once('inc/cabecera.php');
?>
      <!-- ********************** usuarios de la web *********************** -->
      <section class="scroll fila">
        <?php webUsuarios($_SESSION['loged']);?>
      </section>
      <!-- ********************** usuarios de la web *********************** -->

      <section class="fila">
        <!-- ************************* Nueva entrada *********************** -->
        <section class="columna diez">
          <?php crearEntrada($_SESSION['loged']); ?>
          <!-- ************************* Nueva entrada *********************** -->

      <!-- ******************** Entradas de los usuarios ******************* -->
          <?php entradasUser($_SESSION['userSelected']); ?>
          <div class="clearfix"></div>
          <nav class = "fila page">
            <a href="#">&laquo;</a>
            <a href="#">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            <a href="#">5</a>
            <a href="#">6</a>
            <a href="#">&raquo;</a>
          </nav>
        </section>
        
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