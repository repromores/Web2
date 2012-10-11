   <footer class="footer">
       <div class="links">
           <ul>
               <li><a href="index.php">© Morés 2012</a></li>
               <li><a href="aviso-legal.php">Aviso Legal</a></li>
               <li><a href="politica-privacidad.php">Política de Privacidad</a></li>
               <li><a href="cadena-custodia.php">Cadena de Custodia</a></li>
               <li><a href="mapa-web.php">Mapa Web</a></li>
           </ul>
       </div>
   </footer>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="js/bootstrap-transition.js"></script>
    <script src="js/bootstrap-alert.js"></script>
    <script src="js/bootstrap-modal.js"></script>
    <script src="js/bootstrap-dropdown.js"></script>
    <script src="js/bootstrap-scrollspy.js"></script>
    <script src="js/bootstrap-tab.js"></script>
    <script src="js/bootstrap-tooltip.js"></script>
    <script src="js/bootstrap-popover.js"></script>
    <script src="js/bootstrap-button.js"></script>
    <script src="js/bootstrap-collapse.js"></script>
    <script src="js/bootstrap-carousel.js"></script>
    <script src="js/bootstrap-typeahead.js"></script>
    

    <script src="js/fancybox/jquery.mousewheel-3.0.6.pack.js"></script>

    <!-- Add fancyBox -->
    <link href="js/fancybox/jquery.fancybox.css?v=2.0.7"  rel="stylesheet"/>
    <script type="text/javascript" src="js/fancybox/jquery.fancybox.pack.js?v=2.0.6"></script>

    <script src="js/jquery.form.js"></script>
    <script src="js/jquery-ui-min.js"></script>

    <link href="less/jquery.plupload.queue.css" rel="stylesheet">  

    <script type="text/javascript" src="js/plupload/plupload.full.js"></script>
    <script src="js/plupload/jquery.plupload.queue/jquery.plupload.queue.js"></script>
    <script src="js/plupload/i18n/es.js"></script>
    <?php 
    if(!$mantenimiento){
      include "js/analytics.php";
    } ?>
    <script src="js/jquery.touchwipe.min.js"></script>

    <link href="js/jquery-ui/custom-theme/jquery-ui-1.8.23.custom.css"  rel="stylesheet"/>
    <script src="js/jquery-ui/jquery-ui-1.8.23.custom.min.js"></script> 

    <script src="js/navegacion.js"></script> 
    <script src="js/compras.js"></script> 


  <?php if(!empty($vinilos)){ ?>
    <script src="js/fotolia.js"></script>
  <?php } ?>

<?php
//<script type="text/javascript" src="http://localhost/clickheat/js/clickheat.js"></script><noscript><p><a href="http://www.dugwood.com/index.html">Heatmap plugin</a></p></noscript><script type="text/javascript"><!--
//clickHeatSite = 'localhost1';clickHeatGroup = 'localhost';clickHeatServer = 'http://localhost/clickheat/click.php';initClickHeat(); //-->
//</script>
?>  
  </body>
</html> 