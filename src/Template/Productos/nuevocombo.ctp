<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Tienda de videojuegos ficticia">
    <meta name="author" content="PsychoPato">
    <title>PsychoPatoShop - Administración de combos</title>
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
		global $ListaProductos; //Todos los productos de la base
		global $ListaNombres; //El nombre de todos los productos
		global $Productos1;	//Los productos elegidos en cada combo
		global $Productos2;
		global $Precios; //El precio de cada combo creado

		$ListaProductos = array();
		$ListaNombres = array();
		
		$Productos1 = array();
		$Productos2 = array();
		$Precios = array();
		
		//Recuperar el nombre y ID de todos los productos
		foreach($datos as $dato):
			array_push($ListaProductos, $dato->idProducto);
			array_push($ListaNombres, $dato->nombreProducto);
		endforeach;
		
		//Recuperar la información de los combos ya creados
		foreach($datosCombos as $dato):
			array_push($Productos1, $dato->idProducto);
			$idCombo = $dato->idCombo;
			foreach($datosCombos as $dato2):
				if ($idCombo == $dato2->idCombo & $dato2->idProducto != $dato->idProducto) {
					array_push($Productos2, $dato2->idProducto);
				}
			endforeach;
		endforeach;
		
		foreach($datosCombos2 as $dato):
			array_push($Precios, $dato->precioCombo);
		endforeach;

		//Datos de prueba
		/*
		$ListaProductos = array(
		'PROD101406',
		'PROD10192',
		'PROD102710',
		'PROD10477',
		'PROD126427');
		
		$ListaNombres = array(
		'The Witcher 3',
		'Persona 5',
		'Zelda: Breath of the Wild',
		'Zelda: Ocarina of Time 3D',
		'The Last Guardian');
		
		$Productos1 = array(
		'PROD10192',
		'PROD10477',
		'PROD126427');
		
		$Productos2 = array(
		'PROD126427',
		'PROD101406',
		'PROD10192');
		
		$Precios = array(
		'125000',
		'52000',
		'100000');
		*/
		
		global $ListaSelect; //Para que se muestre tanto nombre como id en la lista
		$ListaSelect = array();
		for ($i=0; $i<Count($ListaProductos); $i++) {
			array_push($ListaSelect, $ListaNombres[$i]." (".$ListaProductos[$i].")");
		}
		
	?>
	
	<!--Header-->
	<header id="header">
		<?php include(dirname(__FILE__)."/../includes/header.php");?>
	</header>
	
	<section>
		<div class="container">
			<div align="left">
				<button type='button' onClick="parent.location='adminProductos'" class='btn btn-default get' title = 'Volver a la administración de productos'><-Volver a la lista de productos</button>
			</div>
			<div class="row">
				<div class="col-sm-9 padding-right">
					<div class="category-tab">
						<div class="tab-content">
							<h2>Nuevo combo:</h2> <br>	
							<div class='tab-content'>
								<div class='col-sm-4'>
									<?php
									echo $this -> Form -> input  ('producto1', ['type' => 'select', 'options' => $ListaSelect, 'label' => 'Primer producto:']);
									?>
								</div>
								<div class='col-sm-4'>
									<?php
									echo $this -> Form -> input  ('producto2', ['type' => 'select', 'options' => $ListaSelect, 'label' => 'Segundo producto:']);
									?>
								</div>
								<div class='col-sm-3'>
									<?php
									echo $this -> Form -> input  ('precioCombo', ['label' => 'Precio del combo:']);
									?>
								</div>
							</div>
						</div>
					</div>
					
					<button type='submit' class='btn btn-default add-to-cart' title='Crear un nuevo combo'>
                        Crear combo
                    </button>
                    
                    <h2>Lista de combos:</h2> <br>
                    <?php
                    for ($i=0; $i<Count($Productos1); $i++) { //Recorre todos los combos ya creados
                    ?>
						<div class='col-sm-4'>
							<?php
							$IndiceProducto=0;
							for ($j=0; $j<Count($ListaProductos); $j++) {
								if ($ListaProductos[$j] == $Productos1[$i]) {
									$IndiceProducto = $j;
								}
							}
							echo $this -> Form -> input('producto1', array('type'=>'select', 'label'=>'Primer producto:', 'options'=>$ListaSelect, 'default'=>$IndiceProducto));
							?>
						</div>
						<div class='col-sm-4'>
							<?php
							$IndiceProducto=0;
							for ($j=0; $j<Count($ListaProductos); $j++) {
								if ($ListaProductos[$j] == $Productos2[$i]) {
									$IndiceProducto = $j;
								}
							}
							echo $this -> Form -> input('producto2', array('type'=>'select', 'label'=>'Segundo producto:', 'options'=>$ListaSelect, 'default'=>$IndiceProducto));
							?>
						</div>
						<div class='col-sm-2'>
							<?php
							echo $this -> Form -> input  ('precioCombo', ['label' => 'Precio del combo:', 'default'=>$Precios[$i]]);
							?>
						</div>
						<div class='col-sm-2'>
							<br>
							<button type="submit" name="BotonActualizar" class="btn btn-default add-to-cart" title="Actualizar los datos de este combo">
								<i class="fa fa-refresh"></i>
							</button>
							<button type="submit" name="BotonBorrar" class="btn btn-default add-to-cart" title="Borrar este combo">
								<i class="fa fa-times"></i>
							</button>
						</div>
					<?php } ?>
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
