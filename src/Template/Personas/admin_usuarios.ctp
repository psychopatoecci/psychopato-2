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
	
	Include ("scripts/funciones.php");
	
	//Nomenclatura de la base para las provincias
	$provinciasBase = array('San José','Alajuela','Cartago','Heredia','Guanacaste','Puntarenas','Limon','');

	?>
			
	<!--Header-->
	<header id="header">
		<?php include(dirname(__FILE__)."/../includes/header.php");?>
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
                                        foreach ($usuarios as $us) {
                                            echo "<li><a href='#".$us['identificacion']."' data-toggle='tab' title='Ver usuario'>
                                            <h4 class= 'panel-title'><font size='1'>"
                                            .$us['identificacion']." (".$us['nombre']." ".$us['apellido1']." ".$us['apellido2'].")
                                            </font></h4></a></li><p></p>";
                                        }
									?>
									
								</ul></div>
							</div>
						</div>
					</div>
                    <form id="pag" action="./admin_usuarios" method="get">
                        <?php echo "<input type='hidden' name='nuevaPag' value='".strval($numPage - 1)."'>"; ?>
                        <button type='submit' class='btn btn-default'>Anterior</button>
                    </form>
                    <form id="pag" action="./admin_usuarios" method="get">
                        <?php echo "<input type='hidden' name='nuevaPag' value='".strval($numPage + 1)."'>"; ?>
                        <button type='submit' class='btn btn-default'>Siguiente</button>
                    </form>
				</div>
				
				<!--Zona de contenido-->
				<div class="col-sm-9 padding-right">
					
					<!--Vistazo a categorias-->
					<div class="category-tab">

						<!--Submenus de cada categoria-->
						<div class="tab-content">	
						    <?php //Mostrar nombre y código
                            foreach ($usuarios as $us) {
								echo "<div class='tab-pane fade' id='".$us['identificacion']."' >";
								echo "<h1>".$us['identificacion']." (".$us['nombre']." ".$us['apellido1']." ".$us['apellido2'].")</h1>";
							?>

                            
								<br>
								<div class='col-sm-12'>
									<ul class='nav nav-tabs'>
											<?php //Menu de navegacion
											echo "<li class='active'><a href='#datosgenerales".$us['identificacion']."' data-toggle='tab'>Datos generales</a></li>";
											echo "<li><a href='#direcciones".$us['identificacion']."' data-toggle='tab'>Direcciones</a></li>";
											echo "<li><a href='#borrar".$us['identificacion']."' data-toggle='tab'>Borrar usuario</a></li>";
											?>
									</ul>
								</div>
									
								
								<div class='tab-content'>
									
									<?php echo "<div class='tab-pane fade active in' id='datosgenerales".$us['identificacion']."' >"; ?>

										<form id="guardarcambios" action="./admin_usuarios" method="post">
                                            <input type="hidden" name="tipoReq" value="generales">
											<div class='col-sm-3'>
												<h3>Identificación:</h3>
												<?php echo "".$us['identificacion']; ?>
												<input type="hidden" name="id" value="<?php echo $us['identificacion']; ?>">
												<br><h4>Nombre:</h4>
												<?php echo "<input type='text' name='nombre' placeholder='Nombre' value='".$us['nombre']."'>"; ?>
												<h4>1° apellido:</h4>
												<?php echo "<input type='text' name='apellido1' placeholder='Primer apellido' value='".$us['apellido1']."'>"; ?>
												<h4>2° apellido:</h4>
												<?php echo "<input type='text' name='apellido2' placeholder='Segundo apellido' value='".$us['apellido2']."'>"; ?>
												<br><br><br><br>
											</div>
											
											<div class='col-sm-3'>
												<h3>-Teléfonos-</h3><br>
												<?php
                                                    $tipos   = ['Casa' => 0, 'Trabajo' => 0,'Celular' => 0, 'Otro' => 0];
                                                    foreach ($us['telefonos_personas'] as $telefono) {
                                                        $tipos[$telefono['tipo_tel']] = $telefono['telefono'];
                                                    }
                                                    foreach ($tipos as $tipo => $num) {
                                                        echo "<h4>".$tipo.":</h4>";
                                                        echo "<input type='text' name= 'tel".$tipo."' placeholder = 'Telefono' value='".$num."'>";
                                                    }
                                                ?>
												
												<br><br><br><br><br><br><br><br><br><br>
												<button type='submit' class='btn btn-default'>Guardar cambios</button>
												<br><br><br>
											</div>
										
										
											<div class='col-sm-3'>
												<h4>Fecha de nacimiento:</h4>
												<?php echo "<input type='text' name='fecha' placeholder='Fecha de nacimiento' value='".$us['fecha_nacimiento']."'>"; ?>
													
											</div>
										</form>
									</div>
									
									<?php echo "<div class='tab-pane fade' id='direcciones".$us['identificacion']."' >"; ?>	

										<form id="guardardireccion" action="./admin_usuarios" method="post">
                                            <input type="hidden" name="tipoReq" value="direcciones">
											<input type="hidden" name="id" value="<?php echo $us['identificacion']; ?>">
											<h4>-Direcciones-</h4><br>
                                            <?php
												$i = 0;
                                                foreach ($us['personas_direcciones'] as $direccion) {
											    echo "<div class='col-sm-3'>
                                                    <h4>Provincia:</h4>
                                                    <select name='provincia".$i."'>
                                                    ";
                                                    foreach ($provinciasBase as $prov) {
                                                        if ($direccion['nombreProvincia'] === $prov) {
                                                            echo "<option selected='selected' value='".$prov."''>".$prov."</option>";
                                                        } else {
                                                            echo "<option value='".$prov."''>".$prov."</option>";
                                                        }
                                                    }
                                                    echo "</select>
                                                    <h4>Cantón:</h4>
                                                    <input type='text' name='canton".$i."' placeholder='Cantón' value='".$direccion['nombreCanton']."'>
                                                    <h4>Distrito:</h4>
                                                    <input type='text' name='distrito".$i."' placeholder='Distrito' value='".$direccion['nombreDistrito']."'>
                                                    <h4>Dirección exacta:</h4>
                                                    <input type='text' name='detalles".$i."' placeholder='Dirección exacta' value='".$direccion['detalles']."'>
												    </div>";
													$i ++;
                                            	}
                                            	echo "<input type='hidden' name='cantidad' value='".$i."'>";
                                            ?>
										    <button type='submit' class='btn btn-default'>Guardar cambios</button>
										</form>
									</div>
									
									
									<?php echo "<div class='tab-pane fade' id='borrar".$us['identificacion']."' >"; ?>
                                        <h3>Borrar este usuario de la base de datos:</h3>
										<form id="borrarUsuario" action="./admin_usuarios" method="post">
                                            <input type="hidden" name="tipoReq" value="borrar">
											<input type="hidden" name="id" value="<?php echo $us['identificacion']; ?>">
										    <button type='submit' class='btn btn-default'>Borrar usuario</button>
										</form>
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
		<?php include(dirname(__FILE__)."/../includes/footer.php");?>
	</footer>

    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/price-range.js"></script> <!-- Para Slider-->
    <script src="js/jquery.prettyPhoto.js"></script> <!--Para Galerias-->
    <script src="js/main.js"></script>
</body>
</html>
