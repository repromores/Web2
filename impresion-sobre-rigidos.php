<?php include "inc/config.php"; ?>
<?php include "inc/head.php"; ?>
<title>Cartelería - Impresión  directa sobre rígidos</title>
<?php
  // $h1text : variable para fijar el H1 en cada pagina para hacerlo único y aprovechar mejor el SEO
  $h1text = "Cartelería - Impresión  directa sobre rígidos";
 ?>
<?php include "inc/menu.php"; ?>

  <div class="span10">
  	<div class="content">

<h2>Cartelería - Impresión directa sobre rígidos</h2>
<p>
La gran versatilidad que aporta esta tecnología al imprimir directamente sobre diferentes materiales rígidos de superficie plana o ligeramente rugosa hacen de ella la solución idónea para realizar todas sus impresiones rígidas o semi-flexibles de cartelería. Además, la calidad de las tintas hace que la calidad de las impresiones permanezca inalterable, tanto en interior como en exterior, para todo tipo de carteles.
</p>


<h3>Materiales</h3>
<p>
Imprimimos cartelería sobre todo tipo de materiales, como PVC, metacrilato, cartón pluma, cartón, polipropileno, policarbonato, madera (melamina, trespa, DM), Dibond, Alocubond, moqueta, cerámica, azulejos , metales, plásticos, corcho, acero, cristal , suelos técnicos, etc.
</p>
		<ul class="galeria">
			<?php 
				$array_imagenes = array(
					"Impresión_directa_en_Foam_01.jpg",
					"Impresión_directa_en_madera_01.jpg",
					"Impresión_sobre_madera_más_tinta_blanca.jpg",
					"Photocall_impreso_sobre_Foam.jpg",
					"Impresión_directa_de_varios_originales_a_la_vez_02.jpg",
					"Impresión directa y troquelado de PVC.jpg",
					"Impresión directa y troquelado de Forex.jpg",
					"Impresión directa y troquelado de Dibond.jpg",
					"Impresión directa y troquelado de cartón 03.jpg",
					"Impresión directa y troquelado de cartón 04.jpg",
					"Impresión directa y troquelado de cartón 05.jpg",
					"Impresión directa de cartón.jpg",
					"Impresión directa y troquelado de Re-Board 02.jpg",

					);
				$array_titulos = array(
					"Impresión directa en foam",
					"Photocall impreso en foam",
					"Impresión directa en madera",
					"Impresión sobre madera más tinta blanca",
					"Impresión directa multiplancha",
					"Impresión directa y troquelado de PVC",
					"Impresión directa y troquelado de Forex",
					"Impresión directa y troquelado de Dibond",
					"Impresión directa y troquelado de cartón",
					"Impresión directa y troquelado de cartón",
					"Impresión directa y troquelado de cartón",
					"Impresión directa de cartón",
					"Impresión directa y troquelado de Re-Board"
				);
				echo creaListaGaleria($array_imagenes,"imagenes/carteleria/rigidos/",$array_titulos);
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

	
      <div class="pdf-container">
      <a href="pdf/re-board-triptico.pdf" target="_blank">
        <div class="group corner pdf-catalogo">
       		<div class="wrap-ribbon right-edge point stitch lblue"><span><img src="ribbon/novedad.png"></span></div>
          <div class="icono"></div>
          <div class="texto">
            <h4>Reboard</h4>
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