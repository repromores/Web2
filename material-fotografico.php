<?php include "inc/config.php"; ?>
<?php include "inc/head.php"; ?>
<title>morés - Material de fotografía</title>
<?php
  // $h1text : variable para fijar el H1 en cada pagina para hacerlo único y aprovechar mejor el SEO
  $h1text = "Material de fotografía - morés";
 ?>
<?php include "inc/menu.php"; ?>

  <div class="span10">
  	<div class="content">

<h2>Material de fotografía</h2>
<p>
Como complemento al resto de nuestros servicios, distribuimos productos de las más prestigiosas marcas de artículos de fotografía, orientados tanto al aficionado a la fotografía como al profesional de este campo: marcos tradicionales y digitales, álbumes tradicionales de fotos, cámaras digitales y toda clase de complementos (mochilas, fundas, trípodes, etc).
</p>
<div class="clearfix">
		<ul class="galeria">
			<?php 
				$array_imagenes = array(
					"calendario caja.jpg",
					"calendario A4.jpg",
				);
				$array_titulos = array(
					"calendario caja",
					"calendario A4",
				);
				echo creaListaGaleria($array_imagenes,"imagenes/fotografia/",$array_titulos);
			?>
		</ul>
</div>
<a target="_blank" href="pdf/foto album.pdf">
	<div class="pdfdoc"><img alt="ver dossier" src="img/pdf.png"><span>Álbumes de fotos</span></div>
</a>

  	</div>
  </div>

  <div class="span3">
    
<?php include "inc/banner-envios.php"; ?>

  </div>
</div>
<?php include "inc/footer.php"; ?>