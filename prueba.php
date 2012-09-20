<?php include "inc/config.php"; ?>
<?php 
function ieversion() {
  ereg('MSIE ([0-9].[0-9])',$_SERVER['HTTP_USER_AGENT'],$reg);
  if(!isset($reg[1])) {
    return -1;
  } else {
    return floatval($reg[1]);
  }
}
echo ieversion();
?>