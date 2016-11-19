<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Tienda de videojuegos ficticia">
    <meta name="author" content="PsychoPato">
    <title>PsychoPatoShop - Confirmación de compra</title>
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
	$provinciaCasa = 'Alajuela';
	$cantonCasa = 'Desamparados';
	$distritoCasa = 'San Antonio';
	$direccionCasa = 'Por ahí a la par de la cosa esa.';
	
	$provinciaTrabajo = 'Cartago';
	$cantonTrabajo = 'Escazú';
	$distritoTrabajo = 'Guácima';
	$direccionTrabajo = 'Avenica feelings. En el zoológico.';
	
	$provinciaOtro = '';
	$cantonOtro = '';
	$distritoOtro = '';
	$direccionOtro = '';
	
	$tarjetaNombre1 = 'Chuck Norris';
	$tarjetaNumero1 = '2145162412458459';
	$tarjetaFecha1 = '10/02/2050';
	$tarjetaCSC1 = '754';
	
	$tarjetaNombre2 = 'El Chuck Norris';
	$tarjetaNumero2 = '84512614777771521';
	$tarjetaFecha2 = '02/05/2017';
	$tarjetaCSC2 = '123';
	
	$tarjetaNombre3 = '';
	$tarjetaNumero3 = '';
	$tarjetaFecha3 = '';
	$tarjetaCSC3 = '';
	
	$total = '85000';
	
	//Nomenclatura de la base para las provincias
	$provinciasBase = array('San Jose','Alajuela','Cartago','Heredia','Guanacaste','Puntarenas','Limon','');
	
	//Datos para las listas desplegables
	$Tarjeta1 = ultimosCuatroDigitos($tarjetaNumero1).", ".$tarjetaNombre1;
	$Tarjeta2 = ultimosCuatroDigitos($tarjetaNumero2).", ".$tarjetaNombre2;
	$Tarjeta3 = ultimosCuatroDigitos($tarjetaNumero3).", ".$tarjetaNombre3;
	
	$Direccion1 = "Casa: ".$provinciaCasa.", ".$cantonCasa.", ".$distritoCasa.", ".$direccionCasa;
	$Direccion2 = "Trabajo: ".$provinciaTrabajo.", ".$cantonTrabajo.", ".$distritoTrabajo.", ".$direccionTrabajo;
	$Direccion3 = "Otro: ".$provinciaOtro.", ".$cantonOtro.", ".$distritoOtro.", ".$direccionOtro;
	
	Include ("scripts/funciones.php");
	
	$estadosLista = array('Procesando','En tránsito','Entregado');

	function ultimosCuatroDigitos($tarjeta) {
		$nuevo = "**** ";
		if ($tarjeta!="") {
			$nuevo.= $tarjeta[strlen ($tarjeta)-4];
			$nuevo.= $tarjeta[strlen ($tarjeta)-3];
			$nuevo.= $tarjeta[strlen ($tarjeta)-2];
			$nuevo.= $tarjeta[strlen ($tarjeta)-1];
		}
		return $nuevo;
	}
?>
	
	<!--Header-->
	<header id="header">
		<?php include(dirname(__FILE__)."/../includes/header.php");?>
	</header>
	<div class="container">
		<div align="left">
			<button type='button' onClick="parent.location='carrito'" class='btn btn-default get' title = 'Volver al carrito de compras'><-Volver al carrito</button>
		</div>
	
		<h1>Confirmación de la compra</h1><br>

		<div class="col-sm-5 padding-right">
		<h2>Seleccione un medio de pago:</h2><br>
			<select name='Tarjetas'>
			<?php
				if ($tarjetaNumero1!="") {
					echo "<option value='Tarjeta1'>".$Tarjeta1."</option>";
				}
				if ($tarjetaNumero2!="") {
					echo "<option value='Tarjeta2'>".$Tarjeta2."</option>";
				}
				if ($tarjetaNumero3!="") {
					echo "<option value='Tarjeta3'>".$Tarjeta3."</option>";
				}
			?>
			</select>
			<br><br><button type='button' onClick="parent.location='cuenta'" class='btn btn-default'
				title = 'Iniciar sesión con una cuenta ya creada'>Editar medios de pago</button>
		</div>
		<div class="col-sm-7 padding-right">
		<h2>Seleccione una dirección de envío:</h2><br>
			<select name='Direcciones'>
			<?php
				if ($provinciaCasa!="") {
					echo "<option value='Direccion1'>".$Direccion1."</option>";
				}
				if ($provinciaTrabajo!="") {
					echo "<option value='Direccion2'>".$Direccion2."</option>";
				}
				if ($provinciaOtro!="") {
					echo "<option value='Direccion3'>".$Direccion3."</option>";
				}
			?>
			</select>
			<br><br><button type='button' onClick="parent.location='cuenta'" class='btn btn-default'
				title = 'Iniciar sesión con una cuenta ya creada'>Editar direcciones</button>
			<br><br><br><br><br>
		</div>
		<?php echo"<font size='5'>Total a pagar: ¢".$total."</font>"; ?>
		<br><br><br>
		<a href='#' title = 'Confirmar y realizar la compra' class='btn btn-default add-to-cart'>
			<font size='5'>Completar compra</font></a>
	</div>
	<br><br><br>
		
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