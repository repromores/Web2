<?php include "inc/config.php"; ?>
<?php
  if(!isLogged()){  header('Location: login2.php?goto=tienda_lienzobastidor.php');};
  $masdatos = empty($_SESSION["usr_apellidos"])? true : false;
?>
<?php include "inc/head.php"; ?>
<title>morés - Lienzo en bastidor</title>
<?php
  $producto = "lienzobastidor";
  // $h1text : variable para fijar el H1 en cada pagina para hacerlo único y aprovechar mejor el SEO
  $h1text = "Lienzo en bastidor - morés";
  
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

       $i++;
      }
    }
  }
  $tablaprecios = "";

  foreach ($precios as $precio) {
    $precio["medida"];
    $precio["precio"];

    $tablaprecios .= '<tr data-precio="'.$precio["precio"].'" data-medida="m'.$precio["medida"].'"><td>'.$precio["medida"].'cm</td><td>'.$precio["precio"].' €</td></tr>';
  }

 ?>
<?php include "inc/menu.php"; ?>

  <div class="span10">
    <div class="content uploadertienda">

      <h2>Lienzo en bastidor</h2>
    <ul class="breadcrumb">
      <li><a href="index.php">Inicio</a> <span class="divider">/</span></li>
      <li><a href="tienda.php">Tienda</a> <span class="divider">/</span></li>
      <li><a href="tienda_lienzobastidor_info.php">Lienzo en bastidor</a> <span class="divider">/</span></li>
      <li class="active">Pedir lienzo en bastidor</li>
    </ul>

     <form class="form-horizontal" method="POST" enctype="multipart/form-data">
      
      <input type="hidden" name="acabado" id="acabado" value="brillo">
      <input type="hidden" name="tableValue" id="tableValue" value="">
      <input type="hidden" name="archivo1" id="archivo1" value="">
      <input type="hidden" name="w" id="w" value="">
      <input type="hidden" name="h" id="h" value="">
      <input type="hidden" name="montaje" id="montaje" value="bastidor">
      <input type="hidden" name="tipo" id="tipo" value="lienzobastidor">
      <input type="hidden" name="nombre" id="nombre" value="Lienzo">
      <input type="hidden" name="material" id="material" value="lienzo">
      <input type="hidden" name="seccion" id="seccion" value="carteleria">
      
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
      <div class="well">
        <a class="btn" href="tienda.php">Volver</a>
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
