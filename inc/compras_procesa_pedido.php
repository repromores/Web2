<?php 
	include "config.php"; 

	$error = 0;

	$metodo = ($_POST["metodo"]=="m-tienda")? "tienda" : "mensajero";
	
	$nombre 	= $_POST["nombre"];
	$tele 		= $_POST["telefono"];

	if(($nombre == "") || ($tele == "")){
		$error = 1;
	}

	if($metodo == "mensajero"){
		$dir1 	= !empty($_POST["direccion1"])	? $_POST["direccion1"]	: "";
		$dir2 	= !empty($_POST["direccion2"])	? $_POST["direccion2"]	: "";
		$pobl 	= !empty($_POST["poblacion"])	? $_POST["poblacion"]	: "";
		$prov 	= !empty($_POST["provincia"])	? $_POST["provincia"] 	: "";
		//$envi 	= !empty($_POST["envio"])		? $_POST["envio"]		: "";
		$envi 	= $_SESSION["pedido"]["data"]["envi"];
		$cp 	= !empty($_POST["cp"])			? $_POST["cp"]			: "";
		
		if(($dir1 == "") || ($pobl == "") || ($prov == "") || ($cp == "")){
			$error = 1;
		}
	
	}else{
		$ciudad = $_POST["ciudadRecogida"];
		
		if(($nombre == "") || ($tele == "")){
			$error = 1;
		}
	}
	if($error > 0){
		header("location: ../pedido.php?error=".$error);
	}
	
	$_SESSION["pedido"]["metodo"] 			= $metodo;
	setEnvio("nombre", $nombre);
	setEnvio("tele", $tele);

	if($metodo == "mensajero"){
		setEnvio("dir1", $dir1);
		setEnvio("dir2", $dir2);
		setEnvio("pobl", $pobl);
		setEnvio("prov", $prov);
		setEnvio("envi", $envi);
		setEnvio("cp", $cp);
	} else {
		setEnvio("ciudad", $ciudad);
	}
	if($_SESSION["pedido"]["metodo"]== "mensajero"){
		$_SESSION["Payment_Amount"] = calculaTotal(getIVA(),getEnvio("envi"));
	}else{
		$_SESSION["Payment_Amount"] = calculaTotal(getIVA(),0);
	}
	header("location: ../compras_final.php");

?>