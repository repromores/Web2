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
	if(!empty($_POST["goto"])){
		header('Location: ../'.$_POST["goto"]);
	}else if(!empty($_GET["login"])){

	  if(!empty($_GET["goto"])){
	    header('Location: '.$_GET["goto"]);
	  }else{
	    header('Location: compras_pedido.php');
	  }
	}else{
		header('Location: ../subir-archivos.php');
	}
}else{
	if(!empty($_GET["login"])){
		header('Location: ../login2.php?error='.$error);
	}else{
		header('Location: ../login.php?error='.$error);
	}
}
?>