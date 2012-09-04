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
		Resultados.plantilla 	= '<li class="item"><div class="box"><img src="{{imgsrc}}" data-id="{{id}}" title="{{title}}" alt="{{title}}"/></div></li>';
		
		Resultados.pag 			= ".paginacion";
		Resultados.pagValue		= "#min";

		Resultados.eventListener();

		$(Resultados.pagValue).val(0);
	},

	eventListener : function(){
		$(Resultados.target).on("click","img", Resultados.getBorrador);
		$(Resultados.pag).on("click",".pag", Resultados.paginacion);
	},

	checkRes : function(data){
		resp = '';
		console.log(data);
		nresultados = parseInt(data.nb_results);
		
		for(i = 0; i < 32; i++){
			item 	= "";
			id		= data[i].id;
			title	= data[i].title;
			imgsrc	= data[i].thumbnail_url;

			item = Resultados.plantilla.replace(/{{title}}/g,title); 
			item = item.replace(/{{imgsrc}}/g,imgsrc);
			item = item.replace(/{{id}}/g,id);

			resp += item;
		}
		Resultados.publicarRes(resp);
	},

	publicarRes: function(res){
		$(Resultados.target).html(res);
	},

	getBorrador : function(){
		id = $(this).data("id");

		url = "inc/apifotolia.php?function=getBorrador&id="+id;

		$.getJSON(url,function(data){
			url = data.url;

			url = url.replace("http://", "http://svBKgX7unls2Y7abxY9pRe8hJacn5MAn@"); 
			console.log(url);
			$.fancybox.open(
		        {
		            href : url
		        }
		    );
		})
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
	}

};
resultados.init();

