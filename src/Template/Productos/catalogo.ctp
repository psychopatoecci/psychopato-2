<!DOCTYPE html>

<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Tienda de videojuegos ficticia">
    <meta name="author" content="PsychoPato">
    <title>PsychoPatoShop - Catálogo de productos</title>
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
  global $precios;
  global $nombres;
  global $consolas;
  global $generos;
  global $IDJuegosDigitales;
  global $precios2;
  global $nombres2;
  global $consolas2;
  global $generos2;
  global $IDPlataformas;
  global $precios3;
  global $nombres3;

  $IDJuegosFisicos   = $idFisicos;
  $precios           = $precioFisicos;
  $nombres           = $nombreFisicos;
  $consolas          = $consolaFisicos;
  $generos           = $generoFisicos;
  $IDJuegosDigitales = $idDigitales;
  $precios2          = $precioDigitales;
  $nombres2          = $nombreDigitales;
  $consolas2         = $consolaDigitales;
  $generos2          = $generoDigitales;
  $IDPlataformas     = $idConsolas;
  $precios3          = $precioConsolas;
  $nombres3          = $nombreConsolas;

	Include ("scripts/funciones.php");
	
	global $NombreUsuario;
	$NombreUsuario = $this->request->session()->read('Auth.User.username');
	
	//Función que muestra un juego físico en pantalla
	function mostrarProductoFisico($genero, $plataforma, $isAdmin) {

		global $IDJuegosFisicos;
		global $nombres;
		global $precios;
		global $generos;
		global $consolas;
		global $NombreUsuario;
		
		for ($i = 0; $i < count($nombres); $i++) {
			if (($generos[$i]===$genero || $genero==="todos") && ($consolas[$i]===$plataforma || $plataforma==="todas")) {
				echo "<div class='col-sm-3'>";
				echo "<div class='product-image-wrapper'>";
				echo "<div class='single-products'>";
				echo "<div class='productinfo text-center'>";
                $ref = 'detalles/'.$IDJuegosFisicos[$i]."'";
                if ($isAdmin) {
                    //$ref = 'productos/adminProductos/'.$IDJuegosFisicos[$i]."'";
                     $ref = 'detalles/'.$IDJuegosFisicos[$i]."'";
                }
				echo "<a href='$ref' title = 'Ver los detalles de este producto'><img src='".obtenerPortada($IDJuegosFisicos[$i])."' alt='' /></a>";
				echo "<a href='$ref' title = 'Ver los detalles de este producto'><p>".$nombres[$i]."</p></a>";
				echo "<h2>¢".$precios[$i]."</h2>";
                echo "<form method='post' accept-charset='utf-8' role='form' action='/productos/agregar-a-wish-list'>";
				echo "<div style='display:none;'>";
                echo "<input name='_method' value='POST' type='hidden'>";
                echo "</div><input name='idProducto' value='".$IDJuegosFisicos[$i]."' type='hidden'>";
                //echo "<button type='submit' class='btn btn-default'>Agregar a wishlist</button>";
				//echo "<a href='#' title = 'Añadir este producto al carrito de compras' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Añadir al carrito</a>";
				
				echo "</form>";

				//Botones de añadir al carrito y wishlist
				echo "<form method='post' accept-charset='utf-8' role='form' action='catalogo'>";
				
				echo "<input type='hidden' name='idPersona' value=$NombreUsuario>";
				echo "<input type='hidden' name='idProducto' value=$IDJuegosFisicos[$i]>";
				echo "<input type='hidden' name='cantidad' value=".(int)'1'." >";
				
				//echo "<button type='submit' title='Añadir este producto a la wishlist'><i class='fa fa-star'></i>Añadir a wishlist</button>";
					
				echo "<button type='submit' class='btn btn-default add-to-cart' title='Añadir este producto al carrito de compras'>
					<i class='fa fa-shopping-cart'></i>Añadir al carrito</button>";
				echo "</form>";
				
				echo "</div> </div> </div> </div>";
			}		
		}
		
	}
	

	//Función que muestra un juego digital en pantalla
	function mostrarProductoDigital($genero, $plataforma, $isAdmin) {
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
                $ref = 'detalles/'.$IDJuegosDigitales[$i]."'";
                if ($isAdmin){
                    $ref = 'productos/adminProductos/'.$IDJuegosDigitales[$i]."'";
                }
				echo "<a href='$ref' title = 'Ver los detalles de este producto'><img src='".obtenerPortada($IDJuegosDigitales[$i])."' alt='' /></a>";
				echo "<a href='$ref' title = 'Ver los detalles de este producto'><p>".$nombres2[$i]."</p></a>";
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
	function mostrarPlataforma($idConsolas,$nombreConsolas,$precioConsolas,$isAdmin) {
		global $IDPlataformas;
		global $nombres3;
		global $precios3;
		
		for ($i = 0; $i < count($nombreConsolas); $i++) {
			echo "<div class='col-sm-3'>";
			echo "<div class='product-image-wrapper'>";
			echo "<div class='single-products'>";
			echo "<div class='productinfo text-center'>";
            $ref = 'detalles/'.$IDPlataformas[$i]."'";
            if ($isAdmin){
                $ref = 'productos/adminProductos/'.$IDPlataformas[$i]."'";
            }
			echo "<a href='$ref' title = 'Ver los detalles de este producto'><img src='".obtenerPortada($IDPlataformas[$i])."' alt='' /></a>";
			echo "<a href='$ref' title = 'Ver los detalles de este producto'><p>".$nombres3[$i]."</p></a>";
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
                                        <?php foreach ($generosT as $genero)
                                            echo "<li><a href='#".$genero['genero']."1' data-toggle='tab'>".$genero['genero']."</a></li>"
                                        ?>
									</ul>
								</div>
								
								<div class="tab-content">
                                <?php $isAdmin = $this->request->session()->read('Auth.User.role') == 'admin';
                                foreach ($generosT as $genero) {
									echo "<div class='tab-pane fade' id='".$genero['genero']."1' >";
										mostrarProductoFisico($genero['genero'], "todas", $isAdmin);
									echo "</div>";
                                }
								?>
								</div>
						    </div>
						    
							<div class="tab-pane fade" id="submenu2" >
								<h1>Juegos digitales</h1>
								<div class="col-sm-12">
									<ul class="nav nav-tabs">
                                        <?php foreach ($generosT as $genero)
                                            echo "<li><a href='#".$genero['genero']."2' data-toggle='tab'>".$genero['genero']."</a></li>"
                                        ?>
									</ul>
								</div>
								
								<div class="tab-content">
                                <?php 
                                foreach ($generosT as $genero) {
									echo "<div class='tab-pane fade' id='".$genero['genero']."2' >";
										mostrarProductoDigital($genero['genero'], "todas", $isAdmin);
									echo "</div>";
                                }
								?>
                                </div>
							</div>
							
							<div class="tab-pane fade" id="submenu3" >
								<h1>Plataformas de juegos</h1><br>
								<?php 
								mostrarPlataforma($idConsolas,$nombreConsolas,$precioConsolas, $isAdmin)
								?>
							</div> 
							
							<div class="tab-pane fade" id="filtrops4" >
								<h1>Juegos para Play Station 4</h1><br>
								<?php 
								mostrarProductoFisico("todos", "ps4", $isAdmin);
								mostrarProductoDigital("todos", "ps4", $isAdmin);
								?>
							</div>
							<div class="tab-pane fade" id="filtrops3" >
								<h1>Juegos para Play Station 3</h1><br>
								<?php 
								mostrarProductoFisico("todos", "ps3", $isAdmin);
								mostrarProductoDigital("todos", "ps3", $isAdmin);
								?>
							</div>
							<div class="tab-pane fade" id="filtroone" >
								<h1>Juegos para Xbox One</h1><br>
								<?php 
								mostrarProductoFisico("todos", "one", $isAdmin);
								mostrarProductoDigital("todos", "one", $isAdmin);
								?>
							</div>
							<div class="tab-pane fade" id="filtro360" >
								<h1>Juegos para Xbox 360</h1><br>
								<?php 
								mostrarProductoFisico("todos", "360", $isAdmin);
								mostrarProductoDigital("todos", "360", $isAdmin);
								?>
							</div>
							<div class="tab-pane fade" id="filtrowii" >
								<h1>Juegos para Wii</h1><br>
								<?php 
								mostrarProductoFisico("todos", "wii", $isAdmin);
								mostrarProductoDigital("todos", "wii", $isAdmin);
								?>
							</div>
							<div class="tab-pane fade" id="filtrowiiu" >
								<h1>Juegos para WiiU</h1><br>
								<?php 
								mostrarProductoFisico("todos", "wiiu", $isAdmin);
								mostrarProductoDigital("todos", "wiiu", $isAdmin);
								?>
							</div>
							<div class="tab-pane fade" id="filtropc" >
								<h1>Juegos para PC</h1><br>
								<?php 
								mostrarProductoFisico("todos", "pc", $isAdmin);
								mostrarProductoDigital("todos", "pc", $isAdmin);
								?>
							</div>
							<div class="tab-pane fade" id="filtrovita" >
								<h1>Juegos para PS Vita</h1><br>
								<?php 
								mostrarProductoFisico("todos", "vita", $isAdmin);
								mostrarProductoDigital("todos", "vita", $isAdmin);
								?>
							</div>
							<div class="tab-pane fade" id="filtro3ds" >
								<h1>Juegos para Nintendo 3DS</h1><br>
								<?php 
								mostrarProductoFisico("todos", "3ds", $isAdmin);
								mostrarProductoDigital("todos", "3ds", $isAdmin);
								?>
							</div>
							<div class="tab-pane fade" id="filtrods" >
								<h1>Juegos para Nintendo DS</h1><br>
								<?php 
								mostrarProductoFisico("todos", "ds", $isAdmin);
								mostrarProductoDigital("todos", "ds", $isAdmin);
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
		<?php include(dirname(__FILE__)."/../includes/footer.php");?>
	</footer>

    <script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/price-range.js"></script> <!-- Para Slider-->
    <script src="../js/jquery.prettyPhoto.js"></script> <!--Para Galerias-->
    <script src="../js/main.js"></script>
</body>
</html>
