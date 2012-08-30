<?php include "inc/config.php"; ?>
<?php include "inc/head.php"; ?>
<title>morés - Acabado gran formato</title>
<?php
  // $h1text : variable para fijar el H1 en cada pagina para hacerlo único y aprovechar mejor el SEO
  $h1text = "Acabado gran formato - morés";
 ?>
<?php include "inc/menu.php"; ?>

  <div class="span10">
  	<div class="content">

<h2>Acabado</h2>
<p>
Entendemos que la presentación es un factor fundamental en la valoración de un trabajo. Por ello,  a través de nuestros servicios de laminado y montaje, ponemos a su disposición las mejores herramientas para conseguir la mejor presentación de su trabajo:
</p>
<div class="clearfix">
		<ul class="galeria">
			<?php 
				$array_imagenes = array(
					"Vinilo_impreso_para_punto_de_información_-_Valladolid.jpg",
					"Vinilo_impreso_para_rotulación_de_oficinas.jpg",
					"Vinilo_impreso_para_rotulación_de_vallas_publicitarias_02.jpg",
					"Soportes_modulares_impresos.jpg",
					"Impresión_de_lonas_para_eventos.jpg"
				);
			$array_titulos = array(
				"Vinilo impreso instalado para punto de información",
				"Vinilo impreso instalado en oficinas",
				"Vinilo impreso aplicado en vallas publicitarias",
				"Soportes modulares impresos ",
				"Lonas impresas instaladas en evento"
			);
				echo creaListaGaleria($array_imagenes,"imagenes/carteleria/acabado/",$array_titulos);
			?>
		</ul>
</div>
<ul>
<li>Plastificado y encapsulado, a una o doble cara, en materiales resistentes a radiaciones UVA, con acabado mate o brillo.</li>
<li>Laminación de vinilos para exterior.</li>
<li>Laminación de paneles planos (cartón pluma, madera, etc), con tamaño limitado por el soporte.</li>
<li>Enmarcaciones en perfil de aluminio de varios colores.</li>
<li>Manipulado específico de lonas en función de su colocación (bolsa, cosido, refuerzo perimetral, sellado).</li>
<li>Troquelado, fresado y hendido en rígidos y semi-flexibles, con espesor máximo de 2 cm y ancho máximo de 2x3 m.</li>
</ul>
		

  	</div>
  </div>

  <div class="span3">
    
<?php include "inc/banner-envios.php"; ?>

  </div>
</div>
<?php include "inc/footer.php"; ?>