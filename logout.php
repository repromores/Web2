<?php 
 session_start(); 
 session_unset(); 
 if(!empty($_GET["redirect"])){
 	header('Location: '.$_GET["redirect"]);
 }
?>