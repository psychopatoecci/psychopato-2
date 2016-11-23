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
  	Include ("scripts/funciones.php");
  	
	//Datos de prueba para productos en oferta
	global $IDOfertas;
	$IDOfertas = [];
	foreach($ofertas as $idOferta){
		array_push($IDOfertas, $idOferta['idProducto']);
	}
	
	global $nombres;
	$nombres = [];
	foreach($ofertas as $nombre){
		array_push($nombres, $nombre['nombreProducto']);	
	}
	
	global $tipos;
	$tipos = [];
	foreach($ofertas as $tipo){
		array_push($tipos, $tipo['tipo']);	
	}

	global $precios;
	$precios = [];
	foreach($ofertas as $precio){
		array_push($precios,$precio['precio']);
	}
	
	global $descuentos;
	$descuentos = [];
	foreach($ofertas as $descuento){\
		array_push($descuentos, $descuento['oferta']['descuento']);
	}
	
	/*global $fechaInicio;
	$fechaInicio = [];
	foreach($ofertas as $fechaI){
		array_push($fechaInicio, $fechaI['ofertas']['fechaInicio']);	
	}

	global $fechaFinal;
	$fechaFinal = [];
	foreach($ofertas as $fechaF){
		array_push($fechaFinal, $fechaF['ofertas']['fechaInicio']);	
	}*/
	
	global $portadas;
	$portadas = [];
	foreach($ofertas as $portada){
		array_push($portadas, "'src='".obtenerPortada( $portada['idProducto']));	
	}

// Combos 

global $IDCombos;
$IDCombos= [];
	foreach($combos as $combo){
		array_push($IDCombos, $combo['idCombo']);	
	}


global $PrecioComb;
$PrecioComb = [];
	foreach($combos as $precio){
		array_push($PrecioComb, $precio['precioCombo']);	
	}
	
	
global $fechaInic;
$fechaInic = [];
	foreach($combos as $fecha){
		array_push($fechaInic, $fecha['fechaInicio']);	
	}


global $fechaFin;
$fechaFin = [];
	foreach($combos as $fecha){
		array_push($fechaFin, $fecha['fechaFIn']);	
	}
	
/// FIN VARIABLES COMBO 


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


	
	//Función que devuelve el precio con un descuento
	function calcularDescuento($precios, $descuentos) {
		$precioSinEspacios = str_replace(' ', '', $precios);
		$resultado = $precioSinEspacios-(($precioSinEspacios/100)*$descuentos);
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
			echo "<a href='detalles/".$IDOfertas[$i]."' title = 'Ver detalles del producto'><img src='".obtenerPortada($IDOfertas[$i])."' alt='' /></a>";
			echo "<a href='detalles/".$IDOfertas[$i]."' title = 'Ver detalles del producto'><p>".$nombres[$i]."</p></a>";
			echo "<h4><strike>¢".$precios[$i]."</strike></h4>";
			echo "<h2>¢".calcularDescuento($precios[$i], $descuentos[$i])."</h2>";
			//echo "<br><b>Duracion de la oferta:</b><br>".$fechaInicio[$i]." - ".$fechaFinal[$i]."<br><br>";
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
		global $IDCombos;
		global $fechaInic;
		global $fechaFin;
		global $PrecioComb;
		//global $ID2Combo;
		//global $nombres1Combo;
		//global $nombres2Combo;
		//global $preciosCombo;
		//global $portadas1Combo;
		//global $portadas2Combo;
		//global $tipos1Combo;
		//global $tipos2Combo;
		
		for ($i = 0; $i < count($IDCombos); $i++) { 
			echo "<div class='col-sm-3'>";
			echo "<div class='product-image-wrapper'>";
			echo "<div class='single-products'>";
			echo "<div class='productinfo text-center'>";
			echo "<br><h2>¡Combo numero: ".$IDCombos[$i]."!</h2>";
			echo "<a href='detalles.php' title = 'Ver detalles del producto'><img src='".obtenerPortada($IDCombos[$i])."' alt='' /></a>";
			//echo "<a href='detalles.php' title = 'Ver detalles del producto'><img src='".obtenerPortada($IDCombos[$i])."' alt='' /></a>";
			echo "<a href='detalles.php' title = 'Ver detalles del producto'><p>".$IDCombos[$i]."</p></a>";
		//	echo "<a href='detalles.php' title = 'Ver detalles del producto'><p> <br>".$IDCombos[$i]."</p></a>";
		//	echo "<h4><strike>¢".$PrecioComb[$i]."</strike></h4>";
			echo "<h2>¢".$PrecioComb[$i]."</h2>";
			echo "<a href='#' title = 'Añadir oferta a la wishlist'><i class='fa fa-star'></i>Añadir a wishlist</a><p></p>";
			echo "<a href='#' class='btn btn-default add-to-cart' title = 'Añadir oferta al carrito de compras'><i class='fa fa-shopping-cart'></i>Añadir al carrito</a>";
			echo "</div>";
			//if ($tipos1Combo[$i][0]==="D") { //Digital
			//	echo "<img src='images/home/digital.png' class='new' alt='' />";
			//}
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
								
				
                    <form id="pag" action="../ofertas" method="get">
                        <?php 
                            echo "<input type='hidden' name='nuevaPag' value='".strval($numPage - 1)."'>"; 
                        ?>
                        <button type='submit' class='btn btn-default'>Anterior</button>
                    </form>
                    <form id="pag" action="../ofertas" method="get">
                        <?php 
                            echo "<input type='hidden' name='nuevaPag' value='".strval($numPage + 1)."'>"; 
                        ?>
                        <button type='submit' class='btn btn-default'>Siguiente</button>
                    </form>
			
								
						    </div>
						    
							<div class="tab-pane fade" id="submenu2" >
								<h1>Combos de productos</h1><br>
								<div class="tab-content">
									<?php 
										mostrarCombo();
									?>
								</div>
							<form id="pag" action="../ofertas" method="get">
                        		<?php 
                            		echo "<input type='hidden' name='nuevaPag' value='".strval($numPage2 - 1)."'>"; 
                        		?>
                        		<button type='submit' class='btn btn-default'>Anterior</button>
                    		</form>
                    		<form id="pag" action="../ofertas" method="get">
                        	<?php 
                        		 echo "<input type='hidden' name='nuevaPag' value='".strval($numPage2 + 1)."'>"; 
                        	?>
                        <button type='submit' class='btn btn-default'>Siguiente</button>
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
		<?php include(dirname(__FILE__)."/../includes/footer.php");?>
	</footer>

    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/price-range.js"></script> <!-- Para Slider-->
    <script src="js/jquery.prettyPhoto.js"></script> <!--Para Galerias-->
    <script src="js/main.js"></script>
</body>
</html>
