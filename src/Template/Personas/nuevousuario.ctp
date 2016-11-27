<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Tienda de videojuegos ficticia">
    <meta name="author" content="PsychoPato">
    <title>PsychoPatoShop - Administración de usuarios</title>
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
	//Nomenclatura de la base para las provincias
	$provinciasBase = array('San Jose','Alajuela','Cartago','Heredia','Guanacaste','Puntarenas','Limon','');

?>
	<!--Header-->
	<header id="header">
		<?php include(dirname(__FILE__)."/../includes/header.php");?>
	</header>
	
	<!--Navegador lateral-->
	<section>
		<div class="container">
			<div class="row">
				<div align="left">
							<button type='button' onClick="parent.location='adminUsuarios'" class='btn btn-default get' title = 'Regresar a la lista de usuarios'><-Volver a la lista de usuarios</button>
						</div>
				<!--Zona de contenido-->
				<div class="col-sm-9 padding-right">
					
					<!--Vistazo a categorias-->
					<div class="category-tab">
						
						<!--Submenus de cada categoria-->
						<div class="tab-content">
							<h1>Creación de usuario</h1>
							<br>	
						<?php echo $this->Form->create(null,['url'=>['controller'=>'Personas', 'action'=>'guardar']])	; ?>
							<div class='tab-content'>
								<form id="guardarcambios" target="_blank" action="/src/Template/Productos/scripts/guardarnuevousuario.php" method="post">
									<div class='col-sm-3'>
										<h3>Identificación:</h3>
										<input type='text' name='id' placeholder='Identificación de este usuario'>
										<br><h4>Nombre:</h4>
										<input type='text' name='nombre' placeholder='Nombre'>
										<h4>1° apellido:</h4>
										<input type='text' name='apellido1' placeholder='Primer apellido'>
										<h4>2° apellido:</h4>
										<input type='text' name='apellido2' placeholder='Segundo apellido'>
										<h4>Fecha de nacimiento:</h4>
										<input type='text' name='fecha' placeholder='Fecha de nacimiento'>
										<br><br><br>
										
										<h4>-Dirección del trabajo-</h4><br>
													
										<h4>Provincia:</h4>

										<select name='Provincia2'>
										<?php
										for ($j = 0; $j < count($provinciasBase); $j++) {
											echo "<option value='".$j."''>".$provinciasBase[$j]."</option>";
										}
										?>
										</select>
											
										<h4>Cantón:</h4>
										<input type='text' name='canton2' placeholder='Cantón'>
										<h4>Distrito:</h4>
										<input type='text' name='distrito2' placeholder='Distrito'>
										<h4>Dirección exacta:</h4>
										<input type='text' name='exacta2' placeholder='Dirección exacta'>
										<br><br><br><br>
									</div>
									
									<div class='col-sm-3'>
										<h3>-Teléfonos-</h3><br>
										
											<h4>De la casa:</h4>
											<input type='text' name='telcasa' placeholder='Telefono de la casa'>
											<h4>Del trabajo:</h4>
											<input type='text' name='teltrabajo' placeholder='Telefono del trabajo'>
											<h4>Del celular:</h4>
											<input type='text' name='telcelular' placeholder='Telefono del celular'>
											<h4>Otro:</h4>
											<input type='text' name='telotro' placeholder='Telefono (Otro)'>
										<br><br><br>
										<h4>-Dirección (Otro)-</h4><br>
													
										<h4>Provincia:</h4>

										<select name='Provincia3'>
										<?php
										for ($j = 0; $j < count($provinciasBase); $j++) {
											echo "<option value='".$j."''>".$provinciasBase[$j]."</option>";
										}
										?>
										</select>
											
										<h4>Cantón:</h4>
										<input type='text' name='canton3' placeholder='Cantón'>
										<h4>Distrito:</h4>
										<input type='text' name='distrito3' placeholder='Distrito'>
										<h4>Dirección exacta:</h4>
										<input type='text' name='exacta3' placeholder='Dirección exacta'>
										<br><br><br><br>
									</div>
									<div class='col-sm-3'>		
										<br>
										<h4>-Dirección de la casa-</h4><br>
													
										<h4>Provincia:</h4>

										<select name='Provincia1'>
										<?php
										for ($j = 0; $j < count($provinciasBase); $j++) {
											echo "<option value='".$j."''>".$provinciasBase[$j]."</option>";
										}
										?>
										</select>
											
										<h4>Cantón:</h4>
										<input type='text' name='canton1' placeholder='Cantón'>
										<h4>Distrito:</h4>
										<input type='text' name='distrito1' placeholder='Distrito'>
										<h4>Dirección exacta:</h4>
										<input type='text' name='exacta1' placeholder='Dirección exacta'>
										
										<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
											<button type='submit' class='btn btn-default'>Crear usuario</button>
										<br><br><br><br><br>
						<?php echo $this->Form->end(); ?>	
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
		<?php include(dirname(__FILE__)."/../includes/footer.php");?>
	</footer>

    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/price-range.js"></script> <!-- Para Slider-->
    <script src="js/jquery.prettyPhoto.js"></script> <!--Para Galerias-->
    <script src="js/main.js"></script>
</body>
</html>
