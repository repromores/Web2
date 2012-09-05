<?php include "inc/config.php"; ?>
<?php include "inc/head.php"; ?>
<title>morés - Rotulación</title>
<?php
  // $h1text : variable para fijar el H1 en cada pagina para hacerlo único y aprovechar mejor el SEO
  $h1text = "Rotulación - morés";
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
<h3>Montaje</h3>
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
          "Rotulación_de_clínica_en_vinilo_de_corte_e_impreso.jpg",
          "Rotulación_de_fachada_en_vinilo_perforado_01.jpg",
          "Impresión_y_rotulación_de_autobuses_03.jpg",
          "Impresión_y_rotulación_de_autobuses_04.jpg",
          "Impresión_y_rotulación_de_flotas_de_vehículos_01.jpg",
          "Rotulación de clínica.jpg",
          "Rotulación de hoteles 02.jpg",
          "Rotulación de cabinas telefónicas.jpg",
          "Rotulación de cargador HC 02.jpg"
        );
        $array_titulos = array(
          "Rotulación integral para evento",
          "Rotulación en vinilo de corte e impreso",
          "Vinilo aplicado en flotas de vehículos",
          "Vinilo aplicado en flotas de vehículos",
          "Vinilo impreso y de corte tras instalación",
          "Rotulación de fachada en vinilo perforado",
          "Rotulación de autobuses",
          "Rotulación de autobuses",
          "Rotulación de flotas de vehículos",
          "Vinilo vacío",
          "Vinilo vacío",
          "Rotulación de mobiliario urbano",
          "Rotulación de mobiliario urbano"
        );
        echo creaListaGaleria($array_imagenes,"imagenes/rotulacion/",$array_titulos);
      ?>
    </ul>
    

  	</div>
  </div>

  <div class="span3">
    
<?php include "inc/banner-envios.php"; ?>

  </div>
</div>
<?php include "inc/footer.php"; ?>