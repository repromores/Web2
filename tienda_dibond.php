<?php include "inc/config.php"; ?>
<?php
  if(!isLogged()){  header('Location: login2.php?goto=tienda_dibond.php');};
  $masdatos = empty($_SESSION["usr_apellidos"])? true : false;
?>
<?php include "inc/head.php"; ?>
<title>morés - Dibond</title>
<?php
  $producto = "fotodibond";
  // $h1text : variable para fijar el H1 en cada pagina para hacerlo único y aprovechar mejor el SEO
  $h1text = "Dibond - morés";
  
  $q = mysql_query("SELECT * FROM t_producto_cuadro WHERE producto='".$producto."'");
  $fila = mysql_fetch_assoc($q);  

  $precios = array();
  $i = 0;

  foreach ($fila as $nombre => $valor) {
    if($nombre[0] == "m"){
      if($valor !== null){
        $medida = substr( $nombre, 1);
        $precios[$i]["medida"]= $medida;
        $precios[$i]["precio"]= $valor;

        $q2 = mysql_query("SELECT * FROM t_producto_montaje WHERE producto='".$nombre."'");
        $fila2 = mysql_fetch_assoc($q2);  

        $precios[$i]["bastidor"] = $fila2["bastidor"];
        $precios[$i]["chupetes"] = $fila2["chupetes"];

        $i++;
      }
    }
  }
  $tablaprecios = "";

  foreach ($precios as $precio) {
    $precio["medida"];
    $precio["precio"];

    $tablaprecios .= '<tr data-precio="'.$precio["precio"].'" data-bastidor="'.$precio["bastidor"].'" data-chupetes="'.$precio["chupetes"].'" data-medida="m'.$precio["medida"].'"><td>'.$precio["medida"].'cm</td><td>'.$precio["precio"].' €</td></tr>';
  }

 ?>
<?php include "inc/menu.php"; ?>

  <div class="span10">
  	<div class="content uploadertienda">

      <h2>Dibond</h2>
    <ul class="breadcrumb">
      <li><a href="index.php">Inicio</a> <span class="divider">/</span></li>
      <li><a href="tienda.php">Tienda</a> <span class="divider">/</span></li>
      <li><a href="tienda_dibond_info.php">Foto en dibond </a> <span class="divider">/</span></li>
      <li class="active">Pedir Foto en dibond </li>
    </ul>
     <form class="form-horizontal" method="POST" enctype="multipart/form-data">
      
      <input type="hidden" name="acabado" id="acabado" value="brillo">
      <input type="hidden" name="tableValue" id="tableValue" value="">
      <input type="hidden" name="archivo1" id="archivo1" value="">
      <input type="hidden" name="w" id="w" value="">
      <input type="hidden" name="h" id="h" value="">
      <input type="hidden" name="montaje" id="montaje" value="bastidor">
      <input type="hidden" name="tipo" id="tipo" value="fotodibond">
      <input type="hidden" name="nombre" id="nombre" value="Dibond">
      <input type="hidden" name="material" id="material" value="dibond">
      <input type="hidden" name="producto" id="producto" value="dibond">
      <input type="hidden" name="categoria" id="categoria" value="carteleria">
      <input type="hidden" name="seccion" id="seccion" value="carteleria">     

      <div class="well">
        <h3>Instrucciones:</h3>
        <ol>
          <li>Sube la imagen que deseas imprimir. Asegúrate de que tiene suficiente resolución para imprimirlo en el tamaño que deseas.<a href="calculadora.php" target="_blank">calculadora de imagenes</a></li>
          <li>Elije el tamaño de la foto, comprueba que la foto sea proporcional con el tamaño que elijas.</li>
          <li>Selecciona el acabado, brillo o mate.</li>
          <li>Elije el método de montaje.</li>
        </ol>
      </div>

      <div class="control-group">
        <label class="control-label" for="archivos">Archivos:</label>
        <div class="controls">
          <div id="bootstrapped-fine-uploader"></div>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Tamaño:</label>
        <div class="controls">
          <table class="table table-bordered table-striped tabla-precios" id="tablaPickr">
            <thead>
              <tr>
                <th>Medidas</th>
                <th>Precio*</th>
              </tr>
            </thead>
            <tbody>
              <?php echo $tablaprecios; ?>
            </tbody>
            <tfoot>
              <tr><td colspan="2"><small>Precio sin IVA, soportes ni portes</small></td></tr>
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
        <label class="control-label" for="archivos">Montaje:</label>
        <div class="controls">
              <div class="btn-group pull-left" data-toggle="buttons-radio">
                <button type="button" class="btn btnmontaje active" data-montaje="bastidor">Bastidor</button>
                <button type="button" class="btn btnmontaje" data-montaje="chupetes">Chupetes</button>
              </div>
              <span class="help-inline montaje"></span>
        </div>
        <div class="controls margint20">
              <div class="montajefotos fotochupetes hide"><img src="imagenes/tienda/CHUPETE_MACHO.jpg" alt="chupete"></div>
              <div class="montajefotos fotobastidor "><img src="imagenes/tienda/bastidor.jpg" alt="bastidor"></div>
        </div>
      </div> 
      <div class="control-group">
      <label class="control-label" for="inputEmail"><strong>Total</strong></label>
      <div class="controls">
      <div class="outputtotal"></div>
      </div>
      </div>
      <div class="form-actions">
          <a href="tienda.php" class="btn">Volver</a>
        <button class="btn btn-primary incluyepedido pull-right" disabled="disabled"><i class="icon-shopping-cart icon-white"></i> Añadir al carrito</button>
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
