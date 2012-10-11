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

$paypal_API_UserName	="ramonk_1347373173_biz_api1.gmail.com";
$paypal_API_Password	="1347373198";
$paypal_API_Signature	="AdA0jIwVZf-EmJTAQScl3X3Zwlr4AOGbDYH9Ik.vUhwyJyUQZ1-b-mjD";
$paypal_URL_confirmado	="http://localhost/web2/inc/confirmado.php";
$paypal_URL_cancelado	="http://localhost/web2/inc/cancelado.php";



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

$vinilos_impresos_fotolia_dpi  = 100;
$vinilos_impresos_fotolia_dpcm = $vinilos_impresos_fotolia_dpi/2.54;




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
		$_SESSION["usr_dir2"] 		= $fila["direccion2"]; 
		$_SESSION["usr_pob"] 		= $fila["poblacion"];
		$_SESSION["usr_pass"] 		= $fila["password"];
		$_SESSION["usr_prov"] 		= $fila["provincia"]; 
		$_SESSION["usr_cp"] 		= $fila["cp"]; 
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
		$_SESSION["usr_dir2"] 		= $fila["direccion2"]; 
		$_SESSION["usr_prov"] 		= $fila["provincia"]; 
		$_SESSION["usr_pob"] 		= $fila["poblacion"];
		$_SESSION["usr_pass"] 		= $fila["password"];
		$_SESSION["usr_telefono"] 	= $fila["telefono"];
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
//$producto = creaProducto(1244,"paco",array(54,200),"paco.jpg","vinilo",60.50,"la abuela de mi yerno quiere un sobrino amarillo","mate");

function nuevoPedido($producto){
	$productos = array($producto);
	$_SESSION["pedido"] = array("productos" => $productos);
}

function getEntrega(){
	return $_SESSION["pedido"]["entrega"];
}

function setEntrega($entrega){
	return $_SESSION["pedido"]["entrega"]=$entrega;
}

function agregaProducto($producto){
	

	if(empty($_SESSION["pedido"])){
		nuevoPedido($producto);
	}else{
		array_push($_SESSION["pedido"]["productos"], $producto);
	}
	return $_SESSION["pedido"];
}

