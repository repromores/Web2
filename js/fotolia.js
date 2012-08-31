$('#vinilosform').ajaxForm({
	dataType : "json",
	//target: 	'.resultados',
	beforeSubmit : function(){
		$("#vinilos-submit").text("Buscando");
	},
	success : function(data){
		$("#vinilos-submit").text("Buscar");
		resultados.checkRes(data);
	}
}); 

var resultados = {
	init : function(){
		Resultados 				= this;
		Resultados.key 			= "";
		Resultados.target 		= ".resultados"; 
		Resultados.plantilla 	= '<li class="item"><div class="box"><img src="{{imgsrc}}" data-id="{{id}}" title="{{title}}" alt="{{title}}"/></div></li>';
	
		Resultados.eventListener();
	},

	eventListener : function(){
		$(Resultados.target).on("click","img", Resultados.verBorrador);
	},

	checkRes : function(data){
		resp = '';
		nresultados = parseInt(data.nb_results);
		
		nresultados = 2;

		for(i = 0; i < nresultados; i++){
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

	getBorrador : function(id){
		url = "http://"+ Resultados.key +"@api.fotolia.com/Rest/1/media/getMediaComp?id="+id;
		$.getJSON(url,function(data){
			return data.url;
		})
	},

	verBorrador : function(){
		id = $(this).data("id");

		//url = getBorrador(id);
		url = "http://fancyapps.com/fancybox/demo/1_b.jpg";
		$.fancybox.open([
	        {
	            href : url
	        }
	    ]);
	}
};
resultados.init();

