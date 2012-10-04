(function(a){var b=a({});a.subscribe=function(){b.on.apply(b,arguments)},a.unsubscribe=function(){b.off.apply(b,arguments)},a.publish=function(){b.trigger.apply(b,arguments)}})(jQuery);

var carrito = {
	init : function(){
		Carrito 				= this;
		Carrito.precio 			= ".precio";
		Carrito.$sumPrecios 	= $(".sumPrecios");
		Carrito.iva 			= $(".iva").val();
		Carrito.$sumPreciosIva 	= $(".sumPreciosIva");
		Carrito.$sumPrecioEnvio	= $(".sumPrecioEnvio");
		Carrito.$sumPrecioTotal	= $(".sumPrecioTotal");
		Carrito.$borrar 		= $(".borrar-linea");

		Carrito.bindEvents();
		Carrito.actualizarTablaResumen();
	},
	bindEvents: function(){
		Carrito.$borrar.on("click", Carrito.borrarClicked);
	},
	borrarClicked : function(id,preguntar){
		borrar = false;
		id = (typeof id != "object") ? id : $(this).data("id");
		nid = id.substr(2);
		$id = $("."+id);
		preguntar = (typeof preguntar != "undefined")? preguntar : true;

		if(preguntar){
			if( confirm("¿Seguro que quieres eliminar el producto?")){
				borrar = true;
			}
		}else{
			borrar = true;
		}
		if(borrar){
			Carrito.borrarEnServer(nid);
		}
	},
	borrarEnServer: function(id){
		borrado = 0;
		$.ajax({
		  url		: "inc/compras_procesa_cambios.php",
		  dataType	: 'json',
		  async 	: false,
		  data 		: {f : "borrarproducto",id: id},
		  success	: function(data){
						$(".id"+id).remove();
						Carrito.actualizarTablaResumen();
					}
		});
	},
	actualizarTablaResumen : function(){
		sumPrecios = 0;
		$(Carrito.precio).each(function(i) {
		    sumPrecios += $(this).data("precio");
		});
		Carrito.$sumPrecios.text(Carrito.enMoneda(sumPrecios));

		sumPreciosIva = sumPrecios * parseFloat("0."+Carrito.iva);
		Carrito.$sumPreciosIva.text(Carrito.enMoneda(sumPreciosIva));

		Carrito.sumPrecioTotal = (parseFloat(sumPrecios) + parseFloat(sumPreciosIva));
		
		if (Carrito.$sumPrecioEnvio.length > 0){
			pasta = Carrito.$sumPrecioEnvio.data("pasta");
			if(!isNaN(pasta)){
				Carrito.$sumPrecioEnvio.text(Carrito.enMoneda(pasta));
				Carrito.sumPrecioTotal = (parseFloat(Carrito.sumPrecioTotal) + parseFloat(pasta));
			}else{
				Carrito.$sumPrecioEnvio.text("En tienda");
			}
		}


		Carrito.$sumPrecioTotal.text(Carrito.enMoneda(Carrito.sumPrecioTotal));

		Carrito.actualizarServidor();
	},
	enMoneda : function(number){
		return parseFloat(number).toFixed(2) + "€";
	},
	actualizarServidor : function(){
		total = parseFloat(Carrito.sumPrecioTotal).toFixed(2);
		datos = { total: total };
		$.post("inc/carrito.php?f=actualizar",datos);
	}


}
carrito.init();

