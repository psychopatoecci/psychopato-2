<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Tienda de videojuegos ficticia">
    <meta name="author" content="PsychoPato">
    <title>PsychoPatoShop - Administración de la cuenta</title>
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
	$identificacion = 'ChuckNorris';
	$nombre = 'Chuck';
	$apellido1 = 'Norris';
	$apellido2 = '';
	$fechanacimiento = '10/03/1940';
	$correo = 'gmail@chucknorris.com';
	$password = 'elchuck01';
	
	$telefonoCelular = '78451649';
	$telefonoCasa = '24331512';
	$telefonoTrabajo = '25789566';
	$telefonoOtro = '';
	
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
	
	//Nomenclatura de la base para las provincias
	$provinciasBase = array('San Jose','Alajuela','Cartago','Heredia','Guanacaste','Puntarenas','Limon','');
?>
			
	<!--Header-->
	<header id="header">
		<?php include(dirname(__FILE__)."/../includes/header.php");?>
	</header>
	
	<section>
		<div class="container">
			<div class="col-sm-2 padding-right">
			</div>
			
			<div class="col-sm-9 padding-right">
				<div class="category-tab">
					<div class="tab-content">
						<h1>Administración de la cuenta</h1><br>
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#info" data-toggle="tab">Información personal</a></li>
								<li><a href="#direcciones" data-toggle="tab">Direcciones</a></li>
								<li><a href="#pagos" data-toggle="tab">Medios de pago</a></li>

							</ul>
						</div>
						
						<div class="tab-pane fade active in" id="info" >
							<div class="signup-form">
								<form action="#">
									<div class="col-sm-4">
										<h3>Nombre de usuario:</h3>
										<?php echo "<h4>".$identificacion."</h4> ";?>
										
										<h3>Nombre:</h3>
										<?php echo "<input type='text' name='nombre' placeholder='Nombre'
										value = '".$nombre."'>";?>
										<h3>1° apellido:</h3>
										<?php echo "<input type='text' name='apellido1' placeholder='Primer apellido'
										value = '".$apellido1."'>";?>
										<h3>2° apellido:</h3>
										<?php echo "<input type='text' name='apellido2' placeholder='Segundo apellido'
										value = '".$apellido2."'>";?>
										
									</div>
									<div class="col-sm-4">
										<h3>Fecha de nacimiento:</h3>
										<?php echo "<input type='text' name='fecha' placeholder='Fecha de nacimiento'
										value = '".$fechanacimiento."'>";?>
										<h3>Correo electrónico:</h3>
										<?php echo "<input type='text' name='email' placeholder='Correo eletrónico'
										value = '".$correo."'>";?>
										<h3>Teléfono celular:</h3>
										<?php echo "<input type='telephone' name='telcelular' placeholder='Teléfono celular'
										value = '".$telefonoCelular."'>";?>
										<br>
										
									</div>
									<div class="col-sm-4">
										
										<h3>-Cambiar contraseña-</h3>
										Contraseña actual:
										<input type="password" placeholder="Digite su contraseña actual"/>
										Nueva contraseña:
										<input type="password" placeholder="Digite la nueva contraseña"/>
										<br><br><button type="submit" class="btn btn-default" title = 'Guardar los nuevos datos'>Guardar cambios</button>
									</div>
								</form>
							</div>
						</div>
						
						<div class="tab-pane fade" id="direcciones" >
							<div class="signup-form">
								<form action="#">
									<div class='col-sm-4'>
										<h3>Dirección de la casa:</h4><br>
										
										<h4>Teléfono:</h4>
										<?php echo "<input type='telephone' name='telcasa' placeholder='Teléfono de la casa'
										value = '".$telefonoCasa."'>";?>
										
										<h4>Provincia:</h4>
										<select name='Provincia1'>
											<?php
											for ($j = 0; $j < count($provinciasBase); $j++) {
												if ($provinciaCasa === $provinciasBase[$j]) {
													echo "<option selected='selected' value='".$j."''>".$provinciasBase[$j]."</option>";
												} else {
													echo "<option value='".$j."''>".$provinciasBase[$j]."</option>";
												}
											}
											?>
										</select>		
										<h4>Cantón:</h4>
										<?php echo "<input type='telephone' name='canton1' placeholder='Cantón'
										value = '".$cantonCasa."'>";?>
										<h4>Distrito:</h4>
										<?php echo "<input type='telephone' name='distrito1' placeholder='Distrito'
										value = '".$distritoCasa."'>";?>
										<h4>Dirección exacta:</h4>
										<?php echo "<textarea rows='10' cols='300' name='exacta1' 
										placeholder='Dirección exacta'>".$direccionCasa."</textarea>";?>
									</div>
									<div class='col-sm-4'>		
										<h3>-Dirección del trabajo-</h4><br>
										
										<h4>Teléfono:</h4>
										<?php echo "<input type='telephone' name='teltrabajo' placeholder='Teléfono del trabajo'
										value = '".$telefonoTrabajo."'>";?>
										
										<h4>Provincia:</h4>

										<select name='Provincia2'>
										<?php
											for ($j = 0; $j < count($provinciasBase); $j++) {
												if ($provinciaTrabajo === $provinciasBase[$j]) {
													echo "<option selected='selected' value='".$j."''>".$provinciasBase[$j]."</option>";
												} else {
													echo "<option value='".$j."''>".$provinciasBase[$j]."</option>";
												}
											}
										?>
										</select>
											
										<h4>Cantón:</h4>
										<?php echo "<input type='telephone' name='canton2' placeholder='Cantón'
										value = '".$cantonTrabajo."'>";?>
										<h4>Distrito:</h4>
										<?php echo "<input type='telephone' name='distrito2' placeholder='Distrito'
										value = '".$distritoTrabajo."'>";?>
										<h4>Dirección exacta:</h4>
										<?php echo "<textarea rows='10' cols='300' name='exacta2' 
										placeholder='Dirección exacta'>".$direccionTrabajo."</textarea>";?>
										
										<br><br><br>
										<div class="signup-form">
											<center>
												<button type="submit" class="btn btn-default" title = 'Guardar los nuevos datos'>Guardar cambios</button>
											</center>
										</div>
									</div>
									<div class='col-sm-4'>		
										<h3>-Dirección (Otro)-</h4><br>
										
										<h4>Teléfono:</h4>
										<?php echo "<input type='telephone' name='telotro' placeholder='Teléfono (Otro)'
										value = '".$telefonoOtro."'>";?>
										
										<h4>Provincia:</h4>

										<select name='Provincia3'>
										<?php
											for ($j = 0; $j < count($provinciasBase); $j++) {
												if ($provinciaOtro === $provinciasBase[$j]) {
													echo "<option selected='selected' value='".$j."''>".$provinciasBase[$j]."</option>";
												} else {
													echo "<option value='".$j."''>".$provinciasBase[$j]."</option>";
												}
											}
										?>
										</select>
											
										<h4>Cantón:</h4>
										<?php echo "<input type='telephone' name='canton3' placeholder='Cantón'
										value = '".$cantonOtro."'>";?>
										<h4>Distrito:</h4>
										<?php echo "<input type='telephone' name='distrito3' placeholder='Distrito'
										value = '".$distritoOtro."'>";?>
										<h4>Dirección exacta:</h4>
										<?php echo "<textarea rows='10' cols='300' name='exacta3' 
										placeholder='Dirección exacta'>".$direccionOtro."</textarea>";?>
										
										<br><br><br><br>
						
									</div>
								</form>
							</div>
						</div>
						<div class="tab-pane fade" id="pagos" >
							<div class="signup-form">
								<form action="#">
									<div class='col-sm-4'>
										<h3>Tarjetas</h3>
										<?php
											foreach ($tarjetas as $trj) {
												echo "<p>$trj&nbsp&nbsp&nbsp";
												//echo "<button name=\"Borrar\" type=\"button\" value=\"$trj\">Borrar</button>";
												echo $this->Html->link('Borrar', '/personas/borrarTarjeta/'.$trj, array('class' => 'button'));
												echo "</p>";
                                               						}
										?>
									</div>
									<div class='col-sm-4'>
								
										<h3>Agregar medio de pago:</h4><br>
										<?= $this->Form->create(null,['url'=>['controller' => 'Personas', 'action' => 'cuenta']]) ?>
										<?= $this->Form->input('numTarjeta', ['class' => 'col-sm-2 col-sm-offset-1', 'placeholder' => 'Número de tarjeta', 'label' => false, 'required' ]) ?>
										<?= $this->Form->input('csv', ['class' => 'col-sm-2 col-sm-offset-1', 'placeholder' => 'CSV', 'label' => false, 'required' ]) ?>
										
									</div>
									<div class='col-sm-4'>

						
										<br><br><br>
										<div class="signup-form">
											<center>
												<?= $this->Form->button('Guardar los cambios', ['class' => 'btn btn-default']) ?>
											</center>
										</div>
									</div>
								</form>
							</div>
						</div>
							
						
					</div>

				</div>
			</div>
		</div>
		<br><br><br>
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
