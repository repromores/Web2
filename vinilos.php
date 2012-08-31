<?php include "inc/config.php"; ?>
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

<div class="busqueda">
    <form class="form-inline" id="vinilosform" method="post" action="inc/fotolia.php">
    Buscar:
    <input type="text" class="span4" name="query" id="query" placeholder="¿Qué te apetece?">
    <select name="cat" class="span3">
      <option value="">Todos</option>
      <optgroup label="Categorías">
        <option value="">1</option>
        <option value="">1</option>
      <optgroup label="Conceptos">
        <option value="">1</option>
        <option value="">1</option>
    </select>
    <button type="submit" class="btn btn-primary" id="vinilos-submit">Buscar</button>
    </form>
</div>

<div class="resultados">
  
  
</div>

  	</div>
  </div>

  <div class="span3">
    
<?php include "inc/banner-envios.php"; ?>

  </div>
</div>

<?php include "inc/footer.php"; ?>