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
  <?php 
  
	//Datos de prueba para juegos físicos
	$IDProductos = array(
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
	
	$tipos = array( //1=digital 2=fisico 3=plataforma
	'2',
	'2',
	'2',
	'1',
	'2',
	'2',
	'2',
	'2',
	'1',
	'2',
	'2',
	'2',
	'2',
	'2',
	'1',
	'2',
	'2',
	'2',
	'3');

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
	
	$descripcion = array(
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
	
	Include ("funciones.php");
	
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
					
						<div align="right">
							<button type='button' class='btn btn-default get' title = 'Añadir un nuevo producto a la base de datos'>Añadir producto</button>
						</div>
						<br>
						<!--Barra de busqueda-->
						<div align="left" class="search_box pull-right">
							<input type="text" placeholder="Búsqueda"/>
						</div>
						
						<div class='col-sm-12'>
							<ul class='nav nav-tabs'>
								<li class='active'><a href='#filtrofisicos' data-toggle='tab'><font size="1">Físicos</font></a></li>
								<li><a href="#filtrodigitales" data-toggle="tab"><font size="1">Digitales</font></a></li>
								<li><a href="#filtroplataformas" data-toggle="tab"><font size="1">Plataformas</font></a></li>
							</ul>
						</div>
							
						
						
						<div class="brands_products">
							<div class="brands-name">
								</br></br></br>	</br>
								<style>
									div.scroll {
										width: 270px;
										height: 400px;
										overflow: scroll;
									}
								</style>
								<div class="scroll">
								<ul class="nav nav-pills nav-stacked">
									<!--/Lista de productos físicos-->
									<?php
										for ($i = 0; $i < count($nombres); $i++) {
											echo "<li><a href='#".$IDProductos[$i]."' data-toggle='tab' title='Ver los detalles de este producto'><h4 class='panel-title'><font size='1'>".$IDProductos[$i]." (".$nombres[$i].")</font></h4></a></li><p></p>";
										}
									?>
									
								</ul></div>
							</div>
						</div>
					</div>
				</div>
				
				<!--Zona de contenido-->
				<div class="col-sm-9 padding-right">
					
					<!--Vistazo a categorias-->
					<div class="category-tab">
						
						<!--Submenus de cada categoria-->
						<div class="tab-content">	
						    <?php //Mostrar nombre y código
							for ($i = 0; $i < count($IDProductos); $i++) {
								if ($i === 0) {
									echo "<div class='tab-pane fade active in' id='".$IDProductos[$i]."' >";
								} else {
									echo "<div class='tab-pane fade' id='".$IDProductos[$i]."' >";
								}
								echo "<h1>".$IDProductos[$i]." (".$nombres[$i].")</h1>";
								
							?>
								<br>
								<div class='col-sm-12'>
									<ul class='nav nav-tabs'>
											<?php //Menu de navegacion
											echo "<li class='active'><a href='#datosgenerales".$IDProductos[$i]."' data-toggle='tab'>Datos generales</a></li>";
											echo "<li><a href='#capturas".$IDProductos[$i]."' data-toggle='tab'>Capturas</a></li>";
											echo "<li><a href='#borrar".$IDProductos[$i]."' data-toggle='tab'>Borrar producto</a></li>";
											?>
									</ul>
								</div>
									
								
								<div class='tab-content'>
									<?php echo "<div class='tab-pane fade active in' id='datosgenerales".$IDProductos[$i]."' >"; ?>
										<form id="guardarcambios" target="_blank" action="datosproducto.php" method="post">
											<div class='col-sm-3'>
												<h3>ID:</h3>
												<?php echo "".$IDProductos[$i]; ?>
												<input type="hidden" name="id" value="<?php echo $IDProductos[$i]; ?>">
												<br><h3>Nombre:</h3>
												<?php echo "<input type='text' name='nombre' placeholder='Nombre' value='".$nombres[$i]."'>"; ?>
												<h3>Descripción:</h3>
												<?php echo "<textarea rows='7' cols='100' name='descripcion'>".$descripcion[$i]."</textarea>"; ?>
												<br><br><br><br>
											</div>
											
											<div class='col-sm-3'>
												<h3>Categoría:</h3>
												<select name='Categoria'>
													<?php
													$categoriasLista = array('Juego digital','Juego físico','Plataforma');
													$categoriasBase = array('1','2','3');
													for ($j = 0; $j < count($categoriasLista); $j++) {
														if ($tipos[$i] === $categoriasBase[$j]) {
															echo "<option selected='selected' value='".$j."''>".$categoriasLista[$j]."</option>";
														} else {
															echo "<option value='".($j+1)."''>".$categoriasLista[$j]."</option>";
														}
													}
													?>
												</select>
												
												<h3>Género:</h3>
												<select name='Genero'>
													<?php
													$generosLista = array('Aventura','RPG','Plataformas','Conducción','Deportes','Shooter','Lucha','Otros');
													$generosBase = array('aventura','rpg','plataformas','conduccion','deportes','shooter','lucha','otros');
													for ($j = 0; $j < count($generosLista); $j++) {
														if ($generos[$i] === $generosBase[$j]) {
															echo "<option selected='selected' value='".$j."'>".$generosLista[$j]."</option> ";
														} else {
															echo "<option value='".$j."'>".$generosLista[$j]."</option> ";
														}
													}
													?>
												</select>

												<h3>Plataforma:</h3>
												<select name='Plataforma'>
													<?php
													$plataformasLista = array('Play Station 4','Play Station 3','Xbox One','Xbox 360','Wii','Wii U','PC','PS Vita','Nintendo 3DS','Nintendo DS');
													$plataformasBase = array('ps4','ps3','one','360','wii','wiiu','pc','vita','3ds','ds');
													for ($j = 0; $j < count($plataformasLista); $j++) {
														if ($consolas[$i] === $plataformasBase[$j]) {
															echo "<option selected='selected' value='".$j."''>".$plataformasLista[$j]."</option>";
														} else {
															echo "<option value='".$j."''>".$plataformasLista[$j]."</option>";
														}
													}
													?>
												</select>
												<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
												<button type='submit' class='btn btn-default'>Guardar cambios</button>
												<br><br><br>
											</div>
										</form>
										
										<div class='col-sm-3'>
											<h3>Portada:</h3>
											<?php echo "<img src='".obtenerPortada($IDProductos[$i])."' title = 'Portada actual de este producto' />"; ?>
											<br> <br>

											<form target="_blank" action="upload.php" method="post" enctype="multipart/form-data">
												<input type="file" name="fileToUpload" id="fileToUpload"><br>
												<button type='submit' class='btn btn-default get' name="submit" title = 'Subir la imagen cargada'>Subir imagen</button>
												<br>
												<?php
													echo "La imagen se subirá en: ";
													echo "<input type='text' name='val1' id='val1' value='images/productos/".$IDProductos[$i]."/Portada/'></input>";
												?>
												<button type='button' onClick="history.go(0)" class='btn btn-default get' title = 'Refrescar la página'>Refrescar página</button>

											</form>
										</div>
									</div>
									
									<?php echo "<div class='tab-pane fade' id='capturas".$IDProductos[$i]."' >"; ?>
										<h3>Subir una captura:</h3>
										<form target="_blank" action="upload.php" method="post" enctype="multipart/form-data">
											<input type="file" name="fileToUpload" id="fileToUpload"><br>
											<button type='submit' class='btn btn-default get' name="submit" title = 'Subir la imagen cargada'>Subir imagen</button>
											<br>
											<?php
												echo "La imagen se subirá en: ";
												echo "<input type='text' name='val1' id='val1' value='images/productos/".$IDProductos[$i]."/Capturas/'></input>";
											?>
											<br><br>
											<button type='button' onClick="history.go(0)" class='btn btn-default get' title = 'Refrescar la página'>Refrescar página</button>

										</form>
										
										<div class='col-sm-5'>
											<?php 
											$directorioCapturas = "images/productos/".$IDProductos[$i]."/Capturas/";
											if (!file_exists($directorioCapturas)) { //Si no existe la carpeta, la crea
												mkdir($directorioCapturas, 0777, true);
											}
											$files = array_diff(scandir($directorioCapturas), array('.', '..'));
											
											for ($j = 0; $j < count($files); $j++) {
												echo "<h3>Captura ".($j+1).":</h3>";
												echo "<img src='".$directorioCapturas."/".$files[$j+2]."' title = 'Captura de este producto' />";
											}
											
											?>
											<br><br>Nota: de momento no se pueden borrar capturas.
											<br><br>
										</div>
									</div>
									
									<?php echo "<div class='tab-pane fade' id='borrar".$IDProductos[$i]."' >"; ?>
										<h3>Borrar este producto de la base de datos:</h3>
										<input type="button" value="Borrar producto">
									</div>
									
								</div>
							</div>
							<?php } ?>							
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