<?php include "inc/config.php"; ?>
<?php include "inc/head.php"; ?>
<title>morés - Digitalización y retoque</title>
<?php
  // $h1text : variable para fijar el H1 en cada pagina para hacerlo único y aprovechar mejor el SEO
  $h1text = "Digitalización y retoque - morés";
 ?>
<?php include "inc/menu.php"; ?>

  <div class="span10">
  	<div class="content">

<h2>Digitalización y retoque</h2>
<p> 
Este servicio incorpora los últimos avances en el tratamiento digital de la imagen fotográfica, lo que permite incorporar textos y realizar todo tipo de correcciones de color y retoques, a partir de un negativo, positivo o cualquier objeto digitalizado.
</p>
<div class="clearfix">
	<ul class="galeria">

	<?php 
	        $array_imagenes = array(
	          "_MG_9792.jpg",
	          "IMG_8337.jpg",
	        );
	        $array_titulos = array(
	          
	          "Digitalización y restauración de originales",
	          ""
	        );
	        echo creaListaGaleria($array_imagenes,"imagenes/digitalizacion/",$array_titulos);
	      ?>
	</ul>
</div>
<h3>Aplicaciones</h3>
<ul>
<li>Tratamiento fotográfico digital desde cualquier soporte y formato.</li>
<li>Restauración de originales antiguos y recuerdos de familia.</li>
<li>Captación digital de imágenes para su incorporación en trabajos gráficos.</li>
<li>Reproducción de imágenes y diseños compuestos en ordenador, de alta calidad.</li>
</ul>
<h3>Ventajas</h3>
<ul>
<li><strong>Calidad:</strong> Posibilidad de almacenamiento electrónico de la imagen sin pérdida de calidad.</li>
<li><strong>Versatilidad:</strong> Nuestro sistema permite realizar copias y ampliaciones directamente a partir de objetos colocados en el scanner del sistema (por ejemplo, etiquetas de envases, objetos de joyería, etc).</li>
</ul>


  	</div>
  </div>

  <div class="span3">
    
<?php include "inc/banner-envios.php"; ?>

  </div>
</div>
<?php include "inc/footer.php"; ?>