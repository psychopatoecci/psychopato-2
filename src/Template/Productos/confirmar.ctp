<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Tienda de videojuegos ficticia">
    <meta name="author" content="PsychoPato">
    <title>PsychoPatoShop - Confirmación de compra</title>
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
    global 	$Detalles;
    global 	$Precios;
    global 	$Cantidades;
    
    
    $Detalles = array();
    
    $IDProductos = array();
	$Precios = array();
    $Cantidades = array();
    
	//Recuperar los precios del carrito para obtener el total
	foreach($DatosCarrito as $dato):
		array_push($IDProductos, $dato->idProducto);
		array_push($Cantidades, $dato->cantidad);
	endforeach;
	
	$cuenta=0;
	if (count($IDProductos)>0) {
		foreach($DatosProductos as $dato):
			if ($IDProductos[$cuenta] == $dato->idProducto) {
				array_push($Precios, $dato->precio);
				$cuenta++;
			}
			if (($cuenta+1) > Count($IDProductos)) {
				break;
			}
		endforeach;
	}
	
	$total = '0';
	for ($i = 0; $i < count($Precios); $i++) {
		if($descuentos[$i]!=0){
			$total = $total+(intval(calcularDescuento($Precios[$i], $descuentos[$i])*$Cantidades[$i]));
		}else{
			$total = $total+(intval($Precios[$i])*$Cantidades[$i]);
		}
	}
	echo "¢".$total;
	
	
	$usuario = $this->request->session()->read('Auth.User.username');
	
	
	
?>
	
	<!--Header-->
	<header id="header">
		<?php include(dirname(__FILE__)."/../includes/header.php");?>
	</header>
	<div class="container">
		<div align="left">
			<button type='button' onClick="parent.location='../carrito'" class='btn btn-default get' title = 'Volver al carrito de compras'><-Volver al carrito</button>
		</div>
	
		<h1>Confirmación de la compra</h1><br>

		<form id="confirmarCompra" method="post">
		<div class="col-sm-6 padding-right">
			<h2>Seleccione un medio de pago:</h2><br>
			<div class="col-sm-5 padding-right">
            <?php
                if (count ($DatosTarjetas) > 0) {
                    echo "<select name='Tarjetas'>";
                    for ($s =0; $s < count($DatosTarjetas); $s++)
                        echo "<option value='".$s."'>".$DatosTarjetas[$s]['idTarjeta']."</option>";
                }
				?>
				</select>
				<br><br>

				<?php
				echo "<a href='../cuenta/".$usuario."'>Editar medios de pago</a>";
				?>
			</div>
			<br><br><br><br>
			<h2>Seleccione una dirección de envío:</h2><br>
			<div class="col-sm-12 padding-right">
				<?php if (count($DatosDirecciones) > 0) {
                    echo "<select name='Direcciones'>";
                    foreach ($DatosDirecciones as $direccion) {
                        echo "<option value='".$direccion."'>"
                            .$direccion['nombreProvincia'].", "
                            .$direccion['nombreCanton'].", "
                            .$direccion['nombreDistrito'].", "
                            .$direccion['detalles']."</option>";
                    }
                    echo "</select>";
                }
				echo "<br><br>
                <a href='../cuenta/".$usuario."'>Editar direcciones</a>";
				?>
			</div>
			<br><br><br><br><br>
		</div>
		<div class="col-sm-1 padding-right">
		</div>
		<div class="col-sm-4 padding-right">
			<?php echo"<font size='5'>Total por pagar: ¢".$total."</font>"; ?>
			<br><br><br>
                
                <?php //Botón de completar compra
                    /*echo $this->Form->create($addfactura);*/
                    use Cake\I18n\Time;
                    $now = Time::now();
                    $factura = 'FAC'.rand(10000, 999999);

                    //Datos para creación de la factura
                    echo $this->Form->hidden('idFactura', ['value'=>$factura]);
                    echo $this->Form->hidden('fechaFactura', ['value'=>$now->year."-".$now->month."-".$now->day]);
                    echo $this->Form->hidden('idUsuario', ['value'=>$usuario]);
                    echo $this->Form->hidden('precioTotal', ['value'=>$total]);
                    echo $this->Form->hidden('estadoCompra', ['value'=>1]);
                    
                    //Datos de los productos de la factura
                    for ($i=0; $i<count($IDProductos); $i++) {
                        echo $this->Form->hidden('idProducto.'.$i, array( 'label' => false, 'default'=>$IDProductos[$i]));
                        echo $this->Form->hidden('cantidad.'.$i, array( 'label' => false, 'default'=>$Cantidades[$i]));
                    }
                ?>
                    
				<?php 
                if (count($DatosDirecciones) > 0 && count ($DatosTarjetas) > 0) {
                    echo "
                    <button type='submit' name='BotonCompletarCompra' class='btn btn-default add-to-cart' title='Completar y realizar esta compra'>
                        <font size='5'>Completar compra</font>
                    </button>";
                } else {
                    echo "<font size='5'>Se necesitan tarjetas y direcciones de envío para comprar.</font>";
                } ?>
			</form>
		</div>
	</div>
	<br><br><br>
		
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
