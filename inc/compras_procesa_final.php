<?php
require_once ("config.php");
require_once ("../paypal/paypalfunctions.php");



$PaymentOption = ($_POST["metodopago"] == "paypal")? "PayPal" : $_POST["tipotarjeta"];


    if($_SESSION["pedido"]["metodo"]== "mensajero"){
        $total_AMT = calculaTotal(getIVA(),getEnvio("envi"));
    }else{
        $total_AMT = calculaTotal(getIVA(),0);
    }


if ( $PaymentOption == "PayPal")
{
        // ==================================
        // PayPal Express Checkout Module
        // ==================================

        //'------------------------------------
        //' The paymentAmount is the total value of 
        //' the shopping cart, that was set 
        //' earlier in a session variable 
        //' by the shopping cart page
        //'------------------------------------
        $paymentAmount = $total_AMT;

        //'------------------------------------
        //' When you integrate this code 
        //' set the variables below with 
        //' shipping address details 
        //' entered by the user on the 
        //' Shipping page.
        //'------------------------------------

    if($_SESSION["pedido"]["metodo"] == "mensajero" ){
        $shipToName         = getEnvio("nombre");
        $shipToStreet       = getEnvio("dir1");
        $shipToStreet2      = getEnvio("dir2"); //Leave it blank if there is no value
        $shipToCity         = getEnvio("pobl");
        $shipToState        = getEnvio("prov");
        $shipToCountryCode  = "ES"; // Please refer to the PayPal country codes in the API documentation
        $shipToZip          = getEnvio("cp");
        $phoneNum           = getEnvio("tele");
    }

        //'------------------------------------
        //' The currencyCodeType and paymentType 
        //' are set to the selections made on the Integration Assistant 
        //'------------------------------------
        $currencyCodeType = "EUR";
        $paymentType = "Sale";

        //'------------------------------------
        //' The returnURL is the location where buyers return to when a
        //' payment has been succesfully authorized.
        //'
        //' This is set to the value entered on the Integration Assistant 
        //'------------------------------------
        $returnURL = $paypal_URL_confirmado;

        //'------------------------------------
        //' The cancelURL is the location buyers are sent to when they hit the
        //' cancel button during authorization of payment during the PayPal flow
        //'
        //' This is set to the value entered on the Integration Assistant 
        //'------------------------------------
        $cancelURL = $paypal_URL_cancelado;

        //'------------------------------------
        //' Calls the SetExpressCheckout API call
        //'
        //' The CallMarkExpressCheckout function is defined in the file PayPalFunctions.php,
        //' it is included at the top of this file.
        //'-------------------------------------------------
        $resArray = CallMarkExpressCheckout ($paymentAmount, $currencyCodeType, $paymentType, $returnURL,
                                                                                  $cancelURL, $shipToName, $shipToStreet, $shipToCity, $shipToState,
                                                                                  $shipToCountryCode, $shipToZip, $shipToStreet2, $phoneNum
        );

        $ack = strtoupper($resArray["ACK"]);
        if($ack=="SUCCESS" || $ack=="SUCCESSWITHWARNING")
        {
                $token = urldecode($resArray["TOKEN"]);
                $_SESSION['reshash']=$token;
                RedirectToPayPal ( $token );
        } 
        else  
        {
                //Display a user friendly Error on the page using any of the following error information returned by PayPal
                $ErrorCode = urldecode($resArray["L_ERRORCODE0"]);
                $ErrorShortMsg = urldecode($resArray["L_SHORTMESSAGE0"]);
                $ErrorLongMsg = urldecode($resArray["L_LONGMESSAGE0"]);
                $ErrorSeverityCode = urldecode($resArray["L_SEVERITYCODE0"]);
                
                echo "SetExpressCheckout API call failed. ";
                echo "Detailed Error Message: " . $ErrorLongMsg;
                echo "Short Error Message: " . $ErrorShortMsg;
                echo "Error Code: " . $ErrorCode;
                echo "Error Severity Code: " . $ErrorSeverityCode;
        }
}
else
{
//pago con tarjeta de credito
}

?>
