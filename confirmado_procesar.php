<?php

ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);

require_once "inc/config.php";

	/*==================================================================
	 PayPal Express Checkout Call
	 ===================================================================
	*/
require_once ("paypal/paypalfunctions.php");


	$PaymentOption = "PayPal";


if ( $PaymentOption == "PayPal" )
{
	$_SESSION["payer_id"] 			= $_GET["PayerID"];
	$_SESSION['TOKEN']				= $_GET["token"];
	$_SESSION['PaymentType']		= "Sale";
	$_SESSION['currencyCodeType']	= "EUR";
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
		
	if( $ack == "SUCCESS" || $ack == "SUCCESSWITHWARNING" ){
		$a 		= $ack;
    setEnvio("comision",empty($resArray["PAYMENTINFO_0_FEEAMT"])? null :$resArray["PAYMENTINFO_0_FEEAMT"]); 
    setEnvio("pagado",1);

    insertPedido();

    $estado = insertPedidoPaypal($resArray);


		$titulo = "Compra realizada";
	} else  {
		$a = $ack;
	}
	header( 'Location: confirmado.php' ) ;


}	else {
  		insertPedido(1);
		header( 'Location: confirmado.php' ) ;

}
?>