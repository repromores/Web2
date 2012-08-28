<?php include "inc/config.php"; ?>
<?php include "inc/head.php"; ?>
<title>morés - Montaje</title>
<?php
  // $h1text : variable para fijar el H1 en cada pagina para hacerlo único y aprovechar mejor el SEO
  $h1text = "IMontaje - morés";
 ?>
<?php include "inc/menu.php"; ?>

  <div class="span10">
  	<div class="content">

<h2>Montaje</h2>
<p>
Como complemento a nuestros servicios de cartelería, soportes expositivos y rotulación, le ofrecemos la posibilidad del montaje de los anteriores elementos por nuestro equipo propio de profesionales instaladores:
</p>
<ul>
<li>Rotulación de vehículos (autobuses, furgonetas, etc).</li>
<li>Rotulación de escaparates y de cristales.</li>
<li>Lonas decorativas para fachadas, eventos, actos publicitarios, etc.</li>
<li>Directorios y señalética (interior y exterior).</li>
<li>Soportes expositivos (en alquiler y venta), PLV´s, etc.</li>
<li>Stands para actos promocionales y ferias.</li>
</ul>
    <ul class="galeria">
      <?php 
        $array_imagenes = array(
          "Rotulación_integral_para_evento.jpg",
          "Impresión_y_rotulación_de_flotas_de_vehículos_07.jpg",
          "Impresión_y_rotulación_de_flotas_de_vehículos_06.jpg",
          "Impresión_y_rotulación_de_flotas_de_vehículos_03.jpg",
          "Rotulación_de_clínica_en_vinilo_de_corte_e_impreso.jpg"
        );

        echo creaListaGaleria($array_imagenes,"imagenes/rotulacion/montaje/");
      ?>
    </ul>

  	</div>
  </div>

  <div class="span3">
    
<?php include "inc/banner-envios.php"; ?>

  </div>
</div>
<?php include "inc/footer.php"; ?>