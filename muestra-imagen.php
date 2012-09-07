<?php include_once "inc/config.php"; ?>
<?php
include_once "inc/apifotolia.php";

$foto_id = 40749789;

$datos = json_decode(getInfoFoto($foto_id),true);

$foto_titulo 	= $datos["title"];
$foto_anchoMax 	= $datos["width"];
$foto_altoMax 	= $datos["height"];
$foto_tipo	 	= (int)$datos["media_type_id"];
$foto_url	 	= $datos["thumbnail_url"];


$foto_dim_str	= ($foto_tipo == 3)? "Ilimitado" : $foto_anchoMax."x".$foto_altoMax;


?>

<div class="muestra-imagen">
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
				<tr>
					<td>100x150</td>
					<td>40.87</td>
				</tr>
				<tr>
					<td>100x150</td>
					<td>40.87</td>
				</tr>
				<tr>
					<td>100x150</td>
					<td>40.87</td>
				</tr>
				<tr>
					<td>100x150</td>
					<td>40.87</td>
				</tr>
				<tr>
					<td>100x150</td>
					<td>40.87</td>
				</tr>
			</tbody>
		</table>
		<button class="btn btn-primary">Seleccionar</button>
	</div>
</div>