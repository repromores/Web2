<?php
include "config.php";

$error = 0;

$user = $_POST["user"] ? $_POST["user"] : false;
$pass = $_POST["pass"] ? $_POST["pass"] : false;

if(!($user && $pass)){
	$error = 1;
}else{
	if(!checkUserPass($user,$pass)){
		$error = 2;
	}
}


if(!$error){
	header('Location: ../subir-archivos.php');
}else{
	header('Location: ../login.php?error='.$error);
}
?>