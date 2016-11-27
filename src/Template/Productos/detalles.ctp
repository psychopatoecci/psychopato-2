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
	/*
	//Datos de prueba
	$IDProd = 'PROD101406'; //La ID asignada al producto
	$nombre = 'The Witcher 3';
	$categoria = '2'; //Si es 3=plataforma, no hace falta asignar género y plataforma, no se van a mostrar
	$plataforma = 'ps4';
	$genero = 'aventura';
	$precio = '29 000';
	$descripcion = 'The Witcher 3: Wild Hunt es la tercera entrega de la serie The Witcher, que nos devuelve al conocido cazador de bestias Geralt de Rivia en una nueva aventura. En esta ocasión enfrentándose a la famosa Cacería Salvaje que le da nombre, y que se convierte en un desafío de dimensiones colosales para la primera incursión de la serie RPG del estudio polaco CD Projekt Red en los videojuegos de mundo abierto. El brujo retorna en mejor forma que nunca para un título que se alza con infinidad de premios a lo mejor del año, entre ellos el de 3DJuegos por parte de la revista y de los lectores. ';
    */
    Include ("scripts/funciones.php");
    
    function calcularDescuento($precios, $descuentos) {
		$precioSinEspacios = str_replace(' ', '', $precios);
		$resultado = $precioSinEspacios-(($precioSinEspacios/100)*$descuentos);
		return $resultado;
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
								<li><a href='/catalogo' title="Ver el catálogo de productos"><h4 class="panel-title">Catálogo</h4></a></li><p></p>
								<li><a href='/ofertas' title="Ver la sección de combos y ofertas"><h4 class="panel-title">Combos y ofertas</h4></a></li><p></p>
								
								</ul>
							</div>
						</div>
						
						<!--/Banner de publicidad lateral-->
						<div class="bannerpublicidad text-center">
							<a href=""><img href="/ofertas" src="/../images/home/Banner1.png" title="Ver oferta especial" /></a>
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
								echo "<img src='/../".obtenerPortada($IDProd)."' alt='' />";
								?>
							</div>

						</div>
						<div class="col-sm-7">
							<?php //Botón de añadir a wishlist
								echo $this->Form->create($addwishlist);
								echo $this->Form->hidden('identificacionPersona', ['value'=>$this->request->session()->read('Auth.User.username')]);
								echo $this->Form->hidden('idProducto', ['value'=>$IDProd]);
								echo $this->Form->hidden('idWishList', ['value'=>'1']);
							
							echo "<div align='right'>";

                            if ($this->request->session()->read('Auth.User.username')) {
                                echo "<button type='submit' name='BotonWishlist' class='btn btn-default'>
                                    <i class='fa fa-star'></i>Agregar a wishlist</button>";
                            }
							echo $this->Form->end();
                            echo "</div>"
							?>
							
							<div class="product-information">
								<?php
									echo "<h2>".$nombre."</h2>";
									if($descuento!=null){
										echo '<h2><font color="orange">¡Descuento del '.$descuento[0].'%!</font></h2>';
									}
									echo "<p> Web ID: ".$IDProd."</p>";
								?>
								<span>
									<?php
										if($descuento!= null){
											echo "<span> ¢".calcularDescuento($precio, $descuento[0])."</span>";
										} else{
											echo "<span> ¢".$precio."</span>";
										}
									?>
									<label>Cantidad:</label>
									<?php
										echo $this->Form->create($addcarrito);
										echo $this->Form->input('cantidad', array( 'label' => false, 'default'=>'1' ));
										echo $this->Form->hidden('idPersona', ['value'=>$this->request->session()->read('Auth.User.username')]);
										echo $this->Form->hidden('idProducto', ['value'=>$IDProd]);
						
										//Categoría
										echo"<p><b>Tipo: </b>";
										if ($categoria === "1") {
											echo "Juego digital<br>";
										}
										if ($categoria === "2") {
											echo "Juego físico<br>";
										}
										if ($categoria === "3") {
											echo "Plataforma de juego<br>";
										}

										if ($categoria === "1" | $categoria === "2") {
											echo "<p><b>Género:</b> ".ucfirst($genero)."</p>";
											$categoriasLista = array('Juego digital','Juego físico','Plataforma');
											
											echo "<p><b>Plataforma:</b> ".ucfirst($plataforma)."</p>";
										}
										echo "<br>";
                                    if ($this->request->session()->read('Auth.User.username')) {
									echo "<button type='submit' name='BotonCarrito' class='btn btn-default cart' title='Añadir este producto al carrito de compras'>
                                            <i class='fa fa-shopping-cart'></i> Añadir al carrito
                                        </button>";
                                    }
                                    echo $this->Form->end();
									?>
								
								</span>
								
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
									$directorioCapturas = "images/productos/".$IDProd."/Capturas/";
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
		<?php include(dirname(__FILE__)."/../includes/footer.php");?>
	</footer>

    <script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/price-range.js"></script> <!-- Para Slider-->
    <script src="../js/jquery.prettyPhoto.js"></script> <!--Para Galerias-->
    <script src="../js/main.js"></script>
</body>
</html>
