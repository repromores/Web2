<!DOCTYPE HTML>
<html>
    <head>
    	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    	<title>morés - Consulta de Tarifas</title>
    	<link type="text/css" rel="stylesheet" href="css/estilo.css"/>
        <link rel="shortcut icon" href="../favicon.ico"/>
    	<script type="text/javascript" src="js/jquery-1.5.2.min.js"></script>
    	<script type="text/javascript" src="js/gestionPagina.js"></script>
    </head>
    <body>
    <header>
      	<img width="220" height="57" id="logo" alt="Logo de Morés" src="img/mores.png"/>
  		<h1 id="tituloDocumento">Consulta de Tarifas</h1>
        <div id="camposBusqueda">
            <input name="codigo" id="codigo" class="busqueda" placeholder="Buscar por Código" size="20" type="search"/>
            <input id="descripcion" class="busqueda" placeholder="Buscar por Descripción" size="30" type="search"/>
            <input type="hidden" id="numUnidades"/>
        </div>
    </header>
        <article id="search_results"></article>
        <footer>
        </footer>
    </body>
</html>