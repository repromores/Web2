<?php
include "inc/config.php";

$error = 0;
$update = 0;

//$ip 	    = isset($_POST["ip"])			? $_POST["ip"] 			: "";
$nombre		= isset($_POST["nombre"])		? $_POST["nombre"]		: "";
$ape    	= isset($_POST["ape"])			? $_POST["ape"] 		: "";
$email 		= isset($_POST["mail"])			? $_POST["mail"]		: "";
$dir     	= isset($_POST["dir"])			? $_POST["dir"]			: ""; 
$dir2     	= isset($_POST["dir2"])			? $_POST["dir2"]		: ""; 
$cp     	= isset($_POST["cp"])			? $_POST["cp"]			: ""; 
$pobl 		= isset($_POST["pobl"])			? $_POST["pobl"]		: "";
$tel        = isset($_POST["tel"])			? $_POST["tel"]			: "";
$pass       = isset($_POST["pass"])			? $_POST["pass"]		: "";
$cif        = isset($_POST["cif"])			? $_POST["cif"] 		: "";

$news       = isset($_POST["newsletter"])	? 1 : 0;


if($nombre =="" || $ape =="" ||  $email =="" ||  $pobl =="" ||  $tel =="" ||  $pass =="" ||  $cif ==""){
	$error = 1;
}else{

	$q = mysql_query("SELECT * FROM usuarios WHERE email='".$email."'");
	$n = mysql_num_rows($q);

	if($n>0){
		$fila = mysql_fetch_assoc($q);
		if($fila["password"] == ""){
			$update = 1;
		}else{
			$error = 2;
		}
	}
}

if($error == 0 && $update == 0){
	$q = 'INSERT INTO usuarios (email, password,nombre, apellidos, direccion, direccion2, cp, poblacion, provincia, telefono, cif, newsletter) VALUES 
	("'.$email.'","'.$pass.'","'.$nombre.'","'.$ape.'","'.$dir.'","'.$dir2.'","'.$cp.'","'.$pobl.'","","'.$tel.'","'.$cif.'",'.$news.')';

	echo $q;

	mysql_query($q);
}else if($error==0 && $update == 1){
	$q = 'UPDATE usuarios SET
	nombre ="'. $nombre .'",
	apellidos ="'. $ape .'",
	direccion ="'. $dir .'",
	direccion2 ="'. $dir2 .'",
	cp ="'. $cp .'",
	poblacion ="'. $pobl .'",
	telefono ="'. $tel .'",
	password ="'. $pass .'",
	cif ="'. $cif .'"
 WHERE email = "'.$email.'"';
 mysql_query($q);
}

if($error > 0){
	header("location: nuevo-usuario.php?error=".$error);
}else{
	include "inc/enviar-new.php";
	if($_POST["login"] == 2){
		header("location: login2.php?new=1");
	}else{
		header("location: login.php?new=1");
	}
}

?>

