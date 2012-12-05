<?php
require_once "inc/config.php";
/**************************
Inicio html
**************************/				
include "inc/head.php"; ?>
<title>morés - <?php echo $titulo ?></title>
<?php
  // $h1text : variable para fijar el H1 en cada pagina para hacerlo único y aprovechar mejor el SEO
  $h1text = $titulo." - morés";

$dir1   = empty($_SESSION["pedido"]["data"]["dir1"])  ? $_SESSION["usr_dir"]    : getEnvio("dir1");
$dir2   = empty($_SESSION["pedido"]["data"]["dir2"])  ? $_SESSION["usr_dir2"]   : getEnvio("dir2");
$nombre = empty($_SESSION["pedido"]["data"]["nombre"])  ? $_SESSION["usr_nombre"] .' '.$_SESSION["usr_apellidos"]     : getEnvio("nombre");
$ape    = $_SESSION["usr_apellidos"];
$tele   = empty($_SESSION["pedido"]["data"]["tele"])  ? $_SESSION["usr_telefono"] : getEnvio("tele");
$pobl   = empty($_SESSION["pedido"]["data"]["pobl"])  ? $_SESSION["usr_pob"]    : getEnvio("pobl");
$prov   = empty($_SESSION["pedido"]["data"]["prov"])  ? $_SESSION["usr_prov"]   : getEnvio("prov");
$cp     = empty($_SESSION["pedido"]["data"]["cp"])    ? $_SESSION["usr_cp"]     : getEnvio("cp");

$facturacion = infoFacturacion();


  $metodo = getMetodoEnvio();
  if($metodo == "mensajero"){
    $envio = getEnvio("envi");
    $campoEnvio = '
    <p>'.getEnvio("nombre").'</br>
       '.getEnvio("dir1").'</br>
       '.getEnvio("dir2").'</br>
       '.getEnvio("cp").' - '.getEnvio("pobl").', '.getEnvio("prov").'</br>
    </p>
    <p>'.getEnvio("tele").'</p>
    ';
  } else {
    $envio = "en tienda";
    switch(getEnvio("ciudad")) {
        case "oviedo": 
            $text = 'Viaducto Ingeniero Marquina, 7 <a  href="https://maps.google.com/maps/ms?msa=0&amp;msid=201196282089870687635.0004b75b2be933103a9c6&amp;ie=UTF8&amp;t=m&amp;ll=43.36557,-5.854683&amp;spn=0.003744,0.006866&amp;z=17&amp;output=embed" class="mapa fancybox.iframe"><img alt="mapa" src="img/mini-map.png"></a>';
            break;
        case "gijon":
            $text = 'Marqués de San Esteban, 4 <a  href="https://maps.google.com/maps/ms?msa=0&amp;msid=201196282089870687635.0004b757bcf20a3142950&amp;ie=UTF8&amp;t=m&amp;ll=43.543369,-5.665458&amp;spn=0.001866,0.003433&amp;z=18&amp;output=embed" class="mapa fancybox.iframe"><img alt="mapa" src="img/mini-map.png"></a>';
            break;
        case "llanera":
            $text = 'Parque Tecnológico de Asturias, Parcela 2  <a  href="https://maps.google.com/maps/ms?msa=0&amp;msid=201196282089870687635.0004b75b98445621f8827&amp;ie=UTF8&amp;t=m&amp;ll=43.425567,-5.823414&amp;spn=0.00187,0.003433&amp;z=18&amp;output=embed" class="mapa fancybox.iframe"><img alt="mapa" src="img/mini-map.png"></a>';
            break;
    }


    $campoEnvio = '
    <p>'.getEnvio("nombre").'</p>
    <p>A recoger en:</br>
    '. $text.'
    </p>
    ';
  }
  if(!isLogged()){  header('Location: login2.php');};

 ?>
