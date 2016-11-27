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
	
	//Nomenclatura de la base para las provincias
	$provinciasBase = array('San José','Alajuela','Cartago','Heredia','Guanacaste','Puntarenas','Limón','');
	
	$usuario = $this->request->session()->read('Auth.User.username');

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
								<?php //Menu de navegacion
								echo "<li class='active'><a href='#datosgenerales".$us['identificacion']."' data-toggle='tab'>Datos generales</a></li>";
								echo "<li><a href='#direcciones".$us['identificacion']."' data-toggle='tab'>Direcciones</a></li>";
								echo "<li><a href='#tarjetas".$us['identificacion']."' data-toggle='tab'>Tarjetas</a></li>";
								echo "<li><a href='#ordenes".$us['identificacion']."' data-toggle='tab'>Órdenes</a></li>";
								?>
							</ul>
						</div>
						<div class='tab-content'>
							<?php echo "<div class='tab-pane fade active in' id='datosgenerales".$us['identificacion']."' >"; ?>
                                <form id="guardarcambios" action="../personas/cuenta" method="post">
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
                                            echo "<input type='text' name='tel".$tipo."' placeholder = 'Telefono' value='".$num."'>";
                                            if ($num > 0)
                                                echo "<input type='checkbox' name='borrar".$tipo."'>Borrar";
                                        } ?>
                                            
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
							    <?php echo "<div class='tab-pane fade' id='tarjetas".$us['identificacion']."'>";?>
                                    <div class='col-sm-4'>
                                        <h4>Tarjetas</h4><br>
                                        <form id="borrartarjeta" action="../personas/cuenta" method="post">
                                            <?php
                                            $i = 0;
                                            foreach ($us['tarjetas'] as $tarjeta) {
                                                echo "<div style= 'width:51%;' class='col-sm-3'>
                                                <input type='text' name='tarjeta".$i."' value='".$tarjeta['idTarjeta']."' readonly>
                                                <input type='checkbox' name='borrar".$i."' value='on'> Borrar
                                                </div>";
                                                $i ++;
                                            }
                                            echo "<input type='hidden' name='cantidad' value='".$i."'>";
                                            ?>
                                            <input type="hidden" name="tipoReq" value="tarjetas"><br><br>
                                            <input type="hidden" name="id" value="<?php echo $us['identificacion']; ?>"><br><br>
                                            <button type='submit' class='btn btn-default'>Guardar cambios</button>
                                        </form>
                                    </div>
                                    <div class='col-sm-4'>
                                        <form id="agregarTarjeta" action="../personas/cuenta" method="post">
                                            <input type="hidden" name="tipoReq" value="AgregarTarjeta">
                                            <h3>Agregar medio de pago:</h4><br>
                                            <?= $this->Form->input('numTarjeta', ['placeholder' => 'Número de tarjeta', 'label' => false, 'required' ]) ?>
                                            <?= $this->Form->input('csv', ['placeholder' => 'CSV', 'label' => false, 'required' ]) ?>
                                            <br><br>
                                            <button type='submit' class='btn btn-default'>Agregar</button>
                                        </form>
                                    </div>
                                </div>
                                    
                                <?php echo "<div class='tab-pane fade' id='ordenes".$us['identificacion']."'>";
                                    echo "<a href='/../ordenes/".$usuario."' title = 'Ver las órdenes realizadas'
                                    class='btn btn-default add-to-cart'> Ver órdenes</a>";
                                    ?>
                                </div>

								<?php echo "<div class='tab-pane fade' id='direcciones".$us['identificacion']."' >"; ?>	
										<form id="guardardireccion" action="../personas/cuenta" method="post">
                                            <input type="hidden" name="tipoReq" value="direcciones">
											<input type="hidden" name="id" value="<?php echo $us['identificacion']; ?>">
											<h4>-Direcciones-</h4><br>
                                            <?php
												$i = 0;
                                                foreach ($us['personas_direcciones'] as $direccion) {
                                                    echo "<div class='col-sm-3'>
                                                        <h4>Provincia:</h4>
                                                        <select name='provincia".$i."'>";
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
                                                    <br><br><input type='checkbox' name='borrar".$i."' value='on'> Borrar esta dirección
                                                    </div>";
                                                    $i ++;
                                            	}
                                                echo "<div class='col-sm-1'>
                                                </div>
                                                <div class='col-sm-3'>
                                                <br><input type='checkbox' name='agregar' value='on'> Agregar nueva dirección:
                                                <h4>Provincia:</h4>
                                                <select name='provincia".$i."'>";
                                                foreach ($provinciasBase as $prov) {
                                                    if ('Alajuela' === $prov) {
                                                        echo "<option selected='selected' value='".$prov."''>".$prov."</option>";
                                                    } else {
                                                        echo "<option value='".$prov."''>".$prov."</option>";
                                                    }
                                                }
                                                echo "</select>
                                                <h4>Cantón:</h4>
                                                <input type='text' name='canton".$i."' placeholder='Cantón' value='Alajuela'>
                                                <h4>Distrito:</h4>
                                                <input type='text' name='distrito".$i."' placeholder='Distrito' value='Alajuela'>
                                                <h4>Dirección exacta:</h4>
                                                <input type='text' name='detalles".$i."' placeholder='Dirección exacta' value=''>
                                                
												</div> ";


                                            	echo "<input type='hidden' name='cantidad' value='".$i."'>";
                                            ?>
										    <button type='submit' class='btn btn-default'>Guardar cambios</button>
										</form>
									</div>
								<div class="col-sm-4">
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
