/* jQuery Tiny Pub/Sub - v0.7 - 10/27/2011
* http://benalman.com/
* Copyright (c) 2011 "Cowboy" Ben Alman; Licensed MIT, GPL */
(function(a){var b=a({});a.subscribe=function(){b.on.apply(b,arguments)},a.unsubscribe=function(){b.off.apply(b,arguments)},a.publish=function(){b.trigger.apply(b,arguments)}})(jQuery);
/*
Navegacion menu lateral
*/
var navLat = {
	init : function(){
		NavLat = this;
		NavLat.$menu = $('.menu-left');
		NavLat.$headers = $(".nav-header");
		NavLat.list = ".menu-list";

		NavLat.initialPosition();
		NavLat.bindEvents();
	},
	bindEvents: function(){
		NavLat.$headers.on("click", NavLat.headerClicked);
	},
	headerClicked : function(a){
		if(typeof a == "object"){
	    	clase = $(this).data("menu");
	    }else{
	    	clase = a;
	    }
	    $(NavLat.list +":not(."+ clase +")").slideUp("fast");
	    $(NavLat.list + "."+clase).slideToggle("fast");
	    localStorage.setItem("menuclicked", clase);
	},
	initialPosition : function(){
		if(navigator.appName != "Microsoft Internet Explorer"){
			item = localStorage.getItem("menuclicked");
			if(item != null){
				NavLat.headerClicked(item);
			}
		}
	}
}
navLat.init();


$(".galeriaitem").fancybox({
    	openEffect	: 'elastic',
    	closeEffect	: 'elastic',
    	preload		: 6,
    	helpers : {
    		title : {
    			type : 'inside'
    		}
    	},
    	afterShow : function(){
    		$(".fancybox-wrap").touchwipe({
			     wipeLeft: function() { $.fancybox.prev(); },
			     wipeRight: function() { $.fancybox.next(); },
			     wipeUp: function() { $.fancybox.prev(); },
			     wipeDown: function() { $.fancybox.next(); },
			     min_move_x: 20,
			     min_move_y: 20,
			     preventDefaultEvents: true
			});
    	}
});

$(".mapa").fancybox({
    	openEffect	: 'elastic',
    	closeEffect	: 'elastic'	
});
$(".video").fancybox({
    	openEffect	: 'elastic',
    	closeEffect	: 'elastic'	
});
$(".fancybox").fancybox({
    	openEffect	: 'elastic',
    	closeEffect	: 'elastic'	
});

var contacto = {
	init : function(){
		Contacto = this;
		Contacto.$form = $(".contacto");
		Contacto.$required = $(".required");
		Contacto.$privacidad = $("#privacidad");
		Contacto.$mensaje = $(".mensaje-error");

		Contacto.bindEvents();
	},
	bindEvents: function(){
		Contacto.$form.on("submit", Contacto.validate);
	},
	validate : function(){
		error = 0;
		Contacto.$required.each(function(index, ele){
			if($.trim($(ele).val()) ==""){
				error++;
				$(ele).parents(".control-group").addClass("error");
			}else{
				$(ele).parents(".control-group").removeClass("error");
			}

		});
		if(Contacto.$privacidad.length >0){
			if(!Contacto.$privacidad.is(":checked")){
				error++;
				Contacto.$privacidad.parents(".controls").addClass("error");
			}
		}

		if(error=="0"){
			Contacto.$mensaje.hide();
			return true;
		}else{
			Contacto.$mensaje.show();
			return false;
		}
	}
};

contacto.init();




//Control de plugins


$('.contacto:not(.redirect)').ajaxForm({
	target: 	'.mensaje-exito',
	clearForm: 	true,
	beforeSubmit : function(){
		$(".btn-primary").button('loading');
	},
	success : function(){
		$(".btn-primary").button('Enviado');
	}
}); 

$('#recuperapassfrm').ajaxForm({
	target: 	'.recuperapassmsg',
	clearForm: 	true,
	beforeSubmit : function(){
		$(".loading-reset").show();
	},
	success : function(){
		$(".loading-reset").hide();
	}

}); 

$('#newsletterform').ajaxForm({
	clearForm: 	true,
	beforeSubmit : function(){
		$(".btn-newsletter").attr("disabled", "true").val("Guardando...");
	},
	success : function(){
		$(".btn-newsletter").val("Guardado!");
	}

});

