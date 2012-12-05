<?php
include "inc/config.php";

$error = 0;

//$ip 	    = isset($_POST["ip"])			? $_POST["ip"] 			: "";
$nombre		= isset($_POST["nombre"])		? $_POST["nombre"]		: "";
$ape    	= isset($_POST["ape"])			? $_POST["ape"] 		: "";
$dir     	= isset($_POST["dir"])			? $_POST["dir"]			: ""; 
$dir2     	= isset($_POST["dir2"])			? $_POST["dir2"]		: ""; 
$pobl 		= isset($_POST["pobl"])			? $_POST["pobl"]		: "";
$tel        = isset($_POST["tel"])			? $_POST["tel"]			: "";
$pass       = isset($_POST["pass"])			? $_POST["pass"]		: "";
$cif        = isset($_POST["cif"])			? $_POST["cif"] 		: "";
$cp        = isset($_POST["cp"])			? $_POST["cp"] 			: "";

$news       = isset($_POST["newsletter"])	? 1 : 0;

$pass = empty($pass)? $_SESSION["usr_pass"] : $pass;

if($nombre =="" || $ape =="" ||  $pobl =="" ||  $tel ==""  || $cif ==""|| $cp ==""){
	$error = 1;
}

if($error==0){
	$q = mysql_query('UPDATE usuarios SET
	nombre ="'. $nombre .'",
	apellidos ="'. $ape .'",
	direccion ="'. $dir .'",
	direccion2 ="'. $dir2 .'",
	poblacion ="'. $pobl .'",
	cp ="'. $cp .'",
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
	if($_POST["login"]=="2"){
		header("location: login2.php?edit=1");
	}else{
		header("location: login.php?edit=1");
	}
}
?>