<?php include "inc/menu.php"; ?>

  <div class="span10" id="pag-final">
  	<div class="content resumen">
      <div class="numberCircleContainer">
      <div class="numberCircle success">1</div>
      <div class="numberCircle success">2</div>
      <div class="numberCircle success">3</div>
      <div class="numberCircle success">4</div>


    </div>
    <div class="progress">
        <div class="bar bar-success" style="width: 25%;"></div>
        <div class="bar bar-success" style="width: 25%;"></div>
        <div class="bar bar-success" style="width: 25%;"></div>
        <div class="bar bar-success" style="width: 25%;"></div>
      </div>
<h2>Compra realizada</h2>

<p>Recibirá un email de confirmación con los datos del pedido, que también se detallan a continuación</p>
<p><strong>Plazo de entrega estimado: 3-4 días hábiles</strong></p>
  <table class="table table-striped">
      <input type="hidden" class="iva" value="21">

        <thead>
        <tr>
          <th>Producto</th>
          <th>Material</th>
          <th>Tamaño</th>
          <th>Precio</th>
        </tr>
        </thead>
        <tbody>
         <?php echo muestraPedidoCarrito(false); ?>
        </tbody>
      </table>
  <div class="span4 pull-right clearfix" style="margin-bottom:20px">
    <table class="table table-striped">

        <tbody>
          <tr>
            <th>Subtotal</th>
            <td class="sumPrecios"></td>
          </tr>
          <tr>
            <th>IVA</th>
            <td class="sumPreciosIva"></td>
          </tr>
          <tr>
            <th>Recogida</th>
            <td class="sumPrecioEnvio" data-pasta="<?php echo $envio; ?>"></td>
          </tr>
          <tr>
            <th>TOTAL</th>
            <td class="sumPrecioTotal"></td>
          </tr>
        </tbody>
      </table>
      
  </div>

  <div class="well span5 dir-envio">
    <h3>Envio</h3>
    <?php echo $campoEnvio; ?>
  </div>


  	</div>
  </div>


  <div class="span3">
    
<?php include "inc/banner-envios.php"; ?>

  </div>
</div>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', '<?php echo $analytics_code; ?>']);
  _gaq.push(['_trackPageview']);
  _gaq.push(['_addTrans',
    '<?php echo getEnvio("idpedido"); ?>',           // order ID - required
    'Mores',  // affiliation or store name
    '<?php echo getEnvio("idpedido"); ?>',          // total - required
    '',           // tax
    '<?php echo getMetodoEnvio() == "tienda"? 0 : getEnvio("envi"); ?>',              // shipping
    '<?php echo getEnvio("ciudad") ?>',       // city
    '',     // state or province
    'SPAIN'             // country
  ]);

   // add item might be called for every item in the shopping cart
   // where your ecommerce engine loops through each item in the cart and
   // prints out _addItem for each
   <? foreach ($_SESSION["pedido"]["productos"] as $key) { ?>

  _gaq.push(['_addItem',
    '<?php echo getEnvio("idpedido"); ?>',           // order ID - required
    '<?php echo $key["producto"]; ?>',   // SKU/code - required
    '<?php echo $key["producto"]; ?>',   // product name
    '<?php echo $key["categoria"]; ?>',   // category or variation
    '<?php echo $key["precio"]; ?>',   // unit price - required
    '1'               // quantity - required
  ]);

   <? } ?>

  _gaq.push(['_trackTrans']); //submits transaction to the Analytics servers

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>



<?php

$iva_calculado = calculaTotal(getEnvio("iva"),0) - calculaTotal(0,0);
$idpedido = getLastPedidoOfUser($_SESSION["usr_email"]);


$textaco_cliente = '
<div class="span10 content" id="pag-final" style="width: 583px; font-family: sans-serif">
<h1 class="" style="margin: 0;font-family: inherit;font-weight: bold;color: inherit;text-rendering: optimizelegibility;font-size: 30px;line-height: 32px;">
<a href="http://mores.es" style="color: #0088cc;text-decoration: none;outline: none;">
<img alt="Morés" src="http://mores.es/img/mores.png" class="" style="max-width: 100%;vertical-align: middle;border: 0;-ms-interpolation-mode: bicubic;">
</a>
</h1>
<h2 style="margin: 0;font-family: inherit;font-weight: bold;color: #bc1922;text-rendering: optimizelegibility;font-size: 24px;line-height: 32px;border-bottom: 1px #bc1922 solid;margin-bottom: 25px;">Compra realizada</h2>

