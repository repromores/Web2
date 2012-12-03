<?php include "inc/config.php"; ?>
<?php
  if(!isLogged()){  header('Location: login2.php?goto=tienda_calendarios.php?p=cajacd');};
  $masdatos = empty($_SESSION["usr_apellidos"])? true : false;

  $producto = $_GET["p"];
  $colgar = false;
  $mesa = false;

  switch ($producto) {
    case 'cajacd':
      $articulo = "Calendario Caja de cd";

      break;
    case 'colgarmeses1a4':
      $articulo = "Calendario de colgar (1 mes/cara)";
      $colgar = true;
      $tamano = "a4";
      $meses = "1";
      $ancho = 21.0;
      $alto = 29.7;
      break;
    case 'colgarmeses2a4':
      $articulo = "Calendario de colgar (2 meses/cara)";
      $colgar = true;
      $tamano = "a4";
      $meses = "2";
      $ancho = 21.0;
      $alto = 29.7;
      break;
    case 'colgarmeses1a3':
      $articulo = "Calendario de colgar (1 mes/cara)";
      $colgar = true;
      $tamano = "a3";
      $meses = "1";
      $ancho = 29.7;
      $alto = 42;
      break;
    case 'colgarmeses2a3':
      $articulo = "Calendario de colgar (2 meses/cara)";
      $colgar = true;
      $tamano = "a3";
      $meses = "2";
      $ancho = 29.7;
      $alto = 42;
      break;
    case 'mesaa5':
      $articulo = "Calendario de mesa";
      $mesa = true;
      $tamano = "a5";
      $meses = "1";
      $ancho = 21.0;
      $alto = 14.8;
      break;
    case 'mesaa4':
      $articulo = "Calendario de mesa";
      $mesa = true;
      $tamano = "a4";
      $meses = "1";
      $ancho = 21.0;
      $alto = 29.7;
      break;

    default:
      # code...
      break;
  }
?>
<?php include "inc/head.php"; ?>
<title>morés - <?php echo $articulo; ?></title>
<?php



 // $h1text : variable para fijar el H1 en cada pagina para hacerlo único y aprovechar mejor el SEO
  $h1text = $articulo." - morés";
  
  $q = mysql_query("SELECT * FROM t_producto_calendario WHERE producto='".$producto."'");
  $fila = mysql_fetch_assoc($q);  

  $precio_25          = $fila["u25"];
  $precio_26          = $fila["u26"];
  $precio_composicion = $fila["composicion"];
  $n_fotos            = $fila["nfotos"];



 ?>
<?php include "inc/menu.php"; ?>

  <div class="span10">
  	<div class="content uploadertienda">

      <h2><?php echo $articulo; ?></h2>

    <ul class="breadcrumb">
      <li><a href="index.php">Inicio</a> <span class="divider">/</span></li>
      <li><a href="tienda.php">Tienda</a> <span class="divider">/</span></li>
      <li><a href="tienda_calendarios_info.php">Calendarios</a> <span class="divider">/</span></li>
      <li class="active"> <?php echo $articulo; ?></li>
    </ul>

     <form class="form-horizontal" method="POST" enctype="multipart/form-data">
      
      <input type="hidden" name="acabado" id="acabado" value="">
      <input type="hidden" name="archivo1" id="archivo1" value="">
      <input type="hidden" name="tipo" id="tipo" value="calendario">
      <input type="hidden" name="nombre" id="nombre" value="<?php echo $articulo; ?>">
      <input type="hidden" name="material" id="material" value="">
      <input type="hidden" name="producto" id="producto" value="<?php echo $producto; ?>">
      <input type="hidden" name="categoria" id="categoria" value="ImpDigital">
      <input type="hidden" name="seccion" id="seccion" value="ImpDigital">
<?php if($colgar){ ?>             
      <input type="hidden" name="w" id="w" value="<?php echo $ancho; ?>">     
      <input type="hidden" name="h" id="h" value="<?php echo $alto; ?>">  
      <input type="hidden" name="info" id="info" value="<?php echo $tamano; ?>">  
 <?php } ?>   

      <div class="well">
        <h3>Instrucciones:</h3>
        <ol>
          <li>Elige <strong><?php echo  $n_fotos; ?> fotos</strong>, una por página + la portada.</li>
          <li>Asegurate de que tienen calidad suficiente.(<a href="calculadora.php" target="_blank">calculadora de imagenes</a>)</li>
          <li>Nombra las fotos de acuerdo al orden que deban aparecer.</li>
          <li>Comprímelas en un solo archivo (zip o rar) y súbelas en esta página.</li>
          <li>Elije el resto de opciones.</li>
        </ol>
        <h3>Tarifa:</h3>
        <p>Precio por unidad (pidiendo hasta 25 unidades): <?php echo  formatoMoneda($precio_25); ?> €</p>
        <p>Precio por unidad (pidiendo mas de 25 unidades): <?php echo formatoMoneda($precio_26); ?> €</p>
        <p>Precio de composición: <?php echo formatoMoneda($precio_composicion); ?> €</p>
        <p><strong>Ejemplo:</strong>  5 calendarios x <?php echo  formatoMoneda($precio_25); ?> € + <?php echo formatoMoneda($precio_composicion); ?> € de composición = <?php echo 5*$precio_25 + $precio_composicion ?> € (sin IVA)
      </div>

<?php if($mesa){ ?>  
      <div class="control-group">
        <label class="control-label" for="tamano">Tamaño:</label>
        <div class="controls">
              <div class="btn-group" data-toggle="buttons-radio">
                <a href="tienda_calendarios.php?p=mesaa5" class="btn <?php if($tamano == "a5"){echo "active";} ?>">A5</a>
                <a href="tienda_calendarios.php?p=mesaa4" class="btn <?php if($tamano == "a4"){echo "active";} ?>">A4</a>
              </div>
        </div>
      </div>
<?php } ?>  


<?php if($colgar){ ?>  
      <div class="control-group">
        <label class="control-label" for="tamano">Tamaño:</label>
        <div class="controls">
              <div class="btn-group" data-toggle="buttons-radio">
                <a href="tienda_calendarios.php?p=colgarmeses<?php echo $meses;?>a4" class="btn <?php if($tamano == "a4"){echo "active";} ?>">A4</a>
                <a href="tienda_calendarios.php?p=colgarmeses<?php echo $meses;?>a3" class="btn <?php if($tamano == "a3"){echo "active";} ?>">A3</a>
              </div>
        </div>
      </div>

      <div class="control-group">
        <label class="control-label" for="tamano">Meses por cara:</label>
        <div class="controls">
              <div class="btn-group" data-toggle="buttons-radio">
                <a href="tienda_calendarios.php?p=colgarmeses1<?php echo $tamano;?>" class="btn <?php if($meses == "1"){echo "active";} ?>">1 mes/cara</a>
                <a href="tienda_calendarios.php?p=colgarmeses2<?php echo $tamano;?>" class="btn <?php if($meses == "2"){echo "active";} ?>">2 meses/cara</a>
              </div>
        </div>
      </div>
<?php } ?>  


      <div class="control-group">
        <label class="control-label" for="archivos">Archivos:</label>
        <div class="controls">
          <div id="bootstrapped-fine-uploader"></div>
        </div>
      </div>
    
      <div class="control-group">
        <label class="control-label" for="unidades">Unidades:</label>
        <div class="controls">
          <input id="unidades" type="text" class="span1" data-u25="<?php echo $precio_25; ?>" data-u26="<?php echo $precio_26; ?>" data-composicion="<?php echo $precio_composicion; ?>">
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
