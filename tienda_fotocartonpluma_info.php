<?php include "inc/config.php"; ?>
<?php include "inc/head.php"; ?>
<title>Foto en cartón pluma</title>
<?php
  $producto = "fotocartonpluma";
  // $h1text : variable para fijar el H1 en cada pagina para hacerlo único y aprovechar mejor el SEO
  $h1text = "Foto en cartón pluma";
  
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

        $precios[$i]["bastidor"] = $fila2["perfil_aluminio"];
        $precios[$i]["chupetes"] = $fila2["perfil_aluminio"];

        $i++;
      }
    }
  }
?>
<?php include "inc/menu.php"; ?>

  <div class="span10">
    <div class="content  tiendainfo">

      <h2>Foto en cartón pluma</h2>

    <ul class="breadcrumb">
      <li><a href="index.php">Inicio</a> <span class="divider">/</span></li>
      <li><a href="tienda.php">Tienda</a> <span class="divider">/</span></li>
      <li class="active">Foto en cartón pluma</li>
    </ul>   

      <div class="row">
        
        <div class="span5">
          <a href="imagenes/online/_MG_6249.jpg" data-fancybox-group="items" class="fancybox"><img src="imagenes/online/_MG_6249.jpg" class="img-polaroid" alt="dibond"></a>
          <div class="row margint20">
            <div class="span1"><a href="imagenes/online/_MG_6267.jpg" data-fancybox-group="items" class="fancybox"><img src="imagenes/online/_MG_6267.jpg" class="img-polaroid " alt="dibond detalle"></a></div>
            <div class="span1"><a href="imagenes/online/_MG_6277.jpg" data-fancybox-group="items" class="fancybox"><img src="imagenes/online/_MG_6277.jpg" class="img-polaroid " alt="dibond detalle"></a></div>
          </div>
          

        </div>
        <div class="span5">
          <ul>
            <li>Imprime las fotos que desees en nuestro material 100% fotográfico montado sobre cartonpluma.</li>
            <li>Estos materiales consiguen un acabado de altísima calidad, inigualables en el mercado.</li>
            <li>Puedes elegir entre un acabado brillo o mate.</li>
            <li>Elige entre los diferentes colores de marco de aluminio que mejor se adapte a tu foto.</li>
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
        <a href="tienda_fotocartonpluma.php" class="btn btn-primary pull-right"><i class="icon-shopping-cart icon-white"></i> Hacer pedido</a>
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