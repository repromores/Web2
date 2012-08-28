<?php
include "config.php";

$error = 0;


$email = isset($_POST["emailreset"])? $_POST["emailreset"] : "";


if($email ==""){
	$error = 1;
}else{

	$q = mysql_query("SELECT * FROM usuarios WHERE email='".$email."'");
	$n = mysql_num_rows($q);

	if($n != 1){
		$error = 2;
	}
}

if($error==0){
	$row  = mysql_fetch_assoc($q);
	$pass = $row["password"];
}

if($error > 0){
	echo "<p>El email introducido no está en nuestra base de datos</p>";
}else{
	include "enviar-reset.php";

	echo "<p>Enviado con éxito a su correo</p>";
}
?>

