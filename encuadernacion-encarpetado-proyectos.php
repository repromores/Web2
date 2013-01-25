<?php include "inc/config.php"; ?>
<?php include "inc/head.php"; ?>
<title>morés - Encarpetado de proyectos</title>
<?php
  // $h1text : variable para fijar el H1 en cada pagina para hacerlo único y aprovechar mejor el SEO
  $h1text = "IEncarpetado de proyectos - morés";
 ?>
<?php include "inc/menu.php"; ?>

  <div class="span10">
  	<div class="content">

<h2>Encarpetado de proyectos</h2>
<p>
A través de este servicio, le ofrecemos la solución para encuadernar todo tipo de trabajos o proyectos. Le ofrecemos una amplia gama de soluciones para la presentación de todos aquellos proyectos cuya documentación exceda los límites de un archivador convencional, y que precisen soportes a medida, con un diseño exclusivo para cada proyecto concreto.
</p>
    <ul class="galeria">
      <?php 
        $array_imagenes = array(
          "encarpetado.jpg",
          "encarpetado_2.jpg",
          "encarpetado_4.jpg",
          "encarpetado_6.jpg",
        );

        echo creaListaGaleria($array_imagenes,"imagenes/encuadernacion/encarpetado/");
      ?>
    </ul>
<h3>Características</h3>
<ul>
<li>Encuadernación de tornillo, con tapa rígida forrada en material plástico impermeable, del color de las cajas del archivo. Opción de grabado de la portada o fijación de adhesivos de gran resistencia en el material más adecuado.</li>
<li>Colores: Rojo, verde, negro, marrón, beige, y otros (bajo pedido).</li>
</ul>
<h3>Aplicaciones</h3>
<ul>
<li>Proyectos de obra pública, con gran volumen de documentación.</li>
<li>Estudios medioambientales, de construcción e ingeniería, entre otros, con documentación gráfica variada, que precisen de una sólida y manejable encuadernación.</li>
</ul>
<h3>Ventajas</h3>
<ul>
<li><strong>Calidad</strong> y <strong>detalle</strong> en la presentación de proyectos.</li>
<li><strong>Comodidad</strong>.</li>
<li><strong>Variedad</strong> en la oferta.</li>
</ul>

  <div class="center-btn">
    <a href="tiendas.php" class="btn btn-primary btn-large">Encuentra nuestras tiendas</a>
  </div>

  	</div>
  </div>

  <div class="span3">
    
<?php include "inc/banner-envios.php"; ?>

  </div>
</div>
<?php include "inc/footer.php"; ?>