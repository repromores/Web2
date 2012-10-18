<?php include_once "inc/config.php"; ?>
<?php
include_once "inc/apifotolia.php";

$foto_id = $_GET["id"];

$datos = json_decode(getInfoFoto($foto_id),true);

$foto_titulo 	= $datos["title"];
$foto_anchoMax 	= number_format($datos["width"]/$vinilos_impresos_fotolia_dpcm, 0, '.', '');
$foto_altoMax 	= number_format($datos["height"]/$vinilos_impresos_fotolia_dpcm, 0, '.', '');
$foto_tipo	 	= (int)$datos["media_type_id"];
$foto_url	 	= $datos["thumbnail_url"];



$foto_dim_str	= ($foto_tipo == 3)? "Ilimitado" : $foto_anchoMax." x ".$foto_altoMax." cm";

if ($foto_tipo !=3) {
	$tipo = "impreso";
	$proporcion = (float)$foto_anchoMax/$foto_altoMax;

	$p1 = getPrecioVinilo($tipo,30,30*$proporcion);
	$h1 = 30;
	$w1 = number_format(30*$proporcion, 0, '.', '');
	$t1 = number_format( 30*$proporcion, 0, '.', '')." x 30 cm";
 
	$p2 = getPrecioVinilo($tipo,45,45*$proporcion);
	$h2 = 45;
	$w2 = number_format(45*$proporcion, 0, '.', '');
	$t2 = number_format( 45*$proporcion, 0, '.', '')." x 45 cm";

	$p3 = getPrecioVinilo($tipo,60,60*$proporcion);
	$h3 = 60;
	$w3 = number_format(60*$proporcion, 0, '.', '');
	$t3 = number_format( 60*$proporcion, 0, '.', '')." x 60 cm";

	$p5 = getPrecioVinilo($tipo,90,90*$proporcion);
	$h5 = 90;
	$w5 = number_format(90*$proporcion, 0, '.', '');
	$t5 = number_format( 90*$proporcion, 0, '.', '')." x 90 cm";	

	$p4 = getPrecioVinilo($tipo,$foto_anchoMax,$foto_altoMax);
	$h4 = $foto_altoMax;
	$w4 = $foto_anchoMax;
	$t4 = $foto_dim_str;

	$material = "vinilo";
}

?>

<div class="muestra-imagen">
	<input type="hidden" id="imgsize" value="">
	<div class="img">
		<img src="<?php echo $foto_url; ?>" />
	</div>
	<div class="info">
		<h3><?php echo $foto_titulo; ?></h3>
		<p>Código: <?php echo $foto_id; ?></p>
		<p>Tamaño máximo: <?php echo $foto_dim_str; ?></p>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Tamaño (cm)</th>
					<th>Precio (€)</th>
				</tr>	
			</thead>
			<tbody>
				<?php 

				if(30<= $foto_altoMax) { ?>
				<tr data-h="<?php echo $h1 ?>" data-w="<?php echo $w1 ?>">
					<td><?php echo $t1 ?></td>
					<td><?php echo $p1 ?> €</td>
				</tr>
				<?php } if(45<= $foto_altoMax) { ?>
				<tr data-h="<?php echo $h2 ?>" data-w="<?php echo $w2 ?>">
					<td><?php echo $t2 ?></td>
					<td><?php echo $p2 ?> €</td>
				</tr>
				<?php } if(60<= $foto_altoMax) { ?>
				<tr data-h="<?php echo $h3 ?>" data-w="<?php echo $w3 ?>">
					<td><?php echo $t3 ?></td>
					<td><?php echo $p3 ?> €</td>
				</tr>				
				<?php } if(90<= $foto_altoMax) { ?>
				<tr data-h="<?php echo $h5 ?>" data-w="<?php echo $w5 ?>">
					<td><?php echo $t5 ?></td>
					<td><?php echo $p5 ?> €</td>
				</tr>
				<?php } ?>

				<tr data-h="<?php echo $h4 ?>" data-w="<?php echo $w4 ?>">
					<td><?php echo $t4 ?></td>
					<td><?php echo $p4 ?> €</td>
				</tr>
				<tr>
					<td class="custom-data" 
						data-id="<?php echo $foto_id ?>"
						data-wmax="<?php echo $foto_anchoMax ?>"
						data-tipo="<?php echo $tipo ?>"
						data-hmax="<?php echo $foto_altoMax ?>"
						data-titulo="<?php echo $foto_titulo ?>"
						data-material="<?php echo $material ?>"
						data-h=""
						data-w=""
						data-acabado="brillo"
						>

						<input type="text" class="input-mini i-custom i-ancho"> x <input type="text" class="input-mini i-custom i-alto"> cm
					</td>
					<td><span class="precioperso">0.00</span> €</td>
				</tr>
			</tbody>
		</table>
		<div class="form-horizontal">
			 <div class="control-group">
				<label class="control-label" for="inputEmail">Acabado:</label>
				<div class="controls">
			    	<div class="btn-group" data-toggle="buttons-radio">
					    <button type="button" class="btn btnacabado active" data-acabado="brillo">Brillo</button>
					    <button type="button" class="btn btnacabado" data-acabado="mate">Mate</button>
				    </div>
				</div>
			</div>
		</div>


		<div class="form-actions">
			<button class="btn btn-primary imgbtn" data-id="<?php echo $foto_id; ?>"><i class="icon-shopping-cart icon-white"></i> Añadir al carrito</button> 
			<button class="btn btn-cancelar">Cancelar</button>
		</div>
	</div>
</div>