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
  <?php 
  
	//Datos de prueba para juegos físicos
	
	global $consolas;
	
	$consolas=$consola;
	
	Include ("scripts/funciones.php");
	
	?>
	
	<?php
	if (isset($_POST['val1'])) {
		$target_dir = $_POST['val1'];
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		$uploadOk = 1;
		
		if(isset($_POST["submit"])) {
			//$target_dir = "images/productos/PROD101406/Portada/";
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if($check !== false) {
			    $uploadOk = 1;
			} else {
			    echo "El archivo no es una imagen.\r\n";
			    $uploadOk = 0;
			}
		}
		
		// Check if file already exists
		if (file_exists($target_file)) {
			echo "Este archivo ya existe. ";
			$uploadOk = 0;
		}
		
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
			echo "Solo se permiten los formatos JPG, JPEG, PNG y GIF";
			$uploadOk = 0;
		}
		
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			echo "La imagen no se ha subido.";
		// if everything is ok, try to upload file
		} else {
		
			//Borrar todas las portadas, solo debe haber una
			if (preg_match('/Portada/', $target_dir)) {
				$files = glob($target_dir.'*'); // get all file names
				foreach($files as $file){ // iterate files
				  if(is_file($file)) {
					  unlink($file); // delete file
				  }
				}
			}
		
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			    echo "La imagen ". basename( $_FILES["fileToUpload"]["name"]). " ha subido subida como portada de este producto.";
			} else {
			    echo "Ha ocurrido un error con la subida de la imagen";
			}
		}
	}
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
							<button type='button' onClick="parent.location='nuevoproducto.php'" class='btn btn-default get' title = 'Añadir un nuevo producto a la base de datos'>Añadir producto</button>
						</div>
						<br>
						<!--Barra de busqueda-->
						<div align="left" class="search_box pull-right">
							<input type="text" placeholder="Búsqueda"/>
						</div>
						
						<div class='col-sm-12'>
							<ul class='nav nav-tabs'>
								<li class='active'><a href='#filtrofisicos' data-toggle='tab'><font size="1">Físicos</font></a></li>
								<li><a href="#filtrodigitales" data-toggle="tab"><font size="1">Digitales</font></a></li>
								<li><a href="#filtroplataformas" data-toggle="tab"><font size="1">Plataformas</font></a></li>
							</ul>
						</div>
							
						
						
						<div class="brands_products">
							<div class="brands-name">
								</br></br></br>	</br>
								<style>
									div.scroll {
										width: 270px;
										height: 400px;
										overflow: scroll;
									}
								</style>
								<div class="scroll">
								<ul class="nav nav-pills nav-stacked">
									<!--/Lista de productos físicos-->
									<?php
                                        foreach ($productos as $producto) {
											echo "<li><a href='#".$producto['idProducto']."' data-toggle='tab' title='Ver los detalles de este producto'><h4 class='panel-title'><font size='1'>".$producto['idProducto']." (".$producto['nombreProducto'].")</font></h4></a></li><p></p>";
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
                            $i = 0;
                            foreach ($productos as $producto) {
								if ($i === 0) {
									echo "<div class='tab-pane fade active in' id='".$producto['idProducto']."' >";
								} else {
									echo "<div class='tab-pane fade' id='".$producto['idProducto']."' >";
								}
								echo "<h1>".$producto['idProducto']." (".$producto['nombreProducto'].")</h1>";
							?>
								<br>
								<div class='col-sm-12'>
									<ul class='nav nav-tabs'>
											<?php //Menu de navegacion
											echo "<li class='active'><a href='#datosgenerales".$producto['idProducto']."' data-toggle='tab'>Datos generales</a></li>";
											echo "<li><a href='#capturas".$producto['idProducto']."' data-toggle='tab'>Capturas</a></li>";
											echo "<li><a href='#borrar".$producto['idProducto']."' data-toggle='tab'>Borrar producto</a></li>";
											?>
									</ul>
								</div>
									
								
								<div class='tab-content'>
									<?php echo "<div class='tab-pane fade active in' id='datosgenerales".$producto['idProducto']."' >"; ?>
										<form id="guardarcambios" action="adminProductos" method="post">
                                            <input type="hidden" name="actualizar" value="<?php echo $producto['idProducto']; ?>">
											<div class='col-sm-3'>
												<h3>ID:</h3>
												<?php echo "".$producto['idProducto']; ?>
												<input type="hidden" name="id" value="<?php echo $producto['idProducto']; ?>">
												<br><h3>Nombre:</h3>
												<?php echo "<input type='text' name='nombre' placeholder='Nombre' value='".$producto['nombreProducto']."'>"; ?>
												<h3>Descripción:</h3>
												<?php echo "<textarea rows='7' cols='100' name='descripcion'>".$producto['descripcion']."</textarea>"; ?>
												<h3>Fabricante:</h3>
												<?php echo "<input type='text' name='fabricante' placeholder='Fabricante' value='".$producto['fabricante']."'>"; ?>
												<br><br><br><br>
											</div>
											
											<div class='col-sm-3'>
												<h3>Precio:</h3>
												<?php echo "<input type='text' name='precio' placeholder='Precio' value='".$producto['precio']."'>"; ?>
												<h3>Categoría:</h3>
                                                <?php
                                                    $categoriasLista = array('Juego digital','Juego físico','Plataforma');
                                                    echo $categoriasLista[intval($producto['tipo'])-1];
                                                    echo "<input type='hidden' name='Categoria' value='".$producto['tipo']."'>";
                                                ?>
												<?php if ($producto['tipo']!=3) { ?>
													<h3>Género:</h3>
													<select name='Genero'>
														<?php
														foreach ($generos as $genero) {
															if ($producto['video_juego']['genero'] === $genero['genero']) {
																echo "<option selected='selected' value='".$j."'>".$genero['genero']."</option> ";
															} else {
																echo "<option value='".$genero['genero']."'>".$genero['genero']."</option>";
															}
														}
														?>
													</select>
	
													<h3>Plataforma:</h3>
													<select name='Plataforma'>
														<?php
														foreach ($consolas as $consola) {
															if ($producto['video_juego']['idConsola'] == $consola['idConsola']) {
																echo "<option selected='selected' value='".$consola['idConsola']."'>".$consola['producto']['nombreProducto']."</option>";
															} else {
																echo "<option value='".$consola['idConsola']."''>".$consola['producto']['nombreProducto']."</option>";
															}
														}
														?>
													</select>
												<?php } ?>
												<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
												<button type='submit' class='btn btn-default'>Guardar cambios</button>
												<br><br><br>
											</div>
										</form>
										
										<div class='col-sm-3'>
											<h3>Portada:</h3>
											<?php echo "<img src='".obtenerPortada($producto['idProducto'])."' title = 'Portada actual de este producto' />"; ?>
											<br> <br>

											<form action="adminProductos" method="post" enctype="multipart/form-data">
												<input type="file" name="fileToUpload" id="fileToUpload"><br>
												<button type='submit' class='btn btn-default get' name="submit" title = 'Subir la imagen cargada'>Subir imagen</button>
												<br>
												<?php
													echo "La imagen se subirá en: ";
													echo "<input type='text' name='val1' id='val1' value='images/productos/".$producto['idProducto']."/Portada/'></input>";
												?>
												<button type='button' onClick="history.go(0)" class='btn btn-default get' title = 'Refrescar la página'>Refrescar página</button>
												<br><br><br><br>
											</form>
										</div>
									</div>
									
									<?php echo "<div class='tab-pane fade' id='capturas".$producto['idProducto']."' >"; ?>
										<h3>Subir una captura:</h3>
										<form action="adminProductos" method="post" enctype="multipart/form-data">
											<input type="file" name="fileToUpload" id="fileToUpload"><br>
											<button type='submit' class='btn btn-default get' name="submit" title = 'Subir la imagen cargada'>Subir imagen</button>
											<br>
											<?php
												echo "La imagen se subirá en: ";
												echo "<input type='text' name='val1' id='val1' value='images/productos/".$producto['idProducto']."/Capturas/'></input>";
											?>
											<br><br>
											<button type='button' onClick="history.go(0)" class='btn btn-default get' title = 'Refrescar la página'>Refrescar página</button>

										</form>
										
										<div class='col-sm-5'>
											<?php 
											$directorioCapturas = "images/productos/".$producto['idProducto']."/Capturas/";
											if (!file_exists($directorioCapturas)) { //Si no existe la carpeta, la crea
												mkdir($directorioCapturas, 0777, true);
											}
											$files = array_diff(scandir($directorioCapturas), array('.', '..'));
											
											for ($j = 0; $j < count($files); $j++) {
												echo "<h3>Captura ".($j+1).":</h3>";
												echo "<img src='".$directorioCapturas."/".$files[$j+2]."' title = 'Captura de este producto' />";
											}
											
											?>
											<br><br>Nota: de momento no se pueden borrar capturas.
											<br><br>
										</div>
									</div>
									
									<?php echo "<div class='tab-pane fade' id='borrar".$producto['idProducto']."' >"; ?>
										<h3>Borrar este producto de la base de datos:</h3>
                                        <form action="../adminProductos" method="post">
                                            <input type="hidden" name="borrar" value="<?php echo $producto['idProducto']; ?>">
											<button type='submit' class='btn btn-default'>Borrar producto</button>
                                        </form>
									</div>
									
								</div>
							</div>
							<?php $i++;} ?>							
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
