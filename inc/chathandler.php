<?php
include "config.php";

$function = $_POST["f"]; 
switch ($function) {
	case 'newChat':
		startNewChat();
		break;
	
	default:
		chat();
		break;
}


function chat(){
	if($_POST["session"] == ""){
		startNewChat();
	}
}

function startNewChat(){
	$idcliente = ($_POST["chatpcid"] == "")? getNewIdCliente() : $_COOKIE["chatpcid"];

	$q = 'INSERT INTO chat (idcliente, idusuario,fecha,navegador,so,version) VALUES ('.$idcliente.',"'.c($_POST["user"]).'","'.date(U).'","'.c($_POST["browser"]).'","'.c($_POST["os"]).'","'.c($_POST["browserver"]).'")';
	mysql_query($q);
//	print_r($_POST);
}


function getNewIdCliente(){
	$q = 'SELECT MAX(idcliente) as idcliente FROM chat';
	$querydata = mysql_query($q);
	$fila = mysql_fetch_assoc($querydata);
	return $fila["idcliente"]+1;
}
function c($var){
	return mysql_real_escape_string($var);
}
?>