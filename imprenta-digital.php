<?php include "inc/config.php"; ?>
<?php include "inc/head.php"; ?>
<title>morés - Imprenta digital</title>
<?php
  // $h1text : variable para fijar el H1 en cada pagina para hacerlo único y aprovechar mejor el SEO
  $h1text = "Imprenta digital - morés";
 ?>
<?php include "inc/menu.php"; ?>

  <div class="span10">
  	<div class="content">

<h2>Imprenta digital</h2>
<p>
Recientemente hemos incorporado la tecnología offset digital, que combina las ventajas del offset tradicional y las de la tecnología del siglo XXI:
</p>
<ul>
<li>Impresión de máxima calidad y definición, a medida.</li>
<li>Elevada productividad.</li>
<li>Posibilidad de impresión en cuatricomía o tintas planas.</li>
<li>Ideal para tiradas medias de entre 400/500 y 10000 copias (según tamaño).</li>
</ul>
<div class="clearfix">
		<ul class="galeria">
			<?php 
				$array_imagenes = array(
					"Impresión_offset_digital_–_Ryobi_0003.jpg",
					"mores-impresion-pequeño-formato-xeikon0020.jpg",
					"mores-impresion-pequeño-formato-xeikon0021.jpg",
					"mores-impresion-pequeño-formato-xeikon0022.jpg",

				);
				$array_titulos = array(
					"Impresión offset digital en Ryobi",
					"Ejemplos de trabajos realizados en imprenta digital",
					"Ejemplos de trabajos realizados en imprenta digital ",
					"Ejemplos de trabajos realizados en imprenta digital "
				);
				echo creaListaGaleria($array_imagenes,"imagenes/impresion/acabado/",$array_titulos);
			?>
		</ul>
</div>
<h3>Aplicaciones</h3>
<ul>
<li>Impresos comerciales, publicitarios o técnicos: catálogos, manuales, revistas, impresos para buzoneo, dossiers, boletines, programas, comunicados de empresa, etc.</li>
<li>Campañas de marketing sectorial.</li>
</ul>
			

  	</div>
  </div>

  <div class="span3">
    
<?php include "inc/banner-envios.php"; ?>

  </div>
</div>
<?php include "inc/footer.php"; ?>