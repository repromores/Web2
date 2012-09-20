<?php
include "config.php";
error_reporting(E_ALL);
ini_set("display_errors", 1);
$ciudadRecogida = ($_POST["ciudadRecogida"] != "0")? $_POST["ciudadRecogida"] ."/" : "";

$carpeta = $_POST["seccion"] . "/" . $ciudadRecogida . $_SESSION["usr_folder"];


$local =  $_FILES['file']['tmp_name'];


print_r(error_get_last());
//El tamaño por si lo necesitas
$tamano = $_FILES['file']['size'];

//nombre del archivo escogido para subir ..el cual vamos a utlizarlo para nombrar el archivo que quedará en el server FTP
$remoto = $_FILES['file']['name'];
print_r(error_get_last());

$id_ftp = ftp_connect($ftp_host,21);
ftp_login ($id_ftp, $ftp_user, $ftp_pass);
ftp_pasv ($id_ftp, false);

//carpeta donde vamos a deja el archivo
echo(file_exists ($ftp_path.$carpeta));
if(!(is_dir('ftp://'.$ftp_user.':'.$ftp_pass.'@'.$ftp_host.$ftp_path.$carpeta))){
	ftp_mkdir($id_ftp, $ftp_path.$carpeta);	
}


ftp_chdir ($id_ftp, $ftp_path.$carpeta);
if (ftp_put($id_ftp,$remoto,$local,FTP_BINARY)){
//echo($tamano . " - ". $remoto);
}else{print_r(error_get_last());}

ftp_quit($id_ftp); 

print_r($_POST);
?> 