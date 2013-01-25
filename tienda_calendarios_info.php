<?php include "inc/config.php"; ?>
<?php include "inc/head.php"; ?>
<title>morés - Foto en cartón pluma</title>
<?php
  $producto = "fotocartonpluma";
  // $h1text : variable para fijar el H1 en cada pagina para hacerlo único y aprovechar mejor el SEO
  $h1text = "Foto en cartón pluma - morés";
  
?>
<?php include "inc/menu.php"; ?>

  <div class="span10">
    <div class="content  tiendainfo">

      <h2>Calendarios</h2>

    <ul class="breadcrumb">
      <li><a href="index.php">Inicio</a> <span class="divider">/</span></li>
      <li><a href="tienda.php">Tienda</a> <span class="divider">/</span></li>
      <li class="active">Calendarios</li>
    </ul>

      <div class="row">
        <div class="span5">
          <a href="imagenes/online/CALEND_CD.jpg" data-fancybox-group="items" class="fancybox"><img src="imagenes/online/CALEND_CD.jpg" class="img-polaroid" alt=" comprar Calendario de cd" title=" comprar Calendario de cd"></a>
        </div>
        <div class="span5">
          <h3>Comprar calendario de caja de CD</h3>
          <ul>
            <li>Calendario pequeño y portátil.</li>
            <li>Calendario personalizado con 13 fotos (doce meses + portada)</li>
          </ul>
          <a href="tienda_calendarios.php?p=cajacd" class="btn btn-primary margint20 pull-right"><i class="icon-shopping-cart icon-white"></i> Hacer pedido</a>
        </div>
      </div>


      <div class="row margint20">
        <div class="span5">
          <a href="imagenes/online/CALEND_ESPIRAL.jpg" data-fancybox-group="items" class="fancybox"><img src="imagenes/online/CALEND_ESPIRAL.jpg" class="img-polaroid" alt=" comprar Calendario de pared" title=" comprar Calendario de pared"></a>
        </div>
        <div class="span5">
          <h3>Calendario de colgar</h3>
          <ul>
            <li>Calendario disponible en tamaños A3 y A4.</li>
            <li>Dos modelos de calendario:</li>
              <ul>
                <li>Un mes por cara -> 13 fotos </br>(doce meses + portada)</li>
                <li>Dos meses por cara -> 7 fotos </br>(6 caras + portada)</li>
              </ul>
          </ul>
          <a href="tienda_calendarios.php?p=colgarmeses1a4" class="btn btn-primary margint20 pull-right"><i class="icon-shopping-cart icon-white"></i> Hacer pedido</a>
        </div>
      </div>

      <div class="row margint20">
        <div class="span5">
          <a href="imagenes/online/CALEND_PIE.jpg" data-fancybox-group="items" class="fancybox"><img src="imagenes/online/CALEND_PIE.jpg" class="img-polaroid" alt="comprar Calendario de pie" title="comprar Calendario de pie"></a>
        </div>
        <div class="span5">
          <h3>Calendario de pie</h3>
          <ul>
            <li>Personalíza el calendario con 13 fotos</br> (doce meses + portada)</li>
          </ul>
          <a href="tienda_calendarios.php?p=mesaa5" class="btn btn-primary margint20 pull-right"><i class="icon-shopping-cart icon-white"></i> Hacer pedido</a>
        </div>
      </div>


    
    </div>
  </div>


  <div class="span3">
    
<?php include "inc/banner-envios.php"; ?>

  </div>
</div>
<?php include "inc/footer.php"; ?>