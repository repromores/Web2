<?php include "inc/config.php"; ?>
<?php include "inc/head.php"; ?>
<title>morés - Subida alternativa</title>
<?php
  // $h1text : variable para fijar el H1 en cada pagina para hacerlo único y aprovechar mejor el SEO
  $h1text = "Subida alternativa - morés";
 ?>
<?php include "inc/menu.php"; ?>

  <div class="span10">
  	<div class="content">

<h2>Subida alternativa</h2>
<p>Esta página solo se debe usar poniendose en contacto con el departamento de informática de morés, cuando haya fallado el metodo normal.</p>
 
   <form action="inc/upload_emergencia.php" method="post" enctype="multipart/form-data">
  <label for="file">Archivo:</label>

  <div class="control-group">
    <label class="control-label" for="file">Archivo:</label>
    <div class="controls">
        <input type="file" name="file" id="file">
    </div>
  </div>
  
  <div class="form-actions">
    <input class="btn" type="submit" name="submit" value="Enviar archivo">
  </div>

  </form>

  	</div>
  </div>

  <div class="span3">
    
<?php include "inc/banner-envios.php"; ?>

  </div>
</div>
<?php include "inc/footer.php"; ?>