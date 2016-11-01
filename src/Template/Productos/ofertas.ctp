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
	global $IDOfertas;
	$IDOfertas = array(
	'PROD130043',
	'PROD10192',
	'PROD102710',
	'PROD125163',
	'PROD137584',
	'PROD126427');
	
	global $nombres;
	$nombres = array(
	'The Witcher 3',
	'Persona 5',
	'Zelda: Breath of the Wild',
	'Halo 5: Guardians',
	'Xbox One',
	'The Last Guardian');
	
	global $tipos;
	$tipos= array( //1=Digital, 2=Físico, 3=Plataforma
	'2',
	'1',
	'2',
	'1',
	'3',
	'2');
	
	global $precios;
	$precios = array( //Precios sin el descuento
	'29 000',
	'59 500',
	'59 000',
	'49 000',
	'390 000',
	'59 000');
	
	global $descuentos;
	$descuentos= array( //Descuento en porcentaje
	'20',
	'10',
	'5',
	'20',
	'35',
	'40');
	
	global $fechaInicio;
	$fechaInicio = array( //Fecha en la que comienza la oferta
	'12/11/2016',
	'13/11/2016',
	'02/11/2016',
	'05/01/2016',
	'10/11/2016',
	'06/11/2016');

	global $fechaFinal;
	$fechaFinal= array( //Fecha en la que termina la oferta
	'14/11/2016',
	'19/11/2016',
	'31/11/2016',
	'05/11/2016',
	'11/11/2016',
	'12/11/2016');
	
	global $portadas;
	$portadas = array(
	'images/productos/juegos/aventura/thewitcher3.png',
	'images/productos/juegos/rpg/persona5.png',
	'images/productos/juegos/aventura/zeldabotw.png',
	'images/productos/juegos/shooter/halo5.png',
	'images/productos/consolas/XboxOne.png',
	'images/productos/juegos/aventura/TheLastGuardian.png');
	
	//Datos de prueba para combos de 2 productos
	global $ID1Combo;
	$ID1Combo= array(
	'PROD130043',
	'PROD140849',
	'PROD104990');
	
	global $ID2Combo;
	$ID2Combo= array(
	'PROD101406',
	'PROD102710',
	'PROD10477');
	
	global $preciosCombo;
	$preciosCombo = array( //Precio del combo (todo junto)
	'349 000',
	'299 500',
	'68 500');
	
	global $nombres1Combo;
	$nombres1Combo = array( //Primer producto del combo
	'Play Station 4',
	'Wii U',
	'Fire Emblem Fates: Conquest');
	
	global $nombres2Combo;
	$nombres2Combo = array( //Segundo producto del combo
	'The Witcher 3',
	'Zelda: Breath of the Wild',
	'Zelda: Ocarina of Time 3D');
	
	global $tipos1Combo;
	$tipos1Combo= array( //1=Digital, 2=Físico, 3=Plataforma
	'3',
	'3',
	'2');
	
	global $tipos2Combo;
	$tipos2Combo= array( //1=Digital, 2=Físico, 3=Plataforma
	'2',
	'2',
	'2');

	Include ("scripts/funciones.php");
	
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
		global $portadas;
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
		global $ID1Combo;
		global $ID2Combo;
		global $nombres1Combo;
		global $nombres2Combo;
		global $preciosCombo;
		global $portadas1Combo;
		global $portadas2Combo;
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
		<?php include(dirname(__FILE__)."/../includes/header.php");?>
	</footer>

    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/price-range.js"></script> <!-- Para Slider-->
    <script src="js/jquery.prettyPhoto.js"></script> <!--Para Galerias-->
    <script src="js/main.js"></script>
</body>
</html>
