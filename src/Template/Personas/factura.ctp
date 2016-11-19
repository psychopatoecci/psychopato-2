<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Tienda de videojuegos ficticia">
    <meta name="author" content="PsychoPato">
    <title>PsychoPatoShop - Factura de compra</title>
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
    
	//Datos de prueba
	$NumeroOrden = array();
	$fechaFact = array();
	foreach($factura as $fact):
		array_push($NumeroOrden, $fact['idFactura']);
		array_push($fechaFact, $fact['fechaFactura']);
	endforeach;
	
	global 	$IDProductos;
	$IDProductos = array();
	//foreach(productos as producto):

	//endforeach;
	/*$IDProductos = array(
	'PROD101406',
	'PROD101432',
	'PROD102324');*/
	
	global 	$Nombres;
	$Nombres = array(
	'Uncharted 4',
	'Play Station 4',
	'The Witcher 3');
	
	global 	$Cantidades; //Cuánto se compró de cada producto
	$Cantidades = array(
	'1',
	'1',
	'2');
	
	global 	$Precios; //Lo que costó toda la orden
	$Precios = array(
	'12500',
	'25000',
	'19000');
	
	$Fecha = '11/11/2016';

	Include ("scripts/funciones.php");
	
?>
	
	<!--Header-->
	<header id="header">
		<?php include(dirname(__FILE__)."/../includes/header.php");?>
	</header>
	
	<!--Navegador lateral-->
	<section id="cart_items">
		
		<div class="container">
		<div align="left">
			<button type='button' onClick="parent.location='../ordenes'" class='btn btn-default get' title = 'Regresar a la lista de órdenes'><-Volver a la lista de órdenes</button>
		</div>
			
		<?php echo "<h1>Factura de la orden ".$NumeroOrden[0]."</h1>";
			echo "<h3>Fecha de compra: ".$fechaFact[0]."</h3><br>";
		?>

				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="price"><font size="5">Productos</font></td>
							<td class="price"><font size="5">Precio</font></td>
							<td class="price"><font size="5">Cantidad</font></td>
							<td class=""></td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<?php
							for ($i = 0; $i < count($productos); $i++) {
						?>
							<tr>
								<td class="cart_price">
									<?php
									echo "<h4><font size='5'>".$nombres[$i]."</font></h4>";
									echo "<p> ID: ".$productos[$i]."</p>";
									?>
								</td>
								<td class="cart_price">
									<?php
									echo "<p>¢".$precios[$i]."</p>";
									?>
								</td>
								<td class="cart_price">
									<?php
									echo "<p>".$cantidades[$i]."</p>";
									?>
								</td>
			
							</tr>
						<?php
							}
						?>
						
						
					</tbody>

				</table>
				
			<div align="left">
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