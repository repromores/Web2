<?php include "inc/config.php"; ?>
<?php
  if(!isLogged()){  header('Location: login.php');};
?>
<?php include "inc/head.php"; ?>
<title>morés - Resumen de envío</title>
<?php
  // $h1text : variable para fijar el H1 en cada pagina para hacerlo único y aprovechar mejor el SEO
  $h1text = "Resumen de envío - morés";
 ?>
<?php include "inc/menu.php"; ?>

  <div class="span10">
  	<div class="content">

<h2>Resumen de envío</h2>
<p>
Lista de archivos recibidos:</p><br>
<ol>
<?php echo $_SESSION["usr_archivos"]; ?>
</ol>
<br><br>
<p>Si desea enviar más archivos, pulse el botón siguiente:</p>
<a class="btn" href="subir-archivos.php">Volver al envio de archivos</a>
<br><br>
<p>Si desea cerrar la sesión y volver al inicio del sistema de envíos: </p>
<a class="btn" href="inc/salir.php">Cerrar sesión</a>

  	</div>
  </div>

  <div class="span3">
    
<?php include "inc/banner-envios.php"; ?>

  </div>
</div>
<?php include "inc/footer.php"; ?>