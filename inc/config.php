<?php
@session_start();
//modo de mantenimiento
$mantenimiento = false;
$pagos_activados = true;

if (getIp() =="127.0.0.1"){
	$pagos_activados = true;
	$_SESSION["entorno"] = "local";
	$db_host	= "localhost";
	$db_user	= "root";
	$db_pass	= "";

	$ftp_host	 = "127.0.0.1";
	$ftp_user	 = "ftpmores";
	$ftp_pass	 = "ftpmores1";
	$ftp_path	 ='/monxas/mores/';

	$paypal_URL_confirmado	="http://localhost/web2/confirmado_procesar.php";
	$paypal_URL_cancelado	="http://localhost/web2/cancelado.php";	

}else{
	$_SESSION["entorno"] = "produccion";
	$db_host	= "localhost";
	$db_user	= "root";
	$db_pass	= "Dartacan1898.";

	$ftp_host	= "localhost";
	$ftp_user	= "web2012";
	$ftp_pass	= "web2012";
	$ftp_path	= "";

	$paypal_URL_confirmado	="http://mores.es/confirmado_procesar.php";
	$paypal_URL_cancelado	="http://mores.es/cancelado.php";
}
 $analytics_code = "UA-21418483-1";


//paypal
if($pagos_activados){
	$paypal_API_UserName	= "informatica_api1.mores.es";
	$paypal_API_Password	= "J5AYNVTJ23YKA9SM";
	$paypal_API_Signature	= "AFcWxV21C7fd0v3bYYYRCpSSRl31Asc6Bi4qjx0Q.9IahYoJPOhFKf.c";

	//TPV La Caixa
	//true info
	$caixa_API_url			= "https://sis.sermepa.es/sis/realizarPago";
	$caixa_API_MerchantCode = "3536067";
	$caixa_API_Terminal 	= "1";
	$caixa_API_Currency		= "978";
	$caixa_API_CryptoKey	= "N22Q99538R124586";
	$caixa_API_Order		= date('ymdHis');
	$caixa_API_MerchantURL	= "http://mores.es/confirmado_procesar_caixa.php";
	$caixa_API_confirmado	="http://mores.es/confirmado_procesar.php";
	$caixa_API_cancelado	="http://mores.es/cancelado.php";

}else{
	$paypal_API_UserName	= "inform_1354188984_biz_api1.mores.es";
	$paypal_API_Password	= "1354189007";
	$paypal_API_Signature	= "AFcWxV21C7fd0v3bYYYRCpSSRl31Axbk0nhuv2s3DU0bei9ZS549671B ";

	//TPV La Caixa
	//test info
	$caixa_API_url			= "https://sis-t.sermepa.es:25443/sis/realizarPago";
	$caixa_API_MerchantCode = "3536067";
	$caixa_API_Terminal 	= "1";
	$caixa_API_Currency		= "978";
	$caixa_API_CryptoKey	= "qwertyasdf0123456789";
	$caixa_API_Order		= date('ymdHis');
	$caixa_API_MerchantURL	= "http://mores.es/confirmado_procesar_caixa.php";
	$caixa_API_confirmado	="http://mores.es/confirmado_procesar.php";
	$caixa_API_cancelado	="http://mores.es/cancelado.php";
}

$def_gastos_envio 	= 7.70;
$def_iva 			= 21;

if(getEnvio("iva")  == ""){setEnvio("iva" ,$def_iva);}
if(getEnvio("envi") == ""){setEnvio("envi",$def_gastos_envio);}


$mail_host 			= "10.1.8.5"; 
$mail_host_port 	= 25;
$mail_usr			= "correo.web";
$mail_pass			= "correoWeb.Mores";
$mail_emisor		= "webmaster@mores.es"; 


$emails_contacto 			= "informatica@mores.es, comercial@mores.es";
$emails_reset_pass			= "informatica@mores.es";
$emails_nuevo_usuario		= "informatica@mores.es";
$emails_nuevo_envio			= "informatica@mores.es";

$emails_pedido_tiendaweb	= "informatica@mores.es, admin@mores.es, entradas.web@mores.es";
$emails_secciones			= array(
									"carteleria" => "cartel@mores.es",
									"ImpDigital" => "color@mores.es"
								);

