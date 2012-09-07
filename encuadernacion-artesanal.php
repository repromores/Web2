<?php include "inc/config.php"; ?>
<?php include "inc/head.php"; ?>
<title>morés - Encuadernación artesanal</title>
<?php
  // $h1text : variable para fijar el H1 en cada pagina para hacerlo único y aprovechar mejor el SEO
  $h1text = "Encuadernación artesanal - morés";
 ?>
<?php include "inc/menu.php"; ?>

  <div class="span10">
  	<div class="content">

<h2>Encuadernación artesanal</h2>
<p>
Siguiendo la tradición de los mejores maestros encuadernadores, realizamos todo tipo de trabajos artesanales, combinando la experiencia en esta disciplina de nuestros profesionales y el empleo de la maquinaria más moderna, lo que garantiza un acabado impecable, adaptado a las necesidades particulares de cada caso.
</p>
    <ul class="galeria">
      <?php 
        $array_imagenes = array(
          "DSCF2274.jpg",
          "DSCF2275.jpg",
          "DSCF2272.jpg",
          "mores_encuadernacion_002.jpg",
          "mores_encuadernacion_005.jpg",
        );
        $array_titulos = array(
          "Encuadernación de libros",
          "Encuadernación en tesis",
           "Encuadernación con cosido",
          "Taller de encuadernación artesanal",
          "Taller de encuadernación artesanal",
        );
        echo creaListaGaleria($array_imagenes,"imagenes/encuadernacion/artesanal/",$array_titulos );
      ?>
    </ul>
<h3>Opciones</h3>
<ul>
  <li>Libros de tela.</li>
  <li>Encuadernación rústica.</li>
  <li>Encuadernaciones media piel.</li>
  <li>Encuadernaciones media piel con puntas.</li>
  <li>Encuadernaciones media piel con bandas.</li>
  <li>Encuadernaciones piel completa.</li>
</ul>
<h3>Aplicaciones</h3>
<ul>
  <li>Tesis doctorales.</li>
  <li>Fascículos.</li>
  <li>Libros de firmas.</li>
  <li>Álbumes de fotos.</li>
  <li>Carpetas portafirmas.</li>
  <li>Cajas y estuches a medida para libros.</li>
</ul>


  	</div>
  </div>

  <div class="span3">
    
<?php include "inc/banner-envios.php"; ?>

  </div>
</div>
<?php include "inc/footer.php"; ?>