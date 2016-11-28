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
  
	global $IDJuegosFisicos;
	global $nombres;
	global $consolas;
	global $precios;
	global $generos;
	
	global $IDJuegosDigitales;
	global $nombres2;
	global $consolas2;
	global $precios2;
	global $generos2;
	
	global $IDPlataformas;
	global $nombres3;
	global $precios3;
	
	$IDJuegosFisicos = array();
	$nombres = array();
	$consolas = array();
	$precios = array();
	$generos = array();
	
	$IDJuegosDigitales = array();
	$nombres2 = array();
	$consolas2 = array();
	$precios2 = array();
	$generos2 = array();
	
	$IDPlataformas = array();
	$nombres3 = array();
	$precios3 = array();
	
	//Recuperar el ID, nombre y precio de los productos
	foreach($datos as $dato):
		if ($dato->tipo == 1) {
			array_push($IDJuegosFisicos, $dato->idProducto);
			array_push($nombres, $dato->nombreProducto);
			array_push($precios, $dato->precio);
		}
		if ($dato->tipo == 2) {
			array_push($IDJuegosDigitales, $dato->idProducto);
			array_push($nombres2, $dato->nombreProducto);
			array_push($precios2, $dato->precio);
		}
		if ($dato->tipo == 3) {
			array_push($IDPlataformas, $dato->idProducto);
			array_push($nombres3, $dato->nombreProducto);
			array_push($precios3, $dato->precio);
		}
	endforeach;

	//Recuperar el género de cada juego
	$cuenta=0;
	if (count($IDJuegosFisicos)>0) {
		foreach($datos2 as $dato):
			if ($IDJuegosFisicos[$cuenta] == $dato->idVideoJuego) {
				array_push($generos, $dato->genero);
				
				//Obtener el nombre de la consola
				for ($i=0; $i<Count($IDPlataformas); $i++) {
					if ($IDPlataformas[$i] == $dato->idConsola) {
						array_push($consolas, $nombres3[$i]);
						break;
					}
				}

				$cuenta++;
			}
			if (($cuenta+1) > Count($IDJuegosFisicos)) {
				break;
			}
		endforeach;
	}
	
	$cuenta=0;
	if (count($IDJuegosDigitales)>0) {
		foreach($datos2 as $dato):
			if ($IDJuegosDigitales[$cuenta] == $dato->idVideoJuego) {
				array_push($generos2, $dato->genero);
				
				//Obtener el nombre de la consola
				for ($i=0; $i<Count($IDPlataformas); $i++) {
					if ($IDPlataformas[$i] == $dato->idConsola) {
						array_push($consolas2, $nombres3[$i]);
						break;
					}
				}
				
				$cuenta++;
			}
			if (($cuenta+1) > Count($IDJuegosDigitales)) {
				break;
			}
		endforeach;
	}
	
	$TipoVista;
	Include ("scripts/funciones.php");
	
	global $NombreUsuario;
	$NombreUsuario = $this->request->session()->read('Auth.User.username');
	//Función que muestra un juego físico en pantalla
	function mostrarProductoFisico($genero, $plataforma) {
		
		global $IDJuegosFisicos;
		global $nombres;
		global $precios;
		global $generos;
		global $consolas;
		global $NombreUsuario;
		
		for ($i = 0; $i < count($nombres); $i++) {
			//if (($generos[$i]===$genero || $genero==="todos")) {
			if (($generos[$i]===$genero || $genero==="todos") && ($consolas[$i]===$plataforma || $plataforma==="todas")) {
				?>
				<div class='col-sm-3'>
					<div class='product-image-wrapper'>
						<div class='single-products'>
							<div class='productinfo text-center'>
								<?php 
				                $ref = '/../detalles/'.$IDJuegosFisicos[$i]."'";
								echo "<a href='$ref' title = 'Ver los detalles de este producto'><img src='/../".obtenerPortada($IDJuegosFisicos[$i])."' alt='' /></a>";
								echo "<a href='$ref' title = 'Ver los detalles de este producto'><p>".$nombres[$i]."</p></a>";
								echo "<h2>¢".$precios[$i]."</h2>";
				
								//Botones de añadir al carrito y wishlist
								echo "<form method='post' accept-charset='utf-8' role='form' action='catalogo'>";
								
								echo "<input type='hidden' name='idPersona' value=$NombreUsuario>";
								echo "<input type='hidden' name='idProducto' value=$IDJuegosFisicos[$i]>";
								echo "<input type='hidden' name='cantidad' value=".(int)'1'." >";
								
								//echo "<button type='submit' title='Añadir este producto a la wishlist'><i class='fa fa-star'></i>Añadir a wishlist</button>";
                                if ($NombreUsuario) {
                                    echo "<button type='submit' class='btn btn-default add-to-cart' title='Añadir este producto al carrito de compras'>
                                        <i class='fa fa-shopping-cart'></i>Añadir al carrito
                                    </button>";
                                }
								
								echo "</form>";
								?>
								<?php
									if ($NombreUsuario === "admin") {
								?>
								<button type='button' onClick="parent.location='/../adminProductos/<?php echo"$IDJuegosFisicos[$i]";?>'" class='btn btn-default add-to-cart'
									title = 'Editar la información de este producto (Admin)'><i class="fa fa-pencil-square-o"></i></button>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
				<?php
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
		global $NombreUsuario;
		
		for ($i = 0; $i < count($nombres2); $i++) {
			if (($generos2[$i]===$genero || $genero==="todos") && ($consolas2[$i]===$plataforma || $plataforma==="todas")) {
				?>
				<div class='col-sm-3'>
					<div class='product-image-wrapper'>
						<div class='single-products'>
							<div class='productinfo text-center'>
								<?php 
				                $ref = '/../detalles/'.$IDJuegosDigitales[$i]."'";
								echo "<a href='$ref' title = 'Ver los detalles de este producto'><img src='/../".obtenerPortada($IDJuegosDigitales[$i])."' alt='' /></a>";
								echo "<a href='$ref' title = 'Ver los detalles de este producto'><p>".$nombres2[$i]."</p></a>";
								echo "<h2>¢".$precios2[$i]."</h2>";
				
								//Botones de añadir al carrito y wishlist
								echo "<form method='post' accept-charset='utf-8' role='form' action='catalogo'>";
								
								echo "<input type='hidden' name='idPersona' value=$NombreUsuario>";
								echo "<input type='hidden' name='idProducto' value=$IDJuegosDigitales[$i]>";
								echo "<input type='hidden' name='cantidad' value=".(int)'1'." >";
								
                                if ($NombreUsuario) {
                                    echo "<button type='submit' class='btn btn-default add-to-cart' title='Añadir este producto al carrito de compras'>
                                        <i class='fa fa-shopping-cart'></i>Añadir al carrito
                                    </button>";
                                }
								echo "</form>";
								
								?>
							<?php
								if ($NombreUsuario === "admin") {
							?>
							<button type='button' onClick="parent.location='/../adminProductos/<?php echo"$IDJuegosDigitales[$i]";?>'" class='btn btn-default add-to-cart'
								title = 'Editar la información de este producto (Admin)'><i class="fa fa-pencil-square-o"></i></button>
							<?php } ?>

								
							</div>
							<img src='/../images/home/digital.png' class='new' alt='' />
						</div>
					</div>
				</div>
				<?php
			}	
		}
	}

	//Función que muestra una plataforma en pantalla
	function mostrarPlataforma() {
		global $IDPlataformas;
		global $nombres3;
		global $precios3;
		global $NombreUsuario;
		
		for ($i = 0; $i < count($nombres3); $i++) {
			?>
			<div class='col-sm-3'>
				<div class='product-image-wrapper'>
					<div class='single-products'>
						<div class='productinfo text-center'>
							<?php
							$ref = '/../detalles/'.$IDPlataformas[$i]."'";
							echo "<a href='$ref' title = 'Ver los detalles de este producto'><img src='/../".obtenerPortada($IDPlataformas[$i])."' alt='' /></a>";
							echo "<a href='$ref' title = 'Ver los detalles de este producto'><p>".$nombres3[$i]."</p></a>";
							echo "<h2>¢".$precios3[$i]."</h2>";
							
							//Botones de añadir al carrito y wishlist
							echo "<form method='post' accept-charset='utf-8' role='form' action='catalogo'>";
							
							echo "<input type='hidden' name='idPersona' value=$NombreUsuario>";
							echo "<input type='hidden' name='idProducto' value=$IDPlataformas[$i]>";
							echo "<input type='hidden' name='cantidad' value=".(int)'1'." >";
							
							if ($NombreUsuario) {
                                echo "<button type='submit' class='btn btn-default add-to-cart' title='Añadir este producto al carrito de compras'>
                                    <i class='fa fa-shopping-cart'></i>Añadir al carrito
                                </button>";
                            }
							echo "</form>";
							?>
							<?php
							if ($NombreUsuario === "admin") {
							?>
							<button type='button' onClick="parent.location='/../adminProductos/<?php echo"$IDPlataformas[$i]";?>'" class='btn btn-default add-to-cart'
								title = 'Editar la información de este producto (Admin)'><i class="fa fa-pencil-square-o"></i></button>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
			<?php
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
		<?php include(dirname(__FILE__)."/../includes/header.php");?>
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
								<li class='active'><a href='#submenu1' data-toggle='tab' title="Ver el catálogo de juegos físicos"><h4 class="panel-title">Juegos físicos</h4></a></li><p></p>
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
							<a href="/../ofertas"><img title="Ver oferta especial" src="/../images/home/Banner1.png" /></a>
						</div> <br>
					
					</div>
				</div>
				
				<!--Zona de contenido-->
				<div class="col-sm-9 padding-right">
					
					<!--Vistazo a categorias-->
					<div class="category-tab">
						
						<!--Submenus de cada categoria-->
						<div class="tab-content">
							<?php if ($TipoVista != "digitales" && $TipoVista != "plataformas") { ?>
								<div class="tab-pane fade active in" id="submenu1" >
							<?php } else { ?>
								<div class="tab-pane fade" id="submenu1" >
							<?php } ?>
							
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
						    
						    <?php if ($TipoVista == "digitales") { ?>
								<div class="tab-pane fade active in" id="submenu2" >
							<?php } else { ?>
								<div class="tab-pane fade" id="submenu2" >
							<?php } ?>
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
							
							<?php if ($TipoVista == "plataformas") { ?>
								<div class="tab-pane fade active in" id="submenu3" >
							<?php } else { ?>
								<div class="tab-pane fade" id="submenu3" >
							<?php } ?>
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
