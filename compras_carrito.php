<?php include "inc/config.php"; ?>
<?php include "inc/head.php"; ?>
<title>morés - Carrito</title>
<?php
  // $h1text : variable para fijar el H1 en cada pagina para hacerlo único y aprovechar mejor el SEO
  $h1text = "Carrito - morés";
 ?>
<?php include "inc/menu.php"; ?>

  <div class="span10">
  	<div class="content">
<h2>Carrito de productos</h2>
<div>
	<br>
	<p>¿Dudas? Contacta con nosotros:</p>
	<ul>
		<li>Teléfono: &nbsp&nbsp<strong>902 466 737 / 985 963 103 / 985 963 288</strong> </li>
	</ul>


	<table class="table table-striped">
		<input type="hidden" class="iva" value="21">

	    <thead>
		    <tr>
			    <th>Producto</th>
			    <th>Información</th>
			    <th>Precio</th>
			    <th></th>
		    </tr>
	    </thead>
	    <tbody>
		   <?php echo muestraPedidoCarrito(); ?>
	    </tbody>
    </table>
<div class="span4 pull-right clearfix">
	<table class="table table-striped">

	    <tbody>
	    	<tr>
			    <th>Subtotal</th>
			    <td class="sumPrecios"></td>
		    </tr>
		    <tr>
			    <th>IVA</th>
			    <td class="sumPreciosIva"></td>
		    </tr>
		    <tr>
			    <th>TOTAL*</th>
			    <td class="sumPrecioTotal"></td>
		    </tr>
	    </tbody>
    </table>
    <p><small>*El método de entrega (siguiente paso) puede alterar el precio final.</small></p>
</div>

<div class="well" style="margin-top:180px;">
	<a class="btn" href="">Paso atrás</a>
	<a class="btn btn-primary pull-right" href="login2.php">Siguiente paso</a>


</div>

</div>

  	</div>
  </div>

  <div class="span3">
    
<?php include "inc/banner-envios.php"; ?>

  </div>
</div>
<?php include "inc/footer.php"; ?>