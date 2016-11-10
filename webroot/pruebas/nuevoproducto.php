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
				<div align="left">
					<button type='button' onClick="parent.location='Adminproductos.php'" class='btn btn-default get' title = 'Regresar a la lista de productos'><-Volver a la lista de productos</button>
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
								<form id="guardarcambios" target="_blank" action="scripts/guardarnuevoproducto.php" method="post">
									<div class='col-sm-3'>
										<h3>ID:</h3>
										<input type='text' name='id' placeholder='ID de este producto'>
										<br><h3>Nombre:</h3>
										<input type='text' name='nombre' placeholder='Nombre'>
										<h3>Fabricante:</h3>
										<input type='text' name='fabricante' placeholder='Fabricante'>
										<br><h3>Precio:</h3>
										<input type='text' name='precio' placeholder='Precio'>
										
										<br><br><br><br>
									</div>
									<div class='col-sm-4'>
										<h3>Descripción:</h3>
										<textarea rows='10' cols='300' placeholder='Descripción del producto' name='descripcion'></textarea>
										<br><br><br><br>
									</div>
									<div class='col-sm-3'>
										<h3>Categoría:</h3>
										<select name='Categoria'>
											<?php
											$categoriasLista = array('Juego digital','Juego físico','Plataforma');
											$categoriasBase = array('1','2','3');
											for ($j = 0; $j < count($categoriasLista); $j++) {
												echo "<option value='".($j+1)."''>".$categoriasLista[$j]."</option>";
											}
											?>
										</select>
										
										<h3>Género:</h3>
										<select name='Genero'>
											<?php
											$generosLista = array('Aventura','RPG','Plataformas','Conducción','Deportes','Shooter','Lucha','Otros');
											$generosBase = array('aventura','rpg','plataformas','conduccion','deportes','shooter','lucha','otros');
											for ($j = 0; $j < count($generosLista); $j++) {
												echo "<option value='".$j."'>".$generosLista[$j]."</option> ";
											}
											?>
										</select>

										<h3>Plataforma:</h3>
										<select name='Plataforma'>
											<?php
											$plataformasLista = array('Play Station 4','Play Station 3','Xbox One','Xbox 360','Wii','Wii U','PC','PS Vita','Nintendo 3DS','Nintendo DS');
											$plataformasBase = array('ps4','ps3','one','360','wii','wiiu','pc','vita','3ds','ds');
											for ($j = 0; $j < count($plataformasLista); $j++) {
												echo "<option value='".$j."''>".$plataformasLista[$j]."</option>";
											}
											?>
										</select>
										
									</div>
									<div class='col-sm-2'>							
										<button type='submit' class='btn btn-default'>Crear producto</button>
										<br><br>*La portada y sus capturas deben agregarse después de crear el producto*
										<br><br><br>
									</div>

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
		<?php include("includes/footer.php");?>
	</footer>

    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/price-range.js"></script> <!-- Para Slider-->
    <script src="js/jquery.prettyPhoto.js"></script> <!--Para Galerias-->
    <script src="js/main.js"></script>
</body>
</html>