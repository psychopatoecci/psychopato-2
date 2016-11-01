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
  
	$busqueda = "zelda"; //Lo que se escribió en el cuadro de búsqueda
  
	//Datos de prueba para juegos físicos
	global 	$IDJuegosFisicos;
	$IDJuegosFisicos = array(
	'PROD101406',
	'PROD10192',
	'PROD102710',
	'PROD10477',
	'PROD104915',
	'PROD104990',
	'PROD108791',
	'PROD109509',
	'PROD10961',
	'PROD110101',
	'PROD111910',
	'PROD114519',
	'PROD116048',
	'PROD116327',
	'PROD116873',
	'PROD118637',
	'PROD125163',
	'PROD12595',
	'PROD126427');
	
	global 	$nombres;
	$nombres = array(
	'The Witcher 3',
	'Persona 5',
	'Zelda: Breath of the Wild',
	'Zelda: Ocarina of Time 3D',
	'No mans sky',
	'Fire Emblem: Conquest',
	'Pokemon Sun',
	'Final Fantasy XV',
	'Forza Horizon 3',
	'FIFA 17',
	'Super Smash Bros. WiiU',
	'Imagina ser roca',
	'Paper Mario: Color Splash',
	'Battlefiel 1',
	'Bioshock: The Collection',
	'Half-Life 3',
	'Halo 5: Guardians',
	'Rock Simulator 2014',
	'The Last Guardian');
	
	$descripciones = array(
	'The Witcher 3: Wild Hunt es la tercera entrega de la serie The Witcher, que nos devuelve al conocido cazador de bestias Geralt de Rivia en una nueva aventura. En esta ocasión enfrentándose a la famosa Cacería Salvaje que le da nombre, y que se convierte en un desafío de dimensiones colosales para la primera incursión de la serie RPG del estudio polaco CD Projekt Red en los videojuegos de mundo abierto. El brujo retorna en mejor forma que nunca para un título que se alza con infinidad de premios a lo mejor del año, entre ellos el de 3DJuegos por parte de la revista y de los lectores.',
	'Persona 5 lleva al usuario a la ciudad de Tokio, incluyendo los barrios de Shinjuku, Shibuya, Yongejaya y algunos de los lugares más emblemáticos de la capital japonesa. Los nuevos protagonistas son los Phantom Thieves of Hearts un grupo de héroes nocturnos. En el instituto Syujin coincidiremos con los nuevos compañeros del protagonista y viviremos su vida como un estudiante más. Por la noche comienza la fiesta: será el momento en el que se manifiestan sus Persona, unas poderosas entidades que están a las órdenes de sus amos',
	'',
	'',
	'',
	'',
	'',
	'',
	'',
	'',
	'',
	'',
	'',
	'',
	'',
	'',
	'',
	'',
	'');
	
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

	global 	$precios;
	$precios= array(
	'29 000',
	'59 500',
	'59 000',
	'39 500',
	'2 500',
	'39 000',
	'39 500',
	'59 000',
	'49 000',
	'49 000',
	'35 000',
	'87 900',
	'47 900',
	'59 000',
	'35 000',
	'99 999',
	'37 900',
	'1 900',
	'59 000');

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
	function mostrarProducto($cadena) {

		global $IDJuegosFisicos;
		global $nombres;
		global $precios;
		global $generos;
		global $consolas;
		global $descripciones;
		
		$contador=0;
		
		for ($i = 0; $i < count($nombres); $i++) {
			if (preg_match('/'.strtolower($cadena).'/', strtolower($nombres[$i])) || 
				preg_match('/'.strtolower($cadena).'/', strtolower($descripciones[$i])) || 
				preg_match('/'.strtolower($cadena).'/', strtolower($IDJuegosFisicos[$i]))) {
					
				echo "<div class='col-sm-3'>";
				echo "<div class='product-image-wrapper'>";
				echo "<div class='single-products'>";
				echo "<div class='productinfo text-center'>";
				echo "<a href='detalles.php' title = 'Ver los detalles de este producto'><img src='".obtenerPortada($IDJuegosFisicos[$i])."' alt='' /></a>";
				echo "<a href='detalles.php' title = 'Ver los detalles de este producto'><p>".$nombres[$i]."</p></a>";
				echo "<h2>¢".$precios[$i]."</h2>";
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
		<?php include(dirname(__FILE__)."/../includes/header.php");?>
	</footer>

    <script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/price-range.js"></script> <!-- Para Slider-->
    <script src="../js/jquery.prettyPhoto.js"></script> <!--Para Galerias-->
    <script src="../js/main.js"></script>
</body>
</html>
