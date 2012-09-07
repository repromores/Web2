<?php include "inc/config.php"; ?>
<?php include "inc/head.php"; ?>
<title>morés - Quiénes somos</title>
<?php
  // $h1text : variable para fijar el H1 en cada pagina para hacerlo único y aprovechar mejor el SEO
  $h1text = "Quiénes somos - morés";
 ?>
<?php include "inc/menu.php"; ?>

  <div class="span10">
  	<div class="content">
<h2>¿Quiénes somos?</h2>
<p>Morés es una empresa de artes gráficas fundada en 1977 en la calle Viaducto Marquina, de Oviedo, muy cerca de la céntrica calle Uría.</p>
<p>Desde entonces, se ha producido una gran evolución de sus medios tecnológicos y la preparación técnica de su personal, distinguiéndose desde sus inicios por la forma de concebir su área de trabajo en términos de calidad y profesionalidad. Su historia, más de un cuarto de siglo, se caracteriza por progresos movidos por un espíritu dinámico e innovador, con el objetivo de ofrecer uno de los servicios más completos en el sector de la impresión y reproducción digital. </p>
<p>Hoy Morés se ha convertido en uno de los referentes en la industria de la impresión y la reprografía tanto en Asturias como en España. Al local inicial de Viaducto Marquina se le han unido progresivamente otros tres centros en diferentes puntos de la geografía asturiana (Gijón-Marqués de San Esteban y Parque Tecnológico de Llanera -Edificio Covadonga y Edificio Centro Elena), para su consolidar su oferta de servicios en la región. </p>
<p>El principal objetivo que busca Morés es dar un servicio lo más completo posible, desde fotocopias y reproducción de planos hasta impresión digital, rotulación, encuadernación artesanal, digitalización, fotografía digital, etc. Y todo ello, con una gran apuesta por la última tecnología y el mejor capital humano. </p>
<ul class="galeria">
			<?php 
				$array_imagenes = array(
					"o0015.jpg",
					"o0014.jpg",
					"o0013.jpg",
					"o0012.jpg",
					"n0011.jpg",
					"n0010.jpg",
					"n0008.jpg",
					"n0007.jpg",
					"g0005.jpg",
					"g0004.jpg",
					"g0003.jpg",
					"g0002.jpg",
					"g0001.jpg",
					"c0017.jpg",
					"c0016.jpg",


				);
				$array_titulos = array(
					"Tienda en Oviedo - Viaducto Marquina",
					"Tienda en Oviedo - Viaducto Marquina",
					"Tienda en Oviedo - Viaducto Marquina",
					"Tienda en Oviedo - Viaducto Marquina",
					"Edificio Covadonga - Parque Tecnológico de Llanera",
					"Edificio Covadonga - Parque Tecnológico de Llanera",
					"Edificio Covadonga - Parque Tecnológico de Llanera",
					"Edificio Covadonga - Parque Tecnológico de Llanera",
					"Tienda en Gijón - Marqués de San Esteban",
					"Tienda en Gijón - Marqués de San Esteban",
					"Tienda en Gijón - Marqués de San Esteban",
					"Tienda en Gijón - Marqués de San Esteban",
					"Tienda en Gijón - Marqués de San Esteban",
					"Tienda en Centro Elena - Parque Tecnológico de Llanera",
					"Tienda en Centro Elena - Parque Tecnológico de Llanera",
				);

				echo creaListaGaleria($array_imagenes,"imagenes/tiendas/",$array_titulos);
			?>
		</ul>

<a href="dossier.pdf" target="_blank">
	<div class="pdfdoc"><img src="img/pdf.png" alt="ver dossier"><span>Ver Dossier PDF</span></div>
</a>

  	</div>
  </div>

  <div class="span3">
    
<?php include "inc/banner-envios.php"; ?>

  </div>
</div>
<?php include "inc/footer.php"; ?>