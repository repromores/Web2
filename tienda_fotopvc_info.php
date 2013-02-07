<?php include "inc/config.php"; ?>
<?php include "inc/head.php"; ?>
<title>Foto en PVC</title>
<?php
  $producto = "fotopvc";
  // $h1text : variable para fijar el H1 en cada pagina para hacerlo único y aprovechar mejor el SEO
  $h1text = "Foto en PVC";
  



$q = mysql_query("SELECT * FROM t_producto_cuadro WHERE producto='".$producto."'");
  $fila = mysql_fetch_assoc($q);  

  $precios = array();
  $i = 0;

  foreach ($fila as $nombre => $valor) {
    if($nombre[0] == "m"){
      if($valor !== null){
        $medida = substr( $nombre, 1);
        $precios[$i]["medida"]= $medida;
        $precios[$i]["precio"]= $valor;

        $q2 = mysql_query("SELECT * FROM t_producto_montaje WHERE producto='".$nombre."'");
        $fila2 = mysql_fetch_assoc($q2);  

        $precios[$i]["bastidor"] = $fila2["bastidor"];
        $precios[$i]["chupetes"] = $fila2["chupetes"];

        $i++;
      }
    }
  }
  $tablaprecios = "";

?>
<?php include "inc/menu.php"; ?>

  <div class="span10">
    <div class="content tiendainfo">

      <h2>Foto en PVC </h2>

    <ul class="breadcrumb">
      <li><a href="index.php">Inicio</a> <span class="divider">/</span></li>
      <li><a href="tienda.php">Tienda</a> <span class="divider">/</span></li>
      <li class="active">Foto en PVC</li>
    </ul>

       <div class="row">
        
        <div class="span5">
          <a href="imagenes/online/_MG_6245.jpg" data-fancybox-group="items" class="fancybox"><img src="imagenes/online/_MG_6245.jpg" class="img-polaroid" alt="dibond"></a>
          <div class="row margint20">
            <div class="span1"><a href="imagenes/online/_MG_6268.jpg" data-fancybox-group="items" class="fancybox"><img src="imagenes/online/_MG_6268.jpg" class="img-polaroid " alt="dibond detalle"></a></div>
            <div class="span1"><a href="imagenes/online/_MG_6263.jpg" data-fancybox-group="items" class="fancybox"><img src="imagenes/online/_MG_6263.jpg" class="img-polaroid " alt="dibond detalle"></a></div>
            <div class="span1"><a href="imagenes/online/CHUPETE_MACHO2.jpg" data-fancybox-group="items" class="fancybox"><img src="imagenes/online/CHUPETE_MACHO2.jpg" class="img-polaroid " alt="dibond detalle"></a></div>
          </div>
          

        </div>
        <div class="span5">
          <ul>
            <li>Imprime las fotos que desees en nuestro material 100% fotografico montado sobre PVC espumado.</li>
            <li>Estos materiales consiguen un acabado de altísima calidad, inigualables en el mercado.</li>
            <li>Puedes elegir entre un acabado brillo o mate.</li>
            <li>Elige entre los dos metodos de sujección a la pared (bastidor o chupetes).</li>


            <table name="" class="table table-striped tabla-precios">
              <tr>
                <th>Tamaño en cm</th>
                <th>Precio</th>
              </tr>
  <?php           
  foreach ($precios as $precio) {
    $valor = conIVA((float)$precio["precio"]+(float)$precio["chupetes"]) . " €";
    echo '    <tr>
                <td>'.$precio["medida"].'</td>
                <td>'.$valor.'</td>
              </tr>';
  }
  ?>
            </table>
          </ul>
        </div>
      </div>
      


      <div class="row margint20">
      <div class="span10">
        <div class="well">
        <a href="tienda.php" class="btn">Volver</a>
        <a href="tienda_fotopvc.php" class="btn btn-primary pull-right"><i class="icon-shopping-cart icon-white"></i> Hacer pedido</a>
      </div>
      </div>
    </div>
      

    </div>
  </div>

  <div class="span3">
    
<?php include "inc/banner-envios.php"; ?>

  </div>
</div>
<?php include "inc/footer.php"; ?>
