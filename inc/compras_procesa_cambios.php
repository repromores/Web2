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
	$id 	= empty($_GET["id"])? "id"+time() : $_GET["id"];
	$archivo1 	= empty($_GET["archivo1"])? "" : $_GET["archivo1"];
	$archivo2 	= empty($_GET["archivo2"])? "" : $_GET["archivo2"];
	$montaje 	= empty($_GET["montaje"])? "" : $_GET["montaje"];
	$montajestr	= empty($_GET["montaje"])? "" : " + " .$_GET["montaje"];
	$unidadestr	= empty($_GET["unidades"])? "" : " x " .$_GET["unidades"];

	$tipo 		= $_GET["tipo"];
	$nombre 	= $_GET["titulo"] . $montajestr . $unidadestr;
	$material 	= $_GET["material"];
	$unidades 	= $_GET["unidades"];
	$acabado 	= empty($_GET["acabado"])? "" : $_GET["acabado"];
	$info 		= empty($_GET["info"])? "" : $_GET["info"];
	$ref 		= empty($_GET["ref"])? "" : $_GET["ref"];
	$medidas 	= array($_GET["w"],$_GET["h"]);
	$producto	= empty($_GET["producto"])? "": $_GET["producto"];
	$seccion	= empty($_GET["categoria"])? "": $_GET["categoria"];
	$categoria	= empty($_GET["seccion"])? "": $_GET["seccion"];


	if($tipo == "fotodibond" || $tipo == "fotopvc" || $tipo == "fotocartonpluma" || $tipo == "vinilometacrilato" || $tipo == "lienzobastidor"){
		$precio = getPrecioProducto($tipo,$_GET["w"],$_GET["h"],$montaje);
	}elseif ($tipo == "tarjetasvisita") {
		$precio = getPrecioIDigital($tipo,$unidades,$acabado);
	}elseif ($tipo == "calendario") {
		$nombre = $nombre . " ". $archivo1;
		$precio = getPrecioCalendario($producto,$unidades);
	}else{
		$precio = getPrecioVinilo($_GET["tipo"],$_GET["w"],$_GET["h"]);
	}

	$producto 	= creaProducto($id,$ref,$nombre,$medidas,$archivo1,$archivo2,$material,$precio,$info,$acabado,$producto,$categoria,$seccion);
	agregaProducto($producto);

	$resultado 	= true;
	
	$ar_result = array(
	    ok => $resultado,
	    precio => $precio,
	    tipo => $tipo,
	    unidades => $unidades,
	    acabado => $acabado
	);
	printResult($ar_result);
}




function printResult($resultado){
	echo json_encode($resultado);
}
?>