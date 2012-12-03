<?php include "inc/config.php"; ?>
<?php
  if(!isLogged()){  header('Location: login2.php?goto=tarjetasvisita.php');};
  $masdatos = empty($_SESSION["usr_apellidos"])? true : false;
?>
<?php include "inc/head.php"; ?>
<title>morés - Tarjetas de visita</title>
<?php
  $s_producto = "tarjetasvisita";
  $s_nombre   = "tarjetas de visita";
  $s_w        = "8.5";
  $s_h        = "5.4";
  $s_material = "papel 150g";
  // $h1text : variable para fijar el H1 en cada pagina para hacerlo único y aprovechar mejor el SEO
  $h1text = "Tarjetas de visita - morés";
  
  $q = mysql_query("SELECT * FROM t_producto_idigital WHERE producto='".$s_producto."'");
  $fila = mysql_fetch_assoc($q);  

  $precios = array();
  $i = 0;

  foreach ($fila as $nombre => $valor) {
    if($nombre[0] == "m"){
      if($valor !== null){
        $unidades = substr( $nombre, 1);
        $precios[$i]["unidades"]= $unidades;
        $precios[$i]["precio"]= $valor;

        $i++;
      }
    }
  }
  $tablaprecios = "";

  foreach ($precios as $precio) {
    $precio["unidades"];
    $precio["precio"];

    $tablaprecios .= '<tr data-precio="'.$precio["precio"].'" data-unidades="m'.$precio["unidades"].'"><td>'.$precio["unidades"].' uds.</td><td>'.$precio["precio"].' €</td></tr>';
  }

 ?>
<?php include "inc/menu.php"; ?>

  <div class="span10">
    <div class="content uploadertienda idigital">

      <h2>Tarjetas de visita</h2>

     <form class="form-horizontal" method="POST" enctype="multipart/form-data">
      
      <input type="hidden" name="acabado" id="acabado" value="brillo">
      <input type="hidden" name="tableValue" id="tableValue" value="">
      <input type="hidden" name="archivo1" id="archivo1" value="">
      <input type="hidden" name="w" id="w" value="<?php echo $s_w ?>">
      <input type="hidden" name="h" id="h" value="<?php echo $s_h ?>">
      <input type="hidden" name="unidades" id="unidades" value="">
      <input type="hidden" name="tipo" id="tipo" value="<?php echo $s_producto ?>">
      <input type="hidden" name="nombre" id="nombre" value="<?php echo $s_nombre ?>">
      <input type="hidden" name="material" id="material" value="<?php echo $s_material ?>">
      

      <div class="control-group">
        <label class="control-label" for="archivos">Archivos:</label>
        <div class="controls">
          <div id="bootstrapped-fine-uploader"></div>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Unidades:</label>
        <div class="controls">
          <table class="table table-bordered table-condensed table-striped tabla-precios" id="tablaPickr">
            <thead>
              <tr>
                <th>Unidades</th>
                <th>Precio*</th>
              </tr>
            </thead>
            <tbody>
              <?php echo $tablaprecios; ?>
            </tbody>
            <tfoot>
              <tr><td colspan="2"><small>Precio sin IVA ni portes</small></td></tr>
            </tfoot>
          </table>

        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="acabado">Acabado:</label>
        <div class="controls">
              <div class="btn-group" data-toggle="buttons-radio">
                <button type="button" class="btn btnacabado active" data-acabado="brillo">Brillo</button>
                <button type="button" class="btn btnacabado" data-acabado="mate">Mate</button>
              </div>
        </div>
      </div>

      <div class="control-group">
      <label class="control-label" for="inputEmail"><strong>Total</strong></label>
      <div class="controls">
      <div class="outputtotal"></div>
      </div>
      </div>
      <div class="form-actions">
        <button class="btn btn-primary incluyepedido"><i class="icon-shopping-cart icon-white"></i> Añadir al carrito</button>
        <div class="mensaje-error">Corrige los campos en rojo</div>
        <div class="mensaje-exito"></div>
      </div>     
    </form>

    </div>
  </div>

  <div class="span3">
    
<?php include "inc/banner-envios.php"; ?>

  </div>
</div>
<?php include "inc/footer.php"; ?>