$url_imgs_mail	= "http://mores.es/img/";

$fotoliaKey = "svBKgX7unls2Y7abxY9pRe8hJacn5MAn";

$vinilos_impresos_fotolia_dpi  = 48;
$vinilos_impresos_fotolia_dpcm = $vinilos_impresos_fotolia_dpi/2.54;


ini_set('upload_max_filesize',1028);
ini_set('post_max_size',1028);
ini_set('memory_limit',1028);

function get_caixa_API_Key($amount){
	global $caixa_API_Order;
	global $caixa_API_MerchantCode;
	global $caixa_API_Currency;
	global $caixa_API_MerchantURL;
	global $caixa_API_CryptoKey;

	$message = $amount.$caixa_API_Order.$caixa_API_MerchantCode.$caixa_API_Currency."0".$caixa_API_MerchantURL.$caixa_API_CryptoKey;
$signature = strtoupper(sha1($message));
return $signature;
}

//require_once('class.phpmailer.php');
require_once('swift/swift_required.php');

$db_conn = mysql_connect($db_host, $db_user, $db_pass);
mysql_select_db("enviosMores");

function tiendaPublica(){
	if(getIp() == "212.89.22.73"){
	return true;
	}else{
	return false;
	}
}



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
function getNavigator(){
	$navigator = "";
	$navigator = strpos($_SERVER["HTTP_USER_AGENT"], 'Firefox') ? "Firefox": $navigator;
	$navigator = strpos($_SERVER["HTTP_USER_AGENT"], 'MSIE') ? "MSIE" : $navigator;
	$navigator = strpos($_SERVER["HTTP_USER_AGENT"], 'Safari') ? "Safari" : $navigator;
	$navigator = strpos($_SERVER["HTTP_USER_AGENT"], 'Chrome') ? "Chrome" : $navigator;
	return $navigator;
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
		$_SESSION["usr_loggedinat"]	= time();
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
/*
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
	  echo $e->errorMessage();
	  //enviarMail("informatica@mores.es","error","error:<br>".$e->errorMessage());
	} catch (Exception $e) {
		$e->getMessage();
	  //$e->getMessage(); //Boring error messages from anything else!
	}
}
*/
function enviarMail($mail_destino,$mail_asunto,$mail_mensaje,$remite = null){

	global $mail_host;
	global $mail_host_port;
	global $mail_usr;
	global $mail_pass;
	global $mail_emisor;

	$transport = Swift_SmtpTransport::newInstance($mail_host , 25,"tls")
	  ->setUsername($mail_usr)
	  ->setPassword($mail_pass)
	;

	$mailer = Swift_Mailer::newInstance($transport);

	if(empty($remite)){ $remite = $mail_emisor;}

	$message = Swift_Message::newInstance($mail_asunto)
	  ->setFrom(array($remite => $remite))
	  ->setBody($mail_mensaje,'text/html')
	;

	
	$array_emails = explode(",", $mail_destino);

	foreach ($array_emails as $address => $name){
	  if (is_int($address)) {
	    $message->setTo($name);
	  } else {
	    $message->setTo(array($address => $name));
	  }

	  $numSent += $mailer->send($message, $failedRecipients);
	}
	return $numSent;
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
  preg_match('/MSIE ([0-9].[0-9])/',$_SERVER['HTTP_USER_AGENT'],$reg);
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
	if(empty($_SESSION["pedido"]["productos"])){
		nuevoPedido($producto);
	}else{
		array_push($_SESSION["pedido"]["productos"], $producto);
	}
	return $_SESSION["pedido"];
}

function creaProducto($id,$ref,$nombre,$unidades,$medidas,$archivo1,$archivo2,$material,$precio,$info,$acabado,$producto,$categoria,$seccion){
	return array(
				id 			=> $id,
				ref 		=> $ref,
				nombre		=> $nombre,
				unidades 	=> $unidades,
				medidas		=> $medidas,
				archivo1	=> $archivo1,
				archivo2	=> $archivo2,
				material	=> $material,
				acabado		=> $acabado,
				precio		=> $precio,
				info 		=> $info,
				producto	=> $producto,
				categoria	=> $categoria,
				seccion		=> $seccion
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
				    <td>{{nombre}} {{ref}}</td>
				    <td>{{unidades}}</td>
				    <td>{{material}} {{acabado}}</td>
				    <td>{{medidas}}</td>
				    <td class="precio" data-precio="{{precio}}">{{precio}}€</td>
				    <td><i  data-id="id{{id}}" data-nid="{{id}}" class="icon-trash borrar-linea"></i></td>
			    </tr>';
	}else{
		$plantilla = '
				<tr class="id{{id}}">
				    <td>{{nombre}} {{ref}}</td>
				    <td>{{unidades}}</td>
				    <td>{{material}} {{acabado}}</td>
				    <td>{{medidas}}</td>
				    <td class="precio" data-precio="{{precio}}">{{precio}}€</td>
			    </tr>';		
	}
	$i = 0;
	foreach ($_SESSION["pedido"]["productos"] as $producto) {
		$i++;
		$infomedidas = $producto["medidas"][0] == ""? "": $producto["medidas"][0]. " x ". $producto["medidas"][1]. " cm";

		$temp = str_replace("{{id}}", $producto["id"], $plantilla);
		$temp = str_replace("{{nombre}}", $producto["nombre"], $temp);
		$temp = str_replace("{{info}}", $producto["info"], $temp);
		$temp = str_replace("{{material}}", $producto["material"], $temp);
		$temp = str_replace("{{acabado}}", $producto["acabado"], $temp);
		$temp = str_replace("{{ref}}", $producto["ref"], $temp);
		$temp = str_replace("{{medidas}}", $infomedidas, $temp);
		$temp = str_replace("{{alto}}", $producto["medidas"][1], $temp);
		$temp = str_replace("{{precio}}",  number_format($producto["precio"], 2, '.', ''), $temp);
		$temp = str_replace("{{unidades}}",  $producto["unidades"], $temp);
		
		$resp = $resp . $temp; 
	}
	if($i==0){
		$span = ($editable)? 5 : 4;
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
function getEnvio($elem,$number=0){
	if($number){
		return !isset($_SESSION["pedido"]["data"][$elem])? 0 : $_SESSION["pedido"]["data"][$elem];

	}else{
		return !isset($_SESSION["pedido"]["data"][$elem])? "" : $_SESSION["pedido"]["data"][$elem];
	}
}
function setEnvio($elem,$val){
	return $_SESSION["pedido"]["data"][$elem] = $val;
}

function getIVA(){
	return getEnvio("iva");
}

function calculaTotal($iva,$envio){
	$subtotal 	= 0;
	$total 		= 0;	
	if(!empty($_SESSION["pedido"]["productos"])){
		foreach ($_SESSION["pedido"]["productos"] as $producto) {
			$subtotal += (float)$producto["precio"];
		}
		$subtotal = $subtotal * (float)("1.".$iva);
		$total = (float)$subtotal + (float)$envio;
		$total = round($total, 2);
	}
	return $total;
}

function nProductos(){
	return count($_SESSION["pedido"]["productos"]);
}

function getEmailSeccionesPedido(){
	global $emails_secciones;
	$secciones = array();
	foreach ($_SESSION["pedido"]["productos"] as $producto) {
		array_push($secciones, $emails_secciones[$producto["seccion"]]);
	}
	$secciones = array_unique($secciones);
	$secciones = implode(",", $secciones);
	return $secciones;
}

function resetCarrito(){
	$productos = array();
	$_SESSION["pedido"] = array("productos" => $productos);
}
if(!isset($_SESSION["pedido"])){
	resetCarrito();
}
function getIdProducto(){
	return 0;
}
function getIdDescuento(){
	return 0;
}
function insertPedido($pagado = null){
	if(is_null($pagado)){
		$pagado = (getEnvio("pagado")==1)? 1 : 0;
	}
	if(getMetodoEnvio() != "mensajero"){
		setEnvio("envi",0);
	}
	if(getEnvio("idpedidoreserva") != ""){
		$idPedido = getEnvio("idpedidoreserva");
		$q = 'DELETE FROM t_pedido WHERE idpedido="'.$idPedido.'"';
		mysql_query($q);
	}else{
		$idPedido = getNewIdPedido();
	}
	$q = 'INSERT INTO t_pedido (idpedido,id_cliente,nombre,telefono,cif,fecha_inicio,pagado,entrega,info,pobl,prov,cp,iva,subtotal,total,comision,envi,dir1,dir2,tienda) VALUES("'.$idPedido.'", "'.$_SESSION["usr_email"].'","'.getEnvio("nombre").'","'.getEnvio("tele").'",
	"'.$_SESSION["usr_cif"].'",'.time().','.$pagado.',"'.getMetodoEnvio().'","'.getEnvio("info").'","'.getEnvio("pobl").'"
	,"'.getEnvio("prov").'","'.getEnvio("cp").'",'.getEnvio("iva").','.calculaTotal(0,0).','.calculaTotal(getEnvio("iva"),getEnvio("envi")).'
	,'.getEnvio("comision",1).','.getEnvio("envi").',"'.getEnvio("dir1").'","'.getEnvio("dir2").'","'.getEnvio("ciudad").'")';

	mysql_query($q);

	foreach ($_SESSION["pedido"]["productos"] as $producto) {
		$txt_medidas = $producto["medidas"][0]."x".$producto["medidas"][1];

		$q = 'INSERT INTO t_pedido_producto (id_pedido,id_producto,archivo1,archivo2,precio,id_descuento,medidas,info, ref_fotolia, material, acabado, nombre,producto,seccion,categoria,unidades) VALUES ("'.$idPedido.'",'.getIdProducto().',"'.$producto["archivo1"].'","'.$producto["archivo2"].'",'.$producto["precio"].','.getIdDescuento().',"'.$txt_medidas.'","'.$producto["info"].'","'.$producto["ref"].'","'.$producto["material"].'","'.$producto["acabado"].'","'.$producto["nombre"].'","'.$producto["producto"].'","'.$producto["seccion"].'","'.$producto["categoria"].'",'.$producto["unidades"].')';
		mysql_query($q);
	}
}
function getNewIdPedido(){
	$q = mysql_query('SELECT idpedido FROM t_pedido order by id DESC');
	$data = mysql_fetch_assoc($q);	
	$idpedido_old = $data["idpedido"];

	$idpedido_new ="w".(1+(int)substr($idpedido_old, 1));
	setEnvio("idpedido",$idpedido_new);
	return $idpedido_new;
}

function reservaIdPedido(){
	if(getEnvio("idpedidoreserva")==""){
		$id = getNewIdPedido();
		setEnvio("idpedidoreserva",$id);
		$q = 'INSERT INTO t_pedido (id_pedido) VALUES ("'.$id.'")';
		mysql_query($q);
	}else{
		$id = getEnvio("idpedidoreserva");
	}
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
		) VALUES("'.getEnvio("idpedido").'","'.$token.'","'.$timestamp.'","'.$correlationid.'","'.$p_transactionid.'","'.$p_amt.'"
		,"'.$p_ack.'","'.$p_errorcode.'","'.$p_feeamt.'","'.$p_paymentstatus.'","'.$p_pendingreason.'","'.$l_errorcode0.'","'.$l_shortmessage0.'","'.$l_longmessage0.'","'.$l_severity.'")';
	mysql_query($q);

return $p_ack;
}

function insertPedidoTarjeta(){
	$q = 'INSERT INTO t_pedido_tarjeta (id_pedido,token, t_transactionid) VALUES ("'.$_POST["Ds_MerchantData"].'","'.$_POST["Ds_Signature"].'"
		,"'.$_POST["Ds_Order"].'")';
	mysql_query($q);

}
function getPedidosOfUser($email){
	$q = mysql_query('SELECT * FROM t_pedido WHERE id_cliente="'.$email.'" ORDER BY id DESC');
	$num_rows = mysql_num_rows($q);
	if($num_rows){
		$linea = "";
		while($data = mysql_fetch_assoc($q)){
		$resp = "";
		$linea .= '<tr>
			<td>'.$data["idpedido"].'</td>
			<td>'.date("d-m-y",$data["fecha_inicio"]).'</td>
			<td>'.$data["entrega"].'</td>
			<td>'.$data["estado"].'</td>
			<td>'.$data["total"].' €</td>
			<td><button class="btn btn-small despliegadetalle" data-id="'.$data["idpedido"].'">Detalle</button></td>
		</tr>';

		$plantilla = '
				<tr class="id{{id}}">
				    <td>{{nombre}} {{ref}}</td>
				    <td>{{unidades}}</td>
				    <td>{{material}} {{acabado}}</td>
				    <td>{{medidas}}</td>
				    <td class="precio" data-precio="{{precio}}">{{precio}}€</td>
			    </tr>';		

		$query = mysql_query('SELECT * FROM t_pedido_producto WHERE id_pedido="'.$data["idpedido"].'"');
		while($producto = mysql_fetch_assoc($query)){
			$infomedidas = $producto["medidas"]== "x"? "" : $producto["medidas"] ." cm";

			$temp = str_replace("{{id}}", $producto["id"], $plantilla);
			$temp = str_replace("{{nombre}}", $producto["nombre"], $temp);
			$temp = str_replace("{{info}}", $producto["info"], $temp);
			$temp = str_replace("{{material}}", $producto["material"], $temp);
			$temp = str_replace("{{acabado}}", $producto["acabado"], $temp);
			$temp = str_replace("{{ref}}", $producto["ref"], $temp);
			$temp = str_replace("{{medidas}}", $infomedidas, $temp);
			$temp = str_replace("{{alto}}", $producto["medidas"][1], $temp);
			$temp = str_replace("{{precio}}",  number_format($producto["precio"], 2, '.', ''), $temp);
			$temp = str_replace("{{unidades}}", $producto["unidades"], $temp);
			
			$resp = $resp . $temp; 
		}

		if($data["entrega"]=="tienda"){
			$textodir = '<h3>Recogida en:</h3><p>Tienda '.$data["tienda"].'</p><p>'.$data["nombre"].'</p><p>'.$data["telefono"].'</p>';
		}else{
			$textodir = '<h3>Entrega en:</h3><p>'.$data["dir1"].'</p><p>'.$data["dir2"].'</p><p>'.$data["pobl"]." ".$data["cp"].'</p><p>'.$data["prov"].'</p>';
		}

		$linea .= '<tr class="detallepedido hide" id="'.$data["idpedido"].'">
			<td colspan="6">
				<table class="table">
				<thead>
		        <tr>
		          <th>Producto</th>
		          <th>Unidades</th>
		          <th>Material</th>
		          <th>Tamaño</th>
		          <th>Precio</th>
		        </tr>
		        </thead>
		        <tbody>
				'.$resp.'
				</tbody>
				</table>

				<div class="pull-left span5">
					'.$textodir.' 

				</div>

			    <table class="table span4" style="float:right">

			        <tbody>
			          <tr>
			            <th>Subtotal</th>
			            <td>'.formatoMoneda($data["subtotal"]).' €</td>
			          </tr>
			          <tr>
			            <th>IVA</th>
			            <td>'.formatoMoneda($data["subtotal"]* (float)($data["iva"]/100)).' €</td>
			          </tr>
			          <tr>
			            <th>Recogida</th>
			            <td>'.formatoMoneda($data["envi"]).' €</td>
			          </tr>
			          <tr>
			            <th>TOTAL</th>
			            <td class="">'.formatoMoneda($data["total"]).' €</td>
			          </tr>
			        </tbody>
			      </table>

			</td>
		</tr>';
		}
	}else{
		$linea = '<tr><td colspan="5" class="well">No has realizado ningún pedido en nuestra tienda, <strong><a href="tienda.php">a qué esperas?</strong></a></td></tr>';
	}

	return $linea;
}

