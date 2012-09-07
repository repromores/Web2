<?php include "inc/config.php"; ?>
<?php include "inc/head.php"; ?>
<title>morés - Documentación histórica, técnica y administrativa</title>
<?php
  // $h1text : variable para fijar el H1 en cada pagina para hacerlo único y aprovechar mejor el SEO
  $h1text = "Documentación histórica, técnica y administrativa - morés";
 ?>
<?php include "inc/menu.php"; ?>

  <div class="span10">
  	<div class="content">

<h2>Documentación histórica, técnica y administrativa</h2>
<p>
Gracias a nuestro moderno servicio de digitalización, le ofrecemos la posibilidad de manejar grandes volúmenes de información, de forma cómoda y segura, aprovechando al máximo el potencial de las nuevas tecnologías. Disponemos de sistemas de escaneado, tanto en blanco y negro como en color, que permiten la digitalización de todo tipo de originales, empleando las resoluciones y tamaños adecuados para cada tipo de documento.
</p>
<div class="clearfix">
	<ul class="galeria">

	<?php 
        $array_imagenes = array(
          "DSCF0476_1178.jpg",
          "digitalizacion tecnica2.jpg",
          "digitalizacion tecnica1.jpg",
        );
        $array_titulos = array(
          "",
          "Digitalización técnica",
          "Digitalización técnica",


        );
        echo creaListaGaleria($array_imagenes,"imagenes/digitalizacion/");

        $array_imagenes = array(

          "Fotocopiado_digitalización0004.jpg",

        );
        $array_titulos = array(
          "Digitalización de documentación",

        );

        echo creaListaGaleria($array_imagenes,"imagenes/reprografia/bn/",$array_titulos);



	      ?>
	</ul>
</div>
<h3>Aplicaciones</h3>
<ul>
<li>Archivos de documentación histórica o delicada: pergaminos, libros antiguos, manuscritos, etc.</li>
<li>Archivos de Oficinas Técnicas o Administraciones Públicas.</li>
<li>Archivos de obras de estudios de arquitectura e ingeniería.</li>
</ul>
<h3>Ventajas</h3>
<ul>
<li><strong>Comodidad y velocidad</strong> en el manejo de la información.</li>
<li><strong>Portabilidad</strong> total de la información.</li>
<li><strong>Seguridad</strong> en el acceso y disponibilidad de la información.</li>
<li><strong>Compatibilidad</strong> con los principales formatos del mercado.</li>
<li><strong>Integrabilidad</strong> de la información.</li>
<li><strong>Optimización</strong> de flujos de trabajo.</li>
<li><strong>Capacidad ilimitada</strong> de archivo.</li>
</ul>

<a target="_blank" href="pdf/presentación digitalización mores.pdf">
	<div class="pdfdoc"><img alt="ver dossier" src="img/pdf.png"><span>Digitalización en morés</span></div>
</a>
  	</div>
  </div>

  <div class="span3">
    
<?php include "inc/banner-envios.php"; ?>

  </div>
</div>
<?php include "inc/footer.php"; ?>