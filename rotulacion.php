<?php include "inc/config.php"; ?>
<?php include "inc/head.php"; ?>
<title>morés - Planos</title>
<?php
  // $h1text : variable para fijar el H1 en cada pagina para hacerlo único y aprovechar mejor el SEO
  $h1text = "Planos - morés";
 ?>
<?php include "inc/menu.php"; ?>

  <div class="span10">
  	<div class="content">

<h2>Rotulación</h2>
<p>
Le ofrecemos un servicio completo que incluye desde la impresión o corte de sus diseños en diferentes tonos y colores hasta la colocación en el tipo de superficie adecuado.
</p>
<h3>Ventajas</h3>
<ul>
<li><strong>Variedad</strong>: Amplia oferta de vinilos de corte de diferentes durabilidades, vinilos de corte especiales (ácido, translúcido, oro, plata, transparente), vinilos impresos.</li>
<li><strong>Integración</strong> total del proceso productivo, con un equipo propio de profesionales ampliamente cualificados en este campo.</li>
<li><strong>Comodidad y rapidez</strong>:  Le ofrecemos la opción de colocación de los vinilos por nuestro experimentado equipo de profesionales.</li>
</ul>
    <ul class="galeria">
      <?php 
        $array_imagenes = array(
          "Rotulación_de_fachada_en_vinilo_perforado_01.jpg",
          "Rotulación_vestuarios.jpg",
          "Impresión_y_rotulación_de_autobuses_03.jpg",
          "Impresión_y_rotulación_de_autobuses_04.jpg",
          "Impresión_y_rotulación_de_flotas_de_vehículos_01.jpg",
        );

        echo creaListaGaleria($array_imagenes,"imagenes/rotulacion/rotulacion/");
      ?>
    </ul>

  	</div>
  </div>

  <div class="span3">
    
<?php include "inc/banner-envios.php"; ?>

  </div>
</div>
<?php include "inc/footer.php"; ?>