<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Tienda de videojuegos ficticia">
    <meta name="author" content="PsychoPato">
    <title>PsychoPatoShop - Wishlist</title>
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
    function calcularDescuento($precios, $descuentos) {
		$precioSinEspacios = str_replace(' ', '', $precios);
		$resultado = $precioSinEspacios-(($precioSinEspacios/100)*$descuentos);
		return $resultado;
	}
	//Datos de prueba para juegos físicos
	global 	$IDProductosWishlist;
	global 	$nombres;
	global 	$categorias;
	global 	$precios;
	global 	$idWishList;
	
	$IDProductosWishlist = array();
	$nombres = array();
	$categorias = array();
	$precios = array();
	$idWishList = array();
	
	//Recuperar el ID de los productos
	foreach($datos as $dato):
		array_push($IDProductosWishlist, $dato->idProducto);
		array_push($idWishList, $dato->idWishList);
	endforeach;
	
	//Recuperar el nombre, precio y categoria de cada producto
	$cuenta=0;
	if (count($IDProductosWishlist)>0) {
		foreach($datos2 as $dato):
			if ($IDProductosWishlist[$cuenta] == $dato->idProducto) {
				array_push($nombres, $dato->nombreProducto);
				array_push($categorias, $dato->tipo);
				array_push($precios, $dato->precio);
				$cuenta++;
			}
			if (($cuenta+1) > Count($IDProductosWishlist)) {
				break;
			}
		endforeach;
	}
	
	
	
	/*
	Datos de prueba
	$IDProductosWishlist = array(
	'PROD101406',
	'PROD10192',
	'PROD126427');
	
	
	$nombres = array(
	'The Witcher 3',
	'Persona 5',
	'The Last Guardian');

	$categorias = array( //1=digital 2=fisico 3=plataforma
	'1',
	'2',
	'2');

	$precios= array(
	'29 000',
	'59 500',
	'59 000');
	*/
	
	Include ("scripts/funciones.php");
	
	$categoriasLista = array('Juego digital','Juego físico','Plataforma');

	?>
	
	<!--Header-->
	<header id="header">
		<?php include(dirname(__FILE__)."/../includes/header.php");?>
	</header>
	
	<!--Contenido-->
	<section id="cart_items">
		<div class="container">
		<h1>Wishlist</h1><br>
			<?php
				if (count($IDProductosWishlist)<=0) {
					echo "<h2>No ha añadido productos a la wishlist</h2><br>";
				} else {
			?>
			<div class="table-responsive cart_info">
			
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="price"><font size="5">Producto</font></td>
							<td class="description"></td>
							<td class="price"><font size="5">Precio</font></td>
							<td class="total"><font size="5">Categoría</font></td>
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
									echo "<a href='../detalles/".$IDProductosWishlist[$i]."' title = 'Ver los detalles de este producto'>
									<img src='/../".obtenerPortada($IDProductosWishlist[$i])."' /></a>";
									?>
								</td>
								<td class="cart_description">
									<?php
									echo "<h4><a href='../detalles/".$IDProductosWishlist[$i]."' title = 'Ver los detalles de este producto'><font size='5'>".$nombres[$i]."</font></a></h4>";
									echo "<p> ID: ".$IDProductosWishlist[$i]."</p>";
									?>
								</td>
								<td class="cart_price">
									<?php
									if($descuentos[$i]!=0){
										echo "<p>¢".calcularDescuento($precios[$i], $descuentos[$i])."</p>";
									}
									else{
										echo "<p>¢".$precios[$i]."</p>";
									}
									?>
								</td>
								<td class="cart_price">
									<?php
									echo "<p>".$categoriasLista[$categorias[$i]-1]."</p>";
									?>
								</td>
								<td class="cart_quantity">
									<center>
									<?php //Botón de añadir al carrito
										echo $this->Form->create($addcarrito);
										echo $this->Form->hidden('cantidad', ['value'=>1]);
										echo $this->Form->hidden('idPersona', ['value'=>$this->request->session()->read('Auth.User.username')]);
										echo $this->Form->hidden('idProducto', ['value'=>$IDProductosWishlist[$i]]);
									?>
									<button type="submit" name="BotonCarrito" class="btn btn-default add-to-cart" title="Añadir este producto al carrito de compras">
										<i class="fa fa-shopping-cart"></i><font size='5'>Añadir al carrito</font>
									</button>

									<?php
										echo $this->Form->end();
									?>
									
									<?php //Botón de borrar
										echo $this->Form->create($DatosBoton);
										echo $this->Form->hidden('identificacionPersona', ['value'=>$this->request->session()->read('Auth.User.username')]);
										echo $this->Form->hidden('idProducto', ['value'=>$IDProductosWishlist[$i]]);
										echo $this->Form->hidden('idWishList', ['value'=>$idWishList[$i]]);
									?>
									
									<button type="submit" name="BotonBorrar" class="btn btn-default add-to-cart" title="Borrar este producto de la wishlist">
										<i class="fa fa-times"></i>Borrar
									</button>
									
									<?php
										echo $this->Form->end();
									?>
									
									</center>
								</td>

								
							</tr>
						<?php
							}}
						?>
						
					</tbody>
				</table>
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