<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Tienda de videojuegos ficticia">
    <meta name="author" content="PsychoPato">
    <title>PsychoPatoShop - Ofertas y combos</title>
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
	//Datos de prueba para productos en oferta
	$IDOfertas = array(
	'PROD130043',
	'PROD10192',
	'PROD102710',
	'PROD125163',
	'PROD137584',
	'PROD126427');
	
	$nombres = array(
	'The Witcher 3',
	'Persona 5',
	'Zelda: Breath of the Wild',
	'Halo 5: Guardians',
	'Xbox One',
	'The Last Guardian');
	
	$tipos= array( //1=Digital, 2=Físico, 3=Plataforma
	'2',
	'1',
	'2',
	'1',
	'3',
	'2');
	
	$precios = array( //Precios sin el descuento
	'29 000',
	'59 500',
	'59 000',
	'49 000',
	'390 000',
	'59 000');
	
	$descuentos= array( //Descuento en porcentaje
	'20',
	'10',
	'5',
	'20',
	'35',
	'40');
	
	$fechaInicio = array( //Fecha en la que comienza la oferta
	'12/11/2016',
	'13/11/2016',
	'02/11/2016',
	'05/01/2016',
	'10/11/2016',
	'06/11/2016');

	$fechaFinal= array( //Fecha en la que termina la oferta
	'14/11/2016',
	'19/11/2016',
	'31/11/2016',
	'05/11/2016',
	'11/11/2016',
	'12/11/2016');
	
	//Datos de prueba para combos de 2 productos
	$preciosCombo = array( //Precio del combo (todo junto)
	'349 000',
	'299 500',
	'68 500');
	
	$nombres1Combo = array( //Primer producto del combo
	'Play Station 4',
	'Wii U',
	'Fire Emblem Fates: Conquest');
	
	$nombres2Combo = array( //Segundo producto del combo
	'The Witcher 3',
	'Zelda: Breath of the Wild',
	'Zelda: Ocarina of Time 3D');
	
	$tipos1Combo= array( //1=Digital, 2=Físico, 3=Plataforma
	'3',
	'3',
	'2');
	
	$tipos2Combo= array( //1=Digital, 2=Físico, 3=Plataforma
	'2',
	'2',
	'2');
	
	$ID1Combo= array(
	'PROD130043',
	'PROD140849',
	'PROD104990');
	
	$ID2Combo= array(
	'PROD101406',
	'PROD102710',
	'PROD10477');
	
	$portadas1Combo = array(
	'images/productos/consolas/PS4.png',
	'images/productos/consolas/WiiU.jpg',
	'images/productos/juegos/rpg/FFConquest.png');
	
	$portadas2Combo = array(
	'images/productos/juegos/aventura/thewitcher3.png',
	'images/productos/juegos/aventura/zeldabotw.png',
	'images/productos/juegos/aventura/zelda3ds.png');
	
	Include ("funciones.php");
	
	//Función que devuelve el precio con un descuento
	function calcularDescuento($precio, $descuento) {
		$precioSinEspacios = str_replace(' ', '', $precio);
		$resultado = $precioSinEspacios-(($precioSinEspacios/100)*$descuento);
		return $resultado;
	}

	//Función que muestra una oferta en pantalla
	function mostrarOferta() {
		global $IDOfertas;
		global $nombres;
		global $tipos;
		global $precios;
		global $descuentos;
		global $fechaInicio;
		global $fechaFinal;
		
		for ($i = 0; $i < count($nombres); $i++) { 
			echo "<div class='col-sm-3'>";
			echo "<div class='product-image-wrapper'>";
			echo "<div class='single-products'>";
			echo "<div class='productinfo text-center'>";
			echo "<br><h2>¡Descuento del ".$descuentos[$i]."%!</h2>";
			echo "<a href='detalles.php' title = 'Ver detalles del producto'><img src='".obtenerPortada($IDOfertas[$i])."' alt='' /></a>";
			echo "<a href='detalles.php' title = 'Ver detalles del producto'><p>".$nombres[$i]."</p></a>";
			echo "<h4><strike>¢".$precios[$i]."</strike></h4>";
			echo "<h2>¢".calcularDescuento($precios[$i], $descuentos[$i])."</h2>";
			echo "<br><b>Duración de la oferta:</b><br>".$fechaInicio[$i]." - ".$fechaFinal[$i]."<br><br>";
			echo "<a href='#' title = 'Añadir oferta a la wishlist'><i class='fa fa-star'></i>Añadir a wishlist</a><p></p>";
			echo "<a href='#' class='btn btn-default add-to-cart' title = 'Añadir oferta al carrito de compras'><i class='fa fa-shopping-cart'></i>Añadir al carrito</a>";
			echo "</div>";
			if ($tipos[$i]==="1") { //Digital
				echo "<img src='images/home/digital.png' class='new' alt='' />";
			}
			echo "</div> </div> </div>";
		}
	}
	
	//Función que muestra un combo en pantalla
	function mostrarCombo() {
		global $nombres1Combo;
		global $nombres2Combo;
		global $preciosCombo;
		global $ID1Combo;
		global $ID2Combo;
		global $tipos1Combo;
		global $tipos2Combo;
		
		for ($i = 0; $i < count($nombres1Combo); $i++) { 
			echo "<div class='col-sm-3'>";
			echo "<div class='product-image-wrapper'>";
			echo "<div class='single-products'>";
			echo "<div class='productinfo text-center'>";
			echo "<a href='detalles.php' title = 'Ver detalles del producto'><img src='".obtenerPortada($ID1Combo[$i])."' alt='' /></a>";
			echo "<a href='detalles.php' title = 'Ver detalles del producto'><img src='".obtenerPortada($ID2Combo[$i])."' alt='' /></a>";
			echo "<a href='detalles.php' title = 'Ver detalles del producto'><p>".$nombres1Combo[$i]."</p></a>";
			echo "<a href='detalles.php' title = 'Ver detalles del producto'><p> + <br>".$nombres2Combo[$i]."</p></a>";
			echo "<h2>¢".$preciosCombo[$i]."</h2>";
			echo "<a href='#' title = 'Añadir oferta a la wishlist'><i class='fa fa-star'></i>Añadir a wishlist</a><p></p>";
			echo "<a href='#' class='btn btn-default add-to-cart' title = 'Añadir oferta al carrito de compras'><i class='fa fa-shopping-cart'></i>Añadir al carrito</a>";
			echo "</div>";
			if ($tipos1Combo[$i][0]==="D") { //Digital
				echo "<img src='images/home/digital.png' class='new' alt='' />";
			}
			echo "</div> </div> </div>";
		}
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
								<li><a href="index.html" class="active">Inicio</a></li>
								<li class="dropdown"><a href="#">Juegos<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="categoria1.html">Play Station</a></li>
										<li><a href="categoria2.html">Xbox</a></li> 
										<li><a href="categoria3.html">Nintendo</a></li> 
										<li><a href="categoria4.html">PC</a></li> 
                                    </ul>
                                </li> 
								<li class="dropdown"><a href="#">Ofertas<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="ofertas1.html">Ofertas de verano</a></li>
										<li><a href="ofertas2.html">Ofertas diarias</a></li>
                                    </ul>
                                </li> 
								<li><a href="404.html">Consolas</a></li>
								<li><a href="contacto.html">Contacto</a></li>
							</ul>
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
								<li><a href='#submenu1' data-toggle='tab' title="Ver las ofertas actuales"><h4 class="panel-title">Ofertas</h4></a></li><p></p>
								<li><a href='#submenu2' data-toggle='tab' title="Ver los combos de productos disponibles"><h4 class="panel-title">Combos</h4></a></li><p></p>
								
								<!--/Contador de juegos por plataforma-->

								</ul>
							</div>
						</div>
						
						<!--/Banner de publicidad lateral-->
						<div class="bannerpublicidad text-center">
							<img href="#" title="Ver oferta especial" src="images/home/Banner2.png" alt="" />
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
								<h1>Ofertas especiales</h1><br>
								
								<div class="tab-content">
									<?php 
										mostrarOferta();
									?>
								</div>
						    </div>
						    
							<div class="tab-pane fade" id="submenu2" >
								<h1>Combos de productos</h1><br>
								<div class="tab-content">
									<?php 
										mostrarCombo();
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

    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/price-range.js"></script> <!-- Para Slider-->
    <script src="js/jquery.prettyPhoto.js"></script> <!--Para Galerias-->
    <script src="js/main.js"></script>
</body>
</html>