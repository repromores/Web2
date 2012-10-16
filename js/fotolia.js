$('#vinilosform').ajaxForm({
	dataType : "json",
	//target: 	'.resultados',
	beforeSubmit : function(){
		$("#vinilos-submit").text("Buscando");
	},
	success : function(data){
		$("#vinilos-submit").text("Buscar");
		$(".paginacion").show();
		resultados.checkRes(data);
	}
}); 

var resultados = {
	init : function(){
		Resultados 				= this;
		Resultados.target 		= ".resultados";
		Resultados.Cabecera		= "<br><br><legend>{{nres}} Resultados:</legend>";
		Resultados.plantilla 	= '<li class="item"><div class="box" data-id="{{id}}"><img src="{{imgsrc}}" data-id="{{id}}" title="{{title}}" alt="{{title}}"/></div></li>';
		
		Resultados.pag 			= ".paginacion";
		Resultados.aceptBt		= ".imgbtn";
		Resultados.pagValue		= "#min";
		Resultados.selectTd		= "div.muestra-imagen tr";
		Resultados.btncerrar	= ".btn-cancelar";
		Resultados.customsize	= ".i-custom";

		Resultados.eventListener();

		$(Resultados.pagValue).val(0);
	},

	eventListener : function(){
		$(Resultados.target).on("click",".box", Resultados.getBorrador);
		$("body").on("click",Resultados.aceptBt, Resultados.selectImg);
		$(Resultados.pag).on("click",".pag", Resultados.paginacion);
		$("body").on("click", Resultados.selectTd, Resultados.selectSize);
		$("body").on("click", Resultados.btncerrar, Resultados.cerrarPopup);
		$("body").on("change", Resultados.customsize, Resultados.actualizarPrecioVinilo);
	},

	actualizarPrecioVinilo : function(){
		error = 0;
		$esto = $(this);
		valor = $esto.val();
		datos = $(".custom-data");

		if($esto.hasClass("i-ancho")){
			ancho = valor;
			lado = "ancho";
			if(valor > datos.data("wmax")){
				error++;
			}

		}else{
			alto = valor;
			lado = "alto";
			if(valor > datos.data("hmax")){
				error++;
			}
		}
		if(isNaN(valor)){
			error++;
		}
		if(error == 0){
			if(lado == "ancho"){
				prop = datos.data("hmax")/datos.data("wmax");
				alto = Math.round(valor*prop);
			}else{
				prop = datos.data("wmax")/datos.data("hmax");
				ancho = Math.round(valor*prop);
			}
			$(".i-ancho").val(ancho);
			$(".i-alto").val(alto);

		}else{
			$(".i-ancho").val(datos.data("wmax"));
			$(".i-alto").val(datos.data("hmax"));
			ancho = datos.data("wmax");
			alto = datos.data("hmax");
			msj.show("Tamaño demasiado grande","error");			

		}
		$(".custom-data").parent("tr").data("h",alto);
		$(".custom-data").parent("tr").data("w",ancho);

		$(".custom-data").data("h",alto);
		$(".custom-data").data("w",ancho);


		Resultados.calculaPrecioVinilo(ancho,alto,datos.data("tipo"));
	},

	calculaPrecioVinilo : function(an,al,tipo){
		$.post("inc/compras_procesa_cambios.php?f=getpreciovinilo",{ancho:an,alto:al,tipo:tipo},function(data){
			$(".precioperso").text(data);
		})
	},

	checkRes : function(data){
		resp = '';
		loop = 32;
		nresultados = parseInt(data.nb_results);
		
		resp += Resultados.Cabecera.replace(/{{nres}}/g,nresultados); 
		if(nresultados < 32){
			loop = nresultados;
		}
		if(nresultados > 0){
			for(i = 0; i < loop; i++){
				item 	= "";
				id		= data[i].id;
				title	= data[i].title;
				imgsrc	= data[i].thumbnail_url;

				item = Resultados.plantilla.replace(/{{title}}/g,title); 
				item = item.replace(/{{imgsrc}}/g,imgsrc);
				item = item.replace(/{{id}}/g,id);

				resp += item;
			}
		}else{
			resp = "<br><br><br><p>No hay resultados, prueba otra vez!</p><br><br><br>";
		}
		Resultados.publicarRes(resp);
	},

	publicarRes: function(res){
		$(Resultados.target).html(res);
		Resultados.markSelected();
	},

	getBorrador : function(){
		id = $(this).data("id");

		url = "muestra-imagen.php?id="+id;

			$.fancybox.open([{
		            href : url
		        }],{
		        	type : "ajax"
		        }
		    );
		
	},
	paginacion : function(e){
		e.preventDefault();
		$this = $(this);
		if($this.hasClass("palante")){
			$(Resultados.pagValue).val(parseInt($(Resultados.pagValue).val())+32);
			$(".patras").removeAttr("disabled");
		}else{
			min = parseInt($(Resultados.pagValue).val())-32;
			$(Resultados.pagValue).val(min);
			if(min == 0){
				$this.attr("disabled", "disabled");
			}
		}
		$("#vinilosform").submit();
	},

/*	selectImg : function(){
		$this 	= $(this);
		idfoto 	= $this.data("id");
		size 	= $("#imgsize").val();
		

		if($this.hasClass("selected")){
			selected = JSON.parse(sessionStorage.getItem("vinilosSelected"));
			var idx = selected.indexOf(idfoto); 
			if(idx!=-1) selected.splice(idx, 1);

		}else{
			(sessionStorage.getItem("vinilosSelected") == null)? selected =  new Array() : selected = JSON.parse(sessionStorage.getItem("vinilosSelected"));
			selected.push(idfoto); 
		}
		Resultados.applySelectedStyling($this);
		sessionStorage.setItem("vinilosSelected", JSON.stringify(selected));
	},
*/
	selectImg : function(){
		datos = $(".custom-data");
		info = {};

		console.log("clicked");

		info["id"] = 		datos.data("id");
		info["tipo"] = 		datos.data("tipo");
		info["titulo"] = 	datos.data("titulo");
		info["material"] = 	datos.data("material");
		info["h"] = 		datos.data("h");
		info["w"] = 		datos.data("w");
		info["ref"] = 		"ref: "+datos.data("id");
		info["info"] = 		"";

		//params = JSON.stringify(info);
		if(info["w"] !="" || info["h"] !=""){
			$.getJSON("inc/compras_procesa_cambios.php?f=agregaproducto",info, function(data){
				if(data.ok){
					Resultados.cerrarPopup();
					msj.show("Producto añadido al carrito");
					$(".banner-carrito").show();
				}
			});
		}else{
			msj.show("Selecciona un tamaño para tu vinilo","error");
		}
	},

	markSelected : function(){
		if(sessionStorage.getItem("vinilosSelected") != null){
			selected = JSON.parse(sessionStorage.getItem("vinilosSelected"));
			$(".box").each(function(){
				$this = $(this);
				idfoto = $this.data("id");
				if( $.inArray(idfoto,selected) > -1){
					Resultados.applySelectedStyling($this.find("button"));
				}
			});
		}
	},
	applySelectedStyling : function(boton){
		boton.hasClass("selected")? text = "Seleccionar" : text = "Seleccionado";
		boton.text(text);
		boton.toggleClass("selected");
		boton.parent(".box").toggleClass("selected-box");
	},

	selectSize : function(){
		$this = $(this);
		$(".custom-data").data("h",$this.data("h"));
		$(".custom-data").data("w",$this.data("w"));
		Resultados.applyTdStyling($this);

	},
	applyTdStyling : function($td){
		$(Resultados.selectTd).removeClass("selected");
		$td.addClass("selected");
	},

	cerrarPopup  : function(){
		$.fancybox.close();
	}

};
resultados.init();

  
