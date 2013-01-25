<?php include "inc/config.php"; ?>
<?php include "inc/head.php"; ?>
<title>morés - Último paso</title>
<?php
  // $h1text : variable para fijar el H1 en cada pagina para hacerlo único y aprovechar mejor el SEO
  $h1text = "Último paso - morés";

$dir1   = empty($_SESSION["pedido"]["data"]["dir1"])  ? $_SESSION["usr_dir"]    : getEnvio("dir1");
$dir2   = empty($_SESSION["pedido"]["data"]["dir2"])  ? $_SESSION["usr_dir2"]   : getEnvio("dir2");
$nombre = empty($_SESSION["pedido"]["data"]["nombre"])  ? $_SESSION["usr_nombre"] .' '.$_SESSION["usr_apellidos"]     : getEnvio("nombre");
$ape    = $_SESSION["usr_apellidos"];
$tele   = empty($_SESSION["pedido"]["data"]["tele"])  ? $_SESSION["usr_telefono"] : getEnvio("tele");
$pobl   = empty($_SESSION["pedido"]["data"]["pobl"])  ? $_SESSION["usr_pob"]    : getEnvio("pobl");
$prov   = empty($_SESSION["pedido"]["data"]["prov"])  ? $_SESSION["usr_prov"]   : getEnvio("prov");
$cp     = empty($_SESSION["pedido"]["data"]["cp"])    ? $_SESSION["usr_cp"]     : getEnvio("cp");

    if($_SESSION["pedido"]["metodo"]== "mensajero"){
        $total_AMT = calculaTotal(getIVA(),getEnvio("envi"));
    }else{
        $total_AMT = calculaTotal(getIVA(),0);
    }


  $metodo = getMetodoEnvio();
  if($metodo == "mensajero"){
    $str_metodo = "Envío";
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
    $str_metodo = "Recogida";
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

 ?>
<?php include "inc/menu.php"; ?>

  <div class="span10" id="pag-final">
  	<div class="content resumen">
      <div class="numberCircleContainer">
      <div class="numberCircle success">1</div>
      <div class="numberCircle success">2</div>
      <div class="numberCircle warning">3</div>
      <div class="numberCircle">4</div>


    </div>
    <div class="progress">
        <div class="bar bar-success" style="width: 25%;"></div>
        <div class="bar bar-success" style="width: 25%;"></div>
      <div class="bar bar-warning" style="width: 25%;"></div>
      </div>
<h2>Resumen</h2>


  <table class="table table-striped">
      <input type="hidden" class="iva" value="21">

        <thead>
        <tr>
          <th>Producto</th>
          <th>Unidades</th>
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
            <td class="sumPrecios" style="text-align: right; padding-right: 20px;"></td>
          </tr>
          <tr>
            <th>IVA</th>
            <td class="sumPreciosIva" style="text-align: right; padding-right: 20px;"></td>
          </tr>
          <tr>
            <th><?php echo  $str_metodo;?></th>
            <td class="sumPrecioEnvio" style="text-align: right; padding-right: 20px;" data-pasta="<?php echo $envio; ?>"></td>
          </tr>
          <tr>
            <th>TOTAL</th>
            <td class="sumPrecioTotal" style="text-align: right; padding-right: 20px;"></td>
          </tr>
        </tbody>
      </table>
      
  </div>

  <div class="well span5 dir-envio">
    <h3><?php echo  $str_metodo;?></h3>
    <?php echo $campoEnvio; ?>
  </div>

<div class="">
  <h2>Método de Pago</h2>
<form class="form-horizontal" id="form-final" action="inc/compras_procesa_final.php" method="post">
  <fieldset>
              <input type="hidden" name="metodopago" id="metodo-p">

  <div class="control-group">
    <div class="btn-group" data-toggle="buttons-radio">
      <button type="button " class="btn metodo b-paypal" data-metodo="paypal"><img src="img/paypal-mini.png" alt="Paypal"></button>
      <button type="button" class="btn metodo b-tarjeta" data-metodo="tarjeta">Tarjeta de crédito <img src="img/tarjetas-mini.png" alt="Tarjetas"></button>
    </div>
  </div>

  <div class="paypal">
    <p>Se le redirigirá a Paypal al pulsar siguiente para realizar el pago.</p>
  </div>
  <div class="tarjeta">
    <p>Se le redirigirá a la pasarela de pago al pulsar siguiente para realizar el pago.</p> 
      <input type="hidden" name="Ds_Merchant_Amount" value="<?php echo ((float)$total_AMT)*100; ?>">
      <input type="hidden" name="Ds_Merchant_Currency" value="<?php echo $caixa_API_Currency; ?>">
      <input type="hidden" name="Ds_Merchant_Order"  value="<?php echo $caixa_API_Order; ?>">
      <input type="hidden" name="Ds_Merchant_MerchantCode" value="<?php echo $caixa_API_MerchantCode; ?>">
      <input type="hidden" name="Ds_Merchant_Terminal" value="<?php echo $caixa_API_Terminal; ?>">
      <input type="hidden" name="Ds_Merchant_TransactionType" value="0">
      <input type="hidden" name="Ds_Merchant_MerchantURL" value="<?php echo $caixa_API_MerchantURL; ?>">
      <input type="hidden" name="Ds_Merchant_MerchantSignature" value="<?php echo get_caixa_API_Key(((float)$total_AMT)*100); ?>">
      <input type="hidden" name="Ds_Merchant_ProductDescription" value="Pedido web en mores.es">
      <input type="hidden" name="Ds_Merchant_Titular" value="Mores.es">
      <input type="hidden" name="Ds_Merchant_UrlOK" value="<?php echo $caixa_API_confirmado; ?>">
      <input type="hidden" name="Ds_Merchant_UrlKO" value="<?php echo $caixa_API_cancelado; ?>">
      <input type="hidden" name="Ds_Merchant_Titular" value="Mores.es">
      <input type="hidden" name="Ds_Merchant_MerchantData" value="<?php echo reservaIdPedido(); ?>">
  </div>     

  <div class="">
      </br>
      <input type="checkbox" class="condiciones"><strong>Acepto las <a target="_blank" href="condiciones-uso.php">condiciones de uso</a></strong>.


  </div>

    <div class="well navegacion">
      <a class="btn" href="compras_pedido.php">Paso atrás</a>
      <button class="btn btn-primary btnsubmit pull-right comprasfinal tr_pedidoweb" disabled="disabled" type="submit">Realizar pago</button>
    </div>

  </fieldset>
</form>
  </div>

  	</div>
  </div>


  <div class="span3">
    
<?php include "inc/banner-envios.php"; ?>

  </div>
</div>
<?php include "inc/footer.php";?>