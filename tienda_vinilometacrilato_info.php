<?php include "inc/config.php"; ?>
<?php include "inc/head.php"; ?>
<title>Vinilo en metacrilato</title>
<?php
  $producto = "vinilometacrilato";
  // $h1text : variable para fijar el H1 en cada pagina para hacerlo único y aprovechar mejor el SEO
  $h1text = "Vinilo en metacrilato";
  

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
?>
<?php include "inc/menu.php"; ?>

  <div class="span10">
    <div class="content  tiendainfo">

      <h2>Vinilo en metacrilato</h2>
    <ul class="breadcrumb">
      <li><a href="index.php">Inicio</a> <span class="divider">/</span></li>
      <li><a href="tienda.php">Tienda</a> <span class="divider">/</span></li>
      <li class="active">Vinilo en metacrilato</li>
    </ul>

      <div class="row">
        
        <div class="span5">
          <a href="imagenes/online/_MG_6247.jpg" data-fancybox-group="items" class="fancybox"><img src="imagenes/online/_MG_6247.jpg" class="img-polaroid" alt="dibond"></a>
          <div class="row margint20">
            <div class="span1"><a href="imagenes/online/_MG_6270.jpg" data-fancybox-group="items" class="fancybox"><img src="imagenes/online/_MG_6270.jpg" class="img-polaroid " alt="dibond detalle"></a></div>
            <div class="span1"><a href="imagenes/online/_MG_6263.jpg" data-fancybox-group="items" class="fancybox"><img src="imagenes/online/_MG_6263.jpg" class="img-polaroid " alt="dibond detalle"></a></div>
            <div class="span1"><a href="imagenes/online/CHUPETE_MACHO2.jpg" data-fancybox-group="items" class="fancybox"><img src="imagenes/online/CHUPETE_MACHO2.jpg" class="img-polaroid " alt="dibond detalle"></a></div>
          </div>
          

        </div>
        <div class="span5">
          <ul>
            <li>Consigue un efecto espectacular en tus fotos montándolas en vinilo metacrilato.  </li>
            <li>Impresos en los mejores materiales y en los plotter de última generación que poseemos.</li>
            <li>En nuestros vinilos utilizamos tintas 100% ecológicas que no emiten olores.</li>
            <li>Puedes elegir entre un acabado brillo o mate.</li>
            <li>El vinilo metacrilato dará un brillo y una profuncdidad a tus fotos que llamarán la atención de todos.</li>
            <li>La foto se adhesiva por detrás del metacrilato para así darle mayor protección.</li>
            <li>Elige entre los dos metodos de sujección a la pared (bastidor o chupetes).</li>
          </ul>

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
        </div>
      </div>
      
      <div class="row margint20">
      <div class="span10">
        <div class="well">
        <a href="tienda.php" class="btn">Volver</a>
        <a href="tienda_vinilometacrilato.php" class="btn btn-primary pull-right"><i class="icon-shopping-cart icon-white"></i> Hacer pedido</a>
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