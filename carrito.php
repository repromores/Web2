<?php
require_once "inc/config.php";

$_SESSION["Payment_Amount"] = 35;
?>
<form action='paypal/expresscheckout.php' METHOD='POST'>
<input type='image' name='submit' src='https://www.paypal.com/en_US/i/btn/btn_xpressCheckout.gif' border='0' align='top' alt='Check out with PayPal'/>
</form>