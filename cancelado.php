<?php include "inc/config.php"; ?>
<?php include "inc/head.php"; ?>
<title>morés - Pedido Cancelado</title>
<?php
  // $h1text : variable para fijar el H1 en cada pagina para hacerlo único y aprovechar mejor el SEO
  $h1text = "Pedido Cancelado - morés";
 ?>
<?php include "inc/menu.php"; ?>

  <div class="span10">
  	<div class="content">

<h2>Pedido cancelado</h2>
<p>
Se ha cancelado el pedido que intentabas realizar. Las posibles causas son:
</p>
<ul>
	<li>Has cancelado el pedido durante el proceso de pago.</li>
	<li>Algo ha salido mal durante el proceso de pago.</li>
</ul>
<p>En cualquier caso puedes seguir comprando, o volver a tu carrito pinchando <strong><a href="compras_carrito.php">aquí</a></strong></p>




  	</div>
  </div>

  <div class="span3">
    
<?php include "inc/banner-envios.php"; ?>

  </div>
</div>
<?php include "inc/footer.php"; ?>