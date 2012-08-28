<?php include "inc/config.php"; ?>
<?php include "inc/head.php"; ?>
<title>morés - Envío de Archivos de Morés</title>
<?php
  // $h1text : variable para fijar el H1 en cada pagina para hacerlo único y aprovechar mejor el SEO
  $h1text = "Envío de Archivos de Morés - morés";
 ?>
<?php include "inc/menu.php"; ?>

  <div class="span10">
  	<div class="content">

      <h2>Sistema de Envío de Archivos de Morés</h2>
      <p>
        Bienvenido al sistema de envío de archivos donde podrá realizar pedidos a las distintas secciones que existen en Morés.
        <br>
        Si tiene una <u><b>cuenta de usuario del anterior Sistema de Envíos</b></u> puede conectarse con esos datos.
        <br>
        También podrá establecer y modificar sus datos personales
        para agilizar la realización de sus trabajos.
      </p>   <br>
<?php if(isset($_GET["new"])&& $_GET["new"]==1){ ?>
    <div class="alert alert-success">
      <p>¡Usuario creado correctamente! logueate para enviar tus archivos</p>
    </div>
<?php } ?>

<?php if(isset($_GET["edit"])&& $_GET["edit"]==1){ ?>
    <div class="alert alert-success">
      <p>¡Usuario modificado correctamente! logueate de nuevo</p>
    </div>
<?php } ?>

<?php if(isset($_GET["error"])){ ?>
    <div class="alert alert-error">
      <p>¡Usuario o contraseña incorrecta</p>
    </div>
<?php } ?>


      <div class="row">
        <div class="span5">
          <legend>Administración de Usuarios</legend>
          <div class="well">
            <a href="nuevo-usuario.php" class="btn">Crear Nuevo Usuario</a>
            <br><br>
            <a href="#" class="btn recuperapassbtn">Recuperar contraseña</a>
            <div class="recuperapassdiv">
              <br><br>
              <p>Recibirás tu centraseña en el email.</p>
              <form class="form" method="post" id="recuperapassfrm" action="inc/reset-pass.php">
                <fieldset>
                  <div class="control-group">
                  <label class="control-label" for="emailreset">Email:</label>
                    <div class="controls">
                    <input type="text" class="input" name="emailreset" id="emailreset">
                    </div>
                  </div>
                  <div class="form-actions">
                    <button class="btn btn-primary" type="submit">Enviar</button>
                    <button class="btn recuperapasscnl">Cancelar</button>
                    <img class="loading-reset" src="img/loading-mini.gif">
                    <div class="recuperapassmsg"></div>
                  </div>
                </fieldset>
              </form>
            </div>
          </div>
        </div>
        <div class="span5">
          <legend>Sistema de Envíos de Morés</legend>
          <form class="well" action="inc/login-entrar.php" method="post">
            <label>Email:</label>
            <input type="email" class="span3" name="user" id="user" placeholder="email">
            <label>Contraseña:</label>
            <input type="password" class="span3" name="pass" id="pass" placeholder="Contraseña"> 
            <br>           
            <button type="submit" class="btn">Enviar</button>
          </form>
        </div>
      </div>

  	</div>
  </div>

  <div class="span3">
    
<?php include "inc/banner-envios.php"; ?>

  </div>
</div>
<?php include "inc/footer.php"; ?>