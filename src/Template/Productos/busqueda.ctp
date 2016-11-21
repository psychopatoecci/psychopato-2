<!DOCTYPE html>

<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Tienda de videojuegos ficticia">
    <meta name="author" content="PsychoPato">
    <title>PsychoPatoShop - Resultados de búsqueda</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet"> <!--Galerias-->
    <link href="css/price-range.css" rel="stylesheet"> <!--Slider-->
    <link href="css/animate.css" rel="stylesheet"> <!--Animaciones-->
	<link href="css/responsive.css" rel="stylesheet"> <!--Para móviles-->
	<link href="css/main.css" rel="stylesheet"> 

    <!--[if lt IE 9]> 
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/home/favicon.ico">

</head>

<body>
  <?php 
  
	$busqueda = $buscando; //Lo que se escribió en el cuadro de búsqueda
  
	//Datos de prueba para juegos físicos
	global 	$IDJuegosFisicos;
	$IDJuegosFisicos=[];
	foreach($prod as $p){
		array_push($IDJuegosFisicos, $p['idProducto']);
	}
	
	global 	$nombres;
	$nombres=[];
	foreach($prod as $p){
		array_push($nombres, $p['nombreProducto']);
	}

	
	global $descripciones;
	$descripciones=[];
	foreach($prod as $p){
		array_push($descripciones, $p['$descripciones']);
	}
	
	global 	$precios;
	$precios=[];
	foreach($prod as $p){
		array_push($precios, $p['precio']);
	}
	
		global $descuentos;
	$descuentos = [];
	foreach($prod as $descuento){
		array_push($descuentos, $descuento['oferta']['descuento']);
	}
	
	global $fechaInicio;
	$fechaInicio = [];
	foreach($prod as $fechaI){
		array_push($fechaInicio, $fechaI['ofertas']['fechaInicio']);	
	}

	global $fechaFinal;
	$fechaFinal = [];
	foreach($prod as $fechaF){
		array_push($fechaFinal, $fechaF['ofertas']['fechaInicio']);	
	}

	
	global 	$consolas;
	$consolas = array(
	'ps4',
	'ps4',
	'wiiu',
	'3ds',
	'ps4',
	'3ds',
	'3ds',
	'ps4',
	'one',
	'ps4',
	'wiiu',
	'ds',
	'wiiu',
	'one',
	'ps4',
	'pc',
	'one',
	'pc',
	'ps4');

	global 	$generos;
	$generos = array(
	'aventura',
	'rpg',
	'aventura',
	'aventura',
	'aventura',
	'rpg',
	'rpg',
	'rpg',
	'conduccion',
	'deportes',
	'lucha',
	'otros',
	'plataformas',
	'shooter',
	'shooter',
	'shooter',
	'shooter',
	'otros',
	'aventura');

	//Datos de prueba para juegos digitales
	global 	$IDJuegosDigitales;
	$IDJuegosDigitales = array(
	'PROD101406',
	'PROD10192',
	'PROD126427');
	
	global 	$nombres2;
	$nombres2 = array(
	'The Witcher 3',
	'Persona 5',
	'The Last Guardian');

	global 	$consolas2;
	$consolas2 = array(
	'ps4',
	'ps4',
	'ps4');

	global 	$precios2;
	$precios2= array(
	'19 000',
	'49 500',
	'49 000');

	global 	$generos2;
	$generos2 = array(
	'aventura',
	'rpg',
	'aventura');

	//Datos de prueba para plataformas
	global 	$IDPlataformas;
	$IDPlataformas = array(
	'PROD130043',
	'PROD137584',
	'PROD137630',
	'PROD140849',
	'PROD14379',
	'PROD144727');
	
	global 	$nombres3;
	$nombres3 = array(
	'Play Station 4',
	'Xbox One',
	'Nintendo NX',
	'WiiU - Mario Maker Pack',
	'New 3DS XL - Pokemon Edition',
	'PS Vita');

	global 	$precios3;
	$precios3= array(
	'299 000',
	'399 500',
	'580 500',
	'225 500',
	'119 500',
	'119 000');

	Include ("scripts/funciones.php");
	
	//Función busca un producto por nombre, descripcion o ID
	function calcularDescuento($precios, $descuentos) {
		$precioSinEspacios = str_replace(' ', '', $precios);
		$resultado = $precioSinEspacios-(($precioSinEspacios/100)*$descuentos);
		return $resultado;
	}
	
	function mostrarProducto($cadena) {

		global $IDJuegosFisicos;
		global $nombres;
		global $precios;
		global $generos;
		global $consolas;
		global $descripciones;
		global $descuentos;
		global $fechaInicio;
		global $fechaFinal;
		
		$contador=0;
		
		for ($i = 0; $i < count($nombres); $i++) {
			if (preg_match('/'.strtolower($cadena).'/', strtolower($nombres[$i])) || 
				preg_match('/'.strtolower($cadena).'/', strtolower($descripciones[$i])) || 
				preg_match('/'.strtolower($cadena).'/', strtolower($IDJuegosFisicos[$i]))) {
					
				echo "<div class='col-sm-3'>";
				echo "<div class='product-image-wrapper'>";
				echo "<div class='single-products'>";
				echo "<div class='productinfo text-center'>";
				if($descuentos[$i]!=null){
					echo "<br><h2>¡Descuento del ".$descuentos[$i]."%!</h2>";
				}
				echo "<a href='../detalles/".$IDJuegosFisicos[$i]."' title = 'Ver los detalles de este producto'><img src='".obtenerPortada($IDJuegosFisicos[$i])."' alt='' /></a>";
				echo "<a href='../detalles/".$IDJuegosFisicos[$i]."' title = 'Ver los detalles de este producto'><p>".$nombres[$i]."</p></a>";
				if($descuentos[$i]!=null){
					echo "<h4><strike>¢".$precios[$i]."</strike></h4>";
					echo "<h2>¢".calcularDescuento($precios[$i], $descuentos[$i])."</h2>";
					echo "<br><b>Duración de la oferta:</b><br>".$fechaInicio[$i]." - ".$fechaFinal[$i]."<br><br>";
				}else{
					echo "<h2>¢".$precios[$i]."</h2>";
				}
				echo "<a href='#' title = 'Añadir oferta a la wishlist'><i class='fa fa-star'></i>Añadir a wishlist</a><p></p>";
				echo "<a href='#' title = 'Añadir este producto a la wishlist'><i class='fa fa-star'></i>Añadir a wishlist</a><p></p>";
				echo "<a href='#' title = 'Añadir este producto al carrito de compras' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Añadir al carrito</a>";
				echo "</div> </div> </div> </div>";
				
				$contador++;
			}		
		}
		
		if ($contador===0) {
			echo "No se ha encontrado ningún producto con ese nombre, id o palabra clave.<br><br><br>";
		}
		
	}

	?>
	
	<!--Header-->
	<header id="header">
		<?php include(dirname(__FILE__)."/../includes/header.php");?>
	</header>
	
	<!--Navegador lateral-->
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<div align="left">
							<button type='button' onClick="parent.location='catalogo.php'" class='btn btn-default get' title = 'Ver el navegador del catálogo de productos'><-Catálogo de productos</button>
						</div>
					
					</div>
				</div>
				
				<!--Zona de contenido-->
				<div class="col-sm-9 padding-right">
					
					<!--Vistazo a categorias-->
					<div class="category-tab">
						
						<!--Submenus de cada categoria-->
						<div class="tab-content">
							<div class="tab-pane fade active in" id="submenu1" >
								<h1>Resultado de la búsqueda: "<?php echo $busqueda; ?>"</h1>
								<br>
								<div class="tab-content">
									<?php 
										mostrarProducto($busqueda);
									?>
									
								</div>
						    </div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<!--/Footer-->
	<footer id="footer">
		<?php include(dirname(__FILE__)."/../includes/footer.php");?>
	</footer>

    <script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/price-range.js"></script> <!-- Para Slider-->
    <script src="../js/jquery.prettyPhoto.js"></script> <!--Para Galerias-->
    <script src="../js/main.js"></script>
</body>
</html>
