<?php
require "config.php";
ini_set('display_errors',1);
error_reporting(E_ALL);

// list of valid extensions, ex. array("jpeg", "xml", "bmp")
$allowedExtensions = array("jpg","jpeg","gif","png","tiff","tif","bmp","zip","rar","psd","ai","pdf","eps","dwg","plt","cdr","doc","docx","ppt","pptx","ctb","sitx","pub","mxd","log","fh11","fh10","fh9","fh8","mth","indd","EST","AG","psb");
// max file size in bytes
$sizeLimit = 10 * 1024 * 1024;

$seccion = !empty($_GET["seccion"]) ? "/".$_GET["seccion"]:"";

$carpeta = "/var/www/internet/envios/mores/tienda-web/".$_SESSION["usr_folder"].$seccion;

if(!is_dir ($carpeta)){
	@mkdir ($carpeta);
}

require('phpuploadclass.php');
$uploader = new qqFileUploader($allowedExtensions, $sizeLimit);

// Call handleUpload() with the name of the folder"," relative to PHP's getcwd()
$result = $uploader->handleUpload($carpeta.'/');

// to pass data through iframe you will need to encode all html tags
$result["archivo"] = $_GET["qqfile"];

echo htmlspecialchars(json_encode($result), ENT_NOQUOTES);
/*
$uploaddir = '/var/www/internet/envios/mores/tienda';
$uploaddir = '../tienda';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
  echo "File is valid, and was successfully uploaded.\n";
} else {
   echo "Upload failed";
}

print_r($_FILES);
*/
?> 
