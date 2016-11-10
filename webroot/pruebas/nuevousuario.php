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
		<?php include("includes/header.php");?>
	</header>
	
	<!--Navegador lateral-->
	<section>
		<div class="container">
			
			<div align="left">
				<button type='button' onClick="parent.location='Adminusuarios.php'" class='btn btn-default get' title = 'Regresar a la lista de usuarios'><-Volver a la lista de usuarios</button>
			</div>
			
			<div class="tab-content">
				<h1>Creación de usuario</h1>
				<br>	
			<?php //echo $this->Form->create(null,['url'=>['controller'=>'Personas', 'action'=>'guardar']])	; ?>
				<div class='tab-content'>
					<form id="guardarcambios" target="_blank" action="/src/Template/Productos/scripts/guardarnuevousuario.php" method="post">
						<div class='col-sm-2'>
							<h3>Identificación:</h3>
							<input type='text' name='id' placeholder='Identificación del usuario'>
							<br><h4>Nombre:</h4>
							<input type='text' name='nombre' placeholder='Nombre'>
							<h4>1° apellido:</h4>
							<input type='text' name='apellido1' placeholder='Primer apellido'>
							<h4>2° apellido:</h4>
							<input type='text' name='apellido2' placeholder='Segundo apellido'>
							<h4>Fecha de nacimiento:</h4>
							<input type='text' name='fecha' placeholder='Fecha de nacimiento'>
							<h4>Teléfono celular:</h4>
							<input type='text' name='telcelular' placeholder='Telefono del celular'>
							<br><br><br>
						</div>
						
						<div class='col-sm-3'>
						
							<h3>Dirección de la casa:</h4><br>
							
							<h4>Teléfono:</h4>
							<input type='text' name='telcasa' placeholder='Telefono de la casa'>
										
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
							<textarea rows='10' cols='300' placeholder='Dirección exacta' name='exacta1'></textarea>
							
						</div>
						<div class='col-sm-3'>		
							<h3>-Dirección del trabajo-</h4><br>
							
							<h4>Teléfono:</h4>
							<input type='text' name='teltrabajo' placeholder='Telefono del trabajo'>
								
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
							<textarea rows='10' cols='300' placeholder='Dirección exacta' name='exacta2'></textarea>
			
						</div>
						<div class='col-sm-3'>		
							<h3>-Dirección (Otro)-</h4><br>
							
							<h4>Teléfono:</h4>
								<input type='text' name='telotro' placeholder='Telefono (Otro)'>
								
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
							<textarea rows='10' cols='300' placeholder='Dirección exacta' name='exacta3'></textarea>

							<br><br><br><br>
			
						</div>
						<div class='col-sm-1'>
							<button type='submit' class='btn btn-default'>Crear usuario</button>
							<br><br><br><br><br>
			
						</div>
						<?php //echo $this->Form->end(); ?>	
					</form>
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