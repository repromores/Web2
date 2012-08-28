<?php include "inc/config.php"; ?>
<?php include "inc/head.php"; ?>
<title>morés - Impresión  directa sobre rígidos</title>
<?php
  // $h1text : variable para fijar el H1 en cada pagina para hacerlo único y aprovechar mejor el SEO
  $h1text = "Impresión  directa sobre rígidos - morés";
 ?>
<?php include "inc/menu.php"; ?>

  <div class="span10">
  	<div class="content">

<h2>Impresión directa sobre rígidos</h2>
<p>
La gran versatilidad que aporta esta tecnología al imprimir directamente sobre diferentes materiales rígidos de superficie plana o ligeramente rugosa hacen de ella la solución idónea para realizar todas sus impresiones rígidas o semi-flexibles. Además, la calidad de las tintas hace que la calidad de las impresiones permanezca inalterable, tanto en interior como en exterior.
</p>


<h3>Materiales</h3>
<p>
PVC, metacrilato, cartón pluma, cartón, polipropileno, policarbonato, madera (melamina, trespa, DM), Dibond, Alocubond, moqueta, cerámica, azulejos , metales, plásticos, corcho, acero, cristal , suelos técnicos, etc.
</p>
		<ul class="galeria">
			<?php 
				$array_imagenes = array(
					"Impresión_directa_en_Foam_01.jpg",
					"Impresión_directa_en_madera_01.jpg",
					"Impresión_sobre_madera_más_tinta_blanca.jpg",
					"Photocall_impreso_sobre_Foam.jpg",
					"Impresión_directa_de_varios_originales_a_la_vez_02.jpg"
					);

				echo creaListaGaleria($array_imagenes,"imagenes/carteleria/rigidos/");
			?>
		</ul>	
<h3>Aplicaciones</h3>
<p>
Señalización interior, suelos escenográficos, PLV´s, vallas de obra, suelos de stands, rótulos, personalización de máquinas recreativas, decoración de locales comerciales, viviendas, etc.
</p>
<h3>Ventajas</h3>
<ul>
<li><strong>Variedad</strong>: Amplio abanico de materiales, sistemas y tamaños de impresión (hasta 2,5 m de ancho).</li>
<li><strong>Calidad</strong>: Mediante la aplicación de los últimos sistemas de gestión de color y la más moderna tecnología (resolución de hasta 600x600, impresión de 6 tintas+blanco en una sola pasada).</li>
<li><strong>Rapidez</strong>: Gracias a la gran capacidad productiva que aportan las últimas tecnologías (producción continua multiplancha, con espesor máximo de 4 cm).</li>
</ul>


		
  	</div>
  </div>

  <div class="span3">
    
<?php include "inc/banner-envios.php"; ?>

  </div>
</div>
<?php include "inc/footer.php"; ?>