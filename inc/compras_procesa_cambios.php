<?php 
	include "config.php"; 

	$error = 0;

	$funcion = $_GET["f"];

	switch ($funcion) {
		case 'borrarproducto':
			borrarProducto();
			break;
		case 'agregaproducto':
			agregaproductos();
			break;			
		case 'getpreciovinilo':
			echo getPrecioVinilo($_POST["tipo"],$_POST["ancho"],$_POST["alto"]);
			break;
		default:
			# code...
			break;
	}


function borrarProducto(){
	$id = $_GET["id"];
	$resultado = borraProducto($id);

	$ar_result = array(
	    ok 		=> $resultado,
	    nprod 	=> nProductos()
	);

	printResult($ar_result);
}

function agregaproductos(){
	$id = date(U);
	$archivo 	= $_GET["id"];
	$tipo 		= $_GET["tipo"];
	$nombre 	= $_GET["titulo"];
	$material 	= $_GET["material"];
	$acabado 	= empty($_GET["acabado"])? "" : $_GET["acabado"];
	$info 		= empty($_GET["info"])? "" : $_GET["info"];
	$medidas 	= array($_GET["w"],$_GET["h"]);

	$precio 	= getPrecioVinilo($_GET["tipo"],$_GET["w"],$_GET["h"]);

	$producto 	= creaProducto($id,$nombre,$medidas,$archivo,$material,$precio,$info,$acabado);
	agregaProducto($producto);

	$resultado 	= true;
	
	$ar_result = array(
	    ok => $resultado
	);
	printResult($ar_result);
}




function printResult($resultado){
	echo json_encode($resultado);
}
?>