<?php include "inc/config.php"; ?>
<?php include "inc/head.php"; ?>
<title>morés - Acabado impresión digital</title>
<?php
  // $h1text : variable para fijar el H1 en cada pagina para hacerlo único y aprovechar mejor el SEO
  $h1text = "Acabado impresión digital - morés";
 ?>
<?php include "inc/menu.php"; ?>

  <div class="span10">
  	<div class="content">

<h2>Acabado</h2>
<p>
Dado que la presentación es un factor fundamental en la valoración de un trabajo,  ponemos a su disposición las mejores herramientas para que usted obtenga el mayor valor añadido en su trabajo:
</p>
	<ul class="galeria">
		<?php 
			$array_imagenes = array(
				"mores-impresion-offset-digital-Ryobi-0038.jpg",
				"mores-impresion-offset-digital-Ryobi-0039.jpg",
				"mores-impresion-offset-digital-Ryobi-0040.jpg",
				"mores-impresion-offset-digital-Ryobi-0041.jpg",
				"mores-impresion-offset-digital-Ryobi-0042.jpg",
			);
			$array_titulos = array(
				"Impresiones dispuestas para manipulado",
				"Manipulado",
				"Impresión tras manipulado (corte y plegado) ",
				"Impresiones dispuestas para embalaje",
			);
			echo creaListaGaleria($array_imagenes,"imagenes/impresion/imprenta/",$array_titulos);
		?>
	</ul>

<ul>
<li>Plastificado y encapsulado a doble cara, mate o brillo.</li>
<li>Hendido, plegado, encarpetado de trabajos.</li>
<li>Encuadernación rápida o artesanal (rústica, grapada al lomo, con tapas, etc).</li>
</ul>
		

  	</div>
  </div>

  <div class="span3">
    
<?php include "inc/banner-envios.php"; ?>

  </div>
</div>
<?php include "inc/footer.php"; ?>