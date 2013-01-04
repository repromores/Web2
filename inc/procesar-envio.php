<?php
ini_set('display_errors', 1);
 ini_set('log_errors', 1);
 ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
 error_reporting(E_ALL);


include "config.php";



// Varios destinatarios
$de 	= 'webmaster@mores.es';

$error	= 0;
	
	$email_cliente	 	= $_POST["email"]? $_POST["email"]:"";
	$text 				= isset($_POST["descripcion"])? $_POST["descripcion"]:"";
	$archivos			= isset($_POST["archivossubidos"])? $_POST["archivossubidos"]:"";
	$nombre_cliente		= $_SESSION["usr_nombre"];
	$ape_cliente		= $_SESSION["usr_apellidos"];
	$cif_cliente		= $_SESSION["usr_cif"];
	$tel_cliente		= $_SESSION["usr_telefono"];
	$presupuesto		= !empty($_POST["presupuesto"])? $_POST["presupuesto"]:"(Sin presupuesto)";
	$ciudadRecogida 	= isset($_POST["ciudadRecogida"])? $_POST["ciudadRecogida"]:"";
	$seccion		 	= isset($_POST["seccion"])? $_POST["seccion"]:"";
	$infofiles			= isset($_POST["infofiles"])? $_POST["infofiles"]:"";

$infofiles_each = explode("@@@", $infofiles);
foreach ($infofiles_each as  $infofile) {
	$data = explode("@", $infofile);
	if(!empty($data[0])){
		insertEnvios($email_cliente, $data[0], $data[1], $seccion);
	}
}


if($ciudadRecogida == "oviedo" && $seccion == "reprografia"){
	$email_tienda = "copias@mores.es";
}else if($ciudadRecogida == "gijon" && $seccion == "reprografia"){
	$email_tienda = "copias.gijon@mores.es";
}else if($ciudadRecogida == "llanera" && $seccion == "reprografia"){
	$email_tienda = "planos.llanera@mores.es";
}

else if($seccion == "carteleria"){
	$email_tienda = "cartel@mores.es";	
}


else if($ciudadRecogida == "oviedo" && $seccion == "impresion-digital"){
	$email_tienda = "color@mores.es";	
}else if($ciudadRecogida == "gijon" && $seccion == "impresion-digital"){
	$email_tienda = "color.gijon@mores.es";	
}else if($ciudadRecogida == "llanera" && $seccion == "impresion-digital"){
	$email_tienda = "xeikon@mores.es";	
}



else if($ciudadRecogida == "oviedo" && $seccion == "planos"){
	$email_tienda = "planos@mores.es";	
}else if($ciudadRecogida == "gijon" && $seccion == "planos"){
	$email_tienda = "planos.gijon@mores.es";	
}else if($ciudadRecogida == "llanera" && $seccion == "planos"){
	$email_tienda = "planos.llanera@mores.es";	
}

else if($ciudadRecogida == "oviedo" && $seccion == "fotografia"){
	$email_tienda = "foto@mores.es";	
}else if($ciudadRecogida == "gijon" && $seccion == "fotografia"){
	$email_tienda = "foto.gijon@mores.es";	
}
$email_tienda = $email_tienda .", comercial@mores.es";



//$email_tienda = "ramon.kamibayashi@mores.es";	



	$_SESSION["usr_archivos"] = $archivos;

include "enviar-envios.php";

if(!$error){
  header('Location: ../resumen.php');
}else{
  header('Location: ../resumen.php?error='+ $error);
}
?>