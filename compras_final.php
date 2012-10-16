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

<div class="">
  <h2>Método de Pago</h2>
<form class="form-horizontal" id="form-final" action="inc/compras_procesa_final.php" method="post" enctype="multipart/form-data">
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
          <div class="control-group">
            <label for="nombre" class="control-label">Nombre:</label>
            <div class="controls">
              <input  type="text"  name="nombre" class="nombre" value="">
            </div>
          </div>

          <div class="control-group">
            <label for="ape" class="control-label">Apellidos:</label>
            <div class="controls">
              <input  type="text"  name="ape" class="ape" value="">
            </div>
          </div>
          
          <div class="control-group">
            <label for="tipotarjeta" class="control-label">Tarjeta:</label>
            <div class="controls">
              <select name="tipotarjeta">
                <option value="Visa">Visa</option>
                <option value="MasterCard">MasterCard</option>
              </select>
            </div>
          </div>
         
          <div class="control-group">
            <label for="ntarjeta" class="control-label">Número de tarjeta:</label>
            <div class="controls">
              <input  type="text"  name="ntarjeta" class="ntarjeta" value="">
            </div>
          </div>
          
          <div class="control-group">
            <label for="mes" class="control-label">Fecha de caducidad:</label>
            <div class="controls controls-row">
              <select name="mes" class="input-mini">
                <option value="01">01</option>
                <option value="02">02</option>
                <option value="03">03</option>
                <option value="04">04</option>
                <option value="05">05</option>
                <option value="06">06</option>
                <option value="07">07</option>
                <option value="08">08</option>
                <option value="09">09</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
              </select>
              <select name="anio" class="input-mini">
                <?php 
                  $hasta = date(Y) + 12;
                  for($a = date(Y); $a <= $hasta; $a++){
                    echo('<option value="'.$a.'">'.$a.'</option>');
                  }
                ?>
              </select>
              <span style="margin:0 4px 0 9px;">CVV:</span><input type="text" name="cvv" class="span1 cvv" value="">
            </div>
          </div>
         
          <div class="control-group">
            <label for="calle" class="control-label">Calle:</label>
            <div class="controls">
              <input  type="text"  name="calle" class="calle" value="<?php echo $_SESSION["usr_dir"] ?>">
            </div>
          </div>
       
          <div class="control-group">
            <label for="ciudad" class="control-label">Ciudad:</label>
            <div class="controls">
              <input  type="text"  name="ciudad" class="ciudad" value="<?php echo $_SESSION["usr_pob"] ?>">
            </div>
          </div>
          
          <div class="control-group">
            <label for="prov" class="control-label">Provincia:</label>
            <div class="controls">
              <input  type="text"  name="prov" class="prov" value="<?php echo $_SESSION["usr_prov"] ?>">
            </div>
          </div>
          
          <div class="control-group">
            <label for="cp" class="control-label">Código postal:</label>
            <div class="controls">
              <input  type="text"  name="cp" class="cp" value="<?php echo $_SESSION["usr_cp"] ?>">
            </div>
          </div>            

    </div>     

    <div class="well navegacion">
      <a class="btn" href="compras_pedido.php">Paso atrás</a>
      <button class="btn btn-primary btnsubmit pull-right" type="submit">Realizar pago</button>
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