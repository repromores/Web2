<?php
include "inc/config.php";

$error = 0;
$update = 0;

//$ip 	    = isset($_POST["ip"])			? $_POST["ip"] 			: "";
$nombre		= isset($_POST["nombre"])		? $_POST["nombre"]		: "";
$ape    	= isset($_POST["ape"])			? $_POST["ape"] 		: "";
$email 		= isset($_POST["mail"])			? $_POST["mail"]		: "";
$dir     	= isset($_POST["dir"])			? $_POST["dir"]			: ""; 
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
	$q = 'INSERT INTO usuarios (email, password,nombre, apellidos, direccion, poblacion, provincia, telefono, cif, newsletter) VALUES 
	("'.$email.'","'.$pass.'","'.$nombre.'","'.$ape.'","'.$dir.'","'.$pobl.'","","'.$tel.'","'.$cif.'",'.$news.')';
	mysql_query($q);
}else if($error==0 && $update == 1){
	$q = 'UPDATE usuarios SET
	nombre ="'. $nombre .'",
	apellidos ="'. $ape .'",
	direccion ="'. $dir .'",
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

	header("location: login.php?new=1");
}
?>

