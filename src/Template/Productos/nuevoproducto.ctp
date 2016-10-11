<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Tienda de videojuegos ficticia">
    <meta name="author" content="PsychoPato">
    <title>PsychoPatoShop - Administración de productos</title>
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
					
						<div align="left">
							<button type='button' onClick="parent.location='Adminproductos.php'" class='btn btn-default get' title = 'Añadir un nuevo producto a la base de datos'><-Volver a la lista de productos</button>
						</div>
						
							
						
						
						
					</div>
				</div>
				
				<!--Zona de contenido-->
				<div class="col-sm-9 padding-right">
					
					<!--Vistazo a categorias-->
					<div class="category-tab">
						
						<!--Submenus de cada categoria-->
						<div class="tab-content">
							<h1>Creación de producto</h1>
							<br>	
								
							<div class='tab-content'>
								<form id="guardarcambios" target="_blank" action="scripts/guardarnuevoproducto.php" method="post">
									<div class='col-sm-3'>
										<h3>ID:</h3>
										<input type='text' name='id' placeholder='ID de este producto'>
										<br><h3>Nombre:</h3>
										<input type='text' name='nombre' placeholder='Nombre'>
										<h3>Descripción:</h3>
										<textarea rows='7' cols='100' placeholder='Descripción del producto' name='descripcion'></textarea>
										<br><br><br><br>
									</div>
									
									<div class='col-sm-3'>
										<h3>Categoría:</h3>
										<select name='Categoria'>
											<?php
											$categoriasLista = array('Juego digital','Juego físico','Plataforma');
											$categoriasBase = array('1','2','3');
											for ($j = 0; $j < count($categoriasLista); $j++) {
												echo "<option value='".($j+1)."''>".$categoriasLista[$j]."</option>";
											}
											?>
										</select>
										
										<h3>Género:</h3>
										<select name='Genero'>
											<?php
											$generosLista = array('Aventura','RPG','Plataformas','Conducción','Deportes','Shooter','Lucha','Otros');
											$generosBase = array('aventura','rpg','plataformas','conduccion','deportes','shooter','lucha','otros');
											for ($j = 0; $j < count($generosLista); $j++) {
												echo "<option value='".$j."'>".$generosLista[$j]."</option> ";
											}
											?>
										</select>

										<h3>Plataforma:</h3>
										<select name='Plataforma'>
											<?php
											$plataformasLista = array('Play Station 4','Play Station 3','Xbox One','Xbox 360','Wii','Wii U','PC','PS Vita','Nintendo 3DS','Nintendo DS');
											$plataformasBase = array('ps4','ps3','one','360','wii','wiiu','pc','vita','3ds','ds');
											for ($j = 0; $j < count($plataformasLista); $j++) {
												echo "<option value='".$j."''>".$plataformasLista[$j]."</option>";
											}
											?>
										</select>
										
									</div>
									<div class='col-sm-3'>
										*La portada y sus capturas deben agregarse después de crear el producto*
										<br><br><br><br><br><br><br><br><br><br><br><br><br>
											<button type='submit' class='btn btn-default'>Crear producto</button>
										<br><br><br>
									</div>
								</form>
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