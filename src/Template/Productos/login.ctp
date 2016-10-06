<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Tienda de videojuegos ficticia">
    <meta name="author" content="PsychoPato">
    <title>PsychoPatoShop - Detalles de producto</title>
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
	//Datos de prueba
	$productoID = '1089372'; //La ID asignada al producto
	$nombre = 'The Witcher 3';
	$plataforma = 'ps4';
	$precio = '29 000';
	$portada = 'images/productos/juegos/aventura/thewitcher3.png';
	$capturas = 'images/capturas/The Witcher 3'; //Directorio con las capturas de este juego
	$genero = 'aventura';
	$descripcion = 'The Witcher 3: Wild Hunt es la tercera entrega de la serie The Witcher, que nos devuelve al conocido cazador de bestias Geralt de Rivia en una nueva aventura. En esta ocasión enfrentándose a la famosa Cacería Salvaje que le da nombre, y que se convierte en un desafío de dimensiones colosales para la primera incursión de la serie RPG del estudio polaco CD Projekt Red en los videojuegos de mundo abierto. El brujo retorna en mejor forma que nunca para un título que se alza con infinidad de premios a lo mejor del año, entre ellos el de 3DJuegos por parte de la revista y de los lectores. ';
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
								<li><a href='catalogo.php' title="Ver el catálogo de productos"><h4 class="panel-title">Catálogo</h4></a></li><p></p>
								<li><a href='ofertas.php' title="Ver la sección de combos y ofertas"><h4 class="panel-title">Combos y ofertas</h4></a></li><p></p>
								
								</ul>
							</div>
						</div>
						
						<!--/Banner de publicidad lateral-->
						<div class="bannerpublicidad text-center">
							<a href="#"><img href="#" src="images/home/Banner1.png" title="Ver oferta especial" /></a>
						</div>
						<br>
					</div>
				</div>
				
				<!--Zona de contenido-->
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							
							<div class="tab-pane fade active in" id="mostrarimagen2" >
								<?php
								echo "<img src='".$portada."' alt='' />";
								?>
							</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information">
								<?php
									echo "<h2>".$nombre."</h2>";
									echo "<p> Web ID: ".$productoID."</p>";
								?>
								<span>
									<?php
										echo "<span> ¢".$precio."</span>";
									?>
									<label>Cantidad:</label>
									<input type="text" value="3" /><br><br>
									<button type="button" class="btn btn-fefault cart" title="Añadir este producto al carrito de compras">
										<i class="fa fa-shopping-cart"></i> Añadir al carrito
									</button>
								</span>
								<p><b>Tipo:</b> Juego físico nuevo</p>
								<?php
									echo "<p><b>Género:</b> ".ucfirst($genero)."</p><br>";
								?>
								<a href='#' title="Añadir este producto a la wishlist"><i class='fa fa-star'></i>Añadir a la wishlist</a><p></p>
							</div>
						</div>
						
						<!-- Descripción del producto -->
						<?php
							echo "<h2>Descripción:</h2> <p align='justify'>".$descripcion."</p>";
						?>
					</div>
					
					<div id="slider-capturas" class="carousel slide" data-ride="carousel">
					
						<center>
						  <!-- Slider con las capturas del juego -->
							<div class="carousel-inner">
							
								<?php
									//Se buscan todas las imagenes dentro del directorio de capturas
									$files = array_diff(scandir($capturas), array('.', '..'));
									for ($i = 2; $i < (count($files)+2); $i++) {
										if ($i === 2) {
											echo "<div class='item active'>";
										} else {
											echo "<div class='item'>";
										}
										echo "<img src='".$capturas."/".$files[$i]."' alt=''>";
										echo "</div>";

									}
								?>
								
							</div>
						</center>

						<a class="left item-control" href="#slider-capturas" data-slide="prev" title="Ver la anterior imagen del producto">
							<i class="fa fa-angle-left"></i>
						</a>
						<a class="right item-control" href="#slider-capturas" data-slide="next" title="Ver la siguiente imagen del producto">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					<br><br>
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