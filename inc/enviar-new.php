<?php


//copia cliente
// Varios destinatarios
$para  = $email;
// subject
$titulo = 'Mores - Nuevo usuario';
$newstext = $news? "" : " no ";
include "inc/plantilla-new-user.php";
// Mail it
enviarMail($para, $titulo, $mensaje);




//copia mores
// Varios destinatarios
$para  = $emails_nuevo_usuario;
// subject
$titulo = 'Mores - Nuevo usuario';
$newstext = $news? "" : " no ";
 include "inc/plantilla-new-webmaster.php";
// Mail it
enviarMail($para, $titulo, $mensaje);
?>