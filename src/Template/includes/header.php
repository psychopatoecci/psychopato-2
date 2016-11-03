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

<!--Header intermedio-->
<div class="header-middle">
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
				<div class="logo pull-left">
					<a href="/" title="Volver a la página principal"><img src="images/home/Logo.png" alt="Regresar al inicio" /></a>
				</div>
				
			</div>
			<div class="col-sm-8">
				<div class="shop-menu pull-right">
					<ul class="nav navbar-nav">
						<?php
							$logged = "/users/login";
							if ($this->request->session()->read('Auth.User.id')) {
								$logged = "/personas/cuenta";
							}
							echo"<li><a href=\"$logged\" title=\"Ver datos de la cuenta\"><i class=\"fa fa-user\"></i> Cuenta</a></li>";
						?>						
						<li><a href="" title="Ver la wishlist"><i class="fa fa-star"></i> Wishlist</a></li>
						<li><a href="" title="Ver el carrito de compras"><i class="fa fa-shopping-cart"></i> Carrito</a></li>
						<?php
						if ($this->request->session()->read('Auth.User.id')) {
							echo "<li><a href=\"/users/logout\" title=\"Cerrar sesión\"><i class=\"fa fa-lock\"></i> Cerrar sesión</a></li>";
						} else {
							echo "<li><a href=\"/users/login\" title=\"Iniciar sesión como cliente\"><i class=\"fa fa-lock\"></i> Iniciar sesión</a></li>";
						}
						?>
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
						<li><a href="/" class="active" title="Volver a la página principal">Inicio</a></li>
						<li class="dropdown"><a href="#">Productos<i class="fa fa-angle-down"></i></a>
                            			<ul role="menu" class="sub-menu">
                               			<li><a href="catalogo" title="Ver el catálogo de juegos físicos">Juegos físicos</a></li>
						<li><a href="catalogo" title="Ver el catálogo de juegos digitales">Juegos digitales</a></li> 
						<li><a href="catalogo" title="Ver el catálogo de plataformas de juegos">Plataformas</a></li> 
                            		</ul>
                        		</li> 
						<li><a href="ofertas" title="Ver las ofertas disponibles">Ofertas</a></li>
						<li><a href="ofertas" title="Ver los combos disponibles">Combos</a></li>
						<li><a href="404" title="Ver la información de contacto de la empresa">Contacto</a></li>
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
