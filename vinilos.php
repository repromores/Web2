<?php include "inc/config.php"; ?>
<?php include "inc/apifotolia.php"; ?>

<?php include "inc/head.php"; 
$vinilos = 1;
?>
<title>morés - Vinilos</title>
<?php
  // $h1text : variable para fijar el H1 en cada pagina para hacerlo único y aprovechar mejor el SEO
  $h1text = "Vinilos - morés";
 ?>
<?php include "inc/menu.php"; ?>

  <div class="span10">
  	<div class="content vinilos">

<h2>Vinilos</h2>
<p>
Ponemos a tu disposición una amplia colección de vinilos para tu hogar o negocio.</p>
 
<form class="form-inline" id="vinilosform" method="post" action="inc/apifotolia.php?function=getBusqueda">
  <input type="hidden" name="min" id="min" value="0">

  <div class="busqueda">
      Buscar:
      <input type="text" class="span3" name="query" id="query" placeholder="¿Qué te apetece?">
      <select name="cat" class="span3">
        <option value="0">Todos</option>
        <?php echo getCatPrimarias() ?>
      </select>

      <select name="tipo" class="span2">
        <option value="0">Todos</option>
        <option value="vector">Vector</option>
        <option value="foto">Fotografía</option>
        <option value="ilus">Ilustración</option>
      </select>

      <button type="submit" class="btn btn-primary" id="vinilos-submit">Buscar</button>
  </div>

  <div class="resultados"></div>
  <div class="paginacion">
    <button type="button" class="btn pag patras" disabled="disabled"><</button>
    <button type="button" class="btn pag palante">></button> 
  </div> 
</form>


  	</div>
  </div>

  <div class="span3">
    
<?php include "inc/banner-envios.php"; ?>

  </div>
</div>

<?php include "inc/footer.php"; ?>