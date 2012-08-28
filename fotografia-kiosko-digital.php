<?php include "inc/config.php"; ?>
<?php include "inc/head.php"; ?>
<title>morés - Kiosko digital</title>
<?php
  // $h1text : variable para fijar el H1 en cada pagina para hacerlo único y aprovechar mejor el SEO
  $h1text = "Kiosko digital - morés";
 ?>
<?php include "inc/menu.php"; ?>

  <div class="span10">
  	<div class="content">

<h2>Kiosko digital</h2>
<p>
En combinación con nuestro departamento de impresión digital, le ofrecemos la posibilidad de realizar todo tipo de <strong>regalos personalizados</strong>: álbumes digitales, calendarios, etc. 
</p>
<div class="clearfix">
    <ul class="galeria">
      <?php 
        $array_imagenes = array(
          "Álbum-digital-00300001.jpg",
          "mores-fotografia-kiosko-digital-08.jpg",
          "Minilab-fotográfico300000000002.jpg",
        );

        echo creaListaGaleria($array_imagenes,"imagenes/fotografia/");
      ?>
    </ul>
  </div>
<p>
Ponemos a su alcance la calidad que aportan las últimas tecnologías y la variedad de todo nuestro servicio, lo que le permitirá hacer realidad cualquier idea con el único límite de su imaginación.
</p>


  	</div>
  </div>

  <div class="span3">
    
<?php include "inc/banner-envios.php"; ?>

  </div>
</div>
<?php include "inc/footer.php"; ?>