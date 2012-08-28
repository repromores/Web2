<?php include "inc/config.php"; ?>
<?php include "inc/head.php"; ?>
<title>morés - Fotocopias en color</title>
<?php
  // $h1text : variable para fijar el H1 en cada pagina para hacerlo único y aprovechar mejor el SEO
  $h1text = "Fotocopias en color - morés";
 ?>
<?php include "inc/menu.php"; ?>

  <div class="span10">
  	<div class="content">

<h2>Fotocopias en color</h2>
<p>
Nuestro sistema de fotocopias en color le resuelve de un modo rápido y eficaz la reproducción de originales para la presentación de memorias, proyectos, etc. 
</p>
<p>
Cuando necesite mejorar la calidad de un original antiguo, o bien le interese realizar varios juegos de copias, imprimir en color por las dos caras, o integrar blanco y negro y color en un solo documento, nuestro servicio es su solución.
</p>
    <ul class="galeria">
      <?php 
        $array_imagenes = array(
          "IMG_8197.jpg",
          "IMG_8201.jpg",
          "IMG_8212.jpg",
          "IMG_8202.jpg",
          "IMG_8229.jpg",
        );

        echo creaListaGaleria($array_imagenes,"imagenes/reprografia/color/");
      ?>
    </ul>

<h3>Aplicaciones</h3>
<ul>
<li>Inclusión de imágenes en color en originales en blanco y negro.</li>
<li>Renovación de fotografías positivo a positivo.</li>
<li>Impresión en color sobre camisetas o cualquier prenda de tela, cartón, planchas de madera u otra superficie plana.</li>
<li>Reproducción, con gran variedad de escalas de ampliación/reducción, de documentos (fotografías, mapas, gráficos, etc), en formatos hasta A0 y mayores, con gran calidad, por una o dos caras.</li> 
<li>Ampliaciones gran formato hasta 0,9x10 m.</li>
<li>Repetición de imágenes en vertical u horizontal en un solo documento.</li>
<li>Conversión de colores: sustitución de un color por cualquier otro elegido.</li> 
</ul>
<h3>Ventajas</h3>
<ul>
<li><strong>Versatilidad</strong>: Capacidad de impresión en una amplia variedad de soportes, formatos y escalas, los más adecuados para cada tipo de original.</li>
<li><strong>Flexibilidad</strong>: Posibilidad de adaptación máxima a sus necesidades, con los sistemas de impresión más avanzados del mercado: inyección de tinta, láser, electrostático o sublimación.</li>
</ul>
	

  	</div>
  </div>

  <div class="span3">
    
<?php include "inc/banner-envios.php"; ?>

  </div>
</div>
<?php include "inc/footer.php"; ?>