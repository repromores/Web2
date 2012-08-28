<?php
include "config.php";


// Varios destinatarios
$para  = $emails_contacto;

// subject
$titulo = 'Ficha de Contacto del Cliente';

$ip 	    = $_POST["ip"];
$nombre		= $_POST["nombre"];
$ape      = $_POST["ape"];
$email 		= $_POST["mail"];
$dir      = $_POST["dir"];
$pobl 		= $_POST["pobl"];
$cp 	    = $_POST["cp"];
$tel      = $_POST["tel"];
$mov      = $_POST["mov"];
$fax      = $_POST["fax"];
$seccion  = $_POST["act"];
$texto 		= $_POST["text"];
$tel      = $_POST["tel"];

$fecha    = date("d-m-Y");
$hora     = date ("h:i");

include "plantilla-contacto.php";

// Mail it
enviarMail($para, $titulo, $mensaje);
  echo "Su mensaje se ha enviado correctamente!";

?>