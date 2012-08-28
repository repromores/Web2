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

<h2>Planos</h2>
<p>
Reproducimos todo tipo de planos, tanto en blanco y negro como en color, pudiendo imprimir desde toda clase de programas vectoriales (Autocad, MicroStation), dirigidos al mundo de la arquitectura, ingeniería y estudiantes.
</p>
<div class="clearfix">
    <ul class="galeria">
      <?php 
        $array_imagenes = array(
          "DSCF0390_1092.jpg",
          "IMG_8154.jpg",
          "IMG_8153.jpg",
          "DSCF0420_1122.jpg",
        );

        echo creaListaGaleria($array_imagenes,"imagenes/reprografia/planos/");
      ?>
    </ul>
  </div>
<h3>Aplicaciones</h3>
<ul>
<li>Realización de proyectos de cualquier actividad relacionada con el diseño por ordenador: arquitectura, ingeniería, topografía, etc.</li>
<li>Cartelería publicitaria y de decoración.</li>
<li>Decorados para teatros, locales, etc.</li>
<li>Reproducción de fotografía aérea.</li>
</ul>
<h3>Ventajas</h3>
<ul>
<li><strong>Calidad</strong>:  Nuestros sistemas le ofrecen una alta definición de línea y resolución.</li>
<li><strong>Velocidad</strong>: Impresión de proyectos en un breve espacio de tiempo, independientemente del volumen de trabajo.</li>
<li><strong>Versatilidad</strong>: Posibilidad de ampliación o reducción entre márgenes inalcanzables con otros sistemas.</li>
<li><strong>Originalidad</strong>: Selección de grosores de plumillas, escala, márgenes e, incluso, zonas a trazar, independientemente de su configuración original.</li>
<li><strong>Servicio total</strong>: Disponemos de un servicio de manipulado de planos que, en combinación con nuestros sistemas de plegado automático para múltiples formatos (pestaña, funda, etc), está concebido para satisfacer las necesidades de presentación más exigentes de cualquier profesional.</li>
</ul>

  	</div>
  </div>

  <div class="span3">
    
<?php include "inc/banner-envios.php"; ?>

  </div>
</div>
<?php include "inc/footer.php"; ?>