<?php
@session_start();

//modo de mantenimiento
$mantenimiento = false;

if (getIp() =="127.0.0.1"){
	
	$db_host	= "localhost";
	$db_user	= "root";
	$db_pass	= "";

	$ftp_host	 = "127.0.0.1";
	$ftp_user	 = "ftpmores";
	$ftp_pass	 = "ftpmores1";
	$ftp_path	 ='/monxas/mores/';

}else{

	$db_host	= "localhost";
	$db_user	= "root";
	$db_pass	= "Dartacan1898.";

	$ftp_host	= "localhost";
	$ftp_user	= "web2012";
	$ftp_pass	= "web2012";
	$ftp_path	= "";

}
 $analytics_code = "UA-21418483-1";

//paypal
$paypal_API_UserName	="ramonk_1347290607_biz_api1.gmail.com";
$paypal_API_Password	="1347290628";
$paypal_API_Signature	="AXgqzbFBBDp0WVQ6JS272VA0pChOAE57UFFHF1SuhZHxXTmXIQ.0At0M";

$mail_host 			= "10.1.8.5"; 
$mail_host_port 	= 25;
$mail_usr			= "correo.web";
$mail_pass			= "correoWeb.Mores";
$mail_emisor		= "webmaster@mores.es"; 


$emails_contacto 		= "informatica@mores.es, comercial@mores.es";
$emails_reset_pass		= "informatica@mores.es";
$emails_nuevo_usuario	= "informatica@mores.es";
$emails_nuevo_envio		= "informatica@mores.es";

$url_imgs_mail	= "http://mores.es/img/";

$fotoliaKey = "svBKgX7unls2Y7abxY9pRe8hJacn5MAn";

require_once('class.phpmailer.php');

$db_conn = mysql_connect($db_host, $db_user, $db_pass);
mysql_select_db("enviosMores");




