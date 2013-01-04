<?php include "inc/config.php"; ?>
<div class="span10">
  	<div class="content">

<h2>Calculadora de imágenes</h2>

<p>Para asegurar el mejor resultado, recomendamos usar imágenes de no menos de 200ppi(pixeles por pulgada) o 78 pixeles por cm</p>
<p>Para saber si una imagen es apta introduzca sus medidas (en píxeles) y luego el tamaño en cm en el que desea imprimir</p>
     <form  class="form-horizontal"> 

      <div class="control-group">
        <label class="control-label" >Tipo de uso:</label>
        <div class="controls">
            <div class="btn-group grupotipo" data-toggle="buttons-radio" data-tipo="cartel">
              <button type="button" class="btn tipoarchivo active" data-tipo="cartel">Cartelería</button>
              <button type="button" class="btn tipoarchivo" data-tipo="impresion">Impresión digital</button>
            </div>
        </div>
      </div>

      <div class="control-group">
        <label class="control-label" >Tamaños:</label>
        <div class="controls">
          <input type="text" class="campo px1 span1"></input> px x <input type="text" class="campo px2 span1"></input> px (tamaño en px de la imagen a imprimir)</br>
          <input type="text" class="campo cm1 span1"></input> cm x <input type="text" class="campo cm2 span1"></input> cm (tamaño en el que la imagen se imprimiría)
        </div>
      </div>


      <div class="control-group">
        <label class="control-label" >Resolución:</label>
        <div class="controls">
        	<span class="resultado"></span>
        </div>
      </div>
</form>
		
  	</div>
  </div>
  <script>
  
var calculadora = {
  init: function(){
    Calculadora       = this;
    Calculadora.campos    = $(".campo");
    Calculadora.cm1     = $(".cm1");
    Calculadora.cm2     = $(".cm2");
    Calculadora.px1     = $(".px1");
    Calculadora.px2     = $(".px2");
    Calculadora.resp    = $(".resultado");
    Calculadora.tipo    = $(".tipoarchivo");
    Calculadora.grupotipo = $(".grupotipo");

    Calculadora.eventlistener();

  },
  eventlistener : function(){
    Calculadora.campos.on("change", Calculadora.calculappi);
    Calculadora.campos.on("keyup", Calculadora.calculappi);
    Calculadora.tipo.on("click", Calculadora.changeTipo);
  },
  changeTipo : function(){
    $this = $(this);
    
    Calculadora.grupotipo.data("tipo",$this.data("tipo"));
    Calculadora.calculappi();
  },
  calculappi : function(){
    vacio = 0;

    Calculadora.campos.each(function(){
      error = 0;
      if($(this).val()== "" || $(this).val()== 0){error++;}
    })
    if(error == 0){
      a = Calculadora.cmToPpi(Calculadora.cm1.val(),Calculadora.px1.val());
      b = Calculadora.cmToPpi(Calculadora.cm2.val(),Calculadora.px2.val());
      respuesta = a < b? a : b;
      Calculadora.publicarRespuesta(respuesta);
    }else{
      respuesta = "error "+error;
    }
    return respuesta;
  },
  cmToPpi : function(cm,px){
    return px/cm*2.54;
  },
  publicarRespuesta : function(respuesta){
    tipo = Calculadora.grupotipo.data("tipo");

    if(tipo == "cartel"){
      if(respuesta > 100){
        clase = "buenacalidad";
        texto = Math.round(respuesta)+"ppi - La calidad de la imagen es óptima";
      }else if(respuesta >80){
        clase = "calidadregular";
        texto = Math.round(respuesta)+"ppi - La calidad de la imagen es ajustada";
      }else{
        clase = "malacalidad";
        texto = Math.round(respuesta)+"ppi - La calidad de la imagen no llega a la resolución mínima";
      }
    }else{
      if(respuesta > 199){
        clase = "buenacalidad";
        texto = Math.round(respuesta)+"ppi - La calidad de la imagen es buena";
      }else if(respuesta >150){
        clase = "calidadregular";
        texto = Math.round(respuesta)+"ppi - La calidad de la imagen es ajustada";
      }else{
        clase = "malacalidad";
        texto = Math.round(respuesta)+"ppi - La calidad de la imagen no llega a la resolución mínima";
      }     
    }
    Calculadora.resp.text(texto).removeClass("buenacalidad").removeClass("calidadregular").removeClass("malacalidad").addClass(clase);
  }
}
calculadora.init();  

  </script>