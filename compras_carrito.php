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
		<input type="hidden" class="envio" value="8.25">

	    <thead>
		    <tr>
			    <th>Producto</th>
			    <th>Información</th>
			    <th>Plazo</th>
			    <th>Precio</th>
			    <th></th>
		    </tr>
	    </thead>
	    <tbody>
		    <tr class="id123">
			    <td>Vinilo</td>
			    <td>124x200cm imagen: #34213123</td>
			    <td>1 semana</td>
			    <td class="precio" data-precio="105.00">105.00€</td>
			    <td><i  data-id="id123" class="icon-trash borrar-linea"></i></td>
		    </tr>
		    <tr class="id124">
			    <td>Vinilo</td>
			    <td>124x200cm imagen: #34213123</td>
			    <td>1 semana</td>
			    <td class="precio" data-precio="105.00">105.00€</td>
			    <td><i  data-id="id124" class="icon-trash borrar-linea"></i></td>
		    </tr>
		    <tr class="id125">
			    <td>Vinilo</td>
			    <td>124x200cm imagen: #34213123</td>
			    <td>1 semana</td>
			    <td class="precio" data-precio="105.00">105.00€</td>
			    <td><i  data-id="id125" class="icon-trash borrar-linea"></i></td>
		    </tr>
		    <tr class="id126">
			    <td>Vinilo</td>
			    <td>124x200cm imagen: #34213123</td>
			    <td>1 semana</td>
			    <td class="precio" data-precio="11.00">105.00€</td>
			    <td><i  data-id="id126" class="icon-trash borrar-linea"></i></td>
		    </tr>
		    <tr class="id127">
			    <td>Vinilo</td>
			    <td>124x200cm imagen: #34213123</td>
			    <td>1 semana</td>
			    <td class="precio" data-precio="105.00">105.00€</td>
			    <td><i  data-id="id127" class="icon-trash borrar-linea"></i></td>
		    </tr>
		    <tr class="id128">
			    <td>Vinilo</td>
			    <td>124x200cm imagen: #34213123</td>
			    <td>1 semana</td>
			    <td class="precio" data-precio="105.00">105.00€</td>
			    <td><i  data-id="id128" class="icon-trash borrar-linea"></i></td>
		    </tr>
		    <tr class="id129">
			    <td>Vinilo</td>
			    <td>124x200cm imagen: #34213123</td>
			    <td>1 semana</td>
			    <td class="precio" data-precio="105.12">105.00€</td>
			    <td><i data-id="id129" class="icon-trash borrar-linea"></i></td>
		    </tr>
	    </tbody>
    </table>
<div class="span4 pull-right">
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
			    <th>Envio</th>
			    <td class="sumPrecioEnvio"></td>
		    </tr>
		    <tr>
			    <th>TOTAL</th>
			    <td class="sumPrecioTotal"></td>
		    </tr>
	    </tbody>
    </table>
</div>



</div>

  	</div>
  </div>

  <div class="span3">
    
<?php include "inc/banner-envios.php"; ?>

  </div>
</div>
<?php include "inc/footer.php"; ?>