<?php include "inc/config.php"; ?>
<?php
  if(!isLogged()){  header('Location: login2.php?goto=tienda_fotocartonpluma.php');};
  $masdatos = empty($_SESSION["usr_apellidos"])? true : false;
?>
<?php include "inc/head.php"; ?>
<title>morés - Foto en cartón pluma</title>
<?php
  $producto = "fotocartonpluma";
  // $h1text : variable para fijar el H1 en cada pagina para hacerlo único y aprovechar mejor el SEO
  $h1text = "Foto en cartón pluma - morés";
  
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

        $precios[$i]["bastidor"] = $fila2["perfil_aluminio"];
        $precios[$i]["chupetes"] = $fila2["perfil_aluminio"];

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

      <h2>Foto en cartón pluma</h2>
    <ul class="breadcrumb">
      <li><a href="index.php">Inicio</a> <span class="divider">/</span></li>
      <li><a href="tienda.php">Tienda</a> <span class="divider">/</span></li>
      <li><a href="tienda_fotocartonpluma_info.php">Foto en cartón pluma</a> <span class="divider">/</span></li>
      <li class="active">Pedir foto en cartón pluma</li>
    </ul>   
     <form class="form-horizontal" method="POST" enctype="multipart/form-data">
      
      <input type="hidden" name="acabado" id="acabado" value="brillo">
      <input type="hidden" name="tableValue" id="tableValue" value="">
      <input type="hidden" name="archivo1" id="archivo1" value="">
      <input type="hidden" name="w" id="w" value="">
      <input type="hidden" name="h" id="h" value="">
      <input type="hidden" name="montaje" id="montaje" value="bastidor">
      <input type="hidden" name="tipo" id="tipo" value="fotocartonpluma">
      <input type="hidden" name="nombre" id="nombre" value="fotocartonpluma">
      <input type="hidden" name="material" id="material" value="cartonpluma">
      <input type="hidden" name="producto" id="producto" value="cartonpluma">
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
        <label class="control-label" for="archivos">Color de perfil:</label>
        <div class="controls">
              <select name="info" id="info" class="span2">
                <option value="Perfil Bronce">Bronce</option>
                <option value="Perfil Granate">Granate</option>
                <option value="Perfil Verde">Verde</option>
                <option value="Perfil Azul">Azul</option>
                <option value="Perfil Plata">Plata</option>
                <option value="Perfil Oro">Oro</option>
                <option value="Perfil Rojo">Rojo</option>
                <option value="Perfil Negro">Negro</option>
                <option value="Perfil Blanco">Blanco</option>
                <option value="Perfil Amarillo">Amarillo</option>
              </select>
              <span class="help-inline montaje"></span>
        </div>
      </div> 
      <div class="control-group">
      <label class="control-label"><strong>Total</strong></label>
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
