<?php

//copia cliente
// Varios destinatarios
$para  = $email;

// subject
$titulo = 'Mores - Recuperacion de password: '.$para;
include "plantilla-reset-user.php";
enviarMail($para, $titulo, $mensaje);



//copia mores
// Varios destinatarios
$para  = $emails_reset_pass;
// subject
$titulo = 'Mores - Recuperacion de password: '.$para;
include "plantilla-reset-webmaster.php";
// Mail it
enviarMail($para, $titulo, $mensaje);?>