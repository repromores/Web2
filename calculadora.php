<?php include "inc/config.php"; ?>
<?php include "inc/head.php"; ?>
<title>morés - Impresión fotográfica (Lambda)</title>
<?php
  // $h1text : variable para fijar el H1 en cada pagina para hacerlo único y aprovechar mejor el SEO
  $h1text = "Impresión fotográfica (Lambda) - morés";
 ?>
<?php include "inc/menu.php"; ?>

  <div class="span10">
  	<div class="content">

<h2>Calculadora de imágenes</h2>

<p>Para asegurar el mejor resultado, recomendamos usar imágenes de no menos de 200ppi(pixeles por pulgada) o 78 pixeles por cm</p>
<p>Para saber si una imagen es apta introduzca sus medidas (en píxeles) y luego el tamaño en cm en el que desea imprimir</p>
     <form  class="form-horizontal"> 
      <div class="control-group">
        <label class="control-label" >Tamaños:</label>
        <div class="controls">
          <input type="text" class="campo px1 span1"></input> px x <input type="text" class="campo px2 span1"></input> px (tamaño en px de la imagen a imprimir)</br>
          <input type="text" class="campo cm1 span1"></input> cm x <input type="text" class="campo cm2 span1"></input> cm (tamaño en el que la imagen se imprimiría)
        </div>
      </div>


      <div class="control-group">
        <label class="control-label" >Resolución:</label>
        <div class="controls">
        	<span class="resultado"></span>
        </div>
      </div>
</form>
		
  	</div>
  </div>

  <div class="span3 colderecha">
    
<?php include "inc/banner-envios.php"; ?>

  </div>
</div>

<?php include "inc/footer.php"; ?>