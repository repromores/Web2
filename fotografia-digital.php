<?php include "inc/config.php"; ?>
<?php include "inc/head.php"; ?>
<title>morés - Revelado e impresión fotográfica </title>
<?php
  // $h1text : variable para fijar el H1 en cada pagina para hacerlo único y aprovechar mejor el SEO
  $h1text = "Revelado e impresión fotográfica  - morés";
 ?>
<?php include "inc/menu.php"; ?>

  <div class="span10">
  	<div class="content">

<h2>Revelado e impresión fotográfica </h2>
<p>
Nuestro sistema de impresión fotográfica digital proporciona una calidad inmejorable en la reproducción y ampliación de originales fotográficos desde cualquier soporte, o bien, directamente a partir de tarjetas de memoria.
</p>
<p>
Mediante modernos minilab digitales, ofrecemos el procesado e impresión de películas tradicionales en color, en una amplia gama de tamaños y acabados, además de la generación automática de CD's con las imágenes digitalizadas.
</p>
 
<p>
En combinación con nuestro departamento de impresión digital, le ofrecemos la posibilidad de realizar todo tipo de <strong>regalos personalizados</strong>: álbumes digitales, calendarios, etc. 
Ponemos a su alcance la calidad que aportan las últimas tecnologías y la variedad de todo nuestro servicio, lo que le permitirá hacer realidad cualquier idea con el único límite de su imaginación.
</p>

        $array_imagenes = array(

        );
        $array_titulos = array(

        );
        echo creaListaGaleria($array_imagenes,"imagenes/fotografia/",$array_titulos);


  <div class="clearfix">
    <ul class="galeria">
      <?php 
        $array_imagenes = array(
          "Álbum-digital-00300000.jpg",
          "Álbum-digital-00300001.jpg",
          "Minilab-fotográfico300000000000.jpg",
          "Minilab-fotográfico300000000002.jpg",
          "Impresión fotográfica20100624_0185.jpg"
          "mores-fotografia-kiosko-digital-08.jpg",
        );
        $array_titulos = array(
          "Album digital",
          "Album digital",
          "Minilab fotográfico",
          "Minilab fotográfico",
          "Impresión en lienzo",
          "Kiosko digital",
        );
        echo creaListaGaleria($array_imagenes,"imagenes/fotografia/",$array_titulos);
      ?>
    </ul>
  </div>
<h4>También realizamos:</h4>
<ul>
  <li>Revelado negativo de 135mm (Color).</li>
  <li>Revelado cruzado.</li>
  <li>Digitalización de negativos:</li>
  <ul>
    <li>Diapositivas 135mm.</li>
    <li>Todo tipo de diapositivas.</li>
  </ul>
</ul>
  	</div>
  </div>

  <div class="span3">
    
<?php include "inc/banner-envios.php"; ?>

  </div>
</div>
<?php include "inc/footer.php"; ?>