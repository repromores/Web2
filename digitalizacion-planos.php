<?php include "inc/config.php"; ?>
<?php include "inc/head.php"; ?>
<title>morés - Digitalización de planos</title>
<?php
  // $h1text : variable para fijar el H1 en cada pagina para hacerlo único y aprovechar mejor el SEO
  $h1text = "Digitalización de planos - morés";
 ?>
<?php include "inc/menu.php"; ?>

  <div class="span10">
  	<div class="content">

<h2>Digitalización de planos</h2>
<h3>Vectorización automática de planos</h3>
<p>
Nuestro servicio de vectorización de planos le ofrece la posibilidad de reaprovechar la totalidad o una parte de antiguos planos de construcción, topografía e ingeniería, entre otros, convirtiéndolos a formato vectorial editable DXF o DWG.
</p>
<div class="clearfix">
	<ul class="galeria">

	<?php 
	        $array_imagenes = array(
	          "DSCF0476_1178.jpg",
	          "DSCF0427_1129.jpg",
	          "DSCF0421_1123.jpg"
	        );

	        echo creaListaGaleria($array_imagenes,"imagenes/digitalizacion/");
	      ?>
	</ul>
</div>

<h3>Montaje de planos</h3>
<p>
Nuestro servicio de montaje de planos le ofrece prestaciones como el coloreado de un plano, mediante sistemas de retoque gráfico digital, o la composición en un mismo documento de sus diseños vectoriales con fotografías.
</p>
<p>
Así, encontrará la solución perfecta para la presentación de sus proyectos de obra civil o estudio medioambiental, de cara a su participación en concursos públicos de arquitectura o ingeniería y certámenes de cualquier especialidad.
</p>
<h3>Catálogo visual</h3>
<p>
Le ofrecemos la posibilidad de visualizar los documentos e imágenes correspondientes a  proyectos técnicos o planes generales de urbanismo, permitiendo un fácil manejo y consulta informática de estos contenidos.
</p>
	

  	</div>
  </div>

  <div class="span3">
    
<?php include "inc/banner-envios.php"; ?>

  </div>
</div>
<?php include "inc/footer.php"; ?>