<?php include "inc/config.php"; ?>
<?php include "inc/head.php"; ?>
<title>morés - Fotocopias en blanco y negro</title>
<?php
  // $h1text : variable para fijar el H1 en cada pagina para hacerlo único y aprovechar mejor el SEO
  $h1text = "Fotocopias en blanco y negro - morés";
 ?>
<?php include "inc/menu.php"; ?>

  <div class="span10">
  	<div class="content">

<h2>Fotocopias en blanco y negro</h2>
<p>
Siguiendo nuestra actividad original, realizamos fotocopias inmediatas en blanco y negro o color de documentos y originales de una o varias páginas, con posibilidades de reducción o ampliación en múltiples escalas y formatos, en papeles de distintas texturas y colores. Nuestro trabajo está dirigido a un amplio abanico de público en general: arquitectos, ingenieros, empresas, particulares y todo tipo de profesionales.
</p>
  <div class="clearfix">
    <ul class="galeria">
      <?php 
        $array_imagenes = array(
          "IMG_8120.jpg",
          "IMG_8124.jpg",
          "IMG_8125.jpg",

        );
        $array_titulos = array(
          "",
          "",
          "",

        );

        echo creaListaGaleria($array_imagenes,"imagenes/reprografia/bn/",$array_titulos);
      ?>
    </ul>
  </div>
<h3>Aplicaciones</h3>
<ul>
<li>Copias rápidas de documentos con gran calidad como carnets, certificados, publicaciones, revistas, catálogos, etc.</li>
<li>Producción de proyectos con un elevado volumen de páginas y varios juegos de copias.</li>
<li>Ampliación / reducción de documentos hasta un tamaño final máximo de A3 (entre el 200% y el 10% en un solo proceso).</li>
<li>Realización de pegatinas y transparencias desde originales en papel.</li>
<li>Creación de listados de etiquetas sobre papel adhesivo.</li>
<li>Repetición de imágenes en una sola hoja, e imagen espejo.</li>
</ul>
<h3>Ventajas</h3>
<ul>
<li><strong>Calidad</strong> y <strong>velocidad</strong>: Garantizada por el empleo de máquinas de última tecnología.</li>
<li><strong>Versatilidad</strong>: Posibilidades de ampliación / reducción en múltiples escalas.</li>
</ul>


  	</div>
  </div>

  <div class="span3">
    
<?php include "inc/banner-envios.php"; ?>

  </div>
</div>
<?php include "inc/footer.php"; ?>