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
