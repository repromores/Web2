<?php
include "config.php";

$email = !empty($_POST["email"])? $_POST["email"] : "";

if($email != ""){
	checkEmail($email);
}
?>