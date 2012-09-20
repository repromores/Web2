<?php include "inc/config.php"; ?>
<?php include "inc/head.php"; ?>
<title>morés - Impresión fotográfica (Lambda)</title>
<?php
  // $h1text : variable para fijar el H1 en cada pagina para hacerlo único y aprovechar mejor el SEO
  $h1text = "Impresión fotográfica (Lambda) - morés";
 ?>
<?php include "inc/menu.php"; ?>

  <div class="span10">
  	<div class="content">

<h2>Impresión fotográfica (Lambda)</h2>
<p>
La tecnología de impresión fotográfica Lambda constituye la solución ideal para trabajos de interior que exigen alta definición (400 dpi, la resolución máxima del mercado). Permite imprimir hasta un ancho máximo de 1,25 m, mediante exposición directa en RGB sobre soporte fotográfico y revelado químico.
</p>
<h3>MATERIALES</h3>
<p>
Papel fotográfico (brillo, semi-mate, perla), Duratrans.
</p>
		<ul class="galeria">
			<?php 
				$array_imagenes = array(
					"Impresión_fotográfica_en_Durst_Lambda_01.jpg",
					"Impresión_fotográfica_en_Durst_Lambda_03.jpg",
					"Impresión_fotográfica_en_Durst_Lambda_02.jpg",
					"Impresión_fotográfica_en_duratrans_en_Durst_Lambda_02.jpg",
					"Impresión_fotográfica_en_Durst_Lambda_06.jpg"	
					);
				$array_titulos = array(
					"Impresión fotográfica en Durst Lambda",
					"Impresión fotográfica en Durst Lambda",
					"Impresión fotográfica de alta calidad",
					"Cajas de luz impresas en Durst Lambda",
					"Impresión fotográfica para interiores"
				);
				echo creaListaGaleria($array_imagenes,"imagenes/carteleria/imp_fotografica/",$array_titulos);
			?>
		</ul>	
<h3>APLICACIONES</h3>
<p>
Reproducción de fotografías, cartelería de alta resolución para interiores, cajas de luz, soportes publicitarios, entre otras.
</p>

		
  	</div>
  </div>

  <div class="span3 colderecha">
    
<?php include "inc/banner-envios.php"; ?>

  </div>
</div>
<?php include "inc/footer.php"; ?>