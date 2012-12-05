<?php include "inc/config.php"; ?>
<?php
  if(!isLogged()){  header('Location: login2.php?goto=compras_cliente_verpedidos.php');};
  $masdatos = empty($_SESSION["usr_apellidos"])? true : false;
?>
<?php include "inc/head.php"; ?>
<title>morés - Ver pedidos</title>
<?php
  // $h1text : variable para fijar el H1 en cada pagina para hacerlo único y aprovechar mejor el SEO
  $h1text = "Pedidos realizados - morés";
  

 ?>
<?php include "inc/menu.php"; ?>

  <div class="span10">
   <div class="content  tiendainfo">
      <h2>Tus pedidos</h2>



      <table class="table">
        <thead>
          <th>Id de pedido</th>
          <th>Fecha</th>
          <th>Entrega</th>
          <th>Estado</th>
          <th>Precio</th>
        </thead>
        <?php echo getPedidosOfUser($_SESSION["usr_email"]); ?>
      </table>

    </div>
  </div>

  <div class="span3">
    
<?php include "inc/banner-envios.php"; ?>

  </div>
</div>
<?php include "inc/footer.php"; ?>