$(".recuperapassbtn").on("click",function(e){
	e.preventDefault();
	$(".recuperapassdiv").slideToggle();
});
$(".recuperapasscnl").on("click",function(e){
	e.preventDefault();
	$(".recuperapassdiv").slideUp();
});

$(function() {
	if ($("#uploader").length ) {
if($.browser["webkitty"]){
	list = 'flash,html5,gears,silverlight,';

}else{
	list = 'html5,flash,gears,silverlight,';
}

	    $("#uploader").pluploadQueue({
	        // General settings
	        runtimes : list,
	        url : 'inc/subir.php',
	        max_file_size : '1024mb',


	        // Specify what files to browse for
	        filters : [
	            {title : "archivos", extensions : "jpg,gif,png,tiff,tif,bmp,zip,rar,psd,ai,pdf,eps,dwg,plt,cdr,doc,docx,ppt,pptx,ctb,sitx,pub,mxd,log,fh11,fh10,fh9,fh8,mth,indd,EST,AG,psb"}
	        ],
	 
	        // Flash settings
	        flash_swf_url : 'js/plupload/plupload.flash.swf',
	 
	        // Silverlight settings
	        silverlight_xap_url : 'js/plupload/plupload.silverlight.xap',
	        
			
			preinit : {
	            UploadFile: function(up, file) {
	                up.settings.multipart_params = {
	                	"seccion" : $("#seccion").val(),
	                	"ciudadRecogida" : $("#ciudadRecogida").val(),
	                	"email" : $("#email").val()
	                };
	            }
	        }

	    });
	 
	    // Client side form validation
	    $('#archivos').submit(function(e) {
	        var uploader = $('#uploader').pluploadQueue();
	 
	        // Files in queue upload them first
	        if (uploader.files.length > 0) {
	            // When all files are uploaded submit form
	            uploader.bind('StateChanged', function() {
	                if (uploader.files.length === (uploader.total.uploaded + uploader.total.failed)) {
	                	$('.mensaje-exito').text("Por favor, no cierre la página.");
	                    $('#archivos')[0].submit();
	                }
	            });
	                 
			uploader.start();
			} else {
			       alert('No has adjuntado ningún archivo.');
			}
	 
	        return false;
	    });
		
$(".btnsubmit").on("click", function(){
	$(this).text("Enviando...");
	if($.browser["webkit"]){
		$("#archivos").submit();
	}
	$(this).attr("disabled", "disabled");
})

	    $('#uploader').pluploadQueue().bind('FileUploaded', function(up, file, info) {
	    	size = file.size;
	    	$("#infofiles").val($("#infofiles").val() + file.name+"@"+size+"@@@");

			size = size/(1024*1024);
			size = size.toFixed(2);
			input = $("#archivossubidos").val();
	        $("#archivossubidos").val(input + "<li>" + file.name + " (" +size+"MB)</li>");
	   	});

	    $("#seccion").on("change",function(e){
	   		value =$(this).attr('value');

			switch (value){
				case "carteleria":
					newOptions = {
					  "Llanera": "0"
					};
				  break;
				case "fotografia":
					newOptions = {
						"Oviedo": "oviedo",
						"Gijón": "gijon"
					};
				  break;
				case "impresion-digital":
					newOptions = {
						"Oviedo": "oviedo",
						"Gijón": "gijon",
						"Llanera": "llanera"
						//"--": "0"
					};
				  break;
				default :
					newOptions = {
						"Oviedo": "oviedo",
					  	"Gijón": "gijon",
					  	"Llanera": "llanera"
					};
				  break;
				}

			var $el = $("#ciudadRecogida");
			$el.empty();
			$.each(newOptions, function(key, value) {
			  $el.append($("<option></option>")
			     .attr("value", value).text(key));
			});


	   	})
	}
});

$('#tabs').tabs();

var msj = {
	init : function(){
		Msj = this;
		Msj.$container = $("#mensajes");
		Msj.plantilla = '<div class="msg-alert alert alert-{{tipo}}"><button type="button" class="close" data-dismiss="alert">×</button>{{texto}}</div>';
	},
	show : function(mensaje,tipo){
		tipo = (typeof tipo == "undefined")? "success" : tipo;
		cola = (typeof cola == "undefined")? new Array() : cola;

		mens = Msj.plantilla.replace("{{tipo}}", tipo);
		mens = mens.replace("{{texto}}", mensaje);

		$mens = $(mens);
		cola.push($mens);

		$mens.appendTo(Msj.$container);
		$mens.show("bounce",{ distance: 50 },1000);
		setTimeout(function(){
			mensa = cola.shift();
			$mens.hide("drop",500,function(){
				mensa.remove();
			});
		},3500);
	}
}
msj.init();

