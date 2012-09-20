<?php include "inc/config.php"; ?>
<?php include "inc/head.php"; ?>
<title>morés - Stands y displays</title>
<?php
  // $h1text : variable para fijar el H1 en cada pagina para hacerlo único y aprovechar mejor el SEO
  $h1text = "Stands y displays - morés";
 ?>
<?php include "inc/menu.php"; ?>

  <div class="span10">
  	<div class="content">

<h2>Stands y displays</h2>
<p>
Nuestra sección de stands, con amplia experiencia en el asesoramiento de soluciones gráficas para eventos, está concebida para ayudarle a conseguir la solución gráfica más apropiada para aquellos eventos en que participe, de manera que pueda comunicar su mensaje con el mayor impacto posible en su público objetivo, ofreciéndole una solución integral de calidad que conseguirá satisfacer las necesidades de comunicación más exigentes.
</p>
    <ul class="galeria">
      <?php 
        $array_imagenes = array(
          "Bodegón_estructuras.jpg",
          "_MG_1700A.jpg",
          "_MG_2057A.jpg",
          "COGERSA_8.jpg",
          "Expand_2000_B.jpg",
          "_MG_1563A.jpg",
          "_MG_1630A.jpg",
          "stand.jpg",
          "stands.jpg",
          "2441.jpg",
          "DSCF2141.jpg",
          "Soportes_modulares_impresos.jpg",
          "Round_Up_+_PopUP.jpg",
          "Round_Up_A.jpg",
          "Suelo_tecnico_para_eventos_y_ferias_01.jpg",
          "Impresión_y_venta_de_Roll_Up_01.jpg",
          "displays para eventos.jpg",




        );
        $array_titulos = array(
          "Bodegón de estructuras",
          "Elementos dispositivos instalados en evento",
          "Trabajo para exposición",
          "Espacio de exposición creado en feria con material Reboard",
          "Panel y maleta mostrador para eventos",
          "Trabajo para exposición",
          "Trabajo para exposición",
          "Stand",
          "Stand",
          "Stand",
          "Soportes modulares impresos",
          "Soportes modulares impresos",
          "PLV con Round Up + Pop Up",
          "Estructura expositiva para PLV",
          "Suelo técnico impreso para eventos y ferias",
          "Displays enrollables para eventos",
          "displays para eventos",



        );
        echo creaListaGaleria($array_imagenes,"imagenes/stands/",$array_titulos);
      ?>
    </ul>
    <h3>Ventajas</h3>
<ul>
<li><strong>Calidad e innovación</strong>: Apuesta por primeras marcas (somos distribuidores de prestigiosas firmas como Expand y Spennare).</li>
<li><strong>Variedad </strong>: Dispondrá de una amplia oferta de elementos al servicio de la comunicación (soportes modulares, enrollables, portafolletos, truss, T3, displays, etc).</li>
<li><strong>Comodidad</strong>:Le ofrecemos la opción del montaje de todos los elementos gráficos por nuestro equipo de profesionales.</li>
</ul>

      <div class="pdf-container">
      <a href="pdf/catalogo.pdf" target="_blank">
        <div class="group corner pdf-catalogo">
          
          <div class="icono"></div>
          <div class="texto">
            <h4>Ver catálogo PDF</h4>
          </div>
        </div>
    </a>
    </div>

  	</div>
  </div>

  <div class="span3">
    
<?php include "inc/banner-envios.php"; ?>

  </div>
</div>
<?php include "inc/footer.php"; ?>