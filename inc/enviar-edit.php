<?php


//copia cliente
// Varios destinatarios
$para  = $_SESSION["usr_email"];

// subject
$titulo = 'Mores - usuario modificado';
include "inc/plantilla-edit-user.php";

// Mail it
enviarMail($para, $titulo, $mensaje);




//copia mores
// Varios destinatarios
$para  = $emails_nuevo_usuario;
// subject
$titulo = 'Mores - usuario modificado: '. $_SESSION["usr_email"];
include "inc/plantilla-edit-webmaster.php";
// Mail it
enviarMail($para, $titulo, $mensaje);
?>