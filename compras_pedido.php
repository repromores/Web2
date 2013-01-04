<?php include "inc/config.php"; ?>
<?php
  if(!isLogged()){  header('Location: login2.php');};

$dir1 	= empty($_SESSION["pedido"]["data"]["dir1"])	? $_SESSION["usr_dir"] 		: getEnvio("dir1");
$dir2 	= empty($_SESSION["pedido"]["data"]["dir2"])	? $_SESSION["usr_dir2"]		: getEnvio("dir2");
$nombre = empty($_SESSION["pedido"]["data"]["nombre"])	? $_SESSION["usr_nombre"] .' '.$_SESSION["usr_apellidos"] 		: getEnvio("nombre");
$tele 	= empty($_SESSION["pedido"]["data"]["tele"])	? $_SESSION["usr_telefono"] : getEnvio("tele");
$pobl 	= empty($_SESSION["pedido"]["data"]["pobl"])	? $_SESSION["usr_pob"] 		: getEnvio("pobl");
$prov 	= empty($_SESSION["pedido"]["data"]["prov"])	? $_SESSION["usr_prov"] 	: getEnvio("prov");
$cp 	= empty($_SESSION["pedido"]["data"]["cp"])		? $_SESSION["usr_cp"] 		: getEnvio("cp");


?>
<?php include "inc/head.php"; ?>
<title>morés - Pedido</title>
<?php
  // $h1text : variable para fijar el H1 en cada pagina para hacerlo único y aprovechar mejor el SEO
  $h1text = "Pedido - morés";
 ?>
<?php include "inc/menu.php"; ?>

  <div class="span10">
  	<div class="content" id="pag-pedido">
  		<div class="numberCircleContainer">
			<div class="numberCircle success">1</div>
			<div class="numberCircle warning">2</div>
			<div class="numberCircle">3</div>
			<div class="numberCircle">4</div>


		</div>
		<div class="progress">
		    <div class="bar bar-success" style="width: 25%;"></div>
			<div class="bar bar-warning" style="width: 25%;"></div>
	    </div>
      <legend>Modificar datos de usuario</legend>
      <p><strong>La factura se emitirá con los datos que tenemos guardados en su perfil,</strong> independientemente de la dirección de envío que introduzca abajo.</p>
      <p> Si desea modificar sus datos almacenados en el Sistema de Envios de Morés, por favor pulse el botón siguiente:</p>
      <a class="btn" href="editar-usuario.php?login=2">Modificar datos</a> <?php if($masdatos){ ?><strong style="color:red">Por favor, completa tu ficha para usar el servicio</strong><?php } ?>
      <?php if(!$masdatos){ ?>
      <legend>Método de entrega</legend>

	<?php if(isset($_GET["error"])){ ?>
	    <div class="alert alert-error">
	      <p>Rellena todos los campos obligatorios</p>
	    </div>
	<?php } ?>

      <form class="form-horizontal" id="form-pedido" action="inc/compras_procesa_pedido.php" method="post" enctype="multipart/form-data">
        <fieldset>
          <input type="hidden" name="metodo" id="metodo">
          <input type="hidden" name="envio" id="envio" value="">

          
          <div class="control-group">
                <div class="btn-group" data-toggle="buttons-radio">
				    <button type="button " class="btn metodo m-tienda" data-metodo="m-tienda">En tienda</button>
				    <button type="button" class="btn metodo m-mensajero" data-metodo="m-mensajero">Por mensajero</button>
			    </div>
          </div>

     	  <div class="m-mensajero-t">
          	<p>Los gastos de envío en la península son de <?php echo formatoMoneda($def_gastos_envio); ?> €</p>
		  </div>

      	  <div class="control-group">
            <label for="nombre" class="control-label">Nombre Completo*:</label>
        	<div class="controls">
	            <input  type="text"  name="nombre" class="nombre" value="<?php echo $nombre ?>">
          	</div>
     	  </div>
          <div class="m-tienda-t">
	          <div class="control-group">
	            <label for="tienda" class="control-label">Tienda*:</label>
		            <div class="controls">
		              <select name="ciudadRecogida" style="width: 120px;" id="ciudadRecogida" class="ciudadRecogida">
		                <option value="oviedo"<?php if(getEnvio("ciudad")=="oviedo"){echo ' selected="selected"';} ?>>Oviedo</option>
		                <option value="gijon"<?php if(getEnvio("ciudad")=="gijon"){echo ' selected="selected"';} ?>>Gijón</option>
		                <option value="llanera"<?php if(getEnvio("ciudad")=="llanera"){echo ' selected="selected"';} ?>>Llanera</option>
		              </select>
		              <span class="help-inline tienda-help">Viaducto Ingeniero Marquina, 7 <a class="mapa fancybox.iframe" href="https://maps.google.com/maps/ms?msa=0&amp;msid=201196282089870687635.0004b75b2be933103a9c6&amp;ie=UTF8&amp;t=m&amp;ll=43.36557,-5.854683&amp;spn=0.003744,0.006866&amp;z=17&amp;output=embed"><img src="img/mini-map.png" alt="mapa"></a></span>
		            </div>
	          </div>
	      </div>

	      <div class="m-mensajero-t">
	          <div class="control-group">
	            <label for="Direccion1" class="control-label">Dirección de entrega*:</label>
            	<div class="controls">
		            <input  type="text"  name="direccion1" class="direccion1" value="<?php echo $dir1 ?>">
	          	</div>
	          	<div class="controls"  style="margin-top:6px">
		            <input  type="text"  name="direccion2" value="<?php echo $dir2 ?>">
	          	</div>
	     	  </div>

	     	  <div class="control-group">
	            <label for="poblacion" class="control-label">Población*:</label>
            	<div class="controls">
		            <input  type="text"  name="poblacion"  class="poblacion" value="<?php echo $pobl ?>">
	          	</div>
	     	  </div>

	     	  <div class="control-group">
	            <label for="provincia" class="control-label">Provincia*:</label>
            	<div class="controls">
		            <input  type="text"  name="provincia" class="provincia" value="<?php echo $prov ?>">
	          	</div>
	     	  </div>

	     	  <div class="control-group">
	            <label for="cp" class="control-label">Código Postal*:</label>
            	<div class="controls">
		            <input  type="text"  name="cp" class="cp" value="<?php echo $cp ?>">
	          	</div>
	     	  </div>
          </div>

	     	  <div class="control-group">
	            <label for="telefono" class="control-label">Teléfono*:</label>
            	<div class="controls">
		            <input  type="text"  name="telefono" class="telefono"  value="<?php echo $tele ?>">
	          	</div>
	     	  </div>

        </fieldset>

		<div class="well" style="margin-top:20px;">
			<a class="btn" href="compras_carrito.php">Paso atrás</a>
			<button class="btn btn-primary btnsubmit pull-right" type="submit">Resumen</button>
		</div>

      </form>
      <?php } ?>




  	</div>
  </div>

  <div class="span3">
    
<?php include "inc/banner-envios.php"; ?>

  </div>
</div>
<?php include "inc/footer.php"; ?>