function SetCookie(cookieName,cookieValue,nDays) {
 var today = new Date();
 var expire = new Date();
 if (nDays==null || nDays==0) nDays=1;
 expire.setTime(today.getTime() + 3600000*24*nDays);
 document.cookie = cookieName+"="+escape(cookieValue)
                 + ";expires="+expire.toGMTString();
}

function ReadCookie(cookieName) {
 var theCookie=" "+document.cookie;
 var ind=theCookie.indexOf(" "+cookieName+"=");
 if (ind==-1) ind=theCookie.indexOf(";"+cookieName+"=");
 if (ind==-1 || cookieName=="") return "";
 var ind1=theCookie.indexOf(";",ind+1);
 if (ind1==-1) ind1=theCookie.length; 
 return unescape(theCookie.substring(ind+cookieName.length+2,ind1));
}

var canvas = {
	init : function(){
		Canvas = this;

		Canvas.checkCanvasSupport();
	},
	isCanvasSupported: function(){
		var elem = document.createElement('canvas');
		resp = !!(elem.getContext && elem.getContext('2d'));
		SetCookie("canvasSuported",resp,2);
 		return resp;
	},
	checkCanvasSupport: function(){
		resp = (ReadCookie("canvasSuported")!= "") ? ReadCookie("canvasSuported") : Canvas.isCanvasSupported();
	}

}
canvas.init();


var uploadtienda = {
	init : function(){
		Uploadtienda = this;
		Uploadtienda.container		= ".uploadertienda";
		Uploadtienda.acabado		= ".btnacabado";
		Uploadtienda.$acabadoinput	= $("#acabado");
		Uploadtienda.montaje		= ".btnmontaje";
		Uploadtienda.$montajeinput	= $("#montaje");
		Uploadtienda.incluyepedido	= ".incluyepedido";
 
		Uploadtienda.loader();		
	},
	loader: function(){
		if($(Uploadtienda.container).length > 0){
			Uploadtienda.initializer();
		}

		$("body").on("click", Uploadtienda.acabado, Uploadtienda.selectAcabado);
		$("body").on("click", Uploadtienda.montaje, Uploadtienda.selectMontaje);
		$("body").on("click", Uploadtienda.incluyepedido, Uploadtienda.incluirpedido);
	},
	initializer: function(){




		 var uploader = new qq.FineUploader({
			element: document.getElementById('bootstrapped-fine-uploader'),
			request: {
				endpoint: 'inc/subir-tienda.php'
			},
			callbacks: {
				onComplete: function (id, fileName, responseJSON) {
					oldval = $("#archivo1").val();
					if(oldval!=""){
						$("#archivo1").val(oldval +", " + fileName)
					}else{
					$("#archivo1").val(fileName);
					}
					$(".incluyepedido").removeAttr("disabled");
				},
			},

			text: {
				uploadButton: '<i class="icon-upload icon-white"></i> Subir archivo'
			},
			template: '<div class="qq-uploader span12">' +
			'<pre class="qq-upload-drop-area span12"><span>{dragZoneText}</span></pre>' +
			'<div class="qq-upload-button btn btn-success">{uploadButtonText}</div>' +
			'<ul class="qq-upload-list" style="margin-top: 10px; text-align: center;"></ul>' +
			'</div>',
			classes: {
				success: 'alert alert-success',
				fail: 'alert alert-error'
			},
			debug: true
			});

	},
	selectAcabado : function(){
		$esto = $(this);
		Uploadtienda.$acabadoinput.val($esto.data("acabado"));
	},
	selectMontaje : function(){
		$esto = $(this);
		Uploadtienda.$montajeinput.val($esto.data("montaje"));
		$(".montajefotos").addClass("hide");
		$(".foto"+$esto.data("montaje")).removeClass("hide");
		pickr.gastoMontaje();
	},
	incluirpedido: function(e){
		e.preventDefault();
		datos = {
			acabado : $("#acabado").val(),
			tableValue : $("#tableValue").val(),
			archivo1 : $(".qq-upload-file").text(),
			w : $("#w").val(),
			h : $("#h").val(),
			montaje : $("#montaje").val(),
			unidades : $("#unidades").val(),
			tipo : $("#tipo").val(),
			titulo : $("#nombre").val(),
			material : $("#material").val(),
			producto : $("#producto").val(),
			categoria : $("#categoria").val(),
			seccion : $("#seccion").val(),
			info : $("#info").val()

		};
		$.getJSON("inc/compras_procesa_cambios.php?f=agregaproducto",datos,function(data){
			if(data.ok){
				window.location = "compras_carrito.php";
			}
		})
	}
}
uploadtienda.init();

