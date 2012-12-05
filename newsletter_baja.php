<?php include "inc/config.php"; ?>
<?php include "inc/head.php"; ?>
<title>morés - Mailing</title>
<?php
  // $h1text : variable para fijar el H1 en cada pagina para hacerlo único y aprovechar mejor el SEO
  $h1text = "Mailing - morés";

  $email = $_GET["mail"];
  $id    = $_GET["id"];

  $q = mysql_query('UPDATE usuarios SET
  newsletter = 0 
 WHERE email = "'.$email.'" AND id='.$id );

 ?>
<?php include "inc/menu.php"; ?>

  <div class="span10">
  	<div class="content">

<h2>Mailing de newsletter</h2>
<p>
Hemos dado de baja su email de nuestra lista de envíos de newsletter.
</p>
 <p>Si desea volver a recibirlos puede apuntarse en el cuadro de la izquierda o modificando perfil de usuario.</p>

  	</div>
  </div>

  <div class="span3">
    
<?php include "inc/banner-envios.php"; ?>

  </div>
</div>
<?php include "inc/footer.php"; ?>