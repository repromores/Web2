<?php include "inc/config.php"; ?>
<?php include "inc/head.php"; ?>
<title>morés - Impresión sobre flexibles</title>
<?php
  // $h1text : variable para fijar el H1 en cada pagina para hacerlo único y aprovechar mejor el SEO
  $h1text = "Impresión sobre flexibles - morés";
 ?>
<?php include "inc/menu.php"; ?>

  <div class="span10">
  	<div class="content">
  		<h2>Impresión sobre flexibles</h2>
		<p>
		Contamos con la última tecnología de referencia en el sector de cartelería gran formato, lo que nos permite aplicar los más avanzados medios tecnológicos adaptados a las necesidades específicas de cada cliente. Al mismo tiempo, le ofrecemos el servicio más completo disponible en el mercado, al integrar todas las fases del proceso productivo, desde la impresión hasta el montaje de todo tipo de cartelería.
		</p>
		<h3>Materiales</h3>
		<p>
		Impresión sobre papel (en diferentes calidades: mate, semi-mate, brillo), papel fotográfico Semigloss, lienzo (canvas), lona (plástica, microperforada, Decolite), Duratrans, vinilo (retirable, permanente, ácido, especial para vehículos, transparente, translúcido, perforado), Glaspack, Flagback (bandera), Spinnaker, polycril, etc.
		</p>

		<ul class="galeria">
			<?php 
				$array_imagenes = array(
					"Impresión de lonas para eventos - FMCV .jpg",
					"Impresión_de_lonas_para_eventos_01.jpg",
					"Impresión de lonas publicitarias 03.jpg",
					"Impresión de lonas publicitarias 05.jpg",
					"Impresión de lonas publicitarias 06.jpg",
					"Impresión de lonas publicitarias 08.jpg",
					"Impresión_de_mupis_02.jpg",
					"Impresión_de_mupis_03.jpg",
					"VInilo_impreso_para_decoración_de_habitaciones_02.jpg",
					"VInilo impreso para decoración de habitaciones 01.jpg",
					"Vinilo impreso para decoración de local comercial.jpg",
					"Vinilo impreso para exposición - Laboral 01.jpg",
					"Vinilo impreso para exposición - Laboral 02.jpg",			
					"Impresión_fotográfica_en_Durst_Lambda_04.jpg",
					"Impresión_e_instalación_de_lonas_en_farolas.jpg",
					"Vinilo_impreso_para_rotulación_de_vallas_publicitarias_01.jpg",
					"IMG_2910.jpg"
				);
				$array_titulos = array(
					"Impresión de lonas para eventos",
					"Impresión de lonas para eventos",
					"Impresión de lonas para fachadas",
					"Impresión de lonas para fachadas",
					"Impresión de lonas para fachadas",
					"Impresión de lonas para fachadas",
					"Impresión de mupis",
					"Impresión en mobiliario urbano",
					"Vinilo impreso para decoración de interiores",
					"Vinilo impreso para decoración de interiores",	
					"Vinilo impreso para decoración de local comercial",	
					"Vinilo impreso para exposición",								
					"Vinilo impreso para exposición",			
					"Impresión fotográfica ",
					"Impresión e instalación de banderolas",
					"Vinilo impreso para vallas publicitarias",
					"Vinilo impreso para exposición"
				);

				echo creaListaGaleria($array_imagenes,"imagenes/carteleria/flexibles/",$array_titulos);


				$array_imagenes = array(

          "Impresión_de_lonas_para_eventos.jpg"
        );
        $array_titulos = array(

          "Lonas impresas instaladas en evento"
        );
        echo creaListaGaleria($array_imagenes,"imagenes/rotulacion/",$array_titulos);
      
			?>
		</ul>




		<h3>Aplicaciones</h3>
		<ul>
		<li>
		Lonas impresas para su uso en banderolas, seguridad para fachadas, vallas retroiluminables, lonas para camiones, decoración de escenarios y carpas, exposiciones, grandes superficies, stands, soportes expositivos, etc.
		</li>
		<li>
		Vinilos impresos y de corte, para campañas publicitarias en autobuses urbanos y de ruta, vallas publicitarias y monopostes, rotulación de flotas y personalización de vehículos.
		</li>
		<li>
		Gigantografía (impresión XXL).
		</li>
		<li>
		Rótulos, placas y señalética de oficinas, negocios y locales comerciales.
		</li>
		<li>
		Decoración personalizada de suelos, cristales, paredes, mostradores, cajas de luz y cualquier superficie o soporte apto para su rotulación, interior o exterior, con el vinilo más adecuado para su uso final.
		</li>
		<li>
		Reproducción en color y gran formato de planos y dibujos técnicos.
		</li>
		<li>
		Personalización de electrodomésticos, ordenadores portátiles, camisetas, motos, cascos, etc.
		</li>
		<li>
		Campañas en circuitos publicitarios, mupis, marquesinas, paneles informativos y mobiliario urbano, así como decoración para museos, ferias, congresos, seminarios e inauguraciones.
		</li>
		<li>
		Cuadros y obras de arte en lienzo.
		</li>
		<li>
		Cajas de luz y soportes publicitarios.
		</li>
		<li>
		Identificación de marca en obra con Glaspack.
		</li>
		</ul>
		<h3>VENTAJAS</h3>
		<ul>
		<li><strong>Variedad</strong>: Amplio abanico de materiales, sistemas y tamaños de impresión (hasta 5 m de ancho).</li>
		<li><strong>Calidad</strong>: Mediante la aplicación de los últimos sistemas de gestión de color y la más moderna tecnología.</li>
		<li><strong>Rapidez</strong>: Gracias a la gran capacidad productiva que aportan las últimas tecnologías.</li>
		</ul>


		

  	</div>
  </div>

  <div class="span3">
    
<?php include "inc/banner-envios.php"; ?>

  </div>
</div>
<?php include "inc/footer.php"; ?>