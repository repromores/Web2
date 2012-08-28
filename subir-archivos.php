<?php include "inc/config.php"; ?>
<?php
  if(!isLogged()){  header('Location: login.php');};
?>
<?php include "inc/head.php"; ?>
<title>morés - Envío de Archivos</title>
<?php
  // $h1text : variable para fijar el H1 en cada pagina para hacerlo único y aprovechar mejor el SEO
  $h1text = "Envío de Archivos - morés";
 ?>
<?php include "inc/menu.php"; ?>

  <div class="span10">
  	<div class="content">

      <legend>Modificar datos de usuario</legend>
      <p> Si desea modificar sus datos almacenados en el Sistema de Envios de Morés, por favor pulse el botón siguiente:</p>
      <a class="btn" href="editar-usuario.php">Modificar datos</a>

      <legend>Subida de archivos</legend>
      <p> Elija los archivos que quiera subir, la sección donde realizar el trabajo y una descripción de lo que desea hacer. </p>

      <form class="form-horizontal" id="archivos" action="inc/procesar-envio.php" method="post">
        <fieldset>
          <input type="hidden" name="archivossubidos" id="archivossubidos">
          
          <div class="control-group">
            <label for="seccion" class="control-label">Sección:</label>
            <div class="controls">          
              <select id="seccion" name="seccion">
                <option value="reprografia">Reprografía</option>
                <option value="carteleria">Cartelería</option>
                <option value="impresion-digital">Impresión Digital</option>
                
                <option value="planos">Planos</option>
                <option value="fotografia">Fotografía Digital</option>
                
              </select>
            </div>
          </div>
          
          <div class="control-group">
            <label for="ciudadRecogida" class="control-label">Centro de recogida:</label>
            <div class="controls">
              <select name="ciudadRecogida" style="display: block; width: 150px;" id="ciudadRecogida">
                <option value="0">Elige centro</option>
                <option value="oviedo">Oviedo</option>
                <option value="gijon">Gijón</option>
                <option value="llanera">Llanera</option>
              </select>
            </div>
          </div>

          <div class="control-group">
            <label for="presupuesto" class="control-label">Nº Presupuesto:</label>
            <div class="controls">
              <input size="30" id="presupuesto" name="presupuesto">
              <span class="help-inline">(Si lo tiene)</span>
            </div>
          </div>

          <div class="control-group">
            <label for="descripcion" class="control-label"> Descripción del trabajo:</label>
            <div class="controls">
          <textarea rows="5" class="span7" name="descripcion"></textarea>
            </div>
          </div>


              <div id="uploader">
                <p>Su navegador no es compatible con el sistema de envíos.</p>
              </div>

              <ul>
                <li>Puede subir hasta 10 archivos como máximo 1GB por archivo.</li>
                <li>Recomendamos subir los archivos comprimidos en zip o rar.</li>
              </ul>
            

            <div class="form-actions">
              <button class="btn btn-primary btnsubmit" type="submit">Enviar</button>
              <div class="mensaje-error">Corrige los campos en rojo</div>
              <div class="mensaje-exito"></div>
          </div>
        </fieldset>
      </form>


  	</div>
  </div>

  <div class="span3">
    
<?php include "inc/banner-envios.php"; ?>

  </div>
</div>
<?php include "inc/footer.php"; ?>