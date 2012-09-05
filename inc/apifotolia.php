<?php include_once "config.php"; ?>
<?php
$function = !empty($_GET["function"])?$_GET["function"] : "";

switch ($function) {
	case 'getBorrador':
		$result = getBorrador();
		break;

	case 'getCatPrimarias':
		$result = getCatPrimarias();
		break;

	case 'getBusqueda':
		$result = getBusqueda();
		break;
	
	default:
		$result = getBusqueda();
		break;
}

echo($result);

function getBorrador(){
	global $fotoliaKey;
	$id = $_GET["id"];
	$url = "http://". $fotoliaKey ."@api.fotolia.com/Rest/1/media/getMediaComp?id=".$id;
	return getJSON($url);
}

function getBusqueda(){
	global $fotoliaKey;

	//if(empty($_POST["query"])){return "";}
	$query	 = 'search_parameters[language_id]=5';
	$query	.= '&search_parameters[offset]='.$_POST["min"];
	$query	.= !empty($_POST["query"])? '&search_parameters[words]='. urlencode($_POST["query"]) :"";

	$cat 	 = !empty($_POST["cat"])? $_POST["cat"] : 0;

	if($cat != 0){
		$temp = explode("-", $cat);
		$cattype = $temp[0];
		$cat 	 = $temp[1];

		$query	 .= '&search_parameters[cat'.$cattype.'_id]='.$cat;
	}
	//$query = urlencode($query);

	$url 	=  "http://". $fotoliaKey ."@api.fotolia.com/Rest/1/search/getSearchResults?".$query;
//	echo $url;
	return getJSON($url);
}

function getCatPrimarias(){
	$resp  = '<optgroup label="Categorías">';
	$resp .= setCategoriasInSelect(getCategorias(1),1);
	$resp .= '</optgroup>';
	$resp .= '<optgroup label="Conceptos">';
	$resp .= setCategoriasInSelect(getCategorias(2),2);
	$resp .= '</optgroup>';
	return $resp;
}

function getCategorias($type){
	global $fotoliaKey;
	$url = "http://". $fotoliaKey ."@api.fotolia.com/Rest/1/search/getCategories".$type."?language_id=5";

	return getJSON($url);
}

function setCategoriasInSelect($data,$type=""){
	$data = json_decode($data);
	$resp = "";
	foreach ($data as $cat) {
		$name = $cat->name;
		$id   = $cat->id;

		$resp .= '<option value="'.$type .'-'. $id.'">'.$name.'</option>';
	}
	return $resp;
}

function getJSON($url){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_TIMEOUT, 30);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	$resultado = curl_exec ($ch);
 
	return($resultado);
}


?>