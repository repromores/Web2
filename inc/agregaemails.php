<?php
include "config.php";

$email = !empty($_POST["email"])? $_POST["email"] : "";

if($email != ""){
	echo checkEmail($email);
}
?>