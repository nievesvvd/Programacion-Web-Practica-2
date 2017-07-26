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
    <section class="columna diez">
      <figure class="postPreview columna tres fila" >
        <a href="users/nieves/nieves_20171104_1320.html" class="caption">
          <img src="users/nieves/nieves_20171104_1320_01.png" class="gallery" alt="entry"/>
        </a>
      </figure>
      
      <figure class="postPreview columna tres fila" >
        <a href="users/nieves/nieves_20171104_1745.html" class="caption">
          <img src="users/nieves/nieves_20171104_1745_02.jpg" class="gallery" alt="entry"/>
        </a>
      </figure>

      <figure class="postPreview columna tres fila" >
        <a href="users/nieves/nieves_20171304_1010.html" class="caption">
          <img src="users/nieves/nieves_20171304_1010_03.jpg" class="gallery" alt="entry"/>
        </a>
      </figure>

      <figure class="postPreview columna tres fila" >
        <a href="users/nieves/nieves_20171304_2015.html" class="caption">
          <img src="users/nieves/nieves_20171304_2015_04.jpg" class="gallery" alt="entry"/>
        </a>
      </figure>

      <figure class="postPreview columna tres fila" >
        <a href="users/nieves/nieves_20171804_2240.html" class="caption">
          <img src="users/nieves/nieves_20171804_2240_05.jpg" class="gallery" alt="entry"/>
        </a>
      </figure>
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