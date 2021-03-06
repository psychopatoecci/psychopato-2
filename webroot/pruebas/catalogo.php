<!DOCTYPE html>

<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Tienda de videojuegos ficticia">
    <meta name="author" content="PsychoPato">
    <title>PsychoPatoShop</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/prettyPhoto.css" rel="stylesheet"> <!--Galerias-->
    <link href="../css/price-range.css" rel="stylesheet"> <!--Slider-->
    <link href="../css/animate.css" rel="stylesheet"> <!--Animaciones-->
	<link href="../css/responsive.css" rel="stylesheet"> <!--Para móviles-->
	<link href="../css/main.css" rel="stylesheet"> 

    <!--[if lt IE 9]> 
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/home/favicon.ico">

</head>

<body>
  <?php 
  
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
	'No man\'s sky',
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
	
	//Función que muestra un juego físico en pantalla
	function mostrarProductoFisico($genero, $plataforma) {

		global $IDJuegosFisicos;
		global $nombres;
		global $precios;
		global $generos;
		global $consolas;

		for ($i = 0; $i < count($nombres); $i++) {
			if (($generos[$i]===$genero || $genero==="todos") && ($consolas[$i]===$plataforma || $plataforma==="todas")) {
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
			}		
		}
		
	}

	//Función que muestra un juego digital en pantalla
	function mostrarProductoDigital($genero, $plataforma) {
		global $IDJuegosDigitales;
		global $nombres2;
		global $precios2;
		global $generos2;
		global $consolas2;
		
		for ($i = 0; $i < count($nombres2); $i++) {
			if (($generos2[$i]===$genero || $genero==="todos") && ($consolas2[$i]===$plataforma || $plataforma==="todas")) {
				echo "<div class='col-sm-3'>";
				echo "<div class='product-image-wrapper'>";
				echo "<div class='single-products'>";
				echo "<div class='productinfo text-center'>";
				echo "<a href='detalles.php' title = 'Ver los detalles de este producto'><img src='".obtenerPortada($IDJuegosDigitales[$i])."' alt='' /></a>";
				echo "<a href='detalles.php' title = 'Ver los detalles de este producto'><p>".$nombres2[$i]."</p></a>";
				echo "<h2>¢".$precios2[$i]."</h2>";
				
				echo "<a href='#' title = 'Añadir este producto a la wishlist'><i class='fa fa-star'></i>Añadir a wishlist</a><p></p>";
				echo "<a href='#' title = 'Añadir este producto al carrito de compras' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Añadir al carrito</a>";
				echo "</div>";
				echo "<img src='images/home/digital.png' class='new' alt='' />";
				echo "</div> </div> </div>";
			}		
		}
	}

	//Función que muestra una plataforma en pantalla
	function mostrarPlataforma() {
		global $IDPlataformas;
		global $nombres3;
		global $precios3;
		
		for ($i = 0; $i < count($nombres3); $i++) {
			echo "<div class='col-sm-3'>";
			echo "<div class='product-image-wrapper'>";
			echo "<div class='single-products'>";
			echo "<div class='productinfo text-center'>";
			echo "<a href='detalles.php' title = 'Ver los detalles de este producto'><img src='".obtenerPortada($IDPlataformas[$i])."' alt='' /></a>";
			echo "<a href='detalles.php' title = 'Ver los detalles de este producto'><p>".$nombres3[$i]."</p></a>";
			echo "<h2>¢".$precios3[$i]."</h2>";
			echo "<a href='#' title = 'Añadir este producto a la wishlist'><i class='fa fa-star'></i>Añadir a wishlist</a><p></p>";
			echo "<a href='#' title = 'Añadir este producto al carrito de compras' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Añadir al carrito</a>";
			echo "</div> </div> </div> </div>";	
		}
	}
	
	//Función que devuelve el número de juegos por plataforma
	function calcularCantidad($plataforma) {
		global $consolas;
		global $consolas2;
		$contador = 0;
		
		for ($i = 0; $i < count($consolas); $i++) {
			if (($consolas[$i]===$plataforma || $plataforma==="todas")) {
				$contador++;
			}	
		}
		for ($i = 0; $i < count($consolas2); $i++) {
			if (($consolas2[$i]===$plataforma || $plataforma==="todas")) {
				$contador++;
			}	
		}
		return $contador;
	}

	?>
				
	<!--Header-->
	<header id="header">
		<!--Header intermedio-->
		<div class="header-middle">
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.php" title="Volver a la página principal"><img src="images/home/Logo.png" alt="Regresar al inicio" /></a>
						</div>
						
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="cuenta.html" title="Ver datos de la cuenta"><i class="fa fa-user"></i> Cuenta</a></li>
								<li><a href="wishlist.html" title="Ver la wishlist"><i class="fa fa-star"></i> Wishlist</a></li>
								<li><a href="carrito.html" title="Ver el carrito de compras"><i class="fa fa-shopping-cart"></i> Carrito</a></li>
								<li><a href="login.html" title="Iniciar sesión como cliente"><i class="fa fa-lock"></i> Iniciar sesión</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<!--Header inferior-->
		<div class="header-bottom">
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
					
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.html" class="active" title="Volver a la página principal">Inicio</a></li>
								<li class="dropdown"><a href="#">Productos<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="catalogo.php" title="Ver el catálogo de juegos físicos">Juegos físicos</a></li>
										<li><a href="catalogo.php" title="Ver el catálogo de juegos digitales">Juegos digitales</a></li> 
										<li><a href="catalogo.php" title="Ver el catálogo de plataformas de juegos">Plataformas</a></li> 
                                    </ul>
                                </li> 
								<li><a href="ofertas.php" title="Ver las ofertas disponibles">Ofertas</a></li>
								<li><a href="ofertas.php" title="Ver los combos disponibles">Combos</a></li>
								<li><a href="contacto.html" title="Ver la información de contacto de la empresa">Contacto</a></li>
							</ul>
						</div>
						
					</div>
					
					<!--Barra de busqueda-->
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Búsqueda"/>
						</div>	
					</div>
					
				</div>
			</div>
		</div>
		
	</header>
	
	<!--Navegador lateral-->
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Categorías</h2>

						<div class="brands_products">

							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
								
								<!--/Categorias principales-->
								<li><a href='#submenu1' data-toggle='tab' title="Ver el catálogo de juegos físicos"><h4 class="panel-title">Juegos físicos</h4></a></li><p></p>
								<li><a href='#submenu2' data-toggle='tab' title="Ver el catálogo de juegos digitales"><h4 class="panel-title">Juegos digitales</h4></a></li><p></p>
								<li><a href='#submenu3' data-toggle='tab' title="Ver todas las plataformas de juego disponibles"><h4 class="panel-title">Plataformas</h4></a></li><br><br>
								
								<!--/Contador de juegos por plataforma-->
								<h2>Filtrar por plataformas</h2>

								<?php 
									echo "<li><a href='#filtrops4' data-toggle='tab' title='Mostrar todos los juegos de Play Station 4'> <span class='pull-right'>(".calcularCantidad("ps4").")</span>Play Station 4</a></li>";
									echo "<li><a href='#filtrops3' data-toggle='tab' title='Mostrar todos los juegos de Play Station 3'> <span class='pull-right'>(".calcularCantidad("ps3").")</span>Play Station 3</a></li>";
									echo "<li><a href='#filtroone' data-toggle='tab' title='Mostrar todos los juegos de Xbox One'> <span class='pull-right'>(".calcularCantidad("one").")</span>Xbox One</a></li>";
									echo "<li><a href='#filtro360' data-toggle='tab' title='Mostrar todos los juegos de Xbox 360'> <span class='pull-right'>(".calcularCantidad("360").")</span>Xbox 360</a></li>";
									echo "<li><a href='#filtrowii' data-toggle='tab' title='Mostrar todos los juegos de Wii'> <span class='pull-right'>(".calcularCantidad("wii").")</span>Wii</a></li>";
									echo "<li><a href='#filtrowiiu' data-toggle='tab' title='Mostrar todos los juegos de Wii U'> <span class='pull-right'>(".calcularCantidad("wiiu").")</span>Wii U</a></li>";
									echo "<li><a href='#filtropc' data-toggle='tab' title='Mostrar todos los juegos de PC (computadora)'> <span class='pull-right'>(".calcularCantidad("pc").")</span>PC</a></li>";
									echo "<li><a href='#filtrovita' data-toggle='tab' title='Mostrar todos los juegos de PS Vita'> <span class='pull-right'>(".calcularCantidad("vita").")</span>PlayStation Vita</a></li>";
									echo "<li><a href='#filtro3ds' data-toggle='tab' title='Mostrar todos los juegos de Nintendo 3DS'> <span class='pull-right'>(".calcularCantidad("3ds").")</span>Nintendo 3DS</a></li>";
									echo "<li><a href='#filtrods' data-toggle='tab' title='Mostrar todos los juegos de Nintendo DS'> <span class='pull-right'>(".calcularCantidad("ds").")</span>Nintendo DS</a></li>";
								?>
								
								</ul>
							</div>
						</div>
						
						<!--/Banner de publicidad lateral-->
						<div class="bannerpublicidad text-center">
							<a href="#"><img href="#" title="Ver oferta especial" src="images/home/Banner1.png" alt="" /></a>
						</div> <br>
					
					</div>
				</div>
				
				<!--Zona de contenido-->
				<div class="col-sm-9 padding-right">
					
					<!--Vistazo a categorias-->
					<div class="category-tab">
						
						<!--Submenus de cada categoria-->
						<div class="tab-content">
							<div class="tab-pane fade active in" id="submenu1" >
								<h1>Juegos físicos</h1>
								<div class="col-sm-12">
									<ul class="nav nav-tabs">
										<li class="active"><a href="#aventura1" data-toggle="tab">Aventura</a></li>
										<li><a href="#rpg1" data-toggle="tab">RPG</a></li>
										<li><a href="#plataformas1" data-toggle="tab">Plataformas</a></li>
										<li><a href="#conduccion1" data-toggle="tab">Conducción</a></li>
										<li><a href="#deportes1" data-toggle="tab">Deportes</a></li>
										<li><a href="#shooter1" data-toggle="tab">Shooter</a></li>
										<li><a href="#lucha1" data-toggle="tab">Lucha</a></li>
										<li><a href="#otros1" data-toggle="tab">Otros</a></li>
		
									</ul>
								</div>
								
								<div class="tab-content">
									<div class="tab-pane fade active in" id="aventura1" >
										<?php 
										mostrarProductoFisico("aventura", "todas");
										?>
									</div>
									
									<div class="tab-pane fade" id="rpg1" >
										<?php 
										mostrarProductoFisico("rpg", "todas");
										
										?>
									</div>
									
									<div class="tab-pane fade" id="plataformas1" >
										<?php 
										mostrarProductoFisico("plataformas", "todas");
										?>
									</div>
									
									<div class="tab-pane fade" id="conduccion1" >
										<?php 
										mostrarProductoFisico("conduccion", "todas");
										?>
									</div>
									
									<div class="tab-pane fade" id="deportes1" >
										<?php 
										mostrarProductoFisico("deportes", "todas");
										?>
									</div>
									
									<div class="tab-pane fade" id="shooter1" >
										<?php 
										mostrarProductoFisico("shooter", "todas");
										?>
									</div>
									
									<div class="tab-pane fade" id="lucha1" >
										<?php 
										mostrarProductoFisico("lucha", "todas");
										?>
									</div>
									
									<div class="tab-pane fade" id="otros1" >
										<?php 
										mostrarProductoFisico("otros", "todas");
										?>
									</div>
								</div>
						    </div>
						    
							<div class="tab-pane fade" id="submenu2" >
								<h1>Juegos digitales</h1>
								<div class="col-sm-12">
									<ul class="nav nav-tabs">
										<li class="active"><a href="#aventura2" data-toggle="tab">Aventura</a></li>
										<li><a href="#rpg2" data-toggle="tab">RPG</a></li>
										<li><a href="#plataformas2" data-toggle="tab">Plataformas</a></li>
										<li><a href="#conduccion2" data-toggle="tab">Conducción</a></li>
										<li><a href="#deportes2" data-toggle="tab">Deportes</a></li>
										<li><a href="#shooter2" data-toggle="tab">Shooter</a></li>
										<li><a href="#lucha2" data-toggle="tab">Lucha</a></li>
										<li><a href="#otros2" data-toggle="tab">Otros</a></li>
		
									</ul>
								</div>
								
								<div class="tab-content">
									<div class="tab-pane fade active in" id="aventura2" >
										<?php 
										mostrarProductoDigital("aventura", "todas");
										?>
									</div>
									
									<div class="tab-pane fade" id="rpg2" >
										<?php 
										mostrarProductoDigital("rpg", "todas");
										?>
									</div>
									
									<div class="tab-pane fade" id="plataformas2" >
										<?php 
										mostrarProductoDigital("plataformas", "todas");
										?>
									</div>
									
									<div class="tab-pane fade" id="conduccion2" >
										<?php 
										mostrarProductoDigital("conduccion", "todas");
										?>
									</div>
									
									<div class="tab-pane fade" id="deportes2" >
										<?php 
										mostrarProductoDigital("deportes", "todas");
										?>
									</div>
									
									<div class="tab-pane fade" id="shooter2" >
										<?php 
										mostrarProductoDigital("shooter", "todas");
										?>
									</div>
									
									<div class="tab-pane fade" id="lucha2" >
										<?php
										mostrarProductoDigital("lucha", "todas");
										?>
									</div>
									
									<div class="tab-pane fade" id="otros2" >
										<?php 
										mostrarProductoDigital("otros", "todas");
										?>
									</div>
								</div>
							</div>
							
							<div class="tab-pane fade" id="submenu3" >
								<h1>Plataformas de juegos</h1><br>
								<?php 
								mostrarPlataforma()
								?>
							</div> 
							
							<div class="tab-pane fade" id="filtrops4" >
								<h1>Juegos para Play Station 4</h1><br>
								<?php 
								mostrarProductoFisico("todos", "ps4");
								mostrarProductoDigital("todos", "ps4");
								?>
							</div>
							<div class="tab-pane fade" id="filtrops3" >
								<h1>Juegos para Play Station 3</h1><br>
								<?php 
								mostrarProductoFisico("todos", "ps3");
								mostrarProductoDigital("todos", "ps3");
								?>
							</div>
							<div class="tab-pane fade" id="filtroone" >
								<h1>Juegos para Xbox One</h1><br>
								<?php 
								mostrarProductoFisico("todos", "one");
								mostrarProductoDigital("todos", "one");
								?>
							</div>
							<div class="tab-pane fade" id="filtro360" >
								<h1>Juegos para Xbox 360</h1><br>
								<?php 
								mostrarProductoFisico("todos", "360");
								mostrarProductoDigital("todos", "360");
								?>
							</div>
							<div class="tab-pane fade" id="filtrowii" >
								<h1>Juegos para Wii</h1><br>
								<?php 
								mostrarProductoFisico("todos", "wii");
								mostrarProductoDigital("todos", "wii");
								?>
							</div>
							<div class="tab-pane fade" id="filtrowiiu" >
								<h1>Juegos para WiiU</h1><br>
								<?php 
								mostrarProductoFisico("todos", "wiiu");
								mostrarProductoDigital("todos", "wiiu");
								?>
							</div>
							<div class="tab-pane fade" id="filtropc" >
								<h1>Juegos para PC</h1><br>
								<?php 
								mostrarProductoFisico("todos", "pc");
								mostrarProductoDigital("todos", "pc");
								?>
							</div>
							<div class="tab-pane fade" id="filtrovita" >
								<h1>Juegos para PS Vita</h1><br>
								<?php 
								mostrarProductoFisico("todos", "vita");
								mostrarProductoDigital("todos", "vita");
								?>
							</div>
							<div class="tab-pane fade" id="filtro3ds" >
								<h1>Juegos para Nintendo 3DS</h1><br>
								<?php 
								mostrarProductoFisico("todos", "3ds");
								mostrarProductoDigital("todos", "3ds");
								?>
							</div>
							<div class="tab-pane fade" id="filtrods" >
								<h1>Juegos para Nintendo DS</h1><br>
								<?php 
								mostrarProductoFisico("todos", "ds");
								mostrarProductoDigital("todos", "ds");
								?>
							</div>
							
						</div>
						
        			
        			
        			<!----CODIGO DE PRUEBA NO BORRAR--------->
        		
        			<?php
        				/*
        			foreach($query as $producto){
						 
						 if(isset($producto->video_juego)){
						
						echo $producto->video_juego->descripcion;
						echo "<br>";
						
						
						 }}
						 */
						 ?>
						 
					<!----CODIGO DE PRUEBA NO BORRAR--------->	

					
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<!--/Footer-->
	<footer id="footer">
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Servicio</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#" title="Contactar a la empresa">Contáctenos</a></li>
								<li><a href="#" title="Ver la sección de preguntas frecuentes">Preguntas frecuentes</a></li>
								<li><a href="#" title="Ver información de la empresa">Sobre nosotros</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Administración</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#" title="Iniciar sesión como administrador">Entrar como administrador</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Corporación PsychoPato S.A. Todos los derechos reservados</p>
					<p class="pull-right">UCR - 2016</p>
				</div>
			</div>
		</div>
		
	</footer>

    <script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/price-range.js"></script> <!-- Para Slider-->
    <script src="../js/jquery.prettyPhoto.js"></script> <!--Para Galerias-->
    <script src="../js/main.js"></script>
</body>
</html>