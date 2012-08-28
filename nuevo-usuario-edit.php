<?php
include "inc/config.php";

$error = 0;

//$ip 	    = isset($_POST["ip"])			? $_POST["ip"] 			: "";
$nombre		= isset($_POST["nombre"])		? $_POST["nombre"]		: "";
$ape    	= isset($_POST["ape"])			? $_POST["ape"] 		: "";
$dir     	= isset($_POST["dir"])			? $_POST["dir"]			: ""; 
$pobl 		= isset($_POST["pobl"])			? $_POST["pobl"]		: "";
$tel        = isset($_POST["tel"])			? $_POST["tel"]			: "";
$pass       = isset($_POST["pass"])			? $_POST["pass"]		: "";
$cif        = isset($_POST["cif"])			? $_POST["cif"] 		: "";
$news       = isset($_POST["newsletter"])	? 1 : 0;

$pass = empty($pass)? $_SESSION["usr_pass"] : $pass;

if($nombre =="" || $ape =="" ||  $pobl =="" ||  $tel =="" || $cif ==""){
	$error = 1;
}

if($error==0){
	$q = mysql_query('UPDATE usuarios SET
	nombre ="'. $nombre .'",
	apellidos ="'. $ape .'",
	direccion ="'. $dir .'",
	poblacion ="'. $pobl .'",
	telefono ="'. $tel .'",
	password ="'. $pass .'",
	cif ="'. $cif .'",
 	newsletter ='. $news .' 
 WHERE email = "'.$_SESSION["usr_email"].'"');
}

if($error > 0){
	header("location: editar-usuario.php?error=".$error);
}else{
	resetSession($_SESSION["usr_email"]);
	include "inc/enviar-edit.php";
	header("location: login.php?edit=1");
}
?>

