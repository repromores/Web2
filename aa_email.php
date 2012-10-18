<?php 
 include "inc/config.php"; 

$dir1   = empty($_SESSION["pedido"]["data"]["dir1"])  ? $_SESSION["usr_dir"]    : getEnvio("dir1");
$dir2   = empty($_SESSION["pedido"]["data"]["dir2"])  ? $_SESSION["usr_dir2"]   : getEnvio("dir2");
$nombre = empty($_SESSION["pedido"]["data"]["nombre"])  ? $_SESSION["usr_nombre"] .' '.$_SESSION["usr_apellidos"]     : getEnvio("nombre");
$ape    = $_SESSION["usr_apellidos"];
$tele   = empty($_SESSION["pedido"]["data"]["tele"])  ? $_SESSION["usr_telefono"] : getEnvio("tele");
$pobl   = empty($_SESSION["pedido"]["data"]["pobl"])  ? $_SESSION["usr_pob"]    : getEnvio("pobl");
$prov   = empty($_SESSION["pedido"]["data"]["prov"])  ? $_SESSION["usr_prov"]   : getEnvio("prov");
$cp     = empty($_SESSION["pedido"]["data"]["cp"])    ? $_SESSION["usr_cp"]     : getEnvio("cp");




  $metodo = getMetodoEnvio();
  if($metodo == "mensajero"){
    $envio = getEnvio("envi");
    $campoEnvio = '
    <p>'.getEnvio("nombre").'</br>
       '.getEnvio("dir1").'</br>
       '.getEnvio("dir2").'</br>
       '.getEnvio("cp").' - '.getEnvio("pobl").', '.getEnvio("prov").'</br>
    </p>
    <p>'.getEnvio("tele").'</p>
    ';
  } else {
    $envio = "en tienda";
    switch(getEnvio("ciudad")) {
        case "oviedo": 
            $text = 'Viaducto Ingeniero Marquina, 7 <a  href="https://maps.google.com/maps/ms?msa=0&amp;msid=201196282089870687635.0004b75b2be933103a9c6&amp;ie=UTF8&amp;t=m&amp;ll=43.36557,-5.854683&amp;spn=0.003744,0.006866&amp;z=17&amp;output=embed" class="mapa fancybox.iframe"><img alt="mapa" src="http://mores.es/img/mini-map.png"></a>';
            break;
        case "gijon":
            $text = 'Marqués de San Esteban, 4 <a  href="https://maps.google.com/maps/ms?msa=0&amp;msid=201196282089870687635.0004b757bcf20a3142950&amp;ie=UTF8&amp;t=m&amp;ll=43.543369,-5.665458&amp;spn=0.001866,0.003433&amp;z=18&amp;output=embed" class="mapa fancybox.iframe"><img alt="mapa" src="http://mores.es/img/mini-map.png"></a>';
            break;
        case "llanera":
            $text = 'Parque Tecnológico de Asturias, Parcela 2  <a  href="https://maps.google.com/maps/ms?msa=0&amp;msid=201196282089870687635.0004b75b98445621f8827&amp;ie=UTF8&amp;t=m&amp;ll=43.425567,-5.823414&amp;spn=0.00187,0.003433&amp;z=18&amp;output=embed" class="mapa fancybox.iframe"><img alt="mapa" src="http://mores.es/img/mini-map.png"></a>';
            break;
    }


    $campoEnvio = '
    <p>'.getEnvio("nombre").'</p>
    <p>A recoger en:</br>
    '. $text.'
    </p>
    ';
  }

$td_style="padding: 8px;line-height: 16px;text-align: left;vertical-align: top;border-top: 1px solid #dddddd;";



echo $str;