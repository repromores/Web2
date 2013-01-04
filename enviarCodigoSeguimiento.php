<?php 
	include "inc/config.php"; 

$nentrada 	= mysql_real_escape_string($_GET["numeroEntrada"]);
$tipo 	 	= mysql_real_escape_string($_GET["tipo"]);

if($tipo="recogida"){
	$cuando 	= mysql_real_escape_string($_GET["cuando"]);
	$tienda = getTiendaFrompedido($nentrada);

	switch ($tienda) {
        case "oviedo": 
            $tienda_text = 'Oviedo, Viaducto Ingeniero Marquina, 7';
            break;
        case "gijon":
            $tienda_text = 'Gijón, Marqués de San Esteban, 4';
            break;
        case "llanera":
            $tienda_text = 'Parque Tecnológico de Asturias, Parcela 2';
            break;
	}

	$textaco_cliente = '
	<div class="span10 content" id="pag-final" style="width: 583px; font-family: sans-serif">
	<h1 class="" style="margin: 0;font-family: inherit;font-weight: bold;color: inherit;text-rendering: optimizelegibility;font-size: 30px;line-height: 32px;">
	<a href="http://mores.es" style="color: #0088cc;text-decoration: none;outline: none;"><img alt="Morés" src="http://mores.es/img/mores.png" class="" style="max-width: 100%;vertical-align: middle;border: 0;-ms-interpolation-mode: bicubic;">
	</a></h1><h2 style="margin: 0;font-family: inherit;font-weight: bold;color: #bc1922;text-rendering: optimizelegibility;font-size: 24px;line-height: 32px;border-bottom: 1px #bc1922 solid;margin-bottom: 25px;">Compra realizada</h2>
	<p> Ya tenemos listo tu pedido: '.$nentrada.'</p> 
	<p>Lo puedes recoger '.$cuando.'  en nuestra tienda de </br>'.$tienda_text.'</p></br><p>Un saludo y disfruta de tu pedido!</p></div>';

	$email = getEmailFrompedido($nentrada);

	$mail_asunto = "Tenemos tu pedido ". $nentrada;
	echo $textaco_cliente;
	//$tienda_text = "";
	enviarMail($email,$mail_asunto,$textaco_cliente);

}else{
	$codigo 	= mysql_real_escape_string($_GET["codigo"]);

	guardarCodigoSeguimiento($nentrada,$codigo);

	$textaco_cliente = '
	<div class="span10 content" id="pag-final" style="width: 583px; font-family: sans-serif">
	<h1 class="" style="margin: 0;font-family: inherit;font-weight: bold;color: inherit;text-rendering: optimizelegibility;font-size: 30px;line-height: 32px;">
	<a href="http://mores.es" style="color: #0088cc;text-decoration: none;outline: none;">
	<img alt="Morés" src="http://mores.es/img/mores.png" class="" style="max-width: 100%;vertical-align: middle;border: 0;-ms-interpolation-mode: bicubic;">
	</a>
	</h1>
	<h2 style="margin: 0;font-family: inherit;font-weight: bold;color: #bc1922;text-rendering: optimizelegibility;font-size: 24px;line-height: 32px;border-bottom: 1px #bc1922 solid;margin-bottom: 25px;">Compra realizada</h2>

	<p> Ya tenemos tu código de seguimiento para tu pedido: '.$nentrada.'</p> 
	<p> <strong>'.$codigo.'</strong></p>
	<p>
	<a href="http://www.nacex.es/seguimientoFormularioExterno.do?intcli='.$codigo.'">Pulse aquí para consultarlo directamente</a>
	</p>
	<p>La empresa encargada del envío es NACEX</p>
	</br>
	<p>Un saludo y disfruta de tu pedido!</p>
	</div>';

	$email = getEmailFrompedido($nentrada);

	$mail_asunto = "Código de seguimiento pedido ". $nentrada;
	echo $textaco_cliente;
	enviarMail($email,$mail_asunto,$textaco_cliente);
}
//header("location: http://10.1.8.12/gestionTrabajos/");
?>