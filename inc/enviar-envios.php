<?php

$ciudadRecogida = ($ciudadRecogida !="0")? '('. $ciudadRecogida.')' : "";

// subject
$titulo = 'Mores - Envio Web: '.$seccion .' '.$ciudadRecogida;

include "plantilla-envios-cliente.php";
$para   = $email_cliente;
// Mail it
enviarMail($para, $titulo, $mensaje);



include "plantilla-envios-tienda.php";
$para   = $email_tienda;
// Mail it
enviarMail($para, $titulo, $mensaje);



include "plantilla-envios-webmaster.php";
$para   = $emails_nuevo_envio;
// Mail it
enviarMail($para, $titulo, $mensaje);
?>