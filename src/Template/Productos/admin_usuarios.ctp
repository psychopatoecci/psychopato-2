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
  
	//Datos de prueba para juegos físicos
	$Identificaciones = array(
	'207250941',
	'207250942',
	'207250943');
	
	$nombres = array(
	'Harambe',
	'Chuck',
	'Batman');
	
	$apellidos1 = array(
	'The',
	'Norris',
	'Bin');

	$apellidos2 = array(
	'Gorilla',
	'',
	'Suparman');
	
	$fechas = array(
	'12/10/1994',
	'01/01/1900',
	'30/05/2002');
	
	$telefonosCasa = array(
	'23480657',
	'27777777',
	'21415285');
	
	$telefonosCelular = array(
	'83480657',
	'77777777',
	'61415285');
	
	$telefonosTrabajo = array(
	'',
	'',
	'21415285');
	
	$telefonosOtro = array(
	'83111657',
	'',
	'');
	
	$provinciasCasa = array(
	'Alajuela',
	'Cartago',
	'San Jose');
	
	$cantonesCasa = array(
	'Desamparados',
	'Por ahi',
	'Escazú');
	
	$distritosCasa = array(
	'San Antonio',
	'Por allá',
	'Guácima');
	
	$direccionessCasa = array(
	'Avenica feelings. En el zoológico.',
	'Por ahí a la par de la cosa esa.',
	'Planeta tierra, en algún lugar de Singapur.');
	
	$provinciasTrabajo = array(
	'',
	'',
	'Puntarenas');
	
	$cantonesTrabajo = array(
	'Guadalupe',
	'',
	'Turrialba');
	
	$distritosTrabajo = array(
	'VirgenMaria',
	'',
	'Playita');
	
	$direccionesTrabajo = array(
	'Del palo de mangos de la catedral, a la derecha.',
	'',
	'Desde la cuadra de los perros, a la izquierda.');
	
	$provinciasOtro = array(
	'',
	'',
	'Guanacaste');
	
	$cantonesOtro = array(
	'',
	'',
	'Katsu');
	
	$distritosOtro = array(
	'',
	'',
	'Firra');
	
	$direccionesOtro = array(
	'',
	'',
	'Firra');
	
	Include ("scripts/funciones.php");
	
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
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
					
						<div align="right">
							<button type='button' class='btn btn-default get' title = 'Añadir un nuevo usuario a la base de datos'>Añadir usuario</button>
						</div>
						<br>
						<!--Barra de busqueda-->
						<div align="left" class="search_box pull-right">
							<input type="text" placeholder="Búsqueda"/>
						</div>

						<div class="brands_products">
							<div class="brands-name">
								</br>
								<style>
									div.scroll {
										width: 270px;
										height: 400px;
										overflow: scroll;
									}
								</style>
								<div class="scroll">
								<ul class="nav nav-pills nav-stacked">
									<!--/Lista de usuarios-->
									<?php
										for ($i = 0; $i < count($nombres); $i++) {
											echo "<li><a href='#".$Identificaciones[$i]."' data-toggle='tab' title='Ver los detalles de este producto'>
											<h4 class='panel-title'><font size='1'>".$Identificaciones[$i]." (".$nombres[$i]." ".$apellidos1[$i]." ".$apellidos2[$i].")
											</font></h4></a></li><p></p>";
										}
									?>
									
								</ul></div>
							</div>
						</div>
					</div>
				</div>
				
				<!--Zona de contenido-->
				<div class="col-sm-9 padding-right">
					
					<!--Vistazo a categorias-->
					<div class="category-tab">
						
						<!--Submenus de cada categoria-->
						<div class="tab-content">	
						    <?php //Mostrar nombre y código
							for ($i = 0; $i < count($Identificaciones); $i++) {
								if ($i === 0) {
									echo "<div class='tab-pane fade active in' id='".$Identificaciones[$i]."' >";
								} else {
									echo "<div class='tab-pane fade' id='".$Identificaciones[$i]."' >";
								}
								echo "<h1>".$Identificaciones[$i]." (".$nombres[$i]." ".$apellidos1[$i]." ".$apellidos2[$i].")</h1>";
								
							?>
								<br>
								<div class='col-sm-12'>
									<ul class='nav nav-tabs'>
											<?php //Menu de navegacion
											echo "<li class='active'><a href='#datosgenerales".$Identificaciones[$i]."' data-toggle='tab'>Datos generales</a></li>";
											echo "<li><a href='#direcciones".$Identificaciones[$i]."' data-toggle='tab'>Direcciones</a></li>";
											echo "<li><a href='#borrar".$Identificaciones[$i]."' data-toggle='tab'>Borrar usuario</a></li>";
											?>
									</ul>
								</div>
									
								
								<div class='tab-content'>
									
									<?php echo "<div class='tab-pane fade active in' id='datosgenerales".$Identificaciones[$i]."' >"; ?>
										<form id="guardarcambios" target="_blank" action="scripts/datosusuario.php" method="post">
											<div class='col-sm-3'>
												<h3>Identificación:</h3>
												<?php echo "".$Identificaciones[$i]; ?>
												<input type="hidden" name="id" value="<?php echo $Identificaciones[$i]; ?>">
												<br><h4>Nombre:</h4>
												<?php echo "<input type='text' name='nombre' placeholder='Nombre' value='".$nombres[$i]."'>"; ?>
												<h4>1° apellido:</h4>
												<?php echo "<input type='text' name='apellido1' placeholder='Primer apellido' value='".$apellidos1[$i]."'>"; ?>
												<h4>2° apellido:</h4>
												<?php echo "<input type='text' name='apellido2' placeholder='Segundo apellido' value='".$apellidos2[$i]."'>"; ?>
												<br><br><br><br>
											</div>
											
											<div class='col-sm-3'>
												<h3>-Teléfonos-</h3><br>
												
												<h4>De la casa:</h4>
												<?php echo "<input type='text' name='telcasa' placeholder='Telefono de la casa' value='".$telefonosCasa[$i]."'>"; ?>
												<h4>Del trabajo:</h4>
												<?php echo "<input type='text' name='teltrabajo' placeholder='Telefono del trabajo' value='".$telefonosTrabajo[$i]."'>"; ?>
												<h4>Del celular:</h4>
												<?php echo "<input type='text' name='telcelular' placeholder='Telefono del celular' value='".$telefonosCelular[$i]."'>"; ?>
												<h4>Otro:</h4>
												<?php echo "<input type='text' name='telotro' placeholder='Telefono (Otro)' value='".$telefonosOtro[$i]."'>"; ?>
												
												
												
												<br><br><br><br><br><br><br><br><br><br>
												<button type='submit' class='btn btn-default'>Guardar cambios</button>
												<br><br><br>
											</div>
										
										
											<div class='col-sm-3'>
												<h4>Fecha de nacimiento:</h4>
												<?php echo "<input type='text' name='fecha' placeholder='Fecha de nacimiento' value='".$fechas[$i]."'>"; ?>
													
											</div>
										</form>
									</div>
									
									<?php echo "<div class='tab-pane fade' id='direcciones".$Identificaciones[$i]."' >"; ?>	
										<form id="guardarcambios2" target="_blank" action="scripts/datosusuario2.php" method="post">
											<div class='col-sm-3'>
												<h4>-Dirección de la casa-</h4><br>
													
												<h4>Provincia:</h4>

												<select name='Provincia1'>
												<?php
												for ($j = 0; $j < count($provinciasBase); $j++) {
													if ($provinciasCasa[$i] === $provinciasBase[$j]) {
														echo "<option selected='selected' value='".$j."''>".$provinciasBase[$j]."</option>";
													} else {
														echo "<option value='".$j."''>".$provinciasBase[$j]."</option>";
													}
												}
												?>
												</select>
													
												<h4>Cantón:</h4>
												<?php echo "<input type='text' name='canton1' placeholder='Cantón' value='".$cantonesCasa[$i]."'>"; ?>
												<h4>Distrito:</h4>
												<?php echo "<input type='text' name='distrito1' placeholder='Distrito' value='".$distritosCasa[$i]."'>"; ?>
												<h4>Dirección exacta:</h4>
												<?php echo "<input type='text' name='exacta1' placeholder='Dirección exacta' value='".$direccionessCasa[$i]."'>"; ?>
											</div>
											<div class='col-sm-3'>
												<h4>-Dirección del trabajo-</h4><br>
													
												<h4>Provincia:</h4>
												<select name='Provincia2'>
												<?php
												for ($j = 0; $j < count($provinciasBase); $j++) {
													if ($provinciasTrabajo[$i] === $provinciasBase[$j]) {
														echo "<option selected='selected' value='".$j."''>".$provinciasBase[$j]."</option>";
													} else {
														echo "<option value='".$j."''>".$provinciasBase[$j]."</option>";
													}
												}
												?>
												</select>
												<h4>Cantón:</h4>
												<?php echo "<input type='text' name='canton2' placeholder='Cantón' value='".$cantonesTrabajo[$i]."'>"; ?>
												<h4>Distrito:</h4>
												<?php echo "<input type='text' name='distrito2' placeholder='Distrito' value='".$distritosTrabajo[$i]."'>"; ?>
												<h4>Dirección exacta:</h4>
												<?php echo "<input type='text' name='exacta2' placeholder='Dirección exacta' value='".$direccionesTrabajo[$i]."'>"; ?>
											
												<br><br><br><br><br><br><br><br><br><br>
												<button type='submit' class='btn btn-default'>Guardar cambios</button>
												<br><br><br>
											</div>
											<div class='col-sm-3'>
												<h4>-Dirección (Otro)-</h4><br>
													
												<h4>Provincia:</h4>
												<select name='Provincia3'>
												<?php
												for ($j = 0; $j < count($provinciasBase); $j++) {
													if ($provinciasOtro[$i] === $provinciasBase[$j]) {
														echo "<option selected='selected' value='".$j."''>".$provinciasBase[$j]."</option>";
													} else {
														echo "<option value='".$j."''>".$provinciasBase[$j]."</option>";
													}
												}
												?>
												</select>
												<h4>Cantón:</h4>
												<?php echo "<input type='text' name='canton3' placeholder='Cantón' value='".$cantonesOtro[$i]."'>"; ?>
												<h4>Distrito:</h4>
												<?php echo "<input type='text' name='distrito3' placeholder='Distrito' value='".$distritosOtro[$i]."'>"; ?>
												<h4>Dirección exacta:</h4>
												<?php echo "<input type='text' name='exacta3' placeholder='Dirección exacta' value='".$direccionesOtro[$i]."'>"; ?>

											</div>
										</form>
									</div>
									
									
									<?php echo "<div class='tab-pane fade' id='borrar".$Identificaciones[$i]."' >"; ?>
										<h3>Borrar este usuario de la base de datos:</h3>
										<input type="button" value="Borrar usuario">
									</div>
									
								</div>
							</div>
							<?php } ?>							
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