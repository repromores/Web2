<?php include "inc/config.php"; ?>
<?php include "inc/head.php"; ?>

<title>morés - Editar usuario</title>
<?php
  // $h1text : variable para fijar el H1 en cada pagina para hacerlo único y aprovechar mejor el SEO
  $h1text = "Editar usuario - morés";
 ?>
<?php include "inc/menu.php"; ?>

  <div class="span10">
  	<div class="content">
<h2>Editar usuario - <?php echo $_SESSION["usr_email"] ?></h2>
<div>
	<br>
<?php if(isset($_GET["error"])&& $_GET["error"]==1){ ?>
    <div class="alert alert-error">
      <p>¡Error! Por favor rellena todos los campos obligatorios</p>
    </div>
<?php } ?>

<?php if(isset($_GET["error"])&& $_GET["error"]==2){ ?>
    <div class="alert alert-error">
      <p>¡Error! Ese email ya está en la base de datos.</p>
    </div>
<?php } ?>

	<form action="nuevo-usuario-edit.php" class="form-horizontal contacto redirect" method="POST">
		<input type="hidden" name="ip" value="<?php echo getIp(); ?>">
	    <fieldset>
	    <div class="control-group">
		    <label class="control-label" for="nombre">Nombre:*</label>
		    <div class="controls">
		   		<input type="text" class="span7 required" id="nombre" name="nombre" value="<?php echo $_SESSION["usr_nombre"] ?>">
		    </div>
	    </div>

	    <div class="control-group">
		    <label class="control-label" for="ape">Apellidos:*</label>
		    <div class="controls">
		   		<input type="text" class="span7 required" id="ape" name="ape" value="<?php echo $_SESSION["usr_apellidos"] ?>">
		    </div>
	    </div>

	    <div class="control-group">
		    <label class="control-label" for="cif">Cif / Nif:*</label>
		    <div class="controls">
		   		<input type="text" class="span7 required" id="cif" name="cif" value="<?php echo $_SESSION["usr_cif"] ?>">
		    </div>
	    </div>

	    <div class="control-group">
		    <label class="control-label" for="dir">Dirección:</label>
		    <div class="controls">
		   		<input type="text" class="span7" id="dir" name="dir" value="<?php echo $_SESSION["usr_dir"] ?>">
		    </div>
	    </div>

	    <div class="control-group">
		    <label class="control-label" for="pobl">Población:*</label>
		    <div class="controls">
		   		<input type="text" class="span7 required" id="pobl" name="pobl" value="<?php echo $_SESSION["usr_pob"] ?>">
		    </div>
	    </div>

	    <div class="control-group">
		    <label class="control-label" for="tel">Teléfono:*</label>
		    <div class="controls">
		   		<input type="text" class="span7 required" id="tel" name="tel" value="<?php echo $_SESSION["usr_telefono"] ?>">
		    </div>
	    </div>

	    <div class="control-group">
		    <label class="control-label" for="pass">Contraseña:</label>
		    <div class="controls">
		   		<input type="password" class="span7" id="pass" name="pass" placeholder="Dejar en blanco para mantener la contraseña anterior">
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
            <a class="btn" href="subir-archivos.php">Cancelar</a>
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