pedido = {
	init: function(){
		Pedido 					= this;
		Pedido.$form			= $("#form-pedido");
		Pedido.$tienda 			= $(".tienda");
		Pedido.$mensajero 		= $(".mensajero");
		Pedido.$selector 		= $(".metodo");
		Pedido.$seleccionado	= $("#metodo");
		Pedido.$tienda			= $("#ciudadRecogida");
		Pedido.$tiendahelp		= $(".tienda-help");

		Pedido.bindEvents();
		Pedido.tiendaElegida();
		Pedido.getSeleccionMetodo();
	},
	bindEvents: function(){
		Pedido.$selector.on("click", Pedido.selectorClicked);
		Pedido.$tienda.on("change",Pedido.tiendaChanged);
		Pedido.$form.on("submit",Pedido.validarForm);
	},
	selectorClicked : function(e){
		e.preventDefault();
		$esto = $(this);
		metodo = $esto.data("metodo");
		Pedido.muestraMetodo(metodo);
	},
	getSeleccionMetodo: function(){
		if(sessionStorage.getItem("metodoSelected") != null){
			Pedido.muestraMetodo(sessionStorage.getItem("metodoSelected"));
		}else{
			Pedido.muestraMetodo("m-tienda");
		}
	},

	muestraMetodo  :function(metodo){
		$("#metodo").val(metodo);
		contrario = (metodo == "m-tienda")? "m-mensajero" : "m-tienda";
		$("."+metodo).addClass("active");

		$("."+contrario+"-t").slideUp(function(){
			$("."+metodo+"-t").slideDown();
		})
		sessionStorage.setItem("metodoSelected",metodo);
	},
	tiendaChanged:function(){
		$esto = $(this);
		ciudad = $esto.val();
		Pedido.tiendaHelper(ciudad);
		sessionStorage.setItem("tiendaSelected",ciudad);
	},
	tiendaElegida:function(){
		if(sessionStorage.getItem("tiendaSelected")!= null){
			Pedido.tiendaHelper(sessionStorage.getItem("tiendaSelected"));
		}
	},
	tiendaHelper : function(ciudad){
		switch(ciudad) {
		    case "oviedo": 
		        text = 'Viaducto Ingeniero Marquina, 7 <a  href="https://maps.google.com/maps/ms?msa=0&amp;msid=201196282089870687635.0004b75b2be933103a9c6&amp;ie=UTF8&amp;t=m&amp;ll=43.36557,-5.854683&amp;spn=0.003744,0.006866&amp;z=17&amp;output=embed" class="mapa fancybox.iframe"><img alt="mapa" src="img/mini-map.png"></a>';
		        break;
		    case "gijon":
		        text = 'Marqués de San Esteban, 4 <a  href="https://maps.google.com/maps/ms?msa=0&amp;msid=201196282089870687635.0004b757bcf20a3142950&amp;ie=UTF8&amp;t=m&amp;ll=43.543369,-5.665458&amp;spn=0.001866,0.003433&amp;z=18&amp;output=embed" class="mapa fancybox.iframe"><img alt="mapa" src="img/mini-map.png"></a>';
		        break;
		    case "llanera":
		        text = 'Parque Tecnológico de Asturias, Parcela 2  <a  href="https://maps.google.com/maps/ms?msa=0&amp;msid=201196282089870687635.0004b75b98445621f8827&amp;ie=UTF8&amp;t=m&amp;ll=43.425567,-5.823414&amp;spn=0.00187,0.003433&amp;z=18&amp;output=embed" class="mapa fancybox.iframe"><img alt="mapa" src="img/mini-map.png"></a>';
		        break;
		}
		Pedido.$tiendahelp.html(text);

	},

	validarForm : function(){
		error = 0;
		if(Pedido.$seleccionado.val() == "m-tienda"){
			ciudadRecogida = $(".ciudadRecogida");
			if(!(Pedido.requerido(ciudadRecogida.val()))){
				error++;
				Pedido.displayError(ciudadRecogida);
			}else{
				Pedido.displayError(ciudadRecogida,false);
			}
		}else{
			direccion1 = $(".direccion1");
			if(!(Pedido.requerido(direccion1.val()))){
				error++;
				Pedido.displayError(direccion1,true);
			}else{
				Pedido.displayError(direccion1,false);
			}
			poblacion = $(".poblacion");
			if(!(Pedido.requerido(poblacion.val()))){
				error++;
				Pedido.displayError(poblacion,true);
			}else{
				Pedido.displayError(poblacion,false);
			}
			provincia = $(".provincia");
			if(!(Pedido.requerido(provincia.val()))){
				error++;
				Pedido.displayError(provincia,true);
			}else{
				Pedido.displayError(provincia,false);
			}
			cp = $(".cp");
			if(!(Pedido.requerido(cp.val()))){
				error++;
				Pedido.displayError(cp,true);
			}else{
				Pedido.displayError(cp,false);
			}
		}
		telefono = $(".telefono");
		if(!(Pedido.requerido(telefono.val()))){
			error++;
			Pedido.displayError(telefono,true);
		}else{
			Pedido.displayError(telefono,false);
		}
		nombre = $(".nombre");
		if(!(Pedido.requerido(nombre.val()))){
			error++;
			Pedido.displayError(nombre,true);
		}else{
			Pedido.displayError(nombre,false);
		}

		return(error==0);
	},
	requerido : function($elem){
		$elem = $.trim($elem);
		return (($elem !="") && ($elem != null));
	},
	displayError: function($elem,error){
		if(error){
			$elem.parents(".control-group").addClass("error");			
		}else{
			$elem.parents(".control-group").removeClass("error");			
		}


	}
}
pedido.init();