<?php
include_once "inc/config.php";
//include_once "../paypal/paypalfunctions.php";
//echo $_SESSION["pedido"]["metodo"];
echo '<pre>';

//echo $_SESSION["Payment_Amount"];
//echo getEnvio("info");
//print_r($_SESSION);

 
 foreach ($_SESSION["pedido"]["productos"] as $key) { 
 	echo $key["producto"];

 }
//print_r(GetShippingDetails("EC-6KU45483RU045090T"));
//	resetCarrito();
//	agregaProducto($producto);
//	print_r(muestraProducto(1234));
//	print_r($_POST);
//	print_r(borraProducto(1214));
// echo getIdPedido();

/*$arr = $_POST;
$fp=fopen("test.txt","w+");
foreach($arr as $key => $value){
	fwrite($fp,$key ." - ". $value."\r\n");
}
fwrite("Get:\r\n \r\n \r\n");
foreach($_GET as $key => $value){
	fwrite($fp,$key ." - ". $value."\r\n");
*/
?>
