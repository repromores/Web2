<?php include "inc/config.php"; ?>
<?php include "inc/head.php"; ?>
<title>morés - Nuevo usuario</title>
<?php
  // $h1text : variable para fijar el H1 en cada pagina para hacerlo único y aprovechar mejor el SEO
  $h1text = "Nuevo usuario - morés";
 ?>
<?php include "inc/menu.php"; ?>

  <div class="span10">
  	<div class="content">
<h2>Nuevo usuario</h2>
<div>
	<br>
	<p>Solicitud de nueva alta de usuario:</p>
<?php if(isset($_GET["error"])&& $_GET["error"]==1){ ?>
    <div class="alert alert-error">
      <p>¡Error! Por favor rellena todos los campos obligatorios</p>
    </div>
<?php } ?>

<?php if(isset($_GET["error"])&& $_GET["error"]==2){ ?>
    <div class="alert alert-error">
      <p>¡Error! Ese email ya está en la base de datos. <a href="login.php">Loguéate o recupera la contraseña</a></p>
    </div>
<?php } ?>

	<form action="nuevo-usuario-alta.php" class="form-horizontal contacto redirect" method="POST">
		<input type="hidden" name="ip" value="<?php echo getIp(); ?>">
		<input type="hidden" name="login" value="<?php echo !empty($_GET['login'])? $_GET['login']:1 ?>">
	    <fieldset>
	    <div class="control-group">
		    <label class="control-label" for="nombre">Nombre:*</label>
		    <div class="controls">
		   		<input type="text" class="span7 required" id="nombre" name="nombre">
		    </div>
	    </div>

	    <div class="control-group">
		    <label class="control-label" for="ape">Apellidos:*</label>
		    <div class="controls">
		   		<input type="text" class="span7 required" id="ape" name="ape">
		    </div>
	    </div>

	    <div class="control-group">
		    <label class="control-label" for="mail">Email:*</label>
		    <div class="controls">
		   		<input type="email" class="span7 required" id="mail" name="mail">
		    </div>
	    </div>

	    <div class="control-group">
		    <label class="control-label" for="cif">Cif / Nif:*</label>
		    <div class="controls">
		   		<input type="text" class="span7 required" id="cif" name="cif">
		    </div>
	    </div>

	    <div class="control-group">
		    <label class="control-label" for="dir">Dirección:</label>
		    <div class="controls">
		   		<input type="text" class="span7" id="dir" name="dir">
		    </div>
	    </div>

	    <div class="control-group">
		    <label class="control-label" for="dir">Dirección 2:</label>
		    <div class="controls">
		   		<input type="text" class="span7" id="dir2" name="dir2">
		    </div>
	    </div>

	    <div class="control-group">
		    <label class="control-label" for="cp">Código postal:</label>
		    <div class="controls">
		   		<input type="text" class="span7" id="cp" name="cp">
		    </div>
	    </div>

	    <div class="control-group">
		    <label class="control-label" for="pobl">Población:*</label>
		    <div class="controls">
		   		<input type="text" class="span7 required" id="pobl" name="pobl">
		    </div>
	    </div>

	    <div class="control-group">
		    <label class="control-label" for="tel">Teléfono:*</label>
		    <div class="controls">
		   		<input type="text" class="span7 required" id="tel" name="tel">
		    </div>
	    </div>

	    <div class="control-group">
		    <label class="control-label" for="pass">Contraseña:*</label>
		    <div class="controls">
		   		<input type="password" class="span7 required" id="pass" name="pass">
		    </div>
	    </div>

	    <div class="control-group">
		    <div class="controls">
		    	<input type="checkbox" value="1" id="privacidad" name="privacidad">
                 He leído y acepto la política de privacidad
		    </div>
	    </div>
	   	<div class="control-group">
		    <div class="controls">
		   		<input type="checkbox" value="1" id="newsletter" name="newsletter" checked="checked">
                Deseo recibir periódicamente newsletters de Repromorés S.L. 
		    </div>
	    </div>

	    <div class="form-actions">
            <button class="btn btn-primary" type="submit">Enviar</button>
            <div class="mensaje-error">Corrige los campos en rojo</div>
            <div class="mensaje-exito"></div>
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
<?php include "inc/footer.php"; ?>