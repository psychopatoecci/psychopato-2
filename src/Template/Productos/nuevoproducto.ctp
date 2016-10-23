<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Tienda de videojuegos ficticia">
    <meta name="author" content="PsychoPato">
    <title>PsychoPatoShop - Administración de productos</title>
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
	
	<!--Header-->
	<header id="header">
		<?php include("includes/header.php");?>
	</header>
	
	<!--Navegador lateral-->
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
					
						<div align="left">
							<button type='button' onClick="parent.location='adminProductos'" class='btn btn-default get' title = 'Añadir un nuevo producto a la base de datos'><-Volver a la lista de productos</button>
						</div>
					</div>
				</div>
				
				<!--Zona de contenido-->
				<div class="col-sm-9 padding-right">
					
					<!--Vistazo a categorias-->
					<div class="category-tab">
						
						<!--Submenus de cada categoria-->
						<div class="tab-content">
							<h1>Creación de producto</h1>
							<br>	
								
							<div class='tab-content'>
								<div class='col-sm-3'>
								<?php
									echo $this -> Form -> create ($nuevoProd);
									echo $this -> Form -> input ('identificador', ['label' => 'ID:']);
									echo $this -> Form -> input  ('nombreProducto', ['label' => 'Nombre:']);
									echo $this -> Form -> input  ('descripcion', ['label' => 'Descripción:']);
								?>
								</div>
								
								<div class='col-sm-3'>
								<?php
									echo $this -> Form -> input  ('fabricante', ['label' => 'Fabricante:']);
									echo $this -> Form -> input  ('precio', ['label' => 'Precio:', 'type' => 'text']);
									echo $this -> Form -> input  ('genero', ['label' => 'Género:']);
									echo $this -> Form -> input  ('consola', 
										['type' => 'select', 'options' => $opcionesConsola, 'label' => 'Plataforma:']);
								?>
								<br><br>
								</div>
								<div class='col-sm-3'>
								<?php
									$opcionesCategoria = [0 => 'Juego digital', 1 => 'Juego físico', 2=> 'Plataforma'];
									echo $this -> Form -> input  ('tipo', ['type' => 'select', 'options' => $opcionesCategoria, 'label' => 'Categoría:']);
									echo $this -> Form -> submit ('Agregar producto');
									echo $this -> Form -> end ();
								?>
								<br><br>*La portada y sus capturas deben agregarse después de crear el producto* 
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
		<?php include("includes/footer.php");?>
	</footer>

    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/price-range.js"></script> <!-- Para Slider-->
    <script src="js/jquery.prettyPhoto.js"></script> <!--Para Galerias-->
    <script src="js/main.js"></script>
</body>
</html>