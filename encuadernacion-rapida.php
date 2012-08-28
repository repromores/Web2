<?php include "inc/config.php"; ?>
<?php include "inc/head.php"; ?>
<title>morés - Encuadernación rápida</title>
<?php
  // $h1text : variable para fijar el H1 en cada pagina para hacerlo único y aprovechar mejor el SEO
  $h1text = "Encuadernación rápida - morés";
 ?>
<?php include "inc/menu.php"; ?>

  <div class="span10">
  	<div class="content">

<h2>Encuadernación rápida</h2>
<p>
A través de este servicio, le ofrecemos la posibilidad de encuadernar sus trabajos de una forma rápida, sencilla y fácilmente actualizable, con un amplio abanico de recursos puestos a su disposición.
</p>
    <ul class="galeria">
      <?php 
        $array_imagenes = array(
          "_MG_9831.jpg",
          "canitillo_1.jpg",
          "canutillo_3.jpg",
          "tornillo_8.jpg",
          "tornillo_20.jpg",
        );

        echo creaListaGaleria($array_imagenes,"imagenes/encuadernacion/rapida/");
      ?>
    </ul>
<h3>Opciones</h3>
<ul>
<li>Múltiples formatos: Espiral, tornillo, canutillo, encolado, tira Gestetner, alambre, Grafoplás, anillas, Xerox, Fastetner, Duraclip y deslizante.</li>
<li>Variedad de portadas y contraportadas: Cartón, plástico, entre otros, con acabados en mate o brillo, y diversos grados de rigidez.</li>
</ul>
<h3>Aplicaciones</h3>
<ul>
<li>Presentación de proyectos.</li>
<li>Libros de registro.</li>
<li>Apuntes y trabajos.</li>
<li>Contabilidades.</li>
</ul> 


  	</div>
  </div>

  <div class="span3">
    
<?php include "inc/banner-envios.php"; ?>

  </div>
</div>
<?php include "inc/footer.php"; ?>