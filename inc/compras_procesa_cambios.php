<?php 
	include "config.php"; 

	$error = 0;

	$funcion = $_GET["f"];

	switch ($funcion) {
		case 'borrarproducto':
			borrarProducto();
			break;
		
		default:
			# code...
			break;
	}


function borrarProducto(){
	$id = $_GET["id"];
	$resultado = borraProducto($id);

	printResult($resultado);
}





function printResult($resultado){
	$ar_result = array(
	    ok => $resultado
	);
echo json_encode($ar_result);
}
?>