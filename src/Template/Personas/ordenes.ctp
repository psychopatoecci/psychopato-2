<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Tienda de videojuegos ficticia">
    <meta name="author" content="PsychoPato">
    <title>PsychoPatoShop - Estado de las órdenes</title>
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
	global $idFacturas;
	global $fechaFacturas;
	global $estadoFacturas;
	$idFacturas = array();
	foreach($fact as $factura):
		array_push($idFacturas, $factura->idFactura);
	endforeach;
	$fechaFacturas = array();
	foreach($fact as $factura):
		array_push($fechaFacturas, $factura->fechaFactura);
	endforeach;
	$estadoFacturas = array();
	foreach($fact as $factura):
		array_push($estadoFacturas, $factura->estadoCompra);
	endforeach;
	global 	$IDOrdenes;
	//$IDOrdenes = idFact;
	/*$IDOrdenes = array(
	'ORD10242',
	'ORD10345',
	'ORD10232');*/
	
	//global 	$Montos; //Lo que costó toda la orden
	/*$Montos = array(
	'125000',
	'250000',
	'19000');*/
	
	global 	$Fechas;
	//$Fechas = fechas;
	/*$Fechas = array(
	'11/11/2016',
	'20/11/2016',
	'21/11/2016');*/

	global 	$Estados;
	//$Estados = estado;
	/*$Estados = array(
	'3',
	'2',
	'1');*/
	
	global 	$Productos;
	/*$Productos = array (
	  array("Uncharted 4","The Witcher 3","Rock Simulator 2014"),
	  array("Play Station 4", "", ""),
	  array("Nintendo 3DS","Pokemon Sun",""),
	);*/

	Include ("scripts/funciones.php");
	
	$estadosLista = array('Procesando','En tránsito','Entregado');

?>
	
	<!--Header-->
	<header id="header">
		<?php include("includes/header.php");?>
	</header>
	
	<!--Navegador lateral-->
	<section id="cart_items">
		<div class="container">
		<h1>Órdenes realizadas</h1><br>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							
							<td class="price"><font size="5">Orden</font></td>
							<td class="price"><font size="5">Fecha</font></td>
							<td class="price"><font size="5">Monto</font></td>
							<td class="price"><font size="5">Estado</font></td>
							<td class=""></td>
						</tr>
					</thead>
					<tbody>
						<!--<?php
							foreach($fact as $factura){
						?>-->
							<tr>
								<td class="cart_product">
									<?php
									echo "<h4><font size='5'>".$idFacturas[0]."</font></h4>";
									/*for ($j = 0; $j < count($Productos); $j++) {
										echo "<p>".$Productos[$i][$j]."</p>";
									}*/
									?>
								</td>
								<td class="cart_description">
									<?php
									echo "<font size='5'>".$fechaFacturas[0]."</font></font>";
									?>
								</td>
								<!--<td class="cart_price">
									<?php
									echo "<p><font size='5'>¢".$Montos[$i]."</font></p>";
									?>
								</td>-->
								<td class="cart_price">
									<?php
									echo "<p>".$estadoFacturas[0]."</p>";
									?>
								</td>
								<td class="cart_price">
									<?php
										echo "<a href='#' title = 'Ver la factura de esta orden'
										class='btn btn-default add-to-cart'> Ver factura</a>";
									?>
								</td>
							</tr>
						<!--<?php
							}
						?>-->
						
					</tbody>
				</table>
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