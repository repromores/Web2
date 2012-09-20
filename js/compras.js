var carrito = {
	init : function(){
		Carrito 				= this;
		Carrito.precio 			= ".precio";
		Carrito.$sumPrecios 	= $(".sumPrecios");
		Carrito.iva 			= $(".iva").val();
		Carrito.envio 			= $(".envio").val();
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
			$("."+id).remove();
		}
		Carrito.actualizarTablaResumen();
		return borrar;
	},
	actualizarTablaResumen : function(){
		sumPrecios = 0;
		$(Carrito.precio).each(function(i) {
		    sumPrecios += $(this).data("precio");
		});
		Carrito.$sumPrecios.text(Carrito.enMoneda(sumPrecios));

		sumPreciosIva = sumPrecios * parseFloat("1."+Carrito.iva);
		Carrito.$sumPreciosIva.text(Carrito.enMoneda(sumPreciosIva));

		Carrito.$sumPrecioEnvio.text(Carrito.enMoneda(Carrito.envio));

		Carrito.$sumPrecioTotal.text(Carrito.enMoneda(parseFloat(Carrito.envio)+parseFloat(sumPreciosIva)));
	},
	enMoneda : function(number){
		return parseFloat(number).toFixed(2) + "€";
	}

}
carrito.init();