<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Tienda de videojuegos ficticia">
    <meta name="author" content="PsychoPato">
    <title>PsychoPatoShop - Carrito de compras</title>
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
	global 	$IDProductosWishlist;
	$IDProductosWishlist = array(
	'PROD101406',
	'PROD10192',
	'PROD126427');
	
	global 	$nombres;
	$nombres = array(
	'The Witcher 3',
	'Persona 5',
	'The Last Guardian');

	global 	$precios;
	$precios= array(
	'29000',
	'59500',
	'59000');

	Include ("scripts/funciones.php");
	
	$categoriasLista = array('Juego digital','Juego físico','Plataforma');

	?>
	
	<!--Header-->
	<header id="header">
		<?php include("includes/header.php");?>
	</header>
	
	<!--Contenido-->
	<section id="cart_items">
		<div class="container">
		<h1>Carrito de compras</h1><br>
			<div class="table-responsive cart_info">
			
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="price"><font size="5">Productos</font></td>
							<td class="description"></td>
							<td class="price"><font size="5">Precio</font></td>
							<td class="price"><font size="5">Cantidad</font></td>
							<td class=""></td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<?php
							for ($i = 0; $i < count($nombres); $i++) {
						?>
							<tr>
								<td class="cart_product">
									<?php
									echo "<a href='detalles' title = 'Ver los detalles de este producto'>
									<img src='".obtenerPortada($IDProductosWishlist[$i])."' /></a>";
									?>
								</td>
								<td class="cart_description">
									<?php
									echo "<h4><a href='detalles' title = 'Ver los detalles de este producto'><font size='5'>".$nombres[$i]."</font></a></h4>";
									echo "<p> ID: ".$IDProductosWishlist[$i]."</p>";
									?>
								</td>
								<td class="cart_price">
									<?php
									echo "<p>¢".$precios[$i]."</p>";
									?>
								</td>
								<td class="cart_price">
									<?php
									echo "<input class='cart_quantity_input' type='text'
										name='Cantidad".$i."' value='1' autocomplete='off' size='2'>";

									?>
								</td>
								<td class="cart_quantity">
									<center>
									<?php
										echo "<br><br><a href='#' title = 'Eliminar producto de la wishlist' class='btn btn-default add-to-cart'>
										<i class='fa fa-times'></i><font size='5'>Borrar</font></a>";
									?>
									</center>
								</td>

								
							</tr>
						<?php
							}
						?>
						
						
					</tbody>

				</table>
				
			</div>
			<div align="right">
				<font size='5'>
				Total: 
				<?php
					$total=0;
					for ($i = 0; $i < count($precios); $i++) {
						$total = $total+intval($precios[$i]);
					}
					echo "¢".$total;
				?>
				</font>
				<br><br>
				<a href='#' title = 'Realizar la compra de todos estos productos' class='btn btn-default add-to-cart'>
				<i class='fa fa-shopping-cart'></i><font size='5'>Realizar compra</font></a>
			</div>
		</div>
	</section>
	
	<!--/Footer-->
	<footer id="footer">
		<?php include("includes/footer.php");?>
	</footer>

    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/price-range.js"></script> <!-- Para Slider-->
    <script src="js/jquery.prettyPhoto.js"></script> <!--Para Galerias-->
    <script src="js/main.js"></script>
</body>
</html>