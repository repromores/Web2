<?php
 include "inc/config.php";
 include "inc/apifotolia.php"; 
 include "inc/head.php"; 

$vinilos = 1;
?>
<title>morés - Vinilos decorativos</title>
<?php
  // $h1text : variable para fijar el H1 en cada pagina para hacerlo único y aprovechar mejor el SEO
  $h1text = "Vinilos - morés";

include "inc/menu.php"; ?>

  <div class="span10">
  	<div class="content vinilos canvas-allow">

<h2>Vinilos</h2>
    <ul class="breadcrumb">
      <li><a href="index.php">Inicio</a> <span class="divider">/</span></li>
      <li><a href="tienda.php">Tienda</a> <span class="divider">/</span></li>
      <li><a href="tienda_vinilos_info.php">Vinilos decorativos</a> <span class="divider">/</span></li>
      <li class="active">Pedir vinilo decorativo</li>
    </ul>

      <div class="well">
        <h3>Instrucciones:</h3>
        <ol>
          <li>Ponemos a tu disposición una amplia colección de vinilos decorativos para tu hogar o negocio.</li>
          <li>Busca abajo una imagen de entre las miles que ofrecemos en el cátalogo.</li>
          <li>Con el envío del vinilo decorativo te llegarán instrucciones sencillas de como colocarlo sin problemas.</li>
        </ol>
      </div>
 
<form class="form-inline" id="vinilosform" method="post" action="inc/apifotolia.php?function=getBusqueda">
  <input type="hidden" name="min" id="min" value="0">

  <div class="busqueda">
      Busca:
      <input type="text" class="span3" name="query" id="query" placeholder="¿Qué te apetece?">
      <select name="cat" class="span3">
        <option value="0">Todos</option>
        <?php echo getCatPrimarias() ?>
      </select>

      <select name="tipo" class="span2">
        <option value="0">Todos</option>
        <?php //<option value="vector">Vector</option> ?>
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