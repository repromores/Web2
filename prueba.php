<?php include "inc/config.php"; ?>
<?php 

$paco1 = creaProducto(123,"Vinilo decorativo",array(110,220),"","vinilo",34.90,"Monocromo","mate");
$paco2 = creaProducto(128,"Vinilo de fiesta",array(115,215),"","vinilo",35.90,"color","brillo");
$paco3 = creaProducto(328,"tarjeta de visita",array(5,10),"","180gr",8.40,"color","mate");

agregaProducto($paco1);
agregaProducto($paco2);
agregaProducto($paco3);
$_SESSION["pedido"]["data"]["iva"]=21;
setEnvio("envi",11.50);
?>