<p style="margin: 0 0 8px;text-indent: 10px;font-size: 0.9em;"><strong style="font-weight: bold;">Plazo de entrega estimado: 3-4 días hábiles</strong></p>
<p>Id de pedido: '.$idpedido.'</p>
<table class="table table-striped" style="max-width: 100%;background-color: transparent;border-collapse: collapse;border-spacing: 0;width: 100%;margin-bottom: 16px;">
<input type="hidden" class="iva" value="21" style="margin: 0;font-size: 13px;vertical-align: middle;*overflow: visible;line-height: 16px;font-weight: normal;font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;width: 210px;margin-left: 0;">
<thead>
<tr>
<th style="padding: 8px;line-height: 16px;text-align: left;vertical-align: bottom;border-top: 1px solid #dddddd;font-weight: bold;">Producto</th>
<th style="padding: 8px;line-height: 16px;text-align: left;vertical-align: bottom;border-top: 1px solid #dddddd;font-weight: bold;">Material</th>
<th style="padding: 8px;line-height: 16px;text-align: left;vertical-align: bottom;border-top: 1px solid #dddddd;font-weight: bold;">Tamaño</th>
<th style="padding: 8px;line-height: 16px;text-align: left;vertical-align: bottom;border-top: 1px solid #dddddd;font-weight: bold;">Precio</th>
</tr>
</thead>
<tbody>'. muestraPedidoCarrito(false) .'
</tbody>
</table>
<div class="span4 pull-right clearfix" style="margin-bottom: 20px;*zoom: 1;width: 227.2px;float: right;">
<table class="table table-striped" style="max-width: 100%;background-color: transparent;border-collapse: collapse;border-spacing: 0;width: 100%;margin-bottom: 16px;">
<tbody>
<tr>
<th style="padding: 8px;line-height: 16px;text-align: left;vertical-align: top;border-top: 1px solid #dddddd;font-weight: bold;">Subtotal</th>
<td class="sumPrecios" style="padding: 8px;line-height: 16px;text-align: left;vertical-align: top;border-top: 1px solid #dddddd;">'.calculaTotal(0,0) .' €</td>
</tr>
<tr>
<th style="padding: 8px;line-height: 16px;text-align: left;vertical-align: top;border-top: 1px solid #dddddd;font-weight: bold;">IVA</th>
<td class="sumPreciosIva" style="padding: 8px;line-height: 16px;text-align: left;vertical-align: top;border-top: 1px solid #dddddd;">'. $iva_calculado .' €</td>
</tr>
<tr>
<th style="padding: 8px;line-height: 16px;text-align: left;vertical-align: top;border-top: 1px solid #dddddd;font-weight: bold;">Recogida</th>
<td class="sumPrecioEnvio" style="padding: 8px;line-height: 16px;text-align: left;vertical-align: top;border-top: 1px solid #dddddd;">'.$envio.' €</td>
</tr>
<tr>
<th style="padding: 8px;line-height: 16px;text-align: left;vertical-align: top;border-top: 1px solid #dddddd;font-weight: bold;">TOTAL</th>
<td class="sumPrecioTotal" style="padding: 8px;line-height: 16px;text-align: left;vertical-align: top;border-top: 1px solid #dddddd;">'.calculaTotal(getEnvio("iva"),$envio) .' €</td>
</tr>
</tbody>
</table>
</div>
<div class="well span5 dir-envio" style="width: 286.5px;min-height: 20px;padding: 19px;margin-bottom: 20px;background-color: #f5f5f5;border: 1px solid rgba(0, 0, 0, 0.05);-webkit-border-radius: 4px;-moz-border-radius: 4px;border-radius: 4px;-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);-moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);">
<h3 style="margin: 0;font-family: inherit;font-weight: bold;color: #444;text-rendering: optimizelegibility;font-size: 18px;line-height: 24px;margin-top: 30px;margin-bottom: 5px;">Envio</h3>
<p style="margin: 0 0 8px;text-indent: 10px;font-size: 0.9em;">
'.$campoEnvio.'
</p>
</div>
<div class="well span10 dir-envio" style="width: 573px;min-height: 20px;padding: 19px;margin-bottom: 20px;background-color: #f5f5f5;border: 1px solid rgba(0, 0, 0, 0.05);-webkit-border-radius: 4px;-moz-border-radius: 4px;border-radius: 4px;-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);-moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);">
<h3 style="margin: 0;font-family: inherit;font-weight: bold;color: #444;text-rendering: optimizelegibility;font-size: 18px;line-height: 24px;margin-top: 30px;margin-bottom: 5px;">Facturación</h3>
<p style="margin: 0 0 8px;text-indent: 10px;font-size: 0.9em;">
'.$facturacion["nombre"].' '.$facturacion["apellidos"].'</br>
'.$facturacion["cif"].'</br>
'.$facturacion["direccion"].'</br>
'.$facturacion["direccion2"].'</br>
'.$facturacion["poblacion"].'</br>
'.$facturacion["cp"].'</br>
</p>
</div>
</div>
';
$textaco_mores = '
<div class="span10 content" id="pag-final" style="width: 583px; font-family: sans-serif">
<h1 class="" style="margin: 0;font-family: inherit;font-weight: bold;color: inherit;text-rendering: optimizelegibility;font-size: 30px;line-height: 32px;">
<a href="http://mores.es" style="color: #0088cc;text-decoration: none;outline: none;">
<img alt="Morés" src="http://mores.es/img/mores.png" class="" style="max-width: 100%;vertical-align: middle;border: 0;-ms-interpolation-mode: bicubic;">
</a>
</h1>
<h2 style="margin: 0;font-family: inherit;font-weight: bold;color: #bc1922;text-rendering: optimizelegibility;font-size: 24px;line-height: 32px;border-bottom: 1px #bc1922 solid;margin-bottom: 25px;">Compra realizada</h2>
<p style="margin: 0 0 8px;text-indent: 10px;font-size: 0.9em;">El usuario <strong>'.$_SESSION["usr_email"].'</strong> ha realizado el siguiente pedido en la tienda web</p>
<p style="margin: 0 0 8px;text-indent: 10px;font-size: 0.9em;"><strong style="font-weight: bold;">Plazo de entrega estimado: 3-4 días hábiles</strong></p>
<p>Id de pedido: '.$idpedido.'</p>
<table class="table table-striped" style="max-width: 100%;background-color: transparent;border-collapse: collapse;border-spacing: 0;width: 100%;margin-bottom: 16px;">
<input type="hidden" class="iva" value="21" style="margin: 0;font-size: 13px;vertical-align: middle;*overflow: visible;line-height: 16px;font-weight: normal;font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;width: 210px;margin-left: 0;">
<thead>
<tr>
<th style="padding: 8px;line-height: 16px;text-align: left;vertical-align: bottom;border-top: 1px solid #dddddd;font-weight: bold;">Producto</th>
<th style="padding: 8px;line-height: 16px;text-align: left;vertical-align: bottom;border-top: 1px solid #dddddd;font-weight: bold;">Material</th>
<th style="padding: 8px;line-height: 16px;text-align: left;vertical-align: bottom;border-top: 1px solid #dddddd;font-weight: bold;">Tamaño</th>
<th style="padding: 8px;line-height: 16px;text-align: left;vertical-align: bottom;border-top: 1px solid #dddddd;font-weight: bold;">Precio</th>
</tr>
</thead>
<tbody>'. muestraPedidoCarrito(false) .'
</tbody>
</table>
<div class="span4 pull-right clearfix" style="margin-bottom: 20px;*zoom: 1;width: 227.2px;float: right;">
<table class="table table-striped" style="max-width: 100%;background-color: transparent;border-collapse: collapse;border-spacing: 0;width: 100%;margin-bottom: 16px;">
<tbody>
<tr>
<th style="padding: 8px;line-height: 16px;text-align: left;vertical-align: top;border-top: 1px solid #dddddd;font-weight: bold;">Subtotal</th>
<td class="sumPrecios" style="padding: 8px;line-height: 16px;text-align: left;vertical-align: top;border-top: 1px solid #dddddd;">'.calculaTotal(0,0) .' €</td>
</tr>
<tr>
<th style="padding: 8px;line-height: 16px;text-align: left;vertical-align: top;border-top: 1px solid #dddddd;font-weight: bold;">IVA</th>
<td class="sumPreciosIva" style="padding: 8px;line-height: 16px;text-align: left;vertical-align: top;border-top: 1px solid #dddddd;">'.$iva_calculado .' €</td>
</tr>
<tr>
<th style="padding: 8px;line-height: 16px;text-align: left;vertical-align: top;border-top: 1px solid #dddddd;font-weight: bold;">Recogida</th>
<td class="sumPrecioEnvio" style="padding: 8px;line-height: 16px;text-align: left;vertical-align: top;border-top: 1px solid #dddddd;">'.$envio.' €</td>
</tr>
<tr>
<th style="padding: 8px;line-height: 16px;text-align: left;vertical-align: top;border-top: 1px solid #dddddd;font-weight: bold;">TOTAL</th>
<td class="sumPrecioTotal" style="padding: 8px;line-height: 16px;text-align: left;vertical-align: top;border-top: 1px solid #dddddd;">'.calculaTotal(getEnvio("iva"),$envio) .' €</td>
</tr>
</tbody>
</table>
</div>
<div class="well span5 dir-envio" style="width: 286.5px;min-height: 20px;padding: 19px;margin-bottom: 20px;background-color: #f5f5f5;border: 1px solid rgba(0, 0, 0, 0.05);-webkit-border-radius: 4px;-moz-border-radius: 4px;border-radius: 4px;-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);-moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);">
<h3 style="margin: 0;font-family: inherit;font-weight: bold;color: #444;text-rendering: optimizelegibility;font-size: 18px;line-height: 24px;margin-top: 30px;margin-bottom: 5px;">Envio</h3>
<p style="margin: 0 0 8px;text-indent: 10px;font-size: 0.9em;">
'.$campoEnvio.'
</p>
</div>
<div class="well span10 dir-envio" style="width: 573px;min-height: 20px;padding: 19px;margin-bottom: 20px;background-color: #f5f5f5;border: 1px solid rgba(0, 0, 0, 0.05);-webkit-border-radius: 4px;-moz-border-radius: 4px;border-radius: 4px;-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);-moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);">
<h3 style="margin: 0;font-family: inherit;font-weight: bold;color: #444;text-rendering: optimizelegibility;font-size: 18px;line-height: 24px;margin-top: 30px;margin-bottom: 5px;">Facturación</h3>
<p style="margin: 0 0 8px;text-indent: 10px;font-size: 0.9em;">
'.$facturacion["nombre"].' '.$facturacion["apellidos"].'</br>
'.$facturacion["cif"].'</br>
'.$facturacion["direccion"].'</br>
'.$facturacion["direccion2"].'</br>
'.$facturacion["poblacion"].'</br>
'.$facturacion["cp"].'</br>
</p>
</div>
</div>
';
if($_SESSION["entorno"] == "produccion"){
  if(getMailConfirSent($idpedido)==0){
    setMailConfirSent($idpedido);
    enviarMail($_SESSION["usr_email"],"Morés - Pedido web",$textaco_cliente);
    enviarMail($emails_pedido_tiendaweb,"Pedido web",$textaco_mores);  
  }
}
 include "inc/footer.php";

resetCarrito();

?>