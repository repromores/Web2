<?php include "inc/config.php"; ?>
<?php include "inc/head.php"; ?>
<title>morés - Último paso</title>
<?php
  // $h1text : variable para fijar el H1 en cada pagina para hacerlo único y aprovechar mejor el SEO
  $h1text = "Último paso - morés";

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

  <div class="span10">
  	<div class="content resumen">

<h2>Resumen</h2>


  <table class="table table-striped">
      <input type="hidden" class="iva" value="21">

        <thead>
          <tr>
            <th>Producto</th>
            <th>Información</th>
            <th>Precio</th>
          </tr>
        </thead>
        <tbody>
         <?php echo muestraPedidoCarrito(false); ?>
        </tbody>
      </table>
  <div class="span4 pull-right clearfix">
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


    <div class="well navegacion" style="margin-top:210px;">
      <a class="btn" href="compras_pedido.php">Paso atrás</a>
      <a class="btn btn-primary pull-right" href="inc/compras_procesa_final.php">Realizar pago</a>
    </div>

  	</div>
  </div>


  <div class="span3">
    
<?php include "inc/banner-envios.php"; ?>

  </div>
</div>
<?php include "inc/footer.php"; ?>