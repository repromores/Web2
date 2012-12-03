<?php
$folder = "/var/www/internet/envios/mores/problematicos/";


    if (file_exists($folder . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      $result = move_uploaded_file($_FILES["file"]["tmp_name"], $folder . $_FILES["file"]["name"]);
        if($result){
          echo "archivo subido correctamente";
        }
      }

?>