function creaProducto($id,$nombre,$medidas,$archivo,$material,$precio,$info,$acabado){
	return array(
				id 			=> $id,
				nombre		=> $nombre,
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
	$borrado = 0;
	foreach ($_SESSION["pedido"]["productos"] as $indice => $producto){
		
		if($producto["id"]==$id){
			unset($_SESSION["pedido"]["productos"][$indice]);
			$_SESSION["pedido"]["productos"] = array_values($_SESSION["pedido"]["productos"]); 
			$borrado = 1;
			return $borrado;
		}
	}
	return $borrado;
}

function muestraPedidoCarrito($editable = true){
	$resp = "";
	if($editable){
		$plantilla = '
				<tr class="id{{id}}">
				    <td>{{nombre}}</td>
				    <td>{{ancho}}x{{alto}}cm {{info}}</td>
				    <td class="precio" data-precio="{{precio}}">{{precio}}€</td>
				    <td><i  data-id="id{{id}}" data-nid="{{id}}" class="icon-trash borrar-linea"></i></td>
			    </tr>';
	}else{
		$plantilla = '
				<tr class="id{{id}}">
				    <td>{{nombre}}</td>
				    <td>{{ancho}}x{{alto}}cm {{info}}</td>
				    <td class="precio" data-precio="{{precio}}">{{precio}}€</td>
			    </tr>';		
	}
	$i = 0;
	foreach ($_SESSION["pedido"]["productos"] as $producto) {
		$i++;
		$temp = str_replace("{{id}}", $producto["id"], $plantilla);
		$temp = str_replace("{{nombre}}", $producto["nombre"], $temp);
		$temp = str_replace("{{info}}", $producto["info"], $temp);
		$temp = str_replace("{{ancho}}", $producto["medidas"][0], $temp);
		$temp = str_replace("{{alto}}", $producto["medidas"][1], $temp);
		$temp = str_replace("{{precio}}",  number_format($producto["precio"], 2, '.', ''), $temp);

		$resp = $resp . $temp; 
	}
	if($i==0){
		$span = ($editable)? 4 : 3;
		$resp = '
			<tr class="id{{id}}">
			    <td colspan='.$span.'><span style="padding:30px 210px;display:block">El carrito está vacío.</span></td>
		    </tr>';		
	}
	return $resp;
}

function getMetodoEnvio(){
	return $_SESSION["pedido"]["metodo"];
}
function getEnvio($elem){
	return $_SESSION["pedido"]["data"][$elem];
}
function setEnvio($elem,$val){
	return $_SESSION["pedido"]["data"][$elem] = $val;
}

function getIVA(){
	return 21;
}

function calculaTotal($iva,$envio){
	$subtotal = 0;
	foreach ($_SESSION["pedido"]["productos"] as $producto) {
		$subtotal += (float)$producto["precio"];
	}
	$subtotal = $subtotal * (float)("1.".$iva);
	$total = (float)$subtotal + (float)$envio;
	$total = round($total, 2);
	return $total;
}

function nProductos(){
	return count($_SESSION["pedido"]["productos"]);
}

function resetCarrito(){
	$productos = array();
	$_SESSION["pedido"] = array("productos" => $productos);
}
if(!isset($_SESSION["pedido"])){
	resetCarrito();
}


function getIdPedido(){
	$id = empty($_SESSION["pedido"]["data"]["idpedido"])? time() : $_SESSION["pedido"]["data"]["idpedido"];
	return $id;
}
function insertPedidoPaypal($resArray){
	$token 				= empty($resArray["TOKEN"])? null :$resArray["TOKEN"];
	$timestamp 			= empty($resArray["TIMESTAMP"])? null :$resArray["TIMESTAMP"]; 
	$correlationid 		= empty($resArray["CORRELATIONID"])? null :$resArray["CORRELATIONID"]; 
	$p_transactionid 	= empty($resArray["PAYMENTINFO_0_TRANSACTIONID"])? null :$resArray["PAYMENTINFO_0_TRANSACTIONID"]; 
	$p_amt 				= empty($resArray["PAYMENTINFO_0_AMT"])? null :$resArray["PAYMENTINFO_0_AMT"]; 
	$p_ack 				= empty($resArray["PAYMENTINFO_0_ACK"])? null :$resArray["PAYMENTINFO_0_ACK"]; 
	$p_errorcode 		= empty($resArray["PAYMENTINFO_0_ERRORCODE"])? null :$resArray["PAYMENTINFO_0_ERRORCODE"]; 
	$p_feeamt			= empty($resArray["PAYMENTINFO_0_FEEAMT"])? null :$resArray["PAYMENTINFO_0_FEEAMT"]; 
	$p_paymentstatus 	= empty($resArray["PAYMENTINFO_0_PAYMENTSTATUS"])? null :$resArray["PAYMENTINFO_0_PAYMENTSTATUS"]; 
	$p_pendingreason 	= empty($resArray["PAYMENTINFO_0_PENDINGREASON"])? null :$resArray["PAYMENTINFO_0_PENDINGREASON"]; 
	$l_errorcode0 		= empty($resArray["L_ERRORCODE0"])? null :$resArray["L_ERRORCODE0"]; 
	$l_shortmessage0 	= empty($resArray["L_SHORTMESSAGE0"])? null :$resArray["L_SHORTMESSAGE0"]; 
	$l_longmessage0 	= empty($resArray["L_LONGMESSAGE0"])? null :$resArray["L_LONGMESSAGE0"]; 
	$l_severity		 	= empty($resArray["L_SEVERITYCODE0"])? null :$resArray["L_SEVERITYCODE0"]; 


	$q = 'INSERT INTO t_pedido_paypal (
		id_pedido,
		token,
		timestamp,
		correlationid,
		p_transactionid,
		p_amt,
		p_ack,
		p_errorcode,
		p_feeamt,
		p_paymentstatus,
		p_pendingreason,
		l_errorcode0,
		l_shortmessage0,
		l_longmessage0,
		l_severity
		) VALUES('.getIdPedido().',"'.$token.'","'.$timestamp.'","'.$correlationid.'","'.$p_transactionid.'","'.$p_amt.'"
		,"'.$p_ack.'","'.$p_errorcode.'","'.$p_feeamt.'","'.$p_paymentstatus.'","'.$p_pendingreason.'","'.$l_errorcode0.'","'.$l_shortmessage0.'","'.$l_longmessage0.'","'.$l_severity.'")';
	
	mysql_query($q);

return $p_ack;
}
function insertPedido(){
	$id 				= empty($resArray["TOKEN"])? null :$resArray["TOKEN"];
}

function getPrecioVinilo($tipo,$ancho,$alto){
	$cm2 =$ancho*$alto;
	switch ($tipo) {
		case 'impreso':
			$tarifa = ($cm2>50000)? "p5mp" : "p5mm";
			break;
		case 'laminado':
			$tarifa = "p5mm";
			break;
		case 'corte':
			$tarifa = ($cm2>50000)? "p5mp" : "p5mm";
			$tarifa = ($cm2>500000)? "p50mp" : $tarifa;
			break;
		case 'acido':
			$tarifa = ($cm2>50000)? "p5mp" : "p5mm";
			$tarifa = ($cm2>500000)? "p50mp" : $tarifa;
			break;
	}

	$q = mysql_query("SELECT * FROM t_producto_vinilo WHERE producto='".$tipo."'");
	
	$cm2 = ($cm2<10000)? 10000 : $cm2;

	$fila = mysql_fetch_assoc($q);	
	$precio = $fila[$tarifa];
	return number_format($precio*$cm2/10000 ,2, '.', '');

}

?>