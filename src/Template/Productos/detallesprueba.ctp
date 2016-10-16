<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Tienda de videojuegos ficticia">
    <meta name="author" content="PsychoPato">
    <title>PsychoPatoShop - Detalles de producto</title>
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
	//tos de prueba
	//$IDProducto = 'PROD101406'; //La ID asignada al producto
	//$nombre = 'The Witcher 3';
	//$categoria = '2'; //Si es 3=plataforma, no hace falta asignar género y plataforma, no se van a mostrar
	//$plataforma = 'ps4';
	//$genero = 'aventura';
	//$recio = '29 000';
	//$descripcion = 'The Witcher 3: Wild Hunt es la tercera entrega de la serie The Witcher, que nos devuelve al conocido cazador de bestias Geralt de Rivia en una nueva aventura. En esta ocasión enfrentándose a la famosa Cacería Salvaje que le da nombre, y que se convierte en un desafío de dimensiones colosales para la primera incursión de la serie RPG del estudio polaco CD Projekt Red en los videojuegos de mundo abierto. El brujo retorna en mejor forma que nunca para un título que se alza con infinidad de premios a lo mejor del año, entre ellos el de 3DJuegos por parte de la revista y de los lectores. ';
   
    Include ("scripts/funciones.php");
   ?>
				
	<!--Header-->
	<header id="header">
		<?php include("includes/header2.php");?>
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
							<a href="#"><img href="#" src="/../images/home/Banner1.png" title="Ver oferta especial" /></a>
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
								echo "<img src='/../".obtenerPortada($IDProducto)."' alt='' />";
								?>
							</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information">
								<?php
									echo "<h2>".$nombre."</h2>";
									echo "<p> Web ID: ".$IDProducto."</p>";
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
								<?php
								echo"<p><b>Tipo: </b>";
								if ($categoria === "1") {
									echo "Juego digital</p>";
								}
								if ($categoria === "2") {
									echo "Juego físico</p>";
								}
								if ($categoria === "3") {
									echo "Plataforma de juego</p>";
								}
								
								if ($categoria === "1" | $categoria === "2") {
									echo "<p><b>Género:</b> ".ucfirst($genero)."</p>";
									$categoriasLista = array('Juego digital','Juego físico','Plataforma');
									
									$plataformasLista = array('Play Station 4','Play Station 3','Xbox One','Xbox 360','Wii','Wii U','PC','PS Vita','Nintendo 3DS','Nintendo DS');
									$plataformasBase = array('ps4','ps3','one','360','wii','wiiu','pc','vita','3ds','ds');
									//for ($j = 0; $j < count($plataformasLista); $j++) {
									//	if ($plataforma === $plataformasBase[$j]) {
									//		echo "<p><b>Plataforma:</b> ".ucfirst($plataformasLista[$j])."</p>";
									//	}
									//}
									echo "<p><b>Plataforma:</b> ".$plataforma."</p>";
								}
	

								
								?>
								<br><a href='#' title="Añadir este producto a la wishlist"><i class='fa fa-star'></i>Añadir a la wishlist</a><p></p>
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
									$directorioCapturas = "images/productos/".$IDProducto."/Capturas/";
									if (!file_exists($directorioCapturas)) { //Si no existe la carpeta, la crea
										mkdir($directorioCapturas, 0777, true);
									}
									$files = array_diff(scandir($directorioCapturas), array('.', '..'));
									for ($i = 2; $i < (count($files)+2); $i++) {
										if ($i === 2) {
											echo "<div class='item active'>";
										} else {
											echo "<div class='item'>";
										}
										echo "<img src='../".$directorioCapturas."/".$files[$i]."' alt=''>";
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
		<?php include("includes/footer2.php");?>
	</footer>

    <script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/price-range.js"></script> <!-- Para Slider-->
    <script src="../js/jquery.prettyPhoto.js"></script> <!--Para Galerias-->
    <script src="../js/main.js"></script>
</body>
</html>