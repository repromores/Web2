<?php
  $h1text = !empty($h1text)? $h1text : "Morés - reprografía, cartelería, impresión digital, stands y más";
?>


  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="span16">
          <h1 class="logo">
            <a href="index.php">
              <img src="img/mores.png" alt="<?php echo  $h1text ?>">
            </a>
          </h1>
          <nav class="pull-right">
            <ul class="menu-top">
              <li><a href="index.php">Inicio</a></li>
              <li><a href="quienes-somos.php">Quienes Somos</a></li>
              <li><a href="tiendas.php">Tiendas</a></li>
              <!-- <li><a href="">Preguntas Frecuentes</a></li> -->
              <li><a href="contacta.php">Contacto</a></li>
            </ul>
          </nav>
        </div>
      </div>
<div class="row sep-hor">
  <div class="span3">
    <nav class="menu-left nav nav-list">
      <ul>
        <li class="nav-header" data-menu="menu1">
          Cartelería
        </li>
        <div class="menu-list menu1">
          <li><a class="menu-item" href="impresion-sobre-flexibles.php">Impresión sobre flexibles</a></li>
          <li><a class="menu-item" href="impresion-sobre-rigidos.php">Impresión sobre rígidos</a></li>
          <li><a class="menu-item" href="impresion-fotografica.php">Impresión fotográfica</a></li>
          <li><a class="menu-item" href="acabado-impresion-gran-formato.php">Acabado</a></li>
        </div>

        <li class="nav-header"  data-menu="menu2">
          Impresión Digital
        </li>
        <div class="menu-list menu2">
          <li><a class="menu-item" href="impresion-digital.php">Impresión digital</a></li>
          <li><a class="menu-item" href="imprenta-digital.php">Imprenta digital</a></li>
          <li><a class="menu-item" href="acabado-impresion-digital.php">Acabado</a></li>
        </div>

        <li class="nav-header" data-menu="menu3">
          Rotulación
        </li>
        <div class="menu-list menu3">
          <li><a class="menu-item" href="rotulacion.php">Rotulación y Montaje</a></li>
        </div>

        <li class="nav-header"  data-menu="menu4">
          Stands y displays
        </li>
        <div class="menu-list menu4">
         <li><a class="menu-item" href="soportes-expositivos.php">Stands y displays</a></li>
        </div>

        <li class="nav-header" data-menu="menu5">
           Reprografía
        </li>
        <div class="menu-list menu5"> 
          <li><a class="menu-item" href="reprografia-fotocopias-blanco-negro.php">Fotocopias en blanco y negro</a></li>
          <li><a class="menu-item" href="reprografia-fotocopias-color.php">Fotocopias en color</a></li>
          <li><a class="menu-item" href="reprografia-planos.php">Planos</a></li>
        </div>

        <li class="nav-header"  data-menu="menu6">
          Digitalización
        </li>
        <div class="menu-list menu6">
          <li><a class="menu-item" href="digitalizacion-documentacion.php">Histórica, técnica y administrativa</a></li>
          <li><a class="menu-item" href="digitalizacion-fotografica.php">Fotográfica</a> </li>
        </div>

        <li class="nav-header"  data-menu="menu7">
          Fotografía digital
        </li>
        <div class="menu-list menu7">
          <li><a class="menu-item" href="fotografia-digital.php">Fotografía digital</a></li>
          <li><a class="menu-item" href="material-fotografico.php">Material fotográfico</a></li>
        </div>

        <li class="nav-header"  data-menu="menu8">
          Encuadernación
        </li>
        <div class="menu-list menu8"> 
          <li><a class="menu-item" href="encuadernacion-rapida.php">Encuadernación rápida</a></li>
          <li><a class="menu-item" href="encuadernacion-encarpetado-proyectos.php">Encarpetado de proyectos</a></li>
          <li><a class="menu-item" href="encuadernacion-artesanal.php">Encuadernación artesanal</a></li>
        </div>
      </ul>
    </nav>

  <div class="newsletter">
    <h2>Newsletter</h2>
    <p>¡Apúntate a nuestra newsletter para enterarte de todas nuestras ofertas y novedades!</p>
    <form class="form" method="post" id="newsletterform" action="inc/agregaemails.php">
      <input type="email" class="input" name="email" required="required" placeholder="Danos tu email">
      <input type="submit" class="btn btn-newsletter" value="Enviar email">
    </form>
  </div>


  </div>