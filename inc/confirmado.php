<?php
	/*==================================================================
	 PayPal Express Checkout Call
	 ===================================================================
	*/
require_once ("../paypal/paypalfunctions.php");

$_SESSION["payer_id"] 			= $_GET["PayerID"];
$_SESSION['TOKEN']				= $_GET["token"];
$_SESSION['PaymentType']		= "Sale";
$_SESSION['currencyCodeType']	= "EUR";

$PaymentOption = "PayPal";

if ( $PaymentOption == "PayPal" )
{
	/*
	'------------------------------------
	' The paymentAmount is the total value of 
	' the shopping cart, that was set 
	' earlier in a session variable 
	' by the shopping cart page
	'------------------------------------
	*/
	
	$finalPaymentAmount =  $_SESSION["Payment_Amount"];
		
	/*
	'------------------------------------
	' Calls the DoExpressCheckoutPayment API call
	'
	' The ConfirmPayment function is defined in the file PayPalFunctions.jsp,
	' that is included at the top of this file.
	'-------------------------------------------------
	*/

	$resArray = ConfirmPayment ( $finalPaymentAmount );
	$ack = strtoupper($resArray["ACK"]);
		
	echo insertPedidoPaypal($resArray);

	if( $ack == "SUCCESS" || $ack == "SUCCESSWITHWARNING" ){
		$a = $ack;
	} else  {
		$a = $ack;
	}
}		
		
?>

