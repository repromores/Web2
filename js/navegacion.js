
/*
Nvegacion menu lateral
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
		item = localStorage.getItem("menuclicked");
		if(item != null){
			NavLat.headerClicked(item);
		}
	}
}
navLat.init();


$(".galeriaitem").fancybox({
    	openEffect	: 'elastic',
    	closeEffect	: 'elastic',
    	helpers : {
    		title : {
    			type : 'inside'
    		}
    	}
});
$(".mapa").fancybox({
    	openEffect	: 'elastic',
    	closeEffect	: 'elastic',	
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
		$(".btnsubmit").text("Enviando...");
	},
	success : function(){
		$(".btnsubmit").text("Enviar");
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

	    $("#uploader").pluploadQueue({
	        // General settings
	        runtimes : 'html5,gears,flash,silverlight,',
	        url : 'inc/subir.php',
	        max_file_size : '1024mb',


	        // Specify what files to browse for
	        filters : [
	            {title : "Image files", extensions : "jpg,gif,png,tiff,tif,bmp"},
	            {title : "Zip files", extensions : "zip,rar"},
	            {title : "Adobe files", extensions : "psd,ai,pdf,eps"},
	            {title : "Other files", extensions : "dwg,plt,cdr,doc,docx,ppt,pptx,ctb,sitx,pub,mxd,log,fh11,fh10,fh9,fh8,mth,indd,EST,AG,psb"}
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
	                };
	            }
	        },

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
		

	    $('#uploader').pluploadQueue().bind('FileUploaded', function(up, file, info) {
	    	size = file.size;
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
						"Gijón": "gijon",
					};
				  break;
				case "impresion-digital":
					newOptions = {
						"--": "0"
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