function getIp(){
    if (!empty($_SERVER['HTTP_CLIENT_IP'])){
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else{
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

function limpia($dirty){
if (get_magic_quotes_gpc()) {
$clean = mysql_real_escape_string(stripslashes($dirty));
}else{
$clean = mysql_real_escape_string($dirty);
}
return $clean;
}

function checkUserPass($user,$pass){
	$res = false;
	$_SESSION["usr_islogged"] = false;

	$q = mysql_query("SELECT * FROM usuarios WHERE email='".$user."' AND password='".$pass."'");
	$n = mysql_num_rows($q);

	if($n==1){
		$res = true;
		$fila = mysql_fetch_assoc($q);	
		$_SESSION["usr_email"]		= $user;
		$_SESSION["usr_nombre"]		= $fila["nombre"];
		$_SESSION["usr_apellidos"]	= $fila["apellidos"];
		$_SESSION["usr_cif"] 		= $fila["cif"];
		$_SESSION["usr_telefono"] 	= $fila["telefono"]; 
		$_SESSION["usr_dir"] 		= $fila["direccion"]; 
		$_SESSION["usr_pob"] 		= $fila["poblacion"];
		$_SESSION["usr_pass"] 		= $fila["password"];
		$_SESSION["usr_islogged"]	= true;
		$_SESSION["usr_folder"]		= date("Y-m-d_H-i") ."-00 - ".$_SESSION["usr_email"];
	}
	return $res;
}

function resetSession($user){
	$q = mysql_query("SELECT * FROM usuarios WHERE email='".$user."'");
	$n = mysql_num_rows($q);

	if($n==1){
		$fila = mysql_fetch_assoc($q);	
		$_SESSION["usr_email"]		= $fila["email"];
		$_SESSION["usr_nombre"]		= $fila["nombre"];
		$_SESSION["usr_apellidos"]	= $fila["apellidos"];
		$_SESSION["usr_cif"] 		= $fila["cif"];
		$_SESSION["usr_telefono"] 	= $fila["telefono"]; 
		$_SESSION["usr_dir"] 		= $fila["direccion"]; 
		$_SESSION["usr_pob"] 		= $fila["poblacion"];
		$_SESSION["usr_pass"] 		= $fila["password"];
		$_SESSION["usr_folder"]		= date("Y-m-d_H-i") ."-00 - ".$_SESSION["usr_email"];
	}
}


function isLogged(){
	return isset($_SESSION["usr_islogged"])? $_SESSION["usr_islogged"] : false;
}

function insertEnvios($usuario, $nombreArchivo, $tamanio, $seccion){
	$formato_archivo = getExtension($nombreArchivo);
	$q = 'INSERT INTO envios (fecha, usuario, ip,nombreArchivo, formato_archivo, tamanio, seccion) VALUES("'.date("Y-m-d_H-i").'-00", "'.$usuario.'","'.getIp().'","'.$nombreArchivo.'","'.$formato_archivo.'","'.$tamanio.'","'.$seccion.'")';
	mysql_query($q);
	return $q;
}

function getExtension($file){
	 return substr(strrchr($file,'.'),1);
}

function enviarMail($mail_destino,$mail_asunto,$mail_mensaje,$remite = null){

	$mail = new PHPMailer(false); // the true param means it will throw exceptions on errors, which we need to catch
	$mail->IsSMTP(); // telling the class to use SMTP
	try {
		global $mail_host;
		global $mail_host_port;
		global $mail_usr;
		global $mail_pass;
		global $mail_emisor;


	  $mail->Host       = $mail_host;        		      // SMTP server
	  //$mail->SMTPDebug  = 2;                            // enables SMTP debug information (for testing)
	  $mail->SMTPAuth   = true;                           // enable SMTP authentication
	  $mail->SMTPSecure = "tls";
 	  $mail->CharSet 	= "UTF-8";

	  $mail->Port       = $mail_host_port;               // set the SMTP port for the GMAIL server
	  $mail->Username   = $mail_usr;  					 // SMTP account username
	  $mail->Password   = $mail_pass;      		         // SMTP account password
	  if(!empty($remite)){
	  	$mail->AddReplyTo($remite, $remite);
	  }else{
		$mail->AddReplyTo($mail_emisor, $mail_emisor);
	  }

	  $array_emails = explode(",", $mail_destino);

	  foreach($array_emails as $email_unico_destino){
	  	$email_unico_destino = trim($email_unico_destino);
 		$mail->AddAddress($email_unico_destino, $email_unico_destino);
	  }
 

	  $mail->SetFrom($mail_emisor, $mail_emisor);

	  $mail->Subject = $mail_asunto;
	  $mail->AltBody = 'Para ver el mensaje, ábrelo con un visor compatible con HTML'; // optional - MsgHTML will create an alternate automatically
	  $mail->MsgHTML($mail_mensaje);
	  $mail->Send();
	} catch (phpmailerException $e) {
	  $e->errorMessage(); //Pretty error messages from PHPMailer
	  enviarMail("informatica@mores.es","error","error:<br>".$e->errorMessage());
	} catch (Exception $e) {
	  $e->getMessage(); //Boring error messages from anything else!
	}
}


function creaListaGaleria($array_imagenes,$ruta,$titulos = null){
	$result = '';
	$imagen_titulo = '';
	foreach($array_imagenes as $index=>$imagen){
		if(is_null($titulos )){
			if(strlen($imagen) >= 18){
				$imagen_titulo = str_replace("_", " ", $imagen);
				$imagen_titulo = str_replace("-", " ", $imagen_titulo);
				$imagen_titulo = str_replace("", "", $imagen_titulo);
				$imagen_titulo = str_replace("(", "", $imagen_titulo);
				$imagen_titulo = str_replace(range(0,9),'',$imagen_titulo);
				$imagen_titulo = preg_replace('/\..*$/','',$imagen_titulo); 
			}else{
				$imagen_titulo = '';
			}
		}else{
			$imagen_titulo =  $titulos[$index];
		}
		$imagen_titulo = ucfirst($imagen_titulo);
		$result .= '<li><a class="galeriaitem" title="'.$imagen_titulo.'" href="'.$ruta.$imagen.'" data-fancybox-group="fancybox"><img src="mini-imagenes/'.$ruta.$imagen.'" title="'.$imagen_titulo.'" alt="'.$imagen_titulo.'"/></a></li>';
	}

	return $result;
}

function checkEmail($email){
	$result = '';
	
	$q = mysql_query("SELECT * FROM usuarios WHERE email='".$email."'");
	$n = mysql_num_rows($q);

	if($n==0){
		//insert
		$q = mysql_query('INSERT INTO usuarios (email, newsletter) VALUES ("'.$email.'",1)');
	}else{
		$fila = mysql_fetch_assoc($q);	
		$newsletter = $fila["newsletter"];
		if($newsletter == 0){
			//update
			$q1 = mysql_query('UPDATE usuarios SET newsletter = 1 WHERE email = "'.$email.'"');	
		}
	}

	return $n;
}

function ieversion() {
  ereg('MSIE ([0-9].[0-9])',$_SERVER['HTTP_USER_AGENT'],$reg);
  if(!isset($reg[1])) {
    return -1;
  } else {
    return floatval($reg[1]);
  }
}
$COMPATIBLEMODE = (ieversion()!=-1 && ieversion()<9)? 1 : 0;


/***********************************************************
CARRITO

function aplicaDescuento(){}
***********************************************************/
//$producto = creaProducto(1244,array(54,200),"paco.jpg","vinilo",60.50,"la abuela de mi yerno quiere un sobrino amarillo","mate");

function nuevoPedido($producto){
	$productos = array($producto);
	$_SESSION["pedido"] = array("productos" => $productos);
}


function agregaProducto($producto){
	

	if(empty($_SESSION["pedido"])){
		nuevoPedido($producto);
	}else{
		array_push($_SESSION["pedido"]["productos"], $producto);
	}
	return $_SESSION["pedido"];
}

function creaProducto($id,$medidas,$archivo,$material,$precio,$info,$acabado){
	return array(
				id 			=> $id,
				medidas		=> $medidas,
				archivo		=> $archivo,
				material	=> $material,
				acabado		=> $acabado,
				precio		=> $precio,
				info 		=> $info
				);
}

function muestraProducto($id){
	foreach ($_SESSION["pedido"]["productos"] as $producto) {
		if($producto["id"]==$id){
			return $producto;
		}
	}
	return false;
}

function borraProducto($id){
	foreach ($_SESSION["pedido"]["productos"] as $indice => $producto){
		if($producto["id"]==$id){
			unset($_SESSION["pedido"]["productos"][$indice]);
			$_SESSION["pedido"]["productos"] = array_values($_SESSION["pedido"]["productos"]); 
		}
	}
	return $_SESSION["pedido"];
}



function resetCarrito(){
	$productos = array();
	$_SESSION["pedido"] = array("productos" => $productos);
}

?>