function getLastPedidoOfUser($email){
	$q = mysql_query('SELECT * FROM t_pedido WHERE id_cliente="'.$email.'" ORDER BY id DESC LIMIT 1');
	$data = mysql_fetch_assoc($q);

	return $data["idpedido"];
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
function getPrecioProducto($tipo,$ancho,$alto,$montaje=0){
	$m = "m".$ancho."x".$alto;
	 
	$q = mysql_query("SELECT ".$m." FROM t_producto_cuadro WHERE producto='".$tipo."'");
  	$fila = mysql_fetch_assoc($q);
  	$precio =(float)$fila[$m];
	if($montaje!==0){
	  	$q2 = mysql_query("SELECT * FROM t_producto_montaje WHERE producto='".$m."'");
	    $fila2 = mysql_fetch_assoc($q2);  

	    $precio = $precio + (float)$fila2[$montaje];
	}
    return $precio;
}

function getPrecioIDigital($tipo,$unidades,$acabado){
  $q = mysql_query("SELECT * FROM t_producto_idigital WHERE producto='".$tipo."'");
  $fila = mysql_fetch_assoc($q); 
  $precio =(float)$fila["m".$unidades];
  return $precio;
}
function getPrecioCalendario($producto,$unidades){
  $q = mysql_query("SELECT * FROM t_producto_calendario WHERE producto='".$producto."'");
  $fila = mysql_fetch_assoc($q); 
  $tarifa = $unidades>25? $fila["u26"]: $fila["u25"];
  $precio =(float)$tarifa*$unidades+$fila["composicion"];
  return $precio;
}

function formatoMoneda($precio){
	return number_format($precio,2, '.', '');
}

function infoFacturacion(){
  $qu = "SELECT * FROM usuarios WHERE email='".$_SESSION["usr_email"]."'";
  $q = mysql_query($qu);
 
  $fila = mysql_fetch_assoc($q); 
  return $fila;
}
function getMailConfirSent($idpedido){
	$qu = "SELECT mail_confir FROM t_pedido WHERE idpedido='".$idpedido."'";
  	$q = mysql_query($qu);
  	$fila = mysql_fetch_assoc($q); 
	return $fila["mail_confir"];
}
function setMailConfirSent($idpedido){
	$qu = "UPDATE t_pedido SET mail_confir = 1 WHERE idpedido='".$idpedido."'";
  	$q = mysql_query($qu);
	return $q;
}

function guardarCodigoSeguimiento($nentrada,$codigo){
	$qu = 'UPDATE t_pedido SET referencia_envio = "'.$codigo.'" WHERE idpedido="'.$nentrada.'"';
  	$q = mysql_query($qu);
	return $q;
}

function getEmailFrompedido($npedido){
	$qu = "SELECT id_cliente FROM t_pedido WHERE idpedido='".$npedido."'";
  	$q = mysql_query($qu);
  	$fila = mysql_fetch_assoc($q); 
	return $fila["id_cliente"];
}
function getTiendaFrompedido($npedido){
	$qu = "SELECT tienda FROM t_pedido WHERE idpedido='".$npedido."'";
  	$q = mysql_query($qu);
  	$fila = mysql_fetch_assoc($q); 
	return $fila["tienda"];
}

function calculaPrecioDesde($tipo){
	global $def_iva;
	if($tipo == "fotodibond" || $tipo == "fotopvc" ||  $tipo == "vinilometacrilato"){
		$precio = getPrecioProducto($tipo,"40","30","chupetes");
	}elseif ($tipo == "fotocartonpluma") {
		$precio = getPrecioProducto($tipo,"40","30","perfil_aluminio");
	}elseif ($tipo == "lienzobastidor") {
		$precio = getPrecioProducto($tipo,"40","30");		
	}elseif ($tipo == "tarjetasvisita") {
		$precio = getPrecioIDigital($tipo,$unidades,$acabado);
	}elseif ($tipo == "calendario") {
		$precio = getPrecioCalendario($producto,$unidades);
	}elseif ($tipo == "vinilo"){
		$precio = getPrecioVinilo("impreso","40","30");
	}
	return formatoMoneda(((float)$precio*$def_iva/100)+(float)$precio);
}
function conIVA($precio){
	global $def_iva;
	return formatoMoneda((float)$precio + $precio*($def_iva/100));
}
?>