var pickr = {
	init: function(){
		Pickr 					= this;
		Pickr.target 			= $("#tableValue");
		Pickr.tabla 			= $("#tablaPickr");
		Pickr.filatabla			= $("#tablaPickr tbody tr");
		Pickr.filatablaselected	= $("#tablaPickr tbody tr.selected");
		Pickr.montaje			= $(".montaje");

		Pickr.eventlistener();
	},
	eventlistener: function(){
		Pickr.filatabla.on("click", Pickr.selectFila);
	},
	selectFila: function(){
		$fila = $(this);
		if($(".idigital").length>0){
			unidades = $fila.data("unidades");
			t = unidades.split("m");
			$("#unidades").val(t[1]);
		}else{
			medida = $fila.data("medida");
			Pickr.target.val(medida);
			t1 = medida.split("m");
			t2 = t1[1].split("x");
			w = t2[0];
			h = t2[1];
			$("#w").val(w);
			$("#h").val(h);			
		}


		Pickr.filatabla.removeClass("selected");
		$fila.addClass("selected");	
		Pickr.tabla.data("total",$fila.data("precio"));
		Pickr.gastoMontaje();

	},
	gastoMontaje: function(){
		$fila = $("#tablaPickr tbody tr.selected");
		if($(".idigital").length == 0){
			if($fila.length == 0){
				Pickr.montaje.text("Elige un tamaño de la tabla");
			}else{
				pasta = $fila.data(uploadtienda.$montajeinput.val());
				Pickr.montaje.text(pasta+" €");
				Pickr.montaje.data("totalmontaje",pasta);
				Pickr.outputtotal();
			}
		}else{
			Pickr.outputtotal();
		}
	},
	outputtotal: function(){
		if (typeof pickr.tabla.data("total") != 'undefined'){
			if(Pickr.montaje.length > 0){
				total = pickr.tabla.data("total")+pickr.montaje.data("totalmontaje");
			}else{
				total = pickr.tabla.data("total");
			}
			$(".outputtotal").text(total.toFixed(2) + "€").show();
		}
	}
};
pickr.init();

calendarios = {
	init: function(){
		Calendarios 			= this;
		Calendarios.$datos		= $("#unidades");
		Calendarios.$resultado	= $(".outputtotal");
		
		Calendarios.eventlistener();
	},
	eventlistener: function(){
		Calendarios.$datos.on("keyup", Calendarios.calculaPrecio);
		Calendarios.$datos.on("change", Calendarios.calculaPrecio);
	},
	calculaPrecio: function(){
		console.log("escrito");
		unidades = Calendarios.$datos.val();
		if(!isNaN(unidades)){
			tarifa = unidades > 25? Calendarios.$datos.data("u26") : Calendarios.$datos.data("u25");
			total = tarifa * unidades +  Calendarios.$datos.data("composicion");
			$(".outputtotal").text(total.toFixed(2) + "€ (sin IVA)").show();
		}
	}
}
calendarios.init();

$('.carousel').carousel();

$(".condiciones").on("change",function(){
	$this = $(this);
	if($this.is(':checked')){
		$(".comprasfinal").removeAttr("disabled");
	}else{
		$(".comprasfinal").attr("disabled", true);
	}
});

var calculadora = {
	init: function(){
		Calculadora 		= this;
		Calculadora.campos	= $(".campo");
		Calculadora.cm1		= $(".cm1");
		Calculadora.cm2		= $(".cm2");
		Calculadora.px1		= $(".px1");
		Calculadora.px2		= $(".px2");
		Calculadora.resp	= $(".resultado");

		Calculadora.eventlistener();

	},
	eventlistener : function(){
		Calculadora.campos.on("change", Calculadora.calculappi);
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
		Calculadora.resp.text(texto).removeClass("buenacalidad").removeClass("calidadregular").removeClass("malacalidad").addClass(clase);
	}
}
calculadora.init();
