<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Tienda de videojuegos ficticia">
    <meta name="author" content="PsychoPato">
    <title>PsychoPatoShop</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet"> <!--Fuentes-->
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

	//Titulos y descripciones de la portada
	$titulos = array(
	'Nueva* PS4 Pro',
	'Half-Life *3',
	'Rock Simulator* 2014');
	
	$subtitulos1 = array(
	'Diseñada para los más "pros"',
	'El mejor juego que jamás jugarás',
	'La experiencia de simulación definitiva');
	
	$subtitulos2 = array(
	'Resérvala ahora y llévate una calcomania de Kratos',
	'Fecha de salida: 30 de febrero, 2017',
	'"Too much rocks" 7.8/10 - IGN');
	
	$imagenesPortada = array(
	'images/ofertas/Ps4Pro.jpg',
	'images/ofertas/Halflife3HOME.png',
	'images/ofertas/RockSimulatorhome.jpg');
	
	//Productos destacados
	$IDProductosDetacados = array(
	'PROD130043',
	'PROD137584',
	'PROD126427',
	'PROD137630',
	'PROD109509',
	'PROD104990');
	
	$nombresDetacados = array(
	'Play Station 4 - Edición estándar',
	'Xbox One Slim - 2 TB',
	'The Last Guardian',
	'Nintendo NX',
	'Final Fantasy XV',
	'Fire Emblem Fates - Conquest');
	
	$preciosDetacados = array(
	'169 000',
	'209 000',
	'49 000',
	'49 000',
	'39 000',
	'999 000');
	
	//Productos - Novedades
	$IDProductosNovedades = array(
	'PROD116873',
	'PROD110101',
	'PROD10961',
	'PROD116048');
	
	$nombresNovedades = array(
	'Bioshock: The Collection',
	'FIFA 17',
	'Forza Horizon 3',
	'Paper Mario: Color Splash');
	
	$preciosNovedades = array(
	'38 000',
	'29 000',
	'49 000',
	'19 000');
	
	//Productos - Lanzamientos
	$IDProductosLanzamientos = array(
	'PROD102710',
	'PROD118637',
	'PROD10192',
	'PROD108791');
	
	$nombresLanzamientos = array(
	'The Legend of Zelda: Breath of the Wild',
	'Half-Life 3',
	'Persona 5',
	'Pokemon Sun');
	
	$preciosLanzamientos = array(
	'69 000',
	'29 000',
	'49 000',
	'30 000');
	
	//Productos - Mejores
	$IDProductosMejores = array(
	'PROD101406',
	'PROD125163',
	'PROD111910',
	'PROD10477');
	
	$nombresMejores = array(
	'The Witcher 3: Wild Hunt',
	'Halo 5: Guardians',
	'Super Smash Bros. Wii U',
	'The Legend of Zelda: Ocarina of Time 3D');
	
	$preciosMejores = array(
	'16 000',
	'21 000',
	'49 000',
	'39 000');
	
	Include ("scripts/funciones.php");

  ?>

	<!--Header-->
	<header id="header">
		<!--Header intermedio-->
		<div class="header-middle">
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index" title="Volver a la página principal"><img src="images/home/Logo.png" alt="Regresar al inicio" /></a>
						</div>
						
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="cuenta.php" title="Ver datos de la cuenta"><i class="fa fa-user"></i> Cuenta</a></li>
								<li><a href="wishlist.php" title="Ver la wishlist"><i class="fa fa-star"></i> Wishlist</a></li>
								<li><a href="carrito.php" title="Ver el carrito de compras"><i class="fa fa-shopping-cart"></i> Carrito</a></li>
								<li><a href="login.php" title="Iniciar sesión como cliente"><i class="fa fa-lock"></i> Iniciar sesión</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-intermedio-->
	
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
                                        <li><a href="catalogo" title="Ver el catálogo de juegos físicos">Juegos físicos</a></li>
										<li><a href="catalogo" title="Ver el catálogo de juegos digitales">Juegos digitales</a></li> 
										<li><a href="catalogo" title="Ver el catálogo de plataformas de juegos">Plataformas</a></li> 
                                    </ul>
                                </li> 
								<li><a href="ofertas" title="Ver las ofertas disponibles">Ofertas</a></li>
								<li><a href="ofertas" title="Ver los combos disponibles">Combos</a></li>
								<li><a href="contacto" title="Ver la información de contacto de la empresa">Contacto</a></li>
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
	
	<!--Slider de noticias-->
	<section id="slider">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<?php
								
								for ($i = 0; $i < count($titulos); $i++) {
									
									//Detectar el asterisco para cambiar el color de las palabras
									$substring1=""; $substring2="";
									$palabra = $titulos[$i];
									$cambio=false;
									for ($j = 0; $j < strlen($palabra); $j++) {
										$letra = $titulos[$i]{$j};
										
										if ($cambio === true) {
											$substring2.=$letra;
										} else {
											if ($letra === '*') {
												$cambio=true;
											} else {
												$substring1.=$letra;
											}
											
										}
									}
									
									if ($i === 0) {
										echo "<div class='item active'>";
									} else {
										echo "<div class='item'>";
									} 
									echo "<div class='col-sm-6'>";
									echo "<h1><span>".$substring1."</span>".$substring2."</h1>";
									echo "<h2>".$subtitulos1[$i]."</h2>";
									echo "<p>".$subtitulos2[$i]."</p>";
									echo "<button type='button' class='btn btn-default get' title = 'Comprar este productos'>¡Comprar!</button>";
									
									echo "</div>";
									echo "<div class='col-sm-6'>";
									echo "<img src=".$imagenesPortada[$i]." class='productohome img-responsive' alt='' />";
									echo "</div> </div>";
								}
							?>
								
							
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section>
	
	<!--Navegador lateral-->
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Categorías</h2>
						<div class="panel-group category-products" id="accordian">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Juegos físicos</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Juegos digitales</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#mens">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Buscar por género
										</a>
									</h4>
								</div>
								<div id="mens" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="#">Aventura</a></li>
											<li><a href="#">RPG</a></li>
											<li><a href="#">Plataformas</a></li>
											<li><a href="#">Conducción</a></li>
											<li><a href="#">Deportes</a></li>
											<li><a href="#">Shooter</a></li>
											<li><a href="#">Lucha</a></li>
											<li><a href="#">Otros</a></li>
										</ul>
									</div>
								</div>
							</div>
							

							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Plataformas de juego</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Ofertas y combos</a></h4>
								</div>
							</div>
						</div>
						
						<!--/Banner de publicidad lateral-->
						<div class="bannerpublicidad text-center">
							<a href="#" title = "Ver detalles de esta oferta"><img href="#" src="images/home/Banner1.png" alt="" /></a>
						</div>
					
					</div>
				</div>
				
				<!--Productos destacados-->
				<div class="col-sm-9 padding-right">
					<div class="features_items">
						<h2 class="title text-center">Productos destacados</h2>
						<?php

						for ($i = 0; $i < count($IDProductosDetacados); $i++) {
							echo "<div class='col-sm-4'>";
							echo "<div class='product-image-wrapper'>";
							echo "<div class='single-products'>";
							echo "<div class='productinfo text-center'>";
							echo "<a href='detalles'><img src='".obtenerPortada($IDProductosDetacados[$i])."' title='ver detalles del producto' /></a>";
							echo "<h2>¢".$preciosDetacados[$i]."</h2>";
							echo "<p>".$nombresDetacados[$i]."</p>";
							echo "<a href='#' class='btn btn-default add-to-cart' title = 'Añadir este producto al carrito de compras'><i class='fa fa-shopping-cart'></i>Añadir al carrito</a>";
							echo "</div></div>";
							echo "<div class='choose'>";
							echo "<ul class='nav nav-pills nav-justified'>";
							echo "<li><a href='#' title = 'Añadir este producto a la wishlist'><i class='fa fa-plus-square'></i>Añadir a la wishlist</a></li>";
							echo "<li><a href='detalles' title = 'Ver más productos dentro de esta categoría'><i class='fa fa-plus-square'></i>Ver más</a></li>";
							echo "</ul></div></div></div>";
						}
						?>
						
					</div>
					
					<!--Vistazo a categorias-->
					<div class="category-tab">
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#submenu1" data-toggle="tab">Novedades</a></li>
								<li><a href="#submenu2" data-toggle="tab">Próximos lanzamientos</a></li>
								<li><a href="#submenu3" data-toggle="tab">Los mejores</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="submenu1" >
								<?php
								for ($i = 0; $i < count($IDProductosNovedades); $i++) {
									echo "<div class='col-sm-3'>";
									echo "<div class='product-image-wrapper'>";
									echo "<div class='single-products'>";
									echo "<div class='productinfo text-center'>";
									echo "<a href='detalles'><img src='".obtenerPortada($IDProductosNovedades[$i])."' title='Ver detalles de este producto' /></a>";
									echo "<h2>¢".$preciosNovedades[$i]."</h2>";
									echo "<p>".$nombresNovedades[$i]."</p>";
									echo "<a href='#' class='btn btn-default add-to-cart' title = 'Añadir este producto al carrito de compras'><i class='fa fa-shopping-cart'></i>Añadir al carrito</a>";
									echo "</div></div></div></div>";
								}
								
								?>
								
							</div>
							
							<div class="tab-pane fade" id="submenu2" >
								<?php
									for ($i = 0; $i < count($IDProductosLanzamientos); $i++) {
										echo "<div class='col-sm-3'>";
										echo "<div class='product-image-wrapper'>";
										echo "<div class='single-products'>";
										echo "<div class='productinfo text-center'>";
										echo "<a href='detalles'><img src='".obtenerPortada($IDProductosLanzamientos[$i])."' title='Ver detalles de este producto' /></a>";
										echo "<h2>¢".$preciosLanzamientos[$i]."</h2>";
										echo "<p>".$nombresLanzamientos[$i]."</p>";
										echo "<a href='#' class='btn btn-default add-to-cart' title = 'Añadir este producto al carrito de compras'><i class='fa fa-shopping-cart'></i>Añadir al carrito</a>";
										echo "</div></div></div></div>";
									}
								?>
								
							</div>
							
							<div class="tab-pane fade" id="submenu3" >
								<?php
									for ($i = 0; $i < count($IDProductosMejores); $i++) {
										echo "<div class='col-sm-3'>";
										echo "<div class='product-image-wrapper'>";
										echo "<div class='single-products'>";
										echo "<div class='productinfo text-center'>";
										echo "<a href='detalles'><img src='".obtenerPortada($IDProductosMejores[$i])."' title='Ver detalles de este producto' /></a>";
										echo "<h2>¢".$preciosMejores[$i]."</h2>";
										echo "<p>".$nombresMejores[$i]."</p>";
										echo "<a href='#' class='btn btn-default add-to-cart' title = 'Añadir este producto al carrito de compras'><i class='fa fa-shopping-cart'></i>Añadir al carrito</a>";
										echo "</div></div></div></div>";
									}
								?>
							</div>
							
						</div>
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
								<li><a href="#">Contáctenos</a></li>
								<li><a href="#">Preguntas frecuentes</a></li>
								<li><a href="#">Sobre nosotros</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Administración</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="adminProductos">Administración de productos</a></li>
								<li><a href="adminusuarios">Administración de usuarios</a></li>
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