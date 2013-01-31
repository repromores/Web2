<?php include "inc/config.php"; ?>
<?php include "inc/head.php";
 ?>
<title>morés - Impresión  directa sobre rígidos</title>
<?php
  // $h1text : variable para fijar el H1 en cada pagina para hacerlo único y aprovechar mejor el SEO
  $h1text = "Tienda online - morés";
 ?>
<?php include "inc/menu.php"; 

?>

  <div class="span10">
  	<div class="content tienda">

<h2>Tienda online</h2>
<p>Bienvenido a la tienda online de Morés. Iremos añadiendo productos. ¡Así que vuelve de vez en cuando!</p>
<p>Puedes recoger el pedido en cualquiera de nuestas tiendas de Oviedo, Gijón o Llanera, o pedir que te lo enviemos a cualquier parte de la península.</p>


	<div class="row">
		<?php
		/*
		<div class="span5">
			<a href="tienda_calendarios_info.php">
				<div class="categoria"><h3>Calendarios personalizados</h3>
					<img src="imagenes/online/CALENDARIOS.jpg"  alt="Calendarios personalizados">
					<p>Calendarios de pared, de mesa, de diferentes tamaños y diseños.</p>
				</div>
			</a>
		</div>
		*/
		?>
		<div class="span5">
			<a href="tienda_fotocartonpluma_info.php">
				<div class="categoria"><h3>Foto sobre cartón pluma</h3>
					<div class="group corner">
						<div class="wrap-ribbon right-corner lblue" style="font-size:16px;"><span>Desde <?php echo calculaPrecioDesde("fotocartonpluma"); ?>€</span></div>			
						<img src="imagenes/online/_MG_6249.jpg" alt="Foto sobre cartonpluma">
					</div>
					<p>Papel fotográfico adhesivado sobre cartón pluma con marco de aluminio.</p>
				</div>
			</a>
		</div>

		<div class="span5">
			<a href="tienda_vinilos_info.php">
				<div class="categoria"><h3>Vinilos decorativos</h3>
					<div class="group corner">
						<div class="wrap-ribbon right-corner lblue" style="font-size:16px;"><span>Desde <?php echo calculaPrecioDesde("vinilo"); ?>€</span></div>					
						<img src="imagenes/online/v-impreso.png" width="100%"  alt="Vinilo">
					</div>
					<p>Vinilos personalizados ideales para hogares, oficinas, locales y negocios.</p>
				</div>
			</a>
		</div>
	</div>
	<div class="row">
		<div class="span5">
			<a href="tienda_dibond_info.php">
				<div class="categoria"><h3>Foto sobre Dibond</h3>
					<div class="group corner">
						<div class="wrap-ribbon right-corner lblue" style="font-size:16px;"><span>Desde <?php echo calculaPrecioDesde("fotodibond"); ?>€</span></div>
						<img src="imagenes/online/_MG_6244.jpg" alt="Foto sobre Dibond">	
					</div>
					<p>Papel fotográfico adhesivado a sandwich de aluminio Dibond.</p>
				</div>
			</a>
		</div>
		<div class="span5">
			<a href="tienda_lienzobastidor_info.php">
				<div class="categoria"><h3>Lienzo sobre bastidor</h3>
					<div class="group corner">
						<div class="wrap-ribbon right-corner lblue" style="font-size:16px;"><span>Desde <?php echo calculaPrecioDesde("lienzobastidor"); ?>€</span></div>
						<img src="imagenes/online/CANVAS_PERSPECTIVA.jpg" alt="Canvas">
					</div>
					<p>Textil lienzo montado en bastidor.</p>
				</div>
			</a>
		</div>
	</div>
	<div class="row">
		<div class="span5">
			<a href="tienda_fotopvc_info.php">
				<div class="categoria"><h3>Foto sobre PVC</h3>
					<div class="group corner">
						<div class="wrap-ribbon right-corner lblue" style="font-size:16px;"><span>Desde <?php echo calculaPrecioDesde("fotopvc"); ?>€</span></div>					
						<img src="imagenes/online/_MG_6245.jpg" alt="Foto sobre PVC">
					</div>
					<p>Papel fotográfico adhesivado sobre PVC espumado.</p>
				</div>
			</a>
		</div>
		<div class="span5">
			<a href="tienda_vinilometacrilato_info.php">
				<div class="categoria"><h3>Vinilo metacrilato</h3>
					<div class="group corner">
						<div class="wrap-ribbon right-corner lblue" style="font-size:16px;"><span>Desde <?php echo calculaPrecioDesde("vinilometacrilato"); ?>€</span></div>
						<img src="imagenes/online/_MG_6247.jpg" alt="Vinilo metacrilato">
					</div>
					<p>Vinilo de calidad fotográfica adhesivado a metacrilato.</p>
				</div>
			</a>
		</div>
	</div>

  	</div>
  </div>

  <div class="span3">
    
<?php include "inc/banner-envios.php"; ?>

  </div>
</div>
<?php include "inc/footer.php"; ?>