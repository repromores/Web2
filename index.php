<?php include "inc/config.php"; ?>
<?php include "inc/head.php"; ?>
<title>Morés - reprografía, cartelería, impresión digital, stands y más</title>
<?php
  // $h1text : variable para fijar el H1 en cada pagina para hacerlo único y aprovechar mejor el SEO
  $h1text = "";
 ?>
<?php include "inc/menu.php"; ?>

  <div class="span10">
    <div id="myCarousel" class="carousel slide">
      <div class="carousel-inner">
        <div class="item active">
            <a href="tienda.php"><img src="imagenes/portadas/tienda.jpg" alt="regalos online tienda"></a>
        </div>
        <div class="item">
            <a target="_black" href="pdf/photocall.pdf"><img src="imagenes/portadas/photocall.jpg" alt="photocalls"></a>
        </div>
        <div class="item">
            <img src="imagenes/portadas/calendarios.jpg" alt="calendarios personalizados">
        </div>
          <!-- 
          <div class="carousel-caption">
            <a href="pdf/bajamos precios baja.pdf" target="_blank"><img src="imagenes/portadas/iva.jpg" alt="Precios sin IVA"></a>
          </div>

          <div class="carousel-caption">
            <h4>First Thumbnail label</h4>
            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
          </div>
           -->
        </div>
        
<?php /*
        <div class="item">
          <img src="http://lorempixel.com/587/350/sports/2" alt="">
          <!-- 
          <div class="carousel-caption">
            <h4>Second Thumbnail label</h4>
            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
          </div>
          -->
        </div>
        <div class="item">
          <img src="http://lorempixel.com/587/350/sports/3" alt="">
          <div class="carousel-caption">
            <h4>Third Thumbnail label</h4>
            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
          </div>
        </div>
*/?>



      <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>

    </div>

    <div class="row">
      
      <div class="span5">
        <a href="impresion-sobre-flexibles.php" class="linktarjeton">
          <div class="tarjeton carteleria">
            <h2>Cartelería</h2>
            <div class="tarjeton-text"><p>Lonas, vallas, vinilos, mupis, cuadros, murales, wallpapers, banderolas, posters, paneles decorativos, lienzos, photocalls, impresión en rígidos, suelos técnicos, cajas de luz, impresión fotográfica Lambda.</p></div>
          </div>
        </a>
        <a href="rotulacion.php" class="linktarjeton">
        <div class="tarjeton rotulacion">
          <h2>Rotulación</h2>
          <div class="tarjeton-text"><p>Rotulación de locales, interiores, flotas de vehículos, señalética, letras corpóreas,  directorios, vinilos decorativos, placas de metacrilato.</p></div>
        </div>
        </a>
        <a href="reprografia-fotocopias-blanco-negro.php" class="linktarjeton">
        <div class="tarjeton reprografia">
          <h2>Reprografía</h2>
          <div class="tarjeton-text"><p>Fotocopias blanco y negro, a color, pegatinas, transparencias, etiquetas, ampliaciones / reducciones, repetición de imágenes, reproducción de planos, proyectos técnicos.</p></div>
        </div>
        </a>

        <a href="digitalizacion-documentacion.php" class="linktarjeton">
        <div class="tarjeton digitalizacion">
          <h2>Digitalización</h2>
          <div class="tarjeton-text"><p>Digitalización de archivos, pergaminos, manuscritos, documentación técnica, retoque de fotografías antiguas.</p></div>
        </div>
        </a>
        
      </div>
      

      <div class="span5">
        <a href="impresion-digital.php" class="linktarjeton">
        <div class="tarjeton impresion">
          <h2>Impresión Digital</h2>
          <div class="tarjeton-text"><p>Tarjetas, folletos, cartas, catálogos, invitaciones, papelería corporativa, libros, calendarios, postales, marcapáginas, flyers, galletas CD/DVD, tarjetas PVC, impresión de prendas de ropa.</p></div>
        </div>
        </a>
        <a href="soportes-expositivos.php" class="linktarjeton">
        <div class="tarjeton stands">
          <h2>Stands y Displays</h2>
          <div class="tarjeton-text"><p>Estructuras modulares, enrollables, portafolletos, truss, tótems, banners, pop up, mostradores, atriles, T3 y demás elementos para stands.</p></div>
        </div>
        </a>


        <a href="fotografia-digital.php" class="linktarjeton">
        <div class="tarjeton foto">
          <h2>Fotografía Digital</h2>
          <div class="tarjeton-text"><p>Albúm digital, calendarios, cámaras, marcos digitales, accesorios fotográficos, revelado, impresiones Warhol, escaneado de diapositivas, digitalización de imágenes.</p></div>
        </div>
        </a>



        <a href="encuadernacion-rapida.php" class="linktarjeton">
        <div class="tarjeton encuadernacion">
          <h2>Encuadernación</h2>
          <div class="tarjeton-text"><p>Espiral, tornillo, canutillo, alambre, encuadernación rústica, de piel, libros de firmas, fascículos, cajas y estuches a medida, tesis doctorales.</p></div>
        </div>
        </a>
      </div>


    </div>
  </div>

  <div class="span3">
    
<?php include "inc/banner-envios.php"; ?>

  </div>
</div>
<?php include "inc/footer.php"; ?>