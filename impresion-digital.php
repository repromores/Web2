<?php include "inc/config.php"; ?>
<?php include "inc/head.php"; ?>
<title>morés - Impresión digital </title>
<?php
  // $h1text : variable para fijar el H1 en cada pagina para hacerlo único y aprovechar mejor el SEO
  $h1text = "Impresión digital  - morés";
 ?>
<?php include "inc/menu.php"; ?>

  <div class="span10">
  	<div class="content">

<h2>Impresión digital </h2>
<p>
Nuestro sistema de impresión digital está concebido para facilitarle la impresión de sus archivos con múltiples páginas a una velocidad extraordinaria y con calidad láser de alta resolución. Nuestra tecnología de impresión digital combina las ventajas de la impresión offset con las de la reproducción fotoeléctrica de alta calidad:
</p>
<ul>
<li>Personalización de los documentos.</li>
<li>Impresión de datos variables (textos, gráficos, imágenes) en cada copia individual.</li>
<li>Ideal para tiradas cortas y supercortas, con una longitud de impresión casi ilimitada y tiempos de producción muy reducidos.</li>
<li>Altamente flexible en cuanto a grosor y formato de papel.</li>
</ul>
<div class="clearfix">
		<ul class="galeria">
			<?php 
				$array_imagenes = array(
					"mores-impresion-pequeño-formato-xeikon0014.jpg",
					"mores-impresion-pequeño-formato-xeikon0009.jpg",
					"mores-impresion-pequeño-formato-xeikon0018.jpg",
				);
				$array_titulos = array(
					"Impresión pequeño formato en Xeikon",
					"Impresión pequeño formato en Xeikon",
					"Ejemplos de trabajos realizados en Xeikon",
				);
				echo creaListaGaleria($array_imagenes,"imagenes/impresion/impresion/",$array_titulos);
			?>
		</ul>
</div>
<h3>Aplicaciones</h3>
<ul>
<li>Documentos con dato variable: dípticos, trípticos, diplomas, invitaciones, certificados, acreditaciones, plicas, tarjetas corporativas, etiquetas, cartas de restaurante, etc.</li>
<li>Campañas de marketing sectorial o personalizado.</li>

<li>Duplicación de CD's y DVD's.</li>
<li>Impresión directa a todo color de galletas de CD y DVD.</li>
<li>Impresión de elementos contenedores de soportes informáticos: funda de cartón impreso, caja Jewel-Box, Slim, sobre de PVC, botón de color, etc.</li>
<li>Tarjetas de PVC, a todo color o en colores planos, con dato variable y foto, y grabación de información en banda magnética.</li>
</ul>	

  	</div>
  </div>

  <div class="span3">
    
<?php include "inc/banner-envios.php"; ?>

  </div>
</div>
<?php include "inc/footer.php"; ?>